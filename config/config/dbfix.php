<?php


//DEFINE $input prior to program fix

$find = array("'","\"",".",",");
$replace = array("");
$arr = $input;
$newstring = str_replace($find,$replace,$arr,$i);

//find and replace Apersand with AND
$find = "&";
$replace = "x";
$newstring = str_replace($find,$replace,$newstring,$i);

//find and replace MINUS SIGN with :
$find = array("-","=","/","#","|");
$replace = ":";
$newstring = str_replace($find,$replace,$newstring,$i);

//find and replace PRODUCEED with PROD
$find = array("produced","Produced","Prod");
$replace = "prod";
$newstring = str_replace($find,$replace,$newstring,$i);

//find and replace FEATURING with FT.
$find = array("Feat","feat","Featuring","featuring","FT");
$replace = "ft";
$newstring = str_replace($find,$replace,$newstring,$i);

$output = $newstring; 

if (isset($output)) {
	echo $output;
	} else {
		echo "i aint writing out shit!";
	}

