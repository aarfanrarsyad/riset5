<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/aos.css" />
    <link rel="stylesheet" href="/css/leaflet.css">
    <link rel="stylesheet" href="/css/navbar.css">
    <link rel="stylesheet" href="/css/tailwind.css">
    <link rel="stylesheet" href="/css/add_style.css">
    <link rel="stylesheet" href="/css/scrollbar.css">
    <script type="text/javascript" src="/js/jquery.js"></script>
    <title><?php echo $judulHalaman ?></title>
    <link rel="shortcut icon" type="image/png" href="/img/components/logo/logo_sia.png" />


    <!-- link utk manggil font nya  -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

</head>

<body>
    <!-- loading -->
    <div class="loading flex fixed w-full h-screen z-50 transition-opacity duration-200">
        <img src="/img/components/load.gif" alt="loading gif" class="m-auto items-center md:w-96 sm:w-72 w-60">
    </div>
    <!-- loading -->
    <!-- tombol kembali ke atas -->
    <button onclick="topFunction()" id="onTopBtn" title="Kembali ke Atas" class="hidden fixed bottom-5 right-8 w-10 h-10 p-1 cursor-pointer rounded-full border-none focus:outline-none z-50 bg-secondary">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white mx-auto" fill="currentColor" class="bi bi-caret-up-fill" viewBox="0 0 16 16">
            <path d="M7.247 4.86l-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z" />
        </svg>
    </button>

    <!-- HEADER -->
    <div class="navbar w-full fixed z-30 bg-cover bg-no-repeat bg-left" style="background-image: url(/img/components/bgHeader.png)" id="navbar">
        <div class="navbar w-full fixed z-30 bg-cover bg-no-repeat bg-left" style="background-image: url(/img/components/bgHeader.png)" id="navbar">
            <header>
                <div class="flex items-center justify-between px-6 pt-3">
                    <div class="flex">
                        <a href="<?= base_url(); ?>">
                            <img src="/img/components/logo/logo_sia.png" class=" z-50 md:w-16 w-10" alt="logo SIA">
                        </a>
                        <div class="md:px-3 px-2 my-auto text-white z-50">
                            <p class="font-heading text-lg md:text-2xl font-semibold">Sistem Informasi Alumni</p>
                            <p class="font-heading md:text-xs font-normal hidden md:block -mt-1.5">Akademi Ilmu Statistik - Sekolah Tinggi Ilmu Statistik - Politeknik Statistika STIS</p>
                        </div>
                    </div>

                    <a href="/login">
                        <button type="button" class="font-paragraph font-medium flex px-3 md:px-5 md:py-2 py-1 my-auto rounded-3xl shadow-sm md:text-base text-xs text-white bg-secondary hover:bg-secondaryhover transition-colors duration-200 focus:outline-none">
                            MASUK
                        </button>
                    </a>
                </div>
            </header>
        </div>
    </div>
    <div class="w-full md:h-18 h-12 bg-primary">
        <!-- Codingan Navbar Taruh Sini juga buat semacam marginnya -->
    </div>
    <!-- END HEADER -->

    <!-- CONTENT PAGE DI SINI -->
    <div class="w-full">
        <?= $this->renderSection('content'); ?>
    </div>
    <!-- END CONTENT PAGE -->

    <!-- FOOTER -->
    <div class="bg-primary w-full pt-6 pb-3 lg:px-20 md:px-8 px-3">
        <div class="flex flex-col md:flex-row md:justify-around md:text-sm text-xs items-center md:items-start">
            <!-- awal footer stis -->
            <div class="flex  gap-x-2 mx-auto md:mx-0 mb-2 md:mb-0">
                <div class=" md:w-auto">
                    <a href="https://stis.ac.id/"><img class="lg:w-24 lg:h-24 w-20 h-20" src="/img/components/logo/logo_stis.png" alt="logo STIS"></a>
                </div>
                <div class="text-white font-heading">
                    <h3>Jl. Otto Iskandardinata </h3>
                    <h3>No.64C Jakarta 13330</h3>
                    <h3>Telp. (021) 8191437, 8508812</h3>
                    <h3>Fax. (021) 8197577</h3>
                    <div class="flex gap-x-2 mt-2">
                        <a href="https://www.facebook.com/PolstatSTIS/"><img class="lg:h-6 h-4" src="/img/components/icon/facebook.png" alt="icon facebook"></a>
                        <a href="https://www.youtube.com/channel/UCwmpr4lmrApoGRpq4TcmsvA"><img class="lg:h-6 h-4" src="/img/components/icon/youtube.png" alt="icon youtube"></a>
                        <a href="https://twitter.com/stisjkt"><img class="lg:h-6 h-4" src="/img/components/icon/twitter.png" alt="icon twitter"></a>
                        <a href="https://www.instagram.com/polstatstis/"><img class="lg:h-6 h-4" src="/img/components/icon/instagram.png" alt="icon instagram"></a>
                    </div>
                </div>
            </div>
            <!-- akhir footer stis -->

            <!-- awal footer haistis -->
            <div class="md:mt-0 mx-auto md:mx-0 mb-2 md:mb-0">
                <a href="https://haisstis.org/"><img class="lg:h-28 h-20 w-36 lg:w-auto lg:-mt-6" src="/img/components/logo/logo_haisstis.png" alt="logo HAISSTIS"></a>
                <div class="flex justify-start gap-x-2 -mt-2 lg:-mt-4">
                    <div><img class="lg:h-5 h-4" src="/img/components/icon/message_white.png" alt="icon message"></div>
                    <div>
                        <h3 class="text-white font-heading">sia@stis.ac.id</h3>
                    </div>
                </div>
            </div>
            <!-- akhir footer haistis -->

            <!-- awal link ke webservice  -->
            <div class="flex flex-col text-white font-heading mx-auto md:mx-5 mt-4 md:mt-0 mb-2 md:mb-0">
                <a href="https://pkl.stis.ac.id/60/" class="mb-2 hover:text-secondary">
                    <h3 class="underline md:no-underline">Website PKL60</h3>
                </a>
                <a href="/developer/" class="hover:text-secondary">
                    <h3 class="underline md:no-underline">Webservice(API)</h3>
                </a>
            </div>
            <!-- akhir link ke webservice  -->

        </div>

        <div class="flex items-center mt-4">
            <div class="flex-grow">
                <hr class="text-white bg-white border my-auto">
            </div>
        </div>

        <h2 class="text-white text-sm text-center mt-1">Copyright &copy; PKL 60 Riset 5</h2>
    </div>
    <!-- END FOOTER -->
</body>
<script type="text/javascript" src="/js/loading.js"></script>
<script src="/js/aos.js"></script>
<script>
    AOS.init();
</script>
<script type="text/javascript" src="/js/navbar.js"></script>
<script type="text/javascript" src="/js/onTopBtn.js"></script>
<script type="text/javascript" src="/js/footer.js"></script>
<script type="text/javascript" src="/js/berita.js"></script>

</html>