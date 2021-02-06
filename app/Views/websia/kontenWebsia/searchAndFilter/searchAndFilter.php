<?= $this->extend('websia/layoutWebsia/templateBerandaLogin.php'); ?>

<?= $this->section('content'); ?>
<div class="flex md:flex-row flex-col justify-around lg:px-20 md:px-8 px-2 my-8">
    <form method="GET" action="/Home/SearchAndFilter" class="form-group">
    <input type="text" name="cari" placeholder="Masukkan kata kunci" >
	<button class="btn btn-outline-secondary" type="Submit" name="filter" value="Go" >GO</button>
</div>
<!--FILTER -->

<div class="flex md:flex-row flex-col justify-around lg:px-20 md:px-8 px-2 my-8">
    <div class="flex flex-col mb-4 md:mb-0 ">

        <!-- awal checkbox "Filter Alumni" -->
        <div class=" flex  md:flex-row items-center gap-x-2 mx-auto">
            <input type="checkbox" name="filterAlumni" id="filterAlumni" class="cursor-pointer my-auto">
            <label for="filterAlumni" id="namaFilterAlumni" class="text-sm text-gray-500 font-heading font-medium cursor-pointer">Filter Alumni</label>
        </div>
        <!-- akhir checkbox "Filter Alumni" -->

        <!-- awal select "Filter Berdasarkan" -->
        <!-- tampilan filternya kurang puas -->
        <div class="flex flex-col hidden md:mt-4 mt-2 mx-auto" id="pilihanFilterAlumni">
        <div class="input-group">
  <span class="input-group-text">Angkatan</span>
  <input type="text" class="form-control" name="min" placeholder="min <?= $min_angkatan ?>">
  <input type="text" class="form-control" name="max" placeholder="max <?= $max_angkatan ?>">
</div>

        </div>
        <!-- awal select "Filter Berdasarkan" -->

    </div>

    <div class="flex flex-col">

        <!-- awal checkbox "Filter Tahun Berita" -->
        <div class="flex items-center gap-x-2 mx-auto">
            <input type="checkbox" name="filterBerita" id="filterBerita" class="cursor-pointer">
            <label for="filterBerita" class="text-sm text-gray-500 font-heading font-medium cursor-pointer">Filter Tahun Berita</label>
        </div>
        <!-- akhir checkbox "Filter Tahun berita" -->

        <div class="flex gap-x-2 mx-auto mt-4 hidden" id="filterTahunBerita">

            <!-- awal kalender Filter Tahun Berita "Awal" -->
            <div class="flex flex-col" id="pilihanFilterAwal">
                <button class="flex justify-between md:w-36 w-32 py-1 px-3 mx-auto text-gray-500 text-sm font-paragraph font-medium border-2 border-gray-500 rounded-lg focus:outline-none focus:border-black focus:text-black" id="dropdownFilterAwal">
                    <div id="tahunAwal"> Awal</div>
                    <svg class=" w-4 h-4 my-auto font-medium text-gray-500" id="tombolUpFilterAwal" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                    <svg class="w-4 h-4 my-auto font-medium text-gray-500 hidden" id="tombolDownFilterAwal" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                    </svg>
                </button>

                <div class="py-1 px-3 mt-2 grid grid-cols-4 gap-1 font-heading font-semibold rounded-lg border border-gray-500 hidden" id="listFilterTahunAwal">
                    <div class="flex justify-center">
                        <svg class="w-3 h-3 cursor-pointer" fill="none" stroke="currentColor" id="perviousAwal" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7"></path>
                        </svg>
                    </div>
                    <div class="col-span-2"></div>
                    <div class="flex justify-center">
                        <svg class="w-3 h-3 cursor-pointer" fill="none" stroke=" currentColor" id="nextAwal" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7"></path>
                        </svg>
                    </div>
                    <?php for ($x = 0; $x < 12; $x++) : ?>
                        <div class="text-xs hover:bg-gray-300 text-center rounded border-b border-gray-300 cursor-pointer" id="tahunKalenderAwal"></div>
                    <?php endfor; ?>
                </div>

            </div>
            <!-- akhir kalender Filter Tahun Berita "Awal" -->

            <!-- awal kalender Filter Tahun Berita "Akhir" -->
            <div class="flex flex-col" id="pilihanFilterAkhir">
                <button class="flex justify-between md:w-36 w-32 mx-auto py-1 px-3 text-gray-500 text-sm font-paragraph font-medium border-2 border-gray-500 rounded-lg focus:outline-none focus:border-black focus:text-black" id="dropdownFilterAkhir">
                    <div id="tahunAkhir"> Akhir</div>
                    <svg class=" w-4 h-4 my-auto font-medium text-gray-500" id="tombolUpFilterAkhir" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                    <svg class="w-4 h-4 my-auto font-medium text-gray-500 hidden" id="tombolDownFilterAkhir" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                    </svg>
                </button>

                <div class="py-1 px-3 mt-2 grid grid-cols-4 gap-1 font-heading font-semibold rounded-lg border border-gray-500 hidden" id="listFilterTahunAkhir">
                    <div class="flex justify-center">
                        <svg class="w-3 h-3 cursor-pointer" fill="none" stroke="currentColor" id="perviousAkhir" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7"></path>
                        </svg>
                    </div>
                    <div class="col-span-2"></div>
                    <div class="flex justify-center">
                        <svg class="w-3 h-3 cursor-pointer" fill="none" stroke=" currentColor" id="nextAkhir" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7"></path>
                        </svg>
                    </div>
                    <?php for ($x = 0; $x < 12; $x++) : ?>
                        <div class="text-xs hover:bg-gray-300 text-center rounded border-b border-gray-300 cursor-pointer" id="tahunKalenderAkhir"></div>
                    <?php endfor; ?>
                </div>

            </div>
            <!-- akhir kalender Filter Tahun Berita "Akhir" -->

        </div>
    </div>
</div>
<!-- END FILTER -->

<!-- HASIL PENCARIAN ALUMNI -->
<div class="bg-primary w-full lg:px-20 md:px-8 px-2 my-8 py-4">

    <!-- awal jumlah hasil pencarian alumni  -->
    <div class="text-white mb-6 font-paragraph font-extralightt text-sm text-center">
    <!-- jumlah pencarian -->
    <?= $jumlah; ?>
    </div>
    <!-- akhir jumlah hasil pencarian alumni  -->

    <div class="w-full grid md:grid-cols-3 grid-cols-2 gap-x-2 gap-y-4">
        <!-- awal card hasil pencarian alumni -->
        <!-- Hasil pencariannya bisa diperbaiki ndak? -->
        <?php
				foreach ($alumni as $row) : ?>
            <div class="flex justify-center">
                <div class="rounded-xl bg-white px-4 py-3 flex md:flex-row flex-col justify-between md:gap-x-2">
                    <div class="flex items-center">
                        <img src="/img/avatar.png" class="lg:w-20 w-16 mx-auto" alt="">
                    </div>
                    <div class="flex items-center">
                        <div>
                            <h2 class="font-heading text-primary lg:text-lg md:text-base text-sm font-heading font-semibold"><?= $row['nama']; ?></h2>
                            <h3 class="font-paragraph text-primary md:text-sm text-xs font-paragraph"><?= $row['nim']; ?></h3>
                            <h3 class="font-paragraph text-primary md:text-sm text-xs font-paragraph"><?= $row['angkatan']; ?></h3>
                        </div>
                    </div>
                </div>
            </div>
            <?php
				endforeach; ?>
        <!-- akhir card hasil pencarian alumni -->
    </div>
    <!-- Awal pagination -->
    <!-- cara membuat paginition gimana ya? -->
    <?= $pager->Links() ?>
    <!-- Akhir pagination -->
                

    <!-- awal tulisan "Selengkapnya" di hasil pencarian -->
    <div class="flex justify-end mt-6">
        <div class="flex bg-secondary text-white rounded-full md:py-2 py-1 md:px-3 px-2 items-center gap-x-2 cursor-pointer md:text-sm text-xs">
            Selengkapnya
            <img src="/img/right-off.png" class="md:w-4 md:h-4 w-3 h-3" alt="">
        </div>
    </div>  
    <!-- akhir tulisan "Selengkapnya" di hasil pencarian -->
</div>

<!-- AKHIR HASIL PENCARIAN ALUMNI -->

<!-- HASIL PENCARIAN BERITA -->
<div class="w-full lg:px-20 md:px-8 px-2 my-8 py-4">
    <div class="text-primary mb-2 font-paragraph font-extralightt text-sm text-center">
        Sekitar 28.899 hasil pencarian alumni
    </div>
    <hr class="my-2 border-2 border-gray-400">
    <!-- DAFTAR HASIL PENCARIAN BERITA -->
    <div>

        <!-- awal card hasil pencarian berita  -->
        <?php for ($x = 0; $x < 3; $x++) : ?>
            <div class="mx-4">
                <h2 class="font-heading text-primary text-lg font-semibold">Judul Berita</h2>
                <h4 class="font-paragraph text-primary text-xs">11 Januari 2021</h4>
                <div class="text-justify font-paragraph">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras blandit turpis sem, eu laoreet odio pretium ac. Mauris eget aliquet lorem. Cras dignissim leo non ante molestie, at vulputate justo lobortis. Pellentesque quam elit, mattis eu nibh et, maximus congue mauris
                </div>
            </div>
            <hr class="my-2 border-2 border-gray-400">
        <?php endfor; ?>
        <!-- akhir card hasil pencarian berita  -->

    </div>
    <!-- END DAFTAR HASIL PENCARIAN BERITA -->

    <!-- awal tulisan "Selengkapnya" di hasil pencarian -->
    <div class="flex justify-end mt-6">
        <div class="flex bg-secondary text-white rounded-full md:py-2 py-1 md:px-3 px-2 items-center gap-x-2 cursor-pointer md:text-sm text-xs">
            Selengkapnya
            <img src="/img/right-off.png" class="md:w-4 md:h-4 w-3 h-3" alt="">
        </div>
    </div>
    <!-- akhir tulisan "Selengkapnya" di hasil pencarian -->

</div>
<!-- END HASIL PENCARIAN BERITA -->


<script type="text/javascript" src="/js/search.js"></script>
<?= $this->endSection(); ?>