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
                            <li class="breadcrumb-item text-muted"><a href="<?= base_url('/admin') ?>">Home Admin</a></li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <section class="content mx-1 pb-5">
            <div class="container-fluid">
                <div class="response">
                </div>

                <div class="card card-secondary card-outline elevation-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col text-primaryHover font-heading">
                                <h5><i class="fas fa-qrcode text-primaryHover"></i>&ensp;Form Tambah Alumni</h5>
                            </div>
                        </div>
                        <br>

                        <form action="/admin/CRUD_saveAlumni" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <!-- Biodata Alumni -->
                            <h2 class="row mb-3 text-info">Biodata Alumni</h2>
                            <div class="row mb-3">
                                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" placeholder="Masukkan nama" id="nama" name="nama" value="<?= old('nama'); ?>" require>
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
                                    <input type="text" class="form-control <?= ($validation->hasError('tempat_lahir')) ? 'is-invalid' : ''; ?>" placeholder="Masukkan Tempat Lahir" id="tempat_lahir" name="tempat_lahir" value="<?= old('tempat_lahir'); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tempat_lahir'); ?>
                                    </div>
                                </div>
                                <div class="input-group col-sm">
                                    <span class="input-group-text">Tanggal Lahir</span>
                                    <input type="date" class="form-control <?= ($validation->hasError('tanggal_lahir')) ? 'is-invalid' : ''; ?>" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir" value="<?= old('tanggal_lahir'); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tanggal_lahir'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="telp_alumni" class="col-sm-2 col-form-label">Telepon Alumni</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Masukkan Nomor HP" id="telp_alumni" name="telp_alumni" value="<?= old('telp_alumni'); ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" placeholder="Masukkan Email" id="email" name="email" value="<?= old('email'); ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="ig" class="col-sm-2 col-form-label">Instagram</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Masukkan Username Instagram" id="ig" name="ig" value="<?= old('ig'); ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="fb" class="col-sm-2 col-form-label">Facebook</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Masukkan Facebook" id="fb" name="fb" value="<?= old('fb'); ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="twitter" class="col-sm-2 col-form-label">Twitter</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Masukkan username Twitter" id="twitter" name="twitter" value="<?= old('twitter'); ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="linkedin" class="col-sm-2 col-form-label">Linkedin</label>
                                <div class="col-sm-10">
                                    <input type="url" class="form-control" placeholder="Masukkan link linkedin" id="linkedin" name="linkedin" value="<?= old('linkedin'); ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="gscholar" class="col-sm-2 col-form-label">Gscholar</label>
                                <div class="col-sm-10">
                                    <input type="url" class="form-control" placeholder="Masukkan link gscholar" id="gscholar" name="gscholar" value="<?= old('gscholar'); ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control" placeholder="Masukkan alamt lengkap" id="alamat" name="alamat" rows="2"><?= old('alamat'); ?></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="negara" class="col-sm-2 col-form-label">Negara</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Masukkan nama Negara" id="negara" name="negara" value="<?= old('negara'); ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="provinsi" class="col-sm-2 col-form-label">Provinsi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Masukkan nama Provinsi" id="provinsi" name="provinsi" value="<?= old('provinsi'); ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="kota" class="col-sm-2 col-form-label">Kota/Kabupaten</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Masukkan nama Kota/Kabupaten" id="kota" name="kota" value="<?= old('kota'); ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="jabatan_terakhir" class="col-sm-2 col-form-label">Jabatan Terakhir</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?= ($validation->hasError('jabatan_terakhir')) ? 'is-invalid' : ''; ?>" placeholder="Masukkan Jabatan Terakhir" id="jabatan_terakhir" name="jabatan_terakhir" value="<?= old('jabatan_terakhir'); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('jabatan_terakhir'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="nip" class="col-sm-2 col-form-label">NIP</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Masukkan NIP" id="nip" name="nip" value="<?= old('nip'); ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="nip_bps" class="col-sm-2 col-form-label">NIP BPS</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Masukkan NIP BPS" id="nip_bps" name="nip_bps" value="<?= old('nip_bps'); ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="foto" class="col-sm-2 col-form-label">Foto Profil</label>
                                <div class="col-sm-2">
                                    <img src="/img/default.svg" class="img-thumbnail img-preview">
                                </div>
                                <div class="col-sm-8">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input <?= ($validation->hasError('foto_profil')) ? 'is-invalid' : ''; ?>" id="foto_profil" name="foto_profil" onchange="previewImg()">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('foto_profil'); ?>
                                        </div>
                                        <label for="foto_profil" class="custom-file-label">Pilih Foto...</label>
                                    </div>
                                </div>
                                <script>
                                    function previewImg() {
                                        const foto = document.querySelector('#foto_profil');
                                        const fotoLabel = document.querySelector('.custom-file-label');
                                        const imgPreview = document.querySelector('.img-preview');

                                        fotoLabel.textContent = foto.files[0].name;

                                        const filefoto = new FileReader();
                                        filefoto.readAsDataURL(foto.files[0]);

                                        filefoto.onload = function(e) {
                                            imgPreview.src = e.target.result;
                                        }
                                    }
                                </script>
                            </div>
                            <div class="row mb-3">
                                <label for="perkiraanpensiun" class="col-sm-2 col-form-label pt-0">Perkiraan Pensiun</label>
                                <div class="col-sm-15">
                                    <select class="form-select" aria-label="Default select example" id="perkiraan_pensiun" name="perkiraan_pensiun" value="<?= old('perkiraan_pensiun'); ?>">
                                        <option selected>Pilih Tahun</option>
                                        <script>
                                            var myDate = new Date();
                                            var year = myDate.getFullYear();
                                            for (var i = 1990; i < year + 55; i++) {
                                                document.write('<option value="' + i + '">' + i + '</option>');
                                            }
                                        </script>
                                    </select>
                                </div>
                            </div>
                            <fieldset class="row mb-3">
                                <label class="col-sm-2 col-form-label pt-0">Status Bekerja</label>
                                <div class="col-sm-10">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="status_bekerja" id="bekerja" value="1">
                                        <label class="form-check-label text-primary" for="bekerja">
                                            Bekerja
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="status_bekerja" id="tidakbekerja" value="0">
                                        <label class="form-check-label text-danger" for="tidakbekerja">
                                            Tidak Bekerja
                                        </label>
                                    </div>
                            </fieldset>
                            <fieldset class="row mb-3">
                                <label class="col-sm-2 col-form-label pt-0">Aktif PNS</label>
                                <div class="col-sm-10">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="aktif_pns" id="aktif" value="1">
                                        <label class="form-check-label text-primary" for="aktif">
                                            Aktif
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="aktif_pns" id="tidakaktif" value="0">
                                        <label class="form-check-label text-danger" for="tidakaktif">
                                            Tidak Aktif
                                        </label>
                                    </div>
                            </fieldset>
                            <div class="row mb-3">
                                <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control" placeholder="Masukkan Deskripsi" id="deskripsi" name="deskripsi" rows="2"><?= old('deskripsi'); ?></textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary row mb-3">Simpan</button>
                        </form>
                    </div>
                </div>

                <!-- Instansi -->
                <div class="card card-secondary card-outline elevation-3">
                    <div class="card-body">
                        <form action="/admin/CRUD_saveAlumni" method="post" enctype="multipart/form-data">
                            <h2 class="row mb-3 text-info">Instansi</h2>
                            <div class="row mb-3">
                                <label for="nama_instansi" class="col-sm-2 col-form-label">Nama Instansi</label>
                                <div class="col-sm-10">
                                    <input list="daftarInstansi" class="form-control <?= ($validation->hasError('nama_instansi')) ? 'is-invalid' : ''; ?>" placeholder="Masukkan nama instansi" id="nama_instansi" name="nama_instansi" value="<?= old('nama_instansi'); ?>">
                                    <datalist id="daftarInstansi" class="font-paragraph">
                                        <?php foreach ($list as $row) : ?>
                                            <option data-value="<?= $row->id_tempat_kerja ?>"><?= $row->nama_instansi ?></option>
                                        <?php endforeach; ?>
                                    </datalist>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_instansi'); ?>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>

                <!-- Pendidikan -->
                <div class="card card-secondary card-outline elevation-3">
                    <div class="card-body">
                        <form action="/admin/CRUD_saveAlumni" method="post" enctype="multipart/form-data">
                            <h2 class="row mb-3 text-info">Pendidikan</h2>
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label for="jenjang" class="col-sm-3 col-form-label">Jenjang</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('jenjang')) ? 'is-invalid' : ''; ?>" id="jenjang" name="jenjang" value="<?= old('jenjang'); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('jenjang'); ?>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <label for="universitas" class="col-sm-2 col-form-label">Universitas</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('instansi')) ? 'is-invalid' : ''; ?>" id="universitas" name="instansi" value="<?= old('instansi'); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('instansi'); ?>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('nim')) ? 'is-invalid' : ''; ?>" id="nim" name="nim" value="<?= old('nim'); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nim'); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="angkatan" class="col-sm-3 col-form-label">Angkatan</label>
                                    <input type="number" class="form-control <?= ($validation->hasError('instansi')) ? 'is-invalid' : ''; ?>" id="angkatan" name="angkatan" value="<?= old('angkatan'); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('angkatan'); ?>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="program_studi" class="col-sm-2 col-form-label">Program Studi</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('program_studi')) ? 'is-invalid' : ''; ?>" id="program_studi" name="program_studi" value="<?= old('program_studi'); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('program_studi'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6 row my-3">
                                    <label for="tahun_masuk" class="col-sm-4 col-form-label">Tahun Masuk</label>
                                    <select class="form-select" id="tahun_masuk" name="tahun_masuk" value="<?= old('tahun_masuk'); ?>">
                                        <option selected>Pilih Tahun</option>
                                        <script>
                                            var myDate = new Date();
                                            var year = myDate.getFullYear();
                                            for (var i = 1990; i < year + 55; i++) {
                                                document.write('<option value="' + i + '">' + i + '</option>');
                                            }
                                        </script>
                                    </select>
                                </div>
                                <div class="col-md-6 row my-3">
                                    <label for="tahun_lulus" class="col-sm-4 col-form-label">Tahun Lulus</label>
                                    <select class="form-select" id="tahun_lulus" name="tahun_lulus" value="<?= old('tahun_lulus'); ?>">
                                        <option selected>Pilih Tahun</option>
                                        <script>
                                            var myDate = new Date();
                                            var year = myDate.getFullYear();
                                            for (var i = 1990; i < year + 55; i++) {
                                                document.write('<option value="' + i + '">' + i + '</option>');
                                            }
                                        </script>
                                    </select>
                                </div>
                                <div class="col-12 row mb-3">
                                    <label for="judul_tulisan" class="col-sm-2 col-form-label">Judul Tulisan</label>
                                    <textarea type="text" class="form-control <?= ($validation->hasError('judul_tulisan')) ? 'is-invalid' : ''; ?>" id="judul_tulisan" name="judul_tulisan" rows="2"><?= old('judul_tulisan'); ?></textarea>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('judul_tulisan'); ?>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </form>
                    </div>
                </div>

                <!-- Prestasi -->
                <div class="card card-secondary card-outline elevation-3">
                    <div class="card-body">
                        <form action="/admin/CRUD_saveAlumni" method="post" enctype="multipart/form-data">
                            <h2 class="row mb-3 text-info">Prestasi</h2>
                            <div class="row g-3 mb-3">
                                <div class="col-md-8">
                                    <label for="nama_prestasi" class="col-sm-3 col-form-label">Nama Prestasi</label>
                                    <input type="text" class="form-control" id="nama_prestasi" name="nama_prestasi" value="<?= old('nama_prestasi'); ?>">
                                </div>
                                <div class="col-md-4">
                                    <label for="tahun" class="col-sm-2 col-form-label">Tahun</label>
                                    <input type="number" class="form-control" id="tahun" name="tahun_prestasi" value="<?= old('tahun_prestasi'); ?>">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </form>
                    </div>
                </div>

                <!-- Publikasi -->
                <div class="card card-secondary card-outline elevation-3">
                    <div class="card-body">
                        <form action="/admin/CRUD_saveAlumni" method="post" enctype="multipart/form-data">
                            <h2 class="row mb-3 text-info">Publikasi</h2>
                            <div class="row mb-3">
                                <label for="publikasi" class="col-sm-2 col-form-label">Publikasi</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control" id="publikasi" name="publikasi" rows="2"><?= old('publikasi'); ?></textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </form>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary row mb-3">Tambah</button>
            </div>
    </div>
</div>
</div>
</div>
<?= $this->endSection(); ?>