<?php 

$sourcePath = $_FILES['photos']['tmp_name'];       // Storing source path of the file in a variable
$targetPath = "upload/".$_FILES['photos']['name']; // Target path where file is to be stored
$temp =$sourcePath[0] ;

//echo '<pre>';
//echo 'now setting up '. $temp . '<br>'.$targetPath.'<br>';
	//var_dump($_FILES);
foreach ($_FILES as $file) {
	$photo	=		$file['name'][0];
	$name	=		$file[0][0]['name'];
	//echo $temp.' acutally moving to '.	$photo;

	$loadStatus = move_uploaded_file($temp,'upload/'.$photo) ;    // Moving Uploaded file
	if ($loadStatus) {
		$path = 'http://freelabel.net/upload/server/php/upload/'.$photo.'"';
		//echo 'YAY! it worked! ' .$path;
		echo '<img style="width:100%;" src="'.$path.'"">';
		echo '<input type="hidden" name="photo" id="photo" value="'.$path.'"">';
	} else {
		echo 'NO! it didnt work!<Br> ';
	}
}
//echo '<hr>';
//var_dump($_POST);
//echo'</pre>';