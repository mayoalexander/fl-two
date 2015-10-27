<a name="login">
<div class="registration_form">
								       
								    
					
						<!-- errors & messages -->
						<?php

						$user_name = $_POST['user_name'];

						// show negative messages
						if ($login->errors) {
						    foreach ($login->errors as $error) {
						        echo $error;    
						    }
						}

						// show positive messages
						if ($login->messages) {
						    foreach ($login->messages as $message) {
						        echo $message;
						    }
						}

						?>
						<!-- errors & messages -->

						<!-- login form box -->
		
						<form method="post" action="http://freelabel.net/submit/index.php" name="loginform">

						    <input class="single_uploader" id="login_input_username" class="login_input" type="text" name="user_name" value="<?php echo $user_name ?>" placeholder="Enter Username" required />

						    <input class="single_uploader" id="login_input_password" class="login_input" type="password" name="user_password" autocomplete="off" placeholder="Enter Password" required />

						    <input class="download_button" type="submit"  name="login" value="Log in" />

						</form>

						<br>
	<a href="<?php echo $projects[1]; ?>" class="download_button">REGISTER</a>
	<a href="mailto:info@amradiolive.com" class="download_button">FORGOT PASSWORD</a>
	
</div>