<?php 
  $db = new UserDashboard($_SESSION);
  $config = new Blog($_SERVER['HTTP_HOST']);

  // 
  // $user = $db->getUserData($site['user']['name']);
  $user = $config->getUserData($site['user']['name']);

  // $tracks = $config->getPostsByUser(0, 300, $site['user']['name']);
  // var_dump($user);
  if ($user===null) {

  	// echo 'no profile found, show thingy';
  	echo '<header class="container">';
      echo '<h1 class="page-title">You need to finish completing your profile!</h1>';
      include_once(ROOT.'users/application/views/dashboard/account.php');
      // include_once(ROOT.'submit/views/db/campaign_info.php');
    echo '</header>';

  } else {
  	echo 'user found!';
    echo '<script>window.location.assign("http://freelabel.net/users/dashboard/");</script>';
  }

 ?>