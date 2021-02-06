<?= $this->extend('auth/templates/index'); ?>

<?php
$visibilityFailed = 'hidden'; // bisa diisi hidden untuk menonaktifkan
$visibilitySuccess = 'hidden'; // bisa diisi hidden untuk menonaktifkan
?>


<?= $this->section('content') ?>
<div class="flex flex-col justify-center flex-grow font-dmsans">

    <div class="flex  flex-col items-center mx-auto w-11/12 lg:w-5/12 md:w-8/12 bg-white shadow-2xl rounded-lg  py-5 md:py-10 px-2 md:px-8">

        <div class="text-xl uppercase font-bold mb-8 text-center">RESET PASSWORD</div>

        <!-- tulisan kalo akun yang dimasukkan salah untuk saat ini masih ke hidden, untuk mengnonaktifkan bisa mengisi 'hidden' pada variabel visibilityFailed di text php -->
        <div class="w-full mb-2 text-sm md:text-base text-center bg-red-200 text-red-600  font-semibold p-1 rounded-lg <?= $visibilityFailed ?>"> E-mail not registered. Check your e-mail again!</div>
        <!-- tulisan kalo akun yang dimasukkan salah -->

        <!-- tulisan kalo akun yang dimasukkan salah untuk saat ini masih ke hidden, untuk mengnonaktifkan bisa mengisi 'hidden' pada variabel visibilitySuccess di text php -->
        <div class="w-full mb-2 text-sm md:text-base text-center bg-green-200 text-green-600  font-semibold p-1 rounded-lg <?= $visibilitySuccess ?>"> We have e-mailed your password reset
            link! </div>
        <!-- tulisan kalo akun yang dimasukkan salah -->

        <?= view('Myth\Auth\Views\_message_block') ?>

        <p><?= lang('Auth.enterEmailForInstructions') ?></p>

        <div class="w-full md:w-3/4text-center">
            <form action="<?= route_to('forgot') ?>" method="post">
                <?= csrf_field() ?>

                <div class="flex flex-wrap w-full mb-7 ">
                    <div class="flex items-center text-gray-700  w-full">
                        <label for="emailAdd" class="text-sm my-auto md:text-base">E-mail Address&nbsp;:</label>
                        <input type="email" id="email" name="email" class=" shadow-md border-2 py-2 px-3 ml-2 border-gray-200 rounded-md flex-grow md:flex-none md:w-2/3 focus:border-gray-700 focus:outline-none placeholder-gray-700  text-xs md:text-base align-middle <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>">
                    </div>
                </div>
                <div class="invalid-feedback">
                    <?= session('errors.email') ?>
                </div>

                <div class="flex justify-center w-full mt-8">
                    <div class="flex justify-start w-1/2">
                        <button type="submit" class="text-xs my-auto text-white font-bold hover:from-blue-500 hover:to-indigo-600  cursor-pointer focus:outline-none bg-gradient-to-r from-blue-500 to-indigo-500 py-2 px-2 md:px-4 ml-6 rounded-md"><?= lang('Auth.sendInstructions') ?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- konten -->
<?= $this->endSection() ?>