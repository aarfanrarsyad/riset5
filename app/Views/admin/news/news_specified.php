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

    function get_comments(data, all = null) {

        $.ajax({
            url: "<?= base_url('admin/berita/get-comments') ?>",
            method: "POST",
            dataType: "JSON",
            cache: false,
            data: {
                data: data,
                all: all
            },
            success: function(result) {
                for (let i = 0; i < result.length; i++) {
                    let comments = $('#comments-content-' + result[i].news_id);
                    let comm_count = $('#count-comment-' + result[i].news_id);

                    comments.empty();
                    comm_count.empty();
                    comments.html(result[i].html);
                    comm_count.html(result[i].count + ' comments');
                }
            }
        })
    }

    function show_less_comments(id) {
        $('#set-length-comments-' + id).html('Lihat semua komentar');
        $('#set-length-comments-' + id).attr('onclick', 'show_all_comments(' + id + ')');

        get_comments([id])
    }

    function show_all_comments(id) {
        $('#set-length-comments-' + id).html('Tampilkan lebih sedikit')
        $('#set-length-comments-' + id).attr('onclick', 'show_less_comments(' + id + ')')

        get_comments([id], all = true)
    }

    function push_comment() { //Ini kan reload semua comment dengan limit, mungkin biar engga berat difokuskan saja cuman sebagian berita
        let news = [];

        $('.comments-content').each(function(i) {
            news.push($(this).data('news'));
        })

        get_comments(news)
    }

    function post_comment(id) {
        let comment = $('#comments-' + id).val();
        if (comment.trim().length === 0) return false;

        $.ajax({
            url: "<?= base_url('admin/berita/post-comment') ?>",
            method: "POST",
            dataType: "JSON",
            cache: false,
            data: {
                news_id: id,
                data: comment,
            },
            success: function(result) {
                if (result === true) {
                    push_comment();
                    $('#comments-' + id).val('');
                } else {
                    $(document).Toasts('create', {
                        title: 'Terjadi Kesalahan',
                        subtitle: 'Error',
                        autohide: true,
                        delay: 2000,
                        body: 'Tidak dapat mengirimkan komentar.'
                    })
                }
            }
        })
    }

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

    function delete_comment(id, news_id) {
        Swal.fire({
            icon: 'question',
            text: 'Apakah anda yakin ingin menghapus komentar ini?',
            showCancelButton: true,
            confirmButtonColor: '#4248ED',
            cancelButtonColor: '#33A1C4',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal',
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "<?= base_url('admin/berita/delete-comment') ?>",
                    method: "POST",
                    dataType: "JSON",
                    cache: false,
                    data: {
                        id: id,
                    },
                    success: function(result) {
                        if (result === true) {
                            get_comments([news_id])
                        } else {
                            $(document).Toasts('create', {
                                title: 'Terjadi Kesalahan',
                                subtitle: 'Error',
                                autohide: true,
                                delay: 2000,
                                body: 'Tidak dapat menghapus komentar.'
                            })
                        }
                    }
                })
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
                    <li class="breadcrumb-item"><a href="<?= base_url("/") ?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url("setting-aplikasi/berita/umum") ?>">Berita</a></li>
                    <li class="breadcrumb-item active"><span class="text-secondary">Umum</span></li>
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

                    <div class="card card-widget">
                        <div class="card-header">
                            <div class="user-block">

                                <img class="img-circle" src="<?= base_url('/berita/berita_' . $dataset['id'] . '/' . $dataset['thumbnail']) ?>" alt="Thumbnail Berita">
                                <span class="username"><a href="javascript:void(0)"><?= $dataset['author'] ?></a></span>

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
                            <a href="javascript:void(0)" onclick="show_all_comments(<?= $dataset['id'] ?>)" class="float-right text-muted" id="count-comment-<?= $dataset['id'] ?>"><?= $dataset['count_comments'] ?> comments</a>
                            <button type="button" class="btn btn-default btn-sm" onclick=" window.location.href = '<?= base_url('/admin/berita/update/' . $dataset['id']) ?>'"><i class="fas fa-pen"></i> Edit</button>
                            <button type="button" class="btn btn-default btn-sm" onclick="delete_news('<?= $dataset['id'] ?>')"><i class="fas fa-trash"></i> Delete</button>
                        </div>
                        <div class="card-footer card-comments comments-content" id="comments-content-<?= $dataset['id'] ?>" data-news="<?= $dataset['id'] ?>">

                            <?php $i = 1 ?>
                            <?php foreach ($dataset['comments'] as $comment) : ?>
                                <div class="card-comment <?= $i > 5 ? 'd-none' : '' ?>">
                                    <img class="img-circle img-sm" src="<?= base_url('users/profile/' . $comment['image']) ?>" alt="User Image">
                                    <div class="comment-text">
                                        <span class="username">
                                            <?= $comment['name'] ?>
                                            <div class="float-right">
                                                <span class="text-muted"><?= $comment['time'] ?></span>
                                                <div class="btn-group dropleft ml-2">
                                                    <a class="text-secondary" href="#" role="button" data-toggle="dropdown" style="font-weight: 100;">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="javascript:void(0)" onclick="delete_comment(<?= $comment['id'] ?>,<?= $dataset['id'] ?>)" style="font-size: 12px;">Hapus Komentar</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </span>
                                        <?= $comment['komentar'] ?>
                                    </div>
                                </div>
                                <?php $i++ ?>
                            <?php endforeach; ?>
                            <?php if ($dataset['count_comments'] > 5) : ?>
                                <br>,
                                <a href="javascript:void(0)" id="set-length-comments-<?= $dataset['id'] ?>" onclick="show_all_comments(<?= $dataset['id'] ?>)">Lihat semua komentar</a>
                            <?php endif; ?>

                        </div>

                        <div class="card-footer">
                            <img class="img-fluid img-circle img-sm" src="<?= base_url('users/profile/' . userdata()['image']) ?>" alt="Image User">
                            <div class="img-push row">
                                <input type="text" class="form-control form-control-sm col-md-11" placeholder="Press enter to post comment" id="comments-<?= $dataset['id'] ?>">
                                <span class="input-group-append col-md-1">
                                    <button type="button" class="btn btn-sm btn-primary" onclick="post_comment(<?= $dataset['id'] ?>)">Send</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?= $this->endSection(); ?>