<?php
	/* GET PAGE DATA */
	if (isset($_GET['page'])) {
		$current_page = $_GET['page'];
		/*echo 'current page: '.$current_page;*/
	}

	/* LOAD CONFIGURATION APP */
	include_once('/home/content/59/13071759/html/config/index.php');
	$config = new Blog();





	$files = $config->display_user_posts_new('admin' , $current_page);
	echo $files['posts']; 

?>