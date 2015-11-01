<div class='pagination-wrapper'>
<?php
$i=1;
if (isset($_GET['page']) && $current_page = $_GET['page']) {
	$db_start = $current_page * 24;
	if (isset($subscriber_view) && $subscriber_view==true) {
		echo "<a onclick=\"loadPage('http://FREELABEL.net/mag/pull_mag.php?page=1#mag','#main_content', 'mag')\" class='btn btn-primary page_button' >View All</a>";
		echo "<a onclick=\"loadPage('http://FREELABEL.net/mag/pull_mag.php?page=1#mag','#main_content', 'mag')\" class='btn btn-default page_button' >Subscribe</a>";
		echo '<br>';
	}
	echo '<ul class="pagination">';
	$i='';
	if ($i < 4) {
				echo "<li><a onclick=\"loadPage('http://FREELABEL.net/mag/pull_mag.php?page=0#mag','#main_content', 'mag')\">&laquo;</a></li>";
			} else {
				echo "<li><a onclick=\"loadPage('http://FREELABEL.net/mag/pull_mag.php?page=".$previous."#mag','#main_content', 'mag')\">&laquo;</a></li>";
			}
	for ($i = $current_page - 2; $i < $current_page + 12; $i++) { 
		if ($i < 1) {
			// do nothing
		} else {
		echo "<li><a onclick=\"loadPage('http://FREELABEL.net/mag/pull_mag.php?page=".$i."#mag','#main_content', 'mag')\">".$i."</a></li>";
		//echo	 '<li><a href="http://mag.FREELABEL.net/?page='.$i.'#mag">'.$i.'</a></li>';
		}
	}
	echo "<li><a onclick=\"loadPage('http://FREELABEL.net/mag/pull_mag.php?page=".$i."#mag','#main_content', 'mag')\">&raquo;</a></li>";
	echo '</ul>';
	echo "<br><br>";
}

?>
</div>