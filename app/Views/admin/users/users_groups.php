<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<!-- Content Wrapper. Contains page content -->
<script>
    function change_group(event) {
        event.preventDefault();
        let text_alert = '';
        let text_button = '';
        let prop = false;


        let user_id = $(event.target).data('user');
        let group_id = $(event.target).data('group');
        let user_name = $(event.target).data('user_name');
        let group_name = $(event.target).data('group_name');

        if ($(event.target).is(':checked') === false) {
            text_alert = 'Are you sure to delete group ' + group_name + ' for user ' + user_name + '?';
            text_button = 'Yes, delete it!';
        } else {
            text_alert = 'Are you sure to add group ' + group_name + ' for user ' + user_name + ' ?';
            text_button = 'Yes, add it!';
            prop = true;
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
                    url: '<?= base_url('/admin/users-groups/insert') ?>',
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        user_id: user_id,
                        group_id: group_id
                    },
                    success: function(result) {
                        if (result[0] == 'delete') {
                            if (result[1] === true) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: 'Successfully deleted group ' + group_name + ' for user ' + user_name + '.',
                                    showConfirmButton: false,
                                    timer: 3000
                                }).then(function() {
                                    $(event.target).prop('checked', prop)
                                })
                            } else {
                                Swal.fire({
                                    icon: 'info',
                                    title: 'Failed',
                                    text: 'Failed to delete the ' + group_name + ' group for ' + user_name + ' user.',
                                    showConfirmButton: false,
                                    timer: 3000
                                })
                            }
                        } else {
                            if (result[1] === true) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: 'Successfully added group ' + group_name + ' for user ' + user_name + '.',
                                    showConfirmButton: false,
                                    timer: 3000
                                }).then(function() {
                                    $(event.target).prop('checked', prop)
                                })
                            } else {
                                Swal.fire({
                                    icon: 'info',
                                    title: 'Failed',
                                    text: 'Failed to added the ' + group_name + ' group for ' + user_name + ' user.',
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
                        <li class="breadcrumb-item text-muted"><span>Management users groups</span></li>
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
                                    <h5><i class="fas fa-cogs text-secondary"></i>&ensp;Management users groups</h5>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12 px-3">
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
    </section>
</div>

<script>
    initalize_dataTables('#permission-table')
</script>

<?= $this->endSection(); ?>