<?php
include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
$config = new Blog();

// get tag value
if (isset($_POST["page"]) ) {
	$tag = $_POST["page"];
} else {
	$tag = '';
}



$user_name = Session::get('user_name') ;

// ADMIN SETTINGS
if ($user_name == 'admin' OR $user_name == "thatdudewayne") {
  $user_name = 'admin';
}


?>






<!-- button tool bar  -->
<div class="event-option-panel btn-group dropdown" style="background-color:transparent;text-align:left;border-bottom:3px solid #303030;padding:2% 0%;">
  <!-- Split button -->
  <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-plus"></i> Add New</button>
  <ul class="dropdown-menu">
    <li><a href='http://freelabel.net/drive/plus.php?uid=<?php echo $user_name; ?>'><i class="fa fa-cloud-upload"></i> Upload via FLDRIVE</a></li>
    <li><a href='http://freelabel.net/vendor/instagram/example/'><i class="fa fa-instagram"></i> Connect to Instagram</a></li>
  </ul>
  <!-- <button class="btn btn-success btn-xs btn-block add-new-media-audio" style="display:block;" data-link="http://freelabel.net/drive/plus.php?uid=<?php echo $user_name; ?>&type=idea" ><i class="fa fa-plus"></i> Add New</button> -->
</div>

<!-- get user tags  -->
<nav class="filter-option-panel btn-group" style="background-color:transparent;text-align:left;border-bottom:3px solid #303030;padding:2% 0%;">
  <form class="search-tracks-input">
    <span class="fa fa-search"></span>
    <input type='text' placeholder="Search Your Uploads..." class="form-control" data-user='<?php echo $user_name; ?>'>
  </form>
</nav>




<!-- Modal -->
<div class="modal fade" id="add_new_promo_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
        <h4 class="modal-title" id="myModalLabel">Attach Post To Promotions</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>



<!-- front end functionality  -->
<?php 

  // get tag value
  if (isset($_GET["q"]) ) {
    // Search Tracks
    $query = trim($_GET["q"]);
    echo '<h1><span class="text-muted">Searching For:</span> '.$query.'</h1>';
    $files = $config->get_user_posts_search($user_name, $query);
  } else {
    // show ALL tracks
    $query = '';
    $files = $config->get_user_posts($user_name, 20);
  }
  echo $files['posts']; 

    

?>
<script type="text/javascript" src="http://freelabel.net/js/control.js"></script>


<script type="text/javascript">


 $('.search-tracks-input').submit(function(event){
  $(this).append('Loading...');
  $(this).hide('fast');
  event.preventDefault();
  var x = $(this).find('input').val();
  var u = $(this).find('input').attr('data-user');
  var url = 'http://freelabel.net/users/dashboard/audio/';
  var data = {
    q:x,
    user:u
  }
  $.get(url,data,function(result){
    $('#audio').html(result);
  });
 });


	$(".add-new-media-audio").click(function(event) {
		event.preventDefault();
      	var link = $(this).attr('data-link');
      	// window.open(link);
      	window.location.assign(link);
    });

    $('.editable').editable('http://freelabel.net/submit/update.php',{
      id  : 'user_post_id',
      // type    : 'textarea',
      name : 'title'
    });

    // ********************************* 
    //  DELETE PROMO CONTROL 
    // *********************************
    $(".controls-audio-delete").click(function(event){
      event.preventDefault();
      var file_id = $(this).attr('data-id');
      var wrapper = $(this).parent();
      var url = 'http://freelabel.net/users/login/delete_feed/' + file_id + '/';
      c = confirm("Are you sure you want to delete this posts?");
      if (c==true) {
        $.get(url,function(result){
          wrapper.parent().hide('fast');
        });
      }     
    });

</script>
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





    // Main Feed Videon Controls Functionality
    $('video').click(function(){
      var element = $(this).get(0);
      var siblings = $(this).siblings();
      var parent = $(this).parent();

      parent.removeClass('col-md-3');
      parent.addClass('col-md-12');

      if (element.paused == true) {
        element.play();
        siblings.html('<i class="fa fa-play"></i>');
        siblings.fadeToggle('slow');
      } else {
        siblings.html('<i class="fa fa-pause"></i>');
        siblings.fadeToggle('slow');
        element.pause();
      }

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
              var player_status = 'playing'
      } else if (isPlaying(globalAudioPlayer[0])==true && audioFile !== globalAudioPlayer[0].src) {
        // pause function
              $(this).html('<i class="fa fa-pause"></i>');
              globalAudioPlayer[0].play();
              globalAudioPlayerText.text(audioTitle);
              globalAudioPlayer.attr('src', audioFile);
              globalAudioPlayer.attr('autoplay', 1);
              // globalAudioPlayer.attr('loop', 1);
              var player_status = 'pausing'

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



    // ********************************* 
    //  SHARE
    // *********************************
    $(".attach-post-button").click(function(event) {
      $('.push_file_form').hide('fast');
      $(this).hide('fast');
      event.preventDefault();
      var file_id = $(this).attr('id');
      var wrapper = $(this).parent().parent();
      var url = 'http://freelabel.net/users/login/add_promo/' + file_id + '/' + 'WHATBRUH';
      var dataId =  $(this).attr('id');
      var dataUser =  $(this).attr('data-user');
      var dataTitle =  $(this).attr('data-filetitle');
      var dataFilePath =  $(this).attr('data-filepath');
      var getData = { 
        id: dataId, 
        user_name: dataUser,
        title: dataTitle,
        img_path: dataFilePath
      };
      // $('#add_new_promo_modal').modal('show');

      // console.log(data); 

      // load alert into the modal
      $.get('http://freelabel.net/users/dashboard/attach/',getData,function(data){
        // wrapper.append(data);
        $('#add_new_promo_modal .modal-body').html(data);
      });

    });







    $('.share-post-button').click(function(event){
      event.preventDefault();
      var txt = $(this).attr('data-type');
      alert(txt);
      if (txt=='like') {
        var msg = 'You liked this post!';
      } else if (txt=='add') {
        var msg = 'Add To Promo';
        // show promos form
        $(this).hide('fast');
        event.preventDefault();
        var file_id = $(this).attr('id');
        var wrapper = $(this).parent().parent();
        var url = 'http://freelabel.net/users/login/add_promo/' + file_id + '/' + 'WHATBRUH';
        var dataId =  $(this).attr('id');
        var dataUser =  $(this).attr('data-user');
        var dataTitle =  $(this).attr('data-filetitle');
        var dataFilePath =  $(this).attr('data-filepath');
        var getData = { 
          id: dataId, 
          user_name: dataUser,
          title: dataTitle,
          img_path: dataFilePath
        };
        // $('#add_new_promo_modal').modal('show');

        console.log(getData); 

        // // load alert into the modal
        $.get('http://freelabel.net/users/dashboard/attach/',getData,function(data){
          // wrapper.append(data);
          console.log('finshed!');
          $('#loginModal .modal-body').html(data);
        });
      }
      $('#loginModal .modal-title').text(msg);
    });










});
</script>

