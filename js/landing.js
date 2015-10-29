$('.load-more-button').click(function(){

  //$('.main_display_wrapper').html('Please Wait..');
  var loadMoreButton = $(this);
  loadMoreButton.hide('fast');
  //$('.dropdown-menu').toggle('fast');
  var page = <?php echo "".$_GET['p'].""; ?> + 1;
  //alert(page);
  $.get('http://freelabel.net/user/views/feed.php',{p:page}).done(function(data){
    //alert(data);
    $('.main_display_wrapper').append(data);
  });
  
});

$('.load-more-button').hover(function(){

  //$('.main_display_wrapper').html('Please Wait..');
  var loadMoreButton = $(this);
  loadMoreButton.html('Loading Posts..');

  //$('.dropdown-menu').toggle('fast');
  var page = <?php echo "".$_GET['p'].""; ?> + 1;
  //alert(page);
  $.get('http://freelabel.net/user/views/feed.php',{p:page}).done(function(data){
    //alert(data);
    loadMoreButton.hide('fast');
    $('.main_display_wrapper').append(data);
  });
  
});
