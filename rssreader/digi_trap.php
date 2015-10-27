

<style type="text/css">
  #storywrap {
    display: inline;
    width:100%;
    margin:0%;
    padding:0%;
    background-color:#e3e3e3;
  }
</style>
<?php


$rss = simplexml_load_file('http://www.xclusiveszone.net/feed/');
$feed1 = '<h3>'. $rss->channel->title . '</h3>';
foreach ($rss->channel->item as $item) {
   $feed1 .= '<h4><a href="'. $item->link .'" target="_blank" >' . $item->title . "</a></h4>";
   
}
$rss = simplexml_load_file('http://www.xclusiveszone.net/feed/');
$feed2 = '<h3>'. $rss->channel->title . '</h3>';
foreach ($rss->channel->item as $item) {
   $feed2 .= '<h4 ><a  href="'. $item->link .'" target="_blank">' . $item->title . "</a>";
}
$rss = simplexml_load_file('http://www.xclusiveszone.net/feed/');
$feed3 = '';
foreach ($rss->channel->item as $item) {
  $content = urlencode($item->content); 
  $titleEncode = urlencode($item->title); 
  $newsurl = urlencode($item->link); 
  $spacer = urlencode(" | ");
  $hashtag = urlencode('[#TodaysNews]');
  $hashtagAMR = urlencode('#FREELABEL');
   $feed3 .= '
   <a  href="'. $item->link .'" target="_blank"><h2 id="dash_news_feed" >' . $item->title . "</a><br>".$content."<br><br>
  <a target=\"_blank\"  id=\"joinbutton\"  href=\"https://twitter.com/intent/tweet?screen_name=&text=".$hashtag."%0A%0A".$titleEncode .$spacer. $newsurl. "%0A%0A".$hashtagAMR."\" class=\"twitter-mention-button\" data-related=\"AMRadioLIVE\">SHARE</a>
  <br><br></h2>
  
   <hr>
   
   ";
}
?>
  <body>

<div id="tabs" style="margin-left:auto;margin-right:auto;padding:10px;text-align:center;">                
  <div id="tabs-1">
  <?php echo $feed3; ?>
  </div>
</div>

</body>