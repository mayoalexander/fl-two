<?php 
if (isset($site)==true) {
   // print_r($site);
} else {
    //echo 'Site Not Detected.';
}

include_once(ROOT.'user/views/_header.php'); 
define(WORDING_USERNAME, 'Username');
define(WORDING_PASSWORD, 'Password');
define(WORDING_REMEMBER_ME, 'Keep me logged in');
define(WORDING_LOGIN, 'Login');
define(WORDING_REGISTER_NEW_ACCOUNT, 'Create New Account');
define(WORDING_FORGOT_MY_PASSWORD, 'Forgot Password');
?>
<form method="post" action="http://freelabel.net/user/index.php" name="loginform" class='panel panel-body login-panel-main' style='display:block;'>
    <h5 for="user_name"><?php echo 'Username'; ?></h5>
    <input id="user_name" type="text" name="user_name" placeholder="Enter password..." required class="form-control" />
    <h5 for="user_password"><?php echo 'Password'; ?></h5>
    <input id="user_password" type="password" name="user_password" autocomplete="off" placeholder="Enter password..." required class="form-control" />
    <!--<input type="checkbox" id="user_rememberme" name="user_rememberme" value="1" style='display:inline-block;' />
    <h5 for="user_rememberme" style='display:inline-block;'><?php echo 'Remember Me'; ?></h5>-->
    <input type='hidden' name="source-site" value="<?php echo $_SERVER['SCRIPT_URI']; ?>">
    <br>
    <button class='btn btn-success btn-lg block' name="login">Login</button>


    <!--
    <hr>
    <a href="http://freelabel.net/user/register.php"><?php echo 'Create New Acount'; ?></a> |
  <a href="http://freelabel.net/user/password_reset.php"><?php echo 'Forgot Password'; ?></a>--> 
</form>
