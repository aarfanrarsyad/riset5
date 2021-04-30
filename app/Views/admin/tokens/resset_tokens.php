<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>


<div class="container-fluid">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right text-sm">
                            <li class="breadcrumb-item text-primaryHover"><a href="<?= base_url('/') ?>">Home</a></li>
                            <li class="breadcrumb-item text-muted text-gray-100"><span>Resset Tokens</span></li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <div class="container-fluid px-4" style="font-size:small;">
            <div class="response">
                <?= session()->getFlashdata('status') ?>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-light card-outline card-outline-tabs elevation-3">
                        <div class="bg-light px-3 py-3">
                            <h5><i class="fas fa-qrcode text-secondary"></i>&ensp;Resset Tokens</h5>
                        </div>
                        <div class="card-header mt-2 p-0 border-bottom-0 ">
                            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active text-secondary" data-toggle="pill" href="#tab1" role="tab" aria-controls="tab1" aria-selected="false">Activation Tokens List &ensp;
                                        <span class="badge bg-indigo right" title="<?= count($data) ?> Data"><i class="far fa-bell"></i>
                                            <?= count($data) ?></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="tab1" role="tabpanel" aria-labelledby="tab1">
                                    <div class="row mt-3">
                                        <div class="col">
                                            <table class="table table-hover table-sm text-sm" id="activations-table">
                                                <thead>
                                                    <tr>
                                                        <td class="text-center">No.</td>
                                                        <td>Name</td>
                                                        <td>Email</td>
                                                        <td class="text-center">Reset At</td>
                                                        <td class="text-center">Reset Tokens</td>
                                                        <td class="text-center">Reset Expires</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1; ?>
                                                    <?php foreach ($data as $dataset) : ?>
                                                        <tr>
                                                            <td class="text-center"><?= $i ?></td>
                                                            <td><?= $dataset['fullname'] ?></td>
                                                            <td><?= $dataset['email'] ?></td>
                                                            <td class="text-center">
                                                                <?php if (!is_null($dataset['reset_at'])) : ?>
                                                                    <?= format_date($dataset['reset_at']) ?>
                                                                <?php else : ?>
                                                                    <span class="text-muted">Not set</span>
                                                                <?php endif; ?>
                                                            </td>
                                                            <td class="text-center"><?= $dataset['reset_hash'] ?></td>
                                                            <td class="text-center">
                                                                <?php if (!is_null($dataset['reset_at'])) : ?>
                                                                    <?= format_date($dataset['reset_expires']) ?>
                                                                <?php else : ?>
                                                                    <span class="text-muted">Not set</span>
                                                                <?php endif; ?>
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
</div>

<script>
    initalize_dataTables('#activations-table')
</script>

<?= $this->endSection(); ?>