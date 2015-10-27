<?php 
include_once('/home/content/59/13071759/html/config/index.php');

$i=0;
foreach ($content as $key => $image) {
	$image_data[$i]= $image['image'];
	$i++;
}
$arr = array(0.1,2,3,4,5,6);
shuffle($arr);
//print_r($image_data);


//echo '<pre>';print_r($user);exit;
?><!DOCTYPE html>
<html lang="en" class="no-js">
<head>

	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $user['profile']['id']; ?> // FREELABEL</title>
	<meta name="description" content=<?php echo '"'.$user['profile']['desc'].'"'; ?> />
	<meta name="keywords" content="photography, template, layout, effect, expand, image stack, animation, flickity, tilt" />
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
				<a class="codrops-icon codrops-icon--prev" href="http://freelabel.net/" title="Back to Site"><span>Back to Site</span></a>
				<a class="codrops-icon codrops-icon--drop" href="http://freelabel.net/radio/" title="<? echo $user['profile']['id']; ?>"><span>Follow <?php echo $user['profile']['id']; ?></span></a>
			</div>
			<h1 class="codrops-title">@<?php echo $user['profile']['id']; ?> <span><?php echo $user['profile']['location']; ?></span></h1>
			<nav class="menu">
				<a class="menu__item" href="#"><span>About</span></a>
				<a class="menu__item menu__item--current" href="#"><span>Work</span></a>
				<a class="menu__item" href="#"><span>Contact</span></a>
			</nav>
		</header>
		<div class="stack-slider">
			<div class="stacks-wrapper">
				<div class="stack">
					<h2 class="stack-title"><a href="#" data-text="Photos"><span>Photos</span></a></h2>
					
					<?php 
					// print_r($user['media']['photo']);


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
						//echo "<hr>";
					}
					
					
					
					?>
				</div>
				
	<?php 
		if (count($user['media']['video'])>0) {
			echo '<div class="stack">
			<h2 class="stack-title"><a href="#" data-text="Videos"><span>Videos</span></a></h2>';
					// print_r($user['media']['video']);

					// ------------------ DISPLAY PHOTOS --------------------------- // 

					$i=0;
					foreach ($user['media']['video'] as $key => $photo) {
						//echo $i.') <br>';
							$i++;
							echo '
					<div class="item">
						<div class="item__content">
							<video controls style="width:100%;" preload="metadata" alt="'.$photo['title'].'">
								<source src="'.$photo['image'].'">
							</video>
							<h3 class="item__title">'.$photo['title'].' <span class="item__date">05/05/2015</span></h3>
							<div class="item__details">
								<ul>
									<li><i class="icon icon-camera"></i><span>'.$photo['type'].'</span></li>
									<!--<li><i class="icon icon-focal_length"></i><span>22.5mm</span></li>
									<li><i class="icon icon-aperture"></i><span>&fnof;/5.6</span></li>
									<li><i class="icon icon-exposure_time"></i><span>1/1000</span></li>
									<li><i class="icon icon-iso"></i><span>80</span></li>-->
								</ul>
							</div>
						</div>
					</div>';
						//echo "<hr>";
					}
			echo "</div>";
		}

	?>


	
				<div class="stack">
					<h2 class="stack-title"><a href="#" data-text="Events"><span>Events</span></a></h2>
					<div class="item">
						<div class="item__content">
							<img src="img/type2/2.jpg" alt="img02" />
							<h3 class="item__title">Chia pop-up meh <span class="item__date">05/05/2015</span></h3>
							<div class="item__details">
								<ul>
									<li><i class="icon icon-camera"></i><span>Canon PowerShot S95</span></li>
									<li><i class="icon icon-focal_length"></i><span>22.5 mm</span></li>
									<li><i class="icon icon-aperture"></i><span>&fnof;/5.6</span></li>
									<li><i class="icon icon-exposure_time"></i><span>1/1000</span></li>
									<li><i class="icon icon-iso"></i><span>80</span></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="stack">
					<h2 class="stack-title"><a href="#" data-text="Wildlife"><span>Merch</span></a></h2>
					<div class="item">
						<div class="item__content">
							<img src="img/type4/1.jpg" alt="img01" />
							<h3 class="item__title">Kickstarter keffiyeh <span class="item__date">05/05/2015</span></h3>
							<div class="item__details">
								<ul>
									<li><i class="icon icon-camera"></i><span>Canon PowerShot S95</span></li>
									<li><i class="icon icon-focal_length"></i><span>22.5 mm</span></li>
									<li><i class="icon icon-aperture"></i><span>&fnof;/5.6</span></li>
									<li><i class="icon icon-exposure_time"></i><span>1/1000</span></li>
									<li><i class="icon icon-iso"></i><span>80</span></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="item__content">
							<img src="img/type4/2.jpg" alt="img02" />
							<h3 class="item__title">Heirloom commodo migas <span class="item__date">05/05/2015</span></h3>
							<div class="item__details">
								<ul>
									<li><i class="icon icon-camera"></i><span>Canon PowerShot S95</span></li>
									<li><i class="icon icon-focal_length"></i><span>22.5 mm</span></li>
									<li><i class="icon icon-aperture"></i><span>&fnof;/5.6</span></li>
									<li><i class="icon icon-exposure_time"></i><span>1/1000</span></li>
									<li><i class="icon icon-iso"></i><span>80</span></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="item__content">
							<img src="img/type4/3.jpg" alt="img03" />
							<h3 class="item__title">Austin banjo swag <span class="item__date">05/05/2015</span></h3>
							<div class="item__details">
								<ul>
									<li><i class="icon icon-camera"></i><span>Canon PowerShot S95</span></li>
									<li><i class="icon icon-focal_length"></i><span>22.5 mm</span></li>
									<li><i class="icon icon-aperture"></i><span>&fnof;/5.6</span></li>
									<li><i class="icon icon-exposure_time"></i><span>1/1000</span></li>
									<li><i class="icon icon-iso"></i><span>80</span></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="item__content">
							<img src="img/type4/4.jpg" alt="img04" />
							<h3 class="item__title">Small batch farm-to-table <span class="item__date">05/05/2015</span></h3>
							<div class="item__details">
								<ul>
									<li><i class="icon icon-camera"></i><span>Canon PowerShot S95</span></li>
									<li><i class="icon icon-focal_length"></i><span>22.5 mm</span></li>
									<li><i class="icon icon-aperture"></i><span>&fnof;/5.6</span></li>
									<li><i class="icon icon-exposure_time"></i><span>1/1000</span></li>
									<li><i class="icon icon-iso"></i><span>80</span></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="item__content">
							<img src="img/type4/5.jpg" alt="img05" />
							<h3 class="item__title">Ethical leggings semiotics <span class="item__date">05/05/2015</span></h3>
							<div class="item__details">
								<ul>
									<li><i class="icon icon-camera"></i><span>Canon PowerShot S95</span></li>
									<li><i class="icon icon-focal_length"></i><span>22.5 mm</span></li>
									<li><i class="icon icon-aperture"></i><span>&fnof;/5.6</span></li>
									<li><i class="icon icon-exposure_time"></i><span>1/1000</span></li>
									<li><i class="icon icon-iso"></i><span>80</span></li>
								</ul>
							</div>
							<p>Images by <a href="https://www.flickr.com/photos/usfwsendsp/">USFWS Endangered Species</a></p>
						</div>
					</div>
					<div class="item" style="display:none;">
						<!-- Related demos -->
						<div class="item__content item__content--related">
							<p>If you enjoyed this demo you might also like:</p>
							<a class="media-item" href="http://tympanus.net/Tutorials/SlidingHeaderLayout/">
								<img class="media-item__img" src="img/related/SlidingHeaderLayout.jpg" />
								<h3 class="media-item__title">Sliding Header Layout</h3>
							</a>
							<a class="media-item" href="http://tympanus.net/Development/ScatteredPolaroidsGallery/">
								<img class="media-item__img" src="img/related/ScatteredPolaroidGallery.jpg" />
								<h3 class="media-item__title">Scattered Polaroid Gallery</h3>
							</a>
						</div>
					</div>
				</div>
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
</body>
</html>