

<?php
	$twit_pic_value = '"value='.$twitpic_public_submission.'"';
?>

					<h1 class="sub_title" >ALBUM / MIXTAPES / DEMOS</h1>
					<form method="POST" name='mixtape_uploader' action="http://freelabel.net/submit/album_submissions.php" enctype="multipart/form-data">
						
							<input class="form-control" type="text" name="phone" value="" placeholder="Enter Phone Number (ex. 123-456-7890)" required>
							<input class="form-control" type="text" name="twittername" value="" placeholder="Enter Twitter Username" required>
							<input class="form-control" type="text" name="project_title" value="" placeholder="Enter Album Name" required>
							<input class="form-control" type="text" name="email" placeholder="Enter Email Address">
							<input class="form-control" type="text" name="twitpic" <?php echo $twit_pic_value; ?> placeholder="Example: pic.twitter.com/wt92U7YQA5">
						<!-- FILE UPLOADER --><br>
							<div class="input-group">
							  <span class="input-group-addon"><span class='glyphicon glyphicon-music'></span></span>
							  <input type="file" type="file" name="project_zip" id="file" placeholder="Choose File" required>
							</div>

							<div class="input-group">
							  <span class="input-group-addon"><span class='glyphicon glyphicon-picture'></span></span>
							  <input type="file" type="file" name="mixtapephoto" id="file" placeholder="Choose File" required>
							</div>

						<!-- HIDDEN VALUES -->
						<input type="hidden" name="type" value="mixtape">
						<input type="hidden" name="user_name" value="submission">
						<input type="hidden" name="userphoto" value="http://freelabel.net/images/fllogo.jpg">
						<!-- HIDDEN VALUES -->
						<input class="btn btn-primary" type="submit" name="submit" value="Upload Mixtape">
						
					</form>
			
								