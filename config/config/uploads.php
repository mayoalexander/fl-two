<a name='recent_post_wrapper'></a>
<?php 
if ($user_name_session == false) {
    $user_name_session = $_POST['user_name'];
    $user_name = $_POST['user_name'];
    include('../../../config/index.php');
    include(ROOT.'config/share.php');

  }
  if ($user_name_session == 'addmin') {
    echo "<a href='?control=blog&xxxfl=1#blog_posts' class='btn btn-default btn-xs' >XXXFL</a>";
  }
?>
<div class='panel'>
<h1 class='panel-heading'>Uploads</h1>
  <nav class='panel-body'>
    <a onclick="loadPage('http://freelabel.net/submit/views/db/user_photos.php', '#recent_post_wrapper', 'dashboard', '<?php echo $user_name_session; ?>')" class='btn btn-warning btn-xs'>        <span class="glyphicon glyphicon-plus"></span>Photos</a>
    <a onclick="loadPage('http://freelabel.net/submit/views/single_uploader.php', '#recent_post_wrapper', 'dashboard', '<?php echo $user_name_session; ?>')" class='btn btn-warning btn-xs'>      <span class="glyphicon glyphicon-plus"></span>Music</a>
    <a onclick="loadPage('http://freelabel.net/submit/views/db/recent_posts.php?control=blog&view=all#blog_posts', '#main_display_panel', 'dashboard', '<?php echo $user_name_session; ?>')" class='btn btn-default btn-xs' >All</a>
    <a href='?control=blog#blog_posts' class='btn btn-default btn-xs' >Recent</a>
    <a onclick='randomizePosts()' class='btn btn-default btn-xs' >Randomize</a>
    <a href='http://freelabel.net/submit/?control=blog&view=submissions#blog_posts' class='btn btn-default btn-xs' >Submissions</a>
  </nav>
</div>

<style type="text/css">

#blog_type_icon {
  //background-color:red ;
  color:#fff;
}
.post_thumbnail {
  background-size: auto 100%;
}

</style>


<script type="text/javascript">
function randomizePosts() {
  if (window.location == 'http://freelabel.net/submit/?control=blog&rand=1#blog_posts') {
    location.reload(false);
  } else {
    location.assign("?control=blog&rand=1#blog_posts");
  
  }
}
</script>


<?php
if (file_exists("../inc/connection.php")) {
    include('../inc/connection.php');
  }
if (file_exists("../../inc/connection.php")) {
    include('../../inc/connection.php');
  }
if (file_exists("../../../inc/connection.php")) {
    include('../../../inc/connection.php');
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


if ($user_name_session == 'sierra') {
  //echo '1';
    $query = "SELECT * FROM blog WHERE user_name='sierra' OR user_name='admin' AND type='featured' OR type='blog'  ORDER BY `id` DESC LIMIT 0,23";
} elseif ($_GET['xxxfl'] == 1) {
  //echo '2';
    $query = "SELECT * FROM blog WHERE type='xxxfl' ORDER BY `id` DESC LIMIT 0,23";
} elseif($_GET['view']=='all') {
  //echo '3';
    $query = "SELECT * FROM blog ORDER BY `id` DESC LIMIT 25";
} elseif($_GET['view']=='submissions') {
  //echo '4';
    $query = "SELECT * FROM blog WHERE user_name LIKE '%submission%' ORDER BY `id` DESC LIMIT 25";
} else {




  // IF NO SPEFIFIC QUERY, check if random THEN 
  switch ($randomize) {
    
    case 1:
      $query = "SELECT * FROM blog WHERE user_name='".$user_name."' AND type='$type' OR type='featured' ORDER BY `id` DESC LIMIT ".rand(0,400).", 25";
      //echo 'randomize activated. ';
      break;

    default:
      $query = "SELECT * FROM blog 
      WHERE user_name='".$user_name_session."' AND type='$type' 
      OR 
      user_name='".$user_name_session."' AND type='featured' 
      OR
      user_name='".$user_name_session."' AND type='single' 
      OR
      user_name='' AND type='video'
      ORDER BY `id` DESC LIMIT 10";


      // ADMIN POST VIEW: NOT SUBMISSIONS
      if ($user_name_session == 'admin') {
        $query = "SELECT * FROM blog 
          WHERE `user_name` NOT LIKE '%submission%'
          ORDER BY `id` DESC LIMIT 25";
      }
      break; 

  }
  

// echo '5';

}

$result = mysqli_query($con,$query);

// echo 'PULL: '.print_r($_GET);

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
  $blog_post_twitpic  = $row['twitpic'];
  $blog_title         = $row["blogtitle"];
  $blog_type         =  $row["type"];
  $blog_photo         = "http://img.freelabel.net/".$row["photo"];
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
    $blog_story_url = $row['playerpath'];
    $blog_title = $row['trackname'];
  }
  // CLEAN UP DIRECT URLS
  $blog_story_url     = str_replace("amradiolive.com", "freelabel.net", $blog_story_url);
  $blog_story_url_short     = str_replace('http://', '', $blog_story_url);




  // GET PLAYER STATSSTICS
          //echo 'blog title : '. $blog_title;
          $blog_title_array = explode(' ', $blog_title);
          //echo '['.$blog_title_array[0].$blog_title_array[1].$blog_title_array[2]." ".$blog_title_array[3]." ".$blog_title_array[4].']';
$result_stats = mysqli_query($con,"SELECT * 
FROM  `stats` 
WHERE  `page` LIKE  '%".$twitter."%' 
AND `page` LIKE  '%".$blog_title."%'
LIMIT 0 , 30");
  if($row = mysqli_fetch_array($result_stats))
  {
    $date_posted =      $row['date_posted']; 
    $single_count =      $row['count'];
    //echo 'okay! single count:'. $single_count;
    $single_count_format = number_format($single_count);

    $date_posted_text = date('m d Y',$date_posted);
    $ratio_orig   = $single_count / time($date_posted);
    $ratio_orig   = substr($ratio_orig, 0,3);
    $ratio = substr($ratio_orig, 0,3) * 10;
    $ratio = 100 - substr($ratio, 0,3);
    $percentage_ratio = $ratio.'%';
    
  } else {
    //echo 'blog title : '. $blog_title;
    //echo 'naw!';
    $single_count_format = 0;
  }







//echo 'the blog: '.$blog_title;


  

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
    $freshness_status = '<div class="label label-success">NEW</div>';
  } else {
    $freshness_status =  '<div class="label label-warning">OLD</div>';
    $freshness_status =  '';
  }

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




  echo "<tr class='panel-body' id='post_panel_".$blog_post_id."' >";
  echo "<td><span id='blog_type_icon'>".$blog_type_icon."</span></td>";
  /*echo "  <td class='post_thumbnail'>
            
            <a class='btn btn-social btn-facebook' target=\"_blank\"  href=\"https://www.facebook.com/sharer/sharer.php?u=".$blog_story_url."\" style='width:150px;'><i class='fa fa-facebook'></i>
              Share on Facebook</a>
            <a target=\"_blank\"  href=\"http://freelabel.net/som/index.php?post=1&text=".$tweet_post."\" class='btn btn-social btn-twitter' style='width:150px;'>
              <i class='fa fa-twitter'></i>
              Post on Twitter
            </a>
          </td>";*/
  echo '<td>';
  echo "<a href='".$blog_story_url."'><img src='".$blog_photo."' style='max-width:250px;display:block;'></a>";

  echo '</td>';
  echo "<td id='joinbutton' style='font-size:80%;' >
          <p style='text-shadow:0px 0px 20px #303030;color:#fff;' >
            <a target='_blank' href='".$blog_story_url."'  ><h3 style='display:inline-block;' >". $twitter." ".$freshness_status."</h3>
            <h4 class='text-muted' style='line-height:15px;'>". $blog_title ."</h4>
          </p>
          <p style='font-size:120%;' class='label label-success '>".$single_count_format." PLAYS</p></a>
		  <hr>
      <p class='text-muted'>".$submission_date_text."</p>


          ";






 // ONSALE STUFF
$onsale_status_free = "
                <select class='form-control' name='onsale' >
                  <option  value='0'>Private</a>
                  <option value='3' selected >Free Download</a>
                  <option value='1'>Exclusive Release</a>
                  <option value='2'>Instrumental Lease</a>
                </select>
                ";
$onsale_status_sale = "
                <select class='form-control' name='onsale'>
                  <option  value='0'>Private</a>
                  <option value='3' >Free Download</a>
                  <option value='1' selected>Exclusive Release</a>
                  <option value='2'>Instrumental Lease</a>
                </select>
                ";
$onsale_status_instrumental = "
                <select class='form-control' name='onsale' >
                  <option  value='0'>Private</a>
                  <option  value='3'>Free Download</a>
                  <option name='onsale' value='1'>Exclusive Release</a>
                  <option value='2' selected>Instrumental Lease</a>
                </select>
                ";
$onsale_status_private = "
                <select class='form-control' name='onsale' >
                  <option  value='0' selected>Private</a>
                  <option  value='3'>Free Download</a>
                  <option name='onsale' value='1'>Exclusive Release</a>
                  <option value='2'>Instrumental Lease</a>
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


  //echo $player_iframe.'<br>';
  $single_statistics  = "
    <div class='panel' style='padding:2%;' >
    <h3 class='panel-heading' style='text-align:left;'>".$single_count_format." Total Plays<h3>
    </div>
";
//echo $player_iframe;

$score_progress= '<div class="progress">
      <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: '.$percentage_ratio.'">
        SCORE: '.$percentage_ratio.'
      </div>
    </div>';
  echo "<br><br>";
  /* echo '
    <table class="table table-striped" style="color:#000;" >
    <tr>
      <td><span class="label label-success" >'.$how_recent.'</span></td>
      <td>'.$pre.'</td>
      <td><span class="label label-success" >'.$single_count_format.' </span></td>
      <td><button class="btn btn-primary" onclick="showShareOptions_'.$blog_post_id.'()"><span class="glyphicon glyphicon-cog"></span></button></td>
    </tr>
  </table>
  ';
  echo "";
        
          //echo '<h2 style="display:inline-block;" >'.$trackname_full.' </h2>';
          echo '<hr>';
        echo '<div id="postBlock_'.$blog_post_id.'"  style="display:none;background-color:#e3e3e3;border-radius:5px;width:100%;padding: 3% 1%"  >';
          
           // echo $onsale;
          
           echo $single_statistics;
           echo $score_progress;
          echo $name_track;
         echo "<table class='table' style='color:#303030;' >";
            echo "<tr>";
              echo "<td >";
                echo "<h4>STATUS<h4>";
              echo "</td>";
              echo "<td>";
                echo "<h4>URL<h4>";
              echo "</td>";
              echo "<td>";
                echo "<h4>EMBED<h4>";
              echo "</td>";
              echo "<td>";

                //echo "<form method='POST' action='deletesingle.php' ><input name='postid' type='hidden' value='".$track_id."'><input type='submit' class='btn btn-danger'  value='DELETE'></form><hr>";
              echo "</td>";
            echo "</tr>";
            echo "<tr>";
              echo "<td width='200px'> ";
                echo "<form method='post' action='http://freelabel.net/x/update_title.php' >";
                  echo $onsale_status;
                  echo '<input type="hidden" name="type" value="update_single" >';
                  echo '<input type="hidden" name="track_id" value="'.$blog_post_id.'" >';
                  echo '<input type="submit" value="update" class="btn btn-default" >';
                echo "</form>";
              echo "</td>";
              echo "<td>";
                echo "<textarea class='form-control' rows='2' cols='30' >".$playerpath."</textarea>";
              echo "</td>";
              echo "<td>";
                echo "<textarea class='form-control'  rows='2' cols='30' >".$player_iframe."</textarea>";
              echo "</td>";
              echo "<td>";
                echo "<form method='POST' action='deletesingle.php' ><input name='post_id' type='hidden' value='".$blog_post_id."'><input type='submit' class='btn btn-danger'  value='DELETE'></form><hr>";
              echo "</td>";
            echo "</tr>";
          echo '</table>'; */
        echo '</div>';




        echo "
        <script>
              function showShareOptions_".$blog_post_id."() {
                shareBlock=document.getElementById('postBlock_".$blog_post_id."');
                updatePhotoButton=document.getElementById('update_track_button_".$blog_post_id."');
                if (shareBlock.style.display == 'block') {
                  // if showing, change to none
                  shareBlock.style.display = 'none';
                  
                  //updatePhotoButton.InnerHTML = '<';
                } else {
                  shareBlock.style.display = 'block';
                  
                  dashboardProfileDiv.style.overflow = 'scroll';
                  updatePhotoButton.value = 'HIDE';
                }
                 
              }
          </script>";
          //echo 'this right here';
          echo '</div>';

echo      "


      <div id='shareBlock_".$blog_post_id."' style='display:none;'>
		  <hr>
        Phone: (".$blog_phone.")<br>
      <hr>
		  		<form method='POST' action='http://freelabel.net/x/update_title.php' >
					<span>Title:</span><input type='text' name='blog_post_title' value='".$blog_title."' class='form-control'><br>
					<span>Twitter:</span><input type='text' name='blog_post_twitter' value='".$twitter."' class='form-control' ><br>
					<span>Entry:</span><textarea type='text' name='blog_post_entry' cols='10' rows='5' class='form-control' >".$blog_entry."</textarea><br>
          <span>Write Up:</span><textarea type='text' name='blog_write_up' cols='10' rows='5' class='form-control' >".$blog_write_up."</textarea><br>
					<span>TwitPic:</span><input type='text' name='blog_post_twitpic' value='".$blog_post_twitpic."' class='form-control'><br>
					<input type='hidden' name='type' value='blog'>
					<input type='hidden' name='blog_post_id' value='".$blog_post_id."'>
					<input type='submit' value='Update' class='btn btn-primary'>
				</form>
		  </div>
	</td>";
  //echo "<td><form method='POST' action='requestsong.php' ><input name='postid' type='hidden' value='".$row['id']."'><input type='submit' id='jointheteam' value='REQUEST'></form></td>";
  //echo "<td style='background-image:url('../images/".$row[photo]."');'><a id=\"jointheteam\" href=\"" . $row['beatdownload'] . "\">DOWNLOAD</a></td>"; 
  //echo "<td></td>";
  $delete_button = "<td>
          <div id='delete_post_button' ><input name='post_id' type='hidden' value='".$blog_post_id."'><input name='blog_type' type='hidden' value='mag'><button type='submit' class='btn btn-danger ' onclick='deleteBlogPost(".$blog_post_id.", \"mag\")'><span class='glyphicon glyphicon-trash'></span></button></div>
        <td>";
  //echo $_SESSION['user_name'] .' - '. $blog_user_name;
  //echo $user_name_session .' == ' .$blog_user_name.'<br>';
  if ($user_name_session == $blog_user_name OR $user_name_session =='admin') {
    echo $delete_button;
  }
  echo "<td>";
    findByID($blog_post_id);
  echo "<td>";
  echo "<td>
  <a class='btn-lg' style='padding:2%;' onclick='showEditOptions_".$blog_post_id."()' ><span class='glyphicon glyphicon-option-vertical'></span></a></td>";
	echo '<script>
				function showEditOptions_'.$blog_post_id.'() {
          $("#shareBlock_'.$blog_post_id.'").slideToggle(750);
				}
		</script>';
	
	// echo "<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?\'http\':\'https\';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+\'://platform.twitter.com/widgets.js\';fjs.parentNode.insertBefore(js,fjs);}}(document, \'script\', \'twitter-wjs\');</script></td>";
  //echo "<td><div id= 'jointheteam'>&#9658; ".$new_counts."</div></td>";
  //echo "<td><div id=\"jointheteam\" href=\"" . $row['trackmp3'] . "\">VOTES: ".$row['requests']."</td>";
  echo "</tr>";
  $single_count = 0;
  }
// IF NO POSTS EXIST
if ($i==1) {
  echo "<tr><center><div style='font-size:200%;'><span style='color:yellow;' class='glyphicon glyphicon-alert'></span> <h3>You haven't uploaded anything to your profile!</h3><h5>Click on the \"+\" buttons to add new media!</h5><br></div></center></tr>";
}

echo "</table>";
mysqli_close($con);
?> 


<script>
function deleteBlogPost(post_id , blog_type) {      
      r = confirm('Are you sure you want to delete this post?');
      if (r == true) 
      {            
                   $.post('submit/deletesingle.php', { 
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



