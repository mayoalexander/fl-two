<?php
$user_name_session = 'admin';
echo "<button onclick=\"loadPage('http://freelabel.net/rssreader/index.php', '#main_display_panel', 'dashboard', '".$user_name_session."')\"  alt='RSS'  class='btn-link lead_control widget_menu' alt='Navigation'><i class='fa fa-refresh'></i> Reload</button>";

$rss = simplexml_load_file('http://freelabelnet.tumblr.com/rss/');
$feed1 = '<h3>'. $rss->channel->title . '</h3>';
foreach ($rss->channel->item as $item) {
   // $feed1 .= '<h4><a href="'. $item->link .'" target="_blank" >' . $item->title . "</a></h4>";
   $feed1 .= '<article class="rss-feed ">';
   $feed1 .= '<button class="btn-warning add-to-photos"><i class="fa fa-plus"></i> Add To Files</button><br>';
   $feed1 .= $item->description;
   $feed1 .= '
   </article>';
   
}
?>
<!--  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <script type="text/javascript" src="jquery-1.8.0.min.js"></script> 
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script type="text/javascript">
$(function() {
    $( "#tabs" ).tabs();
  });
</script>
  </head>
-->
  <body>

<div id="tabs" style="margin:auto;padding:1%;text-align:center;">                
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

      // save to files
      var data = {
        url: image,
        user_name : "admin"
      }
      $.post('http://freelabel.net/users/dashboard/add_to_files/',data,function(result){
        // alert(result);
        element.parent().hide('slow');
      });

      // Update View After Completion
    });
  });
</script>