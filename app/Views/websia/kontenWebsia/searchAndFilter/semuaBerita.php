<?= $this->extend('websia/layoutWebsia/templateBerandaLogin.php'); ?>

<?= $this->section('content'); ?>

<div class="flex w-full">

    <!-- awal sidebar -->
    <?= $this->include('websia/kontenWebsia/searchAndFilter/sidebarFilter'); ?>
    <!-- akhir sidebar -->

    <!-- awal Hasil Pencarian  -->
    <div class="ml-2 flex-grow min-h-screen my-6 ">
        <div class="flex">

            <!-- awal -> ini hanya untuk margin sidebar jadi jangan ubah kecuali jika ubah ukuran sidebarnya  -->
            <div class=" invisible">
                <div class="flex md:px-4 px-2 py-1 justify-between bg-primaryHover marginSidebar">
                    <svg class="w-4 fill-current text-secondary cursor-pointer" id="hamburgerSidebar" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </div>
            </div>
            <!-- akhir -> ini hanya untuk margin sidebar jadi jangan ubah kecuali jika ubah ukuran sidebarnya  -->

            <div class="flex-grow mr-2" id="hasilPencarian">
                <!-- Catatan : jika hasil tidak ada, bisa isi id="hasilPencarian" dengan coding yang ada pada searchKosong.php  -->

                <!-- HASIL PENCARIAN BERITA -->
                <div class="mx-3 mt-2" id="cariBerita">
                    <div>
                        <h1 class="text-secondary font-heading text-2xl font-bold">BERITA</h1>

                        <!-- awal jumlah hasil pencarian berita  -->
                        <div id="jumlahBerita" class="text-primary md:mb-6 mb-2 font-paragraph font-extralight text-sm">
                            <?= $jumlah['berita']['text']; ?>
                        </div>
                        <hr class="md:my-4 my-2 border-2 border-gray-400">
                        <!-- akhir jumlah hasil pencarian berita  -->


                        <!-- Awal DAFTAR HASIL PENCARIAN BERITA -->
                        <div id="lisBerita">
                            <?php foreach ($data['berita'] as $row) : ?>
                                <!-- Awal Card Berita  -->
                                <a href="<?= base_url('user/viewBerita/'.$row['id']) ?>">
                                    <div class="flex px-2 md:flex-row flex-col md:gap-x-4 gap-x-0 items-center">
                                        <img src="/berita/berita_<?= $row['id'].'/'.$row['thumbnail'] ?>" alt="<?= $row['thumbnail'] ?>" class="md:w-48 w-full gambarBerita ">
                                        <div class="flex-grow">
                                            <div class="flex flex-col">

                                                <!-- Awal Judul Berita  -->
                                                <h2 class="text-lg font-heading text-primary font-semibold mb-2"><?= $row['judul'] ?></h2>
                                                <!-- Akhir Judul Berita  -->

                                                <!-- Awal Tanggal Berita  -->
                                                <div class="text-xs font-paragraph text-primary"><?= $row['tanggal_publish'] ?></div>
                                                <!-- Akhir Tanggal Berita  -->

                                                <!-- Awal Deskripsi Berita  -->
                                                <div class="text-sm font-paragraph break-words"><?= $row['konten'] ?></div>
                                                <!-- Akhir Tanggal Berita  -->

                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <!-- Akhir Card Berita  -->

                                <hr class="my-4 border-gray-400">
                            <?php endforeach; ?>
                            <hr class="-my-4 border-2 border-gray-400">
                        </div>

                        <div id="load_data_message" class="text-primary md:mb-6 my-5 font-paragraph font-extralight text-sm"></div>
                        <!-- Akhir DAFTAR HASIL PENCARIAN BERITA -->
                    </div>
                </div>

                <!-- HASIL PENCARIAN KOSONG -->
                <div id="kosong" class=" ml-2 flex-grow min-h-screen">
                    <img src="/img/components/pencarianKosong.png" class="w-96 mx-auto" alt="">
                    <div class="text-primary text-center font-bold md:text-xl -mt-8 mx-auto">Hasil Pencarian Tidak Ditemukan</div>
                    <hr class="border-b-2 border-t-0 w-32 border-gray-400 mx-auto">
                </div>

                <!-- END HASIL PENCARIAN BERITA -->
            </div>
        </div>
    </div>
    <!-- akhir Hasil Pencarian  -->


</div>


<script>
$(document).ready(()=>{
    var limit = 10;
    var start = <?= count($data['berita']) ?>;
    var action = false;
    let x,data,s;
    let stringBerita = `<!-- Awal Card Berita  --><a href="/User/viewBerita/{id}"><div class="flex px-2 md:flex-row flex-col md:gap-x-4 gap-x-0 items-center"><img src="/berita/berita_{thumbnail}" alt="{thumbnail}" class="md:w-48 w-full gambarBerita "><div class="flex-grow"><div class="flex flex-col"><!-- Awal Judul Berita  --><h2 class="text-lg font-heading text-primary font-semibold mb-2">{judul}</h2><!-- Akhir Judul Berita  --><!-- Awal Tanggal Berita  --><div class="text-xs font-paragraph text-primary">{tanggal_publish}</div><!-- Akhir Tanggal Berita  --><!-- Awal Deskripsi Berita  --><div class="text-sm font-paragraph break-words">{konten}</div><!-- Akhir Tanggal Berita  --></div></div></div></a><!-- Akhir Card Berita  --><hr class="my-4 border-gray-400">`;

    function search(limit,start) {
        data = {
            cari : $("input[name=cari]").val(),
            awal : $("#awalTahun").val(),
            akhir: $("#akhirTahun").val(),
            limit: limit,
            start: start
        }
        console.log(data)

        $.ajax({
            url: "#",
            type:'POST',
            data: data,
            dataType:'JSON',
            cache:false,
            success: (ret) => {
                console.log(ret)

                $('#jumlahBerita').html(ret.jumlah.berita.text)
                $('#lisBerita').find('hr.border-2').remove()
                if (ret.data.berita.length > 0) {
                    console.log(ret.data.berita)
                    $.each(ret.data.berita, (i, item) => {
                        $('#lisBerita').append(stringBerita.replace('{id}', item.id).replaceAll('{thumbnail}', item.id+'/'+item.thumbnail).replace('{judul}', item.judul).replace('{konten}', item.konten).replace('{tanggal_publish}', item.tanggal_publish))
                    })
                    $('#lisBerita').append("<hr class='-my-4 border-2 border-gray-400'>")
                    if(ret.jumlah.berita.ret >= 10)
                        $('#load_data_message').html("Memuat data....");
                    action = false;
                } else {
                    $('#load_data_message').html("");
                    action = true;
                }
                
                $('#kosong').hide()
                $('#cariBerita').show()
                if(ret.jumlah.berita.ret == 0){
                    $('#kosong').show()
                    $('#cariBerita').hide()
                }
            }
        })
    }

    <?php if (count($data['berita'])>0): ?>$('#kosong').hide()<?php endif; ?>

    $("input[name=cari]").keyup( function() {
        $('#lisBerita').empty()
        start = 0;
        if (x) window.clearTimeout(x);
        x = setTimeout(function() { search(limit,start) }, 300) 
    })

    $("#awalTahun, #akhirTahun").change( function() { 
        $('#lisBerita').empty()
        start = 0;
        search(limit, start)
    })


    if(!action){
        action = true;
        search(limit, start);
    }

    $(window).scroll(function(){
        setTimeout(()=>{$('#load_data_message').html("")},3000)
        if($(window).scrollTop() + $(window).height() > $("#lisBerita").height() && !action){
            action = true;
            start += limit;
            setTimeout(function(){
                search(limit, start);
            }, 1000);
        }
    });

})
</script>
<script type="text/javascript" src="/js/search.js"></script>
<?= $this->endSection(); ?>