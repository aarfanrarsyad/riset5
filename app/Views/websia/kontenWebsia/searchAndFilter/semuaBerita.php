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
                                        <img src="/img/berita/<?= $row['thumbnail'] ?>" alt="<?= $row['thumbnail'] ?>" class="md:w-48 w-full gambarBerita ">
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

                        <!-- HASIL PENCARIAN KOSONG -->
                        <div id="kosong" class=" ml-2 flex-grow min-h-screen"></div>
                    </div>
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
    let x,data;
    let x,data,s;
    let stringBerita = `<!-- Awal Card Berita  --><a href="/User/viewBerita/{id}"><div class="flex px-2 md:flex-row flex-col md:gap-x-4 gap-x-0 items-center"><img src="/img/berita/{thumbnail}" alt="{thumbnail}" class="md:w-48 w-full gambarBerita "><div class="flex-grow"><div class="flex flex-col"><!-- Awal Judul Berita  --><h2 class="text-lg font-heading text-primary font-semibold mb-2">{judul}</h2><!-- Akhir Judul Berita  --><!-- Awal Tanggal Berita  --><div class="text-xs font-paragraph text-primary">{tanggal_publish}</div><!-- Akhir Tanggal Berita  --><!-- Awal Deskripsi Berita  --><div class="text-sm font-paragraph break-words">{konten}</div><!-- Akhir Tanggal Berita  --></div></div></div></a><!-- Akhir Card Berita  --><hr class="my-4 border-gray-400">`;

    function search(tipe) {
        if (x) window.clearTimeout(x);
        x = setTimeout(function() {

            if (tipe == 'alumni') {
                data = $('#filterAlumni').serialize()+'&cari='+$("input[name=cari]").val()+'&limit='+limit+'&start='+start
            } else {
                data = {
                    cari: $("input[name=cari]").val(),
                    beritaAwal:$("input[name=beritaAwal]").val(),
                    beritaAkhir:$("input[name=beritaAkhir]").val(),
                    limit:limit,
                    start:start
                }
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

                    $('#lisBerita').empty()
                    $('#cariBerita').show()
                    $('#jumlahBerita').html(ret.jumlah.berita.text)
                    if (ret.jumlah.berita.ret>0) {
                        jumlahAlumniBerita += ret.jumlah.berita.ret
                        console.log(ret.data.berita)
                        $.each(ret.data.berita, (i, item) => {
                            $('#lisBerita').append(stringBerita.replace('{id}', item.id).replaceAll('{thumbnail}', item.thumbnail).replace('{judul}', item.judul).replace('{konten}', item.konten).replace('{tanggal_publish}', item.tanggal_publish))
                        })
                        $('#lisBerita').append("<hr class='-my-4 border-2 border-gray-400'>")
                        if(ret.data.berita.length >= 10)
                            $('#load_data_message').html("Memuat data....");
                        action = false;
                    } else {
                        $('#load_data_message').html("");
                        action = true;
                    }
                    
                    $('#kosong').hide()
                    if(ret.jumlah.berita.ret == 0)
                        $('#kosong').append(`<img src="/img/components/pencarianKosong.png" class="w-96 mx-auto" alt=""><div class="text-primary text-center font-bold md:text-xl -mt-8 mx-auto">Hasil Pencarian Tidak Ditemukan</div><hr class="border-b-2 border-t-0 w-32 border-gray-400 mx-auto">`).show()
                }
            })
        }, 300)
    }
    
    $("input[name=cari]").keyup( function() {
        $('#lisBerita').empty()
        start = 0;
        search('berita',limit, start) 
    })

    $(".kalenderAwal div.text-xs, .kalenderAkhir div.text-xs").click( function() { 
        $('#lisBerita').empty()
        start = 0;
        search('berita',limit, start)
    })


    if(!action){
        action = true;
        search('berita',limit, start);
    }

    $(window).scroll(function(){
        if($(window).scrollTop() + $(window).height() > $("#lisBerita").height() && !action){
            action = true;
            start += limit;
            setTimeout(function(){
                search('berita',limit, start);
            }, 1000);
        }
    });

})
</script>
<script type="text/javascript" src="/js/search.js"></script>
<?= $this->endSection(); ?>