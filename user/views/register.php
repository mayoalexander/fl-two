<?php 
$page_title = 'REGISTER';
$page_desc = 'Register For Your FREELABEL Account';
//include('../new_header.php');

include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
define(WORDING_REGISTRATION_USERNAME, 'Username');
define(WORDING_REGISTRATION_EMAIL, 'Email');
define(WORDING_REGISTRATION_PASSWORD, 'Password');
define(WORDING_REGISTRATION_PASSWORD_REPEAT,'Confirm Password');
define(WORDING_REMEMBER_ME, 'Keep me logged in');
define(WORDING_LOGIN, 'Login');
define(WORDING_REGISTER_NEW_ACCOUNT, 'Create New Account');
define(WORDING_FORGOT_MY_PASSWORD, 'Forgot Password');
define(WORDING_REGISTER, 'Register');
include(ROOT.'landing/header.php');
include_once('_header.php'); 
?>
<style type="text/css">
/* Integrate into Createive CSS after login modal is integrated */
.modal-width {
    max-width:600px;
    margin:auto;
}
.modal-width input {
    margin-bottom:5%;
}
.login-panel-main {
    margin-top:2%;
}
.login-panel-alert {
    margin-top:0px;
}

</style>
<!-- show registration form, but only if we didn't submit already -->
<div class='modal-width' style="margin:2.5% auto;text-align:center;">
    <div class="btn btn-group" >
        <a class="btn btn-lg btn-primary" style="display:inline-block; margin:auto;" data-toggle="modal" data-target="#loginMod" href="#login" > Try Logging In</a>
        <a class='btn btn-lg btn-primary' style="display:inline-block; margin:auto;" href="http://freelabel.net/user/password_reset.php"><?php echo 'Forgot Password'; ?></a>
    </div>
    
</div>
<?php if (!$registration->registration_successful && !$registration->verification_successful) { ?>
<form  method="post" action="http://freelabel.net/user/register.php" name="registerform" class='panel modal-width registration-panel-form'>
    <h1 class='panel-heading' style='color:#303030;'>Create Your Account</h1>
    <div class='panel-body'>
        
        <label for="user_name"><?php echo WORDING_REGISTRATION_USERNAME; ?></label>
        <input type="text" class="form-control" id="user_name" type="text" pattern="[a-zA-Z0-9]{2,64}" name="user_name" required />

        <label for="user_email"><?php echo WORDING_REGISTRATION_EMAIL; ?></label>
        <input type="text" class="form-control" id="user_email" type="email" name="user_email" required />

        <label for="user_password_new"><?php echo WORDING_REGISTRATION_PASSWORD; ?></label>
        <input class="form-control" id="user_password_new" type="password" name="user_password_new" pattern=".{6,}" required autocomplete="off" />

        <label for="user_password_repeat"><?php echo WORDING_REGISTRATION_PASSWORD_REPEAT; ?></label>
        <input class="form-control" id="user_password_repeat" type="password" name="user_password_repeat" pattern=".{6,}" required autocomplete="off" />
        <!--

        <img src="http://freelabel.net/user/tools/showCaptcha.php" alt="captcha" />
        <label><?php echo WORDING_REGISTRATION_CAPTCHA; ?></label>
        <input type="text" class="form-control" type="text" name="captcha" required />
        -->

        <input type="submit" name="register" value="<?php echo WORDING_REGISTER; ?>" class='btn btn-primary' />
    </div>
</form>
<?php } ?>
<?php 
    include(ROOT.'landing/footer.php'); 
?>