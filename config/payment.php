<?php
include('../config/globalvars.php');
$type = strtolower($_GET['id']);
switch ($type) {
	case 'lite':
		$url = $lite[1];
		break;
	case 'sub':
		$url = $magazine[1];
		break;
	case 'basic':
		$url = $projects[1];
		break;
	case 'exclusive':
		$url = $exclusive[1];
		break;
	case 'trial':
		$url = 'https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=J67CSAKQMWDT8';
		break;
	case 'freetrial':
		//$url = $magazine[1];
		$url = 'http://freelabel.net/config/register_freetrial.php?freetrial';
		break;
	case 'plus':
		$url = 'https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=PA4HD77R69M68';
		break;
	case 'tour':
		//$url = $magazine[1];
		$url = 'https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=S89WJV7T7Q4E8';
		break;
	case 'free':
		//$url = $magazine[1];
		$url = 'https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=5WHP3BJ74C44L';
		break;
	
	default:
		$error_message[] = 'No Type Set! Our team has been notified of this error and are working on a fix ASAP!';
		break;
}
header('Location: '. $url);
?>
