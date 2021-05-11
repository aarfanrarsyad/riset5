<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<?= view('admin/galeri/dist/index/header') ?>


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
          <ol class="breadcrumb float-sm-right text-sm mr-2">
            <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
            <li class="breadcrumb-item text-muted"><span>Managemen Galeri Video</span></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <div class="container-fluid px-4 pb-5">
    <div class="response">
      <?= view('Myth\Auth\Views\_message_block') ?>
    </div>
    <div class="row">

      <div class="col-12">
        <?= session()->flash; ?>

        <div class="card card-light card-outline card-outline-tabs elevation-3">
          <div class="text-primaryHover text-lg px-3 py-3">
            <h5><i class="fab fa-youtube"></i>&ensp;Management Galeri Video</h5>
          </div>
          <div class="card-header mt-2 p-0 border-bottom-0 ">
            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active text-secondary" data-toggle="pill" href="#tab1" role="tab" aria-controls="tab1" aria-selected="false">Galeri Video &ensp;
                  <span class="badge bg-indigo right" title="<?= count($video) ?> Data User"><i class="far fa-bell"></i>
                    <?= count($video) ?></span>
                </a>
              </li>
            </ul>
          </div>
          <div class="card-body">
            <div class="tab-content">
              <div class="tab-pane fade active show" id="tab1" role="tabpanel" aria-labelledby="tabs-for-calculate">
                <div class="btn-group">
                  <button type="button" class="btn btn-ligjt dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-th-list text-muted"></i>&ensp;Pilih Tindakan
                  </button>
                  <div class="dropdown-menu text-sm">
                    <!-- <a class="dropdown-item" href="<?= base_url('admin/users/register') ?>"><i class="fas fa-plus-square"></i>&ensp;add video</a> -->
                    <a class="dropdown-item" href="javascript:void(0)" onclick="add_video()"><i class="fas fa-plus-square"></i>&ensp;add video</a>
                  </div>
                </div>
                <div class="row mt-4">
                  <div class="col">
                    <table class="table table-hover table-sm text-sm" id="gallery-table">
                      <thead>
                        <tr>
                          <td class="text-center">No.</td>
                          <td>Link</td>
                          <td>Album</td>
                          <td class="text-center">Diupload</td>
                          <td class="text-center">Uploader</td>
                          <td class="text-center">Status</td>
                          <td class="text-center">Tindakan</td>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($video as $data) : ?>
                          <tr>
                            <td class="text-center"><?= $i ?></td>
                            <td><a href="https://youtu.be/<?= $data['link'] ?>" target="_blank">https://youtu.be/<?= $data['link'] ?></a></td>
                            <td><?= $data['album'] ?></td>
                            <td class="text-center"><?= date('d-m-Y', strtotime($data['created_at'])); ?></td>
                            <td class="text-center"><?= $data['uploader']['nama'] ?></td>
                            <td class="text-center">
                              <?php if ($data['approval'] == 1) : ?>
                                <span class="badge badge-pill badge-primary">disetujui</span>
                              <?php else : ?>
                                <span class="badge badge-pill badge-danger">belum disetujui</span>
                              <?php endif; ?>
                            </td>
                            <td class="text-center">
                              <div class="dropleft">
                                <button class="btn btn-xs btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <span class="text-xs">Tindakan</span>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                  <?php if ($data['approval'] == 1) : ?>
                                    <button class="dropdown-item" type="button" onclick="change_approval(event)" data-id="<?= $data['id_video'] ?>" data-active="0"><i class="fas fa-toggle-on text-secondary"></i>&ensp;Batalkan persetujuan</button>
                                  <?php else : ?>
                                    <button class="dropdown-item" type="button" onclick="change_approval(event)" data-id="<?= $data['id_video'] ?>" data-active="1"><i class="fas fa-toggle-off text-secondary"></i>&ensp;Setujui video</button>
                                  <?php endif; ?>
                                  <button class="dropdown-item" type="button" onclick="delete_gallery(event)" data-id="<?= $data['id_video'] ?>"><i class="fas fa-trash text-secondary"></i>&ensp;Hapus video</button>
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
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="token-modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content card card-white card-outline px-2 py-2">
      <h5 class="modal-title text-secondary mx-2"><i class="fas fa-qrcode"></i>&ensp;Tambah Video Baru</h5>
      <div class="modal-body mt-2">
        <form id="form-input-upload" action="<?= base_url('admin/video_upload') ?>" method="POST">
          <div class="form-group">
            <label for="link"><span class="text-sm text-secondary">Link Video Youtube :</span></label>
            <input type="text" name="link" class="form-control text-sm border-top-0 border-right-0 border-left-0" id="link" placeholder="Ex : https://www.youtube.com/watch?v=FhQxf3pen7c" style="border-radius:0" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="albumVideo"><span class="text-sm text-secondary">Album Video :</span></label>
            <input list="album" class="form-control text-sm border-top-0 border-right-0 border-left-0" name="albumVideo" id="albumVideo" autocomplete="off">
            <div class="text-red-500">
              <?= service('validation')->getError('albumVideo'); ?>
            </div>
            <datalist id="album">
              <?php foreach ($album as $alb) : ?>
                <option value="<?= $alb['album'] ?>">Album <?= $alb['album'] ?></option>
              <?php endforeach; ?>
            </datalist>
          </div>
          <div class="d-flex justify-content-end">
            <button type="submit" id="btn-submit" class="btn btn-sm btn-outline-primary"><i class="fas fa-paper-plane"></i>&ensp;Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<form id="form-approval" action="<?= base_url('admin/change_approval_video') ?>" method="POST">
  <input type="hidden" name="id_video" id="id_approval">
  <input type="hidden" name="approval" id="approval">
</form>

<form id="form-delete" action="<?= base_url('admin/video_delete') ?>" method="POST">
  <input type="hidden" name="id_video" id="del">
</form>

<?= view('admin/galeri/dist/index/footer') ?>
<?= $this->endSection(); ?>