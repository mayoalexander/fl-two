<?php 

class Upload {

	public function __construct() {
		include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
		// require_once ROOT . 'users/vendor/autoload.php';
		//$sprite = new ThumbnailSprite();
        //$thumb_app = new Facebook(array('appId' => 'FACEBOOK_LOGIN_APP_ID', 'secret' => 'FACEBOOK_LOGIN_APP_SECRET'));
		$user = new User();

	}

	public function checkIfUserExists($userNameToFind) {
		include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
		$user = new User();
		if ($user->userExists($userNameToFind) == true) {
			return true;
		} else {
			return false;
		}
	}

	public function handleSyntax($file) {
		// CONFIGURATIONS
		$file['submission_date'] = date('Y-m-d H:s:i');
		$file['blog_post_key'] = rand(1000000000,9999999999);

		// detect file type
		if ( strpos($file['trackmp3'], 'mp3') ) {
			$file['type']='single';
		} else {
			$file['type']='blog';
		}

		// TRIM WHITESPACE
		$file['twitter'] = trim($file['twitter']);
		$file['trackname'] = trim($file['trackname']);

		// DELETE INVALID CHARACTERS //$invchars = array("","@",":","/","&","'"); //$file['trackname'] = str_replace($invchars, '', $file['trackname']);

		if (substr($file['twitter'], 0, 1) !== '@') {
			echo substr($file['twitter'], 0, 1);
			
			$file['twitter'] = '@'.$file['twitter'];
		} else {
			$file['twitter'] = $file['twitter'];
		}

		// CREATE QUICK URLS
		$shortname = explode(' ',$file['trackname']);
		$file['blog_story_url'] = 'http://freelabel.net/'.$file['twitter'].'/'.$shortname[0];
		$invchars = array(" ","@",":","/","&","'");
		$file['playerpath'] = 'http://freelabel.net/x/'.$file['twitter'].'/'.str_replace($invchars, "-", $file['trackname']).'/';
		// $file['twitpic'] = $this->getTwitpicURL($file);
		// echo $fixedtitle;
		// print_r($file); exit;
		return $file;

	}
	public function saveToDatabase($file) {

		$sql= "INSERT INTO  `amrusers`.`blog` (
			`id` ,
			`type` ,
			`blog_story_url` ,
			`blogtitle` ,
			`trackmp3` ,
			`twitter` ,
			`trackname` ,
			`user_name` ,
			`email` ,
			`phone` ,
			`submission_date`,
			`twitpic`,
			`photo`,
			`playerpath`,
			`blog_post_key`
			)
			VALUES (
			NULL , '$file[type]', '$file[blog_story_url]', '$file[trackname]' , '$file[trackmp3]', '$file[twitter]', '$file[trackname]', '$file[user_name]', '$file[email]', '$file[phone]', '$file[submission_date]', '$file[twitpic]', '$file[photo]', '$file[playerpath]', '$file[blog_post_key]'
			)";
		include(ROOT.'inc/connection.php');
		if (mysqli_query($con, $sql)) {
			$status = true;
		    //echo "New record created successfully";
		} else {
			$status = false;
		    echo "Error: " . $sql . "<br>" . mysqli_error($con);
		}
		return $status;
	}

	/*
	* handle photo upload
	*/
	public function handlePhotoUpload($file) {
			$config = new Blog();
			unset($file['trackmp3']);
			$file['writeup'] = $file['blogentry'];
			$file['blog_story_url'] = 'http://freela.be/l/'.$file['twitter'].'/';
			$file['submission_date'] = date('Y-m-d H:s:i');
			if ($file['type']=='video') {
				$file['blogentry'] = '<video src="'.$file['photo'].'" controls preload="metadata" loop=1 class="blog-post-media-video"></video>';
			} elseif($file['type']=='photo') {
				$file['blogentry'] = '<img src="'.$file['photo'].'" class="blog-post-media-image">';
			}

			// get twitpic url
			$file['twitpic'] = $this->getTwitpicURL($file);

			// add $file['filetype']
			$file['filetype'] = $config->detect_file_type($file['photo']);

			if ($this->saveToBackUpDatabase($file)) {
				echo 'YES NIGGA!';
				return $file;
			} else {
				echo 'NO NIGGA!!!';
				return FALSE;
			}
			

	}

	public function saveToBackUpDatabase($file) {
		include(ROOT.'inc/connection.php');
		$sql= "INSERT INTO  `amrusers`.`feed` (
			`id` ,
			`type` ,
			`blog_story_url` ,
			`blogtitle` ,
			`trackmp3` ,
			`twitter` ,
			`trackname` ,
			`user_name` ,
			`email` ,
			`phone` ,
			`submission_date`,
			`twitpic`,
			`photo`,
			`playerpath`,
			`blog_post_key`,
			`blogentry`,
			`filetype`,
			`writeup`
			)
			VALUES (
			NULL , '$file[type]', '$file[blog_story_url]', '$file[trackname]' , '$file[trackmp3]', '$file[twitter]', '$file[trackname]', '$file[user_name]', '$file[email]', '$file[phone]', '$file[submission_date]', '$file[twitpic]', '$file[photo]', '$file[playerpath]', '$file[blog_post_key]', '$file[blogentry]','$file[filetype]','$file[writeup]'
			)";
		include(ROOT.'inc/connection.php');
		if (mysqli_query($con, $sql)) {
			$status = true;
		    //echo "New record created successfully";
		} else {
			$status = false;
		    echo "Error: " . $sql . "<br>" . mysqli_error($con);
		}
		return $status;
	}


	/*
	*
	*	FTP Upload to Radio
	* 	
	*	Upload Media to Twitter API
	*
	*/
		public function uploadToRadio($file, $twitter, $trackname, $user_name) {
		// $fileupload = $file['trackmp3'];

        // echo '<pre>';
        // print_r($twitter);
        // echo '<br>';
        // print_r($trackname);
        // exit;

		$todays_date 	=	date('Ymd');
		$ftp_server		=		"pink.radio.co"; 
		$ftp_user_name	=		"s95fa8cba2.uf29485319"; 
		$ftp_user_pass	=		"d111ea334e75"; 

		// REMOTE PATH FORMAT
		if ($user_name == 'admin') { 
			// ADMIN or STAFF UPLOAD
			$remote_file = 'production/'.$twitter." - ".$trackname.".mp3"; 
			$debug[] = "Uploading to ".$remote_file;

		} elseif($user_name != 'submission') {
			// PAID UPLOAD
			$remote_file = 'clients/'.$twitter." - ".$trackname.".mp3"; 
			$debug[] = "Uploading to ".$remote_file;
		} elseif($user_name == 'submission') {
			// SUBMISSION UPLOAD
			$remote_file = 'submissions/'.$twitter." - ".$trackname.".mp3"; 
			$debug[] = "Uploading to ".$remote_file;
		}
		if ($file['trackmp3'] && $remote_file) {
			// do nothing
		} else {
			$debug[] = 'There is No Set File!';
		}


		// -------------- set up basic connection 
		$conn_id = ftp_connect($ftp_server); 

		// login with username and password 
		$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass); 

		// if (ftp_put($conn_id, $remote_file, $file['trackmp3'], FTP_BINARY)) { 
		if (ftp_put($conn_id, $remote_file, $file, FTP_BINARY)) { 
			$ftp_status = true;
		    $debug[] = "FTP successfully uploaded $file<br><br>Uploaded to: $remote_file"; 
		} else { 
			$ftp_status = false;
		    $debug[] = "There was a problem while uploading $file\n"; 
		    exit; 
		} 
		// print_r($debug);
		// print_r($debug);

		// -------------- Closing the basic connection 
		ftp_close($conn_id); 

		//print_r($file);
		//echo 'This is gone work, nigga.';
		//exit;
		/* 
		
		*/
		return $ftp_status;
	}



	public function getTwitpicURL($file) {
		$_GET['a']  = 'uploadmedia';
		$_GET['f']  = str_replace('http://', '', $file['poster']);
		$_GET['t'] = '[NEW] '.$file['twitter']. '

'.$file['blogtitle'].'

'.$file['blog_story_url'];
		
		include(ROOT.'social-test/index.php');
		//exit;
		//print_r($debug);
		return $twitpic;
	}

	public function getUserEmail($user) {
		include_once(ROOT.'inc/huge.php');
		$sql = "SELECT * from `users` WHERE `user_name`='$user' LIMIT 10";
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_assoc($result);
		if (isset($row['user_email'])) {
			$res = $row['user_email'];
		} else {
			$res = "NOPE! No user name found!";
		}
		return $res;
	}



	public function sendMail($emailToSendTo, $trackname, $twittername, $trackmp3, $photo , $phone) {


		include(ROOT.'mailer/PHPMailerAutoload.php');
		$mail_message_body = '
		<html>
			<head>
				<link rel="stylesheet" type="text/css" href="http://freelabel.net/css/normalize.css">
			  	<link rel="stylesheet" type="text/css" href="http://freelabel.net/bootstrap-3.3.4/dist/css/bootstrap.css"> 
			  	<link rel="stylesheet" type="text/css" href="http://freelabel.net/bootstrap-3.3.4/dist/css/bootstrap-theme.min.css">
			  	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
			  	<link rel="stylesheet" type="text/css" href="http://freelabel.net/css/bootstrap-social/bootstrap-social.css">
			  	<link rel="stylesheet" type="text/css" href="http://freelabel.net/css/style.css">
			</head>

			<body>
				<header>
					<img src="http://freelabel.net/images/fllogo.png" style="width:200px;display:block;margin:auto;">
				</header>
				<hr>
				<img src="'.$photo.'" style="width:100%;display:block;margin:auto;">
				<h1>[NEW] "'.$trackname.'" - '.$twittername.'</h1>
				<h3>Your music has been successfully added to the FREELABEL library. <a href="http://freelabel.net/'.$twittername.'" class="btn btn-primary btn-success">View Now</a></h3>
				<p>For stats, booking single, project releases, or interviews, you will need to proceed with creating an account at FREELABEL. <a href="http://freelabel.net/" class="btn btn-primary btn-success">Create An Account</a></p>
			</body>
			<details>
				<p>Phone: '.$phone.'<p>
				<p>Twitter: '.$twittername.'<p>
			</details>
			<hr>
			<footer>
				FREELABEL Staff<br>
				info@freelabel.net<br>
				(347)-994-0267
			</footer>
		</html>';

		//Create a new PHPMailer instance
		$mail = new PHPMailer;
		// Set PHPMailer to use the sendmail transport
		$mail->isSendmail();
		//Set who the message is to be sent from
		$mail->setFrom('info@freelabel.net', 'FREELABEL SUBMISSIONS');
		//Set an alternative reply-to address
		$mail->addReplyTo('replyto@freelabel.com', 'FREELABEL SUBMISSIONS');
		//Set who the message is to be sent to
		$mail->addAddress($emailToSendTo, 'ARTIST: '.$twittername);
		//Set the subject line
		$mail->Subject = $twittername.' - "'.$trackname.'" was Added to FREELABEL!';
		$mail->AddBCC('notifications@freelabel.net', $name = "FL Staff");
		//Read an HTML message body from an external file, convert referenced images to embedded,
		//convert HTML into a basic plain-text alternative body
		$mail->msgHTML($mail_message_body);
		//Replace the plain text body with one created manually
		$mail->AltBody = 'This is a plain-text message body';
		//Attach the uploaded file
		$mail->addAttachment($trackmp3);

		//send the message, check for errors
		if (!$mail->send()) {
			$result=true;
		    echo "Mailer Error: " . $mail->ErrorInfo;
		} else {
			$result=false;
		    //echo "Message sent to ".$emailToSendTo;
		}
		return $result;


	}

	public function watermarkImage ($file) { 
		// $SourceFile, $WaterMarkText, $DestinationFile
	   $SourceFile = $file['photo'];
	   $WaterMarkText = 'FREELABEL.NET';
	   $DestinationFile = '/kunden/homepages/0/d643120834/htdocs/test/uploads/'.$file['twitter'].'-'.rand(11111,99999);
	   list($width, $height) = getimagesize($SourceFile);
	   $image_p = imagecreatetruecolor($width, $height);
	   $image = imagecreatefromjpeg($SourceFile);
	   imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width, $height); 
	   $black = imagecolorallocate($image_p, 0, 0, 0);
	   $font = 'opensans.ttf';
	   $font_size = 30; 
	   imagettftext($image_p, $font_size, 0, 10, 40, $black, $font, $WaterMarkText);
	   if ($DestinationFile<>'') {
	      imagejpeg ($image_p, $DestinationFile, 100); 
	   } else {
	      header('Content-Type: image/jpeg');
	      imagejpeg($image_p, null, 100);
	   };
	   imagedestroy($image); 
	   imagedestroy($image_p); 
	   return $DestinationFile;
	}


	public function createthumb($name,$filename,$new_w,$new_h) {

		$filename = str_replace('http://freelabel.net/', '/kunden/homepages/0/d643120834/htdocs/', $filename);
		$name = str_replace('http://freelabel.net/', '/kunden/homepages/0/d643120834/htdocs/', $name);

		$system=explode('.',$name);
		if (preg_match('/jpg|jpeg/',$system[1])){
			$src_img=imagecreatefromjpeg($name);
		}
		if (preg_match('/png/',$system[1])){
			$src_img=imagecreatefrompng($name);
		}

		$old_x=imageSX($src_img);
		$old_y=imageSY($src_img);
		if ($old_x > $old_y) {
			$thumb_w=$new_w;
			$thumb_h=$old_y*($new_h/$old_x);
		}
		if ($old_x < $old_y) {
			$thumb_w=$old_x*($new_w/$old_y);
			$thumb_h=$new_h;
		}
		if ($old_x == $old_y) {
			$thumb_w=$new_w;
			$thumb_h=$new_h;
		}

		$dst_img=ImageCreateTrueColor($thumb_w,$thumb_h);
		imagecopyresampled($dst_img,$src_img,0,0,0,0,$thumb_w,$thumb_h,$old_x,$old_y);


		if (preg_match("/png/",$system[1])) {
			imagepng($dst_img,$filename); 
		} else {
			imagejpeg($dst_img,$filename); 
		}
		imagedestroy($dst_img); 
		imagedestroy($src_img); 
		$dest = str_replace('/kunden/homepages/0/d643120834/htdocs/', 'http://freelabel.net/', $filename);
		return $dest;
	}





}

