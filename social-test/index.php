<?php 
// include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
require "/kunden/homepages/0/d643120834/htdocs/social-test/vendor/autoload.php";

use Abraham\TwitterOAuth\TwitterOAuth;




$access_token = '1018532587-pZivWibRwTz1uXmUgWS9XfnQw3HidZ7bLJuwowD';
$access_token_secret = '9hc6heSLfF1CTKdAlpScQwiAor9iP0CVLKHz8VzGVmhCi';

$connection = new TwitterOAuth('yaN4EQqnWE8Q4YGFL4lR0xRxi', 'rudYALyDVhfGosR3L4WxPt3go4X6rRwlSuwfmYspkqEJbo9wmX', $access_token, $access_token_secret);

/*
** Example call: http://freelabel.net/social-test/?a=uploadmedia&f=freelabel.net/images/fllogo.png
*/
if ($_GET=='') {
	// NO PARAMTERS FOUND!
	echo 'Error: No Parameters Set!';
} else {
	$debug[] = 'Params: <pre>';
	switch ($_GET['a']) {
		case 'uploadmedia':
			// confirm that file parameters are set
			$debug[] = 'Media Upload Initialized<br>';
			if ($_GET['f']!='' AND $_GET['t']!='') {
				$uploadedmedia = 'http://'.str_replace(' ', '%20', $_GET['f']);
				$debug[] = 'photos detected: "'.$uploadedmedia.'"';
				$media1 = $connection->upload('media/upload', array('media' => $uploadedmedia));
				if (strlen($_GET['t']) > 90) {
					$text = substr($_GET['t'], 0,90).'...';
				} else {
					$text = $_GET['t'];
				}
				$parameters = array(
				    'status' => $text, 
				    'media_ids' =>  $media1->media_id_string//implode(',', array($media1->media_id_string, $media2->media_id_string)),
				);

				$content = $connection->post('statuses/update', $parameters);

				//print_r($content->entities->media[0]->display_url);
				$twitpic = $content->entities->media[0]->display_url;
				$debug[] = $media1;
				$debug[] = $content;
				//$twitpic = $media1;
				//return $twitpic;

			} else {
				echo 'No File or Text Found Found!<br>Please use &f=[] and &t=[]<br>';
			}

			//print_r($_GET['a']); // debugging

			break;
		
		default:
			echo 'No Action Set! ("upload media,","post", "directmessages", etc..)';
			break;
	}

}




//echo '<pre>';
//print_r($media1);
//echo '<hr>';
//print_r($content);