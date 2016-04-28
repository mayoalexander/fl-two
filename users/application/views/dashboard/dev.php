<?php
  $config = new Blog($_SERVER['HTTP_HOST']);
  // add these stats in here somehwere in the layout
  $stats = $config->getStatsByUser($site['user']['name']);
  $current_page = '0';
?>
<div class="tabs tabs-style-linemove" id="main_display_panel" >
  <nav>
    <ul>
      <li><a href="#section-linemove-1" class="icon icon-home dash-filter" data-load="submissions"><span>
      <!-- <i class="fa fa-rss-square" ></i> -->
       submissions</span></a></li>
      <li><a href="#section-linemove-2" class="icon icon-display dash-filter" data-load="rss"><span>
      <!-- <i class="fa fa-database" ></i> -->
       Rss</span></a></li>
      <li><a href="#section-linemove-3" class="icon icon-plug dash-filter" data-load="twitter"><span>
      <!-- <i class="fa fa-bullhorn" ></i> -->
       Twitter</span></a></li>
      <li><a href="#section-linemove-4" class="icon icon-upload dash-filter" data-load="leads"><span>
      <!-- <i class="fa fa-music" ></i> -->
       Leads</span></a></li>
      <li><a href="#section-linemove-5" class="icon icon-date dash-filter" data-load="script"><span>
      <!-- <i class="fa fa-calendar" ></i> -->
       script</span></a></li>
    </ul>
  </nav>
  <div class="content-wrap">

    <section id="submissions" class="autoload al-submissions">
        <!-- display content  -->
        <?php 
        // echo '<pre>';
        // var_dump($_SESSION['access_token']);
          // $files = $config->display_user_posts_new('admin' , $current_page);
          // echo $files['posts']; 
        ?>
    </section>

    <section id="rss" class="autoload al-rss" data-load="rss"></section>

    <section id="twitter" class="autoload al-twitter" data-load="twitter"></section>

    <section id="leads" class="autoload al-leads" data-load="leads"></section>

    <section id="script" class="autoload al-script" data-load="script"></section>

  </div><!-- /content -->
</div><!-- /tabs -->


<script type="text/javascript" src="http://freelabel.net/js/dashboard.js"></script>















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
      window.open('http://keepvid.com/?url=' + soundcloud_link)
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
    opacity: 0.7;
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
  <span class='input-group-btn'>
    <input type='hidden' name='ctrl' value='rss'>
    <!--<button class='btn btn-success-outline' onclick=''>Download</button>-->
    <input type='text' id='soundcloud_link' class='form-control' placeholder='Paste Soundcloud URL'>
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




    $admin_controls =  '
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

          echo '<a href="https://tweetdeck.twitter.com/" target="_blank" class="btn btn-primary btn-xs" >TWEETDECK</a>';      //https://trello.com/b/od3WonId/production
          echo '<a href="https://trello.com/b/od3WonId/production" target="_blank" class="btn btn-primary btn-xs" >TRELLO</a>';
          // echo '<a href="https://inbox.google.com/u/0/?pli=1" target="_blank" class="btn btn-primary btn-xs" >MAIL</a>';
        echo '</div>';
          // echo '<details class="details-panel" style="max-height:200px;overflow-y:scroll;" >';
          //  include(ROOT.'tweeter.php');
          // echo '</details>';
          //echo '<div class="panel-body">';
            
            //echo $twitpic_downloader;
          //echo '</div>';
        echo "</div>";

      echo '</div>';

      //echo $admin_controls;
?>





