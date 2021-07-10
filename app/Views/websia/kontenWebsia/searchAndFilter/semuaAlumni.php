<?= $this->extend('websia/layoutWebsia/templateBerandaLogin.php'); ?>

<?= $this->section('content'); ?>

<div class="flex w-full">

    <!-- awal sidebar -->
    <?= $this->include('websia/kontenWebsia/searchAndFilter/sidebarFilter'); ?>
    <!-- akhir sidebar -->

    <!-- awal Hasil Pencarian  -->
    <div class="md:ml-72 ml-10 flex-grow min-h-screen my-6">
        <div class="mr-2" id="hasilPencarian">
            <!-- Catatan : jika hasil tidak ada, bisa isi id="hasilPencarian" dengan coding yang ada pada searchKosong.php  -->

            <!-- HASIL PENCARIAN ALUMNI -->
            <div class="mx-3 mb-6" id="cariAlumni">
                <h1 class="text-secondary font-heading sm:text-3xl md:text-4xl text-2xl font-bold">ALUMNI</h1>

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

                <div id="load_data_message" class="text-primary md:mb-6 my-5 font-paragraph font-extralight text-sm"></div>
            </div>
            <!-- AKHIR HASIL PENCARIAN ALUMNI -->

            <!-- HASIL PENCARIAN KOSONG -->
            <div id="kosong" class=" ml-2 flex-grow min-h-screen">
                <img src="/img/components/pencarianKosong.png" class="w-96 mx-auto" alt="">
                <div class="text-primary text-center font-bold md:text-xl -mt-8 mx-auto">Hasil Pencarian Tidak Ditemukan</div>
                <hr class="border-b-2 border-t-0 w-32 border-gray-400 mx-auto">
            </div>

        </div>
    </div>
    <!-- akhir Hasil Pencarian  -->


</div>


<script>
    $(document).ready(() => {
        var limit = 10;
        var start = <?= count($data['alumni']) ?>;
        var action = false;
        let x, data;
        let stringAlumni = `<!-- Awal Card Alumni --><a href="/User/profilAlumni/{idAlumni}"><div class="mx-2"><div class="flex gap-x-4"><div class="flex items-center"><img src="/img/{foto_profil}" class="lg:w-18 w-12 mx-auto rounded-full" alt=""></div><div class="flex items-center"><div><!-- Awal Nama Alumni --><h2 class="md:text-lg font-heading text-primary font-semibold">{nama}</h2><!-- Akhir Nama Alumni --><!-- Awal Atribut Alumni --><div class="md:text-sm text-xs font-paragraph text-primary">Angkatan {akt}</div><!-- Akhir Atribut Alumni --></div></div></div></div></a><!-- Akhir Card Alumni --><hr class="my-4 border-gray-400">`;

        function search(limit, start) {
            data = $('#filterAlumni').serialize() + '&cari=' + $("input[name=cari]").val() + '&limit=' + limit + '&start=' + start
            console.log(data)

            $.ajax({
                url: "#",
                type: 'POST',
                data: data,
                dataType: 'JSON',
                cache: false,
                success: (ret) => {
                    console.log(ret)

                    $('#jumlahAlumni').html(ret.jumlah.alumni.text)
                    $('#lisAlumni').find('hr.border-2').remove()
                    if (ret.data.alumni.length > 0) {
                        console.log(ret.data.alumni)
                        $.each(ret.data.alumni, (i, item) => {
                            $('#lisAlumni').append(stringAlumni.replace('{idAlumni}', item.id_alumni).replace('{nama}', item.nama).replace('{foto_profil}', item.foto_profil).replace('{akt}', item.angkatan))
                        })
                        $('#lisAlumni').append("<hr class='-my-4 border-2 border-gray-400'>")
                        $('#load_data_message').html("");
                        if (ret.jumlah.alumni.ret >= 10)
                            $('#load_data_message').html("Memuat data....");
                        action = false;
                    } else {
                        $('#load_data_message').html("");
                        action = true;
                    }

                    $('#kosong').hide()
                    $('#cariAlumni').show()
                    if (ret.jumlah.alumni.ret == 0) {
                        $('#kosong').show()
                        $('#cariAlumni').hide()
                    }
                }
            })
        }

        <?php if (count($data['alumni']) > 0) : ?>$('#kosong').hide() <?php endif; ?>

        $("input[name=cari], .search").keyup(function() {
            $('#lisAlumni').empty()
            start = 0;
            if (x) window.clearTimeout(x);
            x = setTimeout(function() {
                search(limit, start)
            }, 300)
        })

        $('.listProdi svg').click(function() {
            let prodi = $(this).parent().find('.cari')
            if (prodi.attr('checked') == 'true') {
                prodi.removeAttr('checked')
            } else {
                prodi.attr('checked', 'true')
            }
            $('#lisAlumni').empty()
            start = 0;
            setTimeout(function() {
                search(limit, start)
            }, 50)
        })

        $("input[name=akt], input[name=kerja]").siblings().click(function() {
            search(limit, start)
        })

        if (!action) {
            action = true;
            search(limit, start);
        }

        $(window).scroll(function() {
            if ($(window).scrollTop() + $(window).height() > $("#lisAlumni").height() && !action) {
                action = true;
                start += limit;
                setTimeout(function() {
                    search(limit, start);
                }, 1000);
            }
        });

    })
</script>
<script type="text/javascript" src="/js/search.js"></script>
<?= $this->endSection(); ?>