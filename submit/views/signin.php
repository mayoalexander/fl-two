<?php 
$page_url ='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
if ($page_url == 'http://freelabel.net/submit/views/signin.php') {
  //include_once(ROOT.'new_header.php');
}

if (file_exists('../../config/index.php')) {
  include_once('../../config/index.php');
} elseif(file_exists('../config/index.php')) {
  include_once('../config/index.php');
  $dir='user/views/';
} elseif(file_exists('config/index.php')) {
  include_once('config/index.php');
}

if (isset($_POST['noheaders']) == false AND $noheaders==1) {
  include_once(ROOT."new_header.php");
  include_once(ROOT."user/views/_header.php");
}

if (isset($_POST['process'])) {
  if ($_POST['process']=="subscriber_login") {
    $login_action = 'http://freelabel.net/config/login_subscriber.php';
    $process_text  = 'Email';
    $process = $_POST['process'];
  }
  if ($_POST['process']=="user_login") {
    $login_action = 'http://freelabel.net/submit/index.php';
    $process_text  = 'Username';
    $process = $_POST['process'];
  }
}
if (isset($_POST['process'])==false) {
  $login_action = 'http://freelabel.net/submit/index.php';
    $process_text  = 'Username';
    $process = "user_login";
}
/* TEMPORARY FIXX */
 $login_action = 'http://freelabel.net/submit/index.php';
    $process_text  = 'Username';
    $process = "user_login";
  /* TEMPORARY DELETE IF NOT FEASABLE */
?>
<a name='signin'></a>

<?php include(ROOT.'user/views/signin.php'); ?>

<!--
<form method="post" action="<?php echo $login_action; ?>" name="loginform" class='form-signin panel'>
    <label for="user_name"><?php echo $process_text; ?></label>
    <input id="user_name" type="text" name="user_name" required class="form-control" />
    <label for="user_password">Password</label>
    <input id="user_password" type="password" name="user_password" autocomplete="on" required class="form-control" />
    <input type="checkbox" id="user_rememberme" name="user_rememberme" value="1" style='display:inline;' />
    <label for="user_rememberme">Remember Me</label>
    <input  type="submit" name="login" value="Login" class='btn btn-primary' />
    <input type='hidden' name='process' value=<?php echo $process; ?>>
    <br>
  <a style='display:none;' href="http://freelabel.net/submit/password_reset.php">Forgot Password?</a>
</form>

-->
<?php 
  if ($page_url = 'http://freelabel.net/submit/views/signin.php') {
    //include_once(ROOT.'new_footer.php');
  }
?>