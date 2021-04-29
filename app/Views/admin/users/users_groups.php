<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<?= view('admin/users/dist/users_groups/header') ?>

<?php
$inputs = session()->getFlashdata('inputs');
$errors = session()->getFlashdata('errors');
$success = session()->getFlashdata('success');
$failed = session()->getFlashdata('failed');
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="response">
            </div>
            <div class="row mb-2">
                <div class="col-sm-6">
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right text-sm mr-2">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Home</a></li>
                        <li class="breadcrumb-item text-muted"><span>Users Groups</span></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="container-fluid px-4 pb-5">
        <div class="row">
            <div class="col-12">
                <div class="card card-light card-outline card-outline-tabs elevation-3">
                    <div class="bg-light px-3 py-3">
                        <h5><i class="fas fa-cogs text-secondary"></i>&ensp;Management Users Groups</h5>
                    </div>
                    <div class="card-header mt-2 p-0 border-bottom-0 ">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active text-secondary" data-toggle="pill" href="#tab1" role="tab" aria-controls="tab1" aria-selected="false">Users List &ensp;
                                    <span class="badge bg-indigo right" title="<?= count($users) ?> Data ...."><i class="far fa-bell"></i>
                                        <?= count($users) ?></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="tab1" role="tabpanel" aria-labelledby="tab1">
                                <div class="row">
                                    <div class="col">
                                        <table class="table table-hover table-sm text-sm" id="permission-table">
                                            <thead>
                                                <tr>
                                                    <td class="text-center">No.</td>
                                                    <td>User Name</td>
                                                    <?php foreach ($groups as $group) : ?>
                                                        <td class="text-center"><?= $group->name ?></td>
                                                    <?php endforeach; ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1 ?>
                                                <?php foreach ($users as $user) : ?>
                                                    <?php $user_groups = $user['groups'] ?>
                                                    <tr>
                                                        <td class="text-center"><?= $i ?></td>
                                                        <td><?= $user['fullname'] ?></td>
                                                        <?php foreach ($groups as $group) : ?>
                                                            <td class="text-center">
                                                                <div class="form-check">
                                                                    <?php if (search_array_2($user_groups, 'group_id', $group->id) !== false) : ?>
                                                                        <input class="form-check-input" data-user_name="<?= $user['fullname'] ?>" data-group_name="<?= $group->name ?>" data-user="<?= $user['id'] ?>" data-group="<?= $group->id ?>" onclick="change_group(event)" type="checkbox" value="" id="crud-<?$user['id']?>-<?$user['id']?>" checked>
                                                                    <?php else : ?>
                                                                        <input class="form-check-input" data-user_name="<?= $user['fullname'] ?>" data-group_name="<?= $group->name ?>" data-user="<?= $user['id'] ?>" data-group="<?= $group->id ?>" onclick="change_group(event)" type="checkbox" value="" id="crud-<?$user['id']?>-<?$user['id']?>">
                                                                    <?php endif; ?>
                                                                </div>
                                                            </td>
                                                        <?php endforeach; ?>
                                                    </tr>
                                                    <?php $i++ ?>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
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

<?= view('admin/users/dist/users_groups/footer') ?>
<?= $this->endSection(); ?>