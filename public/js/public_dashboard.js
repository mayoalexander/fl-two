function getUrlVars() {
var vars = {};
var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
vars[key] = value;
});
return vars;
}



  $(function(){

    // finds the tab data
    $('.tabs li').click(function(){
        var tabName = $(this).find('.dash-filter').attr('data-load');
        var stateObj = { foo: "bar" };

        // sets the history
        history.pushState(stateObj, "page 2", '?ctrl='+tabName);

        // Loading Please Wait Feature
        $('#' + tabName).html('<h3 class="text-muted" style="margin:10% 10%;"><i class="fa fa-cog fa-spin"></i> Loading...</h3>');
        
        // load the data in to the wrapper
        var url = 'http://freelabel.net/users/index/stream/' + tabName + '/' ;
        $.get(url, function(data){
          $('#' + tabName).html(data);
        })
    });

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

    // datepicker for the events 
    $('.event-datepicker').datepicker({dateFormat: "yy-mm-dd"});

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
        $('#add_new_promo_modal').modal('show');

        console.log(getData); 

        // // load alert into the modal
        $.get('http://freelabel.net/users/dashboard/attach/',getData,function(data){
          // wrapper.append(data);
          console.log('finshed!');
          $('#loginModal .modal-body').html(data);
        });
      }
      $('#loginModal .modal-title').text(msg);
      // alert(txt + ' /// '+ msg);
    });










});








