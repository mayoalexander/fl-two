


<style>
body {
	font-size:60%;
}
#body {
	background-color:#e3e3e3;
}

</style>	
</head>


<body>
	<div id="back2site" >
			<a href="http://freelabel.net/"><p>Back To Site //</p></a>
		<?php 
		if ($user_name == 'admin') {
		echo '<br><a href="views/db/func.php"><p>#control//</p></a>';
		echo '<br><a href="#script"><p>#script//</p></a>';
		echo '<br><a href="#leads"><p>#leads//</p></a>';
		echo '<br><a href="#news"><p>#news//</p></a>';
		echo '<br><a href="#upload"><p>#upload//</p></a>';
		echo '<br><a href="#blogposter"><p>#blogposter//</p></a>';
		}
		?>	
	</div>
	
	<center>

<?php
	echo '
	<h2 id="dash_header" ><strong>'.$_SESSION['user_name'].'\'s Dashboard</strong></h2>	
			<div class="db_panel_2" id="dashboard_profile_photo" width="450px" style="background-image:url(\''.$user_pic.'\');" >
				<form action="updateprofile.php" method="POST" enctype="multipart/form-data">
					<input type="file" name="file"><br>
					<input type="hidden" name="user_name" value="'.$user_name.'">
					<input type="hidden" name="user_id" value="'.$user_id.'">
					<input type="hidden" name="trackname" value="'.$trackname.'">
					<input type="submit" value="UPDATE PHOTO" class="dashboard_button">
				</form>
			</div>';
		
		echo '<div class="db_panel_4" >';
		// CAMPAIGN/PROFILE BUILDER
			include("campaign_info.php");
		echo '</div>';


		echo '<div class="db_panel_4">
		<h2 id="sub_label">STATS</h2>';
		// SHOWCASE SCHEDULE
			include("../top_posts.php");
		echo '</div>';




		echo '<div class="db_panel_2">';
		// SHOWCASE SCHEDULE
			include("showcase_schedule.php");
		echo '</div>';

		echo '<div class="db_panel_2">';
		// SHOWCASE SCHEDULE
			include("video_saver.php");
		echo '</div>';
		
		
echo '</div>';


echo '<div id="grey_panel">';
		if () if ($_GET['control'] == false) {
			include('campaign_info.php');
		}

		if ($_GET['control'] == "photos") {
			echo '<a name="photos">';
			include('user_photos.php');
		}

		if ($_GET['control'] == "booking") {
			echo '<a name="events">';
			include('showcase_schedule.php');
		}
echo '</div>';


		
		if ($user_name == "admin") {
			// Admin
		}

		if ($user_name == "KingMilitia" OR $user_name == "mayoalexander" ) {
			include('admin.php');
		}

		if ($user_name == "BaeWatchFL" OR $user_name == 'chuk' OR $user_name=='xsiralexmayo') {
			include('../bae/bae_uploader.php');
		}
		if ($user_name == "siralexmayo") {
			
		}

		
		echo '
</center>";
</center>
</body>
					';
?>