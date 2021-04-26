<?= $this->extend('websia/layoutWebsia/templateBerandaLogin.php'); ?>

<?= $this->section('content'); ?>
<div class="flex w-full flex-1">

    <!-- awal sidebar -->
    <?= $this->include('websia/kontenWebsia/searchAndFilter/sidebarFilter'); ?>
    <!-- akhir sidebar -->
    <div class="mb-8 sm:ml-0 ml-8 w-full">
        <img src="/img/components/pencarianKosong.png" class="w-96 mx-auto" alt="">
        <div class="text-primary text-center font-bold md:text-xl -mt-8 mx-auto">Hasil Pencarian Tidak Ditemukan</div>
        <hr class="border-b-2 border-t-0 w-32 border-gray-400 mx-auto">
    </div>
</div>
<script type="text/javascript" src="/js/search.js"></script>
<?= $this->endSection(); ?>