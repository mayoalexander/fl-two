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