<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<?= view('admin/galeri/dist/index/header') ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class=" row mb-2">
                <div class="col-sm-6">
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right text-sm">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Home</a></li>
                        <li class="breadcrumb-item text-muted"><span>API Management</span></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="container-fluid px-4" style="font-size:small;">
        <div class="response">
            <?= session()->getFlashdata('status'); ?>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card card-light card-outline card-outline-tabs elevation-3">
                    <div class="bg-light px-3 py-3">
                        <h5><i class="fas fa-chevron-circle-down text-secondary"></i>&ensp;Management API</h5>
                    </div>
                    <div class="card-header mt-2 p-0 border-bottom-0 ">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active text-secondary" data-toggle="pill" href="#tab1" role="tab" aria-controls="tab1" aria-selected="false">API Request &ensp;
                                    <span class="badge bg-indigo right" title="<?= count($data) ?> Data"><i class="far fa-bell"></i>
                                        <?= count($data) ?></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-secondary" data-toggle="pill" href="#tab2" role="tab" aria-controls="tab2" aria-selected="true">Management Scope API &ensp;
                                    <span class="badge badge-info right" title="<?= count($scopes) ?> Data"><?= count($scopes) ?></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="tab1" role="tabpanel" aria-labelledby="tab1">
                                <div class="row">
                                    <div class="col">
                                        <table class="table table-hover table-sm text-sm" id="menu-table">
                                            <thead>
                                                <tr>
                                                    <td class="text-center">No.</td>
                                                    <td class="text-center" width="100px">Nama Client</td>
                                                    <td class="text-center" width="100px">Nama APlikasi</td>
                                                    <td class=" text-center" width="200px">Deskripsi</td>
                                                    <td class="text-center" width="60px">Status</td>
                                                    <td class="text-center" width="120px">Tanggal Request</td>
                                                    <td class="text-center" width="120px">Tanggal Diterima/Ditolak</td>
                                                    <td class="text-center">Token</td>
                                                    <td class="text-center">Scope App</td>
                                                    <td class="text-center">Tindakan</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1 ?>
                                                <?php foreach ($data as $dataset) : ?>
                                                    <tr>
                                                        <td class="text-center"><?= $i ?></td>
                                                        <td><?= $dataset['nama_client'] ?></td>
                                                        <td><?= $dataset['nama_app'] ?></td>
                                                        <td class="text-justify"><?= $dataset['deskripsi'] ?></td>
                                                        <td class="text-center">
                                                            <?php if ($dataset['status'] == 'Ditolak') {
                                                                $badge = 'danger';
                                                            } else if ($dataset['status'] == 'Diterima') {
                                                                $badge = 'primary';
                                                            } else {
                                                                $badge = 'info';
                                                            } ?>
                                                            <span class="badge badge-<?= $badge ?>"><?= $dataset['status'] ?></span>
                                                        </td>
                                                        <td>
                                                            <= date_formats($dataset['req_date'], true) ?>
                                                        </td>
                                                        <td>
                                                            <= date_formats($dataset['req_acc'], true) ?>
                                                        </td>
                                                        <td class="text-center"><?= $dataset['token'] ?></td>
                                                        <td class="text-center"><a href="javascript:void(0)" onclick="getSelectedScope(<?= $dataset['id_token'] ?>)"><i class="fas fa-eye"></i></a></td>
                                                        <td class="text-center">
                                                            <div class="btn-group dropleft">
                                                                <button type="button" class="btn btn-xs btn-outline-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    Tindakan
                                                                </button>
                                                                <div class="dropdown-menu">
                                                                    <?php if ($dataset['status'] == 'Ditolak') : ?>
                                                                        <a class="dropdown-item" href="javascript:void(0)" onclick="status_update(<?= $dataset['id'] ?>,'<?= $dataset['nama_app'] ?>',1)"><i class="fas fa-check"></i>&ensp;Accept</a>
                                                                        <a class="dropdown-item" href="javascript:void(0)" onclick="status_update(<?= $dataset['id'] ?>,'<?= $dataset['nama_app'] ?>',3)"><i class="fas fa-book-reader"></i>&ensp;Review</a>
                                                                    <?php elseif ($dataset['status'] == 'Diterima') : ?>
                                                                        <a class="dropdown-item" href="javascript:void(0)" onclick="status_update(<?= $dataset['id'] ?>,'<?= $dataset['nama_app'] ?>',2)"><i class="fas fa-ban"></i>&ensp;Decline</a>
                                                                        <a class="dropdown-item" href="javascript:void(0)" onclick="status_update(<?= $dataset['id'] ?>,'<?= $dataset['nama_app'] ?>',3)"><i class="fas fa-book-reader"></i>&ensp;Review</a>
                                                                    <?php else : ?>
                                                                        <a class="dropdown-item" href="javascript:void(0)" onclick="status_update(<?= $dataset['id'] ?>,'<?= $dataset['nama_app'] ?>',1)"><i class="fas fa-check"></i>&ensp;Accept</a>
                                                                        <a class="dropdown-item" href="javascript:void(0)" onclick="status_update(<?= $dataset['id'] ?>,'<?= $dataset['nama_app'] ?>',2)"><i class="fas fa-ban"></i>&ensp;Decline</a>
                                                                    <?php endif; ?>

                                                                </div>
                                                            </div>
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
                                        <a class="dropdown-item" href="javascript:void(0)" onclick="add_scope()"><i class="fas fa-plus-square"></i>&ensp;Add Scope</a>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col">
                                        <table class="table table-hover table-sm text-sm" id="menu-table">
                                            <thead>
                                                <tr>
                                                    <td class="text-center">No.</td>
                                                    <td>Scope</td>
                                                    <td>Detail Scope</td>
                                                    <td class="text-center">Tindakan</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1 ?>
                                                <?php foreach ($scopes as $scope) : ?>
                                                    <tr>
                                                        <td class="text-center"><?= $i ?></td>
                                                        <td><?= $scope['scope'] ?></td>
                                                        <td><?= $scope['scope_dev'] ?></td>
                                                        <td class="text-center">
                                                            <div class="btn-group dropleft">
                                                                <button type="button" class="btn btn-xs btn-outline-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    Tindakan
                                                                </button>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item" href="javascript:void(0)" onclick="update_scope(<?= $scope['id'] ?>,'<?= $scope['scope'] ?>','<?= $scope['scope_dev'] ?>')"><i class="fas fa-pen"></i>&ensp;Edit Scope</a>
                                                                    <a class="dropdown-item" href="javascript:void(0)" onclick="delete_scope(<?= $scope['id'] ?>)"><i class="fas fa-trash"></i>&ensp;Delete Scope</a>
                                                                </div>
                                                            </div>
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

<div class="modal fade" id="scope-app" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content card card-white card-outline px-2 py-2">
            <h5 class="modal-title text-secondary mx-2"><i class="fas fa-qrcode"></i>&ensp;Scope Requested</h5>
            <div class="modal-body mt-2">
                <?php foreach ($scopes as $scope) : ?>
                    <div class="form-check">
                        <input class="form-check-input form-scope-check" type="checkbox" value="<?= $scope['id'] ?>" id="scope<?= $scope['id'] ?>" disabled>
                        <label class="form-check-label" for="scope<?= $scope['id'] ?>">
                            <span>
                                <?= $scope['scope_dev'] ?>
                            </span>
                            <br>
                            <span class="mx-2">
                                <?= $scope['scope'] ?>
                            </span>
                        </label>
                    </div>
                    <?php $i++ ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="token-modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content card card-white card-outline px-2 py-2">
            <h5 class="modal-title text-secondary mx-2"><i class="fas fa-qrcode"></i>&ensp;Tambah Scope Baru</h5>
            <div class="modal-body mt-2">
                <form id="form-input-scope" action="<?= base_url('admin/request-api/create-scope') ?>" method="POST">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="scope"><span class="text-sm text-secondary">Scope :</span></label>
                        <input type="text" name="scope" class="form-control text-sm border-top-0 border-right-0 border-left-0" id="scope" placeholder="Ex : Mengakses informasi dasar pengguna." style="border-radius:0" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="detail_scope"><span class="text-sm text-secondary">Detail Scope :</span></label>
                        <input type="text" class="form-control text-sm border-top-0 border-right-0 border-left-0" name="detail_scope" id="detail_scope" placeholder="Contoh : user:profile:read." style="border-radius:0" autocomplete="off" required>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" id="btn-submit" class="btn btn-sm btn-outline-primary"><i class="fas fa-paper-plane"></i>&ensp;Send data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= view('admin/galeri/dist/index/footer') ?>
<?= $this->endSection(); ?>