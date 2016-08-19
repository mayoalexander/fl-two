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
		<style type="text/css">
			.hero {
				background: rgb(40, 70, 102) url('<?php echo $site['media']['photos']['front-page'][4]['image']; ?>') no-repeat center center;
				background-size: 200%;
			}
			.features-bg {
				background: rgb(40, 70, 102) url('<?php echo $site['media']['photos']['front-page'][0]['image']; ?>') no-repeat center center;
				background-size: 110%;
				/*background-image:url('http://thatgrapejuice.net/wp-content/uploads/2016/03/streaming-2016-music.jpg');*/

			}
			.showcase {
				background: rgb(40, 70, 102) url('<?php echo $site['media']['photos']['front-page'][6]['image']; ?>') no-repeat center center;
				background-size: 200%;
			}
			.site-logo {
			    width: 60px;
			    border-radius: 2px;
			}
			.read-more-btn {
				/*color:#4e9ba3;*/
				/*color:#e3e3e3;*/
				color:#4e9ba3;
				border:#4e9ba3 solid 1px;
				padding: 1.2em;
				border-radius: 2px;
				font-size:1.1em;
				/*width:100%;*/
			}
			.heading-subtext {
				font-size:0.5em;
			}
			.avatar-logo {
				width:60px;
			}
			.feature-content li, .team-quote li, .pricing__feature-heading {
				color:#778899;
				color:#e3e3e3;
			}
			.pricing__feature-heading {
				text-decoration: underline;
				margin-bottom: 0.5em;
				padding-bottom: 0.5em;
			}
			@media (max-width: 1068px) {
				.features-bg {
					background-size:130%;
				}
			}
			@media (max-width: 768px) {
				.features-bg {
					background-size:100%;
				}
			}
			@media (max-width: 668px) {
				.features-bg {
					background-size:150%;
				}
				.hero , .showcase {
					background-size: 300%;
				}
			}
			@media (max-width: 468px) {
				.hero , .showcase {
					background-size:600%;
				}
				.features-bg {
					background-size: 200%;
					background-position:left;
				}
			}
		</style>
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
							<a href="<?php echo $site['http']; ?>#"><img class="site-logo" src="<?php echo $site['logo']; ?>" alt="Boxify Logo"></a>
						</div>
	<!-- 					<div class="col-md-6 col-sm-6 col-xs-6 text-right navicon">
							<p>MENU</p><a id="trigger-overlay" class="nav_slide_button nav-toggle" href="#"><span></span></a>
						</div> -->
					</div>
					<div class="row hero-content">
						<div class="col-md-12">
							<h1 class="animated fadeInDown"><?php echo $site['name'].' <span class="heading-subtext text-muted">'.$site['description'].'</span>';?></h1>
							<!-- <a href="http://freelabel.net/confirm/trial/" target="_blank" class="use-btn animated fadeInUp">Start FREETRIAL <i class="fa fa-check"></i></a> <a href="http://freelabel.net/users/index/marketing_pricing/#pricing" class="learn-btn animated fadeInUp">Artist Packages <i class="fa fa-arrow-right"></i></a> -->
							<a href="http://freelabel.net/confirm/plus/" target="_blank" class="use-btn animated fadeInUp">Create An Account <i class="fa fa-check"></i></a> 
							<!-- <a href="http://freelabel.net/pricing/#pricing" class="learn-btn animated fadeInUp">Signup as Artist <i class="fa fa-arrow-right"></i></a> -->
						</div>
					</div>
				</div>
			</section>
		</header>
		<section class="features-intro">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-6 nopadding features-intro-img">
						<div class="features-bg">
							<div class="texture-overlay"></div>
							<div class="features-img wp1">
								<!-- <img class="distribution-" src="http://thatgrapejuice.net/wp-content/uploads/2016/03/streaming-2016-music.jpg" alt="HTML5 Logo"> -->
							</div>
						</div>
					</div>
					<div class="col-md-6 nopadding">
						<div class="features-slider">
								<ul class="slides" id="featuresSlider">
									<li>
										<h1><?php echo $site['landing-info'][0].'</span>';?></h1>
										<p><?php echo $site['landing-info'][1].'</span>';?></p>
										<!-- <p><a href="#features" class="arrow-btn">Find out why this freebie rocks! <i class="fa fa-long-arrow-right"></i></a></p> -->
									</li>
									<li>
										<h1><?php echo $site['landing-info'][2].'</span>';?></h1>
										<p><?php echo $site['landing-info'][3].'</span>';?></p>
										<!-- <p><a href="http://freelabel.net/users/index/marketing_pricing/" class="arrow-btn">Find out why this freebie rocks! <i class="fa fa-long-arrow-right"></i></a></p> -->
									</li>
									<li>
										<h1><?php echo $site['landing-info'][4].'</span>';?></h1>
										<p><?php echo $site['landing-info'][5].'</span>';?></p>
										<!-- <p><a href="http://freelabel.net/users/index/marketing_pricing/" class="arrow-btn">Find out why this freebie rocks! <i class="fa fa-long-arrow-right"></i></a></p> -->
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
								<i class="fa fa-heart"></i>
							</div>
							<div class="feature-content">
								<h1>Save and Build an Exclusive Playlist of your Favorites</h1>
								<p><?php echo $site['landing-info']['instruction'][0].'</span>';?></p>
								<!-- <a href="#pricing" class="read-more-btn">Read More <i class="fa fa-chevron-circle-right"></i></a> -->
							</div>
						</div>
						<div class="col-md-4 feature-2 wp2 delay-05s">
							<div class="feature-icon">
								<i class="fa fa-cloud-upload"></i>
							</div>
							<div class="feature-content">
								<h1>Upload and Showcase Your Music + Videos + Products</h1>
								<p><?php echo $site['landing-info']['instruction'][1].'</span>';?></p>
								<!-- <a href="#pricing" class="read-more-btn">Read More <i class="fa fa-chevron-circle-right"></i></a> -->
							</div>
						</div>
						<div class="col-md-4 feature-3 wp2 delay-1s">
							<div class="feature-icon">
								<i class="fa fa-flash"></i>
							</div>
							<div class="feature-content">
								<h1>Get Updated with the Latest Content First</h1>
								<p><?php echo $site['landing-info']['instruction'][2].'</span>';?></p>
								<!-- <a href="#pricing" class="read-more-btn">Read More <i class="fa fa-chevron-circle-right"></i></a> -->
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
												<img src="http://freelabel.net/upload/server/php/upload/thumb/mobile-site-screenshot--302277916-.png" alt="Device Content Image">
											</li>
											<li>
												<img src="http://freelabel.net/upload/server/php/upload/thumb/mobile-site-screenshot--302277916-.png" alt="Device Content Image">
											</li>
											<li>
												<img src="http://freelabel.net/upload/server/php/upload/thumb/mobile-site-screenshot--302277916-.png" alt="Device Content Image">
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<!-- <h1>Create Your Account and Upload Your Music/Videos to get Showcased and Distributed on Major Platforms, Blogs, Projects + Events</h1> -->
							<h1>FREELABEL provides an experience on iPhone & Android by turning music and content into a living mobile magazine</h1>
							<p><?php echo $site['landing-info'][18].'</span>';?></p>
							<blockquote class="team-quote">
								<!-- <div class="avatar"><img class="avatar-logo" src="http://freelabel.net/images/fllogo.png" alt="User Avatar"></div> -->
								<!-- <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed a lorem quis neque interdum consequat ut sed sem. Duis quis tempor nunc." - Peter Finlan</p> -->
								<h5 class="pricing__feature-heading">Account Includes</h5>
								<ul class="pricing__feature-list">
			                        <li class="pricing__feature">24/7 Radio Rotation</li>
			                        <li class="pricing__feature">Full TV, Movie, Podcast, and Album Streaming</li>
			                        <li class="pricing__feature">Events and Project Releases</li>
			                        <li class="pricing__feature">Clothing, Accessories, Equipment, Product Reviews</li>
			                        <!-- <li class="pricing__feature">Full One-Hour Radio Show Broadcasting Your Projects Live On-air</li> -->
			                    </ul>
							</blockquote>
							<!-- <a href="http://freelabel.net/users/index/marketing_pricing/" class="download-btn">Basic - $59/month <i class="fa fa-arrow-right"></i></a> -->
							<a href="http://freelabel.net/confirm/plus/" target="_blank" class="download-btn">$10/month <i class="fa fa-arrow-right"></i></a>
							<a href="http://freelabel.net/confirm/tour/" target="_blank" class="use-btn">$90/year <i class="fa fa-arrow-right"></i></a>
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
						<p>FREELABEL provides an experience on iPhone & Android by turning music and content into a living mobile magazine. You can drop new singles, and add an endless stream of articles, photos, and videos at any time. Build hype, streamline your promotional content, and send fans to a single mobile destination with automatic notifications. Leverage upcoming FREELABEL™ tools to monetize music and performances, and gain valuable insight into fan engagement analytics.
								</p>
						<p><a href="#screenshots" class="arrow-btn">Checkout our current artists and brands! <i class="fa fa-long-arrow-right"></i></a></p>
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
								<img src="<?php echo $site['media']['photos']['ads'][0]['image']; ?>" alt="Screenshot 01">
								<figcaption>
								<div class="caption-content">
									<a href="http://freelabel.net/users/index/image/<?php echo $site['media']['photos']['ads'][0]['id']; ?>" class="single_image">
										<i class="fa fa-search"></i><br>
										<p><?php echo $site['media']['photos']['ads'][0]['title']; ?></p>
									</a>
								</div>
								</figcaption>
							</figure>
						</li>
						<li>
							<figure>
								<img src="<?php echo $site['media']['photos']['ads'][1]['image']; ?>" alt="Screenshot 01">
								<figcaption>
								<div class="caption-content">
									<a href="http://freelabel.net/users/index/image/<?php echo $site['media']['photos']['ads'][1]['id']; ?>" class="single_image">
										<i class="fa fa-search"></i><br>
										<p><?php echo $site['media']['photos']['ads'][1]['title']; ?></p>
									</a>
								</div>
								</figcaption>
							</figure>
						</li>
						<li>
							<figure>
								<img src="<?php echo $site['media']['photos']['ads'][2]['image']; ?>" alt="Screenshot 01">
								<figcaption>
								<div class="caption-content">
									<a href="http://freelabel.net/users/index/image/<?php echo $site['media']['photos']['ads'][2]['id']; ?>" class="single_image">
										<i class="fa fa-search"></i><br>
										<p><?php echo $site['media']['photos']['ads'][2]['title']; ?></p>
									</a>
								</div>
								</figcaption>
							</figure>
						</li>
						<li>
							<figure>
								<img src="<?php echo $site['media']['photos']['ads'][3]['image']; ?>" alt="<?php echo $site['media']['photos']['ads'][3]['title']; ?>">
								<figcaption>
								<div class="caption-content">
									<a href="http://freelabel.net/users/index/image/<?php echo $site['media']['photos']['ads'][3]['id']; ?>" class="single_image">
										<i class="fa fa-search"></i><br>
										<p><?php echo $site['media']['photos']['ads'][3]['title']; ?></p>
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
								<img src="<?php echo $site['media']['photos']['ads'][4]['image']; ?>" alt="Screenshot 01">
								<figcaption>
								<div class="caption-content">
									<a href="http://freelabel.net/users/index/image/<?php echo $site['media']['photos']['ads'][4]['id']; ?>" class="single_image">
										<i class="fa fa-search"></i><br>
										<p><?php echo $site['media']['photos']['ads'][4]['title']; ?></p>
									</a>
								</div>
								</figcaption>
							</figure>
						</li>
						<li>
							<figure>
								<img src="<?php echo $site['media']['photos']['ads'][5]['image']; ?>" alt="Screenshot 01">
								<figcaption>
								<div class="caption-content">
									<a href="http://freelabel.net/users/index/image/<?php echo $site['media']['photos']['ads'][5]['id']; ?>" class="single_image">
										<i class="fa fa-search"></i><br>
										<p><?php echo $site['media']['photos']['ads'][5]['title']; ?></p>
									</a>
								</div>
								</figcaption>
							</figure>
						</li>
						<li>
							<figure>
								<img src="<?php echo $site['media']['photos']['ads'][6]['image']; ?>" alt="Screenshot 01">
								<figcaption>
								<div class="caption-content">
									<a href="http://freelabel.net/users/index/image/<?php echo $site['media']['photos']['ads'][6]['id']; ?>" class="single_image">
										<i class="fa fa-search"></i><br>
										<p><?php echo $site['media']['photos']['ads'][6]['title']; ?></p>
									</a>
								</div>
								</figcaption>
							</figure>
						</li>
						<li>
							<figure>
								<img src="<?php echo $site['media']['photos']['ads'][7]['image']; ?>" alt="Screenshot 01">
								<figcaption>
								<div class="caption-content">
									<a href="http://freelabel.net/users/index/image/<?php echo $site['media']['photos']['ads'][7]['id']; ?>" class="single_image">
										<i class="fa fa-search"></i><br>
										<p><?php echo $site['media']['photos']['ads'][7]['title']; ?></p>
									</a>
								</div>
								</figcaption>
							</figure>
						</li>
					</ul>
				</div>
			</div>
		</section>
		<footer>
			<div class="container">
				<div class="row">
					<div class="col-md-5">
						<h1 class="footer-logo">
						<!-- <img src="http://freelabel.net/images/FREELABELLOGO.gif" alt="Footer Logo Blue"> -->
						</h1>
						<p>© FREELABEL NETWORKS 2016 - Designed &amp; Developed by <a href="http://www.freelabel.net/alexmayo">Alex Mayo</a></p>
					</div>
					<div class="col-md-7">
						<ul class="footer-nav">
							<li><a href="<?php echo $site['http']; ?>">Home</a></li>
							<li><a href="<?php echo $site['http'].'pricing/#pricing'; ?>">Artist Accounts</a></li>
							<li><a href="<?php echo $site['http'].'radio/'; ?>" target="_blank">Radio</a></li>
							<!-- <li><a href="#download">Radio</a></li> -->
						</ul>
					</div>
				</div>
			</div>
		</footer>
		<!-- <div class="overlay overlay-boxify">
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
		</div> -->
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
