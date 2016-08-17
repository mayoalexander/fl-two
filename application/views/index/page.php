<?php
	/* GET PAGE DATA */
	if (isset($_GET['page'])) {
		$current_page = $_GET['page'];
		/*echo 'current page: '.$current_page;*/
	}

	/* LOAD CONFIGURATION APP */
	include_once($_SERVER['DOCUMENT_ROOT'].$_SERVER['REQUEST_URI'].'/config/index.php');
	$config = new Blog();

	$files = $config->display_user_posts_new('admin' , $current_page);
	echo $files['posts']; 

?>

<script type="text/javascript" src='http://freelabel.net/js/dashboard.js'></script>
