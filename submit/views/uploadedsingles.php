<style type="text/css">
#player_wrap {
  		width:95%;
  		min-height:425px;
		border-radius:5px;
}

#registration_form {
  margin:0.5%;
  padding:1%;
	min-width:300px;
}
.client_single {
	min-height: 350px;
	margin: 0.5% 0.5%;
	width:32.3%;
}
.client_single table {
	font-size: 100%;
}
.earnings_table, .earnings_table td .earnings_table tr , .earnings_table td h5 , .earnings_table tbody {
	color:#101010;
	text-align: left;
}

</style>

<h4 class='section_title earnings_table'>Stats / Earnings</h4>
<a name='singles'>
<?php
if (file_exists('../../config/index.php')) {
	include_once('../../config/index.php');
} elseif(file_exists('../config/index.php')) {
	include_once('../config/index.php');
}elseif(file_exists('config/index.php')) {
	include_once('config/index.php');
}
include(ROOT.'inc/connection.php');
//include(ROOT.'submit/views/db/index.php');
print_r($user['media']['audio'][0]['twitter']);
echo '<hr>';
$user['twitter'] = $user['media']['audio'][0]['twitter'];

// GET PLAYER STATSSTICS

//$user_twitter = $user_twitter;
//$user_twitter = 'DC_3D';
  $result_stats = mysqli_query($con,"SELECT * 
FROM  `stats` 
WHERE `page` LIKE '%".$user['media']['audio'][0]['twitter']."%'");
  // ADMIN HACK HACK HACK
  // ADMIN HACK HACK HACK
  // ADMIN HACK HACK HACK
  // ADMIN HACK HACK HACK
  // ADMIN HACK HACK HACK
  // $sitepreview = '<h6 class="panel-heading" >Website: <a href="http://FREELA.BE/L/'.$user_name_session.'" >FREELA.BE/L/'.$user_name_session.'</a></h6>';
  // $sitepreview .= '<div class="panel-body">';
  // $sitepreview .= "<iframe src='http://freelabel.net/x/?i=".$user_name_session."' style='width:100%;height:300px;' frameborder=0 seamless ></iframe> ";
  // $sitepreview .= '</div>';
  // ADMIN HACK HACK HACK
  // ADMIN HACK HACK HACK
  // ADMIN HACK HACK HACK
  // ADMIN HACK HACK HACK
  // ADMIN HACK HACK HACK





  $profile_info = '
	<h2 class="sub_title" ><strong>'.$user_name_session.'\'s Dashboard</strong></h2>	
			<div class="panel panel-body" id="dashboard_profile_photo" >
				<img id="dashboard_photo" src="http://freelabel.net/submit/'.$user_pic.'">
				<br>
				'.$user_pic.'
				<input type="button" id="update_photo_button" class="btn btn-success btn-xs" name="answer" value="EDIT" onclick="showPhotoOptions_'.$id.'()" />
				<div  id="shareBlock_"'.$id.'"  style="display:none;background-color:#e3e3e3;border-radius:10px;padding:2% 1%"  >
					<form action="http://freelabel.net/submit/updateprofile.php" method="POST" enctype="multipart/form-data">
						<input type="file" name="file">
						<br>
						<input type="hidden" name="user_name" value="'.$user_name.'">
						<input type="hidden" name="user_id" value="'.$id.'">
						<input type="submit" value="UPDATE PHOTO" class="btn btn-primary">
					</form>
				</div>
			</div>';
$profile_info	.=	"
<hr>
<script>
					function showPhotoOptions_".$id."() {
						shareBlock=document.getElementById('shareBlock_".$user_id."');
						dashboardProfileDiv=document.getElementById('dashboard_profile_photo');
						updatePhotoButton=document.getElementById('update_photo_button');
						if (shareBlock.style.display == 'block') {
							// if showing, change to none
							shareBlock.style.display = 'none';
							dashboardProfileDiv.style.height = '350px';
							updatePhotoButton.value = 'UPDATE PHOTO';
						} else {
							shareBlock.style.display = 'block';
							dashboardProfileDiv.style.height = '500px';
							dashboardProfileDiv.style.overflow = 'scroll';
							updatePhotoButton.value = 'HIDE';
						}
					   
					}
			</script>";
			//echo $profile_info;

  $i=0;
  //echo '<p>You are currently recieveing royalites for everything associated with the username '.$user_twitter.'. Your pay-out is on the 1st day of your following monthly cycle of your account. The payment will be made to the Paypal Email: "'.$user_twitter.'".</p>';
  while($row = mysqli_fetch_array($result_stats))
  {
  	//print_r($row);
    $date_posted =      $row['date_posted']; 
    $single_count[$i] =      $row['count'] ;
    $i++;
  }
  if ($single_count!='') {
    //echo 'NEW INCRAMENT '.$i.' : '.$single_count;
  	$interger_count_sum	=  array_sum($single_count);
  	$spin_rate = $interger_count_sum * 0.000001;
  	$fans = 0;
  	$fans_not_zero = 1; // for calculations 
  	$pay_rate =  $fans_not_zero * '0.001';
  	$pay_rate_monthly = $interger_count_sum * $pay_rate;
  
  $total_count_sum		=	number_format(array_sum($single_count)).' as of '.date('F');
  $pay_rate_monthly	=	number_format($pay_rate_monthly);
  
  echo "<table class='table earnings_table' >
  <tr>
  	<td><h5>Total Views for \"<strong>".$user['media']['audio'][0]['twitter']."\"</strong></h5></td>
  	<td><h5>Fans</h5></td>
  	<td><h5>Pay Rate</h5>
  	</td>
  	<td><h5>Earnings</h5></td>
  </tr>
  <tr>
  	<td>".$total_count_sum." </td>
  	<td>".$fans." </td>
  	<td>$".$pay_rate."</td>
  	<td style='color:red;'>$".$pay_rate_monthly." Per Month</td>
  </tr>
  <tr style='display:none;'>
  	<td><button class='btn btn-xs btn-primary'>Collect Royalties</button> </td>
  	<td></td>
  	<td></td>
  	<td></td>
  </tr>
  
  </table>";
  } else {
  	echo '<p class="alert alert-warning">You\'ll need to upload music before we can give you any stats!</p>';
  }
echo $sitepreview;


?>













<?php


$result = mysqli_query($con,"SELECT * FROM blog WHERE type='single' AND user_name = '".$user_name_session."' ORDER BY  `id` DESC LIMIT 6");




// ADMIN ACCESS
if ($user_name_session == 'admin') {
	$result = mysqli_query($con,"SELECT * FROM blog WHERE type='single' AND user_name = '".$user_name_session."' ORDER BY  `id` DESC LIMIT 6");
}

while($row = mysqli_fetch_array($result))
  {
  	echo '<div style="display:none;" class="panel col-xs-6 col-md-4 client_single">';
    if (isset($row['playerpath'])) {
  $track_id	=	$row['id'];
  $trackname_full = $row['trackname'];
  $trackname = strtolower($row['trackname']);
  $tracknameshort = preg_replace('/\s+/', '', $trackname);
  $trackanchor  = "".$tracknameshort;
  $pound = "%23";
  $views = $row['views'];
  $onsale = $row['onsale'];
  $price = $row['price'];
  $userphoto = $row['userphoto'];
  $playerpath = $row['playerpath'];
  $player_iframe = "<iframe style='height:350px;border-radius:5px;width:100%;display:inline-block;' src='".$playerpath."' frameborder='0' seamless scrolling='no' ></iframe>";







  // GET RECENCY
  $how_recent =  time() - strtotime($row['submission_date']);
        //$how_recent = date('H:i', $how_recent);
        $how_recent = $how_recent / 60;
        $how_recent = $how_recent / 60;
        $how_recent = $how_recent / 24;
        if ($how_recent < 0.041666666666667) {
          $how_recent = $how_recent * 24 * 60;
          $how_recent = substr($how_recent, 0,3);
          $how_recent =  $how_recent.' minutes ago';
        } elseif ($how_recent < 1) {
          $how_recent = $how_recent * 24;
          if ($how_recent < 2) {
            $how_recent = substr($how_recent, 0,1);
            $how_recent =  $how_recent.' hour ago';
          } elseif ($how_recent < 10) {
            $how_recent = substr($how_recent, 0,1);
            $how_recent =  $how_recent.' hours ago';
          } else {
            $how_recent = substr($how_recent, 0,2);
            $how_recent =  $how_recent.' hours ago';
          } 
        }elseif($how_recent < 10) {
          $how_recent = substr($how_recent, 0,1);
          $how_recent =  $how_recent.' days ago';
        } else {
          $how_recent = substr($how_recent, 0,2);
          $how_recent =  $how_recent.' days ago';
        }
        if ($submission_date == '0000-00-00 00:00:00') {
          $how_recent = strtotime($row['submission_date']);
        }





  // GET PLAYER STATSSTICS
  $result_stats = mysqli_query($con,"SELECT * 
FROM  `stats` 
WHERE  `page` LIKE  '%".$trackname_full."%'
LIMIT 0 , 30");
  if($row = mysqli_fetch_array($result_stats))
  {
    $date_posted =      $row['date_posted']; 
    $single_count =      $row['count'];
    $single_count_format = number_format($single_count);

    $date_posted_text = date('m d Y',$date_posted);
    $ratio_orig 	= $single_count / time($date_posted);
    $ratio_orig		=	substr($ratio_orig, 0,3);
    $ratio = substr($ratio_orig, 0,3) * 10;
    $ratio = 100 - substr($ratio, 0,3);
    $percentage_ratio = $ratio.'%';
  }




 // ONSALE STUFF
$onsale_status_free = "
								<select class='form-control' name='onsale' >
									<option  value='0'>Private</a>
									<option value='3' selected >Free Download</a>
									<option value='1'>Exclusive Release</a>
									<option value='2'>Instrumental Lease</a>
								</select>
								";
$onsale_status_sale = "
								<select class='form-control' name='onsale'>
									<option  value='0'>Private</a>
									<option value='3' >Free Download</a>
									<option value='1' selected>Exclusive Release</a>
									<option value='2'>Instrumental Lease</a>
								</select>
								";
$onsale_status_instrumental = "
								<select class='form-control' name='onsale' >
									<option  value='0'>Private</a>
									<option  value='3'>Free Download</a>
									<option name='onsale' value='1'>Exclusive Release</a>
									<option value='2' selected>Instrumental Lease</a>
								</select>
								";
$onsale_status_private = "
								<select class='form-control' name='onsale' >
									<option  value='0' selected>Private</a>
									<option  value='3'>Free Download</a>
									<option name='onsale' value='1'>Exclusive Release</a>
									<option value='2'>Instrumental Lease</a>
								</select>
								";
/*$name_track = '<div class="input-group">
  <span class="input-group-addon">@</span>
  <input type="text" class="form-control" value="'.$trackname_full.'" placeholder="Track Name">
</div>';*/


$set_price = '<div class="input-group"> 
  <span class="input-group-addon">$</span>
  <input type="text" class="form-control" value="'.$price.'" placeholder="Set Price..">
  <span class="input-group-addon">.00</span>
</div>';

if ($onsale=='1') {
	$pre ='<div class="label label-success" >ONSALE</div>';
} elseif($onsale=='2') {	
	$pre = '<div class="label label-warning" >INSTRUMENTAL</div>';
} elseif($onsale=='0') {
	$pre = '<div class="label label-danger" >PRIVATE</div>';
} elseif($onsale=='3') {
	$pre = '<div class="label label-warning" >FREE</div>';
}


switch ($onsale) {
	case '1':
		$onsale_status = $pre.$onsale_status_sale;
		break;
	case '0':
		$onsale_status = $pre.$onsale_status_private;
		break;
	case '2':
		$onsale_status = $pre.$onsale_status_instrumental;
		break;
	case '3':
		$onsale_status = $pre.$onsale_status_free;
		break;
}


	//echo $player_iframe.'<br>';
  $single_statistics	= "
		<div class='panel' style='padding:2%;' >
		<h3 class='panel-heading' style='text-align:left;'>".$single_count_format." Total Plays<h3>
		</div>
";
//echo $player_iframe;

$score_progress= '<div class="progress">
		  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: '.$percentage_ratio.'">
		    SCORE: '.$percentage_ratio.'
		  </div>
		</div>';
  echo "<br><br>";
  echo '
  	<table class="table table-striped" style="color:#000;" >
		<tr>
			<td><span class="label label-success" >'.$how_recent.'</span></td>
			<td>'.$pre.'</td>
			<td><span class="label label-success" >'.$single_count_format.' New Streams</span></td>
			<td><button class="btn btn-primary" onclick="showShareOptions_'.$track_id.'()"><span class="glyphicon glyphicon-cog"></span></button></td>
		</tr>
	</table>
  ';
  echo "";
 				
  				//echo '<h2 style="display:inline-block;" >'.$trackname_full.' </h2>';
  				echo '<hr>';
				echo '<div id="shareBlock_'.$track_id.'"  style="display:none;background-color:#e3e3e3;border-radius:5px;width:100%;padding: 3% 1%"  >';
					
					 // echo $onsale;
					
					 echo $single_statistics;
					 echo $score_progress;
					echo $name_track;
					echo "<table class='table' style='color:#303030;' >";
						echo "<tr>";
							echo "<td >";
								echo "<h4>STATUS<h4>";
							echo "</td>";
							echo "<td>";
								echo "<h4>URL<h4>";
							echo "</td>";
							echo "<td>";
								echo "<h4>EMBED<h4>";
							echo "</td>";
							echo "<td>";

								//echo "<form method='POST' action='deletesingle.php' ><input name='postid' type='hidden' value='".$track_id."'><input type='submit' class='btn btn-danger'  value='DELETE'></form><hr>";
							echo "</td>";
						echo "</tr>";
						echo "<tr>";
							echo "<td width='200px'> ";
								echo "<form method='post' action='http://freelabel.net/x/update_title.php' >";
									echo $onsale_status;
									echo '<input type="hidden" name="type" value="update_single" >';
									echo '<input type="hidden" name="track_id" value="'.$track_id.'" >';
									echo '<input type="submit" value="update" class="btn btn-default" >';
								echo "</form>";
							echo "</td>";
							echo "<td>";
								echo "<textarea class='form-control' rows='2' cols='30' >".$playerpath."</textarea>";
							echo "</td>";
							echo "<td>";
								echo "<textarea class='form-control'  rows='2' cols='30' >".$player_iframe."</textarea>";
							echo "</td>";
							echo "<td>";
								echo "<form method='POST' action='deletesingle.php' ><input name='post_id' type='hidden' value='".$track_id."'><input type='submit' class='btn btn-danger'  value='DELETE'></form><hr>";
							echo "</td>";
						echo "</tr>";
					echo '</table>';
				echo '</div>';




				echo "
				<script>
							function showShareOptions_".$track_id."() {
								shareBlock=document.getElementById('shareBlock_".$track_id."');
								updatePhotoButton=document.getElementById('update_track_button_".$track_id."');
								if (shareBlock.style.display == 'block') {
									// if showing, change to none
									shareBlock.style.display = 'none';
									
									//updatePhotoButton.InnerHTML = '<';
								} else {
									shareBlock.style.display = 'block';
									
									dashboardProfileDiv.style.overflow = 'scroll';
									updatePhotoButton.value = 'HIDE';
								}
							   
							}
					</script>";
					echo '</div>';
    }
  }

mysqli_close($con);
?>


