<style type="text/css">
.main_image {
	width:100%;
	border: 1px solid #FE3F44;

}
.jumbotron {
	background-image:url('http://freelabel.net/submit/uploads/20141115_08:26%20-RiBZ%20Clothing%20x%20FREELABEL:%20TheTakeoverCompliation%20EP%20Release%20Party.jpg');
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



    <div class="container marketing">
      <div class="jumbotron" id='jumbotron' style='background:url("http://freelabel.net/submit/uploads/20150103_12:58%20-HomeGrown.jpg") no-repeat center center;background-size:100% auto;border-radius:2px;' >
        	
       		<div class='col-md-4'>
       			<img class='main_image' src="http://freelabel.net/submit/uploads/20141213_00:17%20-January%2024th%20|%20Champs%203%20Pre-Promotion.jpg">
			</div>

			<div class='col-md-8'>
				<h1 style="display:inline;">CHAMPS3</h1>
		        <h2 class='text-muted' style="display:inline;" > - Jan 24th</h2>
		        <h3 class='text-muted' >Documentary + Compilation EP</H3>
		        <h4></h4>
		        <p>#Champs3 is a Documentary, Compilation EP showcasing individuals who have become champions in their passions. We get to follow some artists such as Johnny Cinco, Maxo Kream, Lex Luger, and more.</p>
		        <p>Login to submit unlimited singles, albums, videos, merchandise, photos, and book your interviews with your FREELABEL account!</p>
		        <p>
		          <a href='http://freelabel.net/submit/views/signin.php' class="btn btn-primary " role="button">Login</a>
		          <a href='<?php echo $projects[1] ?>' class="btn btn-success " role="button">Register</a>
				  <a href='#upload' class="btn btn-warning" role="button">Upload</a>
		        </p>
			</div>

        
      </div>
    </div>


<div id='ribz'>
		<div class='row'>

			<div class='col-md-8'>
				<h4 style='color:#fff;' class='panel-heading'>Documentary Instagram Commerical</h4>
				<hr>
				<div>
					<iframe width="100%" height="460px" src="//www.youtube.com/embed//Ezj8trUI-RU?autoplay=1" frameborder="0" allowfullscreen></iframe>
					<h4 style='color:#fff;' class='panel-heading'>About The Event</h4>
					<p style='color:#fff;' class='panel-body' >DFW Battle League and FREELABEL present #CHAMPS3 DVD + CD Release Paat Brick By Brick Studios in celebration of the soon-to-drop collaboration mixtape. Come enjoy a DJ, live musical performances, sponsored beverages, and some free FREELABEL gear. Also get a chance to buy the very anticipated <u>FLMAG: Issue #1</u> before it hits stores!</p>
				</div>
				<hr>
				<h2 class='panel-heading' style='color:#e3e3e3;font-size:300%;'>Music Submissions</h2>
				<?php include('public_single_uploader.php') ?>
				<div>

					<?php 
					$pull = 'studios';
					include('../studios/pull_images.php'); 
					?>

				</div>
			</div>

			<div class='col-md-4'>
			<!--
				<center>
					Share: 
					<a class='btn btn-success btn-xs' href='http://ribzclothing.com' >Twitter</a>
					<a class='btn btn-success btn-xs' href='http://ribzclothing.com' >Facebook</a>
				</center>
			-->
				<img class='main_image' src='http://freelabel.net/submit/uploads/20150102_14:18 -HomeGrown Preview.jpg'>
				
				<hr>

				<div class="list-group">
					<a href="<?php echo $exclusive[1] ?>" class="list-group-item active">
	          		<label class='label label-success ' >Exclusive</label><br><br>
				    <h4 class="list-group-item-heading">Exclusive Placement - <?php echo $exclusive[0] ?></h4>
				    <br>
				    <p class="list-group-item-text">Get Professional Promotion, Marketing, Graphic Design, & Music Distribution via Radio, Blog, Magazine & Events. We provide you with monthly interviews that will be placed in FREELABEL Magazine & Radio.</p>
	          		<ul>
			            <li><span class='glyphicon glyphicon-film'></span> Instagram/Video Advertisment</li>
			            <li><span class='glyphicon glyphicon-user'></span> One on One Magazine/Radio Interviews</li>
			            <li><span class='glyphicon glyphicon-dashboard' ></span> 100% Customized Dashboard to View Campaigns</li>
			            <li><span class='glyphicon glyphicon-globe' ></span> Radio Rotation</li>
			            <li><span class='glyphicon glyphicon-picture' ></span> Graphic Artwork Design</li>
			            <li><span class='glyphicon glyphicon-calendar'></span> Event Booking</li>
			            <li><span class='glyphicon glyphicon-usd'></span> Music Distribution</li>
	        		</ul>
	          		<hr>
				  	<button type="button" class="btn btn-lg btn-success"><?php echo $exclusive[0] ; ?> / month</button>
				  	</a>
				</div>


				<div class='panel' style='display:none;' >
	                <div class='panel-body'>
	                  <h2 class="featurette-heading">OUR STUDIO:</h2><span class="text-muted">
	                  All of our Campaigns, Events, Photos, Videos, Graphic Designs, Web/App Designs, & Audio Productions are all developed In-House at FREELABEL Studios. do live broadcasts, mixtape release parties, clothing popup shops, & concerts of all types.</span><hr>
	                  <!--<img class="featurette-image img-responsive" src="http://freelabel.net/submit/uploads/20141116_22:28 -Champs3 Mixtape.jpg" alt="Generic placeholder image">-->
	                  <div id='advertisement_block' style='height:900px;'>
	                    <?php 
	                      $brickbybrick_marketing = 1;
	                      include('../ads.php'); 
	                    ?>
	                  </div>
	                </div>
	              </div>
			</div>

		</div>


</div><!--- ribz div end -->