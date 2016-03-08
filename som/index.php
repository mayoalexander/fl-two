<?php
session_start();
		/* --------------------------------------------------------------------------------
		GRAB ALL SCRIPT VALUES
		--------------------------------------------------------------------------------*/
		function getPremadeTweets(){
				include('../inc/connection.php'); 
				$query = "SELECT * FROM script ORDER BY `id` DESC LIMIT 1";
				$result = mysqli_query($con,$query);
				$i=1;
				while($row = mysqli_fetch_array($result))
				  {
				  	$send_out_message = $row['send_out'];
				  	$main_follow_up = $row['twitpic'];

				  	$promote_campaign[]		= $row['first'];
					$promote_campaign[]		= $row['second'];
					$promote_campaign[]		= $row['third'];
					$promote_campaign[]		= $row['fourth'];
					$promote_campaign[]		= $row['fifth'];
		
					$script_follow_up[] = $row['follow_up_1'];
					$script_follow_up[] = $row['follow_up_2'];
					$script_follow_up[] = $row['follow_up_3'];
					$script_follow_up[] = $row['follow_up_4'];
					$script_follow_up[] = $row['follow_up_5'];
					
					$value_builder[] = $row['sixth'];
					$value_builder[] = $row['seventh'];
					$value_builder[] = $row['eighth'];
					$value_builder[] = $row['ninth'];
					$value_builder[] = $row['tenth'];
		
					$value_builder[0] = urlencode($value_builder[0]);
					$value_builder[1] = urlencode($value_builder[1]);
					$value_builder[2] = urlencode($value_builder[2]);
				  	//$debug[] .= i . ') '.$send_out_message;
				  	$i++;
				  	//print_r($debug);
				  }
		}
		/* --------------------------------------------------------------------------------
		GRAB ALL SCRIPT VALUES
		--------------------------------------------------------------------------------*/

/*
@file
User has successfully authenticated with Twitter. Access tokens saved to session and DB.
*/

/* Load required lib files. */
require_once('twitteroauth/twitteroauth.php');
require_once('config.php');

/* If Access Tokens are not available redirect to connect page. */
if (empty($_SESSION['access_token']) || empty($_SESSION['access_token']['oauth_token']) || empty($_SESSION['access_token']['oauth_token_secret'])) {
    $url_suffix = "$_SERVER[REQUEST_URI]";
    //echo $url_suffix;
    header('Location: ./clearsessions.php');
}
/* Get user access tokens out of the session. */
$access_token = $_SESSION['access_token'];

/* Create a TwitterOauth object with consumer/user tokens. */
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);

getPremadeTweets();

/* ------------------------------------------------------------
MAIN SOM PROCESSING
------------------------------------------------------------ */
switch ($_GET['q']) {
case 1:
$api_query =array(
	'q'=>"site:datpiff.com OR \"my single\" site:youtube.com", 
	"result_type" => "recent",
	"lang" => "en",
	"count" => '2');
// AUTO POST | PROMOTE GUCCI
// $status 			= 	$connection->post('statuses/update', array('status' => 'stay workin..'));
break;
case 2:
$api_query =array(
	'q'=>"site:audiomack.com OR site:spinrilla.com", 
	"result_type" => "recent",
	"lang" => "en",
	"count" => '50');
$status 			= 	$connection->post('statuses/update', array('status' => $campaign1));
break;
case 3:
$api_query =array(
	'q'=>"my datpiff.com", 
	"result_type" => "recent",
	"lang" => "en",
	"count" => '40');
$status 			= 	$connection->post('statuses/update', array('status' => $campaign2));
break;
case 4:
$api_query =array(
	'q'=>"my new soundcloud.com", 
	"result_type" => "recent",
	"lang" => "en",
	"count" => '40');
$status 			= 	$connection->post('statuses/update', array('status' => $campaign3));

break;
case 5:
$api_query =array(
	'q'=>"send beats", 
	"result_type" => "recent",
	"lang" => "en",
	"count" => '40');
$connection->post('statuses/update', array('status' => $campaign4));
break;
case 6: // FINDING ALL FOLLOWERS
$api_query =array(
	'screen_name'=>"freelabelnet", 
	"count" => '40');
$connection->post('statuses/update', array('status' => $campaign5));
break;
case 7: // FINDING ALL FOLLOWERS
$api_query =array(
	'screen_name'=>"freelabelnet", 
	'cursor'=>'-1',
	"count" => '200');
$connection->post('statuses/update', array('status' => $campaign5));
break;
default:
$api_query =array("count" => '1');
//$connection->post('statuses/update', array('status' => $campaign6));
break;
}
	

	
/* ------------------------------------------------------------
SEARCH QUERIES
------------------------------------------------------------ */
if (isset($_GET['som'])) {
	switch ($_GET['som']) {
		case 1:
			$connectionRequest = 	$connection->get('search/tweets', $api_query);
			break;
		case "findfriends":
			$connectionRequest 		= 	$connection->get('followers/list', $api_query);
			break;
		case "getAllDMS":
			$connectionRequest 		= 	$connection->get('direct_messages', $api_query);
			break;
		default:
			# code...
			break;
	}
}elseif($_GET['dm']=='1') {
/* ------------------------------------------------------------
SEND DIRECT MESSAGES
------------------------------------------------------------ */
	//function sendDirectMessage() {
		$direct_message = $_GET['text'];
		$screen_name = $_GET['t'];
		if(isset($screen_name)==false) {
			$screen_name = $_GET['id'];
			$direct_message_contents = array('text' => $direct_message , 'user_id'=> $screen_name);
		} else {
			$direct_message_contents = array('text' => $direct_message, 'screen_name' => $screen_name);
		}
		$connectionRequest 	= 	$connection->post('direct_messages/new', $direct_message_contents);
		echo '<img onclick="windowClose()" id="confirm_image" src="http://julienbraida.com/wp-content/uploads/2015/04/check-mark-11-512.png">'.$screen_name ;
	// } sendDirectMessage();
}

/* ------------------------------------------------------------
PUBLIC POSTING
------------------------------------------------------------ */
elseif ($_GET['post']==1) {
	// DISPLAY RESULTS UPON REQUEST
	if (isset($_GET['text'])) {
		$text_to_post= $_GET['text'];
		if (isset($_GET['t'])) {
			$connection->post('friendships/create', array('screen_name' => $_GET['t']));
		}
	} else {
		/* ------------------------------------------------------------
		DEFAULT IF IDK YET
		------------------------------------------------------------ */
		$text_to_post	=	$promote_campaign ;
	}
	/* ------------------------------------------------------------
	CHECK IF POST IS SUCCESSFUL + SUCCESSFUL ANIMATION
	------------------------------------------------------------ */
	$status 			= 	$connection->post('statuses/update', array('status' => $text_to_post));	
	if ($status->errors == true){
		echo '<pre>';
		foreach ($status->errors as $key => $error) {
			$error_data[$key] = $error->message;
			echo $error_data[$key];
		}
		echo '</pre>';
		exit;
	} else {
		echo '<center>';
		echo '<div class="panel">';
		echo '<img id="confirm_image" onclick="windowClose()" src="http://julienbraida.com/wp-content/uploads/2015/04/check-mark-11-512.png" >'.$text_to_post ;
		echo '</div>';
	}
	
} else {
/* ------------------------------------------------------------
REVERT BACK T0 DEFAULT BUTTONS VIEW FROM TWITTER API APP
------------------------------------------------------------ */
	// DEFAULT TWEET 
	//$status 			= 	$connection->post('statuses/update', array('status' => 'SUBSCRIBE or UPLOAD TO FREELABEL MAGAZINE + RADIO at FREELABEL.net'));
	$content_SOM 			=	'
							

							<div class="input-group" id="som_password_input">
						      <input id="validation_key" type="password" class="form-control"  placeholder="Enter Passcode...">
						      <span class="input-group-btn">
						        <button class="btn btn-success" onclick="validateKey()" >GO</button>
						      </span
						    </div>


						    <div id="somOptionsBlock" >
							';
	$content_SOM 			.=	'<script src="share_options.js" ></script>';
	$content_SOM 			.= 	'<hr><a class="btn btn-success" href="?som=1&q=1&clockin=1">SOM1 => [All Sites 1]</a>';
	$content_SOM 			.= 	'<a class="btn btn-success" href="?som=1&q=2">SOM2 => [All Sites 2]</a>';
	$content_SOM 			.= 	'<a class="btn btn-success" href="?som=1&q=3">SOM3 => [datpiff.com 3]</a>';
	$content_SOM 			.= 	'<a class="btn btn-warning" href="?som=1&q=4">SOM4 => [my soundcloud 4]</a>';
	$content_SOM 			.= 	'<a class="btn btn-success" href="?som=1&q=5">SOM5 => [send beats.com 5]</a>';
	$content_SOM 			.= 	'<a class="btn btn-danger" href="?som=DM">DMS => [freelabelnet]</a>';
	$content_SOM 			.= 	'<a class="btn btn-danger" href="?post=1">DMS => [POST]</a>';
	$content_SOM 			.= 	'
	<form action="index.php" method="GET">
		<input name="text" type="text" >
		<input name="post" type="hidden" value="1" >
		<input type="submit">
	</form>';
	$content_SOM 			.=	'</div>';
}
echo '</center>';


/* Some example calls */
//$connection->get('users/show', array('screen_name' => 'abraham'));
//$connection->post('statuses/update', array('status' => date(DATE_RFC822)));
//$connection->post('statuses/destroy', array('id' => 5437877770));
//$connection->post('friendships/create', array('id' => 9436992));
//$connection->post('friendships/destroy', array('id' => 9436992));

/* Include HTML to display on the page */
include('html.inc');