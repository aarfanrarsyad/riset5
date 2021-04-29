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
                        <li class="breadcrumb-item text-muted"><span>Activity Log</span></li>
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
                        <h5><i class="fas fa-user-clock text-secondary"></i>&ensp;Activity Log</h5>
                    </div>
                    <div class="card-header mt-2 p-0 border-bottom-0 ">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active text-secondary" data-toggle="pill" href="#tab1" role="tab" aria-controls="tab1" aria-selected="false">Activity List &ensp;
                                    <span class="badge bg-indigo right" title="<?= count($activities) ?> Data"><i class="far fa-bell"></i>
                                        <?= count($activities) ?></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="tab1" role="tabpanel" aria-labelledby="tab1">
                                <div class="row mt-3">
                                    <div class="col">
                                        <table class="table table-hover table-sm text-sm" id="activity-table">
                                            <thead>
                                                <tr>
                                                    <td class="text-center">No.</td>
                                                    <td class="text-center">Time</td>
                                                    <td class="text-center">User Name</td>
                                                    <td class="text-center">User Group</td>
                                                    <td class="text-center">Access</td>
                                                    <!-- <td class="text-center">Description</td> -->
                                                    <td class="text-center">Scope</td>
                                                    <td class="text-center">Status</td>
                                                    <td class="text-center">Description</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach ($activities as $activity) : ?>
                                                    <tr>
                                                        <td class="text-center"><?= $i ?>.</td>
                                                        <td class="text-center"><?= $activity['time'] ?></td>
                                                        <td class="text-justify"><?= $activity['user_name'] ?></td>
                                                        <td class="text-text"><?= $activity['group_name'] ?></td>
                                                        <td class="text-center">
                                                            <?php if ($activity['access_name'] == 1) : ?>
                                                                <span class="">Create</span>
                                                            <?php elseif ($activity['access_name'] == 2) : ?>
                                                                <span class="">Update</span>
                                                            <?php else : ?>
                                                                <span class="">Delete</span>
                                                            <?php endif; ?>
                                                        </td>
                                                        <!-- <td class="text-justify"><?= $activity['description'] ?></td> -->
                                                        <td class="text-justify"><?= $activity['target_scope'] ?></td>
                                                        <td class="text-center">
                                                            <?php if ($activity['status'] == 0) : ?>
                                                                <span><i class="fas fa-times text-danger"></i></span>
                                                            <?php else : ?>
                                                                <span><i class="fas fa-check text-success"></i></span>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td class="text-justify"><?= $activity['description'] ?></td>
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
    initalize_dataTables('#activity-table')
</script>

<?= $this->endSection(); ?>