<script>
    function edit_menu(id, menu, icon) {
        $('#form-input-group').attr('action', '<?= base_url('/admin/resources/menu/update') ?>');
        $('#id').val(id);
        $('.modal-title').html('<i class="fas fa-chevron-circle-down text-secondary"></i>&ensp;Update menu ' + name);
        $('#menu').val(menu);
        $('#icon').val(icon);
        $('#btn-submit').attr('name', 'update_menu');
        $('.modal').modal('show')
    }

    function insert_menu() {
        $('#form-input-group').attr('action', '<?= base_url('/admin/resources/menu/insert') ?>');
        $('.modal-title').html('<i class="fas fa-chevron-circle-down text-secondary"></i>&ensp;Insert new menu');
        $('#id').val('');
        $('#menu').val('');
        $('#icon').val('');
        $('#btn-submit').attr('name', 'insert_menu');
        $('.modal').modal('show')
    }

    function delete_menu(id, menu) {
        Swal.fire({
            icon: 'question',
            text: 'Are you sure to delete the ' + menu + ' menu?',
            showCancelButton: true,
            confirmButtonColor: '#54AC00',
            cancelButtonColor: '#D81B01',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?= base_url('/admin/resources/menu/delete') ?>',
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        id: id
                    },
                    success: function(result) {
                        if (result === true) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: 'The ' + menu + ' menu deleted successfully',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(function() {
                                window.location = "<?= base_url('/admin/resources') ?>";
                            })
                        } else {
                            if (result !== false) {
                                let html = '<div class="alert alert-danger text-sm"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                                    '<span style="font-weight:bold">Something went wrong !</span>&ensp;' +
                                    'The ' + menu + ' menu is currently being used by resource ' + result +
                                    '</div>';
                                $('.response').append(html);
                            }

                            Swal.fire({
                                icon: 'info',
                                title: 'Oops',
                                text: 'Something went wrong',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }
                    }
                });
            }
        })
    }

    function delete_resource(id, resource) {
        Swal.fire({
            icon: 'question',
            text: 'Are you sure to delete the ' + resource + ' resource?',
            showCancelButton: true,
            confirmButtonColor: '#54AC00',
            cancelButtonColor: '#D81B01',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?= base_url('/admin/resources/delete') ?>',
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        id: id
                    },
                    success: function(result) {
                        if (result === true) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: 'The ' + resource + ' menu deleted successfully',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(function() {
                                window.location = "<?= base_url('admin/resources') ?>";
                            })
                        } else {
                            Swal.fire({
                                icon: 'info',
                                title: 'Oops',
                                text: 'Something went wrong',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }
                    }
                });
            }
        })
    }
</script>