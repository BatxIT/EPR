
<style>
  .sidebar a.nav-link.active{
    color:#fff !important
  }
</style>
<!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-light-teal navbar-light elevation-4 sidebar-no-expand">
        <!-- Brand Logo -->
        <a href="<?php echo base_url ?>admin" class="brand-link bg-teal text-sm">
        <img src="<?php echo validate_image($_settings->info('logo'))?>" alt="Store Logo" class="brand-image img-circle elevation-3" style="opacity: .8;width: 1.5rem;height: 1.5rem;max-height: unset">
        <span class="brand-text font-weight-light"><?php echo $_settings->info('short_name') ?></span>
        </a>
        <!-- Sidebar -->
        <div class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-transition os-host-scrollbar-horizontal-hidden">
          <div class="os-resize-observer-host observed">
            <div class="os-resize-observer" style="left: 0px; right: auto;"></div>
          </div>
          <div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;">
            <div class="os-resize-observer"></div>
          </div>
          <div class="os-content-glue" style="margin: 0px -8px; width: 249px; height: 646px;"></div>
          <div class="os-padding">
            <div class="os-viewport os-viewport-native-scrollbars-invisible" style="overflow-y: scroll;">
              <div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;">
                <!-- Sidebar user panel (optional) -->
                <div class="clearfix"></div>
                <!-- Sidebar Menu -->
                <nav class="mt-1">
                   <ul class="nav nav-pills nav-sidebar flex-column text-sm nav-compact nav-flat nav-child-indent nav-collapse-hide-child" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item dropdown">
                      <a href="./" class="nav-link nav-home">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                          Dashboard
                        </p>
                      </a>
                    </li> 
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                        Battery Procurement
                          <i class="right fas fa-angle-left"></i>
                        </p>
                      </a>
                      <ul class="nav nav-treeview" style="display: none;">                      
                      <li class="nav-item dropdown">
                      <a href="./?page=products" class="nav-link nav-products">
                        <i class="nav-icon fas fa-battery-half"></i>
                        <p>
                          Battery Procurement
                        </p>
                      </a>
                    </li> 
                    <li class="nav-item dropdown">
                      <a href="./?page=products/procurement" class="nav-link nav-products">
                        <i class="nav-icon fas fa-infinity"></i>
                        <p>
                           Procurement
                        </p>
                      </a>
                    </li> 
                    <li class="nav-item dropdown">
                      <a href="./?page=products/purchase" class="nav-link nav-products">
                        <i class="nav-icon fas fa-hand-holding"></i>
                        <p>
                           Purchase
                        </p>
                      </a>
                    </li> 
                      </ul>
                    </li>     

                    
                    <li class="nav-item dropdown">
                      <a href="./?page=clients" class="nav-link nav-clients">
                        <i class="nav-icon fas fa-user-friends"></i>
                        <p>
                          Client List
                        </p>
                      </a>
                    </li> 
                    <li class="nav-item dropdown">
                      <a href="./?page=sales/rfq" class="nav-link nav-products">
                        <i class="nav-icon far fa-file-alt"></i>
                        <p>RFQ (Request for Quotation)
                        </p>
                      </a>
                    </li> 
                    
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book-reader	"></i>
                        <p>
                          EPR Compliance
                          <i class="right fas fa-angle-left"></i>
                        </p>
                      </a>
                      <ul class="nav nav-treeview" style="display: none;">
                      
                        <li class="nav-item">
                          <a href="./?page=compliance/audit" class="nav-link tree-item ">
                            <i class="far fa-circle nav-icon"></i>
                            <p>EPR Audit</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="./?page=compliance/compliance" class="nav-link tree-item nav-reports_sales">
                            <i class="far fa-circle nav-icon"></i>
                            <p>EPR Complince </p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="./?page=compliance/return-filing" class="nav-link tree-item nav-reports_sales">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Return Filing</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="./?page=compliance/certificate" class="nav-link tree-item nav-reports_sales">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Refurbishing Certificate</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="./?page=compliance/recycler" class="nav-link tree-item nav-reports_sales">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Recycler</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="./?page=compliance/e-waste" class="nav-link tree-item nav-reports_sales">
                            <i class="far fa-circle nav-icon"></i>
                            <p>E waste </p>
                          </a>
                        </li>
                      </ul>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                          EPR Reports
                          <i class="right fas fa-angle-left"></i>
                        </p>
                      </a>
                      <ul class="nav nav-treeview" style="display: none;">                      
                        <li class="nav-item">
                          <a href="./?page=reports/sales" class="nav-link tree-item nav-reports_sales">
                            <i class="far fa-circle nav-icon"></i>
                            <p>EPR Target Issued</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="./?page=reports/epr-reports" class="nav-link tree-item nav-reports_sales">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Target Achived </p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="./?page=reports/epr-remain-reports" class="nav-link tree-item nav-reports_sales">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Target Remaining </p>
                          </a>
                        </li>
                      </ul>
                    </li>                    
                    
                    <?php if($_settings->userdata('type') == 1): ?>
                    
                      <li class="nav-item dropdown">
                      <a href="./?page=epr/epr-data" class="nav-link nav-products">
                        <i class="nav-icon fab fa-elementor	"></i>
                        <p>
                          EPR Data 
                        </p>
                      </a>
                    </li>   
                    <li class="nav-header">Maintenance</li>
                    <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>admin/?page=user/list" class="nav-link nav-user_list">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>
                          User List
                        </p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-tools"></i>
                        <p>
                          EPR Target Settings
                          <i class="right fas fa-angle-left"></i>
                        </p>
                      </a>
                      <ul class="nav nav-treeview" style="display: none;">
                      
                        <li class="nav-item">
                          <a href="./?page=system_info/epr_target" class="nav-link tree-item ">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Target Year FY</p>
                          </a>
                        </li>
                       
                        <li class="nav-item">
                          <a href="./?page=system_info/extraction" class="nav-link tree-item nav-reports_sales">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Target Extraction FY</p>
                          </a>
                        </li>
                        
                      </ul>
                    </li>

                    <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>admin/?page=system_info" class="nav-link nav-system_info">
                        <i class="nav-icon fas fa-tools"></i>
                        <p>
                          System Information
                        </p>
                      </a>
                    </li>
                    <?php endif; ?>
                  </ul>
                </nav>
                <!-- /.sidebar-menu -->
              </div>
            </div>
          </div>
          <div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden">
            <div class="os-scrollbar-track">
              <div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div>
            </div>
          </div>
          <div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden">
            <div class="os-scrollbar-track">
              <div class="os-scrollbar-handle" style="height: 55.017%; transform: translate(0px, 0px);"></div>
            </div>
          </div>
          <div class="os-scrollbar-corner"></div>
        </div>
        <!-- /.sidebar -->
      </aside>
      <script>
    $(document).ready(function(){
      var page = '<?php echo isset($_GET['page']) ? $_GET['page'] : 'home' ?>';
      page = page.replace(/\//g,'_');
      console.log(page, $('.nav-link.nav-'+page)[0])
      if($('.nav-link.nav-'+page).length > 0){
             $('.nav-link.nav-'+page).addClass('active')
        if($('.nav-link.nav-'+page).hasClass('tree-item') == true){
            $('.nav-link.nav-'+page).addClass('active')
          $('.nav-link.nav-'+page).closest('.nav-treeview').parent().addClass('menu-open')
        }
        if($('.nav-link.nav-'+page).hasClass('nav-is-tree') == true){
          $('.nav-link.nav-'+page).parent().addClass('menu-open')
        }

      }
      $('.nav-link.active').addClass('bg-gradient-teal')
    })
  </script>