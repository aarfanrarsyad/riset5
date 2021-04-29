<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<script>
    function CRUD_deletePublikasi(id, publikasi) {
        Swal.fire({
            icon: 'question',
            text: 'Are you sure to delete ' + publikasi + '?',
            showCancelButton: true,
            confirmButtonColor: '#4248ED',
            cancelButtonColor: '#33A1C4',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?= base_url('/admin/publikasi/delete') ?>',
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
                                text: publikasi + ' deleted successfully',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(function() {
                                window.location = "<?= base_url('admin/publikasi') ?>";
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
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="mt-2">Daftar Publikasi</h1>
                    <form action="" method="post">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Masukkan keyword pencarian..." name="keyword">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>
                            </div>
                        </div>
                        <a href="<?= base_url('') ?>" class="btn btn-primary mt-3">Tambah Publikasi</a>
                    </form>
                    <?php if (session()->getFlashdata('pesan')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= session()->getFlashdata('pesan'); ?>
                        </div>
                    <?php endif; ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Topik</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col">Publisher</th>
                                <th scope="col">Tanggal Disahkan</th>
                                <th scope="col">Author</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1 + (10 * ($currentPage - 1)); ?>
                            <?php foreach ($publikasi as $pub) : ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><?= $pub->judul ?></td>
                                    <td><?= $pub->topik ?></td>
                                    <td><?= $pub->deskripsi ?></td>
                                    <td><?= $pub->publisher ?></td>
                                    <td> <?= DATE("d-m-Y", strtotime($pub->tanggal_disahkan)); ?></td>
                                    <td><?= $pub->author ?></td>
                                    <td>
                                        <button type="button" class="btn btn-xs btn-outline-primary mr-1" onclick=""><i class="fas fa-edit"></i>&ensp;<span class="text-xs">Update</span></button>
                                        <button type="button" class="btn btn-xs btn-outline-primary" onclick="CRUD_deletePublikasi(<?= $pub->id_publikasi ?>, '<?= $pub->judul ?>')"><i class="fas fa-trash"></i>&ensp;<span class="text-xs">Delete</span></button>
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

<?= $this->endSection();
