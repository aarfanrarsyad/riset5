<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div><!-- /.col -->
                <div class="col-sm-6 text-sm">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
                        <li class="breadcrumb-item text-muted"><span>Management Resources</span></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <?php
    $inputs = session()->getFlashdata('inputs');
    $errors = session()->getFlashdata('errors');
    $success = session()->getFlashdata('success');
    $failed = session()->getFlashdata('failed');
    ?>

    <section class="content mx-2 pb-5">
        <div class="container-fluid">

            <?php if (!empty($errors)) : ?>
                <div class="alert alert-danger" role="alert">
                    Whoops! There was an error when inputting data :
                    <ul>
                        <?php foreach ($errors as $error) : ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach ?>
                    </ul>
                </div>
            <?php elseif (!empty($success)) : ?>
                <div class="alert alert-success" role="alert">
                    Success! User data has been successfully registered.
                </div>
            <?php elseif (!empty($failed)) : ?>
                <div class="alert alert-danger" role="alert">
                    Failed! User data was not registered successfully.
                </div>
            <?php endif; ?>

            <div class="card card-secondary card-outline elevation-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5><i class="fas fa-tasks text-secondary"></i>&ensp;Insert New Resource</h5>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12 text-sm">
                            <form action="" method="post">
                                <div class="form-group row pl-4">
                                    <label for="fullname" class="col-sm-2 col-form-label text-secondary"><span class="text-center">Menu</span></label>
                                    <div class="col-sm-1 d-flex justify-content-end align-items-center">:</div>
                                    <div class="col-sm-3">
                                        <select class="form-control form-control-sm border border-secondary border-top-0 border-right-0 border-left-0" name="menu" id="menu" style="border-radius: 0;">
                                            <option value="">Pilih Menu</option>
                                            <?php foreach ($data as $dataset) : ?>
                                                <option value="<?= $dataset['menu_id'] ?>"><?= $dataset['menu_name'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row pl-4">
                                    <label for="email" class="col-sm-2 col-form-label text-secondary">Title</label>
                                    <div class="col-sm-1 d-flex justify-content-end align-items-center">:</div>
                                    <div class="col-sm-5">
                                        <input type="text" name="title" class="form-control form-control-sm border border-secondary border-top-0 border-right-0 border-left-0" placeholder="Enter a resource title" id="title" style="border-radius: 0;" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group row pl-4">
                                    <label for="nim" class="col-sm-2 col-form-label text-secondary">URL</label>
                                    <div class="col-sm-1 d-flex justify-content-end align-items-center">:</div>
                                    <div class="col-sm-5">
                                        <input type="text" name="url" class="form-control form-control-sm border border-secondary border-top-0 border-right-0 border-left-0" id="url" placeholder="Enter the resource url" style="border-radius: 0;" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group row pl-4">
                                    <label for="password" class="col-sm-2 col-form-label text-secondary">Icon</label>
                                    <div class="col-sm-1 d-flex justify-content-end align-items-center">:</div>
                                    <div class="col-sm-5">
                                        <input type="text" name="icon" class="form-control form-control-sm border border-top-0 border-right-0 border-left-0 border-secondary" placeholder="Enter the resource icon" id="icon" style="border-radius: 0;" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group row pl-4">
                                    <label for="password" class="col-sm-2 col-form-label text-secondary">Is this menu active?</label>
                                    <div class="col-sm-1 d-flex justify-content-end align-items-center">:</div>
                                    <div class="col-sm-5 d-flex align-items-center">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="active" id="is_active" value="1" checked>
                                            <label class="form-check-label" for="is_active">
                                                Active
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="active" id="is_inactive" value="0">
                                            <label class="form-check-label" for="is_inactive">
                                                Not Active
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row pl-4">
                                    <button type="submit" name="insert_resources" class="btn btn-outline-primary"><i class="fas fa-paper-plane"></i>&ensp;Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>
<?= $this->endSection(); ?>