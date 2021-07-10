// awal sidebar

$('.boxFilter').click(function () {
    $('.param1, .param2').toggleClass('hidden md:block md:hidden');
    $('.sidebarSearch').toggleClass('sm:w-1/2 w-5/6 md:w-16');
    $('.sidebarSearch').next().toggleClass('md:ml-72 md:ml-20');
})

const filterSidebar = document.querySelectorAll(".filterSidebar");

filterSidebar.forEach(o => {
    o.addEventListener("click", () => {
        filterSidebar.forEach(p => {
            p.classList.remove('text-secondary');
            if (!p.classList.contains('text-white')) {
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
        if (o.children[3].checked == false) {
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

$(".inputKerja input").focus(function () {
    toggleTempatKerja();
});

$('.inputKerja svg').click(function () {
    $('.inputKerja input').val('');
})

function getList(param) {

    if (param == 'Semua') {
        $('.listFilterSidebarAlumni').addClass('hidden');
        $('.listFilterSidebarBerita').addClass('hidden');
    }

    if (param == 'Alumni') {
        $('.listFilterSidebarAlumni').removeClass('hidden');
        $('.listFilterSidebarBerita').addClass('hidden');
    }

    if (param == 'Artikel/Berita') {
        $('.listFilterSidebarBerita').removeClass('hidden');
        $('.listFilterSidebarAlumni').addClass('hidden');
    }

    if (param == 'Prodi') {
        $('.listProdi').toggleClass('hidden');
    }

    if (param == 'Angkatan') {
        $('.listAngkatan').toggleClass('hidden');
    }

    if (param == 'Tempat Kerja') {
        $('.listTempatKerja').toggleClass('hidden');
    }

    if (param == 'Rentang Waktu') {
        $('.listRentangWaktu').toggleClass('hidden');
    }


}

// awal input angkatan
$('.listAngkatan div svg').click(function () {
    $('.listAngkatan div input').val('');
})
// akhir input angkatan


$('#awalTahun').on('change', function () {
    $('#awalHilang').remove();

});

$('#akhirTahun').on('change', function () {
    $('#akhirHilang').remove();
});




// akhir sidebar