<?= $this->extend('webservice/layoutWebservice/templateWebserviceLogin.php'); ?>

<?= $this->section('content'); ?>

<script src="https://code.jquery.com/jquery-1.10.1.min.js" integrity="sha256-SDf34fFWX/ZnUozXXEH0AeB+Ip3hvRsjLwp6QNTEb3k=" crossorigin="anonymous"></script>

<div class="w-full">
    <div class="flex w-full h-full relative">
        <div class="layoutEdit md:static absolute top-0 bottom-0 sm:w-16 w-10 md:w-1/5 bg-primarySidebar transition-all duration-500">
            <!-- start sidebar hamburger/posisi tutup -->
            <div class="md:hidden">
                <svg class="block mx-auto sm:w-7 w-6 cursor-pointer fill-current text-secondary mt-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </div>
            <!-- end sidebar hamburger/posisi tutup -->

            <!-- start sidebar posisi buka -->
            <div class="navEdit md:block hidden">
                <div class="flex justify-between items-center text-secondary bg-primaryHover md:text-xl sm:text-lg text-base font-bold py-2 lg:pr-5 md:pr-2 lg:pl-7 md:pl-3 px-3">
                    <p>EDIT PROFIL</p>
                    <div class="editTutup select-none">
                        <svg class="sm:w-7 w-6 fill-current cursor-pointer" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </div>

                </div>
                <ul>
                    <a href="/developer/edit/biodata">
                        <li id="profilDev" class="button bg-primarySidebar font-heading lg:p-3 p-2 pl-3 lg:pl-7 my-2 mr-2 rounded-r-lg text-sm text-white <?= ($active == 'biodataDev') ? 'active' : ''; ?> hover:text-secondary hover:bg-primaryDark font-semibold">Biodata</li>
                    </a>
                    <a href="/developer/edit/akun">
                        <li id="akunDev" class="button bg-primarySidebar font-heading lg:p-3 p-2 pl-3 lg:pl-7 my-2 mr-2 rounded-r-lg text-sm text-white <?= ($active == 'akunDev') ? 'active' : ''; ?> hover:text-secondary hover:bg-primaryDark font-semibold">Akun</li>
                    </a>
                </ul>

            </div>
            <!-- end sidebar posisi buka -->

        </div>

        <!-- content edit di sini -->
        <div class="md:w-4/5 w-full md:pl-0 sm:pl-20 pl-12 md:mx-7 mt-8 rounded-xl text-sm">
            <?php $this->renderSection('contentEdit'); ?>
        </div>
        <!-- end content edit -->
    </div>

</div>

</div>
<?= $this->endSection(); ?>