<?php
$profile_info = '
	<h2 class="sub_title" ><strong>'.$_SESSION['user_name'].'\'s Dashboard</strong></h2>	
			<div id="dashboard_profile_photo" style="background-image:url(\''.$user_pic.'\');" >
				<img id="dashboard_photo" src="'.$user_pic.'"><br>
				<div  id="shareBlock_"'.$id.'"  style="display:none;background-color:#e3e3e3;border-radius:10px;padding:2% 1%"  >

					<form action="updateprofile.php" method="POST" enctype="multipart/form-data">
						<input type="file" name="file">
						<br>
						<input type="hidden" name="user_name" value="'.$user_name.'">
						<input type="hidden" name="user_id" value="'.$id.'">
						<input type="submit" value="UPDATE PHOTO" class="action_button">
					</form>
				</div>
			</div>';
$profile_info	.=	"
<input type='button' id='update_photo_button' class='download_button' name='answer' value='UPDATE PROFILE PHOTO' onclick='showShareOptions_".$id."()' />
<script>
					function showShareOptions_".$id."() {
						shareBlock=document.getElementById('shareBlock_".$user_id."');
						dashboardProfileDiv=document.getElementById('dashboard_profile_photo');
						updatePhotoButton=document.getElementById('update_photo_button');
						if (shareBlock.style.display == 'block') {
							// if showing, change to none
							shareBlock.style.display = 'none';
							dashboardProfileDiv.style.height = '350px';
							updatePhotoButton.value = 'UPDATE PROFILE PHOTO';
						} else {
							shareBlock.style.display = 'block';
							dashboardProfileDiv.style.height = '500px';
							dashboardProfileDiv.style.overflow = 'scroll';
							updatePhotoButton.value = 'HIDE';
						}
					   
					}
			</script>";



?>


<style>
body {
	font-size:100%;
}
#dashboard_profile_photo {
	background-size:100% auto;
	background-position: center center;
	//background-repeat: no-repeat;
	padding:5%;
	height:350px;
}
#dashboard_photo {
	margin: 4% auto;
	max-height:300px;
	box-shadow: 10px 0px 50px 30px;
	text-align:center;
	display: block;

}
.db_panel_2 {
	 float: left;
}

</style>	
</head>
<center>
	<div id="back2site" >
			<a href="http://freelabel.net/"><p>Back To Site //</p></a>
		<?php 
		if ($user_name == 'admin') {
		$admin_controls	=	 '<br><a href="views/db/func.php"><p>#control//</p></a>
		<br><a href="?control=sales"><p>#script//</p></a>
		<br><a href="?control=update"><p>#leads//</p></a>
		<br><a href="#news"><p>#news//</p></a>
		<br><a href="#upload"><p>#upload//</p></a>
		<br><a href="#blogposter"><p>#blogposter//</p></a>';
		}
		?>	
	</div>
	



<a name="dashboard">
<?php
	
	

// SHOW CONTROL OPTIONS
echo '<div class="db_panel_2">';
		echo '<a name="campaign">';
		include('campaign_info.php');
echo '</div>';


		if ($_GET['control'] == false) {
			if ($user_name == 'admin') {
				echo '<div class="db_panel_2">';
				include('views/db/lead_conversion.php');
			} else {
					// SHOW HOME FEED
				echo '<div class="db_panel_2">';
				echo $profile_info;	
			}
			
		}

		if ($_GET['control'] == "photos") {
			echo '<a name="photos">';
			echo '<div class="db_panel_2">';
			include('user_photos.php');
		}

		if ($_GET['control'] == "booking") {
			echo '<a name="events">';
			echo '<div class="db_panel_2">';
			include('showcase_schedule.php');
		}

		if ($_GET['control'] == "videos") {
			echo '<a name="videos">';
			echo '<div class="db_panel_2">';
			include('video_saver.php');
		}
		if ($_GET['control'] == "singles") {
			echo '<a name="singles">';
			echo '<div class="db_panel_2">';
			include('views/uploadedsingles.php');
		}

		if ($_GET['control'] == "upload") {
			echo '<a name="upload">';
			echo '<div class="db_panel_2">';
			include('views/single_uploader.php');
		}

		if ($_GET['control'] == "stats") {
			echo '<a name="stats">';
			echo '<div class="db_panel_2">';
			$filter = 'trending';
			include('../top_posts.php');
		}
		if ($_GET['control'] == "support") {
			echo '<a name="email">';
			echo '<div class="db_panel_2">';
			$dashboard_emailer == true;
			include('../test/send_email.php');
		}

		if ($_GET['control'] == "blog") {
			echo '<a name="blog_posts">';
			echo '<div class="db_panel_2">';
			include('views/db/recent_posts.php');
		}





		// ADMIN CONTROLS



			if ($_GET['control'] == false ) {
				//include('dashboardpanel3.php');
			}
			if ($_GET['control'] == 'update' ) {

				include('admin.php');
				echo '<div class="db_panel_1">';
			}
			if ($_GET['control'] == 'sales' ) {
				//include('../../../x/s.php');
				echo '<div class="db_panel_2">';
				include('../x/submissions.php');
				echo '</div>';
				echo '<div class="db_panel_1">';
				include('sales.php');
				echo '</div>';
				echo '<div class="db_panel_1">';
				include('../x/s.php');
			}
			/*
			if ($_GET['control'] == 'store' ) {
				include("store_front.php");
			}
			if ($_GET['control'] == 'videos' ) {
				include("video_saver.php");
			}
			if ($_GET['control'] == 'shows' ) {
				include("showcase_schedule.php");
			}
			if ($_GET['control'] == 'stats' ) {
				include("stats.php");
			}
			if ($_GET['control'] == 'info' ) {
				include("howtouse.php");
			}
			*/


		
echo '</div>';

		if ($user_name == "admin") {
			// Admin
		}

		if ($user_name == "KingMilitia" OR $user_name == "mayoalexander" ) {
			//include('admin.php');
		}
/*
		if ($user_name == "BaeWatchFL" OR $user_name == 'chuk' OR $user_name=='xsiralexmayo') {
			include('../bae/bae_uploader.php');
		}
*/
		if ($user_name == "siralexmayo") {
			
		}

		
		echo '
</center>";
</center>

					';
?>
	</center>