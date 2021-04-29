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
                        <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Home</a></li>
                        <li class="breadcrumb-item text-muted"><span>Activation attempts</span></li>
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
                        <h5><i class="fas fa-key text-secondary"></i>&ensp;Activation attempts</h5>
                    </div>
                    <div class="card-header mt-2 p-0 border-bottom-0 ">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active text-secondary" data-toggle="pill" href="#tab1" role="tab" aria-controls="tab1" aria-selected="false">Activation Attempts List &ensp;
                                    <span class="badge bg-indigo right" title="<?= count($activation_attempts) ?> Data"><i class="far fa-bell"></i>
                                        <?= count($activation_attempts) ?></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="tab1" role="tabpanel" aria-labelledby="tab1">
                                <div class="row mt-3">
                                    <div class="col">
                                        <table class="table table-hover table-sm text-sm" id="activation-attempts-table">
                                            <thead>
                                                <tr>
                                                    <td class="text-center">No.</td>
                                                    <td class="text-center">IP Address</td>
                                                    <td class="text-center">User Agent</td>
                                                    <td class="text-center">Token</td>
                                                    <td class="text-center">Time</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach ($activation_attempts as $activation_attempt) : ?>
                                                    <tr>
                                                        <td class="text-center"><?= $i ?></td>
                                                        <td class="text-center"><?= $activation_attempt['ip_address'] ?></td>
                                                        <td class="text-justify"><?= $activation_attempt['user_agent'] ?></td>
                                                        <td class="text-justify"><?= $activation_attempt['token'] ?></td>
                                                        <td class="text-center"><?= format_date($activation_attempt['created_at']) ?></td>
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

<script>
    initalize_dataTables('#activation-attempts-table')
</script>

<?= $this->endSection(); ?>