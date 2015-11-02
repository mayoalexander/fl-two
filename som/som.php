<?php 
	include('../new_header.php');
	$message_to_send	=	$_GET['m'];
?>

<form method="post" action="http://freelabel.net/som/som.php" style='margin-top:5%;'>
	<textarea class='form-control' rows='20' cols='100' name="page_html" placeholder='Paste API Results Here' ></textarea>
	<input type='text' class='form-control' rows='20' cols='100' name="som_tweet_to_send" placeholder='Enter Message To Send..' value="<?PHP echo $message_to_send; ?>" >
	<input type='submit' value='find users' class='btn btn-primary'>
</form>


<?php 
if($_POST) {
	$som_twitpic	=	'https://cards.twitter.com/cards/gueorv/9fou';
	//$som_tweet[1] = urlencode('send us music for TODAYS LIVE Broadcast at @RiBZClothing #DallasTakeover @ Epocha 6PM | Followback & DM | '.$som_twitpic);
	
	// THIS IS THE CURRENT ONE IM USING!!!!
	  	
	$som_tweet[2] = urlencode('Looking for NEW music to showcase in #FLMAG Articles & Compilation w/ #BSM1017! Followback&DM | '.$som_twitpic);
	$som_tweet[3] = urlencode('Lets WORK. send music for Project Releases, Music Reviews, Interviews for RADIO/MAG! Followback&DM | '.$som_twitpic);
	$som_tweet[4] = urlencode('Send us new music to release on #TheTakeover Compilation Broadcasting LIVE @ Ephocha DTX | pic.twitter.com/DZjIHTmLVv');
	$hrs	=	date('h');
	// $hrs	=	11; 
	// echo $hrs;
	if ($hrs < 4) {
		// before 10AM
		$som_tweet_to_send = $som_tweet[1] ;
	} elseif ($hrs >= 4 AND $hrs < 8) {
		// after 10PM before 
		$som_tweet_to_send = $som_tweet[2] ;
	} elseif ($hrs >= 8 AND $hrs < 12) {
		$som_tweet_to_send = $som_tweet[3] ;
	}

	$page_html	= $_POST['page_html'];

		//$twitter_stream = file_get_contents('https://twitter.com/search?f=realtime&q=my%20soundcloud.com%20OR%20datpiff.com%20OR%20audiomack.com%20OR%20spinrilla.com%20lang%3Aen&src=savs');
		//print_r($twitter_stream) ;
	$str = $page_html;
	$toFind = "[screen_name] => ";
	$start = 0;
	$all_user_names = array("0");
	for ($i=0; $i < 75 ; $i++) { 
		$pos = strpos(($str),$toFind,$start);
		if ($pos != 0) {
			$user_twitter_name =  substr($str, $pos + 17 ,30);
			$ending_pos	= strpos($user_twitter_name, ' ');
			$user_twitter_name = trim($user_twitter_name);

			foreach ($all_user_names as $already_saved) {
				print_r($already_saved);
				echo ', ';
			}

//checks if exists 
			if (in_array($user_twitter_name, $all_user_names)) {
	// do nothing
				echo 'sadfasfd'.$user_twitter_name.' already saved <hr>';
				$all_user_names[$i] = $user_twitter_name;
$start = $pos+1; // start searching from next position.
} else {
	$all_user_names[$i] = $user_twitter_name;


// DETECT WHICH MESSAGE TO SEND
//$som_tweet[1] = urlencode("[SUBMIT]

//upload music to --> FREELABEL.net ".$user_twitter_name." | Followback&DM".$twitpic);





				// radom sending
	$randomization = rand(1,1);
	$som_tweet_to_send = $som_tweet[$randomization];
	if ($_POST['som_tweet_to_send']) {
		$som_tweet_to_send	= $_POST['som_tweet_to_send'];
	}




	/* --------------------------------------------------------------------------------
	GRAB ALL SCRIPT VALUES 
	--------------------------------------------------------------------------------*/
	include('../inc/connection.php'); 
	$query = "SELECT * FROM script ORDER BY `id` DESC LIMIT 1";
	$result = mysqli_query($con,$query);
	$sii=1;
	if($row = mysqli_fetch_array($result))
	  {
	  	$send_out_message = $row['send_out'];
	  	$som_tweet_to_send = urlencode($row['send_out']);
	  	//echo $i . ') '.$send_out_message;
	  	$sii++;
	  	//print_r($row);
	  }

	/* --------------------------------------------------------------------------------
	GRAB ALL SCRIPT VALUES
	--------------------------------------------------------------------------------*/
	




	echo '<div id="found_results" >Found @'.$user_twitter_name.' at '.$pos.'</div>';
	$send_tweet = '<br><a href="https://twitter.com/intent/tweet?screen_name='.$user_twitter_name.'&text='.$som_tweet_to_send.'" class="btn btn-primary" role="button" target="_blank">SOM</a>';
	echo '
	<script>
		window.open("http://freelabel.net/som/index.php?post=1&text=@'.$user_twitter_name.'&text=@'.$user_twitter_name.'+'.$som_tweet_to_send.'")
	</script>
	';
	echo $send_tweet.'<hr>';
				$start = $pos+1; // start searching from next position.

			}


		}

				} // end for loop
} // end post if
?>




<?php include('../new_footer.php'); ?>
