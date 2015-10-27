<?php 
//include('../new_header.php');
include('_header.php');
?>
<?php 
include('../submit/views/db/index.php');
if ($user_type == 'pro') {
  //include('../submit/views/db/dashboardpanel5.php');
} else {
  if (isset($_GET['DL'])) {
    $trackmp3  =  $_GET['DL'];
    $twittername  =  $_GET['twittername'];
    $full_track_name  =  $_GET['trackname'];
    echo '<script>window.open("http://freelabel.net/download.php?p='.$trackmp3.'&n='.$twittername.' - '.$full_track_name.'");</script>';
  }
/*


  echo '<div class="panel panel-body" >';
  // echo $user_name_session .' + '.$user_name;
  $subscriber_view = true;


  //include('../mag/pull_mag.php');
  //include('../submit/views/db/user_photos.php');
  echo '<h1>Your Uploaded Singles</h1>';
  //include('../submit/views/db/recent_posts.php');
  echo '</div>';
*/

  // include('../submit/views/db/dashboardpanel5.php');
  header('Location: '.HTTP);
  //include('../control/index.php');
}
?>

<?php include('../new_footer.php'); ?>



