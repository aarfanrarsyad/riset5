<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<?= view('admin/groups/dist/index/header') ?>

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="response">
      </div>
      <div class="row mb-2">
        <div class="col-sm-6">
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right text-sm mr-2">
            <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Home</a></li>
            <li class="breadcrumb-item text-muted"><span>Groups Managment</span></li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid px-4 pb-5">
    <div class="alert-content">
      <?= session()->getFlashdata('status') ?>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card card-light card-outline card-outline-tabs elevation-3">
          <div class="text-primaryHover text-lg px-3 py-3">
            <h5><i class="fas fa-layer-group"></i>&ensp;Groups Managment</h5>
          </div>
          <div class="card-header mt-2 p-0 border-bottom-0 ">
            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active text-secondary" data-toggle="pill" href="#tab1" role="tab" aria-controls="tab1" aria-selected="false">Groups List &ensp;
                  <span class="badge bg-indigo right" title="<?= count($data) ?> Data ...."><i class="far fa-bell"></i>
                    <?= count($data) ?></span>
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
                    <a class="dropdown-item" href="javascript:void(0)" onclick="insert_group()"><i class="fas fa-plus-square"></i>&ensp;Add new group</a>
                  </div>
                </div>
                <div class="row mt-4">
                  <div class="col">
                    <table class="table table-hover table-sm text-sm" id="group-table">
                      <thead>
                        <tr>
                          <td class="text-center">No.</td>
                          <td>Group Name</td>
                          <td>Description</td>
                          <td class="text-center">Actions</td>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($data as $dataset) : ?>
                          <tr>
                            <td class="text-center"><?= $i ?></td>
                            <td><?= $dataset->name ?></td>
                            <td><?= $dataset->description ?></td>
                            <td class=" text-center">
                              <button class="btn btn-xs bg-teal mr-1" onclick="edit_group(<?= $dataset->id ?>,'<?= $dataset->name ?>','<?= $dataset->description ?>')"><i class="fas fa-edit"></i>&ensp;<span class="text-xs">Update</span></button>
                              <button class="btn btn-xs bg-maroon" onclick="delete_group(<?= $dataset->id ?>,'<?= $dataset->name ?>')"><i class="fas fa-trash"></i>&ensp;<span class="text-xs">Delete</span></button>
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

<div class="modal fade" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content card card-white card-outline px-2 py-2">
      <h5 class="modal-title text-secondary mx-2">Insert New Role</h5>
      <div class="modal-body mt-2">
        <form id="form-input-group" action="<?= base_url('admin/groups/insert') ?>" method="POST">
          <input type="hidden" name="id" id="id">
          <div class="form-group">
            <label for="name"><span class="text-sm text-secondary">Group Name :</span></label>
            <input type="text" name="name" class="form-control text-sm border-top-0 border-right-0 border-left-0" id="name" placeholder="Ex : Administrator" style="border-radius:0" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="description"><span class="text-sm text-secondary">Description :</span></label>
            <input type="text" class="form-control text-sm border-top-0 border-right-0 border-left-0" name="description" id="description" placeholder="Ex : this role will be used for ...." style="border-radius:0" autocomplete="off">
          </div>
          <div class="d-flex justify-content-end">
            <button type="submit" id="btn-submit" name="insert_group" class="btn btn-sm text-secondaryhover border-secondaryhover hover:text-white hover:bg-secondaryhover"><i class="fas fa-paper-plane"></i>&ensp;Send data</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?= view('admin/groups/dist/index/footer') ?>
<?= $this->endSection(); ?>