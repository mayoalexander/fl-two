<?php
include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');


	$config = new Blog($_SERVER['HTTP_HOST']);
	// add these stats in here somehwere in the layout
	$stats = $config->getStatsByUser($site['user']['name']);
	$current_page = '0';
	$user = $config->getUserData($site['user']['name']);

	$files = $config->display_user_posts_new('admin' , $current_page);
	echo $files['posts']; 