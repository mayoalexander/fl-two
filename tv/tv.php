
<style>

	.blogpost_wrap {
		text-shadow:1px 1px 1px #303030;
		min-width:30%;
		width:10%;
		display:inline-block;
		background-color:#303030;
		box-shadow:5px 5px 25px #000;
		vertical-align: text-top;
		margin:2% 0.2%;
		padding:0.5%;
		color:#fff;
		border-radius:5px;
	}
	#joinbutton {
		font-size:200%;
	}
	.blog_title {
		background-color: #B0B0B0;
		opacity: 0.9;
		padding:2%;
		margin: 2%;
		font-size: 200%;
		border-radius: 10px;
	}
	#share_image {
		height:25px;
	}

</style>








<!--<h1 class="sub_title" >VIDEOS COMING UP NEXT ON TV.FREELABEL:</h1>-->





<?php



				$pagenumber = 1;
				// include('../config/recent.php');


				include('../inc/connection.php');
			// FIND MAX ID TO PULL INTO ARRAY 
			if ($result = mysqli_query($con,"SELECT * FROM videos ORDER BY  `id` DESC LIMIT 1")) {
				$row = mysqli_fetch_array($result);
				$max_id = $row['id'];
				$min_id = $max_id - 100;
				$random_video_id = rand($min_id,$max_id);
			}
			$random_video_id = 1;
				
				switch ($stream) {
					case 'chiffon':
						$result = mysqli_query($con,"SELECT * FROM videos WHERE `user_name` LIKE '%mia%' ORDER BY `id` DESC LIMIT 1");
						$streamFound = true;
						$div_sizing = "style='width:100%;height:555px;'";
						$show_share_bar = false;
						break;
					
					default:
						$result = mysqli_query($con,"SELECT * FROM videos ORDER BY  `id` DESC LIMIT ".$random_video_id.",12");
						$streamFound = true;
						$div_sizing = "class='col-xs-6 col-md-4'";
						$show_share_bar = true;
						break;
				}


				if ($streamFound) {
				// echo 'STREAM: '. $streamFound;

					while($row = mysqli_fetch_array($result))
					  {
						$id = $row['id'];
						$video_title 	= $row['video_title'];
						$showcase_time 	= $row['showcase_time'];
						$showcase_time	= date("g:i a",$showcase_time);
						$video_link_original = $row['video_url'];
						$video_url 	= $row['video_url'];
						//YouTube Fix
		$find_yt1 = "watch?v=";
		$replace_yt1 = "embed/";
		$video_url = str_replace($find_yt1, $replace_yt1, $video_url);
		$find_yt1 = ".be/";
		$replace_yt1 = "be.com/embed/";
		$video_url = str_replace($find_yt1, $replace_yt1, $video_url);
						$twitpic = $row['twitpic'];
						
						$find_yt1 = "watch?v=";
						$replace_yt1 = "embed/";
						$video_url = str_replace($find_yt1, $replace_yt1, $video_url);						
						
						$auto_play = "?rel=0&autoplay=0";
						$youtube_url = $video_url;
						$youtube_embed_code = '<iframe width="100%" '.$div_sizing.' src="'.$youtube_url.$auto_play.'" frameborder="0" allowfullscreen></iframe>';
				
						$user_name 		= $row['user_name'];
						$type 		= $row['type'];
						$youtube 		= $row['youtube'];
						$blog_story_url = $row['blog_story_url'];
						$video_link = $video_url;
						$video_page_url = 'http://tv.freelabel.net/?id='.$id;
						if ($row['twitpic'] == false) {
							$twitpic = "TV.freelabel.net/";
						}

						$tweet_message_tv_show = urlencode("[#FREELABELTV] ".$row["twitter"] .":

".$video_title."

TV.FREELABEL.net/?id=".$id."
".$twitpic);
						
					echo "<a name='".$id."'>";
						

						
					echo "
						<a href='".$video_page_url."'>
						<div style='text-align:left;' ".$div_sizing.">
						".$youtube_embed_code;

					if ($show_share_bar) {
						echo "<p style='background-color:#000;padding:3%;margin:1% 0%;'>

						<a target=\"_blank\"  id=\"jointheteam\"  href=\"https://twitter.com/intent/tweet?screen_name=&text=".$tweet_message_tv_show."\" class=\"twitter-mention-button\" data-related=\"SirAlexMayo\"><img id='share_image' src='http://www.sharethis.com/images/new_website/popup/twitter_icon.png'></a> | ";
						//echo "<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?\'http\':\'https\';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+\'://platform.twitter.com/widgets.js\';fjs.parentNode.insertBefore(js,fjs);}}(document, \'script\', \'twitter-wjs\');</script>";

						echo '
						
						<a id="jointheteam" href="https://www.facebook.com/sharer/sharer.php?u=http://freelabel.net" target="_blank"><img id="share_image" src="http://www.sharethis.com/images/new_website/popup/facebook_icon.png">
						</a>
						 | <a id="jointheteam" target="_blank" href="http://www.tumblr.com/share/photo?source=http%3A%2F%2Ffreelabel.net%2Fimages%2F'.$row['photo'].'&caption=%3Ca%20href%3D%22freelabel.net%22%3E'.$twitterURL.' '.$titleURL.'%0A%0Afreelabel.net%3C%2Fa%3E%0A%0A'.$bodyURL.'&name='.$twitterURL.' '.$titleURL.'"><img id="share_image" src="http://assets.tumblr.com/images/logo_page/img_logo_fff_2x.png"></a>
						</a>
						</p>';
						} 
						echo '</div>';
					  }

					echo '</a>';


					mysqli_close($con);	
					
				} else {
					echo 'connection did not work';
				};

				
					?>