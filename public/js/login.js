function loginSipadu() {
    var win = window.open(`https://alumni.stis.ac.id/auth/sipadu`, "_blank", "height=700,width=550,status=no,titlebar=no,menubar=no,top=10,left=300", true);
    var timer = setInterval(function () {
        if (win.closed) {
            clearInterval(timer);
            if (document.cookie.includes('login=yes') || document.cookie.includes('login=failed'))
                location.reload();
        }
    }, 1000);
}

function loginBPS() {
    var win = window.open(`https://alumni.stis.ac.id/auth/bps`, "_blank", "height=700,width=900,status=no,titlebar=no,menubar=no,top=10,left=300", true);
    var timer = setInterval(function () {
        if (win.closed) {
            clearInterval(timer);            
            if (document.cookie.includes('login=yes') || document.cookie.includes('login=failed'))
                location.reload();
        }
    }, 1000);
}

$(".input").each(function () {
    $(".input").focus(function () {
        $(this).addClass('border-primary').removeClass('border-gray-400')
        $(this).css("border-width", "2px")
    })
    $(".input").blur(function () {
        $(this).addClass('border-gray-400').removeClass('border-primary')
        $(this).css("border-width", "2px")
    })
});

$(".input-sandi").focus(function () {
    $("#eye").removeClass('text-gray-400').addClass('text-primary')
})
$(".input-sandi").blur(function () {
    $("#eye").removeClass('text-primary').addClass('text-gray-400')
})

var arg = true
$("#eye").click(function () {
    if (!arg) {
        $('#eye').html(`
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="cursor-pointer sm:w-5 w-4 absolute">
        <path fill-rule="evenodd" d="M3.707 2.293a1 1 0 00-1.414 1.414l14 14a1 1 0 001.414-1.414l-1.473-1.473A10.014 10.014 0 0019.542 10C18.268 5.943 14.478 3 10 3a9.958 9.958 0 00-4.512 1.074l-1.78-1.781zm4.261 4.26l1.514 1.515a2.003 2.003 0 012.45 2.45l1.514 1.514a4 4 0 00-5.478-5.478z" clip-rule="evenodd" />
        <path d="M12.454 16.697L9.75 13.992a4 4 0 01-3.742-3.741L2.335 6.578A9.98 9.98 0 00.458 10c1.274 4.057 5.065 7 9.542 7 .847 0 1.669-.105 2.454-.303z" />
        </svg>
        `)
        $('#password').attr('type', 'password')
        arg = true
    } else {
        $('#eye').html(`
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="cursor-pointer sm:w-5 w-4 absolute">
        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
        <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
        </svg>        
        `)
        $('#password').attr('type', 'text')
        arg = false
    }
})

$(".sso").each(function () {
    $(".sso").hover(function () {
        $(this).children().last().addClass('text-yellow-600').removeClass('text-secondary')
    }, function () {
        $(this).children().last().addClass('text-secondary').removeClass('text-yellow-600')
    });
});


if ($(window).width() <= 1024) {
    $('form').attr('data-aos', 'zoom-in')
}