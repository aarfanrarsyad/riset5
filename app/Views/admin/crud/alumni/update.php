<?php
if ($instansi != NULL) {
    $value = $instansi->nama_instansi;
} else {
    $value = old('nama_instansi');
}
?>
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
                            <li class="breadcrumb-item text-muted"><a href="">Edit Data Alumni</a></li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <section class="content mx-1 pb-5">
            <div class="container-fluid">
                <div class="response">
                    <div class="card card-secondary card-outline elevation-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col text-primaryHover font-heading">
                                    <h5><i class="fas fa-id-card text-primaryHover"></i>&ensp;Form Edit Alumni</h5>
                                </div>
                            </div>
                            <br>
                            <!-- Biodata Alumni -->
                            <h2 class="row mb-3 text-info">Biodata Alumni</h2>
                            <form action="/admin/updateAlumni" method="post" enctype="multipart/form-data">
                                <?= csrf_field(); ?>
                                <input type="hidden" id="id_alumni" name="id_alumni" value="<?= $alumni['id_alumni']; ?>">

                                <div class="row mb-3">
                                    <div class="col-6 col-md-4 align-self-center">
                                        <div class="card  card-secondary card-outline elevation-3">
                                            <div class="flex items-center justify-center lg:flex-none">
                                                <div class="md:w-2/3 w-1/2 lg:w-full">
                                                    <div class="flex justify-center">
                                                        <img src="/img/<?= $alumni['foto_profil'] ?>" alt="" class="mb-6 md:w-48 md:h-48 w-28 h-28 rounded-full">
                                                    </div>
                                                    <div class="flex justify-center">
                                                        <div class="updateFotoProfil bg-primarySidebar rounded-full font-paragraph text-white px-3 py-1 hover:bg-secondaryhover lg:text-base text-sm focus:outline-none" onclick="updateFotoProfil()">Ubah foto profil</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="card card-secondary card-outline elevation-3">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                    <h6 class="mb-0">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity mr-2 icon-inline">
                                                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                                            <polyline points="22,6 12,13 2,6"></polyline>
                                                        </svg>Email
                                                    </h6>
                                                    <span class="text-secondary col-sm-10"><input type="email" class="form-control" placeholder="Masukkan alamat email" id="email" name="email" value="<?= $alumni['email']; ?>"></span>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary">
                                                            <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                                                        </svg>Facebook</h6>
                                                    <span class="text-secondary col-sm-10"><input type="text" class="form-control" placeholder="Masukkan nama akun facebook" id="fb" name="fb" value="<?= $alumni['fb']; ?>"></span>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger">
                                                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                                            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                                        </svg>Instagram</h6>
                                                    <span class="text-secondary col-sm-10"><input type="text" class="form-control" placeholder="Masukkan username instagram" id="ig" name="ig" value="<?= $alumni['ig']; ?>"></span>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info">
                                                            <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
                                                        </svg>Twitter</h6>
                                                    <span class="text-secondary col-sm-10"><input type="text" class="form-control" placeholder="Masukkan username twitter" id="twitter" name="twitter" value="<?= $alumni['twitter']; ?>"></span>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-linkedin text-primary">
                                                            <circle cx="4" cy="5" r="2"></circle>
                                                            <rect x="2" y="10.25" width="4" height="11.75"></rect>
                                                            <path d="M17.3837 10c-1.8723 0-3.1275.9705-3.6414 1.891h-.0515v-1.6H10V22h3.8448v-5.7923c0-1.527.3074-3.0062 2.3097-3.0062 1.9735 0 1.9998 1.7467 1.9998 3.1043V22H22v-6.4224C22 12.4252 21.2806 10 17.3837 10" />
                                                        </svg>
                                                        LinkedIn
                                                    </h6>
                                                    <span class="text-secondary col-sm-10"><input type="url" class="form-control" placeholder="Masukkan link linkedin" id="linkedin" name="linkedin" value="<?= $alumni['linkedin']; ?>"></span>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity mr-2 icon-inline text-secondary">
                                                            <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                                                            <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                                                        </svg>Google Scholar</h6>
                                                    <span class="text-secondary col-sm-10"><input type="url" class="form-control" placeholder="Masukkan link gscholar" id="gscholar" name="gscholar" value="<?= $alumni['gscholar']; ?>"></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="card  card-secondary card-outline elevation-3">
                                    <div class="card-body">
                                        <div class="row mb-3">
                                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" placeholder="Masukkan nama" id="nama" name="nama" value="<?= $alumni['nama']; ?>" require>
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('nama'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <fieldset class="row mb-3">
                                            <label class="col-sm-2 col-form-label pt-0">Jenis Kelamin</label>
                                            <div class="col-sm-10">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Lk" <?= set_value('jenis_kelamin', $alumni['jenis_kelamin']) == 'Lk' ? "checked" : ""; ?> />
                                                    <label class="form-check-label text-primary" for="jenis_kelamin-laki">Laki-laki</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Pr" <?= set_value('jenis_kelamin', $alumni['jenis_kelamin']) == 'Pr' ? "checked" : ""; ?> />
                                                    <label class="form-check-label text-pink" for="jenis_kelamin">Perempuan</label>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <div class="row g-3 row mb-3">
                                            <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control <?= ($validation->hasError('tempat_lahir')) ? 'is-invalid' : ''; ?>" placeholder="Masukkan Tempat Lahir" id="tempat_lahir" name="tempat_lahir" value="<?= $alumni['tempat_lahir']; ?>">
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
                                                <input type="text" class="form-control" placeholder="Masukkan Nomor HP" id="telp_alumni" name="telp_alumni" value="<?= $alumni['telp_alumni']; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                            <div class="col-sm-10">
                                                <textarea type="text" class="form-control" placeholder="Masukkan alamat lengkap" id="alamat" name="alamat" rows="2"><?= $alumni['alamat_alumni']; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="negara" class="col-sm-2 col-form-label">Negara</label>
                                            <div class="col-sm-10">
                                                <select name="negara" id="negara" class="inputForm" onchange="displayDiv2('negaraLainIndonesia','negaraIndonesia',this)">
                                                    <?php if ($alumni['negara'] == NULL) : ?>
                                                        <option disabled selected>Pilih Negara</option>
                                                        <option value="Indonesia">Indonesia</option>
                                                        <option value="lainnya">Lainnya...</option>
                                                    <?php elseif ($alumni['negara'] == "Indonesia") : ?>
                                                        <option selected value="Indonesia">Indonesia</option>
                                                        <option value="lainnya">Lainnya...</option>
                                                    <?php else : ?>
                                                        <option value="<?= $alumni['negara'] ?>" selected>
                                                            <?= $alumni['negara'] ?>
                                                        </option>
                                                        <option value="Indonesia">Indonesia</option>
                                                        <option value="lainnya">Lainnya...</option>
                                                    <?php endif; ?>
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
                                                        <?php if ($alumni['provinsi'] != NULL) : ?>
                                                            <option selected disabled>
                                                                <?= $alumni['provinsi'] ?>
                                                            </option>
                                                            <?php foreach ($daftarProv as $prov) : ?>
                                                                <option id="<?= $prov->id_provinsi ?>" value="<?= $prov->nama_provinsi ?>"><?= $prov->nama_provinsi ?></option>
                                                            <?php endforeach ?>
                                                        <?php else : ?>
                                                            <option selected disabled>Pilih Provinsi</option>
                                                            <?php foreach ($daftarProv as $prov) : ?>
                                                                <option id="<?= $prov->id_provinsi ?>" value="<?= $prov->nama_provinsi ?>"><?= $prov->nama_provinsi ?></option>
                                                            <?php endforeach ?>
                                                        <?php endif; ?>
                                                    </select>
                                                    <input hidden type="text" name="prov" id="prov-hidden">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="kota" class="col-sm-2 col-form-label">Kota/Kabupaten</label>
                                                <div class="col-sm-10">
                                                    <select name='kabkota' id='kabkota' class='inputForm'>
                                                        <?php if ($alumni['kota'] != NULL) : ?>
                                                            <option selected disabled>
                                                                <?= $alumni['kota'] ?>
                                                            </option>
                                                        <?php else : ?>
                                                            <option selected disabled>Pilih Kabupaten/Kota</option>
                                                        <?php endif; ?>
                                                    </select>
                                                    <input hidden type="text" name="kab" id="kab-hidden">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="jabatan_terakhir" class="col-sm-2 col-form-label">Jabatan Terakhir</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control <?= ($validation->hasError('jabatan_terakhir')) ? 'is-invalid' : ''; ?>" placeholder="Masukkan Jabatan Terakhir" id="jabatan_terakhir" name="jabatan_terakhir" value="<?= $alumni['jabatan_terakhir']; ?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('jabatan_terakhir'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="nip" class="col-sm-2 col-form-label">NIP</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" placeholder="Masukkan NIP" id="nip" name="nip" value="<?= $alumni['nip']; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="nip_bps" class="col-sm-2 col-form-label">NIP BPS</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" placeholder="Masukkan NIP BPS" id="nip_bps" name="nip_bps" value="<?= $alumni['nip_bps']; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="perkiraan_pensiun" class="col-sm-2 col-form-label pt-0">Perkiraan Pensiun</label>
                                            <div class="col-sm-10">
                                                <input type="number" name="perkiraan_pensiun" id="perkiraan_pensiun" min="1950" max="2100" class="inputForm" value="<?= $alumni['perkiraan_pensiun']; ?>" required>
                                            </div>
                                        </div>
                                        <fieldset class="row mb-3">
                                            <label class="col-sm-2 col-form-label pt-0">Status Bekerja</label>
                                            <div class="col-sm-10">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="status_bekerja" id="bekerja" value="1" <?= set_value('status_bekerja', $alumni['status_bekerja']) == 1 ? "checked" : ""; ?> />
                                                    <label class="form-check-label text-primary" for="bekerja">
                                                        Bekerja
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="status_bekerja" id="tidakbekerja" value="0" <?= set_value('status_bekerja', $alumni['status_bekerja']) == 0 ? "checked" : ""; ?> />
                                                    <label class="form-check-label text-danger" for="tidakbekerja">
                                                        Tidak Bekerja
                                                    </label>
                                                </div>
                                        </fieldset>
                                        <fieldset class="row mb-3">
                                            <label class="col-sm-2 col-form-label pt-0">Aktif PNS</label>
                                            <div class="col-sm-10">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="aktif_pns" id="aktif" value="1" <?= set_value('aktif_pns', $alumni['aktif_pns']) == 1 ? "checked" : ""; ?> />
                                                    <label class="form-check-label text-primary" for="aktif">
                                                        Aktif
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="aktif_pns" id="tidakaktif" value="0" <?= set_value('aktif_pns', $alumni['aktif_pns']) == 0 ? "checked" : ""; ?> />
                                                    <label class="form-check-label text-danger" for="tidakaktif">
                                                        Tidak Aktif
                                                    </label>
                                                </div>
                                        </fieldset>
                                        <div class="row mb-3">
                                            <label for="deskripsi" class="col-sm-2 col-form-label">Biografi</label>
                                            <div class="col-sm-10">
                                                <textarea type="text" class="form-control" placeholder="Masukkan Deskripsi" id="deskripsi" name="deskripsi" rows="2"><?= $alumni['deskripsi']; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="flex justify-end">
                                            <button type="submit" class="w-28  mr-3 text-center py-1 bg-primarySidebar hover:bg-secondaryhover text-white rounded-full cursor-pointer focus:outline-none">SIMPAN</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <!-- Instansi -->
                            <div class="card card-secondary card-outline elevation-3">
                                <div class="card-body">
                                    <h2 class="row mb-3 text-info">Instansi</h2>
                                    <form action="/admin/addTempatKerja" method="post" enctype="multipart/form-data">
                                        <div class="row mb-3">
                                            <label for="nama_instansi" class="col-sm-2 col-form-label">Nama Instansi</label>
                                            <div class="col-sm-10">
                                                <input list="daftarInstansi" class="form-control <?= ($validation->hasError('nama_instansi')) ? 'is-invalid' : ''; ?>" placeholder="Masukkan nama instansi" id="nama_instansi" name="nama_instansi" value="<?= $value; ?>">
                                                <datalist id="daftarInstansi" class="font-paragraph">
                                                    <?php foreach ($tempat_kerja as $row) : ?>
                                                        <option data-value="<?= $row->id_tempat_kerja ?>"><?= $row->nama_instansi ?></option>
                                                    <?php endforeach; ?>
                                                </datalist>
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('nama_instansi'); ?>
                                                </div>
                                            </div>
                                            <input type="hidden" name="id_tempat_kerja" id="instansi-hidden">
                                        </div>
                                        <div class="flex justify-end">
                                            <button type="submit" class="w-28  mr-3 text-center py-1 bg-primarySidebar hover:bg-secondaryhover text-white rounded-full cursor-pointer focus:outline-none">SIMPAN</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- PENDIDIKAN -->
                            <div class="card card-secondary card-outline elevation-3">
                                <div class="card-body">
                                    <h2 class="row mb-3 text-info">Pendidikan</h2>
                                    <table class="w-full sm:text-sm rounded-3xl shadow-2xl md:shadow-none font-paragraph">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-center">No</th>
                                                <th scope="col">Jenjang</th>
                                                <th scope="col">Instansi</th>
                                                <th scope="col">Program Studi</th>
                                                <th scope="col" class="w-1/12"> Tahun Masuk </th>
                                                <th scope="col"> Tahun Lulus </th>
                                                <th scope="col">Judul Tulisan</th>
                                                <th scope="col" class="text-center">Aksi</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $n = 1;
                                            foreach ($pendidikan as $row) : ?>
                                                <tr class="border-t-2 border-b-2 bg-white">
                                                    <td class="text-center py-3"><?= $n ?></td>
                                                    <td><?= $row->jenjang ?></td>
                                                    <td><?= $row->instansi ?></td>
                                                    <td><?= $row->program_studi ?></td>
                                                    <td><?= $row->tahun_masuk ?></td>
                                                    <td><?= $row->tahun_lulus ?></td>
                                                    <td><?= $row->judul_tulisan ?></td>
                                                    <td>
                                                        <div class="flex justify-center">
                                                            <div class="editPendidikan cursor-pointer mr-1" onclick="formPendidikan('<?= $row->id_pendidikan ?>', '<?= $row->jenjang ?>', '<?= $row->instansi ?>', '<?= $row->program_studi ?>', '<?= $row->tahun_masuk ?>', '<?= $row->tahun_lulus ?>', '<?= $row->angkatan ?>', '<?= $row->nim ?>', '<?= $row->judul_tulisan ?>')"><svg class="lg:w-5 lg:h-5 w-4 h-4" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M16.1536 9.99923C15.6928 9.99923 15.3203 10.3726 15.3203 10.8325V17.4992C15.3203 17.9584 14.9469 18.3325 14.487 18.3325H2.82031C2.36026 18.3325 1.98703 17.9584 1.98703 17.4992V5.83252C1.98703 5.37338 2.36026 4.99924 2.82031 4.99924H9.48702C9.94783 4.99924 10.3203 4.62585 10.3203 4.16595C10.3203 3.7059 9.94783 3.33252 9.48702 3.33252H2.82031C1.44198 3.33252 0.320312 4.45419 0.320312 5.83252V17.4992C0.320312 18.8775 1.44198 19.9992 2.82031 19.9992H14.487C15.8653 19.9992 16.987 18.8775 16.987 17.4992V10.8325C16.987 10.3717 16.6144 9.99923 16.1536 9.99923Z" fill="black" />
                                                                    <path d="M8.13522 9.24029C8.07693 9.29858 8.03771 9.37273 8.02108 9.45269L7.43194 12.3995C7.40447 12.536 7.44781 12.6769 7.54607 12.7761C7.62527 12.8552 7.73193 12.8977 7.84118 12.8977C7.86773 12.8977 7.89535 12.8952 7.92281 12.8894L10.8687 12.3003C10.9503 12.2835 11.0245 12.2444 11.082 12.186L17.6753 5.59268L14.7294 2.64697L8.13522 9.24029Z" fill="black" />
                                                                    <path d="M19.7124 0.609397C18.9 -0.203132 17.5783 -0.203132 16.7665 0.609397L15.6133 1.76266L18.5591 4.70851L19.7124 3.5551C20.1058 3.16265 20.3224 2.63927 20.3224 2.08263C20.3224 1.52599 20.1058 1.00262 19.7124 0.609397Z" fill="black" />
                                                                </svg>
                                                            </div>
                                                            <div class="hapusPendidikan cursor-pointer" onclick="hapusPendidikan('<?= $row->id_pendidikan ?>')"><svg class="lg:w-5 lg:h-5 w-4 h-4" viewBox="0 0 19 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M15.492 3.84814L14.2169 18.3784H4.86875L3.5939 3.84814L1.97852 3.98975L3.27664 18.7835C3.34496 19.4654 3.9366 20 4.6239 20H14.4617C15.1488 20 15.7407 19.4657 15.8101 18.7738L17.1074 3.98975L15.492 3.84814Z" fill="black" />
                                                                    <path d="M12.5141 0H6.56816C5.82301 0 5.2168 0.60621 5.2168 1.35137V3.91894H6.8384V1.6216H12.2438V3.9189H13.8654V1.35133C13.8655 0.60621 13.2593 0 12.5141 0Z" fill="black" />
                                                                    <path d="M18.1901 3.10791H0.892851C0.445 3.10791 0.0820312 3.47088 0.0820312 3.91873C0.0820312 4.36658 0.445 4.72955 0.892851 4.72955H18.1901C18.638 4.72955 19.001 4.36658 19.001 3.91873C19.001 3.47088 18.638 3.10791 18.1901 3.10791Z" fill="black" />
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php $n = $n + 1;
                                            endforeach; ?>
                                            <tr class="formEdit">
                                                <td colspan="8" class="border-b-2">
                                                    <div class="ml-auto mr-3 bg-primarySidebar text-white rounded-full w-28 py-1 text-center cursor-pointer hover:bg-secondaryhover transition-colors duration-300 my-2 tambahPendidikan">TAMBAH</div>
                                                </td>
                                            </tr>
                                            <?php if ($pendidikan == NULL) : ?>
                                                <tr>
                                                    <td colspan="8" class="text-sm text-center border-b-2 border-gray-200 px-3 lg:px-5 py-2 md:py-3 lg:py-4">Riwayat pendidikan tidak ditemukan.</td>
                                                </tr>
                                            <?php endif; ?>
                                            <tr class="h-5 formEdit">
                                                <td colspan="8" class="rounded-b-3xl"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- PRESTASI -->
                            <div class="card card-secondary card-outline elevation-3">
                                <div class="card-body">
                                    <h2 class="row mb-3 text-info">Prestasi</h2>
                                    <table class="w-full sm:text-sm rounded-3xl shadow-2xl md:shadow-none font-paragraph">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-center ">No</th>
                                                <th scope="col">Nama Prestasi</th>
                                                <th scope="col">Tahun</th>
                                                <th scope="col" class="text-center">Aksi</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $n = 1;
                                            foreach ($prestasi as $row) : ?>
                                                <tr class="border-t-2 border-b-2 bg-white">
                                                    <td class="text-center py-3"><?= $n ?></td>
                                                    <td><?= $row->nama_prestasi ?></td>
                                                    <td><?= $row->tahun_prestasi ?></td>
                                                    <td>
                                                        <div class="flex justify-center">
                                                            <div class="editPrestasi cursor-pointer mr-1" onclick="formPrestasi('<?= $row->id_prestasi ?>', '<?= $row->nama_prestasi ?>', '<?= $row->tahun_prestasi ?>')"><svg class="lg:w-5 lg:h-5 w-4 h-4" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M16.1536 9.99923C15.6928 9.99923 15.3203 10.3726 15.3203 10.8325V17.4992C15.3203 17.9584 14.9469 18.3325 14.487 18.3325H2.82031C2.36026 18.3325 1.98703 17.9584 1.98703 17.4992V5.83252C1.98703 5.37338 2.36026 4.99924 2.82031 4.99924H9.48702C9.94783 4.99924 10.3203 4.62585 10.3203 4.16595C10.3203 3.7059 9.94783 3.33252 9.48702 3.33252H2.82031C1.44198 3.33252 0.320312 4.45419 0.320312 5.83252V17.4992C0.320312 18.8775 1.44198 19.9992 2.82031 19.9992H14.487C15.8653 19.9992 16.987 18.8775 16.987 17.4992V10.8325C16.987 10.3717 16.6144 9.99923 16.1536 9.99923Z" fill="black" />
                                                                    <path d="M8.13522 9.24029C8.07693 9.29858 8.03771 9.37273 8.02108 9.45269L7.43194 12.3995C7.40447 12.536 7.44781 12.6769 7.54607 12.7761C7.62527 12.8552 7.73193 12.8977 7.84118 12.8977C7.86773 12.8977 7.89535 12.8952 7.92281 12.8894L10.8687 12.3003C10.9503 12.2835 11.0245 12.2444 11.082 12.186L17.6753 5.59268L14.7294 2.64697L8.13522 9.24029Z" fill="black" />
                                                                    <path d="M19.7124 0.609397C18.9 -0.203132 17.5783 -0.203132 16.7665 0.609397L15.6133 1.76266L18.5591 4.70851L19.7124 3.5551C20.1058 3.16265 20.3224 2.63927 20.3224 2.08263C20.3224 1.52599 20.1058 1.00262 19.7124 0.609397Z" fill="black" />
                                                                </svg>
                                                            </div>
                                                            <div class="hapusPrestasi cursor-pointer" onclick="hapusPrestasi('<?= $row->id_prestasi ?>')"><svg class="lg:w-5 lg:h-5 w-4 h-4" viewBox="0 0 19 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M15.492 3.84814L14.2169 18.3784H4.86875L3.5939 3.84814L1.97852 3.98975L3.27664 18.7835C3.34496 19.4654 3.9366 20 4.6239 20H14.4617C15.1488 20 15.7407 19.4657 15.8101 18.7738L17.1074 3.98975L15.492 3.84814Z" fill="black" />
                                                                    <path d="M12.5141 0H6.56816C5.82301 0 5.2168 0.60621 5.2168 1.35137V3.91894H6.8384V1.6216H12.2438V3.9189H13.8654V1.35133C13.8655 0.60621 13.2593 0 12.5141 0Z" fill="black" />
                                                                    <path d="M18.1901 3.10791H0.892851C0.445 3.10791 0.0820312 3.47088 0.0820312 3.91873C0.0820312 4.36658 0.445 4.72955 0.892851 4.72955H18.1901C18.638 4.72955 19.001 4.36658 19.001 3.91873C19.001 3.47088 18.638 3.10791 18.1901 3.10791Z" fill="black" />
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php $n = $n + 1;
                                            endforeach; ?>
                                            <tr class="formEdit">
                                                <td colspan="8" class="border-b-2">
                                                    <div class="ml-auto mr-3 bg-primarySidebar text-white rounded-full w-28 py-1 text-center cursor-pointer hover:bg-secondaryhover transition-colors duration-300 my-2 tambahPrestasi" onclick="tambahPrestasi()">TAMBAH</div>
                                                </td>
                                            </tr>
                                            <?php if ($prestasi == NULL) : ?>
                                                <tr>
                                                    <td colspan="8" class="text-sm text-center border-b-2 border-gray-200 px-3 lg:px-5 py-2 md:py-3 lg:py-4">Prestasi tidak ditemukan.</td>
                                                </tr>
                                            <?php endif; ?>
                                            <tr class="h-5 formEdit">
                                                <td colspan="8" class="rounded-b-3xl"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="card card-secondary card-outline elevation-3">
                                <form action="/Admin/simpanDataAlumni" method="POST" class="justify-center text-white flex justify-end">
                                    <button id="tambahDataAlumni" name="tambahDataAlumni" class="w-24 text-center py-1 bg-primarySidebar hover:bg-secondaryhover text-white rounded-full cursor-pointer focus:outline-none">SELESAI</button>
                                </form>
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