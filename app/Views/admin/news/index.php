<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>


<script>
    var default_val
    var active_id
    var myChart

    function reinitialize_tables(ele) {

        if ($.fn.DataTable.isDataTable('#' + ele)) {
            $('#' + ele).DataTable().clear();
            $('#' + ele).DataTable().destroy();
        }
    }

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
                $('#download').attr("href", "<?= base_url('/berita/downloadReport') ?>/" + id)
                $('.canvas_visitor').html('<canvas id="visitor" height="120"></canvas>')
                initialize_chart(result[0])

                reinitialize_tables("table_ip_visits")
                reinitialize_tables("user_comments")
                $('#table_ip_visits tbody').html(result[2])
                $('#user_comments tbody').html(result[3])
                initalize_dataTables('#table_ip_visits')
                initalize_dataTables('#user_comments')

                $('.visited').html(result[1].visited)
                $('.hits').html(result[1].hits)
                $('.comments').html(result[1].comments)

            }
        })
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

    function send_access(news_id, access, groups_id = null) {
        $.ajax({
            url: "<?= base_url('admin/berita/change-access') ?>",
            method: "POST",
            dataType: "JSON",
            cache: false,
            data: {
                id: news_id,
                val: access,
                groups: groups_id
            },
            success: function(result) {
                if (result === true) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Akses berita berhasil diperbarui',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function() {
                        window.location = "<?= base_url('admin/berita') ?>";
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

    function change_access(event) {
        let id = $(event.target).attr("data-news");
        let val = $(event.target).val();

        if (val == 'Other') {
            $('.form-check-input').prop('checked', false)
            $('#newsIdForUpdate').val(id)
            $('#news-access').modal('show');
        } else {
            Swal.fire({
                icon: 'question',
                text: 'Anda yakin ingin mengubah akses menjadi ' + val + ' ?',
                showCancelButton: true,
                confirmButtonColor: '#54AC00',
                cancelButtonColor: '#D81B01',
                confirmButtonText: 'Ya, Lanjutkan !',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.value) {
                    send_access(id, val)
                } else {
                    $('#news_access_' + active_id + ' option')
                        .removeAttr('selected')
                        .filter(`[value='${default_val}']`)
                        .attr('selected', true)
                }
            })
        }
    }

    function send_access_groups() {
        var groups = [];

        $('input[name="access_groups[]"]:checked').each(function() {
            groups.push(this.value);
        });

        if (groups.length === 0) {
            Swal.fire({
                icon: 'error',
                title: 'Terjadi Kesalahan',
                text: 'Harap memilih minimal satu Role/Group untuk melanjutkan.',
                showConfirmButton: false,
                timer: 2000
            })
        } else {
            Swal.fire({
                icon: 'question',
                text: 'Anda yakin ingin mengubah akses ke Group tertentu ?',
                showCancelButton: true,
                confirmButtonColor: '#54AC00',
                cancelButtonColor: '#D81B01',
                confirmButtonText: 'Ya, Lanjutkan !',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.value) {
                    console.log()
                    send_access($('#newsIdForUpdate').val(), 'other', groups);
                }
            })

        }
    }

    function set_groups(event) {
        $('.form-check-input').prop('checked', false)
        let id = $(event.target).attr('data-news_id')
        let groups = $(event.target).attr('data-groups').split(",");

        for (let i = 0; i < groups.length; i++) {
            $('#group-' + groups[i]).prop('checked', true)
        }
        $('#newsIdForUpdate').val(id);
        $('#news-access').modal('show');
    }

    function activate_news(event) {
        let id = $(event.target).attr("data-news");
        let val = $(event.target).attr("data-value");
        let title = "menonaktifkan";
        if (val == 1) title = 'mengaktifkan';

        Swal.fire({
            icon: 'question',
            text: 'Apakah anda yakin ingin ' + title + ' berita ini?',
            showCancelButton: true,
            confirmButtonColor: '#54AC00',
            cancelButtonColor: '#D81B01',
            confirmButtonText: 'Ya, Lanjutkan !',
            cancelButtonText: 'Batal',
        }).then((result) => {
            if (result.value) {
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
        })



    }

    function delete_comment(id, news_id) {
        Swal.fire({
            icon: 'question',
            text: 'Apakah anda yakin ingin menghapus komentar ini?',
            showCancelButton: true,
            confirmButtonColor: '#54AC00',
            cancelButtonColor: '#D81B01',
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

    function set_values(event) {
        let id = $(event.target).attr("data-news");
        let val = $(event.target).val();
        active_id = id;
        default_val = $(event.target).attr("data-default");
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
                                <a class="nav-link text-secondary active" data-toggle="pill" href="#tab1" role="tab" aria-controls="tab1" aria-selected="false">Daftar Berita &ensp;
                                    <span class="badge bg-indigo right" title="<?= count($data) ?> Data Berita"><i class="far fa-bell"></i> <?= count($data) ?></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-secondary" data-toggle="pill" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false">Review Berita &ensp;
                                    <span class="badge bg-primary right" title="<?= count($review) ?> Request Berita"><i class="far fa-bell"></i> <?= count($review) ?></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-secondary" data-toggle="pill" href="#tab3" role="tab" aria-controls="tab3" aria-selected="false">Track Visits &ensp;
                                    <span class="badge bg-teal right"><i class="far fa-chart-bar"></i></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="tab1" role="tabpanel" aria-labelledby="tabs-for-calculate">
                                <div class="btn-group">
                                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-th-list text-muted"></i>&ensp;Pilih Tindakan
                                    </button>
                                    <div class="dropdown-menu text-sm">
                                        <a class="dropdown-item text-primaryHover" href="<?= base_url('admin/berita/insert') ?>"><i class="fas fa-plus-square"></i>&ensp;Tambahkan Berita</a>
                                        <a class="dropdown-item text-primaryHover" href="<?= base_url('admin/berita/list-berita') ?>"><i class="fas fa-book-reader"></i>&ensp;Tampilkan Berita</a>
                                    </div>
                                </div>`
                                <div class="row mt-4">
                                    <div class="col">
                                        <table class="table table-sm table-striped" id="news_list">
                                            <thead>
                                                <tr>
                                                    <td class="text-center">#</td>
                                                    <td class="text-center">Berita</td>
                                                    <td class="text-center">Tanggal Terbit</td>
                                                    <td>Penulis</td>
                                                    <td>Judul</td>
                                                    <td class="text-center">Keterangan</td>
                                                    <td>Status</td>
                                                    <td class="text-center">Akses</td>
                                                    <td class="text-center">Action</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1 ?>
                                                <?php foreach ($data as $dataset) : ?>
                                                    <tr>
                                                        <td class="text-center"><?= $i ?></td>
                                                        <td class="text-center"><img class="img-fluid img-thumbnail rounded" src="<?= base_url('berita/berita_' . $dataset['id'] . '/' . $dataset['thumbnail']) ?>" width="140px" onclick="get_content(<?= $dataset['id'] ?>)"></td>
                                                        <td><?= date("d/m/Y", strtotime($dataset['tanggal_publish'])) ?></td>
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
                                                        <td><?= $dataset['aktif'] == 1 ? '<span class="badge bg-indigo">Aktif</span>' : '<span class="badge bg-maroon">Tidak Aktif</span>' ?></td>
                                                        <td class="text-center">
                                                            <div class="form-group">
                                                                <select class="form-control form-control-sm" id="news_access_<?= $dataset['id'] ?>" data-news="<?= $dataset['id'] ?>" data-default="<?= ucfirst(strtolower($dataset['akses'])) ?>" onchange="change_access(event)" onclick="set_values(event)">
                                                                    <?php for ($j = 0; $j < count($access); $j++) : ?>
                                                                        <option value="<?= $access[$j] ?>" <?= strtolower($access[$j]) == strtolower($dataset['akses']) ? 'selected' : '' ?>><?= $access[$j] ?></option>
                                                                    <?php endfor; ?>
                                                                </select>
                                                                <?php if ($dataset['akses'] == 'other') : ?>
                                                                    <a class="text-xs" href="javascript:void(0)" data-news_id="<?= $dataset['id'] ?>" data-groups="<?= $dataset['groups_id'] ?>" onclick="set_groups(event)"><i class="fas fa-list-ul"></i>&ensp;Groups List &ensp;<i class="fas fa-mouse-pointer"></i></a>
                                                                <?php endif; ?>
                                                            </div>
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="btn-group dropleft">
                                                                <button type="button" class="btn btn-sm bg-teal dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    Tindakan
                                                                </button>
                                                                <div class="dropdown-menu text-sm">
                                                                    <a class="dropdown-item" href="<?= base_url('berita/news_view/' . $dataset['id']) ?>"><i class="fas fa-eye"></i>&ensp;Lihat Berita</a>
                                                                    <?php if ($dataset['aktif'] == 1) : ?>
                                                                        <a class="dropdown-item" href="javascript:void(0)" data-news="<?= $dataset['id'] ?>" data-value="0" onclick="activate_news(event)"><i class="fas fa-times"></i>&ensp;Nonaktifkan Berita</a>
                                                                    <?php else : ?>
                                                                        <a class="dropdown-item" href="javascript:void(0)" data-news="<?= $dataset['id'] ?>" data-value="1" onclick="activate_news(event)"><i class="fas fa-check"></i>&ensp;Aktifkan Berita</a>
                                                                    <?php endif; ?>
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
                                <div class="row">
                                    <div class="col">
                                        <table class="table table-sm table-striped" id="news_review">
                                            <thead>
                                                <tr>
                                                    <td class="text-center">#</td>
                                                    <td class="text-center">Berita</td>
                                                    <td>Creator</td>
                                                    <td>Tanggal Terbit</td>
                                                    <td>Penulis</td>
                                                    <td>Judul</td>
                                                    <td>Status</td>
                                                    <td class="text-center">Akses</td>
                                                    <td class="text-center">Action</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1 ?>
                                                <?php foreach ($review as $dataset) : ?>
                                                    <tr>
                                                        <td class="text-center"><?= $i ?></td>
                                                        <td class="text-center"><img class="img-fluid" src="<?= base_url('berita/berita_' . $dataset['id'] . '/' . $dataset['thumbnail']) ?>" width="140px" onclick="get_content(<?= $dataset['id'] ?>)"></td>
                                                        <td><a href="<?= base_url('User/profilAlumni/' . $dataset['user_id']) ?>" target="_blank"><?= $dataset['user'] ?></a></td>
                                                        <td><?= date("d/m/Y", strtotime($dataset['tanggal_publish'])) ?></td>
                                                        <td><?= $dataset['author'] ?></td>
                                                        <td><?= $dataset['judul'] ?></td>
                                                        <td><?= $dataset['aktif'] == 1 ? '<span class="badge bg-indigo">Aktif</span>' : '<span class="badge bg-maroon">Tidak Aktif</span>' ?></td>
                                                        <td class="text-center">
                                                            <div class="form-group">
                                                                <select class="form-control form-control-sm" id="news_access_<?= $dataset['id'] ?>" data-news="<?= $dataset['id'] ?>" data-default="<?= ucfirst(strtolower($dataset['akses'])) ?>" onchange="change_access(event)" onclick="set_values(event)">>
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

                                                                    <?php if ($dataset['aktif'] == 1) : ?>
                                                                        <a class="dropdown-item" href="javascript:void(0)" data-news="<?= $dataset['id'] ?>" data-value="0" onclick="activate_news(event)"><i class="fas fa-times"></i>&ensp;Nonaktifkan Berita</a>
                                                                    <?php else : ?>
                                                                        <a class="dropdown-item" href="javascript:void(0)" data-news="<?= $dataset['id'] ?>" data-value="1" onclick="activate_news(event)"><i class="fas fa-check"></i>&ensp;Aktifkan Berita</a>
                                                                    <?php endif; ?>
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
                            <div class="tab-pane fade" id="tab3" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="d-flex justify-content-between">
                                                <h3 class="card-title text-bold"><i class="fas fa-chart-line"></i>&ensp;Track Kunjungan Berita</h3>
                                                <a class="text-secondary" id="downloadChartAll" download="Grafik Kunjungan Berita.jpg" title="Save chart to jpg" href=""> <i class="fas fa-download"></i>&ensp;</a>
                                            </div>
                                            <div class="card-body">
                                                <div class="position-relative mb-4">
                                                    <canvas id="track-all" height="150"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col">
                                        <br>
                                        <h1 class="text-bold" style="font-size:18px;"><i class="fas fa-book-reader"></i>&emsp;Daftar Berita</h1>
                                        <br>
                                        <table class="table table-bordered table-sm table-striped table-sm" id="news-track">
                                            <thead>
                                                <tr>
                                                    <td class="text-center">#</td>
                                                    <td>Judul Berita</td>
                                                    <td class="text-center">Tindakan</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1 ?>
                                                <?php foreach ($data as $dataset) : ?>
                                                    <tr>
                                                        <td class="text-center"><?= $i ?></td>
                                                        <td><a href="<?= base_url("berita/news_view/" . $dataset['id']) ?>" target="_blank"><?= $dataset['judul'] ?></a></td>
                                                        <td class="text-center"><button class="btn btn-sm bg-teal" onclick="news_analysis(<?= $dataset['id'] ?>)">Track&ensp;<i class="fas fa-caret-right"></i></button></td>
                                                    </tr>
                                                    <?php $i++ ?>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <br>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="d-flex justify-content-between">
                                                    <h1 class="text-bold" style="font-size:18px;"><i class="fas fa-book-reader"></i>&emsp;Total Kunjungan Berita</h1>
                                                    <a class="text-secondary" id="download" download="ChartImage.jpg" href="javascript:void(0)"> <i class="fas fa-download"></i>&ensp;Download</a>
                                                </div>
                                                <br>
                                                <div class="position-relative canvas_visitor mb-4">
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

                                        <br>
                                        <h1 class="text-bold" style="font-size:18px;"><i class="fas fa-user-shield"></i>&emsp;IP Pengunjung Berita</h1>
                                        <br>
                                        <table id="table_ip_visits" class="table table-striped table-valign-middle table-sm">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>IP Visited</th>
                                                    <th>Last Visits</th>
                                                    <th>Wilayah</th>
                                                    <th class="text-center">Total Kunjungan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th class="text-center" colspan="5">Tidak ada berita terpilih</th>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <br>
                                        <h1 class="text-bold" style="font-size:18px;"><i class="fas fa-comments"></i>&emsp;Komentar Pengunjung Berita</h1>
                                        <br>
                                        <table id="user_comments" class="table table-striped table-valign-middle table-sm">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>User</th>
                                                    <th>Tanggal</th>
                                                    <th>Komentar</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th class="text-center" colspan="5">Tidak ada berita terpilih</th>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                            <!-- /.col -->
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="news-access" data-backdrop="static">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-teal">
                <h5 class="modal-title">Share to Groups</h5>
            </div>
            <div class="modal-body">
                <div class="container">
                    <ul>
                        <?php foreach ($groups as $group) : ?>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="access_groups[]" value="<?= $group->id ?>" id="group-<?= $group->id ?>">
                                <label class="form-check-label" for="group-<?= $group->id ?>">
                                    <?= ucwords($group->name) ?>
                                </label>
                            </div>
                        <?php endforeach; ?>
                        <input type="hidden" id="newsIdForUpdate">
                    </ul>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-between mt-3">
                <button type="button" class="btn btn-sm bg-danger" id="btnModalCloseAccess">Cancel</button>
                <button type="button" class="btn btn-sm bg-teal" onclick="send_access_groups()">Send Data</button>
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
    $('#btnModalCloseAccess').on('click', function() {
        $('#news_access_' + active_id + ' option')
            .removeAttr('selected')
            .filter(`[value='${default_val}']`)
            .attr('selected', true)
        $('#news-access').modal('hide');
    })

    $('#download-news-graph').on('click', function() {
        $('#canvas_visitor').get(0).toBlob(function(blob) {
            saveAs(blob, "Grafik Kunjungan Berita")
        })
    })
</script>

<?= view('admin/news/dist/index/footer') ?>
<?= $this->endSection(); ?>