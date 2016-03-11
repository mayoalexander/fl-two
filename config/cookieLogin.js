<?php

session_start();
//echo 'THIS';
//print_r($_SESSION);

//setcookie("user_name", "admin", time() + (86400 * 30), "/");
//setcookie("user_password", "leighl11", time() + (86400 * 30), "/");

if ($_COOKIE['user_name'] == "admin") {
  //echo 'the user is currently logged in';
  /*echo '<script src="http://freelabel.net/config/cookieLogin.js" >
  loginWithCookies("'.$_COOKIE['user_name'].'","'.$_COOKIE['user_name'].'");
  </script>';*/
  // write user data into PHP SESSION [a file on your server]
  $_SESSION['user_name'] = $_COOKIE['user_name'];
  $_SESSION['user_email'] = $_COOKIE['user_name'];
  $_SESSION['user_logged_in'] = 1;

echo "<hr>";
echo '<pre>';
print_r($_SESSION);
echo '</pre>';
}



?>

<script>

function loginWithCookies(user_name , user_password) {}
$.post('http://freelabel.net/submit/index.php',{
		user_name : user_name,
        user_password : user_password
}).done(function(data){
	alert(data);
});


</script>