<?php
//Variables for connecting to your database.
//These variable values come from your hosting account.

$hostname = "freelabelnet.db.13071759.hostedresource.com";
$username = "freelabelnet";
$dbname = "freelabelnet";
$password = "Simplicity93!";

/*
$hostname = "localhost";
$username = "";
$dbname = "";
$password = "";
*/

//$usertable = "users";
//Connecting to your database
$con = mysqli_connect($hostname, $username, $password, $dbname) ;
$connection = mysqli_connect($hostname, $username, $password, $dbname) ;
//OR DIE ("Unable to connect to database! Please try again later.");
//mysql_select_db($dbname);