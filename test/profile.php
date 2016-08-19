<?php
// --------- PAGE LINK --------- //
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if (isset($_GET["uid"])=='') {
	echo 'No User ID Found!';
	exit;
} else {
	$uid = $user_name = $_GET['uid'];
}
include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
$config = new Blog();
include_once(ROOT.'inc/huge.php');
$result = mysqli_query($con,"SELECT * 
FROM  `users` 
WHERE  `user_name` LIKE  '%".$uid."%'
LIMIT 1");
	while($row = mysqli_fetch_assoc($result))
	{
		$user['settings'] = $row;
		include_once(ROOT.'inc/connection.php');
		
		$result = mysqli_query($con,"SELECT * FROM  `user_profiles` WHERE  `id` =  '".$uid."' LIMIT 1");

		if($row = mysqli_fetch_assoc($result))
		{ 
			// echo 'found!';
			$user['profile'] = $row;
			$user['media']['feed'] = $config->getPostsByUser(0,24,$_GET['uid']);
			//print_r($user);
			
		} else {
			echo 'Not Found';
		}
		
	} 

			/* GET USER PROFILE DATA */
			$user['profile'] = $config->getUserData($uid);

			$meta_tag_photo = str_replace(' ', '%20', $row['image']);

			include_once(ROOT.'inc/connection.php');
			$result = mysqli_query($con,"SELECT * FROM  `images` WHERE  `user_name` = '".$_GET['uid']."' AND `type` NOT LIKE '%private%' ORDER BY `id` DESC LIMIT 10");
			$i=0;
			while($row = mysqli_fetch_assoc($result))
			  {
						$todays_date = date('Ymd_H:i');
						$id = $row['id'];
						$title = $row['title'];
						$user_name = $row['user_name'];
						$desc = $row['desc'];

						$image = $row['image'];
						$twitpic = $row['twitpic'];
						$bae_description = $row['bae_description'];
						$date = $todays_date;
						if ($bae_description==false) {
							$bae_description = $row['desc'];
						}
$tweet_bae = urlencode("[#FLVISUALS]

".$title."

--> img.FREELABEL.net/show.php?id=".$id."
".$twitpic);

						/*// ---------- DETECT MEDIA TYPES ---------- //
						if ($row['type']=='video') {
							//$media_type = $row['type'];
							$user['media'][$media_type][]['thumbnail'] =  str_replace('server/php/files/', 'server/php/files/thumbnail/', $row['image']) ; // save thumbnail
						} elseif($row['type']=='photo') {
							//$media_type = 'photo';
							$user['media'][$media_type][]['thumbnail'] =  str_replace('server/php/files/', 'server/php/files/thumbnail/', $row['image']) ; // save thumbnail
						} else {
							//$media_type = 'photo';
							//$user['media'][$media_type][]['image'] =  $row['image'] ; // save thumbnail
						}

*/




						// 2.2 Detect Media Type
						$ext_arr = explode('.', $row['image']);
						$ext_arr = array_reverse($ext_arr);
						// print_r($exit_arr);
						// exit;
						//echo 'this is a : '.$ext_arr[0].'<hr>';
						$ext = strtolower($ext_arr[0]);
						switch ($ext) {
							case 'mp4':
							$media_type = 'video';
								break;
							case 'm4v':
							$media_type = 'video';
								break;
							case 'jpg':
							$media_type = 'photo';
								break;
							case 'jpeg':
							$media_type = 'photo';
								break;
							case 'png':
							$media_type = 'photo';
								break;
							default:
								# code...
								break;
						}
						// 2.3 - SET MEDIA TYPE

						// FEATURE OVERWRITE
						if (strtolower($row['type'])=='event'){
							$media_type='event';
						} elseif(strtolower($row['type'])=='merch') {
							$media_type='merch';
						} else {
							//$media_type='merch';
						}


						// EDN
						$embed_code = '<img src="'.$image.'">';
						$content[]= $row;

						// $image[$i] =  $content[0]['image'];
						// $photo_name = $content[$i]['image'];
						$user['media'][$media_type][$i]['title'] = $row['title'];
						$user['media'][$media_type][$i]['image'] = $row['image'];
						// $user['media'][$media_type][$i]['thumbnail'] = $row['thumbnail'];
						$user['media'][$media_type][$i]['desc'] = $row['desc'];
						$user['media'][$media_type][$i]['type'] = $row['type'];
						$user['media'][$media_type][$i]['id'] = $row['id'];
						$user['media'][$media_type][$i]['thumbnail'] =  str_replace('server/php/files/', 'server/php/files/thumbnail/', $row['image']) ; // save thumbnail

						$i++;





						






			  }
			// mysqli_close($con);
			// echo "<pre>";
			// 	var_dump($user);
			// echo '</pre>';
			// exit;
			// if ($user['media']===NULL) {
			// 	echo 'No Photos Found!';
			// 	exit;
			// }
			// ---------- DISPLAY VIEW ---------- //
			//include_once(ROOT.'test/view-profile.1.0.0.php');
			include_once(ROOT.'artists/templates/photoShowcase/index.php');


		?>