<?php
//Variables for connecting to your database.
//These variable values come from your hosting account.

$hostname = "hugee.db.13071759.hostedresource.com";
$username = "hugee";
$dbname = "hugee";
$password = "Treytonmayo2010!";
//$usertable = "users";
//Connecting to your database
$con = mysqli_connect($hostname, $username, $password, $dbname) ;
$connection = mysqli_connect($hostname, $username, $password, $dbname) ;
//OR DIE ("Unable to connect to database! Please try again later.");
//mysql_select_db($dbname);

/**
* 
*/
class UserDB
{

	function __construct()
	{
		$hostname = "hugee.db.13071759.hostedresource.com";
		$username = "hugee";
		$dbname = "hugee";
		$password = "Treytonmayo2010!";
		//$usertable = "users";
		//Connecting to your database
		$this->con = mysqli_connect($hostname, $username, $password, $dbname) ;
		$connection = mysqli_connect($hostname, $username, $password, $dbname) ;
		//OR DIE ("Unable to connect to database! Please try again later.");
		//mysql_select_db($dbname);
	}

	function getUserID($id=false)
	{
		if (!$id==false) {
          	$query = "SELECT * FROM users WHERE user_name LIKE '%$id%'";
	        $result = mysqli_query($this->con,$query);
	        $row = mysqli_fetch_assoc($result);
          	return $row['user_id'];
		}
	}
}

$huge = new UserDB();