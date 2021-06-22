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
            <div class="md:hidden invisible">
                <div class="flex md:px-4 px-2 py-1 justify-between bg-primaryHover marginSidebar">
                    <svg class="w-4 fill-current text-secondary cursor-pointer" id="hamburgerSidebar" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </div>
            </div>
            <!-- akhir -> ini hanya untuk margin sidebar jadi jangan ubah kecuali jika ubah ukuran sidebarnya  -->

            <div class="flex-grow mr-2" id="hasilPencarian"><?php $cari = (isset($_GET['cari'])) ? $_GET['cari'] : '' ; ?>
                <!-- Catatan : jika hasil tidak ada, bisa isi id="hasilPencarian" dengan coding yang ada pada searchKosong.php  -->

                <!-- HASIL PENCARIAN ALUMNI -->
                <div class="mx-3 mb-6" id="cariAlumni" <?php if($jumlah['alumni']['ret'] == 0): ?>style="display:none;"<?php endif; ?>>
                    <div>
                        <h1 class="text-secondary font-heading text-2xl font-bold">ALUMNI</h1>

                        <!-- awal jumlah hasil pencarian alumni  -->
                        <div class="text-primary md:mb-6 mb-2 font-paragraph font-extralight text-sm" id="jumlahAlumni">
                            <?= $jumlah['alumni']['text']; ?>
                        </div>
                        <hr class="md:my-4 my-2 border-2 border-gray-400">
                        <!-- akhir jumlah hasil pencarian alumni  -->

                        <!-- Awal DAFTAR HASIL PENCARIAN ALUMNI -->
                        <div id="lisAlumni">
                            <?php foreach ($data['alumni'] as $row) : ?>
                                <!-- Awal Card Alumni -->
                                <a href="/User/profilAlumni/<?= $row['id_alumni'] ?>">
                                    <div class="mx-2">
                                        <div class="flex gap-x-4">
                                            <div class="flex items-center">
                                                <img src="/img/<?= $row['foto_profil'] ?>" class="lg:w-18 w-12 mx-auto rounded-full" alt="<?= $row['nama'] ?>">
                                            </div>
                                            <div class="flex items-center">
                                                <div>
                                                    <!-- Awal Nama Alumni -->
                                                    <h2 class="md:text-lg font-heading text-primary font-semibold"><?= $row['nama']; ?></h2>
                                                    <!-- Akhir Nama Alumni -->

                                                    <!-- Awal Atribut Alumni -->
                                                    <div class="md:text-sm text-xs font-paragraph text-primary">Angkatan <?= implode(', ', get_by_id($row['id_alumni'], 'angkatan', 'pendidikan', true)) ?></div>
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

                        <!-- awal tulisan "Selengkapnya" di hasil pencarian -->
                        <div class="flex justify-end mt-12">
                            <a id="semuaAlumni" href="<?= base_url('User/searchAndFilter?t=alumni&cari='.$cari); ?>" ><div class="flex bg-secondary text-white rounded-full md:py-2 py-1 md:px-3 px-2 items-center gap-x-2 cursor-pointer md:text-sm text-xs">
                                Selengkapnya
                                <img src="/img/components/icon/right-off.png" class="md:w-4 md:h-4 w-3 h-3 my-auto" alt="">
                            </div></a>
                        </div>
                        <!-- akhir tulisan "Selengkapnya" di hasil pencarian -->

                        <!-- Akhir DAFTAR HASIL PENCARIAN ALUMNI -->

                    </div>
                </div>
                <!-- AKHIR HASIL PENCARIAN ALUMNI -->

                <!-- HASIL PENCARIAN BERITA -->
                <div class="mx-3 mt-2" id="cariBerita" <?php if($jumlah['berita']['ret'] == 0): ?>style="display:none;"<?php endif; ?>>
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

                        <!-- awal tulisan "Selengkapnya" di hasil pencarian -->
                        <div class="flex justify-end mt-12" id="beritaSelengkapnya">
                            <a id="semuaBerita" href="<?= base_url('User/searchAndFilter?t=berita&cari='.$cari); ?>"><div class="flex bg-secondary text-white rounded-full md:py-2 py-1 md:px-3 px-2 items-center gap-x-2 cursor-pointer md:text-sm text-xs">
                                Selengkapnya
                                <img src="/img/components/icon/right-off.png" class="md:w-4 md:h-4 w-3 h-3" alt="">
                            </div></a>
                        </div>
                        <!-- akhir tulisan "Selengkapnya" di hasil pencarian -->

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
    let x,data,s;
    let stringAlumni = `<!-- Awal Card Alumni --><a href="/User/profilAlumni/{idAlumni}"><div class="mx-2"><div class="flex gap-x-4"><div class="flex items-center"><img src="/img/{foto_profil}" class="lg:w-18 w-12 mx-auto rounded-full" alt=""></div><div class="flex items-center"><div><!-- Awal Nama Alumni --><h2 class="md:text-lg font-heading text-primary font-semibold">{nama}</h2><!-- Akhir Nama Alumni --><!-- Awal Atribut Alumni --><div class="md:text-sm text-xs font-paragraph text-primary">Angkatan {akt}</div><!-- Akhir Atribut Alumni --></div></div></div></div></a><!-- Akhir Card Alumni --><hr class="my-4 border-gray-400">`;
    let stringBerita = `<!-- Awal Card Berita  --><a href="/User/viewBerita/{id}"><div class="flex px-2 md:flex-row flex-col md:gap-x-4 gap-x-0 items-center"><img src="/img/berita/{thumbnail}" alt="{thumbnail}" class="md:w-48 w-full gambarBerita "><div class="flex-grow"><div class="flex flex-col"><!-- Awal Judul Berita  --><h2 class="text-lg font-heading text-primary font-semibold mb-2">{judul}</h2><!-- Akhir Judul Berita  --><!-- Awal Tanggal Berita  --><div class="text-xs font-paragraph text-primary">{tanggal_publish}</div><!-- Akhir Tanggal Berita  --><!-- Awal Deskripsi Berita  --><div class="text-sm font-paragraph break-words">{konten}</div><!-- Akhir Tanggal Berita  --></div></div></div></a><!-- Akhir Card Berita  --><hr class="my-4 border-gray-400">`;

    function search(tipe) {
        if (x) window.clearTimeout(x);
        x = setTimeout(function() {

            if (tipe == 'all') {
                data = $('#filterAlumni').serialize()+'&cari='+$("input[name=cari]").val();
                data += '&awal='+$("input[name=beritaAwal]").val()+'&akhir='+$("input[name=beritaAkhir]").val();
                data += '&tipe='+tipe;
            } else if (tipe == 'alumni') {
                data = $('#filterAlumni').serialize()+'&cari='+$("input[name=cari]").val()+'&tipe='+tipe
            } else {
                data = {
                    'cari': $("input[name=cari]").val(),
                    'awal':$("input[name=beritaAwal]").val(),
                    'akhir':$("input[name=beritaAkhir]").val(),
                    'tipe':tipe
                }
            }
            console.log(data)
            $.post({
                url: "#",
                data: data,
                dataType:'json',
                success: (ret) => {
                    let jumlahAlumniBerita = 0;
                    console.log(ret)

                    if(tipe=='all' || tipe=='alumni'){
                        $('#lisAlumni').empty()
                        $('#cariAlumni').show()
                        $('#jumlahAlumni').html(ret.jumlah.alumni.text)
                        if (ret.jumlah.alumni.ret>0) {
                            jumlahAlumniBerita += ret.jumlah.alumni.ret
                            console.log(ret.data.alumni)
                            $.each(ret.data.alumni, (i, item) => {
                                $('#lisAlumni').append(stringAlumni.replace('{idAlumni}', item.id_alumni).replace('{nama}', item.nama).replace('{foto_profil}', item.foto_profil).replace('{akt}', item.angkatan))
                            })
                            $('#lisAlumni').append("<hr class='-my-4 border-2 border-gray-400'>")
                        } else { $('#cariAlumni').hide() }
                        s = 'cari='+ $("input[name=cari]").val() +'&akt='+ ret.search.akt + '&kerja=' + ret.search.kerja
                        if(ret.search.prodi)
                            s += '&'+ret.search.prodi.map((val)=>{return 'prodi[]='+val}).join('&')
                        $('#semuaAlumni').get(0).href = '<?= base_url('User/searchAndFilter?t=alumni'); ?>&' + s
                    }

                    if(tipe=='all' || tipe=='berita') {
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
                        } else { $('#cariBerita').hide() }
                        b = 'cari='+ $("input[name=cari]").val()+'&awal='+ ret.search.awal + '&akhir=' + ret.search.akhir
                        $('#semuaBerita').get(0).href = '<?= base_url('User/searchAndFilter?t=berita'); ?>&' + b
                    }

                    $('#kosong').hide()
                    if(jumlahAlumniBerita == 0)
                        $('#kosong').show()
                }
            })
        }, 300)
    }
    
    $('#kosong').hide()
    $("input[name=cari]").keyup( function() { search('all') })
    $('.listProdi svg').click(function(){
        let prodi = $(this).parent().find('.cari')
        if (prodi.attr('name') == 'prodi[]') { prodi.attr('name','p') } 
            else { prodi.attr('name','prodi[]') }
        search('alumni')
    })
    $(".search").keyup( function() { search('alumni') })
    $(".kalenderAwal div.text-xs, .kalenderAkhir div.text-xs").click( function() { search('berita') })

})
</script>
<script type="text/javascript" src="/js/search.js"></script>
<?= $this->endSection(); ?>