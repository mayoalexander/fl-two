$(function(){

    function runCheck(){
      var vids = $('video');
      var audio = $('audio');

      console.log(vids);
      // console.log(audio[0].paused);
      vids.each(function(index) {
        var d = $(this);
        console.log(d[0].pause());
      });
      audio[0].pause();


    }

    $('.promo-image').click(function(){
      // stop all other players
      runCheck();

      // show the modoal
      $('#promoModal').modal('show');

      // build the embed player
      var t = $(this).attr('data-type');
      if (t=='video/mp4') {
        var e = $(this).find('video');
        var s = e.attr('src');
        c='<video controls autoplay=1 style="width:100%;" src="' + s +'" >';
      } else if (t=='image/jpeg' || 'image/jpeg' || 'image/jpg') {
        var e = $(this).find('img');
        var s = e.attr('src');
        c='<img style="width:100%;" src="' + s +'" >';
      }

      $('#promoModal .modal-body').html(c);
    });

    // $('video').click(function(){
    //   var x = $(this).get(0);
    //   // x.play()
    //   $('#promoModal').modal('show');
    //   $('#promoModal .modal-body').html('<video style="width:100%;" src="' + x +'" >')
    // });



		// config
	  	function isPlaying(audelem) {
	    	return !audelem.paused;
	  	}

		// Custom Controls
	    var globalAudioPlayer = $(".audio-player");
	    var globalButtons = $(".promo-file-options .attached-file-button");
	    var globalAudioPlayerText =  $(".audio-player-title");

		// $('.promo-file-options').click(function(event){
		// 	event.preventDefault();
		// 	alert($(this).attr('data-url'));
		// });






    // ********************************* 
    //  PLAY BUTTON CONTROL 
    // *********************************

    //  ---------- play button ------------ /
    $('.promo-file-options').click(function(event){
      runCheck();
    // console.log(globalButtons);
      event.preventDefault();
      var audioFile = $(this).attr('data-src');
      var filetype = $(this).attr('data-type');
      var audioTitle = $(this).attr('data-title');
      var nowplaying = '<i class="fa fa-play"></i>';
      var nowpaused = '<i class="fa fa-pause"></i>';
      // get next song
      var nextsong = $(this).parent().parent().next();
      var nextFile = nextsong.find('.controls-play').attr('data-src');
      var nextTitle = nextsong.find('.controls-play').attr('data-title');
      globalButtons.removeClass('fa fa-pause'); // * 
      globalButtons.addClass('fa fa-play'); // * 
      



      // console.log(nextFile);
      // console.log(nextsong);
      // console.log(audioFile);
      // console.log(globalAudioPlayer[0].src);
      // alert(filetype);


    if (filetype === 'audio/mp3') {  
      // play audio  
      if (isPlaying(globalAudioPlayer[0])==false) {
              // play file
                // console.log();
                // var trackListing = ;
                // alert(trackListing);
                // console.log(trackListing[0]);
                $(this).find('a').removeClass('fa-play-circle')
                $(this).find('a').addClass('fa-pause');
                // trackListing[0].removeClass('fa-play-circle');
                // trackListing[0].addClass('fa-pause-circle');
                    // $(this).html('<i class="fa fa-pause"></i>');
                    globalAudioPlayer[0].play();
                    globalAudioPlayerText.text(audioTitle);
                    globalAudioPlayer.attr('src', audioFile);
                    globalAudioPlayer.attr('autoplay', 1);
                    $(this).addClass('now-playing'); // *
                    globalAudioPlayer.attr('loop', 1);
            } else if (isPlaying(globalAudioPlayer[0])==true && audioFile !== globalAudioPlayer[0].src) {
              // pause function
                  $(this).find('a').removeClass('fa-play-circle')
                $(this).find('a').addClass('fa-pause');
                    globalAudioPlayer[0].play();
                    globalAudioPlayerText.text(audioTitle);
                    globalAudioPlayer.attr('src', audioFile);
                    globalAudioPlayer.attr('autoplay', 1);
                    // globalAudioPlayer.attr('loop', 1);
            } else {
              $(this).html('<i class="fa fa-play"></i>');
              globalAudioPlayer[0].pause();
            }
      } else {
        // play video 
        // alert("playing video");
        // $(this).attr('');
      }

      if ($(this).html()==nowpaused) {
          // alert('show pawuse : ' + $(this).html());
          $(this).removeClass('btn-secondary-outline');
          $(this).addClass('btn-primary-outline');
      } else {
          // alert('show play button ' + $(this).html());
          // $(this).html('<i class="fa fa-pause"></i>');
          $(this).removeClass('btn-secondary-outline');
          $(this).addClass('btn-primary-outline');
      }


    });





 $('.share-promo-file').click(function(){
  var promo = $('.promo-title').text();
  var data = $(this).attr('data-id');
  var title = $(this).attr('data-title');
  var url      = window.location.href; 
  var text = promo+": " + title;

  // console.log(text);
  var newURL = 'http://twitter.com/intent/tweet/?text='+ encodeURIComponent(text) + '&url=' + url;
  window.open(newURL);
  // alert(newURL);



 });





	});




