<?php 


include('../inc/connection.php');
$result = mysqli_query($con,"SELECT * FROM stats ORDER BY count DESC LIMIT 10");
			while($row = mysqli_fetch_array($result))
				  {
				$page = $row['page'];
				$count = $row['count'];
				
				echo $user_twitter." '.$page . ' - '. $count. "<hr>";
				}


?>