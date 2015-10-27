<a name="upload">	
	<style type="text/css">
		.single_uploader {
			text-transform: none;
			width:90%;
			display:block;
			font-size:150%;
			text-align: center;
			color:#fff;
			padding:10px;
			background-color: #303030;
			margin:2% auto;
			color:#fff;
			text-align: center;
			padding:2%;
			font-family: 'Fjalla One', sans-serif;
		}
		#single_uploader_containment {
			background-color:#e3e3e3;
			text-align: left;
			width:100%;
			display:inline-block;
			min-height:450px;
		}
		#input_label {
			background-color: #cccccc;
			color:#000;
			padding:1%;
			margin:1%;
			display:inline;
			width:30%;
			font-size:200%;
		}
		legend {
			font-size:400%;
			color:#000;
		}
		
	</style>	




<?php
	$twit_pic_value = '"value='.$twitpic_public_submission.'"';
?>

					<h1 class="sub_title" >VIDEO</h1>
					<form method="POST" action="http://freelabel.net/x/audiomaker.php" name="submissions" enctype="multipart/form-data">
						
							<input class="single_uploader" type="text" name="phone" value="" placeholder="Enter Phone Number (ex. 123-456-7890)" required>
							<input class="single_uploader" type="text" name="twittername" value="" placeholder="Enter Twitter Username" required>
							<input class="single_uploader" type="text" name="trackname" value="" placeholder="Enter Track Name" required>
							<input class="single_uploader" type="text" name="email" placeholder="Enter Email Address">
							<input class="single_uploader" type="text" name="twitpic" <?php echo $twit_pic_value; ?> placeholder="Example: pic.twitter.com/wt92U7YQA5">
						<!-- FILE UPLOADER --><br>
						<label id='input_label' for="file">Upload Audio File:</label>
    							<input type="file" type="file" name="file" id="file" placeholder="Choose File" required>
						<!-- HIDDEN VALUES -->
						<input type="hidden" name="type" value="single">
						<input type="hidden" name="user_name" value="submission">
						<input type="hidden" name="userphoto" value="http://freelabel.net/images/fllogo.jpg">
						<!-- HIDDEN VALUES -->
						<input id="submit_button" type="submit" name="submit" value="Upload Submission">
						
					</form>
			
					