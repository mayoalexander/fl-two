<?php
if (isset($user_name_session) == false) {
    if (isset($_SESSION['user_name'])) {
      $user_name_session = $_SESSION['user_name'];
    } elseif($_POST['user_name'] == true) {
      $user_name_session = $_POST['user_name'];
      $user_name_session = $_POST['user_name'];
    } else {
      echo ' its not set: '.$_SESSION['user_name'];
    }

  }
  $user_name_session = 'admin';



echo "<button onclick=\"loadPage('http://freelabel.net/rssreader/index.php', '#main_display_panel', 'dashboard', '".$user_name_session."')\"  alt='RSS'  class='btn btn-default lead_control widget_menu' alt='Navigation'>Admin Posts</button>";
echo "<button onclick=\"window.open('http://freelabel.net/drive/plus.php?uid=".$user_name_session."')\"  alt='Upload'  class='btn btn-social btn-facebook lead_control widget_menu' alt='Navigation'>Upload</button>";

echo '<hr>';

  function get_timeagooo( $ptime )
{
    date_default_timezone_set('America/Chicago');
    $estimate_time = time() - $ptime;

    if( $estimate_time < 1 )
    {
        return 'less than 1 second ago';
    }

    $condition = array(
                12 * 30 * 24 * 60 * 60  =>  'year',
                30 * 24 * 60 * 60       =>  'month',
                24 * 60 * 60            =>  'day',
                60 * 60                 =>  'hour',
                60                      =>  'minute',
                1                       =>  'second'
    );

    foreach( $condition as $secs => $str )
    {
        $d = $estimate_time / $secs;

        if( $d >= 1 )
        {
            $r = round( $d );
            return 'about ' . $r . ' ' . $str . ( $r > 1 ? 's' : '' ) . ' ago';
        }
    }
}


?>
<a class='btn btn-default lead_control' onclick="loadPage('http://freelabel.net/rssreader/cosign.php?control=update&rss=1', '#main_display_panel', 'mag')"  >RSS</a>
<script type="text/javascript">
$(function() {

  $('.rss-item .close-trigger').click(function(){
    $(this).parent().parent().hide();
  });

  $(".get_player_button").click(function(){
    // console.log($(this));
    $(this).parent().parent().parent().css('border','red 2px solid');
    $(this).parent().parent().parent().css('padding','5%');
    $(this).parent().parent().parent().css('margin','2.5%');
  	var iframe = 0 , start = 0, end = 0, mp3data = 0;
    var mp3data = $(this).parent().parent().parent().find('textarea').text();

    if (mp3data.search('iframe')) {

    		if (mp3data.search('soundcloud.com')) {
            /* SOUNDCLOUD */
    			    var iframe = mp3data.search('iframe');
          		var start = mp3data.indexOf('src="',iframe) + 5;
          		var end = mp3data.indexOf('">',start) - start;
          		var mp3data = mp3data.substr(start,end);
    		} else if (mp3data.search('audiomack')) {
            /* AUDIOMACK */
    			var iframe = mp3data.search('iframe');
          		var start = mp3data.indexOf('src="',iframe) + 5;
         		var end = mp3data.indexOf('" s',start) - start;
          		var mp3data = mp3data.substr(start,end);
    		} else if (mp3data.search('livemixtapes')) {
           /* LIVE MIXTAPES */
    			console.log('LIVEMIXTAPES NOT WORKING 100% Not Found!!!');
    			var iframe = mp3data.search('iframe');
          		var start = mp3data.indexOf('src="',iframe);
         		var end = mp3data.indexOf('" ',start) - start;
          		var mp3data = mp3data.substr(start,end);
    		} else {
          /* NOT FOUND! */
    			console.log('MP3 Not Found!!!');
    			var iframe = mp3data.search('iframe');
          		var start = mp3data.indexOf('src="',iframe) + 5;
         		var end = mp3data.indexOf('" ',start) - start;
          		var mp3data = mp3data.substr(start,end);
    		}

          	console.log(mp3data + ' ' + start + ' ' + end);
    		$('#soundcloud_link').val(mp3data);
    		$('#twitpic #advanced_options').show('fast');

    } else {
        //alert('no iframe found!');
  		  //console.log(mp3data);
		    alert(mp3data);
    }

  });


});
</script>
<div class="row">
  <a name='stories'></a>

<?php


$rss_feed = array(/*'http://freelabelmagazine.wordpress.com/rss',
  'https://freelabelcontent.wordpress.com/feed/', */
  //'http://freelabelnet.tumblr.com/rss' ,
  // 'http://assets.complex.com/feeds/channels/all.xml?_ga=1.103967424.130544531.1429827317',
  // 'http://www.elevatormag.com/feed/',
  // 'http://freelabelnet.tumblr.com/rss',
	// 'http://www.dirty-glove.com/feed/',
  'http://trapsntrunks.com/feed/',
  'http://www.saycheesetv.com/feed/',
  'http://www.dancingastronaut.com/feed/',
  // 'http://www.myhiphoplife.com/rss',
  // 'http://nothinbuthits.com/feed/',
  // 'http://pyramidatlanta.com/feed/',
  'http://www.hiphopsmission.com/feed/',
  'http://feeds.feedburner.com/256up?format=xml',
  'http://hiphopsince1987.com/feed/',
 /*
  'http://www.hiphopcanada.com/feed/',
  'http://www.fakeshoredrive.com/feed/',
  'http://feeds.feedburner.com/nah_right' ,
  'http://feeds.soundcloud.com/users/soundcloud:users:6169895/sounds.rss',
  'http://www.dirty-glove.com/feed/',
  'http://www.saycheesetv.com/feed/',
  //'http://www.itsguccit.com/feed/',
  'http://hiphopdx.com/rss/news.xml',
  'http://www.hiphopcanada.com/feed/',
  'http://themusicenthusiast.tumblr.com/rss',
  'http://feeds.feedburner.com/2dopeboyz',
  'http://hiphop-n-more.com/feed/',*/
  'http://www.viewhiphop.com/category/new-music/feed/',
  // 'http://straightfresh.net/feed/',
  );


function formatContentSoundcloud($content) {
                    $find = '<iframe';
                    $start = strpos($content, $find);
                    $find = '/iframe>';
                    $end = strpos($content, $find) + 5;
                    $formatted_content = substr($content, $start , $end);
          return $formatted_content;
}
function formatContentYoutube($content) {
                    $find = 'https://www.you';
                    $start = strpos($content, $find);
                    $find = '"';
                    $end = strpos($content, $find);
                    $end = ($end-$start)-2;
                    //$end = $start + 11;
                    $formatted_content = '  -'.substr($content, $start,$end).']';
          return $formatted_content;
}
function formatContentLivemixtapes($content) {
                    $find = 'src="http://www.livemixtapes';
                    $start = strpos($content, $find)+5;
                    $find = '" border';
                    $end = strpos($content, $find);
                    $end = ($end-$start);
                    //$formatted_content = 'start :'.$start.' end: '.$end.'.<br>';
                    $formatted_content = substr($content, $start , $end);
          return $formatted_content;
}
function formatContentAudiomack($content) {
                    $find = '<iframe';
                    $start = strpos($content, $find);
                    $find = 'iframe>';
                    $end = strpos($content, $find);
                    $end = ($end-$start)+7;
                    $formatted_content = substr($content, $start , $end);
          return $formatted_content;
}
function formatGenius($content) {
          $find = '<iframe';
                    $start = strpos($content, $find);
                    $find = 'iframe>';
                    $end = strpos($content, $find);
                    $end = ($end-$start)+7;
                    $formatted_content = substr($content, $start , $end);
          return $formatted_content;
}
function formatContent($content) {
  if (strpos($content, 'soundcloud')) {
        $formatted_content = formatContentSoundcloud($content);
  } elseif (strpos($content, 'youtube')) {
        $formatted_content = formatContentYoutube($content);
  }elseif (strpos($content, 'livemixtapes')) {
        $formatted_content = formatContentLivemixtapes($content);
  }elseif (strpos($content, 'audiomack')) {
        $formatted_content = formatContentAudiomack($content);
  } else {
        formatGenius($content);
        $formatted_content = 'Content Not Recognized. :: '.$content;
  }
    return $formatted_content;
}



foreach ($rss_feed as $site) {

              $rss = simplexml_load_file($site);
              $feed3 = '';
              //echo '<pre>';echo '</pre>';
              if ( strpos($rss->channel->webMaster, 'soundcloud')) {
                $soundcloud_url = $rss->channel->item->enclosure->attributes()->url[0];
                //echo "yesssir .".$rss->channel->webMaster;
                //echo $soundcloud_url.'<hr>';
              }


              foreach ($rss->channel->item as $item) {


                $content = $item->children("content", true);
                $content = str_replace("'", "\"", $content);
                if ($content == '') {
                  $content = $item->description;
                }
                $content = formatContent($content);

                $description = $item->description;
                $pubDate = $item->pubDate;
                $timeAgo = get_timeagooo(strtotime($pubDate));



                $content_media = $item->media;
                  if ($content_media == false) {
                      //$content_media = 'nope!';
                  }
                $titleEncode = $item->title;
                $key = rand(11111,99999);
                $newsurl = urlencode($item->link);
                $newsurl = urlencode($item->link);
                $item_link =  $item->link;
                $spacer = urlencode(" | ");
                $hashtag = urlencode('[#TodaysNews]');
                $hashtagAMR = urlencode('#FREELABEL');



/* ------------------------------------------------------------
VIEW DATA
------------------------------------------------------------ */
$audiofile_input = "<input type='text' name='trackmp3' value='".$soundcloud_url."' class='form-control'>";

                $post_to_blog_button = "
<div id='post_block_".$key."' style='display:none;' class='' >
<hr>
<alert class='alert alert-waring' id='confirm_upload' style='display:none;'></alert>
<form class='rss_form' action='http://freelabel.net/x/post_to_blog.php' method='post' enctype='multipart/form-data'>
<div class='input-group row'>
  <span class='col-md-8'>
    <input class='form-control' type='text' name='blogtitle' value='".$titleEncode."' requiredd>
  </span>

  <span class='col-md-4'>
    <select name='blog_type' requiredd class='form-control' requiredd>
          <option value='' selected >Please Select..</option>
          <option value='featured'>Exclusive</option>
          <option value='single' >Single</option>
          <option value='mixtape'>Mixtape Stream</option>
          <option value='video'>Video</option>
          <option value='interview'>Interview</option>
          <option value='business'>Business</option>
          <option value='science'>Science</option>
    </select>
  </span>
</div>


<div class='input-group row'>
      <span class='col-md-8'>
        <input class='form-control' type='text' name='twitter' placeholder='Twitter' requiredd>
      </span>
      <span class='col-md-4'>
        <input class='form-control' type='text' name='twitpic' placeholder='Twitpic' requiredd>
      </span>
</div>


<div class='input-group row'>
      <span class='col-md-8'>
        <h3>Photo:</h3>
        <input class='form-control' id='photofile' type='file' name='userphoto' requiredd>
        <h3>Links:</h3>
        ".$content_media."
        <textarea class='form-control' rows=8 type='text' name='blogentry_embed'>".$content."</textarea>
      </span>
      <span class='col-md-4'>
        <h3>Caption:</h3>
        <textarea class='form-control' rows=8 type='text' name='blogentry_text'>".$description."</textarea >
      </span>
</div>






<h3>Audio:</h3>
<input class='form-control' type='file' name='audiofile'>
<input type='hidden' name='email' value='manage.amrecords@gmail.com'>
".$audiofile_input."

<input type='hidden' name='uploaded_from_blog' value='1'>
<input type='hidden' name='redirect_source' value='rss uploader'>
<input type='hidden' name='rss_title' value='".$titleEncode."'>
<input type='hidden' name='youtube' value='1'>
<input type='hidden' name='loggedin' value='1'>
<input type='hidden' name='user_name' value='".$user_name_session."'>

<input type='submit' name='submit' class='btn btn-success' >
</form>
</div>

";
                 $feed3 .= '
                 <div class="rss-item row">
                   <div class="rss-item-details col-md-8" style="text-align:left;margin-bottom:0.5;" >
                   <span class="pull-right fa fa-close close-trigger" ></span>
                       <a href="'. $item_link. '" target="_blank">
                          <h3 style="font-size:18px;" >' . $item->title . "</h3>
                       </a>
                       <p>  ".$timeAgo."<p>

                       ".$post_to_blog_button."
                   </div>
                   <div class='rss-item-controls col-md-4' style='text-align:left;margin-bottom:0.5;' >
                    <button class='btn btn-social btn-facebook dropdown-toggle pull-right' type='button' data-toggle='dropdown'>Options</button>
                    <panel class='dropdown-menu' >
                      <a href='https://twitter.com/search?q=".urlencode($titleEncode)."&vertical=default&f=images' class='btn btn-social btn-twitter' target='_blank'>Twitpic</a>
                      <a id='update_post_button_".$key."' class='btn btn-social btn-google-plus' onclick='window.open(\"http://freelabel.net/upload/?uid=admin&".$key."\")'>Upload</a>
                      <button class='btn btn-social get_player_button'>Get MP3</button>
                    </panel>

                   </div>
                 </div>



                 ";
                 echo "
          <script>

              function post_block_".$key."() {
                postBlock=document.getElementById('post_block_".$key."');
                updatePhotoButton=document.getElementById('update_post_button_".$key."');
                if (postBlock.style.display == 'block') {
                  // if showing, change to none
                  postBlock.style.display = 'none';

                  updatePhotoButton.value = 'EDIT';
                } else {
                  postBlock.style.display = 'block';

                  dashboardProfileDiv.style.overflow = 'scroll';
                  updatePhotoButton.value = 'HIDE';
                }

              }
          </script>";
              }

              echo '
              <div class="rss-list col-md-12" style="text-align:center;">
              '.$feed3.'
              </div>';

}

?>
</div>
