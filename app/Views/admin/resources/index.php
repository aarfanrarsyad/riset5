<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<?= view('admin/resources/dist/index/header') ?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class=" row mb-2">
        <div class="col-sm-6">
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right text-sm">
            <li class="breadcrumb-item text-primaryHover"><a href="<?= base_url('admin') ?>">Home</a></li>
            <li class="breadcrumb-item text-muted text-gray-100"><span>Resources Management</span></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <div class="container-fluid px-4 pb-5">
    <div class="response">
      <?= session()->getFlashdata('status'); ?>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card card-light card-outline card-outline-tabs elevation-3">
          <div class="text-primaryHover text-lg px-3 py-3">
            <h5><i class="fas fa-bars"></i>&ensp;Management Resources</h5>
          </div>
          <div class="card-header mt-2 p-0 border-bottom-0 ">
            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active text-secondary" data-toggle="pill" href="#tab1" role="tab" aria-controls="tab1" aria-selected="false">Management Menu &ensp;
                  <span class="badge bg-indigo right" title="5 Data ...."><i class="far fa-bell"></i>
                    5</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-secondary" data-toggle="pill" href="#tab2" role="tab" aria-controls="tab2" aria-selected="true">Management Resource &ensp;
                  <span class="badge badge-info right" title="4 Data ...">4</span>
                </a>
              </li>
            </ul>
          </div>
          <div class="card-body">
            <div class="tab-content">
              <div class="tab-pane fade active show" id="tab1" role="tabpanel" aria-labelledby="tab1">
                <div class="btn-group">
                  <button type="button" class="btn btn-ligjt dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-th-list text-muted"></i>&ensp;Pilih Tindakan
                  </button>
                  <div class="dropdown-menu text-sm">
                    <a class="dropdown-item text-primaryHover" href="javascript:void(0)" onclick="insert_menu()"><i class="fas fa-plus-square"></i>&ensp;Add new menu</a>
                  </div>
                </div>
                <div class="row mt-4">
                  <div class="col">
                    <table class="table table-hover table-sm text-sm" id="menu-table">
                      <thead>
                        <tr>
                          <td class="text-center">No.</td>
                          <td>Menu Name</td>
                          <td>Icon</td>
                          <td class="text-center">Actions</td>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($menus as $dataset) : ?>
                          <tr>
                            <td class="text-center"><?= $i ?></td>
                            <td><?= $dataset['menu_name'] ?></td>
                            <td><i class="<?= $dataset['menu_icon'] ?> text-primaryHover"></i></td>
                            <td class="text-center">
                              <button type="button" class="btn btn-xs btn-outline-primary mr-1" onclick="edit_menu(<?= $dataset['menu_id'] ?>,'<?= $dataset['menu_name'] ?>','<?= $dataset['menu_icon'] ?>')"><i class="fas fa-edit"></i>&ensp;<span class="text-xs">Update</span></button>
                              <button type="button" class="btn btn-xs btn-outline-primary" onclick="delete_menu(<?= $dataset['menu_id'] ?>, '<?= $dataset['menu_name'] ?>')"><i class="fas fa-trash"></i>&ensp;<span class="text-xs">Delete</span></button>
                            </td>
                          </tr>
                          <?php $i++ ?>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tabs-for-calculated">
                <div class="btn-group">
                  <button type="button" class="btn btn-ligjt dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-th-list text-muted"></i>&ensp;Pilih Tindakan
                  </button>
                  <div class="dropdown-menu text-sm">
                    <a class="dropdown-item text-primaryHover" href="<?= base_url('/admin/resources/insert') ?>"><i class="fas fa-plus-square"></i>&ensp;Add new resource</a>
                  </div>
                </div>
                <div class="row mt-4">
                  <div class="col">
                    <table class="table table-hover table-sm text-sm" id="resources-table">
                      <thead>
                        <tr>
                          <td class="text-center">No.</td>
                          <td>Title</td>
                          <td>Parent Menu</td>
                          <td>URL</td>
                          <td>Icon</td>
                          <td class="text-center">Active</td>
                          <td class="text-center">Actions</td>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($resources as $dataset) : ?>
                          <tr>
                            <td class="text-center"><?= $i ?></td>
                            <td><?= $dataset['title'] ?></td>
                            <td><?= $dataset['menu_name'] ?></td>
                            <td><?= $dataset['url'] ?></td>
                            <td><i class="<?= $dataset['icon'] ?> text-secondary"></i></td>
                            <td class="text-center">
                              <?php if ($dataset['active'] == 1) : ?>
                                <span class="badge badge-pill badge-primary">Active</span>
                              <?php else : ?>
                                <span class="badge badge-pill badge-danger">Not Active</span>
                              <?php endif; ?>
                            </td>
                            <td class="text-center">
                              <a href="<?= base_url('/admin/resources/update/' . $dataset['submenu_id']) ?>" class="btn btn-xs bg-teal mr-1"><i class="fas fa-edit"></i>&ensp;<span class="text-xs">Update</span></a>
                              <button onclick="delete_resource(<?= $dataset['submenu_id'] ?>, '<?= $dataset['title'] ?>')" class="btn btn-xs bg-maroon"><i class="fas fa-trash"></i>&ensp;<span class="text-xs">Delete</span></button>
                            </td>
                          </tr>
                          <?php $i++ ?>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content card card-white card-outline px-2 py-2">
      <h5 class="modal-title text-secondary mx-2"></h5>
      <div class="modal-body mt-2">
        <form id="form-input-group" action="<?= base_url('admin/groups/insert') ?>" method="POST">
          <input type="hidden" name="id" id="id">
          <div class="form-group">
            <label for="menu"><span class="text-sm text-secondary">Name Menu :</span></label>
            <input type="text" name="menu" class="inputForm" id="menu" placeholder="Ex : Dashboard" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="icon"><span class="text-sm text-secondary">Icon :</span></label>
            <input type="text" class="inputForm form-control text-sm" name="icon" id="icon" placeholder="Insert class from font awesome icon. Ex : 'fa-user'" autocomplete="off" required>
          </div>
          <div class="d-flex justify-content-end">
            <button type="submit" id="btn-submit" name="insert_menu" class="btn btn-sm text-white bg-secondaryhover hover:bg-opacity-75"><i class="fas fa-paper-plane"></i>&ensp;Send data</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?= view('admin/resources/dist/index/footer') ?>
<?= $this->endSection(); ?>