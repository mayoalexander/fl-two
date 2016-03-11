<?php
	$page_title = "MAG";
	$page_desc = "<h1>We Always Get New Music, Before it Gets Out.</h1>We always get music weeks, or even months, before they hit mainstream. We have DJs, Record Label A&R's and Artist Management companies send us music directly so we can get it to you guys first.";
	$stream_pull = "blog";
	include('../header.php');
?>
<style>
#bae_panel {
	margin-top:2%;
}
#registration_form {
	padding:2%;
	margin:2%;
	width:40%;
}
</style>
<center>
	
	
	<h1 class="sub_title">
		FREELABEL MAGAZINE
	</h1>


		
<a id="navimenu" href="http://bae.freelabel.net/#vote" style="display:inline-block;" >Subscribe to FREELABEL MAGAZINE to get updates & free stuff right at your doorstep --></a>

<div id="bae_panel" >

	<?php
// // // // // // // BLOG STORY 
		include('../inc/connection.php');
		$result = mysqli_query($con,"SELECT * FROM blog WHERE type='single' ORDER BY `id` DESC LIMIT 24");  
		while($row = mysqli_fetch_array($result))
				{
				$track_name = $row['trackname'];
				$blog_photo = "http://img.freelabel.net/".$row['photo'];
				$twitter_name = $row['twitter'];
				$twitpic = $row['twitpic'];
				$twitter = $row['twitter'];
				$playerpath = $row['playerpath'];
				$blog_story_url = $row['blog_story_url'];

// TWEET SHARE MESSAGE
$tweet_blog = urlencode("[#BaeWatch]

VOTE FOR ".$bae_twitter ." --> ".$link_to_bae."

Send photos to @BaeWatchFL !
".$twitpic);
			
			
		echo '
		<a name="'.$twitter.'">
		<div class="bae_wrapper" style="background-image:url(\''.$blog_photo.'\');" >
			<a href="'.$blog_story_url.'" target="_blank" >
				<h2 class="bae_name" >
					'.$twitter.' - '.$blogtitle.'
				</h2>
				<span class="bae_share" >VIEW</span>	
			</a>
			<a href="https://twitter.com/intent/tweet?screen_name=&text='.$tweet_blog.'" target="_blank">
				<span class="bae_share" >VOTE</span>	
				<iframe src="'.$playerpath.'" frameborder="0" height="300px" scrolling="no" seamless></iframe>

			</a>
		</div>';
		}










// // // // // // // AUDIO PLAYER 
		include('../inc/connection.php');
		$result = mysqli_query($con,"SELECT * FROM blog WHERE type='blog' ORDER BY `id` DESC LIMIT 24");  
		while($row = mysqli_fetch_array($result))
				{
				$blogtitle = $row['blogtitle'];
				$blog_photo = "http://img.freelabel.net/".$row['photo'];
				$twitter = $row['twitter'];
				$twitpic = $row['twitpic'];
				$blog_story_url = $row['blog_story_url'];

// TWEET SHARE MESSAGE
$tweet_blog = urlencode("[#BaeWatch]

VOTE FOR ".$bae_twitter ." --> ".$link_to_bae."

Send photos to @BaeWatchFL !
".$twitpic);
			
			
		echo '
		<a name="'.$twitter.'">
		<div class="bae_wrapper" style="background-image:url(\''.$blog_photo.'\');" >
			<a href="'.$blog_story_url.'" target="_blank" >
				<h2 class="bae_name" >
					'.$twitter.' - '.$blogtitle.'
				</h2>
				<span class="bae_share" >VIEW</span>	
			</a>
			<a href="https://twitter.com/intent/tweet?screen_name=&text='.$tweet_blog.'" target="_blank">
				<span class="bae_share" >VOTE</span>	
			</a>
		</div>';
		}








// // // // // // // BLOG STORY 
		include('../inc/connection.php');
		$result = mysqli_query($con,"SELECT * FROM blog WHERE type='blog' ORDER BY `id` DESC LIMIT 24");  
		while($row = mysqli_fetch_array($result))
				{
				$blogtitle = $row['blogtitle'];
				$blog_photo = "http://img.freelabel.net/".$row['photo'];
				$twitter = $row['twitter'];
				$twitpic = $row['twitpic'];
				$blog_story_url = $row['blog_story_url'];

// TWEET SHARE MESSAGE
$tweet_blog = urlencode("[#BaeWatch]

VOTE FOR ".$bae_twitter ." --> ".$link_to_bae."

Send photos to @BaeWatchFL !
".$twitpic);
			
			
		echo '
		<a name="'.$twitter.'">
		<div class="bae_wrapper" style="background-image:url(\''.$blog_photo.'\');" >
			<a href="'.$blog_story_url.'" target="_blank" >
				<h2 class="bae_name" >
					'.$twitter.' - '.$blogtitle.'
				</h2>
				<span class="bae_share" >VIEW</span>	
			</a>
			<a href="https://twitter.com/intent/tweet?screen_name=&text='.$tweet_blog.'" target="_blank">
				<span class="bae_share" >VOTE</span>	
			</a>
		</div>';
		}
	?>
</div>
	


	
	<!-- <div id="registration_form" style="width:20%" >
		<p id="bae_text">
			<img src="http://freelabel.net/me2guru/uploads/_20140711_01:05.jpg" width="250px">
			<br>
			<a id="navimenu">REGISTER HERE >>></a>
		</p>
	</div> -->


</center>

<?php include('../footer.php'); ?>?>