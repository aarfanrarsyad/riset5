<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/navbar.css">
    <link rel="stylesheet" href="/css/output.css">
    <link rel="stylesheet" href="/css/all.css">
    <link rel="stylesheet" href="/css/scrollbar.css">
    <title>Sistem Informasi Alumni</title>

    <style>
        .tombol {
            background-image: linear-gradient(to right, #fcd171, #fab926, #faee26);
            background-size: 200% auto;
        }

        .tombol:hover {
            background-position: right;
        }
    </style>

</head>

<!-- CATATAN: Font Cabin belum bisa dipakai, kayaknya ada salah waktu konfigurasi di Tailwind nya, coba bantu cek lagi ya guys! Sama font Poppins nya masih tebel banget, gabisa diganti jenis ketebalannya... -->

<body class="flex min-h-screen flex-col w-screen">
    <!-- HEADER -->
    <div class="w-full fixed z-10 bg-cover bg-no-repeat bg-left" style="background-image: url(/img/bgHeader.png)" id="navbar">
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
            </div>
        </header>
    </div>
    <div class="w-full md:h-24 h-12 bg-primary">
        <!-- Codingan Navbar Taruh Sini juga buat semacam marginnya -->
    </div>
    <!-- END HEADER -->

    <!-- CONTENT PAGE DI SINI -->
    <div class="w-full flex flex-1 justify-center items-center xl:px-0 sm:px-3 lg:px-16 px-0">
        <?= $this->renderSection('content'); ?>
    </div>
    <!-- END CONTENT PAGE -->

    <!-- FOOTER -->
    <footer class="bg-primary w-full mt-4 pt-6 pb-3 lg:px-20 md:px-8 px-2 ">
        <div class="flex flex-col md:flex-row md:justify-around lg:text-base text-sm ">
            <div class="flex items-center gap-x-2 mx-auto md:mx-0">
                <div class="w-36 md:w-auto">
                    <a href="https://stis.ac.id/"><img class="w-24 h-24" src="/img/STISlogo.png" alt=""></a>
                </div>
                <div class="text-white font-heading">
                    <h3>Jalan Otto Iskandardinatta</h3>
                    <h3>64C Jakarta 13330</h3>
                    <h3>08967xxxxx</h3>
                    <div class="flex gap-x-2 mt-2">
                        <a href="https://www.facebook.com/PolstatSTIS/"><img class="md:h-6 h-4" src="/img/facebook.png" alt=""></a>
                        <a href="https://www.youtube.com/channel/UCwmpr4lmrApoGRpq4TcmsvA"><img src="/img/youtube.png" alt="yt" class="md:h-6 h-4">
                        </a>
                        <a href="https://twitter.com/stisjkt"><img class="md:h-6 h-4" src="/img/twitter.png" alt=""></a>
                        <a href="https://www.instagram.com/polstatstis/"><img class="md:h-6 h-4" src="/img/instagram.png" alt=""></a>
                    </div>
                </div>
            </div>

            <div class="flex items-center mt-4 gap-x-2 md:mt-0 mx-auto md:mx-0">
                <a href="https://haisstis.org/"><img class="md:h-24 h-20 w-36 md:w-auto" src="/img/logo_haisstis1.png" alt=""></a>
                <div class="text-white font-heading">
                    <h3>Jalan Otto Iskandardinatta</h3>
                    <h3>64C Jakarta 13330</h3>
                    <h3>08967xxxxx</h3>
                    <div class="flex gap-x-2 mt-2">
                        <a href=""><img class="md:h-6 h-4" src="/img/facebook.png" alt=""></a>
                        <a href=""><img src="/img/youtube.png" alt="yt" class="md:h-6 h-4">
                        </a>
                        <a href="https://twitter.com/haisstis"><img class="md:h-6 h-4" src="/img/twitter.png" alt=""></a>
                        <a href=""><img class="md:h-6 h-4" src="/img/instagram.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>

        <hr class="text-white mt-2 border-2">
        <h2 class="text-white text-center mt-3 md:text-base text-sm">Copyright &copy; PKL 60 Riset 5</h2>
    </footer>
    <!-- END FOOTER -->
    <script src="/js/login.js"></script>
</body>

</html>