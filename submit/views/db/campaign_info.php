<?php 
session_start();
// ---------------- PRE DEFINED VARIABLES ---------------- //
if ($_SESSION['user_name']=='') {
	
	$user_name_session = $_POST['id'];
	echo "no session set";
} else {
	$user_name_session = $_SESSION['user_name'];	
}
//print_r($user_name_session);

include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
$db = new UserDashboard($_SESSION);

// $user = $db->getUserData($user_name_session);
// //print_r($user);
// $user['stats']['total'] = $db->getUserStats($user_name_session , 'total');
// $user['stats']['total'] = $db->getUserStats($user_name_session , 'fans');
// $user['id'] = $user['user_id'];
// $user['photo'] = $db->getProfilePhoto($user_name_session);
// $user['profile_url'] = 'http://freela.be/l/'.$user['user_name'];


// $user['media']['audio'] = $db->getUserMedia($user_name_session); // Grab Users Posts
// $user['stats']['tracks'] = count($user['media']['audio']);
// $user['twitter'] = $user['media']['audio'][0]['twitter'];

// ------ data fixes ------- //
if (isset($user['photo']) && $user['photo']!='' ) {
	$profile_image = '<img src="'.$user['photo'].'" alt="'.$user['photo'].'" style="width:100%;">';
} else {
	if (strpos($user['media']['audio'][0]['photo'], 'http://')) {
		$media = 'http://freelabel.net/images/'.$user['media']['audio'][0]['photo'];
		//echo 'I needs to be formated';
	} else {
		$media = $user['media']['audio'][0]['photo'];
		//echo 'it doesnt need to be!!';
	}

	$profile_image = '<img src="'.$media.'" alt="from-media-'.$media.'" style="width:100%;">';
}
if ($user['custom']==''){
	$user['custom'] = $db->getCustomData($user);
}
//print_r($user['media']['audio']);
//exit;





//print_r($user['user_name']);
//exit;
//echo '<hr><hr><hr>';
//print_r();

//$user_name_session = $user['user_name'];



	//echo 'THEUSERER: '.$user_name_session.'<hr>';

	$todays_date	=	 date('Y-m-d');

	$dashboard_options	= '

	<div class="btn-group-vertical dashboard-navigation " style="width:100%;">
			<a onclick="loadPage(\'http://freelabel.net/submit/views/db/recent_posts.php\', \'#dashboard_view_panel\', \'dashboard\', \''.$user_name_session.'\')" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-dashboard"></span> - Dashboard</a>
			<a href="http://freelabel.net/@'.strtolower($user['twitter']).'" class="btn btn-default btn-lg" target="_blank" ><span class="glyphicon glyphicon-user"></span> - View Profile</a>
			<a href="#music"  onclick="loadPage(\'http://freelabel.net/submit/views/single_uploader.php\', \'#dashboard_view_panel\', \'dashboard\', \''.$user_name_session.'\')" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-music"></span> - Music</a>
			<a href="#photos" onclick="loadPage(\'http://freelabel.net/submit/views/db/user_photos.php\', \'#dashboard_view_panel\', \'dashboard\', \''.$user_name_session.'\')" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-picture"></span> - Photos</a>
			<a href="#videos" onclick="loadPage(\'http://freelabel.net/submit/views/db/video_saver.php\', \'#dashboard_view_panel\', \'dashboard\', \''.$user_name_session.'\')" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-film"></span> - Videos</a>
			<a href="#schedule" onclick="loadPage(\'http://freelabel.net/submit/views/db/showcase_schedule.php\', \'#dashboard_view_panel\', \'dashboard\', \''.$user_name_session.'\')" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-calendar"></span> - Schedule</a>
			<a href="#howtouse" onclick="loadPage(\'http://freelabel.net/submit/views/db/howtouse.php\', \'#dashboard_view_panel\', \'dashboard\', \''.$user_name_session.'\')" class="btn btn-default btn-lg" ><span class="glyphicon glyphicon-question-sign"></span> - How To Use</a>
			<a href="#email" onclick="loadPage(\'http://freelabel.net/test/send_email.php\', \'#dashboard_view_panel\', \'dashboard\', \''.$user_name_session.'\')" class="btn btn-default btn-lg" ><span class="glyphicon glyphicon-envelope"></span> - Contact Support</a>
			<a href="http://freelabel.net/submit/index.php?logout" class="btn btn-danger btn-lg" ><span class="glyphicon glyphicon-log-out"></span> - Logout</a>
			';

	$admin_options = "
            <hr>
            <h3>Admin Only:</h3>
              <a onclick=\"loadPage('http://freelabel.net/submit/views/db/blog_poster.php', '#main_display_panel', 'dashboard', 'admin')\" class='btn btn-warning btn-lg'>     <span class='glyphicon glyphicon-pencil'></span>Post</a>
              <a onclick=\"loadPage('http://freelabel.net/submit/views/db/lead_conversion.php', '#main_display_panel', 'dashboard', 'admin')\" class='btn btn-warning btn-lg'>    <span class='glyphicon glyphicon-usd'></span>Clients</a>
              <a onclick=\"loadPage('http://freelabel.net/twitter/index.php', '#main_display_panel', 'dashboard', '".$user_name_session."')\" class='btn btn-warning btn-lg'>    <span class='glyphicon glyphicon-comment'></span>Twitter</a>
              <a onclick=\"loadPage('http://freelabel.net/x/s.php', '#main_display_panel', 'dashboard', '".$user_name_session."')\" class='btn btn-warning btn-lg'><span class='glyphicon glyphicon-list-alt'></span>Script</a>
              <hr>
              <h4>Soon-To-Be-Launched</h4>
              <a onclick=\"loadPage('http://freelabel.net/twitter/index.php', '#main_display_panel', 'dashboard', '".$user_name_session."')\" class='btn btn-warning btn-lg'>    <span class='glyphicon glyphicon-comment'></span>Respond</a>
              <a onclick=\"loadPage('http://freelabel.net/submit/views/db/blog_poster.php', '#main_display_panel', 'dashboard', 'admin')\" class='btn btn-warning btn-lg'>    <span class='glyphicon glyphicon-usd'></span>Release</a>
              <a onclick=\"loadPage('http://freelabel.net/submit/views/db/current_clients.php', '#main_display_panel', 'dashboard', 'admin')\" class='btn btn-warning btn-lg'>     <span class='glyphicon glyphicon-pencil'></span>Reproduce</a>
              <hr>
              <h4>Still Testing</h4>
              <a onclick=\"loadPage('http://freelabel.net/upload/index.php', '#main_display_panel', 'dashboard', '".$user_name_session."')\" class='btn btn-warning btn-lg'>Uploader</a>
              <a onclick=\"loadPage('http://freelabel.net/submit/views/uploadedsingles.php', '#main_display_panel', 'dashboard', '".$user_name_session."')\" class='btn btn-warning btn-lg'>Payouts</a>
              <a onclick=\"loadPage('http://freelabel.net/tweeter.php', '#main_display_panel', 'dashboard', '".$user_name_session."')\" class='btn btn-warning btn-lg'>Saved</a>
              <a onclick=\"loadPage('http://freelabel.net/tweeter.php', '#main_display_panel', 'dashboard', '".$user_name_session."')\" class='btn btn-warning btn-lg'>Saved</a>
              <a onclick=\"loadPage('http://freelabel.net/FullWidthTabs/index.php', '#main_display_panel', 'dashboard', '".$user_name_session."')\" class='btn btn-warning btn-lg'>Full Width</a>"; 



	
	$update_successful = '<script type="text/javascript">
						 function redirectToSite() {
						 	alert("Your Changes Have Been Saved! Now Returning you to your Dashboard..");
						 	window.location.assign("http://freelabel.net/submit/")
						 }
						</script>';
	$profile_builder_form = '<div class="create_profile_form_wrapper">';

	//$profile_builder_form .= '<h3 >Hello, '.$user_name_session.'! </h3>';
	$profile_builder_form .= '<div class="label label-warning" role="alert">You\'ll need to finish completing all the additional information regarding creating your profile, '.$user_name_session.'! </div>';
	//$profile_builder_form .= '<div class="alert alert-warning" role="alert">You\'ll need to <a href="#" class="alert-link">make your payment</a> before we can get you booked in rotation!</div>';
	$profile_builder_form	.=	 "

															<form name='profile_builder_form' action='http://freelabel.net/submit/views/db/campaign_info.php' method='post' enctype=\"multipart/form-data\" class='profile_builder_form panel-body row' >
															<h1>Complete Profile</h1>
															<p class='section-description text-muted' >Use this form to complete your FREELABEL Profile. We will use this information to build your campaign as well as tag you during promotional campaigns!</p>
															
															<div class='col-md-3 col-sm-6' >
																<h4><i class='fa fa-photo' ></i> Upload Profile Photo</h4><input type='file' class='form-control' name='photo' required>
															</div>

															<div class='col-md-3 col-sm-6' >
																<h4><i class='fa fa-comment'></i> Display Name</h4>
																<input type='text' class='form-control' name='artist_name' placeholder='What is your Artist or Brand Name?' required>
															</div>

															<div class='col-md-3 col-sm-6' >
																<h4><i class='fa fa-map-marker'></i> Location</h4>
																<input type='text' class='form-control' name='artist_location' placeholder='Where are you from?' required>
															</div>

															<div class='col-md-3 col-sm-6' >
																<h4><i class='fa fa-users'></i> Brand or Management <small>(optional)</small></h4>
																<input type='text' class='form-control' name='artist_location' placeholder='Enter management contact information (Name, Phone, Email, etc..)' >
															</div>

															<div class='col-md-12'>
																<h4><i class='fa fa-book'></i> Artist Bio</h4><br>
																<textarea name='artist_description' class='form-control' rows='4' cols='53' placeholder='Tell us a little (or alot) about yourself..'></textarea>
															</div>

															<h1>Link Social Media</h1>

															<div class=' col-md-4 col-sm-6' >
																<h4><i class='fa fa-twitter'></i> Twitter</h4>
																<input type='text' class='form-control' name='artist_twitter' placeholder='Enter your Twitter username.. (include \"@\" sign)' required >
															</div>

															<div class=' col-md-4 col-sm-6' >
																<h4><i class='fa fa-instagram'></i> Instagram <small>(optional)</small></h4>
																<input type='text' class='form-control' name='artist_twitter' placeholder='Enter Your Instagram Username.. (include \"@\" sign)' >
															</div>

															<div class=' col-md-4 col-sm-6' >
																<h4><i class='fa fa-soundcloud'></i> Soundcloud <small>(optional)</small></h4>
																<input type='text' class='form-control' name='artist_twitter' placeholder='Enter Your Soundcloud Username.. (include \"@\" sign)' >
															</div>

															<div class=' col-md-4 col-sm-6' >
																<h4><i class='fa fa-youtube'></i> Youtube <small>(optional)</small></h4>
																<input type='text' class='form-control' name='artist_twitter' placeholder='Enter Your Youtube Username.. (include \"@\" sign)' >
															</div>

															<div class=' col-md-4 col-sm-6' >
																<h4><i class='fa fa-paypal'></i> Paypal <small>(optional)</small></h4>
																<input type='text' class='form-control' name='artist_twitter' placeholder='Enter Your Paypal Email..' >
															</div>

															<div class=' col-md-4 col-sm-6' >
																<h4><i class='fa fa-snapchat'></i> Snapchat <small>(optional)</small></h4>
																<input type='text' class='form-control' name='artist_twitter' placeholder='Enter Your Paypal Email..' >
															</div>


															<div class='col-md-12'>
																<input name='update_profile' type='submit' class='btn btn-warning complete-profile-button' value='SAVE PROFILE'>
															</div>

															<input type='hidden' name='id' value='".$user_name_session."' >
															<input type='hidden' name='update_profile'>
															<br>
													</form>
													<hr>
							</div>";
	$confirm_profile	=	 "
													<h2 id='subtitle'>Confirm Profile!</h2>
														<div id='body'>
														<h2>Make sure your information is correct before we make these changes to your profile!</h2>
														<br><br>
														<table id='body'>
															<tr>
																<td>
																	<img id='preview_photo' src='".$full_photo_path."'>
																</td>
																<td>
																	<span id='sub_label' >Arist Name:</span> <span id='pricing1' >".$artist_name."</span><br>
																	<span id='sub_label'  >Twitter UserName:</span> <span id='pricing1'  >".$artist_twitter."</span><br>
																	<span id='sub_label'  >Artist Location:</span> <span id='pricing1'  >".$artist_location."</span><br>
																	<h3>Description:</h3><br>
																	".$artist_description."
												
																	<center>
																		<button class='confirm_update' type='button' onclick='redirectToSite()'>SAVE CHANGES TO PROFILE</button>
																	</center>
																</td>
															</tr>
													</table>
												 
															<br><br>
														</div>"; 


	


?>
<style type="text/css">
	#preview_photo {
		width:400px;
		vertical-align: text-top;
	}
	#profile_builder_form {
		width:300px;
	}
	.download_button {
		display:block;
	}
	.create_profile_form_wrapper h3 {
		color:#101010;
	}
	.uploaded_singles {
		border-radius:0px;
	}
	.more-options-button {
		display:none;
	}
	.events-panel {
		text-align: left;
	}
	.dashboard-panel {
		min-height: 50vh;
	}
	.db-details {
		color:#303030;
		font-size: 0.75em;
	}
	.overflow {
		max-height:300px;
		overflow-y:scroll;
	}
	.profile_builder_form input, .profile_builder_form textarea, .profile_builder_form select, .profile_builder_form option {
		font-size: 125%;
		padding:2.5%;
		margin-bottom:2.5%;
	}
	.complete-profile-button {
		margin:auto;
		display:block;
	}
	.form-section-title h3 {
		color:#e3e3e3;
	}
	.events-panel {
		padding-bottom:0px;
		margin-bottom:4%;
		border-bottom:2px solid #101010;
	}
	.overflow, .dashboard-profile-details {
		min-height: 80vh;
	}
	.events-panel .overflow {
		height:80vh;
	}


</style>
<script type="text/javascript">
$(function(){
	var pleaseWait = 'Please wait..';

$('.more-options-button').click(function(){
	$('.more-options').slideToggle('fast');
});

	$('#edit-default-pxhoto').change(function() {

     	// ------ NEW NEW NEW NEW ------ //
	     	$('.photo-upload-results').html(' ');
	     	$('#edit-default-photo').append(pleaseWait);
	     	//$('.confirm-upload-buttons').prepend('<p class="wait" style="color:#303030;">Please wait..<p>');
			//$('.confirm-upload-buttons').hide('fast');
			var path = 'submit/updateprofile.php';
			var data;
			var formdata_PHO = $('#edit-default-photo')[0].files[0];
			var formdata = new FormData();

			// Add the file to the request.
	  		formdata.append('photos[]', formdata_PHO);
			//var formdata = $('#single_upload_form').serialize();
			//console.log(formdata_PHO);
			//alert(formdata_PHO);
		$.ajax({
	        // Uncomment the following to send cross-domain cookies:
	        xhrFields: {withCredentials: true},
	        url: path,
	        //dataType: 'json',
	        method: 'POST',
	        cache       : false,
		    processData: false,
		    contentType: false, 
		    fileElementId: 'image-upload',
	        data: formdata,
	        beforeSend: function (x) {
		            if (x && x.overrideMimeType) {
		                x.overrideMimeType("multipart/form-data");
		            }
		    },
		    // Now you should be able to do this:
		    mimeType: 'multipart/form-data'    //Property added in 1.5.1
	    }).always(function () {
		 	//alert(formdata_PHO);
		 	console.log(formdata_PHO);
		 	//$('#confirm_upload').html('please wait..');
	        //$(this).removeClass('fileupload-processing');
	    }).fail(function(jqXHR){
			alert(jqXHR.statusText + 'oh no it didnt work!')
		}).done(function (result) {
	        //alert('YES');
			$('.edit-default-form').append(result);
			//$('.confirm-upload-buttons').show('fast');
			// $('.confirm-upload-buttons').css('opacity',1);
			//$('.wait').hide('fast');
		})
 	});
	
});
function showPhotoOptions(id) {
	//alert(id);
	$('.edit-profile-block').slideToggle('fast');
}

</script>

<?php
// IF ARTIST PROFILE EXISTS, SHOW PANELS
include(ROOT.'inc/connection.php');

	if ($user_name == false) {
		$user_name = 'no username';
	}
// ------------------------------------------------------- //
// 			CHECK IF EXISTS IN ARTIST WEBSITE DATABASE
// ------------------------------------------------------- //
$sql ="SELECT * FROM user_profiles WHERE id='".$user_name_session."'";
$result = mysqli_query($con,$sql);
if($row = mysqli_fetch_array($result))
  {
// ------------------------------------------------------- //
// 			IF EXISTS, DISPLAY FULL USER DATA & CONTROL OPTIONS
// ------------------------------------------------------- //
  	// PROFILE IMAGE
		$profile_info = '
				<a target="_blank" href="'.$user['profile_url'].'">'.$profile_image.'</a>';

				$profile_options.="

                <!--
	                <a onclick=\"loadPage('http://freelabel.net/mag/pull_mag.php', '#main_display_panel', 'dashboard', '".$user_name_session."')\" class='btn btn-default lead_control'><span class=\"glyphicon glyphicon-signal\"></span>Feed</a>
                <a onclick=\"loadPage('http://freelabel.net/submit/views/db/user_photos.php', '#main_display_panel', 'dashboard', '".$user_name_session."')\" class='btn btn-default lead_control'><span class=\"glyphicon glyphicon-picture\"></span>Photos</a>

	                <a onclick=\"loadPage('http://freelabel.net/submit/views/db/recent_posts.php', '#main_display_panel', 'dashboard', '".$user_name_session."')\" class='btn btn-default lead_control'><span class=\"glyphicon glyphicon-envelope\"></span>Messages</a>
	                <a onclick=\"loadPage('http://freelabel.net/submit/views/db/recent_uploads.php', '#main_display_panel', 'dashboard', '".$user_name_session."')\" class='btn btn-default lead_control'><span class=\"glyphicon glyphicon-envelope\"></span>Notifications</a>
                -->
                <a class='btn btn-default lead_control' href='".$user['profile_url']."' target='_blank' ><span class=\"glyphicon glyphicon-phone\"></span>View Website</a>
                <a onclick=\"loadPage('http://freelabel.net/submit/views/db/recent_posts.php', '#main_display_panel', 'dashboard', '".$user_name_session."')\" class='btn btn-default lead_control'><span class=\"glyphicon glyphicon-cloud-upload\"></span>Your Uploads</a>
                <a onclick=\"loadPage('http://freelabel.net/submit/views/db/showcase_schedule.php', '#main_display_panel', 'dashboard', '".$user_name_session."')\" class='btn btn-default lead_control'><span class=\"glyphicon glyphicon-calendar\"></span>Your Schedule</a>
                <a onclick=\"loadPage('http://freelabel.net/submit/views/db/howtouse.php', '#main_display_panel', 'dashboard', '".$user_name_session."')\" class='btn btn-default lead_control'><span class=\"glyphicon glyphicon-shopping-cart\"></span>Help</a>
                <a class='btn btn-default lead_control more-options-button'><span class=\"glyphicon glyphicon-cog\"></span>Settings</a>
                <div class='more-options' style='display:none;'>
                ".$user['custom']."
                </div>

                ";

				$profile_info.='
				<div class="" id="dashboard_profile_photo" >
					<!--<h5 class="sub_title" >http://FREELA.BE/L/'.$user_name_session.'</h5>-->

					';
					/*$profile_info .= "
                <a onclick=\"loadPage('http://freelabel.net/submit/views/db/lead_conversion.php?leads=today', '#main_display_panel', 'dashboard', '".$user_name_session."')\" class='btn btn-default lead_control'><span class=\"glyphicon glyphicon-usd\"></span>Leads</a>
                <a class='btn btn-default lead_control' onclick=\"loadPage('http://freelabel.net/rssreader/cosign.php?control=update&rss=1', '#main_display_panel', 'mag')\"  ><span class=\"glyphicon glyphicon-usd\"></span>RSS</a>
                <a class='btn btn-default lead_control schedule' onclick=\"loadWidget('schedule')\"><span class=\"glyphicon glyphicon-usd\"></span>Schedule</a>
                <a class='btn btn-default lead_control twitter' onclick=\"loadWidget('twitter')\"><span class=\"glyphicon glyphicon-usd\"></span>Twitter</a>
                <a class='btn btn-default lead_control submissions' onclick=\"loadWidget('submissions')\"><span class=\"glyphicon glyphicon-usd\"></span>Submissions</a>
                <a class='btn btn-default lead_control clients' onclick=\"loadWidget('clients')\"><span class=\"glyphicon glyphicon-usd\"></span>Clients</a>
                <a onclick=\"loadPage('http://freelabel.net/x/s.php', '#lead_widget_container', 'dashboard', 'admin')\" class='btn btn-default lead_control'><span class='glyphicon glyphicon-list-alt'></span>Script</a>";*/


               /*
                $profile_info .= "
                <a onclick=\"loadPage('http://freelabel.net/submit/views/db/lead_conversion.php?leads=today', '#main_display_panel', 'dashboard', '".$user_name_session."')\" class='btn btn-default lead_control'><span class=\"glyphicon glyphicon-signal\"></span>Feed</a>
                <a onclick=\"loadPage('http://freelabel.net/submit/views/db/lead_conversion.php?leads=today', '#main_display_panel', 'dashboard', '".$user_name_session."')\" class='btn btn-default lead_control'><span class=\"glyphicon glyphicon-envelope\"></span>Messages</a>
                <a onclick=\"loadPage('http://freelabel.net/submit/views/db/lead_conversion.php?leads=today', '#main_display_panel', 'dashboard', '".$user_name_session."')\" class='btn btn-default lead_control'><span class=\"glyphicon glyphicon-envelope\"></span>Notifications</a>
                <a onclick=\"loadPage('http://freelabel.net/submit/views/db/lead_conversion.php?leads=today', '#main_display_panel', 'dashboard', '".$user_name_session."')\" class='btn btn-default lead_control'><span class=\"glyphicon glyphicon-music\"></span>Audio</a>
                <a onclick=\"loadPage('http://freelabel.net/submit/views/db/lead_conversion.php?leads=today', '#main_display_panel', 'dashboard', '".$user_name_session."')\" class='btn btn-default lead_control'><span class=\"glyphicon glyphicon-picture\"></span>Photos</a>
                <a onclick=\"loadPage('http://freelabel.net/submit/views/db/lead_conversion.php?leads=today', '#main_display_panel', 'dashboard', '".$user_name_session."')\" class='btn btn-default lead_control'><span class=\"glyphicon glyphicon-shopping-cart\"></span>Products</a>

                <a class='btn btn-default lead_control' onclick=\"loadPage('http://freelabel.net/rssreader/cosign.php?control=update&rss=1', '#main_display_panel', 'mag')\"  ><span class=\"glyphicon glyphicon-calendar\"></span>Schedule</a>
                <a class='btn btn-default lead_control' href='http://freelabel.net/x/?i=".$user_name_session."' target='_blank' ><span class=\"glyphicon glyphicon-user\"></span>View Website</a>
                ";*/

                $profile_info .= '
					<div class="panel-body profile_default_options">
						<a onclick="showPhotoOptions('.$user['user_id'].')" class=\'btn btn-default btn-xs col-md-6\' id="update_photo_button">        <span class="glyphicon glyphicon-pencil"></span>Change Default</a>
						<!--<a onclick="loadPage(\'http://freelabel.net/submit/views/db/user_photos.php\', \'#main_display_panel\', \'dashboard\', \''.$user_name_session.'\')" class=\'btn btn-default btn-xs col-md-6\'>        <span class="glyphicon glyphicon-plus"></span>Photos</a>-->
						
						<div id=\'dashboard_navigation\' style=\'margin-top:5%;display:none;\' >
							  <!--<a class=\'btn btn-primary\'  href="http://freelabel.net/submit/" style=\'display:none;\'>Artist Control Panel</a>
							  <a class=\'btn btn-primary\'  href="edit.php">View Profile</a>
							  <a class=\'btn btn-primary\'  href="edit.php">'.WORDING_EDIT_USER_DATA.'</a>
							    <a class=\'btn btn-danger\'  href="../index.php?logout">'.WORDING_LOGOUT.'</a>-->
							</div>
					</div>
					<div  class="edit-profile-block"  style="display:none;background-color:#e3e3e3;border-radius:10px;padding:2% 1%"  >
						<form action="http://freelabel.net/submit/updateprofile.php" method="POST" enctype="multipart/form-data" class="edit-default-form">
						<span id="photo-upload-results" ></span>
							<input type="file" name="file" id="edit-default-photo">
							<br>
							<input type="hidden" name="user_name" value="'.$user['user_name'].'">
							<input type="hidden" name="user_id" value="'.$user['user_id'].'">
							<input type="submit" value="UPDATE PHOTO" class="btn btn-primary">
						</form>
					</div>
				</div>';

		/*echo "
<div class=''>
<!--<h1 class='panel-heading'>Uploads</h1>-->
  <nav class='panel-body upload_buttons'>
    <a onclick=\"window.open('http://upload.freelabel.net/?uid=". $user_name_session. "')\" class='btn btn-success btn-lg col-md-3'>      <span class=\"glyphicon glyphicon-plus\"></span>Upload</a>
    <a onclick=\"loadPage('http://freelabel.net/submit/views/db/user_photos.php', '#main_display_panel', 'dashboard', '". $user_name_session. "')\" class='btn btn-warning btn-lg col-md-3'>        <span class=\"glyphicon glyphicon-camera\"></span>Photos</a>
    <a onclick=\"loadPage('http://freelabel.net/submit/views/db/recent_posts.php', '#main_display_panel', 'dashboard', '". $user_name_session. "')\" class='btn btn-warning btn-lg col-md-3'>      <span class=\"glyphicon glyphicon-music\"></span>Music</a>
    <a onclick=\"loadPage('http://freelabel.net/submit/views/db/video_saver.php', '#recent_post_wrapper', 'dashboard', '". $user_name_session. "','','facetime-video')\" class='btn btn-warning btn-lg col-md-3'>      <span class=\"glyphicon glyphicon-facetime-video\"></span>Videos</a>
    <!--
      <a onclick=\"loadPage('http://freelabel.net/submit/views/db/recent_posts.php?control=blog&view=all#blog_posts', '#main_display_panel', 'dashboard', '". $user_name_session. "')\" class='btn btn-default btn-lg col-md-2' >All</a>
      <a onclick=\"loadPage('http://freelabel.net/submit/views/db/recent_posts.php?control=blog&view=all#blog_posts', '#main_display_panel', 'dashboard', '". $user_name_session. "')\" class='btn btn-default btn-lg col-md-2' >Recent</a>
      <a href='http://freelabel.net/?ctrl=trx&view=submissions#blog_posts' style='display:none;' class='btn btn-default btn-lg col-md-2' >Submissions</a>
    -->
  </nav>
</div>";*/

		echo $upload_options;
		echo '<div class="row user-dashboard-panel">';
			echo '<div class="col-md-4 col-sm-4 dashboard-profile-details">';
				echo $profile_info;
				echo $profile_options;
			echo '</div>';
			echo '<div class="col-md-8 col-sm-8">';
				

				echo '<div class="panel-body col-md-10 col-xs-10 dashboard-panel events-panel ">';
				//echo '<h4 class="section_title" style="text-align:left;">Events</h4>';
				echo '<div class="overflow" >';
					include(ROOT.'submit/views/db/showcase_schedule.php');
				echo '</div>';
				echo '</div>';

				echo '<div class="panel-body col-md-2 col-xs-2 dashboard-panel uploaded_singles">';
					echo '<h3 class="db-details">Total Views:<h3> '.$user['stats']['total'];
					echo '<h3 class="db-details">Tracks:<h3> '.$user['stats']['tracks'];
					//echo 'Total Fans: '.$user['stats'];
					//$user_media = $user['media']['audio'];
					//include(ROOT.'submit/views/uploadedsingles.php');
				echo '</div>';

			echo '</div>';
		echo '</div>';



		

		// FULL ADMIN DASHBOARD PANEL
		$i=0;
		if ($user_name_session == 'admin' 
			OR $user_name_session == 'mayoalexander'
			//OR $user_name_session == 'sierra'
			OR $user_name_session == 'sales'
			OR $user_name_session == 'Mia'
			OR $user_name_session == 'nickhustle'
			//OR $user_name_session == 'ghost' 
			) {
			$i=1;
			//echo $admin_options;
		}
		// BLOGGER DASHBOARD NAVIGATION
		if ($user_name_session == 'sierra' 
			OR $user_name_session == 'siralexmayo'
			OR $user_name_session == 'KingMilitia' ) {
			$i=1;
			echo $blogger_options;
		}
		if ($i!=1) {
			echo '</div>';
		}

} else { 
			/* --------------------------------------------
				IF NOT EXISTING IN DATABASE, DISPLAY FORM OR SAVE FORM DATA
			--------------------------------------------*/
						if (isset($_POST["update_profile"])) {
							// echo 'it worked';
							// include('../../../header.php');
							
							//echo '<pre>';
							//print_r($_POST);


							$profile_data['id'] = $_POST['id'];
							$profile_data['name'] = $_POST['artist_name'];
							$profile_data['twitter'] = $_POST['artist_twitter'];
							$profile_data['location'] = $_POST['artist_location'];
							$profile_data['description'] = $_POST['artist_description'];
							$profile_data['photo'] = $_POST['photo'];
							$profile_data['profile_url'] = $_POST['id'];
							$profile_data['photo'] = $_POST['id'];
							$profile_data['date_created'] = $_POST['id'];


							$id = $_POST['id'];
							$artist_name = $_POST['artist_name'];
							$artist_twitter = $_POST['artist_twitter'];
								// TWITTERFIX
								$artist_twitter = str_replace('@@', '@', $artist_twitter);
								$artist_twitter = str_replace('@@@', '@', $artist_twitter);
							$artist_location = $_POST['artist_location'];
							$artist_description = $_POST['artist_description'];
							$photo = $_POST['photo'];

							$tmp_name = $_FILES["photo"]["tmp_name"];
							$ext_arr = explode('.',$_FILES["photo"]["name"]);
							$ext_arr = array_reverse($ext_arr);
							$ext = $ext_arr[0];
					        $name = $_FILES["photo"]["name"];
					        $photo_path 		=	"uploads/".$profile_data['id'].'-'.rand(1111111111,9999999999).'.'.$ext;
					        $photo_path_save 		=	"../../".$photo_path;
					        $full_photo_path	=	"http://freelabel.net/submit/".$photo_path;
					        //$profile_img_exists = getimagesize($full_photo_path);
					        $profile_url		= 'http://FREELA.BE/'.strtolower($profile_data['id']);
					        //echo '<pre>';
					        //print_r($_FILES);
					        //print_r($photo_path_save);
					        //exit;
					        move_uploaded_file($tmp_name, $photo_path_save );
							
							// CONFIRM PROFILE
							//echo 'PROFILE UPDATED!';				
							
							
							// CREATE PROFILE
							include('../../../inc/connection.php');
								// Insert into database
								$sql='INSERT INTO  `amrusers`.`user_profiles` (
									`id` ,
									`name` ,
									`twitter` ,
									`location` ,
									`description` ,
									`photo`,
									`profile_url`,
									`date_created`
									)
									VALUES (
									"'.$id.'",  "'.$artist_name.'",  "'.$artist_twitter.'",  "'.$artist_location.'",  "'.$artist_description.'",  "'.$full_photo_path.'", "'.$profile_url.'", "'.$todays_date.'"
									);';
								if (mysqli_query($con,$sql)) {  
								  //echo "Entry Created Successfully!";
								  echo '<script>
								  		alert("Entry Created Successfully!");
								  		window.location.assign("http://freelabel.net/users/dashboard/?ctrl=analytics");
								  		</script>';
								} else {
								  echo "Error creating database entry: " . mysqli_error($con);
								}
								  //echo '<br><br><br><br><br><br>';


						} else { 
						/* --------------------------------------------
							IF NO POST DATA SENT, SHOW FORM
						--------------------------------------------*/
							echo $profile_builder_form;
							//exit;
						}
	
}
?>

<script type="text/javascript">
	$(function(){
		$('.profile_builder_form').submit(function(event){
			var data = $(this).seralize();
			event.preventDefault();
			alert(data);
		});
	});
</script>