<a name="blogposter">
<?php 
include('../../../config/index.php');
include(ROOT.'config/globalvars.php');

if ($user_name == false) {
    $user_name = $_POST['user_name'];
    $user_name_session = $_POST['user_name'];
}
// echo $user_name;
if ($user_name == "admin") {
	echo "
	<a class='btn btn-primary btn-xs' onclick=\"loadPage('http://freelabel.net/rssreader/cosign.php?control=update&rss=1', '#main_display_panel', 'mag')\"  >RSS</a>
	<a class='btn btn-primary btn-xs' href='http://freelabel.net/?ctrl=trx' >UPLOADS</a><hr>";
}
if ($user_name == "manage.amrecords@gmail.com") {
	echo "<a class='btn btn-primary btn-xs' onclick=\"loadPage('http://freelabel.net/rssreader/cosign.php?control=update&rss=1', '#main_display_panel', 'mag')\"  >RSS</a>
	<a class='btn btn-primary btn-xs' href='http://freelabel.net/submit/?control=update' >UPLOADS</a><hr>";
}
?>
<h2 id="sub_label">BLOG POSTING</h2>
<hr>
<form action="http://freelabel.net/x/post_to_blog.php" method="POST" enctype="multipart/form-data" class='panel panel-body'>
	<h4 class="sub_title" >Blog Title
	<br>
	</h4>
		<input class="form-control" type="text" name="blogtitle" value="" placeholder="[INTERVIEW] Subject + Verb + #TOPIC" required></input>
	<select name='blog_type' required class="form-control" >
		<option value='' selected >Please Select..</option>
		<option value=''>_Blank</option>
		<option value='featured'>Exclusive</option>
		<option value='single' >Single</option>
		<option value='event'>Events</option>
		<option value='mixtape'>Mixtape Stream</option>
		<option value='video'>Video</option>
		<option value='interview'>Interview</option>
		<option value='business'>Business</option>
		<option value='science'>Science</option>
		<?php if ($user_name_session == 'admin') { echo "<option value='xxx'>xxx</option>";	}?>
	</select>
	<br>
	<h4 >Blog Entry</h4>
		<center><textarea rows="10" cols="15" style="text-align:left;padding:2%;display:inline-block;" name="blogentry_embed" value="" placeholder="Enter YouTube Video URLs.." class="form-control"></textarea>
		<textarea rows="10" cols="15" style="text-align:left;padding:2%;display:inline-block;" name="blogentry_text" value="" placeholder="Type out your messages here content.." class="form-control"></textarea></center>
	<h4 class="sub_title" >Twitter</h4>
		<?php include('../../../test/twitpic.php'); ?>
		<br>
	<h4 class="sub_title" >TwitPic</h4>
		<input class="form-control" type="text" name="twitpic" value="" placeholder="Paste Twitpic or YouTube URL" ></input><br>
	<h4 class="sub_title" >Photo</h4>
		<input class="form-control" type="file" name="userphoto" id="file" value="Post To Blog" required><br><br>
	<h4 class="sub_title" >Audio</h4>
		<input class="form-control" type="file" name="audiofile" id="file" value="Post To Blog"><br><br>
		<input type="hidden" name="type" value="single">
		<input type="hidden" name="loggedin" value="1">
	<input name="submit" class='btn btn-primary' type="submit">
	<input type='hidden' name='youtube' value='1'>
	<input type='hidden' name='uploaded_from_blog' value='1'>
	<input type='hidden' name='user_name' value='<?php echo $user_name_session; ?>'>
</form>