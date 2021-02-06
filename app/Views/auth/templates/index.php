<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="/css/output.css" rel="stylesheet">

    <title>Riset 5</title>
</head>


<body>
    <div class="flex flex-col  w-full h-screen">

        <!-- navbar -->
        <div class="w-full px-1 py-2 md:px-3 shadow-lg">
            <div class="mx-6 block md:flex justify-between">
                <div class="flex flex-grow justify-between md:justify-start ">
                    <a href="/" class="flex ">

                        <!-- logo polstat stis -->
                        <img src="/img/STISlogo.png" alt="" class="rounded-full w-12 h-12 my-auto md:w-16 md:h-16">
                        <!-- logo polstat stis -->

                        <!-- judul web -->
                        <div class="block ml-1 p-2">
                            <div class="text-xs md:text-lg  font-bold text-blue-500">SISTEM INFORMASI DATABASE</div>
                            <div class="text-xs md:text-lg font-bold text-blue-500">ALUMNI AIS/STIS/POLSTAT STIS</div>
                        </div>
                        <!-- judul web -->
                    </a>
                    <div class="my-auto md:hidden" id="menu">
                        <svg class="w-6 h-6 cursor-pointer" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </div>
                </div>
                <div class="block md:flex my-auto md:my-auto hidden" id="submenu">
                    <div class="text-xs md:text-base font-semibold text-center mx-4 mt-1 md:mt-0 py-1 px-2 hover:bg-gray-100"> <a href="<?= base_url('login')?>"> Login </a></div>
                </div>
            </div>
        </div>
        <!-- navbar -->

        <!-- konten -->
        <?= $this->renderSection('content') ?>
        <!-- konten -->

        <!-- footer -->
        <div class="text-sm font-medium text-center mb-4">Copyright &copy;2020 PKL STIS 60</div>
        <!-- footer -->

    </div>

    <script src="/js/navbar.js"></script>

</body>


</html>