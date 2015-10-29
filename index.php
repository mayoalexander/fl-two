<?php
//print_r($_SERVER['HTTP_HOST']);
if ( strpos($_SERVER['HTTP_HOST'], 'localhost')===0 ) {
	define(ENVIROMENT, 'DEVELOPMENT');
} elseif(strpos($_SERVER['HTTP_HOST'], 'freelabel.net')===0) {
	define(ENVIROMENT, 'LIVE');
} else {
	define(ENVIROMENT, 'PRODUCTION');
}

session_start();
if (isset($_SESSION['fl-session-id'])==false) {
	$_SESSION['fl-session-id'] = time();
	include('landing/index.php');
	//$_SESSION['fl-sesssion-id'] = rand(11111111111111111111,999999999999999999999); 
	exit;
}
if (isset($_GET['dev']) OR ENVIROMENT=='DEVELOPMENT') {
	//print_r($_SESSION);
	//exit;
}
//$page_title = "WELCOME";
/* ------------------------------------------------- 
*
*   1.0) Login User
*		1.1) Check Session
*		1.2) Check Cookie if Still Logged In
*		1.3) Grab User Data (if logged in Show Dashboard, or show Registration Page)
*	2.0) Show Dashboard
*
* ------------------------------------------------- 
*/
include_once('config/index.php');
$user = new User();
// 1.1) check if session exists OR cookie exists. 
//$user->verifySession();
//$user->showView($user->verifySession());
if (isset($_SESSION['user_name'])==false) {
	/******		UNRECOGNIZED USER	*********/
	// 1.1. Show Home Page
	include('landing/index.php');
} else {
	/******		USER LOGGED IN	*********/
	// 1.2 Detect User Type
	$user_data['type'] = $user->getUserType($_SESSION['user_name']);
	if ($user_data['type']==='expired') {
		//include(ROOT.'user/views/landing.php');
		include(ROOT.'user/views/expired.php');
	} else {
		include(ROOT.'user/views/landing.php');
	}

}
   
?>