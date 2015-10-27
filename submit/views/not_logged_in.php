<?php
// Page Title Configuration
$page_title = "SUBMIT";
$page_desc = "Welcome To FREE LABEL // 24/7 On-Demand Radio // Music Releases // Exclusive Interviews";
include('../new_header.php');
 
    



// CHANGE after DECEMBER 11 2014
if ($_GET['i']=='takeover') {
	//include('views/submitinfo1.php');	
} else {
	include('views/submitinfo.php');
}


include('../new_footer.php'); 
?>