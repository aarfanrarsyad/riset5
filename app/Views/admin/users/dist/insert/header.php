<script>
    function submit() {
        $('#registration-form').submit()
    }

    function see_password(event) {
        if ($('[type = password]').length > 0) {
            $('.password-input').attr('type', 'text');
            $('.password-icon').empty();
            $('.password-icon').html('<i class="far fa-eye-slash"></i>');
        } else {
            $('.password-input').attr('type', 'password');
            $('.password-icon').empty();
            $('.password-icon').html('<i class="far fa-eye"></i>');
        }
    }
</script>

<style type="text/css">
    #icon-button {
        float: right;
        margin-right: 3px;
        margin-top: -25px;
        position: relative;
        z-index: 2;
        color: red;
    }
</style>