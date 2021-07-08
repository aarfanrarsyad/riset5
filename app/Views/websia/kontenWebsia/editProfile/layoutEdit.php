<?= $this->extend('websia/layoutWebsia/templateBerandaLogin.php'); ?>

<?= $this->section('content'); ?>

<?php
$model = new App\Models\AlumniModel();
$ambigu = $model->getTempatKerjaByNIM(session('id_alumni'))->getRow()->ambigu;
$ap = $model->bukaProfile(session('id_alumni'))->getRow()->aktif_pns;
if ($ambigu != 0) {
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
    session()->set([    //cek BPS atau bukan
        'BPS' => 'yes',
    ]);
}
?>

<div>
    <div id="sideEditProfil" class="fixed h-full md:w-16 sm:w-14 w-10 md:w-48 lg:w-60 xl:w-72 transition-all duration-500 bg-primarySidebar easy-out top-0 z-10">
        <img src="/img/components/logo/logo_sia.png" class="mx-auto logoSia" alt="Logo SIA">
        <div class="absolute w-full text-secondary bg-primaryHover py-2">
            <p class="pEdit md:opacity-100 opacity-0 md:text-xl lg:pl-7 md:pl-4 pl-3 transition-all duration-500 easy-out font-bold">EDIT</p>
        </div>
        <div class="select-none text-secondary relative z-10 py-2">
            <div class="buka toogleEdit absolute md:w-7 w-6 cursor-pointer transition-all easy-out duration-500">
                <svg class="ulEdit md:opacity-100 opacity-0 md:block hidden transition-all easy-out duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
                <svg class="burgerEdit md:opacity-0 opacity-100 md:hidden block transition-all easy-out duration-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </div>

        </div>
        <ul class="mt-9 ulEdit md:opacity-100 opacity-0 md:block hidden transition-all duration-500 easy-out">
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
            <?php if (session('manual') == "yes") : ?>
                <a href="/User/editAkun">
                    <li id="akun" class="button font-heading lg:p-3 p-2 pl-3 lg:pl-7 mr-4 rounded-r-lg text-sm text-white <?= ($activeEditProfil == 'akun') ? 'activeMenu' : ''; ?> hover:text-secondary hover:bg-primaryDark font-semibold">Akun</li>
                </a>
            <?php endif ?>
        </ul>

    </div>

    <div class="ml-10 md:ml-16 sm:ml-14 md:ml-48 lg:ml-60 xl:ml-72 pt-8 lg:p-8 md:p-6 p-3 transition-all duration-500 easy-out">
        <?php $this->renderSection('contentEdit'); ?>
    </div>
</div>

<?= $this->endSection(); ?>