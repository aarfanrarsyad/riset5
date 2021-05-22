<script>
    function check_access(event) {
        event.preventDefault();
        let text_alert = '';
        let text_button = '';
        let prop = false;

        let resource = $(event.target).data('resource');
        let access = $(event.target).data('access');
        let name_resource = $(event.target).data('nameresource');
        let name_access = $(event.target).data('nameaccess');

        if ($(event.target).is(':checked') === false) {
            text_alert = 'Are you sure to remove ' + name_access + ' access to the ' + name_resource + ' resource?';
            text_button = 'Yes, delete it!';
        } else {
            text_alert = 'Are you sure to add ' + name_access + ' access to the ' + name_resource + ' resource?';
            text_button = 'Yes, add it!';
            prop = true;
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
                    url: '<?= base_url('/admin/access/insert') ?>',
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        resource: resource,
                        access: access
                    },
                    success: function(result) {
                        if (result[0] === 'delete') {
                            if (result[1] === true) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Successfully',
                                    text: 'Successfully removed ' + name_access + ' access to ' + name_resource + ' resource',
                                    showConfirmButton: false,
                                    timer: 1500
                                }).then(function() {
                                    $(event.target).prop('checked', prop)
                                })
                            } else {
                                Swal.fire({
                                    icon: 'info',
                                    title: 'Failed',
                                    text: 'Failed to remove ' + name_access + ' access to ' + name_resource + ' resource',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            }
                        } else {
                            if (result[1] === true) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Successfully',
                                    text: 'Successfully added ' + name_access + ' access to ' + name_resource + ' resource',
                                    showConfirmButton: false,
                                    timer: 1500
                                }).then(function() {
                                    $(event.target).prop('checked', prop)
                                })
                            } else {
                                Swal.fire({
                                    icon: 'info',
                                    title: 'Failed',
                                    text: 'Failed to add ' + name_access + ' access to ' + name_resource + ' resource',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            }
                        }
                    }
                });
            }
        })
    }
</script>