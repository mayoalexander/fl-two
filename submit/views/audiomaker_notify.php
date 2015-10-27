
			<?php
			
			 $to = $email;
			 $subject = "[AMRadioLIVE] Your Single: \"".$trackname."\" has been added to AMRadioLIVE";
			 $body = "Your Single: \"".$trackname."\" has been added to AMRadioLIVE's Radio Rotation and is available at:\n\n".$sharelink."\nYour Information: ".$twittername." - ".$trackname."\n".$email."\nhttp://twitter.com/".$twittername."\n\nDIRECT DOWNLOAD LINK: ".$audiopathhttp."\n\nIf you have any questions, feel free to call us at (347)994-0267 or info@AMRadioLIVE.com\n\n\n\nAlex Mayo\nAMRadioLIVE.com";
			 $from = "AMRadioLIVE";
			 $mailheaders = "From: ".$from;
			 if (mail($to, $subject, $body)) {
			   echo("<p>Email successfully sent!</p>");
			  } else {
			   echo("<p>Email delivery failed…</p>");
			  }
			 ?>
			
			
			
			
			
			 <?php
			$phone_number = $_POST['phone'];
			 $to = "info@amradiolive.com";
			 $subject = "[AMRadioLIVE] NEW SUBMISSION: ".$twittername." \"".$trackname."\" has been added to AMRadioLIVE";
			 $body = $phone_number."\n\nNEW Single: \"".$trackname."\" has been added to AMRadioLIVE's  and is available at:\n\n".$sharelink."\nInformation: ".$twittername." - ".$trackname."\n".$email."\nhttp://twitter.com/".$twittername."\n\nDIRECT DOWNLOAD LINK: ".$audiopathhttp."\n\nIf you have any questions, feel free to call us at (347)994-0267 or info@AMRadioLIVE.com\n\n\n\nAlex Mayo\nAMRadioLIVE.com";
			 $from = "AMRadioLIVE";
			 $mailheaders = "From: ".$from;
			 if (mail($to, $subject, $body)) {
			   echo("<p>Email successfully sent!</p>");
			  } else {
			   echo("<p>Email delivery failed…</p>");
			  }
			 ?>


			<?php
			$phone_number = $_POST['phone'];
			 $to = "campaigns@amradiolive.com";
			 $subject = "[AMRadioLIVE] NEW SUBMISSION: ".$twittername." \"".$trackname."\" has been added to AMRadioLIVE";
			 $body = $phone_number."\n\nNEW Single: \"".$trackname."\" has been added to AMRadioLIVE's  and is available at:\n\n".$sharelink."\nInformation: ".$twittername." - ".$trackname."\n".$email."\nhttp://twitter.com/".$twittername."\n\nDIRECT DOWNLOAD LINK: ".$audiopathhttp."\n\nIf you have any questions, feel free to call us at (347)994-0267 or info@AMRadioLIVE.com\n\n\n\nAlex Mayo\nAMRadioLIVE.com";
			 $from = "AMRadioLIVE";
			 $mailheaders = "From: ".$from;
			 if (mail($to, $subject, $body)) {
			   echo("<p>Email successfully sent!</p>");
			  } else {
			   echo("<p>Email delivery failed…</p>");
			  }
			 ?>
