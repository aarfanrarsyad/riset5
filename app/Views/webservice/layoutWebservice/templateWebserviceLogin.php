<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/tailwind.css">
    <link rel="stylesheet" href="/css/scrollbar.css">
    <link rel="stylesheet" href="/css/add_style.css">
    <link rel="stylesheet" href="/css/aos.css" />
    <script type="text/javascript" src="/js/jquery.js"></script>
    <title><?= $judul; ?></title>

    <!-- link utk manggil font nya  -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

</head>

<body class="flex min-h-screen flex-col overflow-x-hidden">

    <!-- loading -->
    <div class="loading flex fixed w-full h-screen z-50 transition-opacity duration-200">
        <img src="/img/components/load.gif" class="m-auto items-center md:w-96 sm:w-72 w-60" alt="loading gif">
    </div>
    <!-- loading -->
    <!-- tombol kembali ke atas -->
    <button onclick="topFunction()" id="onTopBtn" title="Kembali ke Atas" class="hidden fixed bottom-5 right-8 w-10 h-10 p-1 cursor-pointer rounded-full border-none focus:outline-none z-50 bg-secondary">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white mx-auto" fill="currentColor" class="bi bi-caret-up-fill" viewBox="0 0 16 16">
            <path d="M7.247 4.86l-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z" />
        </svg>
    </button>

    <!-- HEADER -->
    <div class="bg-primary lg:px-12 sm:px-8 px-4 w-full navbar fixed z-30 bg-no-repeat bg-cover bg-left" style="background-image: url(/img/components/bgHeaderWS.png)">

        <div class="flex justify-between sm:my-2 my-1">
            <div class="font-heading flex items-center gap-x-1 lg:gap-x-3">
                <a href="<?= base_url(); ?>">
                    <img src="/img/components/logo/logo_sia.png" class="md:w-16 w-10" alt="logo SIA">
                </a>
                <div class="md:px-3 px-2 my-auto text-white">
                    <p class="font-heading text-lg lg:text-2xl font-semibold">Webservice Sistem Informasi Alumni</p>
                    <p class="font-heading md:text-xs font-normal hidden md:block lg:-mt-1.5">Akademi Ilmu Statistik - Sekolah Tinggi Ilmu Statistik - Politeknik Statistika STIS</p>
                </div>
            </div>
            <div id="nav" class="hidden sm:flex sm:items-center">
                <ul class="flex lg:gap-x-6 md:gap-x-4 gap-x-2 relative">
                    <a href="/developer/">
                        <li class="bg-secondary text-white py-1.5 sm:px-1 md:w-24 text-center cursor-pointer border-secondary border-2 hover:text-secondary hover:bg-white transition-colors duration-300">BERANDA</li>
                    </a>
                    <li class="bg-secondary text-white py-1.5 sm:px-1 md:w-24 text-center cursor-pointer border-secondary border-2 hover:text-secondary hover:bg-white transition-colors duration-300 relative">API
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 inline" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                        <ul class="text-secondary absolute top-9 -left-0.5 overflow-hidden transition-all max-h-0 bg-white duration-300 menuWebService">
                            <a href="/developer/dokumentasi">
                                <li class="list hover:text-white py-1.5 text-left border-l-2 border-b-2 border-t-2 border-r-2 border-secondary transiton duration-300 px-3">DOKUMENTASI</li>
                            </a>
                            <?php if ($statusLog == 1) { ?>
                                <a href="/developer/proyek">
                                    <li class="list hover:text-white py-1.5 text-left border-l-2 border-b-2 border-r-2 border-secondary transiton duration-300 px-3">PROYEK</li>
                                </a>
                            <?php } ?>
                        </ul>
                    </li>
                    <?php if ($statusLog == 1) { ?>
                        <a href="/developer/edit/akun">
                            <li class="bg-secondary text-white py-1.5 sm:px-1 md:w-24 text-center cursor-pointer border-secondary border-2 hover:text-secondary hover:bg-white transition-colors duration-300">EDIT AKUN</li>
                        </a>
                        <a href="/logout">
                            <li class="bg-secondary text-white py-1.5 sm:px-1 md:w-24 text-center cursor-pointer border-secondary border-2 hover:text-secondary hover:bg-white transition-colors duration-300">KELUAR</li>
                        </a>
                    <?php } else { ?>
                        <a href="/login">
                            <li class="bg-secondary text-white py-1.5 sm:px-1 md:w-24 text-center cursor-pointer border-secondary border-2 hover:text-secondary hover:bg-white transition-colors duration-300">LOGIN</li>
                        </a>
                    <?php } ?>
                </ul>
            </div>


            <svg id="hamburgerApi" class="w-8 select-none cursor-pointer fill-current block text-white hover:text-gray-200 focus:text-gray-200 sm:hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>

        </div>

        <div class="sm:hidden hidden menuWebService navbar" id="menuApi">
            <div class="menu border-b flex justify-center">
                <ul class="w-min">
                    <a href="/developer/">
                        <li class="cursor-pointer flex justify-center text-white py-1">
                            <div class="bg-secondary w-28 flex justify-center hover:bg-white hover:text-secondary py-0.5">BERANDA</div>
                        </li>
                    </a>
                </ul>
            </div>
            <div class="menu border-t border-b flex justify-center">
                <ul class="w-min" id="navmobile">
                    <li class="cursor-pointer flex justify-center text-white py-1">
                        <div class="bg-secondary w-28 flex justify-center hover:bg-white hover:text-secondary py-0.5">API<svg xmlns="http://www.w3.org/2000/svg" class="w-4 inline" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg></div>
                    </li>
                    <ul class="transform -translate-y-0.5 text-white w-screen flex flex-col items-center hidden block">
                        <a href="/developer/dokumentasi">
                            <li class="list m-auto hover:text-white bg-white text-center text-secondary text-sm py-0.5 w-44 border-b-2 border-gray-500">DOKUMENTASI</li>
                        </a>
                        <a href="/developer/proyek">
                            <li class="list m-auto hover:text-white bg-white text-center text-secondary text-sm py-0.5 w-44 border-gray-500">PROYEK</li>
                        </a>
                    </ul>
                </ul>
            </div>
            <div class="menu border-b flex justify-center">
                <ul class="w-min">
                    <a href="/developer/edit/akun">
                        <li class="cursor-pointer flex justify-center text-white py-1">
                            <div class="bg-secondary w-28 flex justify-center hover:bg-white hover:text-secondary py-0.5">EDIT AKUN</div>
                        </li>
                    </a>
                </ul>
            </div>
            <div class="menu flex justify-center">
                <ul class="w-min">
                    <a href="/logout/">
                        <li class="cursor-pointer flex justify-center text-white py-1">
                            <div class="bg-secondary w-28 flex justify-center hover:bg-white hover:text-secondary py-0.5">KELUAR</div>
                        </li>
                    </a>
                </ul>
            </div>
        </div>

    </div>
    <!-- END HEADER -->
    <div id="divKosong" class="bg-primary w-full z-20 md:h-20 sm:h-16 h-10"></div>
    </div>
    <!-- CONTENT PAGE DI SINI -->
    <div class="w-full flex flex-1">
        <?= $this->renderSection('content'); ?>
    </div>
    <!-- END CONTENT PAGE -->

    <!-- FOOTER -->
    <div class="bg-primary w-full  pt-6 pb-3 lg:px-20 md:px-8 px-3 ">
        <div class="flex flex-col md:flex-row md:justify-around md:text-sm text-xs">
            <!-- awal footer stis -->
            <div class="flex items-center gap-x-2 mx-auto md:mx-0">
                <div class="w-36 md:w-auto">
                    <a href="https://stis.ac.id/"><img class="lg:w-24 lg:h-24 w-20 h-20" src="/img/components/logo/logo_stis.png" alt="logo STIS"></a>
                </div>
                <div class="text-white font-heading">
                    <h3>Jl. Otto Iskandardinata No.64C Jakarta 13330</h3>
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
            <div class="flex  gap-x-2 md:mt-0 mx-auto md:mx-0">
                <a href="https://haisstis.org/"><img class="lg:h-28 h-20 w-36 lg:w-auto" src="/img/components/logo/logo_haisstis.png" alt="logo HAISSTIS"></a>
            </div>
            <!-- akhir footer haistis -->

            <!-- awal link ke webservice  -->
            <div class="flex flex-col text-white font-heading mx-auto md:mx-5 mt-4 md:mt-0">
                <a href="/" class="mb-2 hover:text-secondary">
                    <h3 class="underline md:no-underline">Website PKL60</h3>
                </a>
                <a href="/webservice/" class="hover:text-secondary">
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
    <script type="text/javascript" src="/js/loading.js"></script>
    <script type="text/javascript" src="/js/onTopBtn.js"></script>
    <script type="text/javascript" src="/js/navbar.js"></script>
    <script src="/js/aos.js"></script>
    <script type="text/javascript" src="/js/footer.js"></script>
    <!-- <script type="text/javascript" src="/js/editProfil.js"></script> -->
    <script type="text/javascript" src="/js/webservices.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>