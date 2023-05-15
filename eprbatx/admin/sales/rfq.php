<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>
<style>
	.sale-img{
		width:3em;
		height:3em;
		object-fit:cover;
		object-position:center center;
	}
</style>
<div class="card card-outline rounded-0 card-teal">
	<div class="card-header">
		<h3 class="card-title">RFQ Request</h3>
		<div class="card-tools">
			<a href="<?= base_url."?page=sales/manage_sale" ?>" class="btn btn-flat btn-primary"><span class="fas fa-plus-square"></span>  Add New</a>
		</div>
	</div>
	<div class="card-body">
        <div class="container-fluid">
			<table class="table table-hover table-striped table-bordered" id="list">
				<colgroup>
					<col width="5%">
					<col width="10%">
					<col width="15%">
					<col width="15%">
					<col width="15%">
					<col width="5%">
				</colgroup>
				<thead>
					<tr>
						<th>#</th>
						<th>Invoice No.</th>
						<th>Authorize Person</th>
						<th>Issue Date</th>
						<th>Action</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$i = 1;
						$qry = $conn->query("SELECT *, COALESCE((SELECT CONCAT(`code`, ' ', `name`) as `client` FROM `client_list` where `client_list`.`id` = `sales`.`client_id`), 'GUEST') as `client_name` from `sales` where delete_flag = 0 order by abs(unix_timestamp(`created_at`)) desc ");
						while($row = $qry->fetch_assoc()):
					?>
							<tr>
							<td class="text-center"><?php echo $i++; ?></td>
							<td><?php echo date("Y-Y",strtotime($row['created_at'])) ?></td>
							<td class=""><?= ($row['invoice_code']) ?></td>
							<td class=""><?= strtoupper($row['client_name']) ?></td>
							<td align="center">
								 <button type="button" class="btn btn-flat p-1 btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
				                  		Action
				                    <span class="sr-only">Toggle Dropdown</span>
				                  </button>
				                  <div class="dropdown-menu" role="menu">
				                    <a class="dropdown-item view-data" href="<?php echo base_url."admin/?page=sales/view_sales&id=". $row['id'] ?>"><span class="fa fa-eye text-dark"></span> View</a>
				                    <div class="dropdown-divider"></div>
				                    <a class="dropdown-item edit-data" href="<?php echo base_url."admin/?page=sales/manage_sale&id=". $row['id'] ?>"><span class="fa fa-edit text-primary"></span> Edit</a>
				                    <div class="dropdown-divider"></div>
				                    <a class="dropdown-item delete_data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><span class="fa fa-trash text-danger"></span> Delete</a>
				                  </div>
							</td>
							<td class="text-right"><?= format_num($row['total']) ?></td>
							
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
			_conf("Are you sure to delete this sale permanently?","delete_sale",[$(this).attr('data-id')])
		})
	
		$('.table').dataTable({
			columnDefs: [
					{ orderable: false, targets: [5] }
			],
			order:[0,'asc']
		});
		$('.dataTable td,.dataTable th').addClass('py-1 px-2 align-middle')
	})
	function delete_sale($id){
		start_loader();
		$.ajax({
			url:_base_url_+"classes/Master.php?f=delete_sale",
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