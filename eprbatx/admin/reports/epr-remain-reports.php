<?php 
$month = isset($_GET['month']) ? $_GET['month'] : date("Y-m");
?>
<div class="content py-5 px-3 bg-gradient-teal">
    <h2>EPR Remaining Target</h2>
</div>
<div class="row flex-column mt-4 justify-content-center align-items-center mt-lg-n4 mt-md-3 mt-sm-0">
    <div class="col-lg-11 col-md-11 col-sm-12 col-xs-12">
        <div class="card rounded-0 mb-2 shadow">
            <div class="card-body">
                <fieldset>
                    <legend>Filter</legend>
                    <form action="" id="filter-form">
                        <div class="row align-items-end">
                            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="month" class="control-label">Choose Year</label>
                                    <input type="month" class="form-control form-control-sm rounded-0" name="month" id="month" value="<?= $month ?>" required="required">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <button class="btn btn-sm btn-flat btn-primary"><i class="fa fa-filter"></i> Filter</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </fieldset>
            </div>
        </div>
    </div>
    <div class="col-lg-11 col-md-11 col-sm-12 col-xs-12">
        <div class="card rounded-0 mb-2 shadow">
            <div class="card-header py-1">
                <div class="card-tools">
                    <button class="btn btn-flat btn-sm btn-light bg-gradient-light border text-dark" type="button" id="print"><i class="fa fa-print"></i> Print</button>
                </div>
            </div>
            <div class="card-body">
                <div class="container-fluid" id="printout">
                    <div class="table-responsive">
                        <table class="table table-bordered table-stripped table-sm">
                            <!-- <colgroup>
                                <col width="10%">
                                <col width="15%">
                                <col width="30%">
                                <col width="15%">
                                <col width="30%">
                            </colgroup> -->
                            <thead>
                                <tr class="bg-gradient-teal">
                                   
                                    <th class="px-1 py-1 text-left">Sales Year (Fixed)</th>
                                    <th class="px-1 py-1 text-left">QTY</th>
                                    <th class="px-1 py-1 text-left">Collection Target Year (Fixed)</th>
                                    <th class="px-1 py-1 text-left">Collection Target % (Fixed)</th>
                                    <th class="px-1 py-1 text-left">Est. Target</th>
                                    <th class="px-1 py-1 text-left">Category</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <tr>
                                    <td class="px-1 py-1  text-left">2017-18</td>
                                    <td class="px-1 py-1 text-left">100</td>
                                    <td class="text-left">2022-23</td>
                                    <td class="text-left">50%</td>
                                    <td class="px-1 py-1 text-left">50</td>
                                    <td class="px-1 py-1 text-left">For Portable Batteries Used in Consumer Electronics</td>
                                    
                                </tr>
                                <tr>
                                    <td class="px-1 py-1  text-left">2017-18</td>
                                    <td class="px-1 py-1 text-left">100</td>
                                    <td class="text-left">2022-23</td>
                                    <td class="text-left">70%</td>
                                    <td class="px-1 py-1 text-left">70</td>
                                    <td class="px-1 py-1 text-left">For Portable Batteries Used in Consumer Electronics</td>
                                    
                                </tr>
                                <tr>
                                    <td class="px-1 py-1  text-left">2017-18</td>
                                    <td class="px-1 py-1 text-left">100</td>
                                    <td class="text-left">2022-23</td>
                                    <td class="text-left">70%</td>
                                    <td class="px-1 py-1 text-left">70</td>
                                    <td class="px-1 py-1 text-left">For Portable Batteries Used in Consumer Electronics</td>
                                    
                                </tr>
                                
                            </tbody>
                            <tfoot>
                                <tr class="bg-gradient-secondary">
                                    <th class="py-1 text-center" colspan="5">Target Remaining</th>
                                    <th class="py-1 text-right font-weight-bold"></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<noscript id="print-header">
    <div>
        <style>
            html{
                min-height:unset !important;
            }
        </style>
        <div class="d-flex w-100 align-items-center">
            <div class="col-2 text-center">
                <img src="<?= validate_image($_settings->info('logo')) ?>" alt="" class="rounded-circle border" style="width: 5em;height: 5em;object-fit:cover;object-position:center center">
            </div>
            <div class="col-8">
                <div style="line-height:1em">
                    <div class="text-center font-weight-bold h5 mb-0"><large><?= $_settings->info('name') ?></large></div>
                    <div class="text-center font-weight-bold h5 mb-0"><large>Monthly Sales Report</large></div>
                    <div class="text-center font-weight-bold h5 mb-0">as of <?= date("F Y", strtotime($month."-01")) ?></div>
                </div>
            </div>
        </div>
        <hr>
    </div>
</noscript>
<script>
    function print_r(){
        var h = $('head').clone()
        var el = $('#printout').clone()
        var ph = $($('noscript#print-header').html()).clone()
        el.find('tr.bg-gradient-teal').removeClass('bg-gradient-teal')
        el.find('tr.bg-gradient-secondary').removeClass('bg-gradient-secondary')
        h.find('title').text("Monthly Sales Report - Print View")
        var nw = window.open("", "_blank", "width="+($(window).width() * .8)+",left="+($(window).width() * .1)+",height="+($(window).height() * .8)+",top="+($(window).height() * .1))
            nw.document.querySelector('head').innerHTML = h.html()
            nw.document.querySelector('body').innerHTML = ph[0].outerHTML
            nw.document.querySelector('body').innerHTML += el[0].outerHTML
            nw.document.close()
            start_loader()
            setTimeout(() => {
                nw.print()
                setTimeout(() => {
                    nw.close()
                    end_loader()
                }, 200);
            }, 300);
    }
    $(function(){
        $('#filter-form').submit(function(e){
            e.preventDefault()
            location.href = './?page=reports/sales&'+$(this).serialize()
        })
        $('#print').click(function(){
            print_r()
        })

    })
</script>