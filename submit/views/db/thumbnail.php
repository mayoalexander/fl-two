<?php 

function createthumb($name) {
    $new_w = 200;
    $new_h = 200;
    //$name = str_replace('http://upload.freelabel.net/server/php/upload/', 'upload/server/php/upload/', $name);
    $new_filename = str_replace('http://upload.freelabel.net/server/php/files/', 'http://upload.freelabel.net/server/php/files/thumbnail/', $name);
    $dest = $new_filename;
    //$dest[] = $new_filename;
    /*
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
        imagepng($dst_img,$new_filename); 
    } else {
        imagejpeg($dst_img,$new_filename); 
    }
    imagedestroy($dst_img); 
    imagedestroy($src_img); 
<<<<<<< HEAD
    $dest = str_replace('/home/content/59/13071759/html/', 'http://freelabel.net/', $name);
=======
    $dest = str_replace('/kunden/homepages/0/d643120834/htdocs/', 'http://freelabel.net/', $name);
>>>>>>> master
    */

    return $dest;
}




function createThumbnail($filename) {
    if (strpos($filename, 'http://freelabel.net/submit/uploads/')) {
        $filename = str_replace("http://freelabel.net/submit/uploads/", "", $filename);
        //echo "this is the file name : " .$filename;
        //require 'config.php';
        $path_to_image_directory = ROOT.'submit/uploads/';
        $path_to_thumbs_directory = ROOT.'submit/uploads/thumbs/';

        $final_width_of_image = 100;
        //mkdir('images');
        if (file_exists($path_to_image_directory)==false) {
            mkdir($path_to_image_directory);
        }
        if (file_exists($path_to_image_directory)==false) {
            mkdir($path_to_thumbs_directory);
        }

         
        if(preg_match('/[.](jpg)$/', $filename)) {
            $im = @imagecreatefromjpeg($path_to_image_directory . $filename);
        } else if (preg_match('/[.](gif)$/', $filename)) {
            $im = @imagecreatefromgif($path_to_image_directory . $filename);
        } else if (preg_match('/[.](png)$/', $filename)) {
            $im = @imagecreatefrompng($path_to_image_directory . $filename);
        }
         
        $ox = @imagesx($im);
        $oy = @imagesy($im);
         
        $nx = $final_width_of_image;
        $ny = @floor($oy * ($final_width_of_image / $ox));
         
        $nm = @imagecreatetruecolor($nx, $ny);
         
        @imagecopyresized($nm, $im, 0,0,0,0,$nx,$ny,$ox,$oy);
         
        if(!file_exists($path_to_thumbs_directory)) {
          if(!mkdir($path_to_thumbs_directory)) {
               die("There was a problem. Please try again!");
          } 
           }
     
        @imagejpeg($nm, $path_to_thumbs_directory . $filename);
        $tn = '<img src="http://freelabel.net/submit/uploads/thumbs/' .$filename . '" alt="image" />';
		echo $path_to_thumbs_directory.'<br>';
        $tnl = 'http://freelabel.net/submit/uploads/thumbs/' .$filename;
        /*
		if (file_exists($path_to_thumbs_directory.$filename)==false) {
            //echo 'THIS SHIT '. getimagesize($path_to_thumbs_directory.$filename);
            //echo $size; //
            $tnl =  'http://freelabel.net/submit/uploads/'.$filename;
        } else {
            // temporary, until fiding out how to make larger thumbnails
            $tnl =  'http://freelabel.net/submit/uploads/'.$filename;
        }
        //$tn .= '<br />Congratulations. Your file has been successfully uploaded to "' . $path_to_thumbs_directory . $filename . '" , and a      thumbnail has been created.';
        //echo $tnl;*/
        return $tnl;
    } else {
        $tnl = $filename;
        return $tnl;
    }
}