<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<script>
    function CRUD_deleteInstansi(id, instansi) {
        Swal.fire({
            icon: 'question',
            text: 'Are you sure to delete ' + instansi + '?',
            showCancelButton: true,
            confirmButtonColor: '#4248ED',
            cancelButtonColor: '#33A1C4',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?= base_url('/admin/instansi/delete') ?>',
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        id: id
                    },
                    success: function(result) {
                        if (result === true) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: instansi + ' deleted successfully',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(function() {
                                window.location = "<?= base_url('admin/instansi') ?>";
                            })
                        } else {
                            Swal.fire({
                                icon: 'info',
                                title: 'Oops',
                                text: 'Something went wrong',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }
                    }
                });
            }
        })
    }
</script>

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
                                <h5><i class="fas fa-qrcode text-primaryHover"></i>&ensp;Daftar Instansi</h5>
                            </div>
                        </div>
                        <br>

                        <form action="" method="post">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Masukkan keyword pencarian..." name="keyword">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>
                                </div>
                            </div>
                            <a href="<?= base_url('/admin/alumni/tambah-instansi') ?>" class="btn btn-primary mb-1">Tambah Instansi</a>

                            <?php if (session()->getFlashdata('pesan')) : ?>
                                <div class="alert alert-success" role="alert">
                                    <?= session()->getFlashdata('pesan'); ?>
                                </div>
                            <?php endif; ?>

                            <table class="table">
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
        </section>
    </div>
</div>

<?= $this->endSection();