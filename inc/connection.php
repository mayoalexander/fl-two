<?php
//Variables for connecting to your database.
//These variable values come from your hosting account.

// back up
// $hostname = 'amrusersbackup.db.13071759.hostedresource.com';
// $dbname = "amrusersbackup";
// $username = "amrusersbackup";
// $password = "Leighl11!";

$hostname = "amrusers.db.13071759.hostedresource.com";
$dbname = "amrusers";
$username = "amrusers";
$password = "Leighl11!";
//$usertable = "users";
//Connecting to your database
$con = mysqli_connect($hostname, $username, $password, $dbname) ;
$connection = mysqli_connect($hostname, $username, $password, $dbname) ;
//OR DIE ("Unable to connect to database! Please try again later.");
//mysql_select_db($dbname);



