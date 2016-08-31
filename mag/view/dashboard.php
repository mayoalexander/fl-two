<?php
include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
$user = new User();
$page_title = 'Magazine';

$blog = new Blog();
$posts = $blog->randomizePosts();
//echo '<pre>';
//print_r();


//exit;



include(ROOT.'AudioPlayer/index.php');
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" type="image/x-icon" href="http://freelabel.net/ico/favicon.ico" >
	    <link rel="shortcut icon" href="http://freelabel.net/ico/favicon.ico" type="image/x-icon">
	    <link rel="icon" href="http://freelabel.net/images/favicon.ico" type="image/x-icon">
		<title><?php echo $page_title; ?> // FREELABEL MAG + RADIO</title>
		<meta name="author" content="FREELABEL">
		<meta name="Description" content="FREELABEL Network is the Leader in Online Showcasing | <?php echo $page_desc ?>">
		<meta name="Keywords" content="FREELABEL, FREE LABEL, FREE, LABEL, AMR, AMRecords, Rap, Hip Hop, Showcasing, Good Brand, Get That Good, Good Brand Clothing, Dalls Texas, FREELABEL, amradio, am radio live, texas, music, promotion, hip hop, rap">
		<meta name="Copyright" content="FREELABEL">
		<meta name="Language" content="English">
		<meta name="twitter:card" content="summary_large_image">
		<meta name="twitter:player" content="<?php echo $page_url;?>">
		<meta name="twitter:player:width" content="300">
		<meta name="twitter:player:height" content="300">
		<meta name="twitter:image" content="<?php echo $meta_tag_photo;?>">
		<meta name="twitter:image:src" content="<?php echo $meta_tag_photo;?>">
		<meta name="twitter:site" content="@freelabelnet">
		<meta name="twitter:creator" content="@FREELABELNET">
		<meta name="twitter:title" content="<?php echo $page_title; ?> | FREELABEL RADIO + MAGAZINE + STUDIOS">
		<meta name="twitter:description" content="Submit your music to get showcased on FREELABEL Magazine, Radio, TV, Events, and more!">
		<meta property="og:url" content="<?php echo $page_url; ?>">
		<meta property="og:title" content="<?php echo $page_title; ?> // FREELABEL RADIO + MAGAZINE">
		<meta property="og:description" content="Subscribe and create an account to FREELABEL.net for exclusive access to daily updated news, interviews, singles and project releases from the most influencial creators of our generation.">
		<meta property="og:image" content="<?php echo $meta_tag_photo; ?>">
		<meta property="og:image:type" content="image/png">
		<meta property="og:image:width" content="1024">
		<meta property="og:image:height" content="1024">
		<!--
		<link rel="stylesheet" type="text/css" href="<?php echo HTTP; ?>css/style.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo HTTP; ?>artists/templates/flat-ui/dist/css/flat-ui.css" />
		-->
		<link rel="stylesheet" type="text/css" href="<?php echo HTTP; ?>mag/view/css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo HTTP; ?>mag/view/fonts/font-awesome-4.3.0/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo HTTP; ?>mag/view/css/style1.css" />
		<script src="<?php echo HTTP; ?>mag/view/js/modernizr.custom.js"></script>
		<style type="text/css">
		.trending {
			min-height:300px;
			height:inherit;
			overflow-y:scroll;
		}
		.sidebar , .top-bar {
			background-color:#101010;
		}
		.mag-view-buttons {
			text-align:center;
		}
		.call-to-action .btn {
			background-color:transparent;
			padding:4%;
			font-size:12px;
			border-radius:0;
			//border:#e3e3e3 1px solid;
			color:#fff;
			text-transform: uppercase;
		}
		.call-to-action .btn-warning {
			//border:yellow 1px solid;
		}
		.call-to-action .btn-primary {
			//border:white 1px solid;
		}
		.call-to-action .btn-success {
			//border:green 1px solid;
		}
		.head-logo {
			min-height:268px;
			max-width:100%;
			display:block;
			margin:auto;
			margin-top:5px; 
			margin-bottom:5%;
			background-color:#fe3f44;
		}
		.call-to-action .action {
			width:32%;
			margin:0;
			display:inline-block;
		}
		.call-to-action span {
			display:block;
		}
		.navi-target {
			display:block;
			color:#fff;
			font-size:14px;
			padding-left:5%;
			padding-bottom:5%;
			text-align:left;
		}


		</style>
		
	</head>
	<body>

		<div class="container">
			<button id="menu-toggle" class="menu-toggle"><span>Menu</span></button>
			<div id="theSidebar" class="sidebar">
				<button class="close-button fa fa-fw fa-close"></button>
				<!--<div class="codrops-links">
					<a class="codrops-icon codrops-icon--prev" href="http://tympanus.net/Tutorials/MotionBlurEffect/" title="Previous Demo"><span>Previous Demo</span></a>
					<a class="codrops-icon codrops-icon--drop" href="http://tympanus.net/codrops/?p=23872" title="Back to the article"><span>Back to the Codrops article</span></a>
				</div>-->
				<div class='head-logo'>
					<a href='#'><img src='http://freelabel.net/images/FREELABELLOGO.gif' class='head-logo navi-trigger' ></a>
					<a href='#' class='fa fa-caret-down navi-target navi-trigger'></a>
					<div class="screen-middxle call-to-action navi-options" style='display:none;'>
							<a href='http://freelabel.net/form/login/' class="btn btn-primary btn-lg action"><span class="fa fa-dashboard"></span>Login</a>
							<a href='http://freelabel.net/sections/' class="btn btn-warning btn-lg action"><span class="fa fa-lock"></span>Register</a>
							<a href='http://upload.freelabel.net/?uid=<?php echo $_SESSION['user_name']; ?>' class="btn btn-success btn-lg action"><span class="fa fa-cloud-upload"></span>Upload</a>
							<?php //$adpull_stream = 'fl-front'; include(ROOT.'ads.php'); ?>
					</div>
				</div>
				
				<nav class="codrops-demos trending">
					<!--<a class="current-demo" href="index.html">Welcome</a>-->
					<?php $user->showTrending(); ?>
				</nav>
			</div>
			<div id="theGrid" class="main">

				<section class="grid">
					<header class="top-bar">
						<h2 class="top-bar__headline">Feed</h2>
						<!-- 
						MAKE THIS SHIT WORK ASAP!!!!! 

						<div class="filter dropdown-target">
							<span>Filter by:</span>
							<span class="dropdown">Popular</span>
							<div class="dropdown-menu" style='display:none;'>
								<span class="dropdown drop-option">Popular</span>
								<span class="dropdown drop-option">Recent</span>
								<span class="dropdown drop-option">Trending Now</span>
							</div>
						</div>
						-->
						
					</header>
					<div class='dashboard-area'></div>

					<?php 
					/*
					foreach ($posts as $key => $value) {
						echo '
						<a class="grid__item" href="#'.$value['x'].'">
							<img class="meta__avatar" src="'.$blog->getPhoto($value['photo']).'" alt="'.$blog->getTitle($value).'"  style="width:100%;border-radius:0;"/> 
							
							<h2 class="title title--preview">'.$blog->getTitle($value).'
							</h2>
							<div class="loader"></div>
							<span class="category">'.$value['twitter'].'</span>
							<div class="meta meta--preview">
								<span class="meta__date"><i class="fa fa-calendar-o"></i> '.$blog->datePosted(strtotime($value['submission_date'])).'</span>
								<span class="meta__reading-time"><i class="fa fa-clock-o"></i> '.$value['type'].'</span>
							</div>

						</a>';
						}
						*/
					?>
					<footer class="page-meta">
						<span>Load more...</span>
					</footer>
				</section>






				<section class="content">
					<div class="scroll-wrap">

						<?php

						foreach ($posts as $key => $value) {
						//print_r($value);
						echo '
						<article class="content__item">
							
							<h2 class="title title--full">'.$blog->getTitle($value).'</h2>
							<span class="category category--full">'.$blog->getTwitter($value).'</span>
							
							<div class="meta meta--full">
								'.$blog->getShareButtons($value['id']).'
								<img class="meta__avatar" src="'.$blog->getPhoto($value['photo']).'" alt="'.$blog->getTitle($value).'"  style="width:100%;border-radius:0;"/> 
								<center>'.$blog->embedPost($value).'</center>
								<hr>
								<span class="meta__author">'.$value['user_name'].'</span>
								<span class="meta__date"><i class="fa fa-calendar-o"></i> '.$blog->datePosted(strtotime($value['submission_date'])).'</span>
								<span class="meta__reading-time"><i class="fa fa-clock-o"></i> '.$value['type'].'</span>
							</div>
							
							<!--
							<p>I am fully aware of the shortcomings in these essays. I shall not touch upon those which are characteristic of first efforts at investigation. The others, however, demand a word of explanation.</p>
							<p>The four essays which are here collected will be of interest to a wide circle of educated people, but they can only be thoroughly understood and judged by those who are really acquainted with psychoanalysis as such. It is hoped that they may serve as a bond between students of ethnology, philology, folklore and of the allied sciences, and psychoanalysts; they cannot, however, supply both groups the entire requisites for such co-operation. They will not furnish the former with sufficient insight into the new psychological technique, nor will the psychoanalysts acquire through them an adequate command over the material to be elaborated. Both groups will have to content themselves with whatever attention they can stimulate here and there and with the hope that frequent meetings between them will not remain unproductive for science.</p>
							<p>The two principal themes, totem and taboo, which give the name to this small book are not treated alike here. The problem of taboo is presented more exhaustively, and the effort to solve it is approached with perfect confidence. The investigation of totemism may be modestly expressed as: “This is all that psychoanalytic study can contribute at present to the elucidation of the problem of totemism.” This difference in the treatment of the two subjects is due to the fact that taboo still exists in our midst. To be sure, it is negatively conceived and directed to different contents, but according to its psychological nature, it is still nothing else than Kant’s ‘Categorical Imperative’, which tends to act compulsively and rejects all conscious motivations. On the other hand, totemism is a religio-social institution which is alien to our present feelings; it has long been abandoned and replaced by new forms. In the religions, morals, and customs of the civilized races of to-day it has left only slight traces, and even among those races where it is still retained, it has had to undergo great changes. The social and material progress of the history of mankind could obviously change taboo much less than totemism.</p>
							<p>If I judge my readers’ impressions correctly, I dare say that after hearing all that was said about taboo they are far from knowing what to understand by it and where to store it in their minds. This is surely due to the insufficient information I have given and to the omission of all discussions concerning the relation of taboo to superstition, to belief in the soul, and to religion. On the other hand I fear that a more detailed description of what is known about taboo would be still more confusing; I can therefore assure the reader that the state of affairs is really far from clear. We may say, however, that we deal with a series of restrictions which these primitive races impose upon themselves; this and that is forbidden without any apparent reason; nor does it occur to them to question this matter, for they subject themselves to these restrictions as a matter of course and are convinced that any transgression will be punished automatically in the most severe manner. There are reliable reports that innocent transgressions of such prohibitions have actually been punished automatically. For instance, the innocent offender who had eaten from a forbidden animal became deeply depressed, expected his death and then actually died. The prohibitions mostly concern matters which are capable of enjoyment such as freedom of movement and unrestrained intercourse; in some cases they appear very ingenious, evidently representing abstinences and renunciations; in other cases their content is quite incomprehensible, they seem to concern themselves with trifles and give the impression of ceremonials. Something like a theory seems to underlie all these prohibitions, it seems as if these prohibitions are necessary because some persons and objects possess a dangerous power which is transmitted by contact with the object so charged, almost like a contagion. The quantity of this dangerous property is also taken into consideration. Some persons or things have more of it than others and the danger is precisely in accordance with the charge. The most peculiar part of it is that any one who has violated such a prohibition assumes the nature of the forbidden object as if he had absorbed the whole dangerous charge. This power is inherent in all persons who are more or less prominent, such as kings, priests and the newly born, in all exceptional physical states such as menstruation, puberty and birth, in everything sinister like illness and death and in everything connected with these conditions by virtue of contagion or dissemination.</p>
							<p>First of all it must be said that it is useless to question savages as to the real motivation of their prohibitions or as to the genesis of taboo. According to our assumption they must be incapable of telling us anything about it since this motivation is ‘unconscious’ to them. But following the model of the compulsive prohibition we shall construct the history of taboo as follows: Taboos are very ancient prohibitions which at one time were forced upon a generation of primitive people from without, that is, they probably were forcibly impressed upon them by an earlier generation. These prohibitions concerned actions for which there existed a strong desire. The prohibitions maintained themselves from generation to generation, perhaps only as the result of a tradition set up by paternal and social authority. But in later generations they have perhaps already become ‘organized’ as a piece of inherited psychic property. Whether there are such ‘innate ideas’ or whether these have brought about the fixation of the taboo by themselves or by co-operating with education no one could decide in the particular case in question. The persistence of taboo teaches, however, one thing, namely, that the original pleasure to do the forbidden still continues among taboo races. They therefore assume an _ambivalent attitude_ toward their taboo prohibitions; in their unconscious they would like nothing better than to transgress them but they are also afraid to do it; they are afraid just because they would like to transgress, and the fear is stronger than the pleasure. But in every individual of the race the desire for it is unconscious, just as in the neurotic.</p> <p>It seems like an obvious contradiction that persons of such perfection of power should themselves require the greatest care to guard them against threatening dangers, but this is not the only contradiction revealed in the treatment of royal persons on the part of savages. These races consider it necessary to watch over their kings to see that they use their powers in the right way; they are by no means sure of their good intentions or of their conscientiousness. A strain of mistrust is mingled with the motivation of the taboo rules for the king. “The idea that early kingdoms are despotisms”, says Frazer[59], “in which the people exist only for the sovereign, is wholly inapplicable to the monarchies we are considering. On the contrary, the sovereign in them exists only for his subjects: his life is only valuable so long as he discharges the duties of his position by ordering the course of nature for his people’s benefit. So soon as he fails to do so, the care, the devotion, the religious homage which they had hitherto lavished on him cease and are changed into hatred and contempt; he is ignominiously dismissed and may be thankful if he escapes with his life. Worshipped as a god one day, he is killed as a criminal the next. But in this changed behaviour of the people there is nothing capricious or inconsistent. On the contrary, their conduct is quite consistent. If their king is their god he is or should be, also their preserver; and if he will not preserve them he must make room for another who will. So long, however, as he answers their expectations, there is no limit to the care which they take of him, and which they compel him to take of himself. A king of this sort lives hedged in by ceremonious etiquette, a network of prohibitions and observances, of which the intention is not to contribute to his dignity, much less to his comfort, but to restrain him from conduct which, by disturbing the harmony of nature, might involve himself, his people, and the universe in one common catastrophe. Far from adding to his comfort, these observances, by trammelling his every act, annihilate his freedom and often render the very life, which it is their object to preserve, a burden and sorrow to him.”</p>
							<p>Excerpts from <a href="http://www.gutenberg.org/ebooks/41214">Totem and Taboo</a> by Sigmund Freud.</p>
							-->
						</article>';
						}

						?>
						
					</div>
					<button class="close-button"><i class="fa fa-close"></i><span>Close</span></button>
				</section>



			</div>
		</div><!-- /container -->
		
		<script type="text/javascript">
		$(function(){
			// load dashboard page 
			//$.post("http://freelabel.net/landing_1.3.php", data , function(results){
				//$('.grid').html('what the hell');
			//});
			




			$('.dropdown-target').click(function(){
				// alert('Drop down the menu!');
				$(this).children();
				$('.dropdown-menu').toggle('fast');
			});


			$('.drop-option').click(function(){
				var option = $(this).text();
				alert(option);

			});
			$(function(){
				$('.navi-trigger').click(function(){
					$('.navi-options').toggle('fast');
				});
			});
		});
		</script>
		<script src="<?php echo HTTP; ?>mag/view/js/classie.js"></script>
		<script src="<?php echo HTTP; ?>mag/view/js/main.js"></script>
	</body>
</html>
