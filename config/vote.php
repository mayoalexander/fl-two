<?php

print_r($_POST);

include('../inc/connection.php');


/*
// GET FULL POST DATA

include('../inc/connection.php');

$sql = "SELECT * FROM `feed` WHERE `id` LIKE $_POST['post_id']";
if (mysqli_query($con, $sql)) {
    echo "New record created successfully";
    echo '<script>';
    //echo 'window.open("")';
    echo '</script>';

} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

*/

// SAVE TO DATABASE
$id = $_POST['post_id'];
$sql = "SELECT * 
FROM  `feed` 
WHERE  `id` = $id
LIMIT 1";

if ($result = mysqli_query($con, $sql)) {
	$post = mysqli_fetch_assoc($result);
    echo "New record created successfully";
    echo '<script>';
    //echo 'window.open('')';
    echo "window.open('http://freelabel.net/download.php?p=\"".$post['trackmp3']."\"&n=\"".urlencode($post['blogtitle'])."+'&n=t'".$post['twitter']."\")";
    echo 'alert("';
    	echo $post['blogtitle'].' Now Downloading';
    	echo '")';
    echo '</script>';
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
    //echo 'alert("hello")';
    echo '</script>';
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}