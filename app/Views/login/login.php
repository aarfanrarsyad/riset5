<?= $this->extend('login/templateLogin.php'); ?>

<?= $this->section('content'); ?>

<div class="flex sm:w-max w-11/12 px-2">
    <div class="w-full xl:mr-40 md:mr-10 mr-4 items-center sm:flex hidden">
        <img src="/img/login.png" alt="gambar login" class="">
    </div>
    <div class="w-full">
        <form method="POST" action="<?= route_to('login') ?>" class="py-8 rounded-3xl shadow-2xl flex flex-col">
            <?= csrf_field(); ?>
            <h2 class="text-2xl mb-6 mt-2 font-bold text-center cursor-default text-primary">LOGIN PENGGUNA</h2>
            <div class="flex sm:mx-4 md:mx-8 mx-8 h-10">
                <label for="email" class="w-1/4 text-primary font-medium flex items-center sm:text-sm md:text-base">Email</label>
                <input type="text" name="login" class="input pl-2 w-3/4 border-2 rounded-lg border-gray-400 text-sm outline-none text-gray-400" id="email" placeholder="Ketik email di sini">
            </div>
            <div class="flex sm:mx-4 md:mx-8 mx-8 my-1">
                <div class="w-1/4"></div>
                <p class="w-3/4 text-xs text-red-500 <?php if (!session('errors.login')) : ?>hidden<?php endif; ?>" id="msg-email">Email yang anda masukkan tidak cocok</p>
            </div>
            <div class="flex sm:mx-4 md:mx-8 mx-8 my-1 h-10 relative">
                <label for="pass" class="w-1/4 text-primary font-medium flex items-center sm:text-sm md:text-base">Kata Sandi</label>
                <input type="password" name="password" class="input pl-2 w-3/4 border-2 rounded-lg border-gray-400 text-sm outline-none text-gray-400" id="password" placeholder="Ketik kata sandi di sini">
                <i class="eyes fas fa-eye-slash absolute right-0 transform translate-y-3 -translate-x-3 cursor-pointer text-primary"></i>
            </div>
            <div class="flex sm:mx-4 md:mx-8 mx-8">
                <div class="w-1/4"></div>
                <p class="text-xs text-red-500 <?php if (!session('errors.password')) : ?>hidden<?php endif; ?>" id="msg-pass">Kata sandi yang anda masukkan kurang tepat</p>
            </div>

            <div class="flex sm:mx-4 md:mx-8 mx-8 my-3">
                <div class="w-1/4"></div>
                <div class="w-3/4 flex justify-between">
                    <div>
                        <input type="checkbox" class="cursor-pointer">
                        <label for="check" id="remember" class="text-sm cursor-pointer hover:text-blue-600 text-primary font-medium">Ingat saya</label>
                    </div>
                    <a href="<?= route_to('forgot') ?>" class="text-sm cursor-pointer text-secondary font-medium hover:text-yellow-700">Lupa kata sandi?</a>
                </div>
            </div>

            <div class="flex justify-center sm:mx-4 md:mx-8 mx-8 my-4">
                <input type="submit" class="tombol w-full shadow-2xl h-10 rounded-2xl text-base outline-none border-none cursor-pointer text-white duration-300" value="Kirim">
            </div>

            <div class="sm:mx-4 md:mx-8 mx-8 flex mt-2 mb-6">
                <hr class="border border-primary w-1/4 transform translate-y-2">
                <p class="flex justify-center text-sm text-primary w-1/2 font-medium cursor-default">atau masuk dengan</p>
                <hr class="border border-primary w-1/4 transform translate-y-2">
            </div>

            <!-- login with sipadu -->
            <div class="sm:mx-4 md:mx-8 mx-8 mb-4" onclick="loginSipadu()">
                <div class="sso flex justify-center rounded-2xl w-full border-2 border-secondary py-2 cursor-pointer trasform transform duration-300 hover:bg-yellow-200 hover:border-yellow-600 hover:scale-105">
                    <img src="/img/sipadu.png" alt="google" width="25" height="25" class="mr-4">
                    <h3 class="flex items-center text-sm text-secondary">Login with SIPADU</h3>
                </div>
            </div>

            <script>
                function loginSipadu() {
                    var win = window.open(`http://localhost:8080/auth/sipadu`, "_blank", "height=700,width=550,status=no,titlebar=no,menubar=no,top=10,left=300", true);
                    var timer = setInterval(function() {
                        if (win.closed) {
                            clearInterval(timer);
                            if (document.cookie.includes('login=yes'))
                                location.reload();
                        }
                    }, 1000);
                }
            </script>
            <!-- login with sipadu -->

            <!-- login with BPS -->
            <div class="sm:mx-4 md:mx-8 mx-8" onclick="loginBPS()">
                <div class="sso flex justify-center rounded-2xl w-full border-2 border-secondary py-2 cursor-pointer transform hover:scale-105 duration-300 hover:bg-yellow-200 hover:border-yellow-600">
                    <img src="/img/google.png" alt="google" width="25" height="25" class="mr-4">
                    <h3 class="flex items-center text-sm text-secondary">Login with BPS</h3>
                </div>
            </div>

            <script>
                function loginBPS() {
                    var win = window.open(`http://localhost:8080/auth/bps`, "_blank", "height=700,width=900,status=no,titlebar=no,menubar=no,top=10,left=300", true);
                    var timer = setInterval(function() {
                        if (win.closed) {
                            clearInterval(timer);
                            if (document.cookie.includes('login=yes'))
                                location.reload();
                        }
                    }, 1000);
                }
            </script>
            <!-- login with BPS -->

            <p class="text-center mt-6 text-primary mb-4 font-medium cursor-default">Akun belum terdaftar? <span><a href="/home/daftar" class="text-secondary hover:text-yellow-700 font-medium">Daftar</a></span></p>
        </form>
    </div>
</div>


<?= $this->endSection(); ?>