<?php 
include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
//include_once('../new_header.php');
?>
<script type="text/javascript" src='http://freelabel.net/js/jquery.jeditable.js'></script>
<script>
	$('.edit').editable('http://freelabel.net/submit/update.php',{
     	id   : 'lead_script_id',
     	//type    : 'textarea',
        name : 'title'
     });
	function showOptions(id) {
		$('#follow_up_options' + id).toggle();
	}
</script>
<style type="text/css">
.edit input {
	width:100%;
	display:block;
	color:#101010;
}
.script {
	//width:95%;
	margin:0px;
	padding:5% auto;
	font-size: 90%;
}
.the-script {
	text-align: left;
}
.lead .script-item input {
	color:#e3e3e3;
}
.edit input {
	color:#e3e3e3;
}
.phone-script {
	padding:2em;
}
#script_label {
	width:100px;
	//background-color:red;
	padding:1% 3%;
	font-size: 80%;
	display: inline-block;
}
.lead .script-item {
	border-bottom: 1px solid #e3e3e3;
}
/*#phonescript {
	font-size: 100%;
	background-color: #303030;
	text-shadow:none;
	color: #99FF00 ;
	padding: 2%;
	text-align: justify;
	border-radius: 5px;
}*/
.script-int {
	color:red;
	font-weight: bolder;
	margin-right:5%;
	//border-right:2px solid #101010;
	padding:2%;
}
.script-item {
	border-bottom:2px solid #101010;
}
	/* Smartphones (portrait and landscape) ----------- */
@media only screen 
and (min-device-width : 320px) 
and (max-device-width : 480px) {
	.db_panel_2, input {
		font-size: 800%;
		text-align: center;
	}
	.download_button {
		width: 90%;
		font-size: 72pt;
	}
	.script {
	font-size: 80%;
}
}
/* This button was generated using CSSButtonGenerator.com */
</style>
<script type="text/javascript">
function tweetScript(text) {
	text = encodeURIComponent(text);
	//alert("http://freelabel.net/som/index.php?post=1&text=" + text);
	window.open('http://freelabel.net/som/index.php?post=1&text=' + text)
}
</script>

<a name='updated'></a>
<div class='panel col-md-12 card card-chart'>
	<a name="script">
	<h2 id="sub_label">THE SCRIPT</h2>
		<form name="theScript" class='the-script' method="POST" action="http://freelabel.net/x/update_script.php" >


<?php


// MUSIC SUBMISSION
$tweetmessage_submit[0] = urlencode("For Interviews, Radio Placements, or Project Releases

submit music to @GucciT_ @GoDjGHOST 

or upload directly ---> submit.FREELABEL.net");

$tweetmessage_submit[1] = urlencode("Get your music showcased --> submit.FREELABEL.net");

$tweetmessage_submit_beats = urlencode("Download & Meet our producers --> http://freelabel.net/search/x.php?search_text=instrumental&submit=submit");


$tweetmessage_submit_music_vine 	= urlencode("Going over music submissions w/ @KatyPerry @LilTunechi Cash Money producer BareWolf! 

submit.FREELABEL.net 

vine.co/v/MVnl0bAXKun");






// WEBSITE FEATURES
$tweetmessage_create_account = urlencode("FREELABEL ARTIST ACCOUNT:

BOOK WEEKLY RADIO + MAG INTERVIEWS
UPLOAD TO 24/7 ROTATION
+ MORE

submit.FREELABEL.net
pic.twitter.com/3tGsx8zRn5");

$tweetmessage_studios = urlencode("Come work with us directly at any of our FREELABEL STUDIOS!

studios.FREELABEL.net");



///////////////////// EXCLUSIVE RADIO SHOWS


//// BROADCASTING LIVE RIGHT NOW!
$tweetmessage_listen_live = urlencode("We are dropping NEW MUSIC LIVE On-Air right now on #FREELABELRADIO

LISTEN LIVE --> Radio.FREELABEL.net");

// #UnderGroundTurnUp - ATLANTA
$tweetmessage_ugtu = urlencode("Broadcasting LIVE from ATLANTA

#UnderGroundTurnUp
Saturday @ 10PM CST

INTERVIEWS + EXCLUSIVES w/ @GucciiT_ on RADIO.FREELABEL.net");

// OPEN STUDIO SESSIONS
$tweetmessage_openstudio = urlencode("#OpenStudio in Dallas, TX
	
5 Hour Studio Session
Tuesdays @ 5PM

RSVP @ studios.FREELABEL.net
pic.twitter.com/0uj9UwX8Go");

// THANKS TAPE
$tweetmessage_mixtape = urlencode("submit music for the #DRIVE Compilation Hosted by #BSM1017 @MackDrama1017 x @AMRadioLIVE

--> submit.FREELABEL.net
pic.twitter.com/pshDbnu8l9");





///////////////////// RADIO SHOWS // PROMOTIONS AND CAMPAIGNS

// MORNING RADIO SHOW
$tweetmessage_morning_radio_show = urlencode("Broadcasting LIVE from Dallas, TX

@AMRadioLIVE Morning Showcase
7-11AM

TUNE IN --> RADIO.FREELABEL.net
CALL IN --> (347)994.0267");

// MIDDAY RADIO SHOW
$tweetmessage_midday_radio_show = urlencode("#NightFlightRadio

w/ @DJ_NiteCrawler
Weekdays @ 1PM

Tune in at RADIO.FREELABEL.net
pic.twitter.com/pj6x10r70a");

// AFTERNOON RADIO SHOW
$tweetmessage_afternoon_radio_show = urlencode("#OpenStudio in Dallas, TX

5 Hour Studio Session for $25

Thursdays @ 5PM

RSVP @ store.FREELABEL.net
pic.twitter.com/0uj9UwX8Go");

// NIGHTLY RADIO SHOW
$tweetmessage_night_radio_show = urlencode("TUNE IN NOW! We're live with @GucciT_ 

--> [RADIO @ store.FREELABEL.net]

#UnderGroundTurnUp in ATLANTA
SATURDAYS @ 10PM");



/// REPRESENTATION
$tweetmessage_rep[0] = urlencode("BSM x FL

Showcasing The Talented w/ insane DRIVE..

#DRIVE2 EP Release | Host: 1017BrickSquad

Now Available on FREELABEL.net");


?>
<a name-'dms'></a>
				<?php
				if (file_exists('../inc/connection.php')) {
					include('../inc/connection.php');
				}
				if (file_exists('../../../inc/connection.php')) {
					include('../../../inc/connection.php');
				}
				
				$result = mysqli_query($con,"SELECT * FROM script ORDER BY id DESC LIMIT 1");
				$i=0;
				while($row = mysqli_fetch_assoc($result))
				  {
				  	$script = $row;
				  	$script_id = $row['id'];
				  	$i=1;
				  	foreach ($script as $key => $value) {
				  		echo '<div class="lead script-item list-group-item" ><data class="edit" id="lead-script-'.$key.'-'.$row['id'].'" >'.$value.'</data></div>';
				  		$i++;
				  	}
				  	$i++;
					
					/*$send_out_message	= $row['send_out'];
				  	$first		= $row['first'];
					$second		= $row['second'];
					$third		= $row['third'];
					$fourth		= $row['fourth'];
					$fifth		= $row['fifth'];
					
					$sixth		= $row['sixth'];
					$seventh	= $row['seventh'];
					$eighth		= $row['eighth'];
					$ninth		= $row['ninth'];
					$tenth		= $row['tenth'];
					$eleventh	= $row['eleventh'];
					$twitpic_send_out = $row['twitpic'];

					$follow_up_1	=	$row['follow_up_1'];
					$follow_up_2	=	$row['follow_up_2'];
					$follow_up_3	=	$row['follow_up_3'];
					$follow_up_4	=	$row['follow_up_4'];
					$follow_up_5	=	$row['follow_up_5'];


					echo '<div class="alert alert-success" ><h2 id="sub_label">DM AUTO-RESPONSE:</h2>';
				  	echo '<input id="script_twitpic" name="twitpic" class="script form-control" type="text" value="'.$twitpic_send_out.'" ></div><br><br>';
					echo '<span class="label label-warning">MASS SOM MESSAGE:</span> <input id="script_send_out" name="send_out" class="script form-control" type="text" value="'.$send_out_message.'" ><br><br>';
				  	echo '<span class="label label-success" id="script_label">FIRST:</span><input class="script form-control" type="text" name="first" value="'.$first.'" ><br>';
				  	echo '<span class="label label-success" id="script_label">SECOND:</span><input class="script form-control" type="text" name="second" value="'.$second.'" ><br>';
				  	echo '<span class="label label-success" id="script_label">THIRD</span><input class="script form-control" type="text" name="third" value="'.$third.'"><br>';
				  	echo '<span class="label label-success" id="script_label">FOURTH</span><input class="script form-control" type="text" name="fourth" value="'.$fourth.'" ><br>';
				  	echo '<span class="label label-success" id="script_label">FIFTH</span><input class="script form-control" type="text" name="fifth" value="'.$fifth.'" ><br>';

				  	echo '<div class="input-group"><span class="input-group-addon" onclick="tweetScript(\''.$sixth.'\')" ><span class="glyphicon glyphicon-link"></span></span><span class="label label-primary" id="script_label">LEAD1</span><input class="script form-control" type="text" name="sixth" value="'.$sixth.'" ></div><br>';
				  	echo '<div class="input-group"><span class="input-group-addon" onclick="tweetScript(\''.$seventh.'\')"><span class="glyphicon glyphicon-link"></span></span><span class="label label-primary" id="script_label">LEAD2</span><input class="script form-control" type="text" name="seventh" value="'.$seventh.'" ></div><br>';
				  	echo '<div class="input-group"><span class="input-group-addon" onclick="tweetScript(\''.$eighth.'\')"><span class="glyphicon glyphicon-link"></span></span><span class="label label-primary" id="script_label">LEAD3</span><input class="script form-control" type="text" name="eighth" value="'.$eighth.'" ></div><br>';
				  	echo '<div class="input-group"><span class="input-group-addon" onclick="tweetScript(\''.$ninth.'\')"><span class="glyphicon glyphicon-link"></span></span><span class="label label-primary" id="script_label">LEAD5</span><input class="script form-control" type="text" name="ninth" value="'.$ninth.'" ></div><br>';
				  	echo '<div class="input-group"><span class="input-group-addon" onclick="tweetScript(\''.$tenth.'\')"><span class="glyphicon glyphicon-link"></span></span><span class="label label-primary" id="script_label">LEAD6</span><input class="script form-control" type="text" name="tenth" value="'.$tenth.'" ></div><br>';
				  	echo '<div class="input-group"><span class="input-group-addon" onclick="tweetScript(\''.$eleventh.'\')"><span class="glyphicon glyphicon-link"></span></span><span class="label label-primary" id="script_label">LEAD7</span><input class="script form-control" type="text" name="eleventh" value="'.$eleventh.'" ></div><br>';

				  	echo '<div class="input-group"><span class="input-group-addon"><span class="glyphicon glyphicon-link"></span></span><span class="label label-warning" id="script_label">DM Response 1</span><input class="script form-control" type="text" name="follow_up_1" value="'.$follow_up_1.'" ></div><br>';
				  	echo '<div class="input-group"><span class="input-group-addon"><span class="glyphicon glyphicon-link"></span></span><span class="label label-warning" id="script_label">DM Response 2</span><input class="script form-control" type="text" name="follow_up_2" value="'.$follow_up_2.'" ></div><br>';
				  	echo '<div class="input-group"><span class="input-group-addon"><span class="glyphicon glyphicon-link"></span></span><span class="label label-warning" id="script_label">DM Response 3</span><input class="script form-control" type="text" name="follow_up_3" value="'.$follow_up_3.'" ></div><br>';
				  	echo '<div class="input-group"><span class="input-group-addon"><span class="glyphicon glyphicon-link"></span></span><span class="label label-warning" id="script_label">CALL US</span><input class="script form-control" type="text" name="follow_up_4" value="'.$follow_up_4.'" ></div><br>';
				  	echo '<div class="input-group"><span class="input-group-addon"><span class="glyphicon glyphicon-link"></span></span><span class="label label-warning" id="script_label">DM Response 5</span><input class="script form-control" type="text" name="follow_up_5" value="'.$follow_up_5.'" ></div><br>';
				  	*/
				}
				?>

<hr>
			<div id="phonescript" class="card card-chart phone-script" >
			<h1>Interview Questions</h1>
				<ul>
					<li>Where are you from? What does your city have to do with your style? What is your city like? What is your local scene consist of?</li>
					<li>Who do you work with? Who are you looking to work with in the future? Who have you worked with in the past?</li>
					<li>Are you working on any new projects right now? Where did you get the idea or concept of this project?</li>
					<li>Do you have an overall message in your art? What is your message as an artists?</li>
					<li>If you could branch into any genre of music, and still have major success, what would it be?</li>
					<li>Whats the most messed up, tragic, or craziest thing that has happened in your music careers so far?</li>
					<li>What advice do you have for other musicians and fans that listen to your music and watch your moves?</li>
				</ul>
				<?php 

// 				$phonescript = "Hi this is YO NAME with FREELABEL Radio & Magazine. Our DJs approved your submissions & wanted me to follow up with you about getting your account created so we can start getting you placed on our radio & magazine interviews, projects, videos, & events this month.<br><br><br>

// <!--
// 				We have a 4,500+ Square Foot Headquarters in Dallas, TX with a 3 Recording Studios, Radio, and Film Room
// 				<br><br>
// 				and a 1,500 Square Foot Radio + Recording Studio in Houston, TX
// 				<hr>

// 				We get over 3.5 Million impressions each month on twitter, we've done booking for artists such as: <br><br>

// 				- Chief Keef, Ab Soul, & Odd Future in Dallas 
// 				<br>- Release Songs & DJ Events Johnny Cinco <br>
// 				- Gucci Mane & BSM 1017 reached out to us directly for hosting mixtapes & debuting exclusives,
// 				<br>
// 				- Miley Cyrus shared our site & got over 10,000 impressions alone in one day<br>
// 				- We Produced the Beat Up The Block by Boosie and Dorrough<br>
// 				- We were the ones who orginally released the OG Maco & OGG Documentary in November.<br>
// 				<hr> 
// -->
// 				if you create an account, for $200 a month, we will provide you with:<br><br>
// 				- A FREELABEL DJ <br>
// 				- Radio + Full Magazine Interviews <br>
// 				- Studio Time: Audio Engineering, Production, Mixing/Mastering<br>
// 				- Video, Single, & Project Releases <br>
// 				- Graphic Design & Instagram Commercials <br>
// 				- 2 Hour Radio Show Broadcasting your full project + Interviews <br>
// <hr>
// 				if you create an account, for $50 a month, we will provide you with:<br><br>
// 				the same but we will not be able to include Royalty Payouts, Event Booking, and Traveling to your location. Instead of doing on-site video interviews, we'll have you call into the studio.
// <hr>

// //////////// (IF INTERESTED)<br><br>

// Are you by a computer, cell phone, or anything that you could use to get on the website you submitted on?<br><br>

// IF YOU CREATE AN ARTIST ACCOUNT WITH US, WE'LL FEATURE AN INTERVIEW OR MUSIC REVIEWS EACH MONTH + WE'LL PROMOTE YOUR VIDEOS, ALBUMS, PROJECTS, OR SINGLES ALL MONTH SUCH AS RADIO SHOWCASES, BLOG REVIEWS OF EACH OF YOUR SINGLES, and WEEKLY INTERVIEWS TO TALK ABOUT YOUR UPCOMING EVENTS AND PROJECTS FOR $35 MONTH<br><br>

// && EXCLUSIVE ACCOUNTS: WE DISTRIBUTE YOUR MUSIC & YOU EARN 100% ROYALTIES. WE HAVE OTHER CLIENTS WHO EARN UP OVER $5,000+ EACH MONT BY HAVING OVER 1000 FANS SUBSCIBED TO THEIR ACCOUNT - $199 MONTH"; 

//echo $phonescript; ?>
			</div>
		
		</form>
