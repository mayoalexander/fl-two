<?php
$config = new Blog($_SERVER['HTTP_HOST']);
$syst = new Config();
// echo '<pre>';
// print_r($site);
// exit;


?>
<?php
// include('../rssreader/cosign.php');
// $url= ROOT.'admin_controller.php';
// if (file_exists($url)) {
//   include($url);
//  echo 'yes!';
// } else {
//   echo "No!";
// }
echo $syst->showAdminController();

// var_dump($syst);
// var_dump($syst);


?>
<script>
function openDashOptions() {
    event.preventDefault();
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

    // validation 
    if (soundcloud_link==='') {
      alert('nothing entered!');
      return;
    }
		var s = "youtu";
		if (soundcloud_link.indexOf('soundcloud') > -1) {
      // alert('its a soundcloud!');
			window.open('http://anything2mp3.com/?url=' + soundcloud_link)
		} else if (soundcloud_link.indexOf('youtu') > -1) {
      // alert('its a youtube video!');
      // window.open('http://keepvid.com/?url=' + soundcloud_link)
      // string replace soundcloud_link and take out the url
      var res = soundcloud_link.replace("http://youtube.com/", "");
			window.open('http://savemedia.com/?url=' + res);
		} else {

      // alert('idk what it is!');
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
<style media="screen">
  #twitpic {
    position:fixed;
    bottom:5%;
    left: 5%;
    z-index: 1000;
    background-color: rbga(0,0,0, 0.9);
    background-color: #101010;
    padding:2%;
    border: red solid 1px;
  }
  #twitpic button {
      border-radius: 0;
  }
  .downloader, .soundcloud-download {
    display: inline-block;
  }
</style>
<?php
$soundcloud_downloader = "
<form id='soundcloud-form' class='soundcloud-download input-group'>
	<input type='text' id='soundcloud_link' class='form-control' placeholder='Paste Soundcloud URL'>
	<span class='input-group-btn'>
		<input type='hidden' name='ctrl' value='rss'>
		<button class='btn btn-success-outline' onclick=''>Download</button>
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



			echo '<div id="" class="navbar navbar-light bg-faded navbar-fixed-bottom" style="">';


      echo '<a class="navbar-brand" href="#"></a>
  <ul class="nav navbar-nav">
  <button onclick="openDashOptions()" class="btn btn-warning-outline" ><i class="fa fa-cog"></i></button>

  <span class="downloader">
    '.$soundcloud_downloader.'
  </span>
  </ul>
';
  // 
				echo '<div id="advanced_options" class="" style="display:none;">';


				echo '<div class="btn-group">';
					echo '<a href="https://studio.radio.co/stations/s95fa8cba2" target="_blank" class="btn btn-danger btn-xs" >RADIO</a>';
					echo '<a href="http://freelabel.net/som/index.php?som=1&stayopen=1&mins=4&live=1" target="_blank" class="btn btn-success btn-xs" >LIVE</a>';
          echo '<a href="https://web.crowdfireapp.com/#/grow/1018532587-tw/nonFollowers" target="_blank" class="btn btn-danger btn-xs">CROWDFIRE</a>';
					echo '<a href="https://ads.twitter.com/accounts/gueorv/cards/show?url_id=9fou" target="_blank" class="btn btn-primary btn-xs" >SOMCard</a>';

					echo '<a href="https://tweetdeck.twitter.com/" target="_blank" class="btn btn-primary btn-xs" >TWEETDECK</a>';			//https://trello.com/b/od3WonId/production
					echo '<a href="https://trello.com/b/od3WonId/production" target="_blank" class="btn btn-primary btn-xs" >TRELLO</a>';
					// echo '<a href="https://inbox.google.com/u/0/?pli=1" target="_blank" class="btn btn-primary btn-xs" >MAIL</a>';
				echo '</div>';
  				// echo '<details class="details-panel" style="max-height:200px;overflow-y:scroll;" >';
  				// 	include(ROOT.'tweeter.php');
  				// echo '</details>';
					//echo '<div class="panel-body">';
						
						//echo $twitpic_downloader;
					//echo '</div>';
				echo "</div>";

			echo '</div>';

			//echo $admin_controls;
?>













<div id='main_display_panel' >
  <div class="jubmotron container">
    <h1 style="padding-top:5vh;">Welcome to the Admin Dashboard</h1>
    <p>Here are some of the test apps in development:</p>
  </div>
  <hr>
  <section class="jubmotron container">
    <h3>Instagram App</h3>
    <p>Instagram App for loggin in and viewing users, searching, and profiles.</p>
    <a class="btn btn-primary-outline" target="_blank" href="http://freelabel.net/vendor/instagram/example/">Instagram</a>
  </section>
</div>






















<!--
<section class="row" style='padding:5%;'>
    <div class="col-md-8">
        <div class="card card-inverse card-social text-center">
          <div class="card-block has-gradient">
            <img src="<?php echo $site['user']['profile-image'] ?>" height="90" width="90" alt="Avatar" class="img-circle">
            <h5 class="card-title">Joel Fisher</h5>
            <h6 class="card-subtitle">hey@joelfisher.com</h6>
            <button type="submit" class="btn btn-secondary-outline btn-sm">Follow</button>
          </div>
          <div class="card-block container">
            <div class="row">
              <div class="col-md-4 card-stat">
                <h4>149 <small class="text-uppercase">Shots</small></h4>
              </div>
              <div class="col-md-4 card-stat">
                <h4>1,763 <small class="text-uppercase">Follows</small></h4>
              </div>
              <div class="col-md-4 card-stat">
                <h4>324 <small>D/Ls</small></h4>
              </div>
            </div>
          </div>
        </div>
    </div>
  	<div class="col-md-4">
        <div class="card card-chart">
          <div id="chart-holder" class="center-block" data-active="90%">
            <canvas id="chart-area" class="center-block" width="820" height="820" style="width: 410px; height: 410px;"></canvas>
          </div>
          <ul class="list-group">
            <li class="list-group-item complete">
              <span class="label pull-right">324</span>
              <span class="icon-status status-completed"></span> Completed
            </li>
            <li class="list-group-item">
              <span class="label pull-right">34</span>
              <span class="icon-status status-backlog"></span> In backlog
            </li>
            <li class="list-group-item">
              <span class="label pull-right">20</span>
              <span class="icon-status status-noticket"></span> Without ticket
            </li>
          </ul>
        </div>
        <hr class="invisible">
      </div>
</section>
 -->

<script type="text/javascript">
  $(function(){
    $('.dash-filter').click(function(){
      var tabName = $(this).attr('data-load');
      //alert(tabName + ' clicked!');
    });
  });

</script>
