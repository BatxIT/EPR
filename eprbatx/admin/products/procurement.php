<?php
require_once('./../config.php');
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * from `product_list` where id = '{$_GET['id']}' and `delete_flag` = 0 ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
    }
}
?>
<style>
	body.text-sm .input-group-text {
    font-size: 11px;
    border-radius: 0px;
}
	</style>

<div class="card card-outline rounded-0 card-teal">

	<div class="">
	<div class="card-header">
	<h3 class="card-title">Procurement </h3>		
	</div>
	
	<div class="card-body row ">
    <div class="col-6 ">
		<div class="form-group">

			<label for="status" class="control-label">Clients</label>
			<select name="recycle" id="recycle" class="form-control form-control-sm rounded-0" required="required">
				<option value="Yes" <?= isset($status) && $status == 1 ? 'selected' : '' ?>>ABC</option>
				<option value="No" <?= isset($status) && $status == 0 ? 'selected' : '' ?>>ABC</option>
			</select>
		</div>
		<div class="form-group">
			<label for="description" class="control-label">Address</label>
			<input type="text" name="weight" id="weight" class="form-control form-control-sm rounded-0" value="<?php echo isset($weight) ? $weight : ''; ?>"  required/>
		</div>
		<div class="form-group">
			<label for="description" class="control-label">GST No.</label>
			<input type="text" name="weight" id="weight" class="form-control form-control-sm rounded-0" value="<?php echo isset($weight) ? $weight : ''; ?>"  required/>
		</div>
		<div class="form-group">
			<label for="description" class="control-label">Pickup Date</label>
			<input type="text" name="weight" id="weight" class="form-control form-control-sm rounded-0" value="<?php echo isset($weight) ? $weight : ''; ?>"  required/>
		</div>
	</div>
    <div class="col-6 "></div>

	<div class="col-6 "><div class="form-group">
			<label for="description" class="control-label">Invoice No.</label>
			<input type="text" name="weight" id="weight" class="form-control form-control-sm rounded-0" value="<?php echo isset($weight) ? $weight : ''; ?>"  required/>
		</div>
	</div>
	<div class="col-6 ">
		<label for="description" class="control-label"></label>
		<div class="input-group mb-3">
		<input type="file" class=" form-control-sm rounded-0" id="inputGroupFile02">
		
	</div>
	</div>
	<div class="col-6 ">
	<div class="form-group">
			<label for="description" class="control-label">PO No.</label>
			<input type="text" name="weight" id="weight" class="form-control form-control-sm rounded-0" value="<?php echo isset($weight) ? $weight : ''; ?>"  required/>
		</div>
	</div>
    <div class="col-6 ">
		<label for="description" class="control-label"></label>
		<div class="input-group mb-3">
		<input type="file" class=" form-control-sm rounded-0" id="inputGroupFile02">
	
	</div>
	</div>
	<div class="col-6 ">
	<div class="form-group">
			<label for="description" class="control-label">Pickup From</label>
			<input type="text" name="weight" id="weight" class="form-control form-control-sm rounded-0" value="<?php echo isset($weight) ? $weight : ''; ?>"  required/>
		</div>
	</div>
   <div class="col-6 ">
		<label for="description" class="control-label"></label>
		<div class="input-group mb-3">
		<input type="file" class="form-control-sm rounded-0" id="inputGroupFile02">
		
	</div>
	</div>
	<div class="col-6 ">
	<div class="form-group">
			<label for="description" class="control-label">Form 10</label>
			<input type="text" name="weight" id="weight" class="form-control form-control-sm rounded-0" value="<?php echo isset($weight) ? $weight : ''; ?>"  required/>
		</div>
	</div>
	<div class="col-6 ">
		<label for="description" class="control-label"></label>
		<div class="input-group mb-3">
		<input type="file" class=" form-control-sm rounded-0" id="inputGroupFile02">
	
	</div>
	</div>
    <!-- Force next columns to break to new line -->
    <div class="w-100"><h4>Transport Details</h4></div>
	
	<hr>
	<div class="col-6 ">
	<div class="form-group">
			<label for="description" class="control-label">Transport Name</label>
			<input type="text" name="weight" id="weight" class="form-control form-control-sm rounded-0" value="<?php echo isset($weight) ? $weight : ''; ?>"  required/>
		</div>
		</div>
		<div class="form-group">
			<label for="description" class="control-label">Vehicle No.</label>
			<input type="text" name="weight" id="weight" class="form-control form-control-sm rounded-0" value="<?php echo isset($weight) ? $weight : ''; ?>"  required/>
		</div>
		
	
	<div class="col-6 ">
	
		<div class="form-group">
			<label for="description" class="control-label">Bilty No.</label>
			<input type="text" name="weight" id="weight" class="form-control form-control-sm rounded-0" value="<?php echo isset($weight) ? $weight : ''; ?>"  required/>
		</div>
	</div>
    <div class="col-6 ">
	<label for="description" class="control-label"></label>
		<div class="input-group mb-3">
		<input type="file" class=" form-control-sm rounded-0" id="inputGroupFile02">

	</div>
	</div>
   
	<div class="col-6 ">
	<div class="form-group">
			<label for="description" class="control-label">Date of Pick up</label>
			<input type="text" name="weight" id="weight" class="form-control form-control-sm rounded-0" value="<?php echo isset($weight) ? $weight : ''; ?>"  required/>
		</div>
	</div>
    
  </div>
  
</div>
<div class="card-footer">
			<div class="col-md-12">
				<div class="row">
					<button class="btn btn-sm btn-primary" form="system-frm">Save</button>
				</div>
			</div>
		</div>
</div>


<script>
	$(document).ready(function(){
		$('#product-form').submit(function(e){
			e.preventDefault();
            var _this = $(this)
			 $('.err-msg').remove();
			start_loader();
			$.ajax({
				url:_base_url_+"classes/Master.php?f=save_product",
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
						uni_modal("<i class='fa fa-th-list'></i> Product Details ","products/view_product.php?id="+resp.cid)
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