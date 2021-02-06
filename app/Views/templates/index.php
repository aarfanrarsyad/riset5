<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>/vendor/AdminLTE/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="<?= base_url() ?>/vendor/AdminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url() ?>/vendor/AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?= base_url() ?>/vendor/AdminLTE/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>/vendor/AdminLTE/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url() ?>/vendor/AdminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?= base_url() ?>/vendor/AdminLTE/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?= base_url() ?>/vendor/AdminLTE/plugins/summernote/summernote-bs4.min.css">

    <!-- jQuery -->
    <script src="<?= base_url() ?>/vendor/AdminLTE/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?= base_url() ?>/vendor/AdminLTE/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url() ?>/vendor/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="<?= base_url() ?>/vendor/AdminLTE/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="<?= base_url() ?>/vendor/AdminLTE/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="<?= base_url() ?>/vendor/AdminLTE/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="<?= base_url() ?>/vendor/AdminLTE/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?= base_url() ?>/vendor/AdminLTE/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="<?= base_url() ?>/vendor/AdminLTE/plugins/moment/moment.min.js"></script>
    <script src="<?= base_url() ?>/vendor/AdminLTE/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?= base_url() ?>/vendor/AdminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="<?= base_url() ?>/vendor/AdminLTE/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="<?= base_url() ?>/vendor/AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>/vendor/AdminLTE/dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url() ?>/vendor/AdminLTE/dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?= base_url() ?>/vendor/AdminLTE/dist/js/pages/dashboard.js"></script>


    <!-- Datatables -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">

    <!-- Sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script src="/js/admin-dashboard.js"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Ini wilayah Top navigasi -->
        <?= $this->include('templates/topbar'); ?>

        <!-- Ini wilayah sidenav -->
        <?= $this->include('templates/sidebar'); ?>

        <!-- Ini wilayah content -->

        <!-- Begin Page Content -->
        <?= $this->renderSection('page-content'); ?>
        <!-- /.container-fluid -->

        <!-- Ini wilayah footer -->
        <footer class="main-footer text-sm">
            <strong>Copyright &copy; 2020-2022 <a href="https://adminlte.io">PKL Politeknik STIS - Sistem Database Alumni</a></strong>
            .All rights reserved.
            <div class="float-right d-none d-sm-inline-block mr-4">
                <b>Version</b> 1.1.0-alpha
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-light" style="display: block;">
            <!-- Control sidebar content goes here -->
            <div class="p-3 control-sidebar-content">
                <div class="profile text-center">
                    <img class="img-circle" src=" <?= base_url('/img/fav.png') ?>" style="width:100px; height:100px" alt="User Avatar">
                    <div class="text-xs mt-3">
                        <h5 class="widget-user-username text-center"><?php if (userdata()) echo (userdata()['fullname']) ?></h5>
                        <h6 class="widget-user-desc text-center"><?= array_to_string(role_user(), 2, 'name') ?></h6>
                    </div>
                </div>
                <br>
                <hr class="mb-3">
                <div class="mb-2 text-sm px-2"><span><a href="#" class="text-dark"><i class="fas fa-user-circle"></i>&ensp;Change profile</span></a></div>
                <div class="mb-2 text-sm px-2"><span><a href="#" class="text-dark"><i class="fas fa-unlock"></i>&ensp;Change password</span></a> </div>
                <div class="mb-2 text-sm px-2"><a href="#" class="text-dark"><span><i class="fas fa-user-shield"></i>&ensp;Activity of all groups</span></a> </div>
                <hr class="mb-3">
                <div class="mb-2 text-sm px-2 "><a href="<?= base_url("auth/logout") ?>" class="text-dark"><span><i class="fas fa-sign-out-alt"></i>&ensp;Logout</span></a> </div>
            </div>
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

</body>

</html>