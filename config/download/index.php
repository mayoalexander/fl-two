<?php 
$file_path = $_POST['downloadURL'];
$fileName = $_POST['filename'];
include("function.php");
set_time_limit(0);  
output_file($file_path, $fileName,);
?>