<?= $this->extend('login/templateLogin.php'); ?>

<?= $this->section('content'); ?>

<div class="xl:w-7/12 md:w-10/12 mt-8 flex items-center">
    <form method="POST" action="" id="formResetPassword" class="rounded-3xl shadow-2xl xl:px-16 md:px-8 px-4 sm:mx-0 mx-4 w-full" data-aos="zoom-in">

        <?= csrf_field() ?>
        <h2 class="sm:text-2xl text-lg mb-3 font-bold text-center pt-8 text-primary">ATUR ULANG KATA SANDI</h2>
        <div class="pl-3 bg-green-400 rounded-full flex items-center 
            <?php if (session('message') == "A security token has been emailed to you. Enter it in the box below to continue.") : ?>
                is-invalid
            <?php else : ?>
                hidden
            <?php endif; ?>">
            <img src="/img/components/icon/check.png" class="h-5 mr-1" alt="icon check">
            <p class="text-red-900 sm:text-base text-sm">Token keamanan telah dikirim melalui email kepada Anda.</p>
        </div>
        <div class="pl-3 bg-red-400 rounded-full flex items-center 
            <?php if (session('error') == "Unable to locate a user with that email.") : ?>
                is-invalid
            <?php else : ?>
                hidden
            <?php endif; ?>">
            <img src="/img/components/icon/false.png" class="h-5 mr-1" alt="icon false">
            <p class="text-red-900 sm:text-base text-sm">Tidak dapat menemukan pengguna dengan email tersebut. Periksa kembali penulisan token atau email yang Anda masukkan.</p>
        </div>
        <div class="pl-3 bg-red-400 rounded-full flex items-center 
            <?php if (session('error') == "Sorry. Your reset token has expired.") : ?>
                is-invalid
            <?php else : ?>
                hidden
            <?php endif; ?>">
            <img src="/img/components/icon/false.png" class="h-5 mr-1" alt="icon false">
            <p class="text-red-900 sm:text-base text-sm">Maaf. Token Anda telah kedaluwarsa.</p>
        </div>
        <div class="pl-3 bg-red-400 rounded-full flex items-center 
            <?php if ((session('errors.token') == "The token field is required.") or (session('errors.email') == "The email field is required.") or (session('errors.password') == "The password field is required.") or (session('errors.pass_confirm') == "The pass_confirm field is required.")) : ?> 
                is-invalid
            <?php else : ?>
                hidden
            <?php endif; ?>">
            <img src="/img/components/icon/false.png" class="h-5 mr-1" alt="icon false">
            <p class="text-red-900 sm:text-base text-sm">Semua bidang (field) harus diisi.</p>
        </div>
        <div class="pl-3 bg-red-400 rounded-full flex items-center 
            <?php if (session('errors.password') == "Passwords must be at least 8 characters long.") : ?> 
                is-invalid
            <?php else : ?>
                hidden
            <?php endif; ?>">
            <img src="/img/components/icon/false.png" class="h-5 mr-1" alt="icon false">
            <p class="text-red-900 sm:text-base text-sm">Kata Sandi minimal terdiri dari 8 karakter.</p>
        </div>
        <div class="pl-3 bg-red-400 rounded-full flex items-center 
            <?php if (session('errors.password') == "Password must not be a common password.") : ?> 
                is-invalid
            <?php else : ?>
                hidden
            <?php endif; ?>">
            <img src="/img/components/icon/false.png" class="h-5 mr-1" alt="icon false">
            <p class="text-red-900 sm:text-base text-sm">Kata Sandi yang Anda masukkan sudah umum digunakan. Harap gunakan kata sandi lain.</p>
        </div>
        <div class="pl-3 bg-red-400 rounded-full flex items-center 
            <?php $pesan = session('errors.password');
            $pesan1 = "times in databases of compromised passwords.";
            if (strpos($pesan, $pesan1) !== false) : ?> 
                is-invalid
            <?php else : ?>
                hidden
            <?php endif; ?>">
            <img src="/img/components/icon/false.png" class="h-5 mr-1" alt="icon false">
            <p class="text-red-900 sm:text-base text-sm">Kata Sandi Baru yang Anda masukkan pernah terekspos. Harap gunakan kata sandi lain.</p>
        </div>
        <div class="pl-3 bg-red-400 rounded-full flex items-center 
            <?php if (session('errors.pass_confirm') == "The pass_confirm field does not match the password field.") : ?> 
                is-invalid
            <?php else : ?>
                hidden
            <?php endif; ?>">
            <img src="/img/components/icon/false.png" class="h-5 mr-1" alt="icon false">
            <p class="text-red-900 sm:text-base text-sm">Konfirmasi Kata Sandi Baru tidak cocok dengan Kata Sandi Baru.</p>
        </div>
        <p class="text-primary font-medium mb-4 mt-1 xl:text-base sm:text-sm text-xs text-justify">Masukkan kode token yang diterima dari email, alamat email, dan kata sandi baru.</p>
        <div class="flex sm:h-10 h-8 mb-5">
            <label for="token" class="w-1/3 text-primary font-medium flex items-center sm:text-lg text-base">Kode Token : </label>
            <input type="text" name="token" class="input pl-2 w-2/3 rounded-lg border-gray-400 outline-none text-black border-2" id="token" placeholder="abc123" value="<?= old('token', $token ?? '') ?>">
        </div>
        <div class="flex sm:h-10 h-8 mb-5">
            <label for="email" class="w-1/3 text-primary font-medium flex items-center sm:text-lg text-base">Alamat Email : </label>
            <input type="email" name="email" class="input pl-2 w-2/3 rounded-lg border-gray-400 outline-none text-black border-2" aria-describedby="emailHelp" id="email" placeholder="mail@example.com" value="<?= old('email') ?>">
        </div>
        <div class="flex sm:h-10 h-8 mb-5">
            <label for="password" class="w-1/3 text-primary font-medium flex items-center sm:text-lg text-base">Kata Sandi Baru : </label>
            <input type="password" name="password" class="input pl-2 w-2/3 rounded-lg border-gray-400 outline-none text-black border-2" id="password" placeholder="Ketikkan kata sandi baru">
        </div>
        <div class="flex sm:h-10 h-8 mb-5">
            <label for="pass_confirm" class="w-1/3 text-primary font-medium flex items-center sm:text-lg text-base">Konfirmasi Kata Sandi Baru : </label>
            <input type="password" name="pass_confirm" class="input pl-2 w-2/3 rounded-lg border-gray-400 outline-none text-black border-2" id="pass_confirm" placeholder="Konfirmasi kata sandi baru">
        </div>

        <div class="flex justify-center pb-10">
            <div class="sm:flex-row flex-col sm:items-center">
                <input type="submit" value="Atur Ulang Kata Sandi" id="resetPass" class="px-4 shadow-2xl sm:h-9 h-8 rounded-2xl text-base outline-none border-none bg-secondary cursor-pointer text-white duration-300 hover:bg-yellow-400 sm:w-max">
            </div>
        </div>

    </form>
</div>

<?= $this->endSection(); ?>