<?php 
session_start();

include_once('../config/index.php'); 
$config = new Blog($_SERVER['HTTP_HOST']);
include_once(ROOT . "inc/connection.php");
include_once(ROOT. 'blog/blog_controller.php');
//include_once(ROOT. 'config/stats.php');
//include_once('../config/globalvars.php');  
// show view
if ($_SESSION['user_name']=='admin') {
	
	include('../introduction/index.php');
} else {
	include('../introduction/index.php');
	//include('../newBlogview/index.php');
}
	
//include('../new_footer.php');