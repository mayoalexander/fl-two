<a name="upload"></a>


<!--
<button class='btn btn-default btn-xs'>Switch To Album Uploader</button>
<button class='btn btn-default btn-xs'>Switch To Video Uploader</button>
<hr>
-->

<?php
	$twit_pic_value = '"value='.$twitpic_public_submission.'"';
?>
					<form method="POST" action="http://freelabel.net/x/audiomaker.php" id="submissions_form" enctype="multipart/form-data" style='color:#303030;max-width:800px;margin:auto;' class='panel panel-body flmag_div' >
						
						<h2>MUSIC SUBMISSION</h2>
						<div class="input-group panel-body">
						  <span class="input-group-addon"><span class='glyphicon glyphicon-earphone'></span> Phone</span>
						  <input class="form-control" id='phone' type="text" name="phone" value="" placeholder="Enter Phone Number (ex. 123-456-7890)" required>
						</div>

						<!--<h4>Status</h4>
						<div class="input-group panel-body">
						  	<span class="input-group-addon"><span class='glyphicon glyphicon-earphone'></span></span>
						  	<select name='onsale' class='form-control' style="width:100%;">
								<option selected>Select Status..</option>
								<option value='1' >Promo</option>
								<option value='0' >Private</option>
							</select>
						</div>
						<hr>-->

						<div class="input-group panel-body">
						  <span class="input-group-addon"><span class='glyphicon glyphicon-link'e></span> Twitter</span>
						  <input class="form-control" id='twitter' type="text" name="twittername" value="" placeholder="Enter Twitter Username" required>
						</div>

						<div class="input-group panel-body">
						  <span class="input-group-addon"><span class="glyphicon glyphicon-music"></span> Title</span>
						  <input class="form-control" id='trackname' type="text" name="trackname" value="" placeholder="Enter Track Name" required>
						</div>

						<div class="input-group panel-body">
						  <span class="input-group-addon"><span class='glyphicon glyphicon-envelope'></span> Email</span>
						  <input class="form-control" id='email' type="text" name="email" placeholder="Enter Email Address" required>
						</div>

						<div class="input-group panel-body">
						  <span class="input-group-addon"><span class='glyphicon glyphicon-picture'></span> Photo</span>
						  <input class="form-control" type="text" name="twitpic" placeholder="Example: pic.twitter.com/wt92U7YQA5" style='width:100%;' >
						  <input class="form-control" type="file" name="userphoto" id="photo" style="width:100%;height:100px;" >
						</div>

						<div class="input-group panel-body">
						  <span class="input-group-addon"><span class='glyphicon glyphicon-cloud-upload'></span>Audio</span>
						  <input class="form-control" type="file" id='file' name="audiofile" id="file" <?php echo $twit_pic_value; ?> placeholder="Example: pic.twitter.com/wt92U7YQA5" required style="height:100px;" >
						</div>

						<input type='hidden' name="user_name" id='submission' value='submission'>
						<div class='panel-body'>
							<input class="btn btn-lg btn-success" type="submit" id="searchForm" name="submit" value="Upload" required style="width:100%;">
						</div>

					</form>
			
					