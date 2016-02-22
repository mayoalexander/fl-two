<style>
  body, html {
    overflow-x: hidden;
  }
  .promo-title , .promo-subtitle {
    text-align: center;
  }
  .promo-subtitle {
    font-size:1.5em;
  }
  .full-width-article img {
    /*height: 50vh;*/
    width: 100%;
}
  .promo-image , ol {
    list-style-type: none;
    padding: 0;
  }
  .promo-image img {
    width:100%;
  }
  .promo-image video {
    width: 50px;
    height: 50px;
    /*display: inline-block;*/
  }
  .full-width-article {
    min-height: 100vh;
  }

   @media (max-width: 800px) {
      .promo-image img {
        width:100%;
      }
    }
</style>
<div class="row">
  <?php
  include_once('/home/content/59/13071759/html/config/index.php');
  $config = new Blog();
  $promo_id = str_replace('index/image/', '', $_GET['url']);

  // gather promo data
  if (is_numeric($promo_id)) {
  	$promos = $config->display_promo(Session::get('user_name') , 1, $promo_id, 'id');
  } else {
  	$promos = $config->display_promo(Session::get('user_name') , 1, $promo_id, 'desc');
  }

  // update stats
  $counts = $promos[0]['stats'];
  $new_counts = $counts + 1;
  $promo_id = $promos[0]['id'];
  $stats = $config->update_stats($counts , $promo_id);
  // print_r($stats);


  echo $config->display_promo_public($promos, true); 
  ?>
</div>





<?php 

$stream = 'related_bae';

include(ROOT.'images/pull_images.php');

?>










<!-- Modal -->
<div class="modal fade" id="promoModal" tabindex="-1" role="dialog" aria-labelledby="promoModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>




<script type="text/javascript">
	$(function(){

    $('.promo-image').click(function(){
      var t = $(this).attr('data-type');
      console.log($(this));
      // alert(t);
      $('#promoModal').modal('show');

      if (t=='video/mp4') {
        var e = $(this).find('video');
        var s = e.attr('src');
        c='<video style="width:100%;" src="' + s +'" >';
      } else if (t=='image/jpeg' || 'image/jpeg' || 'image/jpg') {
        var e = $(this).find('img');
        var s = e.attr('src');
        c='<img style="width:100%;" src="' + s +'" >';
      }

      $('#promoModal .modal-body').html(c);
      console.log(e);
      e.get(0).play();
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





</script>