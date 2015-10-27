<?php
$user_name = $_POST['user_name'];
$name = $_FILES['file']['name'];
$tmp_name = $_FILES['file']['tmp_name'];


//echo '<pre>';
//print_r($_POST);
//print_r($_FILES['file']);


$photourl = "uploads/".$user_name."-".rand(11111111,99999999).".png";
$location = 'http://freelabel.net/submit/'.$photourl;
//echo $photourl. '<br>';



include('../inc/connection.php');
//$sql = "UPDATE  `amrusers`.`user_profiles` SET  `photo` =  '".$photourl."' WHERE CONVERT(  `user_profiles`.`id` USING utf8 ) =  '".$user_name."' LIMIT 1";

$sql = "UPDATE  `amrusers`.`user_profiles` SET  `photo` =  '".$location."' WHERE CONVERT(  `user_profiles`.`id` USING utf8 ) =  '".$user_name."' LIMIT 1";
$result = mysqli_query($con,$sql);
//$result = mysqli_query($con,"SELECT * FROM user_profiles WHERE id='".$_SESSION['user_name']."'");
if ($result == true) {
	//print_r($sql);
	$debug[] ='Photo Saved!';
	//$debug[] =$sql.'<br>';
	//$debug[] =$user_name.'<br>';
	$debug[] ='<img src="'.$location.'">';
	//$debug[] ='<pre>';
	//print_r($_POST);
	//print_r($_FILES);
	//$debug[] ='</pre>';
	if (isset($name)) {
		if (!empty($name)) {
			if (move_uploaded_file($tmp_name, $photourl)) {
				echo '
				<script>
				  window.location.assign("http://freelabel.net/?ctrl=posts")
				</script>
				';
			} else {
				$debug[] ='There was an error.';
			}	
		} else {
			$debug[] ='Please choose a file.';
		}		
	} else {
	$debug[] ='connection did not work';
	}

} else {
	$debug[] ='Photo Did\'nt Save!';
}

//print_r($debug);
echo '<script>';
foreach ($debug as $message) {
	//echo 'console.log(\''.$message.'\');';

}
echo '</script>';
?>