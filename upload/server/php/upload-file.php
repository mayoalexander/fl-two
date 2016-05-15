<?php 
header("Access-Control-Allow-Origin: *");

$sourcePath = $_FILES['photos']['tmp_name'];       // Storing source path of the file in a variable
$targetPath = "upload/".$_FILES['photos']['name']; // Target path where file is to be stored
$temp =$sourcePath[0] ;

foreach ($_FILES as $file) {
	$file_to_upload	=		$file['name'][0];
	$name	=		$file[0][0]['name'];

	$arr = array_reverse(explode('.', $file_to_upload));
	$rand = rand(0,982348237434);
	$file_to_upload = $arr[1].'-'.$rand.'-.'.$arr[0];
	//echo $temp.' acutally moving to '.	$file_to_upload;

	$loadStatus = move_uploaded_file($temp,'upload/'.$file_to_upload) ;    // Moving Uploaded file
	if ($loadStatus) {
		$path = 'http://freelabel.net/upload/server/php/upload/'.$file_to_upload.'"';
		// echo 'YAY! it worked! ' .$path;

		$src = '../../../upload/server/php/upload/'.$file_to_upload.'';
		$path_thumb = '../../../upload/server/php/upload/thumb/'.$file_to_upload;

		echo '<audio style="width:100%;" src="'.$path.'"" controls="1" preload="none">';
		echo '<input type="hidden" name="trackmp3" id="trackmp3" value="'.$path.'"">';

	} else {
		echo 'NO! it didnt work!<Br> ';
	}
}
//echo '<hr>';
//var_dump($_POST);
//echo'</pre>';