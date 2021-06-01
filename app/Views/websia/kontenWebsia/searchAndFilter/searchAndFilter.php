<?= $this->extend('websia/layoutWebsia/templateBerandaLogin.php'); ?>

<?= $this->section('content'); ?>

<div class="flex w-full flex-1">

    <!-- awal sidebar -->
    <?= $this->include('websia/kontenWebsia/searchAndFilter/sidebarFilter'); ?>
    <!-- akhir sidebar -->

    <!-- awal Hasil Pencarian  -->
    <div class="flex-grow">
        <div class="flex">

            <!-- awal -> ini hanya untuk margin sidebar jadi jangan ubah kecuali jika ubah ukuran sidebarnya  -->
            <div class=" md:hidden invisible">
                <div class="flex md:px-4 px-2 py-1 justify-between bg-primaryHover">
                    <svg class="w-4 fill-current text-secondary cursor-pointer" id="hamburgerSidebar" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </div>
            </div>
            <!-- akhir -> ini hanya untuk margin sidebar jadi jangan ubah kecuali jika ubah ukuran sidebarnya  -->

            <div class="flex-grow" id="hasilPencarian">
                <!-- Catatan : jika hasil tidak ada, bisa isi id="hasilPencarian" dengan coding yang ada pada searchKosong.php  -->

                <!-- HASIL PENCARIAN ALUMNI -->
                <div class="md:mx-10 sm:mx-5 mx-3 mt-2 mt-4">
                    <div id="cariAlumni">
                        <h1 class="text-secondary font-heading text-2xl font-bold">ALUMNI</h1>

                        <!-- awal jumlah hasil pencarian alumni  -->
                        <div id="jumlahAlumni" class="text-primary md:mb-6 mb-2 font-paragraph font-extralight text-sm">
                            <?= $jumlah; ?>
                        </div>
                        <hr class="md:my-4 my-2 border-2 border-gray-400">
                        <!-- akhir jumlah hasil pencarian alumni  -->

                        <!-- Awal DAFTAR HASIL PENCARIAN ALUMNI -->
                        <div id="filterAlumni">
                            <?php foreach ($alumni1 as $row) : ?>
                                <!-- Awal Card Alumni -->
                                <a href="/User/profilAlumni?nim=<?= $row['nim'] ?>">
                                    <div class="mx-2">
                                        <div class="flex gap-x-4">
                                            <div class="flex items-center">
                                                <img src="/img/components/avatar.png" class="lg:w-18 w-12 mx-auto" alt="Foto profil user">
                                            </div>
                                            <div class="flex items-center">
                                                <div>
                                                    <!-- Awal Nama Alumni -->
                                                    <h2 class="md:text-lg font-heading text-primary font-semibold"><?= $row['nama']; ?></h2>
                                                    <!-- Akhir Nama Alumni -->

                                                    <!-- Awal Atribut Alumni -->
                                                    <div class="md:text-sm text-xs font-paragraph text-primary">Angkatan <?= $row['angkatan']; ?></div>
                                                    <!-- Akhir Atribut Alumni -->

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <!-- Akhir Card Alumni -->

                                <hr class="my-4 border-gray-400">
                            <?php endforeach; ?>
                            <hr class="-my-4 border-2 border-gray-400">
                        </div>

                        <!-- awal tulisan "Selengkapnya" di hasil pencarian -->
                        <div class="flex justify-end mt-12">
                            <div class="flex bg-secondary text-white rounded-full md:py-2 py-1 md:px-3 px-2 items-center gap-x-2 cursor-pointer md:text-sm text-xs">
                                Selengkapnya
                                <img src="/img/components/icon/right-off.png" class="md:w-4 md:h-4 w-3 h-3 my-auto" alt="icon panah kanan off">
                            </div>
                        </div>
                        <!-- akhir tulisan "Selengkapnya" di hasil pencarian -->

                        <!-- Akhir DAFTAR HASIL PENCARIAN ALUMNI -->
                    </div>
                </div>
                <!-- AKHIR HASIL PENCARIAN ALUMNI -->

                <!-- HASIL PENCARIAN BERITA -->
                <div class="md:mx-10 sm:mx-5 mx-3 mt-2 mb-8">
                    <div>
                        <h1 class="text-secondary font-heading text-2xl font-bold">BERITA</h1>

                        <!-- awal jumlah hasil pencarian berita  -->
                        <div class="text-primary md:mb-6 mb-2 font-paragraph font-extralight text-sm">
                            Sekitar 28.899 hasil pencarian berita
                        </div>
                        <hr class="md:my-4 my-2 border-2 border-gray-400">
                        <!-- akhir jumlah hasil pencarian berita  -->


                        <!-- Awal DAFTAR HASIL PENCARIAN BERITA -->
                        <div>
                            <?php for ($x = 0; $x < 4; $x++) : ?>
                                <!-- Awal Card Berita  -->
                                <a href="">
                                    <div class="flex px-2 md:flex-row flex-col md:gap-x-4 gap-x-0 items-center">
                                        <img src="/img/components/sampel.jpeg" alt="thumbnail berita" class="md:w-48 w-full gambarBerita">
                                        <div class="flex-grow">
                                            <div class="flex flex-col">

                                                <!-- Awal Judul Berita  -->
                                                <h2 class="text-lg font-heading text-primary font-semibold mb-2">Judul Berita</h2>
                                                <!-- Akhir Judul Berita  -->

                                                <!-- Awal Tanggal Berita  -->
                                                <div class="text-xs font-paragraph text-primary">11 Januari 2021</div>
                                                <!-- Akhir Tanggal Berita  -->

                                                <!-- Awal Deskripsi Berita  -->
                                                <div class="text-sm font-paragraph break-words ">
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras blandit turpis sem, eu laoreet odio pretium ac. Mauris eget aliquet lorem. Cras dignissim leo non ante molestie, at vulputate justo lobortis. Pellentesque quam elit, mattis eu nibh et, maximus congue mauris
                                                </div>
                                                <!-- Akhir Tanggal Berita  -->

                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <!-- Akhir Card Berita  -->

                                <hr class="my-4 border-gray-400">
                            <?php endfor; ?>
                            <hr class="-my-4 border-2 border-gray-400">
                        </div>

                        <!-- awal tulisan "Selengkapnya" di hasil pencarian -->
                        <div class="flex justify-end mt-12" id="beritaSelengkapnya">
                            <div class="flex bg-secondary text-white rounded-full md:py-2 py-1 md:px-3 px-2 items-center gap-x-2 cursor-pointer md:text-sm text-xs">
                                Selengkapnya
                                <img src="/img/components/icon/right-off.png" class="md:w-4 md:h-4 w-3 h-3" alt="icon panah kanan off">
                            </div>
                        </div>
                        <!-- akhir tulisan "Selengkapnya" di hasil pencarian -->

                        <!-- Akhir DAFTAR HASIL PENCARIAN BERITA -->
                    </div>
                </div>

                <!-- END HASIL PENCARIAN BERITA -->
            </div>
        </div>
    </div>
    <!-- akhir Hasil Pencarian  -->


</div>

<script>
    $("#cariAngkatan").keyup(function() {
        let data1 = <?php echo json_encode($alumni1) ?>;
        let data2 = <?php echo json_encode($alumni2) ?>;
        let jumlah = 0;
        let input = $("#cariAngkatan").val();
        let string = "";
        let string2 = "";
        data2.map((item, index) => {
            if (input == "") {
                jumlah++
                string = string + "<a href='/User/profilAlumni?nim=" + item.nim + "><div class='mx-2'><div class='flex gap-x-4'><div class='flex items-center'><img src='/img/components/avatar.png' class='lg:w-18 w-12 mx-auto' alt='foto profil user'></div><div class='flex items-center'><div><!-- Awal Nama Alumni --><h2 class='md:text-lg font-heading text-primary font-semibold'>" + item.nama + "</h2><!-- Akhir Nama Alumni --><!-- Awal Atribut Alumni --><div class='md:text-sm text-xs font-paragraph text-primary'>Angkatan " + item.angkatan + "</div><!-- Akhir Atribut Alumni --></div></div></div></div></a><!-- Akhir Card Alumni --><hr class='my-4 border-gray-400'>"
                string2 = "Terdapat " + jumlah + " alumni dengan kata kunci `<B><?= $cari; ?></B>` ditemukan."
            }
            if (input == item.angkatan) {
                jumlah++
                string = string + "<a href='/User/profilAlumni?nim=" + item.nim + "><div class='mx-2'><div class='flex gap-x-4'><div class='flex items-center'><img src='/img/components/avatar.png' class='lg:w-18 w-12 mx-auto' alt='foto profil user'></div><div class='flex items-center'><div><!-- Awal Nama Alumni --><h2 class='md:text-lg font-heading text-primary font-semibold'>" + item.nama + "</h2><!-- Akhir Nama Alumni --><!-- Awal Atribut Alumni --><div class='md:text-sm text-xs font-paragraph text-primary'>Angkatan " + item.angkatan + "</div><!-- Akhir Atribut Alumni --></div></div></div></div></a><!-- Akhir Card Alumni --><hr class='my-4 border-gray-400'>"
                string2 = "Terdapat " + jumlah + " alumni dengan kata kunci `<B><?= $cari; ?></B>` dan angkatan = " + input + " ditemukan."
            }
        });
        string = string + "<hr class='-my-4 border-2 border-gray-400'>"
        $("#jumlahAlumni").html(string2);
        $("#filterAlumni").html(string);
    });
</script>
<script type="text/javascript" src="/js/search.js"></script>
<script type="text/javascript" src="/js/berita.js"></script>
<?= $this->endSection(); ?>