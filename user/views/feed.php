<?php 
if (isset($_SESSION['user_name'])==false) {
  session_start();
}

if (isset($_GET['p'])==false) {
  $current_page = 0;
} else {
  $current_page = $_GET['p'];
}
$next_page = $current_page + 1;
$next_page_read = $next_page +1;
include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
$blog = new Blog();
if (isset($_POST['filter'])==false) {
  $feed_filter = '';
} else {
  $feed_filter = $_POST['filter'];
}

if (isset($_POST['site'])) {

}
//print_r($feed_filter);
//$posts = $blog->randomizePosts($current_page,12 , $feed_filter);
$posts = $blog->randomizePosts($current_page,13 , '' , $_POST['site']);
//echo 'page: '.$_POST['site'];
//$ads = $blog->getPhotosByUser('admin');
//$ads[0]['image'] = str_replace('server/php/files/', 'server/php/files/thumbnail/', $ads[0]['image']);

if ($_GET['dev']=='run') {
  echo '<pre>';
print_r($_SERVER['SCRIPT_URI']);
echo '</pre>';
exit;
}

?>
<?php include_once(ROOT.'AudioPlayer/index.php'); ?>
<script type="text/javascript">
$('.load-more-button').click(function(){

  $('.main_display_wrapper').html('Please Wait..');
  var loadMoreButton = $(this);
  loadMoreButton.hide('fast');
  //$('.dropdown-menu').toggle('fast');
  var page = <?php echo "".$_GET['p'].""; ?> + 1;
  //alert(page);
  $.get('http://freelabel.net/user/views/feed.php',{p:page}).done(function(data){
    //alert(data);
    $('.main_display_wrapper').html(data);
  });
  
});
/*
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

  
});*/

</script>



<?php

foreach ($posts as $post) {
  $post['embed'] = '<audio controls preload="metadata"><source src="'.$post['trackmp3'].'"></audio>';

  if ($post['trackmp3']=='') {
      $post['embed'] = '<br><br><button class="btn btn-primary" >View</button>';
      // = '<audio controls preload="metadata"><source src="'.$post['trackmp3'].'"></audio>';
  }

  echo '


<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-center post" style="background-image:url(\''.$post['photo'].'\');" data-img=\''.$post['photo'].'\'>
  <div class="background-tint">
   
    <a class="story-img" href="'.$post['blog_story_url'].'"><h1>'.$post['blogtitle'].'</h1></a>
    <a class="story-img" href="'.$post['blog_story_url'].'"><h3 class="post-twitter">'.$post['twitter'].'</h3></a>
    <a class="story-img" href="'.$post['blog_story_url'].'"><h6 class="post-twitter">'.get_timeago(strtotime($post['submission_date'])).'</h6></a>

     <a class="story-img" href="'.$post['blog_story_url'].'"><img src="'.$post['photo'].'" style="width:100%;" class=""></a>
    '.$post['embed'].'
  </div>
</div>
';
}


?>
<br><br>
<button class='col-md-12 load-more-button' ><a class='btn btn-primary' >Load Next (<?php echo $next_page_read; ?>)</a></button>


