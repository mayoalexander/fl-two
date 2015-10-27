<?php 
include_once('../config/index.php');
$page_url ='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
//echo $page_url;
if ($page_url == 'http://freelabel.net/user/index.php'
	OR $page_url == 'http://freelabel.net/user/'
	OR $page_url == 'http://freelabel.net/user') {
	include_once(ROOT.'landing/header.php');
}
include(ROOT.'user/views/_header.php');
?>

<?php include(ROOT.'user/views/signin.php'); ?>



<?php //include('../new_footer.php'); ?>