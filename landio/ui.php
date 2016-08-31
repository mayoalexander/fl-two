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

  $config->view('head.php',$site);
  $config->view('ui.php',$site);
  $config->view('footer.php',$site);



?>
