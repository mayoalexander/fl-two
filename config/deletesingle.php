<?php 


include('../inc/connection.php');



$video_id = $_POST['video_id'];
$event_id = $_POST['event_id'];
$post_id = $_POST['post_id'];
$lead_id = $_POST['lead_id'];
$mixtape_id = $_POST['mixtape_id'];
$submission_id = $_POST['submission_id'];
$image_id = $_POST['image_id'];
$product_id = $_POST['product_id'];
$bae_id = $_POST['bae_id'];
$SOM_id = $_POST['SOM_id'];
$tweet_id = $_POST['tweet_id'];
$user_id = $_POST['user_id'];


if ($tweet_id) {
	$deletequery = mysqli_query($con,"DELETE FROM `templates` WHERE `templates`.`id` = $tweet_id LIMIT 1");
	if ($deletequery) {
		//header('Location: http://freelabel.net/submit/?ctrl=videos#tweets');
		echo "Tweet Deleted!!";
	}else {
		echo "Something went wrong! The Tweet did not delete!";
	}


}


if ($user_id) {
	$deletequery = mysqli_query($con,"DELETE FROM `users` WHERE `users`.`user_id` = $user_id LIMIT 1");
	if ($deletequery) {
		//header('Location: http://freelabel.net/submit/?control=videos#videos');
		echo "it worked!";
	}else {
		echo "it didnt";
	}

echo '<hr><hr><hr>YAY';
} else {
echo '<hr><hr><hr>noooo';
}




if ($video_id) {
	$deletequery = mysqli_query($con,"DELETE FROM `videos` WHERE `videos`.`id` = ".$video_id." LIMIT 1");
	if ($deletequery) {
		header('Location: http://freelabel.net/submit/?control=videos#videos');
		echo "it worked!";
	}else {
		echo "it didnt";
	}
}

if ($event_id) {
	$deletequery = mysqli_query($con,"DELETE FROM `schedule` WHERE `schedule`.`id` = ".$event_id." LIMIT 1");
	echo "<script>alert('This Event Has Been Successfully Deleted!')
				window.location.assign('http://freelabel.net/submit/?control=booking#events')
				</script>";

}

if ($SOM_id) {
	$deletequery = mysqli_query($con,"DELETE FROM `som` WHERE `som`.`id` = ".$SOM_id." LIMIT 1");
	echo "<script>alert('Last SOM Has Been Successfully Deleted!')
				window.location.assign('http://freelabel.net/submit/?control=sales#leads')
				</script>";

}

if ($post_id) {
	//echo 'its a post!';
	$deletequery = mysqli_query($con,"DELETE FROM `feed` WHERE `feed`.`id` = ".$post_id." LIMIT 1");
	if ($deletequery) {
		if ($_POST['blog_type']=='mag') {
			echo "	<script>alert('This Magazine Post Has Been Successfully Deleted!') 
					window.location.assign('http://freelabel.net/submit/?control=blog#blog_posts')
				</script>";
			} else {
				echo "	<script>alert('This Single Has Been Successfully Deleted!') 
					window.location.assign('http://freelabel.net/submit/index.php?control=singles#singles')
				</script>";
			}
	} else {
		echo "it didnt";
	}

}

if ($lead_id) {
	$deletequery = mysqli_query($con,"DELETE FROM `leads` WHERE `leads`.`id` = ".$lead_id." LIMIT 1");
	if ($deletequery) {
		echo "<script>alert('This Lead Has Been Successfully Deleted!')
				window.location.assign('http://freelabel.net/submit/?control=sales#leads')
				</script>";
		
		
	}else {
		echo "it didnt";
	}

}

if ($mixtape_id) {
	$deletequery = mysqli_query($con,"DELETE FROM `mixtapes` WHERE `mixtapes`.`id` = ".$mixtape_id." LIMIT 1");
	if ($deletequery) {
		echo "<script>alert('This Mixtape Has Been Successfully Deleted!')
				window.location.assign('http://freelabel.net/submit//#mixtapes')
				</script>";
		
		
	}else {
		echo "it didnt";
	}

}

if ($submission_id) {
	$deletequery = mysqli_query($con,"DELETE FROM `feed` WHERE `feed`.`id` = ".$submission_id." LIMIT 1");
	if ($deletequery) {
		echo "<script>alert('This Submission Has Been Successfully Deleted!')
				window.location.assign('http://freelabel.net/submit/#submissions')
				</script>";
		
		
	}else {
		echo "it didnt";
	}

}


if ($image_id) {
	$deletequery = mysqli_query($con,"DELETE FROM `images` WHERE `images`.`id` = ".$image_id." LIMIT 1");
	if ($deletequery) {
		echo "<script>//alert('This Photo Has Been Successfully Deleted!')
				window.location.assign('http://freelabel.net/submit/index.php?control=photos#photos')
				</script>";
		
		
	}else {
		echo "it didnt";
	}

}

	
	if ($product_id) {
	$deletequery = mysqli_query($con,"DELETE FROM `store` WHERE `store`.`id` = ".$product_id." LIMIT 1");
	if ($deletequery) {
		echo "<script>alert('This Product Has Been Successfully Deleted!')
				window.location.assign('http://freelabel.net/submit/?control=store')
				</script>";
		
		
	}else {
		echo "it didnt";
	}

}


	
	if ($bae_id) {
	$deletequery = mysqli_query($con,"DELETE FROM `me2guru` WHERE `me2guru`.`id` = ".$bae_id." LIMIT 1");
	if ($deletequery) {
		echo "<script>alert('This Bae Has Been Successfully Deleted!')
				window.location.assign('http://freelabel.net/submit/#bae_uploader')
				</script>";
		
		
	}else {
		echo "it didnt";
	}

}


?>