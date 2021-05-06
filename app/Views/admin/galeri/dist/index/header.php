<script>
    function delete_video(event) {
        let id = $(event.target).data('id');

        $('#del_video').val(id);
        $('#form-delete').submit();
    }

    function change_approval(event) {
        let id = $(event.target).data('id');
        let approval = $(event.target).data('active');

        $('#id_video').val(id);
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
</script>