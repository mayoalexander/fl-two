<?php
$profile_info = '
	<h2 class="sub_title" ><strong>'.$_SESSION['user_name'].'\'s Dashboard</strong></h2>	
			<div class="panel panel-body" id="dashboard_profile_photo" >
				<img id="dashboard_photo" src="http://freelabel.net/submit/'.$user_pic.'">
				<br>
				<input type="button" id="update_photo_button" class="btn btn-success btn-xs" name="answer" value="EDIT" onclick="showPhotoOptions_'.$id.'()" />
				<div  id="shareBlock_"'.$id.'"  style="display:none;background-color:#e3e3e3;border-radius:10px;padding:2% 1%"  >
					<form action="updateprofile.php" method="POST" enctype="multipart/form-data">
						<input type="file" name="file">
						<br>
						<input type="hidden" name="user_name" value="'.$user_name.'">
						<input type="hidden" name="user_id" value="'.$id.'">
						<input type="submit" value="UPDATE PHOTO" class="btn btn-primary">
					</form>
				</div>
			</div>';
$profile_info	.=	"
<hr>
<script>
					function showPhotoOptions_".$id."() {
						shareBlock=document.getElementById('shareBlock_".$user_id."');
						dashboardProfileDiv=document.getElementById('dashboard_profile_photo');
						updatePhotoButton=document.getElementById('update_photo_button');
						if (shareBlock.style.display == 'block') {
							// if showing, change to none
							shareBlock.style.display = 'none';
							dashboardProfileDiv.style.height = '350px';
							updatePhotoButton.value = 'UPDATE PHOTO';
						} else {
							shareBlock.style.display = 'block';
							dashboardProfileDiv.style.height = '500px';
							dashboardProfileDiv.style.overflow = 'scroll';
							updatePhotoButton.value = 'HIDE';
						}
					   
					}
			</script>";
$soundcloud_downloader = "
<h6>Downloader</h6>
<input type='text' id='soundcloud_link' class='form-control' placeholder='Paste Soundcloud URL'>
<button class='btn btn-xs btn-default' onclick='downloadSoundcloud()'>Download</button>

<script>
function downloadSoundcloud() {
	//alert('clicked')
	soundcloud_link = document.getElementById('soundcloud_link').value;
	window.open('http://anything2mp3.com/?url=' + soundcloud_link)
}

</script>
";
if ($user_name_session == 'admin') {

		$admin_controls	=	 '
		<hr>
			<a href="?control=store#store" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-globe"></span> - Store</a>
			<a href="?control=sales#script" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-globe"></span> - Scripts</a>
			<a href="?control=sales#leads" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-usd"></span> - Sales</a>
			<br>
			<a href="?control=blog#blog_posts" class="btn btn-warning btn-xs" ><span class="glyphicon glyphicon-book"></span> - Magazine</a>
			<a href="?control=update#blogposter" class="btn btn-warning btn-xs" ><span class="glyphicon glyphicon-pencil"></span> - Post</a>
			<a href="?control=clients#blogposter" class="btn btn-warning btn-xs" ><span class="glyphicon glyphicon-user"></span> - Clients</a>';
			echo '<div id="twitpic">';
				echo '<div id="advanced_options" class="" style="display:none;">';
				
				echo '<a href="http://my.wavestreaming.com/open/clouddj/stop/3ea14f9f1d2ce0e08914a2ce31ee3cfd68c855fb/" target="_blank" class="btn btn-danger btn-xs" >GO LIVE</a>'; 
				echo '<a href="http://my.wavestreaming.com/open/clouddj/start/3ea14f9f1d2ce0e08914a2ce31ee3cfd68c855fb/" target="_blank" class="btn btn-success btn-xs" >AUTO DJ</a>'; 
				echo '<a href="https://tweetdeck.twitter.com/" target="_blank" class="btn btn-primary btn-xs" >TWEETDECK</a><hr>';					include("../test/twitpic.php");
					echo "<hr>";
				echo '<div class="panel">';
					include("../tweeter.php");
				echo '</div>';
				echo "<hr>";
					echo '<div class="panel panel-body">';
						echo $soundcloud_downloader;
					echo '</div>';
				echo "</div>";

			echo "<button onclick='openDashOptions()' class='btn btn-xs btn-warning' >Options</button>";
			echo '</div>';
				
			//echo $admin_controls;
		}
?>
<script>
function openDashOptions() {
	$('#advanced_options').toggle();
}
</script>
<style>
#back2site {
	padding:1%;
	opacity: 0.1;
	background-color: #303030;
	color:;
	position: fixed;
	z-index: 4;
	transition:opacity 0.25s;
}
#back2site:hover {
	opacity: 1;
}
#twitpic {
  //position:fixed;
  //top:5px;
  //left:5px;
  display:inline-block;
  width:350px;
  padding:1%;
  font-size: 50%;
  z-index: 10;
  //opacity: 0.7;
}
</style>

	<div id="back2site" class='panel panel-body'>
			<a href="http://freelabel.net/"><p>Back To Site //</p></a>
		<?php 
		



		require_once('../detect/Mobile_Detect.php');
        $detect = new Mobile_Detect;

        // Any mobile device (phones or tablets).
        if ( $detect->isMobile() ) {
         echo '
        <script type="text/javascript">
          document.getElementById("back2site").style.display = "none";
        </script>
        ';
        }


		?>	
	</div>




<?php

// SHOW CONTROL OPTIONS
echo '<div class="row" >'; // DIV ROW

	echo '<div class="col-md-4" id="dashboard_panel">'.$profile_info;
					include('campaign_info.php');
	echo '<div id="dashboard_view_panel_status" class="label-warning"></div>';
	echo '<div class="col-md-8" style="text-align:left;padding:4%;" id="dashboard_view_panel" >'; // fixed
				if ($_GET['control'] == false ) {
					echo '<a name="singles">';
					switch ($user_name_session) {
						case 'sales':
							include('lead_conversion.php');
							break;
						case 'booking':
							include('showcase_schedule.php');
							break;
						case 'Mia':
							include('current_clients.php');
							break;
						case 'admin':
							echo "<hr>";
							include('lead_conversion.php');
							include('admin.php');
							break;
						case 'siralexmayo':
							echo "<hr>";
							include('lead_conversion.php');
							include('admin.php');
							break;
						default:
						include('views/db/recent_posts.php');
							break;
					}
				}


				// --------- MANAGE SINGLE UPLOADS --------- //
				if ($_GET['control'] == "upload" OR $_GET['control'] == "singles") {
						echo '<a name="upload">';
						echo '<div class="panel" >';
								echo '<div class="panel-body" >';
						include('views/single_uploader.php');
					//	include('views/public_album_uploader.php');
								echo '</div>';
						echo '</div>';
						echo "<hr>";
						echo '</div>';
						//include('views/uploadedsingles.php');
						//echo '<hr>';
						//include('public_album_uploader.php');
						//include('public_album_uploader.php');
					}

				if ($_GET['control'] == "photos") {
						echo '<a name="photos">';
						include('user_photos.php');
					}
				if ($_GET['control'] == "booking") {
						echo '<a name="events">';
						include('showcase_schedule.php');
					}
				if ($_GET['control'] == "sales") {
						echo '<a name="leads">';
						include('lead_conversion.php');
						echo '<hr>';
						include('../x/s.php');
					}
				if ($_GET['control'] == "blog") {
						echo '<a name="blog_posts">';
						include('views/db/recent_posts.php');
					}
				if ($_GET['control'] == 'howtouse' ) {
						echo '<div id="howtouse">';
							include('howtouse.php');
						echo '</div>';
					}
				// EMAIL
				if ($_GET['control'] == "support" OR $_GET['control'] == "email") {
						echo '<a name="email">';
						$dashboard_emailer == true;
						include('../test/send_email.php');
					}
				if ($_GET['control'] == "script") {
						echo '<a name="photos">';
						include('../x/s.php');
					}
				if ($_GET['control'] == 'update' ) {
						include('admin.php');
					}
				if ($_GET['control'] == 'clients' ) {
						$stream_pull = 'radio';
						//include('../singles/related.php');
						//echo '</div>';
						include('views/db/current_clients.php');
					}
				if ($_GET['control'] == 'submissions' ) {
						include('../x/submissions.php');
					}
				if ($_GET['control'] == 'videos' ) {
						include('video_saver.php');
					}
				if ($_GET['control'] == 'store' ) {
						include('store_front.php');
					}
				if ($_GET['control'] == 'submissions' ) {
						include('../x/submissions.php');
					}	
					

			echo '</div>'; // COLLUM DIV ENDING
			
	echo '</div>' // ROW DIV 
	;
echo '</div>';


		
echo '</div>';

?>



