function likePost(post_id , current_likes , user_name ) {
  //alert('Thank you for voting!');
  var new_likes = current_likes + 1;
  $.post('http://freelabel.net/config/vote.php' , {
      id : post_id,
      user_name : user_name,
      type : "blog"
  }).done(function (data) {
      //alert(bae_image);
      //alert('Thank you for voting! : ' + data);
            $("#like_button" + post_id ).removeClass('btn-default');
            $("#like_button" + post_id ).addClass('btn-success');
            $("#like_button" + post_id ).html("LIKED!");
            $('#current_likes' + post_id ).html(new_likes +  " LIKES");
            alert(data);
            
            /*setTimeout(function() {
              $.get('show.php', {
                id : bae_id
              }).done(function(data){
                $('#main').html(data);
              });
            }, 500); */
          featured_bae_image.src= imagelink    
  });
}