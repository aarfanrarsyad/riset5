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
                        <h1 class="h3 mb-4 text-blue">Form Update Alumni</h1>
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
                <form action="/admin/crud/alumni/update/<?= $alumni['id_alumni']; ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <!-- Biodata Alumni -->
                    <h2 class="row mb-3 text-info">Biodata Alumni</h2>
                    <div class="row g-3 row mb-3">
                        <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control <?= ($validation->hasError('nim')) ? 'is-invalid' : ''; ?>" id="nim" name="nim" autofocus value="<?= $alumni['nim']; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('nim'); ?>
                            </div>
                        </div>
                        <div class="input-group col-sm">
                            <span class="input-group-text">Angkatan</span>
                            <input class="<?= ($validation->hasError('angkatan')) ? 'is-invalid' : ''; ?>" type="number" id="angkatan" name="angkatan" min="1" max="99" value="<?= $alumni['angkatan']; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('angkatan'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?= $alumni['nama']; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('nama'); ?>
                            </div>
                        </div>
                    </div>
                    <fieldset class="row mb-3">
                        <label class="col-sm-2 col-form-label pt-0">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="L" />
                                <label class="form-check-label text-primary" for="jenis_kelamin-laki">Laki-laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="P" />
                                <label class="form-check-label text-pink" for="jenis_kelamin">Perempuan</label>
                            </div>
                        </div>
                    </fieldset>
                    <div class="row g-3 row mb-3">
                        <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control <?= ($validation->hasError('tempat_lahir')) ? 'is-invalid' : ''; ?>" id="tempat_lahir" name="tempat_lahir" value="<?= $alumni['tempat_lahir']; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('tempat_lahir'); ?>
                            </div>
                        </div>
                        <div class="input-group col-sm">
                            <span class="input-group-text">Tanggal Lahir</span>
                            <input type="date" class="form-control <?= ($validation->hasError('tanggal_lahir')) ? 'is-invalid' : ''; ?>" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir" value="<?= $alumni['tanggal_lahir']; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('tanggal_lahir'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="telp_alumni" class="col-sm-2 col-form-label">Telepon Alumni</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="telp_alumni" name="telp_alumni" value="<?= $alumni['telp_alumni']; ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" name="email" value="<?= $alumni['email']; ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="ig" class="col-sm-2 col-form-label">Instagram</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="ig" name="ig" value="<?= $alumni['ig']; ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="fb" class="col-sm-2 col-form-label">Facebook</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="fb" name="fb" value="<?= $alumni['fb']; ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="twitter" class="col-sm-2 col-form-label">Twitter</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="twitter" name="twitter" value="<?= $alumni['twitter']; ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <textarea type="text" class="form-control" id="alamat" name="alamat" rows="2" value="<?= $alumni['alamat']; ?>"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="jabatan_terakhir" class="col-sm-3 col-form-label">Jabatan Terakhir</label>
                        <div class="col-sm">
                            <input type="text" class="form-control <?= ($validation->hasError('jabatan_terakhir')) ? 'is-invalid' : ''; ?>" id="jabatan_terakhir" name="jabatan_terakhir" value="<?= $alumni['jabatan_terakhir']; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('jabatan_terakhir'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="nip" class="col-sm-2 col-form-label">NIP</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nip" name="nip" value="<?= $alumni['nip']; ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="nip_bps" class="col-sm-2 col-form-label">NIP BPS</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nip_bps" name="nip_bps" value="<?= $alumni['nip_bps']; ?>">
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary row mb-3">Update Alumni</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<?= $this->endSection(); ?>