<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://public.radio.co/playerapi/jquery.radiocoplayer.min.js"></script>

<style type="text/css">
  .radioco-nowPlaying, .radioco-volume, .radioco-elapsedTime {
    display: block;
    text-align: center;
    margin:auto;
  }
  .player-trigger .fa {
    /*font-size: 5rem;*/
  }
  .player-trigger {
    width:150px;
    height:72px;
    position: relative;
    bottom: 10px;
  }
  .nostyle {
    margin:auto;
    display:block;
    text-align: center;
  }
  .jumbotron {
    min-height:0;
    height:40vh;
  }

  @media (max-width: 600px) {
  .player-trigger {
    width: 100%;
    height:80px;
  }
  .jumbotron-body {
    text-align: center;
  }
}

/*  .player-trigger {
    border-radius: 4rem;
  }*/
</style>
<header class="jumbotron" ></header>
<header class="">
  <div class="container jumbotron-body">
      <hr>
      <h1 class="display-3"><button class="player-trigger btn btn-secondary-outline"><i class="fa fa-circle-o-notch fa-spin"></i> Loading</button> FREELABEL RADIO</h1>
      <p>Streaming Live 24/7 with something ALWAYS going on.</p>
      <h2 class="radioplayer"
      data-elapsedtime="false"
      data-showartwork="false"
      data-showplayer="false"
      data-volumeslider="false"
      data-src="http://streaming.radio.co/s95fa8cba2/listen"
      data-nowplaying="true"></h2></center>
  </div>
  <hr>
  <section>

  </section>
  <!-- hidden audioplayer  -->
  <audio id="audio_player">
    <source src="http://streaming.radio.co/s95fa8cba2/listen">
  </audio>
</header>


<script>$('.radioplayer').radiocoPlayer();</script>
<script type="text/javascript">

  function isPlaying(audelem) { return !audelem.paused; }
  function changePlayer(status) {
    // alert(status);
    if (status===true) {
      var status = 'play';
    } else {
      var status = 'pause';
    }
    var build = '<i class="fa fa-'+status+'"></i> ';
    $('.player-trigger').html(build);
  }

  // play audio on load
  $(function(){
    $('#audio_player').get(0).play();
    $('#audio_player').get(0).volume = 0.05;
    changePlayer(false);
  });
  $('.player-trigger').click(function(event){
    event.preventDefault();
    var okay = $(this);
    var audioPlayer = $('#audio_player').get(0);
    // audioPlayer.play();
    if (isPlaying(audioPlayer)===true) {
      audioPlayer.pause();
      changePlayer(true);
    } else {
      audioPlayer.play();
      changePlayer(false);
    }
  });




</script>