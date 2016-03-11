<?php
session_start();
include('../inc/connection.php');
	$results = mysqli_query($con,"SELECT * 
FROM  `user_subscribers` 
WHERE  `email` LIKE CONVERT( _utf8 '".$_POST['user_name']."'
USING latin1 ) 
COLLATE latin1_swedish_ci
ORDER BY `id` DESC
LIMIT 1");
	if($row = mysqli_fetch_array($results))
	{

		setcookie('FL_user_name', $_POST['user_name'] , (time()+86400*30) , "/" );
		setcookie('FL_user_email', $row['email'] , (time()+86400*30) , "/" );
		setcookie('FL_user_password', $_POST['user_password'] , (time()+86400*30) , "/" );
		setcookie('FL_user_loggedin', 1 , (time()+86400*30) , "/" );
		$_SESSION['user_name_session'] = $_POST['user_name'];
		$_SESSION['user_name'] = $_POST['user_name'];
		$_SESSION['user_logged_in'] = true;

		header('Location: ../../');
		echo "<hr>";
		echo 'WE FOUND IT!!!!!'.$row['email'].' - ID# '.$row['user_key'];
		echo '<hr>';
		
	} else {
		//print_r($_POST['user_name']);
		$query = "SELECT user_name, user_email, user_password_hash FROM users WHERE user_name = '" . $_POST['user_name'] . "'";
		$results = mysqli_query($con,$query);
		if ($row = mysqli_fetch_array($results)) {
			//print_r($row);
			setcookie('FL_user_name', $_POST['user_name'] , (time()+86400*30) , "/" );
			setcookie('FL_user_email', $row['email'] , (time()+86400*30) , "/" );
			setcookie('FL_user_password', $_POST['user_password'] , (time()+86400*30) , "/" );
			setcookie('FL_user_loggedin', 1 , (time()+86400*30) , "/" );
			$_SESSION['user_name_session'] = $_POST['user_name'];
			$_SESSION['user_name'] = $_POST['user_name'];
			$_SESSION['user_logged_in'] = true;

			header('Location: ../../');
			//echo "<hr>";
			//echo 'WE FOUND IT!!!!!'.$row['email'].' - ID# '.$row['user_key'];
			//echo '<hr>';
		} else {
			include('../new_header.php');
			//echo '<pre>';
				//print_r($_COOKIE);
			//echo '</pre>';
			echo '<div class="jumbotron panel-body">';
				echo '<h1>Username or Email not Found!</h1>';
				echo '<h4>Get with the program..</h4><a href=../ class="btn btn-success btn-xs">Back to Site</a>';
				include('../submit/views/signin.php');
			echo '</div>';
			include('../new_footer.php');
		}
		/// end of the function
	}

