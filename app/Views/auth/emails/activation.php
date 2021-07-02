<?= $this->extend('auth/emails/index'); ?>

<?= $this->section('content') ?>
<table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
    <tr>
        <td valign="top" class="bg_white" style="padding: 1em 2.5em 0 2.5em;">
            <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td class="logo" style="text-align: center;">
                        <h1><a href="#">Account Activation</a></h1>
                    </td>
                </tr>
            </table>
        </td>
    </tr><!-- end tr -->
    <tr>
        <td valign="middle" class="hero bg_white" style="padding: 2em 0 4em 0;">
            <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td style="padding: 0 2.5em; text-align: center; padding-bottom: 3em;">
                        <div class="text">
                            <span style="font-size:medium"><?= $username ?> this is an activation email for your account</span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">
                        <div class="text-author">
                            <img src="<?= base_url('/img/components/logo/logo_pkl.png') ?>" alt="logo PKL" style="width: 100px; max-width: 600px; height: auto; margin: auto; display: block;">
                            <span class="name" style="font-size:medium"><?= $username ?></span>
                            <br>
                            <br>
                            <span class="position name" style="font-size:small;color:#a6a6a6">To activate your account, please click the button below.</span>
                            <br>
                            <p><a href="<?= base_url('activate-account') . '?token=' . $hash ?>" class="btn btn-primary" style="font-size:medium">Activate account</a></p>
                        </div>
                    </td>
                </tr>
            </table>
        </td>
    </tr><!-- end tr -->
    <!-- 1 Column Text + Button : END -->
</table>
<hr style="margin-top:25px;margin-bottom:25px;color:#ffffff">

<table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
    <tr>
        <td valign="middle" class="hero bg_white" style="padding: 2em 0 4em 0;">
            <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                <br>
                <br>
                <tr>
                    <td style="padding: 0 2.5em; text-align: center; padding-bottom: 3em;">
                        <div class="text">
                            <span style="font-size:medium">
                                Please use the data below to login the application</span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="text-author" style="text-align: left;">
                            <span class="position name" style="font-size:small;color:#a6a6a6">Email : <?= $email ?></span>
                            <br>
                            <span class="position name" style="font-size:small;color:#a6a6a6">Password : <?= $password ?></span>
                        </div>
                        <br>
                        <div class="info" style="margin-left:40px;margin-right:40px;">
                            <span class="position name" style="font-size:small;color:#a6a6a6">Don't forget to change your password, after successfully logging into the application.</span>
                        </div>
                    </td>
                </tr>
                <br>
            </table>
        </td>
    </tr><!-- end tr -->
    <!-- 1 Column Text + Button : END -->
</table>

<?= $this->endSection() ?>