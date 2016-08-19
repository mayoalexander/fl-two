<?php
include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
$config = new Blog();

// get tag value
if (isset($_POST["page"]) ) {
	$tag = $_POST["page"];
} else {
	$tag = '';
}

?>


<nav class="event-option-panel btn-group" style="background-color:transparent;text-align:left;border-bottom:3px solid #303030;padding:2% 0%;">
	<!-- <button class="btn btn-success btn-xs add-new-media-idea" data-link="http://freelabel.net/users/note/index?uid=<?php echo Session::get('user_name'); ?>&type=idea" ><i class="fa fa-plus"></i> Add New Ideas</button> -->
	<button class="btn btn-success btn-xs add-new-media-audio" data-link="http://freelabel.net/upload/?uid=<?php echo Session::get('user_name'); ?>&type=idea" ><i class="fa fa-plus"></i> Add New Files To Box</button>
	<!-- <a onclick="loadPage('http://freelabel.net/users/dashboard/photos/?view=booking#events', '#main_display_panel #section-linemove-3 ', 'all' , 'AlexMayo')" href="#" class="btn btn-default btn-xs">All</a>
	<a onclick="loadPage('http://freelabel.net/users/dashboard/photos/?view=booking#events', '#main_display_panel #section-linemove-3 ', 'tasks' , 'AlexMayo')" href="#" class="btn btn-default btn-xs">Tasks</a>
	<a onclick="loadPage('http://freelabel.net/users/dashboard/photos/?view=booking#events', '#main_display_panel #section-linemove-3 ', 'meetings' , 'AlexMayo')" href="#" class="btn btn-default btn-xs">Meetings</a>
	<a onclick="loadPage('http://freelabel.net/users/dashboard/photos/?view=booking#events', '#main_display_panel #section-linemove-3 ', 'performances' , 'AlexMayo')" href="#" class="btn btn-default btn-xs">Performances</a>
	<a onclick="loadPage('http://freelabel.net/users/dashboard/photos/?view=booking#events', '#main_display_panel #section-linemove-3 ', 'clients' , 'AlexMayo')" href="#" class="btn btn-default btn-xs">Public</a> -->
	<!--<button class='btn btn-default btn-xs event-option-add'><span class='glyphicon glyphicon-plus'></span> Add New Event</button>-->
	<select class="form-control dropdown-filter" style='max-width:200px;display:inline;'>
		<option value="audio" >Audio</option>
		<option value="video" >Videos</option>
		<option value="photo" >Photos</option>
		<option value="document" >Documents</option>
	</select>
</nav>


<!-- <nav class="event-option-panel btn-group" style="background-color:transparent;text-align:left;border-bottom:3px solid #303030;padding:2% 0%;"> -->
<!-- get user tags  -->
<?php
// echo $config->get_user_tags(Session::get('user_name'));
?>
<!-- </nav> -->

<!-- display content  -->
<div id="files-list">
	<ul class="list">
		<?php 



$files = $config->getFilesByUser(Session::get('user_name') , 20);
		echo $config->display_files($files , Session::get('user_name'));
		?>
	</ul>
</div>


<script src='http://freelabel.net/config/globals.js'></script>
<script type="text/javascript" src="http://freelabel.net/js/jquery.jeditable.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.1.1/list.min.js"></script>
<script type="text/javascript">

	$(function(){

		var options = {
		    valueNames: [ 'list_type' ]
		};
		var list = new List('files-list', options);

	    $('.dropdown-filter').change(function(event){
	    	var filterValue = $(this).val();
			list.filter(function(item) {
			// console.log(item.values().list_type);
		    if(item.values().list_type == filterValue) {
		      return true;
		    } else {
		      return false;
		    }
		  });
		  return false;
	    });







    // ********************************* 
    //  SHARE
    // *********************************
    $(".share-file-button").click(function(event){
      $('.push_file_form').hide('fast');
      $(this).parent().css('border','solid 3px #e3e3e3');
      $(this).hide('fast');
      event.preventDefault();
      var file_id = $(this).attr('id');
      var wrapper = $(this).parent();
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





    // ********************************* 
    //  DELETE FILE CONTROL 
    // *********************************
    $(".delete-file-button").click(function(event){
      event.preventDefault();
      var file_id = $(this).attr('id');
      var wrapper = $(this).parent();
      // alert("deleting this file!!" + file_id);
      var url = 'http://freelabel.net/users/login/delete_file/' + file_id + '/';
      c = confirm("Are you sure you want to delete this file?");
      if (c==true) {
        $.get(url,function(result){
          // alert(result);
          wrapper.hide('fast');
        });
      }     
    });



  $(".add-new-media-audio").click(function(event) {
  event.preventDefault();
    var link = $(this).attr('data-link');
    window.location.assign(link);
  }); 










	});



    $('.dropdown-filter').change(function(event){
  //   	var filterValue = $(this).val();
		// list.filter(function(item) {
	 //    if(item.values().location_id == 'Dallas') {
	 //      return true;
	 //    } else {
	 //      return false;
	 //    }
	 //  });
	 //  return false;
    });



    $('.editable-file').editable('http://freelabel.net/submit/update.php',{
         type:  'text',
         name:  'file',
         title: 'Enter Orphan URL',
         tooltip   : 'Click to Edit URL...'
    });



 $('video').click(function(){
 	var data = $(this);
 	$(this).get(0).play()
 	console.log(data);
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









});
</script>

