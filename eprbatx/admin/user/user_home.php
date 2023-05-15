<style>
  #system-cover{
    width:100%;
    height:45em;
    object-fit:cover;
    object-position:center center;
  }
</style>
<h2 class="">Welcome, <?php echo $_settings->userdata('firstname')." ".$_settings->userdata('lastname') ?>!</h2>
<hr>
<div class="row">
<div class="col-12 col-sm-4 col-md-4">
    <div class="info-box">
      <span class="info-box-icon bg-gradient-light elevation-1"><i class="fas fa-th-list"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Active Clients</span>
       
        <span class="info-box-number text-right h5">
          <?php 
            $category = $conn->query("SELECT * FROM product_list where delete_flag = 0 and `status` = 1")->num_rows;
            echo format_num($category);
          ?>
          <?php ?>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <div class="col-12 col-sm-4 col-md-4">
    <div class="info-box">
      <span class="info-box-icon bg-gradient-light elevation-1"><i class=" fas fa-paper-plane	"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Recycling Capacity Financial Year </span>

        <span class="info-box-number text-right h5">
          <?php 
            $category = $conn->query("SELECT * FROM product_list where delete_flag = 0 and `status` = 1")->num_rows;
            echo format_num($category);
          ?>
          <?php ?>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <div class="col-12 col-sm-4 col-md-4">
    <div class="info-box">
      <span class="info-box-icon bg-gradient-light elevation-1"><i class="fas fa-poll	"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Battery Source </span>       
        <span class="info-box-number text-right h5">
          <?php 
            $category = $conn->query("SELECT * FROM product_list where delete_flag = 0 and `status` = 1")->num_rows;
            echo format_num($category);
          ?>
          <?php ?>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>

  <!-- /.col -->
  <div class="container card ">
	<div class="card-header">
		<h3 class="card-title">Report </h3>
		
	</div>
	<div class="card-body">
        <div class="container-fluid">
			<table class="table table-hover table-striped table-bordered" id="list">
				<colgroup>
					<col width="10%">
					<col width="20%">
					<col width="20%">
					<col width="20%">
					<col width="15%">
          <col width="15%">
          <col width="10%">
				</colgroup>
				<thead>
					<tr>
						<th>#ID</th>
						<th>Client Name</th>
						<th>Battery Source</th>
						<th>No. Of Certificate </th>
						<th>Account Type</th>
						<th>Action</th>
            <th>View</th>
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
							<td class="text-left">Raj Kumar</td>
							<td class="text-left"><?= $row['cell_lot'] ?></td>
							<td class="text-left"><?= $row['category'] ?></td>
						
							<td><?php echo date("Y-m-d",strtotime($row['created_at'])) ?></td>
							
							<td align="center">
								 <button type="button" class="btn btn-flat p-1 btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
				                  		Action
				                    <span class="sr-only">Toggle Dropdown</span>
				                  </button>
				                  <div class="dropdown-menu" role="menu">
				                    
				                    <div class="dropdown-divider"></div>
				                    <a class="dropdown-item edit-data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><span class="fa fa-edit text-primary"></span> Edit</a>
				                    <div class="dropdown-divider"></div>
				                    <a class="dropdown-item delete_data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><span class="fa fa-trash text-danger"></span> Delete</a>
				                  </div>
							</td>
              <td><a class="dropdown-item view-data1" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><span class="fa fa-eye text-dark"></span> View</a></td>
						</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
  <!-- /.col -->

  <!-- /.col -->
</div>
<div class="container-fluid text-center">
  <!-- /.col <img src="<?= validate_image($_settings->info('cover')) ?>" alt="system-cover" id="system-cover" class="img-fluid">-->
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
		$('.view-data1').click(function(){
			uni_modal("<i class='fa fa-th-list'></i> View Client Report ","user/view_records.php?id="+$(this).attr('data-id'))
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