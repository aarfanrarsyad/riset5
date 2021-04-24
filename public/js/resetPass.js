$('#resetPass').click(function (e) {
    e.preventDefault()
    $('body').prepend(`
    <div class="fixed top-0 bottom-0 right-0 left-0 z-50 flex justify-center items-center bg-black bg-opacity-40" id='modalResetPass'>
        <div class="hidden opacity-0 duration-10000 transition-all px-6 py-2 rounded-lg bg-white">
            <div class="flex items-center sm:h-10 h-8 mb-5">    
                <p class="sm:text-base text-sm text-black font-heading font-bold">Kata sandi berhasil diubah.</p>
            </div>    
            <div class="flex justify-center items-center sm:h-10 h-8 mb-2">
                <a href="/login/" class="px-6 py-1 shadow-2xl rounded-2xl text-base outline-none border-none bg-secondary cursor-pointer text-white duration-300 hover:bg-yellow-400 sm:w-max">Masuk</a>
            </div>
        </div>
    </div>
`)

$('#modalResetPass').children().first().removeClass('hidden')
    setTimeout(function () {
        $('#modalResetPass').children().first().removeClass('opacity-0')
    }, 10);
    setTimeout(function () {
        $('#formResetPassword').submit()
    }, 10000);
})