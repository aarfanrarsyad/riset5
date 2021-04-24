<?= $this->extend('websia/layoutWebsia/templateBerandaLogin.php'); ?>

<?= $this->section('content'); ?>

<div class="mx-12 my-6 text-sm">
    <div class="flex justify-between items-end">
        <div class="text-xs text-primary">
            <div class="flex gap-x-2">
                <a href="/" class="hover:text-primaryHover">Beranda</a>
                <p>></p>
                <a href="/User/berita" class="hover:text-primaryHover">Berita</a>
            </div>
        </div>
        <div>
            <div class="flex items-center gap-x-2">
                <a href="/User/unggahBerita">
                    <div class="bg-secondary hover:bg-secondaryhover py-1.5 px-3 outline-none text-white rounded-full cursor-pointer">
                        Unggah Berita
                    </div>
                </a>
                <div class="cursor-pointer">
                    <img src="/img/icon/bell.png" class="w-6" alt="">
                </div>
            </div>
        </div>
    </div>
    <hr class="border-primary mt-3">
    <div class="mt-4 bg-primary p-6">
        <h2 class="font-bold text-secondary text-center font-heading text-2xl">Berita Terpopuler</h2>
        <div class="grid grid-cols-3 gap-x-6 mt-4">
            <div class="col-span-2 bg-gray-200 h-full flex items-end p-2">
                <h1 class="text-white font-heading font-bold text-xl">Judul berita</h1>
            </div>
            <div class="grid grid-rows-2 gap-y-6">
                <div class="bg-gray-200 h-48 flex items-end p-2">
                    <h1 class="text-white font-heading font-bold text-lg">Judul berita</h1>
                </div>
                <div class="bg-gray-200 h-48 flex items-end p-2">
                    <h1 class="text-white font-heading font-bold text-lg">Judul berita</h1>
                </div>
            </div>
        </div>
    </div>
    <hr class="border-primary mt-4 mb-3">
    <div>
        <h2 class="font-bold text-secondary font-heading text-xl mb-4">Berita Lainnya</h2>
        <!-- start card berita -->
        <div class="grid grid-cols-2 gap-x-6">
            <div>
                <div class="flex gap-x-2">
                    <div class="w-1/4 h-24 bg-gray-200">
                    </div>
                    <div class="w-3/4">
                        <h3 class="font-heading font-semibold text-primary text-lg">Judul Berita</h3>
                        <div class="flex gap-x-1 items-center">
                            <img src="/img/icon/clock.png" class="w-3 h-3" alt="">
                            <p class="text-xs text-primary">11 Januari 2021</p>
                            <img src="/img/icon/profile.png" class="w-3 h-3 ml-2" alt="">
                            <p class="text-xs text-primary">David Smith</p>
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras blandit turpis sem, eu laoreet odio pretium ac. Mauris eget aliquet lorem.
                        </p>
                    </div>
                </div>
                <hr class="my-3 border-gray-400">
                <div class="flex gap-x-2">
                    <div class="w-1/4 h-24 bg-gray-200">
                    </div>
                    <div class="w-3/4">
                        <h3 class="font-heading font-semibold text-primary text-lg">Judul Berita</h3>
                        <div class="flex gap-x-1 items-center">
                            <img src="/img/icon/clock.png" class="w-3 h-3" alt="">
                            <p class="text-xs text-primary">11 Januari 2021</p>
                            <img src="/img/icon/profile.png" class="w-3 h-3 ml-2" alt="">
                            <p class="text-xs text-primary">David Smith</p>
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras blandit turpis sem, eu laoreet odio pretium ac. Mauris eget aliquet lorem.
                        </p>
                    </div>
                </div>
                <hr class="my-3 border-gray-400">
                <div class="flex gap-x-2">
                    <div class="w-1/4 h-24 bg-gray-200">
                    </div>
                    <div class="w-3/4">
                        <h3 class="font-heading font-semibold text-primary text-lg">Judul Berita</h3>
                        <div class="flex gap-x-1 items-center">
                            <img src="/img/icon/clock.png" class="w-3 h-3" alt="">
                            <p class="text-xs text-primary">11 Januari 2021</p>
                            <img src="/img/icon/profile.png" class="w-3 h-3 ml-2" alt="">
                            <p class="text-xs text-primary">David Smith</p>
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras blandit turpis sem, eu laoreet odio pretium ac. Mauris eget aliquet lorem.
                        </p>
                    </div>
                </div>
                <hr class="my-3 border-gray-400">
                <div class="flex gap-x-2">
                    <div class="w-1/4 h-24 bg-gray-200">
                    </div>
                    <div class="w-3/4">
                        <h3 class="font-heading font-semibold text-primary text-lg">Judul Berita</h3>
                        <div class="flex gap-x-1 items-center">
                            <img src="/img/icon/clock.png" class="w-3 h-3" alt="">
                            <p class="text-xs text-primary">11 Januari 2021</p>
                            <img src="/img/icon/profile.png" class="w-3 h-3 ml-2" alt="">
                            <p class="text-xs text-primary">David Smith</p>
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras blandit turpis sem, eu laoreet odio pretium ac. Mauris eget aliquet lorem.
                        </p>
                    </div>
                </div>
            </div>
            <div>
                <div class="flex gap-x-2">
                    <div class="w-1/4 h-24 bg-gray-200">
                    </div>
                    <div class="w-3/4">
                        <h3 class="font-heading font-semibold text-primary text-lg">Judul Berita</h3>
                        <div class="flex gap-x-1 items-center">
                            <img src="/img/icon/clock.png" class="w-3 h-3" alt="">
                            <p class="text-xs text-primary">11 Januari 2021</p>
                            <img src="/img/icon/profile.png" class="w-3 h-3 ml-2" alt="">
                            <p class="text-xs text-primary">David Smith</p>
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras blandit turpis sem, eu laoreet odio pretium ac. Mauris eget aliquet lorem.
                        </p>
                    </div>
                </div>
                <hr class="my-3 border-gray-400">
                <div class="flex gap-x-2">
                    <div class="w-1/4 h-24 bg-gray-200">
                    </div>
                    <div class="w-3/4">
                        <h3 class="font-heading font-semibold text-primary text-lg">Judul Berita</h3>
                        <div class="flex gap-x-1 items-center">
                            <img src="/img/icon/clock.png" class="w-3 h-3" alt="">
                            <p class="text-xs text-primary">11 Januari 2021</p>
                            <img src="/img/icon/profile.png" class="w-3 h-3 ml-2" alt="">
                            <p class="text-xs text-primary">David Smith</p>
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras blandit turpis sem, eu laoreet odio pretium ac. Mauris eget aliquet lorem.
                        </p>
                    </div>
                </div>
                <hr class="my-3 border-gray-400">
                <div class="flex gap-x-2">
                    <div class="w-1/4 h-24 bg-gray-200">
                    </div>
                    <div class="w-3/4">
                        <h3 class="font-heading font-semibold text-primary text-lg">Judul Berita</h3>
                        <div class="flex gap-x-1 items-center">
                            <img src="/img/icon/clock.png" class="w-3 h-3" alt="">
                            <p class="text-xs text-primary">11 Januari 2021</p>
                            <img src="/img/icon/profile.png" class="w-3 h-3 ml-2" alt="">
                            <p class="text-xs text-primary">David Smith</p>
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras blandit turpis sem, eu laoreet odio pretium ac. Mauris eget aliquet lorem.
                        </p>
                    </div>
                </div>
                <hr class="my-3 border-gray-400">
                <div class="flex gap-x-2">
                    <div class="w-1/4 h-24 bg-gray-200">
                    </div>
                    <div class="w-3/4">
                        <h3 class="font-heading font-semibold text-primary text-lg">Judul Berita</h3>
                        <div class="flex gap-x-1 items-center">
                            <img src="/img/icon/clock.png" class="w-3 h-3" alt="">
                            <p class="text-xs text-primary">11 Januari 2021</p>
                            <img src="/img/icon/profile.png" class="w-3 h-3 ml-2" alt="">
                            <p class="text-xs text-primary">David Smith</p>
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras blandit turpis sem, eu laoreet odio pretium ac. Mauris eget aliquet lorem.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- end card berita -->
        <div class="flex gap-x-2 items-center justify-end">
            <a href="">
                <img src="/img/left-on.png" class="w-4 h-4 cursor-pointer" alt="">
            </a>
            <a href="" class="text-secondary">1</a>
            <a href="" class="text-secondary">2</a>
            <a href="">
                <img src="/img/right-on.png" class="w-4 h-4 cursor-pointer" alt="">
            </a>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>