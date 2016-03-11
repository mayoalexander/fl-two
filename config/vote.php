<?php

print_r($_POST);

include('../inc/connection.php');


// SAVE TO DATABASE
$id = $_POST['post_id'];
$sql = "SELECT * 
FROM  `feed` 
WHERE  `id` = $id
LIMIT 1";

if ($result = mysqli_query($con, $sql)) {
	$post = mysqli_fetch_assoc($result);
    echo "ID Data Found!";

    // move file to downloads directory
    $uploads_dir = 'downloads';
    $name = $post['blogtitle'].'-'.rand(111111111,9999999999999).'.mp3';
    //mkdir(pathname);
    $new_location = $uploads_dir.'/'.$name;
    $new_location_full = 'http://freelabel.net/'.$uploads_dir.'/'.$name;
    move_uploaded_file($post['trackmp3'], '../'.$new_location);
    $script = "http://freelabel.net/download.php?p=".$post['trackmp3']."&n=".$post['blogtitle']."&t=".$post['twitter'];



} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}




// SAVE TO DATABASE

$sql = "INSERT INTO  `amrusers`.`likes` (
`id` ,
`post_id` ,
`user_name` ,
`date_liked`
)
VALUES (
NULL ,  '".$_POST['post_id']."',  '".$_POST['user_name']."', 
CURRENT_TIMESTAMP
);";

if (mysqli_query($con, $sql)) {
    echo "New record created successfully";
    echo '<script>';
    //echo 'window.open('')';
    //echo 'alert()';
    echo 'window.open("'.$script.'");';
    //echo 'alert("'.$script.'");';
    echo '</script>';
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}