<?php
<<<<<<< HEAD
include_once('/home/content/59/13071759/html/config/index.php');
=======
include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
>>>>>>> master
require(ROOT.'inc/conn.php');

$todays_date = date('m-d');
$result = $conn->query('select * from twitter_data WHERE timestamp LIKE "%'.$todays_date.'%" ORDER BY `id` DESC');
$numb_soms_sent = count($result->fetchAll());


$leads_conversion = new Config();

?>
<section class="lead-block col-md-12 col-xs-12">
<a name="leads"></a>
<style type="text/css">
	.lead_label {
		font-size:60%;
		width:10%;
		display:inline-block;
		vertical-align:text-top;
		background-color: #FFCF00;
		padding:1%;
	}
	.progress_bar, #progress_status {
		background-color:#303030;
		border-radius:5px;
		width:100%;
		color:#fff;
	}
	#progress_status {
		background-color:green;
		padding:5% 2%;
		font-size:200%;
		box-shadow:0px 0px 15px #000;
	}
	.lead_conversion_controls {
		display:none;
	}
	tr {
		border-bottom:1px #202020 solid;
		padding-top:4%;
		padding-bottom:4%;
	}
</style>

<script>
function shareTwitter(textToTweet , twittername) {
	shareURL = 'http://freelabel.net/som/index.php?dm=1&t='+ twittername +'&text=' + encodeURI(textToTweet);
	$.get(shareURL,function(data){
		$('.form-result').addClass('text-success');
		$('.form-result').text('Message Sent!');

		setTimeout(function(){
			$('.form-result').hide('fast');
		},3000);
	});
	// window.open(shareURL);
	// alert(shareURL);
}

function editLead(id) {
	if ($('#lead_edit_' + id).css('display') == 'block') {
		//alert($('#event_desc_' + id));
		$('#lead_desc_' + id).fadeIn(500);
		$('#lead_edit_' + id).fadeOut(500);
	} else {
		var lead_desc = $('#lead_edit_' + id).val();
		//alert(lead_desc);
		$('#lead_desc_' + id).fadeOut(500);
		$('#lead_edit_' + id).fadeIn(500);
		$.post('update.php', {
			lead_id : id,
			lead_desc : lead_desc
		}).done(function(data){
			alert(data);
		});
	}
}




function followUpLead(id) {
		var lead_id = $('#delete_form_' + id + ' input[name=lead_id').val()
        var approval_follow_up = $('#delete_form_' + id + ' input[name=approval_follow_up]').val()
        var approval_action = $('#delete_form_' + id + ' input[name=approval_action]').val()
        var submit = $('#delete_form_' + id + ' input[name=submit]').val()
               if (confirm('Are you sure you want to follow up with this lead?: ' + decodeURI(approval_follow_up))) {
                              $.post('submit/update.php', { 
                                     lead_id : lead_id,
                                     approval_follow_up : approval_follow_up,
                                     approval_action : approval_action,
                                     submit : submit
                                   }).done (function(data){
                                   //alert(lead_id + ' ' + approval_follow_up + ' '  + ' Posted!') 
                                   
                                   if (approval_action == 0) {
                                   	$('#delete_form_' + id).html('<label class=\"label label-danger\">Lead Reset!</label>');
                                   } 
                                   if (approval_action == 1) {
                                   	$('#delete_form_' + id).html('<label class=\"label label-success\">Completed!</label>');
                                   }
                                   if (approval_action == 2) {
                                   	$('#delete_form_' + id).html('<label class=\"label label-Warning\">Third Follow Complete!</label>');
                                   }
                                   alert(approval_action + approval_follow_up );
                                   window.open(approval_follow_up);
                                   
                               });
               }
}
function openLeadControls(id) {
	var leadControls = $('#lead_conversion_controls_' + id);
	if (leadControls.css('display') == 'none') {
		leadControls.fadeIn(500);
	} else {
		leadControls.fadeOut(500);
	}	
}
function delete_lead(lead_id){
		confirmation = confirm('Are you sure you want to delete this lead?');
		if (confirmation==true) {
	        var approval_follow_up = $('#delete_lead_' + lead_id +' input[name=approval_follow_up]').val()
	        var approval_action = $('#delete_lead_' + lead_id +' input[name=approval_action]').val()
	        var submit = $('#delete_lead_' + lead_id +' input[name=submit]').val()
	               $.post('deletesingle.php', { 
	                      lead_id : lead_id
	                    } , function(data){
	                    //alert(lead_id + ' '  + ' Deleted!');
	                    $('#lead_panel' + lead_id).html('<label class=\"label label-success\">Deleted!</label>');
	                    $('#lead_panel' + lead_id).fadeOut(1000);
	                });
		}
		
}

</script>
<?php
/* -----------------------------------------------------------------------------
		CONFIGURATION
		-----------------------------------------------------------------------------*/


if ($user_name_session == false) {
    $user_name_session = $_POST['user_name'];
    $user_name = $_POST['user_name'];
  }

include(ROOT.'inc/connection.php');
		/* -----------------------------------------------------------------------------
		TIME VARIABLES
		-----------------------------------------------------------------------------*/
		$todays_date = date('Y-m-d');
		$yesterdays_date = date('Y-m-d', strtotime("- 1 day"));
		$daybefore_date = date('Y-m-d', strtotime("- 2 days"));
		$threedaysback = date('Y-m-d', strtotime("- 3 days"));
		$fourdaysback = date('Y-m-d', strtotime("- 4 days"));
		$fivedaysback = date('Y-m-d', strtotime("- 5 days"));

// grab number of total leads
$result = mysqli_query($con,"SELECT * FROM leads WHERE 
	entry_date='$todays_date' 
	ORDER BY `follow_up_date`");

		// GET SOM VALUE
		$somVALUE = mysqli_query($con,"SELECT * FROM som 
				WHERE  `date_of_som` LIKE  '%".$todays_date."%'
				ORDER BY `id` DESC");
		$SOM_i = 0;
		if($rowSOMvalues = mysqli_fetch_array($somVALUE)) {
			// START COUNTING SOMS
			$SOM_i = $SOM_i;
			$som[$SOM_i] = $rowSOMvalues['date_of_som'];
			$SOM_id = $rowSOMvalues['id'];
			//echo $SOM_i. ') '.$SOM_id;
			$SOM_i = $SOM_i + 1;
		} else {
			//echo 'no sir';
		}

			$number_of_som = count($som);
			$som_progress =	($number_of_som / 6) * 100;
			$som_progress =	substr($som_progress,0,4);



		$last_som = mysqli_query($con,"SELECT * FROM som
		ORDER BY `id` DESC LIMIT 1");
		$SOM_i = 0;
		while($rowSOM = mysqli_fetch_array($last_som)) {
			// START COUNTING SOMS
			$SOM_i = $SOM_i;
			$som[$SOM_i] = $rowSOM['date_of_som'];
			$last_som_id = $rowSOM['id'];
			//echo $som[$SOM_i];

			$how_recent =  time() - strtotime($som[$SOM_i]);
        //$how_recent = date('H:i', $how_recent);
        $how_recent = $how_recent / 60;
        $how_recent = $how_recent / 60;
        $how_recent = $how_recent / 24;
        if ($how_recent < 0.041666666666667) {
          $how_recent = $how_recent * 24 * 60;
          $how_recent = substr($how_recent, 0,3);
          $how_recent =  $how_recent.' minutes ago';
        } elseif ($how_recent < 1) {
          $how_recent = $how_recent * 24;
          if ($how_recent < 2) {
            $how_recent = substr($how_recent, 0,1);
            $how_recent =  $how_recent.' hour ago';
          } elseif ($how_recent < 10) {
            $how_recent = substr($how_recent, 0,1);
            $how_recent =  $how_recent.' hours ago';
          } else {
            $how_recent = substr($how_recent, 0,2);
            $how_recent =  $how_recent.' hours ago';
          } 
        }elseif($how_recent < 10) {
          $how_recent = substr($how_recent, 0,1);
          $how_recent =  $how_recent.' days ago';
        } else {
          $how_recent = substr($how_recent, 0,2);
          $how_recent =  $how_recent.' days ago';
        }
        if ($submission_date == '0000-00-00 00:00:00') {
          $how_recent = strtotime($row['date_of_som']);
        }

		}

		echo '<div id="lead_widget_container"></div>';



			


		// START COUTNING LEADS
			$result = mysqli_query($con,"SELECT * FROM leads 
					WHERE follow_up_date LIKE '%$todays_date%'
						/*OR follow_up_date='$yesterdays_date' 
						OR follow_up_date='$daybefore_date' 
						OR follow_up_date='$threedaysback' 
						OR follow_up_date='$fourdaysback' 
						OR follow_up_date='$fivedaysback'
						/*OR `user_name` = '".$user_name_session."' */
						ORDER BY `follow_up_date` DESC LIMIT 100");
		$i = 0;
		while($row = mysqli_fetch_assoc($result)) {
			$i = $i;
			$leads[$row['lead_twitter']][] = $row['lead_name'];
			$i = $i + 1;
			//echo $i;
		}
			$number_of_leads = count($leads);
			$min_sales = 60;
			$price = 56;
			// GET PERCENTAGACES
			$sales_progress = round(($number_of_leads / $min_sales) * 100);
			$total_sales 	= number_format($number_of_leads * $price);
			$sales_estimate = $total_sales * 0.1;
			$total_sales_quota	=	number_format($min_sales * $price);	



			// RECENT LEADS
		$last_som = mysqli_query($con,"SELECT * FROM leads
		ORDER BY `id` DESC LIMIT 1");
		$SOM_i = 0;
		while($rowSOM = mysqli_fetch_array($last_som)) {
			// START COUNTING SOMS
			$SOM_i = $SOM_i;
			$som[$SOM_i] = $rowSOM['entry_date'];
			$id = $rowSOM['id'];
			$entry_date = $rowSOM['entry_date'];
			//echo $som[$SOM_i];

			$how_recent =  time() - strtotime($entry_date);
        //$how_recent = date('H:i', $how_recent);
        $how_recent = $how_recent / 60;
        $how_recent = $how_recent / 60;
        $how_recent = $how_recent / 24;
        if ($how_recent < 0.041666666666667) {
          $how_recent = $how_recent * 24 * 60;
          $how_recent = substr($how_recent, 0,3);
          $how_recent =  $how_recent.' minutes ago';
        } elseif ($how_recent < 1) {
          $how_recent = $how_recent * 24;
          if ($how_recent < 2) {
            $how_recent = substr($how_recent, 0,1);
            $how_recent =  $how_recent.' hour ago';
          } elseif ($how_recent < 10) {
            $how_recent = substr($how_recent, 0,1);
            $how_recent =  $how_recent.' hours ago';
          } else {
            $how_recent = substr($how_recent, 0,2);
            $how_recent =  $how_recent.' hours ago';
          } 
        }elseif($how_recent < 10) {
          $how_recent = substr($how_recent, 0,1);
          $how_recent =  $how_recent.' days ago';
        } else {
          $how_recent = substr($how_recent, 0,2);
          $how_recent =  $how_recent.' days ago';
        }
        if ($rowSOM['entry_date'] == '0000-00-00 00:00:00') {
          $how_recent = strtotime($entry_date);
        }

		}
		

			


$submit_form = '<br><form class="form-horizontal" method="POST" action="http://freelabel.net/submit/views/db/leads.php">
<fieldset>

<!-- Form Name -->
<a name="add">
<legend>++ ADD LEADS</legend>
<input name="user_name" type="hidden" value="'.$user_name.'">



<div class="input-group">
  <span class="input-group-addon">$</span>
  <input type="text" class="form-control" name="lead_twitter" type="text" placeholder="for example: @GetMoneyMane" >
  <select class="form-control" name="follow_up_date" >
  	<option value="today" >Today</option>
  	<option value="+ 1 day" >Tomorrow</option>
  	<option value="+ 3 days" >Few Days</option>
  	<option value="+ 5 days" >End of The Week</option>
  	<option value="+ 1 week" >Next Week</option>
  	<option value="+ 2 weeks" >Next Week</option>
  	<option value="+ 1 month" >Next Month</option>
  </select>
  <input type="text" class="form-control" name="lead_phone" placeholder="Phone..">
  <input type="text" class="form-control" name="lead_email" placeholder="Email..">
  <hr>
  <textarea cols="40" rows="5" class="form-control" name="lead_name" placeholder="Lead Name or any notes.."></textarea>

</div>

   <Br>
   <input type="submit" name="submit" value="SAVE LEAD" class="btn btn-success"   >
<input type="hidden" name="user_name" value="'.$user_name.'">

</fieldset>
</form>';
?>
<?php 
	$todays_date = date('M/d/Y');
	$progress_bars = '
	<div class="card card-social">
	  
	  <div class="panel-body col-md-12 col-xs-12">
		<div class="panel-heading">
			<h3 class="panel-title">LEADS: <span class="text-muted">last updated '.$how_recent.'<span></h3>
		</div>
		<hr>
			<h3>Analytics:</h3>
			
			<div class="col-md-2">
				<h4>Date: </h4>
				<h5 class="text-muted">'.$todays_date.'</h5>
			</div>
			<div class="col-md-2">
				<h4>Messages Sent: </h4>
				<h5 class="text-muted">'.$numb_soms_sent.'</h5>
			</div>
			<div class="col-md-2">
				<h4>Leads Added Today: </h4>
				<h5 class="text-muted">'.$number_of_leads.'/'.$min_sales.'</h5>
			</div>
			<div class="col-md-2">
				<h4>Estimated Revenue: </h4>
				<h5 class="text-muted">$'.$total_sales.'/$'.$total_sales_quota.'</h5>
			</div>




	    <div class="progress">
		  <div class="progress-bar progress-bar-striped active"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width:'.$sales_progress.'%;">
		    <span class="sr-only">'.$sales_progress.'% Complete</span>
		  </div>
		</div>
	  </div>

	</div>
	';
	echo $progress_bars; 
?>







<div class='panel-body' style="margin-top:10%;">
	<h3>Sort by:</h3>
        <a onclick="loadPage('http://freelabel.net/submit/views/db/leads.php?leads=today', '#main_display_panel', 'dashboard', '<?php echo $user_name_session; ?>')" class='btn btn-default btn-xs'>       <span class="glyphicon glyphicon-cloud-upload"></span>Today</a>
        <a onclick="loadPage('http://freelabel.net/submit/views/db/leads.php?leads=all', '#main_display_panel', 'dashboard', '<?php echo $user_name_session; ?>')" class='btn btn-default btn-xs'>       <span class="glyphicon glyphicon-cloud-upload"></span>All</a>
        <a onclick="loadPage('http://freelabel.net/submit/views/db/leads.php?leads=yesterday', '#main_display_panel', 'dashboard', '<?php echo $user_name_session; ?>')" class='btn btn-default btn-xs'>       <span class="glyphicon glyphicon-cloud-upload"></span>Yesterday</a>
        <a onclick="loadPage('http://freelabel.net/submit/views/db/leads.php?leads=recent', '#main_display_panel', 'dashboard', '<?php echo $user_name_session; ?>')" class='btn btn-default btn-xs'>       <span class="glyphicon glyphicon-cloud-upload"></span>Recent</a>
        <a onclick="loadPage('http://freelabel.net/submit/views/db/leads.php?leads=followed', '#main_display_panel', 'dashboard', '<?php echo $user_name_session; ?>')" class='btn btn-default btn-xs'>       <span class="glyphicon glyphicon-cloud-upload"></span>Followed</a>
        <a onclick="loadPage('http://freelabel.net/submit/views/db/leads.php?leads=unfollowed', '#main_display_panel', 'dashboard', '<?php echo $user_name_session; ?>')" class='btn btn-default btn-xs'>       <span class="glyphicon glyphicon-cloud-upload"></span>Unfollowed</a>
        <a onclick="loadPage('http://freelabel.net/submit/views/db/leads.php?leads=third', '#main_display_panel', 'dashboard', '<?php echo $user_name_session; ?>')" class='btn btn-default btn-xs'>       <span class="glyphicon glyphicon-cloud-upload"></span>Third</a>
        <a onclick="loadPage('http://freelabel.net/submit/views/db/leads.php?leads=priority', '#main_display_panel', 'dashboard', '<?php echo $user_name_session; ?>')" class='btn btn-default btn-xs'>       <span class="glyphicon glyphicon-cloud-upload"></span>Priority</a>
</div>
<hr>



<?php 
// BOOK SHOWCASE GENERATOR

function save_lead() {
		if ($_POST['submit']) {


			$user_name =  $_POST['user_name']; 			if ($user_name=='') {
				$user_name 	=	'pathways';
			}
			$lead_name =  $_POST['lead_name'];
			$lead_twitter =  trim($_POST['lead_twitter']);
			$lead_phone =  trim($_POST['lead_phone']);
			$lead_email =  trim($_POST['lead_email']);
			$lead_twitter_noat = str_replace('@', '', $lead_twitter);
			$follow_up_date_time =  strtotime($_POST['follow_up_date']);
			$follow_up_date	= date('Y:m:d', $follow_up_date_time);
			$entry_date	= date('Y-m-d H:i');
			include('../../../inc/connection.php');

			if (mysqli_fetch_array($result) == false) {
				echo '<p id="joinbutton">';
				echo 'You have no Leads :(.
				</p>';
			}

			// Insert into database
				$sql="INSERT INTO leads (user_name, lead_name, lead_twitter, follow_up_date, entry_date, lead_phone, lead_email) VALUES ('$user_name','$lead_name','$lead_twitter','$follow_up_date','$entry_date','$lead_phone','$lead_email')";
				if (mysqli_query($con,$sql))
				  {  
					$follow_up_date = date( 'l, M/j/Y @ h:i A' , $follow_up_date_time);


// NOTIFICATIONS
$email_subject = '[LEAD] '.$lead_twitter . ' - "'.$lead_name.'" was Received!';
$email_body = 'We have an new lead.<br><br>'.$lead_name.'<br><br><hr><br>';
$email_body .= 'Thank you for submitting your music to FREELABEL Studios! We are a collective of producers, designers, and musicians dedicated to producing the highest quality exclusive platform to launch new brands to an audience averaging at <u>8.2+ Million Impressions each month.</u> You will be the branded product behind the impression we make to the world.<br><br>You will need to complete your registration by creating your account at http://freelabel.net/submit/ to get booked on any of the upcoming projects, publications, interviews, & radio showcases on the FREELABEL Radio, Magazine, & TV Network. Feel free to give us a call or email if you have any questions.';
$body_template = '								<style>
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
												<body>
													<img style="width:250px" src="http://freelabel.net/images/FREELABELLOGO.gif"><br>
													<img style="width:250px" src="http://freelabel.net/images/flheadblack.png"><br>

													<div id="para_text">
														<h1>'.$email_subject.'</h1>

														'.$email_body."												
														<hr>
												" . '<h2>LEAD INFORMATION:</h2>
														<div id="submission_info">
															<table>
																<tr>
																	<td>COMMENTS:</td>
																	<td>'.$lead_name.'</td>
																</tr>
																<tr>
																	<td>PHONE:</td>
																	<td>'.$lead_phone."</td>
																</tr>
																<tr>
																	<td>FOLLOW UP // ENTRY DATE:</td>
																	<td>".$follow_up_date." // ".$entry_date."</td>
																</tr>
																<tr>
																	<td>TWITTER:</td>
																	<td>".$lead_twitter."</td>
																</tr>
																<tr>
																	<td>EMAIL:</td>
																	<td>".$lead_email."</td>
																</tr>
															</table>
														</div>
													</div>
														<br><br>\n\n
													<div id='signature_block'>
													<u>FREELABEL Account Executive</u>
													<br>c: (323) 601-8111<br>
													e: info@FREELABEL.net\n\n\n\n
													<br>
													\nFREELABEL.net
													</div>
												</body>";
		
			$stafflist = array('notifications@freelabel.net',
				//'nick@freelabel.net',
				'sales@freelabel.net',
				//'godjghost@gmail.com.com',
				'request.chiffon@gmail.com');
			
			 //foreach ($stafflist as $admin) {
								include('../../../mailer/PHPMailerAutoload.php');

								//Create a new PHPMailer instance
								$mail = new PHPMailer;
								// Set PHPMailer to use the sendmail transport
								$mail->isSendmail();
								//Set who the message is to be sent from
								$mail->setFrom('admin@freelabel.net', 'FL SALES');
								//Set an alternative reply-to address
								$mail->addReplyTo('admin@freelabel.net', 'Sales Administration');
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
								foreach ($stafflist as $admin) { //This iterator syntax only works in PHP 5.4+
								    $mail->addAddress($admin, 'FREELABEL SUBMISSIONS');
								    if (!empty($row['photo'])) {
								        $mail->addStringAttachment($row['photo'], 'YourPhoto.jpg'); //Assumes the image data is stored in the DB
								    }

					 			    if (!$mail->send()) {
								        echo "Mailer Error (" . str_replace("@", "&#64;", $admin) . ') ' . $mail->ErrorInfo . '<br />';
								        break; //Abandon sending
								    } else {
								    	echo "Message sent to: ".$admin."!<br>";
										//echo "<br><br><br><br>".$body_template.'<br><br>';
								        echo "Message sent to :" . $admin . ' (' . str_replace("@", "&#64;", $admin) . ')<br />';
								    }
								    // Clear all addresses and attachments for next loop
								    $mail->clearAddresses();
								    $mail->clearAttachments();
								}
			
			 
				  echo "Entry Created Successfully! ";
				  echo "<script>
											function newDoc()
											{
												window.location.assign(\"http://freelabel.net/?ctrl=leads#add\")
											}
											newDoc()
											</script>";
					echo '<style>
					html {
					color:#fff;
					background-color:#303030;
					margin:10%;
					font-size:300%;
					font-family:sans-serif;
					}
					</style>';
					echo "Your LEAD has been Saved. Please stay updated!<br><br>Your Lead: <p id='sub_label' >".$lead_name.'<br>TWITTER: ';
					echo $lead_twitter." and you must follow up on: ".$follow_up_date."</p><a href='http://freelabel.net/submit/#leads'>Return to Dashboard</a><br><br><br><br><br><br>";
				  }
				else
				  {
				  echo "Error creating database entry: " . mysqli_error($con);
				  }
		}	
}
save_lead();
?>

<div id='leads_container' >

<?php  
// DISPLAY SAVED LEADS
if (include('../../../inc/connection.php')) {
	echo '<!-- connecton worked! -->';
} else {
	echo "connection didnt work. ";
}

$result = mysqli_query($con,"SELECT * FROM leads");

if (mysqli_fetch_array($result) == false) {
	echo '<p id="joinbutton">';
	echo 'You have no Leads :(.
	</p>';
}

if (mysqli_fetch_array($result)) {
			// TIME VALUES
		$todays_date = date('Y-m-d');
		$yesterdays_date = date('Y-m-d', strtotime("- 1 day"));
		$daybefore_date = date('Y-m-d', strtotime("- 2 days"));
		
		// GET LEAD RESULTS
		switch ($_GET['leads']) {
			case 'recent':
				$result = mysqli_query($con,"SELECT * FROM leads 
					WHERE /* follow_up_date='$todays_date' 
						OR follow_up_date='$yesterdays_date' 
						OR follow_up_date='$daybefore_date' 
						OR follow_up_date='$threedaysback' 
						OR follow_up_date='$fourdaysback' 
						OR follow_up_date='$fivedaysback' */
						ORDER BY `follow_up_date` DESC LIMIT 300");
				break;
			
			case 'all':
				$result = mysqli_query($con,"SELECT * FROM leads 
						ORDER BY `id` DESC LIMIT 300");
				break;
			case 'followed':
				$result = mysqli_query($con,"SELECT * FROM leads 
						WHERE approved=1
						ORDER BY `follow_up_date` DESC LIMIT 300");
				break;
			case 'unfollowed':
				$result = mysqli_query($con,"SELECT * FROM leads 
						WHERE approved=0
						ORDER BY `follow_up_date` DESC LIMIT 300");
				break;
			case 'third':
				$result = mysqli_query($con,"SELECT * FROM leads 
						WHERE approved=2
						ORDER BY `follow_up_date` DESC LIMIT 300");
				break;
			case 'priority':
				$result = mysqli_query($con,"SELECT * FROM leads 
						WHERE lead_name LIKE '%started%'
						OR lead_name LIKE '%payment%'
						OR lead_name LIKE '%create%'
						OR lead_name LIKE '%price%'
						ORDER BY `follow_up_date` DESC LIMIT 300");
				break;
			case 'today':
				$result = mysqli_query($con,"SELECT * FROM leads 
						WHERE follow_up_date LIKE '%$todays_date%'
						and `user_name` = '".$user_name_session."'
						ORDER BY `follow_up_date` DESC LIMIT 300");
				break;
			case 'yesterday':
				$result = mysqli_query($con,"SELECT * FROM leads 
						WHERE follow_up_date LIKE '%$yesterdays_date%'
						and `user_name` = '".$user_name_session."'
						ORDER BY `follow_up_date` DESC LIMIT 300");
				break;
			case 0:
				$result = mysqli_query($con,"SELECT * FROM leads 
					WHERE follow_up_date LIKE '%$todays_date%'
						OR follow_up_date='$yesterdays_date' 
						OR follow_up_date='$daybefore_date' 
						OR follow_up_date='$threedaysback' 
						OR follow_up_date='$fourdaysback' 
						OR follow_up_date='$fivedaysback'
						/*OR `user_name` = '".$user_name_session."' */
						ORDER BY `follow_up_date` DESC LIMIT 300");
				break;
		}
		if (isset($_GET['leads'])==false) {
			$lead_filter = 'DEFAULT';
		} else {
			$lead_filter = $_GET['leads'];
		}
		//echo 'Current View: '.$lead_filter. ' of user: '.$user_name_session;



echo '<table class="table col-md-12">';
		while($row = mysqli_fetch_assoc($result))
		{
		$lead_data[$row['lead_twitter']]['follow_up_date'] = $row['follow_up_date'];
		$lead_data[$row['lead_twitter']]['messages'][] = $row['lead_name'];


		//$leads[$lead_twitter]['date'] = $row['follow_up_date'];
		//$leads[$lead_twitter]['date'] = $row['follow_up_date'];
		//$leads[$lead_twitter]['comments'][] = $row['lead_name'];

		$number_of_leads = count($row);
		$lead_id = $row['id'];
		$lead_name = $row['lead_name'];
		$description = $row['lead_name'];
		$approved = $row['approved'];
		$lead_phone		=	$row['lead_phone'];
				if ($lead_phone == '0') {
					$lead_phone = "<label class='label-primary'>";
						$lead_phone .= "No Phone Saved";
					$lead_phone .= "</label'>";
				}
		$lead_email		=	$row['lead_email'];
		$lead_twitter =  str_replace(' ', '', trim($row['lead_twitter']));
		$follow_up_date = $row['follow_up_date'];
		$follow_up_date_time = strtotime($row['follow_up_date']);
		$follow_up_date_text = date('M/d',$follow_up_date_time);
		$lead_twitter_noat = str_replace('@', '', $lead_twitter);










		// LEAD FOLLOW UP
		$follow_up_tweet = urlencode("hit my DM.");
		//$follow_up_promote[0] = urlencode("send us music ASAP for the #FLMAG x #BSM1017 @MackDrama1017 Compilation Release on the 28th | pic.twitter.com/wKbIyokXN7");
		$follow_up_promote[0] = urlencode('#FLMAG physical copies just released 10.1.2014! Ready to start making major moves? https://cards.twitter.com/cards/gueorv/4ysp');
		$follow_up_promote[1] = urlencode("Check out our TOP ARTISTS with new releases on FREELABEL.net this week! | pic.twitter.com/48CjiSY9zt");
		$follow_up_promote[3] = urlencode("are you ready to get started making moves on your radio singles + Mag Interviews? call us 323-601-8111.");
		$follow_up_promote[2] = urlencode("we need your exclusives uploaded for this weeks magazine showcase. call us 323-601-8111.");
		$follow_up_promote[4] = urlencode($main_follow_up);
			
		

		$follow_up_promote[5] = urlencode("call us 323-601-8111");
		















		//$follow_up_promote[4] = urlencode('#CHAMPSvol3 the Documentary + Compliation EP Release Event Jan. 24th. Register to get booked at FREELABEL.net | pic.twitter.com/CO99mPMcdm');
		//$follow_up_promote[4] = urlencode('Dropping new ARTISTS, CLOTHING, + SINGLES at #TheTakeover Compilation Showcase in DTX! pic.twitter.com/DZjIHTmLVv');
		$key = $lead_id;



		
		//APPROVAL FOLLOW UP!!!
		//APPROVAL FOLLOW UP!!!
		//APPROVAL FOLLOW UP!!!
		//APPROVAL FOLLOW UP!!!
		switch ($approved) {
			case 0:
				$approval_follow_up		=	'http://freelabel.net/som/index.php?dm=1&t='.$lead_twitter_noat.'&text=%20'.$value_builder[0];
				$approval_status = "<form id='delete_form_".$key."' method='POST' style='display:inline;' action='http://freelabel.net/submit/update.php' ><input name='lead_id' type='hidden' value='".$lead_id."'><input name='approval_follow_up' type='hidden' value='".$approval_follow_up."'><input name='approval_action' type='hidden' value='1'></form><button onclick='followUpLead(".$key.")' class='btn btn-danger btn-xs'>UNFOLLOWED <span class='glyphicon glyphicon-refresh' style='font-size:100%;padding:1%;' ></span></button>";
				break;
			case 1:
			// FOLLOWED UP
				$approval_follow_up		=	'http://freelabel.net/som/index.php?dm=1&t='.$lead_twitter_noat.'&text=%20'.$value_builder[1];
				$approval_status = "<form id='delete_form_".$key."' method='POST' style='display:inline;' ><input name='lead_id' type='hidden' value='".$lead_id."'><input name='approval_follow_up' type='hidden' value='".$approval_follow_up."'><input name='approval_action' type='hidden' value='2'></form><button onclick='followUpLead(".$lead_id.")' class='btn btn-success btn-xs' >FOLLOWED <span class='glyphicon glyphicon-refresh' style='font-size:100%;'></span></button>";
				break;
			case 2:
				$approval_follow_up		=	'http://freelabel.net/som/index.php?dm=1&t='.$lead_twitter_noat.'&text=%20'.$value_builder[2];
				$approval_status = "<form id='delete_form_".$key."' method='POST' style='display:inline;' action='http://freelabel.net/submit/update.php' ><input name='lead_id' type='hidden' value='".$lead_id."'><input name='approval_follow_up' type='hidden' value='".$approval_follow_up."'><input name='approval_action' type='hidden' value='3'></form><button onclick='followUpLead(".$key.")' class='btn btn-warning btn-xs'>THIRD FOLLOW <span class='glyphicon glyphicon-refresh' style='font-size:100%;padding:1%;' ></span></button>";
			break;
		}

			$send_DM	= '<a href="https://twitter.com/'.$lead_twitter_noat.'/" class="btn btn-primary btn-xs" target="_blank" role="menuitem" tabindex="-1" ><span class="glyphicon glyphicon-comment"></span> - Convo</a>';
			//echo '<a href="https://twitter.com/'.$lead_twitter_noat.'/" class="download_button" target="_blank" >SENDMAG</a>';
			$check_tracks	= '<a href="http://freelabel.net/search/x.php?search_text='.$lead_twitter_noat.'&submit=Submit" class="btn btn-default btn-xs"target="_blank" role="menuitem" tabindex="-1" ><span class="glyphicon glyphicon-music"></span> - Tracks</a>';
			$public_promotions	= '<h3>Public Promo</h3><a href="http://freelabel.net/som/index.php?post=1&text=@'.$lead_twitter_noat.'%20'.$leadScript[5].'" target="_blank" class="btn btn-default btn-xs" role="menuitem" tabindex="-1" ><span class="glyphicon glyphicon-plus"></span> - Promote</a>';
			$public_promotions	.= '<a href="http://freelabel.net/som/index.php?post=1&text=@'.$lead_twitter_noat.'%20'.$leadScript[6].'" target="_blank" class="btn btn-default btn-xs" role="menuitem" tabindex="-1" ><span class="glyphicon glyphicon-plus"></span> - Promote 2</a>';
			$public_promotions	.= '<a href="http://freelabel.net/som/index.php?post=1&text=@'.$lead_twitter_noat.'%20'.$leadScript[7].'" target="_blank" class="btn btn-default btn-xs" role="menuitem" tabindex="-1" ><span class="glyphicon glyphicon-plus"></span> - Promote 3</a>';
			$public_promotions	.= '<a href="http://freelabel.net/som/index.php?post=1&text=@'.$lead_twitter_noat.'%20'.$leadScript[8].'" target="_blank" class="btn btn-default btn-xs" role="menuitem" tabindex="-1" ><span class="glyphicon glyphicon-plus"></span> - Promote 4</a>';
			$public_promotions	.= '<a href="http://freelabel.net/som/index.php?post=1&text=@'.$lead_twitter_noat.'%20'.$leads_conversion->getCurrentCampaign().'" target="_blank" class="btn btn-default btn-xs" role="menuitem" tabindex="-1" ><span class="glyphicon glyphicon-plus"></span> - Promote Events</a>';
			$send_email	= '<a onclick="sendEmail(\''.$lead_email.'\' )" &text=@'.$lead_twitter_noat.'%20'.$follow_up_promote[4].'" target="_blank" class="btn btn-default btn-xs" role="menuitem" tabindex="-1" ><span class="glyphicon glyphicon-plus"></span> - Email</a>';
			$call_us	= '<a href="http://freelabel.net/som/index.php?dm=1&t='.$lead_twitter_noat.'&text='.$follow_up_promote[5].'" target="_blank" class="btn btn-default btn-xs" role="menuitem" tabindex="-1" ><span class="glyphicon glyphicon-phone-alt"></span> - Call</a>';
			$need_music	= '<hr><h3>Direct Messages</h3><a href="http://freelabel.net/som/index.php?dm=1&t='.$lead_twitter_noat.'&text='.$value_builder[0].'" target="_blank" class="btn btn-default btn-xs" role="menuitem" tabindex="-1" ><span class="glyphicon glyphicon-question-sign"></span>6) '.urldecode(substr($leadScript[5],0,80)).'...</a>';
			$need_music	.= '<a href="http://freelabel.net/som/index.php?dm=1&t='.$lead_twitter_noat.'&text='.$leadScript[1].'" target="_blank" class="btn btn-default btn-xs" role="menuitem" tabindex="-1" ><span class="glyphicon glyphicon-question-sign"></span>  7): '.urldecode(substr($leadScript[7],0,80)).'...</a>';
			$need_music	.= '<a href="http://freelabel.net/som/index.php?dm=1&t='.$lead_twitter_noat.'&text='.$leadScript[2].'" target="_blank" class="btn btn-default btn-xs" role="menuitem" tabindex="-1" ><span class="glyphicon glyphicon-question-sign"></span> 8) '.urldecode(substr($leadScript[2],0,80)).'...</a>';
			$need_music	.= '<a href="http://freelabel.net/som/index.php?dm=1&t='.$lead_twitter_noat.'&text='.$leadScript[3].'" target="_blank" class="btn btn-default btn-xs" role="menuitem" tabindex="-1" ><span class="glyphicon glyphicon-question-sign"></span> 9) '.urldecode(substr($leadScript[3],0,80)).'...</a>';
			$need_music	.= '<a href="http://freelabel.net/som/index.php?dm=1&t='.$lead_twitter_noat.'&text='.$leadScript[4].'" target="_blank" class="btn btn-default btn-xs" role="menuitem" tabindex="-1" ><span class="glyphicon glyphicon-question-sign"></span> 10) '.urldecode(substr($leadScript[4],0,80)).'...</a>';
			$need_music	.= '<a href="http://freelabel.net/som/index.php?dm=1&t='.$lead_twitter_noat.'&text='.$leadScript[5].'" target="_blank" class="btn btn-default btn-xs" role="menuitem" tabindex="-1" ><span class="glyphicon glyphicon-question-sign"></span> 11) '.urldecode(substr($leadScript[6],0,80)).'...</a><hr>';
			$delete_lead =  "<form id='delete_lead_".$key."' method='POST' action='http://freelabel.net/submit/deletesingle.php' ><input name='lead_id' type='hidden' value='".$lead_id."'></form><button onclick='delete_lead(".$lead_id.")' class='btn btn-danger btn-xs'><i class='fa fa-trash' ></i></button>";
			
			$lead_data[$row['lead_twitter']]['embed'] = '<a href="https://twitter.com/intent/tweet?screen_name='.$lead_twitter_noat.'&text='.$follow_up_tweet.'" target="_blank" ></a>

			
						
';

			
			
			
			
		}

		/* --------------------------------------------------------------------------------
		GRAB ALL SCRIPT VALUES
		--------------------------------------------------------------------------------*/
		//$load_responses
		
		//echo '<pre>';
		//echo '</pre>';
		/* --------------------------------------------------------------------------------
		GRAB ALL SCRIPT VALUES
		--------------------------------------------------------------------------------*/
		

		//
		//echo '<pre>';
			//print_r($lead_data);
		//echo '</pre>';
		//print_r($lead_data);
	foreach ($lead_data as $key => $user) {


		// create lead messages block
		// $lead_messages = 
		$lead_messages = '';
		foreach ($user['messages'] as $int => $text) {
			$lead_messages .= $int.'. '.$text.'<br>';
		}


		echo '<tr id="lead_panel'.$key.'">

				<td>
					<br>
					<span class="text-muted">'.$user['follow_up_date'].'</span>
					<br>

				  	<h3 class="lead-name">'.$key.'</h3>
					<div class="dropdown">
					  <button class="btn btn-social btn-primary leadResponseToggle"  data-lead="'.$key.'" data-toggle="modal" data-target="#leadMessagingModal" type="button">Responses
						  <span class="caret"></span>
					  </button>
					  <p class="lead-messages">'.$lead_messages.'</p>
					  <ul class="dropdown-menu">
					    '.$leads_conversion->loadScriptPromos($key).'
					    <hr>
					    '.$leads_conversion->loadScript($key).'
					  </ul>
					</div>


				</td>

					
				<td style="font-size:80%;">
					<!-- <p onclick="editLead('.$key.')" id="lead_desc_'.$key.'" style="font-size:70%;" >'.$description.'</p>
					<input onclick="editLead('.$key.')" id="lead_edit_'.$key.'" type="text" class="form-control" value="'.$description.'" style="display:none;"> --> 

					<h4><a href="http://twitter.com/@'.$key.'" target="_blank">'.$key.'</a> ['.count($user['messages']).']</h4>
					<p>'.$lead_phone.'</p>
					<p>'.$lead_email.'</p>

					
				</td>

				<td>
				'.$delete_lead.'




				
				</div>



				<!--<span class="btn btn-success" onclick="openLeadControls(\''.$key.'\')"><i class="glyphicon glyphicon-th-large" ></i> '.$key.'</span>
						<div class="lead_conversion_controls panel panel-body" id="lead_conversion_controls_'.$key.'">
							<h2>Direct Messages '.$key.'</h2>
							
							<span class="lead_button" role="presentation">'.$send_email.'</span>
							<span class="lead_button" role="presentation">'.$call_us.'</span>
						    <span class="lead_button" role="presentation">'.$send_DM.'</span>
						    <span class="lead_button" role="presentation">'.$check_tracks.'</span>
						    <span class="lead_button" role="presentation">'.$need_music.'</span>
						    <span class="lead_button" role="presentation">'.$public_promotions.'</span>
						</div>
					-->
				</td>

			</tr>';

	}
	echo '</table>';
mysqli_close($con);
} else {
	echo 'didnt work - ';
}
?>
</div>
<?php 
	// VIEW MODEL
	// echo $submit_form; 
?>

<script type="text/javascript">
$(function() {
	function openLeadControls(id) {
		alert(id);
		var leadControls = $('#lead_conversion_controls_' + id);
		if (leadControls.css('display') == 'none') {
			leadControls.fadeIn(500);
		} else {
			leadControls.fadeOut(500);
		}	
	}

	$('.leadResponseToggle').click(function(){
		var sibs = $(this).siblings();
		var rents = $(this).parent().parent().siblings();
		var wrapper = $(this).parent().parent().parent();
		wrapper.hide('fast');
		$('#leadMessagingModal .modal-body').html(sibs);
		var leadName = $(this).attr('data-lead');
		$('#leadMessagingModal .dropdown-menu').css('display','block');
		$('#leadMessagingModal .dropdown-menu').css('position','relative');
		$('#leadMessagingModal .modal-title').html('Reply: @' + leadName);
		$('.lead-reply-user').val(leadName);
	}); 

	$('#lead-reply').submit(function(event){
		event.preventDefault();
		var data = $(this).serializeArray();
		$(this).prepend('<span class="form-result">Please Wait..</span>');
		shareTwitter(data[0].value , data[1].value);
	});

	$('.script-responses a').click(function(event){
		event.preventDefault();
		var url = $(this).attr('href');
		var wrap = $(this).parent();
		var c = confirm('Are you sure you want to send this message');
		if (c==true) {
			// alert(url);
			wrap.html('<span class="text-warning" >Sending message..</span>');
			$.get(url,function(data){
				// alert(data);
				wrap.html('<span class="text-success" >Message sent!</span>');
				setTimeout(function(){
					wrap.hide('fast');
				}, 3000);

			});
		}
	});

});
</script>



</section>




<!-- Modal -->
<div class="modal fade" id="leadMessagingModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
        <h4 class="modal-title" id="myModalLabel">Reply To: </h4>
      </div>
      <div class="modal-form col-md-5">
      	<form id="lead-reply">
      		<textarea name="message" rows="5" class="form-control" type="text" placeholder="Type message.." ></textarea>
      		<input type="submit" class="btn btn-block btn-secondary-outline submit-button"  value="Send"></input>
      		<input type="hidden" name="user" class="lead-reply-user" ></input>
      	</form>
      </div>
      <div class="modal-body col-md-7">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>





