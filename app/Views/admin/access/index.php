<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<!-- Content Wrapper. Contains page content -->
<script>
    function check_access(event) {
        event.preventDefault();
        let text_alert = '';
        let text_button = '';
        let resource = $(event.target).data('resource');
        let access = $(event.target).data('access');
        let name_resource = $(event.target).data('nameresource');
        let name_access = $(event.target).data('nameaccess');

        if ($(event.target).is(':checked') === false) {
            text_alert = 'Are you sure to remove ' + name_access + ' access to the ' + name_resource + ' resource?';
            text_button = 'Yes, delete it!';
        } else {
            text_alert = 'Are you sure to add ' + name_access + ' access to the ' + name_resource + ' resource?';
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
                    url: '<?= base_url('/admin/access/insert') ?>',
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        resource: resource,
                        access: access
                    },
                    success: function(result) {
                        if (result[0] === 'delete') {
                            if (result[1] === true) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Successfully',
                                    text: 'Successfully removed ' + name_access + ' access to ' + name_resource + ' resource',
                                    showConfirmButton: false,
                                    timer: 1500
                                }).then(function() {
                                    window.location = "<?= base_url('admin/access') ?>";
                                })
                            } else {
                                Swal.fire({
                                    icon: 'info',
                                    title: 'Failed',
                                    text: 'Failed to remove ' + name_access + ' access to ' + name_resource + ' resource',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            }
                        } else {
                            if (result[1] === true) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Successfully',
                                    text: 'Successfully added ' + name_access + ' access to ' + name_resource + ' resource',
                                    showConfirmButton: false,
                                    timer: 1500
                                }).then(function() {
                                    window.location = "<?= base_url('admin/access') ?>";
                                })
                            } else {
                                Swal.fire({
                                    icon: 'info',
                                    title: 'Failed',
                                    text: 'Failed to add ' + name_access + ' access to ' + name_resource + ' resource',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            }
                        }
                    }
                });
            }
        })
    }
</script>

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
                        <li class="breadcrumb-item text-muted"><span>Access Management</span></li>
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
                                    <h5><i class="fas fa-tools text-secondary"></i>&ensp;Access Management</h5>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-hover table-sm text-sm" id="access-table">
                                        <thead>
                                            <tr>
                                                <td class="text-center">No.</td>
                                                <td>Menu</td>
                                                <td class="text-center">Access</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($resources as $resource) : ?>
                                                <?php $resource_access = $resource['resource_access'];
                                                ?>
                                                <tr>
                                                    <td class="text-center"><?= $i ?></td>
                                                    <td><?= $resource['title'] ?></td>
                                                    <td class="text-center">
                                                        <?php foreach ($crud as $_crud) : ?>
                                                            <div class="form-check form-check-inline">
                                                                <?php if (search_array_2($resource_access, 'crud_id', $_crud['crud_id']) !== FALSE) : ?>
                                                                    <input class="form-check-input mr-3" data-resource="<?= $resource['submenu_id'] ?>" data-access="<?= $_crud['crud_id'] ?>" data-nameresource="<?= $resource['title'] ?>" data-nameaccess="<?= $_crud['crud_name'] ?>" onclick="check_access(event)" type="checkbox" value="<?= $_crud['crud_id'] ?>" id="crud-<?= $resource['submenu_id'] ?>-<?= $_crud['crud_id'] ?>" checked>
                                                                <?php else : ?>
                                                                    <input class="form-check-input" data-resource="<?= $resource['submenu_id'] ?>" data-access="<?= $_crud['crud_id'] ?>" data-nameresource="<?= $resource['title'] ?>" data-nameaccess="<?= $_crud['crud_name'] ?>" onclick="check_access(event)" type="checkbox" value="<?= $_crud['crud_id'] ?>" id="crud-<?= $resource['submenu_id'] ?>-<?= $_crud['crud_id'] ?>">
                                                                <?php endif; ?>
                                                                <label class="form-check-label mr-5" for="crud-<?= $_crud['crud_id'] ?>">
                                                                    <?= $_crud['crud_name'] ?>
                                                                </label>
                                                            </div>
                                                        <?php endforeach; ?>
                                                    </td>
                                                </tr>
                                                <?php $i++; ?>
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
    initalize_dataTables('#access-table')
</script>

<?= $this->endSection(); ?>