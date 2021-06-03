<?= $this->extend('websia/layoutWebsia/templateBerandaLogin.php'); ?>

<?= $this->section('content'); ?>

<div class="md:mt-8 mt-4 lg:px-20 md:px-8 px-3 text-sm">
    <div class="flex justify-between items-end">
        <div class="text-sm text-primary font-medium">
            <div class="flex gap-x-2">
                <a href="/" class="hover:text-primaryHover">Beranda</a>
                <p>></p>
                <a href="/User/berita" class="hover:text-primaryHover">Berita</a>
            </div>
        </div>
        <div>
            <div class="flex items-center gap-x-2">
                <a href="/User/unggahBerita">
                    <div class="bg-secondary hover:bg-secondaryhover md:py-1.5 md:px-3 py-1 px-2 outline-none text-white rounded-full cursor-pointer">
                        Unggah Berita
                    </div>
                </a>

                <svg class="w-6 cursor-pointer z-20 select-none" id="notif" width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <rect width="42" height="42" fill="url(#pattern0)" />
                    <defs>
                        <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                            <use xlink:href="#image0" transform="scale(0.00195312)" />
                        </pattern>
                        <image id="image0" width="512" height="512" xlink:href="data:image/png;base64,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" />
                    </defs>
                </svg>

                <div class="hidden lg:w-2/5 md:w-2/3 w-3/4 opacity-0 transition-all duration-300 rounded-xl text-primary py-2 text-sm absolute lg:right-18 -lg:right-2 md:right-6 right-1 md:top-48 top-28 h-72 overflow-y-auto z-20">
                    <div class="font-bold px-2">Status Unggah Berita</div>
                    <div class="bg-gray-100 flex p-2 gap-x-2 mb-2">
                        <div class="lg:w-3/4 md:w-4/5 w-2/3">
                            Berita dengan judul "Polstat STIS Mengadakan Reuni" oleh A. Karim telah dikonfirmasi dan dipublikasikan.
                            <div class="flex gap-x-2 items-center">
                                <img src="/img/components/icon/calendar.png" class="w-5 h-5" alt="icon kalender">
                                <p class="text-xs">17 April 2021</p>
                            </div>
                        </div>
                        <div class="lg:w-1/4 md:w-1/5 w-1/3 lg:h-16 h-12 bg-gray-300">
                        </div>
                    </div>
                    <div class="bg-gray-100 flex p-2 gap-x-2 mb-2">
                        <div class="lg:w-3/4 md:w-4/5 w-2/3">
                            Berita dengan judul "Peraturan Baru Tentang Pengambilan Ijazah Alumni" oleh Doraemon telah dikonfirmasi dan dipublikasikan.
                            <div class="flex gap-x-2 items-center">
                                <img src="/img/components/icon/calendar.png" class="w-5 h-5" alt="iicon kalender">
                                <p class="text-xs">14 April 2021</p>
                            </div>
                        </div>
                        <div class="lg:w-1/4 md:w-1/5 w-1/3 lg:h-16 h-12 bg-gray-300">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr class="border-primary border-t-2 border-b-0 mt-3">
    <?php if (count($dataset) >= 3) : ?>
        <div class="mt-4 bg-primary md:p-8 p-3">
            <h2 class="font-bold text-secondary text-center font-heading lg:text-2xl md:text-xl text-lg">Berita Terpopuler</h2>
            <div class="md:grid md:grid-cols-3 md:gap-x-8 mt-4">
                <div class="md:col-span-2 lg:h-96 md:h-72 h-32 flex items-end sm:mb-4 mb-2 md:mb-0 border border-gray-100">
                    <!-- tambahin link buat ke beritanya di sini-->
                    <a href="" class="w-full h-full">
                        <img src="<?= base_url('berita/berita_' . $dataset[0]['id'] . '/' . $dataset[0]['thumbnail']) ?>" alt="thumbnail" class="w-full h-full object-contain" style="z-index: 0;">
                        <div class="-mt-9 p-1">
                            <h1 class="bg-clip-content bg-black bg-opacity-50 text-white font-heading font-bold lg:text-lg md:text-base text-sm"><?= $dataset[0]['judul'] ?></h1>
                        </div>
                    </a>
                </div>
                <div class="md:grid md:grid-rows-2 md:gap-y-8">
                    <div class="lg:h-44 h-32 flex items-end sm:mb-4 mb-2 md:mb-0 border border-gray-100">
                        <!-- tambahin link buat ke beritanya di sini-->
                        <a href="" class="w-full h-full">
                            <img src="<?= base_url('berita/berita_' . $dataset[1]['id'] . '/' . $dataset[1]['thumbnail']) ?>" alt="thumbnail" class="w-full h-full object-contain">
                            <div class="-mt-9 p-1">
                                <h1 class="text-white font-heading font-bold text-lg"><?= $dataset[1]['judul'] ?></h1>
                            </div>
                        </a>
                    </div>
                    <div class="lg:h-44 h-32 flex items-end border border-gray-100">
                        <a href="" class="w-full h-full">
                            <img src="<?= base_url('berita/berita_' . $dataset[2]['id'] . '/' . $dataset[2]['thumbnail']) ?>" alt="thumbnail" class="w-full h-full object-contain">
                            <div class="-mt-9 p-1">
                                <h1 class="text-white font-heading font-bold text-lg"><?= $dataset[2]['judul'] ?></h1>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <hr class="border-primary border-t-2 border-b-0 mt-4 mb-3">
    <?php endif ?>

    <div class="mt-4">
        <h2 class="font-bold text-secondary font-heading md:text-xl text-lg mb-4"> <?= count($dataset) >= 3 ? 'Berita Lainnya' : 'Berita Terbaru' ?> </h2>
        <!-- start card berita -->
        <div class="md:grid md:grid-cols-2 md:gap-x-6">
            <?php for ($i = 0; $i < count($dataset); $i++) : ?>
                <?php if ($i % 2 == 0) : ?>
                    <div>
                        <div class="flex gap-x-2">
                            <div class="lg:w-1/4 w-1/3 lg:h-24 h-20 border border-gray-400">
                                <img src="<?= base_url('berita/berita_' . $dataset[$i]['id'] . '/' . $dataset[$i]['thumbnail']) ?>" alt="thumbnail" class="w-full h-full object-contain">
                                </img>
                            </div>
                            <div class="lg:w-3/4 w-2/3">
                                <a href="<?= base_url('user/viewBerita/' . $dataset[$i]['id']) ?>">
                                    <h3 class="font-heading font-semibold text-primary text-lg"><?= $dataset[$i]['judul'] ?></h3>
                                </a>
                                <div class="flex mt-1 gap-x-1">
                                    <img src="/img/components/icon/clock.png" class="h-4" alt="tanggal">
                                    <p class="font-paragraph text-xs text-primary"><?= $dataset[$i]['tanggal_publish'] ?></p>
                                    <img src="/img/components/icon/profile.png" class="h-4 ml-2" alt="author">
                                    <p class="font-paragraph text-xs text-primary"><?= $dataset[$i]['author'] ?></p>
                                </div>
                                <!-- <p>
                                    <?= $dataset[$i]['konten'] ?>
                                </p> -->
                            </div>
                        </div>
                        <hr class="my-3 border-gray-400">
                    </div>
                <?php else : ?>
                    <div class="md:block hidden">
                        <div class="flex gap-x-2">
                            <div class="lg:w-1/4 w-1/3 lg:h-24 h-20 border border-gray-400">
                                <img src="<?= base_url('berita/berita_' . $dataset[$i]['id'] . '/' . $dataset[$i]['thumbnail']) ?>" alt="thumbnail" class="w-full h-full object-contain">
                                </img>
                            </div>
                            <div class="lg:w-3/4 w-2/3">
                                <a href="<?= base_url('user/viewBerita/' . $dataset[$i]['id']) ?>">
                                    <h3 class="font-heading font-semibold text-primary text-lg"><?= $dataset[$i]['judul'] ?></h3>
                                </a>
                                <div class="flex mt-1 gap-x-1">
                                    <img src="/img/components/icon/clock.png" class="h-4" alt="tanggal">
                                    <p class="text-xs text-primary"><?= $dataset[$i]['tanggal_publish'] ?></p>
                                    <img src="/img/components/icon/profile.png" class="h-4 ml-2" alt="author">
                                    <p class="text-xs text-primary"><?= $dataset[$i]['author'] ?></p>
                                </div>
                                <!-- <p>
                                    <?= $dataset[$i]['konten'] ?>
                                </p> -->
                            </div>
                        </div>
                        <hr class="my-3 border-gray-400">
                    </div>
                <?php endif; ?>
            <?php endfor; ?>
        </div>
        <!-- end card berita -->
        <div class="flex gap-x-2 items-center justify-end mb-8">
            <a href="">
                <img src="/img/components/icon/left-on.png" class="w-4 h-4 cursor-pointer" alt="Berita sebelumnya">
            </a>
            <a href="" class="text-secondary">1</a>
            <a href="" class="text-secondary">2</a>
            <a href="">
                <img src="/img/components/icon/right-on.png" class="w-4 h-4 cursor-pointer" alt="Berita selanjutnya">
            </a>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>