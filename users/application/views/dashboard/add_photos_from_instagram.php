<?php 



    // CREATE QUICK URLS
        include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
        include_once('/kunden/homepages/0/d643120834/htdocs/config/upload.php');
        $config = new UploadFile();
        $upload = new Upload();
        include_once(ROOT.'inc/connection.php');
        $filedata['trackmp3'] = '';
        $filedata['photo'] = '';
        $filedata['status'] = '';
        $filedata['phone'] = '';
        $filedata['description'] = '';

        //         // CREATE QUICK URLS
        $filepath = $_POST['img'];
        $shortname = explode(' ',$_POST['title']);
        $_POST['blog_story_url'] = 'http://freelabel.net/'.$_POST['twitter'].'/'.$shortname[0];
        $invchars = array(" ","@",":","/","&","'");
        $_POST['playerpath'] = 'http://freelabel.net/x/'.$_POST['twitter'].'/'.str_replace($invchars, "-", $_POST['title']).'/';
        $filedata['twitter'] = $_POST['twitter'];
        $filedata['user_name'] = $_POST['user_name'];
        $filedata['phone'] = $_POST['phone'];
        $filedata['blogtitle'] = $_POST['title'];
        $filedata['trackname'] = $_POST['title'];
        $filedata['blog_story_url'] = $_POST['blog_story_url'];
        $filedata['submission_date'] = date('Y-m-d H:s:i');
        $filedata['description'] = $_POST['description'];
        $filedata['email'] = $upload->getUserEmail($filedata['user_name']);
        $filedata['filetype'] = $_POST['filetype'];

        // detect status and set private as default
        if (isset($_POST['status'])) {
            $filedata['status'] = $_POST['status'];
        } else {
            $filedata['status'] = 'private';
        }





        // DETECT FILE TYPE
        if ( strpos($filepath, 'mp3') ) {
            $filedata['type']='single';
            $filedata['trackmp3'] = $filepath;
            // set photo implementation here
            $filedata['photo'] = $_POST['photo'];

        } else if ( strpos($filepath, 'mp4') ) {
            $filedata['type']='blog';
            $filedata['photo'] = $_POST['photo'];
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



        // get rid of bad extentions
        $find = array('.mp3','.png','.jpeg','.jpg');
        $filedata['blogtitle'] = str_replace($find, '', $filedata['blogtitle']);


        // place the TWITTER @ sign
        if (strpos($filedata['twitter'], "@") === false) {
            $filedata['twitter'] = '@'.$filedata['twitter'];
        }

        // xxxfl hack 
        // if ($filedata['twitter']==='@xxxfl') {
        //     $filedata['type'] = 'xxxfl';
        // }



        // ADD TO DATABASE
        $sql = 'INSERT INTO `amrusers`.`feed`
        (`id`, `type`, `blog_story_url`, `size`, `filetype`, `trackmp3`, `user_name`, `twitter`, `blogtitle`, `photo`, `playerpath`, `trackname` , `twitpic`, `submission_date`, `blogentry` , `email`, `phone`,`status`) VALUES
        (NULL, "'.$filedata['type'].'" , "'.$filedata['blog_story_url'].'" , "'.$file->size.'" , "'.$filedata['filetype'].'" , "'.$filepath.'", "'.$filedata['user_name'].'", "'.$filedata['twitter'].'", "'.$filedata['blogtitle'].'", "'.$filedata['photo'].'", "'.$_POST['playerpath'].'", "'.$filedata['blogtitle'].'", "'.$twitpic.'", "'.$filedata['submission_date'].'", "'.$filedata['description'].'", "'.$filedata['email'].'", "'.$filedata['phone'].'", "'.$filedata['status'].'");';
        
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
        }





