<?= $this->extend('websia/kontenWebsia/editProfile/layoutEdit.php'); ?>

<?= $this->section('contentEdit'); ?>
<div class="shadow-2xl rounded-3xl mb-8">
    <div class="p-6 font-paragraph text-primary">
        <!-- start form edit akun -->
        <form action="/User/updateAkun" method="POST" id="formEditAkun">
            <!-- tambahin form actionnya ya -->
            <div class="md:w-1/2 w-full">
                <div class="font-medium">Email:</div>
                <div class="text-black font-heading font-normal mb-2"><?= $user->email ?></div>
                <div class="text-secondary text-xs mt-6 mb-2 text-justify">Silakan masukkan kata sandi lama Anda untuk verifikasi!</div>
                <label for="passlama" class="font-medium">Kata Sandi Lama:</label>
                <?php if (session()->getFlashdata('edit-pass-fail')) { ?>
                    <p class="text-xs text-red-500 text-justify" id="errorValidPasss">
                        <?= session()->getFlashdata('edit-pass-fail') ?>
                    </p>
                <?php } ?>
                <input type="password" name="passlama" id="passlama" class="inputForm" placeholder="🞄🞄🞄🞄🞄🞄🞄🞄" required>
                <label for="passbaru" class="font-medium">Kata Sandi Baru:</label>
                <?php if (session()->getFlashdata('error-new_password') != "") { ?>
                    <p class="text-xs text-red-500 text-justify" id="errorPassBaru">
                        <?= session('error-new_password') ?>
                    </p>
                <?php } ?>
                <input type="password" name="passbaru" id="passbaru" class="inputForm" placeholder="🞄🞄🞄🞄🞄🞄🞄🞄" required>
                <label for="ulangpassbaru" class="font-medium">Ketik Ulang Kata Sandi Baru:</label>
                <?php if (session()->getFlashdata('error-conf_password') != "") { ?>
                    <p class="text-xs text-red-500 text-justify" id="errorValidPasss">
                        <?= session('error-conf_password') ?>
                    </p>
                <?php } ?>
                <input type="password" name="ulangpassbaru" id="ulangpassbaru" class="inputForm" placeholder="🞄🞄🞄🞄🞄🞄🞄🞄" required>
            </div>
            <div class="flex justify-end md:mt-12 md:mb-8 mt-8 mb-1">
                <input type="submit" value="SIMPAN" class="w-24 text-center py-1 bg-secondary hover:bg-secondaryhover text-white rounded-full cursor-pointer focus:outline-none" id="submitAkun">
            </div>
        </form>
        <!-- end form edit akun -->
    </div>
</div>

<!-- dialog box edit akun -->
<!-- kalau mau ngecek hilangin kelas hidden sama opacity-0 nya-->

<?php if (session()->getFlashdata('edit-pass-success')) { ?>
    <!-- BERHASIL edit akun -->
    <div id="berhasilEditAkun">
        <div class="fixed top-0 bottom-0 right-0 left-0 z-50 flex justify-center items-center bg-black bg-opacity-40">
            <div class="duration-700 transition-all p-3 rounded-lg flex items-center bg-greenAlert">
                <img src="/img/components/icon/check.png" class="h-5 mr-2 text-success" alt="icon berhasil">
                <p class="sm:text-base text-sm font-heading font-bold text-success"><?= session()->getFlashdata('edit-pass-success') ?></p>
            </div>
        </div>
    </div>
    <script>
        setTimeout(function() {
            $('#berhasilEditAkun').fadeOut();
        }, 1500);
    </script>
<?php }
if (session()->getFlashdata('edit-pass-fail') || session()->getFlashdata('edit-pass2-fail')) { ?>
    <!-- GAGAL edit akun -->
    <div id="gagalEditAkun">
        <div class="fixed top-0 bottom-0 right-0 left-0 z-50 flex justify-center items-center bg-black bg-opacity-40">
            <div class="duration-700 transition-all p-3 rounded-lg flex items-center bg-redAlert">
                <img src="/img/components/icon/warning.png" class="h-5 mr-2 text-danger" alt="icon warning">
                <p class="sm:text-base text-sm text-danger font-heading font-bold">Kata sandi baru gagal diperbaharui</p>
            </div>
        </div>
    </div>
    <script>
        setTimeout(function() {
            $('#gagalEditAkun').fadeOut();
        }, 1500);
    </script>
    <!-- end dialog box -->
<?php } ?>
<?= $this->endSection(); ?>