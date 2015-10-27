<?php

	$id = $_GET['control'];
	$page_title = "Control Panel";
	include('../../../header.php');
?>
<style>
#bae_panel {
	margin-top:2%;
}
#registration_form {
	padding:2%;
	margin:2%;
	width:40%;
	background-color:#e3e3e3;
}
	.bae_input {
		background-color:#303030;
		color:#e3e3e3;
		font-size:150%;
		text-align:center;
	}
</style>
<center>
	
	
	<h1 class="sub_title">
		<?php echo $page_title; ?>
	</h1>
	
	<div id="body" >
		<a id="navimenu" href="http://submit.freelabel.net/#login">MAIN</a>
		<a id="navimenu" href="http://freelabel.net/submit/views/db/func.php?control=update">UPDATE</a>
		<a id="navimenu" href="http://freelabel.net/submit/views/db/func.php?control=sales">SALES</a>
		<a id="navimenu" href="http://freelabel.net/submit/views/db/func.php?control=script">SCRIPT</a>
		<a id="navimenu" href="http://freelabel.net/submit/views/db/func.php?control=store">STORE</a>
		<a id="navimenu" href="http://freelabel.net/submit/views/db/func.php?control=videos">VIDEOS</a>
		<a id="navimenu" href="http://freelabel.net/submit/views/db/func.php?control=shows">SHOWS</a>
		<a id="navimenu" href="http://freelabel.net/submit/views/db/func.php?control=stats">STATS</a>
		<a id="navimenu" href="http://freelabel.net/submit/views/db/func.php?control=info">INFO</a>
		<hr>
		<?php

			if ($_GET['control'] == false ) {
				//include('dashboardpanel3.php');
			}
			if ($_GET['control'] == 'update' ) {
				include('admin.php');
			}
			if ($_GET['control'] == 'sales' ) {
				include('../../../x/s.php');
				include('sales.php');
			}
			if ($_GET['control'] == 'store' ) {
				include("store_front.php");
			}
			if ($_GET['control'] == 'videos' ) {
				include("video_saver.php");
			}
			if ($_GET['control'] == 'shows' ) {
				include("showcase_schedule.php");
			}
			if ($_GET['control'] == 'stats' ) {
				include("stats.php");
			}
			if ($_GET['control'] == 'info' ) {
				include("howtouse.php");
			}
		?>
	</div>
	
	

	

<?php //include('../../../footer.php'); ?>