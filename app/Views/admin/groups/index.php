<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<!-- Content Wrapper. Contains page content -->

<script>
  function edit_group(id, name, desc) {
    $('#form-input-group').attr('action', '<?= base_url('/admin/groups/update') ?>');
    $('#id').val(id);
    $('.modal-title').html('<i class="fas fa-layer-group text-secondary"></i>&ensp;Update group ' + name);
    $('#name').val(name);
    $('#description').val(desc);
    $('.modal').modal('show')
  }

  function insert_group() {
    $('#form-input-group').attr('action', '<?= base_url('/admin/groups/insert') ?>');
    $('.modal-title').html('<i class="fas fa-layer-group text-secondary"></i>&ensp;Insert new group');
    $('#id').val('');
    $('#name').val('');
    $('#description').val('');
    $('.modal').modal('show')
  }

  function delete_group(id, role) {
    Swal.fire({
      icon: 'question',
      text: 'Are you sure to delete the ' + role + ' role?',
      showCancelButton: true,
      confirmButtonColor: '#4248ED',
      cancelButtonColor: '#33A1C4',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: '<?= base_url('/admin/groups/delete') ?>',
          method: 'POST',
          dataType: 'json',
          data: {
            id: id
          },
          success: function(result) {
            if (result === true) {
              Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Group deleted successfully',
                showConfirmButton: false,
                timer: 2500
              }).then(function() {
                window.location = "<?= base_url('admin/groups') ?>";
              })
            } else {
              Swal.fire({
                icon: 'info',
                title: 'Oops ...',
                text: 'Something went wrong',
                showConfirmButton: false,
                timer: 2500
              })
            }
          }
        });
      }
    })

  }
</script>
<div class="content-wrapper">

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
            <li class="breadcrumb-item text-muted"><span>Groups Managment</span></li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <section class="content mx-2 pb-5">
    <div class="container-fluid">
      <?= session()->getFlashdata('status') ?>

      <div class="card card-secondary elevation-3 card-outline">
        <div class="card-body">
          <div class="row">
            <div class="col">
              <h5><i class="fas fa-layer-group text-secondary"></i>&ensp;Groups Managment</h5>
            </div>
            <div class="col d-flex justify-content-end">
              <button class="btn btn-outline-secondary btn-xs" onclick="insert_group()"><i class=" fas fa-user-plus"></i>&ensp;Add new group</button>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-12">
              <table class="table table-hover table-sm text-sm" id="group-table">
                <thead>
                  <tr>
                    <td class="text-center">No.</td>
                    <td>Group Name</td>
                    <td>Description</td>
                    <td class="text-center">Actions</td>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($data as $dataset) : ?>
                    <tr>
                      <td class="text-center"><?= $i ?></td>
                      <td><?= $dataset->name ?></td>
                      <td><?= $dataset->description ?></td>
                      <td class=" text-center">
                        <button class="btn btn-xs btn-outline-primary mr-1" onclick="edit_group(<?= $dataset->id ?>,'<?= $dataset->name ?>','<?= $dataset->description ?>')"><i class="fas fa-edit"></i>&ensp;<span class="text-xs">Update</span></button>
                        <button class="btn btn-xs btn-outline-primary" onclick="delete_group(<?= $dataset->id ?>,'<?= $dataset->name ?>')"><i class="fas fa-trash"></i>&ensp;<span class="text-xs">Delete</span></button>
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

<div class="modal fade" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content card card-white card-outline px-2 py-2">
      <h5 class="modal-title text-secondary mx-2">Insert New Role</h5>
      <div class="modal-body mt-2">
        <form id="form-input-group" action="<?= base_url('admin/groups/insert') ?>" method="POST">
          <input type="hidden" name="id" id="id">
          <div class="form-group">
            <label for="name"><span class="text-sm text-secondary">Group Name :</span></label>
            <input type="text" name="name" class="form-control text-sm border-top-0 border-right-0 border-left-0" id="name" placeholder="Ex : Administrator" style="border-radius:0" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="description"><span class="text-sm text-secondary">Description :</span></label>
            <input type="text" class="form-control text-sm border-top-0 border-right-0 border-left-0" name="description" id="description" placeholder="Ex : this role will be used for ...." style="border-radius:0" autocomplete="off">
          </div>
          <div class="d-flex justify-content-end">
            <button type="submit" id="btn-submit" name="insert_group" class="btn btn-sm btn-outline-primary"><i class="fas fa-paper-plane"></i>&ensp;Send data</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  initalize_dataTables('#group-table')
</script>

<?= $this->endSection(); ?>