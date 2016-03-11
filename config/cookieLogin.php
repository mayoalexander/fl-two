<?php
session_start();
//echo "<hr>";
  //echo '<pre>';
  //print_r($_SESSION);
  //print_r($_COOKIE);
  //echo '</pre>';

function sessionAdminSetup() {
  if ($_COOKIE['user_name'] == "admin" && $_SESSION['user_logged_in'] == 0) {
    //echo 'the user is currently logged in';
    /*echo '<script src="http://freelabel.net/config/cookieLogin.js" >
    </script>';*/
    // write user data into PHP SESSION [a file on your server]
    // loginWithCookies($_COOKIE['user_name']." , ".$_COOKIE['user_name'].'");
    $_SESSION['user_name'] = $_COOKIE['user_name'];
    $_SESSION['user_email'] = $_COOKIE['user_name'];
    $_SESSION['user_logged_in'] = 1;
    
    echo '
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>';
  echo "
<script>
  function loginWithCookies(user_name , user_password) {
      //alert(user_name);
      //alert(user_password);
      $.post('http://freelabel.net/submit/index.php',{
          user_name : user_name,
            user_password : user_password,
            login : 'Login'
      }).done(function(data){
        //$('#main_content').html(data);
        window.location.assign('http://freelabel.net/submit/');
      });
  }
  loginWithCookies('".$_COOKIE['user_name']."' , '".$_COOKIE['user_name']."');
</script>

";

  }
}
//sessionAdminSetup();
?>
