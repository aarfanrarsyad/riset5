<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/tailwind.css">
    <link rel="stylesheet" href="/css/scrollbar.css">
    <script type="text/javascript" src="/js/jquery.js"></script>
    <link rel="stylesheet" href="/css/aos.css" />
    <title>Sistem Informasi Alumni</title>
    <link rel="shortcut icon" type="image/png" href="/img/components/logo/logo_sia.png" />

    <!-- link utk manggil font nya  -->
    <!-- <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"> -->
    <link rel="stylesheet" href="/css/font.css">

    <style>
        .tombol {
            background-image: linear-gradient(to right, #fcd171, #fab926, #faee26);
            background-size: 200% auto;
        }

        .tombol:hover {
            background-position: right;
        }

        #headerLogin {
            background-image: url('/img/components/bgHeader.png');
        }

        @media (min-width: 640px) {
            #kosong {
                height: 53px;
            }
        }

        @media (min-width: 768px) {
            #kosong {
                height: 75px;
            }
        }

        @media (max-width: 640px) {
            #kosong {
                height: 45px;
            }
        }

        @media (max-width: 385px) {
            #kosong {
                height: 64px;
            }
        }

        body div.loading {
            background: #fff center;
        }
    </style>

</head>

<!-- CATATAN: Font Cabin belum bisa dipakai, kayaknya ada salah waktu konfigurasi di Tailwind nya, coba bantu cek lagi ya guys! Sama font Poppins nya masih tebel banget, gabisa diganti jenis ketebalannya... -->

<body class="flex min-h-screen flex-col w-screen overflow-x-hidden font-paragraph">
    <!-- loading -->
    <div class="loading flex fixed w-full h-screen z-50 transition-opacity duration-200">
        <img src="/img/components/load.gif" alt="loading gif" class="m-auto items-center md:w-96 sm:w-72 w-60">
    </div>
    <!-- loading -->
    <!-- HEADER -->
    <div id="headerLogin" class="bg-primary md:px-12 sm:px-8 px-4 w-full navbar fixed z-20 bg-no-repeat bg-cover bg-left">

        <div class="flex justify-between sm:my-2 my-1">
            <div class="font-heading flex items-center sm:gap-x-6 gap-x-3">
                <a href="<?= base_url(); ?>">
                    <img src="/img/components/logo/logo_sia.png" class="z-50 md:w-16 w-10" alt="logo SIA">
                </a>
                <div class="md:px-3 px-2 my-auto text-white z-50">
                    <p class="font-heading text-lg md:text-2xl font-semibold">Sistem Informasi Alumni</p>
                    <p class="font-heading md:text-xs font-normal hidden md:block -mt-1.5">Akademi Ilmu Statistik - Sekolah Tinggi Ilmu Statistik - Politeknik Statistika STIS</p>
                </div>
            </div>
        </div>

    </div>
    <!-- END HEADER -->
    <div class="bg-primary w-full lg:h-16 md:h-16 h-10 z-10" id="kosong">
    </div>
    <!-- CONTENT PAGE DI SINI -->
    <div class="w-full flex flex-1 justify-center">
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
            <div class="flex flex-col text-white font-heading mx-auto md:mx-5 mt-4 md:mt-0">
                <a href="https://pkl.stis.ac.id/60/" class="mb-2 hover:text-secondary">
                    <h3 class="underline md:no-underline">Website PKL60</h3>
                </a>
                <a href="/developer" class="hover:text-secondary">
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
    <script type="text/javascript" src="/js/login.js"></script>
    <script type="text/javascript" src="/js/navbar.js"></script>
    <script src="/js/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>