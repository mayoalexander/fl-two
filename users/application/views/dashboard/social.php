<?php


/* GET FACEBOOK DATA */
// $login_model = $this->loadModel('Login');
$facebook = new Facebook(array('appId'  => FACEBOOK_LOGIN_APP_ID, 'secret' => FACEBOOK_LOGIN_APP_SECRET));

$facebook_user_data = $facebook->api('/me?fields=email,name,picture,link,website,id');
$facebook_user_id = $facebook_user_data['id'];
$facebook_user_feed = $facebook->api('/'.$facebook_user_id.'/feed');

$profile_photo = $facebook_user_data['picture']['data']['url'];
$profile_user_name = $facebook_user_data['name'];
?>

<style type="text/css">
	.social-container {
		text-align: center;
	}
</style>
<div class="container social-container">
	<?php
	 echo '<img src="'.$profile_photo.'" class="img-circle" style="width:50px;"><br>'.$profile_user_name;
	 print_r($facebook_user_feed);
	 print_r($facebook_user_id);
	?>
</div>