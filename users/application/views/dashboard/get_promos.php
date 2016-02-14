<?php
	/* GET PAGE DATA */
	if (isset($_GET['page'])) {
		$current_page = $_GET['page'];
	}

	if (isset($_GET['tag'])) {
		$tag = $_GET['tag'];
	} else {
		$tag = NULL;
	}

	/* LOAD CONFIGURATION APP */
	include_once('/home/content/59/13071759/html/config/index.php');
	$config = new Blog();

	$promos = $config->getPromosByUser('admin' , $current_page, $tag);
	echo $config->display_photos($promos, null , $current_page, $tag);

?>