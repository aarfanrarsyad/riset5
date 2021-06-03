<script>
    function delete_gallery(event) {
        let id = $(event.target).data('id');

        $('#del').val(id);
        $('#form-delete').submit();
    }

    function change_approval(event) {
        let id = $(event.target).data('id');
        let approval = $(event.target).data('active');

        $('#id_approval').val(id);
        $('#approval').val(approval);
        $('#form-approval').submit();
    }

    function add_video(event) {
        $('.modal-title').html('<i class="fab fa-youtube"></i>&ensp;Tambah Video Baru');
        $('#id').val('');
        $('#scope').val('');
        $('#detail_scope').val('');
        $('#token-modal').modal('show');
    }

    function add_photo(event) {
        $('.modal-title').html('<i class="far fa-images"></i>&ensp;Tambah Foto Baru');
        $('#pilihFile').val('');
        $('#textPhoto').html("Tidak ada foto yang dipilih");
        $('#albumFoto').val('');
        $('#deskripsi').val('');
        var $select = $('#tags').selectize();
        var control = $select[0].selectize;
        control.clear();
        $('#token-modal').modal('show');
    }

    function view_report(event) {
        let report = $(event.target).data('report');

        report = report.split(";");
        console.log(report);
        j = 1;
        $('#reportBody').empty();
        for (let i = 0; i < report.length; i++) {
            if (report[i] != "") {
                $('#reportBody').append('\<tr\>\<td class = "text-center"\>' + j + '\<\/td\>\<td\>' + report[i] + '\<\/td\>\<\/tr\>');
                j++;
            }
        }

        $('#report-modal').modal('show');
    }
</script>