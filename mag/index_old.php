<?php

	if ($_GET['submit'] == 'SUBSCRIBE' && isset($_GET['duration'])) {
		$duration 	=	$_GET['duration'];
		echo $magazine[1];
		$i == $duration;
		switch ($i) {
		    case 1:
		        $link_to_bae = "$8 for one month";
		        break;
		    case 6:
		        $link_to_bae = "$35 for six months";
		        break;
		    case 12:
		        $link_to_bae = "$65 for twelve months";
		        break;
		    default:
		     	$link_to_bae = "$65 for twelve months";
		        break;
		}
		echo "
			<script>
				alert('Thank You For Subscribing! You will now be re-directed to make your payment!');

				window.location.assign('https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=J67CSAKQMWDT8');
			</script>
		";
	}





	$page_title = "MAG";
	$page_desc = "<h1>We Always Get New Music, Before it Gets Out.</h1>We always get music weeks, or even months, before they hit mainstream. We have DJs, Record Label A&R's and Artist Management companies send us music directly so we can get it to you guys first.";
	$stream_pull = "blog";
	$current_page = $_GET['page'];
	if($current_page 	== false) {
		$db_start 	= 	0;
	} elseif ($current_page 	== 1) {
		$db_start 	=	0;
	} else {
		$db_start 	=	$current_page * 24;
	}

	include('../header.php');
?>
<style>
#bae_panel {
	margin-top:2%;
}
#registration_form {
	padding:2%;
	margin:2%;
	width:40%;
}
</style>
<center>
	
	<a name="mag">


		
<a id="navimenu" href="http://mag.freelabel.net/#buy" style="display:inline-block;" >Subscribe to FREELABEL MAGAZINE to get updates & free stuff right at your doorstep --></a>

<br><br>

<?php

	include('pagination.php');
?>

<div id="bae_panel" >

	<?php
	$pull = 'order';
		include('pull_mag.php');
	?>
</div>
	<a name="buy">
<hr>

	
<div id="body" style="width:40%;background-color:#e3e3e3;font-size:150%;display:inline-block;color:#000;" >
	<h1 class="sub_title" >Subscribe</h1>
		<p id='para_text' style="color:#000;" >
			Get FREELABEL MAGAZINE delivered directly to your doorstep for only $8 a month! You'll get exclusive access to our events, discounts on clothing, and a FREELABEL profile to FREELY download exclusive music from your favorite artists.
			<br>
			<br>
			<hr>
			<br>
			<br>
			<form method='get' action='index.php'> 
				Subscription Duration: <select name="duration"><br><br>
					<option value="1" >1 Month - $8</option>
					<option value="6" >6 Months - $30</option>
					<option value="12" >12 Months - $65</option>
				</select>
				
				<input type="text" placeholder='Enter Name..' >
				<input type="text" placeholder='Enter Address to ship magazine to..' >
				<input type="text" placeholder='Enter Email Address..' >
				<input type='submit' name="submit" value="SUBSCRIBE" class='download_button'>
			</form>
		</p>
</div>




</center>

<?php include('../footer.php'); ?>?>