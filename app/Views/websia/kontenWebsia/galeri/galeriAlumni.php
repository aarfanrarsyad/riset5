<?= $this->extend('websia/layoutWebsia/templateBerandaLogin.php'); ?>

<?= $this->section('content'); ?>

<style>
    .prev,
    .next {
        top: 50%;
    }

    .next {
        right: 5%;
    }

    .prev {
        left: 5%;
    }

    .pageFoto {
        bottom: 0px;
        left: 50%;
        transform: translateX(-50%);
    }

    @media only screen and (min-width: 600px) {

        .prev,
        .next {
            width: 30px;
        }

        .prev {
            left: 8%;
        }

        .next {
            right: 8%;
        }
    }

    @media only screen and (min-width: 768px) {

        .prev,
        .next {
            width: 40px;
        }

        .prev {
            left: 14%;
        }

        .next {
            right: 14%;
        }
    }

    @media only screen and (min-width: 1000px) {

        .prev {
            left: 20%;
        }

        .next {
            right: 20%;
        }
    }
</style>

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
                <a href="<?= base_url() ?>/User/listAlbumFoto">
                    <button type="button" class="text-center rounded-3xl px-4 py-1 border border-secondary focus:outline-none">
                        ALBUM
                    </button>
                </a>
            </div>
            <!-- Akhir button album -->
        </div>
    </div>
</div>
<div class="bg-primary">
    <div class="py-2">
        <div class="holder p-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-4 gap-y-2">
            <!-- Awal Tampilan Galeri (Buat ditambahkan coding sesuai gambar dari database) -->
            <!-- <php for ($x = 0; $x < 12; $x++) : ?> -->
            <?php $i = 0;
            foreach ($galeri['foto'] as $foto) : ?>
                <!-- 1 gambar -->
                <a onclick="clicked(<?= $i ?>)" href="#<?= $foto['id_foto']; ?>" id="foto<?= $foto['id_foto']; ?>">
                    <div class="rounded-3xl m-2 relative hover:shadow-xl transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-105 cursor-pointer">
                        <img id="slide" class="object-cover w-96 h-48 rounded-3xl mx-auto" src="<?= base_url() ?>/img/galeri/<?= $foto['nama_file']; ?>" alt="<?= $foto['nama_file']; ?>" />
                    </div>
                </a>
                <!-- <php endfor; ?> -->

                <div class="popUpFoto fixed overflow-auto top-0 bottom-0 right-0 left-0 z-40 bg-black bg-opacity-80 text-center font-paragraph hidden" id="<?= $foto['id_foto']; ?>">
                    <div class="m-auto duration-700 transition-all bg-gray bg-opacity-0 w-11/12 sm:w-9/12 md:w-8/12 lg:w-7/12">
                        <svg xmlns="http://www.w3.org/2000/svg" class="closePopUpFoto absolute h-8 w-8 top-3 left-3 text-gray-100 cursor-pointer" viewBox="0 0 20 20" fill="currentColor" id='backPopUpFoto'>
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                        </svg>
                        <!-- Awal Tombol Laporkan foto -->
                        <button onClick="laporkanFoto(<?= $foto['id_foto']; ?>)"><img src="<?= base_url() ?>/img/components/icon/danger-sign.png" alt="laporkan foto" class="absolute top-3 right-3"></button>
                        <!-- Akhir Tombol Laporkan foto -->
                        <div class="relative">
                            <img src="<?= base_url() ?>/img/components/icon/left-on.png" alt="foto sebelumnya" class="prev fixed cursor-pointer w-6" onclick="prev('img-<?= $foto['id_foto']; ?>')" id="prev">

                            <img src="<?= base_url() ?>/img/components/icon/right-on.png" alt="foto selanjutnya" class="next fixed cursor-pointer w-6 sm:right-10" onclick="next('img-<?= $foto['id_foto']; ?>')" id="next">

                            <div class="flex flex-col justify-center items-center">
                                <div class="flex flex-row justify-center items-center gap-x-4 mt-8 mb-6">
                                    <img src="<?= base_url() ?>/img/galeri/<?= $foto['nama_file']; ?>" alt="<?= $foto['nama_file']; ?>" class="slider-img w-3/4" id="img-<?= $foto['id_foto']; ?>">
                                </div>

                                <!-- Awal Caption -->
                                <div class="text-white w-3/4 h-3/4 mx-2 text-base">
                                    <!-- <p class="mb-2">Oleh : Si Fulan (59)</p> -->
                                    <p class="mb-2">Oleh : <?= $foto['nama'] ?></p>
                                    <!-- <p class="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam impedit optio praesentium soluta quasi. Voluptatibus molestias sequi inventore odit voluptas pariatur a ut, totam obcaecati accusamus iure, labore dolorum dolor.</p> -->
                                    <p class="mt-4 pb-6"><?= $foto['caption'] ?></p>
                                    <div class="mt-5 text-gray-400 text-center pb-10">
                                        <?php if (count($foto['tag_name']) > 1) : ?>
                                            <span> <img src="<?= base_url() ?>/img/components/icon/line.png" alt="icon tag foto" class="inline mr-1"> bersama </span> <span class=" text-white"><?= $foto['tag_name'][0]['nama'] ?> </span> <span> dan</span> <span class="text-white"> <?= count($foto['tag_name']) - 1 ?> lainnya</span> <span><img src="<?= base_url() ?>/img/components/icon/down.png" alt="daftar semua tag" class="daftarTag inline ml-1 rounded-full w-4 hover:bg-secondary cursor-pointer" onclick="daftarTag()">
                                            </span>
                                            <!-- Awal Tampilan Daftar Tag -->
                                            <div class="tampilTag hidden relative" id="tampilTag">
                                                <div class="z-50 static mt-2 mb-8 p-2 rounded-2xl overflow-y-auto ml-64 sm:ml-64 md:ml-80 lg:ml-96 lg:left-4 bg-primary w-32 md:w-36 position-right text-white text-xs md:text-sm">
                                                    <ul class="bg-primary">
                                                        <?php for ($n = 1; $n < count($foto['tag_name']); $n++) : ?>
                                                            <a href="">
                                                                <li><?= $foto['tag_name'][$n]['nama'] ?></li>
                                                            </a>
                                                            <hr>
                                                        <?php endfor ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        <?php elseif (count($foto['tag_name']) < 1) : ?>
                                            <span> <img src="<?= base_url() ?>/img/components/icon/line.png" alt="icon tag foto" class="inline mr-1"> bersama </span> <span class=" text-white"><?= $foto['tag_name'][0]['nama'] ?> </span>
                                            </span>
                                        <?php else : ?>
                                        <?php endif ?>
                                        <!-- Akhir Tampilan Daftar Tag -->
                                    </div>

                                </div>
                                <!-- Akhir Caption -->

                            </div>
                        </div>
                        <div class="pageFoto fixed text-white text-center text-base">
                            <p class="bg-secondary rounded-full text-center py-1 px-2">
                                <?php
                                //rumus no = (jumlah_paginate * halaman) - ((jumlah_paginate - 1) - $i)
                                if (isset($_GET['page_foto']))
                                    $n = (16 * $_GET['page_foto']) - (15 - $i);
                                else
                                    $n = ($i + 1);
                                echo $n;
                                ?> dari <?= $count ?></p>
                        </div>
                    </div>
                </div>
                <script>
                    $('#foto<?= $foto['id_foto']; ?>').click(function() {
                        var modal = document.getElementById('<?= $foto['id_foto']; ?>')
                        $('#<?= $foto['id_foto']; ?>').removeClass('hidden')
                        $(window).click(function(e) {
                            if (e.target === modal) {
                                setTimeout(function() {
                                    $('#<?= $foto['id_foto']; ?>').addClass('hidden')
                                }, 100);
                            }
                        });

                        // $('.closeFormUnggahFoto').click(function() {
                        //     setTimeout(function() {
                        //         $('#formUnggahFoto').addClass('hidden')
                        //     }, 100);
                        // });
                    })
                </script>
            <?php $i++;
            endforeach; ?>
            <!-- Akhir Tampilan Galeri -->
        </div>
        <!-- Awal Navigasi -->
        <div class="flex justify-center md:justify-end items-center mx-8 p-2 text-secondary font-paragraph">
            <?= $galeri['pager'] ?>
        </div>
        <!-- Akhir Navigasi -->
    </div>
</div>

<!-- Awal fitur unggah foto galeri -->
<?php $validation = service('validation') ?>

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
            <img src="<?= base_url() ?>/img/components/galeri.png" alt="icon galeri" class="w-full md:h-full md:w-auto">
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
                <label for="tags" class="text-primary font-medium">Tags :</label>
                <div id="tags-container">
                    <div class="control-group">
                        <select id="tags" class="tags inputForm font-heading text-xs" placeholder="Tandai orang"></select>
                    </div>
                </div>
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
    var images = [];
    <?php foreach ($galeri['foto'] as $foto) : ?>
        images.push('<?= $foto['nama_file'] ?>');
    <?php endforeach ?>
    var i = 0;

    function clicked(n) {
        i = n;
    }

    function prev(id) {
        if (i <= 0) i = images.length;
        i--;
        return setImg(id);
    }

    function next(id) {
        if (i >= images.length - 1) i = -1;
        i++;
        return setImg(id);
    }

    function setImg(id) {
        get = document.getElementById(id);
        return get.setAttribute('src', '<?= base_url() ?>/img/galeri/' + images[i]);
    }

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
                if ($data->id_alumni !== session()->id_alumni)
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

    $('.closePopUpFoto').click(function() {
        setTimeout(function() {
            $('.popUpFoto').addClass('hidden')
        }, 100);
    })

    $('#tags').change(function() {
        $tags = $('#tags').val();
        $('#tags_form').val($tags);
    });

    //Awal apabila Unggah Foto Sukses
    function suksesUnggahFoto() {

        $('body').prepend(`
            <div class="fixed top-0 bottom-0 right-0 left-0 z-50 flex justify-center items-center bg-black bg-opacity-40 font-paragraph" id='suksesUnggahFoto'>
                <div class="hidden opacity-0 duration-700 transition-all p-3 rounded-lg flex items-center" style="background-color: #B1FF66;">
                    <img src="/img/components/icon/check.png" class="h-5 mr-2" style="color: #54AC00;" alt="icon check">
                    <p class="sm:text-base text-sm font-heading font-bold" style="color: #54AC00">Foto Anda Berhasil Diunggah</p>
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

    //Awal apabila Lapor Foto Sukses
    function suksesLaporFoto() {

        $('body').prepend(`
        <div class="fixed top-0 bottom-0 right-0 left-0 z-50 flex justify-center items-center bg-black bg-opacity-40 font-paragraph" id='suksesLaporFoto'>
            <div class="hidden opacity-0 duration-700 transition-all p-3 rounded-lg flex items-center" style="background-color: #B1FF66;">
                <img src="/img/components/icon/check.png" class="h-5 mr-2" style="color: #54AC00;" alt="icon check">
                <p class="sm:text-base text-sm font-heading font-bold" style="color: #54AC00">Laporan Anda Berhasil Dikirim</p>
            </div>
        </div>
        `)

        $('#suksesLaporFoto').children().first().removeClass('hidden')
        setTimeout(function() {
            $('#suksesLaporFoto').children().first().removeClass('opacity-0')
        }, 10);

        $('.closeSuksesLaporFoto').click(function() {
            $('#suksesLaporFoto').children().first().addClass('opacity-0')
            $('#suksesLaporFoto').children().first().on('transitionend MSTransitionEnd webkitTransitionEnd oTransitionEnd', function() {
                $('#suksesLaporFoto').children().first().addClass('hidden')
            });
            setTimeout(function() {
                $('#suksesLaporFoto').remove()
            }, 400);
        })

        var modal = document.getElementById('suksesLaporFoto')
        $(window).click(function(e) {
            if (e.target === modal) {
                $('#suksesLaporFoto').children().first().addClass('opacity-0')
                $('#suksesLaporFoto').children().first().on('transitionend MSTransitionEnd webkitTransitionEnd oTransitionEnd', function() {
                    $('#suksesLaporFoto').children().first().addClass('hidden')
                });
                setTimeout(function() {
                    $('#suksesLaporFoto').remove()
                }, 400);
            }
        })
    }
    //Akhir apabila Lapor Foto Sukses
</script>
<!-- Akhir fitur unggah foto galeri -->

<!-- Catatan : Apabila sukses mengunggah foto dapat maka dapat memanggil fungsi js => suksesUnggahFoto ()  -->
<!-- Catatan : Apabila sukses laporkan foto dapat maka dapat memanggil fungsi js => suksesLaporkanFoto ()  -->
<?= session()->flash; ?>

<!-- Akhir Galeri Alumni -->
<?= $this->endSection(); ?>