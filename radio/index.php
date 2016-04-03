<?php
// header('Location: http://freelabel.net/users/index/radio/');
// exit;

// include('../config/radio-player.php');
// exit;
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

/*	------------------------------------ //
*	only if direct download ------------ //
*	------------------------------------ */
$ua = strtolower($_SERVER['HTTP_USER_AGENT']);
if(stripos($ua,'android') !== false) { // && stripos($ua,'mobile') !== false) {
	//header('Location: http://freelabel.net/radio/FREELABEL.apk');
	echo '<script>
	var ua = navigator.userAgent.toLowerCase();
	var isAndroid = ua.indexOf("android") > -1; //&& ua.indexOf("mobile");
	if(isAndroid) {
		// Do something!
		// Redirect to Android-site?
		r = confirm("Do you wish to proceed with the FREELABEL App for your phone for FREE?");
		if (r==true){
			window.location = \'http://freelabel.net/radio/FREELABEL.apk\';
			alert("open application");
		} else {
			alert("show the streamer");
			window.location = \'http://streaming.radio.co/s95fa8cba2/listen\';
		}
	}
	</script>
	';
	echo 'okay'; 
	exit();
}

if ($actual_link == 'http://radio.freelabel.net/') {
	//header('Location: http://freelabel.net/radio/'); 
	header('Location: http://streaming.radio.co/s95fa8cba2/listen');
} else {
	header('Location: http://streaming.radio.co/s95fa8cba2/listen');
}
include('../inc/connection.php');
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$query = "SELECT * FROM blog 
	WHERE blog_post_key='".$id."'
	ORDER BY `id` DESC LIMIT 1";
	$result = mysqli_query($con,$query);
	if ($row = mysqli_fetch_array($result))
	  {
	  	header("Location: ".$row['playerpath']);
	  	exit;
	  	//echo "Location ".$row['playerpath'];
	  } else {
	  	//echo "nope";
	  }
}

// Page Title Configuration
	$page_title = "RADIO";
	$page_desc = "Welcome To FREE LABEL // 24/7 On-Demand Radio // Music Releases // Exclusive Interviews";
	include_once('../new_header.php'); 
?>
<script>
function open_radio() {
	var streamLink = 'http://eclipse.wavestreamer.com:9614/listen.m3u?sid=1';
	var file_name = 'FREELABELRADIO iTunes Broadcaster';
	var redirect_to_download = 'http://freelabel.net/download.php?p=' + streamLink + '&n=' + file_name + '&t=m3u';
	var redirect_to_download = 'http://eclipse.wavestreamer.com:9614/listen.m3u?sid=1';
	window.open(redirect_to_download);
	//window.location.assign("http://freelabel.net/mag/");
}

if (confirm('Do you want to download FREELABELRADIO directly to your iPhone or Android?')) {
	// Save it!
	//setTimeout(open_radio(), 2000);
	//open_radio();
	window.location.assign('http://streaming.radio.co/s95fa8cba2/listen');
} else {
	// Do nothing!
	//document.location.assign("http://freelabel.net/radio/");

	// DO NOTHING
}

$('#please_wait').fadeOut(1000);
$('#radio_panel_block').fadeIn();
</script>



<style>

	#now_playing_button {
		width:20%;
		display: inline;
		margin:auto;
	}
	#radio_sidebar a {
		display:block;
	}
</style>




<div class='row' style='margin-top:5%;'>
	<div class="col-xs-12 col-sm-6 col-md-8 panel-body jumbotron" >
		<h1><span class='label-danger' >Now Playing:</span> <p data-shoutcast-value="songtitle"></p></h1>
		<!--Wavestreaming.com SHOUTcast Flash Player-->
		<!--End Player-->
		<hr>
		<a class='btn btn-primary' href='http://stardust.wavestreamer.com:9614/listen.m3u?sid=1' target='_blank' >Download For Itunes</a>
		<a class='btn btn-primary' href='http://stardust.wavestreamer.com:9614/listen.m3u?sid=1' target='_blank' >Download For Android</a>
		<a class='btn btn-primary' href='http://stardust.wavestreamer.com:9614/listen.m3u?sid=1' target='_blank' >Stream Live Via Internet Browser</a>
		<a class='btn btn-success' href='http://stardust.wavestreamer.com:9614/listen.m3u?sid=1' target='_blank' >Submit to Radio Rotation</a>
		<hr>

		<?php include('../first-registration.php'); ?>

	</div>
	<div class="col-xs-6 col-md-4" id='radio_sidebar' >
		<div id='radio_panel_block'>
			<p>		
				<h3>Recently Played:</h3>		
				<ul style="color:#000;" class='panel panel-body' style='padding:5%;' id="played" ></ul>
				<script>window.jQuery || document.write('<script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"><\/script>')</script>
				<script src="http://240891823.r.professionalcdn.com/jquery.shoutcast.easy.min.js?host=stardust.wavestreamer.com&port=9614&stream=1"></script>
			</p>
		</div>
		<hr>
		<h3>Top Trending</h3>
		<?php $filter='trending';
		include('../top_posts.php');?>
	</div>
</div>


	
<!-- FOOTER INFORMATION -->

<?php
include_once('../new_footer.php'); 
?>