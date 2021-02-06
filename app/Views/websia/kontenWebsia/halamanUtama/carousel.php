<!-- Kalo mau akses carousel, di controller websia ganti variabel login = 'sudah' -->
<!-- Gambar/konten yang didalam carousel belum fix, bisa berubah jika konten selesai dibuat -->

<!-- Awal Carousel -->
<div class="w-full bg-primary">
    <div id="slider" class="swiper-container w-full">
        <div class="swiper-wrapper">
            <div class="swiper-slide bg-cover bg-center w-full" style="background-image: url('/img/komponen 1.png');">
                <div class="container py-12 md:20 lg:py-28">
                    <div class="w-full lg:w-2/3">
                        <div class="md:py-10 px-14 lg:px-28 md:px-20">
                            <h2 class="font-heading font-bold text-2xl text-white md:text-6xl">Jalin Silaturahmi Kembali</h2>
                            <p class="font-paragraph text-xl md:mt-3 text-white font-light">Masuk untuk menjelajah lebih dalam</p>
                            <hr class="bg-secondary w-20 md:w-28 mt-2 md:mt-4">
                        </div>
                        <div class="my-8 px-14 lg:px-28 md:px-20 mt-4 md:-mt-2">
                            <!-- tombol yang ada di dalam carousel masih belum ditentukan ada atau tidaknya, konten masih belum fix -->
                            <?php if (!session()->has('id_user') && !logged_in()) : ?>
                                <a href="/login" class="bg-secondary ease-linear font-paragraph text-xs md:text-xl hover:bg-secondaryhover text-white px-4 py-2 md:px-6 md:py-2 rounded-full">Masuk</a>
                            <?php endif; ?>
                            <?php if (session()->has('id_user')) : ?>
                                <a href="/auth/logout" class="bg-secondary ease-linear font-paragraph text-xs md:text-xl hover:bg-secondaryhover text-white px-4 py-2 md:px-6 md:py-2 rounded-full">Keluar</a>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide bg-cover bg-center" style="background-image: url('/img/komponen 1.png');">
                <div class="container py-12 md:20 lg:py-28">
                    <div class="w-full lg:w-2/3">
                        <div class="md:py-10 px-14 lg:px-28 md:px-20">
                            <h2 class="font-heading font-bold text-2xl text-white md:text-6xl">Jalin Silaturahmi Kembali</h2>
                            <p class="font-paragraph text-xl md:mt-3 text-white font-light">Masuk untuk menjelajah lebih dalam</p>
                            <hr class="bg-secondary w-20 md:w-28 mt-2 md:mt-4">
                        </div>
                        <div class="my-8 px-14 lg:px-28 md:px-20 mt-4 md:-mt-2">
                            <!-- tombol yang ada di dalam carousel masih belum ditentukan ada atau tidaknya, konten masih belum fix -->
                            <?php if (!session()->has('id_user') && !logged_in()) : ?>
                                <a href="/login" class="bg-secondary ease-linear font-paragraph text-xs md:text-xl hover:bg-secondaryhover text-white px-4 py-2 md:px-6 md:py-2 rounded-full">Masuk</a>
                            <?php endif; ?>
                            <?php if (session()->has('id_user')) : ?>
                                <a href="/auth/logout" class="bg-secondary ease-linear font-paragraph text-xs md:text-xl hover:bg-secondaryhover text-white px-4 py-2 md:px-6 md:py-2 rounded-full">Keluar</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide bg-cover bg-center" style="background-image: url('/img/komponen 1.png');">
                <div class="container py-12 md:20 lg:py-28">
                    <div class="w-full lg:w-2/3">
                        <div class="md:py-10 px-14 lg:px-28 md:px-20">
                            <h2 class="font-heading font-bold text-2xl text-white md:text-6xl">Jalin Silaturahmi Kembali</h2>
                            <p class="font-paragraph text-xl md:mt-3 text-white font-light">Masuk untuk menjelajah lebih dalam</p>
                            <hr class="bg-secondary w-20 md:w-28 mt-2 md:mt-4">
                        </div>
                        <div class="my-8 px-14 lg:px-28 md:px-20 mt-4 md:-mt-2">
                            <!-- tombol yang ada di dalam carousel masih belum ditentukan ada atau tidaknya, konten masih belum fix -->
                            <?php if (!session()->has('id_user') && !logged_in()) : ?>
                                <a href="/login" class="bg-secondary ease-linear font-paragraph text-xs md:text-xl hover:bg-secondaryhover text-white px-4 py-2 md:px-6 md:py-2 rounded-full">Masuk</a>
                            <?php endif; ?>
                            <?php if (session()->has('id_user')) : ?>
                                <a href="/auth/logout" class="bg-secondary ease-linear font-paragraph text-xs md:text-xl hover:bg-secondaryhover text-white px-4 py-2 md:px-6 md:py-2 rounded-full">Keluar</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <img class="swiper-button-prev md:ml-8" src="/img/left-on.png">
        <img class="swiper-button-next md:mr-8" src="/img/right-on.png">
        <div class="swiper-pagination"></div>
    </div>
</div>
<script src="/js/carousel.js"></script>
<!-- Akhir Carousel -->