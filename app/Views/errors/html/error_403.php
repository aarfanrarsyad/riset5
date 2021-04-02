<?= $this->extend('websia/layoutWebsia/tanpaTemplate.php'); ?>

<?= $this->section('content'); ?>
<div class="flex w-screen h-screen justify-center items-center">

    <div class="flex flex-col items-center">
        <img src="/img/halamanError/403.png" alt="" class="w-96">
        <div class="text-primary text-center font-heading font-bold md:text-xl text-xs -mt-8 mx-auto">Maaf, Anda memerlukan akses untuk mengunjungi halaman ini</div>
        <hr class="border-b-2 border-t-0 w-32 border-gray-400 mx-auto">
        <a href="">
            <button class="mt-4 py-1 px-6 text-right rounded-3xl bg-secondary border-2 border-secondary text-white hover:bg-white hover:border-2 hover:border-secondary hover:text-secondary transition-colors duration-300 font-paragraph md:text-xl text-xs focus:outline-none">Kembali</button>
        </a>
    </div>

</div>
<?= $this->endSection(); ?>