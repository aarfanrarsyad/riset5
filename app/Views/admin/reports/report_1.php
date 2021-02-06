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
            <li class="breadcrumb-item text-muted"><span>Admin Report</span></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <?= session()->getFlashdata('status'); ?>
  <section class="content mx-2 pb-5">
    <div class="container-fluid">

      <div class="card card-secondary elevation-3 card-outline">
        <div class="card-body">
          <div class="row">
            <div class="col">
              <h5><i class="fas fa-chart-pie text-secondary"></i>&ensp;Reports 1</h5>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-12">
             
              <!-- Put your content in here -->

            </div>
          </div>
        </div>
      </div>

    </div>
  </section>
</div>


<?= $this->endSection(); ?>