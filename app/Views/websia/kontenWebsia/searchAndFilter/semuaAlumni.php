<?= $this->extend('websia/layoutWebsia/templateBerandaLogin.php'); ?>

<?= $this->section('content'); ?>

<div class="flex w-full">

    <!-- awal sidebar -->
    <?= $this->include('websia/kontenWebsia/searchAndFilter/sidebarFilter'); ?>
    <!-- akhir sidebar -->

    <!-- awal Hasil Pencarian  -->
    <div class="flex-grow min-h-screen my-6 ">
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

                <!-- HASIL PENCARIAN ALUMNI -->
                <div class="md:ml-12 mx-3 mb-6">
                    <div>
                        <h1 class="text-secondary font-heading text-2xl font-bold">Semua ALUMNI</h1>

                        <!-- awal jumlah hasil pencarian alumni  -->
                        <div class="text-primary md:mb-6 mb-2 font-paragraph font-extralight text-sm" id="jumlahAlumni">
                            <?= $jumlah['text']; ?>
                        </div>
                        <hr class="md:my-4 my-2 border-2 border-gray-400">
                        <!-- akhir jumlah hasil pencarian alumni  -->

                        <!-- Awal DAFTAR HASIL PENCARIAN ALUMNI -->
                        <div id="lisAlumni">
                            <?php foreach ($alumni as $row) : ?>
                                <!-- Awal Card Alumni -->
                                <a href="/User/profilAlumni/<?= $row['nim'] ?>">
                                    <div class="mx-2">
                                        <div class="flex gap-x-4">
                                            <div class="flex items-center">
                                                <img src="/img/<?= $row['foto_profil'] ?>" class="lg:w-18 w-12 mx-auto" alt="">
                                            </div>
                                            <div class="flex items-center">
                                                <div>
                                                    <!-- Awal Nama Alumni -->
                                                    <h2 class="md:text-lg font-heading text-primary font-semibold"><?= $row['nama']; ?></h2>
                                                    <!-- Akhir Nama Alumni -->

                                                    <!-- Awal Atribut Alumni -->
                                                    <div class="md:text-sm text-xs font-paragraph text-primary">Angkatan <?= implode(', ', get_by_id($row['id_alumni'],'angkatan','pendidikan',true)) ?></div>
                                                    <!-- Akhir Atribut Alumni -->

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <!-- Akhir Card Alumni -->

                                <hr class="my-4 border-gray-400">
                            <?php endforeach; ?>
                            <hr class="-my-4 border-2 border-gray-400">
                        </div>
                        <div id="load_data_message" class="text-primary md:mb-6 my-5 font-paragraph font-extralight text-sm"></div>

                        <!-- Akhir DAFTAR HASIL PENCARIAN ALUMNI -->

                    </div>
                </div>
                <!-- AKHIR HASIL PENCARIAN ALUMNI -->

            </div>
        </div>
    </div>
    <!-- akhir Hasil Pencarian  -->


</div>
<script type="text/javascript">
    var limit = 10;
    var start = <?= count($alumni) ?>;
    var action = 'inactive';
    let x,data,s;
    let string = `<!-- Awal Card Alumni --><a href="/User/profilAlumni/{nim}"><div class="mx-2"><div class="flex gap-x-4"><div class="flex items-center"><img src="/img/{foto_profil}" class="lg:w-18 w-12 mx-auto" alt=""></div><div class="flex items-center"><div><!-- Awal Nama Alumni --><h2 class="md:text-lg font-heading text-primary font-semibold">{nama}</h2><!-- Akhir Nama Alumni --><!-- Awal Atribut Alumni --><div class="md:text-sm text-xs font-paragraph text-primary">Angkatan {akt}</div><!-- Akhir Atribut Alumni --></div></div></div></div></a><!-- Akhir Card Alumni --><hr class="my-4 border-gray-400">`;

    function search(tipe = 'alumni',limit,start) {
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

            $.ajax({
                url: "#",
                type:'POST',
                data: data,
                dataType:'JSON',
                cache:false,
                success: (data) => {
                        // console.log(data.alumni)
                    $('#jumlahAlumni').html(data.jumlah)
                    $('#lisAlumni').find('hr.border-2').remove()
                    if (Boolean(data.alumni.length)) {
                        $.each(data.alumni, (i, item) => {
                            $('#lisAlumni').append(string.replace('{nim}', item.nim).replace('{nama}', item.nama).replace('{foto_profil}', item.foto_profil).replace('{akt}', item.angkatan))
                        })
                        $('#lisAlumni').append("<hr class='-my-4 border-2 border-gray-400'>")
                        if(data.alumni.length == 10)
                            $('#load_data_message').html("Memuat data....");
                        action = "inactive";
                    } else {
                        $('#load_data_message').html("");
                        action = 'active';
                    }
                    if(data.ret == 0)
                        $('#lisAlumni').append(`<div class=" ml-2 flex-grow min-h-screen "><img src="/img/pencarianKosong.png" class="w-96 mx-auto" alt=""><div class="text-primary text-center font-bold md:text-xl -mt-8 mx-auto">Hasil Pencarian Tidak Ditemukan</div><hr class="border-b-2 border-t-0 w-32 border-gray-400 mx-auto"></div>`)
                }
            })
        }, 300)
    }
    
    $('.listProdi svg').click(function(){
        let prodi = $(this).parent().find('.cari')
        if (prodi.attr('name') == 'prodi[]') {
            prodi.attr('name','p')
        } else {
            prodi.attr('name','prodi[]')
        }
        $('#lisAlumni').empty()
        start = 0;
        search('alumni',limit, start)
    })

    $("input[name=cari], .cari").keyup( function() {
        $('#lisAlumni').empty()
        start = 0;
        search('alumni',limit, start)
    })    

    if(action == 'inactive'){
        action = 'active';
        search('alumni',limit, start);
    }

    $(window).scroll(function(){
        if($(window).scrollTop() + $(window).height() > $("#lisAlumni").height() && action == 'inactive'){
            action = 'active';
            start = start + limit;
            setTimeout(function(){
                search('alumni',limit, start);
            }, 1000);
        }
    });

</script>

<script type="text/javascript" src="/js/search.js"></script>
<?= $this->endSection(); ?>