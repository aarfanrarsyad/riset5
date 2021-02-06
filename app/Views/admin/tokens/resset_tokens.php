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
                            <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
                            <li class="breadcrumb-item text-muted"><span>Resset Tokens</span></li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <section class="content mx-1 pb-5">
            <div class="container-fluid">
                <div class="response">
                </div>

                <div class="card card-secondary card-outline elevation-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5><i class="fas fa-qrcode text-secondary"></i>&ensp;Resset Tokens</h5>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
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
        </section>
    </div>
</div>

<script>
    initalize_dataTables('#activations-table')
</script>

<?= $this->endSection(); ?>