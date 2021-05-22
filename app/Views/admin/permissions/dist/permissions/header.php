<script>
    function role_access(event) {
        event.preventDefault();
        let text_alert = '';
        let text_button = '';
        let status = false;

        let group = $(event.target).data('group');
        let resource_access = $(event.target).data('access');
        let name_group = $(event.target).data('namegroup');
        let name_resource = $(event.target).data('resource');
        let name_crud = $(event.target).data('namecrud');

        if ($(event.target).is(':checked') === false) {
            text_alert = 'Are you sure you want to remove ' + name_crud + ' access for the ' + name_group + ' role in the ' + name_resource + ' resource';
            text_button = 'Yes, delete it!';
        } else {
            status = true;
            text_alert = 'Are you sure you want to add ' + name_crud + ' access to the ' + name_group + ' role in the ' + name_resource + ' resource';
            text_button = 'Yes, add it!';
        }

        Swal.fire({
            icon: 'question',
            text: text_alert,
            showCancelButton: true,
            confirmButtonColor: '#54AC00',
            cancelButtonColor: '#D81B01',
            confirmButtonText: text_button
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?= base_url('/admin/permissions/insert') ?>',
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        group: group,
                        access: resource_access
                    },
                    success: function(result) {
                        if (result[0] === 'delete') {
                            if (result[1] === true) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Successfully',
                                    text: 'Successfully removed ' + name_crud + ' access for ' + name_group + ' role in ' + name_resource + ' resource.',
                                    showConfirmButton: false,
                                    timer: 3000
                                }).then(function() {
                                    $(event.target).prop('checked', status)
                                })
                            } else {
                                Swal.fire({
                                    icon: 'info',
                                    title: 'Failed',
                                    text: 'Failed to remove ' + name_crud + ' access for ' + name_group + ' role in ' + name_resource + ' resource.',
                                    showConfirmButton: false,
                                    timer: 3000
                                })
                            }
                        } else {
                            if (result[1] === true) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Successfully',
                                    text: 'Successfully added ' + name_crud + ' access to ' + name_group + ' role in ' + name_resource + ' resource.',
                                    showConfirmButton: false,
                                    timer: 3000
                                }).then(function() {
                                    $(event.target).prop('checked', status)
                                })
                            } else {
                                Swal.fire({
                                    icon: 'info',
                                    title: 'Failed',
                                    text: 'Failed to add ' + name_crud + ' access to ' + name_group + ' role in ' + name_resource + ' resource.',
                                    showConfirmButton: false,
                                    timer: 3000
                                })
                            }
                        }
                    }
                });
            }
        })
    }
</script>