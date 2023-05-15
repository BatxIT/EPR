<?php
require_once('./../../config.php');
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * from `client_list` where id = '{$_GET['id']}' and delete_flag = 0 ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
    }else{
		echo '<script>alert("Client ID is not valid."); location.replace("./?page=clients")</script>';
	}
}else{
	echo '<script>alert("Client ID is Required."); location.replace("./?page=clients")</script>';
}
?>
<style>
	#uni_modal .modal-footer{
		display:none;
	}
</style>
<div class="container-fluid">
	<dl>
		<dt class="text-muted">Code</dt>
		<dd class="pl-4"><?= isset($code) ? $code : "" ?></dd>
		<dt class="text-muted">Name</dt>
		<dd class="pl-4"><?= isset($name) ? $name : "" ?></dd>
		<dt class="text-muted">Contact #</dt>
		<dd class="pl-4"><?= isset($contact) ? $contact : '' ?></dd>
		<dt class="text-muted">Status</dt>
		<dd class="pl-4">
		<?php if($status == 2): ?>
				<span class="badge badge-success px-3 rounded-pill">Onboarding</span>	
		<?php elseif($status == 1): ?>
				<span class="badge badge-success px-3 rounded-pill">Active</span>
			<?php else: ?>
				<span class="badge badge-danger px-3 rounded-pill">Inactive</span>
			<?php endif; ?>
		</dd>
		<form action="" id="client-form">
		<div class="form-group">
			<label for="name" class="control-label">Upload GST No.</label>
			<input type="text" name="name" id="name" class="form-control form-control-sm rounded-0" value="<?php echo isset($name) ? $name : ''; ?>"  required/>
		</div>
		<div class="form-group">
			<label for="name" class="control-label">Pan No.</label>
			<input type="text" name="name" id="name" class="form-control form-control-sm rounded-0" value="<?php echo isset($name) ? $name : ''; ?>"  required/>
		</div>
		<hr>
		<div class="form-group">
			<label for="name" class="control-label">Bank Name</label>
			<input type="text" name="name" id="name" class="form-control form-control-sm rounded-0" value="<?php echo isset($name) ? $name : ''; ?>"  required/>
		</div>
		<div class="form-group">
			<label for="name" class="control-label">Bank A/c. No.</label>
			<input type="text" name="name" id="name" class="form-control form-control-sm rounded-0" value="<?php echo isset($name) ? $name : ''; ?>"  required/>
		</div>
		<div class="form-group">
			<label for="name" class="control-label">Beneficiary Name</label>
			<input type="text" name="name" id="name" class="form-control form-control-sm rounded-0" value="<?php echo isset($name) ? $name : ''; ?>"  required/>
		</div>
		<div class="form-group">
			<label for="name" class="control-label">IFSC Code</label>
			<input type="text" name="name" id="name" class="form-control form-control-sm rounded-0" value="<?php echo isset($name) ? $name : ''; ?>"  required/>
		</div>
		<div class="form-group">
			<label for="name" class="control-label">Bank Address</label>
			<input type="text" name="name" id="name" class="form-control form-control-sm rounded-0" value="<?php echo isset($name) ? $name : ''; ?>"  required/>
		</div>
		</form>
	</dl>
</div>
<hr class="mx-n3">

<div class="text-right pt-1">
<button class="btn btn-sm btn-flat btn-light bg-gradient-light border" >Submit</button><button class="btn btn-sm btn-flat btn-light bg-gradient-light border" type="button" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
</div>