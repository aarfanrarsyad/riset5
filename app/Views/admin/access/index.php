<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<?= view('admin/access/dist/index/header') ?>

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

    <div class="container-fluid px-4 pb-5" style="font-size:small;">
        <div class="response">
            <?= session()->getFlashdata('status'); ?>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card card-light card-outline card-outline-tabs elevation-3">
                    <div class="bg-light px-3 py-3">
                        <h5><i class="fas fa-tools text-secondary"></i>&ensp;Access Management</h5>
                    </div>
                    <div class="card-header mt-2 p-0 border-bottom-0 ">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active text-secondary" data-toggle="pill" href="#tab1" role="tab" aria-controls="tab1" aria-selected="false">Resources List &ensp;
                                    <span class="badge bg-indigo right" title="<?= count($resources) ?> Data"><i class="far fa-bell"></i>
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
                                                                        <input class="form-check-input" data-resource="<?= $resource['submenu_id'] ?>" data-access="<?= $_crud['crud_id'] ?>" data-nameresource="<?= $resource['title'] ?>" data-nameaccess="<?= $_crud['crud_name'] ?>" onclick="check_access(event)" type="checkbox" value="<?= $_crud['crud_id'] ?>" id="crud-<?= $resource['submenu_id'] ?>-<?= $_crud['crud_id'] ?>" checked>
                                                                    <?php else : ?>
                                                                        <input class="form-check-input" data-resource="<?= $resource['submenu_id'] ?>" data-access="<?= $_crud['crud_id'] ?>" data-nameresource="<?= $resource['title'] ?>" data-nameaccess="<?= $_crud['crud_name'] ?>" onclick="check_access(event)" type="checkbox" value="<?= $_crud['crud_id'] ?>" id="crud-<?= $resource['submenu_id'] ?>-<?= $_crud['crud_id'] ?>">
                                                                    <?php endif; ?>
                                                                    <label class="form-check-label" for="crud-<?= $_crud['crud_id'] ?>">
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
        </div>
    </div>
</div>
<?= view('admin/access/dist/index/footer') ?>
<?= $this->endSection(); ?>