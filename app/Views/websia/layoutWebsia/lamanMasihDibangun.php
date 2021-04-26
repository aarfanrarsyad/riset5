<?= $this->extend('websia/layoutWebsia/templateBerandaLogin.php'); ?>

<?= $this->section('content'); ?>

<div class="static flex justify-center my-32 md:my-16">
    <p class="absolute z-10 w-64 my-auto ml-20 pt-22 md:w-auto md:top-2/3 md:ml-8 md:text-3xl md:pt-16 text-white">
        Mohon maaf, <br>
        Laman yang Anda akses belum tersedia
    </p>
    <img src="/img/components/halamanError/laman_masih_dibangun.png" class="inline-block z-0 object-center w-10/12 h-auto md:w-8/12 ">
</div>

<?= $this->endSection(); ?>