<?php //header('Access-Control-Allow-Origin : http://bae.freelabel.net/'); 
?>
<script type="text/javascript" src="http://freelabel.net/bae/vote_girl.js"></script>
<style type="text/css">
	.video-player-thumbnail {
		display: block;
		width:100%;
		border-radius: 3px;
	}
</style>


<center>
	


<?php
include('../inc/connection.php');

if ($width_size==0) {
	$width_size = '48%';
}

//echo '<hr><hr>'.$stream;
//$stream = 'bae_of_the_month';

$height_size = '300px';
switch ($stream) {
	case 'frontpage one':
		$result = mysqli_query($con,"SELECT * 
		FROM  `images` 
		WHERE  `desc` LIKE CONVERT( _utf8 '%frontpage one%'
		USING latin1 ) 
		COLLATE latin1_swedish_ci
		ORDER BY `id` DESC
		LIMIT 5");
		$panel_size	=	'" style="width:100%;"';
		$width_size = '96%';
		$height_size = '500px';
		break;
	case 'frontpage two':
		$result = mysqli_query($con,"SELECT * 
		FROM  `images` 
		WHERE  `desc` LIKE CONVERT( _utf8 '%frontpage two%'
		USING latin1 ) 
		COLLATE latin1_swedish_ci
		ORDER BY `id` DESC
		LIMIT 5");
		$panel_size	=	'" style="width:100%;"';
		$width_size = '96%';
		$height_size = '500px';
		break;
	case 'frontpage three':
		$result = mysqli_query($con,"SELECT * 
		FROM  `images` 
		WHERE  `desc` LIKE CONVERT( _utf8 '%frontpage three%'
		USING latin1 ) 
		COLLATE latin1_swedish_ci
		ORDER BY `id` DESC
		LIMIT 5");
		$panel_size	=	'" style="width:100%;"';
		$width_size = '96%';
		$height_size = '500px';
		break;

	case 'bae_of_the_month':
		$result = mysqli_query($con,"SELECT * 
		FROM  `images` 
		WHERE  `desc` LIKE CONVERT( _utf8 '%main gallery%'
		USING latin1 )
		COLLATE latin1_swedish_ci
		ORDER BY `id` DESC
		LIMIT 1");
		$panel_size	=	$stream;
		$width_size = '96%';
		$height_size = '500px';
		break;
	case 'bae_of_the_month_related':
		$result = mysqli_query($con,"SELECT * 
		FROM  `images` 
		WHERE  `desc` LIKE CONVERT( _utf8 '%botm%'
		USING latin1 ) 
		COLLATE latin1_swedish_ci
		ORDER BY `id` DESC
		LIMIT 1, 6");
		$panel_size	=	'bae_of_the_month_related';
		$width_size	=	'32%';
		$height_size = '175px';
		break;
	case 'front_page':
		$result = mysqli_query($con,"SELECT * 
		FROM  `images` 
		WHERE  `desc` LIKE CONVERT( _utf8 '%top5%'
		USING latin1 ) 
		COLLATE latin1_swedish_ci 
		OR `desc` LIKE CONVERT( _utf8 '%magazine%'
		USING latin1 ) 
		COLLATE latin1_swedish_ci
		LIMIT 24");
		$panel_size	=	'front_page';
		$width_size = '24%';
		break;
	case 'women_crush_wednesday':
		$result = mysqli_query($con,"SELECT * 
		FROM  `images` 
		WHERE  `desc` LIKE CONVERT( _utf8 '%wcw%'
		USING latin1 ) 
		COLLATE latin1_swedish_ci
		LIMIT 4");
		//$element_id = $stream;
		$panel_size	=	'women_crush_wednesday';
		$width_size = '48%';
		break;
	case 'bae_events':
		$result = mysqli_query($con,"SELECT * 
		FROM  `images` 
		WHERE  `desc` LIKE CONVERT( _utf8 '%bae_events%'
		USING latin1 ) 
		COLLATE latin1_swedish_ci
		LIMIT 1");
		$panel_size	=	'';
		$width_size = '96%';
		$height_size = '500px';
		break;
	case 'bae_events_thumbnails':
		$result = mysqli_query($con,"SELECT * 
		FROM  `images` 
		WHERE  `desc` LIKE CONVERT( _utf8 '%bae_events%'
		USING latin1 ) 
		COLLATE latin1_swedish_ci
		LIMIT 1,2");
		$panel_size	=	'';
		$width_size = '48%';
		$height_size = '300px';
		break;
	case 'related_bae':
		$search_bae_tags = $tags;
		$search_bae = $title;
		$result = mysqli_query($con,"SELECT * 
		FROM  `images` 
		WHERE  `title` LIKE CONVERT( _utf8 '%".$search_bae."%'
		USING latin1 ) 
		COLLATE latin1_swedish_ci AND `user_name`='".$image_user_name."'
		OR `desc` LIKE '%".$search_bae_tags."%'
		COLLATE latin1_swedish_ci AND `user_name`='".$image_user_name."'
		ORDER by `id` DESC");
		$panel_size	=	'half-size';
		$width_size = '32%';
		$height_size = '300px';
		break;
	case 'top_five':
		$search_bae = $title;
		$result = mysqli_query($con,"SELECT * 
		FROM  `images` 
		WHERE  `desc` LIKE CONVERT( _utf8 '%top5%'
		USING latin1 ) 
		COLLATE latin1_swedish_ci
		ORDER by `id` DESC
		LIMIT 1,8");
		$panel_size	=	'half-size';
		$width_size = '32%';
		$height_size = '300px';
		break;
	case 'search_page':
		$result = mysqli_query($con,"SELECT * 
FROM  `images` 
WHERE  `title` LIKE CONVERT( _utf8 '%$search_query%'
USING latin1 ) 
COLLATE latin1_swedish_ci
OR  `desc` LIKE CONVERT( _utf8 '%$search_query%'
USING latin1 ) 
COLLATE latin1_swedish_ci ORDER BY `id` DESC");
		break;
	default:
		$result = mysqli_query($con,"SELECT * 
		FROM  `images` 
		WHERE `title` LIKE '%search_query%' 
		AND `status` = 1 OR `desc` LIKE '%search_query%' 
		AND `status` = 1
		ORDER BY `images`.`id` DESC");
		$panel_size	=	'';
		$width_size = '32%';
		break;
}
// echo 'stream: '.$stream;
//echo '<script>alert('.$stream.')</script>';
//echo '<hr><hr>'.$stream;
// KEEP For Later
// width:".$width_size.";height:".$height_size.";
//echo 'STREAM: '.$stream . ' - '.$search_query;





			$i=0;

		for ($i=0; $i < 2; $i++) { 
			echo "<div class='row row-eq-height'>";
			while($row = mysqli_fetch_array($result))
			  {	
						$todays_date = date('Ymd_H:i');
						$id = $row['id'];
						$title = trim($row['title']);
						$desc = $row['desc'];
						$image = str_replace('server/php/files/', 'server/php/files/thumbnail/', $row['image']);
						$rate = $row['rate'];
						$date = $todays_date;
						$bae_twitter = $row['title'];
						$bae_url = "http://freelabel.net/images/?id=".$id;
						if ($i == 3 OR $i==5 OR $i==8 OR $i==12 OR $i==15 OR $i==20 OR $i==24) {
							$panel_size = 'col-md-6 col-xs-6';
						} else {
							$panel_size = 'col-md-3 col-xs-6';
						}
						$ext = array_reverse(explode('.', $row['image']));
						//print_r($ext[0]);
						//$image_size	=	getimagesize('../images/fllogo.png');
						if ( strpos($ext[0], 'mp4')===0 OR strpos($ext[0], 'mkv')===0) {
							$media['type']='video';

						} elseif ( strpos($ext[0], 'jpg')===0 OR strpos($ext[0], 'jpeg')===0 OR strpos($ext[0], 'png')===0) {
							$media['type']='photo';
						} else {
							$media['type']='not set: '.$ext[0];
						}
						//echo '<hr>#'.strpos($ext[0], 'mp4').'#';
						//echo '////// ['.$media['type'].']';
						//$embed_cobde = '<img src="'.$image.'" width="500px">';
						$bae_tweet = urlencode("[#PHOTOSET] ".$title." | ".$bae_url." @FREELABELNET");
						//$media['type'] = $row['type'];
						switch ($media['type']) {
							case 'photo':
								$photo_block[] = "
								
									<div class='thumbnail  bae_image_div ".$panel_size."' id='bae_image_div_".$id."' style='background-image:url(\"".$image."\");' onclick='openThing(\"".$image."\")'>
										<div id='caption_block'>
											<div class='btn-group'>
												<a href='#' class='btn btn-default btn-xs' onclick='vote_girl(\"".$id."\",\"".$title."\",\"".$image."\")'><i class='glyphicon glyphicon-heart' ></i></a>
												<a href='".$bae_url."' class='btn btn-default btn-xs'><span class='glyphicon glyphicon-link'></span> View</a>
												<!--<span onclick='bae_download( ".$id." , \"" .$title."\" ,  \"http://freelabel.net/download.php?p=".$image."&n=".$title.'_'.time()."&t=png\")' class='btn btn-default btn-xs'><span class='glyphicon glyphicon-download-alt'></span></span>-->
											</div>
										</div>
									</div>";
								break;

							case 'video':
								$photo_block[] = "
								
									<div class='thumbnail  bae_image_div ".$panel_size."' id='bae_image_div_".$id."' style='background-image:url(\"".$image."\");' onclick='openThing(\"".$image."\")'>
										<div id='caption_block'>

											<video muted autoplay='0' loop='1' class='video-player-thumbnail' controls preload='metadata' src='".$image."' ></video>

											<div class='btn-group'>
												<button class='btn btn-default btn-xs' onclick='vote_girl(\"".$id."\",\"".$title."\",\"".$image."\")'><i class='glyphicon glyphicon-heart' ></i></button>
												<a href='".$bae_url."' class='btn btn-default btn-xs'><span class='glyphicon glyphicon-link'></span> View</a>
												<!--<span onclick='bae_download( ".$id." , \"" .$title."\" ,  \"http://freelabel.net/download.php?p=".$image."&n=".$title.'_'.time()."&t=png\")' class='btn btn-default btn-xs'><span class='glyphicon glyphicon-download-alt'></span></span>-->
											</div>
											
										</div>
									</div>";
								break;
							default:
								$photo_block[] = "
								
									<div class='thumbnail  bae_image_div ".$panel_size."' id='bae_image_div_".$id."' style='background-image:url(\"".$image."\");' onclick='openThing(\"".$image."\")'>
										<div id='caption_block'>
											<!-- <h4 class='bae_name' style='font-size:100%;color:#fff;' >".$title."</h4>".$rate." Saves-->
											<br>
											<a href='".$bae_url."'>
											<button class='btn btn-default btn-xs' onclick='vote_girl(\"".$id."\",\"".$title."\",\"".$image."\")'><i class='glyphicon glyphicon-heart' ></i></button>
											<a href='".$bae_url."' class='btn btn-default btn-xs'><span class='glyphicon glyphicon-link'></span> View</a>
											<!--<span onclick='bae_download( ".$id." , \"" .$title."\" ,  \"http://freelabel.net/download.php?p=".$image."&n=".$title.'_'.time()."&t=png\")' class='btn btn-default'><span class='glyphicon glyphicon-download-alt'></span></span>-->
										</div>
									</div>";
								break;
						}	/* END OF SWITCH */
			  			$i++; 
			  		echo "</div>";
			  	} /* END OF COUNTER */
			  } /* END OF WHILE LOOP */
mysqli_close($con);
if (isset($photo_block)) {
	//shuffle($photo_block);
	foreach ($photo_block as $key => $image) {
		//echo $media['type'].'<hr>';
		echo $image;
	}
}

?>

</center>

