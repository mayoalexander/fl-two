<?php

/**
* 
*/
class Uploader
{
	
	function __construct()
	{
		# code...
	}
public function handle_form_data($post_data, $file) {
        // CREATE QUICK URLS
        include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
        include_once('/kunden/homepages/0/d643120834/htdocs/config/upload.php');
        $config = new UploadFile();
        $upload = new Upload();
        include_once(ROOT.'inc/connection.php');
        $filedata['trackmp3'] = '';
        $filedata['photo'] = '';
        $filedata['status'] = '';
        $filedata['poster'] = '';

        // Clean up twitter name: place the TWITTER @ sign and trim whitespace
        $filedata['twitter'] = trim($post_data['twitter']);
        if (strpos($filedata['twitter'], "@") === false) {
            $filedata['twitter'] = '@'.$filedata['twitter'];
        }

        // Clean Up Blog Title:  get rid of bad extentions
        $filedata['blogtitle'] = trim($post_data['title']);
        $find = array('.mp3','.png','.jpeg','.jpg','.mp4');
        $filedata['blogtitle'] = str_replace($find, '', $filedata['blogtitle']);





        // CREATE QUICK URLS
        $filepath = $post_data['trackmp3'];
        $shortname = explode(' ',$filedata['blogtitle']);
        $invchars = array(" ","@",":","/","&","'");
        $post_data['playerpath'] = 'http://freelabel.net/x/'.$filedata['twitter'].'/'.str_replace($invchars, "-", $filedata['blogtitle']).'/';
        $filedata['blog_story_url'] = 'http://freelabel.net/'.$filedata['twitter'].'/'.str_replace($invchars, "-", $shortname[0]);
        
        // User Profile Data
        $filedata['user_name'] = $post_data['user_name'];
        $filedata['phone'] = trim($post_data['phone']);
        
        $filedata['trackname'] = $filedata['blogtitle'];
        $filedata['submission_date'] = date('Y-m-d H:s:i');
        $filedata['description'] = trim($post_data['description']);
        $filedata['email'] = $upload->getUserEmail($filedata['user_name']);

        // set release date
        if (isset($post_data['release_date'])) {
            $filedata['release_date'] = date('Y-m-d H:s:i',strtotime($post_data['release_date']));
        } else {
            $filedata['release_date'] = NULL;
        }


        // detect status and set private as default
        if (isset($post_data['status'])) {
            $filedata['status'] = $post_data['status'];
        } else {
            $filedata['status'] = 'private';
        }





        // DETECT FILE TYPE
        if ( strpos($filepath, 'mp3') ) {
            $filedata['type']='single';
            $filedata['trackmp3'] = $filepath;
            // set photo implementation here
            $filedata['photo'] = $post_data['photo'];
            $filedata['poster'] = $post_data['poster'];

        } else if ( strpos($filepath, 'mp4') ) {
            // $filedata['type']='video';
            $filedata['type']='blog';
            $filedata['photo'] = $post_data['photo'];
            $filedata['poster'] = $post_data['poster'];
            $filedata['trackmp3'] = $filepath;
        } else { 
            $filedata['type']='blog';
            $filedata['photo'] = $filepath;
        }


        // 3RD PARTY APIs
        $twitpic = '';
        switch ($filedata['status']) {
            case 'public':
                $twitpic = $upload->getTwitpicURL($filedata);
                break;
            case 'private':
                $twitpic = '';
                break;
        }

        // Format Descriptsion if Links are Inserted (convert to class function later)
        if (strpos($filedata['description'], 'livemixtapes') == true) {
            $filedata['description'] = '<iframe frameborder="0" style="width:100%;max-height:450px;" src="'.$filedata['description'].'"/>';
        }


        $filedata['blogtitle'] = mysqli_real_escape_string($con,$filedata['blogtitle']);
        $filedata['description'] = mysqli_real_escape_string($con,$filedata['description']);
        $filedata['phone'] = mysqli_real_escape_string($con,$filedata['phone']);
        $filedata['email'] = mysqli_real_escape_string($con,$filedata['email']);




        // ADD TO DATABASE
        $sql = 'INSERT INTO `amrusers`.`feed`
        (`id`, `type`, `blog_story_url`, `size`, `filetype`, `trackmp3`, `user_name`, `twitter`, `blogtitle`, `photo`, `playerpath`, `trackname` , `twitpic`, `submission_date`, `blogentry` , `email`, `phone`,`status`, `writeup`, `poster`, `release_date`) VALUES
        (NULL, "'.$filedata['type'].'" , "'.$filedata['blog_story_url'].'" , "'.$file->size.'" , "'.$file->type.'" , "'.$filepath.'", "'.$filedata['user_name'].'", "'.$filedata['twitter'].'", "'.$filedata['blogtitle'].'", "'.$filedata['photo'].'", "'.$post_data['playerpath'].'", "'.$filedata['blogtitle'].'", "'.$twitpic.'", "'.$filedata['submission_date'].'", "'.$filedata['description'].'", "'.$filedata['email'].'", "'.$filedata['phone'].'", "'.$filedata['status'].'", "'.$filedata['description'].'" , "'.$filedata['poster'].'" , "'.$filedata['release_date'].'");';
        
        // $sql = 'INSERT INTO `amrusers`.`feed`
        // (`id`, `type`, `blog_story_url`) VALUES
        // (NULL, "'.$filedata['type'].'" , "'.$filedata['blog_story_url'].'");';

        if (mysqli_query($con, $sql)) {

            $msg = "Your submission has been recieved and will be in radio rotation immedietly. Thank you for working with FREELABEL as we all change the way art is showcased and shared. If needed, we will be in contact with you at ".$filedata['phone']." \n\n\n
            Feel free to contact us at 347-994-0267.\n\nhttp://FREELABEL.net/";

            // use wordwrap() if lines are longer than 70 characters
            $msg = wordwrap($msg,70);

            // send email
            
            if ($filedata['status']=='public') {
                mail($filedata['email'],'[SUBMISSION] '.$filedata['twitter']." - ".$filedata['blogtitle'],$msg);
                mail("notifications@freelabel.net",'[SUBMISSION] '.$filedata['twitter']." - ".$filedata['blogtitle'],$msg);
            }
            // mail("wayne@freelabel.net",'[SUBMISSION] '.$filedata['twitter']." - ".$filedata['blogtitle'],$msg);

        } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($con);
          return false;
        }


    return true;
    }










} // end of class




// var_dump($_POST);
$upload = new Uploader();
$upload->handle_form_data($_POST, $post);