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
$current_page = '0';
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
  .background-tint-promo {
    background-color:rgba(0,0,0,0.75);
    padding:2%;
    /*background-color:red;*/
  }
  .background-tint-promo {
    padding-bottom:10vh;
    padding-top:10vh;
  }
  .btn-primary-outline {
    background-color: transparent;
  }
  .full-width-article img {
    margin-right: 12px;
  }
  .promo-bg-img {
    z-index: -10;
    width:100%;
    position:absolute;
    -webkit-filter: blur(20px);
    filter: blur(20px);
    opacity: 0.6;
/*    -webkit-filter: brightness(0.30);
    filter: brightness(0.30);*/
  }
  .featured-ad {
    padding-top: 2em;
    overflow: hidden;
  }
  .featured-ad h1 {
    margin-top:1em;
    margin-left:0.5em;
  }
  panel > div.col-md-3 {
    padding-bottom:3em;
  }
</style>
<header class="jumbotron feature bg-inverse text-center center-vertically" role="banner">
  <div class="container jumbotron-body">
    <!-- <div class="background-tint"></div> -->
    <h1 class="display-3"><?php echo $site['name']; ?></h1>
    <p class="m-b-lg"><?php echo $site['description']; ?> <a href="<?php echo $site['http']; ?>users/login" class="jumbolink">Login Now</a>.</p>
    <p class="m-b-lg"><?php echo $site['media']['photos']['front-page'][$r]['title']; ?> <a href="<?php echo 'http://freelabel.net/users/index/image/'.$site['media']['photos']['front-page'][$r]['id']; ?>" class="jumbolink">View Now</a>.</p>
    <a class="btn btn-secondary-outline m-b-md" href="http://freelabel.net/users/<?php echo $calltoaction_link; ?>" role="button"><?php echo $calltoaction; ?></a>
  </div>
</header>







<!-- first promo -->
<nav class="promo-container row row-eq-height" >
  <img class="promo-bg-img" src="<?php echo $site['media']['photos']['ads'][0]['image'] ; ?>">

  <panel class="featured-ad row"  >
    <h1>NEW EXCLUSIVES DAILY.</h1>
    <!-- current-promo advertisement --> 
      <div class="col-md-3">
        <a href="http://freelabel.net/users/index/image/<?php echo $site['media']['photos']['ads'][0]['id'] ; ?>"><img src="<?php echo $site['media']['photos']['ads'][0]['image'] ; ?>"></a>
      </div>

      <div class="col-md-9">
        <h2 class='text-muted'><?php echo $site['media']['photos']['ads'][0]['title'] ; ?></h2>
        <p><?php echo $site['media']['photos']['ads'][0]['caption'] ; ?></p>
        <a href="http://freelabel.net/users/index/image/<?php echo $site['media']['photos']['ads'][0]['id'] ; ?>" class="btn btn-secondary-outline m-b-md">View Now</a>
      </div>
  </panel>
</nav>






<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://public.radio.co/playerapi/jquery.radiocoplayer.min.js"></script>

<section class="site-break dropdown">
  <div class="container" style="max-width:500px;">
      <hr>
      <h1 class="display-3"><button class="radio-menu player-trigger audio-player-title btn btn-secondary-outline"><i class="fa fa-circle-o-notch fa-spin"></i> Loading</button> FLRADIO</h1>
      <h2 class="radioplayer"
      data-elapsedtime="false"
      data-showartwork="false"
      data-showplayer="false"
      data-volumeslider="false"
      data-src="http://streaming.radio.co/s95fa8cba2/listen"
      data-nowplaying="true"></h2></center>
      <input type="range" id="volume-meter"></input>
      
      <br><br>
      <?php 
  // $page_title = 'Listen LIVE ON-AIR to #FREELABELRADIO ';
  // $page_url = 'RADIO.FREELABEL.NET';
  // echo $config->share_page_button($page_title , $page_url); 
  ?>
  </div>



<script>$('.radioplayer').radiocoPlayer();</script>
<!-- <script type="text/javascript" src="http://freelabel.net/js/radio.js"></script> -->


  <!-- <span class="page-title">Stay Connected. Subscribe to FREELABEL Magazine</span> -->
<!--   <a class="btn btn-secondary-outline dropdown-toggle" href="http://twitter.com/@freelabelnet" target="_blank"><i class="fa fa-twitter" ></i> Follow Us</a> -->
<!--   <ul class="dropdown-menu">
    <li><a href="#">HTML</a></li>
    <li><a href="#">CSS</a></li>
    <li><a href="#">JavaScript</a></li>
  </ul> -->
</section>




<section id='section-linemove-1' class="container page-header main-feed">
        <?php $files = $config->display_user_posts_new('admin' , $current_page);
        echo $files['posts']; ?>
</section> 








<!-- second promo -->
<nav class="promo-container row row-eq-height"  style="background-image:url('<?php echo $site['media']['photos']['ads'][1]['image'] ; ?>');">
  <panel class="col-md-12 pull-left featured-ad background-tint-promo"  >
    <h1>SOMETHING IS ALWAYS GOING ON.</h1>
    <!-- current-promo advertisement --> 


      <div class="col-md-9">
        <h2 class='text-muted'><?php echo $site['media']['photos']['ads'][1]['title'] ; ?></h2>
        <p><?php echo $site['media']['photos']['ads'][1]['caption'] ; ?></p>
        <a href="http://freelabel.net/users/index/image/<?php echo $site['media']['photos']['ads'][1]['id'] ; ?>" class="btn btn-secondary-outline m-b-md">View Now</a>
      </div>


      <div class="col-md-3">
        <a href="http://freelabel.net/users/index/image/<?php echo $site['media']['photos']['ads'][1]['id'] ; ?>"><img src="<?php echo $site['media']['photos']['ads'][1]['image'] ; ?>"></a>
      </div>

      
  </panel>
</nav>







<script type="text/javascript" src='http://freelabel.net/js/dashboard.js'></script>
<script type="text/javascript">
  $(function(){
    $('.dash-filter').click(function(){
      var tabName = $(this).attr('data-load');
      //alert(tabName + ' clicked!');
    });
  });
</script>
<script type="text/javascript">
$(function(){
  autoStart();
});
</script>





