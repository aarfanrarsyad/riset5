<div class="fixed top-0 flex flex-col min-h-screen bg-primarySidebar sidebarSearch">
    <img src="/img/components/logo/logo_sia.png" class="md:w-auto w-7 mx-auto logoSia" alt="Logo SIA">
    <div class="flex md:px-5 px-2 py-2 justify-between bg-primaryHover items-center cursor-pointer boxFilter select-none">
        <div class="md:text-2xl text-base font-heading font-semibold text-secondary hidden md:block md:mr-32 param1">FILTER</div>
        <svg class="md:w-7 w-4 fill-current text-secondary cursor-pointer hamburgerSidebar" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </div>

    <div class="flex flex-col mt-4 hidden md:block param2">
        <?php $cari = (isset($_GET['cari'])) ? $_GET['cari'] : ''; ?>

        <!-- Awal tombol filter "Semua" -->
        <a href="<?= base_url('user/searchAndFilter') ?>">
            <div class="md:text-base text-sm <?= (!isset($_GET['t'])) ? 'text-secondary' : 'text-white' ?> hover:bg-primaryDark font-heading font-medium px-4 py-1 cursor-pointer filterSidebar">Semua</div>
        </a>
        <!-- Akhir tombol filter "Semua" -->

        <!-- Awal filter "Alumni" -->
        <!-- Catatan : kalo di halaman semuaAlumni masukkan css "hidden" di div yang ada class "listFilterSidebarBerita" -->
        <a href="<?= base_url('User/searchAndFilter?t=alumni&cari=' . $cari); ?>" class="semuaAlumni">
            <div class="md:text-base text-sm <?= (isset($_GET['t'])) ? (($_GET['t'] == 'alumni') ? 'text-secondary' : 'text-white') : 'text-white' ?>  hover:bg-primaryDark font-heading font-medium px-4 py-1 cursor-pointer filterSidebar">Alumni</div>
        </a>

        <div class="flex flex-col py-1 px-6 w-full listFilterSidebarAlumni <?= (!isset($_GET['t']) || $_GET['t'] == 'alumni') ? '' : 'hidden' ?>">
            <form id="filterAlumni" action="">

                <!-- Awal Filter "Prodi" Untuk Alumni  -->
                <div class="flex flex-col">
                    <div class="flex justify-between mb-1 hover:bg-primaryDark py-1 px-2 rounded-lg cursor-pointer listSidebar">
                        <div class="md:text-sm text-xs text-white font-heading">Prodi</div>
                        <svg class="w-3 h-3 my-auto text-white font-semibold " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                        <svg class="w-3 h-3 my-auto text-white font-semibold  hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                        </svg>
                    </div>

                    <!-- Awal List Filter "Prodi" Untuk Alumni  -->
                    <div class="flex flex-col font-paragraph mb-1 px-3 hidden listProdi">

                        <!-- awal DI Statistik  -->
                        <div class="flex items-center justify-between text-white cursor-pointer mb-1 py-1 px-1 hover:bg-primaryDark rounded-lg namaProdi">
                            <div class="text-xs w-full">DI Statistika</div>
                            <?php $pro = !isset($_GET['prodi']) || in_array('DI', $_GET['prodi']) ?>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-5 text-secondary <?= ($pro) ? '' : 'hidden' ?>" fill="currentColor" class="bi bi-toggle-on" viewBox="0 0 16 16">
                                <path d="M5 3a5 5 0 0 0 0 10h6a5 5 0 0 0 0-10H5zm6 9a4 4 0 1 1 0-8 4 4 0 0 1 0 8z" />
                            </svg>

                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-5 text-secondary <?= ($pro) ? 'hidden' : '' ?>" fill="currentColor" class="bi bi-toggle-off" viewBox="0 0 16 16">
                                <path d="M11 4a4 4 0 0 1 0 8H8a4.992 4.992 0 0 0 2-4 4.992 4.992 0 0 0-2-4h3zm-6 8a4 4 0 1 1 0-8 4 4 0 0 1 0 8zM0 8a5 5 0 0 0 5 5h6a5 5 0 0 0 0-10H5a5 5 0 0 0-5 5z" />
                            </svg>

                            <input type="checkbox" <?= ($pro) ? 'checked="true"' : '' ?> class="hidden cari" name="prodi[]" value="DI">
                        </div>
                        <!-- akhir DI Statistik  -->

                        <!-- awal DIII Statistik  -->
                        <div class="flex items-center justify-between text-white cursor-pointer mb-1 py-1 px-1 hover:bg-primaryDark rounded-lg namaProdi">
                            <div class="text-xs w-full">DIII Statistika</div>
                            <?php $pro = !isset($_GET['prodi']) || in_array('DIII', $_GET['prodi']) ?>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-5 text-secondary <?= ($pro) ? '' : 'hidden' ?>" fill="currentColor" class="bi bi-toggle-on" viewBox="0 0 16 16">
                                <path d="M5 3a5 5 0 0 0 0 10h6a5 5 0 0 0 0-10H5zm6 9a4 4 0 1 1 0-8 4 4 0 0 1 0 8z" />
                            </svg>

                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-5 text-secondary <?= ($pro) ? 'hidden' : '' ?>" fill="currentColor" class="bi bi-toggle-off" viewBox="0 0 16 16">
                                <path d="M11 4a4 4 0 0 1 0 8H8a4.992 4.992 0 0 0 2-4 4.992 4.992 0 0 0-2-4h3zm-6 8a4 4 0 1 1 0-8 4 4 0 0 1 0 8zM0 8a5 5 0 0 0 5 5h6a5 5 0 0 0 0-10H5a5 5 0 0 0-5 5z" />
                            </svg>

                            <input type="checkbox" <?= ($pro) ? 'checked="true"' : '' ?> class="hidden cari" name="prodi[]" value="DIII">
                        </div>
                        <!-- akhir DIII Statistik  -->

                        <!-- awal DIV Statistik  -->
                        <div class="flex items-center justify-between text-white cursor-pointer mb-1 py-1 px-1 hover:bg-primaryDark rounded-lg namaProdi">
                            <div class="text-xs w-full">DIV Statistika</div>
                            <?php $pro = !isset($_GET['prodi']) || in_array('ST', $_GET['prodi']) ?>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-5 text-secondary <?= ($pro) ? '' : 'hidden' ?>" fill="currentColor" class="bi bi-toggle-on" viewBox="0 0 16 16">
                                <path d="M5 3a5 5 0 0 0 0 10h6a5 5 0 0 0 0-10H5zm6 9a4 4 0 1 1 0-8 4 4 0 0 1 0 8z" />
                            </svg>

                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-5 text-secondary <?= ($pro) ? 'hidden' : '' ?>" fill="currentColor" class="bi bi-toggle-off" viewBox="0 0 16 16">
                                <path d="M11 4a4 4 0 0 1 0 8H8a4.992 4.992 0 0 0 2-4 4.992 4.992 0 0 0-2-4h3zm-6 8a4 4 0 1 1 0-8 4 4 0 0 1 0 8zM0 8a5 5 0 0 0 5 5h6a5 5 0 0 0 0-10H5a5 5 0 0 0-5 5z" />
                            </svg>

                            <input type="checkbox" <?= ($pro) ? 'checked="true"' : '' ?> class="hidden cari" name="prodi[]" value="ST">
                        </div>
                        <!-- akhir DIV Statistik  -->

                        <!-- awal DIV Komputasi Statistik  -->
                        <div class="flex items-center justify-between text-white cursor-pointer mb-1 py-1 px-1 hover:bg-primaryDark rounded-lg namaProdi">
                            <div class="text-xs w-full">DIV Komputasi Statistik</div>
                            <?php $pro = !isset($_GET['prodi']) || in_array('KS', $_GET['prodi']) ?>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-5 text-secondary <?= ($pro) ? '' : 'hidden' ?>" fill="currentColor" class="bi bi-toggle-on" viewBox="0 0 16 16">
                                <path d="M5 3a5 5 0 0 0 0 10h6a5 5 0 0 0 0-10H5zm6 9a4 4 0 1 1 0-8 4 4 0 0 1 0 8z" />
                            </svg>

                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-5 text-secondary <?= ($pro) ? 'hidden' : '' ?>" fill="currentColor" class="bi bi-toggle-off" viewBox="0 0 16 16">
                                <path d="M11 4a4 4 0 0 1 0 8H8a4.992 4.992 0 0 0 2-4 4.992 4.992 0 0 0-2-4h3zm-6 8a4 4 0 1 1 0-8 4 4 0 0 1 0 8zM0 8a5 5 0 0 0 5 5h6a5 5 0 0 0 0-10H5a5 5 0 0 0-5 5z" />
                            </svg>

                            <input type="checkbox" <?= ($pro) ? 'checked="true"' : '' ?> class="hidden cari" name="prodi[]" value="KS">
                        </div>
                        <!-- akhir DIV Komputasi Statistik Statistik  -->

                    </div>
                    <!-- Akhir List Filter "Prodi" Untuk Alumni  -->

                </div>
                <!-- Akhir Fiilter "Prodi" Untuk Alumni  -->

                <!-- Awal Filter "Angkatan" Untuk Alumni  -->
                <div class="flex flex-col">
                    <div class="flex justify-between mb-1 hover:bg-primaryDark py-1 px-2 rounded-lg cursor-pointer listSidebar">
                        <div class="md:text-sm text-xs font-heading text-white">Angkatan</div>
                        <svg class="w-3 h-3 my-auto text-white font-semibold" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                        <svg class="w-3 h-3 my-auto text-white font-semibold hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                        </svg>
                    </div>

                    <!-- Awal Input Filter "Prodi" Untuk Alumni  -->
                    <div class="mb-1 px-4 hidden listAngkatan">
                        <div class="flex w-full outline-none rounded-lg items-center">
                            <input type="text" name="akt" placeholder="60" autocomplete="off" class="search w-full placeholder-gray-300 text-primary outline-none focus:ring-2 focus:ring-secondary font-paragraph text-xs px-2 py-1 font-paragraph rounded-lg" value="<?= isset($_GET['akt']) ? $_GET['akt'] : '' ?>">

                            <svg class="w-3 h-3 text-primary stroke-current stroke-2 -ml-5 cursor-pointer" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </div>
                    <!-- Akhir Input Filter "Prodi" Untuk Alumni  -->

                </div>
                <!-- Akhir Filter "Angkatan" Untuk Alumni  -->

                <!-- Awal Filter "Tempat Kerja" Untuk Alumni  -->
                <div class="flex flex-col">
                    <div class="flex justify-between mb-1 hover:bg-primaryDark py-1 px-2 rounded-lg cursor-pointer listSidebar">
                        <div class="md:text-sm text-xs text-white font-heading ">Tempat Kerja</div>
                        <svg class="w-3 h-3 my-auto text-white font-semibold " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                        <svg class="w-3 h-3 my-auto text-white font-semibold  hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                        </svg>
                    </div>

                    <div class="flex mb-1 px-4 hidden listTempatKerja">
                        <div class="flex w-full outline-none rounded-lg items-center mb-2 text-primary inputKerja">
                            <input type="text" name="kerja" placeholder="BPS RI" autocomplete="off" class="search w-full placeholder-gray-300 font-paragraph text-xs px-2 py-1 outline-none focus:ring-2 focus:ring-secondary text-primary font-paragraph rounded-lg" value="<?= isset($_GET['kerja']) ? $_GET['kerja'] : '' ?>">

                            <svg class="w-3 h-3 text-primary stroke-current stroke-2 -ml-5 cursor-pointer" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </div>

                    </div>
                </div>
                <!-- Akhir Filter "Tempat Kerja" Untuk Alumni  -->

            </form>
        </div>
        <!-- Akhir filter "Alumni" -->


        <!-- Awal filter "Berita" -->
        <!-- Catatan : kalo di halaman semuaBerita masukkan css "hidden" di div yang ada class "listFilterSidebarAlumni" -->
        <a href="<?= base_url('User/searchAndFilter?t=berita&cari=' . $cari); ?>" class="semuaBerita">
            <div class="md:text-base text-sm <?= (isset($_GET['t'])) ? (($_GET['t'] == 'berita') ? 'text-secondary' : 'text-white') : 'text-white' ?> hover:bg-primaryDark font-medium px-4 py-1 cursor-pointer filterSidebar">Artikel/Berita</div>
        </a>

        <div class="flex flex-col py-1 px-7 w-full listFilterSidebarBerita <?= (!isset($_GET['t']) || $_GET['t'] == 'berita') ? '' : 'hidden' ?>">

            <div class="flex flex-col">
                <div class="flex justify-between mb-1 hover:bg-primaryDark py-1 px-2 rounded-lg cursor-pointer listSidebar">

                    <div class="md:text-sm text-xs text-white font-heading">Rentang Waktu</div>

                    <svg class="w-3 h-3 my-auto text-white font-semibold" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>

                    <svg class="w-3 h-3 my-auto text-white font-semibold hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                    </svg>

                </div>

                <div class="flex flex-col mb-1 px-4 hidden listRentangWaktu">

                    <!-- <div class="flex justify-between gap-x-1 mb-2"> -->

                    <!-- Awal Input Filter "Rentang Waktu Awal" Untuk Berita  -->
                    <div class="flex w-full justify-between gap-x-1 rounded-lg items-center mb-1 text-primary inputTahunAwal">
                        <label for="awalTahun" class="text-white" style="width: 60px;">Dari :</label>
                        <div class="flex-grow">
                            <select name="awalTahun" id="awalTahun" onmousedown="if(this.options.length>5){this.size=5;}" onchange="this.blur()" onblur="this.size=0;" class=" text-xs px-2 py-1 outline-none focus:ring-2 focus:ring-secondary font-paragraph font-medium rounded-lg w-full">
                                <option id="awalHilang" class="mb-1">Tahun Awal</option>
                                <?php $awal = (is_null($tahunBerita->awal)) ? 2021 : $tahunBerita->awal;
                                for ($a = date('Y'); $a >= $awal; $a -= 1) {
                                    $select = (isset($_GET['awal']) && $a == $_GET['awal']) ? 'selected' : '';
                                    echo "<option class='mb-1 font-medium' $select value=$a> $a </option>";
                                } ?>
                            </select>
                        </div>
                    </div>

                    <!-- Akhir Input Filter "Rentang Waktu Awal" Untuk Berita  -->

                    <!-- Awal Input Filter "Rentang Waktu Akhir" Untuk Berita  -->
                    <div class="flex w-full justify-between gap-x-1 rounded-lg items-center mb-1 text-primary inputTahunAkhir">
                        <label for="awalTahun" class="text-white" style="width: 60px;">Sampai :</label>
                        <div class="flex-grow">
                            <select name="akhir" id="akhirTahun" onmousedown="if(this.options.length>5){this.size=5;}" onchange="this.blur()" onblur="this.size=0;" class=" text-xs px-2 py-1 outline-none focus:ring-2 focus:ring-secondary font-paragraph font-medium rounded-lg w-full">
                                <option id="akhirHilang" value="" class="mb-1">Tahun Akhir</option>
                                <?php $awal = (is_null($tahunBerita->awal)) ? 2021 : $tahunBerita->awal;
                                for ($a = date('Y'); $a >= $awal; $a -= 1) {
                                    $select = (isset($_GET['akhir']) && $a == $_GET['akhir']) ? 'selected' : '';
                                    echo "<option class='mb-1 font-medium' $select value=$a> $a </option>";
                                } ?>
                            </select>
                        </div>
                    </div>
                    <!-- Akhir Input Filter "Rentang Waktu Akhir" Untuk Berita  -->

                    <!-- </div> -->
                </div>
            </div>

        </div>
        <!-- Akhir filter "Berita" -->

    </div>

</div>