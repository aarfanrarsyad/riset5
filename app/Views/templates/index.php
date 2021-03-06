<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php if (isset($title) && $title) : ?>
        <title><?= $title ?></title>
    <?php else : ?>
        <title>SIA | Sistem Informasi Alumni</title>
    <?php endif; ?>
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
    <!-- Tailwind -->
    <link rel="stylesheet" href="/css/tailwind.css">
    <link rel="stylesheet" href="/css/navbar.css">
    <link rel="shortcut icon" type="image/png" href="/img/components/logo/logo_sia.png" />


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

    <?php if (isset($isGalery))
        if ($isGalery) : ?>
        <link rel="stylesheet" href="/css/tags.css">
        <script src="/js/selectize.js"></script>
    <?php endif; ?>

    <!-- Font -->
    <!-- <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"> -->
    <link rel="stylesheet" href="/css/font.css">

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
        <footer class="main-footer text-sm text-primaryHover">
            <strong>Copyright &copy; 2020-2022 <a href="https://pkl.stis.ac.id/60">PKL Politeknik Statistika STIS - Sistem Database Alumni</a></strong>
            <div class="float-right d-none d-sm-inline-block mr-4">
                <b>Version</b> 1.1.0-alpha
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-light bg-primarySidebar text-white" style="display: block;">
            <!-- Control sidebar content goes here -->
            <div class="p-3 control-sidebar-content">
                <div class="profile text-center my-3">
                    <img class="img-circle mx-auto" src="<?= base_url(userdata()['image']) ?>" style="width:100px; height:auto;background-color:white;" alt="logo PKL">
                    <div class="text-xs mt-3">
                        <h5 class="widget-user-username text-center text-secondaryhover text-lg mb-2"><?php if (userdata()) echo (userdata()['fullname']) ?></h5>
                        <h6 class="widget-user-desc text-center"><?= array_to_string(role_user(), 2, 'name') ?></h6>
                    </div>
                </div>
                <br>
                <hr class="mb-3 border-primaryDark">
                <div class="mb-2 text-sm px-2 "><a href="<?= base_url("auth/logout") ?>" class="hover:text-secondaryhover"><span><i class="fas fa-sign-out-alt"></i>&ensp;Logout</span></a> </div>
            </div>
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

</body>

<!-- Manajemen Database -->
<script type="text/javascript" src="/js/manajemenDatabase.js"></script>

</html>