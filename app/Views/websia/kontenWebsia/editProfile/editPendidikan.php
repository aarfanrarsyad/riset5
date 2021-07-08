<?= $this->extend('websia/kontenWebsia/editProfile/layoutEdit.php'); ?>

<?= $this->section('contentEdit'); ?>

<div class="w-full bg-white mb-8 md:overflow-x-auto overflow-x-scroll shadow-2xl rounded-3xl" id="pagePendidikan">
    <!-- start tabel pendidikan-->
    <table class="w-full sm:text-sm text-xs font-paragraph shadow-2xl rounded-3xl">
        <!-- start nama kolom tabel pendidikan-->
        <thead class="formEdit">
            <tr>
                <th class="py-4 lg:px-3 px-2">No</th>
                <th class="lg:px-2 px-1">Jenjang</th>
                <th class="lg:px-2 px-1">Instansi</th>
                <th class="lg:px-2 px-1">Program Studi</th>
                <th class="lg:px-2 px-1">Tahun Masuk</th>
                <th class="lg:px-2 px-1">Tahun Lulus</th>
                <th class="lg:px-2 px-1">Judul Tulisan</th>
            </tr>
        </thead>
        <!-- end nama kolom tabel pendidikan-->

        <!-- start isi tabel pendidikan-->
        <tbody>
            <?php $n = 1;
            foreach ($pendidikan as $row) : ?>
                <tr class="border-t-2 border-b-2 bg-white">
                    <td class="text-center md:py-3 py-2"><?= $n ?></td>
                    <td><?= $row->jenjang ?></td>
                    <td><?= $row->instansi ?></td>
                    <td><?= $row->program_studi ?></td>
                    <td><?= $row->tahun_masuk ?></td>
                    <td><?= $row->tahun_lulus ?></td>
                    <td class="md:py-1.5 py-1 text-justify"><?= $row->judul_tulisan ?></td>
                </tr>
            <?php $n = $n + 1;
            endforeach; ?>
            <tr class="formEdit">
                <?php if (session('BPS') == "KATA IHZA ADAIN ADD SAMA DELETE AJA") : ?>
                    <td colspan="8" class="border-b-2">
                        <div class="ml-auto mr-3 bg-secondary text-white rounded-full w-28 py-1 text-center cursor-pointer hover:bg-secondaryhover transition-colors duration-300 my-2 tambahPendidikan">TAMBAH</div>
                    </td>
                <?php endif ?>
            </tr>
            <?php if ($pendidikan == NULL) : ?>
                <!-- Tampilan jika data semua kolom belum diisi -->
                <tr>
                    <td colspan="8" class="text-sm text-center border-b-2 border-gray-200 px-3 lg:px-5 py-2 md:py-3 lg:py-4">Riwayat pendidikan tidak ditemukan.</td>
                </tr>
            <?php endif; ?>
            <tr class="h-5 formEdit">
                <td colspan="8" class="rounded-b-3xl"></td>
            </tr>
        </tbody>
        <!-- end isi tabel pendidikan-->
    </table>
    <!-- end tabel pendidikan-->
</div>

<!-- dialog box di edit pendidikan -->
<!-- kalau mau ngecek hilangin kelas hidden sama opacity-0 nya-->
<?php if (session()->getFlashdata('edit-pendidikan-success')) : ?>
    <!-- BERHASIL edit pendidikan -->
    <div id="berhasilEditPendidikan">
        <div class="fixed top-0 bottom-0 right-0 left-0 z-50 flex justify-center items-center bg-black bg-opacity-40">
            <div class="duration-700 transition-all p-3 rounded-lg flex items-center bg-greenAlert">
                <img src="/img/components/icon/check.png" class="h-5 mr-2 text-success" alt="berhasil edit pendidikan">
                <p class="sm:text-base text-sm font-heading font-bold text-success"><?= session()->getFlashdata('edit-pendidikan-success') ?></p>
            </div>
        </div>
    </div>
    <script>
        setTimeout(function() {
            $('#berhasilEditPendidikan').fadeOut();
        }, 1500);
    </script>
<?php endif;
if (session()->getFlashdata('edit-pendidikan-fail')) : ?>
    <!-- GAGAL edit pendidikan -->
    <div id="gagalEditPendidikan">
        <div class="fixed top-0 bottom-0 right-0 left-0 z-50 flex justify-center items-center bg-black bg-opacity-40">
            <div class="duration-700 transition-all p-3 rounded-lg flex items-center bg-redAlert">
                <img src="/img/components/icon/warning.png" class="h-5 mr-2 text-danger" alt="gagal edit pendidikan">
                <p class="sm:text-base text-sm text-danger font-heading font-bold"><?= session()->getFlashdata('edit-pendidikan-fail') ?> : <?= session('error-nim') ?></p>
            </div>
        </div>
    </div>
    <script>
        setTimeout(function() {
            $('#gagalEditPendidikan').fadeOut();
        }, 1500);
    </script>
<?php endif;
if (session()->getFlashdata('add-pendidikan-success')) : ?>

    <!-- BERHASIL tambah pendidikan -->
    <div id="berhasilTambahPendidikan">
        <div class="fixed top-0 bottom-0 right-0 left-0 z-50 flex justify-center items-center bg-black bg-opacity-40">
            <div class="duration-700 transition-all p-3 rounded-lg flex items-center bg-greenAlert">
                <img src="/img/components/icon/check.png" class="h-5 mr-2 text-success" alt="berhasil tambah pendidikan">
                <p class="sm:text-base text-sm font-heading font-bold text-success"><?= session()->getFlashdata('add-pendidikan-success') ?></p>
            </div>
        </div>
    </div>
    <script>
        setTimeout(function() {
            $('#berhasilTambahPendidikan').fadeOut();
        }, 1500);
    </script>
<?php endif;
if (session()->getFlashdata('add-pendidikan-fail')) : ?>
    <!-- GAGAL tambah pendidikan -->
    <div id="gagalTambahPendidikan">
        <div class="fixed top-0 bottom-0 right-0 left-0 z-50 flex justify-center items-center bg-black bg-opacity-40">
            <div class="duration-700 transition-all p-3 rounded-lg flex items-center bg-redAlert">
                <img src="/img/components/icon/warning.png" class="h-5 mr-2 text-danger" alt="gagal tambah pendidikan">
                <p class="sm:text-base text-sm text-danger font-heading font-bold"><?= session()->getFlashdata('add-pendidikan-fail') ?> : <?= session('error-nim') ?></p>
            </div>
        </div>
    </div>
    <script>
        setTimeout(function() {
            $('#gagalTambahPendidikan').fadeOut();
        }, 1500);
    </script>
<?php endif;
if (session()->getFlashdata('delete-pendidikan-success')) : ?>


    <!-- BERHASIL hapus pendidikan-->
    <div id="berhasilHapusPendidikan">
        <div class="fixed top-0 bottom-0 right-0 left-0 z-50 flex justify-center items-center bg-black bg-opacity-40">
            <div class="duration-700 transition-all p-3 rounded-lg flex items-center bg-greenAlert">
                <img src="/img/components/icon/check.png" class="h-5 mr-2 text-success" alt="berhasil hapus pendidikan">
                <p class="sm:text-base text-sm font-heading font-bold text-success"><?= session()->getFlashdata('delete-pendidikan-success') ?></p>
            </div>
        </div>
    </div>
    <script>
        setTimeout(function() {
            $('#berhasilHapusPendidikan').fadeOut();
        }, 1500);
    </script>
    <!-- end dialog box -->
<?php endif; ?>


<?= $this->endSection(); ?>