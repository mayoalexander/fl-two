<?php //include_once('../new_header.php'); ?>
<script src='http://freelabel.net/js/like_post.js'></script>
<style>
.playlist_panel {
  font-size:60%;
}
</style>
<div class='playlist_panel'>
<?php 
if ($user_name_session == '') {
  $user_name_session = 'admin';
}
include_once('../../config/index.php');

include_once(ROOT.'test/audio_player/singleslist.php');
//echo $audio_player_playlist;
  $i=1;
  foreach ($audio_player_playlist_set as $track) {
    $playlist_track[$i] = $track;
    $i++;
  }
  //print_r($playlist_track);
  //echo '<iframe style="width:675px;height:73px;" frameborder=0 seamless src="play.php"></iframe><hr>';
  //include('play.php');
  echo '<div id="mainAudioPlayer" class="well track-wrapper" >';
      echo '<h1 id="np-title">No Song Playing..</h1>';
      echo '<h2 id="np-name">Choose one now!</h2>';
      echo '<audio id="audio_element" controls preload="none">';
        echo "<source src=''>";
      echo '<audio>';
  echo '</div>';


  echo '<div class="panel panel-body" >';
    foreach ($playlist_track as $track) {
      $playerpath = $track[3];
      $trackmp3 = $track[0];
      $trackname = $track[2];
      $trackmp3 = $track[1];
      $track_id = $track[4];
      $current_likes = $track[5];

      echo '<div class="track-wrapper">';
      //xecho "<button onclick='controlMusicPlayer(\"".$track[0]."\" , \"".$track[1]."\" , \"".$track[2]."\" , \"".$track[3]."\" )' class='btn btn-primary' >Play</button>";
      echo '<h3 class="track-title">'."<button onclick='controlMusicPlayer(\"".$track[0]."\" , \"".$track[1]."\" , \"".$track[2]."\" , \"".$track[3]."\" )' class='btn btn-primary play-button' >Play</button>".$track[1]."</h3>";
      echo '<h4 class="track-name">'.$track[2]."</h4>";
      echo '<span class="track-mp3">'.$track[0]."</span>";
      include(ROOT.'config/share.php');
      findByID($track_id);
      //echo '<a class="btn btn-default btn-xs" href="'.$track[3].'" target="_blank">VIEW</a>';
      //echo '<a class="btn btn-default btn-xs" href="'.$track[3].'" target="_blank">SHARE</a>';
      
      echo '</div>';
    }


    ?>


<style>
.track-wrapper ,.track-url {
  display:block;
  padding:2%;
  border-bottom:1px solid #e3e3e3;
}
.track-wrapper .btn {
  margin-right:1%;
}
.track-title, .track-mp3 , .track-name, .track-url {
  display: block;
  margin:0;
  padding:0;
  color:#303030;
}
.track-name {
  color:#FE3F44;

}

.track-mp3, .track-url {
  display:none;
}


</style>



<script type="text/javascript">


  function controlMusicPlayer(mp3, trackname , twitter , playerpath) {
    //alert(mp3 + ' <br> trackname: ' +trackname + ' twitter: ' + twitter +  ' url: ' + playerpath);

    var audioPlayers = $('html').find('audio');
    //alert(length(audioPlayers));
    console.log(audioPlayers)
    $('#mainAudioPlayer #np-title').html(trackname);
    $('#mainAudioPlayer #np-name').html(twitter);
    $('#audio_element').attr('src',mp3);
    //$('#mainAudioPlayer audio').attr('autoplay',1);
    //$('#mainAudioPlayer audio').trigger('stop');
    $('audio').trigger('stop');
    $('#audio_element').trigger('play');
  }


  </script>
</div>



  <?php //include('../new_footer.php'); ?>