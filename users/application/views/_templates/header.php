<?php
 include_once('/home/content/59/13071759/html/config/index.php');
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
    $site['media']['photos']['front-page'] = $config->getPhotoAds($site['creator'], 'front');
    // LOAD USER DATA

    if (!$_SESSION) {

    }

    $user = new User();
    if (isset($_SESSION) && count($_SESSION)>0) {
      $site['user'] = $user->init($_SESSION,$_COOKIE);
      $user_logged_in = new UserDashboard(Session::get('user_name'));
      $site['user']['profile-photo'] = $profile_photo = $user_logged_in->getProfilePhoto(Session::get('user_name'));
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
    if ($user_name = Session::get('user_name')) {
        $upload_link =  'http://freelabel.net/upload/?uid='.$user_name;
    }
    if (isset($_GET['dev'])) {
      //echo $config->site.'<hr>';
      echo '<pre>';
      // print_r($_COOKIE);
      // echo $config->debug($site);

      // echo $config->debug($this);
      // echo $config->debug($_SESSION);
      echo $config->debug($site);
      // $config->debug($site['user']['name']);

      // print_r($this);
      //print_r($site['user']);
      exit;
    }

    shuffle($front_page_photos);
    if (!isset($page_title)) {
      $page_title = $site['title'];
    }
    if ($meta_tag_photo=='') {
      $meta_tag_photo = "http://freelabel.net/images/fllogo.png";
    } else {
      //$meta_tag_photo = "http://freelabel.net/images/fllogo.png";
    }




$site_url = 'http://'.$_SERVER['SERVER_NAME'].'/';
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $site['name']; ?></title>
    <meta name="description" content="<?php echo $site['description']; ?>" />
    <meta name="keywords" content="<?php echo $site['keywords']; ?>" />
    <meta name="author" content="<?php echo $site['author']; ?>" />
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo $site['logo']; ?>">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo $site['logo']; ?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo $site['logo']; ?>">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo $site['logo']; ?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo $site['logo']; ?>">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo $site['logo']; ?>">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo $site['logo']; ?>">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo $site['logo']; ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $site['logo']; ?>">
    <link rel="icon" type="image/png" href="<?php echo $site['logo']; ?>" sizes="32x32">
    <link rel="icon" type="image/png" href="<?php echo $site['logo']; ?>" sizes="192x192">
    <link rel="icon" type="image/png" href="<?php echo $site['logo']; ?>" sizes="96x96">
    <link rel="icon" type="image/png" href="<?php echo $site['logo']; ?>" sizes="16x16">
    <link rel="manifest" href="http://freelabel.net/landio/img/favicon/manifest.json">
    <link rel="shortcut icon" href="<?php echo $site['logo']; ?>">
    <meta name="msapplication-TileColor" content="#663fb5">
    <meta name="msapplication-TileImage" content="<?php echo $site['logo']; ?>">
    <meta name="msapplication-config" content="http://freelabel.net/landio/img/favicon/browserconfig.xml">
    <meta name="theme-color" content="#663fb5">
    <link rel="stylesheet" href="http://freelabel.net/landio/css/landio.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://code.createjs.com/createjs-2015.05.21.min.js">
    <link rel="stylesheet" type="text/css" href="http://freelabel.net/landing/view/nexus/css/component.css" />
    <link rel="stylesheet" type="text/css" href="http://freelabel.net/css/bootstrap-social/bootstrap-social.css"/>
    <link rel="stylesheet" type="text/css" href="http://freelabel.net/landing/view/tabs/css/tabs.css">
    <link rel="stylesheet" type="text/css" href="http://freelabel.net/landing/view/tabs/css/tabstyles.css">
    <link rel="stylesheet" type="text/css" href="http://freelabel.net/jPlayer/dist/skin/pink.flag/css/jplayer.pink.flag.css">
    <link href='https://fonts.googleapis.com/css?family=Oswald:400|Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
    <!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
    <link rel="stylesheet" href="http://freelabel.net/upload/css/jquery.fileupload.css">
    <link rel="stylesheet" href="http://freelabel.net/upload/css/jquery.fileupload-ui.css">
    <link rel="stylesheet" href="http://freelabel.net/js/jquery-ui.min.css">

    <!-- CSS adjustments for browsers with JavaScript disabled -->
    <noscript><link rel="stylesheet" href="http://freelabel.net/css/jquery.fileupload-noscript.css"></noscript>
    <noscript><link rel="stylesheet" href="http://freelabel.net/css/jquery.fileupload-ui-noscript.css"></noscript>
    <style>
    /* Hide Angular JS elements before initializing */
    .ng-cloak {
        display: none;
    }
    </style>

    <script src="http://freelabel.net/landing/view/tabs/js/modernizr.custom.js"></script>
    <script src="http://freelabel.net/js/list.js"></script>
    <!-- CSS -->
    <!-- <link rel="stylesheet" href="<?php echo URL; ?>public/css/reset.css" /> -->
    <!-- <link rel="stylesheet" href="<?php echo URL; ?>public/css/style.css" /> -->
    <!-- in case you wonder: That's the cool-kids-protocol-free way to load jQuery -->
    <script type="text/javascript" src="//code.jquery.com/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>public/js/application.js"></script>


    
    <style type="text/css">
    /* INTEGRATE INTO CSS FILE */
    html {
      overflow-x:hidden;
      margin-top:60px;
    }
    body {
      padding: 0 0%;
    }
    /*heading fonts */
    html, body , .bg-faded, .pricing-box{
      background-color: #101010;
      color:#e3e3e3;
    }
    body,html, h1, h2,h3,h4,h5,h6, label, button {
      font-family:<?php echo $site['font-head']; ?>;
    }
    /*body fonts */
    body , p {
      font-family:<?php echo $site['font-body']; ?>;
    }
    textarea:focus, input:focus{
        outline: 0;
    }
    .lead_control {
      border-radius: 0;
    }
    .editable input , .editable textarea , .editable input:focus,
    .editable-file input , .editable-file textarea , .editable-file input:focus,
    .editable-promo-file input , .editable-promo-file textarea , .editable-promo-file input:focus,
    .editable-promo input , .editable-promo textarea , .editable-promo input:focus {
      background-color:transparent;
      margin:inherit 0px;
      padding:inherit 0px ;
      border:0;
      display:inline-block;
      width:100%;
    }
    .jumbotron {
      text-shadow:1px 1px 50px #101010;
    }
    .dark-bg {
      color:#101010;
    }

    .fa .audio-player-control , .text-dark {
      margin:5%;
      font-size:24px;
      display: block;
      color:#101010;
    }
    .controls-play , .user-video-item {
      border-radius: 0px;
    }
    .controls-play {
    }
    .controls-play .fa-play-circle , .controls-play .fa-pause-circle {
      font-size:4em;
    } 
    .controls-play {
      border:#FE3F44 1px solid;
      border-top:none;
      /*position: absolute;*/
      display:block;
      width: 100%;
      padding: 27%;
      background-position: center center;
      background-size:100%;
      margin-bottom: 4vh;
      /*left: 50px;*/
      /*top: 50px;*/
    }
    .edit-options-hidden {
      display: none;
    }
    .content {
      text-align: center;
    }
    .paragraph {
      font-size:14px;
    }
    .content .feedback {
      margin-bottom:3%;
      margin-top:3%;
    }
    .user-photo-item {
      width:100%;
    }
    .user-video-item {
      width:100%;
      /*height:80vh;*/
    }
    .main_wrapper {
      padding: 6%;
      margin-top: 20vh;
      height: 80vh;
    }
    .tabs-style-linemove nav, nav .event-option-panel {
      background: #303030;
    }
    .full-width-article {
      position:relative;
      right:16px;
      margin-top:3%;
      margin-bottom:10%;;
      /*background-color:#000000;*/
      padding:2.5%;
    }
    .full-width-article h1 {
      font-size:2em;
    }
    .full-width-article img , .idea-textarea {
      box-shadow:5px 5px 20px #000;
    }

    .rss-feed article {
      margin-bottom:10%;
    }
    #files-list .list {
      list-style: none;
    }
    .img-responsive {
      margin:auto;
    }
    .border-alert {
      border:solid red 3px;
    }
    .jumbotron {
      background-image: <?php $r = rand(0,2); echo 'url("'.$site['media']['photos']['front-page'][$r]['image'].'")'; ?> ;
      min-height: 100vh;
      background-position:center top ;
    }
    .promotion-player-button {
      font-size:3em;
    }
    .post-item, .post-text {
      display:block;
      vertical-align: text-top;
      text-align:left;
      margin-bottom: 3vh ;
    }
    .post-text {
      padding-left:4%;
    }
    .promo-title {
      font-size:6em;
    }
    .promo-subtitle {
      font-size:4em;
    }
    .post-item {
      padding-top:0;
      border-top:#FE3F44 solid 12px;
    }
    .post-item .list-twitter {
      font-size:24px;
      color:<?php echo $site['primary-color']; ?>;
      display:block;
    }
    .post-item .col-md-1 {
      position: static;
    }
    .file-option {
      margin:5px;
      padding:2px;
    }
    .post-item .list-title {
      color:#e3e3e3;
    }
    .post-item .list-tags {

    } 
    label.form-label {
      text-align: left;
      margin-left:0;
    }
    .share-buttons-row {
      text-align: center;
    }
    .attached-file-button {
      margin-right:6px;
    }
    .promo-file-options {
      padding:1%;
      background-size:100%;
    }
    .promo-file-options:hover {
      background-color:#303030;
      color:#e3e3e3;
      cursor: pointer;
    }
    article .list-item {
      text-align:left;
    }
    .media-container video , .media-container img  {
      display:inline-block;
      width:100%;
    }
    .post-image {
      display:inline-block;
      /*min-width: 250px;*/
      width:100%;
    }
    .jumbotron .container , .modal {
      margin-top: 20vh;
    }

    .pricing-best , .btn-primary-outline , .btn-primary, .btn-primary:hover , .btn-primary-outline , .btn-primary-outline {
      border-color: <?php echo $site['primary-color']; ?>;
    }
    .btn-primary-outline {
      color: #ffffff;
    }
    .pricing-best .card-header , .btn-primary , .btn-primary-outline , .btn-primary:hover , .btn-primary-outline:hover {
      background-color: <?php echo $site['primary-color']; ?>;
    }
    .section-title {
      padding:3%;
    }
    .label-info {
      background-color:<?php echo $site['primary-color']; ?>;
    }
    .content {
        margin-top:100px;
        margin-bottom:100px;
    }
    .section-footer.bg-inverse {
      /*border-top:3px solid #e3e3e3;*/
      background-color: #101010;
    }
    .feedback {
      font-size:10px;
    }
    .gn-menu {
      box-shadow: 0px 0px 15px;
    }
    .gn-menu-main, .gn-menu {
      font-size: 14px;
      z-index: 10000;
    }
    .gn-menu-wrapper.gn-open-all {
      width:250px;
    }
    footer {
      border-top:20px solid #a1a1a1;
    }
    .dropdown-filter select {
      background-color:transparent;
      border:0;
    }
    .file_name {
      font-size: 0.75em;
      margin-left: 7.5px;
      font-weight: lighter;
    }
    .post-item-stats {
      font-size:0.7em;
      padding: 0.5em;
    }
    .logo-menu a {
      padding:0%;
    }

    .idea-textarea {
      padding:5%;
      font-size:2em;
      max-width:850px;
      display:block;
      margin:auto;
      background-color:#000000;
      color:#e3e3e3;
      height:70vh;
    }
    .content-wrap section p {
      color:#e3e3e3;
      padding:0.5em;
      width:100%;
    }
    video {
      display: inline-block;
      width:100%;
    }
    .gn-menu-main, .gn-menu {
      box-shadow:0px 2.5px 20px;
    }
    @media (min-width:600px) {
      .post-image {
        /*max-width:250px;*/
      }
    }


    @media (max-width: 600px) {
      .jumbotron {
        background-position:center top ;
      }
      .post-image {
        /*width:100%;*/
      }
      .seamless {
        padding-left:0;
        padding-right:0;
      }
      .radio-menu {
        font-size: 10px;
        max-width: 200px;
        overflow: hidden;
      }
      .logo-menu {
        max-width: 66px;
      }
      .logo-menu a {
        padding:0%;
      }
    }
    </style>
</head>
<body>
  <div class='container'>
    <ul id="gn-menu" class="gn-menu-main">
        <li class="gn-trigger">
          <a class="gn-icon gn-icon-menu"><span>Menu</span></a>
          <nav class="gn-menu-wrapper">
            <div class="gn-scroller">
              <ul class="gn-menu">
                <li class="gn-search-item">
                  <form method="GET" action="http://freelabel.net/users/index/search/">
                    <input placeholder="Search" name="q" type="search" class="gn-search">
                    <a class="gn-icon gn-icon-search"><span>Search</span></a>
              </form>
                </li>
                <?php

                  // display site navigation map
                  echo $config->display_site_map($site , Session::get('user_logged_in'), Session::get('user_name'));
                ?>
                <!-- <li>
                  <a class="gn-icon gn-icon-download">Downloads</a>
                  <ul class="gn-submenu">
                    <li><a class="gn-icon gn-icon-illustrator">Vector Illustrations</a></li>
                    <li><a class="gn-icon gn-icon-photoshop">Photoshop files</a></li>
                  </ul>
                </li>
                <li><a class="gn-icon gn-icon-cog">Settings</a></li>
                <li><a class="gn-icon gn-icon-help">Help</a></li> -->
                <!-- <li>
                  <a class="gn-icon gn-icon-archive">Archives</a>
                  <ul class="gn-submenu">
                    <li><a class="gn-icon gn-icon-article">Articles</a></li>
                    <li><a class="gn-icon gn-icon-pictures">Images</a></li>
                    <li><a class="gn-icon gn-icon-videos">Videos</a></li>
                  </ul>
                </li> -->
              </ul>
            </div><!-- /gn-scroller -->
          </nav>
        </li>
        <li class="logo-menu" style='border-right:none;' ><a href="<?php echo $site['http']; ?>users/"><img src="<?php echo $site['logo']; ?>" style="max-height:48px;" ></a></li>
        <li class="radio-menu"  style='border-right:none;' >
          <a class="audio-player-title codrops-icon codrops-icon-prev" href="<?php echo $site['http']; ?>radio/"><span><i class="radio-player-control fa fa-play" ></i> Stream</span></a>
          <audio class="audio-player"></audio>
        </li>
        <li style='display:none;' ><a class="codrops-icon " href="<?php echo $site['http']; ?>"></a></li>
      </ul>
  </div>

    <div class='title-box' style="display:none;">
        <a href="<?php echo URL; ?>"><?php echo $site['name']; ?></a>
    </div>
    <nav class="navbar navbar-dark bg-inverse bg-inverse-custom navbar-fixed-top" style="display:none;">
      <div class="container">
        <a class="navbar-brand" href="#">
          <!-- <span class="icon-logo"></span> -->
          <img src="<?php echo $site['logo']; ?>" style="width:65px;border-radius:3px;">
          <span class="sr-only"><?php echo $site['name']; ?></span>
        </a>
        <a class="navbar-toggler hidden-md-up pull-right" data-toggle="collapse" href="#collapsingNavbar" aria-expanded="false" aria-controls="collapsingNavbar">
        &#9776;
      </a>
        <a class="navbar-toggler navbar-toggler-custom hidden-md-up pull-right" data-toggle="collapse" href="#collapsingMobileUser" aria-expanded="false" aria-controls="collapsingMobileUser">
          <span class="icon-user"></span>
        </a>
        <div id="collapsingNavbar" class="collapse navbar-toggleable-custom" role="tabpanel" aria-labelledby="collapsingNavbar">
          <ul class="nav navbar-nav pull-right">


            <li class="nav-item nav-item-toggable hidden-sm-up">
              <form class="navbar-form" action='http://freelabel.net/search/' method="GET">
                <input class="form-control navbar-search-input" name='q' type="text" placeholder="Type your search &amp; hit Enter&hellip;">
              </form>
            </li>

            <li class="navbar-divider hidden-sm-down"></li>
            <li class="nav-item dropdown nav-dropdown-search hidden-sm-down">
              <a class="nav-link dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="icon-search"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right dropdown-menu-search" aria-labelledby="dropdownMenu1">
                <form class="navbar-form" action='http://freelabel.net/search/' method="GET">
                  <input class="form-control navbar-search-input" name='q' type="text" placeholder="Type your search &amp; hit Enter&hellip;">
                </form>
              </div>
            </li>

            <li class="nav-item dropdown hidden-sm-down textselect-off">
            <?php
            echo '
            <a class="nav-link dropdown-toggle nav-dropdown-user" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="'.'https://www.socialhub.directory/sites/all/themes/core/images/default-user.png'.'" height="40" width="40" alt="Avatar" class="img-circle"> <span class="icon-caret-down"></span>
            </a>
              ';
            ?>
              <div class="dropdown-menu dropdown-menu-right dropdown-menu-user dropdown-menu-animated" aria-labelledby="dropdownMenu2">
                <div class="media">
                  <div class="media-left">
                    <img src="https://www.socialhub.directory/sites/all/themes/core/images/default-user.png" height="60" width="60" alt="Avatar" class="img-circle">
                  </div>
                  <div class="media-body media-middle">

                    <h5 class="media-heading"><?php echo "Please Login!"; ?></h5>
                    <h6>yourname@<?php echo $site['http']; ?></h6>
                  </div>
                </div>
                <?php
                  if ($_SESSION['user_name']) {
                   echo '
              <a href="#" class="dropdown-item text-uppercase">View posts</a>
                <a href="#" class="dropdown-item text-uppercase">Manage groups</a>
                <a href="#" class="dropdown-item text-uppercase">Subscription &amp; billing</a>
                <a href="#" class="dropdown-item text-uppercase text-muted">Log out</a>
                <a href="#" class="btn-circle has-gradient pull-right">
                  <span class="sr-only">Edit</span>
                  <span class="icon-edit"></span>
              </a>';
                  } else {
                    include(ROOT.'user/views/signin.php');
                  }

                ?>


              </div>
            </li>
          </ul>
        </div>
        <div id="collapsingMobileUser" class="collapse navbar-toggleable-custom dropdown-menu-custom p-x hidden-md-up" role="tabpanel" aria-labelledby="collapsingMobileUser">
          <div class="media m-t">
            <div class="media-left">
              <img src="https://www.socialhub.directory/sites/all/themes/core/images/default-user.png" height="60" width="60" alt="Avatar" class="img-circle">
            </div>
            <div class="media-body media-middle">
              <h5 class="media-heading">Please Login!</h5>
              <h6>or create an account</h6>
            </div>
          </div>
          <?php include(ROOT.'user/views/signin.php');?>
          <a href="#" class="btn-circle has-gradient pull-right m-b">
            <span class="sr-only">Edit</span>
            <span class="icon-edit"></span>
          </a>
        </div>
      </div>
    </nav>







































    <div class="navbar navbar-dark bg-inverse bg-inverse-custom navbar-fixed-top" style="display:none;">
        <div class="container">
        <ul id="menu">
            <li <?php if ($this->checkForActiveController($filename, "index")) { echo ' class="active" '; } ?> >
                <a href="<?php echo URL; ?>index/index">Index</a>
            </li>
            <li <?php if ($this->checkForActiveController($filename, "help")) { echo ' class="active" '; } ?> >
                <a href="<?php echo URL; ?>help/index">Help</a>
            </li>
            <li <?php if ($this->checkForActiveController($filename, "overview")) { echo ' class="active" '; } ?> >
                <a href="<?php echo URL; ?>overview/index">Overview</a>
            </li>
            <?php if (Session::get('user_logged_in') == true):?>
            <li <?php if ($this->checkForActiveController($filename, "dashboard")) { echo ' class="active" '; } ?> >
                <a href="<?php echo URL; ?>dashboard/index">Dashboard</a>
            </li>
            <?php endif; ?>
            <?php if (Session::get('user_logged_in') == true):?>
            <li <?php if ($this->checkForActiveController($filename, "note")) { echo ' class="active" '; } ?> >
                <a href="<?php echo URL; ?>note/index">My Notes</a>
            </li>
            <?php endif; ?>

            <?php if (Session::get('user_logged_in') == true):?>
                <li <?php if ($this->checkForActiveController($filename, "login")) { echo ' class="active" '; } ?> >
                    <a href="<?php echo URL; ?>login/showprofile">My Account</a>
                    <ul class="sub-menu">
                        <li <?php if ($this->checkForActiveController($filename, "login")) { echo ' class="active" '; } ?> >
                            <a href="<?php echo URL; ?>login/changeaccounttype">Change account type</a>
                        </li>
                        <li <?php if ($this->checkForActiveController($filename, "login")) { echo ' class="active" '; } ?> >
                            <a href="<?php echo URL; ?>login/uploadavatar">Upload an avatar</a>
                        </li>
                        <li <?php if ($this->checkForActiveController($filename, "login")) { echo ' class="active" '; } ?> >
                            <a href="<?php echo URL; ?>login/editusername">Edit my username</a>
                        </li>
                        <li <?php if ($this->checkForActiveController($filename, "login")) { echo ' class="active" '; } ?> >
                            <a href="<?php echo URL; ?>login/edituseremail">Edit my email</a>
                        </li>
                        <li <?php if ($this->checkForActiveController($filename, "login")) { echo ' class="active" '; } ?> >
                            <a href="<?php echo URL; ?>login/logout">Logout</a>
                        </li>
                    </ul>
                </li>
            <?php endif; ?>

            <!-- for not logged in users -->
            <?php if (Session::get('user_logged_in') == false):?>
                <li <?php if ($this->checkForActiveControllerAndAction($filename, "login/index")) { echo ' class="active" '; } ?> >
                    <a href="<?php echo URL; ?>login/index">Login</a>
                </li>
                <li <?php if ($this->checkForActiveControllerAndAction($filename, "login/register")) { echo ' class="active" '; } ?> >
                    <a href="<?php echo URL; ?>login/register">Register</a>
                </li>
            <?php endif; ?>
        </ul>
        </div>

        <?php if (Session::get('user_logged_in') == true): ?>
            <div class="header_right_box">
                <div class="namebox">
                    Hello <?php echo Session::get('user_name'); ?> !
                </div>
                <div class="avatar">
                    <?php if (USE_GRAVATAR) { ?>
                        <img src='<?php echo Session::get('user_gravatar_image_url'); ?>'
                             style='width:<?php echo AVATAR_SIZE; ?>px; height:<?php echo AVATAR_SIZE; ?>px;' />
                    <?php } else { ?>
                        <img src='<?php echo Session::get('user_avatar_file'); ?>'
                             style='width:<?php echo AVATAR_SIZE; ?>px; height:<?php echo AVATAR_SIZE; ?>px;' />
                    <?php } ?>
                </div>
            </div>
        <?php endif; ?>

        <div class="clear-both"></div>
    </div>
