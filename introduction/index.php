<?php
include_once('/home/content/59/13071759/html/config/index.php');
include_once(ROOT.'config/stats.php');
$user = new User();
//$blog = new Blog();
//$page_title = 'Magazine';
if ($blog_type=='single') {
	// IF SINGLE, FORMAT FOR SINGLE
	$blogentry = '
	<audio controls preload="metadata">
	<source src="'.$trackmp3.'"></source>
	</audio>';
}
if(strpos($blog_post_data['writeup'], 'livemixtapes')) {
	$blog_post_data['writeup'] = '<iframe src="'.$blog_post_data['writeup'].'" width="100%" height="450px" frameborder=0 seamless></iframe>';
} elseif(strpos($blog_post_data['writeup'], 'youtube')) {
	$blog_post_data['writeup'] = '<iframe src="'.$blog_post_data['writeup'].'" width="100%" height="450px" frameborder=0 seamless></iframe>';
} elseif(strpos($blog_post_data['writeup'], 'soundcloud')) {
	$blog_post_data['writeup'] = '<iframe src="'.$blog_post_data['writeup'].'" width="100%" height="450px" frameborder=0 seamless></iframe>';
}elseif(strpos($blog_post_data['writeup'], 'datpiff')) {
	//echo 'datpiff';
	$blog_post_data['writeup'] = '<iframe src="'.$blog_post_data['writeup'].'" width="100%" height="450px" frameborder=0 seamless></iframe>';
}elseif(strpos($blog_post_data['writeup'], 'audiomack')) {
	//echo 'datpiff';
	$blog_post_data['writeup'] = '<iframe src="'.$blog_post_data['writeup'].'" width="100%" height="450px" frameborder=0 seamless></iframe>';
} else {
	//$blog_post_data['writeup'] =  'not found';
}

if ($_GET['dev']==1) {
	print_r($config); exit;
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
	<meta name="Description" content="// FREELABEL Network is the Leader in Online Showcasing">
	<meta name="Keywords" content="FREELABEL, FREE LABEL, FREE, LABEL, AMR, AMRecords, Rap, Hip Hop, Showcasing, Good Brand, Get That Good, Good Brand Clothing, Dalls Texas, FREELABEL, amradio, am radio live, texas, music, promotion, hip hop, rap">
	<meta name="Copyright" content="FREELABEL">
	<meta name="Language" content="English">





	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:player" content="<?php echo $page_url;?>">
	<meta name="twitter:player:width" content="300">
	<meta name="twitter:player:height" content="300">
	<meta name="twitter:image" content="<?php echo $blog_post_data['photo'];?>">
	<meta name="twitter:image:src" content="<?php echo $blog_post_data['photo'];?>">
	<meta name="twitter:site" content="@freelabelnet">
	<meta name="twitter:creator" content="@AMRadioLIVE">
	<meta name="twitter:title" content="<?php echo $page_title; ?> | FREELABEL RADIO + MAGAZINE + STUDIOS">
	<meta name="twitter:description" content="Submit your music to get showcased on FREELABEL Magazine, Radio, TV, Events, and more!">
	<meta property="og:url" content="<?php echo $page_url; ?>">
	<meta property="og:title" content="<?php echo $page_title; ?> // FREELABEL RADIO + MAGAZINE">
	<meta property="og:description" content="Subscribe and create an account to FREELABEL.net for exclusive access to daily updated news, interviews, singles and project releases from the most influencial creators of our generation.">
	<meta property="og:image" content="<?php echo $blog_post_data['photo']; ?>">
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
	<link rel="stylesheet" type="text/css" href="http://freelabel.net/landing/view/hover/css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="http://freelabel.net/landing/view/hover/css/demo.css" />
	<link rel="stylesheet" type="text/css" href="http://freelabel.net/landing/view/hover/css/set2.css" />
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
  			min-height:100vh;
  		}
  		.blog-post-media-image , .blog-post-media-video {
  			width:100%;
  			height:auto;
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
  			height:auto;
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
  		@media (max-width: 600px) {
		  .featured_post_wrapper {
		    width: 100%;
		    font-size:0.85em;
		  }
		}
  		</style>
  	</head>
  	<body class="demo-1">
  		<div id="container" class="container intro-effect-push">
  			<!-- Top Navigation -->
  			<div class="codrops-top clearfix">
  				<!--<a class="codrops-icon codrops-icon-prev" href="http://freelabel.net/"><span>Back to Main Site</span></a>-->



  				<span class="right"><a class="codrops-icon codrops-icon-prev" href="<?php echo $config->site['http'].'?ref='.$twitter; ?>"><span>Back to Main Site</span></a></span>
  			</div>
  			<header class="header">
  				<div class="bg-img"><img src="<?php echo $blog_post_data['photo']; ?>" alt="<?php echo $blog_post_data['photo']; ?>"/></div>
  				<div class="title">
  					<nav class="codrops-demos" style="display:none;">
  						<a class="current-demo" href="index.html">Push</a>
  						<a href="index2.html">Fade Out</a>
  						<a href="index3.html">Sliced</a>
  						<a href="index4.html">Side</a>
  						<a href="index5.html">Fixed Side</a>
  						<a href="index6.html">Grid</a>
  						<a href="index7.html">Jam 3</a>
  					</nav>
  					<img class="site-logo" src="<?php echo 'http://freelabel.net/images/fllogo.png' //$config->site['logo']; ?>" style='max-width:175px;'>
  					<h1><?php echo $blogtitle ?></h1>
  					<p class="subline"><?php echo $twitter ?></p>
  				</div>
  			</header>
  			<button class="trigger" data-info="View More"><span>Trigger</span></button>
  			<div class="title">
  				<nav class="codrops-demos" style="display:none;">
  					<a class="current-demo" href="index.html">Push</a>
  					<a href="index2.html">Fade Out</a>
  					<a href="index3.html">Sliced</a>
  					<a href="index4.html">Side</a>
  					<a href="index5.html">Fixed Side</a>
  					<a href="index6.html">Grid</a>
  					<a href="index7.html">Jam 3</a>
  				</nav>
  				<h1><?php echo $blogtitle ?></h1>
  				<p class="subline"><?php echo $twitter ?></p>
  				<p><?php
  				include(ROOT.'config/share.php');
				//echo 'post id : '.$post_id;
  				findByID($post_id);
  				?></p>
  			</div>
  			<article class="content">
  				<div>
  					<?php
  					if ($blog_type=='single') {
  						$blogentry = '
  						<audio controls preload="metadata">
  						<source src="'.$trackmp3.'"></source>
  						</audio>';
  					}
  					echo $blogentry; ?>
  					<hr>
  					<?php echo $blog_post_data['writeup']; ?>

  				</div>
  			</article>

  			<section class="related-posts">
  				<?php
					echo $config->getPostsRelatedGallery($twitter);
  				//$stream_pull ='related';
  				//$search_query =$twitter;
  				//include(ROOT.'singles/related.php');
  				?>
  			</section>
  		</div><!-- /container -->

  		<script type="text/javascript" src='http://freelabel.net/config/globals.js'></script>
  		<script type="text/javascript" src='http://freelabel.net/js/modalBox-min.js'></script>
  		<script src="<?php echo HTTP.'introduction/';?>js/classie.js"></script>
  		<script>
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
		</body>
		</html>
