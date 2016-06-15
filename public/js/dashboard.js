
function stopAllAudio() {
  var data = $('.audio-player').get(0).pause();
  console.log(data);
  // alert('pause');
  var videos = $('video');
  // var videostop = $('video').pause();

  $.each(videos, function( index, value ) {
    console.log(value.pause());
  });

}



  $(function(){


    // editable files (i think i need to delete this)
    $('.editable-file').editable('http://freelabel.net/submit/update.php',{
         type:  'text',
         name:  'file',
         title: 'Enter Orphan URL',
         tooltip   : 'Click to Edit URL...'
    });
    // editable promo tiltles
    $('.editable-promo').editable('http://freelabel.net/submit/update.php',{
         type:  'text',
         name:  'promo',
         title: 'Enter Orphan URL',
         tooltip   : 'Click to Edit URL...'
    });








  // FEED CATEGORIES
  $('.feed-categories div').click(function(e){
    var catName = $(this).text();
    $('#section-linemove-1').html('Loading...');
    // alert(catName);
    // alert(tabName);
    // load the data in to the wrapper
    var url = 'http://freelabel.net/users/dashboard/' + catName + '/' ;
    $.get(url, function(data){
      $('#section-linemove-1').html(data);
    })
  });



    // Main Feed Videon Controls Functionality
    $('video').click(function(){
      stopAllAudio();
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

    // ********************************* 
    //  ADD NEW PROMO CONTROL 
    // *********************************
    $('.add-new-promo-form').submit(function(event){
      event.preventDefault();
      $(this).parent().html('Please wait..');
      var data = $(this).serialize();
      // console.log(data);
      $.post('http://freelabel.net/users/dashboard/add_new_promo/',data,function(result){
        alert(result);
        // console.log(result);
        location.reload();
      });
    });




    // ********************************* 
    // DELETE PROMO ATTACHMENT
    // *********************************
    $('.promo-file-options a').click(function(event){
      var elem = $(this);
      var action = elem.attr('data-action');
      var id = elem.attr('data-id');
      var promoId = elem.parent().parent().parent().parent().attr('data-promo-id');
      var data = {
        promo_id:promoId
      }
      if (confirm('are you sure you want to delete this?')) {
        $.post('http://freelabel.net/users/dashboard/delete_promo_file/' + id , data ,  function(data) {
          // alert('deleted!');
          elem.parent().hide('fast');
        });
      } else {
        // alert('not deleted!');
      }

    });






  });

























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



    },12000);
    // *********************************



    

    // ********************************* 
    //  PLAY BUTTON CONTROL 
    // *********************************


    function updateView(elem, audio, title,audioTitle, audioFile, autoplay) {
      var playIcon = '<i class="fa fa-play"></i>';
      var pauseIcon = '<i class="fa fa-pause"></i>';
              elem.html(pauseIcon);
              var player = $('.audio-player');
              var playerAudio = player.get(0);
              playerAudio.play()
              if (autoplay==true) {
                // audio.play();
              globalAudioPlayer.attr('autoplay', 1);
              } else {
              globalAudioPlayer.attr('autoplay', 0);
                // audio.pause();
              }
              title.text(audioTitle);
              globalAudioPlayer.attr('src', audioFile);
              $(this).addClass('now-playing');
    }


    //  ---------- play button ------------ /
    $('.controls-play').click(function(event){

      // stop all playing audio and video
      event.preventDefault();

      // grab data into variables
      var audioFile = $(this).attr('data-src');
      var audioTitle = $(this).attr('data-title');



      // design UI into variables
      var nowplaying = '<i class="fa fa-play"></i>';
      var nowpaused = '<i class="fa fa-pause"></i>';
      var playIcon = '<i class="fa fa-play"></i>';
      var pauseIcon = '<i class="fa fa-pause"></i>';
      var loadingIcon = '<i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw margin-bottom"></i>';

      // get next song
      var nextsong = $(this).parent().parent().next();
      var nextFile = nextsong.find('.controls-play').attr('data-src');
      var nextTitle = nextsong.find('.controls-play').attr('data-title');


      // update view 
      globalButtons.html(playIcon); // * 
      
      var elem = $(this);
      // loading icon 
      elem.html(loadingIcon);
      // detect if audio is playing or not
      if (isPlaying(globalAudioPlayer[0])==false) {
        stopAllAudio();
        // play file
        updateView(elem , globalAudioPlayer[0], globalAudioPlayerText,audioTitle ,audioFile, true );
        // console.log('first?');

      } else if (isPlaying(globalAudioPlayer[0])==true && audioFile !== globalAudioPlayer[0].src) {
        // pause function
        stopAllAudio();
        updateView(elem , globalAudioPlayer[0], globalAudioPlayerText,audioTitle ,audioFile );
        // console.log('second?');

      } else {
        stopAllAudio();
        updateView(elem , globalAudioPlayer[0], globalAudioPlayerText,audioTitle ,audioFile ,false);
        // console.log('third?');
        // $(this).html('<i class="fa fa-play"></i>');
        // globalAudioPlayer[0].pause();
      }


    });
  //  ---------- play button ------------ /
  



    $('.controls-options').click(function(){
      var pid = $(this).attr('id');
      // var value = $("#text").val(); // value = 9.61 use $("#text").text() if you are not on select box...
      value = pid.replace("controls-", ""); // value = 9:61
      // can then use it as
      $(".controls-options-" + value).toggle('fast');
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

    $('.share-post-button').click(function(event){
      event.preventDefault();
      var txt = $(this).attr('data-type');




      
      // alert(txt);

      // loading UI message 
      $('#loginModal .modal-body').html('<i class="fa fa-circle-o-notch fa-spin"></i> Please wait...');
      if (txt=='like') {
        var msg = 'You liked this post!';
      } else if (txt=='add') {
        var msg = 'Add To Promo';
        // show promos form
        $(this).addClass('disabled');
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

        // launch modal
        $('#add_new_promo_moal').modal('show');

        // // load alert into the modal
        $.get('http://freelabel.net/users/dashboard/attach/',getData,function(data){
          // wrapper.append(data);
          console.log('finshed!');
          $('#loginModal .modal-body').html(data);
        });
      }
      // set the title 
      $('#loginModal .modal-title').text(msg);
    });










});








