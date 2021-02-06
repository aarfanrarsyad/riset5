<?php
// Kalo mau akses carousel, di controller websia ganti variabel login = 'sudah'
//  Kalo mau akses jumbotron, di controller websia ganti variabel login = 'belum'
if ($login == 'belum') {
    $urlTemplate = 'websia/layoutWebsia/templateBeranda.php';
    $urlCarouselorJumbotron = 'websia/kontenWebsia/halamanUtama/jumbotron.php';
} else if ($login == 'sudah') {
    $urlTemplate = 'websia/layoutWebsia/templateBerandaLogin.php';
    $urlCarouselorJumbotron = 'websia/kontenWebsia/halamanUtama/carousel.php';
}
?>

<?= $this->extend($urlTemplate); ?>

<?= $this->section('content'); ?>


<script type="text/javascript" src="/js/leaflet.js"></script>
<!-- Awal Carousel -->
<?= $this->include($urlCarouselorJumbotron) ?>
<!-- Akhir Carousel -->

<!-- Awal Sejarah Singkat HAISTIS -->
</div>
<div class="flex md:flex-row flex-col-reverse my-8 pt-0 lg:px-20 md:px-8 px-2">
    <div class="md:w-2/3 block md:px-2 md:py-8 pb-4">
        <div class="md:mb-6 mb-2 text-xl text-center md:text-left text-black font-heading font-semibold">HASIL DARI PROYEK PKL RISET 5</div>
        <!-- awal keterangan hasil proyek pkl riset 5 -->
        <p class="text-primary text-justify md:text-left font-paragraph">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat repellendus omnis, iure numquam, quam quas, at fugit fuga voluptatibus ipsum nostrum doloremque? Harum cum quos ea qui dicta blanditiis laborum!
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat repellendus omnis, iure numquam, quam quas, at fugit fuga voluptatibus ipsum nostrum doloremque? Harum cum quos ea qui dicta blanditiis laborum!
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat repellendus omnis, iure numquam, quam quas, at fugit fuga voluptatibus ipsum nostrum doloremque? Harum cum quos ea qui dicta blanditiis laborum!
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat repellendus omnis, iure numquam, quam quas, at fugit fuga voluptatibus ipsum nostrum doloremque? Harum cum quos ea qui dicta blanditiis laborum!
        </p>
        <!-- akhir keterangan hasil proyek pkl riset 5 -->
    </div>

    <div class="md:w-1/3 w-full md:flex md:items-stretch bg-contain bg-no-repeat bg-right" style="background-image: url(/img/segitiga2.png)">
        <img class="lg:w-1/2 md:w-2/3 w-1/3 mb-2 md:mb-0  mx-auto md:self-center" src="/img/logo PKL.png" alt="" data-aos="fade-left">
    </div>
</div>
<!-- Akhir Sejarah Singkat HAISTIS -->

<!-- Awal Sejarah Singkat HAISTIS -->
<div class="flex md:flex-row flex-col bg-primary my-8 pt-0 lg:px-20 md:px-8 px-2">
    <div class="md:w-1/3 w-full md:flex md:items-stretch bg-contain bg-no-repeat bg-left" style="background-image: url(/img/segitiga1.png)">
        <img class="lg:w-2/3 md:w-11/12 w-10/12  mx-auto md:self-center" src="/img/logo_haisstis1.png" alt="" data-aos="fade-right">
    </div>

    <div class="md:w-2/3 block md:px-2 md:py-8 pb-4 ">
        <div class="md:mb-6 mb-2 text-xl text-center md:text-left text-secondary font-heading font-semibold">SEJARAH SINGKAT HAISTIS</div>
        <!-- awal keterangan hasil proyek pkl riset 5 -->
        <p class="text-white text-justify md:text-left font-paragraph">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat repellendus omnis, iure numquam, quam quas, at fugit fuga voluptatibus ipsum nostrum doloremque? Harum cum quos ea qui dicta blanditiis laborum!
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat repellendus omnis, iure numquam, quam quas, at fugit fuga voluptatibus ipsum nostrum doloremque? Harum cum quos ea qui dicta blanditiis laborum!
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat repellendus omnis, iure numquam, quam quas, at fugit fuga voluptatibus ipsum nostrum doloremque? Harum cum quos ea qui dicta blanditiis laborum!
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat repellendus omnis, iure numquam, quam quas, at fugit fuga voluptatibus ipsum nostrum doloremque? Harum cum quos ea qui dicta blanditiis laborum!
        </p>
        <!-- akhir keterangan hasil proyek pkl riset 5 -->
    </div>
</div>
<!-- Akhir Sejarah Singkat HAISTIS -->

<!-- Awal Jumlah Alumni AIS/STIS/Polstat STIS -->
<div class="w-full my-8 lg:px-20 md:px-8 px-2">
    <div class="w-full md:mb-6 mb-4 text-center text-xl text-black font-heading font-bold">ALUMNI AIS/STIS/POLSTAT STIS</div>

    <div class="flex flex-col items-center md:flex-row md:justify-around w-full mt-4">
        <!-- Awal Jumlah Alumni AIS/STIS/Polstat STIS I -->
        <div class="w-min mb-2 md:mb-0 py-6 px-6 bg-contain bg-no-repeat bg-center" style="background-image: url(/img/bulat.png)" data-aos="zoom-in">
            <div class="text-primary md:text-6xl text-3xl font-bold md:mb-4 mb-2 font-heading">38.578</div>
            <div class="text-gray-500 text-sm font-semibold text-center font-paragraph">Jumlah alumni</div>
        </div>
        <!-- Akhir Jumlah Alumni AIS/STIS/Polstat STIS I-->

        <!-- Awal Jumlah Alumni AIS/STIS/Polstat STIS II-->
        <div class="w-min mb-2 md:mb-0 py-6 px-6 bg-contain bg-no-repeat bg-center" style="background-image: url(/img/bulat.png)" data-aos="zoom-in">
            <div class="text-primary md:text-6xl text-3xl font-bold md:mb-4 mb-2 font-heading">38.578</div>
            <div class="text-gray-500 text-sm font-semibold text-center font-paragraph">Jumlah alumni</div>
        </div>
        <!-- Akhir Jumlah Alumni AIS/STIS/Polstat STIS II-->

        <!-- Awal Jumlah Alumni AIS/STIS/Polstat STIS III-->
        <div class="w-min mb-2 md:mb-0 py-6 px-6 bg-contain bg-no-repeat bg-center" style="background-image: url(/img/bulat.png)" data-aos="zoom-in">
            <div class="text-primary md:text-6xl text-3xl font-bold md:mb-4 mb-2 font-heading">38.578</div>
            <div class="text-gray-500 text-sm font-semibold text-center font-paragraph">Jumlah alumni</div>
        </div>
        <!-- Akhir Jumlah Alumni AIS/STIS/Polstat STIS III-->

    </div>
</div>
<!-- Akhir Jumlah Alumni AIS/STIS/Polstat STIS -->

<!-- Awal Peta Sebaran ALUMNI -->
<div class="bg-primary my-8 md:py-8 py-4 lg:px-20 md:px-8 px-2">
    <div class="w-full md:mb-6 mb-4 text-center text-xl text-secondary font-bold font-heading">PETA SEBARAN ALUMNI</div>
    <!-- awal gambar peta alumni -->
    <div id="mapid" class="bg-primary" style="height: 26rem;" data-aos="zoom-in"></div>
    <!-- akhir gambar peta alumni -->
</div>
<!-- Akhir Peta Sebaran ALUMNI -->

<!-- awal card -->
<div class="w-full my-8 lg:px-20 md:px-8 px-2">
    <div class="w-full md:mb-6 mb-4 text-center text-xl text-black font-bold font-heading">BERITA TERBARU</div>

    <div class="flex flex-col md:flex-row md:justify-between w-full mt-4">

        <!-- awal card I-->
        <div class="w-full mb-6 lg:w-80 md:w-60 w-full md:border-0 border-b-2 border-gray-300">
            <a href="#" class="mb-4">
                <img class="lg:w-80 lg:h-60 md:w-60 md:h-44" src="/img/sampel.jpeg">
            </a>
            <div class="py-4">
                <!-- Awal judul berita -->
                <div>
                    <a href="#" class="text-black text-xl font-heading font-semibold hover:font-bold">
                        Pelatihan Kepegawaian di Masa Pandemi
                    </a>
                </div>
                <!-- akhir judul berita -->

                <!-- awal tanggal berita -->
                <div class="text-gray-700 text-sm font-paragraph font-semibold ">1 Januari 2020</div>
                <!-- akhir tanggal berita -->

                <!-- awal isi berita -->
                <p class="text-gray-600 break-words font-paragraph text-justify leading-none mt-4">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo voluptatum quibusdam nemo, incidunt dolorem voluptatem, rem eligendi beatae numquam a rerum debitis omnis ratione tempora, quisquam ullam id aperiam quam.
                </p>
                <!-- akhir isi berita -->

            </div>
        </div>
        <!-- akhir card I-->

        <!-- awal card II-->
        <div class="w-full mb-6 lg:w-80 md:w-60 w-full md:border-0 border-b-2 border-gray-300">
            <a href="#" class="mb-4">
                <img class="lg:w-80 lg:h-60 md:w-60 md:h-44" src="/img/sampel.jpeg">
            </a>
            <div class="py-4">
                <!-- Awal judul berita -->
                <div>
                    <a href="#" class="text-black text-xl font-heading font-semibold hover:font-bold">
                        Pelatihan Kepegawaian di Masa Pandemi
                    </a>
                </div>
                <!-- akhir judul berita -->

                <!-- awal tanggal berita -->
                <div class="text-gray-700 text-sm font-paragraph font-semibold ">1 Januari 2020</div>
                <!-- akhir tanggal berita -->

                <!-- awal isi berita -->
                <p class="text-gray-600 break-words font-paragraph text-justify leading-none mt-4">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo voluptatum quibusdam nemo, incidunt dolorem voluptatem, rem eligendi beatae numquam a rerum debitis omnis ratione tempora, quisquam ullam id aperiam quam.
                </p>
                <!-- akhir isi berita -->

            </div>
        </div>
        <!-- akhir card II-->

        <!-- awal card III-->
        <div class="w-full mb-6 lg:w-80 md:w-60 w-full md:border-0 border-b-2 border-gray-300">
            <a href="#" class="mb-4">
                <img class="lg:w-80 lg:h-60 md:w-60 md:h-44" src="/img/sampel.jpeg">
            </a>
            <div class="py-4">
                <!-- Awal judul berita -->
                <div>
                    <a href="#" class="text-black text-xl font-heading font-semibold hover:font-bold">
                        Pelatihan Kepegawaian di Masa Pandemi
                    </a>
                </div>
                <!-- akhir judul berita -->

                <!-- awal tanggal berita -->
                <div class="text-gray-700 text-sm font-paragraph font-semibold ">1 Januari 2020</div>
                <!-- akhir tanggal berita -->

                <!-- awal isi berita -->
                <p class="text-gray-600 break-words font-paragraph text-justify leading-none mt-4">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo voluptatum quibusdam nemo, incidunt dolorem voluptatem, rem eligendi beatae numquam a rerum debitis omnis ratione tempora, quisquam ullam id aperiam quam.
                </p>
                <!-- akhir isi berita -->

            </div>
            <!-- akhir card III-->

        </div>

    </div>

    <!-- awal tombol "Lihat Berita Selanjutnya" -->
    <div class="flex w-full justify-end">
        <div class="text-primary font-paragraph my-auto"><a href="">Lihat Berita Selanjutnya</a> </div>
        <div>
            <a href="">
                <svg class="w-6 h-6 font-bold text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>
    </div>
    <!-- akhir tombol "Lihat Berita Selanjutnya" -->

</div>
<!-- akhir card -->

<script type="text/javascript" src="/js/leaflet.ajax.js"></script>
<script type="text/javascript" src="/js/add.js"></script>
<?= $this->endSection(); ?>