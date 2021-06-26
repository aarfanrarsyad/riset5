function map(dataProv, dataKabKota){
// awal js buat map
var mapProvinsi = L.map('mapProvinsi', {
    center: [-2.5, 118],
    zoom: 5,
    maxZoom: 8,
    minZoom: 4,
    scrollWheelZoom: false
});

var mapKabupaten = L.map('mapKabupaten', {
    center: [-2.5, 118],
    zoom: 5,
    maxZoom: 8,
    minZoom: 4,
    scrollWheelZoom: false
});

var myStyle = {
    "color": "#014F86",
    "fillColor": "#FFFFFF",
    "weight": 2,
    "opacity": 1,
    "fillOpacity": 1
};


var jsonTest = new L.GeoJSON.AJAX(["/geojson/provinsi.geojson"], {
    onEachFeature: popUpProvinsi,
    style: myStyle
}).addTo(mapProvinsi);

function popUpProvinsi(f, l) {
    var out = [];
    if (f.properties) {
        out.push("<div class='md:text-base text-xs text-primary font-semibold text-center uppercase font-heading'> " + f.properties["NAME_1"] +"</div> <hr class='my-2'>");
        out.push("<div class='font-bold text-center md:text-base text-xs text-primary uppercase font-paragraph'>" + (dataProv[f.properties["NAME_1"]] ? dataProv[f.properties["NAME_1"]] : "0") + "</div>");
        out.push("<div class='text-center md:text-base text-xs font-semibold text-primary font-paragraph'> Alumni</div>");
        l.bindPopup(out.join(""));
    }

    l.on({
        mouseover: function (e) {
            e.target.setStyle({
                color: "#FFAA00",
                fillColor: "#FFFFFF",
                weight: 2,
                opacity: 1,
                fillOpacity: 1
            });
        },
        mouseout: function (e) {
            e.target.setStyle({
                color: "#014F86",
                fillColor: "#FFFFFF",
                weight: 2,
                opacity: 1,
                fillOpacity: 1
            });
        },
        click: function (e) {
            e.target.setStyle({
                color: "#FFAA00",
                fillColor: "#FFFFFF",
                weight: 2,
                opacity: 1,
                fillOpacity: 1
            });
        }
    });
}

var jsonTest = new L.GeoJSON.AJAX(["/geojson/kabupaten.geojson"], {
    onEachFeature: popUpKabupaten,
    style: myStyle
}).addTo(mapKabupaten);

function popUpKabupaten(f, l) {
    var out = [];
    if (f.properties) {
        out.push("<div class='md:text-base text-xs text-primary font-semibold text-center uppercase font-heading'> " + f.properties["TYPE_2"] + " " + f.properties["NAME_2"] + "</div> <hr class='my-2'>");
        out.push("<div class='font-bold text-center md:text-base text-xs text-primary uppercase font-paragraph'>" + (dataKabKota[f.properties["TYPE_2"] + " " + f.properties["NAME_2"]] ? dataKabKota[f.properties["TYPE_2"] + " " + f.properties["NAME_2"]] : "0") + "</div>");
        out.push("<div class='text-center md:text-base text-xs font-semibold text-primary font-paragraph'> Alumni</div>");
        l.bindPopup(out.join(""));
    }

    l.on({
        mouseover: function (e) {
            e.target.setStyle({
                color: "#FFAA00",
                fillColor: "#FFFFFF",
                weight: 2,
                opacity: 1,
                fillOpacity: 1
            });
        },
        mouseout: function (e) {
            e.target.setStyle({
                color: "#014F86",
                fillColor: "#FFFFFF",
                weight: 2,
                opacity: 1,
                fillOpacity: 1
            });
        },
        click: function (e) {
            e.target.setStyle({
                color: "#FFAA00",
                fillColor: "#FFFFFF",
                weight: 2,
                opacity: 1,
                fillOpacity: 1
            });
        }
    });
}

$('.zoomResetPeta').click(function () {
    mapProvinsi.setView([-2.5, 118], 5);
    mapKabupaten.setView([-2.5, 118], 5);
});



$('.filterPeta').click(function () {
    klikFilterPeta();
});


function klikFilterPeta() {
    $('.downFilterPeta').toggleClass('hidden');
    $('.upFilterPeta').toggleClass('hidden');
    $('.listFilterPeta').toggleClass('hidden');
};


$('.petaProvinsi').click(function () {


    $('.hasilFilterPeta').text('Provinsi');

    $('#mapProvinsi').removeClass('invisible');
    $('#mapKabupaten').addClass('invisible');
    mapKabupaten.setView([-2.5, 118], 5);
    mapKabupaten.closePopup();
});

$('.petaKabupaten').click(function () {
    $('.hasilFilterPeta').text('Kabupaten');

    $('#mapProvinsi').addClass('invisible');
    $('#mapKabupaten').removeClass('invisible');
    mapProvinsi.setView([-2.5, 118], 5);
    mapProvinsi.closePopup();
});
}
// akhir js buat map

// awal info map 
$('.tombolInfo').click(function () {
    $('.info').toggleClass('hidden');
});

$('.tombolInfo').mouseover(function () {
    $('.info').removeClass('hidden');
});

$('.tombolInfo').mouseout(function () {
    $('.info').addClass('hidden');
});
// akhir info map 

//awal animasi angka alumni
function animasiAngka(obj, start, end, duration) {
    let startTimestamp = null
    const step = (timestamp) => {
        if (!startTimestamp) startTimestamp = timestamp
        const progress = Math.min((timestamp - startTimestamp) / duration, 1)
        obj.innerHTML = Math.floor(progress * (end - start) + start)
        if (progress < 1) {
            window.requestAnimationFrame(step)
        }
    };
    window.requestAnimationFrame(step)
}
let state = true

$(window).scroll(function () {
    if (state) {
        if (window.scrollY + $(window).height() >= $('.angka').parent().parent().offset().top) {
            state = false
            $('.angka').each(function (i, el) {
                animasiAngka(el, 0, el.textContent, 1500)
            });
        }
    }
})

//akhir animasi angka alumni