<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<script>
  function edit_menu(id, menu, icon) {
    $('#form-input-group').attr('action', '<?= base_url('/admin/menu/update') ?>');
    $('#id').val(id);
    $('.modal-title').html('<i class="fas fa-chevron-circle-down text-secondary"></i>&ensp;Update menu ' + name);
    $('#menu').val(menu);
    $('#icon').val(icon);
    $('#btn-submit').attr('name', 'update_menu');
    $('.modal').modal('show')
  }

  function insert_menu() {
    $('#form-input-group').attr('action', '<?= base_url('/admin/menu/insert') ?>');
    $('.modal-title').html('<i class="fas fa-chevron-circle-down text-secondary"></i>&ensp;Insert new menu');
    $('#id').val('');
    $('#menu').val('');
    $('#icon').val('');
    $('#btn-submit').attr('name', 'insert_menu');
    $('.modal').modal('show')
  }

  function delete_menu(id, menu) {
    Swal.fire({
      icon: 'question',
      text: 'Are you sure to delete the ' + menu + ' menu?',
      showCancelButton: true,
      confirmButtonColor: '#4248ED',
      cancelButtonColor: '#33A1C4',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: '<?= base_url('/admin/menu/delete') ?>',
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
                text: 'The ' + menu + ' menu deleted successfully',
                showConfirmButton: false,
                timer: 1500
              }).then(function() {
                window.location = "<?= base_url('/admin/resources') ?>";
              })
            } else {
              if (result !== false) {
                let html = '<div class="alert alert-danger text-sm"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                  '<span style="font-weight:bold">Something went wrong !</span>&ensp;' +
                  'The ' + menu + ' menu is currently being used by resource ' + result +
                  '</div>';
                $('.response').append(html);
              }

              Swal.fire({
                icon: 'info',
                title: 'Oops',
                text: 'Something went wrong',
                showConfirmButton: false,
                timer: 1500
              })
            }
          }
        });
      }
    })
  }

  function delete_resource(id, resource) {
    Swal.fire({
      icon: 'question',
      text: 'Are you sure to delete the ' + resource + ' resource?',
      showCancelButton: true,
      confirmButtonColor: '#4248ED',
      cancelButtonColor: '#33A1C4',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: '<?= base_url('/admin/resources/delete') ?>',
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
                text: 'The ' + resource + ' menu deleted successfully',
                showConfirmButton: false,
                timer: 1500
              }).then(function() {
                window.location = "<?= base_url('admin/resources') ?>";
              })
            } else {
              Swal.fire({
                icon: 'info',
                title: 'Oops',
                text: 'Something went wrong',
                showConfirmButton: false,
                timer: 1500
              })
            }
          }
        });
      }
    })
  }
</script>


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class=" row mb-2">
        <div class="col-sm-6">
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right text-sm">
            <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Home</a></li>
            <li class="breadcrumb-item text-muted"><span>Resources Management</span></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <section class="content mx-2 pb-5">
    <div class="container-fluid">
      <div class="response">
        <?= session()->getFlashdata('status'); ?>
      </div>
      <div class="card card-secondary elevation-3 card-outline">
        <div class="card-body">
          <div class="row">
            <div class="col">
              <h5><i class="fas fa-chevron-circle-down text-secondary"></i>&ensp;Management Menu</h5>
            </div>
            <div class="col d-flex justify-content-end">
              <button type="button" class="btn btn-outline-secondary btn-xs" onclick="insert_menu()"><i class=" fas fa-user-plus"></i>&ensp;Add new menu</button>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-12">
              <table class="table table-hover table-sm text-sm" id="menu-table">
                <thead>
                  <tr>
                    <td class="text-center">No.</td>
                    <td>Menu Name</td>
                    <td>Icon</td>
                    <td class="text-center">Actions</td>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1 ?>
                  <?php foreach ($menus as $dataset) : ?>
                    <tr>
                      <td class="text-center"><?= $i ?></td>
                      <td><?= $dataset['menu_name'] ?></td>
                      <td><i class="<?= $dataset['menu_icon'] ?> text-secondary"></i></td>
                      <td class="text-center">
                        <button type="button" class="btn btn-xs btn-outline-primary mr-1" onclick="edit_menu(<?= $dataset['menu_id'] ?>,'<?= $dataset['menu_name'] ?>','<?= $dataset['menu_icon'] ?>')"><i class="fas fa-edit"></i>&ensp;<span class="text-xs">Update</span></button>
                        <button type="button" class="btn btn-xs btn-outline-primary" onclick="delete_menu(<?= $dataset['menu_id'] ?>, '<?= $dataset['menu_name'] ?>')"><i class="fas fa-trash"></i>&ensp;<span class="text-xs">Delete</span></button>
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

      <br>

      <div class="card card-secondary elevation-3 card-outline mt-3">
        <div class="card-body">
          <div class="row">
            <div class="col">
              <h5><i class="fas fa-bars text-secondary"></i>&ensp;Management Resources</h5>
            </div>
            <div class="col d-flex justify-content-end">
              <button type="button" class="btn btn-outline-secondary btn-xs" onclick="window.location = '<?= base_url('/admin/resources/insert') ?>' "><i class=" fas fa-user-plus"></i>&ensp;Add new resource</button>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-12">
              <table class="table table-hover table-sm text-sm" id="resources-table">
                <thead>
                  <tr>
                    <td class="text-center">No.</td>
                    <td>Title</td>
                    <td>Parent Menu</td>
                    <td>URL</td>
                    <td>Icon</td>
                    <td class="text-center">Active</td>
                    <td class="text-center">Actions</td>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1 ?>
                  <?php foreach ($resources as $dataset) : ?>
                    <tr>
                      <td class="text-center"><?= $i ?></td>
                      <td><?= $dataset['title'] ?></td>
                      <td><?= $dataset['menu_name'] ?></td>
                      <td><?= $dataset['url'] ?></td>
                      <td><i class="<?= $dataset['icon'] ?> text-secondary"></i></td>
                      <td class="text-center">
                        <?php if ($dataset['active'] == 1) : ?>
                          <span class="badge badge-pill badge-primary">Active</span>
                        <?php else : ?>
                          <span class="badge badge-pill badge-danger">Not Active</span>
                        <?php endif; ?>
                      </td>
                      <td class="text-center">
                        <a href="<?= base_url('/admin/resources/update/' . $dataset['submenu_id']) ?>" class="btn btn-xs btn-outline-primary mr-1"><i class="fas fa-edit"></i>&ensp;<span class="text-xs">Update</span></a>
                        <button onclick="delete_resource(<?= $dataset['submenu_id'] ?>, '<?= $dataset['title'] ?>')" class="btn btn-xs btn-outline-primary"><i class="fas fa-trash"></i>&ensp;<span class="text-xs">Delete</span></button>
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

<div class="modal fade" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content card card-white card-outline px-2 py-2">
      <h5 class="modal-title text-secondary mx-2"></h5>
      <div class="modal-body mt-2">
        <form id="form-input-group" action="<?= base_url('admin/groups/insert') ?>" method="POST">
          <input type="hidden" name="id" id="id">
          <div class="form-group">
            <label for="menu"><span class="text-sm text-secondary">Name Menu :</span></label>
            <input type="text" name="menu" class="form-control text-sm border-top-0 border-right-0 border-left-0" id="menu" placeholder="Ex : Dashboard" style="border-radius:0" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="icon"><span class="text-sm text-secondary">Icon :</span></label>
            <input type="text" class="form-control text-sm border-top-0 border-right-0 border-left-0" name="icon" id="icon" placeholder="Insert icon" style="border-radius:0" autocomplete="off" required>
          </div>
          <div class="d-flex justify-content-end">
            <button type="submit" id="btn-submit" name="insert_menu" class="btn btn-sm btn-outline-primary"><i class="fas fa-paper-plane"></i>&ensp;Send data</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  initalize_dataTables('#menu-table')
  initalize_dataTables('#resources-table')
</script>
<?= $this->endSection(); ?>