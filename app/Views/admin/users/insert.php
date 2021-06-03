<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<!-- Content Wrapper. Contains page content -->

<?= view('admin/users/dist/insert/header') ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <!-- <h1 class="m-0"></h1> -->
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right text-sm">
                        <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('/') ?>" title="Index User">...</a></li>
                        <li class=" breadcrumb-item text-muted"><span>Registrasi User</span></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content mx-2 pb-5">
        <div class="container-fluid">
            <?= view('Myth\Auth\Views\_message_block') ?>
            <div class="card elevation-3">
                <div class="card-header bg-light">
                    <div class="row">
                        <div class="col-md">
                            <h5><i class="fas fa-users text-secondary"></i>&ensp;Registrasi User</h5>
                        </div>
                        <div class="col-md d-flex justify-content-end">
                            <button onclick="submit()" class="btn btn-sm bg-primary btn-user">
                                <i class="fas fa-paper-plane"></i>&ensp;
                                Registrasi User
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <br>
                    <div class="row">
                        <div class="col">
                            <a class="text-secondary" href="<?= base_url('admin/users') ?>"><i class="fas fa-long-arrow-alt-left"></i>&ensp;Kembali</a>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12 text-sm">
                            <form action="<?= base_url('admin/users/register') ?>" method="post" id="registration-form">
                                <?= csrf_field() ?>
                                <div class="form-group row pl-4">
                                    <label for="id_alumni" class="col-sm-2 col-form-label text-secondary"><span class="text-center">ID Alumni</span></label>
                                    <div class="col-sm-1 d-flex justify-content-end align-items-center">:</div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-sm border border-secondary border-top-0 border-right-0 border-left-0 <?php if (session('errors.id_alumni')) : ?>is-invalid<?php endif ?>" name="id_alumni" id="id_alumni" placeholder="ID Alumni" value="<?= old('id_alumni') ?>" style="border-radius: 0;" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group row pl-4">
                                    <label for="fullname" class="col-sm-2 col-form-label text-secondary"><span class="text-center">Nama Lengkap</span></label>
                                    <div class="col-sm-1 d-flex justify-content-end align-items-center">:</div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-sm border border-secondary border-top-0 border-right-0 border-left-0 <?php if (session('errors.fullname')) : ?>is-invalid<?php endif ?>" name="fullname" id="fullname" placeholder="Nama lengkap" value="<?= old('fullname') ?>" style="border-radius: 0;" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group row pl-4">
                                    <label for="email" class="col-sm-2 col-form-label text-secondary">Email</label>
                                    <div class="col-sm-1 d-flex justify-content-end align-items-center">:</div>
                                    <div class="col-sm-6">
                                        <input type="email" class="form-control form-control-sm border border-secondary border-top-0 border-right-0 border-left-0  <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" id="email" name="email" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>" style="border-radius: 0;" autocomplete="off">
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="form-group row pl-4">
                                    <label for="password" class="col-sm-2 col-form-label text-secondary">Password</label>
                                    <div class="col-sm-1 d-flex justify-content-end align-items-center">:</div>
                                    <div class="col-sm-4">
                                        <input type="password" name="password" id="password" value="<?= $genr_pass ?>" class="form-control form-control-sm password-input border border-secondary <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" autocomplete="off" autocomplete="off">
                                        <a id="icon-button" class="text-secondary pr-1" onclick="see_password(event)" title="Tampilkan password" href="javascript:void(0)"><span class="password-icon"><i class="fas fa-eye"></i></span></a>
                                    </div>
                                </div>
                                <div class="form-group row pl-4">
                                    <label for="confirm-password" class="col-sm-2 col-form-label text-secondary">Konfirmasi Password</label>
                                    <div class="col-sm-1 d-flex justify-content-end align-items-center">:</div>
                                    <div class="col-sm-4">
                                        <input type="password" name="pass_confirm" id="confirm-password" value="<?= $genr_pass ?>" class="form-control form-control-sm password-input border border-secondary <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off" autocomplete="off">
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