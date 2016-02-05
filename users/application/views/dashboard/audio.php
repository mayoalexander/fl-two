<?php
include_once('/home/content/59/13071759/html/config/index.php');
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

<nav class="dashboard-nav-group event-option-panel btn-group" style="background-color:transparent;text-align:left;border-bottom:3px solid #303030;padding:2% 0%;">
	<button class="btn btn-success btn-xs col-md-3 col-xs-12 add-new-media-audio" data-link="http://freelabel.net/upload/?uid=<?php echo $user_name; ?>&type=idea" ><i class="fa fa-plus"></i> Add New</button> | 
	<a href="<?php echo $config->getUserURL(Session::get('user_name')); ?>" class="btn btn-default btn-xs">View Profile</a> |
	<a href="http://freelabel.net/users/login/showprofile" class="btn btn-default btn-xs">Settings</a>
</nav>


<form class="search-tracks-input">
  <span class="fa fa-search"></span>
  <input type='text' placeholder="Search Your Uploads..." class="form-control" data-user='<?php echo $user_name; ?>'>
</form>
<!-- display content  -->
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



    // ********************************* 
    //  SHARE
    // *********************************
    $(".attach-post-button").click(function(event){
      $('.push_file_form').hide('fast');
      $(this).parent().parent().css('border','solid 3px #e3e3e3');
      $(this).parent().parent().css('padding','2%');
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
      // load alert into the modal
      $.get('http://freelabel.net/users/dashboard/attach/',getData,function(data){
        wrapper.append(data);
      });

    });









});
</script>

