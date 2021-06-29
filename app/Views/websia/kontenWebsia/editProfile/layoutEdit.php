<?= $this->extend('websia/layoutWebsia/templateBerandaLogin.php'); ?>

<?= $this->section('content'); ?>

<?php
$model = new App\Models\AlumniModel();
$ambigu = $model->getTempatKerjaByNIM(session('id_alumni'))->getRow()->ambigu;
$ap = $model->bukaProfile(session('id_alumni'))->getRow()->aktif_pns;
if ($ambigu == 1) {
    session()->set([    //cek ambigu atau bukan
        'ambigu' => 'yes',
    ]);
} else {
    session()->set([    //cek ambigu atau bukan
        'ambigu' => 'no',
    ]);
}
if ($ap == 0) {
    $ap = "Tidak aktif sebagai PNS";
    session()->set([    //cek BPS atau bukan
        'BPS' => 'no',
    ]);
} else {
    $ap = "Aktif sebagai PNS";
    session()->remove('BPS');
}
?>

<script src="https://code.jquery.com/jquery-1.10.1.min.js" integrity="sha256-SDf34fFWX/ZnUozXXEH0AeB+Ip3hvRsjLwp6QNTEb3k=" crossorigin="anonymous"></script>

<div class="flex w-full relative flex-1">
    <div class="layoutEdit md:static absolute top-0 bottom-0 sm:w-16 w-10 md:w-1/5 transition-all duration-500 bg-primarySidebar">

        <div class="md:hidden">
            <svg class="block mx-auto sm:w-7 w-6 cursor-pointer fill-current text-secondary mt-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </div>

        <div class="navEdit md:block hidden">
            <div class="flex justify-between items-center text-secondary bg-primaryHover md:text-xl font-bold py-2 lg:pr-5 md:pr-2 lg:pl-7 md:pl-3 px-3">
                <p>EDIT</p>
                <div class="editTutup select-none">
                    <svg class="sm:w-7 w-6 fill-current cursor-pointer" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </div>

            </div>
            <ul>
                <a href="/User/editProfil">
                    <li id="profil" class="button font-heading lg:p-3 p-2 pl-3 lg:pl-7 mt-4 mr-4 rounded-r-lg text-sm text-white <?= ($activeEditProfil == 'biodata') ? 'activeMenu' : ''; ?> hover:text-secondary hover:bg-primaryDark font-semibold">Biodata</li>
                </a>
                <a href="/User/editPendidikan">
                    <li id="pendidikan" class="button font-heading lg:p-3 p-2 pl-3 lg:pl-7 mr-4 rounded-r-lg text-sm text-white <?= ($activeEditProfil == 'pendidikan') ? 'activeMenu' : ''; ?> hover:text-secondary hover:bg-primaryDark font-semibold">Pendidikan</li>
                </a>
                <?php if (session('BPS') == "no" || session('ambigu') == "yes") : ?>
                    <a href="/User/editTempatKerja">
                        <li id="tempatkerja" class="button font-heading lg:p-3 p-2 pl-3 lg:pl-7 mr-4 rounded-r-lg text-sm text-white <?= ($activeEditProfil == 'tempatKerja') ? 'activeMenu' : ''; ?> hover:text-secondary hover:bg-primaryDark font-semibold">Tempat Kerja</li>
                    </a>
                <?php endif ?>
                <a href="/User/editPrestasi">
                    <li id="prestasi" class="button font-heading lg:p-3 p-2 pl-3 lg:pl-7 mr-4 rounded-r-lg text-sm text-white <?= ($activeEditProfil == 'prestasi') ? 'activeMenu' : ''; ?> hover:text-secondary hover:bg-primaryDark font-semibold">Prestasi</li>
                </a>
                <!-- EDIT PUBLIKASI TIDAK DIGUNAKAN
                <a href="/User/editPublikasi">
                    <li id="publikasi" class="button font-heading lg:p-3 p-2 pl-3 lg:pl-7 mr-4 rounded-r-lg text-sm text-white <= ($activeEditProfil == 'publikasi') ? 'activeMenu' : ''; ?> hover:text-secondary hover:bg-primaryDark font-semibold">Publikasi</li>
                </a> -->
                <?php if (session('manual') == "yes") : ?>
                    <a href="/User/editAkun">
                        <li id="akun" class="button font-heading lg:p-3 p-2 pl-3 lg:pl-7 mr-4 rounded-r-lg text-sm text-white <?= ($activeEditProfil == 'akun') ? 'activeMenu' : ''; ?> hover:text-secondary hover:bg-primaryDark font-semibold">Akun</li>
                    </a>
                <?php endif ?>
            </ul>

        </div>

    </div>

    <div class="md:w-4/5 w-full md:pl-0 sm:pl-20 pl-12 md:mx-7 mt-8 rounded-xl text-sm">
        <?php $this->renderSection('contentEdit'); ?>
    </div>
</div>

<?= $this->endSection(); ?>