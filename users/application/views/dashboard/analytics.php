<?php
include_once('/home/content/59/13071759/html/config/index.php');
$user_name = Session::get('user_name');
$config = new Blog();
$stats = $config->getStatsByUser($user_name);
$tracks = $config->getPostsByUser(0, 300, $user_name);
$events = $config->getEventsByUser($user_name, 500);
$promos = $config->getPromosByUser(Session::get('user_name') , 300);


$num_tracks = count($tracks);
$num_events = count($events);
$num_promos = count($promos);

if ($num_tracks == '300') {
	$num_tracks = $num_tracks."+";
}



$score = round($stats / $num_tracks);

$photo = $config->getProfilePhoto($user_name);
$user = $config->getUserData($user_name);

?>
<?php
if (isset($user)) {
	include_once(ROOT.'users/application/views/dashboard/stats.php');
} else {
	include_once(ROOT.'submit/views/db/campaign_info.php');
}
?>



