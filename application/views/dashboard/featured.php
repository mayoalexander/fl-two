<?php
  include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
  $site_url = 'http://'.$_SERVER['SERVER_NAME'].'/';
    /* HEADER THIS IS WHAT IT DOES:
    * builds the site variable
    * loads the user with the user session, and cookie data
    */

    // LOAD WEBSITE APPLICATIONS
    $app = new Config();

    // LOAD SITE DATA
    $config = new Blog($_SERVER['HTTP_HOST']);
    $site = $config->getSiteData($config->site);
    $site['media']['photos']['front-page'] = $config->getPhotoAds($site['creator'], 'freelabel front');
    $site['media']['photos']['ads'] = $config->getPhotoAds($site['creator'], 'current-promo');


    /* load page title */
    $site['page_title'] = $config->getPageTitle(strtoupper($_GET['url']));


    // LOAD USER DATA
    $user = new User();
    if (isset($_SESSION) && count($_SESSION)>0) {
      $site['user'] = $user->init($_SESSION,$_COOKIE);
      $user_logged_in = new UserDashboard(Session::get('user_name'));
      $site['user']['profile-photo'] = $profile_photo = $config->getProfilePhoto(Session::get('user_name'));
      if (isset($site['user']['name'])) {
        $site['user']['media'] = $user_data = $user_logged_in->getUserMedia(Session::get('user_name'));
      }
    } else {
    //   //$site['user'] = $user->init(,$_COOKIE);
    //   $site['user']['name'] = 'admin';
    //   $user_logged_in = new UserDashboard('admin');
    //   $site['user']['media'] = $user_logged_in->getUserMedia('admin');
    }

    $front_page_photos = $config->getPhotoAds($site['creator'], 'front');
    shuffle($front_page_photos);
    if ($user_name = Session::get('user_name')) {
        $upload_link =  'http://freelabel.net/upload/?uid='.$user_name;
    }

    if (!strpos($_GET['url'], '/image/')) {
      $site['meta_tag_photo'] = $site['media']['photos']['front-page'][0]['image'];
      $site['meta_tag_title'] = $site['media']['photos']['front-page'][0]['title'];
      $site['meta_tag_caption'] = $site['media']['photos']['front-page'][0]['caption'];
    } else {
      $promo_id = str_replace('index/image/', '', $_GET['url']);
      $current_promo = $config->getPromoById($promo_id);
      // $site['meta_tag_photo'] = $current_promo[0]['image'];
      $site['meta_tag_title'] = $current_promo[0]['title'];
      $site['meta_tag_caption'] = $current_promo[0]['caption'];
      $site['page_title'] = $site['meta_tag_title'].' // FREELABEL'; 


      if (!$current_promo[0]['thumb']=='') {
        $site['meta_tag_photo'] = $current_promo[0]['thumb'];
      } else {
        $site['meta_tag_photo'] = $current_promo[0]['image'];
      }

    }





?><!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

<html lang="en" class="no-js">
	<head>
	    <?php // displa meta tags
   		echo $config->display_site_meta($site); ?>
		<!-- Bootstrap -->
		<script src="http://freelabel.net/vendor/boxify/js/modernizr.custom.js"></script>
		<link href="http://freelabel.net/vendor/boxify/css/bootstrap.min.css" rel="stylesheet">
		<link href="http://freelabel.net/vendor/boxify/css/jquery.fancybox.css" rel="stylesheet">
		<link href="http://freelabel.net/vendor/boxify/css/flickity.css" rel="stylesheet" >
		<link href="http://freelabel.net/vendor/boxify/css/animate.css" rel="stylesheet">
		<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Nunito:400,300,700' rel='stylesheet' type='text/css'>
		<link href="http://freelabel.net/vendor/boxify/css/styles.css" rel="stylesheet">
		<link href="http://freelabel.net/vendor/boxify/css/queries.css" rel="stylesheet">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<!--[if lt IE 7]>
		<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
		<![endif]-->
		<!-- open/close -->
		<header>
			<section class="hero">
				<div class="texture-overlay"></div>
				<div class="container">
					<div class="row nav-wrapper">
						<div class="col-md-6 col-sm-6 col-xs-6 text-left">
							<a href="#"><img src="<?php echo $site['logo']; ?>" alt="Boxify Logo"></a>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-6 text-right navicon">
							<p>MENU</p><a id="trigger-overlay" class="nav_slide_button nav-toggle" href="#"><span></span></a>
						</div>
					</div>
					<div class="row hero-content">
						<div class="col-md-12">
							<h1 class="animated fadeInDown">An Exclusive, Premium HTML5 &amp; CSS3 Template by Peter Finlan, for Codrops.</h1>
							<a href="http://tympanus.net/codrops/?p=22554" class="use-btn animated fadeInUp">Use it for free</a> <a href="#about" class="learn-btn animated fadeInUp">Learn more <i class="fa fa-arrow-down"></i></a>
						</div>
					</div>
				</div>
			</section>
		</header>
		<section class="video" id="about">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<h1><a href="http://www.youtube.com/embed/9No-FiEInLA?autoplay=1&wmode=opaque&fs=1" class="youtube-media"><i class="fa fa-play-circle-o"></i> Watch the Video</a></h1>
					</div>
				</div>
			</div>
		</section>
		<section class="features-intro">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-6 nopadding features-intro-img">
						<div class="features-bg">
							<div class="texture-overlay"></div>
							<div class="features-img wp1">
								<img src="img/html5-logo.png" alt="HTML5 Logo">
							</div>
						</div>
					</div>
					<div class="col-md-6 nopadding">
						<div class="features-slider">
								<ul class="slides" id="featuresSlider">
									<li>
										<h1>The Fore-front of Design &amp; Technology</h1>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed a lorem quis neque interdum consequat ut sed sem. Duis quis tempor nunc. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
										<p><a href="#features" class="arrow-btn">Find out why this freebie rocks! <i class="fa fa-long-arrow-right"></i></a></p>
									</li>
									<li>
										<h1>Multi-Purpose User Centric Design</h1>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed a lorem quis neque interdum consequat ut sed sem. Duis quis tempor nunc. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
										<p><a href="http://tympanus.net/codrops/?p=22554" class="arrow-btn">Find out why this freebie rocks! <i class="fa fa-long-arrow-right"></i></a></p>
									</li>
									<li>
										<h1>Made with Love, Released for Free</h1>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed a lorem quis neque interdum consequat ut sed sem. Duis quis tempor nunc. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
										<p><a href="http://tympanus.net/codrops/?p=22554" class="arrow-btn">Find out why this freebie rocks! <i class="fa fa-long-arrow-right"></i></a></p>
									</li>
								</ul>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="features-list" id="features">
			<div class="container">
				<div class="row">
					<div class="col-md-12">

						<div class="col-md-4 feature-1 wp2">
							<div class="feature-icon">
								<i class="fa fa-desktop"></i>
							</div>
							<div class="feature-content">
								<h1>Responsive</h1>
								<p>Built using HTML5/CSS3 and jQuery, and built using one of the world's most powerful CSS frameworks available, Bootstrap.</p>
								<a href="http://tympanus.net/codrops/?p=22554" class="read-more-btn">Read More <i class="fa fa-chevron-circle-right"></i></a>
							</div>
						</div>
						<div class="col-md-4 feature-2 wp2 delay-05s">
							<div class="feature-icon">
								<i class="fa fa-flash"></i>
							</div>
							<div class="feature-content">
								<h1>Multi-Purpose</h1>
								<p>Perfect if you run your own start-up, product or service. Boxify can showcase your business converting your visits to income.</p>
								<a href="http://tympanus.net/codrops/?p=22554" class="read-more-btn">Read More <i class="fa fa-chevron-circle-right"></i></a>
							</div>
						</div>
						<div class="col-md-4 feature-3 wp2 delay-1s">
							<div class="feature-icon">
								<i class="fa fa-heart"></i>
							</div>
							<div class="feature-content">
								<h1>Absolutely Free</h1>
								<p>As aways, download Boxify for free exclusively from Codrops. If you love Boxify and want to thank me, simply <a href="http://peterfinlan.com/">buy me a beer</a>. </p>
								<a href="http://tympanus.net/codrops/?p=22554" class="read-more-btn">Read More <i class="fa fa-chevron-circle-right"></i></a>
							</div>
						</div>

					</div>
				</div>
			</div>
		</section>
		<section class="showcase">
			<div class="showcase-wrap">
				<div class="texture-overlay"></div>
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<div class="device wp3">
								<div class="device-content">
									<div class="showcase-slider">
										<ul class="slides" id="showcaseSlider">
											<li>
												<img src="img/screen1.jpg" alt="Device Content Image">
											</li>
											<li>
												<img src="img/screen2.jpg" alt="Device Content Image">
											</li>
											<li>
												<img src="img/screen3.jpg" alt="Device Content Image">
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<h1>Showcase your Product or Service</h1>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed a lorem quis neque interdum consequat ut sed sem. Duis quis tempor nunc. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
							<blockquote class="team-quote">
								<div class="avatar"><img src="img/avatar.png" alt="User Avatar"></div>
								<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed a lorem quis neque interdum consequat ut sed sem. Duis quis tempor nunc." - Peter Finlan</p>
								<div class="logo-quote">
									<a href="http://tympanus.net/codrops/"><img src="img/codrops-logo.png" alt="Codrops Logo"></a>
								</div>
							</blockquote>
							<a href="http://tympanus.net/codrops/?p=22554" class="download-btn">Download! <i class="fa fa-download"></i></a>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="screenshots-intro">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1>Packed Full of Powerful Features</h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed a lorem quis neque interdum consequat ut sed sem. Duis quis tempor nunc. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
						<p><a href="#screenshots" class="arrow-btn">See the screenshots! <i class="fa fa-long-arrow-right"></i></a></p>
					</div>
				</div>
			</div>
		</section>
		<section class="screenshots" id="screenshots">
			<div class="container-fluid">
				<div class="row">
					<ul class="grid">
						<li>
							<figure>
								<img src="<?php echo $site['media']['photos']['front-page'][0]['image']; ?>" alt="Screenshot 01">
								<figcaption>
								<div class="caption-content">
									<a href="img/large/01.jpg" class="single_image">
										<i class="fa fa-search"></i><br>
										<p>Optimised For Design</p>
									</a>
								</div>
								</figcaption>
							</figure>
						</li>
						<li>
							<figure>
								<img src="<?php echo $site['media']['photos']['front-page'][1]['image']; ?>" alt="Screenshot 01">
								<figcaption>
								<div class="caption-content">
									<a href="img/large/02.jpg" class="single_image">
										<i class="fa fa-search"></i><br>
										<p>User Centric Design</p>
									</a>
								</div>
								</figcaption>
							</figure>
						</li>
						<li>
							<figure>
								<img src="<?php echo $site['media']['photos']['front-page'][2]['image']; ?>" alt="Screenshot 01">
								<figcaption>
								<div class="caption-content">
									<a href="img/large/03.jpg" class="single_image">
										<i class="fa fa-search"></i><br>
										<p>Responsive and Adaptive</p>
									</a>
								</div>
								</figcaption>
							</figure>
						</li>
						<li>
							<figure>
								<img src="<?php echo $site['media']['photos']['front-page'][3]['image']; ?>" alt="Screenshot 01">
								<figcaption>
								<div class="caption-content">
									<a href="img/large/04.jpg" class="single_image">
										<i class="fa fa-search"></i><br>
										<p>Absolutely Free</p>
									</a>
								</div>
								</figcaption>
							</figure>
						</li>
					</ul>
				</div>
				<div class="row">
					<ul class="grid">
						<li>
							<figure>
								<img src="<?php echo $site['media']['photos']['front-page'][4]['image']; ?>" alt="Screenshot 01">
								<figcaption>
								<div class="caption-content">
									<a href="img/large/05.jpg" class="single_image">
										<i class="fa fa-search"></i><br>
										<p>Multi-Purpose Design</p>
									</a>
								</div>
								</figcaption>
							</figure>
						</li>
						<li>
							<figure>
								<img src="<?php echo $site['media']['photos']['front-page'][5]['image']; ?>" alt="Screenshot 01">
								<figcaption>
								<div class="caption-content">
									<a href="img/large/06.jpg" class="single_image">
										<i class="fa fa-search"></i><br>
										<p>Exclusive to Codrops</p>
									</a>
								</div>
								</figcaption>
							</figure>
						</li>
						<li>
							<figure>
								<img src="<?php echo $site['media']['photos']['front-page'][6]['image']; ?>" alt="Screenshot 01">
								<figcaption>
								<div class="caption-content">
									<a href="img/large/07.jpg" class="single_image">
										<i class="fa fa-search"></i><br>
										<p>Made with Love</p>
									</a>
								</div>
								</figcaption>
							</figure>
						</li>
						<li>
							<figure>
								<img src="<?php echo $site['media']['photos']['front-page'][7]['image']; ?>" alt="Screenshot 01">
								<figcaption>
								<div class="caption-content">
									<a href="img/large/08.jpg" class="single_image">
										<i class="fa fa-search"></i><br>
										<p>In Sydney, Australia</p>
									</a>
								</div>
								</figcaption>
							</figure>
						</li>
					</ul>
				</div>
			</div>
		</section>
		<section class="download" id="download">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center wp4">
						<h1>Seen Enough?</h1>
						<a href="http://tympanus.net/codrops/?p=22554" class="download-btn">Download! <i class="fa fa-download"></i></a>
					</div>
				</div>
			</div>
		</section>
		<footer>
			<div class="container">
				<div class="row">
					<div class="col-md-5">
						<h1 class="footer-logo">
						<img src="img/logo-blue.png" alt="Footer Logo Blue">
						</h1>
						<p>© Boxify 2015 - <a href="http://tympanus.net/codrops/licensing/">Licence</a> - Designed &amp; Developed by <a href="http://www.peterfinlan.com/">Peter Finlan</a></p>
					</div>
					<div class="col-md-7">
						<ul class="footer-nav">
							<li><a href="#about">About</a></li>
							<li><a href="#features">Features</a></li>
							<li><a href="#screenshots">Screenshots</a></li>
							<li><a href="#download">Download</a></li>
						</ul>
					</div>
				</div>
			</div>
		</footer>
		<div class="overlay overlay-boxify">
			<nav>
				<ul>
					<li><a href="#about"><i class="fa fa-heart"></i>About</a></li>
					<li><a href="#features"><i class="fa fa-flash"></i>Features</a></li>
				</ul>
				<ul>
					<li><a href="#screenshots"><i class="fa fa-desktop"></i>Screenshots</a></li>
					<li><a href="#download"><i class="fa fa-download"></i>Download</a></li>
				</ul>
			</nav>
		</div>
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="http://freelabel.net/vendor/boxify/js/min/toucheffects-min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="http://freelabel.net/vendor/boxify/js/flickity.pkgd.min.js"></script>
		<script src="http://freelabel.net/vendor/boxify/js/jquery.fancybox.pack.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="http://freelabel.net/vendor/boxify/js/retina.js"></script>
		<script src="http://freelabel.net/vendor/boxify/js/waypoints.min.js"></script>
		<script src="http://freelabel.net/vendor/boxify/js/bootstrap.min.js"></script>
		<script src="http://freelabel.net/vendor/boxify/js/min/scripts-min.js"></script>
		<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
		<script>
		(function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
		function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
		e=o.createElement(i);r=o.getElementsByTagName(i)[0];
		e.src='//www.google-analytics.com/analytics.js';
		r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
		ga('create','UA-XXXXX-X');ga('send','pageview');
		</script>
	</body>
</html>
