<?php 
include('../landing/header.php');
include('_header.php'); 
?>
<?php if ($login->passwordResetLinkIsValid() == true) { ?>
<a href="http://freelabel.net/form/login/"><?php echo WORDING_BACK_TO_LOGIN; ?></a>

<form method="post" action="http://freelabel.net/user/password_reset.php" name="new_password_form" class='panel panel-body modal-width' style='max-width:600px;margin:5% auto;'>
    <input type='hidden' name='user_name' value='<?php echo $_GET['user_name']; ?>'  class="form-control" />
    <input type='hidden' name='user_password_reset_hash' value='<?php echo $_GET['verification_code']; ?>' />

    <label for="user_password_new"><?php echo WORDING_NEW_PASSWORD; ?></label>
    <input id="user_password_new" type="password" name="user_password_new" pattern=".{6,}" required autocomplete="off" class="form-control" />

    <label for="user_password_repeat"><?php echo WORDING_NEW_PASSWORD_REPEAT; ?></label>
    <input id="user_password_repeat" type="password" name="user_password_repeat" pattern=".{6,}" required autocomplete="off" class="form-control" />
    <input type="submit" name="submit_new_password" value="<?php echo WORDING_SUBMIT_NEW_PASSWORD; ?>" />
</form>
<!-- no data from a password-reset-mail has been provided, so we simply show the request-a-password-reset form -->
<?php } else { ?>
<form method="post" action="http://freelabel.net/user/password_reset.php" name="password_reset_form" class='panel panel-body modal-width' style='max-width:600px;margin:5% auto;' >
    <label for="user_name"><?php echo WORDING_REQUEST_PASSWORD_RESET; ?></label>
    <input value='<?php echo $_GET["user"]; ?>' class='form-control' id="user_name" type="text" name="user_name" placeholder='Enter your Username...' required />
    <hr>
    <div class='btn-group' >
        <input class='btn btn-primary' type="submit" name="request_password_reset" value="<?php echo WORDING_RESET_PASSWORD; ?>"  />
        <a href='http://freelabel.net/register' class='btn btn-primary'>or Create New Account</a>        
    </div>
    
</form>
<?php } ?>

<?php include('../landing/footer.php'); ?>
