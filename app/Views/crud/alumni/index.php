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
                        <h1 class="h3 mb-4 text-gray-800">Admin Index</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right text-sm">
                            <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
                            <li class="breadcrumb-item text-muted"><span>Home Page</span></li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="mt-2">Daftar Alumni</h1>
                    <form action="" method="post">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Masukkan keyword pencarian..." name="keyword">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>
                            </div>
                        </div>
                        <a href="<?= base_url('/admin/tambah-alumni') ?>" class="btn btn-primary mt-3">Tambah Alumni</a>
                    </form>
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
                                <th scope="col">NIM</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1 + (10 * ($currentPage - 1)); ?>
                            <?php foreach ($alumni as $alum) : ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><img src="img/avatar.png" alt="" class="foto"></td>
                                    <td><?= $alum['nim']; ?></td>
                                    <td><?= $alum['nama']; ?></td>
                                    <td>
                                        <a href="/admin/alumni/<?= $alum['nim']; ?>" class="btn btn-xs btn-outline-primary mr-1"><i class="fas fa-search"></i>&ensp;<span class="text-xs">Detail</span></a>
                                        <button type="button" class="btn btn-xs btn-outline-primary mr-1" onclick=""><i class="fas fa-edit"></i>&ensp;<span class="text-xs">Update</span></button>
                                        <button type="button" class="btn btn-xs btn-outline-primary" onclick="CRUD_deleteAlumni(<?= $alum['id']; ?>, '<?= $alum['nama']; ?>')"><i class="fas fa-trash"></i>&ensp;<span class="text-xs">Delete</span></button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?= $pager->links('alumni', 'pagination_alumni'); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>