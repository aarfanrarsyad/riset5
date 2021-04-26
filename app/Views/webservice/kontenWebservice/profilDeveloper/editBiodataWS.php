<?= $this->extend('webservice/kontenWebservice/profilDeveloper/layoutEditWS.php'); ?>

<?= $this->section('contentEdit'); ?>
<div class="flex justify-center mb-8">
    <div class="shadow-2xl rounded-xl p-6 lg:w-full w-5/6">
        <form action="" method="POST" class="font-paragraph text-primary" id="formEditBiodataDev">
            <label for="nama" class="font-medium">Nama:</label>
            <input type="text" name="nama" id="nama" class="inputForm mb-2" placeholder="Nama Lengkap">
            <div class="lg:grid lg:grid-cols-2 lg:gap-x-6">
                <div>
                    <label for="tempatlahir" class="font-medium">Tempat Lahir:</label>
                    <input type="text" name="tempatlahir" id="tempatlahir" class="inputForm mb-2" placeholder="Tempat lahir">
                </div>
                <div>
                    <label for="tanggallahir" class="font-medium">Tanggal Lahir:</label>
                    <input type="date" name="tanggallahir" id="tanggallahir" class="inputForm mb-2">
                </div>
            </div>
            <label for="status" class="font-medium">Status:</label>
            <input type="text" name="status" id="status" class="inputForm mb-2" placeholder="Mahasiswa">
            <label for="instansi" class="font-medium">Instansi:</label>
            <input type="text" name="instansi" id="instansi" class="inputForm mb-2" placeholder="Politeknik Statistika STIS">
            <div class="flex justify-end">
                <input type="submit" value="SIMPAN" class="w-24 text-center py-1 bg-secondary hover:bg-secondaryhover text-white rounded-full cursor-pointer focus:outline-none mt-8 text-sm" id="simpanBiodata">
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>