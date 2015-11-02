<?php 
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

if (strpos($actual_link , 'img.freelabel.net/') OR strpos($actual_link , 'pic.freelabel.net/')) {
	if (strpos($_SERVER['REQUEST_URI'] , 'images/images')) {
		//$url = 'http://freelabel.net/'.$_SERVER['REQUEST_URI'];
	} else {
		//$url = 'http://freelabel.net/'.$_SERVER['REQUEST_URI'];
	}
	//header('Location: '.$url); 
}
if (file_exists('config/index.php')) {
	include_once('config/index.php');
} elseif(file_exists('../config/index.php')) {
	include_once('../config/index.php');
} elseif (file_exists('../../config/index.php')) {
	include_once('../../config/index.php');
} elseif (file_exists('../../../config/index.php')) {
	include_once('../../../config/index.php');
}
include('../config/index.php');
include(ROOT.'inc/connection.php');
	if (is_numeric($_GET['id'])) {
		$result = mysqli_query($con,"SELECT * 
		FROM  `images` 
		WHERE  `id` =".$_GET['id']."
		ORDER BY `id` DESC LIMIT 1");
	} else {
		// NOT NUMERIC, SO SEARCH FOR THE TEXT
		$search_text = str_replace('-', ' ', $_GET['id']);
	 	$sql_result = "SELECT * FROM  `images` WHERE `title` LIKE CONVERT( _utf8 '%".$search_text."%' USING latin1 ) COLLATE latin1_swedish_ci ORDER BY `id` DESC LIMIT 0 , 30";
		//var_dump($sql_result);
		$result = mysqli_query($con,$sql_result);

	}
	if($row = mysqli_fetch_array($result))
	  {
		$todays_date = date('Ymd_H:i');
		$id = $row['id'];
		$title = $row['title'];
		$desc = $row['desc'];
		$image = $row['image'];
		$caption = $blog_write_up = $row['caption'];
		$blogentry = '<img src="'.$image.'" style="width:100%;">';

		if (strpos($desc , 'photography')) {
			//echo 'yes';
			$page_title = "FREELABEL";
		} else {
			//echo 'nos'. ' '.$desc;
			$page_title = $row['title'];
		}
		}
		$meta_tag_photo = str_replace(' ', '%20', $row['image']);
$type='image';
//include(ROOT.'config/profile.php');
//exit;

echo "
<style>

	.main_content:padding;

</style>

";
//include_once(ROOT.'new_header.php');
include_once(ROOT.'landing/header.php');
	//include('../bae/bae_styles.php');
	


?>
<style>
	body {
		//margin-top:80px;
		//margin-bottom:10%;
	}
	.thumbnail h4 {
		color:#fff;
	}
	.baex_title {
		margin:auto;
		text-align: center;
		margin-bottom: 7%;
	}
	#page_navigation a {
		display: block;
		text-align: left;
	}
	.row{
		width:100%;
	}
	.bae_image_div {
		transition:background-size 1s;
	}
	.bae_image_div:hover {
		background-size:100%;
	}
	#caption_block {
		height:290px;
		vertical-align: text-bottom;
	}
	#main_image_showcase {
		display:block;
		//position:absolute;
		top:0;
		right:0;
		height:auto;
		min-height:100vh;
		width:100vw;
		margin:auto;
	}
	.image-details h1, .image-details p, .image-details a   {
		text-align: center;
		display:inline-block;
	}
	.space-divider {
		margin:30vh;
	}
	.event-description p {
		font-size:12px;
	}
	.event-title p {
		font-size: 22px;
	}
	
</style>
<script>
function scrollToAnchor(aid){
          var aTag = $("a[name='"+ aid +"']");
          $('html,body').animate({scrollTop: aTag.offset().top},'slow');
      }
      
function openThing(image_link) {
        //alert(image_link);
        var mainImageContainer = $("#main_image_showcase");
        mainImageContainer.fadeOut(500).attr('src' , image_link).fadeIn(500);
        //scrollToAnchor("main_image_showcase");
        window.scrollTo(1, 1);
        console.log($(this));
        // alert($(this));
      }      
</script>
<script type="text/javascript">

// ajust picture frame to top the navigation bar
	var screen_height = $(".navigation_contain").css('height');
	$("#main_content").css('margin-top',screen_height);
</script>
<a style="display:none;" href='http://mag.freelabel.net/'>
	<img src='http://img.freelabel.net/FREELABELLOGO.gif' style='width:30%;margin:auto;display:block;'>
</a>

<div class="main-image-wrap" >
<?php

			include(ROOT.'inc/connection.php');

			if (is_numeric($_GET['id'])) {
				$result = mysqli_query($con,"SELECT * 
				FROM  `images` 
				WHERE  `id` =".$_GET['id']."
				ORDER BY `id` DESC LIMIT 1");
			} else {
				$result = mysqli_query($con,"SELECT * FROM  `images` WHERE  `title` LIKE CONVERT( _utf8 '%".$search_text."%' USING latin1 ) COLLATE latin1_swedish_ci ORDER BY `id` DESC LIMIT 0 , 30");
			}

			if($row = mysqli_fetch_array($result))
			  {
			  			$photo = $row;
					
						$todays_date = date('Ymd_H:i');
						$id = $row['id'];
						$title = $row['title'];
						$image_user_name = $row['user_name'];
						$desc = $row['desc'];
						$image = $row['image'];
						$tags = $row['desc'];
						$twitpic = $row['twitpic'];
						$bae_description = $row['bae_description'];
						$date = $todays_date;
						if ($bae_description==false) {
							$bae_description = $row['desc'];
						}

						//echo "<h1 class='baex_title' style='color:#e3e3e3;'>".$title."</h1>";
$tweet_bae = urlencode("#FLMAG:

".$title."

--> FREELABEL.net/images/".$id."
".$twitpic);

						$embed_code = '<img src="'.$image.'">';


						// Detect File Type
														if (strpos($image, 'mp4') OR strpos($image, 'm4v') OR strpos($image, 'mov') ) {
															$type='video';
														} else {
															$type='image';
														}

														switch ($type) {
															case 'image':
																	//echo 'THISIMAGE '.$image;
																	if ($image !='') {
																		include_once(ROOT.'submit/views/db/thumbnail.php');
																		$tnl = createThumbnail($image);
																		$embed_code = "<img id='main_image_showcase' src='".$tnl."' alt='".$tnl."'>";
																	};
																	//echo 'THIS '.$tnl;
																break;
															case 'video':
																	//include_once(ROOT.'submit/views/db/thumbnail.php');
																	if ($image !='') {
																		$tnl = $image;
																		$embed_code = "
																		<video id='main_image_showcase' controls autoplay='1' loop=1 preload='metadata' alt='".$tnl."'>
																			<source src='".$tnl."'>
																		</video>";
																	};
																break;
															
															default:
																echo 'File type not recognized!';
																break;
														}

				
						echo "

							
							<a name='main_image_showcase'></a>
							<div >
								".$embed_code."

									<description class='image-details' >
										<center>
											<h2 id='main_title' >".$photo['caption']."</h2>
											<p class='lead' style='color:#303030;'>".$bae_description." - <a href='http://freela.be/l/".$image_user_name."'>@".$image_user_name."</a></p>
											<br>
											<a href='https://twitter.com/intent/tweet?screen_name=&text=".$tweet_bae."' class='btn btn-primary btn-lg' target='_blank' ><span class='fa fa-share-alt' style='margin-right:2%;'></span> - SHARE</a>
										</center>
									</description>
							</div>
							<br class='space-divider'>";
										$stream = 'related_bae';

										include(ROOT.'images/pull_images.php');

										
										
									
							

							/*echo "
							<div class=' col-xs-12 col-md-12' style='display:none;'>
								<a href='".$image."' ><img id='main_image' src='".$image."' style='width:100%;'></a>
								<h1 id='section_title' style=''>".$title."</h1>
								<p class='lead' style='color:#e3e3e3;'>".$bae_description." </p>
								<a href='https://twitter.com/intent/tweet?screen_name=&text=".$tweet_bae."' class='btn btn-primary btn-lg' target='_blank' ><span class='fa fa-social'></span>SHARE</a>
								";*/
				/*echo			'
								<hr>
				<div id="page_navigation">
			<a href="?control=upload#upload" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-music"></span> - Music</a>
			<a href="?control=photos#photos" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-picture"></span> - Photos</a>
			<a href="?control=videos" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-film"></span> - Videos</a>
			<a href="?control=booking#events" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-calendar"></span> - Schedule</a>
			<a href="?control=support#email" class="btn btn-default btn-lg" ><span class="glyphicon glyphicon-envelope"></span> - Contact</a>
			</div>'; */

			echo "					
							</div>



							";
			  
			    
			  }

			//mysqli_close($con);
		?>
</div>							
<?php include_once(ROOT.'landing/footer.php') ?>
