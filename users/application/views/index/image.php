<?php
include_once('/home/content/59/13071759/html/config/index.php');
$config = new Blog();
$slug = str_replace('index/image/', '', $_GET['url']);
// var_dump($slug);
?>
<!-- show main feature photo -->
<?php 

if (is_numeric($slug)) {
	$promos = $config->display_promo(Session::get('user_name') , 1, $slug, 'id');
} else {
	$promos = $config->display_promo(Session::get('user_name') , 1, $slug, 'desc');
}
echo $config->display_promo_public($promos, true); ?>
<!-- <h4>Related</h4> -->
<!-- show related  -->
<?php //$promos = $config->getPromosByUser(Session::get('user_name') , 20, $slug); ?>


<script type="text/javascript">
	

	$(function(){
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
  var newURL = 'http://twitter.com/intent/tweet/?text='+ encodeURI(text) + '&url=' + url;
  window.open(newURL);



 });









	});





</script>