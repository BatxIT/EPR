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
	.modal-dialog {
  width: 1000px!important;
  
}
@media (min-width: 576px)
.modal-dialog {
  max-width: 1000px!important;
  margin: 1.75rem auto;
}
</style>
<div class="card card-outline rounded-0 card-teal">
	<div class="card-header">
		<h3 class="card-title">Purchase </h3>
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
			<input type="text" name="text" placeholder="Min"> To <input type="text" name="text" placeholder="Max"> <button>Go</button> &nbsp; <select class="form-select form-select-sm" aria-label=".form-select-sm example">
  <option selected>Short By Date</option>
  <option value="1">Assending</option>
  <option value="2">Decending</option>

</select>
				<colgroup>
					<col width="5%">
					<col width="15%">
					<col width="10%">
					<col width="10%">					
					<col width="10%">
					<col width="15%">
					<col width="15%">
					<col width="5%">
					<col width="5%">
				</colgroup>
				<thead>
					<tr>
						<th>#ID</th>
						<th>ClientName </th>
						<th>Invoice No.</th>
						<th>Cell Lot</th>						
						<th>Weight</th>	
						<th>Pickup Date</th>						
						<th>Pickup Date Transport </th>
						<th>Records </th>
						
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
							<td class="text-center">ID</td>							
							<td class="text-left">ABC Company</td>
							<td class="text-left">INC001</td>							
							<td class="text-left">TACO-001</td>		
							<td class="text-left">50KG</td>						
							<td class="text-left">2022-03-02</td>
							<td class="text-left">2022-03-02</td>	
							<td class="text-left"><a class="dropdown-item action-initiate" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>">View</a></td>											
							<td align="center">
							<a class="dropdown-item action-data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><span class="fa text-primary"></span> Action</a>
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
		$('.action-initiate').click(function(){
			uni_modal("<i class='far fa-plus-square'></i> Initiated  Fron Excel","products/initiate.php")
		})
		$('.edit-data').click(function(){
			uni_modal("<i class='fa fa-edit'></i> Add Report","products/manage_product.php?id="+$(this).attr('data-id'))
		})
		$('.action-data').click(function(){
			uni_modal("<i class='fa fa-edit'></i> Action From ","products/lot_create.php?id="+$(this).attr('data-id'))
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