<?php
include_once('/home/content/59/13071759/html/config/index.php');
$user_name = Session::get('user_name');
$config = new Blog();
$stats = $config->getStatsByUser($user_name);
$tracks = $config->getMediaByUser($user_name, 100);

$num_tracks = count($tracks);

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



