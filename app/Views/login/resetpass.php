<?= $this->extend('login/templateLogin.php'); ?>

<?= $this->section('content'); ?>

<div class="xl:w-8/12 md:w-10/12">
    <form method="POST" action="" class="rounded-3xl shadow-2xl xl:px-16 md:px-8 px-8 sm:mx-0 mx-4">
        <h2 class="sm:text-2xl text-lg mb-3 font-bold text-center pt-8 text-primary">ATUR ULANG KATA SANDI</h2>
        <div class="pl-3 bg-green-300 rounded-full flex items-center <?php if (!session('errors.email')) : ?>hidden<?php endif; ?>">
            <img src="/img/icon/check.png" class="h-5 mr-1">
            <p class="text-green-700 sm:text-base text-sm">Kata sandi baru telah dikirim.</p>
        </div>
        <div class="pl-3 bg-red-400 rounded-full flex items-center <?php if (!session('errors.email')) : ?>hidden<?php endif; ?>">
            <img src="/img/icon/false.png" class="h-5 mr-1">
            <p class="text-red-800 sm:text-base text-sm">Email tidak terdaftar. Mohon periksa kembali.</p>
        </div>
        <p class="text-primary font-medium mb-4 mt-1 xl:text-base sm:text-sm text-xs">Masukkan email yang terdaftar. Kata sandi baru akan dikirimkan melalui email tersebut.</p>
        <div class="flex sm:h-10 h-8 mb-5">
            <label for="email" class="w-1/4 text-primary font-medium flex items-center sm:text-lg text-base">Email</label>
            <input type="text" name="email" class="input pl-2 w-3/4 rounded-lg border-gray-400 outline-none text-gray-400 border-2" id=email placeholder="Ketik email di sini">
        </div>

        <div class="flex pb-10">
            <div class="w-1/4">
            </div>
            <div class="w-3/4 flex sm:flex-row flex-col sm:items-center">
                <form action="">
                    <input type="submit" class="px-8 shadow-2xl sm:h-9 h-8 rounded-2xl text-base outline-none border-none bg-secondary cursor-pointer text-white duration-300 hover:bg-yellow-400 sm:w-max w-1/2" value="Kirim">
                    <a href="/login" class="text-secondary text-sm font-medium sm:ml-6 ml-0 mt-2 sm:mt-0">Kembali ke laman login</a>
                </form>
            </div>
        </div>

    </form>
</div>

<?= $this->endSection(); ?>