<script>
    $(document).ready(function() {
        //edtor summernote
        $('#summernote').summernote({
            height: 200,
            callbacks: {
                onMediaDelete: function(target) {
                    let path = target[0].src;
                    $.ajax({
                        url: "<?= base_url('setting-aplikasi/berita/delete-file') ?>",
                        type: "POST",
                        data: {
                            path: path
                        },
                        cache: false,
                        success: function(result) {
                            if (!result) {
                                alert('Image failed to delete')
                            }
                        }
                    });
                },
                onImageUpload: function(files) {
                    let data = new FormData();

                    data.append("file", files[0]);
                    $.ajax({
                        url: "<?= base_url('setting-aplikasi/berita/upload-file') ?>",
                        data: data,
                        type: "POST",
                        cache: false,
                        contentType: false,
                        processData: false,
                        dataType: "json",
                        success: function(url) { //data is the returned hash, key, etc., key is the defined file name
                            $('#summernote').summernote('insertImage', url);
                        },
                        error: function(data) {
                            alert("Upload failed");
                        }
                    });
                }

            }

        });

        // // Summernote
        // $('#summernote').summernote()

        // // CodeMirror
        // CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
        //     mode: "htmlmixed",
        //     theme: "monokai"
        // });
    })
</script>