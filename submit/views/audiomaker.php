<?php
						

						if ($_FILES["file"]["error"] > 0)
						  {
						  echo "Error: " . $_FILES["file"]["error"] . "<br>";
						  }
						else 
						  {
						if (file_exists($twitternameclean2."/" . $_FILES["file"]["name"]))
						      {
						      echo $_FILES["file"]["name"] . " already exists. ";
						      }
						    else
						      {	



						include('../inc/connection.php');
						$user_name = $_POST['user_name'];
						$twitpic = $_POST['twitpic'];
						$twittername = $_POST['twittername'];
						$trackname = $_POST['trackname'];

						//replace track name's special characters in the string for database
						$find = array("'", "\"", "(", ")", ".");
						$trackformatsql = str_replace($find, "", $trackname );
						$twitternamesql = str_replace($find, "", $twittername );
						//send this string to the database & create the directories/files with the SQL format
						//
						$email = $_POST['email'];
						$name = $_FILES['file']['name'];
						$type = "single";
						$tmp_name = $_FILES['file']['tmp_name'];
						$twitternameclean1 = preg_replace('/\s+/', '', $twitternamesql);
						$twitternameclean2 = strtolower($twitternameclean1);
						$tracknameclean1 = preg_replace('/\s+/', '', $trackformatsql);
						$tracknameformat = strtolower($tracknameclean1);
						$rand = rand(10000000,99999999);
						$directorypath = $twitternameclean2."/";
						$playerpath = "http://amradiolive.com/x/".$twitternameclean2.'/'.$tracknameformat."/index.php";
						$audiopath = $twitternameclean2."/".$tracknameformat.'/'.$rand.".mp3";
						$audiopathhttp = "http://amradiolive.com/x/".$twitternameclean2."/".$tracknameformat.'/'.$rand.".mp3";
						$sharelink = "http://amradiolive.com/x/".$twitternameclean2."/".$tracknameformat;
						//$embeddedplayer = "<iframe height='250px' width='100%' src='".$playerpath."' frameborder='0' seamless scrolling='no' ></iframe>";
						//$embeddedplayerfix = mysql_escape_string($embeddedplayer);

						mkdir($directorypath);

// Insert into database
$sql="INSERT INTO blog (user_name, type, twitter, trackname, trackmp3, twitpic, playerpath, embeddedplayer) VALUES ('$user_name','$type','$twittername','$trackname','$audiopathhttp','$twitpic', '$playerpath', '$embeddedplayer')";
if (mysqli_query($con,$sql))
  {  
  echo "Entry Created Successfully!";
  }
else
  {
  echo "Error creating database entry: " . mysqli_error($con);
  }

							mysqli_close($con);

						      	mkdir($twitternameclean2."/".$tracknameformat."/");
						      	
						      move_uploaded_file($_FILES["file"]["tmp_name"],$audiopath);
						     
						      
						      $audioplayer = "
						<head>
						<link href='http://fonts.googleapis.com/css?family=Fjalla+One' rel='stylesheet' type='text/css'>
						<link href='http://amradiolive.com/css/style.css' type='text/css' rel='stylesheet'>
						<style>
							body, html {
								padding:0px;
								margin:0px;
								width:100%;
								opacity:1;
	background: #49a352; /* Old browsers */
background: -moz-linear-gradient(top,  #49a352 0%, #60da6e 99%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#49a352), color-stop(99%,#60da6e)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  #49a352 0%,#60da6e 99%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  #49a352 0%,#60da6e 99%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  #49a352 0%,#60da6e 99%); /* IE10+ */
background: linear-gradient(to bottom,  #49a352 0%,#60da6e 99%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#49a352', endColorstr='#60da6e',GradientType=0 ); /* IE6-9 */
							}
							iframe {
								border: 0px inset;
								border-top-color: initial;
								border-top-style: inset;
								border-top-width: 0px;
							}

							#playerwrapper {
							min-width:300px;
							min-height:350px;
							font-size:200%;
							padding:5px;
							margin:auto;
							text-align: center;
							vertical-align: middle;

							}
							audio {
								margin:auto;
							}
							#tracktitle {
								font-size:80%;
							}
							#artisttitle {
								font-size:100%;
							}
							#bottombuttons {
								opacity:0.8;
								background-color:#e3e3e3;
								padding:10px;
								margin:1px;
								font-size:60%;
								text-transform:lowercase;
								font-family: 'Fjalla One', sans-serif;
							}
							#bottombuttons {
								opacity:1;
							}
							#amrtag {
								opacity:0.5;
								font-size:70%;
								width:100%;
								text-align:center;
								background-color:#e3e3e3;
								padding:10px;
								color:black;
								position:absolute;
								bottom:0px;
								left:0px;
								letter-spacing:5px;
							}
</style>						

<script type=\"text/javascript\">

function playpauseMP3(){
element=document.getElementById('playerbutton')
if(document.getElementById(\"mp3\").paused){

document.getElementById(\"mp3\").play();
element.src=\"http://amradiolive.com/images/player_play.png\";
}else{

document.getElementById(\"mp3\").pause();
element.src=\"http://amradiolive.com/images/player_stop.png\";

}

}



</script>


						</head>
					<body>
						<div id='playerwrapper'>
						<h2 id='artisttitle' > \"".$trackname."\"</h2>
							<audio id=\"mp3\">
								<source src=\"".$audiopathhttp."\">
							</audio>
<center><image id='playerbutton' width='50px' src='http://amradiolive.com/images/playbutton.png' onClick=\"playpauseMP3();\"></center>



						<p id='tracktitle' >by ".$twittername." </p>

						
						<a target=\"_blank\" id='bottombuttons' href=\"".$audiopathhttp."\">DOWNLOAD</a>
						<a target=\"_blank\" id='bottombuttons' href=\"https://twitter.com/intent/tweet?screen_name=&text=[REQUEST/DOWNLOAD]%0A%0A'".$trackname ."'%0Aby%20".$twittername."%0A%0A".$sharelink."%0A".$twitpic."\" class=\"twitter-mention-button\" data-related=\"SirAlexMayo\">SHARE</div></a>
						<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?\'http\':\'https\';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+\'://platform.twitter.com/widgets.js\';fjs.parentNode.insertBefore(js,fjs);}}(document, \'script\', \'twitter-wjs\');</script>
						</div>
						<a href='http://amradiolive.com/'><div id='amrtag'>AMRadioLIVE.com</div> </a>
						
					</body>
						";
						      
						     // CREATES DIRECTORY + INDEX FOR AUDIO PLAYER.

						     
						    	if(file_exists($twitternameclean2)) {
									$file = fopen($twitternameclean2.'/'.$tracknameformat."/index.php","w");
									echo fwrite($file,$audioplayer);
									fclose($file);
									echo 'we made it!';
								}
								?>




<?php 					echo "
						<iframe height='250px' width='100%' src=\"".$playerpath."\" frameborder='0' seamless scrolling='no' ></iframe><br>
						<a href='".$playerpath."'>".$playerpath."</a> | 
						<h2>EMBEDD CODE:</h2>
						<textarea rows='4' cols='80' >
						<iframe height='250px' width='100%' src='".$playerpath."' frameborder='0' seamless scrolling='no' ></iframe>
						</textarea>
						<h2>SHARE URL:</h2><br>
						
						<a href='".$sharelink."'>".$sharelink."</a>
						
						";
						      }
						  }
											
?>
