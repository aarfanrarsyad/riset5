// awal sidebar

$('.boxFilter').click(function(){
    $('.param1, .param2').toggleClass('hidden md:block md:hidden');
    $('.sidebarSearch').toggleClass('w-10/12 md:w-auto');
    $('#cariBerita, #cariAlumni').toggleClass('md:ml-60 md:ml-6');
})

const filterSidebar = document.querySelectorAll(".filterSidebar");

filterSidebar.forEach(o => {
    o.addEventListener("click", () => {
        filterSidebar.forEach(p => {
            p.classList.remove('text-secondary');
            if(!p.classList.contains('text-white')){
                p.classList.add('text-white');
            }
        });
        o.classList.remove('text-white');
        o.classList.add('text-secondary');
        getList(o.innerHTML);
    })
})

const listSidebar = document.querySelectorAll(".listSidebar");

listSidebar.forEach(o => {
    o.addEventListener("click", () => {
        a = o.firstElementChild.innerHTML;
        o.children[1].classList.toggle("hidden");
        o.children[2].classList.toggle("hidden");
        getList(a);
    })
})

const namaProdi = document.querySelectorAll(".namaProdi");
namaProdi.forEach(o => {
    o.addEventListener("click", () => {
        o.children[1].classList.toggle("hidden");
        o.children[2].classList.toggle("hidden");
        if(o.children[3].checked == false){
            o.children[3].checked = true;
        } else {
            o.children[3].checked = false;
        };
    })
})



function toggleTempatKerja() {
    $('.inputKerja').toggleClass('text-gray-300');
    $('.inputKerja').toggleClass('text-primary');
}

$(".inputKerja input").focus(function() {
        toggleTempatKerja();
});

$('.inputKerja svg').click(function(){
    $('.inputKerja input').val('');
})

function getList(param){
    
    if(param == 'Semua'){
        $('.listFilterSidebarAlumni').addClass('hidden');
        $('.listFilterSidebarBerita').addClass('hidden');
    }

    if(param == 'Alumni'){
        $('.listFilterSidebarAlumni').removeClass('hidden');
        $('.listFilterSidebarBerita').addClass('hidden');
    }
    
    if(param == 'Artikel/Berita'){
        $('.listFilterSidebarBerita').removeClass('hidden');
        $('.listFilterSidebarAlumni').addClass('hidden');
    }

    if(param == 'Prodi'){
        $('.listProdi').toggleClass('hidden');
    } 

    if(param == 'Angkatan'){
        $('.listAngkatan').toggleClass('hidden');
    } 
    
    if(param == 'Tempat Kerja'){
        $('.listTempatKerja').toggleClass('hidden');
    } 

    if(param == 'Rentang Waktu'){
        $('.listRentangWaktu').toggleClass('hidden');
    } 

    
}

// awal input angkatan
$('.listAngkatan div svg').click(function(){
    $('.listAngkatan div input').val('');
})
// akhir input angkatan




var typingTimer;                
var doneTypingInterval = 1000;
var waktu = new Date();
var tahunfix = waktu.getFullYear();
var tahunAwal = tahunfix;
var tahunAkhir = tahunfix;
var tahunPertamaBerita = 2010;

// akhir input tahun awal berita
$('.inputTahunAwal svg').click(function(){
    $('.inputTahunAwal input').val('');
    getWaktuKalenderAwal(tahunfix);
});

$('.inputTahunAwal input').keyup(function(){
    clearTimeout(typingTimer);
    if ($('.inputTahunAwal input').val()) {
        typingTimer = setTimeout(selesaiInputTahunAwal, doneTypingInterval);
    }
    
});

function selesaiInputTahunAwal(){
    if(parseInt($('.inputTahunAwal input').val()) <= tahunfix && parseInt($('.inputTahunAwal input').val()) >= tahunPertamaBerita){
        if (parseInt($('.inputTahunAwal input').val()) > parseInt($('.inputTahunAkhir input').val())){
            $('.inputTahunAwal input').addClass('border-2');
            $('.inputTahunAwal input').addClass('border-red-600');
        } else {
            $('.inputTahunAwal input').removeClass('border-2');
            $('.inputTahunAwal input').removeClass('border-red-600');
            getWaktuKalenderAwal(parseInt($('.inputTahunAwal input').val()));
        };
    } else {
            getWaktuKalenderAwal(tahunPertamaBerita);
            $('.inputTahunAwal input').val(tahunPertamaBerita);
    };

}
// Awal tempat tahun awal berita

// akhir input tahun akhir berita
$('.inputTahunAkhir svg').click(function(){
    $('.inputTahunAkhir input').val('');
    getWaktuKalenderAwal(tahunfix);
});

$('.inputTahunAkhir input').keyup(function(){
    clearTimeout(typingTimer);
    if ($('.inputTahunAkhir input').val()) {
        typingTimer = setTimeout(selesaiInputTahunAkhir, doneTypingInterval);
    }
    
});

function selesaiInputTahunAkhir(){
    if(parseInt($('.inputTahunAkhir input').val()) <= tahunfix && parseInt($('.inputTahunAkhir input').val()) >= tahunPertamaBerita ){
        if (parseInt($('.inputTahunAwal input').val()) > parseInt($('.inputTahunAkhir input').val())){
            $('.inputTahunAkhir input').addClass('border-2');
            $('.inputTahunAkhir input').addClass('border-red-600');
        } else {
            $('.inputTahunAkhir input').removeClass('border-2');
            $('.inputTahunAkhir input').removeClass('border-red-600');
            getWaktuKalenderAkhir(parseInt($('.inputTahunAkhir input').val()));
        };
    } else {
            getWaktuKalenderAkhir(tahunfix);
            $('.inputTahunAkhir input').val(tahunfix);
    };


}
// Awal input tempat akhir berita



// Awal kalender Tahun Awal
$('.inputTahunAwal input').focus(function(){
    $('.kalenderAwal').removeClass('hidden');
    $('.kalenderAkhir').addClass('hidden');
})	

const tahunKalenderAwal = document.querySelectorAll(".tahunKalenderAwal");
const inputTahunAwal = document.querySelector(".inputTahunAwal input");
const rentangTahunAwal = document.querySelector(".rentangTahunAwal");

function getWaktuKalenderAwal(param){
    tahunAwal = param;
    var input = param;
    var bantu = tahunfix;

    do {
        bantu = bantu - 12; 
    } while (bantu >= param);

    var param = bantu + 1;
    rentangTahunAwal.innerHTML = param+"-"+ (param + 11);
    tahunKalenderAwal.forEach(o =>{

        o.innerHTML = param;
        param++;

    })

};

getWaktuKalenderAwal(tahunfix)

$('.perviousTahunAwal').click(function(){
    if(tahunAkhir - 12 >= tahunPertamaBerita){
        tahunAwal = tahunAwal - 12;
        getWaktuKalenderAwal(tahunAwal);
    }
})	

$('.nextTahunAwal').click(function(){
    if(tahunAwal + 12 <= tahunfix){
        tahunAwal = tahunAwal + 12;	
        getWaktuKalenderAwal(tahunAwal);
    }	    
})

tahunKalenderAwal.forEach(o => {
    o.addEventListener("click", () => {
        param = o.innerHTML;
        if(inputTahunAkhir.value != ""){
            if(param < inputTahunAkhir.value ){
                inputTahunAwal.value=param;
                inputTahunAwal.classList.remove('border-2');
                inputTahunAwal.classList.remove('border-red-600');
            } else {
                inputTahunAwal.classList.add('border-2');
                inputTahunAwal.classList.add('border-red-600');
            }
        } else {
            inputTahunAwal.value=param;
            inputTahunAwal.classList.remove('border-2');
            inputTahunAwal.classList.remove('border-red-600');
        }
    })
})
//Akhir Kalender Tahun Awal


// Awal Kalender Tahun Akhir
$('.inputTahunAkhir input').focus(function(){
    $('.kalenderAwal').addClass('hidden');
    $('.kalenderAkhir').removeClass('hidden');
})	

const tahunKalenderAkhir = document.querySelectorAll(".tahunKalenderAkhir");
const inputTahunAkhir = document.querySelector(".inputTahunAkhir input");
const rentangTahunAkhir = document.querySelector(".rentangTahunAkhir");

function getWaktuKalenderAkhir(param){
    tahunAkhir = param;
    var input = param;
    var bantu = tahunfix;
    do {
        bantu = bantu - 12; 
    } while (bantu >= param);

    var param = bantu + 1;
    rentangTahunAkhir.innerHTML = param+"-"+ (param + 11);
    tahunKalenderAkhir.forEach(o =>{
        o.innerHTML = param;
        param++;

    })
};

getWaktuKalenderAkhir(tahunfix)

$('.perviousTahunAkhir').click(function(){
    if(tahunAkhir - 12 >= tahunPertamaBerita){
        tahunAkhir = tahunAkhir - 12;
        getWaktuKalenderAkhir(tahunAkhir);
    }
})	

$('.nextTahunAkhir').click(function(){
    if(tahunAkhir + 12 <= tahunfix){
        tahunAkhir = tahunAkhir + 12;	
        getWaktuKalenderAkhir(tahunAkhir);
    }	    
})

tahunKalenderAkhir.forEach(o => {
    o.addEventListener("click", () => {
        param = o.innerHTML;
        if(inputTahunAwal.value != ""){
            if(param > inputTahunAwal.value ){
                inputTahunAkhir.value=param;
                inputTahunAkhir.classList.remove('border-2');
                inputTahunAkhir.classList.remove('border-red-600');
            } else {
                inputTahunAkhir.classList.add('border-2');
                inputTahunAkhir.classList.add('border-red-600');
            }
        } else {
            inputTahunAkhir.value=param;
            inputTahunAkhir.classList.remove('border-2');
            inputTahunAkhir.classList.remove('border-red-600');
        }
    })
})
//Akhir Kalender Tahun AKhir



// Akhir Kaleneder

// akhir sidebar
