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
                        <h5><i class="fas fa-qrcode text-primaryHover"></i>&ensp;Detail Alumni</h5>
                    </div>
                </div>
                <div class="container">
                    <div class="main-body">
                        <div class="row gutters-sm">
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex flex-column align-items-center text-center">
                                            <img src="/img/<?= $alumni['foto_profil']; ?>" alt="Admin" class="rounded-circle" width="150">
                                            <div class="mt-3">
                                                <h4><?= $alumni['nama']; ?></h4>
                                                <a href="/admin/alumni/update-alumni/<?= $alumni['id_alumni']; ?>" class="btn btn-xs btn-outline-primary mr-1"><i class="fas fa-edit"></i>&ensp;<span class="text-xs">Update</span></a>
                                                <button type="button" class="btn btn-xs btn-outline-primary" onclick="CRUD_deleteAlumni(<?= $alumni['id_alumni']; ?>, '<?= $alumni['nama']; ?>')"><i class="fas fa-trash"></i>&ensp;<span class="text-xs">Delete</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mt-3">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info">
                                                    <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
                                                </svg>Twitter</h6>
                                            <span class="text-secondary"> <?= $alumni['twitter']; ?></span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger">
                                                    <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                                    <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                                </svg>Instagram</h6>
                                            <span class="text-secondary"><?= $alumni['ig']; ?></span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary">
                                                    <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                                                </svg>Facebook</h6>
                                            <span class="text-secondary"><?= $alumni['fb']; ?></span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-linkedin text-primary">
                                                    <circle cx="4" cy="5" r="2"></circle>
                                                    <rect x="2" y="10.25" width="4" height="11.75"></rect>
                                                    <path d="M17.3837 10c-1.8723 0-3.1275.9705-3.6414 1.891h-.0515v-1.6H10V22h3.8448v-5.7923c0-1.527.3074-3.0062 2.3097-3.0062 1.9735 0 1.9998 1.7467 1.9998 3.1043V22H22v-6.4224C22 12.4252 21.2806 10 17.3837 10" />
                                                </svg>
                                                LinkedIn
                                            </h6>
                                            <span class="text-secondary"><?= $alumni['linkedin']; ?></span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity mr-2 icon-inline text-secondary">
                                                    <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                                                    <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                                                </svg>Google Scholar</h6>
                                            <span class="text-secondary"><?= $alumni['gscholar']; ?></span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                            <h6 class="mb-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity mr-2 icon-inline">
                                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                                    <polyline points="22,6 12,13 2,6"></polyline>
                                                </svg>Email
                                            </h6>
                                            <span class="text-secondary"><?= $alumni['email']; ?></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">NIP</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <?= $alumni['nip']; ?>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">NIP BPS</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <?= $alumni['nip_bps']; ?>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Jenis Kelamin</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <?= $alumni['jenis_kelamin']; ?>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Tempat dan Tanggal Lahir</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <?= $alumni['tempat_lahir']; ?>, <?= DATE("d-m-Y", strtotime($alumni['tanggal_lahir'])); ?>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Telepon</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <?= $alumni['telp_alumni']; ?>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Alamat</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <?= $alumni['alamat_alumni']; ?>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Kota</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <?= $alumni['kota']; ?>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Provinsi</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <?= $alumni['provinsi']; ?>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Negara</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <?= $alumni['negara']; ?>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Status Bekerja</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <?= $alumni['status_bekerja']; ?>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Perkiraan Pensiun</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <?= $alumni['perkiraan_pensiun']; ?>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Jabatan Terakhir</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <?= $alumni['jabatan_terakhir']; ?>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Aktif PNS</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <?= $alumni['aktif_pns']; ?>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Deskripsi</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <?= $alumni['deskripsi']; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="card mb-3">
                                    <h1 class="card-title">Tempat Kerja Alumni</h1>
                                    <div class="card-body">
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Nama</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <?= $instansi['nama_instansi']; ?>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Alamat</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <?= $instansi['alamat_instansi']; ?>, <?= $instansi['kota']; ?> , <?= $instansi['provinsi']; ?>, <?= $instansi['negara']; ?>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Telepon</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <?= $instansi['telp_instansi']; ?>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Faks</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <?= $instansi['faks_instansi']; ?>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Email</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <?= $instansi['email_instansi']; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="card mb-3">
                                    <h1 class="card-title">Pendidikan</h1>
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Jenjang</th>
                                                    <th scope="col">Instansi</th>
                                                    <th scope="col">Angkatan</th>
                                                    <th scope="col">Tahun Masuk</th>
                                                    <th scope="col">Tahun Lulus</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach ($pendidikan as $pend) : ?>
                                                    <tr>
                                                        <th scope="row"><?= $i++; ?></th>
                                                        <td><?= $pend->jenjang ?></td>
                                                        <td><?= $pend->instansi ?></td>
                                                        <td><?= $pend->angkatan ?></td>
                                                        <td><?= $pend->tahun_masuk ?></td>
                                                        <td><?= $pend->tahun_lulus ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="card mb-3">
                                    <h1 class="card-title">Pendidikan Tinggi</h1>
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">NIM</th>
                                                    <th scope="col">Program Studi</th>
                                                    <th scope="col">Judul Tulisan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach ($pendidikan as $pend) : ?>
                                                    <tr>
                                                        <th scope="row"><?= $i++; ?></th>
                                                        <td><?= $pend->nim ?></td>
                                                        <td><?= $pend->program_studi ?></td>
                                                        <td><?= $pend->judul_tulisan ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="card mb-3">
                                    <h1 class="card-title">Prestasi</h1>
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Nama Prestasi</th>
                                                    <th scope="col">Tahun Prestasi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach ($prestasi as $pres) : ?>
                                                    <tr>
                                                        <th scope="row"><?= $i++; ?></th>
                                                        <td><?= $pres->nama_prestasi ?></td>
                                                        <td><?= $pres->tahun_prestasi ?></td>
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
</div>
<?= $this->endSection(); ?>