<?php 
if(session_id() == '' || !isset($_SESSION)) {
  // session isn't started
  session_start();
}

include('../../config/index.php') ?>
<a name="upload"></a>
<?php 
/*
echo '<pre>';
print_r($_SESSION);
echo "</pre><hr><pre>";
print_r($_POST);
echo "</pre>";
exit;
*/
	if ($user_name_session == false) {
		$user_name_session = $_POST['user_name'];
		$user_name = $_POST['user_name'];
		//$user_email = $_POST['user_email'];
	}
	//echo $user_name_session. ' - '.$user_name;
	//echo '<hr>';
	if ($user_name == 'admin') {
		//include('uploadedsingles.php');
	}
?>
<h3 class="sub_title" >MUSIC</h3>
<?php 
	switch ($user_name_session) {
		case 'admixn':
			echo '
			<a href="#clients" onclick="loadPage(\'http://freelabel.net/submit/views/db/user_photos.php?control=photos&view=xxxfl#photos\', \'#main_display_panel\', \'dashboard\', \''.$user_name_session.'\')" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-calendar"></span> - XXXFL</a>
			<a href="#clients" onclick="loadPage(\'http://freelabel.net/submit/views/db/user_photos.php?control=photos&view=campaign#photos\', \'#main_display_panel\', \'dashboard\', \''.$user_name_session.'\')" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-calendar"></span> - Campaigns</a>
			<a href="#clients" onclick="loadPage(\'http://freelabel.net/submit/views/db/user_photos.php?control=photos&view=baewatch#photos\', \'#main_display_panel\', \'dashboard\', \''.$user_name_session.'\')" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-calendar"></span> - Baewatch</a>
			<a href="#clients" onclick="loadPage(\'http://freelabel.net/submit/views/db/user_photos.php?control=photos&view=bbb#photos\', \'#main_display_panel\', \'dashboard\', \''.$user_name_session.'\')" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-calendar"></span> - Studio</a>
			<a href="#clients" onclick="loadPage(\'http://freelabel.net/submit/views/db/user_photos.php?control=photos&view=clients#photos\', \'#main_display_panel\', \'dashboard\', \''.$user_name_session.'\')" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-calendar"></span> - Clients</a>
			';
				/*<a class='btn btn-warning btn-xs' href='http://freelabel.net/submit/?control=photos&view=xxxfl#photos'>XXXFL</a>
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


	echo "";
	?>
	<!--<a onclick="loadPage('http://freelabel.net/upload.1.1/index.php', '#main_display_panel', 'dashboard', '<?php echo $_SESSION['user_name']; ?>')" class='btn btn-default btn-xs' alt='Leads'><span class="glyphicon glyphicon-cloud-download"></span> - Bulk Upload</a>-->
	<a href="#" onclick="window.open('<?php echo HTTP.'upload/index.php' ?>')" id="addMorePhotos" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-plus"></span> - Upload Project</a>
	<a href="#clients" onclick="loadPage('http://freelabel.net/submit/views/db/user_photos.php?control=photos&view=amagazine-spreads#photos', '#main_display_panel', 'dashboard', '<?php echo $user_name_session; ?>')" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-book"></span> - View Projects</a>
	<br>


	<style type="text/css">
	#single_uploader_panel td {
		padding:1% 3%;
	}
	#single_uploader_panel h2 {
		font-size: 100%;
		color:#fff;
	}
	#single_uploader_panel input, #single_uploader_panel select {
		width:450px;
		color:#303030;
		background-color:#303030;
		color:#e3e3e3;
		padding:5%;
	}

	</style>



					<form method="POST" action="http://freelabel.net/x/audiomaker.php" id="submissions_form" enctype="multipart/form-data" class='form-control.'>
					<table id='single_uploader_panel' >
						<tr>
							<td>
								<h2>Phone Contact</h2>
							</td>
							<td>
								<div class="input-group">
								  <span class="input-group-addon"><span class='glyphicon glyphicon-earphone'></span></span>
								  <input class="form-control" type="text" name="phone" value="" placeholder="Enter Phone Number (ex. 123-456-7890)" value='<?php echo $user_phone; ?>' required>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<h2>Type:</h2>
							</td>
							<td>
								<div class="input-group">
								  <span class="input-group-addon">
								  	<span class='glyphicon glyphicon-inbox'></span>
								  </span>
								  <select class="form-control" type="select" name="type" value="" required>
								  	<option value='single' selected>Single</option>
								  	<option value='instrumental'>Instrumental</option>
								  	<option value='private'>Private</option>
								  	<option value='other'>Other</option>
								  </select>

								</div>
							</td>
						</tr>
						<tr>
							<td><h2>Twitter Username</h2></td>
							<td>
								<div class="input-group">
								  <span class="input-group-addon"><span class='glyphicon glyphicon-link'e></span></span>
								  <input class="form-control" type="text" name="twittername" value="" placeholder="Enter Twitter Username" value='<?php echo $user_twitter; ?>' required>
								</div>
							</td>
						</tr>
						<tr>
							<td><h2>Track Name & Features</h2></td>
							<td>
								<div class="input-group">
								  <span class="input-group-addon"><span class="glyphicon glyphicon-music"></span></span>
								  <input class="form-control" type="text" name="trackname" value="" placeholder="Enter Track Name" required>
								</div>
							</td>
						</tr>
						<tr>
							<td><h2>Email</h2></td>
							<td>
								<div class="input-group">
								  <span class="input-group-addon"><span class='glyphicon glyphicon-envelope'></span></span>
								  <input class="form-control" type="text" name="email" placeholder="Enter Email Address" value="<?php echo $user_email; ?>" required>
								</div>
							</td>
						</tr>
						<tr>
							<td><h2>Photo Upload</h2></td>
							<td>
								<div class="input-group">
								  <span class="input-group-addon"><span class='glyphicon glyphicon-picture'></span></span>
								  <input class="form-control" type="text" name="twitpic" placeholder="Example: pic.twitter.com/wt92U7YQA5" >
								  <input class="form-control" type="file" name="userphoto" id="photo" placeholder="Example: pic.twitter.com/wt92U7YQA5" style="height:100px;" >
								</div>
							</td>
						</tr>

						<tr>
							<td><h2>Track Upload</h2></td>
							<td>
								<div class="input-group">
								  <span class="input-group-addon"><span class='glyphicon glyphicon-cloud-upload'></span></span>
								  <input class="form-control" type="file" name="audiofile" id="file" placeholder="Example: pic.twitter.com/wt92U7YQA5" required style="height:100px;" >
								</div>
							</td>
						</tr>


					</table>
						<input type="hidden" name="type" value="single">
						<input type="hidden" name="loggedin" value="1">
						<input type="hidden" name="user_name" value="<?php echo $_SESSION['user_name']; ?>">
						<!--<input type="hidden" name="userphoto" value="http://freelabel.net/submit/<?php //echo $user_pic ?>"> -->

						<input  class="btn btn-lg btn-primary" type="submit" name="submit" value="Upload" placeholder="Example: pic.twitter.com/wt92U7YQA5" required style='display:block; width:100%; color:#e3e3e3;' >
					</form>






