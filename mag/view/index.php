<?php
session_start();
//print_r($_GET);
//include_once('../config/index.php');
include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
$page_title = 'Magazine';
$page_desc = 'The Leaders in Online Showcasing';
$user = new User();
/* VALIDATE USER SESSION */
//$user->validateSession(); // VALIDATE SESSION 
$blog = new Blog();
if (isset($_GET['p']) && $_GET['p']!='') {
	$current_page = $_GET['p'];
} else {
	$current_page = 0;
}
//print_r($current_page);

if (isset($_SESSION) && $_SESSION['user_name']!='') {
	$submission_user_name = $_SESSION['user_name'];
	$logged_in=true;
} else {
	$submission_user_name = 'submission';
}
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
  		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<link rel="shortcut icon" type="image/x-icon" href="http://freelabel.net/ico/favicon.ico" >
	    <link rel="shortcut icon" href="http://freelabel.net/ico/favicon.ico" type="image/x-icon">
	    <link rel="icon" href="http://freelabel.net/ico/favicon.ico" type="image/x-icon">
		<title><?php echo $page_title; ?> // FREELABEL MAG + RADIO</title>
		<meta name="author" content="FREELABEL">
		<meta name="Description" content="FREELABEL Network is the Leader in Online Showcasing | <?php echo $page_desc ?>">
		<meta name="Keywords" content="FREELABEL, FREE LABEL, FREE, LABEL, AMR, AMRecords, Rap, Hip Hop, Showcasing, Good Brand, Get That Good, Good Brand Clothing, Dalls Texas, FREELABEL, amradio, am radio live, texas, music, promotion, hip hop, rap">
		<meta name="Copyright" content="FREELABEL">
		<meta name="Language" content="English">
		<meta name="twitter:card" content="summary_large_image">
		<meta name="twitter:player" content="<?php echo $page_url;?>">
		<meta name="twitter:player:width" content="300">
		<meta name="twitter:player:height" content="300">
		<meta name="twitter:image" content="<?php echo $meta_tag_photo;?>">
		<meta name="twitter:image:src" content="<?php echo $meta_tag_photo;?>">
		<meta name="twitter:site" content="@freelabelnet">
		<meta name="twitter:creator" content="@FREELABELNET">
		<meta name="twitter:title" content="<?php echo $page_title; ?> | FREELABEL RADIO + MAGAZINE + STUDIOS">
		<meta name="twitter:description" content="Submit your music to get showcased on FREELABEL Magazine, Radio, TV, Events, and more!">
		<meta property="og:url" content="<?php echo $page_url; ?>">
		<meta property="og:title" content="<?php echo $page_title; ?> // FREELABEL RADIO + MAGAZINE">
		<meta property="og:description" content="Subscribe and create an account to FREELABEL.net for exclusive access to daily updated news, interviews, singles and project releases from the most influencial creators of our generation.">
		<meta property="og:image" content="<?php echo $meta_tag_photo; ?>">
		<meta property="og:image:type" content="image/png">
		<meta property="og:image:width" content="1024">
		<meta property="og:image:height" content="1024">
		<!--
		<link rel="stylesheet" type="text/css" href="<?php echo HTTP; ?>css/style.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo HTTP; ?>artists/templates/flat-ui/dist/css/flat-ui.css" />
		-->
		<link rel="stylesheet" type="text/css" href="<?php echo HTTP; ?>mag/view/css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo HTTP; ?>mag/view/fonts/font-awesome-4.3.0/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" href="http://freelabel.net/css/bootstrap-social/bootstrap-social.css">
		<link rel="stylesheet" type="text/css" href="<?php echo HTTP; ?>mag/view/css/style1.css" />
		<script src="<?php echo HTTP; ?>mag/view/js/modernizr.custom.js"></script>
		<style type="text/css">
		html, body {
			overflow-x:hidden;
		}
		.trending {
			min-height:300px;
			height:inherit;
			overflow-y:scroll;
		}
		.sidebar , .top-bar {
			background-color:#101010;
		}
		.mag-view-buttons {
			text-align:center;
		}
		.call-to-action {
			//display:none;
		}
		.navi-target, .navi-trigger {
			display:none;
		}
		.action {
			font-size:24px;
		}
		.call-to-action .btn {
			background-color:transparent;
			padding:4%;
			font-size:20px;
			border-radius:0;
			//border:#e3e3e3 1px solid;
			color:#fff;
			text-transform: uppercase;
		}
		.call-to-action .btn-warning {
			//border:yellow 1px solid;
		}
		.call-to-action .btn-primary {
			//border:white 1px solid;
		}
		.call-to-action .btn-success {
			//border:green 1px solid;
		}
		.head-logo {
			//height:168px;
			max-width:100%;
			display:block;
			margin:auto;
			margin-top:5px; 
			margin-bottom:5%;
			background-color:#fe3f44;
		}
		.head-logo img {
			height:100px;
			//max-width:100%;
		}
		.call-to-action .action {
			width:32%;
			margin:0;
			display:inline-block;
		}
		.call-to-action span {
			display:block;
		}
		.navi-target {
			display:block;
			color:#fff;
			font-size:14px;
			padding-left:5%;
			padding-bottom:5%;
			text-align:left;
		}
		.fa {
			font-size:16px;
		}
		.blog-photo {
			max-height:60vh;
			max-width: 100%;
			border-radius:0;
		}
		.form-control , .panel-body {
			font-size:18px;
			padding:2%;
			width:100%;
			display:inline-block;
		}
		.panel-body label {
			font-size:24px;
		}
		.section-title a:active , .section-title a:visited, .section-title a:hover {
			color:#FE3F44;
		}
		.main_display_wrapper {
			transition: opacity 2.25s ease-in-out;
   			-moz-transition: opacity 2.25s ease-in-out;
   			-webkit-transition: opacity 2.25s ease-in-out;
		}
		.featured-item {
			width:66%;
		}
		.grid__item img {
			max-height:200px;
			width:auto;
		}
		.mag-view-buttons a {
		    //font-size: 27px;
		    padding: 10px 24px;

		    //display:inline-block;
		} 
		.mag-view-buttons a i {
			padding:.75% 1.5%;
		}
		.ad-block img, #main_image_showcase {
			width:100%;
			display: inline-block;
		}
		@media (max-width:600px) {
			.featured-item {
				width:100%;
			}
		}

		<?php

			if ($logged_in === true) {
				echo '
				.navi-options {
					display:none;
				}';
			}

		?>
		</style>
		
	<?php //include(ROOT.'AudioPlayer/index.php'); ?>
	</head>
	<body>

		<div class="container">
			<button id="menu-toggle" class="menu-toggle"><span>Menu</span></button>
			<div id="theSidebar" class="sidebar">
				<button class="close-button fa fa-fw fa-close"></button>
				<!--<div class="codrops-links">
					<a class="codrops-icon codrops-icon--prev" href="http://tympanus.net/Tutorials/MotionBlurEffect/" title="Previous Demo"><span>Previous Demo</span></a>
					<a class="codrops-icon codrops-icon--drop" href="http://tympanus.net/codrops/?p=23872" title="Back to the article"><span>Back to the Codrops article</span></a>
				</div>-->
				<div class='head-logo'>
					<a href='#'><img src='http://freelabel.net/images/FREELABELLOGO.gif' class='head-logo navi-trigger' ></a>
					<!--<a href='#' class='fa fa-list navi-target navi-trigger'></a>-->
					<hr>

					<div class="screen-middxle call-to-action navi-options">

							<!--<a href="#" class="btn btn-primary btn-lg action" data-action="login" ><span class="fa fa-user"></span>Login</a>-->
							<a href='http://freelabel.net/landing/' class="btn btn-warning btn-lg action" data-action="loginn"><span class="fa fa-user"></span>Login</a>
							<a href='http://freelabel.net/register' class="btn btn-warning btn-lg action" data-action="register"><span class="fa fa-lock"></span>Register</a>
							<a href='http://upload.freelabel.net/?uid=<?php echo $submission_user_name ?>' class="btn btn-success btn-lg action"><span class="fa fa-cloud-upload"></span>Submit</a>
							

							<!--<a href='http://freelabel.net/form/login/' class="btn btn-primary btn-lg action"><span class="fa fa-ellipsis-h"></span>Mag</a>
							<a href='http://freelabel.net/sections/' class="btn btn-warning btn-lg action"><span class="fa fa-tv"></span>TV</a>
							<a href='http://upload.freelabel.net/?uid=<?php echo $submission_user_name ?>' class="btn btn-success btn-lg action"><span class="fa fa-radio"></span>Radio</a>-->
							<?php //$adpull_stream = 'fl-front'; include(ROOT.'ads.php'); ?>
					</div>
				</div>
				<script src="https://embed.radio.co/player/89b0bab.js"></script>
				
				<nav class="codrops-demos trending">
					<!--<a class="current-demo" href="index.html">Welcome</a>-->
					<?php $user->showTrending(); ?>
				</nav>
			</div>
			<div id="theGrid" class="main event-registration-body main_display_wrapper ">

				


			</div>
		</div><!-- /container -->
		<script src="<?php echo HTTP; ?>AudioPlayer/js/jquery.js"></script>
		<script type="text/javascript">
		
		$(function(){

			$('.main_display_wrapper').html('Loading Feed..');

			var page = <?php echo "".$current_page.""; ?>;
			$.get('http://freelabel.net/mag/view/stream.php',{p:page}).done(function(data){
				//alert(data);
				$('.main_display_wrapper').html(data);

			});



			$('.action').click(function(event){
				//event.preventDefault();
				var action = $(this).attr('data-action');
				var container = $('.grid');
				//var path = 'http://freelabel.net/config/subscribe.php';
				var path = 'http://freelabel.net/submit/views/signin.php';
				//alert(action);
				if (action=='login') {
					container.html('Please Wait..');
					$.get( path , {origin:'front-page'} ,function(data){
						container.html(data);
					});
				} else {
					//alert(action);
				}
			});
			$('.dropdown-target').click(function(){
				// alert('Drop down the menu!');
				$(this).children();
				$('.dropdown-menu').toggle('fast');
			});


			$('.drop-option').click(function(){
				//var option = $(this).text();
				$('#theGrid').children().hide('fast');
				$('#theGrid').html('Please Wait..');
				var link = $(this).attr('data-link');
				var url = 'http://freelabel.net/'+ link;

				$.post( url, function( data ) {
				  $('#theGrid').html(data);
				});
			});

			$('.share_buttons').click(function(){
				//var action = $(this).attr();
				//var action = $(this).text();
				//alert(action);
			});
			$(function(){
				$('.navi-trigger').click(function(){
					$('.navi-options').toggle('fast');
				});
			});
		});
		</script>

	</body>
</html>
