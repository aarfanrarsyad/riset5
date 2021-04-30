<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

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
                        <li class="breadcrumb-item text-primaryHover"><a href="<?= base_url('/') ?>">Home</a></li>
                        <li class="breadcrumb-item text-muted text-gray-100"><span>Group permission</span></li>
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
                    <div class="bg-light px-3 py-3">
                        <h5><i class="fas fa-cogs text-secondary"></i>&ensp;Group permission</h5>
                    </div>
                    <div class="card-header mt-2 p-0 border-bottom-0 ">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active text-secondary" data-toggle="pill" href="#tab1" role="tab" aria-controls="tab1" aria-selected="false">Groups List &ensp;
                                    <span class="badge bg-indigo right" title="<?= count($groups) ?> Data"><i class="far fa-bell"></i>
                                        <?= count($groups) ?></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="tab1" role="tabpanel" aria-labelledby="tab1">
                                <div class="row">
                                    <div class="col">
                                        <table class="table table-hover table-sm text-sm" id="permissions-index">
                                            <thead>
                                                <tr>
                                                    <td class="text-center">No.</td>
                                                    <td>Group</td>
                                                    <td class="text-center">Actions</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1 ?>
                                                <?php foreach ($groups as $group) : ?>
                                                    <tr>
                                                        <td class="text-center"><?= $i ?></td>
                                                        <td><?= $group->name ?></td>
                                                        <td class="text-center">
                                                            <a href="<?= base_url('/admin/permissions/' . $group->id) ?>" class="btn btn-xs bg-teal"><i class="fas fa-user-cog"></i>&ensp;<span class="text-xs">Set permissions</span></button>
                                                        </td>
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

<?= view('admin/permissions/dist/index/footer') ?>
<?= $this->endSection(); ?>