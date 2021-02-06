<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<!-- Content Wrapper. Contains page content -->

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
                        <li class="breadcrumb-item text-muted"><span>Group permission</span></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content mx-2 pb-5">
        <div class="container-fluid">
            <div class="card card-secondary elevation-3 card-outline">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5><i class="fas fa-cogs text-secondary"></i>&ensp;Group permission</h5>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
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
                                                <a href="<?= base_url('/admin/permissions/' . $group->id) ?>" class="btn btn-xs btn-outline-primary"><i class="fas fa-user-cog"></i>&ensp;<span class="text-xs">Set permissions</span></button>
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
    </section>
</div>
<script>
    initalize_dataTables('#permissions-index')
</script>
<?= $this->endSection(); ?>