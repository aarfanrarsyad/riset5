<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<?= view('admin/permissions/dist/permissions/header') ?>

<?php
$inputs = session()->getFlashdata('inputs');
$errors = session()->getFlashdata('errors');
$success = session()->getFlashdata('success');
$failed = session()->getFlashdata('failed');
?>

<div class="content-wrapper pb-5">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="response">
            </div>
            <div class="row mb-2">
                <div class="col-sm-6">
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right text-sm">
                        <li class="breadcrumb-item text-primaryHover"><a href="<?= base_url('admin') ?>">Home</a></li>
                        <li class="breadcrumb-item text-muted text-gray-100"><span><?= $group->name ?> permission table</span></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="container-fluid px-4" style="font-size:small;">
        <div class="response">
            <?= session()->getFlashdata('status'); ?>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card card-light card-outline card-outline-tabs elevation-3">
                    <div class="text-primaryHover text-lg px-3 py-3">
                        <h5><a href="<?= base_url('/admin/permissions') ?>" title="Kembali ke halaman sebelumnya"><i class="fas fa-chevron-left"></i></a>&emsp;<i class="fas fa-cogs"></i>&ensp;<?= $group->name ?> Permission Table</h5>
                    </div>
                    <div class="card-header mt-2 p-0 border-bottom-0 ">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active text-secondary" data-toggle="pill" href="#tab1" role="tab" aria-controls="tab1" aria-selected="false">Resource List &ensp;
                                    <span class="badge bg-indigo right" title=" <?= count($resources) ?> Data"><i class="far fa-bell"></i>
                                        <?= count($resources) ?></span>
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
                                                    <td>Menu</td>
                                                    <?php foreach ($crud as $_crud) : ?>
                                                        <td class="text-center"><?= $_crud['crud_name'] ?></td>
                                                    <?php endforeach; ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1 ?>
                                                <?php foreach ($resources as $rsc) : ?>
                                                    <?php $resource_access = $rsc['resource_access']; ?>
                                                    <tr>
                                                        <td class="text-center"><?= $i ?></td>
                                                        <td><?= $rsc['title'] ?></td>
                                                        <?php foreach ($crud as $_crud) : ?>
                                                            <td class="text-center">
                                                                <?php $id_access = search_array_return($resource_access, 'crud_id', $_crud['crud_id'], 'menu_access_id'); ?>
                                                                <?php if ($id_access !== FALSE) : ?>
                                                                    <?php
                                                                    $check_access = $init->checkRoleAccess($group->id, $id_access)->getRowArray();
                                                                    ?>
                                                                    <div class="form-check">
                                                                        <?php if (!empty($check_access)) : ?>
                                                                            <input class="form-check-input" data-group="<?= $group->id ?>" data-access="<?= $id_access ?>" data-resource="<?= $rsc['title'] ?>" data-namegroup="<?= $group->name ?>" data-namecrud="<?= $_crud['crud_name'] ?>" onclick="role_access(event)" type="checkbox" value="<?= $_crud['crud_id'] ?>" id="crud-<?= $_crud['crud_id'] ?>" checked>
                                                                        <?php else : ?>
                                                                            <input class="form-check-input" data-group="<?= $group->id ?>" data-access="<?= $id_access ?>" data-resource="<?= $rsc['title'] ?>" data-namegroup="<?= $group->name ?>" data-namecrud="<?= $_crud['crud_name'] ?>" onclick="role_access(event)" type="checkbox" value="<?= $_crud['crud_id'] ?>" id="crud-<?= $_crud['crud_id'] ?>">
                                                                        <?php endif; ?>
                                                                    </div>
                                                                <?php else : ?>
                                                                    -
                                                                <?php endif; ?>
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

<?= view('admin/permissions/dist/permissions/footer') ?>
<?= $this->endSection(); ?>