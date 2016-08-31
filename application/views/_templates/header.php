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
    $site['media']['photos']['front-page'] = $config->getPhotoAds($site['creator'], 'freelabel front',8);
    $site['media']['photos']['ads'] = $config->getPhotoAds($site['creator'], 'current-promo',10);
    $r = rand(0,6);

    // echo '<pre>';
    // var_dump($r);
    // echo '<hr>';
    // var_dump($site['media']['photos']['front-page']);
    // exit;

    /* load page title */
    // $site['page_title'] = $config->getPageTitle(strtoupper($_GET['url']));



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


    // if ($user_name = Session::get('user_name')) {
    //     $upload_link =  'http://freelabel.net/upload/?uid='.$user_name;
    // }

    if (!isset($_GET['url']) || !strpos($_GET['url'], '/image/')) {
      // DEFAULT
      // FRONT PAGE & NOT QUERY SETS!
      // $site['meta_tag_photo'] = $site['media']['photos']['front-page'][0]['image'];
      $site['meta_tag_title'] = $site['media']['photos']['front-page'][0]['title'];
      $site['meta_tag_caption'] = $site['media']['photos']['front-page'][0]['caption'];
      $site['page_title'] = 'HOME';//$site['meta_tag_title']; 

      if (!$site['media']['photos']['front-page'][0]['thumb']=='') {
        $site['meta_tag_photo'] = $site['media']['photos']['front-page'][0]['thumb'];
      } else {
        $site['meta_tag_photo'] = $site['media']['photos']['front-page'][0]['image'];
      }

    } elseif (strpos($_GET['url'], '/image/')  && isset($_GET['id'])) {
      // PROMO PAGE METATTILES
      $promo_id = str_replace('index/image/', '', $_GET['id']);
      $current_promo = $config->getPromoByDesc($promo_id,null,null,'desc');
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
    // $config->debug($site['page_title'],1);






?><!DOCTYPE html>
<html lang="en">
  <head>
    <?php // displa meta tags
    echo $config->display_site_meta($site); ?>

    <link rel="stylesheet" href="<?php echo HTTP; ?>landio/css/landio.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo HTTP; ?>landing/view/nexus/css/component.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo HTTP; ?>public/css/bootstrap-social/bootstrap-social.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo HTTP; ?>landing/view/tabs/css/tabs.css">
    <link rel="stylesheet" type="text/css" href="<?php echo HTTP; ?>landing/view/tabs/css/tabstyles.css">
    <link href='https://fonts.googleapis.com/css?family=Oswald:400|Open+Sans+Condensed:300|Abel' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
    <!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
    <link rel="stylesheet" href="<?php echo HTTP; ?>upload/css/jquery.fileupload.css">
    <link rel="stylesheet" href="<?php echo HTTP; ?>upload/css/jquery.fileupload-ui.css">
    <link rel="stylesheet" href="<?php echo HTTP; ?>public/js/jquery-ui.min.css">
    <!-- CSS adjustments for browsers with JavaScript disabled -->
    <noscript><link rel="stylesheet" href="<?php echo HTTP; ?>css/jquery.fileupload-noscript.css"></noscript>
    <noscript><link rel="stylesheet" href="<?php echo HTTP; ?>css/jquery.fileupload-ui-noscript.css"></noscript>
    <script src="<?php echo HTTP; ?>landing/view/tabs/js/modernizr.custom.js"></script>
    <script src="<?php echo HTTP; ?>js/list.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="<?php echo HTTP; ?>js/application.js"></script>

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-40470023-1', 'auto');
      ga('send', 'pageview');
    </script>
    
    <style type="text/css">
    /* INTEGRATE INTO CSS FILE */
    html,body {
      /*overflow-x:hidden;*/
    }
    html {
      margin-top:60px;
    }
    body {
      padding: 0 0%;
      overflow-x:hidden;
    }
    /*heading fonts */
    html, body , .bg-faded, .pricing-box {
      background-color: #101010;
      color:#e3e3e3;
      
    }
    body,html, h1, h2,h3,h4,h5,h6, label, button {
      /*font-family:<?php echo $site['font-head']; ?>;*/
      font-family: 'Avenir Next', Avenir, 'Helvetica Neue', 'Lato', 'Segoe UI', Helvetica, Arial, sans-serif;
    }
    /*body fonts */
    body , p , .tabs-style-linemove nav a, .card-social small {
      font-family:<?php echo $site['font-body']; ?>;
      font-family: 'Avenir Next', Avenir, 'Helvetica Neue', 'Lato', 'Segoe UI', Helvetica, Arial, sans-serif; 
    }
    .form-control {
      background-color:transparent;
      border:1px solid #202020;
      color:#e3e3e3;
      border-radius: 0px;
    }
    .profile_builder_form {
      padding:2em;
    }
    textarea:focus, input:focus{
        outline: 0;
    }
    .lead_control {
      border-radius: 0;
      background-color:#202020;
    }
    .editable input , .editable textarea , .editable input:focus,
    .editable-file input , .editable-file textarea , .editable-file input:focus,
    .editable-promo-file input , .editable-promo-file textarea , .editable-promo-file input:focus,
    .editable-promo input , .editable-promo textarea , .editable-promo input:focus,
    .edit input , .search-tracks-input input {
      background-color:transparent;
      margin:inherit 0px;
      padding:inherit 0px ;
      border:0;
      display:inline-block;
      width:100%;
    }
    .share-button {
      padding: 5px;
      text-align: center;
      width:100%;
    }

    .post-item .dropdown-menu {
      left:-85px;
      padding:7%;
    }
    .promo-container {
      overflow-x:hidden;
    }
    .search-tracks-input {
      text-align:left;
    }
    input:focus {
      outline:none;
    }
    select.form-control, select.form-control:focus  {
      background-color: #101010;
      border-color:#202020;
      /*border-radius:2px;*/
    }
    .promo-description {
      border-bottom: 1px solid #303030;
      padding-bottom:1em;
    }

    /* Hide Angular JS elements before initializing */
    .ng-cloak {
        display: none;
    }

    .filter-by-tag {
      width:300px;
      font-size: 24px;
      display: inline;
    }
    .filter-by-icon {
      color:#e3e3e3;
    }
    .search-tracks-input input {
      width:250px;
    }
    .jumbotron {
      text-shadow:1px 1px 50px #101010;
    }
    .dark-bg {
      color:#101010;
    }
    .has-gradient {
      background-image: linear-gradient(45deg, #303030, #101010);
    }

    .fa .audio-player-control , .text-dark {
      margin:5%;
      font-size:24px;
      display: block;
      color:#101010;
    }
    .audio-player-playlist {
      /*height:30vh;*/
      /*overflow-y:scroll;*/
    }
    .playlist-img {
      width: 60px;
    }
    .controls-play , .user-video-item {
      border-radius: 0px;
    }
    .feed-header {
      display: block;
      margin-bottom: 50px;
    }

    .seamless {
      padding-left:0;
      padding-right:0;
    }
    .controls-play {
    }
    .controls-play .fa-play-circle , .controls-play .fa-pause-circle {
      font-size:4em;
    } 
    .controls-play {
      /*border:#FE3F44 1px solid;*/
      border: #000 1px solid;
      
      border:transparent;
      border-top:none;
      /*position: absolute;*/
      display:block;
      width: 100%;
      padding: 27%;
      background-position: center center;
      background-size:100%;
      margin-bottom: 4vh;
      transition: height 1s;
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

    .dashboard-nav-group {
      margin-bottom:2vh;
    }
    .user-photo-item {
      width:100%;
    }
    .user-video-item {
      width:100%;
      /*height:80vh;*/
    }
    .video-play-button {
      position: absolute;
      padding:2.2em;
      text-align: center;
      width:100%;
      cursor:pointer;
    }
    video, .img-circle {
      cursor:pointer;
    }
    .main_wrapper {
      padding: 6%;
      margin-top: 20vh;
      height: 80vh;
    }
    .tabs-style-linemove nav, nav .event-option-panel {
      background: #202020;
    }
    .full-width-article {
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
    .list-group-item {
      color:#303030;
    }

    .site-break {
      background-color:#202020;
      text-align: center;
      padding:3%;
    }
    .site-break .page-title {
      margin:3%;
      font-size:24px;
    }
    .row {
      margin-left:0;
      margin-right:0;
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
    .background-tint {
      position: absolute;
      top: 10px;
      right:10px;
      height: 100vh;
      width:100vw;
      background-color: red;
      opacity: 0.7;
      z-index: 0;
    }
    .twitter-message-text {
      color:#e3e3e3;
      font-size: 2em;
    }

    .card-social small {
      color:#a7a7a7;
    }
    .stats-track-list, .stats-date-list {
      height:250px;
      overflow: scroll;
    }


    <?php 
    if (!Session::get('user_logged_in')) {
      echo ".hide-if-loggedout {
              display:none;
            }";
    }

    ?>






    /* ------------------------------------------
          PROMOTIONS FUNCTIONALITY 
    ------------------------------------------ */
    .jumbotron {
      background-image: <?php echo 'url("'.$site['media']['photos']['front-page'][$r]['image'].'")'; ?> ;
      min-height: 100vh;
      background-position:center top ;
    }
    .featured-ad img {
      width: 100%;
    }
    .featured-ad p {
      font-size:24px;
    }





    /* -----------------------------------------
    navigation menus
    ----------------------------------------- */
    .nav-link {
      font-weight: bold;
      font-weight: normal;
    }
    .nav-link:hover {
        color:#e3e3e3;
    }

    /* ------------------------------------------
          RSS FUNCITONALITY
    ------------------------------------------ */
    .rss-list {
      padding:1em;
    }
    .rss-third-partys {
      vertical-align: top;
    }
    .rss-item-details h3 {
      color:#fff;
    }
    .rss-item-details p {
      color:#303030;
    }



    /* ------------------------------------------
          SCRIPT FUNCTIONALITY 
    ------------------------------------------ */
    .script-responses {
      list-style-type: none;
    }




    .promotion-player-button {
      font-size:3em;
    }
    .load-more-button {
      color:#303030;
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
      border-top:#FE3F44 solid 3px;
    }
    .post-item img {
      width:100%;
    }
    .post-item .list-twitter {
      font-size:24px;
      color:<?php echo $site['primary-color']; ?>;
      display:block;
    }
    .post-item .list-writeup {
      font-size:14px;
      display:block;
      margin-top: 1%;
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
    .promo-file-options img {
      margin-right: 12px;
    }
    article .list-item, .modal-title {
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
    .main-feed {
      padding-top:5%;
      min-height: 100vh;





    }
   .modal {
      margin-top: 20vh;
    }
    .modal-content {
      background-color: rgba(0,0,0,0.7);
    }
    .add_new_promo_modal select {
      font-size: 24px;
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
    .card {
      border:0.0625rem solid #101010;
    }
    .card-chart .list-group-item {
      background-color: #202020;
    }
    .list-group-item a, .card-chart .list-group-item {
      color:#e3e3e3;
    }
    .section-title {
      padding:3%;
    }
    .section-description {
      font-size:22px;
    }
    .pagination-count {
      font-size:14px;
    }
    .label-info {
      background-color:<?php echo $site['primary-color']; ?>;
    }
    .content {
        margin-top:100px;
        margin-bottom:100px;
    }
    .section-footer.bg-inverse {
      border-top:0px;
      background-color: #101010;
    }
    /* PANELS */
    .dropdown-menu {
      background-color:rgba(0,0,0,0.7);
      color:#303030;
      /*border:solid 1px #e3e3e3;*/
      border: solid 2px #202020;
    }
    .dropdown-menu a {
      color: #e3e3e3;
      border-radius:2px;
    }
    .feedback {
      max-width: 100%;
      font-size:17px;
      padding:0.6em;
      display: inline-block;
      margin-bottom:3%;
      margin-top:3%;
    }
    .current-clients-container .current-clients-table {
      margin:auto;
      width: 100%;
    }
    .current-clients-table td {
      padding:1%;
      border:1px solid #202020;
    }
    .gn-menu {
      box-shadow: 0px 0px 15px;
    }
    .gn-menu-main, .gn-menu {
      font-size: 14px;
      z-index: 10000;
      box-shadow:0px 1px 7px #000;
      /*border-bottom: 1px solid #101010;*/
      background-color: #202020;
    }
    .gn-menu-wrapper.gn-open-all {
      width:250px;
      background-color: #202020;
    }
    .profile-info {
      margin-left:5%;
    }
    .profile-info img {
      border-radius: 2px;
      margin-right:4%;
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
    .header-logo {
      max-height: 60px;
      position:relative;
      bottom:1px;
    }
    .promo-image-img {
      max-width: 60px;
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
      border: transparent;
      /*border: #FE3F44 1px solid;*/
      border: #000 1px solid;
    }
    .play-button-trigger {
      font-size: 5em;
    }

    @media (max-width: 600px) {
      .jumbotron {
        background-position:center top ;
        width:100vw;
        padding:0;
      }
      .jumbotron .container {
        padding-top:10em;
        min-height: 100vh;
      }
      .jumbotron .header-description {
        font-size:0.7em;
      }
      .content-wrap section, .row {
        padding-left: 0;
        padding-right:0;
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
        max-width: 190px;
        overflow: hidden;
      }
      .logo-menu {
        max-width: 66px;
      }
      .logo-menu a {
        padding:0%;
      }
      .promo-title , .promo-subtitle {
        font-size:1.75em;
      }
      .post-item .dropdown-menu {
        left: 100px;
        top: -112px;
        padding:8px;
      }
      .post-item .dropdown {
        display: inline;
        bottom: 12px;
      }
      .feed-header {
        padding: 1em;
      }
      .site-break {
        padding:3%;
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
                <?php //include(ROOT.'landing/livesearch/index.php'); ?>
                  <form method="GET" action="http://freelabel.net/users/index/search/">
                    <input placeholder="Search" name="q" type="search" class="gn-search">
                    <a class="gn-icon gn-icon-search"><span>Search</span></a>
                  </form>
                  <span id="result"></span>
                </li>


                <li class="nav-item nav-item-toggable hide-if-loggedout">
                  <a class="profile-info" href="<?php echo $site['http']."u/".$site['user']['name']; ?>">
                    <?php echo '<img src="'.$site['user']['profile-photo'].'" height="24px">'; ?> 
                    <?php echo ucfirst($site['user']['name']); ?>
                  </a>
                </li>
                <?php
                  // display site navigation map
                  echo $config->display_site_map($site , Session::get('user_logged_in'), Session::get('user_name'));
                ?>
              </ul>
            </div><!-- /gn-scroller -->-
          </nav>
        </li>
        <li class="logo-menu" style='border-right:none;' ><a href="<?php echo $site['http']; ?>"><img src="<?php echo $site['logo']; ?>" class="header-logo" ></a></li>
        <li class="radio-menu pull-right"  style='border-right:none;' >
          <a class="audio-player-title codrops-icon codrops-icon-prev" href="<?php echo $site['http']; ?>radio/"><span><i class="radio-player-control fa fa-play" ></i>
          <span style="color:red;" >LIVE</span> ON AIR</a>
          </span></a>
          <!-- hidden audioplayer  -->
          <audio class="audio-player">
            <source src="http://streaming.radio.co/s95fa8cba2/listen">
          </audio>
        </li>
      </ul>
  </div>


<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<!-- <script src="https://public.radio.co/playerapi/jquery.radiocoplayer.min.js"></script> -->
<!-- <script>$('.radioplayer').radiocoPlayer();</script>-->