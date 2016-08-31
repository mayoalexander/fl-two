<style type="text/css">
	#submissions td {
		color:#e3e3e3;
	}
	#submissions .btn {
		padding:0.5em;
	}
</style>

<a name="submissions">
<!-- 	<h2 id="subtitle">SUBMISSIONS</h2>
	<?php //$tweetmessage_submit = urlencode("SUBMIT MUSIC TO ---> submit.FREELABEL.net"); ?>
	<a target="_blank" id="navimenu" href="https://twitter.com/intent/tweet?screen_name=&text=<?php //echo $tweetmessage_submit; ?>" class="twitter-mention-button" data-related="FreeLabelNet">SUBMIT MUSIC</a>
	<a id="navimenu" target="_blank" href="http://singles.FREELABEL.net/" >Open Singles >>></a>
<br><br> 
-->
<?php
include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');

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
	$filetype = $row['filetype'];

	$trackmp3 = str_replace("amradiolive.com", "freelabel.net", $trackmp3);
	$trackname = $row['trackname'];
	


	echo "<tr class='card card-chart'>";
					echo "<td>\"".$trackname."\"</td>";
						echo "<td  >".get_timeago(strtotime($submission_date))."</td> ";
						echo '	<td><a target="_blank" href="https://twitter.com/intent/tweet?screen_name='.$twitter_name_clean.'&text='.$follow_up_message.'" class="twitter-mention-button" data-count="vertical" data-related="AMRadioLIVE">'.$twitter_name.'</a></td> ';
						echo '	<td><a class="btn btn-default" target="_blank" href="https://mobile.twitter.com/'.$twitter_name_clean.'/messages" ><span class="glyphicon glyphicon-folder-open"></span></a></td> ';

									$email2send = str_replace("+", " ", $email2send);
									$subjecttosend = str_replace("+", " ", $subjecttosend);
						// REQUEST CALL	
						echo '<td><a class="btn btn-default" href="#" >'.$phone.'</a></td>';
						// OPEN PLAYER PAGE
						echo '<td><a class="btn btn-default" href="'.$playerpath.'"><span class="glyphicon glyphicon-fullscreen"></span></td>';
						
						
						
						echo "<td>";
								if($approved == true) {
									// $approval_status = "<span id='btn btn-success' >APPROVED</span>";
									// echo ' - <a class="btn btn-default" href="'.$trackmp3.'">'.$approval_status.'</a>';
									$approval_status = "APPROVED";
									 echo "<form class='approve-form' method='POST' style='display:inline;' action='update.php' >
									 <input name='submission_id' type='hidden' value='".$submission_id."'>
									 <input name='radio_mp3' type='hidden' value='".$row['trackmp3']."'>
									 <input name='radio_title' type='hidden' value='".$row['blogtitle']."'>
									 <input name='radio_twitter' type='hidden' value='".$row['twitter']."'>
									 <input name='radio_user' type='hidden' value='".$row['user_name']."'>
									 <input type='submit' class='btn btn-success' value='VERIFIED'></form>";
								} elseif($approved == false && $filetype == 'audio/mp3') {
									$approval_status = "NOT APPROVED";
									 echo "<form class='approve-form' method='POST' style='display:inline;' action='update.php' >
									 <input name='submission_id' type='hidden' value='".$submission_id."'>
									 <input name='radio_mp3' type='hidden' value='".$row['trackmp3']."'>
									 <input name='radio_title' type='hidden' value='".$row['blogtitle']."'>
									 <input name='radio_twitter' type='hidden' value='".$row['twitter']."'>
									 <input name='radio_user' type='hidden' value='".$row['user_name']."'>
									 <input type='submit' class='btn btn-warning' value='APPROVE'></form>";
								} else {
									$approval_status = "NOT APPROVED";
									 echo "<form class='approve-form' method='POST' style='display:inline;' action='update.php' >
									 <input name='submission_id' type='hidden' value='".$submission_id."'>
									 <input name='radio_mp3' type='hidden' value='".$row['trackmp3']."'>
									 <input name='radio_title' type='hidden' value='".$row['blogtitle']."'>
									 <input name='radio_twitter' type='hidden' value='".$row['twitter']."'>
									 <input name='radio_user' type='hidden' value='".$row['user_name']."'>
									 <input type='submit' class='btn btn-warning' value='APPROVE'></form>";
								}
						echo "</td>";
						
						echo "<td><form method='POST' style='display:inline;' action='http://freelabel.net/submit/deletesingle.php' ><input name='submission_id' type='hidden' value='".$submission_id."'><input type='submit' class='btn btn-danger' value='DELETE'></form></td>";
										// AUDIO PLAYER
										//echo '<span class="dashboard_button" ><audio preload="none" controls><source src="'.$trackmp3.'"></audio></span><br><hr><br>';
						
	echo "</tr>";
}
echo "</table>";
?>
<script type="text/javascript">
function updateID3(mp3file, trackname, twittername) {
			$.get('http://freelabel.net/config/id3/demos/demo.simple.write.php', {
					mp3: mp3file,
					title: trackname,
					artist: twittername
				},function(result){
					// alert(result);
					if (result == 'Success!') {
						/* it worked! proceed with processing*/
						return true;
						console.log(result);
						console.log('it worked! proceed with processing');
					} else {
						alert('Something went wrong with the writing of the ID3 Tags. Maybe the file type was not correct.');
						console.log(result);
						return false;
					}
					
			});
}



	$('.approve-form').submit(function(event){
		event.preventDefault();
		var data = $(this).serializeArray();
		var elem = $(this);
		var element = $(this).find('.btn');
		element[0].value = 'SAVING..';

		// element[0].addClass('disabled');
		// var element = $(this).find('.btn').get(0).addClass('disabled');

		// console.log(element);
		// element.text('Saving..');
		// element.addClass('disabled');
		// element.addClass('btn btn-default');
		// alert(data);
		// console.log(data);
		// alert(data[1]['value']);
		var init = updateID3(data[1]['value'], data[2]['value'] ,data[3]['value']);
		// console.log(init);
		// console.log(init);
		// if (init === true) {
		$.post('http://freelabel.net/submit/update.php', data, function(result) {
					// alert(result);
					elem.text('Approved!');
		});
		// } else {
		// 	element.html('failed..');
		// }
		// alert(init);
		// console.log(init);

	}); 





</script>






