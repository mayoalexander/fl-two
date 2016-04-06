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



		// // config
	 //  	function isPlaying(audelem) {
	 //    	return !audelem.paused;
	 //  	}

		// // Custom Controls
	 //    var globalAudioPlayer = $(".audio-player");
	 //    var globalButtons = $(".promo-file-options .attached-file-button");
	 //    var globalAudioPlayerText =  $(".audio-player-title");

		// // $('.promo-file-options').click(function(event){
		// // 	event.preventDefault();
		// // 	alert($(this).attr('data-url'));
		// // });






    // ********************************* 
    //  PLAY BUTTON CONTROL 
    // *********************************

    // //  ---------- play button ------------ /
    // $('.promo-file-options').click(function(event){
    //   runCheck();
    // // console.log(globalButtons);
    //   event.preventDefault();
    //   var audioFile = $(this).attr('data-src');
    //   var filetype = $(this).attr('data-type');
    //   var audioTitle = $(this).attr('data-title');
    //   var nowplaying = '<i class="fa fa-play"></i>';
    //   var nowpaused = '<i class="fa fa-pause"></i>';
    //   // get next song
    //   var nextsong = $(this).parent().parent().next();
    //   var nextFile = nextsong.find('.controls-play').attr('data-src');
    //   var nextTitle = nextsong.find('.controls-play').attr('data-title');
    //   globalButtons.removeClass('fa fa-pause'); // * 
    //   globalButtons.addClass('fa fa-play'); // * 
      



    //   // console.log(nextFile);
    //   // console.log(nextsong);
    //   // console.log(audioFile);
    //   // console.log(globalAudioPlayer[0].src);
    //   // alert(filetype);


    // if (filetype === 'audio/mp3') {  
    //   // play audio  
    //   if (isPlaying(globalAudioPlayer[0])==false) {
    //           // play file
    //             $(this).find('a').removeClass('fa-play-circle')
    //             $(this).find('a').addClass('fa-pause');
    //                 globalAudioPlayer[0].play();
    //                 globalAudioPlayerText.text(audioTitle);
    //                 globalAudioPlayer.attr('src', audioFile);
    //                 globalAudioPlayer.attr('autoplay', 1);
    //                 $(this).addClass('now-playing'); // *
    //                 globalAudioPlayer.attr('loop', 1);
    //         } else if (isPlaying(globalAudioPlayer[0])==true && audioFile !== globalAudioPlayer[0].src) {
    //           // pause function
    //               $(this).find('a').removeClass('fa-play-circle')
    //             $(this).find('a').addClass('fa-pause');
    //                 globalAudioPlayer[0].play();
    //                 globalAudioPlayerText.text(audioTitle);
    //                 globalAudioPlayer.attr('src', audioFile);
    //                 globalAudioPlayer.attr('autoplay', 1);
    //                 // globalAudioPlayer.attr('loop', 1);
    //         } else {
    //           $(this).html('<i class="fa fa-play"></i>');
    //           globalAudioPlayer[0].pause();
    //         }
    //   } else {
    //     // play video 
    //     // alert("playing video");
    //     // $(this).attr('');
    //   }

    //   if ($(this).html()==nowpaused) {
    //       console.log('okay this');
    //       $(this).removeClass('btn-secondary-outline');
    //       $(this).addClass('btn-primary-outline');
    //   } else {
    //       console.log('stop');
    //       $(this).removeClass('btn-secondary-outline');
    //   }


    // });





  $(".attach-promo-files-button").click(function(event) {
    event.preventDefault();
    // alert('okay');
    var id = $(this).attr('data-id');
    // data = ''
    $('#addPromo').modal('show');
    // alert(data);
    $.get('http://freelabel.net/users/dashboard/attach_files_to_promo/',{promo_id:id},function(result){
      $('.new-form-modal').html(result);
    });
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

 $('.share-promo-button').click(function(event){
  event.preventDefault();
  var title = $(this).attr('data-title');
  var id = $(this).attr('data-id');
  var url = 'http://freelabel.net/users/index/image/' + id;
  var text = title;
  var executeUrl = 'http://twitter.com/intent/tweet/?text='+ encodeURIComponent(text) + '&url=' + url;
  window.open(executeUrl);
 });


 $('.edit-promo-button').click(function(event){
  event.preventDefault();
  var modal = $('#addPromo').modal('show');
  var id = $(this).attr('data-id');
  $.get('http://freelabel.net/users/dashboard/edit_promo/',{
    promo_id:id
},function(data){
    // load data into body
    $('#addPromo').find('.modal-body').html(data); 
  });
 });





	});




