<?php
include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
$user_name = Session::get('user_name');
$config = new Blog();
$s = $config->getStatsByUser($user_name);
$stats = $s['count'];
$tracks = $config->getPostsByUser(0, 300, $user_name);
$events = $config->getEventsByUser($user_name, 500);
$promos = $config->getPromosByUser(Session::get('user_name') , 300);


$num_tracks = count($tracks);
$num_events = count($events);
$num_promos = count($promos);

if ($num_tracks == '300') {
	$num_tracks = $num_tracks."+";
}




// earnings calculator 
$score = 0.001 * $stats * 0.001 * $num_tracks;


$photo = $config->getProfilePhoto($user_name);
$user = $config->getUserData($user_name);




  if (isset($tracks)) {
    foreach ($tracks as $key => $value) {
      $post_date = date('m-d',strtotime($value['submission_date']));
      $todays_date = date('m-d');
      $yesterdays_date = date('m-d' , '-1 day');
      $two_days_ago = date('m-d', strtotime('-2 days', time() ));
      $three_days_ago = date('m-d', strtotime('-3 days', time() ));


      if ($post_date == $todays_date) {
        $today[] = $value['blogtitle'];
      } elseif ($post_date == $yesterdays_date) {
        $yesterday[] = $value['blogtitle'];
      } elseif ($post_date == $two_days_ago) {
        $two_days_ago_arr[] = $value['blogtitle'];
      } elseif ($post_date == $three_days_ago) {
        $three_days_ago_arr[] = $value['blogtitle'];
      } else {
        $last_week[] = $value['blogtitle'];
      }

    }
  }
  $this_week_count = count($today);
  $yesterday_count = count($yesterday);
  $two_days_ago_count = count($two_days_ago_arr);
  $three_days_ago_count = count($three_days_ago_arr);
  $last_week_count = count($last_week);



      

?>
<?php
if (isset($user)) {
	include_once(ROOT.'users/application/views/dashboard/stats.php');
} else {
	include_once(ROOT.'submit/views/db/campaign_info.php');
}
?>



