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





    /* SET PAGE TITLES */
    function setMetaTags() {

    }



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

      // for links using FREELABEL.NET/TOUR/
      $site['meta_tag_photo'] = $site['media']['photos']['front-page'][0]['image'];
      $site['meta_tag_title'] = $site['media']['photos']['front-page'][0]['title'];
      $site['meta_tag_caption'] = $site['media']['photos']['front-page'][0]['caption'];
    } elseif (strpos($_GET['url'], '/image/')  && isset($_GET['id'])) {

// for links using "index/image/#id"
      $promo_id = str_replace('index/image/', '', $_GET['id']);
      $current_promo = $config->getPromoByDesc($promo_id,null,null,'desc');
      // $site['meta_tag_photo'] = $current_promo[0]['image'];

  
      $site['meta_tag_title'] = $current_promo[0]['title'];
      $site['meta_tag_caption'] = $current_promo[0]['caption'];
      $site['page_title'] = $site['meta_tag_title'].' // FREELABEL'; 

      if (!$current_promo[0]['thumb']=='') {
        $site['meta_tag_photo'] = $current_promo[0]['thumb'];
      } else {
        $site['meta_tag_photo'] = $current_promo[0]['image'];
      }


    } else {
      // for links using "index/image/#id"
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
<html lang="en" class="no-js">
	<head>
		    <?php // displa meta tags
    echo $config->display_site_meta($site); ?>
    
		<link rel="stylesheet" type="text/css" href="http://freelabel.net/landing/view/off/css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="http://freelabel.net/landing/view/off/css/demo.css" />
		<link rel="stylesheet" type="text/css" href="http://freelabel.net/landing/view/off/fonts/font-awesome-4.2.0/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" href="http://freelabel.net/landing/view/off/css/menu_topside.css" />
		<!--[if IE]>
  		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="container">
			<div class="menu-wrap">
				<nav class="menu-top">
					<div class="profile"><img src="img/user1.png" alt="Matthew Greenberg"/><span>Matthew Greenberg</span></div>
					<div class="icon-list">
						<a href="#"><i class="fa fa-fw fa-star-o"></i></a>
						<a href="#"><i class="fa fa-fw fa-bell-o"></i></a>
						<a href="#"><i class="fa fa-fw fa-envelope-o"></i></a>
						<a href="#"><i class="fa fa-fw fa-comment-o"></i></a>
					</div>
				</nav>
				<nav class="menu-side">
					<a href="#">Recent Stories</a>
					<a href="#">Reading List</a>
					<a href="#">My Stories</a>
					<a href="#">Categories</a>
				</nav>
			</div>
			<button class="menu-button" id="open-button">Open Menu</button>
			<div class="content-wrap">
				<div class="content">
					<header class="codrops-header">
						<div class="codrops-links">
							<a class="codrops-icon codrops-icon-prev" href="http://tympanus.net/Development/TabStylesInspiration/"><span>Previous Demo</span></a>
							<a class="codrops-icon codrops-icon-drop" href="http://tympanus.net/codrops/?p=20100"><span>Back to the Codrops Article</span></a>
						</div>
						<p>Based on the <a href="https://dribbble.com/shots/1663008-Old-Designspiration-Menu-Concept">Dribble shot by Michael Martinho</a></p>
					</header>
				</div>
			</div><!-- /content-wrap -->
		</div><!-- /container -->
		<script src="http://freelabel.net/landing/view/off/js/classie.js"></script>
		<script src="http://freelabel.net/landing/view/off/js/main.js"></script>
	</body>
</html>