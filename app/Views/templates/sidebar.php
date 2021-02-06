<script>
  function active_menu(event) {
    $('.active').removeClass('active');
    $(event.target).addClass('active');
  }

  function stop(event) {
    event.stopPropagation()
  }
</script>
<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4 sidebar-light-indigo">
  <!-- Brand Logo -->
  <a href="<?= base_url() ?>" class="brand-link navbar-white">
    <img src="<?= base_url('/img/fav.png') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-2">
    <span class="brand-text font-weight-light">Admin Dashboard</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= base_url() ?>/vendor/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?php if (userdata()) echo (userdata()['fullname']) ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">

      <ul class="nav nav-pills nav-sidebar flex-column text-sm" data-widget="treeview" role="menu" data-accordion="false">

        <?php
        $init = model('App\Models\admin_model');
        $menus =  $init->getAllMenu()->getResultArray();

        ?>
        <?php foreach ($menus as $menu) : ?>

          <?php
          $menu_id = $menu['menu_id'];
          $groups = role_user();
          $data_resources = [];


          for ($i = 0; $i < count($groups); $i++) {
            $group_id = role_user()[$i]['group_id'];
            $resources = $init->getResourcesByRole($group_id, $menu_id)->getResultArray();

            for ($j = 0; $j < count($resources); $j++) {
              if (search_array_2($data_resources, 'submenu_id', $resources[$j]['submenu_id']) !== false) {
                continue;
              } else {
                $data_resources[] = $resources[$j];
              }
            }
          } ?>

          <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link" onclick="active_menu(event)" id="menu-<?= $menu['menu_id'] ?>">
              <i class="<?= $menu['menu_icon'] ?>" onclick="stop(event)"></i>&ensp;
              <p>
                <?= $menu['menu_name'] ?>
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"><?= count($data_resources) ?></span>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <?php foreach ($data_resources as $data_resource) : ?>
                <li class="nav-item">
                  <a href="<?= base_url($data_resource['url']) ?>" id="<?= str_replace(' ', '-', strtolower($data_resource['title'])) ?>" data-menu="<?= $menu['menu_id'] ?>" class="nav-link">
                    <i class="far fa-circle nav-icon text-sm icon-list"></i>&ensp;<i class="<?= $data_resource['icon'] ?>"></i>
                    <p><?= $data_resource['title'] ?></p>
                  </a>
                </li>
              <?php endforeach; ?>
            </ul>
          </li>
        <?php endforeach; ?>
        <br>
        <li class="nav-item">
          <a href="<?= base_url('auth/logout') ?>" id="logout" class="nav-link">
            <i class="fas fa-sign-out-alt"></i>&ensp;
            <p>Logout</p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

<?php
$uri = service('uri');
$uri_segment = strtolower(trim($uri->getSegment(2)));
?>

<script>
  $('.active').removeClass('active');
  $('.menu-open').removeClass('menu-open');
  $('.fa-dot-circle').removeClass('fa-dot-circle');
  $('#<?= $uri_segment ?>').addClass('active');

  $('#<?= $uri_segment ?> .icon-list').removeClass('fa-circle');
  $('#<?= $uri_segment ?> .icon-list').addClass('fa-dot-circle');
  let menu_id = $('#<?= $uri_segment ?>').data('menu');
  $('#menu-' + menu_id).addClass('active')
  $('#menu-' + menu_id).parent().addClass('menu-open')
</script>