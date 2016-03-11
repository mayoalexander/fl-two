<?php
include('../config/index.php');
include(ROOT.'inc/connection.php');
$sql ="SELECT * 
FROM  `user_subscribers` 
WHERE  `user_name` LIKE CONVERT( _utf8 '%".$user_name_session."%'
USING latin1 ) 
COLLATE latin1_swedish_ci
LIMIT 0 , 30";
$result = mysqli_query($con,$sql);
if ($row = mysqli_fetch_assoc($result)) {
	foreach ($row as $key => $value) {
		$account_setting[$key] = $value;
	}
}
if (isset($_POST['user_email'])) {
	$subscriber_email = $_POST['user_email'];
	//echo 'Email Found: '. $subscriber_email.'.';
	//print_r($_POST);
}

$profile_register = '<form method="post" action="http://freelabel.net/submit/register.php" name="registerform">   

				    <!-- the user name input field uses a HTML5 pattern check -->
				    <label for="login_input_username">Username (only letters and numbers, 2 to 64 characters)</label><br>
				    <input id="login_input_username" class="form-control" type="text" pattern="[a-zA-Z0-9]{2,64}" placeholder="Enter Username.." name="user_name" required />

				    <!-- the email input field uses a HTML5 email type check -->
				    <label for="login_input_email">User\'s email</label><br>
				    <input id="login_input_email" class="form-control" type="email" placeholder="Enter Email.." name="user_email" value="'.$subscriber_email.'" required />        

				    <label for="login_input_password_new">Password (min. 6 characters)</label><br>
				    <input id="login_input_password_new" class="form-control" type="password" placeholder="Enter Password.." name="user_password_new" pattern=".{6,}" required autocomplete="off" />  

				    <label for="login_input_password_repeat">Repeat password</label><br>
				    <input id="login_input_password_repeat" class="form-control" type="password" placeholder="Enter Password Again.." name="user_password_repeat" pattern=".{6,}" required autocomplete="off" /><br>        
				    <input type="submit" class="btn btn-primary" name="register" value="Register" />

				</form>';



echo '<h1>Profile Settings</h1>';
	// -- SHOW MISSING VALUES ---- //
	foreach ($account_setting as $key => $value) {
		switch ($key) {
			case '':
				$missing[] = '<input type="text" name="'.$key.'" value="'.$value.'" placeholder="You must create a '.$key.'" class="form-control" ><br>';
				break;
			case 'type':
				$missing[] = '<span>FREELABEL Artist account not found..</span><br><br><a class="btn btn-default">Create an Artist / Brand Website for only $59</a>';
				break;
			
			default:
				# code...
				break;
		}
	}
	if (isset($missing)) {
		echo '<h4 class="alert alert-warning"><span class="glyphicon glyphicon-alert" ></span><br><br>';
		//echo $profile_register;
		foreach ($missing as $missing_setting) {
		 	echo $missing_setting;
		 } ;
		echo '</h4>';
	}


	// -- SHOW ACCOUNT DETAILS ---- //
	foreach ($account_setting as $key => $value) {
		//print_r($account_setting);
		if ($value!='') {
			echo '<h3 style="text-decoration:underline;color:red;" >'.$key.'</h3>';
			echo '<h4>'.$value.'</h4>';
			//echo '<input type="text" name="'.$key.'" value="'.$value.'" placeholder="You must create a '.$key.'" class="form-control" ><br>';
		}
	}


