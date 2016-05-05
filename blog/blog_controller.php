<?php
$page_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$magazine = array("$7","https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=J67CSAKQMWDT8");
$subscribe_form = '<p class="panel panel-body" style="border-radius:0px 0px 5px 5px;" >Subscribe to <a href="http://freelabel.net/'.$twitter.'/">'.$twitter.'</a> on FREELABEL TODAY!!
					<br></br>
					<a href="'.$magazine[1].'" class="btn btn-success btn-lg" style="color:#fff;" >Subscribe Now</a></p>';

$page_views .= ' <img src="https://cdn4.iconfinder.com/data/icons/pictype-free-vector-icons/16/view-512.png" width="16px">';
$description_statement	=	'Subscribe and create an account to FREELABEL.net for exclusive access to daily updated news, interviews, singles and project releases from the most influencial creators of our generation.';


// 1.1 Find User ID or Post ID, or Custom URL
if($page_url=='http://deathtodonna.com/') {
	//echo $page_url;
	$_GET['user_twitter_name'] = '@deathtodonna';
}





// 2.1 - FETCH INFORMATION FROM DATABASE
if (isset($_GET['user_twitter_name']) && isset($_GET['blog_title']) && $_GET['blog_title']!='') {
	$blog_title_query = str_replace('-', ' ', $_GET['blog_title']);
	$user_twitter_name_array = explode('-',$_GET['user_twitter_name']);
	$sql = "SELECT * 
	FROM  `feed` 
	WHERE `blogtitle` LIKE '%".$blog_title_query."%'
	AND `twitter` LIKE '%".$_GET['user_twitter_name']."%' ";
	$sql .= "OR `trackname` LIKE '%".$_GET['blog_title']."%'
	AND `twitter` LIKE '%".$user_twitter_name_array[0]."%'";
	$sql .= "ORDER BY `id` DESC LIMIT 1";
	$result2 = mysqli_query($con,$sql);
	$debug[] = 'get '.$_GET['user_twitter_name'];
	$debug[] = 'get '.$_GET['blog_title'];
	$debug[] = 'FIND BY CREDS';
	$debug[] = $sql;

} elseif(isset($_GET['user_twitter_name']) && $_GET['post_id']=='') {
// FIND BY USER // NO BLOG PARAMS :: http:freelabel.net/@nickhustle/
	/*"SELECT * 
	FROM  `feed` 
	WHERE  `twitter` LIKE '%".$_GET['user_twitter_name']."%'
	ORDER BY `id` DESC LIMIT 1"*/
	$debug[] = 'FIND BY USER';
	$user_twitter_name_array = explode('-',$_GET['user_twitter_name']);
	$debug[] = $user_twitter_name_array[0];
	$sql = "SELECT * 
	FROM  `feed` 
	WHERE `trackname` LIKE '%".$_GET['blog_title']."%'
	AND `twitter` LIKE '%".$user_twitter_name_array[0]."%' ";
	$sql .= "OR `blogtitle` LIKE '%".$blog_title_query."%'
	AND `twitter` LIKE '%".$user_twitter_name_array[0]."%' ";
	$sql .= "ORDER BY `id` DESC LIMIT 1";
	$result2 = mysqli_query($con,$sql); 
} elseif(isset($_GET['post_id'])) { 
// FIND BY POST ID http:freelabel.net/3498
	$sql ="SELECT * 
	FROM  `feed` 
	WHERE  `id` = '".$_GET['post_id']."'
	ORDER BY `id` DESC LIMIT 1";
	$result2 = mysqli_query($con,$sql);
	$debug[] = 'FIND BY ID';
	$debug[] = $sql;
} else { 
// FIND BY POST TITLE http:freelabel.net/@gucciiT/
	$result2 = mysqli_query($con,"SELECT * 
	FROM  `feed` 
	WHERE  `blogtitle` = '".$_GET['user_twitter_name']."'
	ORDER BY `id` DESC LIMIT 1");
	$debug[] = 'FIND BY title';
} 

		if($row = mysqli_fetch_array($result2))
						{
							$blog_post_data = $row;
			//	echo '<hr><hr><pre>'.print_r($_GET).' <hr>: '.print_r($row).'</pre>';
			//exit;


							//print_r($row);
							$post_id 			= 	$row['id'];
							$blogtitle 			= 	$row['blogtitle'];
							$blog_user_name 	= 	$row['user_name'];
							$twitter 			= 	$row['twitter'];
							$post_type 			= 	$row['type'];
							$blog_story_url 	= 	$row['blog_story_url'];
							$current_views 	= 	$row['views'];
							$trackmp3 	= 	$row['trackmp3'];

							if ($row['type']=='single') { // IF SINGLE, GRAB PHOTO
								$photopath 				= 	$row['photo'];
								//echo '<hr><hr><hr>'.$row['type'];
							} else {
								$photo 				= 	$row['photo'];  
								$photopath 			= 	HTTP.'images/'.$row['photo'];
							}

							$meta_tag_photo		= $photopath;
							$twitpic 			= 	$row['twitpic'];
							$blog_type 			= 	$row['type'];
							$playerpath 			= 	$row['playerpath'];
							$submisssion_date 			= 	$row['submisssion_date'];
							
							if ($row['type']=='single') {
							} else {
								$blog_write_up		=	urldecode($row['writeup']);
								$blog_write_up		=	utf8_decode($blog_write_up);
								$blog_write_up		=	utf8_decode($blog_write_up);
								$blog_write_up		=	str_replace('???', "\"", $blog_write_up) ;
								$blog_write_up		=	str_replace('<p>', '', $blog_write_up) ;
								$blog_write_up		=	str_replace('</p>', '', $blog_write_up) ;
							}

							// $blog_write_up		=	str_replace('\\\'', "'", $blog_write_up) ;
							$blogentry 			= 	urldecode($row['blogentry']);

								if ($blog_type == 'single') {
									$blogtitle = $row['blogtitle'];
									$blog_write_up .= '<iframe style="width:100%;height:250px;" src="'.$playerpath.'" frameborder=0 scrolling="no" seamless></iframe>';
									$photopath		= $row['photo'];
								}
								if ($blog_type !='photo' && strpos(strtolower($blogtitle), "video") && strpos(strtolower($blogentry), "iframe")==false) {
									echo '';
									$blogentry = '<iframe src="'.$blogentry.'" style="width:100%;height:450px;" frameborder=0 seamless></iframe>';
									$photopath		= 'http://freelabel.net/images/'.$row['photo'];
								}
								if (isset($blog_write_up)) {
									//echo "what th efuck";
								} else {
									$contributions	=	'by Sierra Page';
									$blog_write_up	=	"More info coming on ".$twitter." coming soon! Stay tuned to FLMag for full details!";	
								}
$page_title = $twitter.' - '.$blogtitle;
$blog_title_explode = explode(' ',$blogtitle);
$share_url = 'FREELABEL.net/'.$twitter.'/'.$blog_title_explode[0];
$twitter_share 	= urlencode(
'[#FLMAG] '.$twitter.'

'.$blogtitle.'

'.$share_url.'

'.$twitpic);
							//echo 'okay okay oka'.$post_id.$blog_story_url.$blog_story_url;
						} else {
							//echo 'it didnt work'.$post_id;
						}

// echo '<pre>';

// grab id and add to database 
$new_view = $current_views+1;

$sql = "UPDATE  `amrusers`.`feed` SET  `views` =  '$new_view' WHERE  `feed`.`id` = $post_id LIMIT 1";
$addStats = mysqli_query($con,$sql);


