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
        var url = 'http://freelabel.net/users/dashboard/' + tabName + '/' ;
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






