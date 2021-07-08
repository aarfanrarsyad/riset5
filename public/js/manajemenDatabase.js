if ($('#negara').val() === "Indonesia") {
    $('#negaraLainnya').removeAttr('required')
    $('#negaraIndonesia').removeClass("hidden")

    if ($('#nama-provinsi option:selected').val() !== "") {
        let prov = $('#nama-provinsi option:selected').val()
        $('#nama-provinsi option:selected').remove()
        $('#nama-provinsi').val(prov)
        $('#prov-hidden').val($('#nama-provinsi').val())

        let kab = $('#kabkota option:selected').val()
        $.post(
            "../../../User/daftarKab", {
                id: $("#nama-provinsi option:selected").attr("id"),
            },
            function (data) {
                JSON.parse(data).forEach((el) => {
                    $("#kabkota").append(`
                    <option id="${el["id_kabkota"]}" value="${el["nama_kabkota"]}">${el["nama_kabkota"]}</option>
                    `);
                });

                if ($('#kabkota option:selected').val() !== "") {
                    $('#kabkota option:selected').remove()
                    $('#kabkota').val(kab)
                    $('#kab-hidden').val($('#kabkota').val())
                }
            }
        );

    }
} else {
    $('#negaraLainnya').removeAttr('required')
    $('#nama-provinsi').removeAttr('required')
    $('#kabkota').removeAttr('required')
}

$('#negara').change(function () {
    if ($('#negara').val() === "Indonesia") {
        $('#negaraLainnya').removeAttr('required')
        $('#nama-provinsi').prop('required', true)
        $('#kabkota').prop('required', true)
    } else if ($('#negara').val() === "lainnya") {
        $('#nama-provinsi').removeAttr('required')
        $('#kabkota').removeAttr('required')
        $('#negaraLainnya').prop('required', true)
    } else {
        $('#negaraLainnya').removeAttr('required')
        $('#nama-provinsi').removeAttr('required')
        $('#kabkota').removeAttr('required')
    }
})

$('#nama-provinsi').change(function () {
    $('#prov-hidden').val($('#nama-provinsi option:selected').val())
    $('#nama-provinsi option[value=""]').remove()

    $.post(
        "../../../User/daftarKab", {
            id: $("#nama-provinsi option:selected").attr("id"),
        },
        function (data) {
            $("#kabkota").html("");
            JSON.parse(data).forEach((el) => {
                $("#kabkota").append(`
                        <option id="${el["id_kabkota"]}" value="${el["nama_kabkota"]}">${el["nama_kabkota"]}</option>
                    `);
            });
            $('#kab-hidden').val($('#kabkota option:selected').val())
        }
    );

})

$('#kabkota').change(function () {
    $('#kab-hidden').val($('#kabkota option:selected').val())
})

function displayDiv(id, elementValue) {
    document.getElementById(id).style.display = elementValue.value == "lainnya" ? 'block' : 'none';
}

function displayDiv2(id, id2, elementValue) {
    if (elementValue.value == "lainnya") {
        document.getElementById(id).style.display = 'block';
        document.getElementById(id2).style.display = 'none';
    } else if (elementValue.value == "Indonesia") {
        document.getElementById(id).style.display = 'none';
        document.getElementById(id2).style.display = 'block';
    } else {
        document.getElementById(id).style.display = 'none';
        document.getElementById(id2).style.display = 'none';
    }
}

// Awal js Edit Foto
$('.updateFotoProfil').click(function () {
    $('body').prepend(`
    <div class="fixed top-0 bottom-0 right-0 left-0 z-50 flex justify-center items-center bg-black bg-opacity-40" id='formEditFoto'>
        <div class="hidden transform scale-0 opacity-0 duration-300 transition-all md:w-1/4 w-2/3 bg-gray bg-opacity-0"> 
        <div class="bg-primarySidebar py-2.5 px-6 rounded-t-2xl flex items-center justify-center text-white text-sm">
            <p class="font-bold font-heading">Ubah Foto Profil</p>
        </div>
        <div class="bg-gray-100 rounded-b-2xl">
            <ul class="text-center font-heading font-bold text-sm text-primaryx">
                <li id='unggahFoto' class="p-2.5 border-b-2 border-gray-300 cursor-pointer hover:bg-gray-300 text-black">Unggah Foto</li>
                <li class="p-2.5 border-b-2 border-gray-300 cursor-pointer hover:bg-gray-300 text-black" id="hapusFoto">Hapus Foto</li>
                <li class="closeEditFoto p-2.5 rounded-b-lg cursor-pointer hover:bg-gray-300 text-black">Batalkan</li>
            </ul>
        </div>
        </div> 
    </div>
`)

    $('#formEditFoto').children().first().removeClass('hidden')
    setTimeout(function () {
        $('#formEditFoto').children().first().removeClass('opacity-0 scale-0')
    }, 10);

    $('.closeEditFoto').click(function () {
        $('#formEditFoto').children().first().addClass('opacity-0 scale-0')
        $('#formEditFoto').children().first().on('transitionend MSTransitionEnd webkitTransitionEnd oTransitionEnd', function () {
            $('#formEditFoto').children().first().addClass('hidden')
        });
        setTimeout(function () {
            $('#formEditFoto').remove()
        }, 400);
    })

    var modal = document.getElementById('formEditFoto')
    $(window).click(function (e) {
        if (e.target === modal) {
            $('#formEditFoto').children().first().addClass('opacity-0 scale-0')
            $('#formEditFoto').children().first().on('transitionend MSTransitionEnd webkitTransitionEnd oTransitionEnd', function () {
                $('#formEditFoto').children().first().addClass('hidden')
            });
            setTimeout(function () {
                $('#formEditFoto').remove()
            }, 400);
        }
    })

    $('#unggahFoto').click(function () {
        $('#formEditFoto').remove()
        $('body').prepend(`
         <div class="fixed top-0 bottom-0 right-0 left-0 z-50 flex justify-center items-center bg-black bg-opacity-40 font-paragraph grid-cols-none" id='formUnggahFoto'>
        <div class= "hidden transform scale-0 duration-300 transition-all xl:w-1/2 lg:w-7/12 md:w-2/3 sm:w-3/4 w-11/12 bg-gray bg-opacity-0">
        <div class="bg-primary py-2 px-6 rounded-t-2xl flex items-center justify-between text-secondary md:text-xl sm:text-base">
        <p class="font-heading font-bold">Unggah Foto</p>
        <svg class="closeUnggah lg:w-10 md:w-8 sm:w-7 w-6 fill-current cursor-pointer" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
    </div>
            <form action="/Admin/updateFotoProfil" method="post" enctype="multipart/form-data" class="flex flex-col bg-gray-100 px-6 rounded-b-2xl text-sm">
            <div class="flex justify-between items-center mt-4">
                <input type="file" name="file_upload">
                <button class="w-24 text-center py-1 bg-secondary hover:bg-secondaryhover text-black rounded-full cursor-pointer focus:outline-none md:text-sm sm:text-xs" id="submitUnggahFoto">UNGGAH</button>
            </div>
            <div class="my-2 text-xs text-secondary">
            <p>Format file harus .jpg, .jpeg, atau .png.</p>
            <p>Ukuran file maksimum 2MB.</p>
            </div>
            </form>

        </div>
    </div>
         `)
        $('#formUnggahFoto').children().first().removeClass('hidden')
        setTimeout(function () {
            $('#formUnggahFoto').children().first().removeClass('opacity-0 scale-0')
        }, 10);
        var modal = document.getElementById('formUnggahFoto')
        $(window).click(function (e) {
            if (e.target === modal) {
                $('#formUnggahFoto').children().first().addClass('opacity-0 scale-0')
                $('#formUnggahFoto').children().first().on('transitionend MSTransitionEnd webkitTransitionEnd oTransitionEnd', function () {
                    $('#formUnggahFoto').children().first().addClass('hidden')
                });
                setTimeout(function () {
                    $('#formUnggahFoto').remove()
                }, 400);
            }
        })

        $('.closeUnggah').click(function () {
            $('#formUnggahFoto').children().first().addClass('opacity-0 scale-0')
            $('#formUnggahFoto').children().first().on('transitionend MSTransitionEnd webkitTransitionEnd oTransitionEnd', function () {
                $('#formUnggahFoto').children().first().addClass('hidden')
            });
            setTimeout(function () {
                $('#formUnggahFoto').remove()
            }, 400);
        })

    })

    $('#hapusFoto').click(function () {
        $('#formEditFoto').remove()
        $("body").prepend(`
        <div class="fixed top-0 bottom-0 right-0 left-0 z-50 flex justify-center items-center bg-black bg-opacity-40 font-paragraph" id='formHapus'>
            <div class="hidden transform scale-0 opacity-0 duration-300 transition-all bg-gray bg-opacity-0">
                <div class="bg-white rounded-2xl flex flex-col justify-center pt-3 pb-4 sm:px-8 px-3">
                    <p class="font-bold sm:text-lg text-base mb-6">Apakah Anda yakin ingin menghapus foto profil Anda?</p>
                    <form action="/Admin/hapusFotoProfil" class="text-black flex justify-end">
                        <div class="buttonBatal bg-success hover:bg-successHover transition-all text-black rounded-2xl w-20 mr-2 text-sm flex justify-center items-center cursor-pointer py-1 transition-all">BATAL</div>
                        <button class="rounded-2xl w-20 text-sm flex justify-center items-center cursor-pointer hover:bg-red-800 bg-red-600 transition-all focus:outline-none">HAPUS</button>
                    </form>
                </div>
            </div>
        </div>
        `);
        $('#formHapus').children().first().removeClass('hidden')
        setTimeout(function () {
            $('#formHapus').children().first().removeClass('opacity-0 scale-0')
        }, 10);

        $('.buttonBatal').click(function () {
            $('#formHapus').children().first().addClass('opacity-0 scale-0')
            $('#formHapus').children().first().on('transitionend MSTransitionEnd webkitTransitionEnd oTransitionEnd', function () {
                $('#formHapus').children().first().addClass('hidden')
            });
            setTimeout(function () {
                $('#formHapus').remove()
            }, 400);
        })

        var modal = document.getElementById('formHapus')
        $(window).click(function (e) {
            if (e.target === modal) {
                $('#formHapus').children().first().addClass('opacity-0 scale-0')
                $('#formHapus').children().first().on('transitionend MSTransitionEnd webkitTransitionEnd oTransitionEnd', function () {
                    $('#formHapus').children().first().addClass('hidden')
                });
                setTimeout(function () {
                    $('#formHapus').remove()
                }, 400);
            }
        })
    })
})
// akhir js Edit Foto

// awal js edit pendidikan
$('#buttonEditTampilanPendidikan').click(function () {
    if ($('.editTampilanPendidikan').hasClass('hidden')) {
        $('.editTampilanPendidikan').removeClass('hidden');
        if ($('#checkPendidikan').is(':checked')) {
            $('#labelCheckPendidikan').addClass('text-primary');
        }
    } else $('.editTampilanPendidikan').addClass('hidden');
})

$('#checkPendidikan').click(function () {
    if ($('#checkPendidikan').is(':checked')) {
        $('#labelCheckPendidikan').addClass('text-primary');
    } else $('#labelCheckPendidikan').removeClass('text-primary');
})

function formPendidikan(
    id,
    jenjang,
    instansi,
    studi,
    masuk,
    lulus,
    angkatan,
    nim,
    tulisan

) {
    $("body").prepend(`
    <div class="fixed top-0 bottom-0 right-0 left-0 z-50 flex justify-center items-center bg-black bg-opacity-40 font-paragraph" id='formEditPendidikan'>
        <div class="hidden transform scale-0 opacity-0 duration-300 transition-all xl:w-1/2 lg:w-7/12 md:w-2/3 sm:w-3/4 w-11/12 bg-gray bg-opacity-0">
            <div class="bg-primarySidebar py-4 px-6 rounded-t-2xl flex items-center justify-between text-white text-2xl">
                <p class="font-heading font-bold">Edit Pendidikan</p>
                <svg class="closePendidikan lg:w-10 md:w-8 sm:w-7 w-6 fill-current cursor-pointer" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
            </div>
            <form action="/Admin/updatePendidikan" method="post" class="flex flex-col bg-gray-100 sm:px-12 px-4 rounded-b-2xl text-sm">                
                <input type="hidden" name="id_pendidikan" id="editId">
                <label for="editJenjang" class="text-primary font-medium mt-2">Jenjang:</label>
                <input type="text" placeholder="Masukkan nama Jenjang" class="inputForm" name="jenjang" id="editJenjang" required>
                <label for="editInstansi" class="text-primary font-medium">Instansi Pendidikan:</label>
                
                <select name="instansi" id="editInstansi" class="inputForm" required>
                    <option label="Pilih instansi pendidikan" class="text-gray-500" disabled selected value>
                    <option value="ais">Akademi Ilmu Statistik</option>
                    <option value="stis">Sekolah Tinggi Ilmu Statistik</option>
                    <option value="polstat">Politeknik Statistika STIS</option>
                    <option value="instansi_lainnya">Lainnya...</option>
                </select>

                <label for="editStudi" class="text-primary font-medium">Program Studi:</label>
                <input type="text" placeholder="Masukkan nama Program Studi" class="inputForm" name="program_studi" id="editStudi">
                <div class="flex">
                    <div class="flex flex-col mr-8 w-1/3">
                        <label for="editMasuk" class="text-primary font-medium">Tahun Masuk:</label>
                        <input type="number" name="tahun_masuk" id="editMasuk" min="1950" max="2100" class="inputForm" required>
                    </div>
                    <div class="flex flex-col mr-8 w-1/3">
                        <label for="editLulus" class="text-primary font-medium">Tahun Lulus:</label>
                        <input type="number" name="tahun_lulus" id="editLulus" min="1950" max="2100" class="inputForm" required>
                    </div>
                    <div class="flex flex-col w-1/3">
                        <label for="editAngkatan" class="text-primary font-medium">Angkatan:</label>
                        <input type="number" name="angkatan" id="editAngkatan" min="1" max="2000" class="inputForm">
                    </div>
                </div>
                <label for="editNIM" class="text-primary font-medium mt-2">NIM:</label>
                <input type="text" placeholder="Masukkan NIM anda" class="inputForm" name="nim" id="editNIM">
                <label for="editTulisan" class="text-primary font-medium">Judul Tulisan:</label>
                <textarea name="judul_tulisan" id="editTulisan" rows="2" class="inputForm" placeholder="Masukkan judul tulisan"></textarea>
                <div class="flex justify-end my-4">
                    <input type="submit" value="SIMPAN" class="bg-primarySidebar text-white rounded-full w-24 py-1 text-center cursor-pointer hover:bg-secondaryhover transition-colors duration-300 text-sm mr-4 outline-none">
                    <input type="button" value="KEMBALI" class="closePendidikan bg-primarySidebar text-white rounded-full w-24 py-1 text-center cursor-pointer hover:bg-secondaryhover transition-colors duration-300 text-sm outline-none" id='backPendidikan'>
                </div>
            </form>
        </div>
    </div>
    `);
    $('#formEditPendidikan').children().first().removeClass('hidden')
    setTimeout(function () {
        $('#formEditPendidikan').children().first().removeClass('opacity-0 scale-0')
    }, 10);

    $('.closePendidikan').click(function () {
        $('#formEditPendidikan').children().first().addClass('opacity-0 scale-0')
        $('#formEditPendidikan').children().first().on('transitionend MSTransitionEnd webkitTransitionEnd oTransitionEnd', function () {
            $('#formEditPendidikan').children().first().addClass('hidden')
        });
        setTimeout(function () {
            $('#formEditPendidikan').remove()
        }, 400);
    })

    var modal = document.getElementById("formEditPendidikan");
    $(window).click(function (e) {
        if (e.target === modal) {
            $("#formEditPendidikan").children().first().addClass("opacity-0");
            $("#formEditPendidikan")
                .children()
                .first()
                .on(
                    "transitionend MSTransitionEnd webkitTransitionEnd oTransitionEnd",
                    function () {
                        $("#formEditPendidikan").children().first().addClass("hidden");
                    }
                );
            setTimeout(function () {
                $("#formEditPendidikan").remove();
            }, 400);
        }
    });
    $("#editId").val(id);
    $("#editJenjang").val(jenjang);
    $("#editInstansi").val(instansi);
    $("#editStudi").val(studi);
    $("#editMasuk").val(masuk);
    $("#editLulus").val(lulus);
    $("#editAngkatan").val(angkatan);
    $("#editNIM").val(nim);
    $("#editTulisan").val(tulisan);
};

$('.tambahPendidikan').click(function () {
    $("body").prepend(`
    <div class="fixed top-0 bottom-0 right-0 left-0 z-50 flex justify-center items-center bg-black bg-opacity-40 font-paragraph" id='formTambahPendidikan'>
        <div class="hidden transform scale-0 opacity-0 duration-300 transition-all xl:w-1/2 lg:w-7/12 md:w-2/3 sm:w-3/4 w-11/12 bg-gray bg-opacity-0">
            <div class="bg-primarySidebar py-4 px-6 rounded-t-2xl flex items-center justify-between text-white text-2xl">
                <p class="font-heading font-bold">Tambah Pendidikan</p>
                <svg class="closePendidikan lg:w-10 md:w-8 sm:w-7 w-6 fill-current cursor-pointer" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
            </div>
            <form action="/Admin/addPendidikan" method="post" class="flex flex-col bg-gray-100 sm:px-12 px-4 rounded-b-2xl text-sm">                              
                <label for="editJenjang" class="text-primary font-medium mt-2">Jenjang:</label>
                <input type="text" placeholder="Masukkan nama Jenjang" class="inputForm" name="jenjang" id="editJenjang" required>
                <label for="editInstansi" class="text-primary font-medium">Instansi Pendidikan:</label>
                <select name="instansi" id="editInstansi" class="inputForm" required>
                    <option label="Pilih instansi pendidikan" class="text-gray-500" disabled selected value>
                    <option value="ais">Akademi Ilmu Statistik</option>
                    <option value="stis">Sekolah Tinggi Ilmu Statistik</option>
                    <option value="polstat">Politeknik Statistika STIS</option>
                    <option value="instansi_lainnya">Lainnya...</option>
                </select>
                <label for="editStudi" class="text-primary font-medium">Program Studi:</label>
                <input type="text" placeholder="Masukkan nama Program Studi" class="inputForm" name="program_studi" id="editStudi">
                <div class="flex">
                    <div class="flex flex-col mr-8 w-1/3">
                        <label for="editMasuk" class="text-primary font-medium">Tahun Masuk:</label>
                        <input type="number" name="tahun_masuk" id="editMasuk" placeholder="1973" min="1950" max="2100" class="inputForm" required>
                    </div>
                    <div class="flex flex-col mr-8 w-1/3">
                        <label for="editLulus" class="text-primary font-medium">Tahun Lulus:</label>
                        <input type="number" name="tahun_lulus" id="editLulus" placeholder="1977" min="1950" max="2100" class="inputForm" required>
                    </div>
                    <div class="flex flex-col w-1/3">
                        <label for="editAngkatan" class="text-primary font-medium">Angkatan:</label>
                        <input type="number" name="angkatan" id="editAngkatan" placeholder="25" min="1" max="2000" class="inputForm">
                    </div>
                </div>
                <label for="editNIM" class="text-primary font-medium mt-2">NIM:</label>
                <input type="text" placeholder="Masukkan NIM anda" class="inputForm" name="nim" id="editNIM">
                <label for="editTulisan" class="text-primary font-medium">Judul Tulisan:</label>
                <textarea name="judul_tulisan" id="editTulisan" rows="2" class="inputForm resize-none" placeholder="Masukkan judul tulisan"></textarea>
                <div class="flex justify-end my-4">
                    <input type="submit" value="SIMPAN" class="bg-primarySidebar text-white rounded-full w-24 py-1 text-center cursor-pointer hover:bg-secondaryhover transition-colors duration-300 text-sm mr-4 outline-none">
                    <input type="button" value="KEMBALI" class="closePendidikan bg-primarySidebar text-white rounded-full w-24 py-1 text-center cursor-pointer hover:bg-secondaryhover transition-colors duration-300 text-sm outline-none" id='backPendidikan'>
                </div>

            </form>

        </div>
    </div>
`);

    $('#formTambahPendidikan').children().first().removeClass('hidden')
    setTimeout(function () {
        $('#formTambahPendidikan').children().first().removeClass('opacity-0 scale-0')
    }, 10);

    $('.closePendidikan').click(function () {
        $('#formTambahPendidikan').children().first().addClass('opacity-0 scale-0')
        $('#formTambahPendidikan').children().first().on('transitionend MSTransitionEnd webkitTransitionEnd oTransitionEnd', function () {
            $('#formTambahPendidikan').children().first().addClass('hidden')
        });
        setTimeout(function () {
            $('#formTambahPendidikan').remove()
        }, 400);
    })

    var modal = document.getElementById('formTambahPendidikan')
    $(window).click(function (e) {
        if (e.target === modal) {
            $('#formTambahPendidikan').children().first().addClass('opacity-0 scale-0')
            $('#formTambahPendidikan').children().first().on('transitionend MSTransitionEnd webkitTransitionEnd oTransitionEnd', function () {
                $('#formTambahPendidikan').children().first().addClass('hidden')
            });
            setTimeout(function () {
                $('#formTambahPendidikan').remove()
            }, 400);
        }
        e
    })
})

function hapusPendidikan(id) {
    $('body').prepend(`
    <div class="fixed top-0 bottom-0 right-0 left-0 z-50 flex justify-center items-center bg-black bg-opacity-40 font-paragraph" id='formHapus'>
        <div class="hidden transform scale-0 opacity-0 duration-300 transition-all bg-gray bg-opacity-0">
            <div class="bg-white rounded-2xl flex flex-col justify-center pt-3 pb-4 sm:px-8 px-3">
                <p class="font-bold sm:text-lg text-base mb-6">Apakah Anda yakin ingin menghapus data pendidikan ini?</p>
                <form action="/Admin/deletePendidikan" method="POST" class="text-white flex justify-end">
                    <div class="buttonBatal bg-success hover:bg-successHover transition-all text-white rounded-2xl w-20 mr-2 text-sm flex justify-center items-center cursor-pointer py-1 transition-all">BATAL</div>
                    <button id="hapus" name="id_pendidikan" class="rounded-2xl w-20 text-sm flex justify-center items-center cursor-pointer hover:bg-red-800 bg-red-600 transition-all focus:outline-none">HAPUS</button>
                </form>
            </div>
        </div>
    </div>
    `)

    $('#hapus').val(id);

    $('#formHapus').children().first().removeClass('hidden')
    setTimeout(function () {
        $('#formHapus').children().first().removeClass('opacity-0 scale-0')
    }, 10);

    $('.buttonBatal').click(function () {
        $('#formHapus').children().first().addClass('opacity-0 scale-0')
        $('#formHapus').children().first().on('transitionend MSTransitionEnd webkitTransitionEnd oTransitionEnd', function () {
            $('#formHapus').children().first().addClass('hidden')
        });
        setTimeout(function () {
            $('#formHapus').remove()
        }, 400);
    })

    var modal = document.getElementById('formHapus')
    $(window).click(function (e) {
        if (e.target === modal) {
            $('#formHapus').children().first().addClass('opacity-0 scale-0')
            $('#formHapus').children().first().on('transitionend MSTransitionEnd webkitTransitionEnd oTransitionEnd', function () {
                $('#formHapus').children().first().addClass('hidden')
            });
            setTimeout(function () {
                $('#formHapus').remove()
            }, 400);
        }
    })
}
// akhir js edit pendidikan

// awal js edit prestasi
function buttonEditTampilanPrestasi() {
    if ($('.editTampilanPrestasi').hasClass('hidden')) {
        $('.editTampilanPrestasi').removeClass('hidden');
        if ($('#checkPrestasi').is(':checked')) {
            $('#labelCheckPrestasi').addClass('text-primary');
        }
    } else $('.editTampilanPrestasi').addClass('hidden');
}

function checkPrestasi() {
    if ($('#checkPrestasi').is(':checked')) {
        $('#labelCheckPrestasi').addClass('text-primary');
    } else $('#labelCheckPrestasi').removeClass('text-primary');
}

function formPrestasi(id, prestasi, tahun) {
    $('body').prepend(`
    <div class="fixed top-0 bottom-0 right-0 left-0 z-50 flex justify-center items-center bg-black bg-opacity-40" id='formEditPrestasi'>
        <div class="hidden transform scale-0 opacity-0 duration-300 transition-all xl:w-1/2 lg:w-7/12 md:w-2/3 sm:w-3/4 w-11/12 bg-gray bg-opacity-0 font-paragraph">
        <div class="bg-primarySidebar py-4 px-6 rounded-t-2xl flex items-center justify-between text-white text-2xl">
            <p class="font-heading font-bold">Edit Prestasi</p>
            <svg class="closePrestasi lg:w-10 md:w-8 sm:w-7 w-6 fill-current cursor-pointer" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
        </div>
        <form action="/Admin/updatePrestasi" method="post" class="flex flex-col bg-gray-100 sm:px-12 px-4 rounded-b-2xl text-sm">
            <label for="editPrestasi" class="text-primary font-medium mt-2">Nama Prestasi:</label>
            <input type="hidden" name="id_prestasi" id="editId">
            <input type="text" placeholder="Masukkan nama Prestasi" class="inputForm" name="nama_prestasi" id="editPrestasi">
            <div class="sm:w-2/5 w-1/2">
                <label for="editTahun" class="text-primary font-medium">Tahun:</label>
                <input type="number" name="tahun_prestasi" id="editTahun" placeholder="1980" min="1950" max="2100" class="inputForm">
            </div>
            <div class="flex justify-end my-4">
                <input type="submit" value="SIMPAN" class="bg-primarySidebar text-white rounded-full w-24 py-1 text-center cursor-pointer hover:bg-secondaryhover transition-colors duration-300 text-sm mr-4 outline-none">
                <input type="button" value="KEMBALI" class="closePrestasi bg-primarySidebar text-white rounded-full w-24 py-1 text-center cursor-pointer hover:bg-secondaryhover transition-colors duration-300 text-sm outline-none" id='backPrestasi'>
            </div>
        </form>
        </div>
    </div>
    `)

    $('#formEditPrestasi').children().first().removeClass('hidden')
    setTimeout(function () {
        $('#formEditPrestasi').children().first().removeClass('opacity-0 scale-0')
    }, 10);

    $('.closePrestasi').click(function () {
        $('#formEditPrestasi').children().first().addClass('opacity-0 scale-0')
        $('#formEditPrestasi').children().first().on('transitionend MSTransitionEnd webkitTransitionEnd oTransitionEnd', function () {
            $('#formEditPrestasi').children().first().addClass('hidden')
        });
        setTimeout(function () {
            $('#formEditPrestasi').remove()
        }, 400);
    })

    var modal = document.getElementById('formEditPrestasi')
    $(window).click(function (e) {
        if (e.target === modal) {
            $('#formEditPrestasi').children().first().addClass('opacity-0 scale-0')
            $('#formEditPrestasi').children().first().on('transitionend MSTransitionEnd webkitTransitionEnd oTransitionEnd', function () {
                $('#formEditPrestasi').children().first().addClass('hidden')
            });
            setTimeout(function () {
                $('#formEditPrestasi').remove()
            }, 400);
        }
    })

    $('#editId').val(id);
    $('#editPrestasi').val(prestasi);
    $('#editTahun').val(tahun);
}

function tambahPrestasi() {
    $('body').prepend(`
    <div class="fixed top-0 bottom-0 right-0 left-0 z-50 flex justify-center items-center bg-black bg-opacity-40" id='formTambahPrestasi'>
        <div class="hidden transform scale-0 opacity-0 duration-300 transition-all xl:w-1/2 lg:w-7/12 md:w-2/3 sm:w-3/4 w-11/12 bg-gray bg-opacity-0 font-paragraph">
        <div class="bg-primarySidebar py-4 px-6 rounded-t-2xl flex items-center justify-between text-white text-2xl">
            <p class="font-heading font-bold">Tambah Prestasi</p>
            <svg class="closePrestasi lg:w-10 md:w-8 sm:w-7 w-6 fill-current cursor-pointer" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
        </div>
        <form action="/Admin/addPrestasi" method="post" class="flex flex-col bg-gray-100 sm:px-12 px-4 rounded-b-2xl text-sm">
            <label for="editJenjang" class="text-primary font-medium mt-2">Nama Prestasi:</label>
            <input type="text" placeholder="Masukkan nama Prestasi" class="inputForm" name="nama_prestasi" id="editPrestasi">
            <div class="sm:w-2/5 w-1/2">
                <label for="editMasuk" class="text-primary font-medium">Tahun:</label>
                <input type="number" name="tahun_prestasi" id="editTahun" placeholder="1980" min="1950" max="2100" class="inputForm">
            </div>
            <div class="flex justify-end my-4">
                <input type="submit" value="SIMPAN" class="bg-primarySidebar text-white rounded-full w-24 py-1 text-center cursor-pointer hover:bg-secondaryhover transition-colors duration-300 text-sm mr-4 outline-none">
                <input type="button" value="KEMBALI" class="closePrestasi bg-primarySidebar text-white rounded-full w-24 py-1 text-center cursor-pointer hover:bg-secondaryhover transition-colors duration-300 text-sm outline-none" id='backPrestasi'>
            </div>
        </form>
        </div>
    </div>
    `)

    $('#formTambahPrestasi').children().first().removeClass('hidden')
    setTimeout(function () {
        $('#formTambahPrestasi').children().first().removeClass('opacity-0 scale-0')
    }, 10);

    $('.closePrestasi').click(function () {
        $('#formTambahPrestasi').children().first().addClass('opacity-0 scale-0')
        $('#formTambahPrestasi').children().first().on('transitionend MSTransitionEnd webkitTransitionEnd oTransitionEnd', function () {
            $('#formTambahPrestasi').children().first().addClass('hidden')
        });
        setTimeout(function () {
            $('#formTambahPrestasi').remove()
        }, 400);
    })

    var modal = document.getElementById('formTambahPrestasi')
    $(window).click(function (e) {
        if (e.target === modal) {
            $('#formTambahPrestasi').children().first().addClass('opacity-0 scale-0')
            $('#formTambahPrestasi').children().first().on('transitionend MSTransitionEnd webkitTransitionEnd oTransitionEnd', function () {
                $('#formTambahPrestasi').children().first().addClass('hidden')
            });
            setTimeout(function () {
                $('#formTambahPrestasi').remove()
            }, 400);
        }
    })

}

function hapusPrestasi(id) {
    $('body').prepend(`
    <div class="fixed top-0 bottom-0 right-0 left-0 z-50 flex justify-center items-center bg-black bg-opacity-40 font-paragraph" id='formHapus'>
        <div class="hidden transform scale-0 opacity-0 duration-300 transition-all bg-gray bg-opacity-0">
            <div class="bg-white rounded-2xl flex flex-col justify-center pt-3 pb-4 sm:px-8 px-3">
                <p class="font-bold sm:text-lg text-base mb-6">Apakah Anda yakin ingin menghapus data prestasi ini?</p>
                <form action="/Admin/deletePrestasi" method="POST" class="text-white flex justify-end">
                    <div class="buttonBatal bg-success hover:bg-successHover transition-all text-white rounded-2xl w-20 mr-2 text-sm flex justify-center items-center cursor-pointer py-1 transition-all">BATAL</div>
                    <button id="hapus" name="id_prestasi" class="rounded-2xl w-20 text-sm flex justify-center items-center cursor-pointer hover:bg-red-800 bg-red-600 transition-all focus:outline-none">HAPUS</button>
                </form>
            </div>
        </div>
    </div>
    `)

    $('#hapus').val(id);

    $('#formHapus').children().first().removeClass('hidden')
    setTimeout(function () {
        $('#formHapus').children().first().removeClass('opacity-0 scale-0')
    }, 10);

    $('.buttonBatal').click(function () {
        $('#formHapus').children().first().addClass('opacity-0 scale-0')
        $('#formHapus').children().first().on('transitionend MSTransitionEnd webkitTransitionEnd oTransitionEnd', function () {
            $('#formHapus').children().first().addClass('hidden')
        });
        setTimeout(function () {
            $('#formHapus').remove()
        }, 400);
    })

    var modal = document.getElementById('formHapus')
    $(window).click(function (e) {
        if (e.target === modal) {
            $('#formHapus').children().first().addClass('opacity-0 scale-0')
            $('#formHapus').children().first().on('transitionend MSTransitionEnd webkitTransitionEnd oTransitionEnd', function () {
                $('#formHapus').children().first().addClass('hidden')
            });
            setTimeout(function () {
                $('#formHapus').remove()
            }, 400);
        }
    })
}
// akhir js edit prestasi

// Preview Img
function previewImg() {
    const foto = document.querySelector('#foto_profil');
    const fotoLabel = document.querySelector('.custom-file-label');
    const imgPreview = document.querySelector('.img-preview');

    fotoLabel.textContent = foto.files[0].name;

    const filefoto = new FileReader();
    filefoto.readAsDataURL(foto.files[0]);

    filefoto.onload = function (e) {
        imgPreview.src = e.target.result;
    }
}