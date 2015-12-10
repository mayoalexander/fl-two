<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1, user-scalable=no">
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo HTTP."ico/favicon.ico"; ?>" >
  <link rel="shortcut icon" href="<?php echo HTTP; ?>ico/favicon.ico" type="image/x-icon">
  <link rel="icon" href="<?php echo HTTP; ?>ico/favicon.ico" type="image/x-icon">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title><?php echo $page_title; ?></title>
  <meta name="author" content="<?php echo $site['title']; ?>">
  <meta name="Description" content="FREELABEL MAG | TV | RADIO NETWORK // <?php echo $blog_post_data['writeup']; ?> // FREELABEL Network is the Leader in Online Showcasing">
  <meta name="Keywords" content="FREELABEL, FREE LABEL, FREE, LABEL, AMR, AMRecords, Rap, Hip Hop, Showcasing, Good Brand, Get That Good, Good Brand Clothing, Dalls Texas, FREELABEL, amradio, am radio live, texas, music, promotion, hip hop, rap">
  <meta name="Copyright" content="<?php echo $site['title']; ?>">
  <meta name="Language" content="English">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:image" content="<?php echo $meta_tag_photo?>">
  <meta name="twitter:site" content="<?php echo $site['twitter']; ?>">
  <meta name="twitter:creator" content="<?php echo $site['twitter']; ?>">
  <meta name="twitter:title" content="<?php echo $page_title; ?> | <?php echo $site['title']; ?> RADIO + MAGAZINE + STUDIOS">
  <meta name="twitter:description" content="<?php echo $page_title; ?> | Submit your art to get showcased on <?php echo $site['title']; ?> Magazine, Radio, TV, Events, and more!">
  <meta property="og:url" content="<?php echo $page_url; ?>">
  <meta property="og:title" content="<?php echo $page_title; ?> // <?php echo $site['title']; ?> RADIO + MAGAZINE">
  <meta property="og:description" content="Subscribe and create an account to <?php echo $site['http']; ?> for exclusive access to daily updated news, interviews, singles and project releases from the most influencial creators of our generation.">
  <meta property="og:image" content="<?php echo $meta_tag_photo ?>">
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



    <!-- Bootstrap Core CSS -->
    <!--<link rel="stylesheet" href="<?php echo HTTP; ?>landing/css/bootstrap.min.css" type="text/css">-->
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">-->
    <!--<link rel="stylesheet" href="http://freelabel.net/landing/font-awesome/css/font-awesome.min.css">-->

    <!-- Custom Fonts
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    -->

    <!-- Plugin CSS -->
    <!--<link rel="stylesheet" href="<?php echo HTTP; ?>landing/css/animate.min.css" type="text/css">-->

    <!-- Custom CSS -->
    <link rel="stylesheet" href="http://freelabel.net/landing/css/creative.css" type="text/css">

	<!--<link rel="stylesheet" href="http://freelabel.net/css/radioplayer.css" type="text/css">-->

    <script src="http://freelabel.net/landing/js/jquery.js"></script>
    <script type="text/javascript" src="http://freelabel.net/config/globals.js"></script>
    <!-- jplayer -->


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">

    <?php
      if (isset($_SESSION['user_name'])) {
        echo '.not-logged-in {
          display: none;
        }
        .user-logged-in {
          display:inline-block;
      }';
      }
    ?>
    header {
        background-image:url("<?php echo $front_page_photos[0]['image']; ?>");
        //height:100vh;
        text-shadow:1px 1px 10px #000000;
    }

    .post {
      border:2px solid <?php echo $site['primary-color'] ?>;
      border-collapse: collapse;
      border-top:none;
      border-right:none;
      //border-bottom:none;
    }
    .audio_player {
      position: fixed;
      bottom: 2px;
      right:2px;
      border-bottom-left-radius:none ;
      border-bottom-right-radius:none ;

    }


    /* Navigation Styles */
    .dropdown-menu>li>a {
      font-size:18px;
      color:#e3e3e3;
    }
    .dropdown-menu {
      background-color: #101010;
    }
    .navbar-default {
      border:none;
    }

    .navbar-default , .navbar-default.affix {
      background-color:#101010;
      z-index: 2;
    }
    .modal-dialog {
      border:2px solid <?php echo $site['primary-color'] ?>;
      color:#e3e3e3;
    }


    .top_posts_count , .btn-primary {
      background-color:<?php echo $site['primary-color'] ?>;

    }
    .post-twitter , .top_posts_title, hr , .text-primary, a {
      border-color:<?php echo $site['primary-color'] ?>;
      color:<?php echo $site['primary-color'] ?>;
    }
    @media (max-device-width: 680px) {
      .search-bar-input, .search-bar {
        //display:none;
        //display: block;
       width: 150px;
      }
      body, html, div {
        overflow-y:visible;
      }
    }
    </style>
</head>

<body id="page-top">
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-bottom">
      <div class="container-fluid">
        <div class="navbar-header">

          <div class="audio_player">
            <?php if ($_SERVER['SCRIPT_URI']=='http://freelabel.net/') {
                include(ROOT.'config/radio.php');
              }
            ?>
          </div>

        </div>
      </div>
    </nav>


    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">

            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <img class='' src="<?php echo $config->getSiteLogo($site_url); ?>" style='height:80px;'>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" style='margin-top:14px;'>
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <form class='search-bar input-group' action='<?php echo $site_url; ?>search/'>
                  <div class="input-group search-bar">
                    <input name='q' type="text" class="form-control search-bar-input" value='<?php echo $_GET["q"];?>'  placeholder="Search anything..">
                  </div><!-- /input-group -->
                </form>
            </div>

            <!-- NOT LOGGED IN -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right not-logged-in">
                    <li class="not-logged-in" >
                        <a href='#' class="page-scroll" data-toggle="modal" data-target="#loginMod" ><i class="glyphicon glyphicon-log-in" ></i> Login</a>
                    </li>
					          <!--<li class="" >
                        <a class="page-scroll radio-player-trigger" href="#radio"><i class="glyphicon glyphicon-signal" ></i>Radio</a>
                    </li>-->
                    <li class="not-logged-in dropdown" >
                        <a class="page-scroll dropdown-toggle" href='#' type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="glyphicon glyphicon-globe" ></i> Explore</a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                          <li><a class="page-scroll" href="<?php echo $site_url;?>mag/?ctrl=feed&view=new" onclick="<?php echo "loadPage('http://freelabel.net/user/views/stream.php', '#main_display_panel', 'new', '".$_SESSION['user_name']."')"; ?>"><i class="glyphicon glyphicon-time" ></i>New Releases</a></li>
                          <li><a class="page-scroll" href="<?php echo $site_url;?>mag/?ctrl=feed&view=featured#" onclick="<?php echo "loadPage('http://freelabel.net/user/views/stream.php', '#main_display_panel', 'featured', '".$_SESSION['user_name']."')"; ?>"><i class="glyphicon glyphicon-heart" ></i>Features</a></li>
                          <li><a class="page-scroll" href="<?php echo $site_url;?>mag/?ctrl=feed&view=broadcast#" onclick="<?php echo "loadPage('http://freelabel.net/user/views/stream.php', '#main_display_panel', 'broadcast', '".$_SESSION['user_name']."')"; ?>"><i class="glyphicon glyphicon-signal" ></i>Broadcasts</a></li>
                          <li><a class="page-scroll" href="<?php echo $site_url;?>mag/?ctrl=feed&view=event#" onclick="<?php echo "loadPage('http://freelabel.net/user/views/stream.php', '#main_display_panel', 'event', '".$_SESSION['user_name']."')"; ?>"><i class="glyphicon glyphicon-calendar" ></i>Events</a></li>
                          <hr>
                          <li><a class="page-scroll" href="http://radio.freelabel.net/#" ><i class="glyphicon glyphicon-signal" ></i>Radio</a></li>
                          <li><a class="page-scroll" href="<?php echo $site_url;?>mag/?ctrl=feed&view=video#" ><i class="glyphicon glyphicon-facetime-video" ></i>Videos</a></li>
                          <li><a class="page-scroll" href="<?php echo $site_url;?>mag/?ctrl=feed&view=single#" ><i class="glyphicon glyphicon-cd" ></i>Singles</a></li>
                          <li><a class="page-scroll" href="<?php echo $site_url;?>mag/?ctrl=feed&view=photo#" ><i class="glyphicon glyphicon-picture" ></i>Photos</a></li>
                          <!--<li><a class="page-scroll" href="<?php echo $site_url;?>mag/?ctrl=feed&view=album#" ><i class="fa fa-vinyl" ></i>Albums</a></li>-->
                          <li><a class="page-scroll" href="<?php echo $site_url;?>mag/?ctrl=feed&view=interview#" ><i class="glyphicon glyphicon-phone" ></i>Interviews</a></li>

                        </ul>
                    </li>



                    <li class="dropdown" >
                        <a class="page-scroll dropdown-toggle" href='#' type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="glyphicon glyphicon-option-horizontal" ></i></a>
                        <ul class="dropdown-menu panel-body" aria-labelledby="dropdownMenu1">
                        <h6 class="text-muted">Accounts</h6 class="text-muted">
                          <li class="not-logged-in" >
                              <a class="page-scroll" href="http://freelabel.net/register"><i class="fa fa-key" ></i> Register</a>
                              <a class="page-scroll" href="<?php echo $site_url; ?>landing/#"><i class="glyphicon glyphicon-question-sign" ></i> More Info</a>
                          </li>
                        <h6 class="text-muted">Submit</h6 class="text-muted">
                          <li class="not-logged-in" >
                              <a class="page-scroll" href="<?php echo $site_url; ?>upload/?uid=submission"><i class="glyphicon glyphicon-music" ></i> Audio</a>
                              <a class="page-scroll" href="<?php echo $site_url; ?>upload/?uid=submission"><i class="glyphicon glyphicon-picture" ></i> Photos</a>
                              <a class="page-scroll" href="<?php echo $site_url; ?>upload/?uid=submission"><i class="glyphicon glyphicon-facetime-video" ></i> Videos</a>
                          </li>
                        </ul>
                    </li>



                </ul>
                <!-- NOT LOGGED IN -->








                <!-- LOGGED IN -->
                <ul class="nav navbar-nav navbar-right user-logged-in">
                    <!--<li class="" >
                        <a class="page-scroll" href="#" onclick="<?php //echo "loadPage('http://freelabel.net/user/views/stream.php', '#main_display_panel', 'dashboard', '".$_SESSION['user_name']."')"; ?>"><i class="glyphicon glyphicon-signal" ></i>Explore</a>
                    </li>-->
					          <!--<li class="" >
                          <a class="page-scroll radio-player-trigger" href="#"><i class="glyphicon glyphicon-signal" ></i>Radio</a>

                        <a class="page-scroll radio-player-trigger" href="#"><i class="glyphicon glyphicon-signal" ></i>Radio</a>
                    </li>-->


                    <li class="dropdown" >
                        <a class="page-scroll dropdown-toggle" href='#' type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="glyphicon glyphicon-globe" ></i> Explore</a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                          <li><a class="page-scroll" href="<?php echo $site_url;?>?ctrl=feed&view=new" onclick="<?php echo "loadPage('http://freelabel.net/user/views/stream.php', '#main_display_panel', 'new', '".$_SESSION['user_name']."')"; ?>"><i class="glyphicon glyphicon-time" ></i>New Releases</a></li>
                          <li><a class="page-scroll" href="<?php echo $site_url;?>?ctrl=feed&view=featured#" onclick="<?php echo "loadPage('http://freelabel.net/user/views/stream.php', '#main_display_panel', 'featured', '".$_SESSION['user_name']."')"; ?>"><i class="glyphicon glyphicon-heart" ></i>Features</a></li>
                          <li><a class="page-scroll" href="<?php echo $site_url;?>?ctrl=feed&view=broadcast#" onclick="<?php echo "loadPage('http://freelabel.net/user/views/stream.php', '#main_display_panel', 'broadcast', '".$_SESSION['user_name']."')"; ?>"><i class="glyphicon glyphicon-signal" ></i>Broadcasts</a></li>
                          <li><a class="page-scroll" href="<?php echo $site_url;?>?ctrl=feed&view=event#" onclick="<?php echo "loadPage('http://freelabel.net/user/views/stream.php', '#main_display_panel', 'event', '".$_SESSION['user_name']."')"; ?>"><i class="glyphicon glyphicon-calendar" ></i>Events</a></li>
                          <hr>
                          <li><a class="page-scroll" href="http://radio.freelabel.net/#" ><i class="glyphicon glyphicon-signal" ></i>Radio</a></li>
                          <li><a class="page-scroll" href="<?php echo $site_url;?>?ctrl=feed&view=video#" ><i class="glyphicon glyphicon-facetime-video" ></i>Videos</a></li>
                          <li><a class="page-scroll" href="<?php echo $site_url;?>?ctrl=feed&view=single#" ><i class="glyphicon glyphicon-cd" ></i>Singles</a></li>
                          <li><a class="page-scroll" href="<?php echo $site_url;?>?ctrl=feed&view=photo#" ><i class="glyphicon glyphicon-picture" ></i>Photos</a></li>
                          <!--<li><a class="page-scroll" href="<?php echo $site_url;?>?ctrl=feed&view=album#" ><i class="fa fa-vinyl" ></i>Albums</a></li>-->
                          <li><a class="page-scroll" href="<?php echo $site_url;?>?ctrl=feed&view=interview#" ><i class="glyphicon glyphicon-phone" ></i>Interviews</a></li>


                          <!--<li><a class="page-scroll" href="#" onclick="<?php //echo "loadPage('http://freelabel.net/submit/views/db/showcase_schedule.php', '#main_display_panel', 'dashboard', '".$_SESSION['user_name']."')"; ?>"><i class="glyphicon glyphicon-usd" ></i>Merch</a></li>-->
                        </ul>
                    </li>

                    <li class="dropdown hide-if-expired" >
                        <a class="page-scroll dropdown-toggle" href='#' type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="glyphicon glyphicon-star" ></i> Showcase</a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                          <li><a class="page-scroll" href="#" onclick="<?php echo "loadPage('http://freelabel.net/submit/views/db/recent_posts.php', '#main_display_panel', 'dashboard', '".$_SESSION['user_name']."','','','dashboard' )"; ?>"><i class="glyphicon glyphicon-dashboard" ></i>Your Dashboard</a></li>
                          <li><a class="page-scroll" href="#" onclick="<?php echo "loadPage('http://freelabel.net/submit/views/db/recent_posts.php', '#main_display_panel', 'stats', '".$_SESSION['user_name']."' ,'','','stats' )"; ?>"><i class="glyphicon glyphicon-signal" ></i>View Stats</a></li>
                          <li><a class="page-scroll" href="#" onclick="<?php echo "loadPage('http://freelabel.net/submit/views/db/user_photos.php', '#main_display_panel', 'dashboard', '".$_SESSION['user_name']."' , '','','drive')"; ?>"><i class="glyphicon glyphicon-hdd" ></i>View Files</a></li>
                          <li><a class="page-scroll" href="<?php echo 'http://upload.freelabel.net/?uid='.$_SESSION['user_name']; ?>"><i class="glyphicon glyphicon-upload" ></i>Upload Media</a></li>
                          <li><a class="page-scroll" href="#" onclick="<?php echo "loadPage('http://freelabel.net/submit/views/db/showcase_schedule.php', '#main_display_panel', 'dashboard', '".$_SESSION['user_name']."','','','cal' )"; ?>"><i class="glyphicon glyphicon-calendar" ></i>Schedule Events</a></li>
                          <!--<li><a class="page-scroll" href="#" onclick="<?php //echo "loadPage('http://freelabel.net/submit/views/db/showcase_schedule.php', '#main_display_panel', 'dashboard', '".$_SESSION['user_name']."')"; ?>"><i class="glyphicon glyphicon-usd" ></i>Merch</a></li>-->
                        </ul>
                    </li>



                    <li class="dropdown hide-if-expired" >
                        <a class="page-scroll" href="<?php echo 'http://freelabel.net/'.$user_data[0]['twitter']; ?>" ><i class="glyphicon glyphicon-user" ></i> <?php echo $_SESSION['user_name']; ?> <div style='color:#101010;margin-left:5px;display:inline-block;height:22px;width:22px;border-radius:3px;background-color:red;background-size:100%;background-image:url("<?php echo $profile_photo; ?>");'>&nbsp;</div></a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                          <li><a class="page-scroll" href="http://radio.freelabel.net/#" ><i class="glyphicon glyphicon-signal" ></i>Radio</a></li>
                          <li><a class="page-scroll" href="#" onclick="<?php echo "loadPage('http://freelabel.net/submit/views/db/recent_posts.php', '#main_display_panel', 'dashboard', '".$_SESSION['user_name']."')"; ?>"><i class="glyphicon glyphicon-music" ></i>Music</a></li>
                          <li><a class="page-scroll" href="#" onclick="<?php echo "loadPage('http://freelabel.net/submit/views/db/user_photos.php', '#main_display_panel', 'dashboard', '".$_SESSION['user_name']."')"; ?>"><i class="glyphicon glyphicon-picture" ></i>Photos</a></li>
                          <li><a class="page-scroll" href="#" onclick="<?php echo "loadPage('http://freelabel.net/submit/views/db/showcase_schedule.php', '#main_display_panel', 'dashboard', '".$_SESSION['user_name']."')"; ?>"><i class="glyphicon glyphicon-calendar" ></i>Schedule</a></li>
                          <hr>
                          <li><a class="page-scroll" href="<?php echo 'http://freelabel.net/'.$user_data[0]['twitter']; ?>"><i class="glyphicon glyphicon-user" ></i>View Profile</a></li>
                          <li><a class="page-scroll" href="#" onclick="<?php echo "loadPage('http://freelabel.net/submit/views/db/recent_posts.php', '#main_display_panel', 'dashboard-stats', '".$_SESSION['user_name']."')"; ?>"><i class="glyphicon glyphicon-dashboard" ></i>Dashboard</a></li>
                          <li><a class="page-scroll" href="#" onclick="<?php echo "loadPage('http://freelabel.net/submit/views/db/recent_posts.php', '#main_display_panel', 'dashboard', '".$_SESSION['user_name']."')"; ?>"><i class="glyphicon glyphicon-signal" ></i>Stats</a></li>
                        </ul>
                    </li>



                    <li class="dropdown" >
                        <a class="page-scroll dropdown-toggle" href='#' type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="glyphicon glyphicon-option-horizontal" ></i></a>
                        <ul class="dropdown-menu panel-body" aria-labelledby="dropdownMenu1">
                          <h6>Your Account</h6>
                          <li><a class="page-scroll" href="<?php echo 'http://upload.freelabel.net/?uid='.$_SESSION['user_name']; ?>"><i class="glyphicon glyphicon-upload" ></i>Upload Media</a></li>
                          <li><a class="page-scroll" href="#" onclick="<?php echo "loadPage('http://freelabel.net/submit/views/db/showcase_schedule.php', '#main_display_panel', 'dashboard', '".$_SESSION['user_name']."')"; ?>"><i class="glyphicon glyphicon-calendar" ></i>Book An Event</a></li>
                          <!--<li><a class="page-scroll" href="#" onclick="<?php //echo "loadPage('http://freelabel.net/submit/views/db/showcase_schedule.php', '#main_display_panel', 'dashboard', '".$_SESSION['user_name']."')"; ?>"><i class="glyphicon glyphicon-usd" ></i>Merch</a></li>-->
                          <li><a class="page-scroll" href="#" onclick="<?php echo "loadPage('http://freelabel.net/submit/views/db/howtouse.php', '#main_display_panel', 'dashboard', '".$_SESSION['user_name']."')"; ?>"><i class="glyphicon glyphicon-question-sign" ></i>Help</a></li>
                          <li><a class="page-scroll" href="http://freelabel.net/?logout"><i class="glyphicon glyphicon-log-out" ></i>Logout</a></li>
                        </ul>
                    </li>
                    <!-- LOGGED IN -->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
