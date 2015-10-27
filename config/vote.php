<?php

print_r($_POST);

include('../inc/connection.php');

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
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}