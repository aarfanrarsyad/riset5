<?= $this->extend('websia/layoutWebsia/templateBerandaLogin.php'); ?>

<?= $this->section('content'); ?>

<!-- Awal Galeri Alumni -->
<div class="text-center">
    <div class="mt-8 text-2xl font-bold font-heading">
        Album Galeri Video Kenangan Alumni
    </div>
    <div class="flex items-center justify-center mt-4 mb-8">
        <a href="/User/galeriVideo">
            <button type="button" class="mr-4 px-4 py-1 rounded-3xl border border-secondary text-sm bg-white text-secondary hover:bg-secondaryhover hover:text-white transition-colors duration-300 focus:outline-none galeriButton">
                SEMUA VIDEO
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
        <div class="holder p-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-4">
            <!-- Awal Tampilan Galeri (Buat ditambahkan coding sesuai gambar dari database) -->
            <?php foreach ($list as $video) : ?>
                <a href="<?= base_url('/User/albumVideo/' . $video['album']) ?>">
                    <!-- <a href="/User/albumVideo"> -->
                    <div class="flex flex-col rounded-3xl m-2 relative hover:shadow-xl transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-105 cursor-pointer">
                        <div class="rounded-3xl mb-2 bg-gray-300">
                            <img src="https://img.youtube.com/vi/<?= $video['link'] ?>/0.jpg" alt="<?= $video['link'] ?>" class="rounded-2xl object-cover w-96 h-48">
                        </div>
                        <div class="text-white text-center">
                            Album <?= $video['album']; ?>
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

<!-- Awal fitur unggah Video galeri -->
<?php $validation = service('validation') ?>

<div class="flex flex-col-reverse md:grid md:grid-cols-4 lg:grid-cols-5 md:gap-4">
    <div class="md:col-span-2 lg:col-span-3">
        <div class="flex flex-col mb-10 mx-6 md:m-10 text-center md:text-left">
            <div class="mt-5 md:mt-1 text-3xl text-secondary font-bold font-heading">
                Unggah Video Kenanganmu
            </div>
            <div class="my-4 lg:mr-18 md:my-5 font-paragraph text-base lg:text-xl">
                Kamu bisa berbagi momen kenanganmu semasa kuliah di AIS/STIS/POLSTAT STIS. Selain itu kamu juga bisa mengunggah vide kegiatan/acara alumni. Ayo tunggu apa agi? Unggah video kenanganmu!
            </div>
            <button class="unggahVideo focus:outline-none lg:mr-24 p-1 rounded-3xl bg-secondary border-2 border-secondary text-white hover:bg-white hover:border-2 hover:border-secondary hover:text-secondary transition-colors duration-300 font-paragraph text-base lg:text-xl">UNGGAH VIDEO KENANGANMU</button>
        </div>
    </div>
    <div class="md:col-span-2 lg:col-span-2">
        <div class="">
            <img src="/img/components/galeri.png" alt="icon galeri" class="w-full md:h-full md:w-auto mb-8">
        </div>
    </div>
    <div class="fixed top-0 bottom-0 right-0 left-0 z-50 flex justify-center items-center bg-black bg-opacity-40 font-paragraph overflow-auto hidden" id='formUnggahVideo'>
        <div class="duration-700 transition-all xl:w-1/2 lg:w-7/12 md:w-2/3 sm:w-3/4 w-11/12 bg-gray bg-opacity-0">
            <div class="bg-primary py-4 px-6 rounded-t-2xl flex items-center justify-between text-secondary text-2xl">
                <p class="font-heading font-bold">Unggah Video</p>
                <svg class="closeFormUnggahVideo lg:w-10 md:w-8 sm:w-7 w-6 fill-current cursor-pointer" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </div>
            <form action="uploadVideo" method="post" class="flex flex-col bg-gray-100 sm:px-12 px-4 rounded-b-2xl text-sm">
                <label for="linkVideo" class="text-primary font-medium mt-8">Link Video Youtube</label>
                <input name="linkVideo" id="linkVideo" type="text" placeholder="Link video" class="inputForm" required>
                <label for="albumVideo" class="text-primary font-medium mt-4">Album Video :</label>
                <select name="albumVideo" id="albumVideo" class="inputForm" value="">
                    <option class="text-gray-500" value="" disabled selected>Pilih Album Video</option>
                    <?php foreach ($album as $alb) : ?>
                        <option value="<?= $alb['album'] ?>">Album <?= $alb['album'] ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="text-red-500">
                    <?= service('validation')->getError('albumVideo'); ?>
                </div>
                <div class="flex justify-end my-4">
                    <input type="button" value="BATAL" class="closeFormUnggahVideo bg-secondary text-white rounded-full w-24 py-1 text-center cursor-pointer hover:bg-secondaryhover transition-colors duration-300 text-sm mr-4 outline-none" id='backUnggahVideo'>
                    <input type="submit" value="UNGGAH" class="submitUnggahVideo bg-secondary text-white rounded-full w-24 py-1 text-center cursor-pointer hover:bg-secondaryhover transition-colors duration-300 text-sm outline-none">
                </div>
            </form>
        </div>
    </div>
    <script>
        $('.unggahVideo').click(function() {
            var modal = document.getElementById('formUnggahVideo')
            $('#formUnggahVideo').removeClass('hidden')
            $(window).click(function(e) {
                if (e.target === modal) {
                    setTimeout(function() {
                        $('#formUnggahVideo').addClass('hidden')
                    }, 100);
                }
            });

            $('.closeFormUnggahVideo').click(function() {
                setTimeout(function() {
                    $('#formUnggahVideo').addClass('hidden')
                }, 100);
            });
        })
    </script>
</div>
<!-- Akhir fitur unggah Video  -->

<!-- Catatan : Apabila sukses mengunggah video dapat maka dapat memanggil fungsi js => suksesUnggahVideo ()  -->
<script>
    function suksesUnggahVideo() {

        $('body').prepend(`
        <div class="fixed top-0 bottom-0 right-0 left-0 z-50 flex justify-center items-center bg-black bg-opacity-40 font-paragraph" id='suksesUnggahVideo'>
            <div class="hidden opacity-0 duration-700 transition-all p-3 rounded-lg flex items-center bg-greenAlert">
                <img src="/img/components/icon/check.png" class="h-5 mr-2 text-success" alt="icon check">
                <p class="sm:text-base text-sm font-heading font-bold text-success">Video Anda Berhasil Diunggah</p>
            </div>
        </div>
        `);

        $('#suksesUnggahVideo').children().first().removeClass('hidden')
        setTimeout(function() {
            $('#suksesUnggahVideo').children().first().removeClass('opacity-0')
        }, 10);

        $('.closeSuksesUnggahVideo').click(function() {
            $('#suksesUnggahVideo').children().first().addClass('opacity-0')
            $('#suksesUnggahVideo').children().first().on('transitionend MSTransitionEnd webkitTransitionEnd oTransitionEnd', function() {
                $('#suksesUnggahVideo').children().first().addClass('hidden')
            });
            setTimeout(function() {
                $('#suksesUnggahVideo').remove()
            }, 400);
        });

        var modal = document.getElementById('suksesUnggahVideo')
        $(window).click(function(e) {
            if (e.target === modal) {
                $('#suksesUnggahVideo').children().first().addClass('opacity-0')
                $('#suksesUnggahVideo').children().first().on('transitionend MSTransitionEnd webkitTransitionEnd oTransitionEnd', function() {
                    $('#suksesUnggahVideo').children().first().addClass('hidden')
                });
                setTimeout(function() {
                    $('#suksesUnggahVideo').remove()
                }, 400);
            }
        });
    }
</script>
<!-- Akhir Galeri Alumni -->
<?= session()->flash; ?>

<?= $this->endSection(); ?>