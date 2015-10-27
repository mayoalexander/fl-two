<script>
function openDashOptions() {
		$('#advanced_options').slideToggle('fast');
	}
function downloadSoundcloud() {
	//alert('clicked')
	$('#advanced_options').slideToggle('fast');
	soundcloud_link = document.getElementById('soundcloud_link').value;
	window.open('http://anything2mp3.com/?url=' + soundcloud_link)
}
$(function(){

	$( "#soundcloud-form" ).submit(function( event ) {
		event.preventDefault();
		$('#advanced_options').slideToggle('fast');
		soundcloud_link = document.getElementById('soundcloud_link').value;
		window.open('http://anything2mp3.com/?url=' + soundcloud_link)
		//window.open('http://keepvid.com/?url=' + soundcloud_link)

	  	
	});

});
</script>

<?php
$soundcloud_downloader = "
<form id='soundcloud-form' class='soundcloud-download input-group'>
	<input type='text' id='soundcloud_link' class='form-control' placeholder='Paste Soundcloud URL'>
	<span class='input-group-btn'>
		<input name='ctrl' value='rss'>
		<button class='btn btn-xs btn-default' onclick=''>Download</button>
	</span>
</form>
";


if ($_SESSION['user_name']) {

		$admin_controls	=	 '
			<hr>
			<a href="?control=store#store" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-globe"></span> - Store</a>
			<a href="?control=sales#script" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-globe"></span> - Scripts</a>
			<a href="?control=sales#leads" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-usd"></span> - Sales</a>
			<br>
			<a href="?control=blog#blog_posts" class="btn btn-warning btn-xs" ><span class="glyphicon glyphicon-book"></span> - Magazine</a>
			<a href="?control=update#blogposter" class="btn btn-warning btn-xs" ><span class="glyphicon glyphicon-pencil"></span> - Post</a>
			<a href="?control=clients#blogposter" class="btn btn-warning btn-xs" ><span class="glyphicon glyphicon-user"></span> - Clients</a>';
			


			echo '<div id="twitpic" class="" style="">';
				echo '<div id="advanced_options" class="" style="display:none;">';
				echo '
				<div class="input-group">
					<input type="text" name="twitter" id="twitpicquery" class="form-control" placeholder="Twitter Username">
					<span class="input-group-btn">
						<input type="button" class="btn btn-success" name="submit" placeholder="Search for Photos.." onclick="OpenTwitpic()" value="Twitpic Search.." >
					</span>
				</div>
				<hr>';
				echo $admin_buttons;
				echo '<a href="https://studio.radio.co/stations/s95fa8cba2" target="_blank" class="btn btn-danger btn-xs" >RADIO</a>'; 
				echo '<a href="http://freelabel.net/som/index.php?som=1&stayopen=1&mins=4&live=1" target="_blank" class="btn btn-success btn-xs" >LIVE</a>'; 
				echo '<a href="http://freelabel.net/som/index.php?som=1&stayopen=1&mins=4&organic=1&recent=1" target="_blank" class="btn btn-success btn-xs" >PROMO</a>'; 
				echo '<a href="https://ads.twitter.com/accounts/gueorv/cards/show?url_id=9fou" target="_blank" class="btn btn-primary btn-xs" >SOMCard</a>'; 

				echo '<a href="https://tweetdeck.twitter.com/" target="_blank" class="btn btn-primary btn-xs" >TWEETDECK</a>';			//https://trello.com/b/od3WonId/production		
				echo '<a href="https://trello.com/b/od3WonId/production" target="_blank" class="btn btn-primary btn-xs" >TRELLO</a>';					
				echo '<a href="https://inbox.google.com/u/0/?pli=1" target="_blank" class="btn btn-primary btn-xs" >MAIL</a><hr>';					


				// include(ROOT."test/twitpic.php");
					//echo "<hr>";
				echo '<div class="" style="max-height:225px;overflow-y:scroll;">';
					include(ROOT."tweeter.php");
				echo '</div>';
				echo "<hr>";
					//echo '<div class="panel-body">';
						echo $soundcloud_downloader;
					//echo '</div>';
				echo "</div>";

			echo "<button onclick='openDashOptions()' class='btn btn-xs btn-warning' ><i class='fa fa-cog'></i> Controls</button>";
			echo '</div>';
				
			//echo $admin_controls;
		}
?>




