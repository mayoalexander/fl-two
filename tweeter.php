<div class='' id='dashboard_view_panel_status' style='height:800px;overflow-y:scroll;font-size:100%;color:#e3e3e3;border:red 1px solid;'>
<?php include_once("config/index.php"); ?>
<script type="text/javascript">
function postTweet(textToPost) {

      var textToPost = "http://freelabel.net/som/index.php?post=1&text=" + textToPost;
      tweetWindow = window.open(textToPost);

      setTimeout( function() { tweetWindow.close();
      	window.open('http://twitter.com/freelabelnet');}, 10000);
    }

function OpenTwitpic() {
		q = document.getElementById("twitpicquery").value;
		var search_url = 'https://twitter.com/search?q=' + q +'&mode=photos';
		window.open(search_url);
	}

function postToTwitter(textToPost) {
	var textToPost = textToPost[0]['value'];
		//alert(textToPost);
	//var post = textToPost[1]['value'];
	if (textToPost == '' || textToPost.length <= "5") {
		// NOT COMPLETED
		alert('Please complete the form!')
	} else { // IF NO ERRORS, EXECUTE THE FOLLOWING CODE TO POST
		if (textToPost.indexOf("'")) {
		//alert('Apostrophes found!');
		var textToPost =  textToPost.replace("'","");
		} else {
			//alert('None Apostrophe Found!');
		}
		//alert(textToPost);
// SAVE TO DATABASE
		$.get(<?php echo "'".HTTP."'+";?>'tweeter.php', {
			text : textToPost
		}).done(function(data) {
			//alert(data);
			$('#dashboard_view_panel_status').html(data);
		});
}

}






function delete_tweet(tweet_id) {
	r = confirm('Are you sure you want to delete this tweet?');
	if (r == true)
	{
		$.post('http://freelabel.net/config/deletesingle.php', {
			tweet_id : tweet_id
		} , function(data){
			$('#tweet_row_' + tweet_id + '_status').html('<label class=\"label label-danger\" >Deleting...</label>');
			$('#tweet_row_' + tweet_id).fadeOut(500);
        });
	} else {
		// do nothing!
	}
}


function saveTweet() {
	event.preventDefault();
	var tweet_data = $('.tweet-saver-form').serializeArray();
	//alert( tweet_data);
	console.log(tweet_data);
	postToTwitter(tweet_data);
}


</script>
<?php
	/* -----------------------------------------------------------------------------------------------------
	THIS IS WHERE IT POSTS TO TWITTER
	----------------------------------------------------------------------------------------------------------*/
	if (isset($_GET['text']) && strpos($_GET['text'], 'http://')==false) {
		$textToPost = $_GET['text'];
		include('inc/connection.php');
		$query = "SELECT * FROM templates
		WHERE `text` LIKE '".$textToPost."'";
		$result = mysqli_query($con,$query);
		if($row = mysqli_fetch_assoc($result))
		{
			$text = $row['text'];
			echo 'Oh, no! The post "'.$text.'" already exists!';
			exit;
		}

		// Insert into database
			$sql="INSERT INTO `amrusers`.`templates` (`id`, `text`, `date_created`, `last_posted`) VALUES (NULL, '$textToPost', NOW(), NOW());";
			if (mysqli_query($con,$sql)) {
				echo '<alert class="alert alert-success" style="display:block;">Yay! Saved to Database!</alert>';
			} else {
				echo ' '.$textToPost.'not saved to data!';
			}
		}
?>

<form class="tweet-saver-form" class='panel-body' onsubmit="saveTweet()">
	<textarea class='form-control' name="text" type="text" placeholder='Type out a tweet..'></textarea>
	<input name="post" type="hidden" value="1" >
	<button class='btn btn-primary btn-xs'>POST</button>
</form>

<?php
$show_tweets = true;
	/* -----------------------------------------------------------------------------------------------------
	SHOW SAVED TEMPLATES
	----------------------------------------------------------------------------------------------------------*/
	if ($show_tweets==true) {
		include('inc/connection.php');

		$query = "SELECT * FROM templates ORDER BY `id` DESC";
		$result = mysqli_query($con,$query);

		$int = 1;
		while($row = mysqli_fetch_array($result))
		{
			$id = $row['id'];
			$text = $row['text'];
			$date_created = $row['date_created'];
			$tweet_button = '<button class="btn btn-xs btn-primary fa fa-twitter col-md-10" onclick="postTweet(\''.$text.'\')" ></button>';
			$delete_button = '<button class="btn btn-xs btn-warning " onclick="postTweet(\''.$text.'\')" ></button>';
			$delete_tweet_button = "<button id='submit' onclick='delete_tweet(".$id.")' class='btn btn-danger btn-xs fa fa-trash col-md-2'></button>";

			echo '<div class="" id="tweet_row_'.$id.'" >"'.$text.'" <span class="darker-text link-da-shit"> - '.get_timeago(strtotime($date_created)).'</span> <br>'.$tweet_button . $delete_tweet_button.'</div>';
			$int++;
			if ($date_created == $fivedaysback) {
				//echo "<script>x('".$text."');</script>";
			}

		}
	}
?>

</div>
