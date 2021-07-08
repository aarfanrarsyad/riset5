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
                            <li class="breadcrumb-item text-muted"><a href="<?= base_url('/admin') ?>">Tambah Instansi</a></li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <section class="content mx-1 pb-5">
            <div class="container-fluid">
                <div class="response">
                    <div class="card card-secondary card-outline elevation-3 col-sm-10">
                        <div class="card-body">
                            <div class="row">
                                <div class="col text-primaryHover font-heading">
                                    <h5><i class="fas fa-building text-primaryHover"></i>&ensp;Form Update Instasi</h5>
                                </div>
                            </div>
                            <br>
                            <form action="/admin/updateInstansi/<?= $instansi->id_tempat_kerja; ?>" method="POST">
                                <?= csrf_field(); ?>
                                <label for="nama" class="font-medium">Nama Instansi:</label>
                                <?php if (session()->getFlashdata('error-nama_instansi') != "") { ?>
                                    <p class="text-xs text-red-500 text-justify" id="errorNamaInstansi">
                                        <?= session('error-nama_instansi') ?>
                                    </p>
                                <?php } ?>
                                <input type="text" name="nama_instansi" id="nama" class="inputForm" placeholder="Masukkan nama Instansi" value="<?= $instansi->nama_instansi; ?>">
                                <div class="flex justify-between items-center">
                                    <label for="negara" class="font-medium" id="labelNegara">Negara:</label>
                                </div>
                                <select name="negara" id="negara" class="inputForm" onchange="displayDiv2('negaraLainIndonesia','negaraIndonesia',this)" required>
                                    <?php if ($instansi->negara == NULL || $instansi->negara == "") : ?>
                                        <option disabled selected value="">Pilih Negara</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="lainnya">Lainnya...</option>
                                    <?php elseif ($instansi->negara == "Indonesia") : ?>
                                        <option selected value="Indonesia">Indonesia</option>
                                        <option value="lainnya">Lainnya...</option>
                                    <?php else : ?>
                                        <option value="<?= $instansi->negara ?>" selected>
                                            <?= $instansi->negara ?>
                                        </option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="lainnya">Lainnya...</option>
                                    <?php endif; ?>
                                </select>
                                <div class="hidden" id="negaraLainIndonesia">
                                    <input type="text" name="negaraLainnya" id="negaraLainnya" class="inputForm" placeholder="Masukkan nama negara" required>
                                </div>
                                <div class="hidden" id="negaraIndonesia">
                                    <div class="md:grid md:grid-cols-2 md:gap-x-4">
                                        <div>
                                            <label for="provinsi" class="font-medium" id="labelProvinsi">Provinsi:</label>
                                            <select name="provinsi" id="nama-provinsi" class="inputForm" required>
                                                <?php if ($instansi->provinsi != NULL || $instansi->provinsi != "") : ?>
                                                    <option selected>
                                                        <?= $instansi->provinsi ?>
                                                    </option>
                                                    <?php foreach ($daftarProv as $prov) : ?>
                                                        <option id="<?= $prov->id_provinsi ?>" value="<?= $prov->nama_provinsi ?>"><?= $prov->nama_provinsi ?></option>
                                                    <?php endforeach ?>
                                                <?php else : ?>
                                                    <option selected disabled value="">Pilih Provinsi</option>
                                                    <?php foreach ($daftarProv as $prov) : ?>
                                                        <option id="<?= $prov->id_provinsi ?>" value="<?= $prov->nama_provinsi ?>"><?= $prov->nama_provinsi ?></option>
                                                    <?php endforeach ?>
                                                <?php endif; ?>
                                            </select>
                                            <input hidden type="text" name="prov" id="prov-hidden">
                                        </div>
                                        <div>
                                            <label for='kabkota' class='font-medium' id='labelKabkot'>Kabupaten/Kota:</label>
                                            <select name='kabkota' id='kabkota' class='inputForm' required>
                                                <?php if ($instansi->kota != NULL || $instansi->kota != "") : ?>
                                                    <option selected>
                                                        <?= $instansi->kota ?>
                                                    </option>
                                                <?php else : ?>
                                                    <option selected disabled value="">Pilih Kabupaten/Kota</option>
                                                <?php endif; ?>
                                            </select>
                                            <input hidden type="text" name="kab" id="kab-hidden">
                                        </div>
                                    </div>
                                </div>
                                <label for="alamat" class="font-medium">Alamat Instansi:</label>
                                <textarea type="text" name="alamat_instansi" id="alamat" class="inputForm resize-none" placeholder="Masukkan alamat instansi"><?= $instansi->alamat_instansi; ?></textarea>
                                <div class="md:w-1/2 w-full">
                                    <label for="telepon" class="font-medium">No Telepon Instansi:</label>
                                    <?php if (session()->getFlashdata('error-telp_instansi') != "") { ?>
                                        <p class="text-xs text-red-500 text-justify" id="errorEmailInstansi">
                                            <?= session('error-telp_instansi') ?>
                                        </p>
                                    <?php } ?>
                                    <input type="text" name="telp_instansi" id="telepon" class="inputForm" placeholder="Masukkan telepon instansi" value="<?= $instansi->telp_instansi; ?>">
                                    <label for="faks" class="font-medium">Faks Instansi:</label>
                                    <?php if (session()->getFlashdata('error-faks_instansi') != "") { ?>
                                        <p class="text-xs text-red-500 text-justify" id="errorEmailInstansi">
                                            <?= session('error-faks_instansi') ?>
                                        </p>
                                    <?php } ?>
                                    <input type="text" name="faks_instansi" id="faks" class="inputForm" placeholder="Masukkan faks instansi" value="<?= $instansi->faks_instansi; ?>">
                                    <label for="email" class="font-medium">Email:</label>
                                    <?php if (session()->getFlashdata('error-email_instansi') != "") { ?>
                                        <p class="text-xs text-red-500 text-justify" id="errorEmailInstansi">
                                            <?= session('error-email_instansi') ?>
                                        </p>
                                    <?php } ?>
                                    <input type="email" name="email_instansi" id="email" class="inputForm" placeholder="Masukkan email instansi" value="<?= $instansi->email_instansi; ?>">
                                </div>
                                <div class="flex justify-end md:mb-6 mt-12">
                                    <input type="submit" value="SIMPAN" class="w-24 text-center py-1 bg-primarySidebar hover:bg-secondaryhover text-white rounded-full cursor-pointer focus:outline-none" id="tambahTempatKerja">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
</div>
</div>
<?= $this->endSection(); ?>