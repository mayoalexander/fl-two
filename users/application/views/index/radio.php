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
    /*overflow-y:hidden;*/
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
    <h1 class='display-3'><a href="http://freelabel.net/radio/"><span style="color:red;" >LIVE</span> ON AIR</a></h1>

    <!-- <h2 class="m-b-lg"><?php echo $site['description']; ?> <a href="<?php echo $site['http']; ?>users/login" class="jumbolink">Login Now</a>.</h2> -->
    <!-- <p class="m-b-lg"><?php echo $site['media']['photos']['front-page'][$r]['title']; ?> <a href="<?php echo 'http://freelabel.net/users/index/image/'.$site['media']['photos']['front-page'][$r]['id']; ?>" class="jumbolink">View Now</a>.</p> -->
    <!-- radio player --> 
    <script src="https://embed.radio.co/player/30a7ae8.js"></script>
    <!-- <a class="btn btn-secondary-outline btn-primary btn-social m-b-md" href="http://freelabel.net/users/<?php echo $calltoaction_link; ?>" role="button"><?php echo $calltoaction; ?></a> -->

  </div>
</header>


<script type="text/javascript" src="http://freelabel.net/js/dashboard.js"></script>
<script type="text/javascript">
  $(function(){
    $('.dash-filter').click(function(){
      var tabName = $(this).attr('data-load');
      //alert(tabName + ' clicked!');
    });
  });

</script>
