<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/aos.css" />
    <link rel="stylesheet" href="/css/leaflet.css">
    <link rel="stylesheet" href="/css/tailwind.css">
    <link rel="stylesheet" href="/css/scrollbar.css">
    <script type="text/javascript" src="/js/jquery.js"></script>
    <title><?php echo $judulHalaman ?></title>
</head>

<body>
    <!-- loading -->
    <div class="loading flex fixed w-full h-screen z-50 transition-opacity duration-200">
        <img src="/img/components/loading/load1.gif" alt="loading gif" class="m-auto items-center md:w-96 sm:w-72 w-60">
    </div>
    <!-- loading -->


    <!-- CONTENT PAGE DI SINI -->
    <div class="w-full">
        <?= $this->renderSection('content'); ?>
    </div>
    <!-- END CONTENT PAGE -->
</body>
<script type="text/javascript" src="/js/loading.js"></script>

</html>