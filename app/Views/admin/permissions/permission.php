<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<!-- Content Wrapper. Contains page content -->
<script>
    function role_access(event) {
        event.preventDefault();
        let text_alert = '';
        let text_button = '';
        let status = false;

        let group = $(event.target).data('group');
        let resource_access = $(event.target).data('access');
        let name_group = $(event.target).data('namegroup');
        let name_resource = $(event.target).data('resource');
        let name_crud = $(event.target).data('namecrud');

        if ($(event.target).is(':checked') === false) {
            text_alert = 'Are you sure you want to remove ' + name_crud + ' access for the ' + name_group + ' role in the ' + name_resource + ' resource';
            text_button = 'Yes, delete it!';
        } else {
            status = true;
            text_alert = 'Are you sure you want to add ' + name_crud + ' access to the ' + name_group + ' role in the ' + name_resource + ' resource';
            text_button = 'Yes, add it!';
        }

        Swal.fire({
            icon: 'question',
            text: text_alert,
            showCancelButton: true,
            confirmButtonColor: '#4248ED',
            cancelButtonColor: '#33A1C4',
            confirmButtonText: text_button
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?= base_url('/admin/permissions/insert') ?>',
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        group: group,
                        access: resource_access
                    },
                    success: function(result) {
                        if (result[0] === 'delete') {
                            if (result[1] === true) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Successfully',
                                    text: 'Successfully removed ' + name_crud + ' access for ' + name_group + ' role in ' + name_resource + ' resource.',
                                    showConfirmButton: false,
                                    timer: 3000
                                }).then(function() {
                                    $(event.target).prop('checked', status)
                                })
                            } else {
                                Swal.fire({
                                    icon: 'info',
                                    title: 'Failed',
                                    text: 'Failed to remove ' + name_crud + ' access for ' + name_group + ' role in ' + name_resource + ' resource.',
                                    showConfirmButton: false,
                                    timer: 3000
                                })
                            }
                        } else {
                            if (result[1] === true) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Successfully',
                                    text: 'Successfully added ' + name_crud + ' access to ' + name_group + ' role in ' + name_resource + ' resource.',
                                    showConfirmButton: false,
                                    timer: 3000
                                }).then(function() {
                                    $(event.target).prop('checked', status)
                                })
                            } else {
                                Swal.fire({
                                    icon: 'info',
                                    title: 'Failed',
                                    text: 'Failed to add ' + name_crud + ' access to ' + name_group + ' role in ' + name_resource + ' resource.',
                                    showConfirmButton: false,
                                    timer: 3000
                                })
                            }
                        }
                    }
                });
            }
        })
    }
</script>

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
                    <ol class="breadcrumb float-sm-right text-sm">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Home</a></li>
                        <li class="breadcrumb-item text-muted"><span><?= $group->name ?> permission table</span></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content mx-2 pb-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-secondary elevation-3 card-outline">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5><i class="fas fa-cogs text-secondary"></i>&ensp;<?= $group->name ?> permission table</h5>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12 px-3">
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
    </section>
</div>

<script>
    initalize_dataTables('#permission-table')
</script>

<?= $this->endSection(); ?>