<!DOCTYPE html>
<?php 
if (file_exists('../../../config/index.php')) {
	include_once('../../../config/index.php');
}
if (file_exists('../../config/index.php')) {
	include_once('../../config/index.php');
}
if (file_exists('../config/index.php')) {
	include_once('../config/index.php');
}
if (file_exists('config/index.php')) {
	include_once('config/index.php');
}

?>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<title>FREELABEL | Music Submission</title>
		<meta name="description" content="Fullscreen Form Interface: A distraction-free form concept with fancy animations" />
		<meta name="keywords" content="fullscreen form, css animations, distraction-free, web design" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="<?php echo HTTP; ?>ico/favicon.ico">
		<link rel="stylesheet" type="text/css" href="<?php echo HTTP; ?>submit/upload/css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo HTTP; ?>submit/upload/css/demo.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo HTTP; ?>submit/upload/css/component.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo HTTP; ?>submit/upload/css/cs-select.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo HTTP; ?>submit/upload/css/cs-skin-boxes.css" />
		<style type="text/css">
		body {
			//background-color:#101010;
		}
		.fs-anim-lower {
			color:#e3e3e3;

		}
		</style>
		<script src="<?php echo HTTP; ?>submit/upload/js/modernizr.custom.js"></script>
	</head> 
	<body>
		<div class="container">

			<div class="fs-form-wrap" id="fs-form-wrap">
				<div class="fs-title">
					<h1><img src="http://freelabel.net/images/FREELABELLOGO.gif" style='width:75px;height:75px;background-color:#FE3F44;padding:10px;display:inline-block;'> Music Submission</h1>
					<div class="codrops-top">
						<a class="codrops-icon codrops-icon-prev" href="http://freelabel.net/"><span>Back to FREELABEL</span></a>
						<a class="codrops-icon codrops-icon-info" href="#"><span>This is where you can upload your music directy to our Radio DJs and Magazine Editors.</span></a>
					</div>
				</div>
				<form id="myform" class="fs-form fs-form-full" autocomplete="off" method="POST" action="http://freelabel.net/x/audiomaker.php" id="submissions_form" enctype="multipart/form-data">
					<ol class="fs-fields">
						
						<li>
							<label class="fs-field-label fs-anim-upper" for="q1" data-info="Enter your track name, features, and/or production credits below.">Track Name</label>
							<input class="fs-anim-lower" id="q1" type="text" name="trackname" placeholder="Enter title, features, production, etc..."  required/>
							
							<br>
							<label class="fs-field-label fs-anim-upper" for="q2" data-info="Make sure your file is in MP3 Format & your ID3 tags are updated to the latest version! (2.4+ or higher)">Upload Audio</label>
							<input style='font-size:40%;' class="fs-anim-lower" id="q2" type="file" name="audiofile" placeholder="" required/>
							<br><br>
							<br><br>
						</li>
						<li>
							<label class="fs-field-label fs-anim-upper" for="q3" data-info="We won't send you spam, we promise...">What's your phone contact?</label>
							<input class="fs-anim-lower" id="q3" type="text" name="phone" placeholder="Enter Phone Number (ex. 123-456-7890)"  required/>
						<br><br>
							<label class="fs-field-label fs-anim-upper" for="q4" data-info="We won't send you spam, we promise...">What's your email address?</label>
							<input class="fs-anim-lower" id="q4" type="email" name="email" placeholder="Enter Email Address" required/>
							<br><br>
							<br><br>
						</li>

						<li>
							<label class="fs-field-label fs-anim-upper" for="q1">What's your @Twittername?</label>
							<input class="fs-anim-lower" id="q1" name="twittername" type="text" placeholder="@typeItHere" required/>
							<br><br>
							<label class="fs-field-label fs-anim-upper" for="q2" data-info="We won't send you spam, we promise...">Upload Photo // Artwork</label>
							<input style='font-size:40%;' class="fs-anim-lower" id="q2" type="file" name="userphoto" placeholder="" required/>
							<br>
							<input class="fs-anim-lower" id="q4" type="text" name="twitpic" placeholder="Enter Twitpic (optional)"/>
							<br><br>
							<br><br>
						</li>
					</ol><!-- /fs-fields -->
					<input type='hidden' name='submit' value='submit'>
					<button class="fs-submit" type="submit">Submit</button>
				</form><!-- /fs-form -->
			</div><!-- /fs-form-wrap -->


		</div><!-- /container -->
		<script src="<?php echo HTTP; ?>submit/upload/js/classie.js"></script>
		<script src="<?php echo HTTP; ?>submit/upload/js/selectFx.js"></script>
		<script src="<?php echo HTTP; ?>submit/upload/js/fullscreenForm.js"></script>
		<script>
			(function() {
				var formWrap = document.getElementById( 'fs-form-wrap' );

				[].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {	
					new SelectFx( el, {
						stickyPlaceholder: false,
						onChange: function(val){
							document.querySelector('span.cs-placeholder').style.backgroundColor = val;
						}
					});
				} );

				new FForm( formWrap, {
					//onReview : function() {
						//classie.add( document.body, 'overview' ); // for demo purposes only
						alert('oka');
					//}
				} );
			})();
		</script>
	</body>
</html>