<?php
require_once('./../../config.php');
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * from `epr` where id = '{$_GET['id']}' and delete_flag = 0 ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $k=$v;
        }
    }else{
		echo '<script>alert("Product ID is not valid."); location.replace("./?page=view_records")</script>';
	}
}else{
	echo '<script>alert("Product ID is Required."); location.replace("./?page=view_records")</script>';
}
?>

<div class="container-fluid">
	<dl>
		<dt class="text-muted">EPR</dt>
		<dd class="pl-4"><?= isset($code) ? $code : "" ?></dd>
		<dt class="text-muted">Cel Lot</dt>
		<dd class="pl-4"><?= isset($cellot) ? $celllot : "" ?></dd>
		<dt class="text-muted">Description</dt>
		<dd class="pl-4"><?= isset($date) ? str_replace(["\n\r", "\n", "\r"],"<br>", htmlspecialchars_decode($date)) : '' ?></dd>
		<dt class="text-muted">Status</dt>
		<dd class="pl-4">
			<?php if($status == 1): ?>
				<span class="badge badge-success px-3 rounded-pill">Active</span>
			<?php else: ?>
				<span class="badge badge-danger px-3 rounded-pill">Inactive</span>
			<?php endif; ?>
		</dd>
	</dl>
</div>
<hr class="mx-n3">
<div class="text-right pt-1">
	<button class="btn btn-sm btn-flat btn-light bg-gradient-light border" type="button" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
</div>