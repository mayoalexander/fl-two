<?php 
include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');

//print_r($_GET);


if (isset($_GET['origin'])) {
	switch ($_GET['origin']) {
		case 'new-user':
			$form_headline = 'Create New Account';
			$response = 'Enter your information to create your account!';
			$form_inputs = 	'
		<input type="text" name="email" class="form-control col-md-6 col-xs-12" placeholder="Enter Your Email" >
		<input type="password" name="password" class="form-control col-md-6 col-xs-12" placeholder="Enter Your Password" >
		<input type="password" name="password" class="form-control col-md-6 col-xs-12" placeholder="Confirm Your Password" >
		<input type="hidden" name="form-name" class="form-control col-md-6 col-xs-12" value="subscription-form" placeholder="Enter Your Password" >
		<input type="hidden" name="form-action" class="form-control col-md-6 col-xs-12" value="register" placeholder="Enter Your Password" >
		<!--<input type="text" class="form-control" placeholder="Enter Your Phone Number" >-->
		<input class="btn btn-success" type="submit" value="Submit" >';
			break;
		case 'returning-user':
			$form_headline = 'Create New Account';
			$response = 'Enter your information to create your account!';
			$form_inputs = 	'
		<input type="text" name="email" class="form-control col-md-6 col-xs-12" placeholder="Enter Your Email" >
		<input type="password" name="password" class="form-control col-md-6 col-xs-12" placeholder="Enter Your Password" >
		<input type="password" name="password" class="form-control col-md-6 col-xs-12" placeholder="Confirm Your Password" >
		<input type="hidden" name="form-name" class="form-control col-md-6 col-xs-12" value="subscription-form" placeholder="Enter Your Password" >
		<input type="hidden" name="form-action" class="form-control col-md-6 col-xs-12" value="register" placeholder="Enter Your Password" >
		<!--<input type="text" class="form-control" placeholder="Enter Your Phone Number" >
		<input class="btn btn-success" type="submit" value="Submit" >-->';
			break;
		/* Miscellanious Cases */
		case 'events':
			//$form_headline = 'LOGIN TO RSVP';
			$response = 'Enter your information to RSVP and reserve your tickets!';
			$form_inputs = 	'
		<input type="email" name="email" class="form-control col-md-6 col-xs-12" placeholder="Enter Your Email" required >
		<textarea type="text" name="reference" rows="3" class="form-control col-md-6 col-xs-12" placeholder="Who are you going to see?" required ></textarea>
		<input type="hidden" name="form-name" class="form-control col-md-6 col-xs-12" value="subscription-form" placeholder="Enter Your Password" >
		<input type="hidden" name="form-action" class="form-control col-md-6 col-xs-12" value="register" placeholder="Enter Your Password" >
		<input type="hidden" name="event_id" value="'.$_GET['event_id'].'">
		<input class="btn btn-success event-rsvp-button" type="submit" value="Submit" >';
			break;
		case 'front-page':
			//$form_headline = 'LOGIN TO RSVP';
			$response = 'Enter your information to login!';
			$form_inputs = 	'
		<input type="email" name="email" class="form-control col-md-6 col-xs-12" placeholder="Enter Your Email" required >
		<input type="hidden" name="form-name" class="form-control col-md-6 col-xs-12" value="subscription-form" placeholder="Enter Your Password" >
		<input type="hidden" name="form-action" class="form-control col-md-6 col-xs-12" value="register" placeholder="Enter Your Password" >
		<input class="btn btn-success" type="submit" value="Submit" >';
			break;
		
		default:
			$response = 'Please sign-in to your account to continue!';
			# code...
			break;
	}

	// Build And Display Responses
	if ($response!='') {
		$response = '<p class="subscribe-form-response">'.$response.'<p>';
	}
	echo '
	<form class="subscribe-form subscriber-login-form">
	<!--<h2>'.$form_headline.'</h2>-->
	'.$response.'
	'.$form_inputs.'
	</form>';

} elseif (isset($_POST) && $_GET['origin']!='create-account') {

	$subscriber = $_POST;
	$subscriber['email'] = strtolower(trim($_POST['email']));
	include(ROOT.'inc/connection.php');

	$result = mysqli_query($con,"SELECT * FROM  `user_subscribers` WHERE  `email` LIKE CONVERT( _utf8 '%".$subscriber['email']."%' USING latin1 ) COLLATE latin1_swedish_ci ORDER BY `id` DESC LIMIT 0 , 30");
	if($row = mysqli_fetch_assoc($result)) {
		$config = new User;
		//$user_posts = count($config->findPostsByUser($subscriber['email']));
		//print_r($subscriber);
		$user_active = $config->checkIfUserActive($subscriber['email']);
		$details='';
		$details .= 'You are now Logged-in,';
		

		if ($user_active == 0) {
			$details .= ' but your TRIAL has expired & you haven\'t subscribed to this month\'s Magazine! You\'ll need to reactivate your account to continue!';
			$details .= '<br></br><button class="btn btn-lg btn-success create-account-button" >Upgrade Your Account</button>';
		} elseif($user_active == 1) {
			//$details = 'We have sent you an email containing all information about your RSVP to this event!';
			$details = '<p>You will be redirected to PayPal to purchase your tickets!</p>';
			$details .= '<br><a href="'.$_POST['event_id'].'" target="_blank" class="btn btn-lg btn-warning create-accxount-button" >Go To PayPal</a>';
			$config->sendMail($subscriber['email'], 'event-rsvp');
		}

		echo ''.$form_headline.' ';
		echo '<p>'.$details.'</p>';
	} else {
		$config = new User;
		//echo '<p>There is no account registered under that E-mail! You\'ll need to create an account!<p>';
		echo '<p>You will be redirected to PayPal to purchase your tickets!</p>';
		if ($saved = $config->saveToSubscribers($subscriber['email'] , $subscriber['reference'])) {
			$config->sendMail($subscriber['email'] , 'new-registration');
			//print_r($saved);
		}
		// $_POST['event_id']
		echo '<br><a href="'.$_POST['event_id'].'" target="_blank" class="btn btn-lg btn-warning create-accoxunt-button" >Go To PayPal</a>';
		//echo '<br><button class="btn btn-lg btn-success create-account-button" >Create a New Account</button>';
		//echo '<hr>';
	}
	echo '
	<script>
		setTimeout(function(){
			window.open("'.$_POST['event_id'].'");
		} , 3000);
	</script>';
}


?>
<script>
/*
* 1.1) Submit Data & Display In The Same Box
* 1.2.) Show if user account exists & is active
* 1.3. Show the Callback View
	1.3.1 - Show Successfully RSVP
	1.3.2 - Show The Option to Create Account, Try Again, or close the box.
*/


/* ON SUBMIT: Submit the form & Load the Results to the page */
	$( ".subscribe-form" ).submit(function( event ) {
	  var formdata = $( this ).serializeArray() ;
	  $(this).html('Please Wait..');
	  $.post('http://freelabel.net/config/subscribe.php', formdata , function(results){
		  $('.event-registration-body').html( results );
	  });
	  event.preventDefault();
	});

/* Show Registration Form Triggers */
	$('.create-account-button').click(function() {
	window.location.assign('http://freelabel.net/product/compare/');
	/*var path = 'http://freelabel.net/config/subscribe.php';
	$.get(path , {origin:'create-account'}).done(function(data) {
		//alert(data);
		$('.event-registration-body').html(data);
	});*/

});
</script>
