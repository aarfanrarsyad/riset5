<?= $this->extend('webservice/layoutWebservice/templateWebserviceLogin.php'); ?>

<?= $this->section('content'); ?>
<div class="my-10 shadow-2xl rounded-xl md:p-12 md:pt-4 p-4 pb-6 xl:w-1/2 sm:w-3/4 sm:mx-auto mx-4">
    <form action="<?= base_url('developer/update'); ?>" method="POST" class="font-paragraph text-primary" id="formEditAkunDev">
        <h2 class="flex justify-center lg:text-4xl md:text-3xl sm:text-2xl text-xl text-secondary font-bold md:mb-4 mb-2">EDIT AKUN</h2>
        <div class="2xl:px-20 md:px-12 sm:px-8 px-0 w-full">
            <label for="email" class="font-medium">Email:</label>
            <input type="text" name="email" id="email" class="inputForm mb-2" placeholder="mail@example.com" value="<?= $email ?>" disabled>
            <label for="passbaru" class="font-medium">Kata Sandi Baru:</label>
            <input type="password" name="passbaru" id="passbaru" class="inputForm mb-2" placeholder="🞄🞄🞄🞄🞄🞄🞄🞄">
            <label for="ulangpassbaru" class="font-medium">Ketik Ulang Kata Sandi Baru:</label>
            <input type="password" name="ulangpassbaru" id="ulangpassbaru" class="inputForm mb-2" placeholder="🞄🞄🞄🞄🞄🞄🞄🞄">
            <div class="text-secondary text-justify text-xs mt-6 mb-2">
                Silakan Masukkan Kata Sandi Lama Anda untuk Verifikasi!
            </div>
            <label for="passlama" class="font-medium">Kata Sandi Lama:</label>
            <input type="password" name="passlama" id="passlama" class="inputForm mb-2" placeholder="🞄🞄🞄🞄🞄🞄🞄🞄">
        </div>
        <div class="flex justify-end">
            <a href="<?= base_url('developer'); ?>" class="mt-8 flex items-center mr-4">
                <div class="flex items-center gap-x-2">
                    <img src="/img/components/icon/left-on.png" class="w-3 h-3" alt="icon panah kiri on">
                    <div class="text-secondary">KEMBALI</div>
                </div>
            </a>
            <input type="submit" value="SIMPAN" class="w-24 text-center py-1 bg-secondary hover:bg-secondaryhover text-white rounded-full cursor-pointer focus:outline-none mt-8 md:text-base text-sm" id="simpanAkun">
        </div>
    </form>
</div>


<!--nanti ganti script sessionnya aja -->
<?php
if (session()->getFlashdata('edit-bio-success')) { ?>

    <!-- BERHASIL update biodata -->
    <div id="berhasilGantiSandi">
        <div class="fixed top-0 bottom-0 right-0 left-0 z-50 flex justify-center items-center bg-black bg-opacity-40">
            <div class="duration-700 transition-all p-3 rounded-lg flex items-center bg-greenAlert">
                <img src="/img/components/icon/check.png" class="h-5 mr-2 text-success" alt="kata sandi baru berhasil diperbarui">
                <p class="sm:text-base text-sm font-heading font-bold text-success"><?= session()->getFlashdata('edit-bio-success') ?></p>
            </div>
        </div>
    </div>
    <script>
        setTimeout(function() {
            $('#berhasilGantiSandi').fadeOut();
        }, 1500);
    </script>
<?php }
if (session()->getFlashdata('edit-bio-fail')) { ?>
    <!-- GAGAL update biodata -->
    <div id="gagalGantiSandi">
        <div class="fixed top-0 bottom-0 right-0 left-0 z-50 flex justify-center items-center bg-black bg-opacity-40">
            <div class="duration-700 transition-all p-3 rounded-lg flex items-center bg-redAlert">
                <img src="/img/components/icon/warning.png" class="h-5 mr-2 text-danger" alt="kata sandi baru gagal diperbarui">
                <p class="sm:text-base text-sm text-danger font-heading font-bold"><?= session()->getFlashdata('edit-bio-fail') ?></p>
            </div>
        </div>
    </div>
    <script>
        setTimeout(function() {
            $('#gagalGantiSandi').fadeOut();
        }, 1500);
    </script>
<?php } ?>
<?= $this->endSection(); ?>