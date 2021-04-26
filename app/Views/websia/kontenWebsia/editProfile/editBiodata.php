<?php
if ($alumni->jenis_kelamin == 'Lk') {
    $jk = "Laki-laki";
} else if ($alumni->jenis_kelamin == 'Pr') {
    $jk = "Perempuan";
}

if ($alumni->status_bekerja == '1') {
    $status_bekerja = "Bekerja";
} else if ($alumni->status_bekerja == '0') {
    $status_bekerja = "Tidak bekerja";
}

if ($alumni->aktif_pns == '1') {
    $aktif_pns = "Aktif sebagai PNS";
} else if ($alumni->aktif_pns == '0') {
    $aktif_pns = "Tidak aktif sebagai PNS";
}
if ($checked->ttl == 0) {
    $cttl = "";
} else {
    $cttl = "checked";
}
if ($checked->email == 0) {
    $cemail = "";
} else {
    $cemail = "checked";
}
if ($checked->alamat == 0) {
    $calamat = "";
} else {
    $calamat = "checked";
}
if ($checked->jabatan_terakhir == 0) {
    $cjab = "";
} else {
    $cjab = "checked";
}
if ($checked->ig == 0) {
    $cig = "";
} else {
    $cig = "checked";
}
if ($checked->twitter == 0) {
    $ctw = "";
} else {
    $ctw = "checked";
}
if ($checked->fb == 0) {
    $cfb = "";
} else {
    $cfb = "checked";
}
?>
<?= $this->extend('websia/kontenWebsia/editProfile/layoutEdit.php'); ?>

<?= $this->section('contentEdit'); ?>
<div class="shadow-2xl rounded-3xl mb-8">
    <div class="lg:grid lg:grid-cols-3 lg:gap-x-4">
        <!-- start foto profil -->
        <div class="p-6">
            <div class="flex items-center justify-center lg:flex-none">
                <div class="md:w-2/3 w-1/2 lg:w-full">
                    <div class="flex justify-center">
                        <img src="/img/<?= $alumni->foto_profil ?>" alt="" class="mb-6 md:w-48 md:h-48 w-28 h-28 rounded-full">
                    </div>
                    <div class="flex justify-center">
                        <button class="updateFotoProfil bg-secondary rounded-full font-paragraph text-white px-3 py-1 hover:bg-secondaryhover lg:text-base text-sm focus:outline-none">Ubah foto profil</button>
                    </div>
                </div>
                <div class="mt-8 flex justify-center editTampilan hidden lg:absolute lg:top-80">
                    <div>
                        <div class="shadow-xl rounded-lg p-3">
                            <p class="font-heading font-medium text-sm mb-1">Keterangan:</p>
                            <div class="flex gap-x-2 items-center mb-1">
                                <input type="checkbox" checked onclick="return false;" onkeydown="return false;" class="focus:outline-none">
                                <p class="font-heading font-medium text-xs">Tampilkan</p>
                            </div>
                            <div class="flex gap-x-2 items-center">
                                <input type="checkbox" onclick="return false" class="focus:outline-none">
                                <p class="font-heading font-medium text-xs">Sembunyikan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end foto profil -->
        <div class="col-span-2 md:mt-6 ml-6 mr-6">
            <!-- start form edit -->
            <form action="/User/updateProfil" method="POST" class="font-paragraph text-primary lg:col-span-3" id="formEditBiodata">
                <div class="flex justify-between items-end">
                    <div class="font-medium">Nama Lengkap:</div>
                    <div class="bg-secondary hover:bg-secondaryhover text-white lg:py-1.5 py-1 px-3 lg:text-sm text-xs outline-none cursor-pointer rounded-full flex gap-x-2 items-center" id="buttonEditTampilan">
                        <div>
                            Edit Tampilan
                        </div>
                        <img src="/img/components/icon/edit.png" alt="" class="w-4 h-4">
                    </div>
                </div>
                <div class="text-black font-heading font-normal mb-2"><?= $alumni->nama ?></div>
                <!-- <div class="grid grid-cols-2 gap-x-4">
                    <div>
                        <div class="font-medium">NIM:</div>
                        <div class="text-black font-heading font-normal mb-2">?= $alumni->nim ?></div>
                    </div>
                    <div>
                        <div class="font-medium">Angkatan:</div>
                        <div class="text-black font-heading font-normal mb-2">?= $alumni->angkatan ?></div>
                    </div>
                </div>
                <div class="mb-2"> -->
                <div class="flex justify-between items-center">
                    <div class="font-medium" id="labelJenisKelamin">Jenis Kelamin:</div>
                </div>
                <div class="text-black font-heading font-normal mb-2"><?= $jk ?></div>
        </div>
        <div class="md:grid md:grid-cols-2 md:gap-x-4">
            <div class="mr-1">
                <div class="font-medium" id="labelTempatLahir">Tempat Lahir:</div>
                <input type="text" name="tempatLahir" id="tempatLahir" class="inputForm" placeholder="Tempat Lahir" value="<?= $alumni->tempat_lahir ?>">
            </div>
            <div>
                <div class="flex justify-between items-center">
                    <div class="font-medium" id="labelTanggalLahir">Tanggal Lahir:</div>
                    <input type="checkbox" <?= $cttl ?> name="checkTanggalLahir" id="checkTanggalLahir" class="cursor-pointer focus:outline-none editTampilan hidden">
                </div>
                <input type="date" name="tanggalLahir" data-id="TanggalLahir" id="tanggalLahir" class="inputForm" value="<?= $alumni->tanggal_lahir ?>">
            </div>
        </div>
        <div class="flex justify-between items-center md:mr-6">
            <label for="notelepon" class="font-medium" id="labelTelepon">No. Telepon:</label>
        </div>
        <div class="lg:w-1/2">
            <div class="lg:mr-3">
                <?php if (session()->getFlashdata('error-telp_alumni') != "") { ?>
                    <p class="text-xs text-red-500 text-justify" id="errorNoTelp">
                        <?= session('error-telp_alumni') ?>
                    </p>
                    <?php if (session()->getFlashdata()['inputs']['telp_alumni'] != $alumni->telp_alumni) { ?>
                        <input type="text" name="telp_alumni" id="notelepon" class="inputFormError" placeholder="Nomor telfon WA aktif" value="<?= session('inputs')['telp_alumni'] ?>" required>
                    <?php } else { ?>
                        <input type="text" name="telp_alumni" id="notelepon" class="inputForm" placeholder="Nomor telfon WA aktif" value="<?= $alumni->telp_alumni ?>" required>
                    <?php } ?>
                <?php } else { ?>
                    <input type="text" name="telp_alumni" id="notelepon" class="inputForm" placeholder="Nomor telfon WA aktif" value="<?= $alumni->telp_alumni ?>" required>
                <?php } ?>
            </div>
        </div>
        <div class="flex justify-between items-center md:mr-6">
            <label for="email" class="font-medium" id="labelEmail">Email:</label>
            <input type="checkbox" <?= $cemail ?> name="checkEmail" data-id="Email" id="checkEmail" class="cursor-pointer focus:outline-none md:-mr-6 editTampilan hidden">
        </div>

        <div class="lg:w-1/2">
            <div class="lg:mr-3">
                <?php if (session()->getFlashdata('error-email') != "") { ?>
                    <p class="text-xs text-red-500 text-justify" id="errorEmail">
                        <?= session('error-email') ?>
                    </p>
                    <?php if (session()->getFlashdata()['inputs']['email'] != $alumni->email) { ?>
                        <input type="email" name="email" id="email" class="inputFormError" placeholder="Alamat email aktif" value="<?= session('inputs')['email'] ?>" required>
                    <?php } else { ?>
                        <input type="email" name="email" id="email" class="inputForm" placeholder="Alamat email aktif" value="<?= $alumni->email ?>" required>
                    <?php } ?>
                <?php } else { ?>
                    <input type="email" name="email" id="email" class="inputForm" placeholder="Alamat email aktif" value="<?= $alumni->email ?>" required>
                <?php } ?>
            </div>
        </div>
        <hr class="border-gray-300 my-3">
        <div class="flex justify-between items-center">
            <label for="negara" class="font-medium" id="labelNegara">Negara:</label>
            <input type="checkbox" <?= $calamat ?> name="checkAlamat" data-id="Alamat" id="checkAlamat" class="cursor-pointer focus:outline-none editTampilan hidden">
        </div>
        <input list="daftarNegara" name="negara" id="negara" placeholder="Masukkan nama negara" value="" class="inputForm">
        <datalist id="daftarNegara" class="font-paragraph">
            <option data-value="Indonesia">Indonesia</option>
        </datalist>
        <div class="md:grid md:grid-cols-2 md:gap-x-4">
            <div>
                <label for="provinsi" class="font-medium" id="labelProvinsi">Provinsi:</label>
                <input list="daftarProvinsi" name="provinsi" id="provinsi" placeholder="Masukkan nama provinsi" value="" class="inputForm">
                <datalist id="daftarProvinsi" class="font-paragraph">
                    <option data-value="DKI Jakarta">DKI Jakarta</option>
                </datalist>
            </div>
            <div>
                <label for="kabkota" class="font-medium" id="labelKabkot">Kabupaten/Kota:</label>
                <input list="daftarKabkota" name="kabkota" id="kabkota" placeholder="Masukkan nama kabupaten/kota" value="" class="inputForm">
                <datalist id="daftarKabkota" class="font-paragraph">
                    <option data-value="Kota Jakarta Timur">Kota Jakarta Timur</option>
                </datalist>
            </div>
        </div>
        <label for="alamat" class="font-medium" id="labelAlamat">Alamat:</label>
        <div>
            <?php if (session('inputs')) { ?>
                <textarea name="alamat" id="alamat" cols="50" rows="3" placeholder="Alamat saat ini" class="inputForm resize-none" required><?= htmlspecialchars(session('inputs')['alamat']) ?></textarea>
            <?php } else { ?>
                <textarea name="alamat" id="alamat" cols="50" rows="3" placeholder="Alamat saat ini" class="inputForm resize-none" required><?= $alumni->alamat ?></textarea>
            <?php } ?>
        </div>
        <hr class="border-gray-300 mb-3 mt-1">
        <div class="md:grid md:grid-cols-2 md:gap-x-4 md:mr-6">
            <div>
                <div class="font-medium">Status Bekerja di BPS:</div>
                <div class="text-black font-heading font-normal mb-2"><?= $status_bekerja ?></div>
            </div>
            <div>
                <div class="font-medium">Aktif PNS:</div>
                <div class="text-black font-heading font-normal mb-2"><?= $aktif_pns ?></div>
            </div>
        </div>
        <div>
            <div class="flex justify-between items-center">
                <div class="font-medium" id="labelJabatan">Jabatan Terakhir:</div>
                <input type="checkbox" <?= $cjab ?> name="checkJabatan" data-id="Jabatan" id="checkJabatan" class="cursor-pointer focus:outline-none editTampilan hidden">
            </div>
            <div class="text-black font-heading font-normal mb-2"><?= $alumni->jabatan_terakhir ?></div>
        </div>
        <div>
            <div class="font-medium">Perkiraan Tahun Pensiun:</div>
            <div class="text-black font-heading font-normal mb-2"><?= $alumni->perkiraan_pensiun ?></div>
        </div>
        <hr class="border-gray-300 my-3">
        <div>
            <div class="font-medium mb-2">Akun Media Sosial:</div>
            <div class="w-full">
                <div class="flex items-center mb-2">
                    <div class="md:w-1/4 w-1/3">
                        <label for="instagram" class="font-medium" id="labelInstagram">Instagram</label>
                    </div>
                    <div class="md:w-3/4 w-2/3 gap-x-3 flex justify-between items-center">
                        <?php if (session('inputs')) { ?>
                            <input type="text" name="ig" id="instagram" class="w-full md:p-2 p-1 border-2 border-gray-200 rounded-lg focus:outline-none focus:border-primary text-black" placeholder="Username Instagram tanpa tanda (@)" value="<?= session('inputs')['ig'] ?>">

                        <?php } else { ?>
                            <input type="text" name="ig" id="instagram" class="w-full md:p-2 p-1 border-2 border-gray-200 rounded-lg focus:outline-none focus:border-primary text-black" placeholder="Username Instagram tanpa tanda (@)" value="<?= $alumni->ig ?>">
                        <?php } ?>
                        <input type="checkbox" <?= $cig ?> name="checkInstagram" data-id="Instagram" id="checkInstagram" class="cursor-pointer focus:outline-none editTampilan hidden">
                    </div>
                </div>
                <div class="flex items-center mb-2">
                    <div class="md:w-1/4 w-1/3">
                        <label for="twitter" class="font-medium" id="labelTwitter">Twitter</label>
                    </div>
                    <div class="md:w-3/4 w-2/3 gap-x-3 flex justify-between items-center">
                        <?php if (session('inputs')) { ?>
                            <input type="text" name="twitter" id="twitter" class="w-full md:p-2 p-1 border-2 border-gray-200 rounded-lg focus:outline-none focus:border-primary text-black" placeholder="Username Twitter" value="<?= session('inputs')['twitter'] ?>">
                        <?php } else { ?>
                            <input type="text" name="twitter" id="twitter" class="w-full md:p-2 p-1 border-2 border-gray-200 rounded-lg focus:outline-none focus:border-primary text-black" placeholder="Username Twitter" value="<?= $alumni->twitter ?>">
                        <?php } ?>
                        <input type="checkbox" <?= $ctw ?> name="checkTwitter" data-id="Twitter" id="checkTwitter" class="cursor-pointer focus:outline-none editTampilan hidden">
                    </div>
                </div>
                <div class="flex items-center mb-2">
                    <div class="md:w-1/4 w-1/3">
                        <label for="facebook" class="font-medium" id="labelFacebook">Facebook</label>
                    </div>
                    <div class="md:w-3/4 w-2/3 gap-x-3 flex justify-between items-center">
                        <?php if (session('inputs')) { ?>
                            <input type="text" name="fb" id="facebook" class="w-full md:p-2 p-1 border-2 border-gray-200 rounded-lg focus:outline-none focus:border-primary text-black" placeholder="Nama Akun Facebook" value="<?= session('inputs')['fb'] ?>">
                        <?php } else { ?>
                            <input type="text" name="fb" id="facebook" class="w-full md:p-2 p-1 border-2 border-gray-200 rounded-lg focus:outline-none focus:border-primary text-black" placeholder="Nama Akun Facebook" value="<?= $alumni->fb ?>">
                        <?php } ?>
                        <input type="checkbox" <?= $cfb ?> name="checkFacebook" data-id="Facebook" id="checkFacebook" class="cursor-pointer focus:outline-none editTampilan hidden">
                    </div>
                </div>
            </div>
        </div>
        <div>
            <label for="biografi" class="font-medium">Biografi:</label>
            <?php if (session('inputs')) { ?>
                <textarea name="biografi" id="biografi" cols="30" rows="5" placeholder="Tambahkan biografi Anda di sini" class="inputForm resize-none" required><?= htmlspecialchars(session('inputs')['biografi']) ?></textarea>
            <?php } else { ?>
                <textarea name="biografi" id="biografi" cols="30" rows="5" placeholder="Tambahkan biografi Anda di sini" class="inputForm resize-none" required><?= $alumni->biografi ?></textarea>
            <?php } ?>
        </div>
        <div class="flex justify-end mt-8 mb-6">
            <input type="submit" value="SIMPAN" class="w-24 text-center py-1 bg-secondary hover:bg-secondaryhover text-white rounded-full cursor-pointer mb-6 focus:outline-none" id="submitBiodata">
        </div>
        </form>
        <!-- end form edit -->
    </div>
</div>
</div>

<!-- dialog box di edit biodata -->
<!-- kalau mau ngecek hilangin kelas hidden sama opacity-0 nya-->

<?php if (session()->getFlashdata('edit-foto-success')) { ?>
    <!-- BERHASIL ubah foto -->
    <div id="berhasilUpdateFoto" class="dialogBox">
        <div class="fixed top-0 bottom-0 right-0 left-0 z-50 bg-black bg-opacity-40 flex flex-col justify-end">
            <div class=" duration-300 transition-all p-2 pl-8 flex items-center" style="background-color: #B1FF66;">
                <img src="/img/components/icon/check.png" class="h-5 mr-2" style="color: #54AC00;">
                <p class="sm:text-base text-sm font-heading font-bold text-success"><?= session()->getFlashdata('edit-foto-success') ?></p>
            </div>
        </div>
    </div>
    <script>
        setTimeout(function() {
            $('#berhasilUpdateFoto').fadeOut();
        }, 1500);
    </script>
<?php }
if (session()->getFlashdata('edit-foto-fail')) { ?>
    <!-- GAGAL ubah foto -->
    <div class="fixed top-0 bottom-0 right-0 left-0 z-50 bg-black bg-opacity-40 flex flex-col justify-end" id="gagalUpdateFoto">
        <div class="duration-300 transition-all p-2 pl-8 flex items-center" style="background-color: #FF7474;">
            <img src="/img/components/icon/warning.png" class="h-5 mr-2">
            <p class="sm:text-base text-sm font-heading font-bold" style="color: #C51800;">Foto Profil Tidak Berhasil Diubah : <?= session()->getFlashdata('edit-foto-fail') ?></p>
        </div>
    </div>
    <script>
        setTimeout(function() {
            $('#gagalUpdateFoto').fadeOut();
        }, 1500);
    </script>
<?php }
if (session()->getFlashdata('edit-bio-success')) { ?>

    <!-- BERHASIL update biodata -->
    <div id="berhasilUpdateBiodata">
        <div class="fixed top-0 bottom-0 right-0 left-0 z-50 flex justify-center items-center bg-black bg-opacity-40">
            <div class="duration-700 transition-all p-3 rounded-lg flex items-center" style="background-color: #B1FF66;">
                <img src="/img/components/icon/check.png" class="h-5 mr-2" style="color: #54AC00;">
                <p class="sm:text-base text-sm font-heading font-bold text-success"><?= session()->getFlashdata('edit-bio-success') ?></p>
            </div>
        </div>
    </div>
    <script>
        setTimeout(function() {
            $('#berhasilUpdateBiodata').fadeOut();
        }, 1500);
    </script>
<?php }
if (session()->getFlashdata('edit-bio-fail')) { ?>
    <!-- GAGAL update biodata -->
    <div id="gagalUpdateBiodata">
        <div class="fixed top-0 bottom-0 right-0 left-0 z-50 flex justify-center items-center bg-black bg-opacity-40">
            <div class="duration-700 transition-all p-3 rounded-lg flex items-center" style="background-color: #FF7474;">
                <img src="/img/components/icon/warning.png" class="h-5 mr-2">
                <p class="sm:text-base text-sm font-heading font-bold" style="color: #C51800;"><?= session()->getFlashdata('edit-bio-fail') ?></p>
            </div>
        </div>
    </div>
    <script>
        setTimeout(function() {
            $('#gagalUpdateBiodata').fadeOut();
        }, 1500);
    </script>
<?php }
if (session()->getFlashdata('hapus-foto') != NULL) { ?>
    <!-- HAPUS foto biodata -->
    <div id="berhasilHapusFoto">
        <div class="fixed top-0 bottom-0 right-0 left-0 z-50 flex justify-center items-center bg-black bg-opacity-40">
            <div class="duration-700 transition-all p-3 rounded-lg flex items-center" style="background-color: #B1FF66;">
                <img src="/img/components/icon/check.png" class="h-5 mr-2" style="color: #54AC00;">
                <p class="sm:text-base text-sm font-heading font-bold text-success"><?= session()->getFlashdata('hapus-foto') ?></p>
            </div>
        </div>
    </div>
    <script>
        setTimeout(function() {
            $('#berhasilHapusFoto').fadeOut();
        }, 1500);
    </script>
<?php } ?>

<!-- end dialog box -->
<?= $this->endSection(); ?>