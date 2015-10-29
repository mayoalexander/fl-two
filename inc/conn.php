<?php
$servername = "freelabelnet.db.13071759.hostedresource.com";
$username = "freelabelnet";
$password = "Simplicity93!";
$dbname = "freelabelnet";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

?>