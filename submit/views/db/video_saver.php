<?php 
//$user_name = $user_name_session;
  if ($user_name == false) {
    $user_name = $_POST['user_name'];
    //echo ' its not set: '.$user_name;
  }


if ($user_name == "admin") {
	$video_status = "active";
}
if ($user_twitter) {
	//echo 'yess!'.$user_twitter;
} else {
	//echo 'no sir!'.$user_twitter;
}

$submit_form = '<br><form class="form-horizontal" method="POST" action="http://freelabel.net/submit/views/db/video_saver.php">
<fieldset>

<!-- Form Name -->
<legend>++ ADD VIDEOS</legend>

<!-- Text input-->
<input name="user_name" type="hidden" value="'.$user_name.'">
<input name="video_status" type="hidden" value="'.$video_status.'">
<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="video_title">Video Title</label>
  <div class="controls">
    <input id="video_title" name="video_title" type="text" placeholder="Enter Video Title.." class="form-control" required="">
  </div>
</div>

<div class="control-group">
  <label class="control-label" for="video_url">Video URL</label>
  <div class="controls">
    <input id="video_url" name="video_url" type="text" placeholder="for example: http://youtu.be/FwB0NohE4iM" class="form-control" required="">
  </div>
</div>
<div class="control-group">
  <label class="control-label" for="twitter">Twitter</label>
  <div class="controls">
    <input id="twitter" name="twitter" type="text" placeholder="@UserNameHere" class="form-control" required="" value='.$user_twitter.' >
  </div>
</div>

<div class="control-group">
  <label class="control-label" for="twitpic">TwitPic</label>
  <div class="controls">
    <input id="twitpic" name="twitpic" type="text" placeholder="for example: '.$twitpic_default_mixtape.'" class="form-control" required="">
  </div>
</div>

<!-- Button -->
<div class="control-group">
  <div class="controls">
    <input type="submit" name="submit" value="SAVE VIDEO" class="btn btn-success"  >
  </div>
</div>
<input type="hidden" name="user_name" value="'.$user_name.'">

</fieldset>
</form>';
?>


<h2 id="sub_label">YOUR VIDEOS:</h2>

<style type="text/css">
.input-xlarge {
		font-size:150%;
		background-color:#303030;
		color:#fff;
	}
.stats {
	-moz-box-shadow:inset 0px 1px 0px 0px #ffffff;
	-webkit-box-shadow:inset 0px 1px 0px 0px #ffffff;
	box-shadow:inset 0px 1px 0px 0px #ffffff;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #ededed), color-stop(1, #dfdfdf) );
	background:-moz-linear-gradient( center top, #ededed 5%, #dfdfdf 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ededed', endColorstr='#dfdfdf');
	background-color:#ededed;
	-webkit-border-top-left-radius:6px;
	-moz-border-radius-topleft:6px;
	border-top-left-radius:6px;
	-webkit-border-top-right-radius:6px;
	-moz-border-radius-topright:6px;
	border-top-right-radius:6px;
	-webkit-border-bottom-right-radius:6px;
	-moz-border-radius-bottomright:6px;
	border-bottom-right-radius:6px;
	-webkit-border-bottom-left-radius:6px;
	-moz-border-radius-bottomleft:6px;
	border-bottom-left-radius:6px;
	text-indent:0;
	border:1px solid #dcdcdc;
	display:inline-block;
	color:#777777;
	padding:5%;
	font-family:arial;
	font-size:200%;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 1px 0px #ffffff;
}
.stats:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #dfdfdf), color-stop(1, #ededed) );
	background:-moz-linear-gradient( center top, #dfdfdf 5%, #ededed 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#dfdfdf', endColorstr='#ededed');
	background-color:#dfdfdf;
}.stats:active {
	position:relative;
	top:1px;
}</style>
<script>
	function bookShow() {
		window.open("http://freelabel.net/x/bookshowcase.php","_blank","toolbar=yes, scrollbars=yes, resizable=yes, top=500, left=500, width=400, height=400");
</script>



<?php 
// BOOK SHOWCASE GENERATOR

function create_video() {
		if ($_POST['submit']) {
			$video_id =  $_POST['id'];
			$user_name =  $_POST['user_name'];
			$video_status =  $_POST['video_status'];
			$video_title =  $_POST['video_title'];
			$video_twitter =  $_POST['twitter'];
			$video_url =  $_POST['video_url'];
			$twitpic =  $_POST['twitpic'];
			$uploaded_from_blog = $_POST['uploaded_from_blog'];

			// ALTERNATIVES
			if (isset($video_status)==false) {
				$video_status =  'active';
			}
			if (isset($video_title)==false) {
				$video_title =  $_POST['blogtitle'];
			}
			if (isset($video_url)==false) {
				$video_url =  $_POST['blogentry_embed'];
			}
			if (isset($twitpic)==false) {
				$twitpic =  $_POST['twitpic'];
			}



			//YouTube Fix
		$find_yt1 = "watch?v=";
		$replace_yt1 = "embed/";
		$video_url = str_replace($find_yt1, $replace_yt1, $video_url);
		$find_yt1 = ".be/";
		$replace_yt1 = "be.com/embed/";
		$video_url = str_replace($find_yt1, $replace_yt1, $video_url);
		if (strpos($video_url, '//',0,3)) {
			$find_yt1 = "//";
			$replace_yt1 = "http://";
			$video_url = str_replace($find_yt1, $replace_yt1, $video_url);
		}
		echo 'this is the video url: '. $video_url;
		// exit;
		
			//YouTube Fix Done	
			include('../../../inc/connection.php');
			// Insert into database
				$sql="INSERT INTO videos (user_name, video_title, video_url, twitpic, status, twitter) VALUES ('$user_name','$video_title','$video_url','$twitpic','$video_status', '$video_twitter')";
				if (mysqli_query($con,$sql))
				  {  
				  echo "Entry Created Successfully! ";
					echo '<style>
					html {
					color:#fff;
					background-color:#303030;
					margin:10%;
					font-size:300%;
					font-family:sans-serif;
					}
					</style>';
					echo 'here is the user_name for the cliet: '.$user_name;
					echo "Your Event has been submitted and will be reviewed for confirmation. Please stay updated!<br><br>Your Requested Event: <p id='sub_label' >".$event_title.'<br>On a ';
					echo '<hr>username'.$user_name."</p><a href='http://freelabel.net/submit/'>Return to Dashboard</a><br><br><br><br><br><br><hr>";
// DISPLAY SAVED VIDEOS
		
$tweet_message_tv_show = urlencode("[#FLTV] ".$video_twitter .":

".$video_title."

FREELABEL.net/".$video_twitter."/".$video_title_exp[0]."
".$twitpic);

				  	// PAGE REDIRECT
				  	if ($uploaded_from_blog==true) {
				  		echo '<script>
				  				window.open("https://twitter.com/intent/tweet?screen_name=&text='.$tweet_message_tv_show.'");
				  				window.open("http://FREELABEL.net/'.$video_twitter.'/");
						  		window.location.assign("http://freelabel.net/?ctrl=update");
						  	  </script>';
				  	} else {
				  		// UPLOADED FROM VIDEOS
				  		echo '<script>
						  		//window.location.assign("http://freelabel.net/submit/?control=videos");
						  		window.open("http://FREELABEL.net/'.$video_twitter.'/");
						  		window.location.assign("http://freelabel.net/?ctrl=vids");
						  	  </script>';
				  	}

				  	
				  }
				else
				  {
				  echo "Error creating database entry: " . mysqli_error($con);
				  }
		}	
}
create_video();



// DISPLAY SAVED TWEETS
include('../../../inc/connection.php');
$result = mysqli_query($con,"SELECT * FROM videos WHERE user_name='".$user_name."' ORDER BY `id` DESC LIMIT 6");

if (mysqli_fetch_array($result) == 0) {
	echo '<p class="alert alert-warning">';
	echo 'You have no Videos or TV Placements booked.
		</p>';
} 
echo '<div class="row">';
if (mysqli_fetch_array($result)) {
		$result = mysqli_query($con,"SELECT * FROM videos WHERE user_name='".$user_name."' ORDER BY `id` DESC LIMIT 6");
		while($row = mysqli_fetch_array($result))
		{

		$event_title = $row['event_title'];
		$showcase_day = $row['showcase_day'];
		$twitter = $row['twitter'];
		$video_id = $row['id'];
		$video_title = $row['video_title'];
		$video_url = $row['video_url'];
		$twitpic = $row['twitpic'];


		// VINE VIDEO FIX
		if (strpos($video_url, 'vine.co')) {
			$video_embed_code = '<iframe class="vine-embed" src="https://vine.co/v/OJXF5zJJjje/embed/simple" width="300px" height="300px" frameborder="0"></iframe><script async src="//platform.vine.co/static/scripts/embed.js" charset="utf-8"></script>';
		}

		// WORLDSTAR 
		if (strpos($video_url,"worldstarhiphop") == true) {
				$video_url = str_replace($find_yt1, $replace_yt1, $video_url);
				//echo 'Worldstar Render 2 COMPLETE | ';
				$video_embed_code = '<iframe width="98%" height="400px" src="'.$video_url.'" frameborder="0" allowfullscreen></iframe>';
			} else {
				//echo 'Worldstar Render 2 NOT COMPLETE | ';
			}

		// TRILLHD 
		if (strpos($video_url,"trillhd") == true) {
				$video_url = str_replace($find_yt1, $replace_yt1, $video_url);
				//echo 'Worldstar Render 2 COMPLETE | ';
				$video_embed_code = '<iframe width="98%" height="400px" src="'.$video_url.'" frameborder="0" allowfullscreen></iframe>';
			} else {
				//echo 'Worldstar Render 2 NOT COMPLETE | ';
			}

		// YOUTUBE VIDEO FIX!
		if (strpos($video_url, 'youtube')) {
			// EMBED REPLACE
			$find_yt1 = "watch?v=";
			$replace_yt1 = "embed/";
			$video_url = str_replace($find_yt1, $replace_yt1, $video_url);
			$find_yt1 = ".be/";
			$replace_yt1 = "be.com/embed/";
			$video_url = str_replace($find_yt1, $replace_yt1, $video_url);
			// WORLDSTAR VIDEO LINK EMBEDDS
			


		// AUTO PLAY ATTRIBUTE
			$auto_play = "?rel=0&autoplay=0";
			$youtube_url = $video_url.$auto_play;
			$video_embed_code = '<iframe width="98%" height="200px" src="'.$youtube_url.'" frameborder="0" allowfullscreen></iframe>';
		}
		








		// DISPLAY SAVED VIDEOS
		
		$tweet_message_tv_show = urlencode("[#FLTV] ".$video_twitter .":

".$video_title."

FREELABEL.net/".$video_twitter."/".$video_id."
".$twitpic);

			




		$originalDate = $showcase_day;
			echo '<div class="col-md-3">';
				echo '<center>'.$video_embed_code."</center><br>";
				echo '
				<form method="POST" action="http://x.freelabel.net/update_title.php" >
						<input type="text" name="video_title" value="'.$video_title.'" class="form-control" >
						<input type="hidden" name="type" value="video" class="form-control" >
						<input name="video_id" type="hidden" value="'.$video_id.'" class="form-control" >
						<input type="submit" value="UPDATE VIDEO" name="submit" class="btn btn-success btn-lg" style="display:block;">
					<hr>
				</form>
				';
				echo "<form method='POST' action='deletesingle.php' style='display:block;margin:auto;' >";
				echo "<a href='http://tv.freelabel.net/?id=".$video_id."' target='_blank' class='btn btn-primary btn-xs' >View</a>";
				echo "<a target=\"_blank\"  id=\"jointheteam\"  href=\"https://twitter.com/intent/tweet?screen_name=&text=".$tweet_message_tv_show."\" class=\"btn btn-primary btn-xs\" data-related=\"SirAlexMayo\">Twitter</a>";
				echo "<input name='video_id' type='hidden' value='".$video_id."'><input type='submit' class='btn btn-danger btn-xs' value='Delete'></form>";
			echo '</div>';

		}
echo '</div>';
mysqli_close($con);
}

// CAMPAIGN MANAGER FORM
echo $submit_form;
?> 

