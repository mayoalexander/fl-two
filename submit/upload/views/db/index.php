<?php 
// DETECT USER
if (isset($_SESSION)) {
	//$user_name = $_SESSION['user_name'];
	//$user_name_session = $_SESSION['user_name'];
} else { 
	// NO USER NAME SET!!!
}
if (file_exists('../../config/index.php')) {
	include_once('../../config/index.php');
} elseif(file_exists('../config/index.php')) {
	include_once('../config/index.php');
}elseif(file_exists('config/index.php')) {
	include_once('config/index.php');
}

$track_num = 0;
//echo 'user name ='.$user_name_session;
//$user_name_session;
include_once(ROOT.'inc/connection.php');
$sql ="SELECT * 
FROM  `user_subscribers` 
WHERE  `user_name` LIKE CONVERT( _utf8 '%".strtolower($user_name_session)."%'
USING latin1 ) 
COLLATE latin1_swedish_ci
LIMIT 1";
$result = mysqli_query($con,$sql);
if ($row = mysqli_fetch_assoc($result)) {
	// Check if Subscriber Email Exists in User Database
	// 
	$subscriber_email  = $row['email'];
	$sql ="SELECT * 
FROM  `users` 
WHERE  `user_email` LIKE  '%$subscriber_email%'
LIMIT 1";
	$result = mysqli_query($con,$sql);
	if ($row = mysqli_fetch_assoc($result)) {
		//echo 'profile exists!';
		//echo '<pre>';
			//print_r($row);
		//echo '</pre>';
		$profile_status = true;
	} else {
		$profile_status = false;
	}

	if ($profile_status==0) {
		$notifications[] = '<p class="alert alert-danger" >You\'ll need to create an artist/brand account for Website, Campaign Stats, and Payout Management.<br><button class="btn btn-default btn-xs" onclick="editProfile(\''.$user_name_session.'\',\''.$subscriber_email.'\')">Edit Profile</button></p>';
	} else {
		$notifications[] = '<strong>Status:</strong> Active';
	}

	$getProfileData == false;
} else {
	$debug[] = 'did not find in subscribers';
	$getProfileData == true;
}



	/* -----------------------------------------------------------------------------------------------------
	SHOW SAVED TEMPLATES
	----------------------------------------------------------------------------------------------------------*/
	if ($getProfileData==true) {
		include(ROOT. 'inc/connection.php');
		$query = "SELECT * FROM  `users` WHERE 
		`user_name` LIKE '%$user_name%'
		OR `user_name` LIKE '%$user_name%'
		LIMIT 1";
		$result = mysqli_query($con,$query);
		$i = 0;
		while($row = mysqli_fetch_array($result))
		{
			$found_user_in_database==true; 
			foreach ($row as $key => $param) {
				if (is_numeric($key)==false) {
					$user_profile_data[$key] = $param;	
					$i++;
				}
			}
			$text = $row['text'];
			$date_created = $row['date_created'];
			$id = $row['user_id'];
			$user_pic = $row['photo'];
			$user_name = $row['user_name'];
			$user_type = $row['account_type'];
			$user_email = $row['user_email'];
			$user_balance = $row['user_balance'];
			$user_pic_http = 'http://submit.freelabel.net/'.$row['photo'];
		
			$showcaseschedule = $row['showsched'];
			$showcaseschedule2 = $row['showsched2'];
			$showcaseschedule3 = $row['showsched3'];
			$showcaseschedule4 = $row['showsched4'];
			$query = "SELECT * FROM  `user_profiles` WHERE  `id` LIKE  '%$user_name%' ORDER by `id` DESC LIMIT 1";
						include(ROOT.'inc/connection.php');
						$result = mysqli_query($con,$query);
						while($row = mysqli_fetch_array($result))
						{
							foreach ($row as $key => $param) {
								if (is_numeric($key)==false) {
										$user_profile_info[$key] = $param;	
									$i++;		
								}
							}
							$profile_status = $row['active'];
							$name 					= $row['name'];
							$twitter 				= $row['twitter'];
							$user_twitter 			= $twitter;
							$profile_twitter 		= $row['twitter'];
							$profile_id				= $row['id'];
							$location 				= $row['location'];
							$description 			= $row['description'];
							$photo 					= $row['photo'];
							$date_created 			= $row['date_created'];
							
							// Check if Singles are Uplaoded
													include(ROOT.'inc/connection.php');
													$result_count = mysqli_query($con,"SELECT * 
														FROM  `blog` 
														WHERE  `user_name` LIKE  '%".$user_name."%'");
													$result_count = mysqli_fetch_array($result_count);
													$num_of_total_songs = count($result_count);

													include(ROOT.'inc/connection.php');
													$result3 = mysqli_query($con,"SELECT * 
														FROM  `blog` 
														WHERE  `user_name` LIKE  '%".$user_name."%'
														ORDER BY `id` DESC
														LIMIT 5");
														while($row3 = mysqli_fetch_array($result3))
														  {
														  	foreach ($row3 as $key => $param) {
																if (is_numeric($key)==false) {
																		$user_media_base[$track_num][$key] = $param;			
																}
															}
															$track_num++;
															$profile_name 		= 		$row3['id'];
															$profile_twitter 	= 		$row3['twitter'];
															$profile_twitter_noat 	= 		str_replace('@', '', $profile_twitter);
															$profile_phone	 	= 		$row3['phone'];
															$profile_trackname	 	= 		$row3['trackname']; 
															$playerpath	 	= 		$row3['playerpath']; 
															//$profile_phone 		= 		"(".substr($profile_phone, 0, 3).") ".substr($profile_phone, 3, 3)."-".substr($profile_phone,6);
															//$submitted_tracks_status ='<a href="http://freelabel.net/x/'.strtolower($profile_twitter).'" class="btn btn-warning btn-xs" target="_blank">WE GOT TRACKS!!!</a>';
														} 
															$new_compiled_data = array_merge($user_profile_info, array("media"=>$user_media_base));
															//echo "<br><br><pre>";
															//print_r($new_compiled_data['media'][0]['trackname']);
															//echo "</pre>";


						}
			

			$int++;
			if ($date_created == $fivedaysback) {
				//echo "<script>x('".$text."');</script>";
			}
			
		} // ------- END OF WHILE ------- //
		$main_landing = 'submit/views/db/recent_posts.php';
	} else {
		$main_landing = 'mag/pull_mag.php';
	}
	

