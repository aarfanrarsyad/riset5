<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/aos.css" />
    <link rel="stylesheet" href="/css/leaflet.css">
    <link rel="stylesheet" href="/css/navbar.css">
    <link rel="stylesheet" href="/css/output.css">
    <link rel="stylesheet" href="/css/scrollbar.css">
    <script type="text/javascript" src="/js/jquery.js"></script>
    <title><?php echo $judulHalaman ?></title>
</head>

<!-- CATATAN: Font Cabin belum bisa dipakai, kayaknya ada salah waktu konfigurasi di Tailwind nya, coba bantu cek lagi ya guys! Sama font Poppins nya masih tebel banget, gabisa diganti jenis ketebalannya... -->

<body>
    <!-- HEADER -->
    <div class="navbar w-full fixed z-10 bg-cover bg-no-repeat bg-left" style="background-image: url(/img/bgHeader.png)" id="navbar">
        <header>
            <div class="flex items-center justify-between px-6 pt-3">
                <div class="flex">
                    <a href="<?= base_url(); ?>">
                        <img src="/img/logoSIA.png" class=" z-50 md:w-16 w-10" alt="">
                    </a>
                    <div class="md:px-3 px-2 my-auto md:text-2xl text-base text-white font-heading font-light z-50">
                        Sistem Informasi Alumni
                    </div>
                </div>

                <button type="button" class="font-paragraph font-medium flex px-3 md:px-5 md:py-2 py-1 my-auto rounded-3xl shadow-sm md:text-base text-xs text-white bg-secondary hover:bg-secondaryhover transition-colors duration-200">
                    <a href="/login">MASUK</a>
                </button>
            </div>
        </header>
    </div>
    <div class="w-full md:h-24 h-12 bg-primary">
        <!-- Codingan Navbar Taruh Sini juga buat semacam marginnya -->
    </div>
    <!-- END HEADER -->

    <!-- CONTENT PAGE DI SINI -->
    <div class="w-full">
        <?= $this->renderSection('content'); ?>
    </div>
    <!-- END CONTENT PAGE -->

    <!-- FOOTER -->
    <div class="bg-primary w-full mt-4 pt-6 pb-3 lg:px-20 md:px-8 px-2 ">
        <div class="flex flex-col md:flex-row md:justify-around lg:text-base text-sm ">

            <!-- awal footer stis -->
            <div class="flex items-center gap-x-2 mx-auto md:mx-0">
                <div class="w-36 md:w-auto">
                    <a href="https://stis.ac.id/"><img class="w-24 h-24" src="/img/STISlogo.png" alt=""></a>
                </div>
                <div class="text-white font-heading">
                    <h3>Jalan Otto Iskandardinatta</h3>
                    <h3>64C Jakarta 13330</h3>
                    <h3>08967xxxxx</h3>
                    <div class="flex gap-x-2 mt-2">
                        <a href="https://www.facebook.com/PolstatSTIS/"><img class="h-6" src="/img/facebook.png" alt=""></a>
                        <a href="https://www.youtube.com/channel/UCwmpr4lmrApoGRpq4TcmsvA"><svg width="33" height="26" viewBox="0 0 33 26" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <rect x="0.405396" y="0.972961" width="31.7838" height="24.1608" fill="url(#pattern0)" />
                                <defs>
                                    <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                                        <use xlink:href="#image0" transform="scale(0.00406504 0.00534759)" />
                                    </pattern>
                                    <image id="image0" width="246" height="187" xlink:href="data:image/png;base64,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" />
                                </defs>
                            </svg>
                        </a>
                        <a href="https://twitter.com/stisjkt"><img class="h-6" src="/img/twitter.png" alt=""></a>
                        <a href="https://www.instagram.com/polstatstis/"><img class="h-6" src="/img/instagram.png" alt=""></a>
                    </div>
                </div>
            </div>
            <!-- akhir footer stis -->

            <!-- awal footer haistis -->
            <div class="flex items-center mt-4 gap-x-2 md:mt-0 mx-auto md:mx-0">
                <a href="https://haisstis.org/"><img class="md:h-24 h-20 w-36 md:w-auto" src="/img/logo_haisstis1.png" alt=""></a>
                <div class="text-white font-heading">
                    <h3>Jalan Otto Iskandardinatta</h3>
                    <h3>64C Jakarta 13330</h3>
                    <h3>08967xxxxx</h3>
                    <div class="flex gap-x-2 mt-2">
                        <a href=""><img class="h-6" src="/img/facebook.png" alt=""></a>
                        <a href=""><svg width="33" height="26" viewBox="0 0 33 26" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <rect x="0.405396" y="0.972961" width="31.7838" height="24.1608" fill="url(#pattern0)" />
                                <defs>
                                    <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                                        <use xlink:href="#image0" transform="scale(0.00406504 0.00534759)" />
                                    </pattern>
                                    <image id="image0" width="246" height="187" xlink:href="data:image/png;base64,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" />
                                </defs>
                            </svg>
                        </a>
                        <a href="https://twitter.com/haisstis"><img class="h-6" src="/img/twitter.png" alt=""></a>
                        <a href=""><img class="h-6" src="/img/instagram.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- akhir footer haistis -->

        <hr class="text-white mt-2 border-2">
        <h2 class="text-white text-center mt-3">Copyright &copy; PKL 60 Riset 5</h2>
    </div>
    <!-- END FOOTER -->
</body>

<script src="/js/aos.js"></script>
<script>
    AOS.init();
</script>
<script type="text/javascript" src="/js/navbar.js"></script>

</html>