<!-- ganti status ='user' atau 'bukan user' di controller websia class userProfile sesuai pengakses. 
User itu untuk melihat profil diri sendiri, sedangkan bukan user untuk melihat profil orang lain. 
Hal ini berpengaruh pada ada tidaknya tampilan tombol edit profil di halaman profil -->
<?php
if ($status == 'bukan user') {
    $tombolEdit = 'hidden';

    // berfungsi, tapi butuh tempat tersendiri biar bisa di hidden, sekarang masih gabung sama tempat lahir
    if ($alumni->cttl == 1) {
        $cttl = "";
    } else {
        $cttl = "hidden";
    }
    if ($alumni->calamat == 1) {
        $calamat = "";
    } else {
        $calamat = "hidden";
    }
    if ($alumni->cpendidikan == 1) {
        $cpendidikan = "1";
    } else {
        $cpendidikan = "0";
    }
    if ($alumni->cprestasi == 1) {
        $cprestasi = "1";
    } else {
        $cprestasi = "0";
    }
} else if ($status == 'user') {
    $tombolEdit = '';
    $cttl = "";
    $cemail = "";
    $calamat = "";
    $cjab = "";
    $cig = "";
    $ctw = "";
    $cfb = "";
    $cpendidikan = "1";
    $cprestasi  = "1";
}


?>
<?= $this->extend('websia/layoutWebsia/templateBerandaLogin.php'); ?>

<?= $this->section('content'); ?>
<!-- Awal User Profile-->
<div class="md:flex block items-center md:flex-col lg:flex-row flex-col-reverse mt-10 md:mt-6 lg:mt-10 mb-8 pt-0 lg:px-20 md:px-8">
    <div class="lg:w-7/12 w-full md:flex items-center font-paragraph text-sm">
        <div class="md:w-2/5 mb-8 justify-center object-center space-y-4">
            <!-- Avatar user profile -->
            <div class="flex flex-wrap justify-center">
                <div class="w-2/3 sm:w-full px-4">
                    <!-- syarat foto disini harus persegi (solusi : object fit) -->
                    <img src="/img/<?= $alumni->foto_profil ?>" alt="..." class="rounded-full min-w-full max-w-full h-auto align-middle border-none" />
                    <!-- <img src="/img/tes/download.jpg" alt="..." class="shadow rounded-full max-w-full h-auto align-middle border-none" /> -->
                </div>
            </div>
            <!-- Tombol edit profil yang ketika di klik akan mengarah ke halaman edit profil -->
            <a class="block bg-secondary text-white text-center py-1 md:py-2 px-4 mx-auto rounded-full w-24 md:w-32 cursor-pointer hover:bg-secondaryhover transition-colors duration-300 <?= $tombolEdit ?>" href="/User/editProfil">Edit Profil</a>
        </div>
        <div class="md:w-3/5 justify-center mx-auto items-center text-center md:text-left object-center md:px-8 md:py-6">
            <!-- nama alumni -->
            <h3 class="font-heading text-secondary text-2xl md:text-3xl lg:pr-1 px-8 md:px-0 mb-2 font-extrabold uppercase"><?= $alumni->nama; ?></h3>
            <div class="mb-2">
                <!-- role alumni -->
                <?php
                if ($status == 'bukan user') {
                } else if ($status == 'user') { ?>
                    <?php foreach ($role as $row) : ?>
                        <?php if ($row->name == 'Developer') {
                        } else { ?>
                            <span class="font-paragraph text-xs inline-block bg-gray-300 mb-1 py-1 px-2 md:px-3 lg:px-4 rounded-lg text-primary align-middle uppercase"><?= $row->name; ?></span>
                <?php }
                    endforeach;
                } ?>

            </div>
            <!-- tempat dan tanggal lahir -->
            <p class="font-heading text-primary text-center md:text-left text-sm mb-5 md:mb-3 lg:mb-5">
                <?php if ($cttl == "") : ?>
                    <?= $alumni->tempat_lahir ?>, <?= strftime("%d %B %Y", strtotime($alumni->tanggal_lahir)); ?>
                <?php endif ?>
            </p>
            <p class="font-heading text-center md:text-left text-base mb-5 md:mb-3 lg:mb-5">
                <!-- Akademi Ilmu Statistik / STIS/ POLSTAT STIS  ========>  Harusnya diatur di BE -->
                <?php foreach ($pendidikan as $row) {
                    if ($row->instansi == "Akademi Ilmu Statistik" || $row->instansi == "STIS" || $row->instansi == "POLSTAT STIS") {
                        echo $row->instansi; ?>
                        <br />
                        <?php if ($row->nim != NULL and $row->angkatan != NULL) { ?>
                            <!-- NIM -->
                            NIM <span class="text-primary"><?= $row->nim; ?></span>
                            <!-- Angkatan -->
                            Angkatan <span class="text-primary">ke-<?= $row->angkatan; ?> </span><br />
                <?php }
                    }
                } ?>
            </p>
            <!-- Instansi tempat bekerja dan jabatan -->
            <p class="font-heading text-base text-center md:text-left">
                Bekerja di <span class="text-primary"> <?= $tempat_kerja->nama_instansi; ?> </span></br>
                Jabatan terakhir di BPS sebagai <span class="text-primary"> <?= $alumni->jabatan_terakhir; ?> </span>
            </p>
        </div>
    </div>
    <div class="lg:w-5/12 w-full md:px-8 md:py-6 pb-4">
        <!-- Awal Deskripsi user profile -->
        <div class="md:p-7 md:shadow-lg md:rounded-xl">
            <p class="px-5 md:px-0 mt-8 md:mt-0 font-heading text-primary text-sm italic text-justify mb-4 md:mb-0 text-center md:text-justify lg:text-left">
                <?php if ($alumni->deskripsi == NULL) { ?>
                    Biografi alumni belum terisi.
                <?php } ?>
                <?= $alumni->deskripsi ?>
            </p>
        </div>
        <!-- Akhir Deskripsi user profile -->
        <div class="md:pl-5 lg:pl-6">
            <?php if ($calamat == "") : ?>
                <p class="font-heading text-primary text-xs px-5 md:px-0 mt-6">Lokasi Tempat Tinggal Saat Ini</p>
                <span class="font-heading flex justify-start px-3 md:px-0 text-base text-left mb-5 md:mb-0">
                    <img class="my-2 mt-2 mr-0 md:mr-2 ml-1 md:ml-0 w-6 h-6 md:w-6 float-left" src="/img/components/icon/maps_flag.png" alt="">
                    <!-- Lokasi tempat tinggal -->
                    <p class="font-heading my-2 mt-2"> <?= $alumni->alamat_alumni ?> </p>
                </span>
            <?php endif ?>
            <!-- Awal media sosial-->
            <div class="md:space-x-4 md:flex md:flex-row items-start justify-center lg:justify-start md:py-4 px-5 md:px-0">
                <div class="w-full md:w-1/2 mr-10">
                    <!-- Email -->
                    <div class="inline-block mb-2 flex flex-row">
                        <img src="/img/components/icon/message.png" alt="" class="float-left w-5">
                        <?php if ($alumni->email == NULL) { ?>
                            <span class="font-heading text-xs text-primary text-center ml-2 md:ml-2"><i>belum terisi</i></span>
                        <?php } else { ?>
                            <span class="font-heading text-xs text-primary text-center ml-2 md:ml-2"><?= $alumni->email ?></span>
                        <?php } ?>
                    </div>
                    <!-- Twitter -->
                    <a href="https://www.twitter.com/<?= $alumni->twitter ?>" target="_new">
                        <div class="inline-block mb-2 flex flex-row">
                            <img src="/img/components/icon/tiny_twitter.png" alt="" class="float-left w-4 w-4">
                            <?php if ($alumni->twitter == NULL) { ?>
                                <span class="font-heading text-xs text-primary text-center ml-3 md:ml-3"><i>belum terisi</i></span>
                            <?php } else { ?>
                                <span class="font-heading text-xs text-primary text-center ml-3 md:ml-3"><?= $alumni->twitter ?></span>
                            <?php } ?>
                        </div>
                    </a>
                    <!-- Instagram -->
                    <a href="https://www.instagram.com/<?= $alumni->ig ?>" target="_new">
                        <div class="inline-block flex flex-row">
                            <img src="/img/components/icon/tiny_instagram.png" alt="" class="float-left w-4">
                            <?php if ($alumni->ig == NULL) { ?>
                                <span class="font-heading text-xs text-primary text-center flex items-center ml-3 md:ml-3"><i>belum terisi</i></span>
                            <?php } else { ?>
                                <span class="font-heading text-xs text-primary text-center flex items-center ml-3 md:ml-3"><?= $alumni->ig ?></span>
                            <?php } ?>
                        </div>
                    </a>
                </div>
                <?php if ($alumni->fb == NULL) : ?>
                    <a href="https://www.facebook.com/" target="_new">
                    <?php else : ?>
                        <a href="<?= $alumni->fb ?>" target="_new">
                        <?php endif; ?>
                        <div class="w-full md:w-1/2 mt-2 md:mt-0">
                            <!-- Facebook -->
                            <div class="inline-block mb-2 flex flex-row">
                                <img src="/img/components/icon/fb.png" alt="" class="float-left ml-1 md:ml-1 h-4">
                                <span class="font-heading text-xs text-primary text-left flex items-center ml-4 md:ml-5">Facebook</span>
                            </div>
                        </a>
                        <!-- LinkedIn -->
                        <?php if ($alumni->linkedin == NULL) : ?>
                            <a href="https://www.linkedin.com/" target="_new">
                            <?php else : ?>
                                <a href="<?= $alumni->linkedin ?>" target="_new">
                                <?php endif; ?>
                                <div class="inline-block mb-2 flex flex-row">
                                    <img src="/img/components/icon/linkedin.png" alt="" class="float-left w-5">
                                    <span class="font-heading text-xs text-primary text-center flex items-center ml-2 md:ml-3">LinkedIn</span>
                                </div>
                                </a>
                                <!-- Google Scholar -->

                                <?php if ($alumni->gscholar == NULL) : ?>
                                    <a href="https://scholar.google.com/" target="_new">
                                    <?php else : ?>
                                        <a href="<?= $alumni->gscholar ?>" target="_new">
                                        <?php endif; ?>
                                        <div class="inline-block flex flex-row">
                                            <img src="/img/components/icon/google.png" alt="" class="float-left w-5">
                                            <span class="font-heading text-xs text-primary text-center flex items-center ml-2 md:ml-3">Google Scholar</span>
                                        </div>
                                        </a>
            </div>
        </div>
        <!--  Akhir media sosial-->
    </div>
</div>
</div>
<!-- Akhir User Profile-->

<!-- Awal Rekomendasi -->
<div class="bg-primary py-8 md:py-4 lg:px-20 md:px-8 px-3">
    <div class="static md:w-full md:px-2 md:py-8 pb-8">
        <div class="-mt-16 sm:mt-0 md:mb-6 mb-2 text-center md:text-left text-secondary font-semibold">
            <!-- link ini mengarah ke halaman tampilan semua rekomendasi -->
            <div class="invisible sm:visible">
                <a class="bg-secondary mb-8 mt-1 md:mt-0 float-right font-paragraph text-sm text-white text-center py-1 px-4 mx-auto rounded-full cursor-pointer hover:bg-secondaryhover transition-colors duration-100" href="/User/rekomendasi">
                    Lihat Semua Rekomendasi
                    <img src="/img/components/icon/panah_kanan.png" alt="icon panah kanan" class="float-right pl-2">
                </a>
            </div>
            <h2 class="font-heading mb-6 text-xl inline-block">Alumni yang mungkin Anda kenal</h2>
        </div>
        <div class="holder mx-auto w-11/12 md:w-full lg:w-11/12 grid grid-cols-2 md:grid-cols-4 gap-x-4 md:gap-x-0 lg:gap-x-8" data-aos="zoom-in">
            <?php foreach ($rekomendasi as $row) :  ?>
                <div class="card shadow border-gray-800 hover:bg-gray-200 hover:shadow-inner transition duration-700 bg-white relative" data-aos="zoom-in">
                    <a href="/User/profilAlumni/<?= $row->id_alumni ?>" target="_new">
                        <div class="">
                            <img class="w-full md:w-20 lg:w-24 mx-auto mt-4" src="/img/<?= $row->foto_profil ?>" alt="" /> <!-- Hilangin padding klo dah ada gambar, dan pake w-full aja -->
                        </div>
                        <div>
                            <span class="title mt-4 font-heading text-sm md:text-base lg:text-lg font-semibold text-primary block px-2 md:px-0 text-center"><?= $row->nama; ?></span>
                        </div>
                        <?php if (isset($row->id_tempat_kerja)) { ?>
                            <div>
                                <span class="description font-paragraph text-primary text-center md:text-base block pt-2 pb-2 border-gray-400 mb-2"><?= $row->nama_instansi; ?></span>
                            </div>
                        <?php }
                        if (isset($row->angkatan)) { ?>
                            <div>
                                <span class="description font-paragraph text-primary text-center md:text-base block pt-2 pb-2 border-gray-400 mb-2">Angkatan <?= $row->angkatan; ?></span>
                            </div>
                        <?php } ?>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="visible sm:invisible">
            <a class="bg-secondary mb-8 mt-1 md:mt-0 float-right font-paragraph text-sm text-white text-center py-1 px-4 mx-auto rounded-full cursor-pointer hover:bg-secondaryhover transition-colors duration-300" href="/User/rekomendasi">
                Lihat Semua Rekomendasi
                <img src="/img/components/icon/g" alt="" class="float-right pl-2">
            </a>
        </div>
    </div>
</div>
<!-- Akhir Rekomendasi -->

<!-- Atribut pada section ini belum ditentukan -->
<!-- Awal Informasi Instansi -->
<div class="w-full my-8 lg:px-20 md:px-8 px-2">
    <h3 class="font-heading font-bold text-xl text-center md:text-left text-secondary">Informasi Instansi</h3>
    <div class="md:shadow-lg lg:shadow-xl rounded-2xl px-3 py-3 md:px-7 md:py-5 lg:mx-14 lg:py-8 lg:px-11 md:mt-3">
        <div class="font-heading">
            <?php
            if ($tempat_kerja->nama_instansi == "") {
                $nama_instansi = "belum terisi";
            } else {
                $nama_instansi = $tempat_kerja->nama_instansi;
            }
            if ($tempat_kerja->telp_instansi == "") {
                $telp_instansi = "belum terisi";
            } else {
                $telp_instansi = $tempat_kerja->telp_instansi;
            }
            if ($tempat_kerja->faks_instansi == "") {
                $faks_instansi = "belum terisi";
            } else {
                $faks_instansi = $tempat_kerja->faks_instansi;
            }
            if ($tempat_kerja->email_instansi == "") {
                $email_instansi = "belum terisi";
            } else {
                $email_instansi = $tempat_kerja->email_instansi;
            }
            if ($tempat_kerja->alamat_instansi == "") {
                $alamat_instansi = "belum terisi";
            } else {
                $alamat_instansi = $tempat_kerja->alamat_instansi;
            }
            ?>
            <div class="flex items-start">
                <div class="font-bold text-primary w-3/12 md:w-2/12 lg:w-1/12 lg:pb-2">Instansi :</div>
                <div class="w-9/12 md:w-10/12 lg:w-11/12 lg:ml-5"><?= $nama_instansi ?></div>
            </div>
            <div class="flex items-start">
                <div class="font-bold text-primary w-3/12 md:w-2/12 lg:w-1/12 lg:pb-2">Alamat : </div>
                <div class="w-9/12 md:w-10/12 lg:w-11/12 lg:ml-5"><?= $alamat_instansi ?></div>
            </div>
            <div class="flex items-start">
                <div class="font-bold text-primary w-3/12 md:w-2/12 lg:w-1/12 lg:pb-2">Telp : </div>
                <div class="w-9/12 md:w-10/12 lg:w-11/12 lg:ml-5"><?= $telp_instansi ?></div>
            </div>
            <div class="flex items-start">
                <div class="font-bold text-primary w-3/12 md:w-2/12 lg:w-1/12 lg:pb-2">Faks : </div>
                <div class="w-9/12 md:w-10/12 lg:w-11/12 lg:ml-5"><?= $faks_instansi ?></div>
            </div>
            <div class="flex items-start">
                <div class="font-bold text-primary w-3/12 md:w-2/12 lg:w-1/12 lg:pb-2">Email : </div>
                <div class="w-9/12 md:w-10/12 lg:w-11/12 lg:ml-5"><?= $email_instansi ?></div>
            </div>
        </div>
    </div>
    <hr class="visible sm:invisible border-primary border-opacity-75 w-4/5 object-center mx-auto mt-8">
</div>
<!-- Akhir Informasi Intsansi -->

<?php if ($cprestasi == 1) { ?>
    <!-- Awal Riwayat Prestasi -->
    <div class="w-full my-8 lg:px-20 md:px-8 px-2">
        <h3 class="font-heading font-bold text-xl text-secondary text-center md:text-left ">Riwayat Prestasi</h3>
        <div class="md:shadow-lg lg:shadow-xl rounded-2xl px-0 py-1 md:px-5 md:py-5 lg:mx-14 lg:p-8 mb-1 md:mt-3">
            <?php if ($prestasi == NULL) {
                echo "<p class='text-center md:text-left '>Riwayat Prestasi tidak ditemukan.</p>";
            } else { ?>
                <?php foreach ($prestasi as $row) : ?>
                    <div class="flex justify-between px-3 font-heading text-primary mt-2 md:mt-2 lg:mt-3">
                        <div class=""><span class="text-black"><?= $row->nama_prestasi; ?></span> </div>
                        <div class="font-bold"><?= $row->tahun_prestasi; ?></div>
                    </div>
            <?php endforeach;
            } ?>
            <!-- Jika data prestasi belum diinput, ditampilkan "belum ada riwayat prestasi" -->
        </div>
        <hr class="visible sm:invisible border-primary border-opacity-75 w-4/5 object-center mx-auto mt-8">
    </div>
    <!-- Akhir Riwayat Prestasi -->
<?php } ?>

<?php if ($cpendidikan == 1) { ?>
    <!-- Awal Riwayat Pendidikan -->
    <div class="w-full my-8 lg:px-20 md:px-8 px-2 mb-6 md:mb-12">
        <h3 class="font-heading font-bold text-xl text-secondary text-center md:text-left ">Riwayat Pendidikan</h3>
        <div class="lg:px-16">
            <div class="md:shadow-lg lg:shadow-xl rounded-3xl w-full mx-auto mt-5">
                <div class="overflow-x-scroll md:overflow-x-hidden">
                    <table class="table-fixed font-paragraph text-black">
                        <thead>
                            <tr>
                                <th class="w-1/12 bg-gray-100 border-b-2 border-gray-200 rounded-tl-xl lg:rounded-tl-3xl text-sm text-left pl-3 lg:pl-5 py-2 md:py-3 lg:py-4">Jenjang Pendidikan</th>
                                <th class="w-2/12 bg-gray-100 border-b-2 border-gray-200 text-sm text-left pl-3 lg:pl-5 py-2 md:py-3 lg:py-4">Instansi</th>
                                <th class="w-2/12 bg-gray-100 border-b-2 border-gray-200 text-sm text-left pl-3 lg:pl-5 py-2 md:py-3 lg:py-4">Program Studi</th>
                                <th class="w-1/12 bg-gray-100 border-b-2 border-gray-200 text-sm text-left pl-3 lg:pl-5 py-2 md:py-3 lg:py-4">Tahun Masuk</th>
                                <th class="w-1/12 bg-gray-100 border-b-2 border-gray-200 text-sm text-left pl-3 lg:pl-5 py-2 md:py-3 lg:py-4">Tahun Lulus</th>
                                <th class="w-3/12 bg-gray-100 border-b-2 border-gray-200 rounded-tr-xl lg:rounded-tr-3xl text-sm text-left pl-3 lg:pl-5 py-2 md:py-3 lg:py-4">Judul Tulisan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($pendidikan == NULL) { ?>
                                <!-- Tampilan jika data semua kolom belum diisi -->

                                <tr>
                                    <td colspan="6" class="text-sm text-center border-b-2 border-gray-200 px-3 lg:px-5 py-2 md:py-3 lg:py-4">Riwayat pendidikan tidak ditemukan.</td>
                                </tr>
                            <?php } else { ?>
                                <?php foreach ($pendidikan as $row) : ?>
                                    <?php
                                    if ($row->jenjang == "") {
                                        $jenjang = "belum terisi";
                                    } else {
                                        $jenjang = $row->jenjang;
                                    }
                                    if ($row->instansi == "") {
                                        $instansi = "belum terisi";
                                    } else {
                                        $instansi = $row->instansi;
                                    }
                                    if ($row->program_studi == "") {
                                        $program_studi = "belum terisi";
                                    } else {
                                        $program_studi = $row->program_studi;
                                    }
                                    if ($row->tahun_masuk == "0000") {
                                        $tahun_masuk = "belum terisi";
                                    } else {
                                        $tahun_masuk = $row->tahun_masuk;
                                    }
                                    if ($row->tahun_lulus == "0000") {
                                        $tahun_lulus = "belum terisi";
                                    } else {
                                        $tahun_lulus = $row->tahun_lulus;
                                    }
                                    if ($row->judul_tulisan == "") {
                                        $judul_tulisan = "belum terisi";
                                    } else {
                                        $judul_tulisan = $row->judul_tulisan;
                                    }
                                    ?>
                                    <tr>
                                        <td class="text-sm text-left border-b-2 border-gray-200 px-3 lg:px-5 py-2 md:py-3 lg:py-4"><?= $jenjang; ?></td>
                                        <td class="text-sm text-left border-b-2 border-gray-200 px-3 lg:px-5 py-2 md:py-3 lg:py-4"><?= $instansi; ?></td>
                                        <td class="text-sm text-left border-b-2 border-gray-200 px-3 lg:px-5 py-2 md:py-3 lg:py-4"><?= $program_studi; ?></td>
                                        <td class="text-sm text-left border-b-2 border-gray-200 px-3 lg:px-5 py-2 md:py-3 lg:py-4"><?= $tahun_masuk; ?></td>
                                        <td class="text-sm text-left border-b-2 border-gray-200 px-3 lg:px-5 py-2 md:py-3 lg:py-4"><?= $tahun_lulus; ?></td>
                                        <td class="text-sm text-left border-b-2 border-gray-200 px-3 lg:px-5 py-2 md:py-3 lg:py-4"><?= $judul_tulisan; ?></td>
                                    </tr>
                            <?php endforeach;
                            } ?>
                            <tr>
                                <td class="bg-gray-100 rounded-bl-xl lg:rounded-bl-3xl text-sm text-left px-3 lg:px-5 py-2 md:py-3 lg:py-4"></td>
                                <td class="bg-gray-100 text-sm text-left px-3 lg:px-5 py-2 md:py-3 lg:py-4"></td>
                                <td class="bg-gray-100 text-sm text-left px-3 lg:px-5 py-2 md:py-3 lg:py-4"></td>
                                <td class="bg-gray-100 text-sm text-left px-3 lg:px-5 py-2 md:py-3 lg:py-4"></td>
                                <td class="bg-gray-100 text-sm text-left px-3 lg:px-5 py-2 md:py-3 lg:py-4"></td>
                                <td class="bg-gray-100 rounded-br-xl lg:rounded-br-3xl text-sm text-left px-3 lg:px-5 py-2 md:py-3 lg:py-4"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Riwayat Pendidikan -->

    <!-- Awal Foto Tentang Anda -->
    <div class="w-full my-8 lg:px-20 md:px-8 px-2">
        <div class="font-heading">
            <!-- link ini mengarah ke halaman tampilan semua galeri -->
            <div class="invisible sm:visible">
                <a class="bg-secondary mb-8 md:mt-0 float-right font-paragraph text-sm text-white text-center py-1 px-4 mx-auto rounded-full cursor-pointer hover:bg-secondaryhover transition-colors duration-100" href="/User/galeriFoto">
                    Lihat Semua Foto
                    <img src="/img/components/icon/panah_kanan.png" alt="icon panah kanan" class="float-right pl-2">
                </a>
            </div>
        </div>
        <h3 class="font-heading font-bold text-xl text-center md:text-left text-secondary inline-block">Foto Tentang Anda</h3>
        <div class="md:shadow-lg lg:shadow-xl rounded-2xl px-3 py-3 md:px-7 md:py-5 lg:mx-14 lg:py-8 lg:px-11 md:mt-3">
            <div class="holder mx-auto w-11/12 md:w-full lg:w-11/12 grid grid-cols-2 md:grid-cols-3 gap-x-4 md:gap-x-0 lg:gap-x-8">
                <?php for ($x = 0; $x < 6; $x++) : ?>
                    <!-- 1 gambar -->
                    <!-- <a href="#img-1" id="img-1">
                        <div class="rounded-3xl m-2 relative hover:shadow-xl transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-105 cursor-pointer">
                            <img id="slide" class="object-cover w-96 h-48 object-fit rounded-3xl mx-auto" src="/img/alumni.jpg" alt="" />
                        </div>
                    </a>

                    <div class="fixed overflow-auto top-0 bottom-0 right-0 left-0 z-40 bg-black bg-opacity-80 text-center font-paragraph hidden" id="img-1">
                        <div class="m-auto duration-700 transition-all bg-gray bg-opacity-0 w-11/12 sm:w-9/12 md:w-8/12 lg:w-7/12">
                            <!-- Awal Tombol Laporkan foto -->
                    <button onClick="laporkanFoto()"><img src="<?= base_url() ?>/img/components/icon/danger-sign.png" alt="" class="absolute top-3 right-3"></button>
                    <!-- Akhir Tombol Laporkan foto --

                    <div class="flex flex-col justify-center items-center">
                        <div class="flex flex-row justify-center items-center gap-x-4 mt-8 mb-6">
                            <a href="#">
                                <img src="<?= base_url() ?>/img/components/icon/left-on.png" alt="" class="" onclick="prev()" id="prev">
                            </a>
                            <img src="<?= base_url() ?>/img/galeri/alumni.jpg" alt="" class="slider-img w-3/4">
                            <a href="#">
                                <img src="<?= base_url() ?>/img/components/icon/right-on.png" alt="" class="" onclick="next()" id="next">
                            </a>
                        </div>

                        <!-- Awal Caption --
                        <div class="text-white w-3/4 h-3/4 mx-2 text-base">
                            <!-- <p class="mb-2">Oleh : Si Fulan (59)</p> --
                            <p class="mb-2">Oleh : Fulan</p>
                            <!-- <p class="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam impedit optio praesentium soluta quasi. Voluptatibus molestias sequi inventore odit voluptas pariatur a ut, totam obcaecati accusamus iure, labore dolorum dolor.</p> --
                            <p class="mt-4">Caption</p>
                            <div class="mt-5 text-gray-400 text-center">
                                <span> <img src="<?= base_url() ?>/img/components/icon/line.png" alt="" class="inline mr-1"> bersama </span> <span class=" text-white">Nama1 </span> <span> dan</span> <span class="text-white"> 10 lainnya</span> <span><img src="<?= base_url() ?>/img/components/icon/down.png" alt="" class="daftarTag inline ml-1 rounded-full w-4 hover:bg-secondary cursor-pointer" onclick="daftarTag()">
                                </span>
                                <!-- Awal Tampilan Daftar Tag --
                                <div class="tampilTag hidden relative" id="tampilTag">
                                    <div class="static mt-2 p-2 rounded-2xl overflow-y-auto h-64 ml-80 bg-primary w-1/4 position-right text-white">
                                        <ul class="bg-primary">
                                            <?php for ($a = 0; $a < 12; $a++) : ?>
                                                <li>Nama</li>
                                            <?php endfor ?>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Akhir Tampilan Daftar Tag --
                            </div>

                        </div>
                        <!-- Akhir Caption --


                    </div>
            </div>
        </div>
        <script>
            $('#img-1').click(function() {
                var modal = document.getElementById('img-1')
                $('#img-1').removeClass('hidden')
                $(window).click(function(e) {
                    if (e.target === modal) {
                        setTimeout(function() {
                            $('#img-1').addClass('hidden')
                        }, 100);
                    }
                });

                // $('.closeFormUnggahFoto').click(function() {
                //     setTimeout(function() {
                //         $('#formUnggahFoto').addClass('hidden')
                //     }, 100);
                // });
            })
        </script> -->
                <?php endfor; ?>

                <?php for ($i = 0; $i < 6; $i++) :
                    if (isset($foto[$i])) : ?>
                        <!-- 1 gambar -->
                        <a href="#<?= $foto[$i]['id_foto']; ?>" id="foto<?= $foto[$i]['id_foto']; ?>">
                            <div class="rounded-3xl m-2 relative hover:shadow-xl transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-105 cursor-pointer">
                                <img id="slide" class="object-cover w-96 h-48 object-fit rounded-3xl mx-auto" src="<?= base_url() ?>/img/galeri/<?= $foto[$i]['nama_file']; ?>" alt="" />
                            </div>
                        </a>
                        <!-- <php endfor; ?> -->

                        <div class="fixed overflow-auto top-0 bottom-0 right-0 left-0 z-40 bg-black bg-opacity-80 text-center font-paragraph hidden" id="<?= $foto[$i]['id_foto']; ?>">
                            <div class="m-auto duration-700 transition-all bg-gray bg-opacity-0 w-11/12 sm:w-9/12 md:w-8/12 lg:w-7/12">
                                <!-- Awal Tombol Laporkan foto -->
                                <button onClick="laporkanFoto(<?= $foto[$i]['id_foto']; ?>)"><img src="<?= base_url() ?>/img/components/icon/danger-sign.png" alt="" class="absolute top-3 right-3"></button>
                                <!-- Akhir Tombol Laporkan foto -->

                                <div class="flex flex-col justify-center items-center">
                                    <div class="flex flex-row justify-center items-center gap-x-4 mt-8 mb-6">
                                        <a href="#<?= $foto[$i]['id_foto'] - 1; ?>">
                                            <img src="<?= base_url() ?>/img/components/icon/left-on.png" alt="" class="" onclick="prev()" id="prev">
                                        </a>
                                        <img src="<?= base_url() ?>/img/galeri/<?= $foto[$i]['nama_file']; ?>" alt="" class="slider-img w-3/4">
                                        <a href="#<?= $foto[$i]['id_foto'] + 1; ?>">
                                            <img src="<?= base_url() ?>/img/components/icon/right-on.png" alt="" class="" onclick="next()" id="next">
                                        </a>
                                    </div>

                                    <!-- Awal Caption -->
                                    <div class="text-white w-3/4 h-3/4 mx-2 text-base">
                                        <!-- <p class="mb-2">Oleh : Si Fulan (59)</p> -->
                                        <p class="mb-2">Oleh : <?= $foto[$i]['nama'] ?></p>
                                        <!-- <p class="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam impedit optio praesentium soluta quasi. Voluptatibus molestias sequi inventore odit voluptas pariatur a ut, totam obcaecati accusamus iure, labore dolorum dolor.</p> -->
                                        <p class="mt-4"><?= $foto[$i]['caption'] ?></p>
                                        <div class="mt-5 text-gray-400 text-center">
                                            <?php if (count($foto[$i]['tag_name']) > 1) : ?>
                                                <span> <img src="<?= base_url() ?>/img/components/icon/line.png" alt="" class="inline mr-1"> bersama </span> <span class=" text-white"><?= $foto[$i]['tag_name'][0]['nama'] ?> </span> <span> dan</span> <span class="text-white"> <?= count($foto[$i]['tag_name']) - 1 ?> lainnya</span> <span><img src="<?= base_url() ?>/img/components/icon/down.png" alt="" class="daftarTag inline ml-1 rounded-full w-4 hover:bg-secondary cursor-pointer" onclick="daftarTag()">
                                                </span>
                                                <!-- Awal Tampilan Daftar Tag -->
                                                <div class="tampilTag hidden relative" id="tampilTag">
                                                    <div class="static mt-2 p-2 rounded-2xl overflow-y-auto h-64 ml-80 bg-primary w-1/4 position-right text-white">
                                                        <ul class="bg-primary">
                                                            <?php for ($n = 1; $n < count($foto[$i]['tag_name']); $n++) : ?>
                                                                <li><?= $foto[$i]['tag_name'][$n]['nama'] ?></li>
                                                            <?php endfor ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            <?php elseif (count($foto[$i]['tag_name']) < 1) : ?>
                                                <span> <img src="<?= base_url() ?>/img/components/icon/line.png" alt="" class="inline mr-1"> bersama </span> <span class=" text-white"><?= $foto[$i]['tag_name'][0]['nama'] ?> </span>
                                                </span>
                                            <?php else : ?>
                                            <?php endif ?>
                                            <!-- Akhir Tampilan Daftar Tag -->
                                        </div>

                                    </div>
                                    <!-- Akhir Caption -->

                                    <div class="text-white w-3/4 mx-2 mt-10 md:text-xl">
                                        <p class="mb-2">
                                            <?= ($i + 1) ?> dari <?= $count ?></p>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <script>
                            $('#foto<?= $foto[$i]['id_foto']; ?>').click(function() {
                                var modal = document.getElementById('<?= $foto[$i]['id_foto']; ?>')
                                $('#<?= $foto[$i]['id_foto']; ?>').removeClass('hidden')
                                $(window).click(function(e) {
                                    if (e.target === modal) {
                                        setTimeout(function() {
                                            $('#<?= $foto[$i]['id_foto']; ?>').addClass('hidden')
                                        }, 100);
                                    }
                                });

                                // $('.closeFormUnggahFoto').click(function() {
                                //     setTimeout(function() {
                                //         $('#formUnggahFoto').addClass('hidden')
                                //     }, 100);
                                // });
                            })
                        </script>
                <?php else :
                        break;
                    endif;
                endfor; ?>
            </div>
            <div class="visible sm:invisible">
                <a class="bg-secondary mb-8 mt-1 md:mt-0 float-right font-paragraph text-sm text-white text-center py-1 px-4 mx-auto rounded-full cursor-pointer hover:bg-secondaryhover transition-colors duration-300" href="/User/rekomendasi">
                    Lihat Semua foto
                    <img src="/img/components/icon/g" alt="" class="float-right pl-2">
                </a>
            </div>
        </div>
    </div>
    <hr class="visible sm:invisible border-primary border-opacity-75 w-4/5 object-center mx-auto mt-8">
    </div>
    <!-- Akhir Foto Tentang Anda -->
<?php } ?>

<?= $this->endSection(); ?>