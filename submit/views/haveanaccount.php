<a name="login">
<div id="body">
			<h2 class="sub_title">// LOGIN</h2>
								       
								    
					
						<!-- errors & messages --->
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
						<p id="joinbutton" style="background-color:#ffbf40;" >Login to UPLOAD, BOOK & SCHEDULE your Radio Interview Showcases + Upload Music Directly to AMR websites & blogs.</a>
						<form method="post" action="http://freelabel.net/submit/index.php" name="loginform">

						    <label for="login_input_username" id="joinbutton" >Username</label>
						    <input class="login_form" id="login_input_username" class="login_input" type="text" name="user_name" value="<?php echo $user_name ?>" placeholder="Enter Username" required />

						    <label for="login_input_password" id="joinbutton" >Password</label>
						    <input class="login_form" id="login_input_password" class="login_input" type="password" name="user_password" autocomplete="off" placeholder="Enter Password" required />

						    <input id="submit_button" style="background-color:#ffbf40;" type="submit"  name="login" value="Log in" />

						</form>

						<br>
						<a href="#register" id="joinbutton">REGISTER</a>
						<a href="#register" id="joinbutton">CREATE AN ACCOUNT</a>
						<a href="mailto:info@amradiolive.com" id="joinbutton">FORGOT PASSWORD</a>
	
</div>