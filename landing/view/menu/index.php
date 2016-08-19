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





?>
<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Blueprint: Multi-Level Menu</title>
	<meta name="description" content="Blueprint: A basic template for a responsive multi-level menu" />
	<meta name="keywords" content="blueprint, template, html, css, menu, responsive, mobile-friendly" />
	<meta name="author" content="Codrops" />
	<link rel="shortcut icon" href="http://freelabel.net/landing/view/menu/favicon.ico">
	<!-- food icons -->
	<link rel="stylesheet" type="text/css" href="http://freelabel.net/landing/view/menu/css/organicfoodicons.css" />
	<!-- demo styles -->
	<link rel="stylesheet" type="text/css" href="http://freelabel.net/landing/view/menu/css/demo.css" />
	<!-- menu styles -->
	<link rel="stylesheet" type="text/css" href="http://freelabel.net/landing/view/menu/css/component.css" />
	<script src="http://freelabel.net/landing/view/menu/js/modernizr-custom.js"></script>
</head>

<body>
	<!-- Main container -->
	<div class="container">
		<!-- Blueprint header -->
		<header class="bp-header cf">
			<div class="dummy-logo">
				<div class="dummy-icon foodicon foodicon--coconut"></div>
				<h2 class="dummy-heading">Fooganic</h2>
			</div>
			<div class="bp-header__main">
				<span class="bp-header__present">Blueprint <span class="bp-tooltip bp-icon bp-icon--about" data-content="The Blueprints are a collection of basic and minimal website concepts, components, plugins and layouts with minimal style for easy adaption and usage, or simply for inspiration."></span></span>
				<h1 class="bp-header__title">Multi-Level Menu</h1>
				<nav class="bp-nav">
					<a class="bp-nav__item bp-icon bp-icon--prev" href="http://tympanus.net/Blueprints/PageStackNavigation/" data-info="previous Blueprint"><span>Previous Blueprint</span></a>
					<!--a class="bp-nav__item bp-icon bp-icon--next" href="" data-info="next Blueprint"><span>Next Blueprint</span></a-->
					<a class="bp-nav__item bp-icon bp-icon--drop" href="http://tympanus.net/codrops/?p=25521" data-info="back to the Codrops article"><span>back to the Codrops article</span></a>
					<a class="bp-nav__item bp-icon bp-icon--archive" href="http://tympanus.net/codrops/category/blueprints/" data-info="Blueprints archive"><span>Go to the archive</span></a>
				</nav>
			</div>
		</header>
		<button class="action action--open" aria-label="Open Menu"><span class="icon icon--menu"></span></button>
		<nav id="ml-menu" class="menu">
			<button class="action action--close" aria-label="Close Menu"><span class="icon icon--cross"></span></button>
			<div class="menu__wrap">
				<ul data-menu="main" class="menu__level">
					<li class="menu__item"><a class="menu__link" data-submenu="submenu-1" href="#">Vegetables</a></li>
					<li class="menu__item"><a class="menu__link" data-submenu="submenu-2" href="#">Fruits</a></li>
					<li class="menu__item"><a class="menu__link" data-submenu="submenu-3" href="#">Grains</a></li>
					<li class="menu__item"><a class="menu__link" data-submenu="submenu-4" href="#">Mylk &amp; Drinks</a></li>
				</ul>
				<!-- Submenu 1 -->
				<ul data-menu="submenu-1" class="menu__level">
					<li class="menu__item"><a class="menu__link" href="#">Stalk Vegetables</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Roots &amp; Seeds</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Cabbages</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Salad Greens</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Mushrooms</a></li>
					<li class="menu__item"><a class="menu__link" data-submenu="submenu-1-1" href="#">Sale %</a></li>
				</ul>
				<!-- Submenu 1-1 -->
				<ul data-menu="submenu-1-1" class="menu__level">
					<li class="menu__item"><a class="menu__link" href="#">Fair Trade Roots</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Dried Veggies</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Our Brand</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Homemade</a></li>
				</ul>
				<!-- Submenu 2 -->
				<ul data-menu="submenu-2" class="menu__level">
					<li class="menu__item"><a class="menu__link" href="#">Citrus Fruits</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Berries</a></li>
					<li class="menu__item"><a class="menu__link" data-submenu="submenu-2-1" href="#">Special Selection</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Tropical Fruits</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Melons</a></li>
				</ul>
				<!-- Submenu 2-1 -->
				<ul data-menu="submenu-2-1" class="menu__level">
					<li class="menu__item"><a class="menu__link" href="#">Exotic Mixes</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Wild Pick</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Vitamin Boosters</a></li>
				</ul>
				<!-- Submenu 3 -->
				<ul data-menu="submenu-3" class="menu__level">
					<li class="menu__item"><a class="menu__link" href="#">Buckwheat</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Millet</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Quinoa</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Wild Rice</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Durum Wheat</a></li>
					<li class="menu__item"><a class="menu__link" data-submenu="submenu-3-1" href="#">Promo Packs</a></li>
				</ul>
				<!-- Submenu 3-1 -->
				<ul data-menu="submenu-3-1" class="menu__level">
					<li class="menu__item"><a class="menu__link" href="#">Starter Kit</a></li>
					<li class="menu__item"><a class="menu__link" href="#">The Essential 8</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Bolivian Secrets</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Flour Packs</a></li>
				</ul>
				<!-- Submenu 4 -->
				<ul data-menu="submenu-4" class="menu__level">
					<li class="menu__item"><a class="menu__link" href="#">Grain Mylks</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Seed Mylks</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Nut Mylks</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Nutri Drinks</a></li>
					<li class="menu__item"><a class="menu__link" data-submenu="submenu-4-1" href="#">Selection</a></li>
				</ul>
				<!-- Submenu 4-1 -->
				<ul data-menu="submenu-4-1" class="menu__level">
					<li class="menu__item"><a class="menu__link" href="#">Nut Mylk Packs</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Amino Acid Heaven</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Allergy Free</a></li>
				</ul>
			</div>
		</nav>
		<div class="content">
			<p class="info">Please choose a category</p>
			<!-- Ajax loaded content here -->
		</div>
	</div>
	<!-- /view -->
	<script src="js/classie.js"></script>
	<script src="js/dummydata.js"></script>
	<script src="js/main.js"></script>
	<script>
	(function() {
		var menuEl = document.getElementById('ml-menu'),
			mlmenu = new MLMenu(menuEl, {
				// breadcrumbsCtrl : true, // show breadcrumbs
				// initialBreadcrumb : 'all', // initial breadcrumb text
				backCtrl : false, // show back button
				// itemsDelayInterval : 60, // delay between each menu item sliding animation
				onItemClick: loadDummyData // callback: item that doesn´t have a submenu gets clicked - onItemClick([event], [inner HTML of the clicked item])
			});

		// mobile menu toggle
		var openMenuCtrl = document.querySelector('.action--open'),
			closeMenuCtrl = document.querySelector('.action--close');

		openMenuCtrl.addEventListener('click', openMenu);
		closeMenuCtrl.addEventListener('click', closeMenu);

		function openMenu() {
			classie.add(menuEl, 'menu--open');
		}

		function closeMenu() {
			classie.remove(menuEl, 'menu--open');
		}

		// simulate grid content loading
		var gridWrapper = document.querySelector('.content');

		function loadDummyData(ev, itemName) {
			ev.preventDefault();

			closeMenu();
			gridWrapper.innerHTML = '';
			classie.add(gridWrapper, 'content--loading');
			setTimeout(function() {
				classie.remove(gridWrapper, 'content--loading');
				gridWrapper.innerHTML = '<ul class="products">' + dummyData[itemName] + '<ul>';
			}, 700);
		}
	})();
	</script>
</body>

</html>
