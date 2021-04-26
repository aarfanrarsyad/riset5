<!-- Kalo mau akses carousel, di controller websia ganti variabel login = 'sudah' -->

<!-- Awal Carousel -->
<div class="w-full bg-primary">
    <div id="slider" class="swiper-container w-full">
        <div class="swiper-wrapper">
            <div class="swiper-slide bg-cover bg-center w-full py-20 md:py-32 lg:py-56 cursor-pointer" style="background-image: url('/img/components/carousel/carousel-01.png');" onclick="location.href='/User/profil';">
            </div>
            <div class="swiper-slide bg-cover bg-left w-full py-20 md:py-32 lg:py-56 cursor-pointer" style="background-image: url('/img/components/carousel/carousel-02.png');" onclick="location.href='/User/galeriFoto';">
            </div>
            <div class="swiper-slide bg-cover bg-left w-full py-20 md:py-32 lg:py-56 cursor-pointer" style="background-image: url('/img/components/carousel/carousel-03.png');" onclick="location.href='/User/berita';">
            </div>
            <div class="swiper-slide bg-cover bg-left w-full py-20 md:py-32 lg:py-56 cursor-pointer" style="background-image: url('/img/components/carousel/carousel-04.png');" onclick="location.href='#';">
            </div>
        </div>
        <div class="hidden md:flex">
            <img class="swiper-button-prev md:ml-8" src="/img/components/icon/left-on.png" alt="icon panah kiri on">
            <img class="swiper-button-next md:mr-8" src="/img/components/icon/right-on.png" alt="icon panah kanan on">
        </div>
        <div class="swiper-pagination"></div>
    </div>
</div>
<script src="/js/carousel.js"></script>
<!-- Akhir Carousel -->