<?= $this->extend('webservice/layoutWebservice/templateWebserviceLogin.php'); ?>

<?= $this->section('content'); ?>

<div class="w-full flex justify-center items-center">
    <div class="shadow-2xl sm:w-3/4 w-full my-6 lg:my-12 rounded-xl px-0 pt-4 pb-6 sm:mx-0 mx-6">
        <h1 class="lg:text-6xl md:text-4xl text-3xl text-center font-heading text-secondary font-bold items-center flex justify-center">PROFIL</h1>
        <div class="flex justify-center">
            <div class="lg:w-4/5 w-5/6">
                <div class="md:mx-2 lg:mt-20 mt-8">
                    <div class="lg:mb-4 mb-2">
                        <div class="flex justify-start items-center">
                            <div class="w-2/5">
                                <h5 class="font-bold font-heading text-primary lg:text-lg md:text-sm text-xs">NAMA LENGKAP</h5>
                            </div>
                            <div class="w-3/5">
                                <h5 class="font-paragraph text-primary lg:text-lg md:text-base text-sm">Baek Nambong</h5>
                            </div>
                        </div>
                        <hr class="border-gray border-1 lg:mt-4 mt-2">
                    </div>
                    <div class="lg:mb-4 mt-2">
                        <div class="flex justify-start items-center">
                            <div class="w-2/5">
                                <h5 class="font-bold font-heading text-primary lg:text-lg md:text-sm text-xs">TEMPAT, TANGGAL LAHIR</h5>
                            </div>
                            <div class="w-3/5">
                                <h5 class="font-paragraph text-primary lg:text-lg md:text-base text-sm">Bojong Gede, 21 Januari 1983</h5>
                            </div>
                        </div>
                        <hr class="border-gray border-1 lg:mt-4 mt-2">
                    </div>
                    <div class="lg:mb-4 mt-2">
                        <div class="flex justify-start items-center">
                            <div class="w-2/5">
                                <h5 class="font-bold font-heading text-primary lg:text-lg md:text-sm text-xs">STATUS</h5>
                            </div>
                            <div class="w-3/5">
                                <h5 class="font-paragraph text-primary lg:text-lg md:text-base text-sm">Peneliti</h5>
                            </div>
                        </div>
                        <hr class="border-gray border-1 lg:mt-4 mt-2">
                    </div>
                    <div class="lg:mb-4 mt-2">
                        <div class="flex justify-start items-center">
                            <div class="w-2/5">
                                <h5 class="font-bold font-heading text-primary lg:text-lg md:text-sm text-xs">NAMA INSTANSI</h5>
                            </div>
                            <div class="w-3/5">
                                <h5 class="font-paragraph text-primary lg:text-lg md:text-base text-sm">Universitas Yonggang</h5>
                            </div>
                        </div>
                        <hr class="border-gray border-1 lg:mt-4 mt-2">
                    </div>
                    <div class="lg:mb-4 mt-2">
                        <div class="flex justify-start items-center">
                            <div class="w-2/5">
                                <h5 class="font-bold font-heading text-primary lg:text-lg md:text-sm text-xs">EMAIL</h5>
                            </div>
                            <div class="w-3/5">
                                <h5 class="font-paragraph text-primary lg:text-lg md:text-base text-sm">Frost@email.com</h5>
                            </div>
                        </div>
                        <hr class="border-gray border-1 lg:mt-4 mt-2">
                    </div>
                    <div class="">
                        <a href="/developer/edit/akun">
                            <div class="rounded-full lg:mt-6 mt-4 mb-4 bg-secondary text-white p-1 md:w-24 w-16 text-center md:text-base text-xs hover:bg-secondaryhover">EDIT</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->endSection(); ?>