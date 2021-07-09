<?= $this->extend('websia/layoutWebsia/templateBerandaLogin.php'); ?>

<?= $this->section('content'); ?>

<!-- Awal Galeri Alumni -->
<div class="text-center">
    <div class="mt-8 text-2xl font-bold font-heading">
        Album Galeri Kenangan Alumni
    </div>
    <div class="flex items-center justify-center mt-4 mb-8">
        <a href="/User/galeriFoto">
            <button type="button" class="mr-4 px-4 py-1 rounded-3xl border border-secondary text-sm bg-white text-secondary hover:bg-secondaryhover hover:text-white transition-colors duration-300 focus:outline-none galeriButton">
                SEMUA FOTO
            </button>
        </a>
        <div class="album-btn rounded-3xl text-sm bg-secondary text-white hover:bg-secondaryhover transition-all duration-400 galeriButton">
            <!-- Awal button album -->
            <div class="font-paragraph">
                <button class="text-center rounded-3xl px-4 py-1 border border-secondary focus:outline-none">
                    ALBUM
                </button>
            </div>
            <!-- Akhir button album -->
        </div>
    </div>
</div>
<div class="bg-primary">
    <div class="py-4">
        <div class="holder p-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-4 gap-y-2">
            <!-- Awal Tampilan Galeri (Buat ditambahkan coding sesuai gambar dari database) -->
            <?php foreach ($list as $foto) : ?>
                <a href="<?= base_url('/User/albumFoto/' . $foto['album']) ?>">
                    <div class="flex flex-col rounded-3xl m-2 relative transition duration-500 ease-in-out transform  hover:scale-105 cursor-pointer">
                        <div class="rounded-3xl mb-2 bg-gray-300">
                            <img src="<?= base_url() ?>/img/galeri/<?= $foto['nama_file']; ?>" alt="<?= $foto['nama_file']; ?>" class="rounded-2xl object-cover w-96 h-48">
                        </div>
                        <div class="text-white text-center">
                            Album <?= $foto['album']; ?>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
            <!-- Akhir Tampilan Galeri -->
        </div>
        <!-- Awal Navigasi -->
        <!-- <div class="flex justify-center md:justify-end items-center mx-8 p-2 text-secondary font-paragraph">
            <a href="" class="p-1 rounded-full w-7 transform hover:scale-110">
                <img src="/img/components/icon/left-double.png" alt="halaman pertama">
            </a>
            <a href="" class="p-1 rounded-full w-7 transform hover:scale-110">
                <img src="/img/components/icon/left-on.png" alt="halaman sebelumnya">
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
                <img src="/img/components/icon/right-on.png" alt="halaman berikutnya"></a>
            <a href="" class="p-1 rounded-full w-7 transform hover:scale-110">
                <img src="/img/components/icon/right-double.png" alt="halaman terakhir"></a>
        </div> -->
        <!-- Akhir Navigasi -->
    </div>
</div>

<!-- Awal fitur unggah foto galeri -->
<?php $validation = service('validation') ?>

<div class="flex flex-col-reverse md:grid md:grid-cols-4 lg:grid-cols-5 md:gap-4 mb-8">
    <div class="md:col-span-2 lg:col-span-3 md:mx-8 mb-6">
        <div class="flex flex-col mx-6 md:m-6">
            <div class="mt-5 md:mt-1 text-center md:text-left text-3xl text-secondary font-bold font-heading">
                Unggah Kenangan Manismu
            </div>
            <div class="my-4 md:my-5 font-paragraph text-base lg:text-xl">
                Kamu bisa berbagi momen kenangan manismu semasa kuliah di AIS/STIS/POLSTAT STIS. Selain itu kamu juga bisa menandai seseorang pada unggahanmu. Ayo tunggu apa lagi? Unggah kenangan manismu!
            </div>
            <button class="unggahFoto focus:outline-none p-1 rounded-3xl bg-secondary border-2 border-secondary text-white hover:bg-white hover:border-2 hover:border-secondary hover:text-secondary transition-colors duration-300 font-paragraph text-base lg:text-xl" id="unggahFoto">UNGGAH KENANGANMU</button>
        </div>
    </div>
    <div class="md:col-span-2 lg:col-span-2">
        <div class="">
            <img src="<?= base_url() ?>/img/components/galeri.png" alt="icon galeri" class="w-full md:h-full md:w-auto">
        </div>
    </div>
    <div class="fixed top-0 bottom-0 right-0 left-0 z-50 flex justify-center items-center bg-black bg-opacity-40 font-paragraph overflow-auto hidden" id='formUnggahFoto'>
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
                <div class="text-red-500">
                    <?= service('validation')->getError('file_upload'); ?>
                </div>
                <label for="albumFoto" class="text-primary font-medium mt-2">*Album Foto:</label>
                <select name="albumFoto" id="albumFoto" class="inputForm font-heading text-xs">
                    <option class="text-gray-500" value="" disabled selected>Pilih Album</option>
                    <?php foreach ($album as $alb) : ?>
                        <option value="<?= $alb['album'] ?>">Album <?= $alb['album'] ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="text-red-500">
                    <?= service('validation')->getError('albumFoto'); ?>
                </div>
                <label for="deskripsi" class="text-primary font-medium">*Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="4" class="inputForm resize-none font-heading text-xs" placeholder="Penggunaan Jutsu Air dalam Mengatasi Permasalahan Banjir yang Sering Terjadi di Wilayah Pemukiman Rawan Longsor" maxlength="150" required></textarea>
                <div class="text-red-500">
                    <?= service('validation')->getError('deskripsi'); ?>
                </div>
                <!-- <label for="angkatan" class="text-primary font-medium">*Angkatan :</label>
                <input name="angkatan" id="angkatan" type="number" min="1" max="63" step="1" value="60" size="6" class="inputForm font-heading text-xs" required> -->
                <div class="text-primary font-medium">Tags :</div>
                <div id="tags-container">
                    <div class="control-group">
                        <select id="tags" class="tags font-heading text-xs" placeholder="Tandai orang"></select>
                    </div>
                </div>
                <br>
                <div class="font-heading text-xs text-primary">
                    <p class="mb-2"> *Harus Diisi </p>
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

    //Awal apabila Unggah Foto Sukses
    function suksesUnggahFoto() {

        $('body').prepend(`
        <div class="fixed top-0 bottom-0 right-0 left-0 z-50 flex justify-center items-center bg-black bg-opacity-40 font-paragraph" id='suksesUnggahFoto'>
            <div class="hidden opacity-0 duration-700 transition-all p-3 rounded-lg flex items-center bg-greenAlert">
                <img src="/img/components/icon/check.png" class="h-5 mr-2 text-success" alt="icon check">
                <p class="sm:text-base text-sm font-heading font-bold text-success">Foto Anda Berhasil Diunggah</p>
            </div>
        </div>
        `);

        $('#suksesUnggahFoto').children().first().removeClass('hidden')
        setTimeout(function() {
            $('#suksesUnggahFoto').children().first().removeClass('opacity-0')
        }, 10);

        $('.closeSuksesUnggahFoto').click(function() {
            $('#suksesUnggahFoto').children().first().addClass('opacity-0')
            $('#suksesUnggahFoto').children().first().on('transitionend MSTransitionEnd webkitTransitionEnd oTransitionEnd', function() {
                $('#suksesUnggahFoto').children().first().addClass('hidden')
            });
            setTimeout(function() {
                $('#suksesUnggahFoto').remove()
            }, 400);
        })

        var modal = document.getElementById('suksesUnggahFoto')
        $(window).click(function(e) {
            if (e.target === modal) {
                $('#suksesUnggahFoto').children().first().addClass('opacity-0')
                $('#suksesUnggahFoto').children().first().on('transitionend MSTransitionEnd webkitTransitionEnd oTransitionEnd', function() {
                    $('#suksesUnggahFoto').children().first().addClass('hidden')
                });
                setTimeout(function() {
                    $('#suksesUnggahFoto').remove()
                }, 400);
            }
        })

    }
    //Akhir apabila Unggah Foto Sukses
</script>
<!-- Akhir fitur unggah foto galeri -->

<!-- Catatan : Apabila sukses mengunggah foto dapat maka dapat memanggil fungsi js => suksesUnggahFoto ()  -->
<!-- Catatan : Apabila sukses laporkan foto dapat maka dapat memanggil fungsi js => suksesLaporkanFoto ()  -->
<?= session()->flash; ?>

<!-- Akhir Galeri Alumni -->
<?= $this->endSection(); ?>