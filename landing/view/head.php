<?php
if (isset($_GET['dev'])) {
print_r($site);
exit;
}
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $site['name']; ?>: <?php echo $site['description']; ?></title>
    <meta name="description" content="A free HTML template and UI Kit built on Bootstrap" />
    <meta name="keywords" content="free html template, bootstrap, ui kit, sass" />
    <meta name="author" content="Peter Finlan and Taty Grassini Codrops" />
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
    <link rel="stylesheet" type="text/css" href="https://code.createjs.com/createjs-2015.05.21.min.js">

    <style type="text/css">
    /* INTEGRATE INTO CSS FILE */
    .img-responsive {
      margin:auto;
    }
    .jumbotron {
      background-image:url('http://freelabel.net/images/studio-zac.jpg');
      height: 100vh;
    }
    .jumbotron .container {
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
    .label-info {
      background-color:<?php echo $site['primary-color']; ?>;
    }
    </style>
  </head>

  <body>
    <nav class="navbar navbar-dark bg-inverse bg-inverse-custom navbar-fixed-top">
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
            <li class="nav-item nav-item-toggable active">
              <a class="nav-link" href="<?php echo $site['http']; ?>#about">About<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item nav-item-toggable">
              <a class="nav-link" href="<?php echo $site['http']; ?>radio/">Radio</a>
            </li>
            <li class="nav-item nav-item-toggable">
              <a class="nav-link" href="<?php echo $site['http']; ?>/mag/" >Magazine</a>
            </li>
            <li class="nav-item nav-item-toggable">
              <a class="nav-link" href="http://studios.<?php echo $site['domain']; ?>/">Studios</a>
            </li>
            <li class="nav-item nav-item-toggable">
              <a class="nav-link" href="http://upload.<?php echo $site['domain']; ?>/?uid=submission">Upload</a>
            </li>
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
                    <!-- <h6>yourname@<?php echo $site['http']; ?></h6> -->
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
