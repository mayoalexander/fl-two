<?php 
include('../config/index.php');
include(ROOT.'inc/connection.php');

$sql = "SELECT * FROM `images` WHERE `desc` LIKE '%advertise%' ORDER BY `id` DESC LIMIT 10";
					  // use exec() because no results are returned
					  $result = mysqli_query($con,$sql);
					  $i=0;
					  while($row = mysqli_fetch_array($result)) {
						  $pricing['photos'][$i]['image'] = $row['image'];
						  $i++;
					  }


	if ($pricing != '') {
		shuffle($pricing['photos']);
		include(ROOT.'artists/templates/ZoomSlider/index.php');
	}
?>