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
                            <li class="breadcrumb-item text-muted"><a href="<?= base_url('/admin') ?>">Tambah Alumni</a></li>
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
                                <h5><i class="fas fa-id-card text-primaryHover"></i>&ensp;Form Tambah Alumni</h5>
                            </div>
                        </div>
                        <br>

                        <form action="/admin/addAlumni" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <!-- Biodata Alumni -->
                            <h2 class="row mb-3 text-info">Biodata Alumni</h2>
                            <div class="row mb-3">
                                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control inputForm <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" placeholder="Masukkan nama" id="nama" name="nama" value="<?= old('nama'); ?>" require>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama'); ?>
                                    </div>
                                </div>
                            </div>
                            <fieldset class="row mb-3">
                                <label class="col-sm-2 col-form-label pt-0">Jenis Kelamin</label>
                                <div class="col-sm-10">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Lk" />
                                        <label class="form-check-label text-primary" for="jenis_kelamin-laki">Laki-laki</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Pr" />
                                        <label class="form-check-label text-pink" for="jenis_kelamin">Perempuan</label>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="row g-3 row mb-3">
                                <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control inputForm <?= ($validation->hasError('tempat_lahir')) ? 'is-invalid' : ''; ?>" placeholder="Masukkan Tempat Lahir" id="tempat_lahir" name="tempat_lahir" value="<?= old('tempat_lahir'); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tempat_lahir'); ?>
                                    </div>
                                </div>
                                <div class="input-group col-sm">
                                    <span class="input-group-text mb-2">Tanggal Lahir</span>
                                    <input type="date" class="form-control inputForm <?= ($validation->hasError('tanggal_lahir')) ? 'is-invalid' : ''; ?>" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir" value="<?= old('tanggal_lahir'); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tanggal_lahir'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="telp_alumni" class="col-sm-2 col-form-label">Telepon Alumni</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control inputForm" placeholder="Masukkan Nomor HP" id="telp_alumni" name="telp_alumni" value="<?= old('telp_alumni'); ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control inputForm" placeholder="Masukkan Email" id="email" name="email" value="<?= old('email'); ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="ig" class="col-sm-2 col-form-label">Instagram</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control inputForm" placeholder="Masukkan Username Instagram" id="ig" name="ig" value="<?= old('ig'); ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="twitter" class="col-sm-2 col-form-label">Twitter</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control inputForm" placeholder="Masukkan username Twitter" id="twitter" name="twitter" value="<?= old('twitter'); ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="fb" class="col-sm-2 col-form-label">Facebook</label>
                                <div class="col-sm-10">
                                    <input type="url" class="form-control inputForm" placeholder="Masukkan link Facebook" id="fb" name="fb" value="<?= old('fb'); ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="linkedin" class="col-sm-2 col-form-label">Linkedin</label>
                                <div class="col-sm-10">
                                    <input type="url" class="form-control inputForm" placeholder="Masukkan link linkedin" id="linkedin" name="linkedin" value="<?= old('linkedin'); ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="gscholar" class="col-sm-2 col-form-label">Google Scholar</label>
                                <div class="col-sm-10">
                                    <input type="url" class="form-control inputForm" placeholder="Masukkan link gscholar" id="gscholar" name="gscholar" value="<?= old('gscholar'); ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control inputForm" placeholder="Masukkan alamat lengkap" id="alamat" name="alamat" rows="2"><?= old('alamat'); ?></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="negara" class="col-sm-2 col-form-label">Negara</label>
                                <div class="col-sm-10">
                                    <select name="negara" id="negara" class="inputForm" onchange="displayDiv2('negaraLainIndonesia','negaraIndonesia',this)">
                                        <option disabled selected>Pilih Negara</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="lainnya">Lainnya...</option>
                                    </select>
                                </div>
                            </div>
                            <div class="hidden" id="negaraLainIndonesia">
                                <div class="row mb-3">
                                    <label for="negara" class="col-sm-2 col-form-label">Negara</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="negaraLainnya" id="negaraLainnya" class="inputForm" placeholder="Masukkan nama negara">
                                    </div>
                                </div>
                            </div>
                            <div class="hidden" id="negaraIndonesia">
                                <div class="row mb-3">
                                    <label for="provinsi" class="col-sm-2 col-form-label">Provinsi</label>
                                    <div class="col-sm-10">
                                        <select name="provinsi" id="provinsi" class="inputForm">
                                            <option selected disabled>Pilih Provinsi</option>
                                            <?php foreach ($daftarProv as $prov) : ?>
                                                <option id="<?= $prov->id_provinsi ?>" value="<?= $prov->nama_provinsi ?>"><?= $prov->nama_provinsi ?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <input hidden type="text" name="prov" id="prov-hidden">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="kota" class="col-sm-2 col-form-label">Kota/Kabupaten</label>
                                    <div class="col-sm-10">
                                        <!-- <select name='kabkota' id='kabkota' class='inputForm'>
                                                <option selected disabled>Pilih Kabupaten/Kota</option>                                                        
                                            </select> -->
                                        <input hidden type="text" name="kab" id="kab-hidden">
                                        <input type="text" class="form-control inputForm" placeholder="Masukkan nama kabupaten" id="kota" name="kota" value="<?= old('kota'); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="jabatan_terakhir" class="col-sm-2 col-form-label">Jabatan Terakhir</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control inputForm <?= ($validation->hasError('jabatan_terakhir')) ? 'is-invalid' : ''; ?>" placeholder="Masukkan Jabatan Terakhir" id="jabatan_terakhir" name="jabatan_terakhir" value="<?= old('jabatan_terakhir'); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('jabatan_terakhir'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="nip" class="col-sm-2 col-form-label">NIP</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control inputForm" placeholder="Masukkan NIP" id="nip" name="nip" value="<?= old('nip'); ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="nip_bps" class="col-sm-2 col-form-label">NIP BPS</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control inputForm" placeholder="Masukkan NIP BPS" id="nip_bps" name="nip_bps" value="<?= old('nip_bps'); ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="perkiraanpensiun" class="col-sm-2 col-form-label pt-0">Perkiraan Pensiun</label>
                                <div class="col-sm-3">
                                    <input type="number" name="perkiraan_pensiun" id="perkiraan_pensiun" placeholder="2050" min="1950" max="2100" class="inputForm" value="<?= old('perkiraan_pensiun'); ?>" required>
                                </div>
                            </div>
                            <fieldset class="row mb-3">
                                <label class="col-sm-2 col-form-label pt-0">Status Bekerja</label>
                                <div class="col-sm-10">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status_bekerja" id="bekerja" value="1">
                                        <label class="form-check-label text-primary" for="bekerja">
                                            Bekerja
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status_bekerja" id="tidakbekerja" value="0">
                                        <label class="form-check-label text-danger" for="tidakbekerja">
                                            Tidak Bekerja
                                        </label>
                                    </div>
                            </fieldset>
                            <fieldset class="row mb-3">
                                <label class="col-sm-2 col-form-label pt-0">Aktif PNS</label>
                                <div class="col-sm-10">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="aktif_pns" id="aktif" value="1">
                                        <label class="form-check-label text-primary" for="aktif">
                                            Aktif
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="aktif_pns" id="tidakaktif" value="0">
                                        <label class="form-check-label text-danger" for="tidakaktif">
                                            Tidak Aktif
                                        </label>
                                    </div>
                            </fieldset>
                            <div class="row mb-3">
                                <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control inputForm" placeholder="Masukkan Deskripsi" id="deskripsi" name="deskripsi" rows="2"><?= old('deskripsi'); ?></textarea>
                                </div>
                            </div>
                            <div class="flex justify-end">
                                <button type="submit" class="w-24 text-center py-1 bg-primarySidebar hover:bg-secondaryhover text-white rounded-full cursor-pointer focus:outline-none">TAMBAH</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
</div>
</div>
</div>
<?= $this->endSection(); ?>