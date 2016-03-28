
  function isPlaying(audelem) { return !audelem.paused; }
  function changePlayer(status) {
    // alert(status);
    if (status===true) {
      var status = 'play';
    } else {
      var status = 'pause';
    }
    var build = '<i class="fa fa-'+status+'"></i> ';
    $('.audio-player-title').html(build);
  }

  // play audio on load
  $(function(){
    $('#audio_player').get(0).play();
    $('#audio_player').get(0).volume = 0.5;
    changePlayer(false);
  });

  // volume control
  $('#volume-meter').change(function(event){
    var volume = $(this).val();
    var setVol = (volume * 0.01);
    $('#audio_player').get(0).volume = setVol;
  });

  // ON CLICK
  $('.radio-menu').click(function(event){
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
