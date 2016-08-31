<?php
//echo 'Testing one two three';
// --------------------------------------------- //
// ------------- FIX POST DATA ------------- //
// --------------------------------------------- //


/**
* Edit User Posts
*/
<<<<<<< HEAD
include_once('/home/content/59/13071759/html/config/index.php');
=======
include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
>>>>>>> master

class Posts
{
	function __construct()
	{
<<<<<<< HEAD
		include_once('/home/content/59/13071759/html/config/index.php');
=======
		include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
>>>>>>> master
		include(ROOT.'/inc/connection.php');
	}
	public function updateBlogPost($update) {
		include(ROOT.'/inc/connection.php');
		$sql = "UPDATE  `amrusers`.`feed` SET  `".$update['param']."` =  '".$update['title']."' WHERE  `feed`.`id` ='".$update['id']."' LIMIT 1";
		$approval_query = mysqli_query($con,$sql);
		if ($approval_query) {
			echo $update['title'];
			$update_status = $update['photo_title'];;
		} else {
			echo 'it didnt work!';
			print_r($sql);
			$update_status = false;
		}
		return $update_status;
	}
	public function updateImagePost($update) {
		include(ROOT.'/inc/connection.php');
		$sql = "UPDATE  `amrusers`.`images` SET  `".$update['param']."` =  '".$update['title']."' WHERE  `images`.`id` ='".$update['id']."' LIMIT 1";
		$approval_query = mysqli_query($con,$sql);
		if ($approval_query) {
			echo $update['title'];
			$update_status = $update['title'];;
		} else {
			echo 'it didnt work!';
			print_r($sql);
			$update_status = false;
		}
		return $update_status;
	}
}





/**
*
*/
class Photos
{

	function __construct()
	{
<<<<<<< HEAD
		include_once('/home/content/59/13071759/html/config/index.php');
=======
		include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
>>>>>>> master
		include(ROOT.'/inc/connection.php');
	}
	public function updatePhotoTitle($update) {
		include(ROOT.'/inc/connection.php');
		$sql = "UPDATE  `amrusers`.`images` SET  `title` =  '".$update['photo_title']."' WHERE  `images`.`id` ='".$update['photo_id']."' LIMIT 1";
		$approval_query = mysqli_query($con,$sql);
		if ($approval_query) {
			//echo $update['photo_title'];
			$update_status = $update['photo_title'];;
		} else {
			echo 'it didnt work!';
			print_r($sql);
			$update_status = false;
		}
		return $update_status;
	}
	public function updatePhotoDesc($update) {
		include(ROOT.'/inc/connection.php');
		$sql = "UPDATE  `amrusers`.`images` SET  `desc` =  '".$update['photo_title']."' WHERE  `images`.`id` ='".$update['photo_id']."' LIMIT 1";
		$approval_query = mysqli_query($con,$sql);
		if ($approval_query) {
			$update_status = $update['photo_title'];
		} else {
			echo 'it didnt work!';
			print_r($sql);
			$update_status = false;
		}
		return $update_status;
	}
	public function updatePhotoCaption($update) {
		include(ROOT.'/inc/connection.php');
		$sql = "UPDATE  `amrusers`.`images` SET  `caption` =  '".$update['photo_title']."' WHERE  `images`.`id` ='".$update['photo_id']."' LIMIT 1";
		$approval_query = mysqli_query($con,$sql);
		if ($approval_query) {
			$update_status = $update['photo_title'];
		} else {
			echo 'it didnt work!';
			print_r($sql);
			$update_status = false;
		}
		return $update_status;
	}
	public function updatePhotoPaypal($update) {
		include(ROOT.'/inc/connection.php');
		$sql = "UPDATE  `amrusers`.`images` SET  `paypal_url` =  '".$update['photo_title']."' WHERE  `images`.`id` ='".$update['photo_id']."' LIMIT 1";
		$approval_query = mysqli_query($con,$sql);
		if ($approval_query) {
			$update_status = $update['photo_title'];
		} else {
			echo 'it didnt work!';
			print_r($sql);
			$update_status = false;
		}
		return $update_status;
	}

	public function updatePhotoDate($update) {
		$update['photo_title'] = date('Y-m-d H:s:i', strtotime($update['photo_title']));
		include(ROOT.'/inc/connection.php');
		$sql = "UPDATE  `amrusers`.`images` SET  `date` =  '".$update['photo_title']."' WHERE  `images`.`id` ='".$update['photo_id']."' LIMIT 1";
		$approval_query = mysqli_query($con,$sql);
		if ($approval_query) {
			$update_status = $update['photo_title'];
		} else {
			echo 'it didnt work!';
			print_r($sql);
			$update_status = false;
		}
		return $update_status;
	}
	public function updatePhotoType($update) {
		include(ROOT.'/inc/connection.php');
		$sql = "UPDATE  `amrusers`.`images` SET  `type` =  '".$update['photo_title']."' WHERE  `images`.`id` ='".$update['photo_id']."' LIMIT 1";
		$approval_query = mysqli_query($con,$sql);
		if ($approval_query) {
			$update_status = $update['photo_title'];
		} else {
			echo 'it didnt work!';
			print_r($sql);
			$update_status = false;
		}
		return $update_status;
	}
	public function updatePhotoPrice($update) {
		include(ROOT.'/inc/connection.php');
		$sql = "UPDATE  `amrusers`.`images` SET  `price` =  '".$update['photo_title']."' WHERE  `images`.`id` ='".$update['photo_id']."' LIMIT 1";
		$approval_query = mysqli_query($con,$sql);
		if ($approval_query) {
			$update_status = $update['photo_title'];
		} else {
			echo 'it didnt work!';
			print_r($sql);
			$update_status = false;
		}
		return $update_status;
	}
}









/**
*  update user accounts
*/


class Account
{

	function __construct()
	{
<<<<<<< HEAD
		include_once('/home/content/59/13071759/html/config/index.php');
=======
		include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
>>>>>>> master
		include(ROOT.'/inc/connection.php');
	}

	public function updateUserEmail($update) {
		include(ROOT.'inc/huge.php');
		$sql = "UPDATE  `hugee`.`users` SET  `user_email` =  '".$update['user_title']."' WHERE  `users`.`user_id` ='".$update['user_id']."' LIMIT 1";
		$approval_query = mysqli_query($con,$sql);
		if ($approval_query) {
			$update_status = $update['user_title'];
		} else {
			// echo 'it didnt work!';

			// print_r($sql);
			$update_status = false;
		}
		return $update_status;
	}


	public function updateUserType($update) {
		include(ROOT.'inc/huge.php');
		$sql = "UPDATE  `hugee`.`users` SET  `account_type` =  '".$update['user_title']."' WHERE  `users`.`user_id` ='".$update['user_id']."' LIMIT 1";
		$approval_query = mysqli_query($con,$sql);
		if ($approval_query) {
			$update_status = $update['user_title'];
		} else {
			// echo 'it didnt work!';
			// print_r($sql);
			$update_status = false;
		}
		return $update_status;
	}

	public function updateUserNotes($update) {
		include(ROOT.'inc/huge.php');
		$sql = "UPDATE  `hugee`.`users` SET  `notes` =  '".$update['user_title']."' WHERE  `users`.`user_id` ='".$update['user_id']."' LIMIT 1";
		$approval_query = mysqli_query($con,$sql);
		if ($approval_query) {
			$update_status = $update['user_title'];
		} else {
			// echo 'it didnt work!';
			// print_r($sql);
			$update_status = false;
		}
		return $update_status;
	}

	public function updateUserData($update, $col = 'notes') {
		include(ROOT.'inc/huge.php');
		$sql = "UPDATE  `hugee`.`users` SET  `$col` =  '".$update['user_title']."' WHERE  `users`.`user_id` ='".$update['user_id']."' LIMIT 1";
		$approval_query = mysqli_query($con,$sql);
		if ($approval_query) {
			$update_status = $update['user_title'];
		} else {
			// echo 'it didnt work!';
			// print_r($sql);
			$update_status = false;
		}
		return $update_status;
	}
	 // END OF METHOD



}

/**
*
*/
class Leads
{

	function __construct()
	{
<<<<<<< HEAD
		include_once('/home/content/59/13071759/html/config/index.php');
=======
		include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
>>>>>>> master
	}
	public function updateDB($update) {
		$table = $update['db_table'];
		include(ROOT.'/inc/connection.php');
		$sql = "UPDATE  `amrusers`.`".$table."` SET  `".$update['table_col']."` =  '".$update['user_title']."' WHERE  `script`.`id` ='".$update['row_id']."' LIMIT 1";
		$approval_query = mysqli_query($con,$sql);
		if ($approval_query) {
			$update_status = $update['user_title'];
		} else {
			echo 'it didnt work!';
			print_r($update);
			echo '<hr>';
			print_r($sql);
			$update_status = false;
		}
		return $update_status;
	}
}



/**
* 
*/
class Files
{

	function __construct()
	{
<<<<<<< HEAD
		include_once('/home/content/59/13071759/html/config/index.php');
=======
		include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
>>>>>>> master
	}
	public function updateDB($update) {
		$table = $update['db_table'];
		include(ROOT.'/inc/connection.php');
		$sql = "UPDATE  `amrusers`.`".$table."` SET  `".$update['table_col']."` =  '".$update['user_title']."' WHERE  `".$table."`.`id` ='".$update['row_id']."' LIMIT 1";
		$approval_query = mysqli_query($con,$sql);
		if ($approval_query) {
			$update_status = $update['user_title'];
		} else {
			echo 'it didnt work!';
			print_r($update);
			echo '<hr>';
			print_r($sql);
			$update_status = false;
		}
		return $update_status;
	}
}



/**
*
*/
class Promos
{

	function __construct()
	{
<<<<<<< HEAD
		include_once('/home/content/59/13071759/html/config/index.php');
=======
		include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
>>>>>>> master
	}
	public function updateDB($update) {
		$table = $update['db_table'];
		include(ROOT.'/inc/connection.php');
		$sql = "UPDATE  `amrusers`.`".$table."` SET  `".$update['table_col']."` =  '".mysqli_real_escape_string($con,$update['user_title'])."' WHERE  `$table`.`id` ='".$update['row_id']."' LIMIT 1";
		$approval_query = mysqli_query($con,$sql);
		if ($approval_query) {
			$update_status = $update['user_title'];
		} else {
			echo 'it didnt work!';
			print_r($update);
			echo '<hr>';
			print_r($sql);
			$update_status = false;
		}
		return $update_status;
	}
}




/**
*
*/


class Events
{

	function __construct()
	{
<<<<<<< HEAD
		include_once('/home/content/59/13071759/html/config/index.php');
=======
		include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
>>>>>>> master
		include(ROOT.'/inc/connection.php');
	}



	function updateEvent($event_id,$action,$value) {
		if ($event_id) {
			switch ($action) {
				case 'approve':
					$approval_query = mysqli_query($con,"UPDATE `schedule` SET active=1 WHERE `schedule`.`id` = ".$event_id." LIMIT 1");
					echo "<script>alert('This Event Has Been Successfully Approved!')
						window.location.assign('http://freelabel.net/?ctrl=booking#events')
						</script>";
					break;

				case 'complete':
					$approval_query = mysqli_query($con,"UPDATE `schedule` SET active=2 WHERE `schedule`.`id` = ".$event_id." LIMIT 1");
					echo "<script>alert('This Event Has Been Successfully Completed!')
						window.location.assign('http://freelabel.net/?ctrl=booking#events')
						</script>";
					break;

				case 'archive':
					include(ROOT.'/inc/connection.php');
					$approval_query = mysqli_query($con,"UPDATE `schedule` SET active=3 WHERE `schedule`.`id` = ".$event_id." LIMIT 1");
					/*echo "<script>alert('This Event Has Been Successfully Archived!')
						window.location.assign('http://freelabel.net/submit/?ctrl=booking#events')
						</script>";*/
						echo 'Sucessfully Archived';
					break;
				case 'reschedule':
				include(ROOT.'/inc/connection.php');
				$rescheduled_date = date('Y-m-d',strtotime("+ 3 days",strtotime('now')));
					$approval_query = mysqli_query($con,"UPDATE `schedule` SET showcase_day='".$rescheduled_date." 'WHERE `schedule`.`id` = ".$event_id." LIMIT 1");
					/*echo "<script>alert('This Event Has Been Successfully Rescheduled! ".$rescheduled_date."')
						window.location.assign('http://freelabel.net/?ctrl=booking#events')
						</script>"; */
					echo 'Event has Been Rescheduled to '.date('Y-m-d',strtotime($rescheduled_date));
					break;
				case 'description':
					include(ROOT.'/inc/connection.php');
					$sql = "UPDATE  `amrusers`.`schedule` SET  `description` =  '".$value."' WHERE  `schedule`.`id` ='".$event_id."' LIMIT 1";
					$approval_query = mysqli_query($con,$sql);
					//echo '<br>now editing event descriptions!';
					break;
			}
			if ($approval_query) {
				// DO NOTHING!
				return true;

			}else {
				//echo "it didnt";
				return false;
			}

		}

	} // END OF METHOD

	function rescheduleEvent($event_id,$action,$value) {
		if ($event_id) {
			switch ($action) {
				case 'approve':
					$approval_query = mysqli_query($con,"UPDATE `schedule` SET active=1 WHERE `schedule`.`id` = ".$event_id." LIMIT 1");
					echo "<script>alert('This Event Has Been Successfully Approved!')
						window.location.assign('http://freelabel.net/?ctrl=booking#events')
						</script>";
					break;

				case 'complete':
					$approval_query = mysqli_query($con,"UPDATE `schedule` SET active=2 WHERE `schedule`.`id` = ".$event_id." LIMIT 1");
					echo "<script>alert('This Event Has Been Successfully Completed!')
						window.location.assign('http://freelabel.net/?ctrl=booking#events')
						</script>";
					break;

				case 'archive':
					$approval_query = mysqli_query($con,"UPDATE `schedule` SET active=3 WHERE `schedule`.`id` = ".$event_id." LIMIT 1");
					/*echo "<script>alert('This Event Has Been Successfully Archived!')
						window.location.assign('http://freelabel.net/submit/?ctrl=booking#events')
						</script>";*/
						echo 'Sucessfully Archived';
					break;
				case 'reschedule':
				include(ROOT.'/inc/connection.php');
				$rescheduled_date = date('Y-m-d',strtotime("+ 3 days",strtotime('now')));
					$approval_query = mysqli_query($con,"UPDATE `schedule` SET showcase_day='".$rescheduled_date." 'WHERE `schedule`.`id` = ".$event_id." LIMIT 1");
					/*echo "<script>alert('This Event Has Been Successfully Rescheduled! ".$rescheduled_date."')
						window.location.assign('http://freelabel.net/?ctrl=booking#events')
						</script>"; */
					echo 'Event has Been Rescheduled to '.date('Y-m-d',strtotime($rescheduled_date));
					break;
				case 'description':
					include(ROOT.'/inc/connection.php');
					$sql = "UPDATE  `amrusers`.`schedule` SET  `description` =  '".$value."' WHERE  `schedule`.`id` ='".$event_id."' LIMIT 1";
					$approval_query = mysqli_query($con,$sql);
					//echo '<br>now editing event descriptions!';
					break;
			}
			if ($approval_query) {
				// DO NOTHING!
				return true;

			}else {
				//echo "it didnt";
				return false;
			}

		}

	} // end of method





}






// ------------------------------------------------------------ //
// 		Update Photos
// ------------------------------------------------------------ //

if ($_POST['user_photo_id']) {
	$photos = new Photos();

	if (strpos($_POST['user_photo_id'], 'title')===0){
		$update['photo_id'] = str_replace('title-', '', $_POST['user_photo_id']) ;
		$update['photo_title'] = $_POST['title'];
		//echo 'editing TITLE: ';
		echo $photos->updatePhotoTitle($update);

	} elseif(strpos($_POST['user_photo_id'], 'desc')===0) {
		$update['photo_id'] = str_replace('desc-', '', $_POST['user_photo_id']) ;
		$update['photo_title'] = $_POST['title'];
		//echo 'editing description: ';
		echo $photos->updatePhotoDesc($update);

	} elseif(strpos($_POST['user_photo_id'], 'caption')===0) {
		$update['photo_id'] = str_replace('caption-', '', $_POST['user_photo_id']) ;
		$update['photo_title'] = $_POST['title'];
		//echo 'editing description: ';
		echo $photos->updatePhotoCaption($update);

	} elseif(strpos($_POST['user_photo_id'], 'paypal_url')===0) {
		$update['photo_id'] = str_replace('paypal_url-', '', $_POST['user_photo_id']) ;
		$update['photo_title'] = $_POST['title'];
		//echo 'editing caption: ';
		echo $photos->updatePhotoPaypal($update);

	} elseif(strpos($_POST['user_photo_id'], 'event_date')===0) {
		$update['photo_id'] = str_replace('event_date-', '', $_POST['user_photo_id']) ;
		$update['photo_title'] = $_POST['title'];
		//echo 'editing caption: ';
		echo $photos->updatePhotoDate($update);

	} elseif(strpos($_POST['user_photo_id'], 'type')===0) {
		$update['photo_id'] = str_replace('type-', '', $_POST['user_photo_id']) ;
		$update['photo_title'] = $_POST['title'];
		//echo 'editing type: ';
		echo $photos->updatePhotoType($update);

	} elseif(strpos($_POST['user_photo_id'], 'price')===0) {
		$update['photo_id'] = str_replace('price-', '', $_POST['user_photo_id']) ;
		$update['photo_title'] = $_POST['title'];
		//echo 'editing type: ';
		echo $photos->updatePhotoPrice($update);

	}
	//updatePhotoType
	 else {
		echo 'nothing going on ';
	}

// paypal_url
	//echo 'The photo: '.$update['photo_id'].' will be updated to '.$update['photo_title'];
}






// ------------------------------------------------------------ //
// 		UPDATE LEADS SCRIPT
// ------------------------------------------------------------ //

if (isset($_POST['lead_script_id'])) {

	$leads = new Leads;

	if (strpos($_POST['lead_script_id'], 'lead-script')===0){
		$arr = explode('-',str_replace('lead-script-', '', $_POST['lead_script_id']));
		$update['table_col'] =  $arr[0];
		$update['row_id'] =  $arr[1];
		//$update['row_id'] = str_replace('title-', '', $_POST['title']) ;
		$update['user_title'] = $_POST['title'];
		$update['db_table'] = 'script';

		//echo 'editing TITLE: ';
		//echo $photos->updateUserEmail($update);
		//print_r($_POST);
		//echo '<hr>';
		echo $leads->updateDB($update);
	}
	// print_r($update);
	// exit;
}



// edit file
if (isset($_POST['file'])) {
	$leads = new Files;
	// print_r($_POST);
	// parse ID
	$arr = explode('-',$_POST['id']);
	$update['table_col'] =  $arr[0];
	$update['row_id'] =  $arr[2];
	//$update['row_id'] = str_replace('title-', '', $_POST['title']) ;
	$update['user_title'] = $_POST['file'];
	$update['db_table'] = 'files';

	//echo 'editing TITLE: ';
	//echo $photos->updateUserEmail($update);
	// print_r($update);
	// exit;
	//echo '<hr>';
	echo $leads->updateDB($update);

	//print_r($update);
	//exit;
}



// edit file
if (isset($_POST['promo-file'])) {
	$leads = new Files;
	$arr = explode('-',$_POST['id']);
	$update['table_col'] =  $arr[0];
	$update['row_id'] =  $arr[2];
	//$update['row_id'] = str_replace('title-', '', $_POST['title']) ;
	$update['user_title'] = $_POST['promo-file'];
	$update['db_table'] = 'feed';
	echo $leads->updateDB($update);
}



if (isset($_POST['promo'])) {
	$leads = new Promos;
	$arr = explode('-',str_replace('promo-id-', '', $_POST['id']));
	$arr = explode('-', $_POST['id']);

	$update['table_col'] =  $arr[0];
	$update['row_id'] =  $arr[2];
	//$update['row_id'] = str_replace('title-', '', $_POST['title']) ;
	$update['user_title'] = $_POST['promo'];
	$update['db_table'] = 'images';

	echo $leads->updateDB($update);
}








// ------------------------------------------------------------ //
// 		Update Account
// ------------------------------------------------------------ //

if ($_POST['user_account_id']) {
	$photos = new Account();
	// echo 'Updating user id! <br>';
	// print_r($_POST);
	if (strpos($_POST['user_account_id'], 'email')===0){
		$update['user_id'] = str_replace('email-', '', $_POST['user_account_id']) ;
		$update['user_title'] = $_POST['title'];
		//echo 'editing Email: ';
		echo $photos->updateUserEmail($update);

	} elseif (strpos($_POST['user_account_id'], 'type')===0){
		$update['user_id'] = str_replace('type-', '', $_POST['user_account_id']) ;
		$update['user_title'] = $_POST['title'];
		//echo 'editing Type: ';
		echo $photos->updateUserType($update);

	} elseif (strpos($_POST['user_account_id'], 'notes')===0){
		$update['user_id'] = str_replace('notes-', '', $_POST['user_account_id']) ;
		$update['user_title'] = $_POST['title'];
		//echo 'editing Type: ';
		echo $photos->updateUserNotes($update);

	} elseif (strpos($_POST['user_account_id'], 'rating')===0){
		$update['user_id'] = str_replace('rating-', '', $_POST['user_account_id']) ;
		$update['user_title'] = $_POST['title'];
		//echo 'editing Type: ';
		echo $photos->updateUserData($update,'rating');

	} else {
		echo 'nothing going on ';
	}

// paypal_url
	//echo 'The photo: '.$update['photo_id'].' will be updated to '.$update['photo_title'];
}






/*
*  UPDATE IMAGE TYPE
*/
if ($_POST['action']=='photo-type-update') {
	//print_r($_POST);
	$post_id_arr = explode('-',$_POST['user_post_id']);
	// print_r($post_id);
	// echo '<hr>'.$post_id_arr[1];
	$update['id'] = $_POST['id'];
	$update['param'] = 'type';
	$update['title'] = $_POST['type'];
	//print_r($update);
	//echo $edit_param.'.'.$post_id;
	$posts = new Posts();
	$posts->updateImagePost($update);
}











/*
*  UPDATE BLOG POST
*/
if ($_POST['user_post_id']) {

	$post_id_arr = explode('-',$_POST['user_post_id']);
	// echo '<hr>'.$post_id_arr[1];
	$update['id'] = $post_id_arr[1];
	$update['param'] = $post_id_arr[0];
	$update['title'] = $_POST['title'];
	//print_r($update);
	//echo $edit_param.'.'.$post_id;
	$posts = new Posts();
	$posts->updateBlogPost($update);
}



/*
*  LIKE PHOTO
*/
if ($_POST['photo_like']) {
	print_r($_POST);
	exit;
	$post_id_arr = explode('-',$_POST['user_post_id']);
	// print_r($post_id);
	// echo '<hr>'.$post_id_arr[1];
	$update['id'] = $post_id_arr[1];
	$update['param'] = $post_id_arr[0];
	$update['title'] = $_POST['title'];
	//print_r($update);
	//echo $edit_param.'.'.$post_id;
	$posts = new Posts();
	$posts->updateBlogPost($update);
}




if (isset($_POST['formdata'])) {
	$_POST['event_id'] = $_POST['formdata'][0]['value'];
	$_POST['event_action'] = $_POST['formdata'][1]['value'];
}


// ------------------------------------------------------------ //
// 		Update Event
// ------------------------------------------------------------ //

if ($_POST['value']!='' AND $_POST['event_description_id']!='') {

	if ($_POST['event_description_id']) {
		$action = 'description';
		$event_id = str_replace('event_desc_', '', $_POST['event_description_id']);
		$update = new Events();
		if ($update->updateEvent($event_id, $action, $_POST['value'])) {
			echo $_POST['value'];
		} else {
			echo 'There was an error, please refresh the page.';
		}
		//echo 'Updating Event Description for '.$event_id;

	} else {
		echo 'Not Detected!';
	}
}




// ------------------------------------------------------------ //
// 		Approve Event
// ------------------------------------------------------------ //

if ($_POST['event_id']!='' AND $_POST['event_action']!='') {

	switch ($_POST['event_action']) {
		case 'reschedule':
		// ------------------------------------------------------------ //
		// 		Rescheudle Event
		// ------------------------------------------------------------ //

			$action = $_POST['event_action'];
			$event_id = $_POST['event_id'];
			$update = new Events();
			if ($update->rescheduleEvent($event_id, $action, $_POST['value'])) {
				echo $_POST['value'];
			} else {
				echo 'There was an error, please refresh the page.';
			}
			break;


		case 'archive':
			// ------------------------------------------------------------ //
			// 		Archive Event
			// ------------------------------------------------------------ //

			$action = $_POST['event_action'];
			$event_id = $_POST['event_id'];
			$update = new Events();
			if ($update->updateEvent($event_id, $action, $_POST['value'])) {
				//echo 'Updated: '.$_POST['event_id'];
			} else {
				echo 'There was an error, please refresh the page.';
			}
			break;

		default:
			echo 'Not Detected!';
			print_r($_POST['event_action']);
			exit;
			break;
	}

		//echo 'Updating Event Description for '.$event_id;


}





include(ROOT.'inc/connection.php');

// APPROVE SUBMISSION
$submission_id = $_POST['submission_id'];
if ($submission_id) {
	$approval_query = mysqli_query($con,"UPDATE `feed` SET approved=1 WHERE `feed`.`id` = ".$submission_id." LIMIT 1");
	if ($approval_query) {

	// 	/* add to radio */
		include(ROOT.'config/upload.php'); 
		$upload = new Upload();
		$file = str_replace('http://freelabel.net/', ROOT, $_POST['radio_mp3']);
		print_r($_POST);
		print_r($file);
		$res = $upload->uploadToRadio($file , $_POST['radio_twitter'] , $_POST['radio_title'], $_POST['radio_user']);
		if ($res) {
			echo 'The file successfuly uploaded to the radio!! ';
		} else {
			echo 'The file did not upload to the radio!';
		}
	// 	/* throw success message */
	echo "This Submission Has Been Successfully APPROVED!";

	} else {
		echo "it didnt";
	}

}



// ADD TO LEADS
if (isset($_POST['lead_twitter']) && isset($_POST['lead_name']))
{
	$lead_twitter=$_POST['lead_twitter'];
	$lead_name=$_POST['lead_name'];
	$lead_name = str_replace("'", '', $lead_name);
	$entry_date= date('Y-m-d H:i', strtotime($_POST['entry_date']) );
	$follow_up_date= date('Y-m-d', strtotime($_POST['follow_up_date']) );
	//echo 'ENTRY: '.$_POST['entry_date'] . ' - AFTER: '.$entry_date;
	//echo 'ENTRY: '.$_POST['follow_up_date'];
	//exit;
	$lead_email = $_POST['lead_email'];
	$sql="INSERT INTO leads (user_name, lead_name, lead_twitter, follow_up_date, entry_date, lead_phone, lead_email) VALUES ('admin','$lead_name','$lead_twitter','$follow_up_date','$entry_date','','$lead_email')";
	$addToLeadQuery = mysqli_query($con,$sql);
	if ($addToLeadQuery) {
		echo 'Lead Added Successfully';
		//print_r($_POST);
		/*echo "
		<script>
			//sendEmail('manage.amrecords@gmail.com','NEW LEAD: ".substr($lead_name,0,12)."...', '<a href=\"http://freelabel.net/ctrl=lds\">Click Here To Check This Lead Out</a>', '#main_content', 'admin');
			//alert('This Lead Has Been Successfully Added!')
			//window.location.assign('http://freelabel.net/');
		</script>";*/


	}else {
		print_r($sql);
		echo " <br><br>The Lead Didnt Insert!";
	}

} else {
	//echo 'No Leads Data Found Insert';
}




// APPROVE LEAD
$lead_id = $_POST['lead_id'];
$approval_follow_up = $_POST['approval_follow_up'];
$approval_action = $_POST['approval_action'];
$lead_desc = $_POST['lead_desc'];

if (isset($lead_id) && isset($approval_follow_up)) {
	$approval_query = mysqli_query($con,"UPDATE `leads` SET approved=".$approval_action." WHERE `leads`.`id` = ".$lead_id." LIMIT 1");
	if ($approval_query) {

		echo "<script>
				alert('This Lead Has Been Successfully FOLLOWED UP WITH!')
				window.open('".$approval_follow_up."');
				window.location.assign('http://freelabel.net/?ctrl=sales#leads')
				//window.open('http://m.twitter.com/messages/')
				</script>";


	}else {
		echo "it didnt approve";
	}
} elseif($lead_id && $lead_desc) {
	$lead_edit_query = mysqli_query($con,"UPDATE `leads` SET `lead_name`=".$lead_desc." WHERE `leads`.`id` = ".$lead_id." LIMIT 1");
	if ($lead_edit_query) {
		echo "Lead Desc Updated!";
		echo "<script>
				alert('This Lead Has Been Successfully Updated!')
				window.open('".$approval_follow_up."');
				window.location.assign('http://freelabel.net/submit/?control=sales#leads')
				//window.open('http://m.twitter.com/messages/')
				</script>";


	}else {
		echo "It didnt update the description. Lead id: " .$lead_id.'and Lead Desc: '.$lead_desc ;
	}
}






?>
