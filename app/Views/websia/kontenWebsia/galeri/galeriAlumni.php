<?= $this->extend('websia/layoutWebsia/templateBerandaLogin.php'); ?>

<?= $this->section('content'); ?>

<!-- Awal Galeri Alumni -->
<div class="text-center">
    <div class="mt-8 text-2xl font-bold font-heading">
        Galeri Kenangan Alumni
    </div>
    <div class="flex items-center justify-center mt-4 mb-8">
        <button class="mr-4 px-4 py-1 rounded-3xl border border-secondary text-sm bg-secondary text-white hover:bg-secondaryhover hover:text-white transition-colors duration-300 focus:outline-none galeriButton">SEMUA FOTO</button>
        <div class="album-btn rounded-3xl text-sm bg-white text-secondary hover:bg-secondaryhover hover:text-white transition-all duration-400 galeriButton">
            <!-- Awal button album -->
            <div class="font-paragraph">
                <button type="button" class="text-center rounded-3xl px-4 py-1 border border-secondary focus:outline-none">
                    <a href="/User/listAlbumFoto">
                        ALBUM
                    </a>
                </button>
            </div>
            <!-- Akhir button album -->
        </div>
    </div>
</div>
<div class="bg-primary">
    <div class="py-4">
        <div class="holder p-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-4">
            <!-- Awal Tampilan Galeri (Buat ditambahkan coding sesuai gambar dari database) -->
            <?php for ($x = 0; $x < 12; $x++) : ?>
                <!-- 1 gambar -->
                <a href="#img-1">
                    <div class="rounded-3xl m-2 relative hover:shadow-xl transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-105 cursor-pointer">
                        <img class="albumImg w-full rounded-3xl mx-auto" src="/img/components/alumni.jpg" alt="" />
                    </div>
                </a>
            <?php endfor; ?>
            <!-- Akhir Tampilan Galeri -->
        </div>
        <!-- Awal Navigasi -->
        <div class="flex justify-center md:justify-end items-center mx-8 p-2 text-secondary font-paragraph">
            <a href="" class="p-1 rounded-full w-7 transform hover:scale-110">
                <img src="/img/components/icon/left-double.png" alt="">
            </a>
            <a href="" class="p-1 rounded-full w-7 transform hover:scale-110">
                <img src="/img/components/icon/left-on.png" alt="">
            </a>
            <a href="" class="p-1 hover:text-white">
                1
            </a>
            <a href="" class="p-1 hover:text-white">
                2
            </a>
            <a href="" class="p-1 hover:text-white">
                ..
            </a>
            <a href="" class="p-1 hover:text-white">
                45
            </a>
            <a href="" class="p-1 rounded-full w-7 transform hover:scale-110">
                <img src="/img/components/icon/right-on.png" alt=""></a>
            <a href="" class="p-1 rounded-full w-7 transform hover:scale-110">
                <img src="/img/components/icon/right-double.png" alt=""></a>
        </div>
        <!-- Akhir Navigasi -->
    </div>
</div>

<!-- Awal fitur unggah foto galeri -->
<div class="flex flex-col-reverse md:grid md:grid-cols-4 lg:grid-cols-5 md:gap-4 mb-8">
    <div class="md:col-span-2 lg:col-span-3 md:mx-8 mb-6">
        <div class="flex flex-col mx-6 md:m-6">
            <div class="mt-5 md:mt-1 text-center md:text-left text-3xl text-secondary font-bold font-heading">
                Mama Lorent
            </div>
            <div class="my-4 md:my-5 font-paragraph italic text-base lg:text-xl">
                "Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit adipisci sed fuga, earum fugit reiciendis repellendus maxime at quia dolore similique cupiditate inventore accusantium autem exercitationem ratione, natus minus fugiat?"
            </div>
            <button class="unggahFoto focus:outline-none p-1 rounded-3xl bg-secondary border-2 border-secondary text-white hover:bg-white hover:border-2 hover:border-secondary hover:text-secondary transition-colors duration-300 font-paragraph text-base lg:text-xl" id="unggahFoto">UNGGAH KENANGANMU</button>
        </div>
    </div>
    <div class="md:col-span-2 lg:col-span-2">
        <div class="">
            <img src="/img/components/galeri.png" alt="" class="w-full md:h-full md:w-auto">
        </div>
    </div>
    <div class="fixed top-0 bottom-0 right-0 left-0 z-50 flex justify-center items-center bg-black bg-opacity-40 font-paragraph hidden" id='formUnggahFoto'>
        <div class="duration-700 transition-all xl:w-1/2 lg:w-7/12 md:w-2/3 sm:w-3/4 w-11/12 bg-gray bg-opacity-0">
            <div class="bg-primary py-4 px-6 rounded-t-2xl flex items-center justify-between text-secondary text-2xl">
                <p class="font-heading font-bold">Unggah Foto</p>
                <svg class="closeFormUnggahFoto lg:w-10 md:w-8 sm:w-7 w-6 fill-current cursor-pointer" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </div>
            <form action="<?= base_url('/user/uploadGaleri') ?>" method="post" enctype="multipart/form-data" class="flex flex-col bg-gray-100 sm:px-12 px-4 rounded-b-2xl text-sm">
                <div class="flex mt-5">
                    <div class="flex justify-start items-center mb-2 w-full relative">
                        <input type="file" hidden accept=".jpg, .jpeg, .img, .png" title="Pilih File" id='pilihFile' name="file_upload">
                        <label for="pilihFile" title="Harus Diisi" class="pilihFile bg-secondary text-white rounded-full w-24 py-1 text-center cursor-pointer hover:bg-secondaryhover transition-colors duration-300 text-sm mr-4 outline-none">Pilih File</label>
                        <span class="text-primary absolute md:left-28 left-28 select-none cursor-default cursor md:text-sm text-sm" id="textPhoto">Tidak ada foto yang dipilih</span>
                    </div>
                </div>
                <label for="albumFoto" class="text-primary font-medium mt-2">Album Foto:</label>
                <select name="albumFoto" id="albumFoto" class="inputForm font-heading text-xs">
                    <option class="text-gray-500" value="" disabled selected>Pilih Album</option>
                    <option value="alumni">Album Alumni</option>
                    <option value="wisuda">Album Wisuda</option>
                    <option value="kenangan">Album Kenangan</option>
                </select>
                <label for="deskripsi" class="text-primary font-medium">*Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="2" class="inputForm resize-none font-heading text-xs" placeholder="Penggunaan Jutsu Air dalam Mengatasi Permasalahan Banjir yang Sering Terjadi di Wilayah Pemukiman Rawan Longsor" maxlength="2200" required></textarea>
                <!-- <label for="angkatan" class="text-primary font-medium">*Angkatan :</label>
                <input name="angkatan" id="angkatan" type="number" min="1" max="63" step="1" value="60" size="6" class="inputForm font-heading text-xs" required> -->
                <label for="tags" class="text-primary font-medium">Tags :</label>
                <div id="tags-container">
                    <div class="control-group">
                        <select id="tags" class="tags inputForm font-heading text-xs" placeholder="Tandai orang"></select>
                    </div>
                </div>
                <div class="font-heading text-xs text-primary">
                    <p class="mb-2"> *Required </p>
                    <p> Format file harus .jpg/.jpeg/.png </p>
                    <p> Ukuran file maksimum 2 MB </p>
                </div>
                <div class="flex justify-end my-4">
                    <input type="button" value="BATAL" class="closeFormUnggahFoto bg-secondary text-white rounded-full w-24 py-1 text-center cursor-pointer hover:bg-secondaryhover transition-colors duration-300 text-sm mr-4 outline-none" id='backUnggahFoto'>
                    <input type="submit" value="UNGGAH" class="suksesUnggahFoto bg-secondary text-white rounded-full w-24 py-1 text-center cursor-pointer hover:bg-secondaryhover transition-colors duration-300 text-sm outline-none">
                </div>
                <input type="hidden" name="tags" id="tags_form">
            </form>
        </div>
    </div>

</div>

<script>
    // buat nama di foto yang diupload
    $('#pilihFile').change(function() {
        string = $('#pilihFile').val().split("\\");
        $('#textPhoto').html(string[string.length - 1]);
    });

    //buat tags
    var formatTags = function(item) {
        return $.trim((item.name || ''));
    };

    $('#tags').selectize({
        plugins: ['remove_button'],
        persist: false,
        valueField: 'id_alumni',
        labelField: 'name',
        searchField: ['name', 'angkatan'],
        sortField: [{
            field: 'angkatan',
            direction: 'asc'
        }],
        maxOptions: 5,
        maxItems: 10,
        options: [
            <?php foreach ($alumni as $data) {
                echo ("{
                        angkatan: \"Angkatan " . $data->angkatan . "\",
                        name: \"" . $data->nama . "\",
                        id_alumni: \"" . $data->id_alumni . "\"
                    },");
            } ?>
        ],
        render: {
            item: function(item, escape) {
                var name = formatTags(item);
                return '<div>' +
                    (name ? '<span class="name">' + escape(name) + '</span>' : '') +
                    (item.angkatan ? '<span class="angkatan mx-1">' + escape(item.angkatan) + '</span>' : '') +
                    '</div>';
            },
            option: function(item, escape) {
                var name = formatTags(item);
                var label = name || item.angkatan;
                var caption = name ? item.angkatan : null;
                return '<div>' +
                    '<span class="label">' + escape(label) + '</span>' +
                    (caption ? '<span class="caption">' + escape(caption) + '</span>' : '') +
                    '</div>';
            }
        }
    });

    $('#unggahFoto').click(function() {
        var modal = document.getElementById('formUnggahFoto')
        $('#formUnggahFoto').removeClass('hidden')
        $(window).click(function(e) {
            if (e.target === modal) {
                setTimeout(function() {
                    $('#formUnggahFoto').addClass('hidden')
                }, 100);
            }
        });

        $('.closeFormUnggahFoto').click(function() {
            setTimeout(function() {
                $('#formUnggahFoto').addClass('hidden')
            }, 100);
        });
    })

    $('#tags').change(function() {
        $tags = $('#tags').val();
        $('#tags_form').val($tags);
    });
</script>
<!-- Akhir fitur unggah foto galeri -->

<!-- Catatan : Apabila sukses mengunggah foto dapat maka dapat memanggil fungsi js => suksesUnggahFoto ()  -->
<!-- Catatan : Apabila sukses laporkan foto dapat maka dapat memanggil fungsi js => suksesLaporkanFoto ()  -->


<!-- Akhir Galeri Alumni -->
<?= $this->endSection(); ?>