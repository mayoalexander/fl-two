<a name="submissions">
	<h2 id="subtitle">SUBMISSIONS</h2>
	<?php $tweetmessage_submit = urlencode("SUBMIT MUSIC TO ---> submit.FREELABEL.net"); ?>
	<a target="_blank" id="navimenu" href="https://twitter.com/intent/tweet?screen_name=&text=<?php echo $tweetmessage_submit; ?>" class="twitter-mention-button" data-related="FreeLabelNet">SUBMIT MUSIC</a>
	<a id="navimenu" target="_blank" href="http://singles.FREELABEL.net/" >Open Singles >>></a>
	<br><br>
	

<?php
include_once('/home/content/59/13071759/html/config/index.php');

$subjecttosend = urlencode("YOUR SUBMISSION HAS BEEN APPROVED");
$email2send = urlencode('	Thank you for submitting your music! Our DJs reviewed your submission and had me reach out to you personally to get your music broadcasted all this month.

	This year, we’re bringing up a new wave of successful artists into the spotlight this year. When you are ready to get your music in rotation, please register and create your account at http://submit.FREELABEL.net and start organizing your campaign, booking your interviews + showcases, and upload new singles to rotation for our DJs to work with. 						
	
	Let me know when you make that move so I can get your interviews booked for this month. Feel free to give me (Alex) a call at 347-994-0267 so we can get your account created!');

// IF ARTIST PROFILE EXISTS, EXECUTE TO BOOK SHOWCASES
include(ROOT.'inc/connection.php');
$yesterdays_date = date('Y-m-d', strtotime("- 1 day"));
$todays_date_sql = date('Y-m-d', strtotime("today"));
$daybefore_date = date('Y-m-d', strtotime("today"));
$result = mysqli_query($con,"SELECT * FROM feed 
	ORDER BY id DESC LIMIT 100");
// 	AND submission_date LIKE '%$todays_date_sql%'  FOR GRABBING TODAYS SUBMIS
echo "<table class='table table-striped' id='submissions' >";
while($row = mysqli_fetch_array($result))
  {
  	if ($row['twitter']) {
  		$twitter_name = $row['twitter'];
  	} else {
  		$twitter_name= "didngwork";
  	}
		$follow_up_message = "Call us 347-994-0267.";
		$twitter_name_clean = str_replace("@", "", $twitter_name);
		$follow_up_message = urlencode($follow_up_message);

	$phone = $row['phone'];
	$submission_date = date('D, M d Y h:i',strtotime($row['submission_date']));
	$submission_id = $row['id'];
	$email = $row['email'];
	$trackmp3 = $row['trackmp3'];
	$playerpath = $row['playerpath'];
	$approved = $row['approved'];

	$trackmp3 = str_replace("amradiolive.com", "freelabel.net", $trackmp3);
	$trackname = $row['trackname'];
	


	echo "<tr>";
					echo "<td>\"".$trackname."\"</td>";
						echo "<td  >".get_timeago(strtotime($submission_date))."</td> ";
						echo '	<td><a target="_blank" href="https://twitter.com/intent/tweet?screen_name='.$twitter_name_clean.'&text='.$follow_up_message.'" class="twitter-mention-button" data-count="vertical" data-related="AMRadioLIVE">'.$twitter_name.'</a></td> ';
						echo '	<td><a class="btn btn-default" target="_blank" href="https://mobile.twitter.com/'.$twitter_name_clean.'/messages" ><span class="glyphicon glyphicon-folder-open"></span></a></td> ';
						
									$email2send = str_replace("+", " ", $email2send);
									$subjecttosend = str_replace("+", " ", $subjecttosend);
						// PLAY SONG
						echo '<td><a class="btn btn-default" target="_blank" href="'.$trackmp3.'"><span class="glyphicon glyphicon-play" ></span></a></td>';
						// SEND EMAIL
						echo '<td><a class="btn btn-default" target="_blank" href="http://x.freelabel.net/sendmail.php?to=artist&t='.$twitter_name.'&e='.$email.'&p='.$phone.'&n='.urlencode($trackname).'"><span class="glyphicon glyphicon-envelope"></span></a></td>';
						// REQUEST CALL	
						echo '<td><a class="btn btn-default" href="#" >'.$phone.'</a></td>';
						// OPEN PLAYER PAGE
						echo '<td><a class="btn btn-default" href="'.$playerpath.'"><span class="glyphicon glyphicon-fullscreen"></span></td>';
						
						
						
						echo "<td>";
								if($approved == true) {
									$approval_status = "<span id='btn btn-success' >APPROVED</span>";
									echo ' - <a class="btn btn-default" href="'.$trackmp3.'">'.$approval_status.'</a>';
								} else {
									$approval_status = "NOT APPROVED";
									 echo "<form method='POST' style='display:inline;' action='update.php' ><input name='submission_id' type='hidden' value='".$submission_id."'><input type='submit' class='btn btn-warning' value='APPROVE'></form>";
									
								}
						echo "</td>";
						
						echo "<td><form method='POST' style='display:inline;' action='http://freelabel.net/submit/deletesingle.php' ><input name='submission_id' type='hidden' value='".$submission_id."'><input type='submit' class='btn btn-danger' value='DELETE'></form></td>";
										// AUDIO PLAYER
										//echo '<span class="dashboard_button" ><audio preload="none" controls><source src="'.$trackmp3.'"></audio></span><br><hr><br>';
						
	echo "</tr>";
}
echo "</table>";
?>






