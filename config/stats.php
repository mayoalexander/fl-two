<?php
include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
date_default_timezone_set('America/Chicago');
if (isset($page_title) && $page_title!='') {
} else {
	$page_title = 'WELCOME';
}
if (strpos(strtolower($page_title), 'video')) {
	$page_title = str_replace(' - ', ': ', $page_title);
}
$page_url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
if ($page_url == "http://freelabel.net/tv/") {
	//$debug[] =  'page url: ' . $page_url;
	$ext = explode(': [VIDEO] ', $page_title);
	$debug[] = $ext;
	$find = array('_' , ':',"'",'.');
		if (strpos($ext[0],'_')) {
			$end = strpos($ext[0],'_'); 
			$ext[0] = substr($ext[0], 0, $end);
		}
	$ext = str_replace($find, '', $ext);
	$ext[1] = str_replace(' ', '-', $ext[1]);
	$ext[1] = explode('-', $ext[1]);
	if (isset($ext[1][1]) && $ext[1][1] == 'and') {
		$full_ext = $ext[1][2].'-'.$ext[1][2];
	} else {
		$full_ext = '-'.$ext[1][1];
	}
	$debug[] = "http://freelabel.net/".$ext[0]."/".$ext[1][0].$full_ext;
	$page_url = "http://freelabel.net/".$ext[0]."/".$ext[1][0].$full_ext;
}
/* --------------------------------------
FETCH & UPDATE STATS
-------------------------------------- */
//function fetchStats() {
		date_default_timezone_set('America/Chicago');
		$date_posted = date('YYYY-MM-DD HH:MM:SS');
		$last_visited = date('YYYY-MM-DD HH:MM:SS');
		$id = date("ymdhis").rand(00000000,999999999); $debug[] = 'ID :'.$id;
		include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
		include_once(ROOT."inc/connection.php");
		$query = "SELECT * FROM  `stats` WHERE `page` LIKE '%".$page_title."%' LIMIT 1";
		$result = mysqli_query($con,$query);
		// if ($row = mysqli_fetch_array($result)) {

		// 	/* --------------------------------------
		// 	IF ALREADY EXIST 
		// 	-------------------------------------- */
		// 	// * DEFINE CURRENT VIEW COUNT
		// 	$current_counts = $row['count'];
		// 	$new_counts = $current_counts+1 ;
		// 	$alter 		 =	$new_counts * 3; $debug[] = 'CURRENT '.$current_counts.', NEW '.$new_counts . ', ALTER '.$alter;
		// 	// * EXECUTE UPDATE!!!!!!
		// 	$sql = "UPDATE  `amrusers`.`stats` SET `count` =  '".$new_counts."' , `id` = '".$id."', `page_url` = '".$page_url."' WHERE page='".$page_title."'";
		// 	if ($update_count = mysqli_query($con,$sql)) {
		// 		$debug[] = 'ALREADY EXISTS! EXECUTED: '.$sql;
		// 		$page_views		=	$new_counts;
		// 	} else {
		// 		$debug[] = 'SOMETHING WITH UPDATING THE QUERY DIDNT WORK!';
		// 	};
		// } else {
		// 	$debug[] = 'NOPE SO LETS TRY AND CREATE NEW!';
		// 	$id = time();
		// 	$sql ="INSERT INTO stats (id,page, count, date_posted, page_url)
		// 				VALUES
		// 				( $id , '$page_title','1', '$date_posted', '$page_url')";
		// 				//$debug[] = $create_new_count;
		// 	if ($update_count = mysqli_query($con,$sql)) {
		// 		$debug[] = 'NEW PAGE CREATED: (COUNTS '.$new_counts.') '.$sql;
		// 		//$debug[] = $page_title.': NEW PAGE CREATED! = '.$new_counts;
		// 	} else {
		// 		$debug[] = 'WE COULNT CREATE THE NEW PAGE!';
		// 	}
		// }
		if (strpos($user_name_session, 'admin@freelabel.net')) {
			echo '<pre>';
				print_r($debug);
			echo '</pre>';
		}
//} // end of fetchStats()

?>