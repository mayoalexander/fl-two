<?php 
include('../inc/connection.php');

// SWITCH TO POST IF NO GET
$id = $_GET['id'];
if (isset($_GET['id']) == false) {
	$id = $_POST['id'];	
}

	$result = mysqli_query($con,"SELECT * 
		FROM  `blog` 
		WHERE  `id` = ".$id."
		LIMIT 1");
	if($row = mysqli_fetch_array($result))
	  {
		$todays_date = date('Ymd_H:i');
		$id = $row['id'];
		$title = $row['title'];
		$desc = $row['desc'];
		if (strpos($desc , 'photography')) {
			echo 'yes';
			$page_title = "FREELABEL";
		} else {
			//echo 'nos'. ' '.$desc;
			$page_title = $row['title'];
		}
		}
		$meta_tag_photo = str_replace(' ', '%20', $row['image']);



//include('../new_header.php');
	//include('bae_styles.php');
	


?>


<style type="text/css">
	.thumbnail h4 {
		color:#fff;
	}
	.baex_title {
		margin:auto;
		text-align: center;
		margin-bottom: 7%;
	}
	#page_navigation {
		display: block;
		text-align: left;
		color:#fff;
	}
	#page_navigation a {
		display: block;
		text-align: left;
		color:#fff;
		padding:3%;
	}
</style>


<!--<a href='http://bae.freelabel.net/'><img src='http://img.freelabel.net/baewatchlogo.png' style='width:30%;margin:auto;display:block;'></a>-->

<div class="row" >
<?php
			include('../inc/connection.php');

$result = mysqli_query($con,"SELECT * 
FROM  `blog` 
WHERE  `id` =".$id."
LIMIT 1");
			if($row = mysqli_fetch_array($result))
			  {
				
						$todays_date = date('Ymd_H:i');
						$id = $row['id'];
						$post_id = $row['id'];
						$title = $row['blogtitle'];
						$blogtitle = $title;
						$twitter = $row['twitter'];
						$blogentry = $row['blogentry'];
						$image = 'http://img.freelabel.net/'.$row['photo'];
						$blog_story_url = $row['blog_story_url'];
						$blog_story_url = 'http://FREELABEL.net/'.$twitter.'/#'.$id;
						$writeup = $row['writeup'];
						$current_likes = $row['rate'];

						$blog_type 	= $row['type'];
							// VIDEO EDIT
							if (strpos($blogentry, 'youtube')) {
								//echo 'we have a youtube!';
				  				if (strpos($blogentry, 'iframe') == false) {
								//$blogentry = '';
									$blogentry = '<iframe width="100%" height="460px" src="'.$blogentry.'" frameborder="0" allowfullscreen></iframe>';
								} else {
									//$blogentry = '<iframe width="100%" height="460px" src="'.$youtube_url.'" frameborder="0" allowfullscreen></iframe>';
								}
							}
						$twitpic = $row['twitpic'];
						//$bae_description = $row['bae_description'];
						$date = $todays_date;
						if ($bae_description==false) {
							$bae_description = $row['desc'];
						}
						$like_button = "<a id='like_button".$id."' onclick='likePost(".$post_id.", ".$current_likes." , \"".$user_name_session."\")' class='btn btn-default btn-xs' target='_blank' >LIKE</a>";


$tweet_blog = urlencode("[#FLMAG]

".$twitter." ". $blogtitle ." 

".$blog_story_url."

".$twitpic);

						$embed_code = '<img src="'.$image.'">';
				
						echo "
							<div class='col-xs-6 col-md-4'>
								<a href='".$image."' ><img id='main_image' src='".$image."' style='width:100%;'></a>
								<p class='lead'>".$bae_description."</p>
								<a onclick='shareTwitter(\"".$tweet_blog."\")' class='btn btn-primary btn-xs' target='_blank' >SHARE</a>
								<!--<span id='current_likes".$id."' class='btn btn-default btn-xs glyphicon glyphicon-thumbs-up' > ".$current_likes."</span>
								 ".$like_button."-->
								<hr>
								"; 
				echo			'<div id="page_navigation">'.$writeup.'</div>';

			echo "					
							</div>
							<div class='col-xs-12 col-sm-6 col-md-8' >
								
								".$blogentry."
								<hr>
							</div>";
				echo "
				<div style='margin:5% auto;'>
					
					";
					$stream_pull='related_row';
					$search_query = $twitter;
					//if(include("../singles/related.php")==false){
            			include('../singles/related.php');
					//}
				echo "
				</div>";
			  
			    
			  }

			//mysqli_close($con);
		?>
</div>
<script src='http://freelabel.net/js/like_post.js'></script>
								
<?php //include('../new_footer.php') ?>
