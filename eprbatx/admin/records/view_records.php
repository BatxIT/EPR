<?php
require_once('./../../config.php');
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * from `epr` where id = '{$_GET['id']}'");
    if($qry->num_rows > 0){
        foreach($qry as $value){
            echo "Code is Avialable Here <br> ";			
        }
    }else{
	echo '<script>alert("Value is Required."); location.replace("./?page=view_records")</script>';
	}
}else{
	echo '<script>alert("Product ID is Required."); location.replace("./?page=view_records")</script>';
}
?>
<style>
	#uni_modal .modal-footer{
		display:none;
	}
</style>

<div class="container-fluid">
	
	<dl><h6>Refurbished : -</h6>
		<dt class="text-muted">EPR Year</dt>
		<dd class="pl-4"><?= isset($code) ? $code : "" ?> </dd>
		<dt class="text-muted">Target Achive</dt>
		<dd class="pl-4"><?= isset($name) ? $name : "" ?></dd>
		<dt class="text-muted">Code</dt>
		<dd class="pl-4"><?= isset($code) ? str_replace(["\n\r", "\n", "\r"],"<br>", htmlspecialchars_decode($code)) : '' ?></dd>
		<dt class="text-muted">Date </dt>
		
	</dl>
</div>
<hr class="mx-n3">
<div class="text-right pt-1">
	<button class="btn btn-sm btn-flat btn-light bg-gradient-light border" type="button" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
</div>
