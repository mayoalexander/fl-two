<?php

$hostname = "amrusers.db.13071759.hostedresource.com";
$username = "amrusers";
$dbname = "amrusers";
$password = "Treytonmayo2010!";


$connection = mysqli_connect($hostname,$username,$password,$dbname);
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>