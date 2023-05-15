<?php
require_once('./../../config.php');
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * from `product_list` where id = '{$_GET['id']}' and delete_flag = 0 ");
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

<div class="container">
	<dl>
		<dt class="text-muted">Client ID - <?= isset($code) ? $code : "3" ?> Client Name - <?= isset($code) ? $code : "ABC" ?></dt>
		<dd class="pl-4"><?= isset($code) ? $code : "" ?></dd>
		<dt class="text-muted">Battery Source</dt>
		<dd class="pl-4"><?= isset($cellot) ? $celllot : "" ?></dd>
		<dt class="text-muted">Certificate - 12</dt>
		<dd class="pl-4"><?= isset($date) ? str_replace(["\n\r", "\n", "\r"],"<br>", htmlspecialchars_decode($date)) : '' ?></dd>
		<dt class="text-muted">Status - Active</dt>
		
	</dl>
	<div class="card card-outline rounded-0 card-teal">
	<div class="card-header">
		<h3 class="card-title">List of Users</h3>
	
	</div>
	<div class="">
        <div class="container-fluid">
			<table class="table table-hover table-striped table-bordered" id="list">
				<colgroup>
					<col width="5%">
					<col width="15%">
					<col width="15%">
					<col width="10%">
					<col width="15%">					
				
				</colgroup>
				<thead>
					<tr>
						<th>#ID</th>		
						<th>Date</th>
						<th>Invoice No.</th>						
						<th>Battery Resource</th>
						<th>Recycled / Certificate</th>
						
					</tr>
				</thead>
				<tbody>
					<?php 
					$i = 1;
						$qry = $conn->query("SELECT *, concat(firstname,' ', coalesce(concat(middlename,' '), '') , lastname) as `name` from `users` where id != '{$_settings->userdata('id')}' order by concat(firstname,' ', lastname) asc ");
						while($row = $qry->fetch_assoc()):
					?>  
						<tr>
							<td class="text-center"><?php echo $i++; ?></td>
							
							
							<td><?php echo $row['name'] ?></td>
							<td><?php echo $row['username'] ?></td>
							<td><?php echo $row['mobile'] ?></td>						
							<td><?php echo $row['mobile'] ?></td>
							<td><a href="./?page=user/certificate" target="_blank"> Download</a></td>
							<td><a href="./?page=user/user_home&id=<?= $row['id'] ?>">Edit </a><a href="./?page=user/user_home&id=<?= $row['id'] ?>">View </a></td>
		
							
						</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
</div>
<hr class="mx-n3">
<div class="text-right pt-1">
	<button class="btn btn-sm btn-flat btn-light bg-gradient-light border" type="button" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
</div>