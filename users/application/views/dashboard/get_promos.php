<?php
	/* GET PAGE DATA */
	if (isset($_GET['page'])) {
		$current_page = $_GET['page'];
	}

	if (isset($_GET['tag']) OR $tag!=='') {
		$tag = $_GET['tag'];
	} else {
		$tag = NULL;
	}

	/* LOAD CONFIGURATION APP */
	include_once($_SERVER['DOCUMENT_ROOT'].$_SERVER['REQUEST_URI'].'/config/index.php');
	$config = new Blog();

	$promos = $config->getPromosByUser('admin' , $current_page, $tag);
	echo $config->display_photos($promos, null , $current_page, $tag);

?>
<script type="text/javascript" src='http://freelabel.net/js/dashboard.js'></script>
<script type="text/javascript" src='http://freelabel.net/js/promos.js'></script>