<a name="blogposter">
	<h2 id="sub_label">BLOG POSTING</h2>
	<hr>
	<div id='main_blog_poster' enctype="multipart/form-data">
		<h4 class="sub_title" >Blog Title
			<br>
		</h4>
		<input class="form-control" type="text" id="blogtitle" placeholder="[INTERVIEW] Subject + Verb + #TOPIC" required></input>
		<select id='blog_type' required class="form-control" >
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
		<center><textarea rows="10" cols="15" style="text-align:left;padding:2%;display:inline-block;" id="blogentry_embed" value="" placeholder="Enter YouTube Video URLs.." class="form-control"></textarea>
			<textarea rows="10" cols="15" style="text-align:left;padding:2%;display:inline-block;" id="blogentry_text" value="" placeholder="Type out your messages here content.." class="form-control"></textarea></center>
			<h4 class="sub_title" >Twitter</h4>
			<?php include('../test/twitpic.php'); ?>
			<br>
			<h4 class="sub_title" >TwitPic</h4>
			<input class="form-control" type="text" id="twitpic" value="" placeholder="Paste Twitpic or YouTube URL" ></input><br>
			<h4 class="sub_title" >Photo</h4>
			<input class="form-control" type="file" id="userphoto" id="file" value="Post To Blog" required><br><br>
			<h4 class="sub_title" >Audio</h4>
			<input class="form-control" type="file" id="audiofile" id="file" value="Post To Blog"><br><br>
			<button name="submit" onclick='submitBlogPost()' class='btn btn-primary'>Submit</button>
			<input type="hidden" id="type" value="single">
			<input type="hidden" id="loggedin" value="1">
			<input type='hidden' id='youtube' value='1'>
			<input type='hidden' id='uploaded_from_blog' value='1'>
			<input type='hidden' id='user_name' value='<?php echo $user_name ?>'>
		</div>



		<script type="text/javascript">
		function submitBlogPost()	{
			var blogtitle	= $("#blogtitle").val();
			var blog_type	= $("#blog_type").val(); 
			var blogentry_embed	= $("#blogentry_embed").val(); 
			var blogentry_text	= $("#blogentry_text").val(); 
			var twitpic	= $("#twitpic").val(); 
			var userphoto	= $("#userphoto").val();
			var audiofile	= $("#audiofile").val();
			var type	= $("#type").val();
			var loggedin	= $("#loggedin").val();
			var youtube	= $("#youtube").val();
			var uploaded_from_blog	= $("#uploaded_from_blog").val();
			var user_name	= $("#user_name").val();

			

			$.post( "http://freelabel.net/x/uploadsubmit.php", { name: "John", time: "2pm" })
			.done(function( data ) {
				//$('#main_blog_poster').fadeOut();
				//alert( "Data Loaded AFTER: " + data );
				$('#main_blog_poster').fadeOut(200);
				$('#main_blog_poster').fadeIn(200);
				$('#main_blog_poster').html(data);
			});

			//alert(blogtitle);
		}
		</script>


