<?php
/* ------------------------------------------------
	FIND USERNAME IN POST, GET, OR VARIABLE!
------------------------------------------------ */
if ($user_name_session == false) {
		$range = $_GET['range'];
		//$user_name = $_GET['user_name'];

		$user_name_session = $_POST['user_name'];
		$user_name = $_POST['user_name'];
	}

//echo 'username: '.$user_name;


$submit_form = '<br>
<a name="add">
<form id="booking_form" method="POST" action="http://freelabel.net/submit/views/db/schedule.1.0.0.php" >
		<div class="input-group event-booking-form">
			<select id="type_of_event" name="type_of_event" class="form-control" >
				<option value="" select >Choose Type...</option>
				<option value="Task" >Task</option>
				<option value="Studio" >Studio Session</option>
				<option value="Video Shoot" >Video Shoot</option>
				<option value="Call" >Conference Call</option>
				<option value="Meeting" >Meeting</option>
				<option value="Interview" >Interview</option>
				<option value="Preformance" >Preformance</option>
				<option value="Party" >Listening Session/Party</option>
				<option value="Release" >Project / Single Release</option>
			</select>
			<div id="event_booking_detail_options" class="panel panel-body" style="display:none;">
			<p style="color:#000;" ><span style="color:orange;font-size:150%;" class="glyphicon glyphicon-exclamation-sign" ></span> There is an $100 fee ($500 for Non-Clients) to book a date for a video shoot. You will be redirected after completing this form. If you have an EXCLUSIVE FREELABEL ACCOUNT, the $100 is not required.</p>
			<p><a class="btn btn-success btn-xs">Click Here To Upgrade to Exclusive</a></p>
			</div>

			<input id="event_title" name="event_title" type="text" placeholder="Listening Event, Mixtape Release, Interview about Tour, etc.." required class="form-control">
			<input id="manual_entry_input" type="text" class="form-control" name="showcase_day" placeholder="Enter Date: ex. January 10 1834">
			<!--
			<div class="input-group">
					<select id="dropdown_event_entry" name="showcase_day" class="form-control"  >
						<option value="Today" >Today</option>
						<option value="Tomorrow" >Tomorrow</option>
						<option value="Monday" >This Week (Monday)</option>
						<option value="Friday" >This Weekend (Friday)</option>
						<option value="+ 1 Week" >Next Week</option>
						<option value="" >Other...</option>
					</select> 
					<span onclick="manualDateEntry()"  class="input-group-addon btn btn-primary" id="basic-addon2">MANUALLY ENTER DATE</span>
			</div>
			-->
			<textarea id="description" name="description" class="form-control" placeholder="Enter Any Specific Details About Your Event.." rows="5" ></textarea>

		<input type="hidden" name="user_email" value="'.$user_email.'" class="form-control"  >
		<input type="hidden" name="user_name" value="'.$user_name.'" class="form-control" >
		
		<input id="submission_date" name="submission_date" type="hidden" value="'.$current_date.'" class="form-control" >
		<input type="submit" name="submit" value="APPLY FOR BOOKING" class="btn btn-primary">
		<input type="hidden" name="submit" value="1">
	</div>
</form>
<!-- eventbooking 
 
<input onclick="bookEvent()" type="submit" name="submit" value="APPLY FOR BOOKING" class="btn btn-primary">
--> 
';
?>



<center>

<?php 
// BOOK SHOWCASE FUNCTION
function create_event() {
		if ($_POST['submit']) {
			$user_name =  $_POST['user_name'];
			$user_email =  $_POST['user_email'];
			$event_title =  str_replace('\"','"',$_POST['event_title']) ;
			if ($_POST['showcase_day'] != '') { 
				$showcase_day = $_POST['showcase_day']; 
			} else { 
				$showcase_day = 'today';
			} 
			
			//echo 'SHOWCASE DAY: '.$showcase_day;

			$showcase_day =  strtotime($showcase_day);
			$showcase_day =  date("Y-m-d", $showcase_day);
			$submission_date = $_POST['submission_date'];
			$description = $_POST['description'];
			$type	=	$_POST['type_of_event'];
			include('../../../inc/connection.php');
			// Insert into database
				$sql="INSERT INTO schedule (user_name, event_title, showcase_day, type, description) VALUES ('$user_name','$event_title','$showcase_day', '$type', '$description')";
				if (mysqli_query($con,$sql))
				  {  
					


$email_subject = '[EVENT] '.$user_name . ' - "'.$event_title.'" was Received!';
$email_body = 'Thank you for submitting your music to FREELABEL Studios! We are a collective of producers, designers, and musicians dedicated to producing the highest quality exclusive platform to launch new brands to an audience averaging at <u>8.2+ Million Impressions each month.</u> You will be the branded product behind the impression we make to the world.<br><br>You will need to complete your registration by creating your account at http://freelabel.net/submit/ to get booked on any of the upcoming projects, publications, interviews, & radio showcases on the FREELABEL Radio, Magazine, & TV Network. Feel free to give us a call or email if you have any questions.';
$email_body = 'Your Event has been submitted and will be reviewed for approval. If you have any questions regarding the status of your event, feel free to contact us at 347-994-0267<BR><BR> Thank you!';

$body_template = '					<head>
											<style>
															html{
																width:100%;
															}
																body {
																	//background-image:url("'.$uploaded_file_path_http.'");
																	background-size:auto 100%;
																	background-position:center center;
																	background-color:#FE3F44;
																	color:#e3e3e3;
																	padding:0%;
																	margin:0%;
																	text-align:center;
																}
																#para_text {
																margin:1% auto;
																padding:1% 2%;
																font-size:100%;
															}
															#submission_info {
																background-color:#e3e3e3;
																color:#000000;
																width:90%;
																margin:auto;
																padding:2%;
																border-radius:10px;
															}
															#submission_info table, #submission_info tr,#submission_info td {
																margin:auto;
																color:#000;
															}
															a {
																//color:#FE3F44;
																color:#303030;
															}
															#email_photo {
															max-width:500px;
															margin:1% 0 3% 0;
															box-shadow:0px 0px 5px #303030;
														}
														#signature_block {
														margin: 4% auto;
														font-size:80%;

													}
												</style>
												</head>
												<body>
													<img style="width:250px" src="http://freelabel.net/images/FREELABELLOGO.gif"><br>
													<img style="width:250px" src="http://freelabel.net/images/flheadblack.png"><br>

													<div id="para_text">
														<h1>'.$email_subject.'</h1>

														'.$email_body."												
														<hr>
												" . '<h2>EVENT DETAILS:</h2>
														<div id="submission_info">
															<table>
																<tr>
																	<td>TITLE:</td>
																	<td>'.$event_title."</td>
																</tr>
																<tr>
																	<td>DATE:</td>
																	<td>".$showcase_day."</td>
																</tr>
																<tr>
																	<td>TYPE:</td>
																	<td>".$type."</td>
																</tr>
																<tr>
																	<td>DESCRIPTION:</td>
																	<td>".$description."</td>
																</tr>
																<tr>
																	<td>EMAIL:</td>
																	<td>".$user_email."</td>
																</tr>
															</table>
														</div>
													</div>
														<br><br>\n\n
													<div id='signature_block'>
													<u>FREELABEL ADMIN</u>
													<br>c: (347) 994-0267<br>
													e: info@FREELABEL.net\n\n\n\n
													<br>
													\nFREELABEL.net
													</div>
												</body>";
		
			$stafflist = array($user_email//,
				//'notifications@freelabel.net',
				//'booking@freelabel.net'
				//'georgiatech07@hotmail.com',
				//'nick@freelabel.net'//,
				//'godjghost@gmail.com',
				//'request.chiffon@gmail.com'
				);


			 //foreach ($stafflist as $admin) {
								include('../../../mailer/PHPMailerAutoload.php');

								//Create a new PHPMailer instance
								$mail = new PHPMailer;
								// Set PHPMailer to use the sendmail transport
								$mail->isSendmail();
								//Set who the message is to be sent from
								$mail->setFrom('admin@freelabel.net', 'FREELABEL Studios');
								//Set an alternative reply-to address
								$mail->addReplyTo('admin@freelabel.net', 'FREELABEL Studios');
								//Set the subject line
								$mail->Subject = $email_subject;
								//Read an HTML message body from an external file, convert referenced images to embedded,
								//convert HTML into a basic plain-text alternative body
								$mail->msgHTML($body_template);
								//Replace the plain text body with one created manually
								$mail->AltBody = $body_template;
								//Attach an image file
								//$mail->addAttachment('images/phpmailer_mini.png');

								//send the message, check for errors
								//foreach ($stafflist as $admin) { //This iterator syntax only works in PHP 5.4+
								$admin = "notifications@freelabel.net";
								    $mail->addAddress($admin, 'FREELABEL BOOKING');
								    if (!empty($row['photo'])) {
								        $mail->addStringAttachment($row['photo'], 'YourPhoto.jpg'); //Assumes the image data is stored in the DB
								    }

								    if (!$mail->send()) {
								        echo "Mailer Error (" . str_replace("@", "&#64;", $admin) . ') ' . $mail->ErrorInfo . '<br />';
								        break; //Abandon sending
								    } else {
								    	echo "Message sent to: ".$admin."!<br>";
										//echo "<br><br><br><br>".$body_template.'<br><br>';
								        //echo "Message sent to :" . $admin . ' (' . str_replace("@", "&#64;", $admin) . ')<br />';
								    }
								    // Clear all addresses and attachments for next loop
								    $mail->clearAddresses();
								    $mail->clearAttachments();
								//} // foreach END
					
					
					// end of sending email
						
					
					/*echo '<style>
					html {
					color:#fff;
					background-color:#303030;
					margin:10%;
					font-size:300%;
					font-family:sans-serif;
					}
					</style>';*/
					echo "Your Event has been submitted and will be reviewed for confirmation. Please stay updated!<br><br>Your Requested Event: <p id='sub_label' >".$event_title.'<br>On a ';
					//echo $showcase_day."</p><a href='http://freelabel.net/submit/'>Return to Dashboard</a><br><br><br><br><br><br>";
					//echo '<script>
					//		window.location.assign("http://freelabel.net/?ctrl=booking");
					//	</script>';
					exit;
				  }
				else
				  {
				  echo "Error creating database entry: " . mysqli_error($con);
				  }
		}	
}
create_event();

// DISPLAY SHOWCASE SCHEDULES
include('../../../inc/connection.php');
$result = mysqli_query($con,"SELECT * FROM schedule ORDER BY `showcase_day` DESC LIMIT 20");

if (mysqli_fetch_array($result) == false) {
	echo '<p id="joinbutton">';
	echo 'You have no showcases or events booked.
	</p>';
} else {
	/* ------------------------------------------------------------------------
	 
	------------------------------------------------------------------------ */
	


	if ($user_name == "admin" 
		OR $user_name_session == 'sales'
		OR $user_name_session == 'mia'
		OR $user_name_session == 'blog'
		OR $user_name_session == 'booking')
	{	// ADMIN EVENT DISPLAY
		$result = mysqli_query($con,"SELECT * FROM schedule WHERE `active` NOT LIKE '%3%' ORDER BY `showcase_day`");
		
	} else {
		// PUBLIC USER DISPLAY
		$result = mysqli_query($con,"SELECT * FROM schedule 
			WHERE user_name='".$user_name."' 
			AND active NOT LIKE '%3%'
			ORDER BY `showcase_day` LIMIT 40");
	}

// SPECIFIC CATEGORY VIEWS
	// FUTURE TENSE
	if ($_GET['range'] == 'today') {
		$result = mysqli_query($con,"SELECT * FROM schedule 
			WHERE user_name='".$user_name."' 
			AND active NOT LIKE '%3%'
			AND showcase_day LIKE '%$todays_date%'
			ORDER BY `showcase_day` LIMIT 40");
	}
	if ($_GET['range'] == 'tomorrow') {
		$result = mysqli_query($con,"SELECT * FROM schedule 
			WHERE user_name='".$user_name."' 
			AND active NOT LIKE '%3%'
			AND showcase_day LIKE '%$tomorrows_date%'
			ORDER BY `showcase_day` LIMIT 40");
	}
	// PAST TENSE
	if ($_GET['range'] == 'yesterday') {
		$result = mysqli_query($con,"SELECT * FROM schedule 
			WHERE user_name='".$user_name."' 
			AND active NOT LIKE '%3%'
			AND showcase_day LIKE '%$yesterdays_date%'
			ORDER BY `showcase_day` LIMIT 40");
	}
	// PAST TENSE
	if ($_GET['range'] == 'clients') {
		$result = mysqli_query($con,"SELECT * FROM schedule 
			WHERE user_name NOT LIKE 'admin' 
			AND active NOT LIKE '%3%'
			AND showcase_day LIKE '%$yesterdays_date%'
			ORDER BY `showcase_day` LIMIT 40");
	}


	$schedule_listing = '<table class="table" >';

		while($row = mysqli_fetch_array($result))
		{		


				$event_title = ucwords($row['event_title']);
				$showcase_day = $row['showcase_day'];
				$showcase_day_original = $row['showcase_day'];
				$event_id = $row['id'];	$key = $event_id;
				$event_user_name = $row['user_name'];
				$showcase_status = $row['active'];
				$showcase_status_int = $row['active'];
				$type_of_event 	=	$row['type'];
				$description = $row['description'];
		
				$event_time = $row['showcase_day'];
		
				$showcase_day_time = strtotime($showcase_day);
				$showcase_day_text = date("M d Y" , $showcase_day_time) ;

				// MAIN DATE GROUPING
				$showcase_date_primary = date('l, M d, Y',strtotime($showcase_day));
				$todays_date_bruh = date('l, M d, Y');
				$next_date_bruh = date('l, M d, Y',strtotime("+ 1 days",strtotime('now')));
				$next_date_bruh_1 = date('l, M d, Y',strtotime("+ 2 days",strtotime('now')));
				$next_date_bruh_2 = date('l, M d, Y',strtotime("+ 3 days",strtotime('now')));
				$next_date_bruh_3 = date('l, M d, Y',strtotime("+ 4 days",strtotime('now')));


				$showcase_day = $row['showcase_day'];
				$showcase_day_time = strtotime($showcase_day);
				$showcase_day = date('F j, Y', $showcase_day_time);
				$showcase_day_month_day = date('n.d.Y', $showcase_day_time);
				$event_link	=	'http://freelabel.net/#events';
				$tweet_event		= urlencode('[EVENT] '.$showcase_day_month_day.'

'.$event_title/*.'
'.$event_link.'
'.$twitpic*/);
				$tweet_event	=	'https://twitter.com/intent/tweet?screen_name=&text='.$tweet_event;
					



					
					// STATUS SWITCHER
					switch ($showcase_status) {
						case 0:
							// UNAPPROVED
							$showcase_status_bool = 0;
							$showcase_status = "<label class='label label-warning schedule_username' ><span class='glyphicon glyphicon-exclamation-sign'></span> ".$event_user_name."</label>";
							break;
						case 1:
							// APPROVED
							$showcase_status_bool = 1;
							$showcase_status = "<label class='label label-success schedule_username' ><span class='glyphicon glyphicon-ok'></span> ".$event_user_name."</label>";
							break;
						case 2:
							// COMPLETED
							$showcase_status_bool = 2;
							$showcase_status = "<label class='label label-success schedule_username' ><span class='glyphicon glyphicon-ok'></span> ".$event_user_name."</label>";
							break;
						case 3:
							// ARCHIVED
							break;
						
						default:
							$showcase_status_bool = 1;
							$showcase_status = "<label class='label label-success' ><span class='glyphicon glyphicon-ok'></span> ".$event_user_name."</label>";
							break;
					}






					// ADMIN BUTTONS (DELETE, AND APPROVE)
					//$delete_event_button = "<form style='display:inline;' method='POST' action='http://freelabel.net/submit/deletesingle.php' ><input name='event_id' type='hidden' value='".$event_id."'><input type='submit' class='btn btn-danger btn-xs' value='DELETE EVENT'></form>";
					$delete_event_button = "<input id='delete_event_".$key."' type='hidden' value='".$event_id."'><button id='submit' onclick='delete_event(".$key.")' class='btn btn-danger btn-xs'>DELETE EVENT</button>";
					if ($user_name == "admin" && $showcase_status_bool == 0 ) {
						// SHOW APPROVE BUTTON
						$approve_event_button 	= "<form style='display:inline;' method='POST' action='submit/update.php' ><input name='event_id' type='hidden' value='".$event_id."'><input name='event_action' type='hidden' value='approve'><input type='submit' class='btn btn-success btn-xs' value='APPROVE ".$event_user_name." '></form>";
					} else {
						// APPROVE BUTTON RESET
						$approve_event_button 	= '';
					}
					if ($showcase_status_bool == 3) { // IF POST IS NOT ARCHIVED, SHOW ARCHIVE OPTION
						// ARCHIVE BUTTON RESET
						$archive_event_button 	= '';
					} else {
						// SHOW ARCHIVE BUTTON

						$archive_event_button 	= "<form style='display:inline;' method='POST' action='submit/update.php' ><input name='event_id' type='hidden' value='".$event_id."'><input name='event_action' type='hidden' value='archive'><input type='submit' class='btn btn-warning btn-xs' value='ARCHIVE'></form>";
						$archive_event_button = "<input id='complete_event_".$key."' type='hidden' value='".$event_id."'><input id='complete_event_action_".$key."' type='hidden' value='archive'><button id='submit' onclick='complete_event(".$key.")' class='btn btn-warning btn-xs'>ARCHIVE EVENT</button>";
					
					}


					// IF EVENT IS APPROVED, SHOW THE COMPLETE BUTTON
					if ($showcase_status_bool==2) {
						$complete_event_button = '';
						//$complete_event_button 	= "<div style='display:inline;' ><input id='complete_event_".$key."' type='hidden' value='".$event_id."'><input id='complete_event_action_".$key."' type='hidden' value='complete'><button onclick='complete_event_".$key."()' class='btn btn-success btn-xs'>COMPLETE</button></div>";
					} else {
						$complete_event_button 	= "<div style='display:inline;' ><input id='complete_event_".$key."' type='hidden' value='".$event_id."'><input id='complete_event_action_".$key."' type='hidden' value='complete'><button onclick='complete_event_".$key."()' class='btn btn-success btn-xs'>COMPLETE</button></div>";
					}

					// RESCHEDULE BUTTON
					if ($showcase_status_bool==2) {
						$reschedule_event_button = '';
						//$reschedule_event_button 	= "<form style='display:inline;' method='POST' action='update.php' ><input name='event_id' type='hidden' value='".$event_id."'><input name='event_action' type='hidden' value='complete'><input type='submit' class='btn btn-success btn-xs' value='COMPLETE'></form>";
					} else {
						$reschedule_event_button 	= "<form style='display:inline;' method='POST' action='submit/update.php' ><input name='event_id' type='hidden' value='".$event_id."'><input name='event_action' type='hidden' value='reschedule'><input type='submit' class='btn btn-default btn-xs' value='RESCHEDULE'></form>";
					}

					$event_options = '
					<div class="dropdown">
					  <button class="btn btn-default dropdown-toggle" onclick="showEventControls('.$event_id.')">
					    Options
					    <span class="caret"></span>
					  </button>
					  <ul id="event_controls_'.$event_id.'" class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1" style="display:none;">
					    <li role="presentation"><a role="menuitem" tabindex="-1" ></a></li>
					    <li role="presentation"><a role="menuitem" tabindex="-1" >'.$archive_event_button.'</a></li>
					    <li role="presentation"><a role="menuitem" tabindex="-1" href="'.$tweet_event.'" target="_blank"><button onclick="share"  class="btn btn-primary btn-xs">Share On Twitter</button></a></li>
					    <li role="presentation"><a role="menuitem" tabindex="-1">'.$approve_event_button.'</a></li>
					    <li role="presentation"><a role="menuitem" tabindex="-1">'.$delete_event_button.'</a></li>
					    <li role="presentation"><a role="menuitem" tabindex="-1">'.$reschedule_event_button.'</a></li>
					    <li role="presentation"><a role="menuitem" tabindex="-1">'.$complete_event_button.'</a></li>
					  </ul>
					</div>
					';
					
		


		if ($showcase_date_primary == $todays_date_bruh) {
					if ($already_posted==0) {
										$schedule_listing .= '
										<tr>
										  	<td><h2 class="text-muted" style="color:#FE3F44;" >Today</h2></td>
										  	<td></td>
											<td></td>
										    <td></td>
										    <td></td>
										    <td></td>
										</tr>';
										$already_posted=1;
										$visibility = 'class="event_entry"';

							}
						}
		if ($showcase_date_primary == $next_date_bruh) {
					if ($already_posted1==0) {
										$schedule_listing .= '
										<tr>
										  	<td><h2 class="text-muted" style="color:#FE3F44;">Tomorrow</h2></td>
										  	<td></td>
											<td></td>
										    <td></td>
										    <td></td>
										    <td></td>
										</tr>';
										$already_posted1=1;
										$visibility = 'class="event_entry"';

							}
						}

		if ($showcase_date_primary == $next_date_bruh_1) {
					if ($already_posted2==0) {
										$schedule_listing .= '
										<tr>
										  	<td><h2 class="text-muted" style="color:#FE3F44;">'.date('l M d Y',strtotime($next_date_bruh_1)).'</h2></td>
										  	<td></td>
											<td></td>
										    <td></td>
										    <td></td>
										    <td></td>
										</tr>';
										$already_posted2=1;
										$visibility = 'class="event_entry"';

							}
						}
		if ($showcase_date_primary == $next_date_bruh_2) {
					if ($already_posted3==0) {
										$schedule_listing .= '
										<tr>
										  	<td><h2 class="text-muted" style="color:#FE3F44;">'.date('l M d Y',strtotime($next_date_bruh_2)).'</h2></td>
										  	<td></td>
											<td></td>
										    <td></td>
										    <td></td>
										    <td></td>
										</tr>';
										$already_posted3=1;
										$visibility = 'class="event_entry"';

							}
						}
				if (strtotime($showcase_date_primary) > strtotime($next_date_bruh_3)) {
					if ($already_posted4==0) {
										$schedule_listing .= '
										<tr>
										  	<td><h2 class="text-muted" style="color:#FE3F44;">Later This Month..</h2></td>
										  	<td></td>
											<td></td>
										    <td></td>
										    <td></td>
										    <td></td>
										</tr>';
										$already_posted4=1;
										$visibility = 'class="event_entry"';

							}
						}

				if (strtotime($showcase_date_primary) < strtotime($todays_date_bruh)) {
					if ($already_posted5==0) {
										$schedule_listing .= '
										<tr>
										  	<td><h2 class="text-muted older-heading" style="color:#FE3F44;">Earlier This Month..</h2><p><a name="olderPosts" href="#olderPosts" class="older_post_button" onclick="showOlerEntries()">Show</a></p></td>
										  	<td></td>
											<td></td>
										    <td></td>
										    <td></td>
										    <td></td>
										</tr>';
										$already_posted5=1;
										$visibility = 'class="older"';
										//class="older"
							}
						}
						/*echo strtotime($showcase_date_primary) .' '. strtotime($next_date_bruh_3).'<br>';
						echo $showcase_date_primary .' '. $next_date_bruh_3.'<hr>';
						echo $showcase_date_primary .' '. $next_date_bruh_3.'<hr>';*/

			$schedule_listing .=  		'
						<tr id="event_row_'.$key.'" '.$visibility.'" >
							  	<td>
								  	<span id="event_row_'.$key.'_status" >'.$showcase_status.'</span>
								  	<p onclick="editEvent('.$key.')" style="font-size:150%;" ><u style="font-size:80%;">'.$showcase_date_primary.' ('.strtoupper($type_of_event).')</u><br>'.$event_title.'</p>
								  	<p onclick="editEvent('.$key.')" id="event_desc_'.$key.'" style="font-size:70%;" >'.$description.'</p>
								  	<input /*onclick="editEvent('.$key.')"*/ id="event_edit_'.$key.'" type="text" class="form-control" value="'.$description.'" style="display:none;">
							  	</td>
							    
							    <td>'.$event_options.'</td>
						</tr>';
		}


		$schedule_listing .="</table>";
mysqli_close($con);
}
/* ---------------------------------------------------------------- //
 *	this is where the view starts
 * ---------------------------------------------------------------- */	
?>
<style>

.event-booking-form {
	width:100%;
	color:#fff;
}
.event-booking-form a {
	color:#fff;
}
.event-booking-form input, .event-booking-form select, .event-booking-form option, .event-booking-form textarea {
	font-size: 125%;
	padding:2.5%;
}
.schedule_username {
	font-size:18px;
	font-weight: normal;
}
.older , .older-heading {
	display:none;
}

</style>
<script>
function showOlerEntries () {
	$('.older').fadeToggle(1500);
	if ($('.older_post_button').html()=="hide") {
		$('.older_post_button').html('Show');
	}
	if ($('.older_post_button').html()=="Show") {
		$('.older_post_button').html('Hide');
	}
	$('.older-heading').fadeToggle(1500);
}
function bookEvent() {
	
	var type_of_event = $('#type_of_event').val()
	var event_title = $('#event_title').val()
	var manual_entry_input = $('#manual_entry_input').val()
	var dropdown_event_entry = $('#dropdown_event_entry').val()
	var description = $('#description').val()
	var user_email = $('#user_email').val()
	var user_name = $('#user_name').val()
	var submission_date = $('#submission_date').val()
	
	$.post('views/db/showcase_schedule.php', { 
		type_of_event : type_of_event,
		event_title : event_title,
		manual_entry_input : manual_entry_input,
		dropdown_event_entry : dropdown_event_entry,
		description : description,
		user_email : user_email,
		user_name : user_name,
		submission_date : submission_date
	}).done(function( data ) {
		$('#event_update_results_heading').html('Event Saved!');
		$('#event_update_results').html('okay we in bidddnetzzz: ' + data);
	});
}

function showEventControls(id) {

	var eventControls = $('#event_controls_' + id);

	if (eventControls.css("display") == "none") {
		eventControls.fadeIn(100);
		//alert('fade in');
	} else {
		eventControls.fadeOut(500);
		//alert('#event_controls_' + id);
	}
}

function complete_event(event_id) {
	//var event_id = $('#complete_event_' + event_id).val()
	var event_action = $('#complete_event_action_' + event_id).val()

	$.post('submit/update.php', { 
		event_id : event_id,
		event_action : event_action,
	}).done(function( data ) {
		$('#event_row_'+ event_id +'_status').html('<label class=\"label label-success\" >Completed + Archived!</label>');
		$('#event_row_' + event_id).fadeOut(500);
	});
}
function manualDateEntry() {
	$('#manual_entry_input').fadeIn();
	$('#dropdown_event_entry').fadeOut();
}

function delete_event(key) {
	r = confirm('Are you sure you want to delete this event?');
	if (r == true) 
	{

		var event_id = $('#delete_event_' + key).val()
		var approval_follow_up = $('#delete_event_' + key + ' input[name=approval_follow_up]').val()
		var approval_action = $('#delete_event_' + key + ' input[name=approval_action]').val()
		var submit = $('#delete_event_' + key + ' input[name=submit]').val()

		$.post('http://freelabel.net/submit/deletesingle.php', { 
			event_id : event_id
		} , function(data){
			$('#event_row_' + key + '_status').html('<label class=\"label label-danger\" >Deleting...</label>');
			$('#event_row_' + key).fadeOut('fast');
            //window.open(approval_follow_up);
        });
	} else {
		// do nothing!
	}
}
</script>


<a name="schedule"></a>
<h2>SCHEDULE:</h2>
<a href='?control=booking#events' class='btn btn-default btn-xs'>All</a>
<a href='?control=booking&range=yesterday#events' class='btn btn-default btn-xs'>Yesterday</a>
<a href='?control=booking&range=today#events' class='btn btn-primary btn-xs'>Today</a>
<a href='?control=booking&range=tomorrow#events' class='btn btn-default btn-xs'>Tomorrow</a>
<a onclick="loadPage('http://freelabel.net/submit/views/db/showcase_schedule.php?control=booking&range=clients#events', '#dashboard_view_panel', 'submit')" href='#' class='btn btn-default btn-xs'>all</a>

<br><br>


<style type="text/css">

.event .btn {
	margin:1%;
}
</style>
<?php echo $schedule_listing; ?>


<div class="panel panel-default" id="submit_form">
			  <!-- SUBMIT FORM -->
			  <div class="panel-heading"><h2 id='event_update_results_heading' >ADD EVENT</h2></div>
			  <div class="panel-body">
			  	<div id='event_update_results' ></div>
			  	<?php echo $submit_form; ?> 
			  </div>
</div>
<script>
	
	
$(function(){
	
$('#type_of_event').on('change', function() {
	if (this.value == 'Video Shoot') {
		$('#event_booking_detail_options').show();
		//alert( this.value ); // or $(this).val()
	}
});
$( "#booking_form" ).submit(function( event ) {
  event.preventDefault();
	var formdata = $( "#booking_form" ).serialize();
	console.log('#booking_form');
	$.post( "http://freelabel.net/submit/views/db/showcase_schedule.php", formdata ).done(function(data){
		$("#submit_form").hide('fast');
		alert('Event Saved!');

		//

	});
});
	
	
	
});
	

</script>
	

