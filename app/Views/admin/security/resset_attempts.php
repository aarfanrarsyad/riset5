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
                        <li class="breadcrumb-item text-muted"><span>Reset attempts</span></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content mx-2 pb-5">
        <div class="container-fluid">
            <?= session()->getFlashdata('status') ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="card card-secondary elevation-3 card-outline">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5><i class="fas fa-sync-alt"></i>&ensp;Reset attempts</h5>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-hover table-sm text-sm" id="reset-attempts-table">
                                        <thead>
                                            <tr>
                                                <td class="text-center">No.</td>
                                                <td class="text-center">IP Address</td>
                                                <td class="text-center">Email</td>
                                                <td class="text-center">User Agent</td>
                                                <td class="text-center">Token</td>
                                                <td class="text-center">Time</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($reset_attempts as $reset_attempt) : ?>
                                                <tr>
                                                    <td class="text-center"><?= $i ?></td>
                                                    <td class="text-center"><?= $reset_attempt['ip_address'] ?></td>
                                                    <td><?= $reset_attempt['email'] ?></td>
                                                    <td><?= $reset_attempt['user_agent'] ?></td>
                                                    <td><?= $reset_attempt['token'] ?></td>
                                                    <td><?= $reset_attempt['created_at'] ?></td>
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
      initalize_dataTables('#reset-attempts-table')
</script>

<?= $this->endSection(); ?>