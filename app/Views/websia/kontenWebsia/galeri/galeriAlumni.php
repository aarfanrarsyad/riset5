<?= $this->extend('websia/layoutWebsia/templateBerandaLogin.php'); ?>

<?= $this->section('content'); ?>
<!-- Awal Galeri Alumni -->
<div class="text-center">
    <div id="coba" class="coba mt-8 text-2xl font-bold font-heading">
        Galeri Kenangan Alumni
    </div>
    <div class="flex items-center justify-center mt-4 mb-8">
        <div class="flex justify-between items-center rounded-3xl text-sm bg-secondary border-2 border-secondary text-white hover:bg-white hover:border-2 hover:border-secondary hover:text-secondary transition-colors duration-300">
            <!-- Awal button album -->
            <button class="img-viewer px-2 py-1">
                ALBUM
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="inline w-6 text-white hover:text-secondary">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>
            <!-- Akhir button album -->
        </div>
    </div>
</div>
<div class="bg-primary">
    <div class="py-4">
        <div class="holder p-8 grid sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-x-4">
            <?php for ($x = 0; $x < 12; $x++) : ?>
                <!-- 1 gambar -->
                <a href="#img-1">
                    <div class="rounded-3xl m-2 relative hover:shadow-xl transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-105 cursor-pointer">
                        <img class="w-full rounded-3xl mx-auto" src="/img/alumni.jpg" alt="" />
                    </div>
                </a>
            <?php endfor; ?>
            <div class="overlay" id="img-1">
                <a href="#" class="close">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="absolute w-8 text-gray-300 top-3 right-3">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </a>
                <a href="#img-1">
                    <img src="/img/left-on.png" alt="" class="absolute top-32 sm:top-1/3">
                    <img src="/img/right-on.png" alt="" class="absolute top-32 right-0 sm:top-1/3">
                </a>
                <img src="/img/alumni.jpg" alt="" class="w-full sm:max-w-screen-sm">
                <p class="mx-12 mt-2 sm:mx-24 md:mx-40 lg:mx-48 text-center text-gray-300">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam impedit optio praesentium soluta quasi. Voluptatibus molestias sequi inventore odit voluptas pariatur a ut, totam obcaecati accusamus iure, labore dolorum dolor.</p>
            </div>
        </div>
        <!-- Awal Navigasi -->
        <div class="flex justify-center md:justify-end items-center mx-8 p-2 text-white font-paragraph">
            <a href="" class="p-1 hover:bg-secondary rounded-full">
                <img src="/img/icon/panah_kiri.png" alt="">
            </a>
            <a href="" class="p-1 hover:text-secondary">
                1
            </a>
            <a href="" class="p-1 hover:text-secondary">
                2
            </a>
            <a href="" class="p-1 hover:text-secondary">
                ..
            </a>
            <a href="" class="p-1 hover:text-secondary">
                45
            </a>
            <a href="" class="p-1 hover:bg-secondary rounded-full">
                <img src="/img/icon/panah_kanan.png" alt=""></a>
        </div>
        <!-- Akhir Navigasi -->
    </div>
</div>
<div class="flex flex-col-reverse md:flex-row md:justify-between items-start mx-8 my-10 pb-4">
    <div class="flex flex-col">
        <div class="mt-5 text-center md:text-left text-3xl text-secondary font-bold font-heading">
            Mama Lorent
        </div>
        <div class="my-4 md:my-5 md:mr-8 text-xl text-justify font-paragraph">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit adipisci sed fuga, earum fugit reiciendis repellendus maxime at quia dolore similique cupiditate inventore accusantium autem exercitationem ratione, natus minus fugiat?
        </div>
        <!-- Awal Button -->
        <div class="text-center md:text-left">
            <button class="mt-2 md:mt-4 px-4 pt-1 pb-2 rounded-3xl text-xl bg-secondary border-2 border-secondary text-white hover:bg-white hover:border-2 hover:border-secondary hover:text-secondary transition-colors duration-300">Unggah Kenanganmu</button>
        </div>
        <!-- Akhir Button -->
    </div>
    <div>
        <img src="/img/alumni.jpg" alt="" class="w-full rounded-3xl">
    </div>
</div>
</div>
<!-- Akhir Galeri Alumni -->
<?= $this->endSection(); ?>