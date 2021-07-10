<?= $this->extend('webservice/layoutWebservice/templateWebserviceLogin.php'); ?>

<?= $this->section('content'); ?>
<div class="w-full flex justify-center items-center lg:my-12 md:my-8 sm:my-6 my-4">
    <div class="shadow-2xl sm:w-3/4 w-full rounded-xl px-0 pt-4 py-6 sm:mx-0 mx-6">
        <h1 class="lg:text-6xl md:text-3xl text-2xl text-center font-heading text-secondary font-bold">PROYEK</h1>
        <div class="flex justify-center">
            <div class="lg:w-3/5 w-4/5">
                <hr class="border-primary border-2 lg:mt-6 md:mt-4 mt-2">
                <div class="mx-2 mt-4">
                    <!-- start form buat proyek -->
                    <form action="<?php echo base_url('/developer/insert'); ?>" method="post" class="lg:text-base md:text-sm text-xs">
                        <label for="nama" class="font-bold text-secondary lg:text-lg md:text-base text-sm">Nama*</label>
                        <?php if (session()->getFlashdata('nama-fail')) { ?>
                            <p class="text-xs text-red-500 text-justify" id="errorNamaProyek">
                                <?= session()->getFlashdata('nama-fail'); ?>
                            </p>
                        <?php } ?>
                        <input type="text" name="nama" id="nama" placeholder="Nama Proyek" class="inputForm lg:mb-4" value="<?php if (session()->getFlashdata('nama-true')) echo session()->getFlashdata('nama-true'); ?>">
                        <label for="deskripsi" class="font-bold text-secondary lg:text-lg md:text-base text-sm">Deskripsi*</label>
                        <?php if (session()->getFlashdata('deskripsi-fail')) { ?>
                            <p class="text-xs text-red-500 text-justify" id="errorDescProyek">
                                <?= session()->getFlashdata('deskripsi-fail'); ?>
                            </p>
                        <?php } ?>
                        <textarea name="deskripsi" id="deskripsi" cols="50" rows="5" class="inputForm lg:mb-4" placeholder="Masukkan Deskripsi Proyek"><?php if (session()->getFlashdata('deskripsi-true')) echo session()->getFlashdata('deskripsi-true'); ?></textarea>
                        <div>
                            <label for="scope" class="font-bold text-secondary lg:text-lg md:text-base text-sm">API*</label>
                            <?php if (session()->getFlashdata('scope-fail')) { ?>
                                <p class="text-xs text-red-500 text-justify" id="errorNamaProyek">
                                    <?= session()->getFlashdata('scope-fail'); ?>
                                </p>
                            <?php } ?>
                            <!-- start scope webservice -->
                            <div>
                                <?php foreach ($scope_app as $key => $data) { ?>
                                    <div class="flex items-center gap-x-2">
                                        <input data-id="<?= $data['id'] ?>" id="scope<?= $data['id'] ?>" type="checkbox" name="scope[]" value="<?= $data['id'] ?>" class="scope cursor-pointer">
                                        <label for="scope<?= $data['id'] ?>" id="labelScope<?= $data['id'] ?>" class="cursor-pointer font-heading font-medium text-gray-500"><?= $data['scope'] ?></label>
                                    </div>
                                    <div class="ml-5 md:mt-2 mb-2">
                                        <?= $data['scope_dev'] ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <!-- end scope webservice -->
                        </div>
                        <div class="text-sm text-secondary md:mt-6 mt-4">
                            *Harus diisi
                        </div>
                        <div class="flex md:justify-end justify-between gap-x-6 items-center mt-2">
                            <a href="/developer/proyek">
                                <div class="flex items-center gap-x-2">
                                    <img src="/img/components/icon/left-on.png" class="w-3 h-3" alt="icon panah kiri on">
                                    <div class="text-secondary">KEMBALI</div>
                                </div>
                            </a>
                            <input type="submit" value="BUAT" class="bg-secondary hover:bg-secondaryhover text-white py-1 px-5 cursor-pointer rounded-full focus:outline-none">
                        </div>
                    </form>
                    <!-- end form buat proyek -->
                </div>
            </div>
        </div>
    </div>

</div>
<script type="text/javascript" src="/js/checkbox.js"></script>
<?php $this->endSection(); ?>