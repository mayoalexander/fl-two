function showEditOptions(post_id) {
          $("#shareBlockMore_" + post_id).slideToggle(750);
    $("#shareBlock_" + post_id).slideToggle(750);
    //alert(post_id);
          //$("#shareBlockMore_'.$blog_post_id.'").slideToggle(750);
  }
function deleteBlogPost(post_id , blog_type) {      
      r = confirm('Are you sure you want to delete this post? post #' + post_id);
      if (r == true) 
      {            
                   $.post(<?php echo "'".HTTP."'"; ?> + 'submit/deletesingle.php', { 
                          post_id : post_id,
                          blog_type : blog_type
                        } , function(data){
                        //alert(data);
                        $('#post_panel_' + post_id).html('<td><center><label class=\"label label-danger\" >Deleting...</label></center></td>');
                        $('#post_panel_' + post_id).fadeOut(2000);
                        //window.open(approval_follow_up);
                    });
      } else {
        // do nothing!
      }
}

$(function(){

    
    $('.load-more-button').click(function(event){
      // event.preventDefault();
      var element = $(this).parent().parent().parent();
      var user = $(this).attr('data-user');
      var page = $(this).attr('data-page');
      var src = $(this).attr('data-src');

      $.get('http://freelabel.net/users/index/profile/',{ 
        src: src,
        page: page,
        user_name: user
      },function(result){
        // console.log(element);
        element.html(result);
      });
      // element.hide('slow');
      console.log(element);
    });

});



    $('.share-post-button').click(function(event){
      event.preventDefault();
      var txt = $(this).attr('data-type');
      // alert(txt);
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



