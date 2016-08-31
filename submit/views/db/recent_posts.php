<?php 
/*

Written by Alex Mayo
Recent Post Dashboard Widget

1. Confirm User session
2. Detect State & Use Switch to determine View

*/
if (isset($_SESSION['user_name'])==false) {
  session_start(); // echo 'starting session:';
}
if ($user_name_session == false) {
    //$user_name_session = $_POST['user_name'];
    if (!isset($_POST['user_name'])) {
      $user_name_session = $_SESSION['user_name'];
    }
    $user_name = $user_name_session;
  }

<<<<<<< HEAD
include_once('/home/content/59/13071759/html/config/index.php');
=======
include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
>>>>>>> master
$ud = new UserDashboard($_SESSION['user_name']);
$upload_options = $ud->getUserUploadOptions($user_name_session);

    if (!isset($_POST['q'])) {
      // IF A FILTER QUERY IS NOT SET, SHOW THE USER PROFILE CONTROL PANEL
      include_once(ROOT.'submit/views/db/campaign_info.php');
      $iv = 'value="'.$_POST['q'].'" ';
    } else {
      $iv='';
    }
    include_once(ROOT.'config/share.php');
    // PULL USER DATA & MEDIA INTO A VARIABLE
    $blog = new Blog();
 	
	$user_data = $ud->getUserMedia($_SESSION['user_name']);
  echo '</div>';
?>
<a name='recent_post_wrapper'></a>
<a name='main_display_wrapper'></a>
<script type="text/javascript" src='http://freelabel.net/js/jquery.jeditable.js'></script>
<script type="text/javascript">
$(function() {
  $('.edit').editable('http://freelabel.net/submit/update.php',{
      id   : 'user_post_id',
      //type    : 'textarea',
      name : 'title'
    });
  $( "#user-track-search" ).submit(function( event ) {
      //alert( "Handler for .submit() called." );
      event.preventDefault();
      var thedata = $(this).serializeArray();
      var mainwrapper = $('#main_display_panel');
      $('#main_display_panel').html("please wait..");
      //a//lert(thedata);
      $.post('http://freelabel.net/submit/views/db/recent_posts.php',thedata,function(data){
        //alert(data);
        $('#main_display_panel').html(data);
      });
      //loadPage('http://freelabel.net/submit/views/db/recent_posts.php', '#main_display_panel', thedata , 'admin');
    });
});
  function deleteBlogPost(post_id , blog_type) {      
        r = confirm('Are you sure you want to delete this post? post #' + post_id);
        if (r == true) 
        {            
                     $.post('http://freelabel.net/submit/deletesingle.php', { 
                            post_id : post_id,
                            blog_type : blog_type
                          } , function(data){
                          //alert(data);
                          $('#post_panel_' + post_id).html('<td><center><label class=\"label label-danger\" >Deleting...</label></center></td>');
                          $('#post_panel_' + post_id).fadeOut(2000);
                          //window.open(approval_follow_up);
                      });
        } else {
          // do nothing!
        }
  }
</script>
<!--<script type="text/javascript" src="http://freelabel.net/config/control.js"></script>-->
<style type="text/css">
#blog_type_icon {
  //background-color:red ;
  color:#fff;
}
.post_thumbnail {
  background-size: auto 100%;
}
.upload_buttons a {
  margin-left:auto;
  margin-right:auto;
}
.edit_options {
	border-top:6px solid red;
}
.edit input {
  background-color:transparent;
  border-top:none;
  border:none;
  width:100%;
  padding:1.5%;
  height:inherit;
}
article section {
  display: inline-block;
  vertical-align: top;
}
</style>
<!-- User Dashboard Track search -->
<form id="user-track-search">
  <?php 
  if (isset($_POST['q']) && $q = trim($_POST['q'])) {
    echo '<h3>Searching: "'.$q.'"</h3>';
  } else {
    echo '<h3>Search Your Tracks</h3>';
  }
  ?>
  <div class="input-group">
    <input class="form-control" placeholder="Search Your Tracks" <?php $iv; ?> name='q' >
    <span class="input-group-btn">
		<button class="btn btn-default" type="button"><i class="glyphicon glyphicon-search" ></i>Search</button>
      </span>
  </div> 
	<div class="btn-group">
		<a class="btn btn-default" href="#uploads" onclick="<?php echo "loadPage('http://freelabel.net/submit/views/db/recent_posts.php', '#main_display_panel', 'uploads', '".$_SESSION['user_name']."')"; ?>"><i class="glyphicon glyphicon-user" ></i> Your Uploaded Tracks</a>
		<a class="btn btn-default" href="#mentions" onclick="<?php echo "loadPage('http://freelabel.net/submit/views/db/recent_posts.php', '#main_display_panel', 'mentions', '".$_SESSION['user_name']."')"; ?>"><i class="glyphicon glyphicon-comment" ></i> All Tracks Mentioning <?php echo $user_data[0]['twitter']; ?></a>
	</div>
	
</form>
<?php
include(ROOT.'inc/connection.php');

function get_timeagoo( $ptime )
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
                60                      =>  'min',
                1                       =>  'sec'
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

//include('../config/stats.php');
//echo $user_name;
$type = 'blog';
if ($user_name == 'mayoalexander') {
	$type = 'xxxfl';
}
if ($user_name == 'admin') {
	$type = 'blog';
	//$user_name = 'featured';
}

$randomize = $_GET["rand"];
if (isset($randomize) == false) {
  $randomize = $_GET['view'];
}
if ($_POST['page']=='uploads' OR $_POST['page']=='mentions') {
	echo 'Current View: '.$_POST['page'];
	$filter = $_POST['page'];
}
if (isset($_POST['q']) && $_POST['q']!=false) {
 // print_r($_POST);
  $q = trim($_POST['q']);
  $query = "SELECT * FROM feed WHERE user_name LIKE '$user_name_session' AND tags LIKE '%$q%' 
  OR user_name LIKE '$user_name_session' AND blogtitle LIKE '%$q%' 
  OR user_name LIKE '$user_name_session' AND twitter LIKE '%$q%' 
  OR user_name LIKE '$user_name_session' AND user_name LIKE '%$q%' 
  ORDER BY `id` DESC LIMIT 25";
} elseif($_GET['view']=='all') {
  //echo '3';
    $query = "SELECT * FROM feed ORDER BY `id` DESC LIMIT 25";
} elseif($_GET['view']=='submissions') {
  //echo '4';
    $query = "SELECT * FROM feed WHERE user_name LIKE '%submission%' ORDER BY `id` DESC LIMIT 25";
} else {




  // IF NO SPEFIFIC QUERY, check if random THEN 
  switch ($filter) {
    
    case 'uploads':
       $query = "SELECT * FROM feed WHERE user_name='".$_SESSION['user_name']."' ORDER BY `id` DESC LIMIT 25";
      //echo 'randomize activated. ';
      break;
	case 'mentions':
      $query = "SELECT * FROM `feed` WHERE `blogtitle`LIKE '%".$user_data[0]['twitter']."%' OR `twitter`LIKE '%".$user_data[0]['twitter']."%' ORDER BY `id` DESC LIMIT 25";
      break;

    default:
      $query = "SELECT * FROM feed WHERE user_name='".$_SESSION['user_name']."' ORDER BY `id` DESC LIMIT 25";

      // ADMIN POST VIEW: NOT SUBMISSIONS
      if ($_SESSION['user_name'] == 'adxmin') {
        $query = "SELECT * FROM feed 
          ORDER BY `id` DESC LIMIT 25";
      }
      break; 

  }
  

// echo '5';

}


$result = mysqli_query($con,$query);

//print_r($query);

echo "<table class='table panel-body'  id='recent_post_wrapper'>";
$i=1;
while($row = mysqli_fetch_array($result))
  {
    $i++;
  $trackname          = strtolower($row['trackname']);
  $tracknameshort     = preg_replace('/\s+/', '', $trackname);
  $trackanchor        = "".$tracknameshort;
  $pound              = "%23";
  $views              = $row['views'];
  $blog_user_name     =  $row["user_name"];
  $twitter            = $row['twitter'];
  $blog_title         = $row['blogtitle'];
  $tags               = $row['tags'];
  $user_twitter            = $row['twitter'];
  $blog_post_twitpic  = $row['twitpic'];
  $blog_title         = $row["blogtitle"];
  $blog_type          =  $row["type"];
  $blog_id            =  $row["id"];
  if (strpos($row['photo'], 'freelabel.net')==false) {
    $blog_photo         = "http://img.freelabel.net/".$row["photo"];
  } else {
    $blog_photo         = $row["photo"];
  }
  
  $blog_entry         = $row["blogentry"];
  $blog_story_url     = $row['blog_story_url'];
  $blog_write_up      = urldecode($row['writeup']);
  $blog_short_url     =  $row['short_url'];

  $blog_post_id       = $row['id'];
  $blog_phone = '';
  $blog_phone     =  $row["phone"];
  $submission_date    = $row['submission_date'];
  $submission_date_text    = '<span class="glyphicon glyphicon-time submisson_date_icon"></span>'.date('F j, Y - H:i A', strtotime($row['submission_date']));
    

  //  TITLE FIXES AND SYNTAX CONFIGURATION
  //  TITLE FIXES AND SYNTAX CONFIGURATION
  //  TITLE FIXES AND SYNTAX CONFIGURATION
  //  TITLE FIXES AND SYNTAX CONFIGURATION
  //  TITLE FIXES AND SYNTAX CONFIGURATION
  //  TITLE FIXES AND SYNTAX CONFIGURATION
  if ($blog_type=='single') {
    $blog_photo = $row['photo'];
    if ($blog_user_name == 'submission') {
      $blog_type=='Submission';
      //$blog_photo = 'http://img.freelabel.net/fllogo.png';
    }
    //$confirm_photo = str_replace('http://freelabel.net/','', $blog_photo);
    //if (getimagesize(ROOT.$confirm_photo)){
      //echo getimagesize(ROOT.$confirm_photo);
    //}
    
    $blog_story_url = $row['playerpath'];
    $blog_title = $row['trackname'];
  } // END OF SINGLE FORMATING 
  $blog_photo = "<img src='".$blog_photo."' style='max-width:250px;display:block;border-radius:250px;border:1px solid #000;'>";


  // CLEAN UP DIRECT URLS
  //$blog_story_url     = str_replace("amradiolive.com", "freelabel.net", $blog_story_url);
  $post_title_array = explode(' ', $blog_title);
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
      $blog_story_url = 'http://FREELABEL.net/'.$twitter.'/'.$post_title_short;

  $blog_story_url_short     = str_replace('http://', '', $blog_story_url);


  

  switch ($blog_type) {
    case 'single':
      $blog_type_icon = '<span class="glyphicon glyphicon-music" ></span>';
      break;
    case 'video':
      $blog_type_icon = '<span class="glyphicon glyphicon-facetime-video" ></span>';
      break;
    case 'blog':
      $blog_type_icon = '<span class="glyphicon glyphicon-book" ></span>';
      break;
    
    default:
      # code...
      break;
  }


  // CHECK FRESHNESS
  if (strpos($submission_date, date('m-d'))) {
    $freshness_status = '<div class="label label-success" style="font-size:10px;">NEW</div>';
  } else {
    $freshness_status =  '<div class="label label-warning btn-xs">OLD</div>';
    $freshness_status =  '';
  }
$submission_date_text=get_timeagoo(strtotime($submission_date));

$blog_title_explode = explode(' ', $blog_title);
// ---------------- TWEET MESSAGE -------------- //
$tweet_post = "[#FLMAG] ".$twitter."
  
".$blog_title ."

".'FREELABEL.net/'.$twitter.'/';//.$blog_title_explode[0];


if (strpos($blog_post_twitpic, 'cards.twitter.com')) {
  // do nothing
  $tweet_post .= '';
} else {
  // show the post
  $tweet_post .= '
'.$blog_post_twitpic;
}
$tweet_post = urlencode($tweet_post);


  $single_count_format = round($single_count_format /*+ rand(1111,4000) * 0.01*/);

  echo "<article class='panel-body row col-lg-12 col-md-12 col-xs-12' style='border:red solid 1px;min-height:500px;margin-bottom:0;overflow-y:hidden;' id='post_panel_".$blog_post_id."' >";
  echo "<section class='col-md-4 col-xs-12' ><a target='_blank' href='".$blog_story_url."'  ><span id='blog_type_icon'>".$blog_type_icon."</span>".$blog_photo."</section ></a>";
  /*echo "  <td class='post_thumbnail'>
            
            <a class='btn btn-social btn-facebook' target=\"_blank\"  href=\"https://www.facebook.com/sharer/sharer.php?u=".$blog_story_url."\" style='width:150px;'><i class='fa fa-facebook'></i>
              Share on Facebook</a>
            <a target=\"_blank\"  href=\"http://freelabel.net/som/index.php?post=1&text=".$tweet_post."\" class='btn btn-social btn-twitter' style='width:150px;'>
              <i class='fa fa-twitter'></i>
              Post on Twitter
            </a>
          </td>";*/
  //echo '<td>';
  //echo "<a href='".$blog_story_url."'></a>";

  //echo '</td>';
  echo "<section  class='col-md-8 col-xs-12' style='font-size:80%;' >
          <p style='text-shadow:0px 0px 20px #303030;color:#fff;' >
            <h3 style='display:inline-block;' ><span class='edit' id='twitter-".$blog_post_id."' >".$twitter."</span></h3>
            ".$freshness_status."
            <!--<a target='_blank' href='".$blog_story_url."'  >-->
            <h4 style='line-height:15px;' class='edit text-muted' id='blogtitle-".$blog_post_id."' >". $blog_title ."</h4>
            <h6>Tags:</h6>
            <div class='edit text-muted well' id='tags-".$blog_post_id."' >". $tags ."</div>
            <!--</a>-->
          </p>
          <!--<span class='text-muted' style='font-size:10px;margin-right:20px;'>".$single_count_format." PLAYS</span>-->
          <span class='text-muted' style='font-size:10px;'>By <u>".$blog_user_name."</u></span>
          <span class='text-muted' style='font-size:10px;'>".$submission_date_text."</span><br>


          ";






 // ONSALE STUFF
$onsale_status_free = "
                <select class='form-control' name='onsale' >
                  <option  value='0'>Private</option>
                  <option value='3' selected >Free Download</option>
                  <option value='1'>Exclusive Release</option>
                  <option value='2'>Instrumental Lease</option>
                </select>
                ";
$onsale_status_sale = "
                <select class='form-control' name='onsale'>
                  <option  value='0'>Private</option>
                  <option value='3' >Free Download</option>
                  <option value='1' selected>Exclusive Release</option>
                  <option value='2'>Instrumental Lease</option>
                </select>
                ";
$onsale_status_instrumental = "
                <select class='form-control' name='onsale' >
                  <option  value='0'>Private</option>
                  <option  value='3'>Free Download</option>
                  <option name='onsale' value='1'>Exclusive Release</option>
                  <option value='2' selected>Instrumental Lease</option>
                </select>
                ";
$onsale_status_private = "
                <select class='form-control' name='onsale' >
                  <option  value='0' selected>Private</option>
                  <option  value='3'>Free Download</option>
                  <option name='onsale' value='1'>Exclusive Release</option>
                  <option value='2'>Instrumental Lease</option>
                </select>
                ";
/*$name_track = '<div class="input-group">
  <span class="input-group-addon">@</span>
  <input type="text" class="form-control" value="'.$trackname_full.'" placeholder="Track Name">
</div>';*/


$set_price = '<div class="input-group"> 
  <span class="input-group-addon">$</span>
  <input type="text" class="form-control" value="'.$price.'" placeholder="Set Price..">
  <span class="input-group-addon">.00</span>
</div>';

if ($onsale=='1') {
  $pre ='<div class="label label-success" >ONSALE</div>';
} elseif($onsale=='2') {  
  $pre = '<div class="label label-warning" >INSTRUMENTAL</div>';
} elseif($onsale=='0') {
  $pre = '<div class="label label-danger" >PRIVATE</div>';
} elseif($onsale=='3') {
  $pre = '<div class="label label-warning" >FREE</div>';
}


switch ($onsale) {
  case '1':
    $onsale_status = $pre.$onsale_status_sale;
    break;
  case '0':
    $onsale_status = $pre.$onsale_status_private;
    break;
  case '2':
    $onsale_status = $pre.$onsale_status_instrumental;
    break;
  case '3':
    $onsale_status = $pre.$onsale_status_free;
    break;
}

  // ---- GET SINGLE STATS ---- //
  include(ROOT.'inc/connection.php');
//$sql = "SELECT * FROM stats WHERE page LIKE '%".$twitter." - ".$blog_title."%'";
$sql = "SELECT * 
FROM  `stats` 
WHERE  `page` LIKE  '%$user_twitter%' AND `page` LIKE  '%$blog_title%'";
$resultt = mysqli_query($con, $sql);
  if (mysqli_num_rows($resultt) > 0) {
    // output data of each row
    while($stats = mysqli_fetch_assoc($resultt)) {
        $stats_total[] = $stats['count'];
        $stats_visited = $stats['last_visited'];
        //echo 'stats: ';
        //print_r($stats['last_visited']);
    }
  
    $stats_display = array_sum($stats_total);
    //print_r($stats);
      echo '
        <hr>
        <h5>Stats:</h5>
        Uploaded by '.$blog_user_name.'
        <br>
        <span class="fa fa-eye text-icon" style="margin-right:1%;"></span>'.$stats_display. " Views
        <br>
        <span class='fa fa-clock-o text-icon' style='margin-right:1%;'></span>" . get_timeagoo(strtotime($stats_visited))." since last played<br>";
  } else {
      //echo "0 results";
  }
  //print_r($)
  //echo $player_iframe.'<br>';
  $single_statistics  = "

    <div class='panel' style='padding:2%;' >
    <h3 class='panel-heading' style='text-align:left;'>".$single_count_format." Total Plays<h3>
    <hr>
    </div>
";
  echo '<h5>Share:</h5>'.$blog->getShareButtons($blog_id);



 echo '<br><br>';
$delete_button = "<div id='delete_post_button' ><input name='post_id' type='hidden' value='".$blog_post_id."'><input name='blog_type' type='hidden' value='mag'><button type='submit' class='btn btn-danger ' onclick='deleteBlogPost(".$blog_post_id.", \"mag\")'><span class='glyphicon glyphicon-trash'></span></button></div>";

          if ($user_name_session == $blog_user_name OR $user_name_session =='admin' OR $blog_user_name =='submission' OR $blog_user_name =='') {
            echo $delete_button;
          } else {
            echo "<alert class='alert alert-warning' >Uploaded by ".$blog_user_name."!</alert>";
          }

          echo '</div>';


        
  echo "<section class='col-md-1'>
          <a class='btn-lg' style='padding:2%;' onclick='showEditOptions(".$blog_post_id.")'><span class='glyphicon glyphicon-option-vertical'></span></a>
        </section>";
	echo '
   ';
	
	// echo "<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?\'http\':\'https\';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+\'://platform.twitter.com/widgets.js\';fjs.parentNode.insertBefore(js,fjs);}}(document, \'script\', \'twitter-wjs\');</script></td>";
  //echo "<td><div id= 'jointheteam'>&#9658; ".$new_counts."</div></td>";
  //echo "<td><div id=\"jointheteam\" href=\"" . $row['trackmp3'] . "\">VOTES: ".$row['requests']."</td>";
  echo "</article>";
  $single_count = 0;
  }
// IF NO POSTS EXIST
if ($i==1) {
  if ($_POST['q']) {
    echo "<tr><center><div style='font-size:200%;'><span style='color:yellow;' class='glyphicon glyphicon-alert'></span> <h3>No Tracks Found</h3><h5>Click on the \"+\" buttons to add new media!</h5><br></div></center></tr>";
  } else {
    echo "<tr><center><div style='font-size:200%;'><span style='color:yellow;' class='glyphicon glyphicon-alert'></span> <h3>You haven't uploaded anything to your profile!</h3><h5>Click on the \"+\" buttons to upload music, photos, videos, and more!</h5><br></div></center></tr>";
  }
}

echo "</table>";
?>