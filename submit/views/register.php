<?php 
        $page_title = "Register";
        include('../new_header.php') ?>
        <center>
        <div id="pricing_page_panel" style="color:#303030;padding:2%;font-size:150%;">
				
        
                    
				<!-- errors & messages --->
				<?php

				// show negative messages
				if ($registration->errors) {
				    foreach ($registration->errors as $error) {
				        echo $error;    
				    }
				}

				// show positive messages
				if ($registration->messages) {
				    foreach ($registration->messages as $message) {
				        echo $message;
				    }
				}

				?>
				<!-- errors & messages --->
				<h2>Register</h2>
				<!-- register form -->
				<form method="post" action="register.php" name="registerform">   

				    <!-- the user name input field uses a HTML5 pattern check -->
				    <label for="login_input_username">Username (only letters and numbers, 2 to 64 characters)</label><br>
				    <input id="login_input_username" class="login_input" type="text" pattern="[a-zA-Z0-9]{2,64}" placeholder="Enter Username.." name="user_name" required />

				    <!-- the email input field uses a HTML5 email type check -->
				    <label for="login_input_email">User's email</label><br>
				    <input id="login_input_email" class="login_input" type="email" placeholder="Enter Email.." name="user_email" required />        

				    <label for="login_input_password_new">Password (min. 6 characters)</label><br>
				    <input id="login_input_password_new" class="login_input" type="password" placeholder="Enter Password.." name="user_password_new" pattern=".{6,}" required autocomplete="off" />  

				    <label for="login_input_password_repeat">Repeat password</label><br>
				    <input id="login_input_password_repeat" class="login_input" type="password" placeholder="Enter Password Again.." name="user_password_repeat" pattern=".{6,}" required autocomplete="off" />        
				    <input type="submit" class="download_button" name="register" value="Register" />

				</form>

				<!-- backlink -->
				<a class="download_button" href="index.php">Back to Login Page</a>
				<br>

	</div>
	</center>
        
        
        
        
        
      
    
<?php include('../footer.php') ?>