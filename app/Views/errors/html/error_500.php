<?= $this->extend('websia/layoutWebsia/templateBeranda.php'); ?>

<?= $this->section('content'); ?>
<div class="flex h-screen justify-center items-center">

    <div class="flex flex-col items-center">
        <div class="relative ">
            <img src="/img/components/halamanError/500.png" alt="" class="w-96">
            <div class="text-primary text-center font-heading font-extrabold text-5xl absolute inset-x-0 bottom-16 mx-auto"> 500</div>
        </div>
        <div class="text-primary text-center font-heading font-bold md:text-xl text-xs -mt-8 mx-auto">Maaf, server Kami sedang mengalami masalah</div>
        <hr class="border-b-2 border-t-0 w-32 border-gray-400 mx-auto">
    </div>

</div>
<?= $this->endSection(); ?>