<?php 

	include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
	$config = new Blog($_SERVER['HTTP_HOST']);

	$slug = str_replace('index/stream/', '', $_GET['url']);
	$slug = str_replace('/', '', $slug);




	    $posts = $config->getPostSearch($slug);

    echo $posts;

 //    $db = $config->display_dashboard_feed($site['user']);
	// print_r($db);
	// exit;
	// // add these stats in here somehwere in the layout
	// $stats = $config->getStatsByUser($site['user']['name']);
	// $current_page = '0';

	// $files = $config->display_user_posts_new('admin' , $current_page);
	// echo $files['posts']; 

?>
