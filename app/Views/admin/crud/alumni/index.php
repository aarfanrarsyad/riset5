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
                        <h5><i class="fas fa-user text-primaryHover"></i>&ensp;Daftar Alumni</h5>
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
                                    <a class="dropdown-item" href="<?= base_url('/admin/alumni/tambah-alumni') ?>" onclick="CRUD_createAlumni()"><i class="fas fa-plus-square"></i>&ensp;Add new alumni</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <table class="table table-hover table-sm text-sm" id="alumni-table">
                                        <thead>
                                            <tr>
                                                <th scope="col">No.</th>
                                                <th scope="col">Foto</th>
                                                <th scope="col">NIP</th>
                                                <th scope="col">NIP BPS</th>
                                                <th scope="col">ID Alumni</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $i = 1 + (10 * ($currentPage - 1)); ?>
                                            <?php foreach ($alumni as $alum) : ?>
                                                <tr>
                                                    <th scope="row"><?= $i++; ?></th>
                                                    <td><img src="/img/<?= $alum['foto_profil']; ?>" alt="Foto Profil" class="foto"></td>
                                                    <td><?= $alum['nip']; ?></td>
                                                    <td><?= $alum['nip_bps']; ?></td>
                                                    <td><?= $alum['id_alumni']; ?></td>
                                                    <td><?= $alum['nama']; ?></td>
                                                    <td>
                                                        <a href="/admin/alumni/<?= $alum['id_alumni']; ?>" class="btn btn-xs btn-outline-primary mr-1"><i class="fas fa-search"></i>&ensp;<span class="text-xs">Detail</span></a>
                                                        <a href="/admin/alumni/update-alumni/<?= $alum['id_alumni']; ?>" class="btn btn-xs btn-outline-primary mr-1"><i class="fas fa-edit"></i>&ensp;<span class="text-xs">Update</span></a>
                                                        <button type="button" class="btn btn-xs btn-outline-primary" onclick="CRUD_deleteAlumni(<?= $alum['id_alumni']; ?>, '<?= $alum['nama']; ?>')"><i class="fas fa-trash"></i>&ensp;<span class="text-xs">Delete</span></button>
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
<?= $this->endSection(); ?>