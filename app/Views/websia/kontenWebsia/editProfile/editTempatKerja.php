<?= $this->extend('websia/kontenWebsia/editProfile/layoutEdit.php'); ?>

<?= $this->section('contentEdit'); ?>
<div class="shadow-2xl rounded-3xl mb-8">
    <div class="p-6 font-paragraph text-primary">
        <!-- start form edit tempat kerja -->
        <!-- kalau nama instansi ada di database -->
        <div>
            <form action="/User/updateTempatKerja" method="POST" id="formEditTempatKerja">
                <!-- note: belum ada action -->
                <div id="adainstansi" class="block">
                    <label for="namainstansi" class="font-medium">Nama Instansi:</label>
                    <input list="daftarInstansi" name="nama_instansi" id="instansi" placeholder="Masukkan nama instansi" value="<?= $tempat_kerja->nama_instansi ?>" class="inputForm">
                    <datalist id="daftarInstansi" class="font-paragraph">
                        <?php foreach ($list as $row) : ?>
                            <option data-value="<?= $row->id_tempat_kerja ?>"><?= $row->nama_instansi ?></option>
                        <?php endforeach; ?>
                    </datalist>
                    <input type="hidden" name="id_tempat_kerja" id="instansi-hidden">
                    <?php if(session('ambigu') == "yes" && !session('BPS') == "no") : ?>
                    <?php else : ?>
                    <div class="flex gap-x-2 items-center">
                        <div>
                            Jika nama instansi Anda tidak terdaftar pada daftar di atas, tambahkan instansi Anda di sini:
                        </div>
                        <div class="bg-primary text-white rounded-full py-1 px-3 text-center cursor-pointer hover:bg-primaryHover transition-colors duration-300 my-2 tambahInstansi">TAMBAH</div>
                    </div>
                    <?php endif; ?>
                    <div class="flex justify-end md:mb-6 mt-12">
                        <input type="submit" value="SIMPAN" class="w-24 text-center py-1 bg-secondary hover:bg-secondaryhover text-white rounded-full cursor-pointer focus:outline-none" id="submitTempatKerja">
                    </div>
                </div>
            </form>
        </div>
        <!-- kalau nama instansi ga ada di database -->

        <div class="hidden" id="lainnya">
            <form action="/User/addTempatKerja" method="POST" id="formTambahInstansi">
                <div class="flex gap-x-2 items-center mb-4">
                    <div>
                        Cari instansi Anda pada daftar instansi:
                    </div>
                    <div class="bg-primary text-white rounded-full py-1 px-3 text-center cursor-pointer hover:bg-primaryHover transition-colors duration-300 my-2 kembaliInstansi">DAFTAR INSTANSI</div>
                </div>
                <label for="nama" class="font-medium">Nama Instansi:</label>
                <?php if (session()->getFlashdata('error-nama_instansi') != "") { ?>
                    <p class="text-xs text-red-500 text-justify" id="errorNamaInstansi">
                        <?= session('error-nama_instansi') ?>
                    </p>
                <?php } ?>
                <input type="text" name="nama_instansi" id="nama" class="inputForm" placeholder="Masukkan nama Instansi">
                <div class="flex justify-between items-center">
                    <label for="negara" class="font-medium" id="labelNegara">Negara:</label>    
                </div>
                <select name="negara" id="negara" class="inputForm" onchange="displayDiv2('negaraLainIndonesia','negaraIndonesia',this)">
                        <option selected value="Indonesia">Indonesia</option>
                        <option value="lainnya">Lainnya...</option>
                </select>

                <div class="hidden" id="negaraLainIndonesia">
                    <input type="text" name="negaraLainnya" id="negaraLainnya" class="inputForm" placeholder="Masukkan nama negara">
                </div>
                <div class="hidden" id="negaraIndonesia">
                    <div class="md:grid md:grid-cols-2 md:gap-x-4">
                        <div>
                            <label for="provinsi" class="font-medium" id="labelProvinsi">Provinsi:</label>
                            <select name="provinsi" id="provinsi" class="inputForm">
                                    <option selected disabled>Pilih Provinsi</option>
                                    <?php foreach ($daftarProv as $prov) : ?>
                                        <option id="<?= $prov->id_provinsi ?>" value="<?= $prov->nama_provinsi ?>"><?= $prov->nama_provinsi ?></option>
                                    <?php endforeach ?>
                            </select>
                            <input hidden type="text" name="prov" id="prov-hidden">
                        </div>
                        <div>
                            <label for='kabkota' class='font-medium' id='labelKabkot'>Kabupaten/Kota:</label>
                            <select name='kabkota' id='kabkota' class='inputForm'>
                                    <option selected disabled>Pilih Kabupaten/Kota</option>
                            </select>
                            <input hidden type="text" name="kab" id="kab-hidden">
                        </div>
                    </div>
                </div>
                <label for="alamat" class="font-medium">Alamat Instansi:</label>
                <textarea type="text" name="alamat_instansi" id="alamat" class="inputForm resize-none" placeholder="Masukkan alamat instansi"></textarea>
                <div class="md:w-1/2 w-full">
                    <label for="telepon" class="font-medium">No Telepon Instansi:</label>
                    <?php if (session()->getFlashdata('error-telp_instansi') != "") { ?>
                        <p class="text-xs text-red-500 text-justify" id="errorEmailInstansi">
                            <?= session('error-telp_instansi') ?>
                        </p>
                    <?php } ?>
                    <input type="text" name="telp_instansi" id="telepon" class="inputForm" placeholder="Masukkan telepon instansi">
                    <label for="faks" class="font-medium">Faks Instansi:</label>
                    <?php if (session()->getFlashdata('error-faks_instansi') != "") { ?>
                        <p class="text-xs text-red-500 text-justify" id="errorEmailInstansi">
                            <?= session('error-faks_instansi') ?>
                        </p>
                    <?php } ?>
                    <input type="text" name="faks_instansi" id="faks" class="inputForm" placeholder="Masukkan faks instansi">
                    <label for="email" class="font-medium">Email:</label>
                    <?php if (session()->getFlashdata('error-email_instansi') != "") { ?>
                        <p class="text-xs text-red-500 text-justify" id="errorEmailInstansi">
                            <?= session('error-email_instansi') ?>
                        </p>
                    <?php } ?>
                    <input type="email" name="email_instansi" id="email" class="inputForm" placeholder="Masukkan email instansi">
                </div>
                <div class="flex justify-end md:mb-6 mt-12">
                    <input type="submit" value="SIMPAN" class="w-24 text-center py-1 bg-secondary hover:bg-secondaryhover text-white rounded-full cursor-pointer focus:outline-none" id="tambahTempatKerja">
                </div>
            </form>
        </div>
        <!-- end form edit tempat kerja -->
    </div>
</div>

<!-- dialog box edit tempat kerja -->
<!-- kalau mau ngecek hilangin kelas hidden sama opacity-0 nya-->

<?php if (session()->getFlashdata('edit-tk-success')) { ?>
    <!-- BERHASIL edit instansi -->
    <div id="berhasilEditInstansi">
        <div class="fixed top-0 bottom-0 right-0 left-0 z-50 flex justify-center items-center bg-black bg-opacity-40">
            <div class="duration-700 transition-all p-3 rounded-lg flex items-center" style="background-color: #B1FF66;">
                <img src="/img/components/icon/check.png" class="h-5 mr-2" style="color: #54AC00;" alt="berhasil edit instansi">
                <p class="sm:text-base text-sm font-heading font-bold text-success"><?= session()->getFlashdata('edit-tk-success') ?></p>
            </div>
        </div>
    </div>
    <script>
        setTimeout(function() {
            $('#berhasilEditInstansi').fadeOut();
        }, 1500);
    </script>
<?php }
if (session()->getFlashdata('add-tk-success')) { ?>
    <!-- GAGAL edit instansi KAYAKNYA GAPERLU -->
    <!-- <div id="gagalEditInstansi">
    <div class="fixed top-0 bottom-0 right-0 left-0 z-50 flex justify-center items-center bg-black bg-opacity-40">
        <div class="duration-700 transition-all p-3 rounded-lg flex items-center" style="background-color: #FF7474;">
            <img src="/img/components/icon/warning.png" class="h-5 mr-2" alt="gagal edit instansi">
            <p class="sm:text-base text-sm font-heading font-bold" style="color: #C51800;">Tempat Kerja Tidak Berhasil Disimpan</p>
        </div>
    </div>
</div>
<script>
    setTimeout(function() {
        $('#gagalEditInstansi').fadeOut();
    }, 1500);
</script> -->
    <!-- BERHASIL tambah instansi -->
    <div id="berhasilTambahInstansi">
        <div class="fixed top-0 bottom-0 right-0 left-0 z-50 flex justify-center items-center bg-black bg-opacity-40">
            <div class="duration-700 transition-all p-3 rounded-lg flex items-center" style="background-color: #B1FF66;">
                <img src="/img/components/icon/check.png" class="h-5 mr-2" style="color: #54AC00;" alt="berhasil tambah instansi">
                <p class="sm:text-base text-sm font-heading font-bold text-success"><?= session()->getFlashdata('add-tk-success') ?></p>
            </div>
        </div>
    </div>
    <script>
        setTimeout(function() {
            $('#berhasilTambahInstansi').fadeOut();
        }, 1500);
    </script>
<?php }
if (session()->getFlashdata('add-tk-fail')) { ?>
    <!-- GAGAL tambah instansi -->
    <div id="gagalTambahInstansi">
        <div class="fixed top-0 bottom-0 right-0 left-0 z-50 flex justify-center items-center bg-black bg-opacity-40">
            <div class="duration-700 transition-all p-3 rounded-lg flex items-center" style="background-color: #FF7474;">
                <img src="/img/components/icon/warning.png" class="h-5 mr-2" alt="gagal tambah instansi">
                <p class="sm:text-base text-sm font-heading font-bold" style="color: #C51800;"><?= session()->getFlashdata('add-tk-fail') ?></p>
            </div>
        </div>
    </div>
    <script>
        setTimeout(function() {
            $('#gagalTambahInstansi').fadeOut();
        }, 1500);
    </script>
    <!-- end dialog box-->
<?php } ?>
<?= $this->endSection(); ?>