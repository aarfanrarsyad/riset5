<?= $this->extend('websia/kontenWebsia/editProfile/layoutEdit.php'); ?>

<?= $this->section('contentEdit'); ?>
<style>
    .formEdit {
        background-color: #F9F9F9;
    }
</style>

<div class="w-full bg-white mb-8" id="pagePendidikan">
    <!--<div class="flex justify-end w-full mb-4 w-36">
        <div class="bg-secondary hover:bg-secondaryhover text-white lg:py-1.5 py-1 px-3 lg:text-sm text-xs outline-none cursor-pointer rounded-full flex gap-x-2 items-center" id="buttonEditTampilanPendidikan">
            <div>
                Edit Tampilan
            </div>
            <img src="/img/components/icon/edit.png" alt="edit pendidikan" class="w-4 h-4">
        </div>
    </div>
    <div class="editTampilanPendidikan hidden">
        <form action="/User/updateTampilanPendidikan" method="POST">
            <div class="flex justify-between mb-4">
                <label for="checkPendidikan" id="labelCheckPendidikan" class="text-gray-500 font-bold">Tampilkan Pendidikan</label>
                <input type="checkbox" <= $cpendidikan ?> name="checkPendidikan" id="checkPendidikan" class="cursor-pointer outline-none" onclick="checkPendidikan()">
            </div>
            <div class="flex justify-end">
                <input type="submit" value="SIMPAN" class="ml-auto bg-secondary text-white rounded-full w-24 py-1 text-center cursor-pointer hover:bg-secondaryhover transition-colors duration-300 -mt-2 mb-4">
            </div>
        </form>
    </div>-->
    <div class="md:overflow-x-auto overflow-x-scroll shadow-2xl rounded-3xl">
        <!-- start tabel pendidikan-->
        <table class="w-full sm:text-sm text-xs rounded-3xl shadow-2xl md:shadow-none font-paragraph">
            <!-- start nama kolom tabel pendidikan-->
            <thead class="formEdit">
                <tr>
                    <th class="pt-4 lg:px-3 md:px-2 px-1 pb-1 w-1/12">No</th>
                    <th class="pt-4 lg:px-2 px-1 pb-1 w-1/12">Jenjang</th>
                    <th class="pt-4 lg:px-2 px-1 pb-1 w-2/12">Instansi</th>
                    <th class="pt-4 lg:px-2 px-1 pb-1 w-2/12">Program Studi</th>
                    <th class="pt-4 pb-1 pl-1 w-1/12">
                        <div class="flex">
                            <span class="mr-1">Tahun Masuk</span>
                        </div>
                    </th>
                    <th class="pt-4 pb-1 pl-1 w-1/12">
                        <div class="flex">
                            <span class="mr-1">Tahun Lulus</span>
                        </div>

                    </th>
                    <th class="pt-4 lg:px-2 px-1 pb-1 w-4/12">Judul Tulisan</th>
                </tr>
            </thead>
            <!-- end nama kolom tabel pendidikan-->

            <!-- start isi tabel pendidikan-->
            <tbody>
                <?php $n = 1;
                foreach ($pendidikan as $row) : ?>
                    <tr class="border-t-2 border-b-2 bg-white">
                        <td class="text-center py-3"><?= $n ?></td>
                        <td><?= $row->jenjang ?></td>
                        <td><?= $row->instansi ?></td>
                        <td><?= $row->program_studi ?></td>
                        <td><?= $row->tahun_masuk ?></td>
                        <td><?= $row->tahun_lulus ?></td>
                        <td><?= $row->judul_tulisan ?></td>
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
</div>

<!-- dialog box di edit pendidikan -->
<!-- kalau mau ngecek hilangin kelas hidden sama opacity-0 nya-->
<?php if (session()->getFlashdata('edit-pendidikan-success')) : ?>
    <!-- BERHASIL edit pendidikan -->
    <div id="berhasilEditPendidikan">
        <div class="fixed top-0 bottom-0 right-0 left-0 z-50 flex justify-center items-center bg-black bg-opacity-40">
            <div class="duration-700 transition-all p-3 rounded-lg flex items-center" style="background-color: #B1FF66;">
                <img src="/img/components/icon/check.png" class="h-5 mr-2" style="color: #54AC00;" alt="berhasil edit pendidikan">
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
            <div class="duration-700 transition-all p-3 rounded-lg flex items-center" style="background-color: #FF7474;">
                <img src="/img/components/icon/warning.png" class="h-5 mr-2" alt="gagal edit pendidikan">
                <p class="sm:text-base text-sm font-heading font-bold" style="color: #C51800;"><?= session()->getFlashdata('edit-pendidikan-fail') ?> : <?= session('error-nim') ?></p>
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
            <div class="duration-700 transition-all p-3 rounded-lg flex items-center" style="background-color: #B1FF66;">
                <img src="/img/components/icon/check.png" class="h-5 mr-2" style="color: #54AC00;" alt="berhasil tambah pendidikan">
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
            <div class="duration-700 transition-all p-3 rounded-lg flex items-center" style="background-color: #FF7474;">
                <img src="/img/components/icon/warning.png" class="h-5 mr-2" alt="gagal tambah pendidikan">
                <p class="sm:text-base text-sm font-heading font-bold" style="color: #C51800;"><?= session()->getFlashdata('add-pendidikan-fail') ?> : <?= session('error-nim') ?></p>
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
            <div class="duration-700 transition-all p-3 rounded-lg flex items-center" style="background-color: #B1FF66;">
                <img src="/img/components/icon/check.png" class="h-5 mr-2" style="color: #54AC00;" alt="berhasil hapus pendidikan">

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