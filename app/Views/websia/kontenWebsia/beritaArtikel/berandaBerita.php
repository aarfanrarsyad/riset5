<?= $this->extend('websia/layoutWebsia/templateBerandaLogin.php'); ?>

<?= $this->section('content'); ?>

<div class="md:mx-12 mx-6 my-6 text-sm">
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
                    <div class="bg-secondary hover:bg-secondaryhover md:py-1.5 md:px-3 py-1 px-2 outline-none text-white rounded-full cursor-pointer">
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
    <div class="mt-4 bg-primary md:p-6 p-3">
        <h2 class="font-bold text-secondary text-center font-heading lg:text-2xl md:text-xl text-lg">Berita Terpopuler</h2>
        <div class="md:grid md:grid-cols-3 md:gap-x-6 mt-4">
            <div class="md:col-span-2 bg-gray-200 md:h-full h-32 flex items-end p-2 sm:mb-6 mb-2 md:mb-0">
                <h1 class="text-white font-heading font-bold text-xl">Judul berita</h1>
            </div>
            <div class="md:grid md:grid-rows-2 md:gap-y-6">
                <div class="bg-gray-200 lg:h-48 h-32 flex items-end p-2 sm:mb-6 mb-2 md:mb-0">
                    <h1 class="text-white font-heading font-bold text-lg">Judul berita</h1>
                </div>
                <div class="bg-gray-200 lg:h-48 h-32 flex items-end p-2">
                    <h1 class="text-white font-heading font-bold text-lg">Judul berita</h1>
                </div>
            </div>
        </div>
    </div>
    <hr class="border-primary mt-4 mb-3">
    <div>
        <h2 class="font-bold text-secondary font-heading md:text-xl text-lg mb-4">Berita Lainnya</h2>
        <!-- start card berita -->
        <div class="md:grid md:grid-cols-2 md:gap-x-6">
            <div>
                <div class="flex gap-x-2 items-center">
                    <div class="lg:w-1/4 w-1/3 lg:h-24 h-20 bg-gray-200">
                    </div>
                    <div class="lg:w-3/4 w-2/3">
                        <a href="">
                            <h3 class="font-heading font-semibold text-primary text-lg">Judul Berita</h3>
                        </a>
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
                <div class="flex gap-x-2 items-center">
                    <div class="lg:w-1/4 w-1/3 lg:h-24 h-20 bg-gray-200">
                    </div>
                    <div class="lg:w-3/4 w-2/3">
                        <a href="">
                            <h3 class="font-heading font-semibold text-primary text-lg">Judul Berita</h3>
                        </a>
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
                <div class="flex gap-x-2 items-center">
                    <div class="lg:w-1/4 w-1/3 lg:h-24 h-20 bg-gray-200">
                    </div>
                    <div class="lg:w-3/4 w-2/3">
                        <a href="">
                            <h3 class="font-heading font-semibold text-primary text-lg">Judul Berita</h3>
                        </a>
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
                <div class="flex gap-x-2 items-center">
                    <div class="lg:w-1/4 w-1/3 lg:h-24 h-20 bg-gray-200">
                    </div>
                    <div class="lg:w-3/4 w-2/3">
                        <a href="">
                            <h3 class="font-heading font-semibold text-primary text-lg">Judul Berita</h3>
                        </a>
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
            </div>
            <div class="md:block hidden">
                <div class="flex gap-x-2 items-center">
                    <div class="lg:w-1/4 w-1/3 lg:h-24 h-20 bg-gray-200">
                    </div>
                    <div class="lg:w-3/4 w-2/3">
                        <a href="">
                            <h3 class="font-heading font-semibold text-primary text-lg">Judul Berita</h3>
                        </a>
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
                <div class="flex gap-x-2 items-center">
                    <div class="lg:w-1/4 w-1/3 lg:h-24 h-20 bg-gray-200">
                    </div>
                    <div class="lg:w-3/4 w-2/3">
                        <a href="">
                            <h3 class="font-heading font-semibold text-primary text-lg">Judul Berita</h3>
                        </a>
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
                <div class="flex gap-x-2 items-center">
                    <div class="lg:w-1/4 w-1/3 lg:h-24 h-20 bg-gray-200">
                    </div>
                    <div class="lg:w-3/4 w-2/3">
                        <a href="">
                            <h3 class="font-heading font-semibold text-primary text-lg">Judul Berita</h3>
                        </a>
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
                <div class="flex gap-x-2 items-center">
                    <div class="lg:w-1/4 w-1/3 lg:h-24 h-20 bg-gray-200">
                    </div>
                    <div class="lg:w-3/4 w-2/3">
                        <a href="">
                            <h3 class="font-heading font-semibold text-primary text-lg">Judul Berita</h3>
                        </a>
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