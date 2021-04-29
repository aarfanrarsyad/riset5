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
                        <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
                        <li class="breadcrumb-item text-muted"><span>Login attempts</span></li>
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
                        <h5><i class="fas fa-sign-in-alt text-secondary"></i>&ensp;Login Attempts</h5>
                    </div>
                    <div class="card-header mt-2 p-0 border-bottom-0 ">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active text-secondary" data-toggle="pill" href="#tab1" role="tab" aria-controls="tab1" aria-selected="false">Login Attempts List &ensp;
                                    <span class="badge bg-indigo right" title="<?= count($logins) ?> Data"><i class="far fa-bell"></i>
                                        <?= count($logins) ?></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="tab1" role="tabpanel" aria-labelledby="tab1">
                                <div class="row mt-3">
                                    <div class="col">
                                        <table class="table table-hover table-sm text-sm" id="logins-table">
                                            <thead>
                                                <tr>
                                                    <td class="text-center">No.</td>
                                                    <td class="text-center">IP Address</td>
                                                    <td>Email</td>
                                                    <td>User Name</td>
                                                    <td class="text-center">Time</td>
                                                    <td class="text-center">Status</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach ($logins as $login) : ?>
                                                    <tr>
                                                        <td class="text-center"><?= $i ?></td>
                                                        <td class="text-center"><?= $login['ip_address'] ?></td>
                                                        <td><?= $login['email'] ?></td>
                                                        <td>
                                                            <?php if (is_null($login['user_id'])) : ?>
                                                                <span class="text-muted">Unknown user</span>
                                                            <?php else : ?>
                                                                <span><?= $login['username'] ?></span>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td class="text-center"><?= format_date($login['date']) ?></td>
                                                        <td class="text-center">
                                                            <?php if ($login['success'] == 0) : ?>
                                                                <span><i class="fas fa-times text-danger"></i></span>
                                                            <?php else : ?>
                                                                <span><i class="fas fa-check text-success"></i></span>
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

<script>
    initalize_dataTables('#logins-table')
</script>

<?= $this->endSection(); ?>