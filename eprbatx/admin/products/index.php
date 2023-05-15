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
		<h3 class="card-title">Battery Procurement </h3>
		<div class="card-tools">
			<a href="javascript:void(0)" id="create_new1" class="btn btn-flat btn-primary"><span class="fas fa-plus-square"></span>  Upload Excel</a>
		</div>
		<div class="card-tools">
			<a href="javascript:void(0)" id="create_new" class="btn btn-flat btn-primary"><span class="fas fa-plus-square"></span>  Add Report</a>
		</div>
	</div>
	<div class="card-body">
        <div class="container-fluid">
			<table class="table table-hover table-striped table-bordered" id="list">
				<colgroup>
					<col width="5%">
					<col width="5%">
					<col width="10%">
					<col width="15%">
					<col width="10%">
					<col width="10%">
					<col width="10%">
				</colgroup>
				<thead>
					<tr>
						<th>#</th>
						<th>Weight</th>
						<th>Cell - Lot</th>
						<th>Category Type</th>
						<th>Code</th>
						<th>Refurbished </th>
						<th>Recycle </th>
						<th>Year </th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$i = 1;
						$qry = $conn->query("SELECT * from `product_list` where delete_flag = 0 order by `id` asc ");
						while($row = $qry->fetch_assoc()):
					?>
						<tr>
							<td class="text-center"><?php echo $i++; ?></td>							
							<td class="text-left"><?= format_num($row['weight']) ?></td>
							<td class="text-left"><?= $row['cell_lot'] ?></td>
							<td class="text-left"><?= $row['category'] ?></td>
							<td class="text-left"><?= $row['code'] ?></td>
							<td class="text-left"><?= $row['refurbished'] ?> | <a class=" view-data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"> View</a></td>
							<td class="text-left"><?= $row['recycle'] ?> | <a class=" view-data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"> View</a></td>
							<td><?php echo date("Y-m-d H:i",strtotime($row['created_at'])) ?></td>
							
							<td align="center">
								 <button type="button" class="btn btn-flat p-1 btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
				                  		Action
				                    <span class="sr-only">Toggle Dropdown</span>
				                  </button>
				                  <div class="dropdown-menu" role="menu">
				                    <a class="dropdown-item view-data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><span class="fa fa-eye text-dark"></span> View</a>
				                    <div class="dropdown-divider"></div>
				                    <a class="dropdown-item edit-data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><span class="fa fa-edit text-primary"></span> Edit</a>
				                    <div class="dropdown-divider"></div>
				                    <a class="dropdown-item delete_data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><span class="fa fa-trash text-danger"></span> Delete</a>
				                  </div>
								  
							</td>
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
		$('#create_new').click(function(){
			uni_modal("<i class='far fa-plus-square'></i> Add Report","products/manage_product.php")
		})
		$('#create_new1').click(function(){
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