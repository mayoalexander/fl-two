<?php
include('../config/globalvars.php');
$type = strtolower($_GET['id']);
switch ($type) {
	case 'sub':
		$url = $magazine[1];
		break;
	case 'basic':
		$url = $projects[1];
		break;
	case 'exclusive':
		$url = $exclusive[1];
		break;
	case 'freetrial':
		//$url = $magazine[1];
		$url = 'http://freelabel.net/config/register_freetrial.php?freetrial';
		break;
	
	default:
		$error_message[] = 'No Type Set! Our team has been notified of this error and are working on a fix ASAP!';
		break;
}
header('Location: '. $url);
?>
