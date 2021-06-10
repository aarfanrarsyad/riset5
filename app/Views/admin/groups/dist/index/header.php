<script>
    function edit_group(id, name, desc) {
        $('#form-input-group').attr('action', '<?= base_url('/admin/groups/update') ?>');
        $('#id').val(id);
        $('.modal-title').html('<div class="text-primaryHover"><i class="fas fa-layer-group"></i>&ensp;Update group ' + name + '</div>');
        $('#name').val(name);
        $('#description').val(desc);
        $('.modal').modal('show')
    }

    function insert_group() {
        $('#form-input-group').attr('action', '<?= base_url('/admin/groups/insert') ?>');
        $('.modal-title').html('<div class="text-primaryHover"><i class="fas fa-layer-group"></i>&ensp;Insert new group</div>').addClass('text-primaryHover');
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
            confirmButtonColor: '#54AC00',
            cancelButtonColor: '#D81B01',
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