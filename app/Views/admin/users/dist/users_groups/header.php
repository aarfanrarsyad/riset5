<script>
    function change_group(event) {
        event.preventDefault();
        let text_alert = '';
        let text_button = '';
        let prop = false;

        let user_id = $(event.target).data('user');
        let group_id = $(event.target).data('group');
        let user_name = $(event.target).data('user_name');
        let group_name = $(event.target).data('group_name');

        if ($(event.target).is(':checked') === false) {
            text_alert = 'Are you sure to delete group ' + group_name + ' for user ' + user_name + '?';
            text_button = 'Yes, delete it!';
        } else {
            text_alert = 'Are you sure to add group ' + group_name + ' for user ' + user_name + ' ?';
            text_button = 'Yes, add it!';
            prop = true;
        }

        Swal.fire({
            icon: 'question',
            text: text_alert,
            showCancelButton: true,
            confirmButtonColor: '#4248ED',
            cancelButtonColor: '#33A1C4',
            confirmButtonText: text_button
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?= base_url('/admin/users-groups/insert') ?>',
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        user_id: user_id,
                        group_id: group_id
                    },
                    success: function(result) {
                        if (result[0] == 'delete') {
                            if (result[1] === true) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: 'Successfully deleted group ' + group_name + ' for user ' + user_name + '.',
                                    showConfirmButton: false,
                                    timer: 3000
                                }).then(function() {
                                    $(event.target).prop('checked', prop)
                                })
                            } else {
                                Swal.fire({
                                    icon: 'info',
                                    title: 'Failed',
                                    text: 'Failed to delete the ' + group_name + ' group for ' + user_name + ' user.',
                                    showConfirmButton: false,
                                    timer: 3000
                                })
                            }
                        } else {
                            if (result[1] === true) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: 'Successfully added group ' + group_name + ' for user ' + user_name + '.',
                                    showConfirmButton: false,
                                    timer: 3000
                                }).then(function() {
                                    $(event.target).prop('checked', prop)
                                })
                            } else {
                                Swal.fire({
                                    icon: 'info',
                                    title: 'Failed',
                                    text: 'Failed to added the ' + group_name + ' group for ' + user_name + ' user.',
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