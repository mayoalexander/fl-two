<?php $config = new Blog($_SERVER['HTTP_HOST']); ?>
    <header class="jumbotron bg-inverse text-center center-vertically" role="banner">
      <div class="container">
        <h1 class="display-3"><?php echo $site['name']; ?></h1>
        <h2 class="m-b-lg"><?php echo $site['description']; ?> <a href="" class="jumbolink">Join now</a>.</h2>
        <a class="btn btn-secondary-outline m-b-md" href="<?php echo $site['http']; ?>register#" role="button"><span class="icon-sketch"></span>Get Started</a>
        <ul class="list-inline social-share">
          <li><a class="nav-link" href="http://twitter.com/<?php echo $site['twitter']; ?>#"><span class="icon-twitter"></span> <?php echo $site['landing-info']['twitter']; ?></a></li>
          <li><a class="nav-link" href="https://www.facebook.com/theAMRecords/#"><span class="icon-facebook"></span> <?php echo $site['landing-info']['facebook']; ?></a></li>
          <!-- <li><a class="nav-link" href="#"><span class="icon-linkedin"></span> <?php //echo $site['landing-info']['twitter']; ?></a></li> -->
        </ul>
      </div>
    </header>
