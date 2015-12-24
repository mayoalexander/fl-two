<?php
include_once('/home/content/59/13071759/html/config/index.php');
$config = new Blog();
// userz
// get tag value
if (isset($_POST["page"]) ) {
	$tag = $_POST["page"];
} else {
	$tag = '';
}
?>
<script type="text/javascript" src="http://freelabel.net/config/globals.js"></script>
<script type="text/javascript" src="http://freelabel.net/js/jquery.jeditable.js"></script>
<style type="text/css">
  .filter-option-panel a {
    display:inline;
  }
</style>

<!-- button tool bar  -->
<nav class="event-option-panel btn-group" style="background-color:transparent;text-align:left;border-bottom:3px solid #303030;padding:2% 0%;">
	<!-- <button class="btn btn-success btn-xs add-new-media-photo" data-link="http://freelabel.net/upload/?uid=<?php echo Session::get('user_name'); ?>&type=photo" target="_blank"><i class="fa fa-plus"></i> Add New Promo</button> -->
	<button type="button" class="btn btn-success btn-xs add-new-media-photo" data-toggle="modal" data-target="#myModal">
	  <i class="fa fa-plus"></i> Add New Promo
	</button>
	<a href="<?php echo $config->getUserURL(Session::get('user_name')); ?>" class="btn btn-default btn-xs">View Profile</a>
</nav>

<!-- get user tags  -->
<nav class="filter-option-panel btn-group" style="background-color:transparent;text-align:left;border-bottom:3px solid #303030;padding:2% 0%;">
  <label>Filter by tags:</label>
  <?php
  echo $config->get_user_tags(Session::get('user_name'));
  ?>
</nav>

<!-- display content  -->
<?php $promos = $config->getPromosByUser(Session::get('user_name') , 20, $tag);
echo $config->display_photos($promos); ?>

<script type="text/javascript">


    $('.editable-promo').editable('http://freelabel.net/submit/update.php',{
         type:  'text',
         name:  'promo',
         title: 'Enter Orphan URL',
         tooltip   : 'Click to Edit URL...'
    });


    $('.editable-file').editable('http://freelabel.net/submit/update.php',{
         type:  'text',
         name:  'file',
         title: 'Enter Orphan URL',
         tooltip   : 'Click to Edit URL...'
    });


	$(".add-new-media-photo").click(function(event) {
		event.preventDefault();
		$.get('http://freelabel.net/users/dashboard/add_new_promo/',function(data){
			$('.new-form-modal').html(data);
		});
    }); 
    $(function(){
    	$('.promo-file-options a').click(function(event){
    		$(this).parent().hide('fast');
    		var action = $(this).attr('data-action');
    		var id = $(this).attr('data-id');
    		var promoId = $(this).parent().parent().parent().attr('data-promo-id');
    		console.log(promoId);
    		var data = {
    			promo_id:promoId
    		}
    		$.post('http://freelabel.net/users/dashboard/delete_promo_file/' + id , data ,  function(data) {
    			// alert(data);
    		});
    	});
    });

    $('.filter-option-panel a').click(function(){
      var text = $(this).text();
      alert(text);
    });




        // ********************************* 
    //  DELETE PROMO CONTROL 
    // *********************************
    $(".delete-promo-button").click(function(event){
      event.preventDefault();
      var file_id = $(this).attr('id');
      var wrapper = $(this).parent();
      var url = 'http://freelabel.net/users/login/delete_promo/' + file_id + '/';
      c = confirm("Are you sure you want to delete this promotion?");
      if (c==true) {
        $.get(url,function(result){
          wrapper.hide('fast');
        });
      }     
    });



    


</script>


<!-- Add New Promo modal -->

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
        <h4 class="modal-title" id="myModalLabel">Create New Promotion</h4>
      </div>
      <div class="modal-body new-form-modal">
        ...
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>



<script type="text/javascript">
  

<?php 
if (isset($_SESSION['user_name'])) {
  echo 'var userNameSession = "'.Session::get('user_name').'";';
} else {
  echo 'var userNameSession = "submission";';
  // echo 'alert("no users found!")';
} 
?>




$(function() {
  // config
  function isPlaying(audelem) {
    return !audelem.paused;
  }

    $('.editable').editable('http://freelabel.net/submit/update.php',{
      id  : 'user_post_id',
      // type    : 'textarea',
      name : 'title'
    });

    // Custom Controls
    var globalAudioPlayer = $(".audio-player");
    var globalButtons = $(".controls-play");
    var globalAudioPlayerText =  $(".audio-player-title");

    // ********************************* 
    //  GLOBAL DETECT CONTROL
    setInterval(function(){
        // var ctime = globalAudioPlayer[0].currentTime;
        // var cdur = globalAudioPlayer[0].duration;
        // var daaaashit = 100 - (ctime / cdur);
        // console.log(ctime + ' -' + cdur + ' = ' + daaaashit);
        // if (isPlaying(globalAudioPlayer[0]) == true) {
        //   console.log('YES! a song is playing...');
        // } else if (isPlaying(globalAudioPlayer[0]) == false) {
        //   console.log('NO song playing.');
        // }

      // get next song
      var nowplaying = $('.now-playing');
      var nextsong = nowplaying.parent().parent().next();
      var nextFile = nextsong.find('.controls-play').attr('data-src');
      var nextTitle = nextsong.find('.controls-play').attr('data-title');
      console.log("Now Playing: " + nowplaying.attr('data-title'));
      console.log("Next Up: " + nextTitle);
      // console.log("Next Up: " + nowplaying.attr('data-title'));
      globalAudioPlayer[0].onended = function() {
          $('.now-playing').removeClass('now-playing');
          nextsong.find('.controls-play').addClass('now-playing');
          $(this).html('<i class="fa fa-pause"></i>');
          // alert("The audio has ended");
          // alert("Now playing next song " + nextTitle +' ' + nextFile);
          globalAudioPlayer[0].play();
          globalAudioPlayerText.text(nextTitle);
          globalAudioPlayer.attr('src', nextFile);
          globalAudioPlayer.attr('autoplay', 1);
      };



    },6000);
    // *********************************





    // ********************************* 
    //  PLAY BUTTON CONTROL 
    // *********************************

    //  ---------- play button ------------ /
    $('.controls-play').click(function(event){
      event.preventDefault();
      var audioFile = $(this).attr('data-src');
      var audioTitle = $(this).attr('data-title');
      var nowplaying = '<i class="fa fa-play"></i>';
      var nowpaused = '<i class="fa fa-pause"></i>';
      // get next song
      var nextsong = $(this).parent().parent().next();
      var nextFile = nextsong.find('.controls-play').attr('data-src');
      var nextTitle = nextsong.find('.controls-play').attr('data-title');
      globalButtons.html('<i class="fa fa-play"></i>'); // * 
      



      // console.log(nextFile);
      // console.log(nextsong);
      // console.log(audioFile);
      // console.log(globalAudioPlayer[0].src);


      if (isPlaying(globalAudioPlayer[0])==false) {
        // play file
              $(this).html('<i class="fa fa-pause"></i>');
              globalAudioPlayer[0].play();
              globalAudioPlayerText.text(audioTitle);
              globalAudioPlayer.attr('src', audioFile);
              globalAudioPlayer.attr('autoplay', 1);
              $(this).addClass('now-playing'); // *
              // globalAudioPlayer.attr('loop', 1);
      } else if (isPlaying(globalAudioPlayer[0])==true && audioFile !== globalAudioPlayer[0].src) {
        // pause function
              $(this).html('<i class="fa fa-pause"></i>');
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
  //  ---------- play button ------------ /
  



    $('.controls-options').click(function(){
      var pid = $(this).attr('id');
      // var value = $("#text").val(); // value = 9.61 use $("#text").text() if you are not on select box...
      value = pid.replace("controls-", ""); // value = 9:61
      // can then use it as
      $(".controls-options-" + value).toggle('slow');
    });
    $('.controls-close').click(function(){
      var parent = $(this).parent().parent();
      //var parent = parent.parent();
      //alert(parent);
      //globalAudioPlayer.pause();
      parent.hide('slow');
      //globalAudioPlayer.attr('src', audioFile);
      // globalAudioPlayer.attr('autoplay', 1);
      // globalAudioPlayer.hide();
      // globalAudioPlayer.attr('controls', 1);
      //setTimeout(globalAudioPlayer.play(),1000);
    });


    $(".open-edit-options").click(function(){
      alert($(this).attr('data-id'));
    });
    $(".open-delete-options").click(function(){
      alert($(this).attr('data-id'));
    });
    $(".open-link-options").click(function(){
      alert($(this).attr('data-id'));
      var id = $(this).attr('data-id');
      window.open('http://freelabel.net/images/'+id);
    });



});
</script>


