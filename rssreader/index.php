<?php
$rss = simplexml_load_file('http://hipstrumentals.com/rss/');
$feed1 = '<h3>'. $rss->channel->title . '</h3>';
foreach ($rss->channel->item as $item) {
   $feed1 .= '<h4><a href="'. $item->link .'" target="_blank" >' . $item->title . "</a></h4>";
   
}
$rss = simplexml_load_file('http://theamrecords.co/rss/');
$feed2 = '<h3>'. $rss->channel->title . '</h3>';
foreach ($rss->channel->item as $item) {
   $feed2 .= '<h4><a href="'. $item->link .'" target="_blank" >' . $item->title . "</a></h4>";
   
}
$rss = simplexml_load_file('http://feeds.feedburner.com/hiphopdx/news?format=xml');
$feed3 = '<h3>'. $rss->channel->title . '</h3>';
foreach ($rss->channel->item as $item) {
   $feed3 .= '<h4><a  href="'. $item->link .'" target="_blank">' . $item->title . "</a></h4>";
   
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

<div id="tabs" style="margin-left:auto;margin-right:auto;width:450px;padding:10px;text-align:center;">                
  <div id="tabs-1">
  <?php echo $feed1; ?>
  </div>
</div>
</body>