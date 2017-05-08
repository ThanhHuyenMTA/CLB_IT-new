<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Admin | Viec4u.vn</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <?php echo $this->Html->css('Admin.bootstrap.min.css'); ?>
        <!-- Font Awesome -->
        <?php echo $this->Html->css('font-awesome.min.css'); ?>
        <!-- Ionicons -->
        <!--<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">-->
        <!-- DataTables -->
        <?php echo $this->Html->css('Admin.dataTables.bootstrap.css'); ?>
        <!-- Theme style -->
        <?php echo $this->Html->css('Admin.AdminLTE.min.css'); ?>
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <?php echo $this->Html->css('Admin._all-skins.min.css'); ?>
        
        <?php echo $this->Html->css('Admin.style.admin.css'); ?>

        <style>
            .fa-ban{
                color: #a94442;
            }
            .fa-check-circle{
                color: #18bc9c;
            }
        </style>
        
        <!-- jQuery 2.1.4 -->
        <?php echo $this->Html->script('Admin.jQuery-2.1.4.min.js'); ?>
        <!-- Bootstrap 3.3.5 -->
        <?php echo $this->Html->script('Admin.bootstrap.min.js'); ?>
        <!-- DataTables -->
        <?php echo $this->Html->script('Admin.jquery.dataTables.min.js'); ?>
        <?php echo $this->Html->script('Admin.dataTables.bootstrap.min.js'); ?>
        <!-- SlimScroll -->
        <?php echo $this->Html->script('Admin.jquery.slimscroll.min.js'); ?>
        <!-- FastClick -->
        <?php echo $this->Html->script('Admin.fastclick.min.js'); ?>
        <!-- AdminLTE App -->
        <?php echo $this->Html->script('Admin.app.min.js'); ?>
        <!-- AdminLTE for demo purposes -->
        <?php echo $this->Html->script('Admin.demo.js'); ?>
        <script>
            var base_url = '<?php echo $this->Url->build([
                "controller" => "Admin",
                "action" => "index",
                "plugin" => "Admin"
            ]); ?>';
        </script>
        <script>
          window.fbAsyncInit = function() {
            FB.init({
              appId      : '216950762071856',
              xfbml      : true,
              version    : 'v2.8'
            });
          };

          (function(d, s, id){
             var js, fjs = d.getElementsByTagName(s)[0];
             if (d.getElementById(id)) {return;}
             js = d.createElement(s); js.id = id;
             js.src = "//connect.facebook.net/vi_VI/sdk.js";
             fjs.parentNode.insertBefore(js, fjs);
           }(document, 'script', 'facebook-jssdk'));
        </script>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                
                <?php 
                    echo $this->Html->link(
                        '<span class="logo-mini"><b>A</b> Viec4u</span><span class="logo-lg"><b>Admin</b> Viec4u</span>', 
                        array('controller' => 'Admin', 'action' => 'index'), 
                        array('class' => 'logo', 'escape' => FALSE)
                    );?>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- Messages: style can be found in dropdown.less-->
                            <li class="dropdown messages-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-envelope-o"></i>
                                    <span class="label label-success">4</span>
                                </a>
                            </li>
                            <!-- Notifications: style can be found in dropdown.less -->
                            <li class="dropdown notifications-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-bell-o"></i>
                                    <span class="label label-warning">10</span>
                                </a>
                            </li>
                            <!-- Tasks: style can be found in dropdown.less -->
                            <li class="dropdown tasks-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-flag-o"></i>
                                    <span class="label label-danger">9</span>
                                </a>
                            </li>
                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <?php echo $this->Html->image('Admin.user2-160x160.jpg', array('class' => 'user-image', 'alt' => 'User Image'));?>
                                    <span class="hidden-xs"><?php echo $user['full_name'];?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <?php echo $this->Html->image('Admin.user2-160x160.jpg', array('class' => 'img-circle', 'alt' => 'User Image'));?>
                                        <p>
                                            <?php 
                                            $role = null;
                                            if($user['role'] == 1){
                                               $role = 'Quản trị hệ thống'; 
                                            }else{
                                                $role = 'Quản trị viên'; 
                                            }
                                            echo $user['full_name'] . ' - ' . $role;?>
                                            <small><?php echo 'Đăng ký: ' . date('Y-m-d', strtotime($user['created']))?></small>
                                        </p>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <?php 
                                            echo $this->Html->link(
                                                'Hồ sơ',
                                                array('controller' => 'Users', 'action' => 'edit', 'id' => $user['id']),
                                                array('escape' => false, 'class' => 'btn btn-default btn-flat'));
                                            ?>
                                        </div>
                                        <div class="pull-right">
                                            <?php 
                                            echo $this->Html->link(
                                                'Đăng xuất',
                                                array('controller' => 'Users', 'action' => 'logout'),
                                                array('escape' => false, 'class' => 'btn btn-default btn-flat'));
                                            ?>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!-- Control Sidebar Toggle Button -->
                            <li>
                                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <?php echo $this->Html->image('Admin.user2-160x160.jpg', array('class' => 'img-circle', 'alt' => 'User Image'));?>
                        </div>
                        <div class="pull-left info">
                            <p><?php echo $user['full_name'];?></p>
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Tìm kiếm...">
                            <span class="input-group-btn">
                                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="header">CÁC CHỨC NĂNG CHÍNH</li>
                        <li>
                            <li>
                                <?php 
                                    echo $this->Html->link(
                                '<i class="fa fa-user"></i> Quản trị viên',
                                    array('controller' => 'Users', 'action' => 'index'),
                                    array('escape' => false));
                                ?>
                            </li>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-users"></i>
                                <span>Khách hàng</span>
                                <span class="label label-primary pull-right">2</span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <?php 
                                        echo $this->Html->link(
                                        '<i class="fa fa-circle-o"></i> Nhà tuyển dụng',
                                        array('controller' => 'Customers', 'action' => 'recruitment'),
                                        array('escape' => false));
                                    ?>
                                </li>
                                <li>
                                    <?php 
                                        echo $this->Html->link(
                                        '<i class="fa fa-circle-o"></i> Ứng viên',
                                        array('controller' => 'Customers', 'action' => 'employee'),
                                        array('escape' => false));
                                    ?>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <?php 
                                echo $this->Html->link(
                                '<i class="fa fa-briefcase"></i></i> Công việc',
                                array('controller' => 'Jobs', 'action' => 'index'),
                                array('escape' => false));
                            ?>
                        </li>
                        <li>
                            <?php 
                                echo $this->Html->link(
                                '<i class="fa fa-edit"></i></i> CV',
                                array('controller' => 'Cvs', 'action' => 'index'),
                                array('escape' => false));
                            ?>
                        </li>
                        <?php /*
                        <li>
                            <?php 
                                echo $this->Html->link(
                                '<i class="fa fa-list-ol"></i></i> Danh sách cv được chọn',
                                array('controller' => 'Choices', 'action' => 'index'),
                                array('escape' => false));
                            ?>
                        </li>
                        */ ?>
                        <li>
                            <?php
                            echo $this->Html->link(
                                '<i class="fa fa-desktop"></i></i> Banner',
                                array('controller' => 'Banners', 'action' => 'index'),
                                array('escape' => false));
                            ?>
                        </li>
                        <li>
                            <?php 
                                echo $this->Html->link(
                                '<i class="fa fa-envelope-o" aria-hidden="true"></i> Liên hệ',
                                array('controller' => 'Contacts', 'action' => 'index'),
                                array('escape' => false));
                            ?>
                        </li>
                        <li>
                            <?php 
                                echo $this->Html->link(
                                '<i class="fa fa-unlock-alt" aria-hidden="true"></i> Quên mật khẩu',
                                array('controller' => 'ForgotPasswords', 'action' => 'index'),
                                array('escape' => false));
                            ?>
                        </li>
                        <li>
                            <?php 
                                echo $this->Html->link(
                                '<i class="fa fa-table"></i> Loại công việc',
                                array('controller' => 'TypeJobs', 'action' => 'index'),
                                array('escape' => false));
                            ?>
                        </li>
                        <li>
                            <?php 
                                echo $this->Html->link(
                                '<i class="fa fa-table"></i> Settings',
                                array('controller' => 'Settings', 'action' => 'index'),
                                array('escape' => false));
                            ?>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <?php echo $this->fetch('content'); ?>
            </div><!-- /.content-wrapper -->
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 1.0
                </div>
                <strong>Copyright &copy; 2016-2017 <a href="http://jvb-corp.com/">JVB</a>.</strong> Viet Nam.
            </footer>
        </div><!-- ./wrapper -->
        <!-- Modal Start here-->
        <div class="modal fade bs-example-modal-sm" id="myPleaseWait" tabindex="-1"
            role="dialog" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">
                            <span class="glyphicon glyphicon-time">
                            </span>Xin vui lòng chờ.
                         </h4>
                    </div>
                    <div class="modal-body">
                        <div class="loader"></div>
                        <!-- <div class="progress">
                            <div class="progress-bar progress-bar-info
                            progress-bar-striped active"
                            style="width: 100%">
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal ends Here -->
        <!-- page script -->
        <script>

         var emptyTable = "No data available in table";
         var info       = "Hiển thị từ _START_ tới _END_ trên tổng _TOTAL_ kết quả";
         var infoEmpty  = "Hiển thị 0 tới 0 trên tổng 0 kết quả";
         var lengthMenu = "Hiển thị _MENU_ kết quả mỗi trang";
         var search     = "Tìm kiếm:";
         var zeroRecords = "Không tìm được kết quả hợp lệ!";
         var infoFiltered = "(Lọc ra từ _MAX_ kết quả)";
            $(function () {
                $("#example1").DataTable({
                      "language": {
                       "emptyTable" : emptyTable,
                                "info" : info,
                                "infoEmpty" : infoEmpty,
                                "lengthMenu" : lengthMenu,
                                "search" : search,
                                "zeroRecords" : zeroRecords,
                                "infoFiltered" : infoFiltered,
                       "paginate": {
                         "previous": '<i class="fa fa-angle-left"></i>',
                         "next": '<i class="fa fa-angle-right"></i>'
                       }
                      }
                    });
                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false
                });
            });
        </script>
    </body>
</html>
