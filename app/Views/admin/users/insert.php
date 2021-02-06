<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<!-- Content Wrapper. Contains page content -->
<script>
    function submit() {
        $('#registration-form').submit()
    }

    function see_password(event) {
        if ($('[type = password]').length > 0) {
            $('.password-input').attr('type', 'text');
            $('.password-icon').empty();
            $('.password-icon').html('<i class="far fa-eye-slash"></i>');
        } else {
            $('.password-input').attr('type', 'password');
            $('.password-icon').empty();
            $('.password-icon').html('<i class="far fa-eye"></i>');
        }
    }
</script>

<style type="text/css">
    #icon-button {
        float: right;

        margin-right: 2px;
        margin-top: -23px;
        position: relative;
        z-index: 2;
        color: red;
    }
</style>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <!-- <h1 class="m-0"></h1> -->
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('/management-users') ?>">Register User</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content mx-2 pb-5">
        <div class="container-fluid">
            <?= view('Myth\Auth\Views\_message_block') ?>

            <div class="card card-secondary card-outline elevation-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5><i class="fas fa-users text-secondary"></i>&ensp;Register User</h5>
                        </div>
                        <div class="col d-flex justify-content-end">
                            <button onclick="submit()" class="btn btn-sm btn-outline-primary btn-user">
                                <i class="fas fa-paper-plane"></i>&ensp;
                                Register User
                            </button>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12 text-sm">
                            <form action="<?= base_url('admin/users/register') ?>" method="post" id="registration-form">
                                <?= csrf_field() ?>
                                <div class="form-group row pl-4">
                                    <label for="fullname" class="col-sm-2 col-form-label text-secondary"><span class="text-center">Full Name</span></label>
                                    <div class="col-sm-1 d-flex justify-content-end align-items-center">:</div>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control form-control-sm border border-secondary border-top-0 border-right-0 border-left-0  <?php if (session('errors.fullname')) : ?>is-invalid<?php endif ?>"" name=" fullname" id="fullname" placeholder="Full Name" value="<?= old('fullname') ?>" style="border-radius: 0;" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group row pl-4">
                                    <label for="email" class="col-sm-2 col-form-label text-secondary">Email</label>
                                    <div class="col-sm-1 d-flex justify-content-end align-items-center">:</div>
                                    <div class="col-sm-7">
                                        <input type="email" class="form-control form-control-sm border border-secondary border-top-0 border-right-0 border-left-0  <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" id="email" name="email" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>" style="border-radius: 0;" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group row pl-4">
                                    <label for="nim" class="col-sm-2 col-form-label text-secondary">NIM</label>
                                    <div class="col-sm-1 d-flex justify-content-end align-items-center">:</div>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control form-control-sm border border-secondary border-top-0 border-right-0 border-left-0  <?php if (session('errors.nim')) : ?>is-invalid<?php endif ?>" id="nim" name="nim" placeholder="NIM" value="<?= old('nim') ?>" style="border-radius: 0;" autocomplete="off">
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="form-group row pl-4">
                                    <label for="password" class="col-sm-2 col-form-label text-secondary">Password</label>
                                    <div class="col-sm-1 d-flex justify-content-end align-items-center">:</div>
                                    <div class="col-sm-5">
                                        <input type="password" name="password" id="password" value="<?= $genr_pass ?>" class="form-control form-control-sm password-input border border-secondary border-top-0 border-right-0 border-left-0 <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" autocomplete="off" style="border-radius: 0;" autocomplete="off">
                                        <a id="icon-button" class="text-secondary" onclick="see_password(event)" title="See password" href="javascript:void(0)"><span class="password-icon"><i class="fas fa-eye"></i></span></a>
                                    </div>
                                </div>
                                <div class="form-group row pl-4">
                                    <label for="confirm-password" class="col-sm-2 col-form-label text-secondary">Confirm Password</label>
                                    <div class="col-sm-1 d-flex justify-content-end align-items-center">:</div>
                                    <div class="col-sm-5">
                                        <input type="password" name="pass_confirm" id="confirm-password" value="<?= $genr_pass ?>" class="form-control form-control-sm password-input border border-secondary border-top-0 border-right-0 border-left-0 <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off" style="border-radius: 0;" autocomplete="off">
                                    </div>
                                </div>
                                <br>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>