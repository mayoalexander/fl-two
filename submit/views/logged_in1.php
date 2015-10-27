<center>
<?php 
$page_title = "CONTROL PANEL"; 
//include('../header.php');
//include('../navbar.php');
include('../new_header.php'); ?>
<?php include('db/index.php') ?>


			<?php 
				if ($user_name == 'admin') {
					//include('db/dashboard/index.html');
					include('db/dashboardpanel5.php') ;
				} else {
					include('db/dashboardpanel4.php') ;
				}
			?>


		
		
<?php 
	if ($account_type == "free") {
		include('public_single_uploader.php');
	}
?>
		
      
			<?php include('../new_footer.php') ?>


