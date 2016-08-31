<?php
include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
//require ROOT.'vendor/autoload.php';
//$log = new Monolog\Logger('name');
//$log->pushHandler(new Monolog\Handler\StreamHandler('app.log', Monolog\Logger::WARNING));
//$log->addWarning('Foo');
    /* HEADER THIS IS WHAT IT DOES:
    * builds the site variable
    * loads the user with the user session, and cookie data
    *
    * 1.    Blog() - loads the content & site data into $site variable
    * 2.    User() - loads the user data into $site['user'] variable
    * 3.    UserDashboard() - loads the user profile data & methods into $site['user'] variable
    * 4.    Config() - loads the APP widgets
    *
    */

    include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
    /* HEADER THIS IS WHAT IT DOES:
    * builds the site variable
    * loads the user with the user session, and cookie data
    *
    *

    */

    // LOAD WEBSITE APPLICATIONS

    $app = new Config();
    // LOAD SITE DATA
    $config = new Blog($_SERVER['HTTP_HOST']);
    $site = $config->getSiteData($config->site);
    if ($_GET['dev']) {
      $site['enviroment']='PRODUCTION';
    } else {
      $site['enviroment']='LIVE';
    }
    $site['media']['photos']['front-page'] = $config->getPhotoAds($site['creator'], 'front');

    // LOAD USER DATA
    $user = new User();
    if (isset($_SESSION) OR isset($_COOKIE['fl-user-name'])) {
      $site['user'] = $user->init($_SESSION,$_COOKIE);
      $user_logged_in = new UserDashboard($site['user']['name']);
      $site['user']['profile-photo'] = $profile_photo = $user_logged_in->getProfilePhoto($site['user']['name']);
      $site['user']['media'] = $user_data = $user_logged_in->getUserMedia($site['user']['name'] , 'all');
    }

    $front_page_photos = $config->getPhotoAds($site['creator'], 'front');


    shuffle($front_page_photos);
    if ($page_title=='') {
      $page_title = $site['title'];
    }
    if ($meta_tag_photo=='') {
      $meta_tag_photo = "http://freelabel.net/images/fllogo.png";
    } else {
      //$meta_tag_photo = "http://freelabel.net/images/fllogo.png";
    }

$site_url = 'http://'.$_SERVER['SERVER_NAME'].'/';


if (EVN=='DEVELOPMENT' OR $_GET['dev']) {
    echo EVN.'<pre>';
    print_r($site);
    echo '</pre>';
    exit;
}

if ($_GET['debug']) {
  print_r($site);
} else {

}



?>

<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Google Nexus Website Menu</title>
		<meta name="description" content="A sidebar menu as seen on the Google Nexus 7 website" />
		<meta name="keywords" content="google nexus 7 menu, css transitions, sidebar, side menu, slide out menu" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<!-- <link rel="stylesheet" type="text/css" href="css/demo.css" /> -->
		<link rel="stylesheet" type="text/css" href="http://freelabel.net/landing/view/nexus/css/component.css" />
		<script src="js/modernizr.custom.js"></script>
	</head>
	<body>
		<div class="container">
			<ul id="gn-menu" class="gn-menu-main">
				<li class="gn-trigger">
					<a class="gn-icon gn-icon-menu"><span>Menu</span></a>
					<nav class="gn-menu-wrapper">
						<div class="gn-scroller">
							<ul class="gn-menu">
								<li class="gn-search-item">
									<input placeholder="Search" type="search" class="gn-search">
									<a class="gn-icon gn-icon-search"><span>Search</span></a>
								</li>
								<li>
									<a class="gn-icon gn-icon-download">Downloads</a>
									<ul class="gn-submenu">
										<li><a class="gn-icon gn-icon-illustrator">Vector Illustrations</a></li>
										<li><a class="gn-icon gn-icon-photoshop">Photoshop files</a></li>
									</ul>
								</li>
								<li><a class="gn-icon gn-icon-cog">Settings</a></li>
								<li><a class="gn-icon gn-icon-help">Help</a></li>
								<li>
									<a class="gn-icon gn-icon-archive">Archives</a>
									<ul class="gn-submenu">
										<li><a class="gn-icon gn-icon-article">Articles</a></li>
										<li><a class="gn-icon gn-icon-pictures">Images</a></li>
										<li><a class="gn-icon gn-icon-videos">Videos</a></li>
									</ul>
								</li>
							</ul>
						</div><!-- /gn-scroller -->
					</nav>
				</li>
				<li><a href="http://tympanus.net/codrops"><img src="<?php echo $site['logo']; ?>" style="max-height:48px;" ></a></li>
				<li><a class="codrops-icon codrops-icon-prev" href="http://tympanus.net/Development/HeaderEffects/"><span>Previous Demo</span></a></li>
				<li><a class="codrops-icon " href="http://tympanus.net/codrops/?p=16030"></a></li>
			</ul>
			<header>
				<h1>Google Nexus Website Menu <span>A sidebar menu as seen on the <a href="http://www.google.com/nexus/index.html">Google Nexus 7</a> page</span></h1>	
			</header> 
		</div><!-- /container -->
		<script src="http://freelabel.net/landing/view/nexus/js/classie.js"></script>
		<script src="http://freelabel.net/landing/view/nexus/js/gnmenu.js"></script>
		<script>
			new gnMenu( document.getElementById( 'gn-menu' ) );
		</script>
	</body>
</html>