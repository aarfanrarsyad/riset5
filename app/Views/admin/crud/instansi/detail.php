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
                        <h5><i class="fas fa-qrcode text-primaryHover"></i>&ensp;Detail Instansi</h5>
                    </div>
                </div>
                <div class="container">
                    <div class="main-body">
                        <div class="row gutters-sm">
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex flex-column align-items-center text-center">
                                            <div class="mt-3">
                                                <h4><?= $instansi['nama_instansi']; ?></h4>
                                                <p class="text-secondary mb-1">
                                                    <span class="text-primary"><?= $instansi['alamat_instansi']; ?></span><br />
                                                </p>
                                                <button type="button" class="btn btn-xs btn-outline-primary mr-1" onclick=""><i class="fas fa-edit"></i>&ensp;<span class="text-xs">Update</span></button>
                                                <button type="button" class="btn btn-xs btn-outline-primary" onclick="CRUD_deleteInstansi(<?= $instansi['id_tempat_kerja']; ?>, '<?= $instansi['nama_instansi']; ?>')"><i class="fas fa-trash"></i>&ensp;<span class="text-xs">Delete</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">ID Tempat Kerja</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <?= $instansi['id_tempat_kerja']; ?>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Kota</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <?= $instansi['kota']; ?>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Provinsi</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <?= $instansi['provinsi']; ?>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Negara</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <?= $instansi['negara']; ?>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Telepon Instansi</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <?= $instansi['telp_instansi']; ?>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Faks instansi</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <?= $instansi['faks_instansi']; ?>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Email Instansi</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <?= $instansi['email_instansi']; ?>
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
    </div>
</div>
<?= $this->endSection(); ?>