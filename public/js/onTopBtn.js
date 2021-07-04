// Ambil tombolnya
 var mybutton = document.getElementById("onTopBtn");

 // Ketika user scrolls ke bawah 100px dari puncak atas halaman, tombolnya muncul
 window.onscroll = function() {
     scrollFunction()
 };

 function scrollFunction() {
     if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
         mybutton.style.display = "block";
     } else {
         mybutton.style.display = "none";
     }
 }

 // Kalo tombolnya diklik, Langsung ke atas
 function topFunction() {
     document.body.scrollTop = 0;
     document.documentElement.scrollTop = 0;
 }

 $('#faq').click(function(){
    $('body').addClass('overflow-hidden')
    $("body").prepend(`
    <div class="fixed top-0 bottom-0 right-0 left-0 z-50 flex justify-center items-center bg-black bg-opacity-40 font-paragraph" id='formFAQ'>
        <div class="hidden scale-0 opacity-0 transform  duration-300 transition-all xl:w-1/2 lg:w-7/12 md:w-2/3 sm:w-3/4 w-11/12 bg-gray-100 bg-opacity-0">
            <div class="bg-primary py-2 px-6 rounded-t-2xl flex items-center justify-between lg:text-xl text-lg">
                <div class="flex font-heading font-bold gap-x-2">
                    <div class="bg-primaryDark p-2 rounded-2xl text-center cursor-pointer text-secondary" id="tabSK">Syarat & Ketentuan</div>
                    <div class="border-l-2 border-gray-400"></div>
                    <div class="p-2 rounded-2xl text-center cursor-pointer text-gray-400" id="tabFAQ">FAQ</div>
                </div>
                <div class="flex justify-end">
                    <svg class="closeFAQ lg:w-10 md:w-8 sm:w-7 w-6 fill-current cursor-pointer text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </div>
            </div>
            <div class="bg-gray-100 h-72 overflow-y-auto py-3 px-6 text-primary rounded-b-2xl" id="syaratketentuan">
                <p class="font-semibold font-heading text-secondary">Judul 1</p>
                <p class="text-sm my-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras blandit turpis sem, eu laoreet odio pretium ac. Mauris eget aliquet lorem. Cras dignissim leo non ante molestie, at vulputate justo lobortis. Pellentesque quam elit, mattis eu nibh et, maximus congue mauris. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras blandit turpis sem, eu laoreet odio pretium ac. Mauris eget aliquet lorem. Cras dignissim leo non ante molestie, at vulputate justo lobortis. Pellentesque quam elit, mattis eu nibh et, maximus congue mauris. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <p class="font-semibold font-heading text-secondary">Judul 2</p>
                <p class="text-sm my-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras blandit turpis sem, eu laoreet odio pretium ac. Mauris eget aliquet lorem. Cras dignissim leo non ante molestie, at vulputate justo lobortis. Pellentesque quam elit, mattis eu nibh et, maximus congue mauris. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras blandit turpis sem, eu laoreet odio pretium ac. Mauris eget aliquet lorem. Cras dignissim leo non ante molestie, at vulputate justo lobortis. Pellentesque quam elit, mattis eu nibh et, maximus congue mauris. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <p class="font-semibold font-heading text-secondary">Judul 3</p>
                <p class="text-sm my-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras blandit turpis sem, eu laoreet odio pretium ac. Mauris eget aliquet lorem. Cras dignissim leo non ante molestie, at vulputate justo lobortis. Pellentesque quam elit, mattis eu nibh et, maximus congue mauris. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras blandit turpis sem, eu laoreet odio pretium ac. Mauris eget aliquet lorem. Cras dignissim leo non ante molestie, at vulputate justo lobortis. Pellentesque quam elit, mattis eu nibh et, maximus congue mauris. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <p class="font-semibold font-heading text-secondary">Judul 4</p>
                <p class="text-sm my-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras blandit turpis sem, eu laoreet odio pretium ac. Mauris eget aliquet lorem. Cras dignissim leo non ante molestie, at vulputate justo lobortis. Pellentesque quam elit, mattis eu nibh et, maximus congue mauris. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras blandit turpis sem, eu laoreet odio pretium ac. Mauris eget aliquet lorem. Cras dignissim leo non ante molestie, at vulputate justo lobortis. Pellentesque quam elit, mattis eu nibh et, maximus congue mauris. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
            <div class="bg-gray-100 h-72 overflow-y-auto py-3 px-6 text-primary rounded-b-2xl hidden" id="frequent">
                <p class="font-semibold font-heading text-secondary">1.) Pertanyaan 1</p>
                <p class="text-sm mt-2 mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras blandit turpis sem, eu laoreet odio pretium ac. Mauris eget aliquet lorem. Cras dignissim leo non ante molestie lobortis. </p>
                <p class="font-semibold font-heading text-secondary">2.) Pertanyaan 2</p>
                <p class="text-sm mt-2 mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras blandit turpis sem, eu laoreet odio pretium ac. Mauris eget aliquet lorem. Cras dignissim leo non ante molestie lobortis. </p>
                <p class="font-semibold font-heading text-secondary">3.) Pertanyaan 3</p>
                <p class="text-sm mt-2 mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras blandit turpis sem, eu laoreet odio pretium ac. Mauris eget aliquet lorem. Cras dignissim leo non ante molestie lobortis. </p>
                <p class="font-semibold font-heading text-secondary">4.) Pertanyaan 4</p>
                <p class="text-sm mt-2 mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras blandit turpis sem, eu laoreet odio pretium ac. Mauris eget aliquet lorem. Cras dignissim leo non ante molestie lobortis. </p>
                <p class="font-semibold font-heading text-secondary">5.) Pertanyaan 5</p>
                <p class="text-sm mt-2 mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras blandit turpis sem, eu laoreet odio pretium ac. Mauris eget aliquet lorem. Cras dignissim leo non ante molestie lobortis. </p>
                <p class="font-semibold font-heading text-secondary">6.) Pertanyaan 6</p>
                <p class="text-sm mt-2 mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras blandit turpis sem, eu laoreet odio pretium ac. Mauris eget aliquet lorem. Cras dignissim leo non ante molestie lobortis. </p>
                <p class="font-semibold font-heading text-secondary">7.) Pertanyaan 7</p>
                <p class="text-sm mt-2 mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras blandit turpis sem, eu laoreet odio pretium ac. Mauris eget aliquet lorem. Cras dignissim leo non ante molestie lobortis. </p>
            </div>
        </div>
    </div>
    `);
    $('#tabSK').click(function() {
        if ($('#syaratketentuan').hasClass('hidden')) {
            $('#syaratketentuan').removeClass('hidden');
            $('#frequent').addClass('hidden');
            $('#tabFAQ').removeClass('bg-primaryDark text-secondary')
            $('#tabFAQ').addClass('text-gray-400')
            $('#tabSK').addClass('bg-primaryDark text-secondary')
            $('#tabSK').removeClass('text-gray-400')
        }
    })
    $('#tabFAQ').click(function() {
        if ($('#frequent').hasClass('hidden')) {
            $('#frequent').removeClass('hidden');
            $('#syaratketentuan').addClass('hidden');
            $('#tabSK').removeClass('bg-primaryDark text-secondary')
            $('#tabFAQ').addClass('bg-primaryDark text-secondary')
            $('#tabSK').addClass('text-gray-400')
            $('#tabFAQ').removeClass('text-gray-400')
        }
    })
    $('#formFAQ').children().first().removeClass('hidden')
    setTimeout(function () {
        $('#formFAQ').children().first().removeClass('opacity-0 scale-0')
    }, 10);

    $('.closeFAQ').click(function () {
        $('#formFAQ').children().first().addClass('opacity-0 scale-0')
        $('#formFAQ').children().first().on('transitionend MSTransitionEnd webkitTransitionEnd oTransitionEnd', function () {
            $('#formFAQ').children().first().addClass('hidden')
        });
        setTimeout(function () {
            $('#formFAQ').remove()
        }, 400);
        $('body').removeClass('overflow-hidden');
    })

    var modal = document.getElementById("formFAQ");
    $(window).click(function (e) {
        if (e.target === modal) {
            $("#formFAQ").children().first().addClass("opacity-0");
            $("#formFAQ")
                .children()
                .first()
                .on(
                    "transitionend MSTransitionEnd webkitTransitionEnd oTransitionEnd",
                    function () {
                        $("#formFAQ").children().first().addClass("hidden");
                    }
                );
            setTimeout(function () {
                $("#formFAQ").remove();
            }, 400);
            $('body').removeClass('overflow-hidden');
        }
    });
 })