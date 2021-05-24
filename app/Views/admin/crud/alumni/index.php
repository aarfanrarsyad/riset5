<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<script>
    function CRUD_deleteAlumni(id, alumni) {
        Swal.fire({
            icon: 'question',
            text: 'Are you sure to delete ' + alumni + '?',
            showCancelButton: true,
            confirmButtonColor: '#4248ED',
            cancelButtonColor: '#33A1C4',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?= base_url('/admin/alumni/delete') ?>',
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
                                text: alumni + ' deleted successfully',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(function() {
                                window.location = "<?= base_url('admin/alumni') ?>";
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
                            <li class="breadcrumb-item text-muted"><span>Alumni</span></li>
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
                                <h5><i class="fas fa-qrcode text-primaryHover"></i>&ensp;Daftar Alumni</h5>
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
                            <a href="<?= base_url('/admin/alumni/tambah-alumni') ?>" class="btn btn-primary mb-1">Tambah Alumni</a>

                            <?php if (session()->getFlashdata('pesan')) : ?>
                                <div class="alert alert-success" role="alert">
                                    <?= session()->getFlashdata('pesan'); ?>
                                </div>
                            <?php endif; ?>

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Foto</th>
                                        <th scope="col">NIP</th>
                                        <th scope="col">NIP BPS</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $i = 1 + (10 * ($currentPage - 1)); ?>
                                    <?php foreach ($alumni as $alum) : ?>
                                        <tr>
                                            <th scope="row"><?= $i++; ?></th>
                                            <td><img src="img/<?= $alum['foto_profil']; ?>" alt="" class="foto"></td>
                                            <td><?= $alum['nip']; ?></td>
                                            <td><?= $alum['nip_bps']; ?></td>
                                            <td><?= $alum['nama']; ?></td>
                                            <td>
                                                <a href="/admin/alumni/<?= $alum['id_alumni']; ?>" class="btn btn-xs btn-outline-primary mr-1"><i class="fas fa-search"></i>&ensp;<span class="text-xs">Detail</span></a>
                                                <button type="button" class="btn btn-xs btn-outline-primary mr-1" onclick=""><i class="fas fa-edit"></i>&ensp;<span class="text-xs">Update</span></button>
                                                <button type="button" class="btn btn-xs btn-outline-primary" onclick="CRUD_deleteAlumni(<?= $alum['id_alumni']; ?>, '<?= $alum['nama']; ?>')"><i class="fas fa-trash"></i>&ensp;<span class="text-xs">Delete</span></button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </form>
                        <?= $pager->links('alumni', 'pagination_alumni'); ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>


<?= $this->endSection(); ?>