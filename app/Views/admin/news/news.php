<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<script>
    let show = [];
    let Toast = Swal.mixin({
        toast: true,
        position: 'center',
        showConfirmButton: false,
        timer: 3000
    });

    function delete_news(id) {
        Swal.fire({
            icon: 'question',
            text: 'Are you sure to delete news ?',
            showCancelButton: true,
            confirmButtonColor: '#54AC00',
            cancelButtonColor: '#D81B01',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '<?= base_url() ?>/admin/berita/delete/' + id
            }
        })
    }
</script>

<div class="content-wrapper pb-5">
    <div class="content-header">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right text-sm mr-3">
                    <li class="breadcrumb-item"><a href="<?= base_url("/admin") ?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url("admin/berita") ?>">Berita</a></li>
                    <li class="breadcrumb-item active"><span class="text-secondary">List Berita</span></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>

    <div class="container-fluid px-4" style="font-size: small;">
        <div class="alert-content">
            <?= session()->getFlashdata('status'); ?>
            <?= session()->getFlashdata('status'); ?>
        </div>

        <div class="row">
            <div class="col-12">
                <div id="container-news">

                    <?php foreach ($data as $dataset) : ?>
                        <div class="card card-widget">
                            <div class="card-header">
                                <div class="user-block">
                                    <img class="img-circle" src="<?= base_url('/berita/berita_' . $dataset['id'] . '/' . $dataset['thumbnail']) ?>" alt="Thumbnail Berita">
                                    <span class="username"><a href="<?= base_url('admin/berita/view/' . $dataset['id']) ?>"><?= $dataset['author'] ?></a></span>

                                    <?php if ($dataset['akses'] != 'private' && $dataset['akses'] != 'public') : ?>
                                        <span class="description">Shared to <span title="Share only for the <?= $dataset['akses'] ?> groups">several groups</span> - <?= $dataset['tanggal_publish'] ?>&emsp;<i class="fas fa-eye" title="<?= $dataset['visited']['visited'] ?> kali dikunjungi"></i>&ensp;<?= $dataset['visited']['visited'] ?>&emsp;<i class="far fa-chart-bar" title="<?= $dataset['visited']['hits'] ?> kali dilihat"></i>&ensp;<?= $dataset['visited']['hits'] ?></span>
                                    <?php else : ?>
                                        <span class="description">Shared to <?= $dataset['akses'] ?> - <?= $dataset['tanggal_publish'] ?>&emsp;<i class="fas fa-eye" title="<?= $dataset['visited']['visited'] ?> kali dikunjungi"></i>&ensp;<?= $dataset['visited']['visited'] ?>&emsp;<i class="far fa-chart-bar" title="<?= $dataset['visited']['hits'] ?> kali dilihat"></i>&ensp;<?= $dataset['visited']['hits'] ?></span>
                                    <?php endif; ?>
                                </div>
                                <!-- /.user-block -->
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" title="Mark as read">
                                        <i class="far fa-circle"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <!-- post text -->
                                <?= $dataset['konten'] ?>
                                <br>
                                <a href="javascript:void(0)" class="float-right text-muted" id="count-comment-<?= $dataset['id'] ?>"><?= $dataset['count_comments'] ?> comments</a>
                                <button type="button" class="btn btn-default btn-sm" onclick=" window.location.href = '<?= base_url('/admin/berita/update/' . $dataset['id']) ?>'"><i class="fas fa-pen"></i> Edit</button>
                                <button type="button" class="btn btn-default btn-sm" onclick="delete_news('<?= $dataset['id'] ?>')"><i class="fas fa-trash"></i> Delete</button>
                            </div>
                        </div>
                        <br>
                    <?php endforeach ?>
                </div>
            </div>
        </div>

    </div>
</div>

<?= $this->endSection(); ?>