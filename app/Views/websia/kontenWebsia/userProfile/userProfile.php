<!-- ganti status ='user' atau 'bukan user' di controller websia class userProfile sesuai pengakses. 
User itu untuk melihat profil diri sendiri, sedangkan bukan user untuk melihat profil orang lain. 
Hal ini berpengaruh pada ada tidaknya tampilan tombol edit profil di halaman profil -->
<?php
if ($status == 'bukan user') {
    $tombolEdit = '';
    $usernya = "Alumni ini";
} else if ($status == 'user') {
    $tombolEdit = '<a class="block bg-secondary text-white text-center py-1 md:py-2 px-4 mx-auto rounded-full w-24 md:w-32 cursor-pointer hover:bg-secondaryhover transition-colors duration-300" href="/User/editProfil">Edit Profil</a>';
    $usernya = "Anda";
}

$sembunyi = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="sm:w-5 w-4">
<path fill-rule="evenodd" d="M3.707 2.293a1 1 0 00-1.414 1.414l14 14a1 1 0 001.414-1.414l-1.473-1.473A10.014 10.014 0 0019.542 10C18.268 5.943 14.478 3 10 3a9.958 9.958 0 00-4.512 1.074l-1.78-1.781zm4.261 4.26l1.514 1.515a2.003 2.003 0 012.45 2.45l1.514 1.514a4 4 0 00-5.478-5.478z" clip-rule="evenodd" />
<path d="M12.454 16.697L9.75 13.992a4 4 0 01-3.742-3.741L2.335 6.578A9.98 9.98 0 00.458 10c1.274 4.057 5.065 7 9.542 7 .847 0 1.669-.105 2.454-.303z" />
</svg>';

$cttl = '<div class="flex-initial text-primary ml-2">' . $sembunyi . '</div>';
$calamat = '<div class="flex-auto text-primary md:px-0 mt-6 md:mt-5 ml-2">' . $sembunyi . '</div>';
$cpendidikan = '<div class="flex-initial text-primary mt-1 ml-2">' . $sembunyi . '</div>';
$cprestasi = '<div class="flex-initial text-primary mt-1 ml-2">' . $sembunyi . '</div>';

?>
<?= $this->extend('websia/layoutWebsia/templateBerandaLogin.php'); ?>

<?= $this->section('content'); ?>

<style>
    .prev,
    .next {
        top: 50%;
    }

    .next {
        right: 5%;
    }

    .prev {
        left: 5%;
    }

    .pageFoto {
        bottom: 0px;
        left: 50%;
        transform: translateX(-50%);
    }

    @media only screen and (min-width: 600px) {

        .prev,
        .next {
            width: 30px;
        }

        .prev {
            left: 8%;
        }

        .next {
            right: 8%;
        }
    }

    @media only screen and (min-width: 768px) {

        .prev,
        .next {
            width: 40px;
        }

        .prev {
            left: 14%;
        }

        .next {
            right: 14%;
        }
    }

    @media only screen and (min-width: 1000px) {

        .prev {
            left: 20%;
        }

        .next {
            right: 20%;
        }
    }
</style>

<!-- Awal User Profile-->
<div class="md:flex block items-center md:flex-col lg:flex-row flex-col-reverse mt-10 md:mt-6 lg:mt-10 mb-8 pt-0 lg:px-20 md:px-8">
    <div class="lg:w-7/12 w-full md:flex items-center font-paragraph text-sm">
        <div class="md:w-2/5 mb-8 justify-center object-center space-y-4">
            <!-- Avatar user profile -->
            <div class="flex flex-wrap justify-center">
                <div class="w-2/3 sm:w-full px-4">
                    <!-- syarat foto disini harus persegi (solusi : object fit) -->
                    <img src="/img/<?= $alumni->foto_profil ?>" alt="foto profil user" class="rounded-full min-w-full max-w-full h-auto align-middle border-none" />
                    <!-- <img src="/img/tes/download.jpg" alt="download" class="shadow rounded-full max-w-full h-auto align-middle border-none" /> -->
                </div>
            </div>
            <!-- Tombol edit profil yang ketika di klik akan mengarah ke halaman edit profil -->
            <?= $tombolEdit ?>
        </div>
        <div class="md:w-3/5 justify-center mx-auto items-center text-center md:text-left object-center md:px-8 md:py-6">
            <!-- nama alumni -->
            <h3 class="font-heading text-secondary text-2xl md:text-3xl lg:pr-1 px-8 md:px-0 mb-2 font-extrabold uppercase"><?= $alumni->nama; ?></h3>
            <div class="mb-2">
                <!-- role alumni -->
                <?php
                if ($status == 'bukan user') :
                elseif ($status == 'user') : ?>
                    <?php foreach ($role as $row) : ?>
                        <?php if ($row->name == 'Developer') :
                        else : ?>
                            <span class="font-paragraph text-xs inline-block bg-gray-300 mb-1 py-1 px-2 md:px-3 lg:px-4 rounded-lg text-primary align-middle uppercase"><?= $row->name; ?></span>
                <?php endif;
                    endforeach;
                endif; ?>

            </div>
            <!-- tempat dan tanggal lahir -->
            <div class="flex justify-center md:justify-start font-heading text-primary text-center md:text-left text-sm mb-5 md:mb-3 lg:mb-5">
                <?php if ($alumni->cttl == 1 || $status == 'user') : ?>
                    <div class="flex-initial">
                        <?= $alumni->tempat_lahir ?>, <?= strftime("%d %B %Y", strtotime($alumni->tanggal_lahir)); ?>
                    </div>
                    <?php if ($alumni->cttl == 0 && $status == 'user') :
                        // gambar mata
                        echo $cttl;
                    endif; ?>
                <?php endif; ?>
            </div>
            <p class="font-heading text-center md:text-left text-base mb-5 md:mb-3 lg:mb-5">
                <!-- Akademi Ilmu Statistik / STIS/ POLSTAT STIS  ========>  Harusnya diatur di BE -->
                <?php foreach ($pendidikan as $row) {
                    if ($row->instansi == "Akademi Ilmu Statistik" || $row->instansi == "Sekolah Tinggi Ilmu Statistik" || $row->instansi == "Politeknik Statistika STIS") {
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
            <p class="px-5 md:px-0 mt-8 md:mt-0 font-heading text-primary text-sm italic text-justify mb-4 md:mb-0 md:text-justify lg:text-left">
                <?php if ($alumni->deskripsi == NULL) { ?>
                    Biografi alumni belum terisi.
                <?php } ?>
                <?= $alumni->deskripsi ?>
            </p>
        </div>
        <!-- Akhir Deskripsi user profile -->
        <div class="md:pl-5 lg:pl-6">
            <?php if ($alumni->calamat == 1 || $status == 'user') : ?>
                <div class="flex">
                    <div class="font-heading text-primary text-xs pl-5 md:px-0 mt-6">Lokasi Tempat Tinggal Saat Ini</div>
                    <?php if ($alumni->calamat == 0 && $status == 'user') :
                        // gambar mata
                        echo $calamat;
                    endif; ?>
                </div>
                <span class="font-heading flex justify-start px-3 md:px-0 text-sm text-left mb-2 md:mb-0">
                    <img class="my-2 mt-2 mr-0 md:mr-2 ml-1 md:ml-0 w-6 h-6 md:w-6 float-left" src="/img/components/icon/maps_flag.png" alt="alamat">
                    <!-- Lokasi tempat tinggal -->
                    <p class="font-heading my-2 mt-2"> <?= ucwords($alumni->alamat_alumni);
                                                        echo $kabkota;
                                                        echo $provinsi; ?> </p>
                </span>
                <hr class="visible sm:invisible border-primary border-opacity-75 w-4/5 object-center mx-auto mb-6 md:mb-0">
            <?php endif; ?>
            <!-- Awal media sosial-->
            <div class="md:space-x-4 md:flex md:flex-row items-start justify-center lg:justify-start md:py-4 px-5 md:px-0">
                <div class="w-full md:w-1/2 mr-10">
                    <!-- Email -->
                    <div class="inline-block mb-2 flex flex-row">
                        <img src="/img/components/icon/message.png" alt="message" class="float-left w-5 h-4">
                        <?php if ($alumni->email == NULL) { ?>
                            <span class="font-heading text-xs text-primary text-left ml-2 md:ml-2"><i>belum terisi</i></span>
                        <?php } else { ?>
                            <span class="font-heading text-xs text-primary text-left ml-2 md:ml-2"><?= $alumni->email ?></span>
                        <?php } ?>
                    </div>
                    <!-- Twitter -->
                    <a href="https://www.twitter.com/<?= $alumni->twitter ?>" target="_new">
                        <div class="inline-block mb-2 flex flex-row">
                            <img src="/img/components/icon/tiny_twitter.png" alt="twitter" class="float-left w-4 h-4">
                            <?php if ($alumni->twitter == NULL) { ?>
                                <span class="font-heading text-xs text-primary text-left ml-3 md:ml-3"><i>belum terisi</i></span>
                            <?php } else { ?>
                                <span class="font-heading text-xs text-primary text-left ml-3 md:ml-3"><?= $alumni->twitter ?></span>
                            <?php } ?>
                        </div>
                    </a>
                    <!-- Instagram -->
                    <a href="https://www.instagram.com/<?= $alumni->ig ?>" target="_new">
                        <div class="inline-block flex flex-row">
                            <img src="/img/components/icon/tiny_instagram.png" alt="instagram" class="float-left w-4 h-4">
                            <?php if ($alumni->ig == NULL) { ?>
                                <span class="font-heading text-xs text-primary text-left flex items-center ml-3 md:ml-3"><i>belum terisi</i></span>
                            <?php } else { ?>
                                <span class="font-heading text-xs text-primary text-left flex items-center ml-3 md:ml-3"><?= $alumni->ig ?></span>
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
                                <img src="/img/components/icon/fb.png" alt="facebook" class="float-left ml-1 md:ml-1 h-4 h-4">
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
                                    <img src="/img/components/icon/linkedin.png" alt="linkedin" class="float-left w-5 h-5">
                                    <span class="font-heading text-xs text-primary text-left flex items-center ml-2 md:ml-3">LinkedIn</span>
                                </div>
                                </a>
                                <!-- Google Scholar -->

                                <?php if ($alumni->gscholar == NULL) : ?>
                                    <a href="https://scholar.google.com/" target="_new">
                                    <?php else : ?>
                                        <a href="<?= $alumni->gscholar ?>" target="_new">
                                        <?php endif; ?>
                                        <div class="inline-block flex flex-row">
                                            <img src="/img/components/icon/google.png" alt="google" class="float-left w-5 h-5">
                                            <span class="font-heading text-xs text-primary text-left flex items-center ml-2 md:ml-3">Google Scholar</span>
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
<div class="bg-primary pt-8 pb-2 sm:py-8 md:py-4 lg:px-20 md:px-8 px-3">
    <div class="static md:w-full md:px-2 md:py-8 pb-8">

        <!-- <div class="md:mb-6 mb-2 text-left text-secondary font-semibold">
            <div class="invisible sm:visible">
                <a class="bg-secondary mb-8 mt-1 md:mt-0 font-paragraph text-sm text-white text-center py-1 px-4 mx-auto rounded-full cursor-pointer hover:bg-secondaryhover transition-colors duration-100" href="/User/rekomendasi">
                    Lihat Semua Rekomendasi
                    <img src="/img/components/icon/panah_kanan.png" alt="icon panah kanan" class="float-right pl-2">
                </a>
            </div>
            <h2 class="font-heading mb-6 ml-2 text-base sm:text-xl">Alumni yang mungkin Anda kenal</h2>
        </div> -->

        <div class="-mt-8 sm:mt-0 md:mb-6 mb-2 text-left text-secondary font-semibold">
            <!-- link ini mengarah ke halaman tampilan semua rekomendasi -->
            <div class="invisible sm:visible">
                <a class="bg-secondary mb-8 mt-1 md:mt-0 sm:float-right font-paragraph text-sm text-white text-center py-1 px-4 mx-auto rounded-full cursor-pointer hover:bg-secondaryhover transition-colors duration-100" href="/User/rekomendasi">
                    Lihat Semua Rekomendasi
                    <img src="/img/components/icon/panah_kanan.png" alt="icon panah kanan" class="float-right pl-2">
                </a>
            </div>
            <h2 class="font-heading md:-mb-2 mb-5 ml-2 text-base sm:text-xl inline-block">Alumni yang mungkin Anda kenal</h2>
        </div>
        <div class="holder mx-auto w-11/12 md:w-full lg:w-11/12 grid grid-cols-2 md:grid-cols-4 gap-x-4 md:gap-x-0 lg:gap-x-8" data-aos="zoom-in">
            <?php foreach ($rekomendasi as $row) :  ?>
                <div class="card shadow border-gray-800 hover:bg-gray-200 hover:shadow-inner transition duration-700 bg-white relative" data-aos="zoom-in">
                    <a href="/User/profilAlumni/<?= $row->id_alumni ?>" target="_new">
                        <div class="">
                            <img class="w-full md:w-20 lg:w-24 mx-auto mt-4" src="/img/<?= $row->foto_profil ?>" alt="foto profil user" /> <!-- Hilangin padding klo dah ada gambar, dan pake w-full aja -->
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

    </div>
    <div class="visible sm:invisible">
        <a class="bg-secondary mb-5 -mt-5 mr-2 float-right font-paragraph text-sm text-white text-center py-1 px-4 mx-auto rounded-full cursor-pointer transition-colors duration-300" href="/User/rekomendasi">
            Lihat Semua
            <img src="/img/components/icon/panah_kanan.png" alt="lihat semua rekomendasi" class="float-right pl-2">
        </a>
    </div>
</div>
<!-- Akhir Rekomendasi -->

<!-- Atribut pada section ini belum ditentukan -->
<!-- Awal Informasi Instansi -->
<div class="w-full my-6 md:mt-5 lg:mt-12 lg:mb-8 lg:px-20 md:px-8 px-2">
    <h3 class="flex-auto font-heading font-bold text-xl text-center md:text-left text-secondary">Informasi Instansi</h3>
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
            if ($tempat_kerja->kota == "") {
                $tkkabkota = "";
            } else {
                $tkkabkota = ", " . $tempat_kerja->kota;
            }
            if ($tempat_kerja->provinsi == "") {
                $tkprovinsi = "";
            } else {
                $tkprovinsi = ", " . $tempat_kerja->provinsi;
            }
            ?>
            <div class="flex items-start">
                <div class="font-bold text-primary w-3/12 md:w-2/12 lg:w-1/12 lg:pb-2">Instansi :</div>
                <div class="w-9/12 md:w-10/12 lg:w-11/12 lg:ml-5"><?= $nama_instansi ?></div>
            </div>
            <div class="flex items-start">
                <div class="font-bold text-primary w-3/12 md:w-2/12 lg:w-1/12 lg:pb-2">Alamat : </div>
                <div class="w-9/12 md:w-10/12 lg:w-11/12 lg:ml-5"><?= $alamat_instansi;
                                                                    echo $tkkabkota;
                                                                    echo $tkprovinsi; ?></div>
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
    <hr class="visible sm:invisible border-primary border-opacity-75 w-4/5 object-center mx-auto mt-5">
</div>
<!-- Akhir Informasi Intsansi -->

<?php if ($alumni->cprestasi == 1 || $status == 'user') { ?>
    <!-- Awal Riwayat Prestasi -->
    <div class="w-full my-0 md:my-0 lg:mb-4 lg:px-20 md:px-8 px-2">
        <div class="flex justify-center text-center md:justify-start mb-2 md:mb-6">
            <h3 class="flex-initial font-heading font-bold text-xl text-secondary text-center md:text-left ">Riwayat Prestasi</h3>
            <?php if ($alumni->cprestasi == 0 && $status == 'user') :
                // gambar mata
                echo $cprestasi;
            endif; ?>
        </div>
        <div class="md:shadow-lg lg:shadow-xl rounded-2xl px-0 py-1 md:px-5 lg:mx-14 lg:p-8 mb-1">
            <?php if ($prestasi == NULL) {
                echo "<p class='text-center'>Riwayat Prestasi tidak ditemukan.</p>";
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
        <hr class="visible sm:invisible border-primary border-opacity-75 w-4/5 object-center mx-auto mt-6">
    </div>
    <!-- Akhir Riwayat Prestasi -->
<?php } ?>

<?php if ($alumni->cpendidikan == 1 || $status == 'user') { ?>
    <!-- Awal Riwayat Pendidikan -->
    <div class="w-full my-6 md:my-0 lg:mb-3 lg:px-20 md:px-8 px-2">
        <div class="flex justify-center md:justify-start">
            <h3 class="flex-initial font-heading font-bold text-xl text-secondary text-center md:text-left ">Riwayat Pendidikan</h3>
            <?php if ($alumni->cpendidikan == 0 && $status == 'user') :
                // gambar mata
                echo $cpendidikan;
            endif; ?>
        </div>
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
    <hr class="visible sm:invisible border-primary border-opacity-75 w-4/5 object-center mx-auto mt-3 mb-3">

<?php } ?>

<!-- Awal Foto Tentang Anda -->
<div class="w-full my-6 md:my-0 lg:px-20 md:px-8 px-2 text-left">
    <!-- <div class="font-heading">
        link ini mengarah ke halaman tampilan semua galeri
        <div class="invisible sm:visible">
            <a class="bg-secondary mb-8 mt-1 mr-2 md:mt-0 float-right font-paragraph text-sm text-white text-center py-1 px-4 mx-auto rounded-full cursor-pointer hover:bg-secondaryhover transition-colors duration-100" href="/User/galeriFoto">
                Lihat Semua Foto
                <img src="/img/components/icon/panah_kanan.png" alt="icon panah kanan" class="float-right pl-2">
            </a>
        </div>
    </div>
    <div class="visible sm:invisible">
        <a class="bg-secondary mb-8 mr-2 sm:mt-0 float-right font-paragraph text-sm text-white text-center py-1 px-4 mx-auto rounded-full cursor-pointer hover:bg-secondaryhover transition-colors duration-300" href="/User/rekomendasi">
            Lihat Semua
            <img src="/img/components/icon/panah_kanan.png" alt="lihat semua foto" class="float-right pl-2">
        </a>
    </div>
    <h3 class="font-heading ml-2 font-bold text-xl text-center md:text-left text-secondary inline-block">Foto Tentang <?= $usernya ?></h3> -->

    <div class="-mt-8 sm:mt-0 md:mb-0 mb-2 md:text-left text-center text-secondary font-semibold">
        <!-- link ini mengarah ke halaman tampilan semua rekomendasi -->
        <div class="invisible sm:visible">
            <a class="bg-secondary mb-8 mt-1 md:mt-0 sm:float-right font-paragraph text-sm text-white text-center py-1 px-4 mx-auto rounded-full cursor-pointer hover:bg-secondaryhover transition-colors duration-100" href="/User/galeriFoto">
                Lihat Semua Foto
                <img src="/img/components/icon/panah_kanan.png" alt="icon panah kanan" class="float-right pl-2">
            </a>
        </div>
        <h2 class="font-heading -mb-2 -mt-1 sm:mt-0 sm:mb-6 ml-2 text-xl inline-block">Foto Tentang <?= $usernya ?></h2>
    </div>

    <div class="md:shadow-lg lg:shadow-xl rounded-2xl px-3 py-3 md:px-7 md:py-5 lg:mx-14 lg:py-6 lg:px-11 md:mt-0">
        <?php for ($x = 0; $x < 6; $x++) : ?>
            <!-- 1 gambar -->
            <!-- <a href="#img-1" id="img-1">
                        <div class="rounded-3xl m-2 relative hover:shadow-xl transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-105 cursor-pointer">
                            <img id="slide" class="object-cover w-96 h-48 object-fit rounded-3xl mx-auto" src="/img/components/alumni.jpg" alt="" />
                        </div>
                    </a>

                    <div class="fixed overflow-auto top-0 bottom-0 right-0 left-0 z-40 bg-black bg-opacity-80 text-center font-paragraph hidden" id="img-1">
                        <div class="m-auto duration-700 transition-all bg-gray bg-opacity-0 w-11/12 sm:w-9/12 md:w-8/12 lg:w-7/12">
                            <!- Awal Tombol Laporkan foto ->
                    <button onClick="laporkanFoto()"><img src="<= base_url() ?>/img/components/icon/danger-sign.png" alt="" class="absolute top-3 right-3"></button>
                    <!- Akhir Tombol Laporkan foto --

                    <div class="flex flex-col justify-center items-center">
                        <div class="flex flex-row justify-center items-center gap-x-4 mt-8 mb-6">
                            <a href="#">
                                <img src="<= base_url() ?>/img/components/icon/left-on.png" alt="" class="" onclick="prev()" id="prev">
                            </a>
                            <img src="<= base_url() ?>/img/components/alumni.jpg" alt="" class="slider-img w-3/4">
                            <a href="#">
                                <img src="<= base_url() ?>/img/components/icon/right-on.png" alt="" class="" onclick="next()" id="next">
                            </a>
                        </div>

                        <!- Awal Caption --
                        <div class="text-white w-3/4 h-3/4 mx-2 text-base">
                            <!- <p class="mb-2">Oleh : Si Fulan (59)</p> --
                            <p class="mb-2">Oleh : Fulan</p>
                            <!- <p class="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam impedit optio praesentium soluta quasi. Voluptatibus molestias sequi inventore odit voluptas pariatur a ut, totam obcaecati accusamus iure, labore dolorum dolor.</p> --
                            <p class="mt-4">Caption</p>
                            <div class="mt-5 text-gray-400 text-center">
                                <span> <img src="<= base_url() ?>/img/components/icon/line.png" alt="" class="inline mr-1"> bersama </span> <span class=" text-white">Nama1 </span> <span> dan</span> <span class="text-white"> 10 lainnya</span> <span><img src="<= base_url() ?>/img/components/icon/down.png" alt="" class="daftarTag inline ml-1 rounded-full w-4 hover:bg-secondary cursor-pointer" onclick="daftarTag()">
                                </span>
                                <!- Awal Tampilan Daftar Tag --
                                <div class="tampilTag hidden relative" id="tampilTag">
                                    <div class="static mt-2 p-2 rounded-2xl overflow-y-auto h-64 ml-80 bg-primary w-1/4 position-right text-white">
                                        <ul class="bg-primary">
                                            <php for ($a = 0; $a < 12; $a++) : ?>
                                                <li>Nama</li>
                                            <php endfor ?>
                                        </ul>
                                    </div>
                                </div>
                                <!- Akhir Tampilan Daftar Tag --
                            </div>

                        </div>
                        <!- Akhir Caption --


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

        <?php if ($foto == null) : ?>
            <p class="text-center px-3 lg:px-5 mt-1 md:mt-0 pb-2 lg:py-4"> Belum terdapat foto yang berhubungan dengan <?= $usernya ?>.
            </p>
            <!-- <tr>
                <td class="text-sm text-center border-b-2 border-gray-200 px-3 lg:px-5 py-2 md:py-3 lg:py-4">Belum terdapat foto yang berhubungan dengan anda.</td>
            </tr> -->
        <?php else : ?>
            <div class="holder mx-auto w-11/12 md:w-full lg:w-11/12 grid grid-cols-2 md:grid-cols-3 gap-x-4 md:gap-x-0 lg:gap-x-8">
                <?php for ($i = 0; $i < 6; $i++) :
                    if (isset($foto[$i])) : ?>
                        <!-- 1 gambar -->
                        <a href="#<?= $foto[$i]['id_foto']; ?>" id="foto<?= $foto[$i]['id_foto']; ?>" data-toggle="modal" data-target="#popUp<?= $foto[$i]['id_foto']; ?>">

                            <!-- <a href="#<?= $foto[$i]['id_foto']; ?>" id="foto<?= $foto[$i]['id_foto']; ?>"> -->
                            <div class="rounded-3xl m-2 relative hover:shadow-xl transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-105 cursor-pointer">
                                <img id="slide" class="object-cover w-96 h-48 object-fit rounded-3xl mx-auto" src="<?= base_url() ?>/img/galeri/<?= $foto[$i]['nama_file']; ?>" alt="foto yang ditandai" />
                            </div>
                        </a>
                        <!-- <php endfor; ?> -->

                        <div class="modal popUpFoto fixed overflow-auto top-0 bottom-0 right-0 left-0 z-40 bg-black bg-opacity-80 text-center font-paragraph hidden" id="popUp<?= $foto[$i]['id_foto']; ?>">
                            <div class="m-auto duration-700 transition-all bg-gray bg-opacity-0 w-11/12 sm:w-9/12 md:w-8/12 lg:w-7/12">
                                <svg xmlns="http://www.w3.org/2000/svg" class="absolute h-8 w-8 top-3 left-3 text-gray-100 cursor-pointer" viewBox="0 0 20 20" fill="currentColor" data-dismiss="modal">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                </svg>
                                <!-- Awal Tombol Laporkan foto -->
                                <button onClick="laporkanFoto(<?= $foto[$i]['id_foto']; ?>)"><img src="<?= base_url() ?>/img/components/icon/danger-sign.png" alt="laporkan foto" class="absolute top-3 right-3"></button>
                                <!-- Akhir Tombol Laporkan foto -->

                                <div class="relative">
                                    <a>
                                        <img src="<?= base_url() ?>/img/components/icon/left-on.png" alt="foto sebelumnya" class="prev fixed cursor-pointer w-6" id="prev">
                                    </a>
                                    <a>
                                        <img src="<?= base_url() ?>/img/components/icon/right-on.png" alt="foto selanjutnya" class="next fixed cursor-pointer w-6 sm:right-10" id="next">
                                    </a>
                                    <div class="flex flex-col justify-center items-center">
                                        <div class="flex flex-row justify-center items-center gap-x-4 mt-8 mb-6">
                                            <img src="<?= base_url() ?>/img/galeri/<?= $foto[$i]['nama_file']; ?>" alt="<?= $foto[$i]['nama_file']; ?>" class="slider-img w-3/4" id="img-<?= $foto[$i]['id_foto']; ?>">

                                            <!-- <a href="#<?= $foto[$i]['id_foto'] - 1; ?>">
                                                    <img src="<?= base_url() ?>/img/components/icon/left-on.png" alt="foto sebelumnya" class="" onclick="prev()" id="prev">
                                                </a>
                                                <img src="<?= base_url() ?>/img/galeri/<?= $foto[$i]['nama_file']; ?>" alt="<?= $foto[$i]['nama_file']; ?>" class="slider-img w-3/4">
                                                <a href="#<?= $foto[$i]['id_foto'] + 1; ?>">
                                                    <img src="<?= base_url() ?>/img/components/icon/right-on.png" alt="foto berikutnya" class="" onclick="next()" id="next">
                                                </a> -->
                                        </div>

                                        <!-- Awal Caption -->
                                        <div class="text-white w-3/4 h-3/4 mx-2 text-base">
                                            <!-- <p class="mb-2">Oleh : Si Fulan (59)</p> -->
                                            <p class="mb-2">Oleh : <a href="/User/profilAlumni/<?= $foto[$i]['id_alumni'] ?>"><?= $foto[$i]['nama'] ?></a></p>
                                            <!-- <p class="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam impedit optio praesentium soluta quasi. Voluptatibus molestias sequi inventore odit voluptas pariatur a ut, totam obcaecati accusamus iure, labore dolorum dolor.</p> -->
                                            <p class="mt-4 pb-6"><?= $foto[$i]['caption'] ?></p>
                                            <div class="mt-5 text-gray-400 text-center pb-10">
                                                <?php if (count($foto[$i]['tag_name']) > 2) : ?>
                                                    <span> <img src="<?= base_url() ?>/img/components/icon/line.png" alt="icon tag foto" class="inline mr-1"> bersama </span> <span class=" text-white"><a href="/User/profilAlumni/<?= $foto[$i]['tag_name'][0]['id_alumni'] ?>"><?= $foto[$i]['tag_name'][0]['nama'] ?></a> </span> <span> dan</span> <span class="text-white"> <?= count($foto[$i]['tag_name']) - 1 ?> lainnya</span> <span><img src="<?= base_url() ?>/img/components/icon/down.png" alt="daftar tag" class="daftarTag inline ml-1 rounded-full w-4 hover:bg-secondary cursor-pointer" onclick="daftarTag()">
                                                    </span>
                                                    <!-- Awal Tampilan Daftar Tag -->
                                                    <div class="tampilTag hidden relative" id="tampilTag">
                                                        <div class="z-50 static mt-2 mb-8 p-2 rounded-2xl overflow-y-auto ml-64 sm:ml-64 md:ml-80 lg:ml-96 bg-primary w-32 md:w-36 position-right text-white text-xs md:text-sm">
                                                            <ul class="bg-primary">
                                                                <?php for ($n = 1; $n < count($foto[$i]['tag_name']); $n++) : ?>
                                                                    <a href="/User/profilAlumni/<?= $foto[$i]['tag_name'][$n]['id_alumni'] ?>">
                                                                        <li><?= $foto[$i]['tag_name'][$n]['nama'] ?></li>
                                                                    </a>
                                                                    <hr>
                                                                <?php endfor ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                <?php elseif (count($foto[$i]['tag_name']) == 2) : ?>
                                                    <div class="pb-2">
                                                        <span> <img src="<?= base_url() ?>/img/components/icon/line.png" alt="icon tag foto" class="inline mr-1"> bersama </span> <span class=" text-white"><a href="/User/profilAlumni/<?= $foto[$i]['tag_name'][0]['id_alumni'] ?>"><?= $foto[$i]['tag_name'][0]['nama'] ?></a> </span> <span> dan</span> <span class=" text-white"><a href="/User/profilAlumni/<?= $foto[$i]['tag_name'][1]['id_alumni'] ?>"><?= $foto[$i]['tag_name'][1]['nama'] ?></a></span>
                                                        </span>
                                                    </div>
                                                <?php elseif (count($foto[$i]['tag_name']) < 1) : ?>
                                                    <div class="pb-2">
                                                        <span> <img src="<?= base_url() ?>/img/components/icon/line.png" alt="icon tag foto" class="inline mr-1"> bersama </span> <span class=" text-white"><a href="/User/profilAlumni/<?= $foto[$i]['tag_name'][0]['id_alumni'] ?>"><?= $foto[$i]['tag_name'][0]['nama'] ?></a> </span>
                                                        </span>
                                                    </div>
                                                <?php else : ?>
                                                <?php endif ?>
                                                <!-- Akhir Tampilan Daftar Tag -->
                                            </div>

                                        </div>
                                        <!-- Akhir Caption -->


                                    </div>
                                </div>

                                <div class="pageFoto fixed text-white text-center text-base">
                                    <p class="bg-secondary rounded-full text-center py-1 px-2">
                                        <?= ($i + 1) ?> dari <?= $count ?></p>
                                </div>
                            </div>
                        </div>
                        <script>
                            // $('#foto<?= $foto[$i]['id_foto']; ?>').click(function() {
                            //     var modal = document.getElementById('<?= $foto[$i]['id_foto']; ?>')
                            //     $('#<?= $foto[$i]['id_foto']; ?>').removeClass('hidden')
                            //     $(window).click(function(e) {
                            //         if (e.target === modal) {
                            //             setTimeout(function() {
                            //                 $('#<?= $foto[$i]['id_foto']; ?>').addClass('hidden')
                            //             }, 100);
                            //         }
                            //     });

                            // $('.closeFormUnggahFoto').click(function() {
                            //     setTimeout(function() {
                            //         $('#formUnggahFoto').addClass('hidden')
                            //     }, 100);
                            // });
                            // })
                        </script>
                <?php else :
                        break;
                    endif;
                endfor; ?>
            </div>
        <?php endif; ?>
        <!-- Awal Navigasi -->
        <!-- <div class="flex justify-center md:justify-end items-center mx-8 p-2 text-secondary font-paragraph">
            <a href="" class="p-1 rounded-full w-7 transform hover:scale-110">
                <img src="/img/components/icon/left-on.png" alt="">
            </a>
            <a href="" class="p-1 hover:text-primary">
                1
            </a>
            <a href="" class="p-1 hover:text-primary">
                2
            </a>
            <a href="" class="p-1 hover:text-primary">
                ..
            </a>
            <a href="" class="p-1 hover:text-primary">
                45
            </a>
            <a href="" class="p-1 rounded-full w-7 transform hover:scale-110">
                <img src="/img/components/icon/right-on.png" alt=""></a>
        </div> -->
        <!-- Akhir Navigasi -->

    </div>

</div>
<div class="visible sm:invisible">
    <a class="bg-secondary mb-2 -mt-5 mr-2 float-right font-paragraph text-sm text-white text-center py-1 px-4 mx-auto rounded-full cursor-pointer transition-colors duration-300" href="/User/galeriFoto">
        Lihat Semua
        <img src=" /img/components/icon/panah_kanan.png" alt="lihat semua rekomendasi" class="float-right pl-2">
    </a>
</div>
<hr class="invisible border-primary border-opacity-75 w-4/5 object-center mx-auto mb-8 lg:mb-12">
</div>
<!-- Akhir Foto Tentang Anda -->

<script>
    $("div[id^='popUp']").each(function() {

        var currentModal = $(this);

        //click next
        currentModal.find('.next').click(function() {
            currentModal.modal('hide');
            currentModal.closest("div[id^='popUp']").nextAll("div[id^='popUp']").first().modal('show');
        });

        //click prev
        currentModal.find('.prev').click(function() {
            currentModal.modal('hide');
            currentModal.closest("div[id^='popUp']").prevAll("div[id^='popUp']").first().modal('show');
        });

    });

    // var images = [];
    // <?php foreach ($foto as $foto) : ?>
    //     images.push('<?= $foto['nama_file'] ?>');
    // <?php endforeach ?>
    // var i = 0;

    // function clicked(n) {
    //     i = n;
    // }

    // function prev(id) {
    //     if (i <= 0) i = images.length;
    //     i--;
    //     return setImg(id);
    // }

    // function next(id) {
    //     if (i >= images.length - 1) i = -1;
    //     i++;
    //     return setImg(id);
    // }

    // function setImg(id) {
    //     get = document.getElementById(id);
    //     return get.setAttribute('src', '<?= base_url() ?>/img/galeri/' + images[i]);
    // }

    // $('.closePopUpFoto').click(function() {
    //     setTimeout(function() {
    //         $('.popUpFoto').addClass('hidden')
    //     }, 100);
    // })
</script>
<?= $this->endSection(); ?>