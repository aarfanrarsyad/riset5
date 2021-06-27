<?php
if ($alumni->jenis_kelamin == 'Lk') {
    $jk = "Laki-laki";
} else if ($alumni->jenis_kelamin == 'Pr') {
    $jk = "Perempuan";
} else {
    $jk = "Belum terisi";
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
if ($alumni->cttl == 0) {
    $cttl = "";
} else {
    $cttl = "checked";
}
if ($alumni->calamat == 0) {
    $calamat = "";
} else {
    $calamat = "checked";
}
if ($alumni->cpendidikan == 0) :
    $cpendidikan = "";
else :
    $cpendidikan = "checked";
endif;
if ($alumni->cprestasi == 0) {
    $cprestasi = "";
} else {
    $cprestasi = "checked";
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
                        <img src="/img/<?= $alumni->foto_profil ?>" alt="profil user" class="mb-6 md:w-48 md:h-48 w-28 h-28 rounded-full">
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
                        <img src="/img/components/icon/edit.png" alt="edit" class="w-4 h-4">
                    </div>
                </div>
                <div class="text-black font-heading font-normal mb-2"><?= $alumni->nama ?></div>
                <div class="mb-2">
                    <div class="flex justify-between items-center">
                        <div class="font-medium" id="labelJenisKelamin">Jenis Kelamin:</div>
                    </div>
                    <div class="text-black font-heading font-normal mb-2"><?= $jk ?></div>
                </div>
                <div class="md:grid md:grid-cols-2 md:gap-x-4">
                    <div class="mr-1">
                        <div class="font-medium" id="labelTempatLahir">Tempat Lahir:</div>
                        <?php if (session()->getFlashdata('error-tempat_lahir') != "") { ?>
                            <p class="text-xs text-red-500 text-justify" id="errorNoTelp">
                                <?= session('error-tempat_lahir') ?>
                            </p>
                            <?php if (session()->getFlashdata()['inputs']['tempat_lahir'] != $alumni->tempat_lahir) { ?>
                                <input type="text" name="tempat_lahir" id="tempatLahir" class="inputFormError" placeholder="Tempat Lahir" value="<?= session('inputs')['tempat_lahir'] ?>" required>
                            <?php } else { ?>
                                <input type="text" name="tempat_lahir" id="tempatLahir" class="inputForm" placeholder="Tempat Lahir" value="<?= $alumni->tempat_lahir ?>" required>
                            <?php } ?>
                        <?php } else { ?>
                            <input type="text" name="tempat_lahir" id="tempat_lahir" class="inputForm" placeholder="Tempat Lahir" value="<?= $alumni->tempat_lahir ?>" required>
                        <?php } ?>
                    </div>
                    <div>
                        <div class="flex justify-between items-center">
                            <div class="font-medium" id="labelTanggalLahir">Tanggal Lahir:</div>
                            <input type="checkbox" <?= $cttl ?> name="checkTanggalLahir" id="checkTanggalLahir" class="cursor-pointer focus:outline-none editTampilan hidden">
                        </div>
                        <input type="date" name="tanggal_lahir" data-id="TanggalLahir" id="tanggalLahir" class="inputForm" value="<?= $alumni->tanggal_lahir ?>">
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
                                <input type="text" name="telp_alumni" id="notelepon" class="inputFormError" placeholder="Nomor telfon WA aktif" value="<?= session('inputs')['telp_alumni'] ?>">
                            <?php } else { ?>
                                <input type="text" name="telp_alumni" id="notelepon" class="inputForm" placeholder="Nomor telfon WA aktif" value="<?= $alumni->telp_alumni ?>">
                            <?php } ?>
                        <?php } else { ?>
                            <input type="text" name="telp_alumni" id="notelepon" class="inputForm" placeholder="Nomor telfon WA aktif" value="<?= $alumni->telp_alumni ?>">
                        <?php } ?>
                    </div>
                </div>
                <div class="flex justify-between items-center md:mr-6">
                    <label for="email" class="font-medium" id="labelEmail">Email:</label>
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
                <select name="negara" id="negara" class="inputForm" onchange="displayDiv2('negaraLainIndonesia','negaraIndonesia',this)">

                    <?php if ($alumni->negara == NULL) : ?>
                        <option disabled selected>Pilih Negara</option>
                        <option value="Indonesia">Indonesia</option>
                        <option value="lainnya">Lainnya...</option>
                    <?php elseif ($alumni->negara == "Indonesia") : ?>
                        <option selected value="Indonesia">Indonesia</option>
                        <option value="lainnya">Lainnya...</option>
                    <?php else : ?>
                        <option value="<?= $alumni->negara ?>" selected>
                            <?= $alumni->negara ?>
                        </option>
                        <option value="Indonesia">Indonesia</option>
                        <option value="lainnya">Lainnya...</option>
                    <?php endif; ?>

                </select>

                <div class="hidden" id="negaraLainIndonesia">
                    <input type="text" name="negaraLainnya" id="negaraLainnya" class="inputForm" placeholder="Masukkan nama negara">
                </div>
                <div class="hidden" id="negaraIndonesia">
                    <div class="md:grid md:grid-cols-2 md:gap-x-4">
                        <div>
                            <label for="provinsi" class="font-medium" id="labelProvinsi">Provinsi:</label>
                            <select name="provinsi" id="provinsi" class="inputForm">
                                <?php if ($alumni->provinsi != NULL) : ?>
                                    <option selected disabled>
                                        <?= $alumni->provinsi ?>
                                    </option>
                                    <?php foreach ($daftarProv as $prov) : ?>
                                        <option id="<?= $prov->id_provinsi ?>" value="<?= $prov->nama_provinsi ?>"><?= $prov->nama_provinsi ?></option>
                                    <?php endforeach ?>
                                <?php else : ?>
                                    <option selected disabled>Pilih Provinsi</option>
                                    <?php foreach ($daftarProv as $prov) : ?>
                                        <option id="<?= $prov->id_provinsi ?>" value="<?= $prov->nama_provinsi ?>"><?= $prov->nama_provinsi ?></option>
                                    <?php endforeach ?>
                                <?php endif; ?>

                            </select>
                            <input hidden type="text" name="prov" id="prov-hidden">
                        </div>
                        <div>
                            <label for='kabkota' class='font-medium' id='labelKabkot'>Kabupaten/Kota:</label>
                            <select name='kabkota' id='kabkota' class='inputForm'>

                                <?php if ($alumni->kota != NULL) : ?>
                                    <option selected disabled>
                                        <?= $alumni->kota ?>
                                    </option>
                                <?php else : ?>
                                    <option selected disabled>Pilih Kabupaten/Kota</option>
                                <?php endif; ?>

                            </select>
                            <input hidden type="text" name="kab" id="kab-hidden">
                        </div>
                    </div>
                </div>
                <label for="alamat" class="font-medium" id="labelAlamat">Alamat:</label>
                <div>
                    <?php if (session('inputs')) { ?>
                        <textarea name="alamat" id="alamat" cols="50" rows="3" placeholder="Alamat saat ini" class="inputForm resize-none" required><?= htmlspecialchars(session('inputs')['alamat']) ?></textarea>
                    <?php } else { ?>
                        <textarea name="alamat" id="alamat" cols="50" rows="3" placeholder="Alamat saat ini" class="inputForm resize-none" required><?= $alumni->alamat_alumni ?></textarea>
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
                    </div>
                    <div class="text-black font-heading font-normal mb-2"><?= $alumni->jabatan_terakhir ?></div>
                </div>
                <div>
                    <div class="font-medium">Perkiraan Tahun Pensiun:</div>
                    <div class="text-black font-heading font-normal mb-2"><?= $alumni->perkiraan_pensiun ?></div>
                </div>
                <hr class="border-gray-300 my-3">
                <div>
                    <div class="flex items-center gap-x-2 mb-2">
                        <div class="font-medium">Akun Media Sosial:</div>
                        <div>
                            <svg id="infoMedsos" class="cursor-pointer select-none md:w-5 md:h-5 w-4 h-4 " viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.5 27.5932C16.837 27.5932 16.2011 27.4325 15.7322 27.1464C15.2634 26.8604 15 26.4724 15 26.0678V17.5254C15 17.1209 15.2634 16.7329 15.7322 16.4468C16.2011 16.1607 16.837 16 17.5 16C18.163 16 18.7989 16.1607 19.2678 16.4468C19.7366 16.7329 20 17.1209 20 17.5254V26.0678C20 26.4724 19.7366 26.8604 19.2678 27.1464C18.7989 27.4325 18.163 27.5932 17.5 27.5932Z" fill="#014F86" />
                                <path d="M17.5 14.17C17.1717 14.17 16.8466 14.1053 16.5433 13.9797C16.24 13.8541 15.9644 13.6699 15.7322 13.4378C15.5001 13.2056 15.3159 12.93 15.1903 12.6267C15.0647 12.3234 15 11.9983 15 11.67V10.5C15 9.83696 15.2634 9.20107 15.7322 8.73223C16.2011 8.26339 16.837 8 17.5 8C18.163 8 18.7989 8.26339 19.2678 8.73223C19.7366 9.20107 20 9.83696 20 10.5V11.67C20 11.9983 19.9353 12.3234 19.8097 12.6267C19.6841 12.93 19.4999 13.2056 19.2678 13.4378C19.0356 13.6699 18.76 13.8541 18.4567 13.9797C18.1534 14.1053 17.8283 14.17 17.5 14.17Z" fill="#014F86" />
                                <path d="M18 36C14.4399 36 10.9598 34.9443 7.99974 32.9665C5.03966 30.9886 2.73255 28.1774 1.37018 24.8883C0.0077991 21.5992 -0.348661 17.98 0.345873 14.4884C1.04041 10.9967 2.75474 7.78943 5.27209 5.27209C7.78943 2.75474 10.9967 1.04041 14.4884 0.345873C17.98 -0.348661 21.5992 0.0077991 24.8883 1.37018C28.1774 2.73255 30.9886 5.03966 32.9665 7.99974C34.9443 10.9598 36 14.4399 36 18C35.9952 22.7724 34.0972 27.348 30.7226 30.7226C27.348 34.0972 22.7724 35.9952 18 36ZM18 3.05086C15.0433 3.05086 12.1531 3.92761 9.6947 5.57024C7.23633 7.21288 5.32026 9.54761 4.18879 12.2792C3.05733 15.0108 2.76128 18.0166 3.3381 20.9164C3.91492 23.8163 5.33868 26.48 7.42936 28.5707C9.52004 30.6613 12.1837 32.0851 15.0836 32.6619C17.9834 33.2387 20.9892 32.9427 23.7208 31.8112C26.4524 30.6798 28.7871 28.7637 30.4298 26.3053C32.0724 23.8469 32.9492 20.9567 32.9492 18C32.9443 14.0367 31.3678 10.2372 28.5653 7.43471C25.7628 4.63225 21.9633 3.0557 18 3.05086Z" fill="#014F86" />
                            </svg>
                            <div class="opacity-0 scale-0 md:w-1/3 w-1/2 rounded-xl text-primary text-justify md:px-5 px-2 py-1 md:text-sm text-xs absolute">
                                <div>
                                    Untuk Instagram dan Twitter, silakan masukkan username akun Anda, sedangkan untuk Facebook, LinkedIn, dan Google Scholar, silakan masukkan link akun Anda.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full relative">
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
                            </div>
                        </div>
                        <div class="flex items-center mb-2">
                            <div class="md:w-1/4 w-1/3">
                                <label for="facebook" class="font-medium" id="labelFacebook">Facebook</label>
                            </div>
                            <div class="md:w-3/4 w-2/3 gap-x-3 flex justify-between items-center">
                                <?php if (session()->getFlashdata('error-fb') != "") { ?>
                                    <p class="text-xs text-red-500 text-justify" id="errorNoTelp">
                                        <?= session('error-fb') ?>
                                    </p>
                                    <?php if (session()->getFlashdata()['inputs']['fb'] != $alumni->fb) { ?>
                                        <input type="text" name="fb" id="notelepon" class="inputFormError" placeholder="Link Akun Facebook" value="<?= session('inputs')['fb'] ?>">
                                    <?php } else { ?>
                                        <input type="text" name="fb" id="notelepon" class="inputForm" placeholder="Link Akun Facebook" value="<?= $alumni->fb ?>">
                                    <?php } ?>
                                <?php } else { ?>
                                    <input type="text" name="fb" id="notelepon" class="inputForm" placeholder="Link Akun Facebook" value="<?= $alumni->fb ?>">
                                <?php } ?>
                            </div>
                        </div>
                        <div class="flex items-center mb-2">
                            <div class="md:w-1/4 w-1/3">
                                <label for="scholar" class="font-medium" id="labelScholar">Google Scholar</label>
                            </div>
                            <div class="md:w-3/4 w-2/3 gap-x-3 flex justify-between items-center">
                                <?php if (session()->getFlashdata('error-gscholar') != "") { ?>
                                    <p class="text-xs text-red-500 text-justify" id="errorNoTelp">
                                        <?= session('error-gscholar') ?>
                                    </p>
                                    <?php if (session()->getFlashdata()['inputs']['gscholar'] != $alumni->gscholar) { ?>
                                        <input type="text" name="gscholar" id="notelepon" class="inputFormError" placeholder="Link Akun Google Scholar" value="<?= session('inputs')['gscholar'] ?>">
                                    <?php } else { ?>
                                        <input type="text" name="gscholar" id="notelepon" class="inputForm" placeholder="Link Akun Google Scholar" value="<?= $alumni->gscholar ?>">
                                    <?php } ?>
                                <?php } else { ?>
                                    <input type="text" name="gscholar" id="notelepon" class="inputForm" placeholder="Link Akun Google Scholar" value="<?= $alumni->gscholar ?>">
                                <?php } ?>
                            </div>
                        </div>
                        <div class="flex items-center mb-2">
                            <div class="md:w-1/4 w-1/3">
                                <label for="linkedin" class="font-medium" id="labelFacebook">LinkedIn</label>
                            </div>
                            <div class="md:w-3/4 w-2/3 gap-x-3 flex justify-between items-center">
                                <?php if (session()->getFlashdata('error-linkedin') != "") { ?>
                                    <p class="text-xs text-red-500 text-justify" id="errorNoTelp">
                                        <?= session('error-linkedin') ?>
                                    </p>
                                    <?php if (session()->getFlashdata()['inputs']['linkedin'] != $alumni->linkedin) { ?>
                                        <input type="text" name="linkedin" id="notelepon" class="inputFormError" placeholder="Link Akun LinkedIn" value="<?= session('inputs')['linkedin'] ?>">
                                    <?php } else { ?>
                                        <input type="text" name="linkedin" id="notelepon" class="inputForm" placeholder="Link Akun LinkedIn" value="<?= $alumni->linkedin ?>">
                                    <?php } ?>
                                <?php } else { ?>
                                    <input type="text" name="linkedin" id="notelepon" class="inputForm" placeholder="Link Akun LinkedIn" value="<?= $alumni->linkedin ?>">
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <label for="biografi" class="font-medium">Biografi:</label>
                    <?php if (session('inputs')) { ?>
                        <textarea name="biografi" id="biografi" cols="30" rows="5" placeholder="Tambahkan biografi Anda di sini" class="inputForm resize-none"><?= htmlspecialchars(session('inputs')['biografi']) ?></textarea>
                    <?php } else { ?>
                        <textarea name="biografi" id="biografi" cols="30" rows="5" placeholder="Tambahkan biografi Anda di sini" class="inputForm resize-none"><?= $alumni->deskripsi ?></textarea>
                    <?php } ?>
                </div>
                <div class="editTampilan hidden">
                    <div class="flex justify-between items-center">
                        <label for="checkPendidikan" id="labelPendidikan" class="font-medium">Tampilan Pendidikan</label>
                        <input type="checkbox" <?= $cpendidikan ?> name="checkPendidikan" data-id="Pendidikan" id="checkPendidikan" class="cursor-pointer focus:outline-none editTampilan">
                    </div>
                    <div class="flex justify-between items-center">
                        <label for="checkPrestasi" id="labelPrestasi" class="font-medium">Tampilan Prestasi</label>
                        <input type="checkbox" <?= $cprestasi ?> name="checkPrestasi" data-id="Prestasi" id="checkPrestasi" class="cursor-pointer focus:outline-none editTampilan">
                    </div>
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
                <img src="/img/components/icon/check.png" class="h-5 mr-2" style="color: #54AC00;" alt="berhasil ubah foto">
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
            <img src="/img/components/icon/warning.png" class="h-5 mr-2" alt="gagal ubah foto">
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
                <img src="/img/components/icon/check.png" class="h-5 mr-2" style="color: #54AC00;" alt="berhasil update biodata">
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
                <img src="/img/components/icon/warning.png" class="h-5 mr-2" alt="gagal update biodata">
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
                <img src="/img/components/icon/check.png" class="h-5 mr-2" style="color: #54AC00;" alt="berhasil hapus foto">
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