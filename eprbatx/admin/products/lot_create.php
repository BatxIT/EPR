<?php
require_once('./../../config.php');
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * from `product_list` where id = '{$_GET['id']}' and delete_flag = 0 ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
    }else{
		echo '<script>alert("Product ID is not valid."); location.replace("./?page=products")</script>';
	}
}else{
	echo '<script>alert("Product ID is Required."); location.replace("./?page=products")</script>';
}
?>
<style>
	#uni_modal .modal-footer{
		display:none;
	}
</style>
<div class="container-fluid">
	
	<dl>
		<dt class="text-muted">Cell Lot</dt>
		<dd class="pl-4"><?= isset($cel_lot) ? $code : "TACO 001" ?></dd>
		<dt class="text-muted">Total Cell - Lot QTY</dt>
		<dd class="pl-4">0</dd>
		  <!-- /.content-wrapper 
		<dt class="text-muted">Status</dt>
		<dd class="pl-4">
			<?php if($status == 1): ?>
				<span class="badge badge-success px-3 rounded-pill">Active</span>
			<?php else: ?>
				<span class="badge badge-danger px-3 rounded-pill">Inactive</span>
			<?php endif; ?>
		</dd> -->
	</dl>
</div>

<form action="" id="product-form">
	
		<input type="hidden" name ="id" value="<?php echo isset($id) ? $id : '' ?>">
		
		
		<div class="form-group">
			<label for="description" class="control-label">Min No. of Cells</label>
			<input type="text" name="weight" id="weight" class="form-control form-control-sm rounded-0" value=""  required/>
		</div>
		<div class="form-group">
			<label for="description" class="control-label">Max No. of Cells</label>
			<input type="text" name="weight" id="weight" class="form-control form-control-sm rounded-0" value=""  required/>
		</div>
		<div class="form-group">
		<label for="status" class="control-label">Choose Category</label>
			<select name="status" id="status" class="form-control form-control-sm rounded-0" required="required">
				<option value="1" <?= isset($status) && $status == 1 ? 'selected' : '' ?>>NMC</option>
				<option value="0" <?= isset($status) && $status == 0 ? 'selected' : '' ?>>LFP</option>
			</select>	</div>
		
		<div class="form-group">
		<fieldset>
<input type="RADIO" value="bulkupload/autogenerate_lot.php"     name="userChoice" id="navRadio01">
 <label for="navRadio01">Auto Generate Lot</label><br> 
<input type="RADIO" value="bulkupload/bulkupload.php"    name="userChoice" id="navRadio02" checked>
        <label for="navRadio02">Bulk Upload Manual Entry</label><br>  
		<input type="BUTTON"  value="Proceed to Upload"    onclick="ob=this.form.userChoice;for(i=0;i<ob.length;i++){
    if(ob[i].checked){window.open(ob[i].value,'_self');};}" style="color:#FFFFF;background-color:#E0E0E5;font-family:verdana;border-style:solid;" />

</fieldset>
		</div>
		
		
	</form>
<hr class="mx-n3">
<div class="text-right pt-1">
	<button class="btn btn-sm btn-flat btn-light bg-gradient-light border" type="button" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
</div>

<script>
	$(document).ready(function(){
		$('.delete_data').click(function(){
			_conf("Are you sure to delete this product permanently?","delete_product",[$(this).attr('data-id')])
		})
		$('#create_new').click(function(){
			uni_modal("<i class='far fa-plus-square'></i> Add Report","products/manage_product.php")
		})
		$('action-data2').click(function(){
			uni_modal("<i class='far fa-plus-square'></i> Import Data Fron Excel","bulkupload/index.php")
		})
		$('.edit-data').click(function(){
			uni_modal("<i class='fa fa-edit'></i> Add Report","products/manage_product.php?id="+$(this).attr('data-id'))
		})
		$('.view-data').click(function(){
			uni_modal("<i class='fa fa-th-list'></i> View Report ","products/view_product.php?id="+$(this).attr('data-id'))
		})
		$('.table').dataTable({
			columnDefs: [
					{ orderable: false, targets: [5] }
			],
			order:[0,'asc']
		});
		$('.dataTable td,.dataTable th').addClass('py-1 px-2 align-middle')
	})
	function delete_product($id){
		start_loader();
		$.ajax({
			url:_base_url_+"classes/Master.php?f=delete_product",
			method:"POST",
			data:{id: $id},
			dataType:"json",
			error:err=>{
				console.log(err)
				alert_toast("An error occured.",'error');
				end_loader();
			},
			success:function(resp){
				if(typeof resp== 'object' && resp.status == 'success'){
					location.reload();
				}else{
					alert_toast("An error occured.",'error');
					end_loader();
				}
			}
		})
	}
</script>















<div class="container-fluid">
	
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