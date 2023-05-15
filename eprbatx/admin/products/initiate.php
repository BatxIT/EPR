
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
            <h3 class="card-title">Initiate </h3>
           
        </div>
        <div class="card-body">
            <div class="container-fluid">
                <table class="table table-hover table-striped table-bordered" id="list">
               
    </select>
                    <colgroup>
                        <col width="5%">
                        <col width="15%">
                        <col width="10%">
                        <col width="10%">					
                        <col width="10%">
                        <col width="15%">
                        <col width="5%">
                        <col width="5%">
                        <col width="5%">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Weight </th>
                            <th>Lot No.</th>
                            <th>Cell No.</th>
                            <th>Category</th>	
                            <th>Code</th>						
                            <th>Refurbished</th>
                            <th>Recycle </th>
                            <th>Status </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                                                   <tr>
                                <td class="text-center">ID</td>							
                                <td class="text-left">150KG</td>
                                <td class="text-left">TACO-001</td>		
                                <td class="text-left">-001</td>							
                                <td class="text-left">LFP </td>						
                                <td class="text-left">4950430485305830</td>
                                <td class="text-left">N/A</td>
                                <td class="text-left">N/A</td>	
                               		
                                <td><a class="dropdown-item action-data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><span class="fa fa-view text-primary"></span> View</a>
                                </td>							
                                <td align="center">
                                <a class="dropdown-item" href="javascript:void(0)" data-id="">Initiate</a>
                                </td>
                            </tr>
                    
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