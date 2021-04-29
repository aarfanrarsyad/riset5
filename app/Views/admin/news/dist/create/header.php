<script>
    function uploadFile(file) {
        data = new FormData();
        data.append("file", file);

        $.ajax({
            data: data,
            type: "POST",
            url: "<?php echo base_url(); ?>summer/saveGambar",
            cache: false,
            contentType: false,
            processData: false,
            success: function(url) {
                console.log(url);
                $('#editordata').summernote("insertImage", url);
            }
        });
    }

    function hide_access() {
        $('.content-groups').addClass('d-none');
    }

    function show_access() {
        $('.content-groups').removeClass('d-none');
    }

    function show_content(ele1, ele2) {
        $('.' + ele1).removeClass('d-none');
        $('.' + ele1 + ' .form-control').attr('required', 'required');
        $('.' + ele2).addClass('d-none');
        $('.' + ele2 + ' .form-control').removeAttr('required');
    }
</script>