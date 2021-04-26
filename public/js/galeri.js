// awal js unggah foto suksesLaporkanFoto
function tutupFormUnggahFoto() {
    $('#formUnggahFoto').children().first().addClass('opacity-0')
    $('#formUnggahFoto').children().first().on('transitionend MSTransitionEnd webkitTransitionEnd oTransitionEnd', function () {
        $('#formUnggahFoto').children().first().addClass('hidden')
    });
    setTimeout(function () {
        $('#formUnggahFoto').remove()
    }, 400);
}

// awal js image viewer
$('.albumImg').click(function () {
    $('body').prepend(`
    <div class="fixed overflow-auto top-0 bottom-0 right-0 left-0 z-40 bg-black bg-opacity-80 text-center font-paragraph" id="img-1">
        <div class="hidden m-auto opacity-0 duration-700 transition-all bg-gray bg-opacity-0 w-11/12 sm:w-9/12 md:w-8/12 lg:w-7/12">

            <!-- Awal Tombol Laporkan foto -->
            <button onClick="laporkanFoto()"><img src="/img/danger-sign.png" alt="" class="absolute top-3 right-3"></button>
            <!-- Akhir Tombol Laporkan foto -->

            <div class="flex flex-col justify-center items-center">
                <div class="flex flex-row justify-center items-center gap-x-4 mt-8 mb-6">
                    <a href="#img-1">
                        <img src="/img/left-on.png" alt="" class="">
                    </a>
                    <img src="/img/alumni.jpg" alt="" class="w-3/4">
                    <a href="">
                        <img src="/img/right-on.png" alt="" class="">
                    </a>
                </div>

                <!-- Awal Caption -->
                <div class="text-white w-3/4 mx-2 text-base">
                    <p class="mb-2">Oleh : Si Fulan (59)</p>
                    <p class="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam impedit optio praesentium soluta quasi. Voluptatibus molestias sequi inventore odit voluptas pariatur a ut, totam obcaecati accusamus iure, labore dolorum dolor.</p>
                </div>
                <!-- Akhir Caption -->

                <div class="text-white w-3/4 mx-2 mt-10 md:text-xl">
                <p class="mb-2">1 dari 13</p>
                </div>

            </div>
        </div>
    </div>
`)

    $('#img-1').children().first().removeClass('hidden')
    setTimeout(function () {
        $('#img-1').children().first().removeClass('opacity-0')
    }, 10);

    var modal = document.getElementById('img-1')
    $(window).click(function (e) {
        if (e.target === modal) {
            $('#img-1').children().first().addClass('opacity-0')
            $('#img-1').children().first().on('transitionend MSTransitionEnd webkitTransitionEnd oTransitionEnd', function () {
                $('#img-1').children().first().addClass('hidden')
            });
            setTimeout(function () {
                $('#img-1').remove()
            }, 400);
        }
    })
})

$('#img-1').children().first().removeClass('hidden')
setTimeout(function () {
    $('#img-1').children().first().removeClass('opacity-0')
}, 10);

var modal = document.getElementById('img-1')
$(window).click(function (e) {
    if (e.target === modal) {
        $('#img-1').children().first().addClass('opacity-0')
        $('#img-1').children().first().on('transitionend MSTransitionEnd webkitTransitionEnd oTransitionEnd', function () {
            $('#img-1').children().first().addClass('hidden')
        });
        setTimeout(function () {
            $('#img-1').remove()
        }, 400);
    }
})
// akhir js image viewer

// awal js unggah foto
$('.unggahFoto').click(function () {
    $('body').prepend(`
    <div class="fixed top-0 bottom-0 right-0 left-0 z-50 flex justify-center items-center bg-black bg-opacity-40 font-paragraph" id='formUnggahFoto'>
        <div class="hidden opacity-0 duration-700 transition-all xl:w-1/2 lg:w-7/12 md:w-2/3 sm:w-3/4 w-11/12 bg-gray bg-opacity-0">
            <div class="bg-primary py-4 px-6 rounded-t-2xl flex items-center justify-between text-secondary text-2xl">
                <p class="font-heading font-bold">Unggah Foto</p>
                <svg class="closeFormUnggahFoto lg:w-10 md:w-8 sm:w-7 w-6 fill-current cursor-pointer" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
            </div>
            <form action="" method="post" class="flex flex-col bg-gray-100 sm:px-12 px-4 rounded-b-2xl text-sm">
                <div class="flex mt-5">
                    <div class="flex justify-start items-center mb-2 w-full relative">
                    <input type="file" hidden accept=".jpg, .jpeg, .img, .png" title="Pilih File" id='pilihFile'>
                    <label for="pilihFile" title="Harus Diisi" class="pilihFile bg-secondary text-white rounded-full w-24 py-1 text-center cursor-pointer hover:bg-secondaryhover transition-colors duration-300 text-sm mr-4 outline-none" >Pilih File</label>
                    <span class="text-primary absolute md:left-28 left-28 select-none cursor-default cursor md:text-sm text-sm">Tidak ada foto yang dipilih</span>
                    </div>
                </div>
                <label for="albumFoto" class="text-primary font-medium mt-2">Album Foto:</label>
                <select name="albumFoto" id="albumFoto" class="inputForm font-heading text-xs">
                    <option label="pilih album foto:" class="text-gray-500">
                    <option value="album1">Album Foto 1</option>
                    <option value="album2">Album Foto 2</option>
                    </option>
                </select>
                <label for="deskripsi" class="text-primary font-medium">*Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="2" class="inputForm resize-none font-heading text-xs" placeholder="Penggunaan Jutsu Air dalam Mengatasi Permasalahan Banjir yang Sering Terjadi di Wilayah Pemukiman Rawan Longsor" required></textarea>
                <label for="angkatan" class="text-primary font-medium">*Angkatan :</label>
                <input name="angkatan" id="angkatan" type="number" min="1" max="63" step="1" value="60" size="6" class="inputForm font-heading text-xs" required>
                <label for="tags" class="text-primary font-medium">Tags :</label>
                <select name="tags" id="tags" class="inputForm font-heading text-xs">
                    <option value="album1">Album Foto 1</option>
                    <option value="album2">Album Foto 2</option>
                    </option>
                </select>
                <div class="font-heading text-xs text-primary">
                    <p class="mb-2"> *Required </p>
                    <p> Format file harus .jpg/.jpeg/.png </p>
                    <p> Ukuran file maksimum 2 MB </p>
                </div>
                <div class="flex justify-end my-4">
                    <input type="button" value="BATAL" class="closeFormUnggahFoto bg-secondary text-white rounded-full w-24 py-1 text-center cursor-pointer hover:bg-secondaryhover transition-colors duration-300 text-sm mr-4 outline-none" id='backUnggahFoto'>
                    <input type="submit" value="UNGGAH" class="suksesUnggahFoto bg-secondary text-white rounded-full w-24 py-1 text-center cursor-pointer hover:bg-secondaryhover transition-colors duration-300 text-sm outline-none">
                </div>

            </form>

        </div>
    </div>
`)
    $('#pilihFile').change(function() {
        $(this).next().next().text(this.files[0].name)
    });

    $('#formUnggahFoto').children().first().removeClass('hidden')
    setTimeout(function () {
        $('#formUnggahFoto').children().first().removeClass('opacity-0')
    }, 10);

    $('.closeFormUnggahFoto').click(function () {
        tutupFormUnggahFoto();
    })

    var modal = document.getElementById('formUnggahFoto')
    $(window).click(function (e) {
        if (e.target === modal) {
            tutupFormUnggahFoto();
        }
    })

    $('#backUnggahFoto').click(function (e) {
        e.preventDefault()
        $('#formUnggahFoto').children().first().addClass('hidden')
        $('#formUnggahFoto').children().first().removeClass('hidden')
        setTimeout(function () {
            $('#formUnggahFoto').children().first().removeClass('opacity-0')
        }, 10);
        setTimeout(function () {
            $('#formUnggahFoto').children().eq(1).children().eq(1).submit()
        }, 700);
    })
})
//Akhir Unggah Foto

//Awal apabila Unggah Foto Sukses
function suksesUnggahFoto () {
    
    tutupFormUnggahFoto();

    $('body').prepend(`
    <div class="fixed top-0 bottom-0 right-0 left-0 z-50 flex justify-center items-center bg-black bg-opacity-40 font-paragraph" id='suksesUnggahFoto'>
        <div class="hidden opacity-0 duration-700 transition-all lg:w-1/3 md:w-2/3 sm:w-3/4 w-11/12 bg-gray bg-opacity-0">
            <div class="flex flex-col items-center bg-white py-8 rounded-2xl shadow-md">
                <svg class="h-20 w-20 bg-primary text-white rounded-full mb-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                </svg>
                <p class="sm:text-base text-sm font-heading font-bold text-primary mb-2">Foto Berhasil Terunggah</p>
                <input type="button" value="OKE" class="closeSuksesUnggahFoto bg-secondary text-white rounded-full w-24 py-1 text-center cursor-pointer hover:bg-secondaryhover transition-colors duration-300 text-sm mr-4 outline-none" id='backUnggahFoto'>

            </div>
        </div>
    </div>
`)

    $('#suksesUnggahFoto').children().first().removeClass('hidden')
    setTimeout(function () {
        $('#suksesUnggahFoto').children().first().removeClass('opacity-0')
    }, 10);

    $('.closeSuksesUnggahFoto').click(function () {
        $('#suksesUnggahFoto').children().first().addClass('opacity-0')
        $('#suksesUnggahFoto').children().first().on('transitionend MSTransitionEnd webkitTransitionEnd oTransitionEnd', function () {
            $('#suksesUnggahFoto').children().first().addClass('hidden')
        });
        setTimeout(function () {
            $('#suksesUnggahFoto').remove()
        }, 400);
    })

    var modal = document.getElementById('suksesUnggahFoto')
    $(window).click(function (e) {
        if (e.target === modal) {
            $('#suksesUnggahFoto').children().first().addClass('opacity-0')
            $('#suksesUnggahFoto').children().first().on('transitionend MSTransitionEnd webkitTransitionEnd oTransitionEnd', function () {
                $('#suksesUnggahFoto').children().first().addClass('hidden')
            });
            setTimeout(function () {
                $('#suksesUnggahFoto').remove()
            }, 400);
        }
    })

}
//Akhir apabila Unggah Foto Sukses

//Awal Lapor Foto

function tutupFormLaporFoto() {
    $('#formLaporFoto').children().first().addClass('opacity-0')
    $('#formLaporFoto').children().first().on('transitionend MSTransitionEnd webkitTransitionEnd oTransitionEnd', function () {
        $('#formLaporFoto').children().first().addClass('hidden')
    });
    setTimeout(function () {
        $('#formLaporFoto').remove()
    }, 400);
}

function laporkanFoto(){
    $('body').prepend(`
    <div class="fixed top-0 bottom-0 right-0 left-0 z-50 flex justify-center items-center bg-black bg-opacity-40 font-paragraph" id='formLaporFoto'>
        <div class="hidden opacity-0 duration-700 transition-all xl:w-1/2 lg:w-7/12 md:w-2/3 sm:w-3/4 w-11/12 bg-gray bg-opacity-0">
            <div class="bg-primary py-4 px-6 rounded-t-2xl flex items-center justify-between text-secondary text-2xl">
                <p class="font-heading font-bold">Laporkan Foto</p>
                <svg class="closeFormLaporFoto lg:w-10 md:w-8 sm:w-7 w-6 fill-current cursor-pointer" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </div>
            <form action="" method="post" class="flex flex-col bg-gray-100 sm:px-12 px-4 rounded-b-2xl text-sm">
                <label for="inputLaporan" class="text-primary font-medium mt-8">Mengapa Anda melaporkan foto ini?</label>
                <textarea name="inputLaporan" class="inputForm h-36" style="resize: none;" required></textarea>
    
                <div class="flex justify-end my-4">
                    <input type="button" value="BATAL" class="closeFormLaporFoto bg-secondary text-white rounded-full w-24 py-1 text-center cursor-pointer hover:bg-secondaryhover transition-colors duration-300 text-sm mr-4 outline-none" id='backFormLaporFoto'>
                    <input type="submit" value="UNGGAH" class="submitFormLaporFoto bg-secondary text-white rounded-full w-24 py-1 text-center cursor-pointer hover:bg-secondaryhover transition-colors duration-300 text-sm outline-none">
                </div>
            </form>
        </div>
    </div>
`)
    
    $('#formLaporFoto').children().first().removeClass('hidden')
    setTimeout(function () {
        $('#formLaporFoto').children().first().removeClass('opacity-0')
    }, 10);
    
    $('.closeFormLaporFoto').click(function () {
        tutupFormLaporFoto();
    })
    
    var modal = document.getElementById('formLaporFoto')
    $(window).click(function (e) {
        if (e.target === modal) {
            tutupFormLaporFoto();
        }
    })
    
    $('#backFormLaporFoto').click(function (e) {
        e.preventDefault()
        $('#formLaporFoto').children().first().addClass('hidden')
        $('#formLaporFoto').children().first().removeClass('hidden')
        setTimeout(function () {
            $('#formLaporFoto').children().first().removeClass('opacity-0')
        }, 10);
        setTimeout(function () {
            $('#formLaporFoto').children().eq(1).children().eq(1).submit()
        }, 700);
    })
}

//Akhir Lapor Foto

//Awal apabila Lapor Foto Sukses
function suksesLaporFoto () {
    
    tutupFormUnggahVideo();

    $('body').prepend(`
    <div class="fixed top-0 bottom-0 right-0 left-0 z-50 flex justify-center items-center bg-black bg-opacity-40 font-paragraph" id='suksesLaporFoto'>
        <div class=" duration-700 transition-all lg:w-1/3 md:w-2/3 sm:w-3/4 w-11/12 bg-gray bg-opacity-0">
            <div class="flex flex-col items-center bg-white py-8 rounded-2xl shadow-md">
                <svg class="h-20 w-20 bg-primary text-white rounded-full mb-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                </svg>
                <p class="sm:text-base text-sm font-heading font-bold text-primary mb-2">Laporan Anda berhasil dikirim</p>
                <input type="button" value="OKE" class="closeSuksesLaporFoto bg-secondary text-white rounded-full w-24 py-1 text-center cursor-pointer hover:bg-secondaryhover transition-colors duration-300 text-sm mr-4 outline-none" id='backSuksesLaporFoto'>

            </div>
        </div>
    </div>
`)

    $('#suksesLaporFoto').children().first().removeClass('hidden')
    setTimeout(function () {
        $('#suksesLaporFoto').children().first().removeClass('opacity-0')
    }, 10);

    $('.closeSuksesLaporFoto').click(function () {
        $('#suksesLaporFoto').children().first().addClass('opacity-0')
        $('#suksesLaporFoto').children().first().on('transitionend MSTransitionEnd webkitTransitionEnd oTransitionEnd', function () {
            $('#suksesLaporFoto').children().first().addClass('hidden')
        });
        setTimeout(function () {
            $('#suksesLaporFoto').remove()
        }, 400);
    })

    var modal = document.getElementById('suksesLaporFoto')
    $(window).click(function (e) {
        if (e.target === modal) {
            $('#suksesLaporFoto').children().first().addClass('opacity-0')
            $('#suksesLaporFoto').children().first().on('transitionend MSTransitionEnd webkitTransitionEnd oTransitionEnd', function () {
                $('#suksesLaporFoto').children().first().addClass('hidden')
            });
            setTimeout(function () {
                $('#suksesLaporFoto').remove()
            }, 400);
        }
    })

}

$('.suksesLaporkanFoto').click(function (e) {
    suksesLaporFoto();
})
//Akhir apabila Lapor Foto Sukses



//Awal Unggah Video

function tutupFormUnggahVideo() {
    $('#formUnggahVideo').children().first().addClass('opacity-0')
    $('#formUnggahVideo').children().first().on('transitionend MSTransitionEnd webkitTransitionEnd oTransitionEnd', function () {
        $('#formUnggahVideo').children().first().addClass('hidden')
    });
    setTimeout(function () {
        $('#formUnggahVideo').remove()
    }, 400);
}

$('.unggahVideo').click(function () {
    $('body').prepend(`
    <div class="fixed top-0 bottom-0 right-0 left-0 z-50 flex justify-center items-center bg-black bg-opacity-40 font-paragraph" id='formUnggahVideo'>
        <div class="hidden opacity-0 duration-700 transition-all xl:w-1/2 lg:w-7/12 md:w-2/3 sm:w-3/4 w-11/12 bg-gray bg-opacity-0">
            <div class="bg-primary py-4 px-6 rounded-t-2xl flex items-center justify-between text-secondary text-2xl">
                <p class="font-heading font-bold">Unggah Video</p>
                <svg class="closeFormUnggahVideo lg:w-10 md:w-8 sm:w-7 w-6 fill-current cursor-pointer" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </div>
            <form action="" method="post" class="flex flex-col bg-gray-100 sm:px-12 px-4 rounded-b-2xl text-sm">
                <label for="linkVideo" class="text-primary font-medium mt-8">Link Video Youtube</label>
                <input type="text" placeholder="Link video" class="inputForm" required>

                <label for="albumVideo" class="text-primary font-medium mt-4">Album Video :</label>
                <select name="albumVideo" id="albumVideo" class="inputForm" value="album0">
                    <option class="text-gray-500" value="album0">Pilih Album Video</option>
                    <option value="album1">Album Foto 1</option>
                    <option value="album2">Album Foto 2</option>
                </select>
                <div class="flex justify-end my-4">
                    <input type="button" value="BATAL" class="closeFormUnggahVideo bg-secondary text-white rounded-full w-24 py-1 text-center cursor-pointer hover:bg-secondaryhover transition-colors duration-300 text-sm mr-4 outline-none" id='backUnggahVideo'>
                    <input type="submit" value="UNGGAH" class="submitUnggahVideo bg-secondary text-white rounded-full w-24 py-1 text-center cursor-pointer hover:bg-secondaryhover transition-colors duration-300 text-sm outline-none">
                </div>

            </form>

        </div>
    </div>
`)

    $('#formUnggahVideo').children().first().removeClass('hidden')
    setTimeout(function () {
        $('#formUnggahVideo').children().first().removeClass('opacity-0')
    }, 10);

    $('.closeFormUnggahVideo').click(function () {
        tutupFormUnggahVideo();
    })

    var modal = document.getElementById('formUnggahVideo')
    $(window).click(function (e) {
        if (e.target === modal) {
            tutupFormUnggahVideo();
        }
    })

    $('#backUnggahVideo').click(function (e) {
        e.preventDefault()
        $('#formUnggahVideo').children().first().addClass('hidden')
        $('#formUnggahVideo').children().first().removeClass('hidden')
        setTimeout(function () {
            $('#formUnggahVideo').children().first().removeClass('opacity-0')
        }, 10);
        setTimeout(function () {
            $('#formUnggahVideo').children().eq(1).children().eq(1).submit()
        }, 700);
    })

})

//Akhir Unggah Video

//Awal apabila Unggah Video Sukses
function suksesUnggahVideo () {
    
    tutupFormUnggahVideo();

    $('body').prepend(`
    <div class="fixed top-0 bottom-0 right-0 left-0 z-50 flex justify-center items-center bg-black bg-opacity-40 font-paragraph" id='suksesUnggahVideo'>
        <div class="hidden opacity-0 duration-700 transition-all lg:w-1/3 md:w-2/3 sm:w-3/4 w-11/12 bg-gray bg-opacity-0">
            <div class="flex flex-col items-center bg-white py-8 rounded-2xl shadow-md">
                <svg class="h-20 w-20 bg-primary text-white rounded-full mb-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                </svg>
                <p class="sm:text-base text-sm font-heading font-bold text-primary mb-2">Video Anda Berhasil Diunggah</p>
                <input type="button" value="OKE" class="closeSuksesUnggahVideo bg-secondary text-white rounded-full w-24 py-1 text-center cursor-pointer hover:bg-secondaryhover transition-colors duration-300 text-sm mr-4 outline-none" id='backUnggahFoto'>

            </div>
        </div>
    </div>
`)

    $('#suksesUnggahVideo').children().first().removeClass('hidden')
    setTimeout(function () {
        $('#suksesUnggahVideo').children().first().removeClass('opacity-0')
    }, 10);

    $('.closeSuksesUnggahVideo').click(function () {
        $('#suksesUnggahVideo').children().first().addClass('opacity-0')
        $('#suksesUnggahVideo').children().first().on('transitionend MSTransitionEnd webkitTransitionEnd oTransitionEnd', function () {
            $('#suksesUnggahVideo').children().first().addClass('hidden')
        });
        setTimeout(function () {
            $('#suksesUnggahVideo').remove()
        }, 400);
    })

    var modal = document.getElementById('suksesUnggahVideo')
    $(window).click(function (e) {
        if (e.target === modal) {
            $('#suksesUnggahVideo').children().first().addClass('opacity-0')
            $('#suksesUnggahVideo').children().first().on('transitionend MSTransitionEnd webkitTransitionEnd oTransitionEnd', function () {
                $('#suksesUnggahVideo').children().first().addClass('hidden')
            });
            setTimeout(function () {
                $('#suksesUnggahVideo').remove()
            }, 400);
        }
    })

}
//Akhir apabila Unggah Video Sukses

//Akhir Unggah Video

const galeriButton = document.querySelectorAll(".galeriButton");

galeriButton.forEach(o => {
    o.addEventListener("click", () => {
        galeriButton.forEach(p => {
            p.classList.remove('text-white');
            p.classList.remove('bg-secondary');
            if(!p.classList.contains('text-secondary', 'bg-white')){
                p.classList.add('text-secondary');
                p.classList.add('bg-white');
            }
        });
        o.classList.remove('text-secondary');
        o.classList.remove('bg-white');
        o.classList.add('text-white');
        o.classList.add('bg-secondary');
        getList(o.innerHTML);
    })
})