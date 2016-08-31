<?php 
session_start();
  if ($user_name == false) {
    $user_name = $_POST['user_name'];
    $user_name_session = $_POST['user_name'];
  }
<<<<<<< HEAD
include_once('/home/content/59/13071759/html/config/index.php');
=======
include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
>>>>>>> master
  if($user_name_session=='') {
  if ($_POST['user_name']!='') {
    $user_name_session = $_POST['user_name'];
	  
	  
  } elseif ($_SESSION['user_name']!='') {
    $user_name_session = $_SESSION['user_name'];
  }
} else {
  $user_name_session = $_SESSION['user_name'];
}

/* 
	<a href="#add" id="addMorePhotos" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-plus"></span> - Add Photos</a>
	<a href="#clients" onclick="loadPage('http://freelabel.net/submit/views/db/user_photos.php?control=photos', '#main_display_panel', 'dashboard', '<?php echo $user_name_session; ?>')" class="btn btn-default btn-xs"><span class="fa fa-eye"></span> - All</a>
*/

$db = new UserDashboard($user_name_session);
$user_upload_options = $db->getUserUploadOptions($user_name_session);

$user_photos = new Blog();
$user_photos_arr = $user_photos->getPhotosByUser($user_name_session, 100);
$i=0;
if ($user_photos_arr!='') {
	foreach ($user_photos_arr as $value) {
		
		$desc_tags = explode(',', $value['desc']);
		foreach ($desc_tags as $value) {
			$categories[$value] = 1;
		}

		$i++;
	}
	$upload_options .= '<a href="#clients" onclick="loadPage(\'http://freelabel.net/submit/views/db/user_photos.php?control=photos\', \'#main_display_panel\', \''.$key.'\', \''.$user_name_session.'\')" class="btn btn-default btn-xs"><span class="fa fa-eye"></span> - All</a>';
	foreach ($categories as $key => $album) {
		if ($key!='') {
			$upload_options .= '<a href="#clients" onclick="loadPage(\'http://freelabel.net/submit/views/db/user_photos.php?control=photos\', \'#main_display_panel\', \''.$key.'\', \''.$user_name_session.'\')" class="btn btn-default btn-xs"><span class="fa fa-tag"></span> '.$key.'</a>';
		}
	}
}


//print_r($_POST);
//print_r($_GET);



	


/* -----------------------------------------------------------------
 	1. IF SUBMITTED, UPLOAD PHOTO
	2. If no post data is set, then we will display the users uploaded photos relevant to their profile.
	3. The user will be able to view all photos in the database as long as they are public.
	4. Each user can share the photos directly to their social media.
-----------------------------------------------------------------*/
	if (isset($_POST['submit'])) {	
	//echo 'stat the upload';

	$todays_date = date('Ymd_H:i');
	$id = $_POST['id'];
	$user_name = $_POST['user_name'];
	$title = $_POST['title'];
	$desc = $_POST['desc'];
	$location	=	$_POST['location'];
	$date = $todays_date;
	
	switch ($location) {
		case 'main gallery':
			$desc = $desc." - ".$location;
			break;
		case 'wcw':
			$desc = $desc." - ".$location;
			break;
		case 'top5':
			$desc = $desc." - ".$location;
			break;
		case 'botm':
			$desc = $desc." - ".$location;
			break;
		case 'bae_advertisement':
			$desc = $desc." - ".$location;
			break;
		case 'bae_events':
			$desc = $desc." - ".$location;
			break;
		case 'front_page':
			$desc = $desc." - ".$location;
			break;
		
		default:
			// not sure yet
			break;
	}
	if (isset($location)) {
		$desc = 'uncategorized '.$desc;
	}



$file_title 	=	$todays_date.' -'.$title;
$tmp_name = $_FILES['photo']['tmp_name'];
$size = $_FILES['photo']['size'];
$saved_photo_path_direct	= 	"../../uploads/".$file_title.'.jpg';
$saved_photo_path_http		= 	str_replace('../../', 'http://freelabel.net/submit/', $saved_photo_path_direct);
$submission_date = date('Y-m-d H:i');


	if (isset($tmp_name) && move_uploaded_file($tmp_name,$saved_photo_path_direct)) {
		//echo '<a href="'.$saved_photo_path_http.'">';
		//echo $saved_photo_path_http;
		//echo '</a>';
		include(ROOT.'inc/connection.php');
								// Insert into database
								$sql="INSERT INTO  `amrusers`.`images` (`id` ,`user_name` ,`title` ,`desc` ,`image`,`date`)
									VALUES ('$id','$user_name', '$title' , '$desc', '$saved_photo_path_http', '$date'
									);";
								if (mysqli_query($con,$sql)) { 
									header("Location: http://freelabel.net/?ctrl=pics");
								} else {
								  	echo "Error creating database entry: " . mysqli_error($con);
								}
	
	} else {
		//echo "file saving didnt work.. we'll try with ".$_POST['filepath'] .' being saved to '.$saved_photo_path_direct;
		// Insert into database
		include(ROOT.'inc/connection.php');
		$sql="INSERT INTO  `amrusers`.`images` (`id` ,`user_name` ,`title` ,`desc` ,`image`,`date`)
			VALUES ('$id','$user_name', '$title' , '$desc', '".$_POST['filepath']."', '$date'
			);";
		if (mysqli_query($con,$sql)) { 
			echo '<div class="alert alert-success" >';
			echo '<h2>Added to profile!<h2>';
			echo '<a href="http://freelabel.net/?ctrl=pics" class="btn btn-primary">Go To Photos</a>';
			echo '</div>';
			//echo '<script>window.open("");</script>';
		} else {
		  	echo "Error creating database entry: " . mysqli_error($con);
		}









	}
	exit;
} else {


		if ($user_name_session == 'chuk' 
			OR $user_name_session == 'BaeWatchFL'
			OR $user_name_session == 'admin'
			) {
				$chuk_form = '
				<label class="label label-success">Location:</label>
				<select name="location" class="form-control" >
					<option value="" selected>Select One..</option>
					<option value="bae_top5">TOP 5</option>
					<option value="bae_wcw">Women Crush Wednesday</option>
					<option value="bae_botm">Bae Of The Month</option>
					<option value="bae_advertisement">Advertisement</option>
					<option value="bae_events">Events</option>
					<!--
					<option value="front_page">Front Page</option>
					<option value="main gallery">Main Gallery Archive</option>
					-->
				</select>
				<label class="label label-success">Location:</label>
				<select name="view_status"  id="desc" class="form-control" >
					<option value="public" selected>Public</option>
					<option value="private">Private</option>
				</select>
				';
		} else {
			$chuk_form;
		}
		$picture_form = '
		<div id="photo_uploader_form" class="panel " style="display:none;">
		<h1 class="panel-heading">Add New Photos</h1>
			<form method="POST" action="http://freelabel.net/submit/views/db/user_photos.php" enctype="multipart/form-data" class="panel-body">
			<label class="label label-success">Photo:</label>
				<input type="file" name="photo" class="form-control" multiple required ><br><br>
			<label class="label label-success">Title:</label>
				<input type="text" name="title" placeholder="Enter Title" class="form-control" required>
			<label class="label label-success">Description:</label>
				<textarea name="desc" placeholder="Enter Description" class="form-control" required></textarea>
				<br><!-- TEMP; DELETE AFTER FIXING UPLOADER -->
				<input type="hidden" name="user_name" value="'.$user_name.'">
				'.$chuk_form.'
				<hr>
				<input type="submit" name="submit" value="Upload Photo" class="btn btn-primary" >
			</form>
		</div>';
	echo $picture_form;
	//include('photos/index.php');
}
?>
<panel class="col-md-2">
	<?php echo $user_upload_options; ?>
	<?php echo $upload_options; ?>
</panel>




<panel class="col-md-10" style='height:90vh;overflow-y:scroll;'>


<a name="recent_post_wrapper"></a>
<style>
	#featured_uploaded_image {
		width:100%;
		border-radius:5px;
	}
	.featured_uploaded_image_wrap {
		vertical-align:top;
		margin:1% auto;
		display:inline-block;
		text-align:left;
		width:32%;
		min-height:40%;
		color:#fff;
		text-shadow:1px 1px 7px #000;
		background-size: 100% auto;
		background-position:center; 
		border-radius:5px;
		font-size: 80%;
		padding:1%;
	}
	#joinbutton {
		background-color:#e3e3e3;
		color:#303030;
		padding:5%;
		opacity:0.9;
		margin:2%;
	}
	.file-options-advanced {
		display:none;
	}
	.input_fields {
		display:inline-block;
		margin:1% 1%;
		background-color:#303030;
		color:#e3e3e3;
		padding:2%;
		font-size:200%;
		width:90%;
	}
	#bae_photo {
		width:100%;
		max-width: 100%;

		//box-shadow: 0px 0px 50px 23px;
	}
	#panel_2 {
		//height:600px;
		//overflow-y:scroll;
	}
	.image-controls {
		position: absolute;
		top:0px;
		//bottom:50px;
		border-top:1px red solid;
		display:block;
		//background-color:#101010;
		opacity:0.5;
		width:100%;
		//height:inherit;
		transition:opacity 0.5s;
		overflow-y:scroll;
		padding:2%;
		background-color: #101010;

	}
	.photo-details {
		background-color: rbga(0,0,0,0.8);
		width:100%;
		padding:2%;
		background-color: #101010;

	}
	.image-controls:hover {
		opacity:0.9;
	}
	.panel_2 .col-md-4 div {
		padding-left: 0;
		padding-right: 0;
	}
	.photo-panel {
	  padding-left: 0;
	  padding-right: 0;
	  height: 350px;
	  margin-bottom:0;
	  background-size: 300%;
	}
	.bae_photo {
		margin-left:0;
		margin-right:0;
		padding:0;
		height:70vh;
		//width:300px;
	}
	.edit input , .edit {
		color:#e3e3e3;
	}
	.marketing .row .col-md-4 {
		margin-bottom: 0px;
	}
	.update_photo_form {
		border-top-left-radius: 0;
		border-top-right-radius: 0;
	}
	.update_photo_form input , .update_photo_form select , .update_photo_form textarea {
		width:80%;
		display:block;
	}
	.form-control select {
		border-radius:0;
	}
	.photo-panel {
		border:red solid 1px;
		padding:0;
		overflow-y:scroll;
	}
	.image-controls .edit input , .image-controls .edit textarea {
		background-color:transparent;
		border-right:3px red solid;
		border-bottom:3px red solid;
		//min-height:100px;
		width: 100%;
	}
	.image-controls label {
		color:red;
		text-decoration: underline;
	}
	.photo-details {
		display:none;
	}
	@media (min-device-width : 170px) 
	and (max-device-width : 990px) {
		.go_full_screen_mobile, #go_full_screen_mobile {
		  width:100%;
	  	  padding: 0;
		}
		.image-controls p {
			opacity:0;
		}
	}
</style>
<?php 		// back to profile just in case we diceide to have antoher naviation button to the MUSIC or SINGELS menu
			//echo '<a href="#clients" onclick="loadPage(\'http://freelabel.net/submit/views/db/recent_posts.php\', \'#main_display_panel\', \'dashboard\', \''.$user_name_session.'\')" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-arrow"></span> - Back To Profile</a>';

	switch ($user_name_xsession) {
		case 'admin':
			echo '
			
			<a href="#clients" onclick="loadPage(\'http://freelabel.net/submit/views/db/user_photos.php?control=photos&view=campaign#photos\', \'#main_display_panel\', \'dashboard\', \''.$user_name_session.'\')" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-calendar"></span> - Campaigns</a>
			<a href="#clients" onclick="loadPage(\'http://freelabel.net/submit/views/db/user_photos.php?control=photos&view=baewatch#photos\', \'#main_display_panel\', \'dashboard\', \''.$user_name_session.'\')" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-calendar"></span> - Baewatch</a>
			<a href="#clients" onclick="loadPage(\'http://freelabel.net/submit/views/db/user_photos.php?control=photos&view=bbb#photos\', \'#main_display_panel\', \'dashboard\', \''.$user_name_session.'\')" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-calendar"></span> - Studio</a>
			<a href="#clients" onclick="loadPage(\'http://freelabel.net/submit/views/db/user_photos.php?control=photos&view=advertise#photos\', \'#main_display_panel\', \'dashboard\', \''.$user_name_session.'\')" class="btn btn-default btn-xs"><span class="fa fa-horn"></span> - Ads</a>
			<a href="#clients" onclick="loadPage(\'http://freelabel.net/submit/views/db/user_photos.php?control=photos&view=photo upload#photos\', \'#main_display_panel\', \'dashboard\', \''.$user_name_session.'\')" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-calendar"></span> - Clients</a>
			';

				/*

				<a href="#clients" onclick="loadPage(\'http://freelabel.net/submit/views/db/user_photos.php?control=photos&view=xxxfl#photos\', \'#main_display_panel\', \'dashboard\', \''.$user_name_session.'\')" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-calendar"></span> - XXXFL</a>

				<a class='btn btn-warning btn-xs' href='http://freelabel.net/submit/?control=photos&view=xxxfl#photos'>XXXFL</a>
				<a class='btn btn-warning btn-xs' href='http://freelabel.net/submit/?control=photos&view=campaign#photos'>Campaigns</a>
				<a class='btn btn-warning btn-xs' href='http://freelabel.net/submit/?control=photos&view=baewatch#photos'>Baewatch</a>
				<a class='btn btn-warning btn-xs' href='http://freelabel.net/submit/?control=photos&view=bbb#photos'>Studio</a>
				<a class='btn btn-warning btn-xs' onclick='loadPage('http://freelabel.net/submit/?control=photos&view=clients#photos' , 'dashboard_panel_view')'>Clients</a> 
			";*/
			break;
		case 'chuk':
					echo "
				<a class='btn btn-warning btn-xs' href='http://freelabel.net/submit/?control=photos&view=wcw#photos'>Wcw</a>
				<a class='btn btn-warning btn-xs' href='http://freelabel.net/submit/?control=photos&view=event#photos'>Events</a>
				<a class='btn btn-warning btn-xs' href='http://freelabel.net/submit/?control=photos&view=botm#photos'>Bae Of The Month</a>
				<a class='btn btn-warning btn-xs' href='http://freelabel.net/submit/?control=photos&view=front_page#photos'>front_page</a>
				<a class='btn btn-warning btn-xs' href='http://freelabel.net/submit/?control=photos&view=bbb#photos'>Studio</a>
				<a class='btn btn-warning btn-xs' href='http://freelabel.net/submit/?control=photos&view=magazine#photos'>Magazine Pages</a>
				<a class='btn btn-warning btn-xs' href='http://freelabel.net/submit/?control=photos&view=bae_advertise#photos'>BaeWatch Advertise</a>
			";

			break;
		default:
		/*echo "
				<a class='btn btn-default btn-xs' href='http://freelabel.net/submit/?control=photos&view=artist flyer#photos'>Artist Flyers</a>
				<a class='btn btn-default btn-xs' href='http://freelabel.net/submit/?control=photos&view=event#photos'>Events</a>
				<a class='btn btn-default btn-xs' href='http://freelabel.net/submit/?control=photos&view=magazine-spreads#photos'>Magazine Pages</a>
			";*/
			break;
	}



	?>


<!--
	<a href="#clients" onclick="loadPage('http://freelabel.net/submit/views/db/user_photos.php?control=photos&view=advertise#photos', '#main_display_panel', 'dashboard', '<?php //echo $user_name_session; ?>')" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-alert"></span> - Campaigns</a>
	<a href="#clients" onclick="loadPage('http://freelabel.net/submit/views/db/user_photos.php?control=photos&view=photography#photos', '#main_display_panel', 'dashboard', '<?php //echo $user_name_session; ?>')" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-alert"></span> - Photography</a>
	<a href="#clients" onclick="loadPage('http://freelabel.net/submit/views/db/user_photos.php?control=photos&view=event#photos', '#main_display_panel', 'dashboard', '<?php //echo $user_name_session; ?>')" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-calendar"></span> - Events</a>
	<a href="#clients" onclick="loadPage('http://freelabel.net/submit/views/db/user_photos.php?control=photos&view=magazine-spreads#photos', '#main_display_panel', 'dashboard', '<?php //echo $user_name_session; ?>')" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-book"></span> - Magazine Page Designs</a>
-->
	<hr class='featurette-divider'>
<div id="panel_2" >
	<?php


	// DISPLAY ALL UPLOADED PHOTOS BY USER!
		include(ROOT.'inc/connection.php');	
		include(ROOT.'submit/views/db/thumbnail.php');
		if (isset($_GET['view'])) {
			$search_query = $_GET['view'];
			$result = mysqli_query($con,"SELECT * FROM images WHERE 
					`desc` LIKE '%$search_query%'
					OR `title` LIKE '%$search_query%'
					ORDER BY `id` DESC LIMIT 52");
		}elseif($_POST['page']==='dashboard') {
			$tag = $_POST['page'];
			$sql = "SELECT * FROM images WHERE user_name='".$user_name_session."' ORDER BY `id` DESC LIMIT 200";
			$result = mysqli_query($con,$sql);
		}elseif($_POST['page']) {
			$tag = $_POST['page'];
			$sql = "SELECT * FROM images WHERE user_name='".$user_name_session."' AND `desc` LIKE '%$tag%' ORDER BY `id` DESC LIMIT 200";
			$result = mysqli_query($con,$sql);
		} else {
			//$sql = "SELECT * FROM images WHERE user_name='".$_SESSION['user_name']."' ORDER BY `id` DESC LIMIT ".rand(0,24).",12";
			//$result = mysqli_query($con,$sql);

			$sql = "SELECT * FROM images WHERE user_name='".$user_name_session."' ORDER BY `id` DESC LIMIT 40";
			$result = mysqli_query($con,$sql);
		}
 //echo 'current view: '.$_GET['view'] .' ' .$sql;


								if(mysqli_num_rows($result)!=0 && $result) { // IF RESULT IS TRUE
									//echo 'what the hell bro<pre>';
									//echo $_GET['view'];
									//print_r($sql);
									//echo '<hr>';

									while($row = mysqli_fetch_array($result))
																  {
														//print_r($row);

														
														$photo = $row;  	

														$todays_date = date('Ymd_H:i');
														$id = $row['id'];
														$title = $row['title'];
														$desc = $row['desc'];
														$image = $row['image'];
														$status = $row['status'];
														$twitpic = $row['twitpic'];
														$date = $todays_date;
														if (strpos(strtolower($photo['type']), 'event')===0) {
															$view_image_link = 'http://freelabel.net/events/'.$id;
														} else {
															$view_image_link = 'http://freelabel.net/images/'.$id;
														}
														$make_image_public_checkbox = "
														<form class='input-group' style='display:inline-block;' >
															<select class='form-control make_image_public_input' >
																<option>Public</option>
																<option>Private</option>
															</select>
															<span onclick='save_changes(".$id.")' id='save_changes_' class='btn btn-warning btn-xs input-group-addon' style='color:#fff;' >Save Changes?</span>
														</form>
														";

														// Detect File Type
														if (strpos(strtolower($image), 'mp4') OR strpos(strtolower($image), 'm4v') OR strpos(strtolower($image), 'mov') ) {
															$type='video';
														} elseif(strpos(strtolower($image), 'png') OR strpos(strtolower($image), 'jpeg') OR strpos(strtolower($image), 'jpg') OR strpos(strtolower($image), 'gif') ) {
															$type='image';
														} elseif(strpos(strtolower($image), 'mp3') OR strpos(strtolower($image), 'wav') ) {
															$type='audio';
														} else {
															$type='Undetected!';
														}

														switch ($type) {
															case 'image':
																	//echo 'THISIMAGE '.$image;
																	if ($image !='') {
																		$tnl = createThumb($image);
																		$media_embed = "<img id='bae_photo' src='".$tnl."' alt='".$tnl."'>";
																	};
																	//echo 'THIS '.$tnl;
																break;
															case 'video':
																	if ($image !='') {
																		$tnl = createThumbnail($image);
																		$media_embed = "<video id='bae_photo' controls preload='metadata' src='".$tnl."' alt='".$tnl."'>";
																	};
																break;
															case 'audio':
																	if ($image !='') {
																		//$tnl = createThumbnail($image);
																		$media_embed = "<video id='bae_photo' controls preload='metadata' src='".$image."' alt='".$image."'>";
																	};
																break;
															
															default:
																//$media_embed = "<audio id='bae_photo' controls preload='metadata' src='".$image."' alt='".$tnl."'>";
																echo 'File type not recognized! ['.$image.']';
																break;
														}
														
														if (strtolower($row['type'])=='event') {
															$sel_e = 'selected';
														} elseif (strtolower($row['type'])=='merch') {
															$sel_m = 'selected';
														} elseif (strtolower($row['type'])=='gallery') {
															$sel_g = 'selected';
														} else {
															$sel_n = 'selected';
														}

														//if ($status == )
														$private_select_option	= '';
														$public_select_option	= '';
														switch ($status) {
															case 0:
																$status_button = "
																<form id='delete_form_".$id."' class='edit_photo_form' method='POST' style='display:inline;' action='http://freelabel.net/submit/update.php' >
																<input name='lead_id' type='hidden' value='".$id."'>
																<input name='approval_follow_up' type='hidden' value='".$approval_follow_up."'>
																<input name='approval_action' type='hidden' value='3'>
																</form>
																<button id='status_button_".$id."' onhover='changeStatusText(".$id.")' onclick='followUpLead(".$id.")' class='btn btn-warning btn-xs'>Currently Private<span class='glyphicon glyphicon-refresh' style='font-size:100%;padding:1%;' ></span>
																</button>";
																
																$private_select_option = 'selected';
																break;
															case 1:
																$public_select_option = 'selected';
																break;
															
															default:
																echo 'There was an error..';
																break;
														}




														$make_image_public_checkbox = $make_image_public_checkbox;
																	
														// ----------------------------------------------------------------------
														// ----- DISPLAY USER PHOTOS 
														// ---------------------------------------------------------------------- 
														//$embed_code = '<img src="'.$image.'" width="500px">';
																	//echo 'type: '.$type;
																	if ($type=='image' OR $type=='video' OR $type=='audio') {
																																				$photo_block = "
																																				<a name='image".$id."'></a>
																																				<div class='col-md-4 photo-panel' id='photo_block_".$id."' style='margin-bottom:0;background-image:url(\"".$tnl."\");'>
																																						
																																						<a target='_blank' href='".$view_image_link."'>
																																							".$media_embed."
																																						</a>
																																						
																																						<div class='image-controls'>
																																							<a href='".$view_image_link."' class='btn btn-primary btn-xs' target='_blank'><span class='glyphicon glyphicon-link' ></span>View</a>
																																							<a class='btn btn-primary btn-xs edit-photo-details'><span class='glyphicon glyphicon-edit' ></span>Edit</a>
																																							<!--<button type='button' class='btn btn-primary btn-xs' onclick='showShareOptions_".$id."()'><span class='glyphicon glyphicon-edit' ></span>Edit</button>-->
																																							<button onclick='deletePhoto(".$id.")' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-trash' ></span>Delete</button>
																																							<br>
																																							<h5 id='title-".$id."' class='photo-title edit'>".$title."</h5>
																																							<span class='photo-details'>
																																								<label>Type</label>
																																								<select id='photo-type-dropdown' class='form-control' data-id='".$id."' name='type' >
																																									<option value='' ".$sel_g.">Select One..</option>
																																									<option value='Gallery' ".$sel_g.">Gallery</option>
																																									<option value='Merch' ".$sel_m.">Merch</option>
																																									<option value='Event' ".$sel_e.">Event</option>
																																								</select>
																																								<h6 id='type-".$id."' class='photo-description edit text-muted'>".$photo['type']."</h6>
																																								<label>Tags</label>
																																								<h6 id='desc-".$id."' class='photo-description edit text-muted'>".$photo['desc']."</h6>
																																								<label>Caption</label>
																																								<p id='caption-".$id."' class='photo-description edit text-muted'>".$photo['caption']."</p>
																																								<button class='btn btn-primary btn-xs file-options-advanced-button'>Advanced Options</button>
																																								<div class='file-options-advanced' >

																																									<label>Paypal URL</label>
																																									<p id='paypal_url-".$id."' class='photo-description edit text-muted'>".$photo['paypal_url']."</p>
																																									<label>Event Date</label>
																																									<p id='event_date-".$id."' class='photo-description edit text-muted'>".$photo['date']."</p>
																																									<label>Price</label><br>
																																									$<p id='price-".$id."' class='photo-description edit text-muted' style='display:inline;'>".$photo['price']."</p>
																																								
																																								</div>


																																							</span>
																																						</div>
																																						<div  id='shareBlock_".$id."'  style='display:none;' class='accordian' >
																																								
																																							<form class='panel update_photo_form' style='padding:3%;' method='POST' action='http://freelabel.net/x/update_title.php' >
																																								<select name='status' id='status' class='form-control'>
																																									<option value='1' ".$public_select_option." >Public</option>
																																									<option value='0' ".$private_select_option." >Private</option>
																																								</select>
																	
																																								<!--<label class='label label-success'>Title:</label>-->
																																									<input name='title' class='form-control' type='text' value='".$title."' >
																																								<!--<br><br><label class='label label-success'>Twitpic:</label>-->
																																									<input name='twitpic' class='form-control' type='text' value='".$twitpic."' >
																																								<!--<br><label class='label label-success'>Desc:</label>-->
																																									<textarea name='desc' class='form-control'>".$photo['desc']."</textarea>
																																								<!--<label class='label label-success'>Embed:</label>
																																									<input name='embed_code' class='form-control' type='text' value='".$embed_code."' ><br><br>-->
																																									<input name='image' class='form-control' type='text' value='".$image."' ><br>
																																									<span onclick='deleteThisPhoto(\"".$id."\")' class='btn btn-danger glyphicon glyphicon-trash' type='submit' value='Delete'></span>
																																									<br>
																																								<input type='hidden' name='type' value='image'>
																																									<input name='image_id' class='form-control' name='image_id' type='hidden' value='".$id."'>
																																								<input type='submit' value='Update' class='btn btn-primary'>
																																							</form>
																																						
																																						</div>
																																						<script>
																																								function showShareOptions_".$id."() {
																																									shareBlock=document.getElementById('shareBlock_".$id."');
																																									$('#shareBlock_".$id."').slideToggle();
																	
																																								}
																	
																																								function deletePhoto(id) {
																																									var photoBlock = $('#photo_block_' + id);
																																									if (confirm('Are you sure you want to delete this photo?')) {
																																										//alert('#photo_block_' + id);
																																											$.post('http://freelabel.net/submit/deletesingle.php' , {
																																												image_id : id
																																											}).done(function(data) {
																																												//alert(data);
																																												photoBlock.fadeOut();
																																											})
																																										} else {
																																											// do nothing
																																										}
																																									}
																																						</script>
																									
																									
																									
																																						
																																				</div>";
																	
																																				} else {
																																					//$photo_block = 'Track';
																																				}


																	echo $photo_block;
																  
																    
																  }
									} else {
										echo '<br><br><center><alert class="alert alert-warning" style="text-align:center;" >No Photos Uploaded! Click <a href="http://upload.freelabel.net/?uid='.$user_name_session.'" target="_blank" >here</a> to add photos to your FLDRIVE.</alert></center>';
									}

			mysqli_close($con);
			?>
</div>

</panel>











<script type="text/javascript" src='http://freelabel.net/js/jquery.jeditable.js'></script>
<script>

 $(document).ready(function() {

     $('.edit').editable('http://freelabel.net/submit/update.php',{
     	id   : 'user_photo_id',
     	//type    : 'textarea',
        name : 'title'
     });


 });
 $('.edit-photo-details').click(function(){
 	var photoDetailsPanel = $(this).siblings();

 	$(photoDetailsPanel[4]).toggle('fast');
 });

$( ".make_image_public_input" ).change(function() {
	//$("#save_changes_" + ).fadeIn(1000);
	// alert( "Handler for .change() called." );
});

$(document).ready(function() {
    $("#addMorePhotos").click(function() {
    	//$('#photo_uploader_form').slideToggle();
    	window.open('http://upload.freelabel.net/?uid=' + <?php echo "'".$_SESSION['user_name']."'"; ?> )
    });
});

$(function() { // ------- document ready scripts ----------- //

	$('.file-options-advanced-button').click(function(){
		if ($(this).text()=='Hide Advanced Options') {
			$(this).text('Show Advanced Options');
		} else {
			$(this).text('Hide Advanced Options');
		}
		$(this).next().show();

	});

	$('#photo-type-dropdown').change(function(){
		var status = $(this).val();
		var id = $(this).attr('data-id');
		data = 
		$.post('http://freelabel.net/submit/update.php',{
			id:id,
			action:"photo-type-update",
			type:status
		},function(data){
			alert(data);
		});
		//alert(id);
	});

	$( ".update_photo_form" ).submit(function( event ) {
		// Stop form from submitting normally
	 	event.preventDefault();
	 	var formdata = $(this);
	 	var data = formdata.serialize();
	 	$.post("http://freelabel.net/x/update_title.php", data).done(function(data){
	 		//alert(data);
	 		formdata.prepend(data);
	 	});

	});

});// ------- document ready scripts ----------- //


function save_changes (id) {
alert('okay we working now');
	// var photoBlock = $("#photo_block_" + id);
	// var change_to = $("");
	if (confirm('Are you sure you want to make this photo ' + change_to +'?')) {
		alert('okay we working now');
		//alert(photoBlock);
			/*$.post('deletesingle.php' , {
				image_id : id
			}).done(function(data) {
				photoBlock.fadeOut();
			})*/
		} else {
			alert('okay we working now');
			// do nothing
		}
}

function changeStatusText (id) {
	$('#status_button_' + id).html('Make Public');
}

</script>