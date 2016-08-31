<?php
  $user_name = Session::get('user_name');
  $user_email = Session::get('user_email');
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


<!-- CUSTOM STYLES -->
<style type="text/css">
  .single-upload-form {
    margin-bottom: 3em;
    /*background: #202020;*/
    padding: 1em;
    border-radius: 5px;
  }

  .add-artwork-trigger {
    cursor: pointer;
  }
  .add-file-button {
    min-width: 300px;
  }
    .inputfile, #file-to-upload {
        position:relative;
        width: 0.1px;
        height: 0.1px;
        opacity: 0;
        overflow: hidden;
        position: absolute;
        z-index: -1;
    }
    .inputfile , label {
        font-size: 0.75em;
        color: #e3e3e3;
        background-color: transparent;
        display: inline-block;
    }
    .hide-before-upload {
      display: none;
    }
    .dragover {
      border:dotted red 1px;
    }
    .dragover-success {
      border:solid green 1px;
    }

</style>







  <div class="clearfix">

    <panel class='pull-right'>
      <label id="artwork_photo_button" for="file-to-upload" class="btn btn-success-outline btn-block add-file-button pull-right"><i class="fa fa-plus"></i> Add File</label>
      <input type="file" class="form-control" id="file-to-upload"></input>      
    </panel>


    <form class="search-tracks-input pull-left">
      <span class="fa fa-search"></span>
      <input type='text' placeholder="Search Your Uploads..." class="form-control" data-user='<?php echo $user_name; ?>'>
    </form>

  </div>

<!-- UPLOAD FORM -->
<form class="single-upload-form row">









  <panel class="col-md-3">
    
    <!-- <div name="file_upload" class="btn btn-block btn-success-outline hide-before-upload add-artwork-trigger"><i class="fa fa-plus"></i> Add Artwork</div> -->

    <!-- Add Artwork Photo -->
    <label id="artwork_photo_button" for="artwork_photo" class="btn btn-warning-outline btn-block hide-before-upload"><i class="fa fa-plus"></i> Add Artwork</label>
    <input class="form-control inputfile hide-before-upload" type="file" name="photo" id="artwork_photo">
    <span class="file-upload-results"></span>
    <select class="form-control hide-before-upload" name="status"><option value="public" selected="">Public</option><option value="private">Private</option></select>
  </panel>

  <panel class="col-md-9">
    <span class="status"></span>
    <input class="form-control hide-before-upload" type="text" name="title" required="" placeholder="Enter title.."></input>
    <input class="form-control hide-before-upload" type="text" name="twitter" id="twitter" required="" placeholder="Enter Twitter username..">
    <input class="form-control hide-before-upload" type="text" name="phone" id="phone" required="" placeholder="Enter phone number..">
    <textarea class="form-control hide-before-upload" type="text" name="description" placeholder="Enter description.."></textarea>
  </panel>

  <panel class="col-md-12">
    <input type="hidden" name="user_email" value="<?php echo $user_email; ?>">
    <input type="hidden" name="user_name" value="<?php echo $user_name; ?>">
    <input type="submit" name="file_upload" class="btn btn-block btn-success-outline hide-before-upload"></input>
  </panel>
</form>




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






<script type="text/javascript" src="http://freelabel.net/js/jquery.jeditable.js"></script>
<script type="text/javascript">
$(function(){

  $('#artwork_photo_button').click(function(e){
    e.preventDefault();
    window.open('http://freelabel.net/drive/plus.php?uid=<?php echo $user_name; ?>');
  });


  // $('#audio').bind('drop',function(e){
  //   e.preventDefault();
  //   alert('drpped');
  // // })

  // var dropzone = document.getElementById('audio');
  // // dropzone.ondrop = function(e) {
  // //   // e.preventDefault();
  // //   alert('dropped');
  // //   // this.className = 'content-current dragover-success';
  // //   // console.log(e);
  // //   // alert(e);
  // // }

  // dropzone.ondragover = function() {
  //   this.className = 'content-current dragover';
  //   return false;
  // }

  // dropzone.ondragleave = function(e) {
  //   console.log($(this));
  //   console.log(e);
  //   this.className = 'content-current';
  //   return false;
  // }

  // $('#audio').bind('dragenter',function(e){
  //   e.preventDefault();
  //   $(this).css('border','red 6px dotted');
  //   console.log(e);
  // })
  // $('#audio').bind('drop',function(){
  //   alert('dropped!');
  //   // e.preventDefault();
  //   // $(this).css('border','none');
  // })
  // $('#audio').bind('drop',function(e){
  //   e.preventDefault();
  //   // $(this).css('border','none');
  // })

// search functionality
 $('.search-tracks-input').submit(function(event){
  $(this).append('<span class="text-muted">Searching...</span>');
  event.preventDefault();
  var x = $(this).find('input').val();
  var u = $(this).find('input').attr('data-user');
  var thisvalue = $(this).find('input').val('');
  var url = 'http://freelabel.net/users/dashboard/audio/';
  var data = {
    q:x,
    user:u
  }
  $.get(url,data,function(result){
    $('#audio').html(result);
  });
 });


  // ********************************* 
  //  DELETE PROMO CONTROL 
  // *********************************
  $(".controls-audio-delete").click(function(event){
    event.preventDefault();
    var file_id = $(this).attr('data-id');
    var wrapper = $(this).parent();
    var url = 'http://freelabel.net/users/login/archive_feed/' + file_id + '/';
    c = confirm("Are you sure you want to archive this posts?");
    if (c==true) {
      $.get(url,function(result){
        // console.log(result);
        // alert(result);
        wrapper.parent().hide('fast');
      });
    }     
  });




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





<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<!-- UPLOAD SCRIPT -->
<script type="text/javascript" src='http://freelabel.net/js/uploadFile.js'></script>