<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<?= view('admin/crud/dist/index/header') ?>

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
                        <li class="breadcrumb-item text-muted text-gray-100"><span>Database Management</span></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>


    <div class="container-fluid">
        <div class="response">
        </div>
        <div class="card card-secondary card-outline elevation-3">
            <div class="card-body">
                <div class="row">
                    <div class="col text-primaryHover font-heading">
                        <h5><i class="fas fa-qrcode text-primaryHover"></i>&ensp;Daftar Instansi</h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="tab1" role="tabpanel" aria-labelledby="tab1">
                            <div class="btn-group">
                                <button type="button" class="btn btn-ligjt dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-th-list text-muted"></i>&ensp;Pilih Tindakan
                                </button>
                                <div class="dropdown-menu text-sm">
                                    <a class="dropdown-item" href="<?= base_url('/admin/alumni/tambah-instansi') ?>" onclick="CRUD_createInstansi()"><i class="fas fa-plus-square"></i>&ensp;Add new instansi</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <table class="table table-hover table-sm text-sm" id="instansi-table">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Nama Instansi</th>
                                                <th scope="col">Alamat Instansi</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1 + (10 * ($currentPage - 1)); ?>
                                            <?php foreach ($instansi as $inst) : ?>
                                                <tr>
                                                    <th scope="row"><?= $i++; ?></th>
                                                    <td><?= $inst['nama_instansi']; ?></td>
                                                    <td><?= $inst['alamat_instansi']; ?></td>
                                                    <td>
                                                        <a href="/admin/instansi/<?= $inst['id_tempat_kerja']; ?>" class="btn btn-xs btn-outline-primary mr-1"><i class="fas fa-search"></i>&ensp;<span class="text-xs">Detail</span></a>
                                                        <button type="button" class="btn btn-xs btn-outline-primary mr-1" onclick=""><i class="fas fa-edit"></i>&ensp;<span class="text-xs">Update</span></button>
                                                        <button type="button" class="btn btn-xs btn-outline-primary" onclick="CRUD_deleteInstansi(<?= $inst['id_tempat_kerja']; ?>, '<?= $inst['nama_instansi']; ?>')"><i class="fas fa-trash"></i>&ensp;<span class="text-xs">Delete</span></button>
                                                    </td>
                                                </tr>
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
<?= view('admin/crud/dist/index/footer') ?>
<?= $this->endSection();
