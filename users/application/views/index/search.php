<script type="text/javascript" src="http://freelabel.net/js/dashboard.js"></script>
<?php
$config = new Blog($_SERVER['HTTP_HOST']);
// echo '<pre>';
// print_r($site);
// exit;
//$config->showAdminController();
if (!isset($_GET['p'])) {
  $current_page = 0;
} else {
  $current_page = $_GET['p'];
}
//$config->getPosts($current_page, 20,'admin');
?>
<?php
// echo '<th>ok</th>';
// echo '<th>Photo</th>';
// echo '<th>Title</th>';
// echo '<th>MP3</th>';

//   foreach ($site['user']['media'] as $value) {
//
// $posts_panel = '';
// $posts_panel .= '<section class="section-news" style="padding-bottom:0;">
//       <h3 class="sr-only">News</h3>
//       <div class="bg-inverse">
//         <div class="row">
//           <div class="col-md-6 p-r-0">
//             <figure class="has-light-mask m-b-0 image-effect">
//               <img src="'.$value['photo'].'" alt="Article thumbnail" class="img-responsive">
//             </figure>
//           </div>
//           <div class="col-md-6 p-l-0">
//             <article class="center-block">
//               <span class="label label-info">'.$value['twitter'].'</span>
//               <br>
//               <h5><a href="'.$value['blog_story_url'].'">'.$value['blogtitle'].' <span class="icon-arrow-right"></span></a></h5>
//               <p class="m-b-0">
//                 <a href="'.$value['blog_story_url'].'"><span class="label label-default text-uppercase"><span class="icon-tag"></span> Design Studio</span></a>
//                 <a href="'.$value['blog_story_url'].'"><span class="label label-default text-uppercase"><span class="icon-time"></span> '.get_timeago(strtotime($value['submission_date'])).'</span></a>
//               </p>
//             </article>
//           </div>
//         </div>
//       </div>
//   </section>';
    // echo $value.'<br>';
    // echo '<tr>';
    //   echo '<td>';
    //   echo '<i class="text-dark fa fa-play-circle audio-player audio-player-control" ></i>';
    //   echo '</td>';

    //   echo '<td><img src="';
    //   print_r($value['photo']);
    //   echo '" style="width:200px;"></td>';

    //   echo '<td>';
    //   print_r($value['twitter']);
    //   echo '<br>';
    //   print_r($value['blogtitle']);
    //   echo '<hr>';
    //   echo '</td>';

    //   echo '
    //         <td>
    //           <audio src="';
    //           print_r($value['trackmp3']);
    //           echo '
    //           " controls preload="metadata"></audio>
    //         </td>';


    // echo '</tr>';
  // // print_r($posts_panel);
  //
  // }

if (!isset($_GET['q'])) {
    $search_query = 'Search Anything..';
} else {
  $search_query = '<span class="text-muted">Searching For</span> '.$_GET['q'];
}



?>
<div class="container page-header">
  <h1><?php echo $search_query; ?></h1>
    <?php
      $posts = $config->getPostSearch($_GET['q']);
      // $posts = $config->getPostFeatured($_GET['q']);

      echo $posts;

      // $db = $config->display_dashboard_feed($site['user']); 
    ?>
</div>




<script type="text/javascript">
  $(function(){
    $('.dash-filter').click(function(){
      var tabName = $(this).attr('data-load');
      //alert(tabName + ' clicked!');
    });
  });

</script>
