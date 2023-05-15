<?php
require_once('./../../config.php');
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * from `epr` where id = '{$_GET['id']}' and `delete_flag` = 0 ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
    }
}
?>

<?php 

?>
<div class="container-fluid">
	<form action="" id="product-form">
		<input type="hidden" name ="id" value="<?php echo isset($id) ? $id : '' ?>">
		
		<div class="form-group">
			<label for="name" class="control-label">Weight</label>
			<input type="text" name="weight" id="weight" class="form-control form-control-sm rounded-0" value="<?php echo isset($weight) ? $name : ''; ?>"  required/>
		</div>
		<div class="form-group">
			<label for="name" class="control-label">Cell Lot</label>
			<input type="text" name="celllot" id="celllot" class="form-control form-control-sm rounded-0" value="<?php echo isset($celllot) ? $celllot : ''; ?>"  required/>
		</div>
		<div class="form-group">
			<label for="name" class="control-label">Category</label>
			<input type="text" name="category" id="category" class="form-control form-control-sm rounded-0" value="<?php echo isset($category) ? $category : ''; ?>"  required/>
		</div>
		<div class="form-group">
			<label for="name" class="control-label">Code</label>
			<input type="text" name="category" id="category" class="form-control form-control-sm rounded-0" value="<?php echo isset($code) ? $code : ''; ?>"  required/>
		</div>
		<div class="form-group">
			<label for="name" class="control-label">Refurbished</label>
			<input type="text" name="refurbished" id="refurbished" class="form-control form-control-sm rounded-0" value="<?php echo isset($refurbished) ? $refurbished : ''; ?>"  required/>
		</div>
		<div class="form-group">
			<label for="name" class="control-label">Recycle</label>
			<input type="text" name="recycle" id="recycle" class="form-control form-control-sm rounded-0" value="<?php echo isset($recycle) ? $recycle : ''; ?>"  required/>
		</div>
		<div class="form-group">
			<label for="name" class="control-label">Year</label>
			<input type="text" name="year" id="year" class="form-control form-control-sm rounded-0" value="<?php echo isset($year) ? $year : ''; ?>"  required/>
		</div>
		
	</form>
</div>
<script>
	$(document).ready(function(){
		$('#product-form').submit(function(e){
			e.preventDefault();
            var _this = $(this)
			 $('.err-msg').remove();
			start_loader();
			$.ajax({
				url:_base_url_+"classes/Master.php?f=save_records",
				data: new FormData($(this)[0]),
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                dataType: 'json',
				error:err=>{
					console.log(err)
					alert_toast("An error occured",'error');
					end_loader();
				},
				success:function(resp){
					if(typeof resp =='object' && resp.status == 'success'){
						// location.reload()
						alert_toast(resp.msg, 'success')
						uni_modal("<i class='fa fa-th-list'></i> Product Details ","view_records.php?id="+resp.cid)
						$('#uni_modal').on('hide.bs.modal', function(){
							location.reload()
						})
					}else if(resp.status == 'failed' && !!resp.msg){
                        var el = $('<div>')
                            el.addClass("alert alert-danger err-msg").text(resp.msg)
                            _this.prepend(el)
                            el.show('slow')
                            $("html, body").scrollTop(0);
                            end_loader()
                    }else{
						alert_toast("An error occured",'error');
						end_loader();
                        console.log(resp)
					}
				}
			})
		})

	})
</script>