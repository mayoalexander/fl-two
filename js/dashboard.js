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




    

  });






