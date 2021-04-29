<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="h3 mb-4 text-gray-800">Form Tambah Instansi</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right text-sm">
                            <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
                            <li class="breadcrumb-item text-muted"><a href="<?= base_url('/admin') ?>">Home Admin</a></li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="container">
            <div class="col-8">
                <form action="/admin/CRUD_saveInstansi" method="post" class="row g-3">
                    <?= csrf_field(); ?>
                    <div class="col-12">
                        <label for="nama_instansi" class="col-sm-2 col-form-label">Nama Instansi</label>
                        <input type="text" class="form-control <?= ($validation->hasError('nama_instansi')) ? 'is-invalid' : ''; ?>" id="nama_instansi" name="nama_instansi">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama_instansi'); ?>
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="alamat_instansi" class="col-sm-3 col-form-label">Alamat Instansi</label>
                        <textarea class="form-control <?= ($validation->hasError('alamat_instansi')) ? 'is-invalid' : ''; ?>" id="alamat_instansi" name="alamat_instansi" rows="2"></textarea>
                        <div class="invalid-feedback">
                            <?= $validation->getError('alamat_instansi'); ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="telp_instansi" class="col-sm-6 col-form-label">No Telepon Instansi</label>
                        <input type="text" class="form-control <?= ($validation->hasError('telp_instansi')) ? 'is-invalid' : ''; ?>" id="telp_instansi" name="telp_instansi">
                        <div class="invalid-feedback">
                            <?= $validation->getError('telp_instansi'); ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="faks_instansi" class="col-sm-4 col-form-label">Faks Instansi</label>
                        <input type="text" class="form-control <?= ($validation->hasError('faks_instansi')) ? 'is-invalid' : ''; ?>" id="faks_instansi" name="faks_instansi">
                        <div class="invalid-feedback">
                            <?= $validation->getError('faks_instansi'); ?>
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="email_instansi" class="col-sm-2 col-form-label">Email</label>
                        <input type="email" class="form-control <?= ($validation->hasError('email_instansi')) ? 'is-invalid' : ''; ?>" id="email_instansi" name="email_instansi">
                        <div class="invalid-feedback">
                            <?= $validation->getError('email_instansi'); ?>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary row mt-3">Tambah Instansi</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<?= $this->endSection(); ?>