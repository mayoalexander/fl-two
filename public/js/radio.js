
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

  function autoStart() {
    $('.audio-player').get(0).play();
    $('.audio-player').get(0).volume = 0.5;
    changePlayer(false);
    // alert('auto starting!');
  }

  // volume control
  $('#volume-meter').change(function(event){
    var volume = $(this).val();
    var setVol = (volume * 0.01);
    $('.audio-player').get(0).volume = setVol;
  });

  // ON CLICK
  $('.radio-menu').click(function(event){
    event.preventDefault();
    var okay = $(this);
    var audioPlayer = $('.audio-player').get(0);
    // audioPlayer.play();
    if (isPlaying(audioPlayer)===true) {
      audioPlayer.pause();
      changePlayer(true);
    } else {
      audioPlayer.play();
      changePlayer(false);
    }
  });
