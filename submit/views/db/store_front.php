<a name="store">

<?php
if ($user_name_session == false) {
    $user_name_session = $_POST['user_name'];
    $user_name = $_POST['user_name'];
  }
  echo $user_name;
  
if ($user_name == "admin") {
	$status = "onsale";
}

$submit_form = '<br><form class="form-horizontal" method="POST" action="http://freelabel.net/submit/views/db/store_front.php">
<fieldset>

<!-- Form Name -->
<legend>++ ADD MERCHANDISE</legend>

<!-- Text input-->
<input name="user_name" type="hidden" value="'.$user_name.'">
<input name="status" type="hidden" value="'.$status.'">
<!-- Text input-->

<div class="control-group">
  <label class="control-label" for="producttitle">Brand Title</label>
  <div class="controls">
    <input id="brand_title" name="brand_title" type="text" placeholder="Enter Brand Title.." class="form-control" required="">
  </div>
</div>


<div class="control-group">
  <label class="control-label" for="producttitle">Product Title</label>
  <div class="controls">
    <input id="video_title" name="producttitle" type="text" placeholder="Enter Product Title.." class="form-control" required="">
  </div>
</div>

<div class="control-group">
  <label class="control-label" for="product_price">Price</label>
  <div class="controls">
    <input id="video_url" name="product_price" type="text" placeholder="Enter Price.." class="form-control" required="">
  </div>
</div>

<div class="control-group">
  <label class="control-label" for="twitpic">Twitpic</label>
  <div class="controls">
    <input  name="twitpic" type="text" placeholder="for example: '.$twitpic_default_mixtape.'" class="form-control" required="">
  </div>
</div>

<div class="control-group">
  <label class="control-label" for="twitpic">PhotoURL</label>
  <div class="controls">
    <input name="photopath" type="text" placeholder="http://img.freelabel.net/freelabellogo.png" class="form-control" required="">
  </div>
</div>

<div class="control-group">
  <label class="control-label" for="twitpic">StoreURL</label>
  <div class="controls">
    <input name="store_url" type="text" placeholder="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclic..." class="form-control" required="">
  </div>
</div>

<div class="control-group">
  <label class="control-label" for="twitpic">Category</label>
  <div class="controls">
    <input name="category" type="text" placeholder="Studios, etc..." class="form-control" required="">
  </div>
</div>

<!-- Button -->
<div class="control-group">
  <div class="controls">
    <input type="submit" name="submit" value="Post Product" class="btn btn-primary">
  </div>
</div>
<input type="hidden" name="user_name" value="'.$user_name.'">

</fieldset>
</form>';
?>

<h2 id="sub_label">YOUR STOREFRONT:</h2>
<a href='http://store.freelabel.net/' target='_blank' class='btn btn-primary btn-xs' >View Store</a><hr>
<script>
	function bookShow() {
		window.open("http://freelabel.net/x/bookshowcase.php","_blank","toolbar=yes, scrollbars=yes, resizable=yes, top=500, left=500, width=400, height=400");
</script>


<?php 
// BOOK SHOWCASE GENERATOR

function create_product() {
		if ($_POST['submit']) {
			$user_name =  $_POST['user_name'];
			$status =  $_POST['status'];
			$product_price =  $_POST['product_price'];
			$producttitle =  $_POST['producttitle'];
			$photopath =  $_POST['photopath'];
			$twitpic =  $_POST['twitpic'];
			$store_url	=	$_POST['store_url'];
			$category =		$_POST['category'];
			$brand_title = $_POST['brand_title'];

			include('../../../inc/connection.php');
			// Insert into database
				$sql="INSERT INTO store (user_name, 
					producttitle, 
					photopath, 
					brand,
					twitpic, 
					status, 
					store_url,
					category,
					price) VALUES ('$user_name','$producttitle',
					'$photopath',
					'$brand_title',
					'$twitpic',
					'$status',
					'$store_url',
					'$category',
					'$product_price')";
				if (mysqli_query($con,$sql))
				  {  
				  echo "Entry Created Successfully! ";
					echo '<style>
					html {
					color:#fff;
					background-color:#303030;
					margin:10%;
					font-size:300%;
					font-family:sans-serif;
					}
					</style>';
					echo $producttitle." has been listed for ".$product_price." and will be reviewed for confirmation. Please stay updated!
					<a href='http://submit.freelabel.net/'>Return to Dashboard</a><br><br><br><br><br><br>";
				  	// echo $user_name;
				  }
				else
				  {
				  echo "Error creating database entry: " . mysqli_error($con);
				  }
		}	
}
create_product();

// DISPLAY SAVED PRODUCTS
include('../../../inc/connection.php');
$result = mysqli_query($con,"SELECT * FROM store WHERE user_name='".$user_name."' ORDER BY `id` DESC LIMIT 6");

if (mysqli_fetch_array($result) == 0) {
	echo '<p id="joinbutton">';
	echo 'You have no Products in the store.
	</p>';
} 

if (mysqli_fetch_array($result)) {
		$result = mysqli_query($con,"SELECT * FROM store WHERE user_name='".$user_name."' ORDER BY `id` DESC LIMIT 6");
		if ($user_name_session == 'admin') {
			$result = mysqli_query($con,"SELECT * FROM store ORDER BY `id` DESC LIMIT 20");
		}
		while($row = mysqli_fetch_array($result))
		{
		$product_id = $row['id'];	
		$producttitle = $row['producttitle'];
		$price = $row['price'];
		$photopath = $row['photopath'];
		$photo_embed = "<img src='". $photopath . "' width='100%' >";
		$twitpic=	$row['twitpic'];
		$status=	$row['status'];
		$store_url	=	$row['store_url'];
		$brand_title = $row['brand'];
		$item_code = $row['item_code'];


$tweet_message_tv_show = urlencode("[#FREELABELSTORE] ".$twitter .":

".$producttitle." - $".$price."

STORE.FREELABEL.net
".$twitpic);
			
			$originalDate = $showcase_day;
			echo '<div style="width:32%;display:inline-block;vertical-align:text-top;margin:auto;background-color:#FFCF00;margin:0.5%;padding:1%;">';
				echo $photo_embed."<br>";
				echo '
				<form method="POST" action="http://x.freelabel.net/update_title.php" >
					
					<input type="hidden" name="type" value="store" class="form-control" >
					
					<div class="input-group" >
						<span class="input-group-addon">Brand:</span>
						<input type="text" name="brand_title" value="'.$brand_title.'" class="form-control">
					</div>

					<div class="input-group" >
						<span class="input-group-addon">Title:</span>
						<input type="text" name="producttitle" value="'.$producttitle.'" class="form-control">
					</div>
					
					<div class="input-group" >
						<span class="input-group-addon">$</span>
						<input type="text" name="price" value="'.$price.'" class="form-control" >
					</div>
					<div class="input-group" >
						<span class="input-group-addon">Twitpic</span>
						<input type="text" name="twitpic" value="'.$twitpic.'" class="form-control" >
					</div>
					<div class="input-group" >
						<span class="input-group-addon">Status</span>
						<input type="text" name="status" value="'.$status.'" class="form-control" >
					</div>
					<div class="input-group" >
						<span class="input-group-addon">Pic</span>
						<input type="text" name="photopath" value="'.$photopath.'" class="form-control" >
					</div>
					<div class="input-group" >
						<span class="input-group-addon">$URL</span>
						<input type="text" name="store_url" value="'.$store_url.'" class="form-control" >
					</div>

					<input name="product_id" type="hidden" value="'.$product_id.'">
					<input type="submit" value="UPDATE MERCH" name="submit" class="btn btn-primary">
				</form>
				';
				echo "<form method='POST' action='deletesingle.php' >";
				echo "<a target=\"_blank\"  class='btn btn-primary'  href=\"https://twitter.com/intent/tweet?screen_name=&text=".$tweet_message_tv_show."\" class=\"twitter-mention-button\" data-related=\"SirAlexMayo\">TWITTER</a>";
				echo "<input name='product_id' type='hidden' value='".$product_id."'><input type='submit' value='DELETE' class='btn btn-primary' ></form>";
			echo '</div>';
		}
mysqli_close($con);
}

// CAMPAIGN MANAGER FORM
echo $submit_form;
?> 
