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
		var s = "youtu";
		if (soundcloud_link.indexOf(s) > -1) {
			window.open('http://anything2mp3.com/?url=' + soundcloud_link)
		} else if (soundcloud_link.indexOf(s) > -1) {
			window.open('http://keepvid.com/?url=' + soundcloud_link)
		} else {
			window.open('http://anything2mp3.com/?url=' + soundcloud_link)
		}

	});

	$( "#twitpic-form" ).submit(function( event ) {
		event.preventDefault();
		$('#advanced_options').slideToggle('fast');
		soundcloud_link = document.getElementById('twitpic_link').value;
		// alert(soundcloud_link);
		window.open('http://anything2mp3.com/?url=' + soundcloud_link);
	});


});
</script>

<?php
$soundcloud_downloader = "
<form id='soundcloud-form' class='soundcloud-download input-group'>
	<input type='text' id='soundcloud_link' class='form-control' placeholder='Paste Soundcloud URL'>
	<span class='input-group-btn'>
		<input type='hidden' name='ctrl' value='rss'>
		<button class='btn btn-xs btn-default' onclick=''>Download</button>
	</span>
</form>
";
$twitpic_downloader = "
<form id='twitpic-form' class='twitpic-download input-group'>
	<input type='text' id='twitpic_link' class='form-control' placeholder='Paste twitpic URL'>
	<span class='input-group-btn'>
		<input name='ctrl' value='rss'>
		<button class='btn btn-xs btn-default' onclick=''>Search</button>
	</span>
</form>
";




		$admin_controls	=	 '
				<a href="?control=store#store" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-globe"></span> - Store</a>
				<a href="?control=sales#script" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-globe"></span> - Scripts</a>
				<a href="?control=sales#leads" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-usd"></span> - Sales</a>
				<br>
				<a href="?control=blog#blog_posts" class="btn btn-warning btn-xs" ><span class="glyphicon glyphicon-book"></span> - Magazine</a>
				<a href="?control=update#blogposter" class="btn btn-warning btn-xs" ><span class="glyphicon glyphicon-pencil"></span> - Post</a>
				<a href="?control=clients#blogposter" class="btn btn-warning btn-xs" ><span class="glyphicon glyphicon-user"></span> - Clients</a>
				</div>
			';



			echo '<div id="twitpic" class="" style="">';
				echo '<div id="advanced_options" class="" style="display:none;">';


				echo '<div class="btn-group">';
					echo '<a href="https://studio.radio.co/stations/s95fa8cba2" target="_blank" class="btn btn-danger btn-xs" >RADIO</a>';
					echo '<a href="https://web.crowdfireapp.com/#/grow/1018532587-tw/nonFollowers" class="btn btn-danger btn-xs">CROWDFIRE</a>';
					// echo '<a href="http://freelabel.net/som/index.php?som=1&stayopen=1&mins=4&live=1" target="_blank" class="btn btn-success btn-xs" >LIVE</a>';
					// echo '<a href="http://freelabel.net/som/index.php?som=1&stayopen=1&mins=4&organic=1&recent=1" target="_blank" class="btn btn-success btn-xs" >PROMO</a>';
					echo '<a href="https://ads.twitter.com/accounts/gueorv/cards/show?url_id=9fou" target="_blank" class="btn btn-primary btn-xs" >SOMCard</a>';

					echo '<a href="https://tweetdeck.twitter.com/" target="_blank" class="btn btn-primary btn-xs" >TWEETDECK</a>';			//https://trello.com/b/od3WonId/production
					echo '<a href="https://trello.com/b/od3WonId/production" target="_blank" class="btn btn-primary btn-xs" >TRELLO</a>';
					// echo '<a href="https://inbox.google.com/u/0/?pli=1" target="_blank" class="btn btn-primary btn-xs" >MAIL</a>';
				echo '</div>';
				echo '<details class="details-panel" style="max-height:200px;overflow-y:scroll;" >';
					include(ROOT.'tweeter.php');
				echo '</details>';
					//echo '<div class="panel-body">';
						echo $soundcloud_downloader;
						//echo $twitpic_downloader;
					//echo '</div>';
				echo "</div>";

			echo "<button onclick='openDashOptions()' class='btn btn-xs btn-warning' ><i class='fa fa-cog'></i> Controls</button>";
			echo '</div>';

			//echo $admin_controls;
?>
