<?php
$user_name = $_SESSION['user_name'];

?>


<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<title>..::AMRadioLIVE::..</title>
	
	<meta name="Description" content="AMRadioLIVE is the Leader in Online Showcasing">
	<meta name="Keywords" content="AMRadioLIVE, amradio, am radio live, texas, music, promotion, hip hop, rap">
	<meta name="Copyright" content="AMRadioLIVE">
	<meta name="Language" content="English">
	
	<script type="text/javascript">

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-40470023-1']);
	  _gaq.push(['_setDomainName', 'amradiolive.com']);
	  _gaq.push(['_trackPageview']);

	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();

	</script>
	
<link rel="stylesheet" type="text/css" href="../css/style.css">
   <style>
		p {
			font-size:90%;
		}
		#joinbutton {
			text-align:right;
		}

		td {
			vertical-align:text-top;
			font-size:80%;
		}
		#jointheteam {
			font-size:90%;
		}

		</style>

	<!--scripts START -->
    <script src="../js/accounts.js"></script>
	<!--scripts END -->
</head>

<body>
    <div id="container">

	<h1 id="logo"><img width="250px" src="http://amradiolive.com/images/amrhead.png" alt="AMRadioLIVE"></h1>
	<div id="breaking"></div>
        
<table id="body" >
<tr>

<td>

<?php
include('../inc/connection.php');

$result = mysqli_query($con,"SELECT * FROM updates");

echo "<h2>UPDATES:</h2><table>";

while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td width='' ><ul><li>" . $row['updates'] . "</li></ul></td>";
  echo "</tr>";
  }
echo "</table>";
mysqli_close($con);
?>

</td>

</tr>
</table>
        
				        <h2 id="subtitle">UPGRADE ACCOUNT </h2>

					        <table id="body">
					            <tr>
					                <td>
					
					

					<table id="prices" width="100%">
					<tr>
					<td width="50%" ><h2 id="pricing1" >EXCLUSIVE:</h2>
					<li id="xxxxxxxx" >International Viral Marketing</li>
					<li id="xxxxxxxx" >Multi-Media Campaign Management</li>
					<li id="xxxxxxxx" >Radio, Blog, Magazine, Tour & Event Placement</li>
					<li id="xxxxxxxx" >Single, Mixtape, or Project Releases</li>
					<li id="xxxxxxxx" >Mixtape Hosting + Distribution</li>
					<li id="xxxxxxxx" >Merchandise Distribution</li>
					<li id="xxxxxxxx" >Website & Application Development</li>
					<li id="xxxxxxxx" >Industry Release Date Consultation</li>
					<li id="xxxxxxxx" >Blog Submissions to over 2,000+ Blogs and Websites</li>
					<li id="xxxxxxxx" >Dashboard Control Panel for Submitting Singles, Mixtapes, Interviews, Videos to AMRadioLIVE for promotions</li>


					</td>
						<td width="50%" ><h2 id="pricing1" >FEATURED ARTIST:</h2>
							<li id="xxxxxxxx" >International Viral Marketing</li>
							<li id="xxxxxxxx" >Radio Placements</li>
							<li id="xxxxxxxx" >Website & Interview Features</li>
							<li id="xxxxxxxx" >Single, Mixtape, or Project Releases</li>


						</td>

						
						
								<td><h2 id="pricing1" >UPLOAD:</h2>


						<br>
							<form method="POST" action="uploadsubmit.php" name="submissions" enctype="multipart/form-data">
								<fieldset>
									<legend><h4>Single Submission</h4></legend>
								Twitter: <br><input type="text" name="twittername" value="@"required ><br>
								Track Name: <br><input type="text" name="trackname" value=""required><br>
								Email: <br><input type="text" name="email"required><Br>
								<input type="hidden" name="user_name" value="<?php echo $user_name ?>">
								<input type="file" name="file" id="file"required>
								<input type="submit" name="submit" value="Upload Submission">
								</fieldset>
							</form></td>
							
					</tr>
					
					
<!-- THIRD ROW OF PACKAGE INFO-->
					<tr>
					<td><a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=M3N4GH5UXCSGG"><div class="pricerate">$199/MO.</div></a>
					</td>
					<td><a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=6AB3H8X3REK6L"><div class="pricerate">$35/MO.</div></a></td>
					<td>
					
					
							<script src="http://cdn.jotfor.ms/static/feedback2.js?3.1.1096" type="text/javascript">
								new JotformFeedback({
								formId:'33292984910966',
								base:'http://jotformpro.com/',
								windowTitle:'Single Promotion - $25',
								background:'#FFA500',
								fontColor:'#FFFFFF',
								type:2,
								height:500,
								width:700
								});
								</script>
							<a class="lightbox-33292984910966" style="cursor:pointer;"><div class="pricerate">$15/EA.</div></a>					



					
					</td>
					
					</tr>

					</table>




					</td>
					</tr>
					</table>




		<br>
		
								<h2 id="subtitle" >My Uploaded Singles</h2>

							<table id="body" >
							<tr>
							<td>
							<style>
								#trackpanel {
									height:550px
								}
							</style>
			<div id='trackpanel' height='550px' >			
		<?php


						include('../inc/connection.php');
						$user_name = $_SESSION['user_name'];
						$result = mysqli_query($con,"SELECT * FROM submissions WHERE user_name = '".$user_name."'");
						if(isset($_POST['deleteItem']) and is_numeric($_POST['deleteItem']))
						{
						  // here comes your delete query: use $_POST['deleteItem'] as your id
						
						
						if($deleteTrack = mysqli_query($con,"  DELETE FROM submissions
															WHERE id='".$_POST['deleteItem']."'")){
																echo 'success!';
															}
																else {
																echo 'it didnt work.....';
															};
						}


						echo "<table>
						<tr>
						<th width='300px' >ARTIST</th>
						<th>TRACK</th>
						</tr>";

						while($row = mysqli_fetch_array($result))
						  {
							$tracknameshort = strtolower($row['trackname']);
							$tracknameshort = preg_replace('/\s+/','', $tracknameshort);
							$pound = '%23';
							$titleURL = '[SINGLE] '.$row['trackname'].' by '.$row['twitter'].' // AMRadioLIVE';
							$titleURL = urlencode($titleURL);
						  echo "<tr>";
						  echo "<td width='250px' ><h4>" . $row['twitter'] . "</h4></td>";
						  echo "<td width='325px' >\"" . $row['trackname'] . "\"</td>";
						  echo "<td><audio controls><source src=\"" . $row['trackmp3'] . "\"></audio></td>";
						  echo "</tr></table><table><tr>";
						  echo "<p id='alignright' >PROMOTE VIA: <a target=\"_blank\"  id=\"jointheteam\"  href=\"https://twitter.com/intent/tweet?screen_name=&text=[REQUEST/DOWNLOAD]%0A%0A%22".$row['trackname'] ."%22%0Aby%20".$row['twitter']."%0A%0Aon%20AMRadioLIVE.com/".$pound.$tracknameshort."%0A".$row['twitpic']."\" class=\"twitter-mention-button\" data-related=\"SirAlexMayo\">TWITTER</div></a>";
						  echo "<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?\'http\':\'https\';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+\'://platform.twitter.com/widgets.js\';fjs.parentNode.insertBefore(js,fjs);}}(document, \'script\', \'twitter-wjs\');</script>";
							echo '| <a target="_blank"  id="jointheteam"   href="http://www.facebook.com/sharer/sharer.php?s=100&p[url]=http://amradiolive.com/'.$pound.$tracknameshort.'&p[images][0]=&p[title]=[SINGLE]%20'.$row['trackname'].' by '.$row['twitter'].' // AMRadioLIVE&p[summary]='.$row['blogtitle'].' on AMRadioLIVE! The Leader in Online Showcasing.">FACEBOOK </a> | <a id="jointheteam" target="_blank" href="http://www.tumblr.com/share/link?url=http%3A%2F%2Famradiolive.com%2F'.$pound.$tracknameshort.'&description='.$titleURL.'%0A%0AAMRadioLIVE.com%0A%0A'.$bodyURL.'&name='.$titleURL.'">Tumblr</a>
							
							<br><br>
							<form action="" method="post">
							<button class="deletetrack" type="submit" name="deleteItem" value="'.$row['id'].'" />DELETE</button>
							</p><hr>';
						  }
						echo "</table>";

						mysqli_close($con);
							echo '
							</div>
							</td>
							</tr>
							</table>';
							?>
		<br>
        <h2 id="subtitle">Music Submissions</h2>
		<table id="body">
			<tr>
				<td>
			<script src="http://cdn.jotfor.ms/static/feedback2.js?3.1.1096" type="text/javascript">
			new JotformFeedback({
			formId:'33292984910966',
			base:'http://jotformpro.com/',
			windowTitle:'Single Promotion - $25',
			background:'#FFA500',
			fontColor:'#FFFFFF',
			type:2,
			height:500,
			width:700
			});
			</script>
			<a class="lightbox-33292984910966" style="cursor:pointer;"><div id="joinbutton">+ Single(s) Promotion</div></a>
					</td>
				</tr>
			</table>

			<table id="body">
			<tr>
			<td>
			<br>
				<div >
				    <!-- because people were asking: "index.php" is just my simplified form of "index.php?logout=true" -->
				    <a id="joinbutton"  href="http://amradiolive.com/listen" target="_blank">Download for iTunes Radio</a>
				</div>	
				<br>	
			<div >
			    <!-- because people were asking: "index.php" is just my simplified form of "index.php?logout=true" -->
			    <a id="joinbutton"  href="http://amradiolive.com/">Return To The Homepage</a>
			</div>
			<br>
				<div>
				    <!-- because people were asking: "index.php?logout" is just my simplified form of "index.php?logout=true" -->
				    <a id="joinbutton" bgcolor="red" href="index.php?logout">Logout</a>
				</div>
			<br>
			</td>
		</tr>
	</table>    
        
        
        

    </div>
    
<div id="navigator">
		    <ul id="navigation" >
            <script src="../js/navigation.js"></script>
            </ul>
</div>
<div id=""></div>
<div id="footer">
		<img width="50px" src="http://s5.postimg.org/69hq9oolf/AMRVol3.png"> 
		<script type="text/javascript" src="http://player.wavestreamer.com/cgi-bin/swf.js?id=AGFRAFJII0W2G9EL"></script>
		<script type="text/javascript" src=" http://player.wavestreaming.com/?id=AGFRAFJII0W2G9EL"></script>
</div><br><br><br>
</body>