<?php
class SimpleClass
{
    // property declaration
    public $title = 'FREELABEL';
    public $desc = 'MAG // RADIO // TV NETWORK | The Streaming Media Platform for Independent Art';
    

    // method declaration
    public function displayVar() {
		
		include("../../../config/index.php");
		public $headerContent = '
	<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <link rel="shortcut icon" type="image/x-icon" href="HTTP."ico/favicon.ico" >
  <link rel="shortcut icon" href="'.HTTP.'ico/favicon.ico" type="image/x-icon">
  <link rel="icon" href="'.HTTP.'images/favicon.ico" type="image/x-icon">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>'.$page_title.' // FREELABEL MAG + RADIO</title>
  <meta name="author" content="FREELABEL">
  <meta name="Description" content="FREELABEL Network is the Leader in Online Showcasing | '.$page_desc.'">
  <meta name="Keywords" content="FREELABEL, FREE LABEL, FREE, LABEL, AMR, AMRecords, Rap, Hip Hop, Showcasing, Good Brand, Get That Good, Good Brand Clothing, Dalls Texas, FREELABEL, amradio, am radio live, texas, music, promotion, hip hop, rap">
  <meta name="Copyright" content="FREELABEL">
  <meta name="Language" content="English">
  <!-- twitter meta start -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:player" content="'.$page_url.'">
  <meta name="twitter:player:width" content="300">
  <meta name="twitter:player:height" content="300">
  <meta name="twitter:image" content="'.$meta_tag_photo.'">
  <meta name="twitter:image:src" content="'.$meta_tag_photo.'">
  <meta name="twitter:site" content="@freelabelnet">
  <meta name="twitter:creator" content="@AMRadioLIVE">
  <meta name="twitter:title" content="'.$page_title.' | FREELABEL RADIO + MAGAZINE + STUDIOS">
  <meta name="twitter:description" content="Submit your music to get showcased on FREELABEL Magazine, Radio, TV, Events, and more!">
  <meta property="og:url" content="'.$page_url.'">
  <meta property="og:title" content="'.$page_title.' // FREELABEL RADIO + MAGAZINE">
  <meta property="og:description" content="Subscribe and create an account to FREELABEL.net for exclusive access to daily updated news, interviews, singles and project releases from the most influencial creators of our generation.">
  <meta property="og:image" content="'.$meta_tag_photo.'">
  <meta property="og:image:type" content="image/png">
  <meta property="og:image:width" content="1024">
  <meta property="og:image:height" content="1024">

<link rel="apple-touch-icon" sizes="57x57" href="'.HTTP.'ico/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="'.HTTP.'ico/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="'.HTTP.'ico/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="'.HTTP.'ico/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="'.HTTP.'ico/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="'.HTTP.'ico/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="'.HTTP.'ico/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="'.HTTP.'ico/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="'.HTTP.'ico/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="'.HTTP.'ico/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="'.HTTP.'ico/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="'.HTTP.'ico/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="'.HTTP.'ico/favicon-16x16.png">
<link rel="manifest" href="'.HTTP.'ico/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="'.HTTP.'ico/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">



  <link rel="manifest" href="'.HTTP.'ico/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="'.HTTP.'ico/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">
  
  <!-- twitter meta end --> 


		<link rel="stylesheet" type="text/css" href="'.HTTP.'/newLayout/css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="'.HTTP.'/newLayout/css/demo.css" />
		<link rel="stylesheet" type="text/css" href="'.HTTP.'/newLayout/css/layout-simple.css" />
  		<link href="http://fonts.googleapis.com/css?family=Oxygen|Fjalla+One" rel="stylesheet" type="text/css">
  		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		<link href="http://externalcdn.com/respond-proxy.html" id="respond-proxy" rel="respond-proxy" />
	  	<script src="'.HTTP.'config/jquery-ui-1.11.4.custom/external/jquery/jquery.js"></script>
	  	<script src="'.HTTP.'config/jquery-ui-1.11.4.custom/jquery-ui.js"></script>
	  	<script src="'.HTTP.'bootstrap-3.3.4/dist/js/bootstrap.min.js"></script>
	  	<script src="'.HTTP.'js/like_post.js"></script>
	  	<script src="'.HTTP .'config/globals.js"></script>

	';
		
        echo $this->headerContent;
    }
}

$content = new SimpleClass();
var_dump($content);

?>

