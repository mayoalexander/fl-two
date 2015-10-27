

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
						$userphoto = $_POST['userphoto'];
						$phone_number = $_POST['email'];
						$phone_number = $_POST['phone'];

						$input = $trackname ;
						include('../config/dbfix.php');
						$trackname = $output;

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
						$playerpath = "http://freelabel.net/x/".$twitternameclean2.'/'.$tracknameformat."/index.php";
						$playerpath2 = "http://freelabel.net/x/".$twitternameclean2.'/'.$tracknameformat;
						$audiopath = $twitternameclean2."/".$tracknameformat.'/'.$rand.".mp3";
						$audiopathhttp = "http://freelabel.net/x/".$twitternameclean2."/".$tracknameformat.'/'.$rand.".mp3";
						$sharelink = "http://freelabel.net/x/".$twitternameclean2."/".$tracknameformat;



						mkdir($directorypath);
						
						// Insert into database
						$sql="INSERT INTO blog (user_name, type, twitter, trackname, trackmp3, twitpic, playerpath, embeddedplayer, email, phone) VALUES ('$user_name','$type','$twittername','$trackname','$audiopathhttp','$twitpic', '$playerpath', '$embeddedplayer', '$email', '$phone')";
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
						
													  $artist_page_front = "

								<?php
								//config
								
								\$twitter_name = '".$twitternameclean2."';
								
								
								//display
								include('../../header.php');
								include('../artist_profile.php'); 
								include('../../footer.php') ";
								


						      include('audio_player_template.php');
						      
						     // CREATES DIRECTORY + INDEX FOR AUDIO PLAYER.
						    	if(file_exists($twitternameclean2)) {
						    		$artistpage = fopen($twitternameclean2."/index.php","w");
									$file = fopen($twitternameclean2.'/'.$tracknameformat."/index.php","w");
									echo fwrite($artistpage,$artist_page_front);
									echo fwrite($file,$audioplayer);
									fclose($artistpage);
									fclose($file);
									echo 'we made it!';
								}
								?>
						<?php 				
								
$single_tweet_message = "[DOWNLOAD]

\"".$trackname ."\"
by ".$twittername."

".$sharelink."

".$twitpic."";
$single_tweet_message = urlencode($single_tweet_message);
								
										echo "
											<script>
											function tweetSong()
											{
												window.location.assign(\"https://twitter.com/intent/tweet?screen_name=&text=".$single_tweet_message."\")
											}
											tweetSong()
											</script>
										";
													  }
												  }
																	
						?>

