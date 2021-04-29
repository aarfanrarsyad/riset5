<script>
    function status_update(id, name, status) {
        let name_status = "direview";
        if (status == 1) {
            name_status = "diterima";
        } else if (status == 2) {
            name_status = "ditolak";
        }

        Swal.fire({
            icon: 'question',
            text: 'Anda yakin ingin mengubah status request aplikasi "' + name + '" menjadi "' + name_status + '"?',
            showCancelButton: true,
            confirmButtonColor: '#4248ED',
            cancelButtonColor: '#33A1C4',
            confirmButtonText: 'Ya, Lanjutkan!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?= base_url('/admin/request-api/update') ?>',
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        id: id,
                        status: status
                    },
                    success: function(result) {
                        if (result === true) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: 'Status request aplikasi ' + name + ' berhasil diperbarui',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(function() {
                                window.location = "<?= base_url('admin/request-api') ?>";
                            })
                        } else {
                            Swal.fire({
                                icon: 'info',
                                title: 'Terjadi Kesalahan',
                                text: 'Status request aplikasi ' + name + ' gagal diperbarui',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }
                    }
                });
            }
        })
    }

    function getSelectedScope(id) {
        $.ajax({
            url: '<?= base_url('/admin/request-api/selected-scope') ?>',
            method: 'POST',
            dataType: 'json',
            data: {
                id: id,
            },
            success: function(result) {
                $(".form-scope-check").each(function() {
                    $(this).removeAttr('checked')
                });

                if (result !== false) {
                    for (let i = 0; i < result.length; i++) {
                        $('#scope' + result[i].id).attr('checked', 'checked');
                    }
                }
                $('#scope-app').modal('show');
            }
        });
    }

    function add_scope(event) {
        $('.modal-title').html('<i class="fas fa-qrcode"></i>&ensp;Tambah Scope Baru');
        $('#id').val('');
        $('#scope').val('');
        $('#detail_scope').val('');
        $('#form-input-scope').attr('action', '<?= base_url('admin/request-api/create-scope') ?>')
        $('#token-modal').modal('show');
    }

    function update_scope(id, scope, scope_detail) {
        $('.modal-title').html('<i class="fas fa-qrcode"></i>&ensp;Update Scope');
        $('#id').val(id);
        $('#scope').val(scope);
        $('#detail_scope').val(scope_detail);
        $('#form-input-scope').attr('action', '<?= base_url('admin/request-api/update-scope') ?>');
        $('#token-modal').modal('show');
    }

    function delete_scope(id) {
        Swal.fire({
            icon: 'question',
            text: 'Anda yakin ingin menghapus data scope?',
            showCancelButton: true,
            confirmButtonColor: '#4248ED',
            cancelButtonColor: '#33A1C4',
            confirmButtonText: 'Ya, Lanjutkan!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?= base_url('/admin/request-api/delete-scope') ?>',
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        id: id,
                    },
                    success: function(result) {
                        if (result === true) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: 'Data scope berhasil dihapus',
                                showConfirmButton: false,
                                timer: 2000
                            }).then(function() {
                                window.location = "<?= base_url('admin/request-api') ?>";
                            })
                        } else {
                            Swal.fire({
                                icon: 'info',
                                title: 'Terjadi Kesalahan',
                                text: 'Data scope gagal dihapus',
                                showConfirmButton: false,
                                timer: 2000
                            })
                        }
                    }
                });
            }
        })
    }
</script>