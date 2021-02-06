<?= $this->extend("websia/layoutWebsia/templateBerandaLogin.php"); ?>

<?= $this->section('content'); ?>


<!-- Awal Rekomendasi -->
<div class="my-8 pt-0 lg:px-20 md:px-8 px-2">
    <div class="static md:w-full md:px-2 md:py-8 pb-4">
        <h2 class="font-heading font-semibold text-xl mb-8">Alumni yang mungkin Anda kenal</h2>
        <div class="holder mx-auto w-10/12 grid sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-x-8 ">
            <?php for ($x = 0; $x < 12; $x++) : ?>
                <!-- 1 card -->
                <div class="each rounded-3xl m-2 shadow-lg border-gray-800 bg-white relative">
                    <a href="/home/profil" target="_new">
                        <img class="w-24 mx-auto py-4" src="/img/avatar.png" alt="" /> <!-- Hilangin padding klo dah ada gambar, dan pake w-full aja -->
                        <!-- <div class="font-paragraph absolute top-0 right-0 bg-secondary m-3 text-white p-1 px-2 text-xs font-bold rounded">59</div> -->
                        <div class="desc p-2">
                            <span class="title font-heading font-bold text-primary block cursor-pointer text-center">Nama Lengkap</span>
                            <span class="description font-paragraph text-primary text-center text-base block pt-2 border-gray-400 mb-0">Atribut</span>
                            <span class="description font-paragraph text-primary text-center text-base block py-0 border-gray-400 mb-0">Atribut</span>
                            <span class="description font-paragraph text-primary text-center text-base block pb-0 border-gray-400 mb-2">Atribut</span>
                            <!-- <a class="block bg-gray-300 font-paragraph text-primary text-sm text-center py-1 px-3 my-4 mx-auto rounded-lg w-full cursor-pointer border-gray-300 hover:bg-gray-400 hover:border-opacity-70 transition-colors duration-300" href="/profil">Lihat Profil</a> -->
                        </div>
                    </a>
                </div>
            <?php endfor; ?>
        </div>
        <div class="md:mb-6 mb-2 mt-8 text-center md:text-left font-semibold">
            <a class="float-right bg-secondary font-paragraph text-sm text-white text-center py-2 px-3 mx-auto rounded-full cursor-pointer border-secondary border-2 hover:text-secondary hover:bg-white hover:border-opacity-70 transition-colors duration-300" href="#">
                Selengkapnya
                <img src="/img/icon/panah_kanan.png" alt="" class="float-right pl-2">
            </a>
            <a class="float-left bg-secondary font-paragraph text-sm text-white text-center py-2 px-3 mx-auto rounded-full cursor-pointer border-secondary border-2 hover:text-secondary hover:bg-white hover:border-opacity-70 transition-colors duration-300" href="/home/profil">
                <img src="/img/icon/panah_kiri.png" alt="" class="float-left pr-2">
                Kembali
            </a>
        </div>
    </div>
</div>
<!-- Akhir Rekomendasi -->

<?= $this->endSection(); ?>