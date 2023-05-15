<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>
<style>
	.product-img{
		width:3em;
		height:3em;
		object-fit:cover;
		object-position:center center;
	}
</style>
<div class="card card-outline rounded-0 card-teal">
	<div class="card-header">
		<h3 class="card-title">List of Year</h3>
		<div class="card-tools">
			<a href="javascript:void(0)" id="create_new1" class="btn btn-flat btn-primary"><span class="fas fa-plus-square"></span>  Add New</a>
		</div>
	</div>
	<div class="card-body">
        <div class="container-fluid">
			<table class="table table-hover table-striped table-bordered" id="list">
				<colgroup>
					<col width="10%">
					<col width="15%">
					<col width="15%">
					<col width="15%">
					<col width="15%">
					<col width="15%">
					<col width="15%">
				</colgroup>
				<thead>
					<tr>
						<th>Auth</th>
						<th>Weight</th>
						<th>Cell-Lot</th>
						<th>Category Type</th>
						<th>Refurbish</th>
						<th>Recycle</th>
						<th>Year</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$i = 1;
						$qry = $conn->query("SELECT * from `epr` ");
						while($row = $qry->fetch_assoc()):
					?>
						<tr>
							<td class="text-center"><?php echo $i++; ?></td>							
							<td class=""><?= $row['weight'] ?></td>
							<td class="text-left"><?= $row['celllot'] ?></td>
							<td class="text-left"><?= $row['category'] ?></td>
							<td class="text-left"><?= $row['refurbished'] ?> | 
							<a class="view-data1" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"> View</a>
							</td>
							<td class="text-left"><?= $row['recycle'] ?> | 
							<a class="view-data1" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"> View</a></td>
							<td class="text-left"><?= $row['year'] ?> 
						</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		$('.delete_data').click(function(){
			_conf("Are you sure to delete this product permanently?","delete_product",[$(this).attr('data-id')])
		})
		$('#create_new1').click(function(){
			uni_modal("<i class='far fa-plus-square'></i> Add New Product ","records/manage_records.php")
		})
		$('.edit-data').click(function(){
			uni_modal("<i class='fa fa-edit'></i> Add New Product ","products/manage_product.php?id="+$(this).attr('data-id'))
		})
		$('.view-data1').click(function(){
			uni_modal("<i class='fa fa-th-list'></i> View Details ","records/view_records.php?id="+$(this).attr('data-id'))
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