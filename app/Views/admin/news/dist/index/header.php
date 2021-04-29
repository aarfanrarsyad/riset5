<script>
    let show = [];
    let Toast = Swal.mixin({
        toast: true,
        position: 'center',
        showConfirmButton: false,
        timer: 3000
    });

    function delete_comment(id) {
        Swal.fire({
            icon: 'question',
            text: 'Apakah anda yakin ingin menghapus komentar ini?',
            showCancelButton: true,
            confirmButtonColor: '#4248ED',
            cancelButtonColor: '#33A1C4',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal',
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "<?= base_url('setting-aplikasi/berita/delete-comment') ?>",
                    method: "POST",
                    dataType: "JSON",
                    cache: false,
                    data: {
                        id: id,
                    },
                    success: function(result) {
                        if (result === true) {
                            push_comment();
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

    function push_array(id, status) {
        let status_show = array_filter(show, id);
        if (!status_show) {
            show.push({
                'id': id,
                'status': status
            })
        } else {
            show[status_show[0]].status = status;
        }
        return;
    }

    function array_filter(array, keywoard) {
        for (let i = 0; i < array.length; i++) {
            if (array[i].id == keywoard) {
                return [i, array[i].status];
                break;
            }
        }
        return false;
    }

    function show_less_comments(id) {
        $('#set-length-comments-' + id).html('Lihat semua komentar');
        $('#set-length-comments-' + id).attr('onclick', 'show_all_comments(' + id + ')');

        $('#comments-content-' + id + ' .card-comment').each(function(i) {
            if (i > 4) {
                $(this).addClass('d-none')
            }
        })
        push_array(id, false)
        return true;
    }

    function show_all_comments(id) {
        $('#set-length-comments-' + id).html('Tampilkan lebih sedikit')
        $('#set-length-comments-' + id).attr('onclick', 'show_less_comments(' + id + ')')
        $('#comments-content-' + id + ' .card-comment').each(function() {
            $(this).removeClass('d-none')
        })

        push_array(id, true);
        return true;
    }

    function push_comment() {
        let news = [];

        $('.comments-content').each(function(i) {
            news.push($(this).data('news'));
        })

        $.ajax({
            url: "<?= base_url('setting-aplikasi/berita/get-comments') ?>",
            method: "POST",
            dataType: "JSON",
            cache: false,
            data: {
                data: news,
            },
            success: function(result) {
                for (let i = 0; i < result.length; i++) {
                    let html = '';
                    let ele = $('#comments-content-' + result[i].news_id);
                    let ele_count = $('#count-comment-' + result[i].news_id);
                    let disp = '';
                    let set_length = '<br><a href="javascript:void(0)" id="set-length-comments-' + result[i].news_id + '" onclick="show_less_comments(' + result[i].news_id + ')">Tampilkan lebih sedikit</a>';
                    if (array_filter(show, result[i].news_id)) {
                        if (array_filter(show, result[i].news_id)[1] != true) {
                            disp = 'd-none';
                            set_length = '<br><a href="javascript:void(0)" id="sest-length-comments-' + result[i].news_id + '" onclick="show_all_comments(' + result[i].news_id + ')">Lihat semua komentar</a>'
                        }
                    } else {
                        disp = 'd-none';
                        set_length = '<br><a href="javascript:void(0)" id="sest-length-comments-' + result[i].news_id + '" onclick="show_all_comments(' + result[i].news_id + ')">Lihat semua komentar</a>'
                    }

                    for (let j = 0; j < result[i].comments.length; j++) {
                        html += '<div class="card-comment ' + ((j > 4) ? disp : '') + '">' +
                            '<img class="img-circle img-sm" src="<?= base_url('assets/My_assets/img/profile/') ?>' + result[i].comments[j].image + '" alt="User Image">' +
                            '<div class="comment-text">' +
                            '<span class="username">' +
                            result[i].comments[j].name +
                            '<div class="float-right">' +
                            '<span class="text-muted">' + result[i].comments[j].time + '</span>' +
                            '<div class="btn-group dropleft ml-2">' +
                            '<a class="text-secondary" href="#" role="button" data-toggle="dropdown" style="font-weight: 100;">' +
                            '<i class="fas fa-ellipsis-v"></i>' +
                            '</a>' +
                            '<div class="dropdown-menu">' +
                            ' <a class="dropdown-item" href="javascript:void(0)" onclick="delete_comment(' + result[i].comments[j].comment_id + ')" style="font-size: 12px;">Hapus Komentar</a>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</span>' +
                            result[i].comments[j].comment +
                            '</div>' +
                            '</div>';
                    }
                    if (result[i].comments.length > 5) {
                        html += set_length
                    }

                    ele.empty();
                    ele_count.empty();
                    ele.append(html);
                    ele_count.append(result[i].comments.length + ' comments');
                }
            }
        })
    }

    function deleteNews(id) {
        Swal.fire({
            icon: 'question',
            text: 'Apakah anda yakin ingin menghapus berita ini?',
            showCancelButton: true,
            confirmButtonColor: '#4248ED',
            cancelButtonColor: '#33A1C4',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal',
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "<?= base_url('setting-aplikasi/berita/delete') ?>",
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
                                title: 'Berhasil',
                                text: 'Data berhasil dihapus',
                                showConfirmButton: false,
                                timer: 2000
                            }).then(function() {
                                window.location = "<?= base_url('setting-aplikasi/berita') ?>";
                            })
                        } else {
                            Swal.fire({
                                icon: 'info',
                                title: 'Terjadi Kesalahan',
                                text: 'Data gagal dihapus',
                                showConfirmButton: false,
                                timer: 2000
                            })
                        }
                    }
                })
            }
        })
    }

    function post_comment(id) {
        let comment = $('#comments-' + id).val();
        if (comment.trim().length === 0) return false;
        $.ajax({
            url: "<?= base_url('setting-aplikasi/berita/post-comment') ?>",
            method: "POST",
            dataType: "JSON",
            cache: false,
            data: {
                news_id: id,
                data: comment,
            },
            success: function(result) {
                if (result === true) {
                    if ($('#comments-content-' + id + ' .card-comment').length > 5) {
                        show_all_comments(id)
                    }
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
</script>