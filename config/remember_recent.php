<?php
if (isset($_GET['recent_page'])) {
	session_start();
	$_SESSION['last_page'] = $_GET['recent_page'];
	echo 'Last View set: '.$_GET['recent_page'];
} else {
	# it just caaint do it mane
}