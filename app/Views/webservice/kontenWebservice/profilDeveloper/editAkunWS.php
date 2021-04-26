<?= $this->extend('webservice/kontenWebservice/profilDeveloper/layoutEditWS.php'); ?>

<?= $this->section('contentEdit'); ?>
<div class="flex justify-center mb-8">
    <div class="shadow-2xl rounded-xl p-6 lg:w-full w-5/6">
        <form action="" method="POST" class="font-paragraph text-primary" id="formEditAkunDev">
            <div class="lg:w-1/2 w-full">
                <!--nanti data di sini value nya ngambil dari db nya sin, sama pesan errornya ditampilin pas validasi
                pas klik simpan nanti-->
                <!--kayaknya belum ada fungsi buat simpan sama validasinya juga di controller -->
                <label for="email" class="font-medium">Email:</label>
                <div class="text-black font-heading font-normal mb-2">iniemail@stis.ac.id</div>
                <label for="passbaru" class="font-medium">Kata Sandi Baru:</label>
                <p class="text-xs text-red-500 text-justify" id="errorPassBaru">
                    Kata sandi harus terdiri dari huruf dan angka.
                </p>
                <input type="password" name="passbaru" id="passbaru" class="inputForm mb-2" placeholder="🞄🞄🞄🞄🞄🞄🞄🞄">
                <label for="ulangpassbaru" class="font-medium">Ketik Ulang Kata Sandi Baru:</label>
                <p class="text-xs text-red-500 text-justify" id="errorValidPasss">
                    Kata sandi tidak sesuai.
                </p>
                <input type="password" name="ulangpassbaru" id="ulangpassbaru" class="inputForm mb-2" placeholder="🞄🞄🞄🞄🞄🞄🞄🞄">
                <div class="text-secondary text-justify text-xs mt-6 mb-2">
                    Silakan Masukkan Kata Sandi Lama Anda untuk Verifikasi!
                </div>
                <label for="passlama" class="font-medium">Kata Sandi Lama:</label>
                <input type="password" name="passlama" id="passlama" class="inputForm mb-2" placeholder="🞄🞄🞄🞄🞄🞄🞄🞄">
            </div>
            <div class="flex justify-end">
                <input type="submit" value="SIMPAN" class="w-24 text-center py-1 bg-secondary hover:bg-secondaryhover text-white rounded-full cursor-pointer focus:outline-none mt-8 text-sm" id="simpanAkun">
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>