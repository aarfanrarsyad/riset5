<script>
    function edit_group(id, name, desc) {
        $('#form-input-group').attr('action', '<?= base_url('/admin/groups/update') ?>');
        $('#id').val(id);
        $('.modal-title').html('<i class="fas fa-layer-group text-secondary"></i>&ensp;Update group ' + name);
        $('#name').val(name);
        $('#description').val(desc);
        $('.modal').modal('show')
    }

    function insert_group() {
        $('#form-input-group').attr('action', '<?= base_url('/admin/groups/insert') ?>');
        $('.modal-title').html('<i class="fas fa-layer-group text-secondary"></i>&ensp;Insert new group');
        $('#id').val('');
        $('#name').val('');
        $('#description').val('');
        $('.modal').modal('show')
    }

    function delete_group(id, role) {
        Swal.fire({
            icon: 'question',
            text: 'Are you sure to delete the ' + role + ' role?',
            showCancelButton: true,
            confirmButtonColor: '#4248ED',
            cancelButtonColor: '#33A1C4',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?= base_url('/admin/groups/delete') ?>',
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
                                text: 'Group deleted successfully',
                                showConfirmButton: false,
                                timer: 2500
                            }).then(function() {
                                window.location = "<?= base_url('admin/groups') ?>";
                            })
                        } else {
                            Swal.fire({
                                icon: 'info',
                                title: 'Oops ...',
                                text: 'Something went wrong',
                                showConfirmButton: false,
                                timer: 2500
                            })
                        }
                    }
                });
            }
        })

    }
</script>