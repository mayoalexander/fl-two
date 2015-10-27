<?php
session_start();
include('../../config/index.php');

include(ROOT.'user/views/_header.php'); 
?>


<!-- clean separation of HTML and PHP -->
<h2><?php echo $_SESSION['user_name']; ?> <?php echo WORDING_EDIT_YOUR_CREDENTIALS; ?></h2>

<!-- backlink -->
<a class='btn btn-default' href="index.php" style='display:inline-block;'><-- <?php echo WORDING_BACK_TO_LOGIN; ?></a>


<!-- edit form for username / this form uses HTML5 attributes, like "required" and type="email" -->
<form method="post" action="edit.php" name="user_edit_form_name" class='form-signin panel-body'>
    <label for="user_name"><?php echo WORDING_NEW_USERNAME; ?></label>
    <input id="user_name" type="text" class='form-control' name="user_name" pattern="[a-zA-Z0-9]{2,64}" required /> (<?php echo WORDING_CURRENTLY; ?>: <?php echo $_SESSION['user_name']; ?>)
    <input type="submit" class='btn btn-primary' name="user_edit_submit_name" value="<?php echo WORDING_CHANGE_USERNAME; ?>" />
</form><hr/>

<!-- edit form for user email / this form uses HTML5 attributes, like "required" and type="email" -->
<form method="post" action="edit.php" name="user_edit_form_email" class='form-signin panel-body'>
    <label for="user_email"><?php echo WORDING_NEW_EMAIL; ?></label>
    <input id="user_email" type="email" class='form-control'  name="user_email" required /> (<?php echo WORDING_CURRENTLY; ?>: <?php echo $_SESSION['user_email']; ?>)
    <input type="submit" class='btn btn-primary' name="user_edit_submit_email" value="<?php echo WORDING_CHANGE_EMAIL; ?>" />
</form><hr/>

<!-- edit form for user's password / this form uses the HTML5 attribute "required" -->
<form method="post" action="edit.php" name="user_edit_form_password" class='form-signin panel-body'>
    <label for="user_password_old"><?php echo WORDING_OLD_PASSWORD; ?></label>
    <input id="user_password_old" class='form-control' type="password" name="user_password_old" autocomplete="off" />

    <label for="user_password_new"><?php echo WORDING_NEW_PASSWORD; ?></label>
    <input id="user_password_new" class='form-control' type="password" name="user_password_new" autocomplete="off" />

    <label for="user_password_repeat"><?php echo WORDING_NEW_PASSWORD_REPEAT; ?></label>
    <input id="user_password_repeat" class='form-control' type="password" name="user_password_repeat" autocomplete="off" />

    <input type="submit" class='btn btn-primary' name="user_edit_submit_password" value="<?php echo WORDING_CHANGE_PASSWORD; ?>" />
</form>

<?php //include('../new_footer.php'); ?>
