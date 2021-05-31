<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<script>
    var myChart

    function initialize_chart(data) {
        var ctx = document.getElementById('visitor').getContext('2d');
        myChart = new Chart(ctx, {
            type: 'line',
            data: data,
            options: {
                animations: {
                    tension: {
                        duration: 1000,
                        easing: 'linear',
                        from: 1,
                        to: 0,
                        loop: true
                    }
                },
            }
        });
    }

    function get_content(id) {
        $.ajax({
            url: "<?= base_url('admin/berita/get-content') ?>",
            method: "POST",
            dataType: "JSON",
            cache: false,
            data: {
                id: id,
            },
            success: function(result) {
                let header = result.judul + '&ensp;<span class="text-xs"><strong><sup>1 </sup>' + result.author + '</strong>, ' + result.tanggal_publish + '. <i>Share to ' + result.akses + '</i></span>'
                $('.count_view').html(result.visited['visited'])
                $('.count_hits').html(result.visited['hits'])
                $('.count_comments').html(result.count_comments)
                $('#preview-header').html(header)
                $('#news-preview .modal-body .container').html(result.konten)
                $('#news-preview').modal('show')
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

    function change_access(event) {
        let id = $(event.target).attr("data-news");
        let val = $(event.target).val();
        $.ajax({
            url: "<?= base_url('admin/berita/change-access') ?>",
            method: "POST",
            dataType: "JSON",
            cache: false,
            data: {
                id: id,
                val: val
            },
            success: function(result) {
                if (result === true) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Akses berita berhasil diperbarui',
                        showConfirmButton: false,
                        timer: 1500
                    })
                } else {
                    Swal.fire({
                        icon: 'info',
                        title: 'Terjadi Kesalahan',
                        text: 'Akses berita gagal diperbarui',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function() {
                        window.location = "<?= base_url('admin/berita') ?>";
                    })
                }
            }
        })
    }

    function activate_news(event) {
        let id = $(event.target).attr("data-news");
        $.ajax({
            url: "<?= base_url('admin/berita/activate') ?>",
            method: "POST",
            dataType: "JSON",
            cache: false,
            data: {
                id: id,
            },
            success: function(result) {
                if (result === true) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Status berita berhasil diperbarui',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function() {
                        window.location = "<?= base_url('admin/berita') ?>";
                    })
                } else {
                    Swal.fire({
                        icon: 'info',
                        title: 'Terjadi Kesalahan',
                        text: 'Status berita gagal diperbarui',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            }
        })
    }

    function news_analysis(id) {
        $.ajax({
            url: "<?= base_url('admin/berita/analysis') ?>",
            method: "POST",
            dataType: "JSON",
            cache: false,
            beforeSend: function() {
                var $overlay = '<div class="overlay-wrapper">' +
                    '<div class="overlay"><i class="fas fa-spinner fa-3x fa-spin text-info"></i>' +
                    '<div class="text-secondary text-bold pt-2 px-2">Loading...</div>' +
                    ' </div>' +
                    '</div>';
                $('.content-wrapper').append($overlay);
            },
            complete: function() {
                $('.content-wrapper .overlay-wrapper').remove();
            },
            data: {
                id: id,
            },
            success: function(result) {

                $('.canvas_visitor').html('<canvas id="visitor" height="200"></canvas>')
                initialize_chart(result[0])
                $('#table_ip_visits tbody').html(result[2])
                $('#user_comments tbody').html(result[3])
                $('.visited').html(result[1].visited)
                $('.hits').html(result[1].hits)
                $('.comments').html(result[1].comments)
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
                            return news_analysis(news_id)
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
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?= session()->getFlashdata('status'); ?>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right text-sm mr-2">
                        <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
                        <li class="breadcrumb-item text-muted"><span>News Management</span></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="container-fluid px-4 pb-5">
        <div class="response">
            <?= view('Myth\Auth\Views\_message_block') ?>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card card-light card-outline card-outline-tabs elevation-3">
                    <div class="text-primaryHover text-lg px-3 py-3">
                        <h5><i class="fas fa-book-reader"></i>&ensp;Management Berita</h5>
                    </div>
                    <div class="card-header mt-2 p-0 border-bottom-0 ">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link text-secondary" data-toggle="pill" href="#tab1" role="tab" aria-controls="tab1" aria-selected="false">Daftar Berita &ensp;
                                    <span class="badge bg-indigo right" title="<?= count($data) ?> Data Berita"><i class="far fa-bell"></i> <?= count($data) ?></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-secondary" data-toggle="pill" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false">Request Berita &ensp;
                                    <span class="badge bg-indigo right" title="<?= count($inactive) ?> Request Berita"><i class="far fa-bell"></i> <?= count($inactive) ?></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-secondary active" data-toggle="pill" href="#tab3" role="tab" aria-controls="tab3" aria-selected="false">Track Visits &ensp;
                                    <span class="badge bg-teal right"><i class="far fa-chart-bar"></i></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane fade" id="tab1" role="tabpanel" aria-labelledby="tabs-for-calculate">
                                <div class="btn-group">
                                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-th-list text-muted"></i>&ensp;Pilih Tindakan
                                    </button>
                                    <div class="dropdown-menu text-sm">
                                        <a class="dropdown-item" href="<?= base_url('admin/berita/insert') ?>"><i class="fas fa-plus-square"></i>&ensp;Tambahkan Berita Baru</a>
                                        <a class="dropdown-item" href="<?= base_url('admin/berita/list-berita') ?>"><i class="fas fa-book-reader"></i>&ensp;Tampilkan Berita</a>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col">
                                        <table class="table table-sm table-striped">
                                            <thead>
                                                <tr>
                                                    <td class="text-center">#</td>
                                                    <td class="text-center">Berita</td>
                                                    <td class="text-center">Tanggal Terbit</td>
                                                    <td>Penulis</td>
                                                    <td>Judul</td>
                                                    <td class="text-center">Keterangan</td>
                                                    <td class="text-center">Akses</td>
                                                    <td class="text-center">Action</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1 ?>
                                                <?php foreach ($data as $dataset) : ?>
                                                    <tr>
                                                        <td class="text-center"><?= $i ?></td>
                                                        <td class="text-center"><img class="img-fluid border" src="<?= base_url('berita/berita_' . $dataset['id'] . '/' . $dataset['thumbnail']) ?>" width="200px" onclick="get_content(<?= $dataset['id'] ?>)" alt="Thumbnail Berita <?= $dataset['judul'] ?>"></td>
                                                        <td><?= date_formats($dataset['tanggal_publish']) ?></td>
                                                        <td><?= $dataset['author'] ?></td>
                                                        <td><?= $dataset['judul'] ?></td>
                                                        <td>
                                                            <ul style="list-style: none; font-size:14px">
                                                                <li>
                                                                    <i class="far fa-chart-bar"></i>&ensp;Dikunjungi <span class="badge bg-indigo"><?= $dataset['visited']['visited'] ?></span>
                                                                </li>
                                                                <li>
                                                                    <i class="far fa-eye"></i>&ensp;Dilihat <span class="badge bg-teal"><?= !($dataset['visited']['hits']) ? 0 : $dataset['visited']['hits'] ?></span>
                                                                </li>
                                                                <li>
                                                                    <i class="fas fa-comments"></i>&ensp;Komentar <span class="badge bg-info"><?= $dataset['count_comments'] ?></span>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="form-group">
                                                                <select class="form-control form-control-sm" id="news_access_<?= $dataset['id'] ?>" data-news="<?= $dataset['id'] ?>" onchange="change_access(event)">
                                                                    <?php for ($j = 0; $j < count($access); $j++) : ?>
                                                                        <option value="<?= $access[$j] ?>" <?= strtolower($access[$j]) == strtolower($dataset['akses']) ? 'selected' : '' ?>><?= $access[$j] ?></option>
                                                                    <?php endfor; ?>
                                                                </select>
                                                            </div>
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="btn-group dropleft">
                                                                <button type="button" class="btn btn-sm bg-teal dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    Tindakan
                                                                </button>
                                                                <div class="dropdown-menu text-sm">
                                                                    <a class="dropdown-item" href="<?= base_url('admin/berita/view/' . $dataset['id']) ?>"><i class="fas fa-eye"></i>&ensp;Lihat Berita</a>
                                                                    <a class="dropdown-item" href="javascript:void(0)" data-news="<?= $dataset['id'] ?>" onclick="activate_news(event)"><i class="fas fa-check"></i>&ensp;Nonaktifkan Berita</a>
                                                                    <a class="dropdown-item" href="<?= base_url('admin/berita/update/' . $dataset['id']) ?>"><i class="fas fa-pen"></i>&ensp;Edit Berita</a>
                                                                    <a class="dropdown-item" href="javascript:void(0)" onclick="delete_news(<?= $dataset['id'] ?>)"><i class="fas fa-trash"></i>&ensp;Hapus Berita</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php $i++ ?>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab2" role="tabpanel">
                                <div class="btn-group">
                                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-th-list text-muted"></i>&ensp;Pilih Tindakan
                                    </button>
                                    <div class="dropdown-menu text-sm">
                                        <a class="dropdown-item" href=" "><i class="fas fa-plus-square"></i>&ensp;Tambahkan Berita Baru</a>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col">
                                        <table class="table table-sm table-striped">
                                            <thead>
                                                <tr>
                                                    <td class="text-center">#</td>
                                                    <td class="text-center">Berita</td>
                                                    <td class="text-center">Penanggung Jawab</td>
                                                    <td>Tanggal Terbit</td>
                                                    <td>Penulis</td>
                                                    <td>Judul</td>
                                                    <td class="text-center">Akses</td>
                                                    <td class="text-center">Action</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1 ?>
                                                <?php foreach ($inactive as $dataset) : ?>
                                                    <tr>
                                                        <td class="text-center"><?= $i ?></td>
                                                        <td class="text-center"><img class="img-fluid border" src="<?= base_url('berita/berita_' . $dataset['id'] . '/' . $dataset['thumbnail']) ?>" width="200px" onclick="get_content(<?= $dataset['id'] ?>)" alt="Thumbnail Berita <?= $dataset['judul'] ?>"></td>
                                                        <td><?= $dataset['user'] ?></td>
                                                        <td><?= date_formats($dataset['tanggal_publish']) ?></td>
                                                        <td><?= $dataset['author'] ?></td>
                                                        <td><?= $dataset['judul'] ?></td>
                                                        <td class="text-center">
                                                            <div class="form-group">
                                                                <select class="form-control form-control-sm" id="news_access_<?= $dataset['id'] ?>" data-news="<?= $dataset['id'] ?>" onchange="change_access(event)">>
                                                                    <?php for ($j = 0; $j < count($access); $j++) : ?>
                                                                        <option value="<?= $access[$j] ?>" <?= strtolower($access[$j]) == strtolower($dataset['akses']) ? 'selected' : '' ?>><?= $access[$j] ?></option>
                                                                    <?php endfor; ?>
                                                                </select>
                                                            </div>
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="btn-group dropleft">
                                                                <button type="button" class="btn btn-sm bg-teal dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    Tindakan
                                                                </button>
                                                                <div class="dropdown-menu text-sm">
                                                                    <a class="dropdown-item" href="<?= base_url('admin/berita/view/' . $dataset['id']) ?>"><i class="fas fa-eye"></i>&ensp;Lihat Berita</a>
                                                                    <a class="dropdown-item" href="javascript:void(0)" data-news="<?= $dataset['id'] ?>" onclick="activate_news(event)"><i class="fas fa-check"></i>&ensp;Konfirmasi Berita</a>
                                                                    <a class="dropdown-item" href="<?= base_url('admin/berita/update/' . $dataset['id']) ?>"><i class="fas fa-pen"></i>&ensp;Sunting Berita</a>
                                                                    <a class="dropdown-item" href="javascript:void(0)" onclick="delete_news(<?= $dataset['id'] ?>)"><i class="fas fa-trash"></i>&ensp;Hapus Berita</a>

                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php $i++ ?>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade active show" id="tab3" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="position-relative mb-4">
                                                    <canvas id="track-all" height="150"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-5">
                                        <table class="table table-bordered table-sm table-striped">
                                            <thead>
                                                <tr>
                                                    <td class="text-center">#</td>
                                                    <td class="text-center">Judul</td>
                                                    <td class="text-center">Tindakan</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1 ?>
                                                <?php foreach ($data as $dataset) : ?>
                                                    <tr>
                                                        <td class="text-center"><?= $i ?></td>
                                                        <td><?= $dataset['judul'] ?></td>
                                                        <td class="text-center"><button class="btn btn-sm bg-teal" onclick="news_analysis(<?= $dataset['id'] ?>)">Track&ensp;<i class="fas fa-caret-right"></i></button></td>
                                                    </tr>
                                                    <?php $i++ ?>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-7">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-header border-0">
                                                        <h3 class="card-title text-bold"><i class="fas fa-chart-pie"></i>&emsp;Analisis Kunjungan Berita</h3>
                                                        <div class="card-tools">
                                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                                <i class="fas fa-minus"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                                                            <a href="#" class="btn btn-tool btn-sm">
                                                                <i class="fas fa-bars"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="card-body table-responsive p-0">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="card">
                                                                    <div class="card-header border-0">
                                                                        <div class="d-flex justify-content-between">
                                                                            <h3 class="card-title">Track Kunjungan Berita</h3>
                                                                            <a class="text-secondary" href="javascript:void(0);"> <i class="fas fa-download"></i>&ensp;Download</a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <div class="position-relative canvas_visitor mb-4">
                                                                            <small>*Tidak Ada data yang ditampilkan</small>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="info-box">
                                                                    <span class="info-box-icon bg-teal"><i class="far fa-chart-bar"></i></span>
                                                                    <div class="info-box-content">
                                                                        <span class="info-box-text">Kunjungan</span>
                                                                        <span class="info-box-number visited">0</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="info-box">
                                                                    <span class="info-box-icon bg-lightblue"><i class="fas fa-medal"></i></span>
                                                                    <div class="info-box-content">
                                                                        <span class="info-box-text">Hits</span>
                                                                        <span class="info-box-number hits">0</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="info-box">
                                                                    <span class="info-box-icon bg-primary"><i class="fas fa-comments"></i></span>
                                                                    <div class="info-box-content">
                                                                        <span class="info-box-text">Komentar</span>
                                                                        <span class="info-box-number comments">0</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <table id="table_ip_visits" class="table table-striped table-valign-middle table-sm">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>IP Visited</th>
                                                                    <th>Last Visits</th>
                                                                    <th>Wilayah</th>
                                                                    <th>Total Kunjungan</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr></tr>
                                                            </tbody>
                                                        </table>
                                                        <br>
                                                        <table id="user_comments" class="table table-striped table-valign-middle table-sm">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>User</th>
                                                                    <th>Tangal</th>
                                                                    <th>Komentar</th>
                                                                    <th></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr></tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <!-- /.card -->
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->
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

<div class="modal fade" id="news-preview" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="preview-header"></h5>
                <div class="pull-right">
                    <span><i class="far fa-eye"></i>&ensp;<span class="count_view">32</span></span>
                    <span><i class="far fa-chart-bar"></i>&ensp;<span class="count_hits"></span></span>
                    <span><i class="fas fa-comments"></i>&ensp;<span class="count_comments"></span></span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <div class="modal-body">
                <div class="container">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    var delayed
    var ctx_1 = document.getElementById('track-all').getContext('2d');
    var myChart_1 = new Chart(ctx_1, {
        type: 'line',
        data: <?= $datasets ?>,
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: 'Track Berita'
                },

            },
            animation: {
                onComplete: () => {
                    delayed = true;
                },
                delay: (context) => {
                    let delay = 0;
                    if (context.type === 'data' && context.mode === 'default' && !delayed) {
                        delay = context.dataIndex * 300 + context.datasetIndex * 100;
                    }
                    return delay;
                },
            }
        }
    });
</script>

<?= $this->endSection(); ?>