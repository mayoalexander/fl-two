  $(function(){




	// function getUrlVars() {
	// 	var vars = {};
	// 	var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
	// 	vars[key] = value;
	// 	});
	// 	return vars;
	// }

 //    // detect
 //    var currenttab = getUrlVars()['ctrl'];
 //    var url = 'http://freelabel.net/users/dashboard/' + currenttab + '/' ;

 //    // load 
 //    $.get(url, function(data){
 //      // alert('completed!');
 //      console.log($('#' + currenttab));
 //      $('#' + currenttab).html(data);
 //    });
 //    console.log(url);




    $('.tabs li').click(function(){
      var tabName = $(this).find('.dash-filter').attr('data-load');
       var stateObj = { foo: "bar" };
        history.pushState(stateObj, "page 2", '?ctrl='+tabName);
        $('#' + tabName).html('<h3 class="text-muted" style="margin:10% 10%;"><i class="fa fa-cog fa-spin"></i> Loading...</h3>');
        var url = 'http://freelabel.net/users/dashboard/' + tabName + '/' ;
        $.get(url, function(data){
          // alert('completed!');
          console.log($('#' + tabName));
          $('#' + tabName).html(data);
        })
        // alert(url);
    });

    $('.editable-file').editable('http://freelabel.net/submit/update.php',{
         type:  'text',
         name:  'file',
         title: 'Enter Orphan URL',
         tooltip   : 'Click to Edit URL...'
    });

    $('.editable-promo').editable('http://freelabel.net/submit/update.php',{
         type:  'text',
         name:  'promo',
         title: 'Enter Orphan URL',
         tooltip   : 'Click to Edit URL...'
    });

    $('.event-datepicker').datepicker({dateFormat: "yy-mm-dd"});







    

  });






