// awal js edit biodata 
$('#buttonEditTampilan').click(function (){
    if ($('.editTampilan').hasClass('hidden')){
       $('.editTampilan').removeClass('hidden');
       if(!$('#checkTanggalLahir').is(':checked')){
           $('#labelTempatLahir').addClass('text-gray-500');    
           $('#labelTanggalLahir').addClass('text-gray-500');    
       } 
       if(!$('#checkEmail').is(':checked')) $('#labelEmail').addClass('text-gray-500');    
       if(!$('#checkAlamat').is(':checked')) {
           $('#labelAlamat').addClass('text-gray-500');    
           $('#labelNegara').addClass('text-gray-500');    
           $('#labelKabkot').addClass('text-gray-500');    
           $('#labelProvinsi').addClass('text-gray-500');    
       }
       if(!$('#checkJabatan').is(':checked')) $('#labelJabatan').addClass('text-gray-500');    
       if(!$('#checkInstagram').is(':checked')) $('#labelInstagram').addClass('text-gray-500');    
       if(!$('#checkTwitter').is(':checked')) $('#labelTwitter').addClass('text-gray-500');    
       if(!$('#checkFacebook').is(':checked')) $('#labelFacebook').addClass('text-gray-500');    
    } else {
        $('.editTampilan').addClass('hidden');
        $('#labelTempatLahir').removeClass('text-gray-500');
        $('#labelTanggalLahir').removeClass('text-gray-500');
        $('#labelEmail').removeClass('text-gray-500');
        $('#labelAlamat').removeClass('text-gray-500');
        $('#labelNegara').removeClass('text-gray-500');
        $('#labelKabkot').removeClass('text-gray-500');
        $('#labelProvinsi').removeClass('text-gray-500');
        $('#labelJabatan').removeClass('text-gray-500');
        $('#labelInstagram').removeClass('text-gray-500');
        $('#labelTwitter').removeClass('text-gray-500');
        $('#labelFacebook').removeClass('text-gray-500');
    }
})

$('.editTampilan').click(function() {
    let id = $(this).attr('data-id');
      if($('#check'+id).is(':checked') && id != "TanggalLahir")
    {
      $('#label'+id).removeClass("text-gray-500");
    } else {
      $('#label'+id).addClass("text-gray-500");
    }
  });

$('#checkTanggalLahir').click(function(){
    if($('#checkTanggalLahir').is(':checked'))
    {
      $('#labelTempatLahir').removeClass("text-gray-500");
      $('#labelTanggalLahir').removeClass("text-gray-500");
    } else {
      $('#labelTempatLahir').addClass("text-gray-500");
      $('#labelTanggalLahir').addClass("text-gray-500");
    }
})

$('#checkAlamat').click(function(){
    if($('#checkAlamat').is(':checked'))
    {
      $('#labelAlamat').removeClass("text-gray-500");
      $('#labelNegara').removeClass("text-gray-500");
      $('#labelKabkot').removeClass("text-gray-500");
      $('#labelProvinsi').removeClass("text-gray-500");
    } else {
      $('#labelAlamat').addClass("text-gray-500");
      $('#labelNegara').addClass("text-gray-500");
      $('#labelKabkot').addClass("text-gray-500");
      $('#labelProvinsi').addClass("text-gray-500");
    }
})

$('.updateFotoProfil').click(function () {
    $('body').prepend(`
    <div class="fixed top-0 bottom-0 right-0 left-0 z-50 flex justify-center items-center bg-black bg-opacity-40" id='formEditFoto'>
        <div class="hidden opacity-0 duration-700 transition-all md:w-1/4 w-2/3 bg-gray bg-opacity-0"> 
        <div class="bg-primary py-2.5 px-6 rounded-t-2xl flex items-center justify-center text-secondary text-sm">
            <p class="font-bold font-heading">Ubah Foto Profil</p>
        </div>
        <div class="bg-gray-100 rounded-b-2xl">
            <ul class="text-center font-heading font-bold text-sm text-primaryx">
                <li id='unggahFoto' class="p-2.5 border-b-2 border-gray-300 cursor-pointer hover:bg-gray-300">Unggah Foto</li>
                <li class="p-2.5 border-b-2 border-gray-300 cursor-pointer hover:bg-gray-300" id="hapusFoto">Hapus Foto</li>
                <li class="closeEditFoto p-2.5 rounded-b-lg cursor-pointer hover:bg-gray-300">Batalkan</li>
            </ul>
        </div>
        </div> 
    </div>
`)

    $('#formEditFoto').children().first().removeClass('hidden')
    setTimeout(function () {
        $('#formEditFoto').children().first().removeClass('opacity-0')
    }, 10);

    $('.closeEditFoto').click(function () {
        $('#formEditFoto').children().first().addClass('opacity-0')
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
            $('#formEditFoto').children().first().addClass('opacity-0')
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
        <div class= "duration-700 transition-all xl:w-1/2 lg:w-7/12 md:w-2/3 sm:w-3/4 w-11/12 bg-gray bg-opacity-0">
        <div class="bg-primary py-2 px-6 rounded-t-2xl flex items-center justify-between text-secondary md:text-xl sm:text-base">
        <p class="font-heading font-bold">Unggah Foto</p>
        <svg class="closeUnggah lg:w-10 md:w-8 sm:w-7 w-6 fill-current cursor-pointer" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
    </div>
            <form action="/User/updateFotoProfil" method="post" enctype="multipart/form-data" class="flex flex-col bg-gray-100 px-6 rounded-b-2xl text-sm">
            <div class="flex justify-between items-center mt-4">
                <input type="file" name="file_upload">
                <button class="w-24 text-center py-1 bg-secondary hover:bg-secondaryhover text-white rounded-full cursor-pointer focus:outline-none md:text-sm sm:text-xs" id="submitUnggahFoto">UNGGAH</button>
            </div>
            <div class="my-2 text-xs text-secondary">
            <p>Format file harus .jpg, .jpeg, atau .png.</p>
            <p>Ukuran file maksimum 2MB.</p>
            </div>
            </form>

        </div>
    </div>
         `)
         var modal = document.getElementById('formUnggahFoto')
         $(window).click(function (e) {
             if (e.target === modal) {
                 $('#formUnggahFoto').children().first().addClass('opacity-0')
                 $('#formUnggahFoto').children().first().on('transitionend MSTransitionEnd webkitTransitionEnd oTransitionEnd', function () {
                     $('#formUnggahFoto').children().first().addClass('hidden')
                 });
                 setTimeout(function () {
                     $('#formUnggahFoto').remove()
                 }, 400);
             }
         })

         $('.closeUnggah').click(function () {
            $('#formUnggahFoto').children().first().addClass('opacity-0')
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
            <div class="hidden opacity-0 duration-700 transition-all bg-gray bg-opacity-0">
                <div class="bg-white rounded-2xl flex flex-col justify-center pt-3 pb-4 sm:px-8 px-3">
                    <p class="font-bold sm:text-lg text-base mb-6">Apakah Anda yakin ingin menghapus foto profil Anda?</p>
                    <form action="/User/hapusFotoProfil" class="text-white flex justify-end">
                        <div class="buttonBatal bg-success hover:bg-successHover transition-all text-white rounded-2xl w-20 mr-2 text-sm flex justify-center items-center cursor-pointer py-1 transition-all">BATAL</div>
                        <button class="rounded-2xl w-20 text-sm flex justify-center items-center cursor-pointer hover:bg-red-800 bg-red-600 transition-all focus:outline-none">HAPUS</button>
                    </form>
                </div>
            </div>
        </div>
        `);
        $('#formHapus').children().first().removeClass('hidden')
        setTimeout(function () {
            $('#formHapus').children().first().removeClass('opacity-0')
        }, 10);
    
        $('.buttonBatal').click(function () {
            $('#formHapus').children().first().addClass('opacity-0')
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
                $('#formHapus').children().first().addClass('opacity-0')
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

// akhir js edit biodata

// awal js sorting

$(".sort").click(function () {
    $(".sort").not(this).children().removeClass('invisible text-primary')
    if ($(this).children().eq(0).hasClass('invisible')) {
        $(this).children().first().removeClass('invisible')
        $(this).children().first().removeClass('text-gray-400').addClass('text-primary')
        $(this).children().eq(1).addClass('invisible')
    } else {
        $(this).children().eq(1).removeClass('invisible')
        $(this).children().first().addClass('invisible')
        $(this).children().eq(1).removeClass('text-gray-400').addClass('text-primary')
    }
})

// akhir js sorting

// awal js edit pendidikan
$('#buttonEditTampilanPendidikan').click(function(){
    if ($('.editTampilanPendidikan').hasClass('hidden')){
        $('.editTampilanPendidikan').removeClass('hidden');
        if($('#checkPendidikan').is(':checked')){
            $('#labelCheckPendidikan').addClass('text-primary');
        }
    } else $('.editTampilanPendidikan').addClass('hidden');
})

$('#checkPendidikan').click(function(){
    if($('#checkPendidikan').is(':checked')){
        $('#labelCheckPendidikan').addClass('text-primary');
    } else $('#labelCheckPendidikan').removeClass('text-primary');
})

function formPendidikan(id, jenjang, univ, studi, masuk, lulus, tulisan) {
    $('body').prepend(`
    <div class="fixed top-0 bottom-0 right-0 left-0 z-50 flex justify-center items-center bg-black bg-opacity-40 font-paragraph" id='formEditPendidikan'>
        <div class="hidden opacity-0 duration-700 transition-all xl:w-1/2 lg:w-7/12 md:w-2/3 sm:w-3/4 w-11/12 bg-gray bg-opacity-0">
            <div class="bg-primary py-4 px-6 rounded-t-2xl flex items-center justify-between text-secondary text-2xl">
                <p class="font-heading font-bold">Edit Pendidikan</p>
                <svg class="closePendidikan lg:w-10 md:w-8 sm:w-7 w-6 fill-current cursor-pointer" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
            </div>
            <form action="/User/updatePendidikan" method="post" class="flex flex-col bg-gray-100 sm:px-12 px-4 rounded-b-2xl text-sm">
                <input type="hidden" name="id_pendidikan" id="editId">
                <label for="editJenjang" class="text-primary font-medium mt-2">Jenjang:</label>
                <input type="text" placeholder="Masukkan nama Jenjang" class="inputForm" name="jenjang" id="editJenjang">
                <label for="editUniversitas" class="text-primary font-medium">Universitas:</label>
                <input type="text" placeholder="Masukkan nama Universitas" class="inputForm" name="instansi" id="editUniversitas">
                <label for="editStudi" class="text-primary font-medium">Program Studi:</label>
                <input type="text" placeholder="Masukkan nama Program Studi" class="inputForm" name="program_studi" id="editStudi">
                <div class="flex">
                    <div class="flex flex-col mr-8 w-1/3">
                        <label for="editMasuk" class="text-primary font-medium">Tahun Masuk:</label>
                        <input type="number" name="tahun_masuk" id="editMasuk" min="1950" max="2100" class="inputForm">
                    </div>
                    <div class="flex flex-col w-1/3">
                        <label for="editLulus" class="text-primary font-medium">Tahun Lulus:</label>
                        <input type="number" name="tahun_lulus" id="editLulus" min="1950" max="2100" class="inputForm">
                    </div>
                </div>
                <label for="editTulisan" class="text-primary font-medium">Judul Tulisan:</label>
                <textarea name="judul_tulisan" id="editTulisan" rows="2" class="inputForm" placeholder="Masukkan judul tulisan"></textarea>
                <div class="flex justify-end my-4">
                    <input type="submit" value="SIMPAN" class="bg-secondary text-white rounded-full w-24 py-1 text-center cursor-pointer hover:bg-secondaryhover transition-colors duration-300 text-sm mr-4 outline-none">
                    <input type="button" value="KEMBALI" class="closePendidikan bg-secondary text-white rounded-full w-24 py-1 text-center cursor-pointer hover:bg-secondaryhover transition-colors duration-300 text-sm outline-none" id='backPendidikan'>
                </div>

            </form>

        </div>
    </div>
    `)

    $('#formEditPendidikan').children().first().removeClass('hidden')
    setTimeout(function () {
        $('#formEditPendidikan').children().first().removeClass('opacity-0')
    }, 10);

    $('.closePendidikan').click(function () {
        $('#formEditPendidikan').children().first().addClass('opacity-0')
        $('#formEditPendidikan').children().first().on('transitionend MSTransitionEnd webkitTransitionEnd oTransitionEnd', function () {
            $('#formEditPendidikan').children().first().addClass('hidden')
        });
        setTimeout(function () {
            $('#formEditPendidikan').remove()
        }, 400);
    })

    var modal = document.getElementById('formEditPendidikan')
    $(window).click(function (e) {
        if (e.target === modal) {
            $('#formEditPendidikan').children().first().addClass('opacity-0')
            $('#formEditPendidikan').children().first().on('transitionend MSTransitionEnd webkitTransitionEnd oTransitionEnd', function () {
                $('#formEditPendidikan').children().first().addClass('hidden')
            });
            setTimeout(function () {
                $('#formEditPendidikan').remove()
            }, 400);
        }
    })

    $('#editId').val(id);
    $('#editJenjang').val(jenjang);
    $('#editUniversitas').val(univ);
    $('#editStudi').val(studi);
    $('#editMasuk').val(masuk);
    $('#editLulus').val(lulus);
    $('#editTulisan').val(tulisan);

}

$('.tambahPendidikan').click(function () {
    $('body').prepend(`
    <div class="fixed top-0 bottom-0 right-0 left-0 z-50 flex justify-center items-center bg-black bg-opacity-40 font-paragraph" id='formTambahPendidikan'>
        <div class="hidden opacity-0 duration-700 transition-all xl:w-1/2 lg:w-7/12 md:w-2/3 sm:w-3/4 w-11/12 bg-gray bg-opacity-0">
            <div class="bg-primary py-4 px-6 rounded-t-2xl flex items-center justify-between text-secondary text-2xl">
                <p class="font-heading font-bold">Tambah Pendidikan</p>
                <svg class="closePendidikan lg:w-10 md:w-8 sm:w-7 w-6 fill-current cursor-pointer" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
            </div>
            <form action="/User/addPendidikan" method="post" class="flex flex-col bg-gray-100 sm:px-12 px-4 rounded-b-2xl text-sm">
                <label for="editJenjang" class="text-primary font-medium mt-2">Jenjang:</label>
                <input type="text" placeholder="Masukkan nama Jenjang" class="inputForm" name="jenjang" id="editJenjang">
                <label for="editUniversitas" class="text-primary font-medium">Universitas:</label>
                <input type="text" placeholder="Masukkan nama Universitas" class="inputForm" name="instansi" id="editUniversitas">
                <label for="editStudi" class="text-primary font-medium">Program Studi:</label>
                <input type="text" placeholder="Masukkan nama Program Studi" class="inputForm" name="program_studi" id="editStudi">
                <div class="flex">
                    <div class="flex flex-col mr-8 w-1/3">
                        <label for="editMasuk" class="text-primary font-medium">Tahun Masuk:</label>
                        <input type="number" name="tahun_masuk" id="editMasuk" placeholder="1973" min="1950" max="2100" class="inputForm">
                    </div>
                    <div class="flex flex-col w-1/3">
                        <label for="editLulus" class="text-primary font-medium">Tahun Lulus:</label>
                        <input type="number" name="tahun_lulus" id="editLulus" placeholder="1977" min="1950" max="2100" class="inputForm">
                    </div>
                </div>
                <label for="editTulisan" class="text-primary font-medium">Judul Tulisan:</label>
                <textarea name="judul_tulisan" id="editTulisan" rows="2" class="inputForm resize-none" placeholder="Masukkan judul tulisan"></textarea>
                <div class="flex justify-end my-4">
                    <input type="submit" value="SIMPAN" class="bg-secondary text-white rounded-full w-24 py-1 text-center cursor-pointer hover:bg-secondaryhover transition-colors duration-300 text-sm mr-4 outline-none">
                    <input type="button" value="KEMBALI" class="closePendidikan bg-secondary text-white rounded-full w-24 py-1 text-center cursor-pointer hover:bg-secondaryhover transition-colors duration-300 text-sm outline-none" id='backPendidikan'>
                </div>

            </form>

        </div>
    </div>
`)

    $('#formTambahPendidikan').children().first().removeClass('hidden')
    setTimeout(function () {
        $('#formTambahPendidikan').children().first().removeClass('opacity-0')
    }, 10);

    $('.closePendidikan').click(function () {
        $('#formTambahPendidikan').children().first().addClass('opacity-0')
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
            $('#formTambahPendidikan').children().first().addClass('opacity-0')
            $('#formTambahPendidikan').children().first().on('transitionend MSTransitionEnd webkitTransitionEnd oTransitionEnd', function () {
                $('#formTambahPendidikan').children().first().addClass('hidden')
            });
            setTimeout(function () {
                $('#formTambahPendidikan').remove()
            }, 400);
        }
    })

})

function hapusPendidikan(id){
    $('body').prepend(`
    <div class="fixed top-0 bottom-0 right-0 left-0 z-50 flex justify-center items-center bg-black bg-opacity-40 font-paragraph" id='formHapus'>
        <div class="hidden opacity-0 duration-700 transition-all bg-gray bg-opacity-0">
            <div class="bg-white rounded-2xl flex flex-col justify-center pt-3 pb-4 sm:px-8 px-3">
                <p class="font-bold sm:text-lg text-base mb-6">Apakah Anda yakin ingin menghapus data pendidikan ini?</p>
                <form action="/User/deletePendidikan" method="POST" class="text-white flex justify-end">
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
        $('#formHapus').children().first().removeClass('opacity-0')
    }, 10);

    $('.buttonBatal').click(function () {
        $('#formHapus').children().first().addClass('opacity-0')
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
            $('#formHapus').children().first().addClass('opacity-0')
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

// awal js edit tempat kerja
document.querySelector('input[list]').addEventListener('input', function(e) {
    var input = e.target,
        list = input.getAttribute('list'),
        options = document.querySelectorAll('#' + list + ' option'),
        hiddenInput = document.getElementById(input.getAttribute('id') + '-hidden'),
        inputValue = input.value;

    hiddenInput.value = inputValue;

    for (var i = 0; i < options.length; i++) {
        var option = options[i];

        if (option.innerText === inputValue) {
            hiddenInput.value = option.getAttribute('data-value');
            break;
        }
    }
});

$('.tambahInstansi').click(function () {
    if ($('#lainnya').hasClass('hidden')) {
        $('#lainnya').removeClass('hidden')
        $('#adainstansi').addClass('hidden')
    } else {
        $('#lainnya').addClass('hidden')
        $('#adainstansi').removeClass('hidden')
    }
});

$('.kembaliInstansi').click(function () {
    if ($('#adainstansi').hasClass('hidden')) {
        $('#adainstansi').removeClass('hidden')
        $('#lainnya').addClass('hidden')
    } else {
        $('#adainstansi').addClass('hidden')
        $('#lainnya').removeClass('hidden')
    }
});
// akhir js edit tempat kerja

// awal js edit prestasi
function buttonEditTampilanPrestasi(){
    if ($('.editTampilanPrestasi').hasClass('hidden')){
        $('.editTampilanPrestasi').removeClass('hidden');
        if($('#checkPrestasi').is(':checked')){
            $('#labelCheckPrestasi').addClass('text-primary');
        }
    } else $('.editTampilanPrestasi').addClass('hidden');
}

function checkPrestasi(){
    if($('#checkPrestasi').is(':checked')){
        $('#labelCheckPrestasi').addClass('text-primary');
    } else $('#labelCheckPrestasi').removeClass('text-primary');
}

function formPrestasi(id, prestasi, tahun) {
    $('body').prepend(`
    <div class="fixed top-0 bottom-0 right-0 left-0 z-50 flex justify-center items-center bg-black bg-opacity-40" id='formEditPrestasi'>
        <div class="hidden opacity-0 duration-700 transition-all xl:w-1/2 lg:w-7/12 md:w-2/3 sm:w-3/4 w-11/12 bg-gray bg-opacity-0 font-paragraph">
        <div class="bg-primary py-4 px-6 rounded-t-2xl flex items-center justify-between text-secondary text-2xl">
            <p class="font-heading font-bold">Edit Prestasi</p>
            <svg class="closePrestasi lg:w-10 md:w-8 sm:w-7 w-6 fill-current cursor-pointer" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
        </div>
        <form action="/User/updatePrestasi" method="post" class="flex flex-col bg-gray-100 sm:px-12 px-4 rounded-b-2xl text-sm">
            <label for="editPrestasi" class="text-primary font-medium mt-2">Nama Prestasi:</label>
            <input type="hidden" name="id_prestasi" id="editId">
            <input type="text" placeholder="Masukkan nama Prestasi" class="inputForm" name="nama_prestasi" id="editPrestasi">
            <div class="sm:w-2/5 w-1/2">
                <label for="editTahun" class="text-primary font-medium">Tahun:</label>
                <input type="number" name="tahun_prestasi" id="editTahun" placeholder="1980" min="1950" max="2100" class="inputForm">
            </div>
            <div class="flex justify-end my-4">
                <input type="submit" value="SIMPAN" class="bg-secondary text-white rounded-full w-24 py-1 text-center cursor-pointer hover:bg-secondaryhover transition-colors duration-300 text-sm mr-4 outline-none">
                <input type="button" value="KEMBALI" class="closePrestasi bg-secondary text-white rounded-full w-24 py-1 text-center cursor-pointer hover:bg-secondaryhover transition-colors duration-300 text-sm outline-none" id='backPrestasi'>
            </div>
        </form>
        </div>
    </div>
    `)

    $('#formEditPrestasi').children().first().removeClass('hidden')
    setTimeout(function () {
        $('#formEditPrestasi').children().first().removeClass('opacity-0')
    }, 10);

    $('.closePrestasi').click(function () {
        $('#formEditPrestasi').children().first().addClass('opacity-0')
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
            $('#formEditPrestasi').children().first().addClass('opacity-0')
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

function tambahPrestasi(){
    $('body').prepend(`
    <div class="fixed top-0 bottom-0 right-0 left-0 z-50 flex justify-center items-center bg-black bg-opacity-40" id='formTambahPrestasi'>
        <div class="hidden opacity-0 duration-700 transition-all xl:w-1/2 lg:w-7/12 md:w-2/3 sm:w-3/4 w-11/12 bg-gray bg-opacity-0 font-paragraph">
        <div class="bg-primary py-4 px-6 rounded-t-2xl flex items-center justify-between text-secondary text-2xl">
            <p class="font-heading font-bold">Tambah Prestasi</p>
            <svg class="closePrestasi lg:w-10 md:w-8 sm:w-7 w-6 fill-current cursor-pointer" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
        </div>
        <form action="/User/addPrestasi" method="post" class="flex flex-col bg-gray-100 sm:px-12 px-4 rounded-b-2xl text-sm">
            <label for="editJenjang" class="text-primary font-medium mt-2">Nama Prestasi:</label>
            <input type="text" placeholder="Masukkan nama Prestasi" class="inputForm" name="nama_prestasi" id="editPrestasi">
            <div class="sm:w-2/5 w-1/2">
                <label for="editMasuk" class="text-primary font-medium">Tahun:</label>
                <input type="number" name="tahun_prestasi" id="editTahun" placeholder="1980" min="1950" max="2100" class="inputForm">
            </div>
            <div class="flex justify-end my-4">
                <input type="submit" value="SIMPAN" class="bg-secondary text-white rounded-full w-24 py-1 text-center cursor-pointer hover:bg-secondaryhover transition-colors duration-300 text-sm mr-4 outline-none">
                <input type="button" value="KEMBALI" class="closePrestasi bg-secondary text-white rounded-full w-24 py-1 text-center cursor-pointer hover:bg-secondaryhover transition-colors duration-300 text-sm outline-none" id='backPrestasi'>
            </div>
        </form>
        </div>
    </div>
    `)

    $('#formTambahPrestasi').children().first().removeClass('hidden')
    setTimeout(function () {
        $('#formTambahPrestasi').children().first().removeClass('opacity-0')
    }, 10);

    $('.closePrestasi').click(function () {
        $('#formTambahPrestasi').children().first().addClass('opacity-0')
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
            $('#formTambahPrestasi').children().first().addClass('opacity-0')
            $('#formTambahPrestasi').children().first().on('transitionend MSTransitionEnd webkitTransitionEnd oTransitionEnd', function () {
                $('#formTambahPrestasi').children().first().addClass('hidden')
            });
            setTimeout(function () {
                $('#formTambahPrestasi').remove()
            }, 400);
        }
    })

}

function hapusPrestasi(id){
    $('body').prepend(`
    <div class="fixed top-0 bottom-0 right-0 left-0 z-50 flex justify-center items-center bg-black bg-opacity-40 font-paragraph" id='formHapus'>
        <div class="hidden opacity-0 duration-700 transition-all bg-gray bg-opacity-0">
            <div class="bg-white rounded-2xl flex flex-col justify-center pt-3 pb-4 sm:px-8 px-3">
                <p class="font-bold sm:text-lg text-base mb-6">Apakah Anda yakin ingin menghapus data prestasi ini?</p>
                <form action="/User/deletePrestasi" method="POST" class="text-white flex justify-end">
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
        $('#formHapus').children().first().removeClass('opacity-0')
    }, 10);

    $('.buttonBatal').click(function () {
        $('#formHapus').children().first().addClass('opacity-0')
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
            $('#formHapus').children().first().addClass('opacity-0')
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

// awal js edit publikasi
function formPublikasi(id, topik, publisher, tanggal, deskripsi) {
    $('body').prepend(`
    <div class="fixed top-0 bottom-0 right-0 left-0 z-50 flex justify-center items-center bg-black bg-opacity-40 font-paragraph" id='formEditPublikasi'>
        <div class="hidden opacity-0 duration-700 transition-all xl:w-1/2 lg:w-7/12 md:w-2/3 sm:w-3/4 w-11/12 bg-gray bg-opacity-0">
            <div class="bg-primary py-4 px-6 rounded-t-2xl flex items-center justify-between text-secondary text-2xl">
                <p class="font-heading font-bold">Edit Publikasi</p>
                <svg class="closePublikasi lg:w-10 md:w-8 sm:w-7 w-6 fill-current cursor-pointer" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
            </div>
            <form action="" method="post" class="flex flex-col bg-gray-100 sm:px-12 px-4 rounded-b-2xl text-sm">
                <input type="hidden" name="id_edit" id="editId">
                <label for="editTopik" class="text-primary font-medium mt-2">Topik:</label>
                <input type="text" placeholder="Masukkan topik Publikasi" class="inputForm" name="topik" id="editTopik">
                <label for="editPublisher" class="text-primary font-medium">Publisher:</label>
                <input type="text" placeholder="Masukkan nama Publisher" class="inputForm" name="publisher" id="editPublisher">
                <div class="flex">
                    <div class="flex flex-col mr-8 sm:w-1/3 w-1/2">
                        <label for="editMasuk" class="text-primary font-medium">Tanggal Publikasi:</label>
                        <input type="date" class="cursor-pointer inputForm" name="tanggal_disahkan" id="editTanggal">
                    </div>
                </div>
                <label for="editTulisan" class="text-primary font-medium">Deskripsi:</label>
                <textarea name="deskripsi" id="editTulisan" rows="2" class="inputForm resize-none" placeholder="Masukkan deskripsi publikasi"></textarea>
                <div class="flex justify-end my-8">
                    <input type="submit" value="SIMPAN" class="bg-secondary text-white rounded-full w-24 py-1 text-center cursor-pointer hover:bg-secondaryhover transition-colors duration-300 text-sm mr-4 outline-none">
                    <input type="button" value="KEMBALI" class="closePublikasi bg-secondary text-white rounded-full w-24 py-1 text-center cursor-pointer hover:bg-secondaryhover transition-colors duration-300 text-sm outline-none" id='backPublikasi'>
                </div>

            </form>

        </div>
    </div>
`)

    $('#formEditPublikasi').children().first().removeClass('hidden')
    setTimeout(function () {
        $('#formEditPublikasi').children().first().removeClass('opacity-0')
    }, 10);

    $('.closePublikasi').click(function () {
        $('#formEditPublikasi').children().first().addClass('opacity-0')
        $('#formEditPublikasi').children().first().on('transitionend MSTransitionEnd webkitTransitionEnd oTransitionEnd', function () {
            $('#formEditPublikasi').children().first().addClass('hidden')
        });
        setTimeout(function () {
            $('#formEditPublikasi').remove()
        }, 400);
    })

    var modal = document.getElementById('formEditPublikasi')
    $(window).click(function (e) {
        if (e.target === modal) {
            $('#formEditPublikasi').children().first().addClass('opacity-0')
            $('#formEditPublikasi').children().first().on('transitionend MSTransitionEnd webkitTransitionEnd oTransitionEnd', function () {
                $('#formEditPublikasi').children().first().addClass('hidden')
            });
            setTimeout(function () {
                $('#formEditPublikasi').remove()
            }, 400);
        }
    })


    $('#editId').val(id);
    $('#editTopik').val(topik);
    $('#editPublisher').val(publisher);
    $('#editTanggal').val(tanggal);
    $('#editTulisan').val(deskripsi);

}

function tambahPublikasi(){
    $('body').prepend(`
    <div class="fixed top-0 bottom-0 right-0 left-0 z-50 flex justify-center items-center bg-black bg-opacity-40 font-paragraph" id='formTambahPublikasi'>
        <div class="hidden opacity-0 duration-700 transition-all xl:w-1/2 lg:w-7/12 md:w-2/3 sm:w-3/4 w-11/12 bg-gray bg-opacity-0">
            <div class="bg-primary py-4 px-6 rounded-t-2xl flex items-center justify-between text-secondary text-2xl">
                <p class="font-heading font-bold">Tambah Publikasi</p>
                <svg class="closePublikasi lg:w-10 md:w-8 sm:w-7 w-6 fill-current cursor-pointer" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
            </div>
            <form action="" method="post" class="flex flex-col bg-gray-100 sm:px-12 px-4 rounded-b-2xl text-sm">
                <label for="editTopik" class="text-primary font-medium mt-2">Topik:</label>
                <input type="text" placeholder="Masukkan topik Publikasi" class="inputForm" name="topik" id="editTopik">
                <label for="editPublisher" class="text-primary font-medium">Publisher:</label>
                <input type="text" placeholder="Masukkan nama Publisher" class="inputForm" name="publisher" id="editPublisher">
                <div class="flex">
                    <div class="flex flex-col mr-8 sm:w-1/3 w-1/2">
                        <label for="editMasuk" class="text-primary font-medium">Tanggal Publikasi:</label>
                        <input type="date" class="cursor-pointer inputForm" name="tanggal_disahkan" id="editMasuk">
                    </div>
                </div>
                <label for="editTulisan" class="text-primary font-medium">Deskripsi:</label>
                <textarea name="deskripsi" id="editTulisan" rows="2" class="inputForm resize-none" placeholder="Masukkan deskripsi publikasi"></textarea>
                <div class="flex justify-end my-8">
                    <input type="submit" value="SIMPAN" class="bg-secondary text-white rounded-full w-24 py-1 text-center cursor-pointer hover:bg-secondaryhover transition-colors duration-300 text-sm mr-4 outline-none">
                    <input type="button" value="KEMBALI" class="closePublikasi bg-secondary text-white rounded-full w-24 py-1 text-center cursor-pointer hover:bg-secondaryhover transition-colors duration-300 text-sm outline-none" id='backPublikasi'>
                </div>

            </form>

        </div>
    </div>
`)

    $('#formTambahPublikasi').children().first().removeClass('hidden')
    setTimeout(function () {
        $('#formTambahPublikasi').children().first().removeClass('opacity-0')
    }, 10);

    $('.closePublikasi').click(function () {
        $('#formTambahPublikasi').children().first().addClass('opacity-0')
        $('#formTambahPublikasi').children().first().on('transitionend MSTransitionEnd webkitTransitionEnd oTransitionEnd', function () {
            $('#formTambahPublikasi').children().first().addClass('hidden')
        });
        setTimeout(function () {
            $('#formTambahPublikasi').remove()
        }, 400);
    })

    var modal = document.getElementById('formTambahPublikasi')
    $(window).click(function (e) {
        if (e.target === modal) {
            $('#formTambahPublikasi').children().first().addClass('opacity-0')
            $('#formTambahPublikasi').children().first().on('transitionend MSTransitionEnd webkitTransitionEnd oTransitionEnd', function () {
                $('#formTambahPublikasi').children().first().addClass('hidden')
            });
            setTimeout(function () {
                $('#formTambahPublikasi').remove()
            }, 400);
        }
    })

}

function hapusPublikasi(){
    $('body').prepend(`
    <div class="fixed top-0 bottom-0 right-0 left-0 z-50 flex justify-center items-center bg-black bg-opacity-40 font-paragraph" id='formHapus'>
        <div class="hidden opacity-0 duration-700 transition-all bg-gray bg-opacity-0">
            <div class="bg-white rounded-2xl flex flex-col justify-center pt-3 pb-4 sm:px-8 px-3">
                <p class="font-bold sm:text-lg text-base mb-6">Apakah Anda yakin ingin menghapus data publikasi ini?</p>
                <div class="text-white flex justify-end">
                    <div class="buttonBatal bg-success hover:bg-successHover transition-all text-white rounded-2xl w-20 mr-2 text-sm flex justify-center items-center cursor-pointer py-1 transition-all">BATAL</div>
                    <button class="rounded-2xl w-20 text-sm flex justify-center items-center cursor-pointer hover:bg-red-800 bg-red-600 transition-all focus:outline-none">HAPUS</button>
                </div>
            </div>
        </div>
    </div>
    `)
    $('#formHapus').children().first().removeClass('hidden')
    setTimeout(function () {
        $('#formHapus').children().first().removeClass('opacity-0')
    }, 10);

    $('.buttonBatal').click(function () {
        $('#formHapus').children().first().addClass('opacity-0')
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
            $('#formHapus').children().first().addClass('opacity-0')
            $('#formHapus').children().first().on('transitionend MSTransitionEnd webkitTransitionEnd oTransitionEnd', function () {
                $('#formHapus').children().first().addClass('hidden')
            });
            setTimeout(function () {
                $('#formHapus').remove()
            }, 400);
        }
    })
}
// akhir js edit publikasi

// awal js edit biodata webservice
$('#simpanBiodata').click(function () {
    $('body').prepend(`
    <div class="fixed top-0 bottom-0 right-0 left-0 z-50 flex justify-center items-center bg-black bg-opacity-40" id='popupBiodata'>
        <div class="hidden opacity-0 duration-700 transition-all p-3 rounded-lg flex items-center" style="background-color: #B1FF66;">
            <img src="/img/components/icon/check.png" class="h-5 mr-2" style="color: #54AC00;" alt="icon check">
            <p class="sm:text-base text-sm font-heading font-bold" style="color: #54AC00">Biodata Berhasil Disimpan</p>
        </div>
    </div>`)

    $('#popupBiodata').children().first().removeClass('hidden')
    setTimeout(function () {
        $('#popupBiodata').children().first().removeClass('opacity-0')
    }, 10);
    setTimeout(function () {
        $('#formEditBiodataDev').submit()
    }, 700);
})
// akhir js edit biodata webservice

// awal js edit akun webservice
$('#simpanAkun').click(function (e) {
    e.preventDefault()
    $('body').prepend(`
    <div class="fixed top-0 bottom-0 right-0 left-0 z-50 flex justify-center items-center bg-black bg-opacity-40" id='popupAkun'>
    <div class="hidden opacity-0 duration-700 transition-all p-3 rounded-lg flex items-center" style="background-color: #B1FF66;">
        <img src="/img/components/icon/check.png" class="h-5 mr-2" style="color: #54AC00;" alt="icon check">
        <p class="sm:text-base text-sm font-heading font-bold" style="color: #54AC00;">Biodata Berhasil Disimpan</p>
    </div>
    </div>
`)

    $('#popupBiodata').children().first().removeClass('hidden')
    setTimeout(function () {
        $('#popupBiodata').children().first().removeClass('opacity-0')
    }, 10);
    setTimeout(function () {
        $('#formEditAkunDev').submit()
    }, 700);
})
// akhir js edit akun webservice
