$("img").ready(function () {
  var panjangGambarBerita = $(".gambarBerita").width();
  var tinggiGambarBerita = (panjangGambarBerita / 5) * 3;
  $(".gambarBerita").height(tinggiGambarBerita);
});

$(window).resize(function () {
  var panjangGambarBerita = $(".gambarBerita").width();
  var tinggiGambarBerita = (panjangGambarBerita / 4) * 3;
  $(".gambarBerita").height(tinggiGambarBerita);
});

// js unggah berita
$('#fotoSampul').change(function () {
  $(this).next().next().text(this.files[0].name)
});
$('#infoBerita').click(function () {
  if ($(this).next().hasClass('opacity-0')) {
    $(this).next().removeClass('opacity-0')
    $(this).next().removeClass('scale-0')
  } else {
    $(this).next().addClass('opacity-0')
    $(this).next().addClass('scale-0')
  }
})

// $('#formUnggahBerita').submit(function (e) {
//   e.preventDefault()
//   $('body').prepend(`
//       <div class="fixed top-0 bottom-0 right-0 left-0 z-40 flex justify-center items-center bg-black bg-opacity-40 font-paragraph" id='konfirUnggahBerita'>
//           <div class="hidden transform scale-0 opacity-0 duration-300 transition-all bg-gray bg-opacity-0">
//               <div class="mx-8 bg-white rounded-2xl flex flex-col justify-center pt-3 pb-4 sm:px-8 px-3">
//                   <p class="font-bold sm:text-lg text-base mb-6 text-justify">Apakah Anda yakin akan mempublikasikan berita ini? Pastikan berita memenuhi ketentuan yang berlaku.</p>
//                   <div class="text-white flex justify-end">
//                       <div class="buttonBatal rounded-2xl text-white hover:bg-red-700 bg-red-600 w-20 mr-2 text-sm flex justify-center items-center cursor-pointer py-1 transition-all">BATAL</div>
//                       <div class="rounded-2xl w-20 text-sm flex justify-center items-center cursor-pointer bg-success hover:bg-successHover transition-all" id='kirimBerita'>KIRIM</div>
//                   </div>
//               </div>
//           </div>
//       </div>
// `)
//   $('#konfirUnggahBerita').children().first().removeClass('hidden')
//   setTimeout(function () {
//     $('#konfirUnggahBerita').children().first().removeClass('opacity-0 scale-0')
//   }, 10);

//   $('.buttonBatal').click(function () {
//     $('#konfirUnggahBerita').children().first().addClass('opacity-0 scale-0')
//     $('#konfirUnggahBerita').children().first().on('transitionend MSTransitionEnd webkitTransitionEnd oTransitionEnd', function () {
//       $('#konfirUnggahBerita').children().first().addClass('hidden')
//     });
//     setTimeout(function () {
//       $('#konfirUnggahBerita').remove()
//     }, 400);
//   })

//   var modal = document.getElementById('konfirUnggahBerita')
//   $(window).click(function (e) {
//     if (e.target === modal) {
//       $('#konfirUnggahBerita').children().first().addClass('opacity-0 scale-0')
//       $('#konfirUnggahBerita').children().first().on('transitionend MSTransitionEnd webkitTransitionEnd oTransitionEnd', function () {
//         $('#konfirUnggahBerita').children().first().addClass('hidden')
//       });
//       setTimeout(function () {
//         $('#konfirUnggahBerita').remove()
//       }, 400);
//     }
//   })


//   $('#kirimBerita').click(function (e) {
//     $('#konfirUnggahBerita').html(`
//       <div class="hidden opacity-0 duration-700 transition-all p-3 rounded-lg flex items-center" style="background-color: #B1FF66;">
//           <img src="/img/components/icon/check.png" class="h-5 mr-2" style="color: #54AC00;" alt="konfirm unggah berita">
//           <p class="sm:text-base text-sm font-heading font-bold" style="color: #54AC00;">Berita Berhasil Dikirim</p>
//       </div>
//       `)
//     $('#konfirUnggahBerita').children().first().removeClass('hidden')
//     setTimeout(function () {
//       $('#konfirUnggahBerita').children().first().removeClass('opacity-0')
//     }, 10);
//   })
// })

$('#notif').click(function () {
  if ($(this).next().hasClass('hidden')) {
    $(this).next().removeClass('hidden')
    setTimeout(() => {
      $(this).next().removeClass('opacity-0')
      $(this).next().removeClass('scale-0')
    }, 5);
  } else {
    setTimeout(() => {
      $(this).next().addClass('hidden')
    }, 300);
    $(this).next().addClass('opacity-0')
    $(this).next().addClass('scale-0')
  }
})

function notif(idDiv) {
  if ($(idDiv).next().hasClass('hidden')) {
    $(idDiv).next().removeClass('hidden')
    setTimeout(() => {
      $(idDiv).next().removeClass('opacity-0')
      $(idDiv).next().removeClass('scale-0')
    }, 5);
  } else {
    setTimeout(() => {
      $(idDiv).next().addClass('hidden')
    }, 300);
    $(idDiv).next().addClass('opacity-0')
    $(idDiv).next().addClass('scale-0')
  }
}