<?php
// $config = new Blog($_SERVER['HTTP_HOST']);
// echo '<pre>';
// print_r($site);
// exit;
//$config->showAdminController();
// print_r($_SESSION)

if (isset($_SESSION['user_name'])) {
  $calltoaction = 'Return to Dashboard';
  $calltoaction_link = 'dashboard/';
} else {
  $calltoaction = 'Create Account';
  $calltoaction_link = 'login/register';
}

?>
<style type="text/css">
  
  html, body {
    overflow-y:hidden;
  }
  .jumbotron {
    background-color:#101010;
  }
  .jumbotron-body {
    background-color: rgba(0,0,0,0.4);
  }
</style>
<header class="jumbotron feature bg-inverse text-center center-vertically" role="banner">
  <div class="container jumbotron-body">
    <!-- <div class="background-tint"></div> -->
    <h1 class="display-3"><?php echo $site['name']; ?></h1>
    <h2 class="m-b-lg"><?php echo $site['description']; ?> <a href="<?php echo $site['http']; ?>users/login" class="jumbolink">Login Now</a>.</h2>
    <p class="m-b-lg"><?php echo $site['media']['photos']['front-page'][$r]['title']; ?> <a href="<?php echo 'http://freelabel.net/users/index/image/'.$site['media']['photos']['front-page'][$r]['id']; ?>" class="jumbolink">View Now</a>.</p>
    <a class="btn btn-secondary-outline btn-primary btn-social m-b-md" href="http://freelabel.net/users/<?php echo $calltoaction_link; ?>" role="button"><?php echo $calltoaction; ?></a>
    <ul class="list-inline social-share">
     <li>
       <a class="nav-link" href="http://freelabel.net/users/login/register">Register</a>
     </li>
      <li><a class="nav-link" href="http://twitter.com/<?php echo $site['twitter']; ?>#"><span class="icon-twitter"></span> @freelabelnet <?php //echo $site['landing-info']['twitter']; ?></a></li>
      <li><a class="nav-link" href="https://www.facebook.com/theAMRecords/#"><span class="icon-facebook"></span> /freelabel<?php //echo $site['landing-info']['facebook']; ?></a></li>
    </ul>
  </div>
</header>

  <nav style="display:none;"  class="section-title row"  style="background-image:url('<?php echo $site['media']['photos']['ads'][0]['image'] ; ?>');">
  <!--   <panel class="col-md-3" >
    </panel> -->

    <panel class="col-md-9 pull-left featured-ad "  >
      <h1>NEW EXCLUSIVES DAILY.</h1>
      <!-- current-promo advertisement --> 

        <div class="col-md-3">
          <a href="http://freelabel.net/users/index/image/<?php echo $site['media']['photos']['ads'][0]['id'] ; ?>"><img src="<?php echo $site['media']['photos']['ads'][0]['image'] ; ?>"></a>
        </div>

        <div class="col-md-9">
          <h2 class='text-muted'><?php echo $site['media']['photos']['ads'][0]['title'] ; ?></h2>
          <p><?php echo $site['media']['photos']['ads'][0]['caption'] ; ?></p>
          <a href="http://freelabel.net/users/index/image/<?php echo $site['media']['photos']['ads'][0]['id'] ; ?>" class="btn btn-social bg-google">View Now</a>
        </div>
        
    </panel>
    <panel class="col-md-3 pull-right" style='text-align:right;'>
      <!-- radio player --> 
      <h3 class='text-muted'><a href="http://freelabel.net/radio/"><span style="color:red;" >LIVE</span> ON AIR</a></h3>
      <script src="https://embed.radio.co/player/c1389e1.js"></script>
    </panel>
  </nav>
<!-- 
<section>


        // <?php $files = $config->display_user_posts('admin' , 50);
        // echo $files['posts']; ?>


</section> -->


<script type="text/javascript">
  $(function(){
    $('.dash-filter').click(function(){
      var tabName = $(this).attr('data-load');
      //alert(tabName + ' clicked!');
    });
  });

</script>
