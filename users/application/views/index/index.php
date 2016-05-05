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
    width:100%;
    position:absolute;
    -webkit-filter: blur(10px);
    filter: blur(10px);
  }
  .promo-title-head {
    font-size:1em;
    margin-top:1em;
    margin-bottom:1em;
  }
  .display-3 {
    font-weight: 700;
  }

  .featured-ad {
    padding-top: 2em;
    overflow: hidden;
  }
  .promos-table img {
    width: 100%;
  }
  .promos-table div {
    padding:5em;
  }
  .promo-feed img {
    width: 100%;
  }
  .promo-feed {
    padding-top: 3.5em;
  }
  .promo-panel {
    display: block;
    margin-bottom:3.5em;
  }
  .promo-panel span {
    background-color: rgba(100,100,100,0.8);
    padding:0.5em;
    position: absolute;
    color: #e3e3e3;
    transition: background-color 0.5s;
    text-transform: uppercase;
    font-size: 0.75em;
  }
  .promo-panel span:hover {
    background-color: rgba(100,100,100,1);
  }
  .promo-feed .page-header {
    margin-bottom: 2em;
  }
  .header-description {
    font-size:1.63em;
  }
  /* LARGE SCREENS*/
  @media screen and (min-width: 460px) {
    .main-feed {
      padding-left:5em;
    }
  }
  /* SMALL SCREENS*/
  @media screen and (max-width: 460px) {
    .container {
      padding-left:0;
      padding-right:0;
    }
    .display-3 {
      font-size: 3rem;
    }
    .promo-feed .page-header, .main-feed .page-header {
      font-size: 2em;
      margin: 0;
      font-weight:700;
      margin-left: 0.34em;
    }
    .promo-title-head {
      padding-left:1em;
      padding-right:1em;
    }
    .view-promo-button {
      margin-left: 2em;
    }
    .m-b-md {
      padding: 1.5em;
      font-size: 0.5em;
    }
  }
</style>
<header class="jumbotron feature bg-inverse text-center center-vertically" role="banner">
  <div class="container jumbotron-body">
    <!-- <div class="background-tint"></div> -->
    <h1 class="display-3"><?php echo $site['name']; ?></h1>
    <p class="header-description"><?php echo $site['description']; ?> <a href="<?php echo $site['http']; ?>users/login" class="jumbolink">Login Now</a>.</p>
    <!--<p class="m-b-lg"><?php echo $site['media']['photos']['front-page'][$r]['title']; ?> <a href="<?php echo 'http://freelabel.net/users/index/image/'.$site['media']['photos']['front-page'][$r]['id']; ?>"class="jumbolink">View Now</a>.</p> -->
    <a class="btn btn-secondary-outline btn-xs m-b-md" href="http://freelabel.net/users/<?php echo $calltoaction_link; ?>" role="button"><?php echo $calltoaction; ?></a>
  </div>
</header>





<section class="container">
  <section class="container col-md-3 promo-feed">
          <h2 class="page-header clearfix"><span class="pull-left">Promos</span></h2>
        <?php 
          foreach ($site['media']['photos']['ads'] as $key => $site) {
            echo "<panel class='promo-panel'>
                    <span class='text-muted'>".$site['type']."</span>
                    <a href=\"http://freelabel.net/users/index/image/".$site['id']."\"><img src=\"".$site['image']."\"></a>
                    <h5 class='promo-title-head text-muted'>".$site['title']."</h5>
                    <a href=\"http://freelabel.net/users/index/image/".$site['id']."\" class=\"btn btn-secondary-outline m-b-md view-promo-button\">View Now</a>
                  </panel>";
          }
        ?>
  </section> 
  <section id='section-linemove-1' class="container page-header main-feed col-md-9">
          <?php 
          $files = $config->display_user_posts_new('admin' , $current_page);
          echo $files['posts']; ?>
  </section>
</section>









<!-- second promo -->
<nav class="promo-container row row-eq-height"  style="background-image:url('<?php echo $site['media']['photos']['ads'][1]['image'] ; ?>');display:none;">
  <panel class="col-md-12 pull-left featured-ad background-tint-promo"  >
    <h1>SOMETHING IS ALWAYS GOING ON.</h1>
    <!-- current-promo advertisement --> 

      <div class="col-md-9">
        <h2 class='text-muted'><?php echo $site['media']['photos']['ads'][1]['title'] ; ?></h2>
        <p><?php echo $site['media']['photos']['ads'][0]['caption'] ; ?></p>
        <a href="http://freelabel.net/users/index/image/<?php echo $site['media']['photos']['ads'][0]['id'] ; ?>" class="btn btn-secondary-outline m-b-md">View Now</a>
      </div>

      <div class="col-md-3">
        <a href="http://freelabel.net/users/index/image/<?php echo $site['media']['photos']['ads'][1]['id'] ; ?>"><img src="<?php echo $site['media']['photos']['ads'][1]['image'] ; ?>"></a>
      </div>

  </panel>
</nav>









<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://public.radio.co/playerapi/jquery.radiocoplayer.min.js"></script>

<section class="site-break dropdown" >
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
  </div>
  <script>$('.radioplayer').radiocoPlayer();</script>
</section>






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





