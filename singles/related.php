<style>
.background_tint {
  height: inherit;
}
</style>
<?php
//mysqli_close($con);
//include('../inc/connection.php');

// include(ROOT.'AudioPlayer/index.php');
$include_path = 'config/index.php';
if (file_exists($include_path)) {
    include_once($include_path);
  }elseif (file_exists("../".$include_path)) {
    include_once('../'.$include_path);
  }elseif (file_exists("../../".$include_path)) {
    include_once('../../'.$include_path);
  }elseif (file_exists("../../../".$include_path)) {
    include_once('../../../'.$include_path);
  }elseif (file_exists("../../../../".$include_path)) {
    include_once('../../../../'.$include_path);
  } else {
    echo "Something Went Wrong! [Included File: ".$include_path."]";
  }

  include(ROOT.'inc/connection.php');
  $blog = new Blog();
//includeOnce('config/cookieLogin.php');
//include("../inc/connection.php");



echo "<a name='radio_singles'></a>
<div class='row' style='text-align:center;'>";

// XXXFL TWEAK
if ($stream_pull == "xxxfl") {
	$result = mysqli_query($con,"SELECT * 
FROM  `blog` 
WHERE  `type` = 'xxxfl'
LIMIT 0 , 30");
}

// EMPTY TWITTER + SEARCH QUERY VARAIBLE LINKAGE
if ($search_query == '' AND $stream_pull == "related") { // if no search query found, for recent February bug fix 2/27/2015
    if (isset($twitter) && $twitter != '') {       // if twitter is not false, set the search to
      $search_query = $twitter; // find the pre-defined twitter value
    } elseif (isset($twittername) && $twittername != '') {
      $search_query = $twittername; // find the pre-defined twitter value
    } else {
      //echo '<hr>There was an error trying to Link the Username with the Search Query';
    }
}


if ($stream_pull == "related") {
$sql="SELECT * 
FROM feed
WHERE MATCH (
trackname
blogtitle
twitter
type
email
writeup
blogentry
)
AGAINST (
'".$search_query."'
IN BOOLEAN
MODE
)
LIMIT 1 , 100";

  $sql = "SELECT * FROM feed WHERE 
  twitter LIKE '%{$search_query}%' AND status='public'
  OR trackname LIKE '%{$search_query}%' AND status='public'
  OR blogtitle LIKE '%{$search_query}%' AND status='public'
  OR type LIKE '%{$search_query}%' AND status='public'
  OR email LIKE '%{$search_query}%' AND status='public'
  OR writeup LIKE '%{$search_query}%' AND status='public'
  OR blogentry LIKE '%{$search_query}%' AND status='public'
  ORDER BY  `id` DESC LIMIT 24";
	$result = mysqli_query($con,$sql);
}


if ($stream_pull == "related_row") {
  $result = mysqli_query($con,"SELECT * FROM feed WHERE twitter LIKE '%{$search_query}%' OR trackname LIKE '%{$search_query}%' OR blogtitle LIKE '%{$search_query}%' OR type LIKE '%{$search_query}%' OR email LIKE '%{$search_query}%' OR writeup LIKE '%{$search_query}%' OR blogentry LIKE '%{$search_query}%' ORDER BY  `id` DESC LIMIT 1, 3");
}


if ($stream_pull == "radio") {
	$result = mysqli_query($con,"SELECT * FROM feed WHERE type='single' AND user_name != 'submission' ORDER BY  `id` DESC LIMIT 24");
}

if ($stream_pull == "top_trending_singles") {
  $result = mysqli_query($con,"SELECT * 
    FROM  `amrusers`.`blog` 
    WHERE  `type` LIKE  '%single%'
    AND  `user_name` =  'admin'
    ORDER BY `id` DESC
    LIMIT ".rand(1,50)." , 6");
}

if ($stream_pull == "submissions") {
	$result = mysqli_query($con,"SELECT * FROM feed WHERE type='single' AND user_name = 'submission' ORDER BY  `id` DESC LIMIT 24");
} 

if ($stream_pull == "blog") {
	$result = mysqli_query($con,"SELECT * FROM feed WHERE twitter LIKE '%{$search_query}%' OR trackname LIKE '%{$search_query}%' OR blogtitle LIKE '%{$search_query}%' OR type LIKE '%{$search_query}%' OR email LIKE '%{$search_query}%' OR writeup LIKE '%{$search_query}%' OR blogentry LIKE '%{$search_query}%' ORDER BY  `id` DESC LIMIT 24");
} 

if ($stream_pull == "artists") {
	$result = mysqli_query($con,"SELECT * FROM feed WHERE twitter LIKE '%{$search_query}%' OR trackname LIKE '%{$search_query}%' OR blogtitle LIKE '%{$search_query}%' OR type LIKE '%{$search_query}%' ORDER BY  `id` DESC LIMIT 24");
} 
if ($stream_pull == "exclusives") {
	$result = mysqli_query($con,"SELECT * FROM feed WHERE type='single' AND user_name != 'submission' ORDER BY  `id` DESC LIMIT 12");
}
if ($stream_pull == "mixtape") {
	$result = mysqli_query($con,"SELECT * FROM feed WHERE type='mixtape' AND approved=1 ORDER BY  `id` DESC LIMIT 12");
}
if ($stream_pull == "recent_mixtape") {
	$result = mysqli_query($con,"SELECT * FROM feed WHERE type='mixtape' && user_name='submission'  ORDER BY  `id` DESC LIMIT 12");
}
if ($stream_pull == "instrumentals") {
  $result = mysqli_query($con,"SELECT * FROM  `blog` WHERE  `onsale` =1 ORDER BY `id` DESC LIMIT 0 , 30");
}

if ($stream_pull == "") {
  $result = mysqli_query($con,"SELECT * FROM feed WHERE type='single' AND user_name != 'submission' ORDER BY  `id` DESC LIMIT 24");
}



//echo 'okkkkkk'.$sql;

if (isset($search_processing)) {

  if ($_GET['exact']=='1') {
    $search_process = "SELECT * FROM feed 
      WHERE blogtitle LIKE '%{$search_query}%'
      OR twitter LIKE '%{$search_query}%'
      OR writeup LIKE '%{$search_query}%'
      OR trackname LIKE '%{$search_query}%'
      ORDER by `id` DESC";

      $result = mysqli_query($con,$search_process);
      // echo $search_process;
      // echo 'okay okay what the fuck ';
  } else {

  $spi=0;
  $search_query = explode(' ',$search_query);
  //echo 'new search: ' . $search_query;
  
  $search_process = "SELECT * FROM feed 
    WHERE twitter LIKE '%{$search_query[$spi]}%'"; 
    
    while ($search_query[$spi]) { 
      $search_process.= "OR trackname LIKE '%{$search_query[$spi]}%' 
        OR blogtitle LIKE '%{$search_query[$spi]}%' 
        OR type LIKE '%{$search_query[$spi]}%' 
        OR email LIKE '%{$search_query[$spi]}%' 
        OR writeup LIKE '%{$search_query[$spi]}%' 
        OR blogentry LIKE '%{$search_query[$spi]}%' ";
        //echo $search_query[$spi].' | ';
        $spi++;
    }
    
    $search_process.="ORDER BY `id` DESC LIMIT 24";
  $result = mysqli_query($con,$search_process);
}




  }






if ($stream_pull == "exact") {
  $result = mysqli_query($con,"SELECT * FROM feed WHERE twitter LIKE '%{$search_query}%' OR trackname LIKE '%{$search_query}%' OR blogtitle LIKE '%{$search_query}%' OR type LIKE '%{$search_query}%' OR email LIKE '%{$search_query}%' OR writeup LIKE '%{$search_query}%' OR blogentry LIKE '%{$search_query}%' ORDER BY  `id` DESC LIMIT 104");
} 






// echo "<pre>";
// // echo 'twitter: '.$twitter;
// echo $sql . 'OKAY '.$search_query.' -- '.$stream_pull ;
// echo "</pre>";




// Value Reset
$i=0;
$how_recent =0;



while($row = mysqli_fetch_array($result))
  {

if ($row['type'] == 'blog') {
    $submission_date  = $row['submission_date'];
    $blog_title = $row['blogtitle'];
    $photo_path = $row['photo'];
    // $photo_url = "http://FreeLabel.net/images/". $photo_path;
    if ( strpos(strtolower($photo_path), 'http://freelabel.net/')===false ) {
      $photo_path = 'http://freelabel.net/images/'.$photo_path;
    }
    $photo_url = $photo_path;
    $twitter = trim($row['twitter']);
    $twitpic = $row['twitpic'];
    $blog_story_url = $row['blog_story_url'];
    $subject = $blog_story_url;
    $find = "blog.amradiolive.com";
    $replace = "freelabel.net/blog";
    $blog_story_url = str_replace($find,$replace,$subject);




    $post_title_array = explode(' ', trim($blog_title));
      if ($post_title_array[0] == '[VIDEO]'
        OR $post_title_array[0] == '[SINGLE]'
        OR $post_title_array[0] == '[ALBUM'
        OR $post_title_array[0] == '[INTERVIEW]'
        OR $post_title_array[0] == '[EXCLUSIVE]'
        ) {
        if ($post_title_array[0] == '[ALBUM') {
          $post_title_short = $post_title_array[2];
        }else{
          $post_title_short = $post_title_array[1];
        }
      } else {
        $post_title_short = $post_title_array[0];
      }




      //$blog_story_url = 'http://FREELABEL.net/'.$twitter.'/'.$post_title_short;
      $blog_story_url = 'http://freelabel.net/'.$twitter.'/'.$post_title_short;


    


    $trackname = strtolower($row['trackname']);
    $tracknameshort = preg_replace('/\s+/', '', $trackname);
    $trackanchor  = "".$tracknameshort;
    $pound = "%23";
    $views = $row['views'];
    $userphoto = $row['userphoto'];
    $playerpath = $row['playerpath'];
    $photo = $row['photo'];
    $artist_profile	=	'http://x.freelabel.net/'.strtolower($twitter);

    
    $how_recent =  time() - strtotime($row['submission_date']);
        //$how_recent = date('H:i', $how_recent);
        $how_recent = $how_recent / 60;
        $how_recent = $how_recent / 60;
        $how_recent = $how_recent / 24;
        if ($how_recent < 0.041666666666667) {
          $how_recent = $how_recent * 24 * 60;
          $how_recent = substr($how_recent, 0,3);
          $how_recent =  $how_recent.' minutes ago';
        } elseif ($how_recent < 1) {
          $how_recent = $how_recent * 24;
          if ($how_recent < 2) {
            $how_recent = substr($how_recent, 0,1);
            $how_recent =  $how_recent.' hour ago';
          } elseif ($how_recent < 10) {
            $how_recent = substr($how_recent, 0,1);
            $how_recent =  $how_recent.' hours ago';
          } else {
            $how_recent = substr($how_recent, 0,2);
            $how_recent =  $how_recent.' hours ago';
          } 
        }elseif($how_recent < 10) {
          $how_recent = substr($how_recent, 0,1);
          $how_recent =  $how_recent.' days ago';
        } else {
          $how_recent = substr($how_recent, 0,2);
          $how_recent =  $how_recent.' days ago';
        }
        if ($submission_date == '0000-00-00 00:00:00') {
          $how_recent = strtotime($row['submission_date']);
        }
    



        echo '
  <div class="col-md-4 featured_post_wrapper">
    <div class="thumbnail" style="background-image:url(\''.$photo_url.'\');background-position:center center;background-size:auto 150%;" >
      <div id="background_tint_singles" >
      <a href="'.$blog_story_url.'"><img src="'.$photo_url.'" alt="'.$blog_title.'"></a>
      <div class="caption">
         <a href="'.$blog_story_url.'"><p id="full_track_name">'.$blog_title.'</p></a>
        <a href="'.$artist_profile.'" target="_blank" ><h5 id="full_track_name">'.$twitter.'</h5></a>
        <br>
        <p>
            <label>'.$how_recent.'</label>
            '.$blog->getShareButtons($id).'
            <!-- show share buttons -->
          </p>
        <p>
        ';
            include(ROOT.'config/share.php');
            findByID($blog_id);
        echo '
          <!-- <a href="http://freelabel.net/som/index.php?post=1&text='.$tweet_blog.'" class="btn btn-primary btn-xs" role="button" target="_blank"><span class="glyphicon glyphicon-retweet"></span></a> 
          <a href="https://twitter.com/intent/tweet?screen_name=&text='.$tweet_blog.'" class="btn btn-primary btn-xs" role="button" target="_blank"><span class="glyphicon glyphicon-star"></span></a>-->
          <a href="'.$blog_story_url.'" class="btn btn-default btn-xs" role="button"><span class="glyphicon glyphicon-fullscreen"></span></a>
        </p>
      </div>
      </div><!-- background_tint -->
    </div>
  </div>';

    
      }









if ($row['type'] == 'single') {
  $id = $row['id'];

  $onsale= $row['onsale'];
  $full_track_name = $row['trackname'];
  $trackname = strtolower($row['trackname']);
  $tracknameshort = preg_replace('/\s+/', '', $trackname);
  $trackanchor  = "".$tracknameshort;
		$find = array('@','(',')','[',']',':','_',"'",1,2,3,4,5,6,7,8,9,0);
  $trackanchor_noat  = str_replace($find,'', trim($trackanchor));
  $pound = "%23";
  $blog_post_key  = $row['blog_post_key'];
  $views = $row['views'];
  $twitpic  = $row['twitpic'];
  $user_photo = $row['photo'];
  $track_photo = $row['photo'];
  $submission_date  = $row['submission_date'];
  $user_name = $row['user_name'];
  $playerpath = $row['playerpath'];

  // clean up twitter name just to be safe
  $twittername= trim($row['twitter']);
  if ( strpos($twittername, '@')===false ) {
    $twittername = '@'.$twittername;
  }
  //echo 'this track: ';
  //print_r($trackname);
  /*$tracknamearray = explode(' ', $trackname);
  if ($tracknamearray[0] != '') {

    $track_url = 'http://freela.be/l/'.$twittername.'/'.$tracknamearray[0].'/';

  } else {
    $track_url = 'http://freela.be/l/'.$twittername.'/'.$trackname.'/';
  }*/
    //$tracknameshort = preg_replace('/\s+/', '', $trackname);
  //$trackanchor  = "".$tracknameshort;
  $find = array('@','(',')','[',']',':','_',"'",1,2,3,4,5,6,7,8,9,0);
  $trackanchor_noat  = str_replace($find,'', trim($trackname));
  //print_r($trackanchor_noat);

      $post_title_array = explode(' ', trim($trackanchor_noat));
      if ($post_title_array[0] == '[VIDEO]'
        OR $post_title_array[0] == '[SINGLE]'
        OR $post_title_array[0] == '[ALBUM'
        OR $post_title_array[0] == '[INTERVIEW]'
        OR $post_title_array[0] == '[EXCLUSIVE]'
        ) {
        if ($post_title_array[0] == '[ALBUM') {
          $post_title_short = $post_title_array[2];
        }else{
          $post_title_short = $post_title_array[1];
        }
      } else {
        $post_title_short = $post_title_array[0];
      }




      $track_url = 'http://FREELABEL.net/'.$twittername.'/'.$post_title_short;








    //echo 'id: '.$track_url;

  //$playerpath = str_replace("amradiolive.com", 'FREELABEL.net', $playerpath);
  //$playerpath_clean = str_replace("http://freelabel.net/x/", 'http://x.FREELABEL.net/', $playerpath);
  //$playerpath_clean = str_replace("/index.php", '', $playerpath_clean);



  $playerpath_short = 'RADIO.FREELABEL.net/?id='.$blog_post_key;
  $trackmp3 = $row['trackmp3'];
  $trackmp3 =  str_replace('amradiolive.com', 'freelabel.net', $trackmp3);
  //$playerpath = 'http://freelabel.net/'.$twittername.'/'.$id;
  $twitter_url		= str_replace(' ', '', strtolower($twittername));
  $user_profile_url	= "http://x.freelabel.net/".$twitter_url;

  
  
        $how_recent =  time() - strtotime($row['submission_date']);
        //$how_recent = date('H:i', $how_recent);
        $how_recent = $how_recent / 60;
        $how_recent = $how_recent / 60;
        $how_recent = $how_recent / 24;
        if ($how_recent < 0.041666666666667) {
          $how_recent = $how_recent * 24 * 60;
          $how_recent = substr($how_recent, 0,3);
          $how_recent =  $how_recent.' minutes ago';
        } elseif ($how_recent < 1) {
          $how_recent = $how_recent * 24;
          if ($how_recent < 2) {
            $how_recent = substr($how_recent, 0,1);
            $how_recent =  $how_recent.' hour ago';
          } elseif ($how_recent < 10) {
            $how_recent = substr($how_recent, 0,1);
            $how_recent =  $how_recent.' hours ago';
          } else {
            $how_recent = substr($how_recent, 0,2);
            $how_recent =  $how_recent.' hours ago';
          } 
        }elseif($how_recent < 10) {
          $how_recent = substr($how_recent, 0,1);
          $how_recent =  $how_recent.' days ago';
        } else {
          $how_recent = substr($how_recent, 0,2);
          $how_recent =  $how_recent.' days ago';
        }
        if ($submission_date == '0000-00-00 00:00:00') {
          $how_recent = strtotime($row['submission_date']);
        }




  // GET PLAYER STATSSTICS
  $result_stats = mysqli_query($con,"SELECT * 
FROM  `stats` 
WHERE  `page` LIKE  '%".$full_track_name."%'
LIMIT 0 , 30");
  if($row_stat = mysqli_fetch_array($result_stats))
  {
    $page =      $row_stat['page']; 
    $count =      $row_stat['count'];
  }


  // $playerpath_clean = str_replace("/".$tracknameshort, "" , $playerpath_clean);

  if(isset($row['twitpic'])==false) {
    echo $row['twitpic'].' has no no twitpic detected. ';
  	$twitpic = $twitpic_default_single;
  }
  //$user_photo = file_exists('http://freelabel.net/x/@dc_3d/getiton/@DC_3D - Get it on.png');
  if (file_exists($user_photo)) {
    //echo 'yaaa!! ';
    //echo '<script>alert("'.$user_photo.'");</script>';

	//$photo_embed	=	"<img id='featured_single_image' src='".$user_photo."'>";
  } else {
    //echo 'nahh!! ';
    //$user_photo = '';
    $photo_embed = false;
  }



  $file = $track_photo;
$file_headers = @get_headers($track_photo);
if($file_headers[0] == 'HTTP/1.1 404 Not Found') {
    $exists = false;
    //echo 'NO PHOTO EXISTS --> '.$track_photo;
    //$track_photo = 'http://freelabel.net/images/fllogo.png';
}
else {
    $exists = true;
    //echo 'yay! '.$track_photo.' exists!';
}




// ON SALE PROCESSING
  switch ($onsale) {
    // IF SET TO EXCLUSIVE, REQUIRE MAGAZINE SUBSCRIPTION
    case 1:
      $prefix_action = "[EXCLUSIVE]";
      $download_button  = '<button onclick="PurchaseMusic(\''.$trackmp3.'\' , \''.$twittername.'\' , \''.$full_track_name.'\')" class="btn btn-default btn-xs" role="button"><span class="fa fa-save"></span></button>';
      break;
      
    default:
      // $prefix_action = "[EXCLUSIVE]";
      $prefix_action = "[DOWNLOAD]";
      $download_button  = '<button onclick="PurchaseMusic(\''.$trackmp3.'\' , \''.$twittername.'\' , \''.$full_track_name.'\')" class="btn btn-default btn-xs" role="button"><span class="fa fa-save"></span></button>';
      //$download_button  = '<a href="http://freelabel.net/download.php?p='.$trackmp3.'&n='.$twittername.' - '.$full_track_name.'" class="btn btn-success btn-xs" role="button"><span class="fa fa-save"></span></a></a>';
      break;
  }
  
  // SAVE INTO PLAYLIST ARRAY
  $AudioPagePlaylist[$i] = $trackanchor_noat;
  $i++;

//if (getimagesize($track_photo)==false) {
  // $track_photo = 'http://freelabel.net/images/fllogo.png';
//}



// PRE-MADE TWITTER SHARE MESSAGE
 $tweet_single = urlencode($prefix_action."

".$full_track_name ."
by ".$twittername."

".str_replace('http://', '' , $playerpath)."
".$twitpic);


 
  
//include_once('../config/play.php');

//* ------------ DELETE THIS AFTER WE TRY DOING THE NEW AUDIO SCRIPT -------- //
echo '
  <a name='.$id.'></a>
  <div class="col-md-4 col-xs-12 featured_post_wrapper" id="block_'.$id.'">
    <div class="thumbnail player_wrap" style="background-image:url(\''.$track_photo.'\');background-position:center center;background-size:auto 150%;border-radius:1px;padding:0;margin:0;" >
      <div class="background_tint" id="background_tint_'.$id.'">
            

        <div class="caption">


          <div class="play-panel-right">
            <a href="'.$track_url.'" ><img src="'.$track_photo.'" class="track_art_pic"></a>
          </div>

          <div class="play-panel-left" >
    		  	<audio id="'.$trackanchor_noat.'"" preload="metadata"><source src="'.$trackmp3.'"></audio>
            
            <p id="full_track_name" ><a href="'.$track_url.'" >'.$full_track_name.'</a></p>
            <h3 id="full_track_name" ><a href="'.$track_url.'" >'.$twittername.'</a></h3>
            
          </div>

          <!--<iframe src="http://freelabel.net/config/play.php?mp3='.$trackmp3.'" width="100%" seamless></iframe>-->

          <div class="progress">
              <div id="'.$trackanchor_noat.'_bar" class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:100%;" onclick="'.$trackanchor_noat.'()" >
                <span class="glyphicon glyphicon-play"></span>
              </div>
          </div>
          <p>
            <label>'.$how_recent.'</label>
            '.$blog->getShareButtons($id).'
            <!-- show share buttons -->
          </p>
        </div>
      </div><!-- background tint -->    
    </div>
  </div>';


  // SHARE BLOCK SCRIPT
  echo '
    <script>
        function showShareOptions'.$id.'() {
          $("#shareBlock_'.$id.'").toggle("fast");
        }
    </script>';


  // AUDIO PLAYER JAVASCRIPT!
/*
  echo "<script>
  function ".$trackanchor_noat."() {
  element=document.getElementById('".$trackanchor_noat."_img');
  AudioFile=document.getElementById('".$trackanchor_noat."');

    if(document.getElementById('".$trackanchor_noat."').paused){
      //alert('okay');
      wrapperBlock=document.getElementById('block_".$id."');
      wrapperBlock.style.width = '100vw';
      wrapperBlock.style.height = '80vh';
      wrapperBlock.style.margin = '5% 0% 5% 0%';
      wrapperBlock.style.padding = '5% 0% 0% 0%';
      //wrapperBlock.style.border = '1px solid red';
      scrollToAnchor('".$id."');
      document.getElementById('".$trackanchor_noat."').play();
      currentTime = document.getElementById('".$trackanchor_noat."').currentTime;
      element.src='http://freelabel.net/images/player_stop.png';
      progressBar=document.getElementById('".$trackanchor_noat."_bar');
      

      // TIMER FUNCTION
      var myVar=setInterval(function(){".$trackanchor_noat."_timer()},100);
      function ".$trackanchor_noat."_timer() {

          var currentTime = document.getElementById('".$trackanchor_noat."').currentTime;
          var audioFullDuration = AudioFile.duration;
          var currentRatio = currentTime/audioFullDuration;
          var currentPercentage = currentRatio * 100 + '%';

          var audioTimeMinutes = Math.floor(currentTime / 60);
          var audioTimeSeconds = Math.floor(currentTime - audioTimeMinutes / 60);
          var CurrentMinSec = audioTimeMinutes + ':' + audioTimeSeconds;

          var audioTimeMinutes = Math.floor(audioFullDuration / 60);
          var audioTimeSeconds = Math.floor(audioFullDuration - audioTimeMinutes / 60);
          var DurationMinSec = audioTimeMinutes + ':' + audioTimeSeconds;

          progressBar.innerHTML = CurrentMinSec.substring(0,4)+ '/' + DurationMinSec.substring(0,4);
          progressBar.style.width = currentPercentage;


          var currentState = currentPercentage.substring(0,1);
          if (CurrentMinSec = DurationMinSec) {
            //document.write('okay okay');
          }

          


          }

    }else{
      document.getElementById('".$trackanchor_noat."').pause();
      element.src='http://freelabel.net/images/player_play.png';
    }
  }

  
</script>";*/
//echo "<hr>";
	
//----------- DELETE THIS AFTER WERE DONE TESTIN THE NEW AUDIO PLAYER */
  
    }








if ($row['type'] == 'mixtape') {
	$id = $row['id'];
    $project_title = $row['project_title'];
    $mixtapephoto = $row['mixtapephoto'];
    $mixtape_url = $row['mixtapeurl'];
    $twitter = $row['twitter'];
            // twitter name fix
            $twitter = str_replace('@@', '@', $twitter);
            // twitter fix end
    $twitpic = $row['twitpic'];
    $rate = $row['rate'];

    $view_mixtape_url	=	'http://freelabel.net/mixtapes/show.php?id='.$id;
      //echo '<div class="row">';
          echo "
         <a target='_blank' href='".$blog_story_url."'>
           <div class='col-md-4'>
              <a href='".$view_mixtape_url."' target='_blank' ><img id='featured_image' src='".$mixtapephoto."'></a>
              <div class='caption'>
                <a href='".$view_mixtape_url."' target='_blank' ><h2>".$project_title."</h2></a>
                <a href='".$view_mixtape_url."' target='_blank' ><p>".$twitter."</p></a>
                <a href='".$view_mixtape_url."' target='_blank' ><p class='btn btn-primary'><span class='glyphicon glyphicon-fullscreen'></span></p></a>
                <a href='".$mixtape_url."' target='_blank' ><p class='btn btn-success'><span class='glyphicon glyphicon-download-alt'></span></p></a>
              </div>
          </div>
          </a>
         ";
        //echo "</div>";
     
    
      }























  if ($row['type'] == 'xxxfl') {

    $submission_date  = $row['submission_date'];
    $blog_title = $row['blogtitle'];
    $photo_path = $row['photo'];
    // $photo_url = "http://FreeLabel.net/images/". $photo_path;
    if ( strpos(strtolower($photo_path), 'http://freelabel.net/')===false ) {
      $photo_path = 'http://freelabel.net/images/'.$photo_path;
    }
    $photo_url = $photo_path;
    $twitter = trim($row['twitter']);
    $twitpic = $row['twitpic'];
    $blog_story_url = $row['blog_story_url'];
    $subject = $blog_story_url;
    $find = "blog.amradiolive.com";
    $replace = "freelabel.net/blog";
    $blog_story_url = str_replace($find,$replace,$subject);




    $post_title_array = explode(' ', trim($blog_title));
      if ($post_title_array[0] == '[VIDEO]'
        OR $post_title_array[0] == '[SINGLE]'
        OR $post_title_array[0] == '[ALBUM'
        OR $post_title_array[0] == '[INTERVIEW]'
        OR $post_title_array[0] == '[EXCLUSIVE]'
        ) {
        if ($post_title_array[0] == '[ALBUM') {
          $post_title_short = $post_title_array[2];
        }else{
          $post_title_short = $post_title_array[1];
        }
      } else {
        $post_title_short = $post_title_array[0];
      }




      //$blog_story_url = 'http://FREELABEL.net/'.$twitter.'/'.$post_title_short;
      $blog_story_url = 'http://freela.be/l/'.$twitter.'/'.$post_title_short;


    


    $trackname = strtolower($row['trackname']);
    $tracknameshort = preg_replace('/\s+/', '', $trackname);
    $trackanchor  = "".$tracknameshort;
    $pound = "%23";
    $views = $row['views'];
    $userphoto = $row['userphoto'];
    $playerpath = $row['playerpath'];
    $photo = $row['photo'];
    $artist_profile = 'http://x.freelabel.net/'.strtolower($twitter);

    
    $how_recent =  time() - strtotime($row['submission_date']);
        //$how_recent = date('H:i', $how_recent);
        $how_recent = $how_recent / 60;
        $how_recent = $how_recent / 60;
        $how_recent = $how_recent / 24;
        if ($how_recent < 0.041666666666667) {
          $how_recent = $how_recent * 24 * 60;
          $how_recent = substr($how_recent, 0,3);
          $how_recent =  $how_recent.' minutes ago';
        } elseif ($how_recent < 1) {
          $how_recent = $how_recent * 24;
          if ($how_recent < 2) {
            $how_recent = substr($how_recent, 0,1);
            $how_recent =  $how_recent.' hour ago';
          } elseif ($how_recent < 10) {
            $how_recent = substr($how_recent, 0,1);
            $how_recent =  $how_recent.' hours ago';
          } else {
            $how_recent = substr($how_recent, 0,2);
            $how_recent =  $how_recent.' hours ago';
          } 
        }elseif($how_recent < 10) {
          $how_recent = substr($how_recent, 0,1);
          $how_recent =  $how_recent.' days ago';
        } else {
          $how_recent = substr($how_recent, 0,2);
          $how_recent =  $how_recent.' days ago';
        }
        if ($submission_date == '0000-00-00 00:00:00') {
          $how_recent = strtotime($row['submission_date']);
        }
    



        echo '
  <div class="col-md-4 featured_post_wrapper">
    <div class="thumbnail" style="background-image:url(\''.$photo_url.'\');background-position:center center;background-size:auto 150%;" >
      <div id="background_tint_singles" >
      <a href="'.$blog_story_url.'"><img src="'.$photo_url.'" alt="'.$blog_title.'"></a>
      <div class="caption">
         <a href="'.$blog_story_url.'"><p id="full_track_name">'.$blog_title.'</p></a>
        <a href="'.$artist_profile.'" target="_blank" ><h5 id="full_track_name">'.$twitter.'</h5></a>
        <br>
        <p>
            <label>'.$how_recent.'</label>
            '.$blog->getShareButtons($id).'
            <!-- show share buttons -->
          </p>
        <p>
        ';
            include(ROOT.'config/share.php');
            findByID($blog_id);
        echo '
          <!-- <a href="http://freelabel.net/som/index.php?post=1&text='.$tweet_blog.'" class="btn btn-primary btn-xs" role="button" target="_blank"><span class="glyphicon glyphicon-retweet"></span></a> 
          <a href="https://twitter.com/intent/tweet?screen_name=&text='.$tweet_blog.'" class="btn btn-primary btn-xs" role="button" target="_blank"><span class="glyphicon glyphicon-star"></span></a>-->
          <a href="'.$blog_story_url.'" class="btn btn-default btn-xs" role="button"><span class="glyphicon glyphicon-fullscreen"></span></a>
        </p>
      </div>
      </div><!-- background_tint -->
    </div>
  </div>';

    
      }

























//       if ($row['type'] == 'xxxxxfl' OR strtolower($row['twitter'])=='@xxxxxfl') {


//     $submission_date  = $row['submission_date'];
//     $blog_title = $row['blogtitle'];
//     $photo_path = $row['photo'];
//     if ( strpos($photo_path, 'http://freelabel.net/')===false) {
//       $photo_url = "http://FreeLabel.net/images/". $photo_path;
//     } else {
//       $photo_url = $photo_path;
//     }
//     $twitter = $row['twitter'];
//     $twitpic = $row['twitpic'];
//     $blog_story_url = $row['blog_story_url'];
//     $subject = $blog_story_url;
//     $find = "blog.amradiolive.com";
//     $replace = "freelabel.net/blog";
//     $blog_story_url = str_replace($find,$replace,$subject);

//     $trackname = strtolower($row['trackname']);
//     $tracknameshort = preg_replace('/\s+/', '', $trackname);
//     $trackanchor  = "".$tracknameshort;
//     $pound = "%23";
//     $views = $row['views'];
//     $userphoto = $row['userphoto'];
//     $playerpath = $row['playerpath'];
//     $photo = $row['photo'];
//     $artist_profile = 'http://x.freelabel.net/'.strtolower($twitter);

    
//     $how_recent =  time() - strtotime($row['submission_date']);
//         //$how_recent = date('H:i', $how_recent);
//         $how_recent = $how_recent / 60;
//         $how_recent = $how_recent / 60;
//         $how_recent = $how_recent / 24;
//         if ($how_recent < 0.041666666666667) {
//           $how_recent = $how_recent * 24 * 60;
//           $how_recent = substr($how_recent, 0,3);
//           $how_recent =  $how_recent.' minutes ago';
//         } elseif ($how_recent < 1) {
//           $how_recent = $how_recent * 24;
//           if ($how_recent < 2) {
//             $how_recent = substr($how_recent, 0,1);
//             $how_recent =  $how_recent.' hour ago';
//           } elseif ($how_recent < 10) {
//             $how_recent = substr($how_recent, 0,1);
//             $how_recent =  $how_recent.' hours ago';
//           } else {
//             $how_recent = substr($how_recent, 0,2);
//             $how_recent =  $how_recent.' hours ago';
//           } 
//         }elseif($how_recent < 10) {
//           $how_recent = substr($how_recent, 0,1);
//           $how_recent =  $how_recent.' days ago';
//         } else {
//           $how_recent = substr($how_recent, 0,2);
//           $how_recent =  $how_recent.' days ago';
//         }
//         if ($submission_date == '0000-00-00 00:00:00') {
//           $how_recent = strtotime($row['submission_date']);
//         }
    

// // TWEET SHARE MESSAGE
// $tweet_blog = urlencode("[#FLMAG]

// ".$twitter." ". $blog_title ." 

// [".$blog_story_url."]

// ".$twitpic);


//         echo '
//   <div class="col-md-4 featured_post_wrapper">
//     <div class="thumbnail" style="background-image:url(\''.$photo_url.'\');background-position:center center;background-size:auto 150%;" >
//       <a href="'.$blog_story_url.'" ><img src="'.$photo_url.'" alt="'.$blog_title.'"></a>
//       <div class="caption">
//         <a href="'.$blog_story_url.'" target="_blank" ><h4>'.$blog_title.'</h4></a>
//         <a href="'.$artist_profile.'" target="_blank" ><h5 style="display:inline-block;" >'.$twitter.'</h5></a>
//         <label class="label label-success">'.$how_recent.'</label>
//         <hr>
//         <p><a href="http://freelabel.net/som/index.php?post=1&text='.$tweet_blog.'" class="btn btn-primary" role="button" target="_blank"><span class="glyphicon glyphicon-retweet"></span></a> <a href="'.$blog_story_url.'" class="btn btn-default" role="button"><span class="glyphicon glyphicon-fullscreen"></span></a></a></p>
//       </div>
//     </div>
//   </div>';

    
//       }


  }

mysqli_close($con);
?>
</div>

