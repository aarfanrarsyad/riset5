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
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right text-sm">
                            <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
                            <li class="breadcrumb-item text-muted"><a href="<?= base_url('/admin') ?>">Tambah Instansi</a></li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <section class="content mx-1 pb-5">
            <div class="container-fluid">
                <div class="response">
                    <div class="card card-secondary card-outline elevation-3 col-sm-10">
                        <div class="card-body">
                            <div class="row">
                                <div class="col text-primaryHover font-heading">
                                    <h5><i class="fas fa-building text-primaryHover"></i>&ensp;Form Tambah Instasi</h5>
                                </div>
                            </div>
                            <br>
                            <form action="/admin/updateInstansi" method="post" class="row g-3">
                                <?= csrf_field(); ?>
                                <input type="hidden" id="id_tempat_kerja" name="id_tempat_kerja" value="<?= $instansi->id_tempat_kerja; ?>">
                                <div class="col-12">
                                    <label for="nama_instansi" class="col-sm-2 col-form-label">Nama Instansi</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('nama_instansi')) ? 'is-invalid' : ''; ?>" id="nama_instansi" name="nama_instansi" value="<?= $instansi->nama_instansi; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_instansi'); ?>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="alamat_instansi" class="col-sm-3 col-form-label">Alamat Instansi</label>
                                    <textarea class="form-control <?= ($validation->hasError('alamat_instansi')) ? 'is-invalid' : ''; ?>" id="alamat_instansi" name="alamat_instansi" rows="2"><?= $instansi->alamat_instansi; ?></textarea>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('alamat_instansi'); ?>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="negara" class="col-sm-2 col-form-label">Negara</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('negara')) ? 'is-invalid' : ''; ?>" id="negara" name="negara" value="<?= $instansi->negara; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('negara'); ?>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="provinsi" class="col-sm-2 col-form-label">Provinsi</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('provinsi')) ? 'is-invalid' : ''; ?>" id="provinsi" name="provinsi" value="<?= $instansi->provinsi; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('provinsi'); ?>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="kota" class="col-sm-2 col-form-label">Kota/Kabupaten</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('kota')) ? 'is-invalid' : ''; ?>" id="kota" name="kota" value="<?= $instansi->kota; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('kota'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="telp_instansi" class="col-sm-6 col-form-label">No Telepon Instansi</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('telp_instansi')) ? 'is-invalid' : ''; ?>" id="telp_instansi" name="telp_instansi" value="<?= $instansi->telp_instansi; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('telp_instansi'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="faks_instansi" class="col-sm-4 col-form-label">Faks Instansi</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('faks_instansi')) ? 'is-invalid' : ''; ?>" id="faks_instansi" name="faks_instansi" value="<?= $instansi->faks_instansi; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('faks_instansi'); ?>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="email_instansi" class="col-sm-2 col-form-label">Email</label>
                                    <input type="email" class="form-control <?= ($validation->hasError('email_instansi')) ? 'is-invalid' : ''; ?>" id="email_instansi" name="email_instansi" value="<?= $instansi->email_instansi; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('email_instansi'); ?>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary row my-3 ml-2">Update Instansi</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
</div>
</div>
<?= $this->endSection(); ?>