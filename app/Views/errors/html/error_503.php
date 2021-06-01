<?= $this->extend('websia/layoutWebsia/templateBeranda.php'); ?>

<?= $this->section('content'); ?>
<div class="flex h-screen justify-center items-center">

    <div class="flex flex-col items-center">
        <div class="relative ">
            <img src="/img/components/halamanError/503.png" alt="Error 503" class="w-96">
            <div class="text-primary text-center font-heading font-extrabold text-5xl absolute inset-x-0 bottom-12 mx-auto"> 503</div>
        </div>
        <div class="text-primary text-center font-heading font-bold md:text-xl text-xs -mt-8 mx-auto">Maaf, server Kami sedang melakukan pemeliharaan</div>
        <hr class="border-b-2 border-t-0 w-32 border-gray-400 mx-auto">
    </div>

</div>
<?= $this->endSection(); ?>