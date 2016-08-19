<?php 


include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');

//include_once(ROOT.'landing/header.php');

// ------ CONFIG ------ //

if (isset($_GET['p'])==false) {
	$current_page = 0;
} else {
	$current_page = $_GET['p'];
}
if (isset($_GET['view'])==false) {
	$feed_filter = 0;
} else {
	$feed_filter = $_GET['view'];
}
$next_page = $current_page + 1;
$next_page_read = $next_page +1;
include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
$blog = new Blog();

//$posts = $blog->randomizePosts($current_page,13 , '' , $_SERVER['SCRIPT_URI']);
if ($_GET['dev']==1) {
	print_r($posts);
exit;
}
$ads = $blog->getPhotosByUser('admin');
$ads[0]['image'] = str_replace('server/php/files/', 'server/php/files/thumbnail/', $ads[0]['image']);
// ------ CONFIG ------ //
?>
<style type="text/css">
body, h1,h2,h3,h4,h5,h6 {
	font-family: "Oswald", Arial, sans-serif;
	color:#ffffff;
}
.black-background {
	background-color:#101010;
}
.background-tint {
	background-color:rgba(0,0,0, 0.8);
	height: inherit;
	padding:5%;
}
.post {
	padding:0;
	background-size:200%;
}
.feed-container {
	padding:0;
	background-color:#101010;
}

.load-more-button {
	text-align: center;
}
.feed-container, .top_posts {
	overflow-y:scroll;
	height:90vh;
}
@media (max-width: 640px) {
	.hide-on-mobile {
		display:none;
	}
	.overflow {
		overflow-y: visible;
	}
}
 </style>
<div class='col-md-3 col-sm-3 col-xs-12 black-background top_posts overflow hide-on-mobile'>
	<!-- MAIN CONTENT FEED -->
	<?php
		$filter = 'trending';
		include(ROOT.'top_posts.php');
	?>
	</div>
</div>

<div class='col-md-9 col-sm-9 col-xs-12 overflow feed-container main_display_wrapper row-eq-height'>
	<!-- MAIN CONTENT FEED -->
</div>



<script src="http://freelabel.net/config/jquery-ui-1.11.4.custom/external/jquery/jquery.js"></script>
<!--<script src='http://freelabel.net/js/like_post.js'></script>-->
<script>
	$(function(){
		var current_page = <?php echo ''.$current_page.''; ?> + 1;
		var filter = <?php echo '"'.$feed_filter.'"'; ?>;
		//alert(current_page);

		$.post('http://freelabel.net/user/views/feed.php',{p:current_page,filter:filter,site:<?php echo "'".$_SERVER['SCRIPT_URI']."'" ?>}).done(function(data){
			$('.feed-container').html(data)
			//alert(data);
		});
	});
</script>