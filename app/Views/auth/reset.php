<?= $this->extend('auth/templates/index'); ?>

<?= $this->section('content') ?>
<div class="flex flex-col justify-center flex-grow">

    <div class="flex flex-col items-center mx-auto py-4 w-11/12 lg:w-6/12 md:w-8/12 bg-white shadow-2xl rounded-lg  py-5 md:py-10 md:px-2">

        <div class="text-xl uppercase font-bold mb-8 text-center">RESET PASSWORD</div>

        <?= view('Myth\Auth\Views\_message_block') ?>

        <p><?= lang('Auth.enterCodeEmailPassword') ?></p>

        <div class=" text-left w-11/12 md:w-9/12 ">
            <form action="<?= route_to('reset-password') ?>" method="post">
                <?= csrf_field() ?>
                <div class="flex flex-col items-center">

                    <div class="form-group flex items-center my-3 w-full mb-4">
                        <label for="token" class="my-auto text-sm md:text-base w-32 md:w-auto "><?= lang('Auth.token') ?>:</label>
                        <input type="text" id="token" name="token" class="shadow-md border-2 py-2 px-3 border-gray-200 rounded-md ml-1 md:ml-2 flex-grow focus:border-gray-700 focus:outline-none placeholder-gray-700  text-xs md:text-base align-middle my-auto <?php if (session('errors.token')) : ?>is-invalid<?php endif ?>>" placeholder="<?= lang('Auth.token') ?>" value="<?= old('token', $token ?? '') ?>">
                        <div class="invalid-feedback">
                            <?= session('errors.token') ?>
                        </div>
                    </div>


                    <div class="form-group flex items-center my-3 w-full mb-4">
                        <label for="email" class="my-auto text-sm md:text-base w-32 md:w-auto "><?= lang('Auth.email') ?>:</label>
                        <input type="email" id="email" name="email" class="shadow-md border-2 py-2 px-3 border-gray-200 rounded-md ml-1 md:ml-2 flex-grow focus:border-gray-700 focus:outline-none placeholder-gray-700  text-xs md:text-base align-middle my-auto <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>">
                        <div class="invalid-feedback">
                            <?= session('errors.email') ?>
                        </div>
                    </div>

                    <div class="form-group flex items-center my-3 w-full mb-4">
                        <label for="password" class="my-auto text-sm md:text-base w-32 md:w-auto "><?= lang('Auth.newPassword') ?>:</label>
                        <input type="password" id="password" name="password" class="shadow-md border-2 py-2 px-3 border-gray-200 rounded-md ml-1 md:ml-2 flex-grow focus:border-gray-700 focus:outline-none placeholder-gray-700  text-xs md:text-base align-middle my-auto <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="type your new password">
                        <div class="invalid-feedback">
                            <?= session('errors.password') ?>
                        </div>
                    </div>

                    <div class="form-group flex items-center my-3 w-full mb-8">
                        <label for="pass_confirm" class="my-auto text-sm md:text-base  w-32 md:w-auto "><?= lang('Auth.newPasswordRepeat') ?>:</label>
                        <input type="password" id="pass_confirm" name="pass_confirm" class="shadow-md border-2 py-2 px-3 border-gray-200 rounded-md ml-1 md:ml-2 flex-grow focus:border-gray-700 focus:outline-none placeholder-gray-700  text-xs md:text-base align-middle my-auto" placeholder="confirm your password">
                        <div class="invalid-feedback">
                            <?= session('errors.pass_confirm') ?>
                        </div>
                    </div>

                </div>

                <div class="flex justify-center w-full">
                    <button type="submit" class="text-xs my-auto text-white font-bold hover:from-blue-500 hover:to-indigo-600  cursor-pointer focus:outline-none bg-gradient-to-r from-blue-500 to-indigo-500 py-2 px-2 md:px-4 ml-2 rounded-md"><?= lang('Auth.resetPassword') ?></button>
                </div>

            </form>
        </div>
    </div>
    <!-- konten bisa diubah sampai sini -->
</div>
<!-- konten -->
<?= $this->endSection() ?>