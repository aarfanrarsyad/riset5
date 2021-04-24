<?php
if ($checked->prestasi == 0) {
    $cprestasi = "";
} else {
    $cprestasi = "checked";
}
?>
<?= $this->extend('websia/kontenWebsia/editProfile/layoutEdit.php'); ?>

<?= $this->section('contentEdit'); ?>

<style>
    .formEdit {
        background-color: #F9F9F9;
    }
</style>

<div class="w-full bg-white min-h-screen" id="pagePrestasi">
    <div class="flex justify-end w-full mb-4 w-36">
        <div class="bg-secondary hover:bg-secondaryhover text-white lg:py-1.5 py-1 px-3 lg:text-sm text-xs outline-none cursor-pointer rounded-full flex gap-x-2 items-center" onclick="buttonEditTampilanPrestasi()">
            <div>
                Edit Tampilan
            </div>
            <img src="/img/icon/edit.png" alt="" class="w-4 h-4">
        </div>
    </div>
    <div class="editTampilanPrestasi hidden">
        <form action="/User/updateTampilanPrestasi" method="POST" >
            <div class="flex justify-between mb-4">
                <label for="checkPrestasi" id="labelCheckPrestasi" class="text-gray-500 font-bold">Tampilkan Prestasi</label>
                <input type="checkbox" <?= $cprestasi ?> name="checkPrestasi" id="checkPrestasi" class="cursor-pointer outline-none" onclick="checkPrestasi()">
            </div>
            <div class="flex justify-end">
                <input type="submit" value="SIMPAN" class="ml-auto bg-secondary text-white rounded-full w-24 py-1 text-center cursor-pointer hover:bg-secondaryhover transition-colors duration-300 -mt-2 mb-4">
            </div>
        </form>
    </div>
    <div class="md:overflow-x-auto overflow-x-scroll shadow-2xl rounded-3xl">
        <!-- start tabel prestasi -->
        <table class="w-full sm:text-sm text-xs rounded-3xl shadow-2xl md:shadow-none font-paragraph">
            <!-- start nama kolom tabel prestasi -->
            <thead class="formEdit">
                <tr>
                    <th class="pt-4 pb-1 rounded-tl-3xl">No</th>
                    <th class="pt-4 pb-1">Nama Prestasi</th>
                    <th class="pt-3 pb-1">
                        <div class="flex justify-center">
                            <span class="mr-2">Tahun</span>
                            <div class="sort select-none cursor-pointer flex flex-col justify-center gap-y-1">
                                <svg width="10" height="5" viewBox="0 0 8 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0 4L4 0L8 4H0Z" fill="#B0BAC9" />
                                </svg>
                                <svg width="10" height="5" viewBox="0 0 8 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0 0L4 4L8 0H0Z" fill="#B0BAC9" />
                                </svg>
                            </div>
                        </div>
                    </th>
                    <th class="pt-3 pb-1 rounded-tr-3xl">Aksi</th>
                </tr>
            </thead>
            <!-- end nama kolom tabel prestasi -->

            <!-- start isi tabel prestasi -->
            <tbody>
                <?php $n = 1;
                foreach ($prestasi as $row) : ?>
                    <tr class="border-t-2 border-b-2 bg-white">
                        <td class="text-center py-3"><?= $n ?></td>
                        <td><?= $row->nama_prestasi ?></td>
                        <td><?= $row->tahun_prestasi ?></td>
                        <td>
                            <div class="flex justify-center">
                                <div class="editPrestasi cursor-pointer mr-1" onclick="formPrestasi('<?= $row->id_prestasi ?>', '<?= $row->nama_prestasi ?>', '<?= $row->tahun_prestasi ?>')"><svg class="lg:w-5 lg:h-5 w-4 h-4" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16.1536 9.99923C15.6928 9.99923 15.3203 10.3726 15.3203 10.8325V17.4992C15.3203 17.9584 14.9469 18.3325 14.487 18.3325H2.82031C2.36026 18.3325 1.98703 17.9584 1.98703 17.4992V5.83252C1.98703 5.37338 2.36026 4.99924 2.82031 4.99924H9.48702C9.94783 4.99924 10.3203 4.62585 10.3203 4.16595C10.3203 3.7059 9.94783 3.33252 9.48702 3.33252H2.82031C1.44198 3.33252 0.320312 4.45419 0.320312 5.83252V17.4992C0.320312 18.8775 1.44198 19.9992 2.82031 19.9992H14.487C15.8653 19.9992 16.987 18.8775 16.987 17.4992V10.8325C16.987 10.3717 16.6144 9.99923 16.1536 9.99923Z" fill="black" />
                                        <path d="M8.13522 9.24029C8.07693 9.29858 8.03771 9.37273 8.02108 9.45269L7.43194 12.3995C7.40447 12.536 7.44781 12.6769 7.54607 12.7761C7.62527 12.8552 7.73193 12.8977 7.84118 12.8977C7.86773 12.8977 7.89535 12.8952 7.92281 12.8894L10.8687 12.3003C10.9503 12.2835 11.0245 12.2444 11.082 12.186L17.6753 5.59268L14.7294 2.64697L8.13522 9.24029Z" fill="black" />
                                        <path d="M19.7124 0.609397C18.9 -0.203132 17.5783 -0.203132 16.7665 0.609397L15.6133 1.76266L18.5591 4.70851L19.7124 3.5551C20.1058 3.16265 20.3224 2.63927 20.3224 2.08263C20.3224 1.52599 20.1058 1.00262 19.7124 0.609397Z" fill="black" />
                                    </svg>
                                </div>
                                <div class="hapusPrestasi cursor-pointer" onclick="hapusPrestasi('<?= $row->id_prestasi ?>')"><svg class="lg:w-5 lg:h-5 w-4 h-4" viewBox="0 0 19 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.492 3.84814L14.2169 18.3784H4.86875L3.5939 3.84814L1.97852 3.98975L3.27664 18.7835C3.34496 19.4654 3.9366 20 4.6239 20H14.4617C15.1488 20 15.7407 19.4657 15.8101 18.7738L17.1074 3.98975L15.492 3.84814Z" fill="black" />
                                        <path d="M12.5141 0H6.56816C5.82301 0 5.2168 0.60621 5.2168 1.35137V3.91894H6.8384V1.6216H12.2438V3.9189H13.8654V1.35133C13.8655 0.60621 13.2593 0 12.5141 0Z" fill="black" />
                                        <path d="M18.1901 3.10791H0.892851C0.445 3.10791 0.0820312 3.47088 0.0820312 3.91873C0.0820312 4.36658 0.445 4.72955 0.892851 4.72955H18.1901C18.638 4.72955 19.001 4.36658 19.001 3.91873C19.001 3.47088 18.638 3.10791 18.1901 3.10791Z" fill="black" />
                                    </svg>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php $n = $n + 1;
                endforeach; ?>
                <tr class="formEdit">
                    <td colspan="8" class="border-b-2">
                        <div class="ml-auto mr-3 bg-secondary text-white rounded-full w-28 py-1 text-center cursor-pointer hover:bg-secondaryhover transition-colors duration-300 my-2 tambahPrestasi" onclick="tambahPrestasi()">TAMBAH</div>
                    </td>
                </tr>
                <tr class="h-5 formEdit">
                    <td colspan="8" class="rounded-b-3xl"></td>
                </tr>
            </tbody>
            <!-- end isi tabel prestasi -->
        </table>
        <!-- end tabel prestasi -->
    </div>

</div>

<!-- dialog box edit prestasi -->
<!-- kalau mau ngecek hilangin kelas hidden sama opacity-0 nya-->

<!-- BERHASIL edit prestasi -->
<div id="berhasilEditPrestasi">
    <div class="hidden opacity-0 fixed top-0 bottom-0 right-0 left-0 z-50 flex justify-center items-center bg-black bg-opacity-40">
        <div class="duration-700 transition-all p-3 rounded-lg flex items-center" style="background-color: #B1FF66;">
            <img src="/img/icon/check.png" class="h-5 mr-2" style="color: #54AC00;">
            <p class="sm:text-base text-sm font-heading font-bold text-success">Prestasi Berhasil Disimpan</p>
        </div>
    </div>
</div>
<script>
    setTimeout(function() {
        $('#berhasilEditPrestasi').fadeOut();
    }, 1500);
</script>
<!-- GAGAL edit prestasi -->
<div id="gagalEditPrestasi">
    <div class="hidden opacity-0 fixed top-0 bottom-0 right-0 left-0 z-50 flex justify-center items-center bg-black bg-opacity-40">
        <div class="duration-700 transition-all p-3 rounded-lg flex items-center" style="background-color: #FF7474;">
            <img src="/img/icon/warning.png" class="h-5 mr-2">
            <p class="sm:text-base text-sm font-heading font-bold" style="color: #C51800;">Prestasi Tidak Berhasil Disimpan</p>
        </div>
    </div>
</div>
<script>
    setTimeout(function() {
        $('#gagalEditPrestasi').fadeOut();
    }, 1500);
</script>
<!-- BERHASIL tambah prestasi -->
<div id="berhasilTambahPrestasi">
    <div class="hidden opacity-0 fixed top-0 bottom-0 right-0 left-0 z-50 flex justify-center items-center bg-black bg-opacity-40">
        <div class="duration-700 transition-all p-3 rounded-lg flex items-center" style="background-color: #B1FF66;">
            <img src="/img/icon/check.png" class="h-5 mr-2" style="color: #54AC00;">
            <p class="sm:text-base text-sm font-heading font-bold text-success">Pretasi Berhasil Ditambahkan</p>
        </div>
    </div>
</div>
<script>
    setTimeout(function() {
        $('#berhasilTambahPrestasi').fadeOut();
    }, 1500);
</script>
<!-- GAGAL tambah prestasi -->
<div id="gagalTambahPrestasi">
    <div class="hidden opacity-0 fixed top-0 bottom-0 right-0 left-0 z-50 flex justify-center items-center bg-black bg-opacity-40">
        <div class="duration-700 transition-all p-3 rounded-lg flex items-center" style="background-color: #FF7474;">
            <img src="/img/icon/warning.png" class="h-5 mr-2">
            <p class="sm:text-base text-sm font-heading font-bold" style="color: #C51800;">Prestasi Tidak Berhasil Ditambahkan</p>
        </div>
    </div>
</div>
<script>
    setTimeout(function() {
        $('#gagalTambahPrestasi').fadeOut();
    }, 1500);
</script>
<!-- end dialog box-->
<?= $this->endSection(); ?>