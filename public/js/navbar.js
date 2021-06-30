// awal js buat scroll navbar interaktif

var y = null;
var tinggiLayar = $(window).height();
var tinggiNavbar = $('.navbar').height();
var tinggiMenu = $('.nav-menu').height();
var lastScroll = $(window).scrollTop();
var batasBawahLayar = 0;
var isMouseOver = false;

$('#nav ul li').mouseover(function () {
    isMouseOver = true
})
$('#nav ul li').mouseout(function () {
    isMouseOver = false
})
$(window).scroll(function (event) {
    var st = $(this).scrollTop();
    if (st > lastScroll) {
        // check apakah mouse dihover pada dropdown ws 
        if (isMouseOver) {
            $('#nav ul li ul').addClass('hidden')
        } else {
            $('#nav ul li ul').removeClass('hidden')
        }
        $('.navbar').addClass('invisible');
    } else {
        $('.navbar').removeClass('invisible');
    }
    lastScroll = st;

    if (lastScroll > tinggiNavbar) {
        $('.navbar').mouseout(function () {
            $('.navbar').addClass('invisible');
        });
    } else {
        $('.navbar').mouseout(function () {
            $('.navbar').removeClass('invisible');
        });
    }
});

$(window).resize(function () {
    lastScroll = $(window).scrollTop();;
});

$('.menuGaleri').mouseover(function () {
    $('.navbar').removeClass('invisible');
});

$('.menuGaleri').mouseout(function () {
    // supaya header tidak invisible ketika paling atas
    if (lastScroll > tinggiNavbar) {
        $('.navbar').addClass('invisible');
    }
});

$('.menuWebService').mouseover(function () {
    $('.navbar').removeClass('invisible');
});

$('.menuWebService').mouseout(function () {
    // supaya header tidak invisible ketika paling atas
    if (lastScroll > tinggiNavbar) {
        $('.navbar').addClass('invisible');
    }
});

window.addEventListener('mousemove', onMouseUpdate, false);
window.addEventListener('mouseenter', onMouseUpdate, false);

function onMouseUpdate(e) {
    y = e.pageY;
    // kalo mouse nya kena navbar bakal keliatan
    // kendala ga bisa dikecilin wilayah nya karena ga bisa diklik nanti
    if (y <= (lastScroll + tinggiNavbar)) {
        $('.navbar').removeClass('invisible');
    }
}

function getMouseY() {
    return y;
}
// akhir js buat scroll navbar interaktif

// doropdown navbar mobile
$('#hamburger').click(function () {
    if ($('#menu').hasClass('hidden')) {
        $('#menu').removeClass('hidden');
    } else {
        $('#menu').addClass('hidden');
    }
});

$('#hamburgerApi').click(function () {
    if ($('#menuApi').hasClass('hidden')) {
        $('#menuApi').removeClass('hidden')
        $('#hamburgerApi').html(`
        <svg class="text-white sm:w-8 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        `)
    } else {
        $('#menuApi').addClass('hidden')
        $('#hamburgerApi').html(`
        <svg class="sm:w-8 w-7 fill-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
        `)
    }
});

$('#inputCari').click(function () {
    $('#tombolCari').addClass('hidden');
})

// doropdown navbar mobile

// awal dropdown galeri mobile
$('#galeri').click(function () {
    if ($('#listGaleri').hasClass('hidden')) {
        $('#upGaleri').removeClass('hidden');
        $('#downGaleri').addClass('hidden');
        $('#listGaleri').removeClass('hidden');
    } else {
        $('#upGaleri').addClass('hidden');
        $('#downGaleri').removeClass('hidden');
        $('#listGaleri').addClass('hidden');
    }
});
// akhir dropdown galeri mobile

$('.editTutup').click(function () {
    if (window.matchMedia('(min-width: 768px)').matches) {
        $('.layoutEdit').removeClass('md:w-1/5 w-1/2').addClass('md:w-14 sm:w-16 w-10')
        $('.layoutEdit').next().removeClass('md:w-4/5')
        $('.navEdit').prev().removeClass('md:hidden hidden')
        $('.navEdit').removeClass('md:block').addClass('hidden')
        $('.editTutup').html(`
        <svg class="sm:w-7 w-6 cursor-pointer fill-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
    </svg> 
        `)
        // logo hamburger
    } else {
        $('.layoutEdit').removeClass('w-1/2').addClass('sm:w-16 w-10')
        $('.navEdit').prev().removeClass('hidden')
        $('.navEdit').addClass('hidden')
    }
});

$('.navEdit').prev().click(function () {
    if (window.matchMedia('(min-width: 768px)').matches) {
        $('.layoutEdit').removeClass('w-1/2 md:w-14').addClass('md:w-1/5 sm:w-16 w-10')
        $('.layoutEdit').next().addClass('md:w-4/5')
        if ($('.navEdit').prev().hasClass('md:block')) {
            $('.navEdit').prev().addClass('md:hidden').removeClass('md:block hidden')
        } else {
            $('.navEdit').prev().addClass('md:hidden')
        }
        setTimeout(() => {
            if ($('.navEdit').hasClass('md:hidden')) {
                $('.navEdit').removeClass('md:hidden block').addClass('md:block hidden')
            } else {
                $('.navEdit').addClass('md:block')
            }
        }, 300);
        $('.editTutup').html(`
    <svg class="sm:w-7 w-6 fill-current cursor-pointer" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
    </svg>
    `)
        // logo cross
    } else {
        $('.layoutEdit').removeClass('sm:w-16 w-10').addClass('w-1/2')
        if ($('.navEdit').prev().hasClass('md:block')) {
            $('.navEdit').prev().removeClass('md:block').addClass('md:block hidden')
        } else {
            $('.navEdit').prev().addClass('hidden md:block')
        }
        setTimeout(() => {
            if ($('.navEdit').hasClass('md:block')) {
                $('.navEdit').removeClass('hidden')
            } else {
                $('.navEdit').removeClass('hidden').addClass('md:hidden block')
            }
        }, 200);
        $('.editTutup').html(`
        <svg class="sm:w-7 w-6 fill-current cursor-pointer" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
        `)
        // logo cross

    }
});

//nav mobile webservice
$('#navmobile').click(function () {
    $('#navmobile ul').toggleClass('hidden')
})

// js dokumentasi
$('#burgerDok').click(function () {
    if ($(this).hasClass('tutup')) {
        $(this).removeClass('bg-secondary').html(`
    <svg class="cursor-pointer fill-current text-secondary" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
    </svg>
    `).toggleClass('tutup')
        $('#sidebarDok').removeClass('-left-64').addClass('left-0')
    } else {
        $(this).addClass('bg-secondary').html(`
        <svg class="cursor-pointer fill-current text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
        `).toggleClass('tutup')
        $('#sidebarDok').removeClass('left-0').addClass('-left-64')
    }
})
// js dokumentasi

// js layoutDokumentasi
$(document).ready(function () {
    $('#side-drop-down').click(function () {
        $(this).children().last().toggleClass('rotate-180');
        ($(this).next().hasClass('close-submenu')) ? $(this).next().removeClass('close-submenu').addClass('open-submenu'): $(this).next().removeClass('open-submenu').addClass('close-submenu')
        $(this).next().toggleClass('translate-y-24')
    })

});
// js layoutDokumentasi

// js layoutDokumentasi - Search Features
var TRange = null;

function findString(str) {
    if (parseInt(navigator.appVersion) < 4) return;
    var strFound;
    if (window.find) {
        // CODE FOR BROWSERS THAT SUPPORT window.find
        strFound = self.find(str);
        if (strFound && self.getSelection && !self.getSelection().anchorNode) {
            strFound = self.find(str)
        }
        if (!strFound) {
            strFound = self.find(str, 0, 1)
            while (self.find(str, 0, 1)) continue
        }
    } else if (navigator.appName.indexOf("Microsoft") != -1) {
        // EXPLORER-SPECIFIC CODE        
        if (TRange != null) {
            TRange.collapse(false)
            strFound = TRange.findText(str)
            if (strFound) TRange.select()
        }
        if (TRange == null || strFound == 0) {
            TRange = self.document.body.createTextRange()
            strFound = TRange.findText(str)
            if (strFound) TRange.select()
        }
    } else if (navigator.appName == "Opera") {
        alert("Browser Opera tidak didukung, maaf...")
        return;
    }
    if (!strFound) {
        $('body').prepend(`
    <div class="fixed top-0 bottom-0 right-0 left-0 z-50 flex justify-center items-center bg-black bg-opacity-40" id='modalPencarian'>
        <div class="hidden transform scale-0 opacity-0 duration-300 transition-all bg-gray bg-opacity-0">
            <div class="mx-3 sm:px-6 px-2 py-3 rounded-lg flex items-center text-justify bg-redAlert">
                <img src="/img/components/icon/false.png" class="h-5 mr-2 text-danger" alt="icon check">
                <p class="sm:text-lg text-base text-danger">Kata kunci "<span id='mystr'></span>" tidak ditemukan!</p>
            </div>
        </div>
    </div>
    `)
    document.getElementById("mystr").innerHTML=str;
        $('#modalPencarian').children().first().removeClass('hidden')
        setTimeout(function() {
            $('#modalPencarian').children().first().removeClass('opacity-0 scale-0')
        }, 10);

        $(window).click(function(e) {
            var modal = document.getElementById('modalPencarian')
            
            if (!!modal) {
                if (e.target === modal) {
                    $('#modalPencarian').children().first().addClass('opacity-0 scale-0')
                    $('#modalPencarian').children().first().on('transitionend MSTransitionEnd webkitTransitionEnd oTransitionEnd', function() {
                        $('#modalPencarian').children().first().addClass('hidden')
                    });
                    setTimeout(function() {
                        $('#modalPencarian').remove()
                    }, 200);
                }
                
            }
        })

        setTimeout(() => {
            $('#modalPencarian').children().first().addClass('opacity-0 scale-0')
            $('#modalPencarian').children().first().on('transitionend MSTransitionEnd webkitTransitionEnd oTransitionEnd', function() {
                $('#modalPencarian').children().first().addClass('hidden')
            });
            setTimeout(function() {
                $('#modalPencarian').remove()
            }, 200);
        }, 1200);
        return;
    }
        
    // if (!strFound) alert("String '" + str + "' tidak ditemukan!")
    //     return;
};

document.getElementById('f1').onsubmit = function() {
    findString(this.search.value);
    return false;
};
// js layoutDokumentasi - Search Features