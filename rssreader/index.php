<?php
$user_name_session = 'admin';
echo "<button onclick=\"loadPage('http://freelabel.net/rssreader/index.php', '#main_display_panel', 'dashboard', '".$user_name_session."')\"  alt='RSS'  class='btn-link lead_control widget_menu' alt='Navigation'><i class='fa fa-refresh'></i> Reload</button>";

// $rss = simplexml_load_file('http://alexandermayo.tumblr.com/rss/');
$rss = simplexml_load_file('http://freelabelnet.tumblr.com/rss/');
$rss = simplexml_load_file('http://tooheavyx.tumblr.com/rss/');
// $rss = simplexml_load_file('http://freelabelnet.tumblr.com/rss/');
$feed1 = '<h3>'. $rss->channel->title . '</h3>';
foreach ($rss->channel->item as $item) {
   // $feed1 .= '<h4><a href="'. $item->link .'" target="_blank" >' . $item->title . "</a></h4>";
   $feed1 .= '<article class="rss-feed col-md-4 ">';
   $feed1 .= '<button class="btn-warning add-to-photos"><i class="fa fa-plus"></i> Add To Files</button><br>';
   $feed1 .= $item->description;
   $feed1 .= '
   </article>';
   
}
?>


<style type="text/css">
  .tabs {
    margin:auto;
    padding:1%;
    text-align:center;
    background-color:#fff;
  }
</style>

<div class="tabs clearfix">                
  <div id="tabs-1">
  <?php echo $feed1; ?>
  </div>
</div>
</body>





<script type="text/javascript">
  $(function(){
    $('.add-to-photos').click(function(){
      // Build Variables
      var action = $(this).text('Please wait..');
      var action = $(this).addClass('disabled');
      var element = $(this);
      var image = element.parent().find('img').attr('src');

      if (image==null) {
        var newimage = element.parent().find('video').get(0);
        var src = newimage.innerHTML;
        console.log();
        video =true;

        alert('getting video : '+newimage);
      } else {
        alert('getting video : '+newimage);
      }

      // save to files
      var data = {
        url: image,
        src: src,
        user_name : "admin"
      }
      $.post('http://freelabel.net/users/dashboard/add_to_files/',data,function(result){
        alert(result);
        element.parent().hide('slow');
      });

      // Update View After Completion
    });

    $('video').click(function(e){
      e.preventDefault();
      var vid = $(this).get(0);
      if (vid.paused!==false) {
        vid.play();
      } else {
        vid.pause();
      }
    
    });
  });
</script>