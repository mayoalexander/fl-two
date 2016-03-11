<?php
$include_path = "inc/connection.php";
if (file_exists($include_path)) {
  include_once($include_path);
}
if (file_exists("../".$include_path)) {
  include_once('../'.$include_path);
}
if (file_exists("../../".$include_path)) {
  include_once('../../'.$include_path);
}
if (file_exists("../../../".$include_path)) {
  include_once('../../../'.$include_path);
}
if (file_exists("../../../../".$include_path)) {
  include_once('../../../../'.$include_path);
}
$user_name = $_SESSION['user_name'];
$query = mysqli_query($con,"SELECT * FROM users WHERE user_name ='".$user_name."'");
while ($row = mysqli_fetch_assoc($query))
{
	$current_counts = $row['views'];
	$new_counts = $current_counts+3 ;
	echo $new_counts.' total plays!<BR>';
	if ($update_count = mysqli_query($con,"UPDATE  `amrusers`.`users`.`user_name` SET  `views` =  '".$new_counts."'")) {
		echo 'it worked! = '.$new_counts;
	} else {
		echo 'it didnt work :(';
	}
	;
	
}
?>