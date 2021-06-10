<script>
    function delete_user(id, name) {
        Swal.fire({
            icon: 'question',
            text: 'Are you sure to delete user ' + name + '?',
            showCancelButton: true,
            confirmButtonColor: '#54AC00',
            cancelButtonColor: '#D81B01',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?= base_url('/admin/users/delete') ?>',
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
                                text: name + ' data has been successfully deleted.',
                                showConfirmButton: false,
                                timer: 2500
                            }).then(function() {
                                window.location = "<?= base_url('admin/users') ?>";
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

    function change_active_status(event) {
        let id = $(event.target).data('id');
        let name = $(event.target).data('user');
        let is_active = $(event.target).data('active');

        let active = '';
        if (is_active == 1) {
            active = 'activate';
        } else {
            active = 'disable';
        }

        Swal.fire({
            icon: 'question',
            text: 'Are you sure to ' + active + ' ' + name + ' user ?',
            showCancelButton: true,
            confirmButtonColor: '#54AC00',
            cancelButtonColor: '#D81B01',
            confirmButtonText: 'Yes, do it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?= base_url('admin/users/active-status') ?>',
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        id: id,
                        active: is_active
                    },
                    success: function(result) {
                        console.log(result)
                        if (result === true) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: name + ' data has been ' + active + 'd successfully.',
                                showConfirmButton: false,
                                timer: 2500
                            }).then(function() {
                                window.location = "<?= base_url('admin/users') ?>";
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