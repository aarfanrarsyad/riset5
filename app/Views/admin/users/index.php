<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<?= view('admin/users/dist/index/header') ?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="response">
      </div>
      <div class="row mb-2">
        <div class="col-sm-6">
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right text-sm mr-2">
            <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
            <li class="breadcrumb-item text-muted"><span>Users Management</span></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <div class="container-fluid px-4 pb-5">
    <div class="response">
      <?= view('Myth\Auth\Views\_message_block') ?>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card card-light card-outline card-outline-tabs elevation-3">
          <div class="text-primaryHover text-lg px-3 py-3">
            <h5><i class="fas fa-user-tie"></i>&ensp;Management User</h5>
          </div>
          <div class="card-header mt-2 p-0 border-bottom-0 ">
            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active text-secondary" data-toggle="pill" href="#tab1" role="tab" aria-controls="tab1" aria-selected="false">Daftar User &ensp;
                  <span class="badge bg-indigo right" title="<?= count($data) ?> Data User"><i class="far fa-bell"></i>
                    <?= count($data) ?></span>
                </a>
              </li>
            </ul>
          </div>
          <div class="card-body">
            <div class="tab-content">
              <div class="tab-pane fade active show" id="tab1" role="tabpanel" aria-labelledby="tabs-for-calculate">
                <div class="btn-group">
                  <button type="button" class="btn btn-ligjt dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-th-list text-muted"></i>&ensp;Pilih Tindakan
                  </button>
                  <div class="dropdown-menu text-sm">
                    <a class="dropdown-item" href="<?= base_url('admin/users/register') ?>"><i class="fas fa-plus-square"></i>&ensp;Tambahkan User Baru</a>
                  </div>
                </div>
                <div class="row mt-4">
                  <div class="col">
                    <table class="table table-hover table-sm text-sm" id="users-table">
                      <thead>
                        <tr>
                          <td class="text-center">No.</td>
                          <td>Name</td>
                          <td>Email</td>
                          <td class="text-center">Dibuat</td>
                          <td class="text-center">Status</td>
                          <td class="text-center">Tindakan</td>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($data as $dataset) : ?>
                          <tr>
                            <td class="text-center"><?= $i ?></td>
                            <td><?= $dataset['fullname'] ?></td>
                            <td><?= $dataset['email'] ?></td>
                            <td class="text-center"><?= format_date($dataset['created_at']) ?></td>
                            <td class="text-center">
                              <?php if ($dataset['active'] == 1) : ?>
                                <span class="badge badge-pill badge-primary">Aktif</span>
                              <?php else : ?>
                                <span class="badge badge-pill badge-info">Tidak Aktif</span>
                              <?php endif; ?>
                            </td>
                            <td class="text-center">
                              <div class="dropleft">
                                <button class="btn btn-xs btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <span class="text-xs">Tindakan</span>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                  <?php if ($dataset['active'] == 1) : ?>
                                    <button class="dropdown-item" type="button" onclick="change_active_status(event)" data-id="<?= $dataset['id'] ?>" data-user="<?= $dataset['fullname'] ?>" data-active="0"><i class="fas fa-toggle-off text-secondary"></i>&ensp;Nonaktifkan user</button>
                                  <?php else : ?>
                                    <button class="dropdown-item" type="button" onclick="change_active_status(event)" data-id="<?= $dataset['id'] ?>" data-active="1" data-user="<?= $dataset['fullname'] ?>"><i class="fas fa-toggle-on text-secondary"></i>&ensp;Aktifkan user</button>
                                  <?php endif; ?>
                                  <button class="dropdown-item" type="button"><i class="far fa-eye text-secondary"></i>&ensp;Detail User</button>
                                  <button class="dropdown-item" type="button"><i class="fas fa-edit text-secondary"></i>&ensp;Update User</button>
                                  <button class="dropdown-item" type="button" onclick="delete_user('<?= $dataset['id'] ?>','<?= $dataset['fullname'] ?>')"><i class="fas fa-trash text-secondary"></i>&ensp;Hapus User</button>
                                </div>
                              </div>
                            </td>
                          </tr>
                          <?php $i++; ?>
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

<?= view('admin/users/dist/index/footer') ?>
<?= $this->endSection(); ?>