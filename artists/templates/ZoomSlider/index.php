<?php
include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
$config = new Blog;
$photos = $config->getPhotoAds('admin' , 'registration');
$i=0;
foreach ($photos as $photo) {
	$photos[$i]['thumbnail'] = str_replace('server/php/files', 'server/php/files/thumbnail', $photo['image']);
	//echo $i.') '.$photos['thumbnail'];
	$i++;
}
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>REGISTER // FREELABEL</title>
	<meta name="description" content="A simple content slider with depth-like zoom functionality" />
	<meta name="keywords" content="blueprint, template, slider, zoom, javascript, depth, 3d, css" />
	<meta name="author" content="Codrops" />
	<link rel="shortcut icon" href="http://freelabel.net/ico/favicon.ico">
	<!-- Feather Icons -->
	<link rel="stylesheet" type="text/css" href="<?php echo HTTP.'artists/templates/ZoomSlider/'; ?>fonts/feather/style.css">
	<!-- General demo styles & header -->
	<link rel="stylesheet" type="text/css" href="<?php echo HTTP.'artists/templates/ZoomSlider/'; ?>css/demo.css" />
	<!-- Component styles -->
	<link rel="stylesheet" type="text/css" href="<?php echo HTTP.'artists/templates/ZoomSlider/'; ?>css/component.css" />
	<script src="<?php echo HTTP.'artists/templates/ZoomSlider/'; ?>js/modernizr.custom.js"></script>
	<style type="text/css">
	img {
		max-height:300px;
		//cursor: pointer;
	}
	.logo-head {
		display:block;
		margin:auto;
	}
	.slide__mover img {
		box-shadow: 1px 1px 25px #101010;
	}
	.button {
		color:#FE3F44;
	}
	.slide__title span {
		color:#303030;
	}
	body {
		background-color:#101010;
	}
	</style>
</head>
<body>
	<!-- Main container -->
	<div class="container">
		<!-- Blueprint header -->
		<header class="bp-header cf">
			<a class='logo-head' href='http://freelabel.net/'><img src="http://freelabel.net/images/fllogo.png" style="height:85px;"></a>
			<span>FREELABEL <span class="bp-icon bp-icon-about" data-content="Giving The World Real Art."></span></span>
			<h1>Choose Your Account</h1>
			<nav>
				<a href="http://freelabel.net/" class="bp-icon bp-icon-prev" data-info="Back to FREELABEL"><span>Back to FREELABEL</span></a>
				<!--a href="" class="bp-icon bp-icon-next" data-info="next Blueprint"><span>Next Blueprint</span></a-->
				<!--<a href="http://tympanus.net/codrops/?p=24330" class="bp-icon bp-icon-drop" data-info="Back to Main Site"><span>back to the Codrops article</span></a>
				<a href="http://mag.freelabel.net/" class="bp-icon bp-icon-archive" data-info="View Magazine"><span>View Magazine</span></a>-->
			</nav>
		</header>
		<!-- Grid -->
		<section class="slider">
			<div class="slide slide--current" data-content="content-1">
				<div class="slide__mover">
					<div class="zoomer flex-center">
						<img class="zoomer__image" src="<?php echo $photos[2]['thumbnail']; ?>" alt="<?php echo $photos[2]['thumbnail']; ?>" />
						<div class="preview">
							<img src="<?php echo $photos[2]['thumbnail'];?>" alt="<?php echo $photos[2]['thumbnail']; ?>" />
							<div class="zoomer__area zoomer__area--size-3"></div>
						</div>
					</div>
				</div>
				<h2 class="slide__title"><span>The Exclusive Account</span> $200</h2>
			</div>
			<div class="slide" data-content="content-2">
				<div class="slide__mover">
					<div class="zoomer flex-center">
						<img class="zoomer__image" src="<?php echo $photos[1]['thumbnail']; ?>" alt="iPad Mini" />
						<div class="preview">
							<img src="<?php echo $photos[1]['thumbnail']; ?>" alt="iPad Mini app preview" />
							<div class="zoomer__area zoomer__area--size-4"></div>
						</div>
					</div>
				</div>
				<h2 class="slide__title"><span>The Basic Account</span> $59</h2>
			</div>
			<div class="slide" data-content="content-3">
				<div class="slide__mover">
					<div class="zoomer flex-center">
						<img class="zoomer__image" src="<?php echo $photos[0]['thumbnail']; ?>" alt="iPhone" />
						<div class="preview">
							<img class="zoom-image" src="<?php echo $photos[0]['thumbnail']; ?>" alt="iPhone app preview" />
							<div class="zoomer__area zoomer__area--size-2"></div>
						</div>
					</div>
				</div>
				<h2 class="slide__title"><span>THE FREETRIAL ACCOUNT</span> FREE</h2>
			</div>

			<nav class="slider__nav">
				<button class="button button--nav-prev"><i class="icon icon--arrow-left"></i><span class="text-hidden">Previous product</span></button>
				<button class="button button--zoom"><i class="icon icon--zoom"></i><span class="text-hidden">View details</span></button>
				<button class="button button--nav-next"><i class="icon icon--arrow-right"></i><span class="text-hidden">Next product</span></button>
			</nav>
		</section>
		<!-- /slider-->
		<section class="content">
			<div class="content__item" id="content-1">
				<img class="content__item-img rounded-right" src="<?php echo $photos[2]['image']; ?>" alt="<?php echo $photos[2]['image']; ?>" />
				<div class="content__item-inner">
					<h2>The Exclusive Account</h2>
					<h3>$200 - Preparing you to be the future of music</h3>
					<p>With our new Exclusive Account, we set out to do the impossible: audio-engineer your full-projects, graphical design your campaign visuals, and plan out your events for fans to experience in the most interactive way possible. That means live broadcasting from your events, setting up meet and greets, promotional listening parties, etc; We include every element to not only to promote you to fans, but promote fans to you. The result is a more simple yet more-powerful experience for all of music. It's the future of the music.</p>
					<ul>
						<li>Includes All Basic Account Features</li>
						<li>Exclusive Front Page & Campaign Placement</li>
						<li>Magazine & Radio + Interviews</li>
						<li>Live Album Streams on FREELABEL RADIO</li>
						<li>Radio Commercials</li>
					</ul>
					
					<p><a target="_blank" href="http://freelabel.net/confirm/exclusive">Create Your Exclusive Account &xrarr;</a></p>
				</div>
			</div>
			<div class="content__item" id="content-2">
				<img class="content__item-img rounded-right" src="<?php echo $photos[1]['image']; ?>" alt="<?php echo $photos[1]['image']; ?>" />
				<div class="content__item-inner">
					<h2>The Basic Artist</h2>
					<h3>Label-class organization without a Label</h3>
					<p>Our FREELABEL Basic Artist Account is showcased on the Front Page of the website, as well as music released in Radio Rotation 24/7. We reach out to over 5.6 Million Users on a monthly basis. FLRADIO delivers amazing radio showcasing without overkill, like FM Radio. So you get incredible performance from a package you can take with you wherever you go.</p>
					<ul>
						<li>24/7 Radio Rotation</li>
						<li>Auto-Schedule Posts to your social media accounts (Twitter, Facebook, Tumblr, etc.) </li>
						<li>Front Page Magazine / Radio Features</li>
						<li>Unlimited Uploads</li>
						<li>Upload videos, photos, track outs, sessions, mixtapes & more to your FLDRIVE</li>
					</ul>

					<p><a target="_blank" href="http://freelabel.net/confirm/basic">Create your Artist Account &xrarr;</a></p>
				</div>
			</div>
			<div class="content__item" id="content-3">
				<img class="content__item-img rounded-right" src="<?php echo $photos[0]['image']; ?>" alt="<?php echo $photos[0]['image']; ?>" />
				<div class="content__item-inner">
					<h2>FREETRIAL</h2>
					<h3>Discovering New Art Before the Mainstream</h3>
					<p>The most advanced techologies in the industry, FREELABEL delivers more content, more tools, and ways to discover & share new music, videos, and radio shows. FREELABEL MAGAZINE + RADIO gathers new content directly from the artists & the industry. Simplify your music experience in one flow; Upload songs, mixtapes, videos, etc directly to your FREELABEL Account. No re-downloading music to your devices, FREELABEL saves it to your FLDRIVE!</p>
					<ul>
						<li>Get 1st Day FREE</li>
						<li>Submit Music, Video, Photo Uploads Directly to Radio + Site Rotation</li>
						<li>Browse and save music directly to your FLDRIVE</li>
					</ul>
					<p><a target="_blank" href="http://freelabel.net/confirm/sub">TRY FOR FREE &xrarr;</a></p>
				</div>
			</div>
			<!--<div class="content__item" id="content-4">
				<img class="content__item-img rounded-right" src="<?php echo $photos[3]['image']; ?>" alt="<?php echo $photos[3]['image']; ?>" />
				<div class="content__item-inner">
					<h2>The Exclusive Account</h2>
					<h3>$6.5K - Engineered from the ground up.</h3>
					<p>Every new Mac comes with Photos, iMovie, GarageBand, Pages, Numbers, and Keynote. So you can be creative with your photos, videos, music, documents, spreadsheets, and presentations right from the start. You also get great apps for email, surfing the web, sending texts, and making FaceTime calls — there’s even an app for finding new apps.</p>
					<ul>
						<li>Graphic Design (Magazine Page & Project Release Flyers)</li>
						<li>Web Design; Choose Your ".COM" Domain Name</li>
						<li>Event + Tour Booking</li>
						<li>TV + Radio Commercials (30 Seconds)</li>
						<li>Photo / Video Shoots</li>
						<li>Studio Production (Instrumentals, Mixing, Mastering, etc)</li>
					</ul>
					<p><a target="_blank" href="http://freelabel.net/confirm/exclusive">Learn more about the iMac's features &xrarr;</a></p>
				</div>
			</div>-->
			<button class="button button--close"><i class="icon icon--circle-cross"></i><span class="text-hidden">Close content</span></button>
		</section>
	</div>
	<script src="<?php echo HTTP.'artists/templates/ZoomSlider/'; ?>js/classie.js"></script>
	<script src="<?php echo HTTP.'artists/templates/ZoomSlider/'; ?>js/dynamics.min.js"></script>
	<script src="<?php echo HTTP.'artists/templates/ZoomSlider/'; ?>js/main.js"></script>
</body>
</html>