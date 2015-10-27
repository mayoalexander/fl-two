<?php
$rss = simplexml_load_file('http://digitaltraphouse.tumblr.com/rss');
$feed1 = '<h3>'. $rss->channel->title . '</h3>';
foreach ($rss->channel->item as $item) {
   $feed1 .= '<h4><a href="'. $item->link .'" target="_blank" >' . $item->title . "</a></h4>";
   
}
$rss = simplexml_load_file('http://digitaltraphouse.tumblr.com/rss');
$feed2 = '<h3>'. $rss->channel->title . '</h3>';
foreach ($rss->channel->item as $item) {
   $feed2 .= '<h4 ><a  href="'. $item->link .'" target="_blank">' . $item->title . "</a>";
}
$rss = simplexml_load_file('http://digitaltraphouse.tumblr.com/rss');
$feed3 = '<h3 id="joinbutton" >Latest Beats</h3>';
foreach ($rss->channel->item as $item) {
   $feed3 .= '<div><h4><a  href="'. $item->link .'" target="_blank">' . $item->title . "</a></h4><br>
   <audio controls preload='none'>
   <source  src='".$item->enclosure['url']."'>
   </audio><br><br><br>
   <?php 
    $file_path = ".$item->enclosure['url'].");
    include('download/index.php'); 
    echo 'waht?'?>

   <a href='".$item->enclosure['url']."' id='pricing1' target'_blank'>Download</a>



    <a target=\"_blank\"  id=\"pricing1\"  href=\"https://twitter.com/intent/tweet?screen_name=&text=[INSTRUMENTAL]%0A%0A".$item->title ."%0A%0Ahttp%3A%2F%2Fbeats.AMRadioLIVE.com\" class=\"twitter-mention-button\" data-related=\"AMRadioLIVE\">SHARE</a>
  <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?\'http\':\'https\';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+\'://platform.twitter.com/widgets.js\';fjs.parentNode.insertBefore(js,fjs);}}(document, \'script\', \'twitter-wjs\');</script>
  </div>
   <hr><br>";
}
?>
  <body>

<div id="tabs" style="margin-left:auto;margin-right:auto;width:450px;padding:10px;text-align:center;">                
  <div id="tabs-1">
  <?php echo $feed3; ?>
  </div>
</div>

</body>