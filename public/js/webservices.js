//const baseUrl = "https://alumni.stis.ac.id";
const baseUrl = "http://localhost:8080";

//Ajax Detail App
$('.proyek').each(function () {
    var appID = $(this).attr("data-id");
    var url = '/developer/editajx'; //adjust according to your site/setup
    $.post(url, {
            id: appID,
        },
        function (data, status) {
            if (status == 'success') {
                data = $.parseJSON(data);
                if (data.token == null) data.token = "-";
                $('#token_app' + appID).text(data.token);

                $('#req_date' + appID).text(data.req_date);

                if (data.req_acc == null) data.req_acc = "-";
                $('#req_acc' + appID).text(data.req_acc);

                $('#deskripsi' + appID).text(data.deskripsi);
                var tag = "";
                if (data.scope.length > 1) {
                    data.scope.map((item, index) => {
                        tag += `<li>${item.scope_dev} [${item.scope}]</li>`
                    });
                } else {
                    tag = `${data.scope[0].scope_dev} [${data.scope[0].scope}]`
                }
                $('#scope' + appID).html(tag);
            } else {
                alert('No message available');
            }
        },
    );
});

$(function () {
    var loc = window.location.href
    if ((/developer\/proyek/).test(loc)) {
        $('header').next().removeClass('my-auto')
        $('footer').addClass('mt-auto')
    }
});

$(".proyek").click(function () {
    if (!$(this).hasClass('border-primary')) {
        $(this).addClass('border-primary')
        $(this).css("border-width", "2px")

        var $this = $(this);
        $(this).next().removeClass('hidden')
        setTimeout(function () {
            $this.next().removeClass('opacity-0');
        }, 30);


        $(this).next().children().first().children().first().children().eq(1).click(function () {
            $(this).removeClass('notchoose').addClass('choosed')
            $(this).prev().removeClass('choosed').addClass('notchoose')

            $(this).parent().parent().next().next().removeClass('hidden')
            $(this).parent().parent().next().addClass('hidden')
        })

        $(this).next().children().first().children().first().children().eq(0).click(function () {
            $(this).removeClass('notchoose').addClass('choosed')
            $(this).next().removeClass('choosed').addClass('notchoose')

            $(this).parent().parent().next().next().addClass('hidden')
            $(this).parent().parent().next().removeClass('hidden')
        })

    } else {
        $(this).removeClass('border-primary')
        $(this).css("border-width", "1px")

        $(this).next().addClass('opacity-0')
        $(this).next().addClass('hidden')
    }
})

$(".delete-project").click(function () {
    var appID = $(this).attr("data-id")
    $('body').prepend(`
    <div class="fixed top-0 bottom-0 right-0 left-0 z-50 flex justify-center items-center bg-black bg-opacity-40 font-paragraph" id='proyekHapus'>
        <div class="hidden transform scale-0 opacity-0 duration-300 transition-all bg-gray bg-opacity-0">
            <div class="bg-white rounded-2xl flex flex-col justify-center pt-3 pb-4 sm:px-8 px-4 mx-4">
                <p class="font-bold sm:text-lg text-base mb-6 text-justify">Apakah Anda yakin ingin menghapus proyek ini?</p>
                <div class="text-white flex justify-end">
                    <div class="buttonBatal bg-success hover:bg-successHover transition-all text-white rounded-2xl w-20 mr-2 text-sm flex justify-center items-center cursor-pointer py-1 transition-all">BATAL</div>
                    <div class="buttonAcc bg-danger hover:bg-dangerHover transition-all text-white rounded-2xl w-20 mr-2 text-sm flex justify-center items-center cursor-pointer py-1 transition-all">HAPUS</div>
                </div>
            </div>
        </div>
    </div>
    `)

    $('#proyekHapus').children().first().removeClass('hidden')
    setTimeout(function () {
        $('#proyekHapus').children().first().removeClass('opacity-0 scale-0')
    }, 10);
    $('.buttonBatal').click(function () {
        $('#proyekHapus').children().first().addClass('opacity-0 scale-0')
        $('#proyekHapus').children().first().on('transitionend MSTransitionEnd webkitTransitionEnd oTransitionEnd', function () {
            $('#proyekHapus').children().first().addClass('hidden')
        });
        setTimeout(function () {
            $('#proyekHapus').remove()
        }, 400);
    })
    var modal = document.getElementById('proyekHapus')
    $(window).click(function (e) {
        if (e.target === modal) {
            $('#proyekHapus').children().first().addClass('opacity-0 scale-0')
            $('#proyekHapus').children().first().on('transitionend MSTransitionEnd webkitTransitionEnd oTransitionEnd', function () {
                $('#proyekHapus').children().first().addClass('hidden')
            });
            setTimeout(function () {
                $('#proyekHapus').remove()
            }, 400);
        }
    })

    $('.buttonAcc').click(function () {
        $.post(baseUrl + '/developer/delete', {
            id_app: appID
        }, function () {
            var url = baseUrl + '/developer/proyek';
            window.location = url;
        });
    })
})

let mainNavLinks = document.querySelectorAll("#menuDok a");
let mainSections = document.querySelectorAll("section");
$(window).scroll(function () {
    let fromTop = window.scrollY;
    mainNavLinks.forEach(link => {
        let section = document.querySelector(`${link.hash}`);
        if (section !== null) {
            if (section.offsetTop <= fromTop && section.offsetTop + section.offsetHeight > fromTop) {
                link.children[0].classList.add("bg-primaryDark");
            } else {
                link.children[0].classList.remove("bg-primaryDark");
            }
        }
    });
});