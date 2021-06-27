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
            <li class="breadcrumb-item text-muted"><span>Managemen Galeri Foto</span></li>
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
            <h5><i class="far fa-images"></i>&ensp;Management Galeri Foto</h5>
          </div>
          <div class="card-header mt-2 p-0 border-bottom-0 ">
            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active text-secondary" data-toggle="pill" href="#tab1" role="tab" aria-controls="tab1" aria-selected="false">Galeri Foto &ensp;
                  <span class="badge bg-indigo right" title="<?= count($foto) ?> Data User"><i class="far fa-bell"></i>
                    <?= count($foto) ?></span>
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
                    <a class="dropdown-item" href="javascript:void(0)" onclick="add_photo()"><i class="fas fa-plus-square"></i>&ensp;add foto</a>
                  </div>
                </div>
                <div class="row mt-4">
                  <div class="col">
                    <table class="table table-hover table-sm text-sm" id="gallery-table">
                      <thead>
                        <tr>
                          <td class="text-center">No.</td>
                          <td>Foto</td>
                          <td>Album</td>
                          <td class="text-center">Diupload</td>
                          <td class="text-center">Uploader</td>
                          <td class="text-center">Report</td>
                          <td class="text-center">Status</td>
                          <td class="text-center">Tindakan</td>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($foto as $data) : ?>
                          <tr>
                            <td class="text-center"><?= $i ?></td>
                            <td>
                              <a data-toggle="modal" data-target="#imgpreview" onclick='galleryPreview("<?= $data["caption"] ?>", "<?= base_url() ?>/img/galeri/<?= $data["nama_file"] ?>")'>
                                <img style="width: 15em" src="<?= base_url() ?>/img/galeri/<?= $data['nama_file'] ?>" alt="<?= $data['nama_file'] ?>">
                              </a>

                            </td>
                            <td><?= $data['album'] ?></td>
                            <td class="text-center"><?= date('d-m-Y', strtotime($data['created_at'])); ?></td>
                            <td class="text-center"><?= $data['uploader']['nama'] ?></td>
                            <td class="text-center">
                              <span><?= count($data['report']) ?>&nbsp;&nbsp;&nbsp;</span>
                              <?php if (count($data['report']) > 0) : ?>
                                <span class="badge badge-pill badge-primary btn" href="javascript:void(0)" onclick="view_report(event)" data-report="<?php $report = "";
                                                                                                                                                      foreach ($data['report'] as $dt)
                                                                                                                                                        if ($report == "") $report .= ($dt['alasan']);
                                                                                                                                                        else $report .= (";" . $dt['alasan']);
                                                                                                                                                      echo ($report); ?>">view</span>
                              <?php endif; ?>
                            </td>
                            <td class="text-center">
                              <?php if ($data['approval'] == 1) : ?>
                                <span class="badge badge-pill badge-primary">disetujui</span>
                              <?php elseif ($data['approval'] == 0 && count($data['report']) !== 0 && count($data['report']) % 10 == 0) : ?>
                                <span class="badge badge-pill badge-warning">suspend</span>
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
                                    <button class="dropdown-item" type="button" onclick="change_approval(event)" data-id="<?= $data['id_foto'] ?>" data-active="0"><i class="fas fa-toggle-on text-secondary"></i>&ensp;Batalkan persetujuan</button>
                                  <?php else : ?>
                                    <button class="dropdown-item" type="button" onclick="change_approval(event)" data-id="<?= $data['id_foto'] ?>" data-active="1"><i class="fas fa-toggle-off text-secondary"></i>&ensp;Setujui foto</button>
                                  <?php endif; ?>
                                  <button class="dropdown-item" type="button" onclick="delete_gallery(event)" data-id="<?= $data['id_foto'] ?>"><i class="fas fa-trash text-secondary"></i>&ensp;Hapus foto</button>
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
      <h5 class="modal-title text-secondary mx-2"><i class="fas fa-qrcode"></i>&ensp;Tambah Foto Baru</h5>
      <div class="modal-body mt-2">
        <form id="form-input-upload" action="<?= base_url('/admin/foto_upload') ?>" method="post" enctype="multipart/form-data" class="flex flex-col text-sm">
          <div class="flex mt-5">
            <div class="flex justify-start items-center mb-2 w-full relative">
              <input type="file" hidden accept=".jpg, .jpeg, .img, .png" title="Pilih File" id='pilihFile' name="file_upload">
              <label for="pilihFile" title="Harus Diisi" class="pilihFile border border-primary text-sm text-secondary rounded-full w-24 py-1 text-center cursor-pointer hover:bg-secondaryhover transition-colors duration-300 mr-4 outline-none">Pilih
                File</label>
              <span class="text-primary absolute md:left-28 left-28 select-none cursor-default cursor md:text-sm text-sm" id="textPhoto">Tidak ada foto yang dipilih</span>
            </div>
          </div>
          <div class="text-red-500">
            <?= service('validation')->getError('file_upload'); ?>
          </div>
          <div class="form-group">
            <label for="albumFoto"><span class="text-sm text-secondary">Album Foto :</span></label>
            <input list="album" class="form-control text-sm border-top-0 border-right-0 border-left-0" name="albumFoto" id="albumFoto" autocomplete="off">
            <div class="text-red-500">
              <?= service('validation')->getError('albumFoto'); ?>
            </div>
            <datalist id="album">
              <?php foreach ($album as $alb) : ?>
                <option value="<?= $alb['album'] ?>">Album <?= $alb['album'] ?></option>
              <?php endforeach; ?>
            </datalist>
          </div>
          <div class="form-group">
            <label for="deskripsi" class="text-sm text-secondary">*Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" rows="4" class="inputForm resize-none font-heading text-xs form-control border-top-0 border-right-0 border-left-0" placeholder="ex. Penggunaan Jutsu Air dalam Mengatasi Permasalahan Banjir yang Sering Terjadi di Wilayah Pemukiman Rawan Longsor" maxlength="150" required></textarea>
          </div>
          <div class="text-red-500">
            <?= service('validation')->getError('deskripsi'); ?>
          </div>
          <!-- <label for="angkatan" class="text-primary font-medium">*Angkatan :</label>
                <input name="angkatan" id="angkatan" type="number" min="1" max="63" step="1" value="60" size="6" class="inputForm font-heading text-xs" required> -->
          <div class="text-primary font-medium">Tags :</div>
          <div id="tags-container">
            <div class="control-group">
              <select id="tags" class="tags font-heading text-xs border-top-0 border-right-0 border-left-0" placeholder="Tandai orang"></select>
            </div>
          </div>
          <div class="font-heading text-xs text-primary">
            <p class="mb-2"> *Required </p>
            <p> Format file harus .jpg/.jpeg/.png </p>
            <p> Ukuran file maksimum 2 MB </p>
          </div>
          <div class="flex justify-end my-4">
            <input type="submit" value="UNGGAH" class="suksesUnggahFoto bg-secondary text-white rounded-full w-24 py-1 text-center cursor-pointer hover:bg-secondaryhover transition-colors duration-300 text-sm outline-none">
          </div>
          <input type="hidden" name="tags" id="tags_form">
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Preview-->
<div class="modal fade" id="imgpreview" tabindex="-1" role="dialog" aria-labelledby="imgModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="imgModalLabel">Preview foto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <img src="" id="imagepreview" class="w-100" alt="Image Preview">
        <hr>
        <p id="captionPreview"></p>
      </div>
    </div>
  </div>
</div>

<!-- Modal Preview-->
<div class="modal fade" id="report-modal" tabindex="-1" role="dialog" aria-labelledby="reportModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="reportModalLabel">Report foto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <table class="table table-hover table-sm text-sm" id="gallery-table">
          <thead>
            <tr>
              <td class="text-center">No.</td>
              <td class="text-center">Alasan</td>
            </tr>
          </thead>
          <tbody id="reportBody">
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<form id="form-approval" action="<?= base_url('admin/change_approval_foto') ?>" method="POST">
  <input type="hidden" name="id_foto" id="id_approval">
  <input type="hidden" name="approval" id="approval">
</form>

<form id="form-delete" action="<?= base_url('admin/foto_delete') ?>" method="POST">
  <input type="hidden" name="id_foto" id="del">
</form>

<script>
  function galleryPreview(desc, src) {
    $("#imagepreview").attr("src", src);

    $('#captionPreview').empty();
    $('#captionPreview').html(desc);
  }

  $('#pilihFile').change(function() {
    string = $('#pilihFile').val().split("\\");
    $('#textPhoto').html(string[string.length - 1]);
  });

  //buat tags
  var formatTags = function(item) {
    return $.trim((item.name || ''));
  };

  $('#tags').selectize({
    plugins: ['remove_button'],
    persist: false,
    valueField: 'id_alumni',
    labelField: 'name',
    searchField: ['name', 'angkatan'],
    sortField: [{
      field: 'angkatan',
      direction: 'asc'
    }],
    maxOptions: 5,
    maxItems: 10,
    options: [
      <?php foreach ($alumni as $data) {
        if ($data->id_alumni !== session()->id_alumni)
          echo ("{
                  angkatan: \"Angkatan " . $data->angkatan . "\",
                  name: \"" . $data->nama . "\",
                  id_alumni: \"" . $data->id_alumni . "\"
              },");
      } ?>
    ],
    render: {
      item: function(item, escape) {
        var name = formatTags(item);
        return '<div>' +
          (name ? '<span class="name">' + escape(name) + '</span>' : '') +
          (item.angkatan ? '<span class="angkatan mx-1">' + escape(item.angkatan) + '</span>' : '') +
          '</div>';
      },
      option: function(item, escape) {
        var name = formatTags(item);
        var label = name || item.angkatan;
        var caption = name ? item.angkatan : null;
        return '<div>' +
          '<span class="label">' + escape(label) + '</span>' +
          (caption ? '<span class="caption">' + escape(caption) + '</span>' : '') +
          '</div>';
      }
    }
  });

  $('#tags').change(function() {
    $tags = $('#tags').val();
    $('#tags_form').val($tags);
  });
</script>
<?= view('admin/galeri/dist/index/footer') ?>
<?= $this->endSection(); ?>