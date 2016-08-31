<?php 
include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
$config = new Blog(); 
?>
<style type="text/css">
	.current-clients-container {
		overflow:scroll;
	}
</style>
<a name="currentClients"></a>
<h2 >CURRENT CLIENTS</h2>
	<form id='client-search' style='inline-block' >
		<input type='text' name='search_query' placeholder='Search Clients..' class="form-control">
	</form>
	<span>Categories:</span>
	<a onclick="loadPage('http://freelabel.net/users/dashboard/clients/?filter=all', '#leads', 'paid' , '<?php echo $_SESSION["user_name"]; ?>')" href='#' class='btn btn-default btn-xs'>All</a>
	<a onclick="loadPage('http://freelabel.net/users/dashboard/clients/?filter=paid', '#leads', 'paid' , '<?php echo $_SESSION["user_name"]; ?>')" href='#' class='btn btn-default btn-xs'>Paid</a>
	<a onclick="loadPage('http://freelabel.net/users/dashboard/clients/?filter=expired', '#leads', 'paid' , '<?php echo $_SESSION["user_name"]; ?>')" href='#' class='btn btn-default btn-xs'>Expired</a>
	<a onclick="loadPage('http://freelabel.net/users/dashboard/clients/?filter=unpaid', '#leads', 'paid' , '<?php echo $_SESSION["user_name"]; ?>')" href='#' class='btn btn-default btn-xs'>Unpaid</a>
	<a onclick="loadPage('http://freelabel.net/users/dashboard/clients/?filter=admin', '#leads', 'paid' , '<?php echo $_SESSION["user_name"]; ?>')" href='#' class='btn btn-default btn-xs'>Admin</a>
	<a onclick="loadPage('http://freelabel.net/users/dashboard/clients/?filter=uncategorized', '#leads', 'paid' , '<?php echo $_SESSION["user_name"]; ?>')" href='#' class='btn btn-default btn-xs'>Uncategorized</a>
<!-- 	<a onclick="loadPage('http://freelabel.net/users/dashboard/clients/?filter=paid&sort=chrono', '#leads', 'paid' , '<?php echo $_SESSION["user_name"]; ?>')" href='#' class='btn btn-default btn-xs'>Client Showcases</a> -->
	

	<hr>
	<div class="current-clients-container card card-chart">
		<table class="current-clients-table table table-bordered table-hover" style='font-size:80%;'>
			<tr>
				<td>#</td>
				<td></td>
				<td>ID</td>
				<td>Type</td>
				<td>Stats</td>
				<td>Email</td>
				<td>Notes</td>
				<td>Rating</td>
				<td>Phone</td>
				<td>Twitter</td>
				<td>Date Created</td>
				<td>Showcase Date</td>
				<td>Next Payment Date</td>
				<td>Location</td>
				<td>Submitted?</td>
				<td>Promos?</td>
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

	include(ROOT.'inc/connection.php');
	// include(ROOT.'inc/huge.php');
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
			WHERE `account_type` = 'paid'
			ORDER BY  `users`.`$sort` DESC 
			LIMIT 0 , 20";
			break;
		case 'expired':
			$sql = "SELECT * 
			FROM  `users` 
			WHERE `account_type` = 'expired'
			ORDER BY  `users`.`$sort` DESC 
			LIMIT 0 , 20";
			break;
		case 'unpaid':
			$sql = "SELECT * 
			FROM  `users` 
			WHERE `account_type` = 'unpaid'
			ORDER BY  `users`.`$sort` DESC 
			LIMIT 0 , 20";
			break;
		case 'uncategorized':
			$sql = "SELECT * 
			FROM  `users` 
			WHERE `account_type` NOT = 'expired' AND `account_type` NOT = 'paid' 
			ORDER BY  `users`.`$sort` DESC 
			LIMIT 0 , 20";
			break;
		case 'search':
		$q = trim($_GET['search_query']);
			$sql = "SELECT * 
			FROM  `users` 
			WHERE `user_name` LIKE '%$q%'
			ORDER BY  `users`.`$sort` DESC 
			LIMIT 0 , 20";
			break;
		
		default:
			$sql = "SELECT * 
			FROM  `users` 
			ORDER BY  `users`.`$sort` DESC 
			LIMIT 0 , 60";
			break;
	}
	// // Debugging
	// print_r($_GET);
	// print_r($sql);

		$result = mysqli_query($con,$sql);
						while($row = mysqli_fetch_array($result))
						  {

						  	// RESET 
							$s['count']=0;
						  	$profile_phone = '';
						  	$profile_twitter = '';
						  	$profile_location = '';
						  	$submitted_tracks_status = '';
						  	$profile_bool = '';
						  	$promos = '';
						  	$user_notes = '';
						  	$user_rating = '';


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

							$promos = $config->getPromosByUser($name, 0);
							if ($promos ===NULL) {
								$promos='No Promos Found!';
							} else {
								$promos = count($promos);
							}


						  	$user_id = $row['user_id'];
						  	$user_email = $row['user_email']; //<a href="mailto:">'.$user_email.'</a>
						  	$user_email_link = '<a href="mailto:'.$user_email.'?subject="FREELABEL%20>'.$user_email.'</a>'; //
						  	$user_twitter = $row['twitter'];
						  	$user_notes = $row['notes'];
						  	$user_rating = $row['rating'];

						  	$active = $row['active'];
						  	$client_profile = "http://x.freelabel.net/".strtolower($twitter);
						  	$follow_up_message = urlencode("[".$location."]

FREELABEL Featured: ".$name." (".$twitter.")

-> ".$client_profile); 
							
										// Check if User Profile is Created
										include(ROOT.'inc/connection.php');
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
							  						$photo = '<a href="'.$profile_photo.'" target="_blank" ><img width="56px" src="'.$profile_photo.'"></a>';
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
													include(ROOT.'inc/connection.php');
													$system = new Config();

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
															

															// display tracks status
															$submitted_tracks_status ='<a href="http://freelabel.net/'.strtolower($profile_twitter).'" class="text-success" target="_blank">UPLOADED!!!</a>';


															// get usr stats
															$s = $config->getStatsByUser($name);


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
															    '.$system->loadScript($profile_trackname).'
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
															$submitted_tracks_status	= "<a href='#' data-email='".$user_email."' data-twitter='".$profile_twitter."' data-action='songs' class='text-danger need-songs-trigger'>INCOMPLETE!!!!!</a>";
														}
														$profile_bool	= "<a href='http://freelabel.net/u/".$name."'  class='text-success' target='_blank' >".$name."</a>";


												
											} else {
												$photo = '';
												$tweet_to_client = '';
												$profile_bool	= "<a href='#' data-email='".$user_email."' data-action='profile' class='text-danger need-songs-trigger'>".$name."</a>";
											}
												
										
											$client_info	=	'

												
												<td>
											    	'.$photo.'
											    </td>
											    <td>
											    	'.$user_id.')
											    </td>
												<td>
											    	@'.$profile_bool.'
											    </td>
											    <td>
											    	<span class="edit" id="type-'.$user_id.'">'.$user_account_type.'</span>
											    </td>
											    <td>
											    	<!-- '.$client_status.' -->
											    	<a data-twitter="'.$profile_twitter.'"  href="#" class="client-stats-trigger" target="_blank">'.$s['count'].'</a>
											    </td>
											    <td >
											    	<span class="edit" id="email-'.$user_id.'">'.$user_email.'</span>
											    </td>
											    <td >
											    	<span class="edit" id="notes-'.$user_id.'">'.$user_notes.'</span>
											    </td>
											    <td >
											    	<span class="edit" id="rating-'.$user_id.'">'.$user_rating.'</span>
											    </td>
											    <td>
											    	<a href="#" class="client_phone" data-user="'.$name.'">'.$profile_phone.'</a>
											    </td>
											    <td>
											    	<a href="http://twitter.com/'.$profile_twitter.'" target="_blank">'.$profile_twitter.'</a>
											    </td>
											    <td>
											    	'.$date_created_account.'
											    </td>
											    <td>
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
											    	'.$promos.'
											    </td>
											    <td>
											    <!--<textarea></textarea>-->
											    	'.$tweet_to_client.'
											    </td>
											
												';

												echo '<tr >';
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
	function notifyClientStats(twittername) {
		alert(twittername);
	}
	$('.client-stats-trigger').click(function(event){
		event.preventDefault();
		var el = $(this).attr('data-twitter');
		var views = $(this).text();
		var text = "You currently have " + views + " total views on FREELABEL.NET!";

		$(this).addClass('text-warning');
        url = 'http://freelabel.net/som/index.php?dm=1&t='+ el +'&text=' + encodeURI(text);
        window.open(url);
		// $.get(url,function(data){
		// 	alert("Message sent!");
		// 	// $(this).html('<span class="text-success" >'+views+'</span>');
		// });

	});
	function sendEmail(email, message) {
		var data = {
			email : email,
			message : message
		}
		$.post('http://freelabel.net/users/dashboard/send/',data,function(data){
			alert(data);
		});
	}

	$('.need-songs-trigger').click(function(event){
		event.preventDefault();
		$(this).removeClass('text-danger').addClass('text-warning');
		var email = $(this).attr('data-email');
		var action = $(this).attr('data-action');
		if (action == 'profile') {
			var message = 'You\'re almost done! You will need a finish completing your profile at FREELABEL.NET so we can have what we need to start building your showcases! If you have any questions, issues, or feedback, please feel free to call us at 347-994-0267!\n\n\nThank you!\n\nhttp://freelabel.net/';
		} else if (action == 'songs') {
			var message = 'Uh ohh! You havent uploaded any music to your profile! To get the full experience of your FREELABEL account, you\'ll need to upload music to your account! Please login to FREELABEL.net so we can have what we need to get started working on your campaigns. If you have any questions, issues, or feedback, please feel free to call us at 347-994-0267!\n\n\nThank you!\n\nhttp://freelabel.net/';
		}
		sendEmail(email,message);
	});

	$('#client-search').submit(function(event){
		event.preventDefault();
		var thedata = $(this).serialize();
		loadPage('http://freelabel.net/users/dashboard/clients/?filter=search&' + thedata, '#leads', 'paid' , <?php echo "'".$_SESSION["user_name"]."'"; ?>)
		//alert(thedata);
	});
	$('.edit').editable('http://freelabel.net/submit/update.php',{
     	id   : 'user_account_id',
     	//type    : 'textarea',
        name : 'title'
     });

	$('.client_phone').click(function(event){
		event.preventDefault();
		var phonenumber = $(this).text();
		var user_name = $(this).attr('data-user');
		var url = 'http://freelabel.net/users/dashboard/sendContact';
		alert(phonenumber);
		$.post(url, { number : phonenumber, user_name : user_name}, function(data){
			alert(data);
		});
	});
	function showOptions(id) {
		$('#follow_up_options' + id).toggle();
		//alert(this);
	}
</script>
