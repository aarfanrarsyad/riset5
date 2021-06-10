<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<script>
    function hide_access() {
        $('.content-groups').addClass('d-none');
    }

    function show_access() {
        $('.content-groups').removeClass('d-none');
    }

    function show_content(ele1, ele2) {
        $('.' + ele1).removeClass('d-none');
        $('.' + ele1 + ' .form-control').attr('required', 'required');
        $('.' + ele2).addClass('d-none');
        $('.' + ele2 + ' .form-control').removeAttr('required');
    }
</script>

<?php
$inputs = session()->getFlashdata('inputs');
$errors = session()->getFlashdata('errors');
?>

<div class="content-wrapper pb-5">
    <div class="content-header">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right text-sm mr-3">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url("management-rbac/users") ?>">Managament Berita</a></li>
                    <li class="breadcrumb-item active"><span class="text-secondary">Tambah Berita</span></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>

    <div class="container-fluid px-4" style="font-size: small;">
        <div class="alert-content">
            <?php if (!empty($errors)) : ?>
                <div class="alert bg-redAlert text-danger" role="alert">
                    Whoops! There was an error when inputting data :
                    <ul>
                        <?php foreach ($errors as $error) : ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach ?>
                    </ul>
                </div>
            <?php endif ?>
            <?= session()->getFlashdata('status'); ?>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card card-light elevation-3" id="card-add-news">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Berita / Informasi</h3>
                    </div>
                    <form id="form-news" action="" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="date" class="col-sm-2 col-form-label">Tanggal</label>
                                <div class="col-sm-5">
                                    <input type="datetime-local" name="date" class="inputForm form-control" id="date" placeholder="Tanggal" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="date" class="col-sm-2 col-form-label">Share to :</label>
                                <div class="col-sm-5">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="access" id="access-public" value="public" onclick="hide_access()" checked>
                                        <label class="form-check-label" for="access-public">
                                            Public
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="access" id="access-private" value="private" onclick="hide_access()">
                                        <label class="form-check-label" for="access-private">
                                            Private
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="access" id="access-other" value="other" onclick="show_access()">
                                        <label class="form-check-label" for="access-other">
                                            Other
                                        </label>
                                    </div>
                                    <div class="content-groups mx-4 d-none">
                                        Share to group :
                                        <?php foreach ($groups as $group) : ?>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="access_groups[]" value="<?= $group->id ?>" id="group-<?= $group->id ?>">
                                                <label class="form-check-label" for="group-<?= $group->id ?>">
                                                    <?= ucwords($group->name) ?>
                                                </label>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="author" class="col-sm-2 col-form-label">Author</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" name="author" class="inputForm form-control" id="author" placeholder="Penulis">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="header" class="col-sm-2 col-form-label">Header</label>
                                <div class="col-sm-10">
                                    <input type="text" name="header" class="inputForm form-control" id="header" placeholder="Judul Berita" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="thumbnail" class="col-sm-2 col-form-label">Thumbnail</label>
                                <input type="file" name="thumbnail" class="border-top-0 border-right-0 border-left-0" style="border-radius:0" id="thumbnail" placeholder="Thumbnail Berita">
                                <div class="col-sm-10">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="summernote" class="col-sm-2 col-form-label">Content</label>
                                <div class="col-sm-10">
                                    <textarea name="content" id="summernote" required></textarea>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" name="insert_news" class="btn btn-info float-right">Send</button>
                        </div>
                        <!-- /.card-footer -->
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>


<script>
    $(document).ready(function() {

        $('#summernote').summernote({
            height: 200,
            callbacks: {
                onMediaDelete: function(target) {
                    $.ajax({
                        url: "<?= base_url('/admin/berita/delete-file') ?>",
                        method: "POST",
                        data: {
                            path: target[0].src
                        },
                        cache: false,
                        success: function(result) {
                            if (!result) {
                                alert('Image failed to delete')
                            }
                        }
                    });
                },
                onImageUpload: function(files) {
                    let data = new FormData();
                    data.append("file", files[0]);
                    $.ajax({
                        url: "<?= base_url('/admin/berita/upload-file') ?>",
                        type: 'POST',
                        enctype: "multipart/form-data",
                        processData: false,
                        contentType: false,
                        data: data,
                        dataType: 'JSON',
                        success: function(url) {
                            $('#summernote').summernote('insertImage', url);
                        },
                        error: function(data) {
                            alert("Upload failed");
                        }
                    });

                }

            }

        });
    })
</script>
<?= $this->endSection(); ?>