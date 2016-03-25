<?php 

$sourcePath = $_FILES['photos']['tmp_name'];       // Storing source path of the file in a variable
$targetPath = "upload/".$_FILES['photos']['name']; // Target path where file is to be stored
$temp =$sourcePath[0] ;

//echo '<pre>';
//echo 'now setting up '. $temp . '<br>'.$targetPath.'<br>';
	//var_dump($_FILES);



function make_thumb($src, $dest, $desired_width) {

	/* read the source image */
	$source_image = imagecreatefromjpeg($src);
	$width = imagesx($source_image);
	$height = imagesy($source_image);
	
	/* find the "desired height" of this thumbnail, relative to the desired width  */
	$desired_height = floor($height * ($desired_width / $width));
	
	/* create a new, "virtual" image */
	$virtual_image = imagecreatetruecolor($desired_width, $desired_height);
	
	/* copy source image at a resized size */
	imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);
	
	/* create the physical thumbnail image to its destination */
	imagejpeg($virtual_image, $dest);
	$res = str_replace('../../../', 'http://freelabel.net/', $dest);
	return $res;
}



foreach ($_FILES as $file) {
	$photo	=		$file['name'][0];
	$name	=		$file[0][0]['name'];

	$arr = array_reverse(explode('.', $photo));
	$rand = rand(0,982348237434);
	$photo = $arr[1].'-'.$rand.'-.'.$arr[0];
	//echo $temp.' acutally moving to '.	$photo;

	$loadStatus = move_uploaded_file($temp,'upload/'.$photo) ;    // Moving Uploaded file
	if ($loadStatus) {
		$path = 'http://freelabel.net/upload/server/php/upload/'.$photo.'"';
		//echo 'YAY! it worked! ' .$path;

		$src = '../../../upload/server/php/upload/'.$photo.'';
		$path_thumb = '../../../upload/server/php/upload/thumb/'.$photo;

		// $dir = readdir('../');
		// var_dump($dir);

		$thumb = make_thumb($src ,$path_thumb , 600 );
		// var_dump($thumb);
		echo '<img style="width:100%;" src="'.$thumb.'"">';
		echo '<input type="hidden" name="photo" id="photo" value="'.$path.'"">';
		echo '<input type="hidden" name="poster" id="poster" value="'.$thumb.'"">';
	} else {
		echo 'NO! it didnt work!<Br> ';
	}
}
//echo '<hr>';
//var_dump($_POST);
//echo'</pre>';