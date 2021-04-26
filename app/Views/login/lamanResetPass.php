<?= $this->extend('login/templateLogin.php'); ?>

<?= $this->section('content'); ?>

<div class="xl:w-7/12 md:w-10/12 mt-8 flex items-center">
    <form method="POST" action="" id="formResetPassword" class="rounded-3xl shadow-2xl xl:px-16 md:px-8 px-4 sm:mx-0 mx-4 w-full" data-aos="zoom-in">
        <h2 class="sm:text-2xl text-lg mb-3 font-bold text-center pt-8 text-black">ATUR ULANG KATA SANDI</h2>
        <p class="text-primary font-medium mb-4 mt-1 xl:text-base sm:text-sm text-xs text-justify">Masukkan kode token yang diterima dari email, alamat email, dan kata sandi baru.</p>
        <div class="flex sm:h-10 h-8 mb-5">
            <label for="token" class="w-1/3 text-primary font-medium flex items-center sm:text-lg text-base">Kode Token : </label>
            <input type="text" name="token" class="input pl-2 w-2/3 rounded-lg border-gray-400 outline-none text-gray-400 border-2" id=token placeholder="abc123">
        </div>
        <div class="flex sm:h-10 h-8 mb-5">
            <label for="email" class="w-1/3 text-primary font-medium flex items-center sm:text-lg text-base">Alamat Email : </label>
            <input type="text" name="email" class="input pl-2 w-2/3 rounded-lg border-gray-400 outline-none text-gray-400 border-2" id=email placeholder="mail@example.com">
        </div>
        <div class="flex sm:h-10 h-8 mb-5">
            <label for="pass" class="w-1/3 text-primary font-medium flex items-center sm:text-lg text-base">Kata Sandi Baru : </label>
            <input type="password" name="pass" class="input pl-2 w-2/3 rounded-lg border-gray-400 outline-none text-gray-400 border-2" id=pass placeholder="ketikkan kata sandi baru">
        </div>
        <div class="flex sm:h-10 h-8 mb-5">
            <label for="konfpass" class="w-1/3 text-primary font-medium flex items-center sm:text-lg text-base">Konfirmasi Kata Sandi Baru : </label>
            <input type="password" name="konfpass" class="input pl-2 w-2/3 rounded-lg border-gray-400 outline-none text-gray-400 border-2" id=konfpass placeholder="konfirmasikan kata sandi baru">
        </div>

        <div class="flex justify-center pb-10">
            <div class="sm:flex-row flex-col sm:items-center">
                <form action="">
                    <input type="submit" value="Atur Ulang Kata Sandi" id="resetPass" class="px-4 shadow-2xl sm:h-9 h-8 rounded-2xl text-base outline-none border-none bg-secondary cursor-pointer text-white duration-300 hover:bg-yellow-400 sm:w-max">
                </form>
            </div>
        </div>

    </form>
</div>

<?= $this->endSection(); ?>