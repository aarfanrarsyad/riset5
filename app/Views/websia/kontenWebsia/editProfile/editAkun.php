<?= $this->extend('websia/kontenWebsia/editProfile/layoutEdit.php'); ?>

<?= $this->section('contentEdit'); ?>
<div class="shadow-2xl rounded-3xl mb-8">
    <div class="p-6 font-paragraph text-primary lg:min-h-screen">
        <!-- start form edit akun -->
        <form action="/User/updateAkun" method="POST" id="formEditAkun">
            <!-- tambahin form actionnya ya -->
            <div class="md:w-1/2 w-full">
                <div class="font-medium">Email:</div>
                <div class="text-black font-heading font-normal mb-2"><?= $user->email ?></div>
                <label for="passbaru" class="font-medium">Kata Sandi Baru:</label>
                <p class="text-xs text-red-500 text-justify" id="errorPassBaru">
                    Kata sandi harus terdiri dari huruf dan angka.
                </p>
                <input type="password" name="passbaru" id="passbaru" class="inputForm" placeholder="🞄🞄🞄🞄🞄🞄🞄🞄">
                <label for="ulangpassbaru" class="font-medium">Ketik Ulang Kata Sandi Baru:</label>
                <p class="text-xs text-red-500 text-justify" id="errorValidPasss">
                    Kata sandi tidak sesuai.
                </p>
                <input type="password" name="ulangpassbaru" id="ulangpassbaru" class="inputForm" placeholder="🞄🞄🞄🞄🞄🞄🞄🞄">
                <div class="text-secondary text-xs mt-6 mb-2 text-justify">Silakan Masukkan Kata Sandi Lama Anda untuk Verifikasi!</div>
                <label for="passlama" class="font-medium">Kata Sandi Lama:</label>
                <input type="password" name="passlama" id="passlama" class="inputForm" placeholder="🞄🞄🞄🞄🞄🞄🞄🞄" required>
            </div>
            <div class="flex justify-end md:mb-6 mt-48">
                <input type="submit" value="SIMPAN" class="w-24 text-center py-1 bg-secondary hover:bg-secondaryhover text-white rounded-full cursor-pointer focus:outline-none" id="submitAkun">
            </div>
        </form>
        <!-- end form edit akun -->
    </div>
</div>

<!-- dialog box edit akun -->
<!-- kalau mau ngecek hilangin kelas hidden sama opacity-0 nya-->

<!-- BERHASIL edit akun -->
<div id="berhasilEditAkun">
    <div class="hidden opacity-0 fixed top-0 bottom-0 right-0 left-0 z-50 justify-center items-center bg-black bg-opacity-40">
        <div class="duration-700 transition-all p-3 rounded-lg flex items-center" style="background-color: #B1FF66;">
            <img src="/img/components/icon/check.png" class="h-5 mr-2" style="color: #54AC00;">
            <p class="sm:text-base text-sm font-heading font-bold text-success">Akun Berhasil Disimpan</p>
        </div>
    </div>
</div>
<script>
    setTimeout(function() {
        $('#berhasilEditAkun').fadeOut();
    }, 1500);
</script>
<!-- GAGAL edit akun -->
<div id="gagalEditAkun">
    <div class="hidden opacity-0 fixed top-0 bottom-0 right-0 left-0 z-50 justify-center items-center bg-black bg-opacity-40">
        <div class="duration-700 transition-all p-3 rounded-lg flex items-center" style="background-color: #FF7474;">
            <img src="/img/components/icon/warning.png" class="h-5 mr-2">
            <p class="sm:text-base text-sm font-heading font-bold" style="color: #C51800;">Akun Tidak Berhasil Disimpan</p>
        </div>
    </div>
</div>
<script>
    setTimeout(function() {
        $('#gagalEditAkun').fadeOut();
    }, 1500);
</script>
<!-- end dialog box -->
<?= $this->endSection(); ?>