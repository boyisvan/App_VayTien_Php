<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" id="menuid" data-widget="pushmenu" href="javascript:void(0)" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?=BASE_URL('');?>" class="nav-link">HOME</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="https://www.facebook.com/" target="_blank" class="nav-link">LIÊN HỆ</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="https://zalo.me/" target="_blank" class="nav-link">HỖ TRỢ ZALO</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?=BASE_URL('Admin/Home');?>" class="brand-link">
                <img src="<?=BASE_URL('template/');?>dist/img/AdminLTELogo.png" alt="<?=$PNH->site('tenweb');?>"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light"><?=$getUser['fullname'];?></span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?=BASE_URL('template/');?>dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                            alt="CMSNT">
                    </div>
                    <div class="info">
                        <a href="<?=BASE_URL('Admin/Home');?>" class="d-block"><?=$getUser['username'];?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
						
                       <?php if($my_level == 'admin'): ?>
                      <li class="nav-item has-treeview menu-open">
                            <a href="<?=BASE_URL('Admin/Home');?>" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>   
                       <?php endif; ?>
                      
                      <li class="nav-header">Chăm sóc khách hàng</li>
                       <?php if(!empty($getUser['permi'])): $qtv = explode(",", $getUser['permi']); if (in_array("dsnv", $qtv)):  ?>
                      <li class="nav-item">
                            <a href="<?=BASE_URL('Admin/Cskh/Manage');?>" class="nav-link">
                                <i class="nav-icon fas fa-folder-open"></i>
                                <p>
                                    Danh sách nhân viên
                                </p>
                            </a>
                        </li>
                       <?php endif; endif; ?>
                      <?php if (in_array("dscskh", $qtv)): ?>
                        <li class="nav-item">
                            <a href="<?=BASE_URL('Admin/Cskh/User');?>" class="nav-link">
                                <i class="nav-icon fas fa-folder-plus"></i>
                                <p>
                                    Danh sách CSKH
                                </p>
                            </a>
                        </li>
						<?php endif; ?>
                      
                      <li class="nav-header">Tài khoản đăng ký</li>
                       <?php if (in_array("khoanvaygiaingan", $qtv)): ?>
                        <li class="nav-item">
                            <a href="<?=BASE_URL('Admin/Loadinfo/User');?>" class="nav-link">
                                <i class="nav-icon fas fa-university"></i>
                                <p>
                                    Khoản vay chờ giải ngân
                                </p>
                            </a>
                        </li>
              			<?php endif; ?>
                      
                      <li class="nav-header">Tài khoản Admin</li>
                        <?php if (in_array("quanlytk", $qtv)): ?>
                        <li class="nav-item">
                            <a href="<?=BASE_URL('Admin/Users');?>" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Quản lý tài khoản
                                </p>
                            </a>
                        </li>
                      <?php endif; ?>
                      <?php if (in_array("quanlyvaitro", $qtv)): ?>
                        <li class="nav-item">
                            <a href="<?=BASE_URL('Admin/Users/Role');?>" class="nav-link">
                                <i class="nav-icon fas fa-shopping-cart"></i>
                                <p>
                                    Quản lý vai trò
                                </p>
                            </a>
                        </li>
                      <?php endif; ?>
                      <?php if (in_array("quanlyper", $qtv)): ?>
                        <li class="nav-item">
                            <a href="<?=BASE_URL('Admin/Cskh/Permission');?>" class="nav-link">
                                <i class="nav-icon fas fa-shopping-cart"></i>
                                <p>
                                    Quản lý quyền hạn
                                </p>
                            </a>
                        </li>
                        <?php endif; ?>
                      
                       <li class="nav-header">Cấu hình</li>
                      <?php if($my_level == 'admin'): ?>
                        <li class="nav-item">
                            <a href="<?=BASE_URL('Admin/Setting/Notification');?>" class="nav-link">
                                <i class="nav-icon fas fa-cog"></i>
                                <p>
                                    Quản lý thông báo
                                </p>
                            </a>
                         </li>
                      <?php endif;?>
                      <?php if (in_array("cauhinhweb", $qtv)): ?>
                         <li class="nav-item">
                            <a href="<?=BASE_URL('Admin/Setting/Home');?>" class="nav-link">
                                <i class="nav-icon fas fa-cog"></i>
                                <p>
                                    Cấu hình website
                                </p>
                            </a>
                        </li>
                      <?php endif; ?>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
      <style>
        .classshow{
        	margin-left:0px;
        }
</style>      
      <script>
  jQuery('#menuid').click(function(){
  	jQuery('.main-sidebar').toggleClass('classshow');
  });

</script>