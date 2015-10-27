<?php
// HEADER
//include('../header.php');
include('../inc/connection.php');
function to_prety_url($str){
    if($str !== mb_convert_encoding( mb_convert_encoding($str, 'UTF-32', 'UTF-8'), 'UTF-8', 'UTF-32') )
        $str = mb_convert_encoding($str, 'UTF-8', mb_detect_encoding($str));
    $str = htmlentities($str, ENT_NOQUOTES, 'UTF-8');
    $str = preg_replace('`&([a-z]{1,2})(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig);`i', '\1', $str);
    $str = html_entity_decode($str, ENT_NOQUOTES, 'UTF-8');
    $str = preg_replace(array('`[^a-z0-9]`i','`[-]+`'), '-', $str);
    $str = strtolower( trim($str, '-') );
    return $str;
}

$submission_date = date('Y-m-d H:i');
$blog_type_db  = "blog";
$blog_post_key	=	rand(0000000000,9999999999);
$youtube = $_POST['youtube'];
$user_name = $_POST['user_name'];
$twitter = trim($_POST['twitter']); 
$blogentry_embed = $_POST['blogentry_embed'];
$writeup = $_POST['blogentry_text'];
$blog_type = $_POST['blog_type'];

echo 'Twitter: '.$twitter.'<br>';
echo 'Username: '.$user_name.'<br>';
echo 'Type: '.$blog_type.'<br>';

	switch ($blog_type) {
		case 'single':
			$blog_type 	=	"[SINGLE]";
			break;
		case 'interview':
			$blog_type 	=	"[INTERVIEW]";
			break;
		case 'mixtape':
			$blog_type 	=	"[ALBUM STREAM]";
			break;
		case 'video':
			$blog_type 	=	"[VIDEO]";
			break;
		case 'featured':
			$blog_type 	=	"";
			$blog_type_db  = "featured";
			break;
		case 'xxx':
			$blog_type 	=	"[XXXFL]";
			$blog_type_db  = "xxxfl";
			break;
		case 'business':
			$blog_type 	=	"[BUSINESS]";
			break;
		case 'event':
			$blog_type 	=	"[EVENT]";
			break;
		case 'science':
			$blog_type 	=	"[SCIENCE]";
			break;
		default:
			$blog_type = '';
			break;
	}


	// SINGLE UPLOADER!
	if ($blog_type=='[SINGLE]' && isset($_FILES["audiofile"])) {
		//
		$submission_date = date('Y-m-d H:i');
		$twittername = $twitter;
			// TWITTERNAMEFIX
			$twittername = '@'.$twittername;
			$twittername = str_replace('@@', '@', $twittername);
			$twittername = str_replace('@@@', '@', $twittername);
			$twittername = str_replace('twitter.com/', '', $twittername);
		$user_name = $user_name;
		$onsale = '0';
		$trackname = str_replace('\\', '', $_POST['blogtitle']);
		$twitpic = str_replace('\\', '', $_POST['twitpic']);

		// PREPARATION & CONFIGURATION
	$twittername 	=	$twitter;
	$loggedin 	=	true;
	$user_name	=	$_POST['user_name'];

		$uploaded_from_blog=true;
		echo '<br>Uploaded from Blog: '.$uploaded_from_blog.'<br>';
		echo '<hr>This is a Single.';
		include('../x/audiomaker.php');
		exit;
	}




	// VIDEO UPLOADER!
	if ($blog_type=='[VIDEO]') {
		//
		$submission_date = date('Y-m-d H:i');
		$twittername = $twitter;
			// TWITTERNAMEFIX
			$twittername = '@'.$twittername;
			$twittername = str_replace('@@', '@', $twittername);
			$twittername = str_replace('@@@', '@', $twittername);
			$twitter = str_replace('twitter.com/', '', $twittername);
			$twittername = $twitter;
		$user_name = $user_name;
		$onsale = '0';
		$video_title = str_replace('\\', '', $_POST['blogtitle']);
		$twitpic = str_replace('\\', '', $_POST['twitpic']);

		// PREPARATION & CONFIGURATION
	$loggedin 	=	true;
	$user_name	=	$_POST['user_name'];
		echo 'Trackname: '.$trackname.'<br>';
		$uploaded_from_blog=true;
		echo 'is it a video? '.$uploaded_from_blog.'<br>';

		include('blog_post_render.php');
		$video_url = $blogentry_url;

		$photo='http://img.freelabel.net/fllogo.png';
		$blogtitleshort = $twitter.'-'.to_prety_url($video_title);
		$blogtitle = '[VIDEO] '.$video_title;
		$blog_story_url = 'http://TV.FREELABEL.net/?t='.$twitter.'&v='.$video_title;

		$rand = rand(10000000,99999999);
		$photopath = $rand.".png";

		move_uploaded_file($_FILES["userphoto"]["tmp_name"],
			      "../images/" . $photopath);

		
		include('../config/db.php');
				$sql="INSERT INTO blog (user_name, 
					type, 
					twitter, 
					blogtitle, 
					blog_story_url, 
					blogentry, 
					photo, 
					twitpic, 
					youtube,
					blog_post_key,
					writeup,
					submission_date)
				VALUES
				('$user_name','$blog_type_db','$twitter','$blogtitle','$blog_story_url','$blogentry_url','$photopath','$twitpic','$youtube','$blog_post_key','$writeup','$submission_date')";
				if (!mysqli_query($con,$sql))
				  {
				  die('Error: ' . mysqli_error($con));
				  }
				echo "<br>Saved To Database!";

		include('../submit/views/db/video_saver.php');
		exit;
	}





	$blog_type = $blog_type.' ';
	$blogtitle = $blog_type.str_replace('\\', '', $_POST['blogtitle']);
	$twitpic = $_POST['twitpic'];
	// if no twitpic, use youtube video
		if ($twitpic 	==	false) {
			$twitpic 	= $blogentry_embed_original;
		}



include('blog_post_render.php');


$blogtitleshort = $twitter.'-'.to_prety_url($blogtitle);
$blog_story_url = "http://blog.freelabel.net/".$blogtitleshort;
$twitter_share = urlencode("[BRANDNEW] ".$twitter."

".$blogtitle."

".$blog_story_url."
".$twitpic);
/*
$input = $blogtitle;
include('../config/dbfix.php');
$blogtitleformat = $output;
*/


$rand = rand(10000000,99999999);
$photopath = $rand.".png";




// Insert into database



?>

				<?php
				if ($_FILES["userphoto"]["error"] > 0)
				  {
				  echo "Error: " . $_FILES["userphoto"]["error"] . "<br>";
				  }
				else
				  {
				  	echo "<div id='joinbutton' >POST CREATED</div>";
				  }
				
				// CHECK IF EXSIST AND RESUME
				if (file_exists("../images/" . $rand.".png"))
			      {
			      echo $_FILES["userphoto"]["name"] . " already exists. ";
			      }
			    else
			      {
			      	// RESUME POSTING
			      move_uploaded_file($_FILES["userphoto"]["tmp_name"],
			      "../images/" . $photopath);
					if($blogtitleshort){
								if (mkdir('../blog/'.$blogtitleshort) == false) {
									echo 'This File Already Exists!';
								}
								
								$file=fopen('../blog/'.$blogtitleshort.'/index.php',"w");
								echo fwrite($file, '
								
								<?php $page_title ="'.$twitter.' - '.$blogtitle.'"; ?>
								<head>
								<title>'.$twitter.' - '.$blogtitle.' // FREELABEL Networks</title>
								<meta name="description" content="Innovative Magazine, Radio, TV Network. FREELABEL is the leader in Community-Based Innovative Showcasing. AMR provides a platform for fans to have access to new music from Major & Independent artists." />
								<meta name="keywords" content="Music, Promotion, Radio, Interviews, Videos, App, Music, Artists, Radio Station, Showcases, AMRecords, Rap, Hip Hop, Upload Music" />
								<meta name="author" content="FREE LABEL">
								<meta name="robots" content="index, follow"/>
								<link href=\'http://fonts.googleapis.com/css?family=Oswald\' rel=\'stylesheet\' type=\'text/css\'>
								<link href=\'http://freelabel.net/style.css\' rel=\'stylesheet\' type=\'text/css\'>
								<style>
								html, body {
								background-color:#e3e3e3;
								color:#303030;
								background-image:url("http://freelabel.net/images/'.$photopath.'");
								font-family: \'Oswald\', \'sans-serif\';
								}
								#container {
									opacity:0.95;
									width:80%;
									margin:auto;
									padding:2.5%;
									background-color:#e3e3e3;
								}
								#blog_body {
									margin:auto;
									text-align:center;
									font-size:150%;
								
								}
								#artist_image {
									width:80%;
									margin:auto;
								}
								#page_title {
									font-size:500%;
									margin:auto;
									text-decoration:none;
								}
								.sharelink {
									margin:auto;
									opacity:0.9;
									text-align:center;
									padding:1%;
									background-color:#ffffff;
								}
								.sharelink:hover {
									opacity:1;
									background-color:#e3e3e3;
								}
								.sharelink:active {
									position:relative;
									top:1px;
								}
								iframe {
									border-radius:10px;
								}
								a:link {color:#000000;}      /* unvisited link */
								a:visited {color:#000000;}  /* visited link */
								a:hover {color:#000000;}  /* mouse over link */
								a:active {color:#000000;}  /* selected link */
								
								#featured_posts {
									border-radius: 5px ;
									width:28%;
									height:350px;
									vertical-align: top;
									display:inline-block;
									background-color:#e3e3e3;
									font-size: 60%;
									padding:2%;
									margin: 1% 0%;
								}
								#featured_image {
									width:100%;
									max-height:100%;
								}
								#navimenu {
									background-color:#caa800;
									margin:1% auto;
									padding:1%;
									color:#000;
									text-transform: uppercase;
									opacity:0.8;
									font-size:200%;
								} 	
	/* Smartphones (portrait and landscape) ----------- */
@media only screen 
and (min-device-width : 320px) 
and (max-device-width : 480px) {


}
</styles>
	<?php 
	$blogtitle = "'.$blogtitle.'";
	$photopath = "'.$photopath.'";
	$twitter = "'.$twitter.'";
	$blog_post_key = "'.$blog_post_key.'";



	include("../../x/blog_view.php"); 
	?>
								

								');
					} else "No Post Created.";
					
					
echo '<hr>LINK TO BLOGPOST: <a target="_blank" href=\''.$blog_story_url.'\'>'.$blog_story_url.'</a><hr>
<script>
function myFunction() {

	//window.open("https://twitter.com/intent/tweet?screen_name=&text='.$twitter_share.'", "_blank", "toolbar=yes, scrollbars=yes, resizable=yes, top=500, left=500, width=400, height=400");
	//window.open("https://www.facebook.com/sharer/sharer.php?u='.$blog_story_url.'", "_blank", "toolbar=yes, scrollbars=yes, resizable=yes, top=500, left=500, width=800, height=400");
    //window.open("'.$blog_story_url.'", "_blank", "toolbar=yes, scrollbars=yes, resizable=yes, top=500, left=500, width=800, height=400");
	//window.location.assign("http://submit.freelabel.net/?control=update#stories");
}
myFunction()
</script>

				
				';
					if ($user_name == "admin") {
						//$user_name = 'featured';
					}
				echo "Stored in: " . "../images/" . $_FILES["userphoto"]["name"];
				include('../config/db.php');
				$sql="INSERT INTO blog (user_name, 
					type, 
					twitter, 
					blogtitle, 
					blog_story_url, 
					blogentry, 
					photo, 
					twitpic, 
					youtube,
					blog_post_key,
					writeup,
					submission_date)
				VALUES
				('$user_name','$blog_type_db','$twitter','$blogtitle','$blog_story_url','$blogentry_url','$photopath','$twitpic','$youtube','$blog_post_key','$writeup','$submission_date')";
				if (!mysqli_query($con,$sql))
				  {
				  die('Error: ' . mysqli_error($con));
				  }
				echo "<br>Saved To Database!";

				mysqli_close($con);
			      }
			
			
				?>        
<hr>

        
				<?php

				include('../inc/connection.php');
				

				if ($result = mysqli_query($con,"SELECT * FROM blog WHERE type='blog' ORDER BY  `id` DESC LIMIT 1")) {
					


					while($row = mysqli_fetch_array($result))
					  {
						$bloglower = strtolower($row['blogtitle']);
						$bloganchor = preg_replace('/\s+/', '', $bloglower);
						$pound = "%23";
						$twitterURL = urlencode($row['twitter']);
						$titleURL = urlencode($row['blogtitle']);
						$bodyURL = urlencode($row['blogentry']);
						// EVERYTHING WORKS! YAY!
					  }
					mysqli_close($con);	
				} else {
					echo 'connection did not work';
				}
				;

				
					?>
					


        
        
        
        
        
        
        

 
</body>

