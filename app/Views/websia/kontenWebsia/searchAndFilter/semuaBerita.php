<?= $this->extend('websia/layoutWebsia/templateBerandaLogin.php'); ?>

<?= $this->section('content'); ?>

<div class="flex w-full">

    <!-- awal sidebar -->
    <?= $this->include('websia/kontenWebsia/searchAndFilter/sidebarFilter'); ?>
    <!-- akhir sidebar -->

    <!-- awal Hasil Pencarian  -->
    <div class=" ml-2 flex-grow min-h-screen my-6 ">
        <div class="flex">

            <!-- awal -> ini hanya untuk margin sidebar jadi jangan ubah kecuali jika ubah ukuran sidebarnya  -->
            <div class=" invisible">
                <div class="flex md:px-4 px-2 py-1 justify-between bg-primaryHover marginSidebar">
                    <svg class="w-4 fill-current text-secondary cursor-pointer" id="hamburgerSidebar" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </div>
            </div>
            <!-- akhir -> ini hanya untuk margin sidebar jadi jangan ubah kecuali jika ubah ukuran sidebarnya  -->

            <div class="flex-grow mr-2" id="hasilPencarian">
                <!-- Catatan : jika hasil tidak ada, bisa isi id="hasilPencarian" dengan coding yang ada pada searchKosong.php  -->

                <!-- HASIL PENCARIAN BERITA -->
                <div class="md:ml-12 mx-3 mt-2">
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
                                        <img src="/img/sampel.jpeg" alt="" class="md:w-48 md:h-36 w-full h-52 ">
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


                        <!-- Akhir DAFTAR HASIL PENCARIAN BERITA -->
                    </div>
                </div>

                <!-- END HASIL PENCARIAN BERITA -->
            </div>
        </div>
    </div>
    <!-- akhir Hasil Pencarian  -->


</div>


<script type="text/javascript" src="/js/search.js"></script>
<?= $this->endSection(); ?>