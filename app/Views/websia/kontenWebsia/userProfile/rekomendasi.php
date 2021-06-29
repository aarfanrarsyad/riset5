<?= $this->extend("websia/layoutWebsia/templateBerandaLogin.php"); ?>

<?= $this->section('content'); ?>


<!-- Awal Rekomendasi -->
<div class="mb-8 mt-6 pt-0 px-8 text-center md:text-left">
    <div class="static md:w-full px-4 pb-4">
        <a class="bg-secondary font-paragraph text-sm text-white text-center py-1 px-3 mx-auto rounded-full cursor-pointer hover:bg-secondaryhover transition-colors duration-200" href="/User/profil">
            <img src="/img/components/icon/panah_kiri.png" alt="icon panah kiri" class="inline pr-2 pb-1">
            Kembali
        </a>
        <h2 class="font-heading font-semibold text-xl my-4">Terdapat <?= $jumlah ?> Alumni yang mungkin Anda kenal</h2>
        <section id="cards">
            <div class="mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-x-8 gap-y-2 sm:gap-y-4 md:gap-y-8">
                <?php foreach ($alumni as $row) :  ?>
                    <!-- 1 card -->
                    <div class="rekomendasi hidden shadow my-2 border border-gray-200 bg-white hover:bg-gray-200">
                        <a href="/User/profilAlumni/<?= $row['id_alumni'] ?>" target="_new">
                            <div class="gambar flex flex-row items-center">
                                <img class="w-24 md:w-24 lg:w-24 rounded-full m-4 md:m-65" src="/img/<?= $row['foto_profil'] ?>" alt="foto profil user" />
                                <div class="text-left">
                                    <div class="pr-4 mb-1 sm:mb-2 font-heading font-bold text-primary"><?= $row['nama'] ?></div>
                                    <?php if (isset($row['id_tempat_kerja'])) { ?>
                                        <div class="pr-4 font-paragraph text-primary text-base block"><?= $row['nama_instansi'] ?></div>
                                    <?php }
                                    if (isset($row['angkatan'])) { ?>
                                        <div class="pr-4 font-paragraph text-primary text-base block">Angkatan <?= $row['angkatan'] ?></div>
                                    <?php } ?>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
        <!-- Awal button Tampilkan Lebih Banyak -->
        <div class="mt-8 pb-2 text-center md:text-left font-semibold">
            <?= $pager->simpleLinks() ?>
            <!-- <button class="float-right bg-secondary font-paragraph text-sm text-white text-center py-1 px-3 mx-auto rounded-full cursor-pointer hover:bg-secondaryhover transition-colors duration-200 focus:outline-none">
                Tampilkan Lebih Banyak
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="-mt-1 text-white w-4 inline text-bold">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button> -->
        </div>
        <!-- Akhir button Tampilkan Lebih Banyak -->
    </div>
</div>
<!-- Akhir Rekomendasi -->

<?= $this->endSection(); ?>