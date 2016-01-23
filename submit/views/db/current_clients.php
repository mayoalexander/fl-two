<?php include_once('/home/content/59/13071759/html/config/index.php'); ?>
<a name="currentClients"></a>
<h2 >CURRENT CLIENTS</h2>
	<form id='client-search' style='inline-block' >
		<input type='text' name='search_query' placeholder='Search Clients..' class="form-control">
	</form>
	<span>Categories:</span>
	<a onclick="loadPage('http://freelabel.net/submit/views/db/current_clients.php?filter=all', '#main_display_panel', 'paid' , '<?php echo $_SESSION["user_name"]; ?>')" href='#' class='btn btn-default btn-xs'>All</a>
	<a onclick="loadPage('http://freelabel.net/submit/views/db/current_clients.php?filter=paid', '#main_display_panel', 'paid' , '<?php echo $_SESSION["user_name"]; ?>')" href='#' class='btn btn-default btn-xs'>Paid</a>
	<a onclick="loadPage('http://freelabel.net/submit/views/db/current_clients.php?filter=expired', '#main_display_panel', 'paid' , '<?php echo $_SESSION["user_name"]; ?>')" href='#' class='btn btn-default btn-xs'>Expired</a>
	<a onclick="loadPage('http://freelabel.net/submit/views/db/current_clients.php?filter=uncategorized', '#main_display_panel', 'paid' , '<?php echo $_SESSION["user_name"]; ?>')" href='#' class='btn btn-default btn-xs'>Uncategorized</a>
	<a onclick="loadPage('http://freelabel.net/submit/views/db/current_clients.php?filter=paid&sort=chrono', '#main_display_panel', 'paid' , '<?php echo $_SESSION["user_name"]; ?>')" href='#' class='btn btn-default btn-xs'>Client Showcases</a>
	

	<hr>
	<div style='overflow-y:scroll;height:700px;'>
		<table class="current-clients-table table table-bordered table-hover" style='font-size:80%;'>
			<tr>
				<td>#</td>
				<td></td>
				<td>ID</td>
				<td>Type</td>
				<td>Status</td>
				<td>Email</td>
				<td>Phone</td>
				<td>Twitter</td>
				<td>Date Created</td>
				<td>Showcase Date</td>
				<td>Next Payment Date</td>
				<td>Location</td>
				<td>Submitted?</td>
				<td>Campaign?</td>
				<td>TWEETOUT</td>
			</tr>
	<?php
	function setStatus($name , $status)
	{
		if ($status == 'setInactive') {
			$updated_user_status = 0;
		}
		if ($status == 'setActive') {
			$updated_user_status = 1;
		}
		include(ROOT.'inc/connection.php');

		//$query 	= 	"UPDATE  `amrusers`.`user_profiles` SET  `active` =  '".$updated_user_status."' WHERE CONVERT(  `user_profiles`.`id` USING utf8 ) =  'TRiBE' LIMIT 1";
		$result = mysqli_query($con,"UPDATE  `amrusers`.`user_profiles` SET  `active` =  '".$updated_user_status."' WHERE CONVERT(  `user_profiles`.`id` USING utf8 ) LIKE '%".$name."%' LIMIT 1");
		//echo $updated_user_status.', ';
	}

	include_once(ROOT.'inc/huge.php');
	// Detect Sort Parameter
	if (isset($_GET['sort']) && $_GET['sort']!=='') {
		switch ($_GET['sort']) {
			case 'chrono':
				$sort = 'user_registration_datetime';
				break;
			
			default:
				$sort = 'user_id';
				break;
		}
	} else {
		$sort = 'user_id';
	}
	// DETECT FILTER PARAMETERS PARAMETERS
	switch ($_GET['filter']) {
		case 'paid':
			$sql = "SELECT * 
			FROM  `users` 
			WHERE `account_type` LIKE '%paid%'
			ORDER BY  `users`.`$sort` DESC 
			LIMIT 0 , 100";
			break;
		case 'expired':
			$sql = "SELECT * 
			FROM  `users` 
			WHERE `account_type` LIKE '%expired%'
			ORDER BY  `users`.`$sort` DESC 
			LIMIT 0 , 100";
			break;
		case 'uncategorized':
			$sql = "SELECT * 
			FROM  `users` 
			WHERE `account_type` NOT LIKE '%expired%' AND `account_type` NOT LIKE '%paid%' 
			ORDER BY  `users`.`$sort` DESC 
			LIMIT 0 , 100";
			break;
		case 'search':
		$q = trim($_GET['search_query']);
			$sql = "SELECT * 
			FROM  `users` 
			WHERE `account_type` LIKE '%$q%' OR `user_name` LIKE '%$q%' OR `user_email` LIKE '%$q%' OR `twitter` LIKE '%$q%'
			ORDER BY  `users`.`$sort` DESC 
			LIMIT 0 , 100";
			break;
		
		default:
			$sql = "SELECT * 
			FROM  `users` 
			ORDER BY  `users`.`$sort` DESC 
			LIMIT 0 , 60";
			break;
	}
	// Debugging
	//print_r($_GET);
	// print_r($sql);


		$result = mysqli_query($con,$sql);
						while($row = mysqli_fetch_array($result))
						  {
						  	// RESET 
						  	$profile_phone = '';
						  	$profile_twitter = '';
						  	$profile_location = '';
						  	$submitted_tracks_status = '';
						  	$profile_bool = '';


						  	$name = $row['user_name'];
						  	$user_account_type = $row['account_type'];
						  	switch ($user_account_type) {
						  		case 'freetrial':
						  			//$user_account_type = '<span class="label label-warning">FreeTrial</span>';
						  			break;
						  		
						  		default:
						  			//$user_account_type = '<span class="label label-danger">inactive</span>';
						  			break;
						  	}
							$date_created = $row['user_creation_timestamp'];
							$date_created_account = date('m/d',$date_created);
							$showcase_date = date('m/d',strtotime("+ 10 days",$date_created));
							$expiration_date = date('m/d',strtotime("+ 28 days",$date_created));



							// $expiration_date = date("+ 28 days",$date_created);
							// $showcase_date = strtotime("+ 10 days",strtotime($date_created));
							// $showcase_date= date('m/d', $showcase_date);
							// $expiration_date_text = date('m/d', $expiration_date);

						  	$user_id = $row['user_id'];
						  	$user_email = $row['user_email']; //<a href="mailto:">'.$user_email.'</a>
						  	$user_email_link = '<a href="mailto:'.$user_email.'?subject="FREELABEL%20>'.$user_email.'</a>'; //
						  	$user_twitter = $row['twitter'];

						  	$active = $row['active'];
						  	$client_profile = "http://x.freelabel.net/".strtolower($twitter);
						  	$follow_up_message = urlencode("[".$location."]

FREELABEL Featured: ".$name." (".$twitter.")

-> ".$client_profile); 
							
										// Check if User Profile is Created
										include('../../../inc/connection.php');
										$result2 = mysqli_query($con,"SELECT * 
											FROM  `user_profiles` 
											WHERE  `id` LIKE  '%".$name."%'
											LIMIT 0 , 30");
											if($row2 = mysqli_fetch_array($result2))
											  {
												$profile_name = $row2['id'];
												$profile_twitter = $row2['twitter'];
												$profile_location = $row2['location'];
												$profile_photo = $row2['photo'];
												if (isset($row2['photo']) && $row2['photo']!='') {
							  						$photo = '<img width="56px" src="'.$profile_photo.'">';
												} else {
							  						$photo = '<img width="56px" src="http://freelabel.net/images/fllogo.png">';
												}
												$profile_url = $row2['profile_url'];





												if ($expiration_date > time()) {
													//echo ' <br>Date Joined: '.strtotime($date_created);
													//echo ' <br>Date Renewal: '.time($date_created,'+28 days').'<hr>';
													$client_status = '<label class="label label-success" >Active</label>';
													setStatus($name, "setActive");
												} else {
													$client_status = '<label class="label label-danger" >Paused</label>';
													setStatus($name, "setInactive");
												}

									



													// Check if Singles are Uplaoded 
													include('../../../inc/connection.php');
													$config = new Config();

													$result3 = mysqli_query($con,"SELECT * 
														FROM  `feed` 
														WHERE  `user_name` LIKE  '%".$name."%'");
														if($row3 = mysqli_fetch_assoc($result3))
														  {
															$profile_name 		= 		$row3['id'];
															$profile_twitter 	= 		$row3['twitter'];
																				$profile_twitter = '@'.$profile_twitter;
																				$profile_twitter = str_replace('@@', '@', $profile_twitter);
																				$profile_twitter = str_replace('@@@', '@', $profile_twitter);
															$profile_twitter_noat 	= 		str_replace('@', '', $profile_twitter);
															$profile_phone	 	= 		$row3['phone'];
															$profile_trackname	 	= 		$row3['trackname']; 
															$playerpath	 	= 		$row3['playerpath']; 
															//$profile_phone 		= 		"(".substr($profile_phone, 0, 3).") ".substr($profile_phone, 3, 3)."-".substr($profile_phone,6);
															$submitted_tracks_status ='<a href="http://freelabel.net/'.strtolower($profile_twitter).'" class="btn btn-success btn-xs" target="_blank">WE GOT TRACKS!!!</a>';

															$follow_up_promote[] = urlencode('[NEW MUSIC] '.$profile_twitter.' - "'.$profile_trackname.'" | '.$playerpath);
															$follow_up_promote[] = urlencode($profile_trackname.'" | '.$playerpath);
															$follow_up_promote[] = urlencode(' we need new exclusives for this weeks radio showcases. Login to your FL profile & upload new music ASAP.');
															$follow_up_promote[] = urlencode('TUNE IN LIVE TONIGHT @ 11PM for NEW EXCLUSIVES from '.$profile_twitter.'  ft. "'.$profile_trackname);
															$follow_up_promote[] = urlencode('NEW MUSIC FROM "'.$profile_trackname.'" coming '.$showcase_date.'! EXCLUSIVELY on RADIO.FREELABEL.net');
															$follow_up_promote[] = urlencode('call us 347-994-0267');
															$follow_up_promote[] = urlencode('Login to your FREELABEL.NET account and upload new music for todays radio showcases!');
															$follow_up_promote[] = urlencode('Login to your FREELABEL.NET account and schedule any interviews or single/project releases to showcase this month on FREELABEL.NET!');
																
															//  

															// FOLLOW UP BUTTON GENERATOR
															// FOLLOW UP BUTTON GENERATOR
															// FOLLOW UP BUTTON GENERATOR
															$i=1;
															$tweet_to_client = '';
															// $tweet_to_client .= '<div class="btn btn-primary btn-xs" onclick="showOptions('.$user_id.')" >Follow Up</div>';
															// $tweet_to_client .='<div id="follow_up_options'.$user_id.'" style="display:none;" >';
															$tweet_to_client .= '
															<div class="dropdown">
															  <button class="btn btn-social dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa fa-comment"></i>
															  <ul class="dropdown-menu">
															    '.$config->loadScript($profile_trackname).'
															  </ul>
															</div>';


															// foreach ($follow_up_promote as $follow_up_button) {
															// 	$follow_up_button = $follow_up_promote[$i];
															// 	$tweet_to_client	.= '<a href="http://freelabel.net/som/index.php?dm=1&t='.$profile_twitter_noat.'&text='.$follow_up_promote[$i].'" target="_blank" class="btn btn-default btn-xs" >'.substr(urldecode($follow_up_promote[$i]), 0,120).'...</a>';
															// 	//$tweet_to_client	.= '<a href="https://twitter.com/intent/tweet?screen_name='.$profile_twitter_noat.'&text='.$follow_up_promote[$i].'" target="_blank" class="btn btn-default btn-xs" >'.substr(urldecode($follow_up_promote[$i]), 0,120).'...</a>';
															// 	$i++;
															// }
															// echo '</div>';
															// FOLLOW UP BUTTON GENERATOR
															// FOLLOW UP BUTTON GENERATOR
															// FOLLOW UP BUTTON GENERATOR



														} else {
															$tweet_track_request = $profile_twitter.' Login to your FREELABEL profile and upload music ASAP --> submit.FREELABEL.net';
															$submitted_tracks_status	= "<a data-email='".$user_email."' data-twitter='".$profile_twitter."' data-action='songs' class='btn btn-danger btn-xs need-songs-trigger'>NEED SONGS!!!!!</a>";
														}
														$profile_bool	= "<button href='http://x.freelabel.net/?i=".$name."'  class='btn btn-success btn-xs' target='_blank' >COMPLETED</button>";


												
											} else {
												$photo = '';
												$tweet_to_client = '';
												$profile_bool	= "<span data-email='".$user_email."' data-action='profile' class='btn btn-danger btn-xs need-songs-trigger'>NO PROFILE!!!!!</span>";
											}
												
										
											$client_info	=	'

												
												<td>
											    	'.$photo.'
											    </td>
											    <td>
											    	'.$user_id.')
											    </td>
											    <td>
											    	'.$name.'
											    </td>
											    <td>
											    	<span class="edit" id="type-'.$user_id.'">'.$user_account_type.'</span>
											    </td>
											    <td>
											    	'.$client_status.'
											    </td>
											    <td >
											    	<span class="edit" id="email-'.$user_id.'">'.$user_email.'</span>
											    </td>
											    <td>
											    	'.$profile_phone.'
											    </td>
											    <td>
											    	<a href="http://twitter.com/'.$profile_twitter.'" target="_blank">'.$profile_twitter.'</a>
											    </td>
											    <td>
											    	'.$date_created_account.'
											    </td>
											    <td>
											    	'.$showcase_date.'
											    </td>
											    <td>
											    	'.$expiration_date.'
											    </td>
											    <td>
											    	'.$profile_location.'
											    </td>
											    <td>
											    	'.$submitted_tracks_status.'
											    </td>
											    <td>
											    	'.$profile_bool.'
											    </td>
											    <td>
											    <!--<textarea></textarea>-->
											    	'.$tweet_to_client.'
											    </td>
											
												';

												echo '<tr>';
													echo $client_info;
												echo '</tr>';
							
							
							
							
							
						  	if($active){
						  		echo '<div style="background-image:url(\''.$photo.'\');" ><br><a id="current_clients"  target="_blank" href="https://twitter.com/intent/tweet?&text='.$follow_up_message.'" data-related="FreeLabelNet"><h1 id="joinbutton"> '.$name.'</h1><h1 id="joinbutton">'.$location.'</h1><h1 id="joinbutton">'.$twitter.'</h1></a>
						  		<br><a target="_blank" class="sub_title" href="'.$client_profile.'" >View Profile</a>
						  		</div>';
						  		echo "<hr>";
						  	}
						}

	?>
					</table>
				</div>


<div class="half">
	<?php
	//include('showcase_schedule.php');
	?>
</div>

<script type="text/javascript" src='http://freelabel.net/js/jquery.jeditable.js'></script>
<script>
	function sendEmail(email, message) {
		var data = {
			email : email,
			message : message
		}
		$.post('http://freelabel.net/users/dashboard/send/',data,function(data){
			alert(data);
		});
	}

	$('.need-songs-trigger').click(function(){
		$(this).hide();
		var email = $(this).attr('data-email');
		var action = $(this).attr('data-action');
		if (action == 'profile') {
			var message = 'You\'re almost done! You will need a finish completing your profile at FREELABEL.NET so we can have what we need to start building your showcases! If you have any questions, issues, or feedback, feel free to call us at 347-994-0267!\n\n\nThank you!\n\nhttp://freelabel.net/';
		} else if (action == 'songs') {
			var message = 'Uh ohh! You havent uploaded any music to your profile! To get the full experience of your FREELABEL account, you\'ll need to upload music to your account! Please login to FREELABEL.net so we can have what we need to get started working on your campaigns. If you have any questions, issues, or feedback, feel free to call us at 347-994-0267!\n\n\nThank you!\n\nhttp://freelabel.net/';
		}
		sendEmail(email,message);
	});

	$('#client-search').submit(function(event){
		event.preventDefault();
		var thedata = $(this).serialize();
		loadPage('http://freelabel.net/submit/views/db/current_clients.php?filter=search&' + thedata, '#main_display_panel', 'paid' , <?php echo "'".$_SESSION["user_name"]."'"; ?>)
		//alert(thedata);
	});
	$('.edit').editable('http://freelabel.net/submit/update.php',{
     	id   : 'user_account_id',
     	//type    : 'textarea',
        name : 'title'
     });
	function showOptions(id) {
		$('#follow_up_options' + id).toggle();
		//alert(this);
	}
</script>
