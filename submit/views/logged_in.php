<?php $page_title = "CONTROL PANEL"; ?>
<?php 
include('../new_header.php');
if ($user_name_session == 'admin') {
					//include('db/dashboard/index.html');
	include('db/dashboardpanel5.php') ;
					//include('db/dashboardpanel4.php') ;
} else {
		

					include('db/dashboardpanel5.php') ;
				}

				include_once('../new_footer.php') ?>