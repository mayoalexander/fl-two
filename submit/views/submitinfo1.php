<style type="text/css">

.col-lg-4 ul {
  text-align:left;

}
.col-lg-4 ul li {
  list-style-type: none;
  line-height: 25px;
  font-size: 100
}

.main_image {
  width:100%;
  border: 1px solid #FE3F44;

}
.jumbotron {
  //background-image:url('http://freelabel.net/submit/uploads/20150103_12:58%20-HomeGrown.jpg');
  //background-color:#000;
  //border: 1px solid #FE3F44;
}
.jumbotron p {
  font-size:100%;
}
#ribz {
  color:#000000;
}
#ribzframe {
  width:100%;
  height:500px;
  border: 0;
}
input, select {
  background-color: #303030;
  color:#e3e3e3;
  font-size: 100%;
}

</style>



<!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->

  <div class="container marketing">
    <div class="jumbotron" id='jumbotron' style='background-repeat:no-repeat; background-position:center center;background-size:100% auto;border-radius:2px;height:900px;' >
      <h1 style="display:inline;">SHOWCASE YOUR MUSIC ON FREELABEL</h1>
      <h2 class='text-muted' style="display:block;" >CREATE AN ACCOUNT AND START SHARING WITH NO LIMITS.</h2>
      <div class=' col-md-8'>
        <img class='main_image' src="http://freelabel.net/submit/uploads/20150228_21:24 -@FREELABELNET.jpg">
      </div>

      <div class='col-md-4 go_full_screen_mobile'>
        <h3>What is FREELABEL? <span class="text-muted">A Magazine, Radio, TV, Studio Network all in one.</span></h3>
        <p class="lead">The FREELABEL Network consists of exclusive music released DAILY through a 24/7 Radio, Magazine, On-demand TV & Social Online Community of over 3.5+ Million individuals that provide the world with innovative new ways to experience entertainment. The main goal of FREELABEL is to provide artists with a platform for building and running a successful entertainment business.</p>
        <p>Login to submit unlimited singles, albums, videos, merchandise, photos, and book your interviews with your FREELABEL account!</p>
        <p>
          <a href='http://freelabel.net/submit/views/signin.php#signin' class="btn btn-primary">Login</a>
          <a href='<?php echo $projects[1] ?>' class="btn btn-success " role="button">Register</a>
          <a href='#upload' class="btn btn-warning" role="button">Upload</a>
          <!--<a href='<?php //echo $freetrial[1] ?>' class="btn btn-success " role="button">FREE TRIAL</a>-->
        </p>
        </div>

        
      </div>
    </div>

    <!-- Three columns of text below the carousel -->

    <!-- START THE FEATURETTES -->
    <a name="radio"></a>
    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <a name="upload"></a>
          <h1>Upload Your Music</h1>
          <p>It's free to upload! You'll need a FREELABEL account to submit to Radio DJs, Magazine Editors, and more opportunities. Register now!</p>
          <?php include('submit/public_single_uploader.php'); ?>

          <hr>
        <h1>Account Types</h1>
        <p>Create an account to start uploading to millions on waiting music lovers.</p>
        <hr>
        <div id='account_types' class='panel panel-body' >
          <div class="list-group">
            <div class="list-group-item active">
              <label class='label label-success ' >Basic</label><br><br>
              <h3 class="list-group-item-heading">Magazine + Radio Distribution Campaign - <?php echo $projects[0] ?></h3>
              <p class="list-group-item-text">Get Professional Promotion, Marketing, Graphic Design, & Music Distribution via Radio, Blog, Magazine & Events. We provide you with monthly interviews that will be placed in FREELABEL Magazine & Radio.</p>
              <h4>INCLUDES:</h4>
              <ul>
                <li><span class='glyphicon glyphicon-user'></span> - One on One Magazine/Radio Interviews</li>
                <li><span class='glyphicon glyphicon-dashboard' ></span> - 100% Customized Profile to View Campaigns & Placements</li>
                <li><span class='glyphicon glyphicon-globe' ></span> - 24/7 Radio Rotation</li>
                <li><span class='glyphicon glyphicon-usd'></span> - Music Distribution</li>
                <li><span class='glyphicon glyphicon-usd'></span> - Magazine / Streaming Royalties</li>

              </ul>
              <hr>
              <a type="button" href="<?php echo $projects[1] ?>" class="btn btn-lg btn-warning" target="_blank" ><?php echo $projects[0] ?> / month</a>
              <!--<a type="button" href="<?php //echo $projects[3] ?>" class="btn btn-lg btn-success" target="_blank"><?php //echo $projects[2] ?> / year</a>-->
            </div>
          </div>


          <div class="list-group">
            <a href="<?php echo $exclusive[1] ?>" class="list-group-item">
              <label class='label label-success ' >Exclusive</label><br><br>
              <h3 class="list-group-item-heading">Exclusive Magazine + Radio Production Management - <?php echo $exclusive[0] ?></h3>
              <p class="list-group-item-text">Get your Project Release professionally Produced, Campaigned, Publishing, & Distribution via iTunes, Google Play, Amazon, and Available Store Locations in over 800+ cities in the United States. Includes in-studio services such as Studio Recording, Audio + Visual Production, Instrumentals, & Radio Broadcasting. We have 3 Locations in Dallas, Atlanta, & Houston you have access to at any time.</p>
              <h4>INCLUDES:</h4>
              <ul>
                <li><span class='glyphicon glyphicon-user'></span> - One on One Magazine/Radio Interviews</li>
                <li><span class='glyphicon glyphicon-dashboard' ></span> - 100% Customized Dashboard to View Campaigns</li>
                <li><span class='glyphicon glyphicon-globe' ></span> - 24/7 Radio Rotation</li>
                <li><span class='glyphicon glyphicon-picture' ></span> - Graphic Artwork Design</li>
                <li><span class='glyphicon glyphicon-phone' ></span> - Web/App Design</li>
                <li><span class='glyphicon glyphicon-calendar'></span> - Event Booking</li>
                <li><span class='glyphicon glyphicon-usd'></span> - Royalties Paid per Spin/Magazine/Stream</li>
              </ul>
              <hr>
              <button type="button" class="btn btn-lg btn-default"><?php echo $exclusive[0] ; ?> / month</button>
            </a>
          </div>
        </div> <!-- account types -->
          


        </div>
        <div class="col-md-5">
          <div class='panel'>
            <div class='panel-body'>
              <h2 class="featurette-heading">OUR STUDIO:</h2>
              <!--<img class="featurette-image img-responsive" src="http://freelabel.net/submit/uploads/20141116_22:28 -Champs3 Mixtape.jpg" alt="Generic placeholder image">-->
              <div id='advertisement_block' style='height:1600px;'>
                <?php 
                $brickbybrick_marketing = 1;
                include('ads.php'); 
                ?>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
