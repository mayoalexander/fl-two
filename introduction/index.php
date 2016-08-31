<?php
include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
include_once(ROOT.'config/stats.php');
$user = new User();
$config = new Blog();
//$page_title = 'Magazine';
if ($blog_type=='single') {
	// IF SINGLE, FORMAT FOR SINGLE
	$blogentry = '
	<audio controls preload="metadata">
	<source src="'.$trackmp3.'"></source>
	</audio>';
}

$blog_post_data['writeup'] = $config->formatBlogEntry($blog_post_data['writeup']);

if ($_GET['dev']==1) {
	print_r($config); exit;
}


if ($blog_post_data['writeup']=='') {
	$page_desc = 'The latest music, videos, news, and information in the most innovative way. Create an account at FREELABEL.NET';
} else {
	$page_desc = $blog_post_data['writeup'];
}


if (!$blog_post_data['poster']=='') {
	$poster = $blog_post_data['poster'];
} else {
	$poster = $blog_post_data['photo'];
}

?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo HTTP."ico/favicon.ico"; ?>" >
	<link rel="shortcut icon" href="<?php echo HTTP; ?>ico/favicon.ico" type="image/x-icon">
	<link rel="icon" href="<?php echo HTTP; ?>images/favicon.ico" type="image/x-icon">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title><?php echo $page_title; ?> // FREELABEL MAG + RADIO</title>
	<meta name="author" content="FREELABEL">
	<meta name="Description" content="<?php echo $page_desc; ?> // FREELABEL Network is the Leader in Online Showcasing">
	<meta name="Keywords" content="FREELABEL, FREE LABEL, FREE, LABEL, AMR, AMRecords, Rap, Hip Hop, Showcasing, Good Brand, Get That Good, Good Brand Clothing, Dalls Texas, FREELABEL, amradio, am radio live, texas, music, promotion, hip hop, rap">
	<meta name="Copyright" content="FREELABEL">
	<meta name="Language" content="English">


	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:player" content="<?php echo $page_url;?>">
	<meta name="twitter:player:width" content="300">
	<meta name="twitter:player:height" content="300">
	<meta name="twitter:image" content="<?php echo $poster;?>">
	<meta name="twitter:image:src" content="<?php echo $poster;?>">
	<meta name="twitter:site" content="@freelabelnet">
	<meta name="twitter:creator" content="@AMRadioLIVE">
	<meta name="twitter:title" content="<?php echo $page_title; ?> | FREELABEL RADIO + MAGAZINE + STUDIOS">
	<meta name="twitter:description" content="<?php echo $page_desc; ?>">
	<meta property="og:url" content="<?php echo $page_url; ?>">
	<meta property="og:title" content="<?php echo $page_title; ?> // FREELABEL RADIO + MAGAZINE">
	<meta property="og:description" content="<?php echo $page_desc; ?> // LOGIN @ FREELABEL">
	<meta property="og:image" content="<?php echo $poster; ?>">
	<meta property="og:image:type" content="image/png">
	<meta property="og:image:width" content="1024">
	<meta property="og:image:height" content="1024">

	<link rel="apple-touch-icon" sizes="57x57" href="<?php echo HTTP; ?>ico/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?php echo HTTP; ?>ico/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo HTTP; ?>ico/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo HTTP; ?>ico/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo HTTP; ?>ico/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo HTTP; ?>ico/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo HTTP; ?>ico/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo HTTP; ?>ico/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo HTTP; ?>ico/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo HTTP; ?>ico/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo HTTP; ?>ico/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo HTTP; ?>ico/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo HTTP; ?>ico/favicon-16x16.png">
	<link rel="manifest" href="<?php echo HTTP; ?>ico/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="<?php echo HTTP; ?>ico/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">

	<link rel="manifest" href="<?php echo HTTP; ?>ico/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="<?php echo HTTP; ?>ico/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">

	<link rel="stylesheet" type="text/css" href="<?php echo HTTP.'introduction/';?>css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="http://freelabel.net/css/bootstrap-social/bootstrap-social.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo HTTP.'introduction/';?>css/demo.css" />

	<link rel="stylesheet" type="text/css" href="<?php echo HTTP.'introduction/';?>css/component.css" />


	<!-- hover styles -->
<!-- 	<link rel="stylesheet" type="text/css" href="http://freelabel.net/landing/view/hover/css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="http://freelabel.net/landing/view/hover/css/demo.css" />
	<link rel="stylesheet" type="text/css" href="http://freelabel.net/landing/view/hover/css/set2.css" /> -->
	<link rel="stylesheet" href="http://freelabel.net/AudioPlayer/css/audioplayer.css" type='text/css'


		<!--[if IE]>
  		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  		<![endif]-->
  		<style type="text/css">
  		body, html {
  			overflow-x:hidden;
  			//font-size: 1em;
  		}
  		header {
  			text-shadow:1px 1px 15px #000;
  		}
  		header img {
  			box-shadow: 1px 1px 15px #000;
  		}
  		.featured_post_wrapper {
  			width:32%;
  			margin:0;
  			display:inline-block;
  			vertical-align: top;
  			font-size:0.55em;
  			color:#e3e3e3;
  		}
  		.featured_post_wrapper img {
  			width:100%;
  		}
  		.background_tint , #background_tint_singles {
  			background-color: rgba(0, 0, 0, 0.8);
  			/*min-height:100vh;*/
  			min-height:inherit;
  		}
  		.blog-post-media-image , .blog-post-media-video {
  			width:100%;
  			height:auto;
  		}
  		.content video {
  			width:100%;
  		}
  		#full_track_name {
		    font-size: 1.75em;
		    max-width: 275px;
		    margin: auto;
  		}
  		.btn {
  			text-align: center;
  			display:inline-block;
  			//background-color:;
  			padding:0.5% 2% 0.5% 4%;
  			font-size:18px;
  			border:none;
  			min-width:150px;
  		}
  		.bg-img img {
  			/*height:auto;*/
  			  -webkit-filter: blur(5px);
			  filter: blur(5px);
  		}
  		.site-logo {
  			opacity: 0.8;
  			border-radius: 3px;
  		}
  		.mag-view-buttons a , .blog-post-media-image {
  			border-radius:3px;
  		}
  		.featured_post_wrapper .btn {
  			height:32px;
  			width:32px;
  		}
  		.btn-twitter, .btn-facebook, .btn-tumblr, .btn-twitter:hover, .btn-facebook:hover, .btn-tumblr:hover {
  			background-color: transparent;
  		}
  		.btn-twitter:hover,.btn-twitter:focus,.btn-twitter:active,.btn-twitter.active,.open>.dropdown-toggle.btn-twitter, 
  		.btn-tumblr:hover,.btn-tumblr:focus,.btn-tumblr:active,.btn-tumblr.active,.open>.dropdown-toggle.btn-tumblr, 
  		.btn-facebook:hover,.btn-facebook:focus,.btn-facebook:active,.btn-facebook.active,.open>.dropdown-toggle.btn-facebook, 
  		{
  			color:#fff;
  			background-color:transparent;
  			border-color:rgba(0,0,0,0.2);
  		}
  		.btn-twitter {
  			color:#55acee;
  		}
  		.btn-tumblr {
  			color: #2c4762;
  		}
  		.btn-facebook {
  			color:#3b5998;
  		}
  		@media (max-width: 600px) {
		  .featured_post_wrapper {
		    width: 100%;
		    font-size:0.85em;
		  }
		}
  		</style>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-40470023-1', 'auto');
      ga('send', 'pageview');
    </script>
  	</head>
  	<body class="demo-1">
  		<div id="container" class="container intro-effect-push">
  			<!-- Top Navigation -->
  			<div class="codrops-top clearfix">
  				<span class="right"><a class="codrops-icon codrops-icon-prev" href="http://freelabel.net/u/<?php echo $blog_post_data['user_name']; ?>"><span>Back to <?php echo $blog_post_data['user_name']; ?> Site</span></a></span>
  			</div>
  			<header class="header">
  				<div class="bg-img"><img src="<?php echo $blog_post_data['photo']; ?>" alt="<?php echo $blog_post_data['photo']; ?>"/></div>
  				<div class="title">
  					<img class="site-logo" src="<?php echo 'http://freelabel.net/images/fllogo.png' //$config->site['logo']; ?>" style='max-width:175px;'>
  					<h1><?php echo $blogtitle ?></h1>
  					<p class="subline"><?php echo $twitter ?></p>
  				</div>
  			</header>
  			<button class="trigger" data-info="View More"><span>Trigger</span></button>
  			<div class="title">
  				<a href="http://freelabel.net/u/<?php echo $blog_post_data['user_name']; ?>"><h1><?php echo $blogtitle ?></h1></a>
  				<a href="http://freelabel.net/u/<?php echo $blog_post_data['user_name']; ?>"><p class="subline"><?php echo $twitter ?></p></a>
  				<p><?php
  				include(ROOT.'config/share.php');
  				findByID($post_id);
  				?></p>
  			</div>
  			<article class="content">
  				<div>
  					<?php
  					switch ($blog_type) {
  						case 'single':
  						$blogentry = '
  						<audio controls preload="metadata">
  						<source src="'.$trackmp3.'"></source>
  						</audio>';
  							break;

  						case 'blog':
  						if ($blog_post_data['filetype']=='video/mp4') {
 							$blogentry = '
	  						<video controls preload="metadata" poster="'.$photo.'" >
	  						<source src="'.$trackmp3.'"></source>
	  						</video>';
  						} else {
 							$blogentry = '
	  						<img style="width:100%;" src="'.$photo.'" alt="'.$blog_post_data['twitter'].'" >';
  						}
	 
  							break;
  						
  						default:
  							// $blogentry = '';
  							break;
  					}
  					echo $blogentry; 
  					?>
  					<hr>
  					<?php echo $blog_post_data['writeup']; ?>

  				</div>
  			</article>

  			<section class="related-posts">
  				<?php


					// echo $config->getPostsRelatedGallery($twitter);
  				$stream_pull ='related';
  				$search_query = $twitter;
  				include(ROOT.'singles/related.php');
  				?>
  			</section>
  		</div><!-- /container -->

  		<script type="text/javascript" src='http://freelabel.net/config/globals.js'></script>
  		<script src="<?php echo HTTP.'introduction/';?>js/classie.js"></script>
  		<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
  		<script type="text/javascript" src='http://freelabel.net/js/modalBox-min.js'></script>
  		<script>
  		$(function(){
		    // Main Feed Videon Controls Functionality
		    $('video').click(function(){
		      var element = $(this).get(0);
		      var siblings = $(this).siblings();
		      var parent = $(this).parent();

		      parent.removeClass('col-md-3');
		      parent.addClass('col-md-12');

		      if (element.paused == true) {
		        element.play();
		        siblings.html('<i class="fa fa-play"></i>');
		        siblings.fadeToggle('slow');
		      } else {
		        siblings.html('<i class="fa fa-pause"></i>');
		        siblings.fadeToggle('slow');
		        element.pause();
		      }
  			});
  		}); 
  		(function() {

				// detect if IE : from http://stackoverflow.com/a/16657946
				var ie = (function(){
					var undef,rv = -1; // Return value assumes failure.
					var ua = window.navigator.userAgent;
					var msie = ua.indexOf('MSIE ');
					var trident = ua.indexOf('Trident/');

					if (msie > 0) {
						// IE 10 or older => return version number
						rv = parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10);
					} else if (trident > 0) {
						// IE 11 (or newer) => return version number
						var rvNum = ua.indexOf('rv:');
						rv = parseInt(ua.substring(rvNum + 3, ua.indexOf('.', rvNum)), 10);
					}

					return ((rv > -1) ? rv : undef);
				}());


				// disable/enable scroll (mousewheel and keys) from http://stackoverflow.com/a/4770179
				// left: 37, up: 38, right: 39, down: 40,
				// spacebar: 32, pageup: 33, pagedown: 34, end: 35, home: 36
				var keys = [32, 37, 38, 39, 40], wheelIter = 0;

				function preventDefault(e) {
					e = e || window.event;
					if (e.preventDefault)
						e.preventDefault();
					e.returnValue = false;
				}

				function keydown(e) {
					for (var i = keys.length; i--;) {
						if (e.keyCode === keys[i]) {
							preventDefault(e);
							return;
						}
					}
				}

				function touchmove(e) {
					preventDefault(e);
				}

				function wheel(e) {
					// for IE
					//if( ie ) {
						//preventDefault(e);
					//}
				}

				function disable_scroll() {
					window.onmousewheel = document.onmousewheel = wheel;
					document.onkeydown = keydown;
					document.body.ontouchmove = touchmove;
				}

				function enable_scroll() {
					window.onmousewheel = document.onmousewheel = document.onkeydown = document.body.ontouchmove = null;
				}

				var docElem = window.document.documentElement,
				scrollVal,
				isRevealed,
				noscroll,
				isAnimating,
				container = document.getElementById( 'container' ),
				trigger = container.querySelector( 'button.trigger' );

				function scrollY() {
					return window.pageYOffset || docElem.scrollTop;
				}

				function scrollPage() {
					scrollVal = scrollY();

					if( noscroll && !ie ) {
						if( scrollVal < 0 ) return false;
						// keep it that way
						window.scrollTo( 0, 0 );
					}

					if( classie.has( container, 'notrans' ) ) {
						classie.remove( container, 'notrans' );
						return false;
					}

					if( isAnimating ) {
						return false;
					}

					if( scrollVal <= 0 && isRevealed ) {
						toggle(0);
					}
					else if( scrollVal > 0 && !isRevealed ){
						toggle(1);
					}
				}

				function toggle( reveal ) {
					isAnimating = true;

					if( reveal ) {
						classie.add( container, 'modify' );
					}
					else {
						noscroll = true;
						disable_scroll();
						classie.remove( container, 'modify' );
					}

					// simulating the end of the transition:
					setTimeout( function() {
						isRevealed = !isRevealed;
						isAnimating = false;
						if( reveal ) {
							noscroll = false;
							enable_scroll();
						}
					}, 1200 );
				}

				// refreshing the page...
				var pageScroll = scrollY();
				noscroll = pageScroll === 0;

				disable_scroll();

				if( pageScroll ) {
					isRevealed = true;
					classie.add( container, 'notrans' );
					classie.add( container, 'modify' );
				}

				window.addEventListener( 'scroll', scrollPage );
				trigger.addEventListener( 'click', function() { toggle( 'reveal' ); } );
			})();
			</script>
			<script src="http://freelabel.net/AudioPlayer/js/jquery.js"></script>
			<script src="http://freelabel.net/AudioPlayer/js/audioplayer.js"></script>
			<script>$( function() { $( 'audio' ).audioPlayer(); } );</script>
			<script>
			function playVideo(elem) {
				elem.get(0).play();
				elem.get(0).volume = 0.5;
			}
				$(function(){
					$('video').bind('hover',function(){
						// alert('now playing video');
						playVideo($(this));
						$('video').unbind('hover');
					});
				});
			</script>
		</body>
		</html>
