<?php 
include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');

$i=0;
if (isset($content)) {	
	foreach ($content as $key => $image) {
		$image_data[$i]= $image['image'];
		$i++;
	}
}
$arr = array(0.1,2,3,4,5,6);
shuffle($arr);
//print_r($image_data);
// echo '<pre>';print_r($user);exit;
?><!DOCTYPE html>
<html lang="en" class="no-js">
<head>

	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $user['profile']['id']; ?> // FREELABEL</title>
	<meta name="description" content=<?php echo '"'.$user['profile']['desc'].'"'; ?> />
	<meta name="keywords" content="<?php echo '"'.$user['profile']['desc'].'"'; ?>, <?php echo '"'.$user['profile']['id'].'"'; ?>" />
	<meta name="author" content="@FREELABELNET" />
	<link rel="shortcut icon" href="http://freelabel.net/ico/favicon.ico">
	<link rel="stylesheet" type="text/css" href="<?php echo HTTP.'artists/templates/photoShowcase/'; ?>css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo HTTP.'artists/templates/photoShowcase/'; ?>css/flickity.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo HTTP.'artists/templates/photoShowcase/'; ?>css/main.css" />
	<script src="<?php echo HTTP.'artists/templates/photoShowcase/'; ?>js/modernizr.custom.js"></script>
	<style>
		.hero > div {
			background-image:url("<?php echo $user['profile']['photo']; ?>");
			background-size:100% auto;
		}
		body {
			background-color:#101010;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="hero">
			<div class="hero__back hero__back--static"></div>
			<div class="hero__back hero__back--mover"></div>
			<div class="hero__front"></div>
		</div>
		<header class="codrops-header">


			<div class="codrops-links">
				<a class="codrops-icon codrops-icon--prev" href="http://freelabel.net/users/dashboard/" title="Back to Site"><span>Back to Site</span></a>
				<!-- <a class="codrops-icon codrops-icon--drop" href="http://freelabel.net/users/dashboard/index/" title="<? echo $user['profile']['id']; ?>"><span>Back To Dashboard</span></a> -->
			</div>
			<h1 class="codrops-title">@<?php echo $user['profile']['id']; ?> <span><?php echo $user['profile']['location']; ?></span></h1>
			<nav class="menu">
				<!--<a class="menu__item" href="#"><span>About</span></a>-->
				<a class="menu__item menu__item--current" href="#"><span>Work</span></a>
				<a class="menu__item" href="#"><span>Contact</span></a>
			</nav>
		</header>
		<div class="stack-slider">
			<div class="stacks-wrapper">
					<?php

		$count = count($user['media']['feed']);
		/* current load is set at 24 max increments */
		/* CREATE EVENTS STACKS */
		if ($count>0) {
			echo '<div class="stack">
			<h2 class="stack-title"><a href="#" data-text="Uploads"><span>Uploads</span></a></h2>';
					// print_r($user['media']['video']);

					// ------------------ DISPLAY PHOTOS --------------------------- // 

					$i=0;
					foreach ($user['media']['feed'] as $key => $photo) {
							$photo['twitter'] = trim($photo['twitter']);

							  if ( strpos($photo['twitter'], '@')===false ) {
							    $photo['twitter'] = '@'.$photo['twitter'];
							  }
							$i++;
							$url = 'http://freelabel.net/'.$photo['twitter'].'/t/'.$photo['id'];

							// detect file type for preview
							switch ($photo['filetype']) {
								case 'image/jpeg':
									$preview = '<a href="'.$url.'"><img src="'.$photo['trackmp3'].'" alt="'.$photo['blogtitle'].'" /></a>';
									break;
								case 'audio/mpeg' OR 'audio/x-wav':
									$preview = '<a href="'.$url.'"><img src="'.$photo['photo'].'" alt="'.$photo['blogtitle'].'" /></a>';
									break;
								
								default:
									$preview = 'Preview not set yet! (type: '.$photo['filetype'].')';
									break;
							}

							echo '
							<div class="item">
								<div class="item__content">
									'.$preview.'
									<a href="'.$url.'"><h3 class="item__title">'.$photo['blogtitle'].' <span class="item__date">05/05/2015</span></h3></a>
									<div class="item__details">
										<ul>
											<li><i class="icon icon-camera"></i><span>'.$user['media']['photos'][3]['desc'].'</span></li>
											<!--<li><i class="icon icon-focal_length"></i><span>22.5mm</span></li>
											<li><i class="icon icon-aperture"></i><span>&fnof;/5.6</span></li>
											<li><i class="icon icon-exposure_time"></i><span>1/1000</span></li>
											<li><i class="icon icon-iso"></i><span>80</span></li>-->
										</ul>
									</div>
								</div>
							</div>';
					}
					if ($count >= 24) {
					echo '
						<div class="item">
							<div class="item__content">
							<a href="#" class="load-more-button" data-src="feed" data-page="1"  data-user="'.$photo['user_name'].'">Load More..</a>
							</div>
						</div>';
					}
			echo "</div>";
		} else {
			echo "<div class='stack' ><h1 class='stack-title' ><span>No Posts</span></h1></div>";
		}






					/*if ($user['media']['photo']>0) {		 
							echo '<h2 class="stack-title"><a href="#" data-text="Photos"><span>Photos</span></a></h2>';
							// ------------------ DISPLAY PHOTOS --------------------------- // 
							$i=0;
							foreach ($user['media']['photo'] as $key => $photo) {
								//echo $i.') <br>';
									$i++;
									echo '
							<div class="item">
								<div class="item__content">
									<a href="http://freelabel.net/images/'.$photo['id'].'"><img src="'.$photo['thumbnail'].'" alt="'.$photo['title'].'" /></a>
									<h3 class="item__title">'.$photo['title'].' <span class="item__date">05/05/2015</span></h3>
									<div class="item__details">
										<ul>
											<li><i class="icon icon-camera"></i><span>'.$user['media']['photos'][3]['desc'].'</span></li>
											<!--<li><i class="icon icon-focal_length"></i><span>22.5mm</span></li>
											<li><i class="icon icon-aperture"></i><span>&fnof;/5.6</span></li>
											<li><i class="icon icon-exposure_time"></i><span>1/1000</span></li>
											<li><i class="icon icon-iso"></i><span>80</span></li>-->
										</ul>
									</div>
								</div>
							</div>';
							}
					}*/
					
					?>
				
	<?php 
	// /* CREATE VIDEO STACK */
	// 	if (count($user['media']['video'])>0) {
	// 		echo '<div class="stack">
	// 		<h2 class="stack-title"><a href="#" data-text="Videos"><span>Videos</span></a></h2>';
	// 				// print_r($user['media']['video']);

	// 				// ------------------ DISPLAY PHOTOS --------------------------- // 

	// 				$i=0;
	// 				foreach ($user['media']['video'] as $key => $photo) {
	// 					//echo $i.') <br>';
	// 						$i++;
	// 						echo '
	// 				<div class="item">
	// 					<div class="item__content">
	// 						<video controls style="width:100%;" preload="metadata" alt="'.$photo['title'].'">
	// 							<source src="'.$photo['image'].'">
	// 						</video>
	// 						<h3 class="item__title">'.$photo['title'].' <span class="item__date">05/05/2015</span></h3>
	// 						<div class="item__details">
	// 							<ul>
	// 								<li><i class="icon icon-camera"></i><span>'.$photo['type'].'</span></li>
	// 								<!--<li><i class="icon icon-focal_length"></i><span>22.5mm</span></li>
	// 								<li><i class="icon icon-aperture"></i><span>&fnof;/5.6</span></li>
	// 								<li><i class="icon icon-exposure_time"></i><span>1/1000</span></li>
	// 								<li><i class="icon icon-iso"></i><span>80</span></li>-->
	// 							</ul>
	// 						</div>
	// 					</div>
	// 				</div>';
	// 					//echo "<hr>";
	// 				}
	// 		echo "</div>";
	// 	}




		/* CREATE PROMO STACKS */
		if (count($user['media']['photo'])>0) {
			echo '<div class="stack">
			<h2 class="stack-title"><a href="#" data-text="Promos"><span>Promos</span></a></h2>';
					// print_r($user['media']['video']);

					// ------------------ DISPLAY PHOTOS --------------------------- // 

					$i=0;
					foreach ($user['media']['photo'] as $key => $photo) {
						//echo $i.') <br>';
							$i++;
							echo '
							<div class="item">
								<div class="item__content">
									<a href="http://freelabel.net/users/index/image/'.$photo['id'].'"><img src="'.$photo['thumbnail'].'" alt="'.$photo['title'].'" /></a>
									<h3 class="item__title">'.$photo['title'].' <span class="item__date">05/05/2015</span></h3>
									<div class="item__details">
										<ul>
											<li><i class="icon icon-camera"></i><span>'.$user['media']['photos'][3]['desc'].'</span></li>
											<!--<li><i class="icon icon-focal_length"></i><span>22.5mm</span></li>
											<li><i class="icon icon-aperture"></i><span>&fnof;/5.6</span></li>
											<li><i class="icon icon-exposure_time"></i><span>1/1000</span></li>
											<li><i class="icon icon-iso"></i><span>80</span></li>-->
										</ul>
									</div>
								</div>
							</div>';
					}
			echo "</div>";
		}



		/* CREATE EVENTS STACKS */
		if (count($user['media']['event'])>0) {
			echo '<div class="stack">
			<h2 class="stack-title"><a href="#" data-text="Events"><span>Events</span></a></h2>';
					// print_r($user['media']['video']);

					// ------------------ DISPLAY PHOTOS --------------------------- // 

					$i=0;
					foreach ($user['media']['event'] as $key => $photo) {
						//echo $i.') <br>';
							$i++;
							echo '
							<div class="item">
								<div class="item__content">
									<a href="http://freelabel.net/users/index/image/'.$photo['id'].'"><img src="'.$photo['thumbnail'].'" alt="'.$photo['title'].'" /></a>
									<h3 class="item__title">'.$photo['title'].' <span class="item__date">05/05/2015</span></h3>
									<div class="item__details">
										<ul>
											<li><i class="icon icon-camera"></i><span>'.$user['media']['photos'][3]['desc'].'</span></li>
											<!--<li><i class="icon icon-focal_length"></i><span>22.5mm</span></li>
											<li><i class="icon icon-aperture"></i><span>&fnof;/5.6</span></li>
											<li><i class="icon icon-exposure_time"></i><span>1/1000</span></li>
											<li><i class="icon icon-iso"></i><span>80</span></li>-->
										</ul>
									</div>
								</div>
							</div>';
					}
			echo "</div>";
		} else {
			echo "<div class='stack' ><h1 class='stack-title' ><span>No Events</span></h1></div>";
		}




		// /* CREATE MERCH STACKS */
		// if (count($user['media']['merch'])>0) {
		// 	echo '<div class="stack">
		// 	<h2 class="stack-title"><a href="#" data-text="Merch"><span>Merch</span></a></h2>';
		// 			// print_r($user['media']['video']);

		// 			// ------------------ DISPLAY PHOTOS --------------------------- // 

		// 			$i=0;
		// 			foreach ($user['media']['merch'] as $key => $photo) {
		// 				//echo $i.') <br>';
		// 					$i++;
		// 					echo '
		// 					<div class="item">
		// 						<div class="item__content">
		// 							<a href="http://freelabel.net/images/'.$photo['id'].'"><img src="'.$photo['thumbnail'].'" alt="'.$photo['title'].'" /></a>
		// 							<h3 class="item__title">'.$photo['title'].' <span class="item__date">05/05/2015</span></h3>
		// 							<div class="item__details">
		// 								<ul>
		// 									<li><i class="icon icon-camera"></i><span>'.$user['media']['photos'][3]['desc'].'</span></li>
		// 									<!--<li><i class="icon icon-focal_length"></i><span>22.5mm</span></li>
		// 									<li><i class="icon icon-aperture"></i><span>&fnof;/5.6</span></li>
		// 									<li><i class="icon icon-exposure_time"></i><span>1/1000</span></li>
		// 									<li><i class="icon icon-iso"></i><span>80</span></li>-->
		// 								</ul>
		// 							</div>
		// 						</div>
		// 					</div>';
		// 			}
		// 	echo "</div>";
		// }
	?>


			</div>
			<!-- /stacks-wrapper -->
		</div>
		<!-- /stacks -->
		<img class="loader" src="<?php echo HTTP.'artists/templates/photoShowcase/'; ?>img/three-dots.svg" width="60" alt="Loader image" />
	</div>
	<!-- /container -->
	<!-- Flickity v1.0.0 http://flickity.metafizzy.co/ -->
	<script src="<?php echo HTTP.'artists/templates/photoShowcase/'; ?>js/flickity.pkgd.min.js"></script>
	<script src="<?php echo HTTP.'artists/templates/photoShowcase/'; ?>js/smoothscroll.js"></script>
	<script src="<?php echo HTTP.'artists/templates/photoShowcase/'; ?>js/main.js"></script>
	<script src="http://freelabel.net/landing/js/jquery.js"></script>
	<script type="text/javascript">
	$(function() {

		$('.menu__item').click(function(e){
			var text = $(this).children().text();
			e.preventDefault();
			if (text=='About') {
				alert(text);
			} else if(text=='Contact') {
				alert(text);
			} else {
				alert(text);
			}
		});

		$('.load-more-button').click(function(event){
			// event.preventDefault();
			var element = $(this).parent().parent().parent();
			var user = $(this).attr('data-user');
			var page = $(this).attr('data-page');
			var src = $(this).attr('data-src');

			$.get('http://freelabel.net/users/index/profile/',{ 
				src: src,
				page: page,
				user_name: user
			},function(result){
				// console.log(element);
				element.html(result);
			});
			// element.hide('slow');
			console.log(element);
		});
	
	});
	</script>
</body>
</html>