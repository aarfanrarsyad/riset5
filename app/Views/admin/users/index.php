<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<script>
  function delete_user(id, name) {

    Swal.fire({
      icon: 'question',
      text: 'Are you sure to delete user ' + name + '?',
      showCancelButton: true,
      confirmButtonColor: '#4248ED',
      cancelButtonColor: '#33A1C4',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: '<?= base_url('/admin/users/delete') ?>',
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
                text: name + ' data has been successfully deleted.',
                showConfirmButton: false,
                timer: 2500
              }).then(function() {
                window.location = "<?= base_url('admin/users') ?>";
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

  function change_active_status(event) {
    let id = $(event.target).data('id');
    let name = $(event.target).data('user');
    let is_active = $(event.target).data('active');

    let active = '';
    if (is_active == 1) {
      active = 'activate';
    } else {
      active = 'disable';
    }

    Swal.fire({
      icon: 'question',
      text: 'Are you sure to ' + active + ' ' + name + ' user ?',
      showCancelButton: true,
      confirmButtonColor: '#4248ED',
      cancelButtonColor: '#33A1C4',
      confirmButtonText: 'Yes, do it!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: '<?= base_url('admin/users/active-status') ?>',
          method: 'POST',
          dataType: 'json',
          data: {
            id: id,
            active: is_active
          },
          success: function(result) {
            console.log(result)
            if (result === true) {
              Swal.fire({
                icon: 'success',
                title: 'Success',
                text: name + ' data has been ' + active + 'd successfully.',
                showConfirmButton: false,
                timer: 2500
              }).then(function() {
                window.location = "<?= base_url('admin/users') ?>";
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
              <li class="breadcrumb-item text-muted"><span>Users Management</span></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section class="content mx-1 pb-5">
      <div class="container-fluid">
        <div class="response">
          <?= view('Myth\Auth\Views\_message_block') ?>
        </div>
        <div class="card card-secondary card-outline elevation-3">
          <div class="card-body">
            <div class="row">
              <div class="col">
                <h5><i class="fas fa-users text-secondary"></i>&ensp;Users Management</h5>
              </div>
              <div class="col d-flex justify-content-end">
                <button type="button" class="btn btn-outline-secondary btn-xs" onclick="window.location = '<?= base_url('admin/users/register') ?>' "><i class=" fas fa-user-plus"></i>&ensp;New User Registration</button>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-md-12">
                <table class="table table-hover table-sm text-sm" id="users-table">
                  <thead>
                    <tr>
                      <td class="text-center">No.</td>
                      <td>Name</td>
                      <td>NIM</td>
                      <td>Email</td>
                      <td class="text-center">Created at</td>
                      <td class="text-center">Active</td>
                      <td class="text-center">Actions</td>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($data as $dataset) : ?>
                      <tr>
                        <td class="text-center"><?= $i ?></td>
                        <td><?= $dataset['fullname'] ?></td>
                        <td><?= $dataset['nim'] ?></td>
                        <td><?= $dataset['email'] ?></td>
                        <td class="text-center"><?= format_date($dataset['created_at']) ?></td>
                        <td class="text-center">
                          <?php if ($dataset['active'] == 1) : ?>
                            <span class="badge badge-pill badge-primary">Active</span>
                          <?php else : ?>
                            <span class="badge badge-pill badge-info">Nonactive</span>
                          <?php endif; ?>
                        </td>
                        <td class="text-center">
                          <div class="dropleft">
                            <button class="btn btn-xs btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <span class="text-xs">Actions</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                              <?php if ($dataset['active'] == 1) : ?>
                                <button class="dropdown-item" type="button" onclick="change_active_status(event)" data-id="<?= $dataset['id'] ?>" data-user="<?= $dataset['fullname'] ?>" data-active="0"><i class="fas fa-toggle-off text-secondary"></i>&ensp;Deactivate user</button>
                              <?php else : ?>
                                <button class="dropdown-item" type="button" onclick="change_active_status(event)" data-id="<?= $dataset['id'] ?>" data-active="1" data-user="<?= $dataset['fullname'] ?>"><i class="fas fa-toggle-on text-secondary"></i>&ensp;Activate user</button>
                              <?php endif; ?>
                              <button class="dropdown-item" type="button"><i class="far fa-eye text-secondary"></i>&ensp;Detail user</button>
                              <button class="dropdown-item" type="button"><i class="fas fa-edit text-secondary"></i>&ensp;Update user</button>
                              <button class="dropdown-item" type="button" onclick="delete_user(<?= $dataset['id'] ?>,'<?= $dataset['fullname'] ?>')"><i class="fas fa-trash text-secondary"></i>&ensp;Delete user</button>
                            </div>
                          </div>
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
  initalize_dataTables('#users-table')
</script>

<?= $this->endSection(); ?>