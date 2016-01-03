<?php
$video_id = $_POST['video_id'];
$video_title = $_POST['video_title'];



// UPDATE STORE PRODUCTS
$producttitle = $_POST['producttitle'];
$product_id = $_POST['product_id'];
$status = $_POST['status'];
$price = $_POST['price'];
$store_url = $_POST['store_url'];


// SOM
$som_update = $_POST['som_update'];
$number_of_som_today = $_POST['number_of_som_today'];


// BLOG TITLE UPDATE
$blog_post_id = $_POST['blog_post_id'];
$blog_post_title = $_POST['blog_post_title'];
$blog_post_twitter = $_POST['blog_post_twitter'];
$blog_post_entry = $_POST['blog_post_entry'];
$blog_post_twitpic = $_POST['blog_post_twitpic'];
$blog_write_up	=	urlencode($_POST['blog_write_up']);



// update_single
$onsale = $_POST['onsale'];
$track_title = $_POST['track_title'];
$track_id = $_POST['track_id'];

// DETECT UPDATE TYPE
$type = $_POST['type'];
$submitted = isset($_POST['submit']);
$brand_title = $_POST['brand_title'];
$twitpic = $_POST['twitpic'];
$photopath = $_POST['photopath'];


print_r($_POST);
exit;
//echo $brand_title ;
if ($_POST!==''){






						if ($type == "video") {
								include('../inc/connection.php');	
								$query = mysqli_query($con,"UPDATE  `amrusers`.`videos` SET  `video_title` =  '".$video_title."' WHERE  `videos`.`id` =".$video_id." LIMIT 1 ;");
								if($query) {
									mysqli_close($con);
									echo '  <script>
												window.location.assign("http://freelabel.net/submit/index.php?control=videos")
											</script>';
								} else {
									echo 'Video not updated.<br>';
									mysql_error ();
								}
						} else {
							// echo "VIDEO not detected!<hr>";
						}








						if ($type == "store") {
								include('../inc/connection.php');	
								$query = mysqli_query($con,"UPDATE  `amrusers`.`store` 
									SET  `producttitle` =  '$producttitle' , 
									`brand` =  '$brand_title' , 
									`status` =  '$status' ,
									`twitpic` =  '$twitpic' , 
									`photopath` = '$photopath' , 
									`price` = '$price' ,
									`store_url`	=	'$store_url'
									WHERE  `store`.`id` = '$product_id'
									LIMIT 1 ;");
								if($query) {
									echo $product_title.' '.$status.' '.$price.' '.' '.$store_url.' ';
									mysqli_close($con);
									echo '  <script>
												window.location.assign("http://freelabel.net/?ctrl=store")
											</script>';
								} else {
									echo 'STORE not updated!<br>';
									mysql_error ();
								}
						} else {
							// echo "Product Not Detected<hr>";
						}










						if ($type == "image") {


								// IMAGE UPDATES
								$title = $_POST['title'];
								$desc = $_POST['desc'];
								$image_id = $_POST['image_id'];
								$status = $_POST['status'];
								$twitpic = $_POST['twitpic'];

								include('../inc/connection.php');	
								$query = mysqli_query($con,"UPDATE  `amrusers`.`images` SET  `title` =  '$title',
									`desc` =  '$desc',
									`twitpic` =  '$twitpic',
									`status` =  '".$status."' 
									WHERE  `images`.`id` =".$image_id." LIMIT 1 ;");
								if($query==1) { // SUCCESS
									echo '<label class="alert alert-success text-icon"><span class="glyphicon glyphicon-alert"></span>Photo Updated!</label>';
									//echo 'image id: '.$image_id.') "'.$title.'" "'.$status.'" "'.$desc.'" '.' "'.$twitpic.'"<br><br>';
									mysqli_close($con);
									//echo '  <script>
									//			window.location.assign("http://freelabel.net/?ctrl=pics#image'.$image_id.'")
									//		</script>';
								} else {
									echo $title . ' '.$desc . ' '.$status . ' '.$twitpic . ' ';
									echo 'image id: '.$twitpic.') , Image Found but Images Not Updated!<br>';
									mysql_error ();
								}
						} else {
							// echo "No Image Detected<hr>";
						}











						if ($type == "som") {
								include('../inc/connection.php');	
								$query = mysqli_query($con,"INSERT INTO  `amrusers`.`som` (
						`id` ,
						`date_of_som`
						)
						VALUES (
						NULL , NOW( )
						);");
								if($query) {
									mysqli_close($con);
									echo '  <script>
												//window.location.assign("http://freelabel.net/?ctrl=blog#blog_posts")
											</script>';
								} else {
									echo 'SOM NOT LOGGED!<br>';
									mysql_error ();
								}
						} else {
							// echo 'SOM Update Not Detected<hr>';
						}











						if ($type == "blog") {
								include('../inc/connection.php');	
								$sql_query = "UPDATE  `amrusers`.`blog` SET  
						`blogtitle` =  '$blog_post_title',
						`blogentry` =  '$blog_post_entry',
						`twitter` =  '$blog_post_twitter',
						`writeup` =  '$blog_write_up',
						`twitpic` =  '$blog_post_twitpic' WHERE  `blog`.`id` ='".$blog_post_id."' LIMIT 1";
							
								$query = mysqli_query($con,$sql_query);
								if($query) {
									mysqli_close($con);
									//echo 'yay it worked worked!';
									echo '  <script>
												window.location.assign("http://freelabel.net/index.php?ctrl=blog#blog_posts")
											</script>';
								} else {
									echo 'FUCK THE SHIT DIDNT WORKIt didn\'t work!<br>';
									mysql_error ();
								}
						} else {
							// echo "<hr>FUCK. THE BLOG SHIT DIDNT WORK";
						}








						if ($type == "update_single") {
								include('../inc/connection.php');	
								$sql_query = "UPDATE  `amrusers`.`blog` SET  
						`onsale` =  ".$onsale." WHERE  `blog`.`id` ='".$track_id."' LIMIT 1";
							
								$query = mysqli_query($con,$sql_query);
								if($query) {
									mysqli_close($con);
									echo 'yay it worked worked!';
									echo $onsale;
									echo '  <script>
												window.location.assign("http://freelabel.net/?ctrl=singles#singles")
											</script>';
								} else {
									echo 'FUUUUUUUUUUUUUUUUUUC!<br>';
									mysql_error ();
								}
						} else {
							// echo "<hr>FUUUUUUUUUUUUUUUUUUC. THE BLOG SHIT DIDNT WORK";
						}







						if ($type == "lead") {
								include('../inc/connection.php');	
								$query = mysqli_query($con,"INSERT INTO  `amrusers`.`som` (
						`id` ,
						`date_of_som`
						)
						VALUES (
						NULL , NOW( )
						);");
								if($query) {
									mysqli_close($con);
									echo '  <script>
												window.location.assign("http://freelabel.net/?ctrl=sales#leads")
											</script>';
								} else {
									//echo 'It didn\'t work!<br>';
									mysql_error ();
								}
						}




} else {
	echo 'no Data Sent!';
}