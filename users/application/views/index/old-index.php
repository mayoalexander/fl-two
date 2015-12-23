<?php
// $config = new Blog($_SERVER['HTTP_HOST']);
// echo '<pre>';
// print_r($site);
// exit;
//$config->showAdminController();

?>
<?php
// ** I can save this shit for a new modual, im not sure where we wshould put it but it is going to be verry useful for something. maybe a pop up modal. **//
// echo '<th>ok</th>';
// echo '<th>Photo</th>';
// echo '<th>Title</th>';
// echo '<th>MP3</th>';
//
// if (isset($site['user']['media']))
// {
// foreach ($site['user']['media'] as $value) {
//
// $posts_panel = '';
// $posts_panel .= '<section class="section-news" style="padding-bottom:0;">
//       <h3 class="sr-only">News</h3>
//       <div class="bg-inverse">
//         <div class="row">
//           <div class="col-md-6 p-r-0">
//             <figure class="has-light-mask m-b-0 image-effect">
//               <img src="'.$value['photo'].'" alt="Article thumbnail" class="img-responsive">
//             </figure>
//           </div>
//           <div class="col-md-6 p-l-0">
//             <article class="center-block">
//               <span class="label label-info">'.$value['twitter'].'</span>
//               <br>
//               <h5><a href="'.$value['blog_story_url'].'">'.$value['blogtitle'].' <span class="icon-arrow-right"></span></a></h5>
//               <p class="m-b-0">
//                 <a href="'.$value['blog_story_url'].'"><span class="label label-default text-uppercase"><span class="icon-tag"></span> Design Studio</span></a>
//                 <a href="'.$value['blog_story_url'].'"><span class="label label-default text-uppercase"><span class="icon-time"></span> '.get_timeago(strtotime($value['submission_date'])).'</span></a>
//               </p>
//             </article>
//           </div>
//         </div>
//       </div>
//   </section>';
//   }
// }


?>

<header class="jumbotron bg-inverse text-center center-vertically" role="banner">
  <div class="container">
    <h1 class="display-3"><?php echo $site['name']; ?></h1>
    <h2 class="m-b-lg"><?php echo $site['description']; ?> <a href="<?php echo $site['http']; ?>users/login" class="jumbolink">Login Now</a>.</h2>
    <a class="btn btn-secondary-outline btn-primary m-b-md" href="http://freelabel.net/users/dashboard/" role="button">Go to Dashboard <span class="fa fa-arrow-right"></span></a>
    <ul class="list-inline social-share">
      <li><a class="nav-link" href="http://twitter.com/<?php echo $site['twitter']; ?>#"><span class="icon-twitter"></span> <?php echo $site['landing-info']['twitter']; ?></a></li>
      <li><a class="nav-link" href="https://www.facebook.com/theAMRecords/#"><span class="icon-facebook"></span> <?php echo $site['landing-info']['facebook']; ?></a></li>
    </ul>
  </div>
</header>

<nav class="section-title row">
<!--   <panel class="col-md-3" >
    <h1>NEW MUSIC DAILY.</h1>
  </panel> -->
  <panel class="col-md-3 pull-left" >
    <h1 class='text-muted'>NEW MUSIC DAILY</h1>
  </panel>
  <panel class="col-md-3 pull-right" style='text-align:right;'>
    <h3 class='text-muted'><a href="http://freelabel.net/radio/"><span style="color:red;" >LIVE</span> ON AIR</a></h3>
    <script src="https://embed.radio.co/player/c1389e1.js"></script>
  </panel>
</nav>

<section class="front-page-posts">


        <?php $files = $config->display_user_posts('admin' , 50);
        echo $files['posts']; ?>


</section>
<!--
<section class="row" style='padding:5%;'>
    <div class="col-md-8">
        <div class="card card-inverse card-social text-center">
          <div class="card-block has-gradient">
            <img src="<?php echo $site['user']['profile-image'] ?>" height="90" width="90" alt="Avatar" class="img-circle">
            <h5 class="card-title">Joel Fisher</h5>
            <h6 class="card-subtitle">hey@joelfisher.com</h6>
            <button type="submit" class="btn btn-secondary-outline btn-sm">Follow</button>
          </div>
          <div class="card-block container">
            <div class="row">
              <div class="col-md-4 card-stat">
                <h4>149 <small class="text-uppercase">Shots</small></h4>
              </div>
              <div class="col-md-4 card-stat">
                <h4>1,763 <small class="text-uppercase">Follows</small></h4>
              </div>
              <div class="col-md-4 card-stat">
                <h4>324 <small>D/Ls</small></h4>
              </div>
            </div>
          </div>
        </div>
    </div>
  	<div class="col-md-4">
        <div class="card card-chart">
          <div id="chart-holder" class="center-block" data-active="90%">
            <canvas id="chart-area" class="center-block" width="820" height="820" style="width: 410px; height: 410px;"></canvas>
          </div>
          <ul class="list-group">
            <li class="list-group-item complete">
              <span class="label pull-right">324</span>
              <span class="icon-status status-completed"></span> Completed
            </li>
            <li class="list-group-item">
              <span class="label pull-right">34</span>
              <span class="icon-status status-backlog"></span> In backlog
            </li>
            <li class="list-group-item">
              <span class="label pull-right">20</span>
              <span class="icon-status status-noticket"></span> Without ticket
            </li>
          </ul>
        </div>
        <hr class="invisible">
      </div>
</section>
 -->


 <header class="jumbotron bg-inverse text-center center-vertically" role="banner">
   <div class="container">
     <h1 class="display-3">Want More?</h1>
     <h2 class="m-b-lg">Create your account! <a href="" class="jumbolink">Become the Movement</a>.</h2>
     <a class="btn btn-secondary-outline m-b-md" href="https://www.facebook.com/dialog/oauth?client_id=450514531818920&redirect_uri=http%3A%2F%2Ffreelabel.net%2Fusers%2Flogin%2FregisterWithFacebook&state=a12898f06291c3d8aba047bcc535d9d0&sdk=php-sdk-3.2.3&scope=email#" role="button"><span class="icon-facebook"></span>Signin with Facebook</a>
     <ul class="list-inline social-share">
       <li><a class="nav-link" href="http://twitter.com/<?php echo $site['twitter']; ?>#"><span class="icon-twitter"></span> <?php echo $site['landing-info']['twitter']; ?></a></li>
       <li><a class="nav-link" href="https://www.facebook.com/theAMRecords/#"><span class="icon-facebook"></span> <?php echo $site['landing-info']['facebook']; ?></a></li>
     </ul>
   </div>
 </header>


<script type="text/javascript">
  $(function(){
    $('.dash-filter').click(function(){
      var tabName = $(this).attr('data-load');
      //alert(tabName + ' clicked!');
    });
  });

</script>
