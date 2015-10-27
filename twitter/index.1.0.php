<?php
//echo $_SESSION['user_name'];
if (isset($_SESSION['user_name']) == false) {
  session_start();
}
print_r($_POST);
/* --------------------------------------------------------------------------------
GRAB ALL SCRIPT VALUES
--------------------------------------------------------------------------------*/
        //function getPremadeTweets(){
        function saveTwitterData($type , $related_user , $data)
                  {
                      include('../config/index.php');
                      include(ROOT.'inc/conn.php');
                      $sql = "INSERT INTO  `freelabelnet`.`twitter_data` (`id` ,`type` ,`related_user` ,`data`)
                      VALUES (NULL ,  '".$type."',  '".$related_user."',  '".$data."')";
                      // use exec() because no results are returned
                      $conn->exec($sql);
                      //echo "Successfully Saved to DB. ";
                  }
        function checkIfAlreadyExists($type , $related_user , $data) {
                      include('../config/index.php');
                      include(ROOT.'inc/conn_data.php');
                      $sql = "SELECT * 
                              FROM  `twitter_data` WHERE `type` LIKE 'direct_message' AND `related_user` LIKE '$related_user' ORDER BY `id` LIMIT 1";
                      // use exec() because no results are returned
                      $result = mysqli_query($con,$sql);
                      if($row = mysqli_fetch_array($result)) {
                        //print_r($row);
                        //echo '<hr><hr>';
                        $send_tweet_ornot = true;
                        //echo 'Already sent to '.$related_user.'!!!! STOPPPP!<hr>';
                      } else {
                        echo 'Auto Response Sent!!!<br>';
                        saveTwitterData($type , $related_user , $data);
                        $send_tweet_ornot = false;
                      }
                      return $send_tweet_ornot;
        }
                  // -----------end of func-------- //
                include('../inc/connection.php'); 
                $query = "SELECT * FROM script ORDER BY `id` DESC LIMIT 1";
                $result = mysqli_query($con,$query);
                $i=1;
                //$debug[] .= $i . ') '.$send_out_message;
                while($row = mysqli_fetch_assoc($result))
                  {
                    foreach ($row as $message) {
                      $script[] = $message;
                    }
                    $send_out_message = $row['send_out'];
                    $main_follow_up = $row['twitpic'];
        
                    $promote_campaign[]     = $row['first'];
                    $promote_campaign[]     = $row['second'];
                    $promote_campaign[]     = $row['third'];
                    $promote_campaign[]     = $row['fourth'];
                    $promote_campaign[]     = $row['fifth'];
        
                    $script_follow_up[] = $row['follow_up_1'];
                    $script_follow_up[] = $row['follow_up_2'];
                    $script_follow_up[] = $row['follow_up_3'];
                    $script_follow_up[] = $row['follow_up_4'];
                    $script_follow_up[] = $row['follow_up_5'];
                    
                    $value_builder[] = $row['sixth'];
                    $value_builder[] = $row['seventh'];
                    $value_builder[] = $row['eighth'];
                    $value_builder[] = $row['ninth'];
                    $value_builder[] = $row['tenth'];
        
                    $value_builder[0] = urlencode($value_builder[0]);
                    $value_builder[1] = urlencode($value_builder[1]);
                    $value_builder[2] = urlencode($value_builder[2]);
                    $i++;
                  }

                    switch ($_GET['q']) {
                      case 1:
                      $api_query_search =array(
                        'q'=>"site:datpiff.com OR site:audiomack.com OR site:spinrilla.com", 
                        "result_type" => "recent",
                        "lang" => "en",
                        "count" => '40');
                      // AUTO POST | PROMOTE GUCCI
                      //$status       =   $connection->post('statuses/update', array('status' => 'stay workin..'));
                      break;
                      case 2:
                      $api_query_search =array(
                        'q'=>"my new site:soundcloud.com", 
                        "result_type" => "recent",
                        "lang" => "en",
                        "count" => '40');
                      //$status       =   $connection->post('statuses/update', array('status' => $campaign1));
                      break;
                      case 3:
                      $api_query_search =array(
                        'q'=>"send beats", 
                        "result_type" => "recent",
                        "lang" => "en",
                        "count" => '40');
                      //$status       =   $connection->post('statuses/update', array('status' => $campaign2));
                      break;
                      case 4:
                      $api_query_search =array(
                        'q'=>"send beats", 
                        "result_type" => "recent",
                        "lang" => "en",
                        "count" => '40');
                      //$status       =   $connection->post('statuses/update', array('status' => $campaign3));
                      break;
                      case 5:
                      $api_query_search =array(
                        'q'=>"my mixtape .com", 
                        "result_type" => "recent",
                        "lang" => "en",
                        "count" => '40');
                      //$connection->post('statuses/update', array('status' => $campaign4));
                      break;
                      case 6: // FINDING ALL FOLLOWERS
                      $api_query_search =array(
                        'screen_name'=>"freelabelnet", 
                        "count" => '40');
                      //$connection->post('statuses/update', array('status' => $campaign5));
                      break;
                      case 7: // FINDING ALL FOLLOWERS
                      $api_query_search =array(
                        'screen_name'=>"freelabelnet", 
                        'cursor'=>'-1',
                        "count" => '200');
                      //$connection->post('statuses/update', array('status' => $campaign5));
                      break;
                      default:
                      $api_query_search =array('q'=>"my new soundcloud.com", 
                        "result_type" => "recent",
                        "lang" => "en",
                        "count" => '40');
                      //$connection->post('statuses/update', array('status' => $campaign6));
                      break;
                    }
                    
        //}
        /* --------------------------------------------------------------------------------
        GRAB ALL SCRIPT VALUES
        --------------------------------------------------------------------------------*/

require_once('oauth/twitteroauth.php');
require_once('config.php');

// ---------- DEFAULT VIEWS & CONFIGURATIONS
$access_token = $_SESSION['access_token'];
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);

if(isset($_GET["redirect"]))
{
  print_r($access_token);
  exit;
    $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);
 
    $request_token = $connection->getRequestToken(OAUTH_CALLBACK);

    $_SESSION['oauth_token'] = $token = $request_token['oauth_token'];
    $_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];
     
    switch ($connection->http_code) {
      case 200:
        $url = $connection->getAuthorizeURL($token);
        header('Location: ' . $url); 
        break;
      default:
        echo 'Could not connect to Twitter. Refresh the page or try again later.';
    }
    exit;
}


?>
<style type="text/css">
.tweet-buttons {
  display:none;
}
</style>
<script src="<?php echo $leap; ?>../config/jquery-ui-1.11.4.custom/external/jquery/jquery.js"></script>
<script src="<?php echo $leap; ?>../config/jquery-ui-1.11.4.custom/jquery-ui.js"></script>
<script>
function tweetScript(text) {
  text = encodeURIComponent(text);
  //alert("http://freelabel.net/som/index.php?post=1&text=" + text);
  window.open('http://freelabel.net/som/index.php?post=1&text=' + text)
}
function pullAllDMs(user_twitter_name) {
    $.post('twitter/index.php', {
      action : 'directmessage_thread', 
      user_twitter_name:user_twitter_name 
    });
}
function shareTwitter(textToTweet , twittername) {
          //if (twittername != '') {
           // shareURL = 'https://twitter.com/intent/tweet?screen_name=&text=' + textToTweet;
         // } else {
            shareURL = 'http://freelabel.net/som/index.php?dm=1&t='+ twittername +'&text=' + textToTweet;
            //shareURL = 'https://twitter.com/intent/tweet?screen_name=&text=' + textToTweet;
          //}
          window.open(shareURL);
          alert(shareURL);
      }
function shareTwitter(textToTweet , twittername) {
          //if (twittername != '') {
           // shareURL = 'https://twitter.com/intent/tweet?screen_name=&text=' + textToTweet;
         // } else {
            shareURL = 'http://freelabel.net/som/index.php?dm=1&t='+ twittername +'&text=' + textToTweet;
            //shareURL = 'https://twitter.com/intent/tweet?screen_name=&text=' + textToTweet;
          //}
          window.open(shareURL);
          alert(shareURL);
      }

      function addToLeads(lead_twitter , lead_name , follow_up_date , entry_date , lead_email) 
      {
        //alert('add to leads!');
        var path = 'http://freelabel.net/submit/update.php';
        $.post(path, {
          lead_twitter: lead_twitter ,
          lead_name: lead_name ,
          follow_up_date: follow_up_date , 
          entry_date: entry_date,
          lead_email: lead_email
        }).done(function(data){
          alert(data);
        });
      }
</script>
<?php
if ($_POST['page']=='timeline'){
/* ------------------------------------------------------------------------------------
* Display all user tweets - timeline
* 
*
*
*
------------------------------------------------------------------------------------ */
        $api_query_dm =array("screen_name" => 'freelabelnet',"count" => '10');
        $method = 'statuses/user_timeline';
        $user_timeline =   $connection->get($method, $api_query_dm);

        $i=1;
        foreach ($user_timeline as $user_twitter_data) {
          $user_twitter_name_screen = $user_twitter_data->user->screen_name;
          $user_twitter_name = '@'.$user_twitter_data->user->screen_name;
          $user_twitter_photo = $user_twitter_data->user->profile_image_url;
          $user_post = $user_twitter_data->text;

          $user_post_date = date('F d - h:i A' , strtotime($user_twitter_data->created_at));
          $user_post_date_sql = date('Y-m-d h:i:s' , strtotime($user_twitter_data->created_at));
          $user_post_date_sql_followup = date('Y-m-d' , strtotime($user_twitter_data->created_at));
          $follow_up_date_sql = date('Y-m-d', strtotime($user_twitter_data->created_at));
          $follow_up_date_sql = 'today';

          $tweet_preview  = substr($tweet, 0, 25).'...';
          // \'Let us know when you upload to FREELABEL.NET. What are you focused showcasing in the Mag/Radio? Projects, Releases, Interviews, etc?\' , \''.$user_twitter_name.'\'
          $build_data = '
          <div class="twitter_data_blockx">
          <a target="_blank" href="http://m.twitter.com/'.$user_twitter_name_screen.'/messages">
            <img style="height:45px;margin:0 1% 1% 0;" height="45px" src="'.$user_twitter_photo.'">
            <h4 style="display:inline;">'.$user_twitter_name.'</h4>
            <h5 style="display:inline;">'.$user_post_date.'</h5>
          </a> 
          <p class="lead">'.$user_post.'</p>
          <hr>
          </div><!--twitter datablock -->';
          $tweets[$method][$user_twitter_name_screen][] = $build_data;
          $i++;
        }

}









/* ------------------------------------------------------------------------------------
* Display all direct messages.
*
*
*
*
------------------------------------------------------------------------------------ */
//if (isset($_GET['direct_messages'])){
if ($_POST['page']=='direct_messages'){

        $api_query_dm =array("count" => '20');
        $method = 'direct_messages';
        $direct_messages =   $connection->get($method, $api_query_dm);
        $i=1;
        foreach ($direct_messages as $user_twitter_data) {
          $user_twitter_name_screen = $user_twitter_data->sender_screen_name;
          $user_twitter_name = '@'.$user_twitter_data->sender_screen_name;
          $user_twitter_photo = $user_twitter_data->sender->profile_image_url;
          $user_post_date_sql = date('Y-m-d h:i:s' , strtotime($user_twitter_data->created_at));
          $user_post_date = date('F d - h:i A' , strtotime($user_twitter_data->created_at));
          $user_post = $user_twitter_data->text;
          $user_meta[$user_twitter_name_screen]['messages'][$i]['message'] = $user_post;
          $user_meta[$user_twitter_name_screen]['messages'][$i]['date'] = $user_post_date_sql;
          $user_meta[$user_twitter_name_screen]['photo'] = $user_twitter_photo;

          //echo '<pre>';
            //print_r($user_twitter_data);
          //echo '</pre>';
          //exit;

          /* ----------------------------------------------------------------------
          * 1. check if already tweeted to
          * 2. post the tweet
          * 3. save to database
          *
          * ---------------------------------------------------------------------- */
          if(checkIfAlreadyExists('direct_message',$user_twitter_name_screen, $main_follow_up)==true){
            //$connection->post('direct_messages/new', array('screen_name' => $user_twitter_name_screen,'text' => $main_follow_up));
          } else {
            /* 
              ----------------------------------------------------------------------
              --------------- SEND TWEET TO DIRECT MESSAGES! -----------------------
              ----------------------------------------------------------------------
            */
           // echo 'Expect call from '.$user_twitter_name_screen.' within 5 to 15 minutes!<hr>';
            //$connection->post('direct_messages/new', array('screen_name' => $user_twitter_name_screen,'text' => $main_follow_up));
            // --- SEND TWEET TO DIRECT MESSAGES! ------- //

          }

          $user_post_date = date('F d - h:i A' , strtotime($user_twitter_data->created_at));
          $user_post_date_sql = date('Y-m-d h:i:s' , strtotime($user_twitter_data->created_at));
          $user_post_date_sql_followup = date('Y-m-d' , strtotime($user_twitter_data->created_at));
          $follow_up_date_sql = date('Y-m-d', strtotime($user_twitter_data->created_at));
          $follow_up_date_sql = 'today';
          $build_data = '

        <div class="twitter_data_blockx">
            <a target="_blank" href="http://m.twitter.com/'.$user_twitter_name_screen.'/messages">
              <img style="height:45px;margin:0 0.5% 0.5% 0;" height="25px" src="'.$user_twitter_photo.'">
              <h4 style="display:inline;">'.$user_twitter_name.'</h4>
              <h5 style="display:inline;">'.$user_post_date.'</h5>
            </a>
          <p class="">'.$user_post.'</p>

          <form id="direct_message_'.$user_twitter_name_screen.'">
            <input id="direct_message_text_'.$user_twitter_name_screen.'" class="form-control direct_message_text" placeholder="type tweet message here" >
          </form>
          <a class="btn btn-xs btn-default" onclick="alert(\''. urlencode($script_follow_up[1]) .'\')">'.$script_follow_up[1].'</a>
          <a class="btn btn-xs btn-default" onclick="alert(\''.urlencode($script_follow_up[2]).'\')">'.$script_follow_up[2].'</a>

          <script>
          $( "#direct_message_'.$user_twitter_name_screen.'" ).submit(function( event ) {
            //var text = $("#direct_message_text").val();
            //var text = $("#direct_message_text_'.$user_twitter_name_screen.'").val();
            var text = $(this).find("input").val();
            alert(text);
            var text = encodeURIComponent(text);
            alert( "Handler for .submit() called. " + text );
            //shareTwitter(text , "'.$user_twitter_name_screen.'");
            event.preventDefault();
          });
          </script>

          <div id="twitter_dm_option_buttons_'.$i.'" class="panxel panel-body"></div>
        </div>
        <!--twitter datablock -->';
          $tweets[$method][$user_twitter_name_screen][] = $build_data;
          $i++;
        }

}



/* ------------------------------------------------------------------------------------
* Display all followers
*
*
*
*
------------------------------------------------------------------------------------ */
if ($_POST['page']=='followers') { // GET FOLLOEWRS

        $api_query_dm =array("count" => '50','cursor' => -1);
        $method = 'followers/list';
        $twitter_followers =   $connection->get($method, $api_query_dm);
        $i=1;
        foreach ($twitter_followers->users as $user_twitter_data) {
          $user_twitter_name_screen = $user_twitter_data->screen_name;
          $user_twitter_name = '@'.$user_twitter_data->screen_name;
          $user_twitter_photo = $user_twitter_data->profile_image_url;
          $user_post = $user_twitter_data->following;
          if ($user_post == 1) {
            $user_post = "TRUE";
          } else {
            $user_post = "FALSE";
            $connection->post('friendships/create', array('screen_name' => $user_twitter_name_screen));
           // echo '<script>shareTwitter(\'Let us know when you upload at FREELABEL.net! Whats your focus on showcasing in the Radio/Mag? Interviews, Project releases, etc?\' , \''.$user_twitter_name_screen.'\');</script>';
          }
          $user_post_date = date('F d - h:i A' , strtotime($user_twitter_data->created_at));
          // \'Let us know when you upload to FREELABEL.NET. What are you focused showcasing in the Mag/Radio? Projects, Releases, Interviews, etc?\' , \''.$user_twitter_name.'\'
          $twitter_ui = '<div class="twitter_data_blockx"><a target="_blank" href="http://m.twitter.com/'.$user_twitter_name_screen.'/messages"><img style="height:45px;margin:0 1% 1% 0;" height="45px" src="'.$user_twitter_photo.'"><h4 style="display:inline;">'.$user_twitter_name.'</h4> - <h5 style="display:inline;">'.$user_post_date.'</h5></a> <p class="lead">'.$user_post.'</p>';
          $twitter_ui .= '<a onclick="$(\'#twitter_option_buttons_'.$i.'\').slideToggle();" class="btn btn-xs btn-default">Options</a>';
          $twitter_ui .= '<div id="twitter_option_buttons_'.$i.'" class="panel panel-body" style="display:none;">';
          $twitter_ui .='<button onclick="shareTwitter(\'Let us know when you upload to FREELABEL .net What you focused on showcasing in the Mag/Radio? Singles, Project Releases, Interviews, etc?\' , \''.$user_twitter_name_screen.'\')" class="btn btn-xs btn-primary">RTM1</button>';
          $twitter_ui .='<button onclick="shareTwitter(\'Do you have any interviews about what youre currently working on so we can build a buzz up for your releases?\' , \''.$user_twitter_name_screen.'\')" class="btn btn-xs btn-primary">RTM2</button>';
            $tweet = 'If you create an account, well release your project & singles 24/7 ALL MONTH + do weekly interviews + Magazine Page Design for $59';
          $twitter_ui .='<button onclick="shareTwitter(\''.urlencode($tweet).' \' , \''.$user_twitter_name_screen.'\')" class="btn btn-xs btn-primary">RTM3</button>';
            $tweet = 'Sounds good! Just create an account @ FREELABEL.net so we can get started spining your tracks & booking your interviews!';
          $twitter_ui .='<button onclick="shareTwitter(\''.urlencode($tweet).' \' , \''.$user_twitter_name_screen.'\')" class="btn btn-xs btn-primary">RTM4</button>';
          $tweet = 'upload NEW music for our DJs to drop LIVE at this weeks Radio/Mag showcases at FREELABEL.net';
          $twitter_ui .='<button onclick="shareTwitter(\''.urlencode($tweet).' \' , \''.$user_twitter_name_screen.'\')" class="btn btn-xs btn-default">Upload</button>';
          $tweet = 'We need NEW exclusives to drop LIVE at this weeks Radio & Mag Showcases. Call us 323-601-8111';
          $twitter_ui .='<button onclick="shareTwitter(\''.urlencode($tweet).' \' , \''.$user_twitter_name_screen.'\')" class="btn btn-xs btn-default">FollowUp/CallUs</button>';
          $tweet = 'Call us 323-601-8111';
          $twitter_ui .='<button onclick="shareTwitter(\''.urlencode($tweet).' \' , \''.$user_twitter_name_screen.'\')" class="btn btn-xs btn-default">CallUs</button>';
          $twitter_ui .='<a target="_blank" href="http://m.twitter.com/'.$user_twitter_name_screen.'/messages" class="btn btn-xs btn-warning">MSG</a>';
          $twitter_ui .='<a onclick="addToLeads(\''.$user_twitter_name.'\',\''.str_replace("'", "\'", $user_post).'\',\''.$user_post_date.'\',\''.$user_post_date.'\')" class="btn btn-xs btn-success">Add To Leads</a>';
          $twitter_ui .= '</div>';
          $twitter_ui .= '<hr>
          </div><!--twitter datablock -->';
          $tweets[$method][$user_twitter_name_screen] = $twitter_ui;
          $i++;
        }
} // ------- END OF FOLLOWERS ----------//


if(isset($_POST) && $_POST['user_post'] !='') {
  if ($_POST['user_post']) {
      $status = $_POST["status"];
      if(strlen($status)>=130)
      {
              $status = substr($status,0,130);
      }
      // ------ POST TWEETS ----//
      $connection->post('statuses/update', array('status' => "$status"));
      $message = "<script>
        window.location.assign('../../');
        </script>";
      }
} // --- END OF IF POST ISSET STATEMENT  ----- //




/* ------------------------------------------------------------------------------------
* // --------- AUTO PROMO ---------- ///
*
*
*
------------------------------------------------------------------------------------ */
    
if($_GET['som']=='1')
    {
      //echo "what the fuckkkkkk";
        $status = $_POST["status"];
        if(strlen($status)>=130)
        {
                $status = substr($status,0,130);
        }
        $access_token = $_SESSION['access_token'];
        $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);
        $connection_search_query_results =      $connection->get('search/tweets', $api_query_search);
        $i=1;
        foreach ($connection_search_query_results->statuses as $user_twitter_data) {
            //echo $i.') '.$user_twitter_data->user->screen_name.' ';
            $user_twitter_name = $user_twitter_data->user->screen_name;
                //if ($_GET['som']==1 && $_GET['q']) { // RUN MASS SENDOUT
                    if (in_array($user_twitter_name, $already_tweeted_to)) {
                      // dont tweet out!
                      //echo ' Already Tweeted :( <hr>';
                    } else {
                      // --- SINCE WE HAVENT ALREADY, TWEET IT OUT TO THEM!! --- ///
                      $already_tweeted_to[$i] = $user_twitter_name;
                      //print_r($already_tweeted_to);
                      saveTwitterData('post_outgoing',$user_twitter_name,urldecode($som_tweet_to_send));

                      echo $i.') Message Sent to @'.$user_twitter_name.'!<hr>';
                      
                      // ------ SEND SOM ---- //
                      $som_tweet_to_send = urlencode($send_out_message);
                      //$user_twitter_name = 'siralexmayo';
                      $link_to_tweet    = 'http://freelabel.net/som/index.php?post=1&t='.$user_twitter_name.'&text=@'.$user_twitter_name.'%20'.$som_tweet_to_send;
                      //$link_to_tweet    = 'http://freelabel.net/som/index.php?dm=1&t='.$user_twitter_name.'&text=%20'.$som_tweet_to_send;
                      $timeOutTime = (2000 * $i);
                      
                      echo '
                      <script>
                      function execSOM(linkToTweet) {
                          window.open(linkToTweet);
                          console.log(linkToTweet);
                      }
                      setTimeout( function () { execSOM("'.$link_to_tweet.'"); }  , '.$timeOutTime.');
                      </script>';
                    }
                //}
                $i++;
        }
        
        
        //$message = "Tweeted Sucessfully!!";
        echo '<hr>'.count($already_tweeted_to).' Messages sent!';
} // --------- AUTO PROMO ---------- ///

//include('../new_header.php');
?>

<div class="row">
    <div>
        <?php
        if (empty($_SESSION['access_token']) || empty($_SESSION['access_token']['oauth_token']) || empty($_SESSION['access_token']['oauth_token_secret'])) {
            echo '
            <a href="'.HTTP.'twitter/index.php?redirect=true" class="btn btn-block btn-social btn-twitter">
              <i class="fa fa-twitter"></i>
              Sign in with Twitter
            </a>';
            exit;
        }
        else
        {
          echo $message.'
          <div id="som_buttons" style="display:none;margin-bottom:2%;">
            <a href="http://freelabel.net/som/index.php?som=1&stayopen=1&mins=4" class="btn btn-default" target="_blank">Auto</a>
            <a href="http://freelabel.net/twitter/?som=1&q=1" class="btn btn-default" target="_blank">1</a>
            <a href="http://freelabel.net/twitter/?som=1&q=2" class="btn btn-default" target="_blank">2</a>
            <a href="http://freelabel.net/twitter/?som=1&q=3" class="btn btn-default" target="_blank">3</a>
            <a href="http://freelabel.net/twitter/?som=1&q=4" class="btn btn-default" target="_blank">4</a>
            <a href="http://freelabel.net/twitter/?som=1&q=5" class="btn btn-default" target="_blank">5</a>
          </div>
            <form action="twitter/index.php" method="post">
              <div class="input-group">
                <input type="text" class="form-control"  name="status" id="status" placeholder="Write something...." aria-describedby="basic-addon1">
                <span class="input-group-btn" ><input class="btn btn-primary" type="submit" id="status" name="submit" value="Tweet"></span>
              </div>
              <input type="hidden" name="user_post" value="1">
            </form><hr>';
            echo '<button class="btn btn-default btn-xs" onclick="'."loadPage('http://freelabel.net/twitter/index.php', '.main_twitter_panel', 'direct_messages', '".$user_name_session."','','calendar')".'">Direct Messages</button>';
            echo '<button class="btn btn-default btn-xs" onclick="'."loadPage('http://freelabel.net/twitter/index.php', '.main_twitter_panel', 'followers', '".$user_name_session."','','calendar')".'">Followers</button>';
            echo '<button class="btn btn-default btn-xs" onclick="'."loadPage('http://freelabel.net/twitter/index.php', '.main_twitter_panel', 'timeline', '".$user_name_session."','','calendar')".'">Home</button>';

            echo '<a onclick="$(\'#som_buttons\').slideToggle();" class="btn btn-primary btn-xs">Start SOM</a>';
            echo "<a class='btn btn-danger btn-xs' href='twitter/destroysessions.php'>Logout of Twitter</a>
            <hr>";
        } 
        echo '<div id="row">';
                  echo '<div class="col-md-8 overflow_div main_twitter_panel" style="font-size:80%;text-align:left;">';
                    //print_r($twitter_followers);
                    /*foreach ($tweets['followers/list'] as $tweet) {
                      echo $tweet;
                    };*/
                    //echo "<pre>";
                    foreach ($user_meta as $user => $convo) {
                      $direct_message_user_photo = $user_meta[$user]['photo'];
                      echo '<hr><h1 class="section_title"><img src="'.$direct_message_user_photo.'" style="width:80px;">@'.$user.'</h1>';
                      echo '<section class="well">';
                      
                        // --- DISPLAY EACH MESSAGE ------/
                        foreach ($user_meta[$user]['messages'] as $message) {
                            echo '<blockquote class="" style="color:#101010;"> '.
                                '<label class="label" style="display:inline;">'.($message['date']).'</label><p>'.$message['message'].'</p>';
                            echo '</blockquote>';
                        }
                      echo '</section>';
                      echo '
                        <button class="btn btn-default"><span class="glyphicon glyphicon-comment"></span>Reply</button>
                          <span class="tweet-buttons">
                          <form id="direct_message_'.$user.'">
                            <input id="direct_message_text_'.$user.'" class="form-control direct_message_text" placeholder="type tweet message here" >
                          </form>
                          <a class="btn btn-xs btn-default" onclick="shareTwitter(\''.urlencode($script[4]).'\' , \''.$user.'\')">'.$script[4].'</a>
                          <a class="btn btn-xs btn-default" onclick="shareTwitter(\''.urlencode($script[5]).'\' , \''.$user.'\')">'.$script[5].'</a>
                          <a class="btn btn-xs btn-default" onclick="shareTwitter(\''.urlencode($script[6]).'\' , \''.$user.'\')">'.$script[6].'</a>
                          <a class="btn btn-xs btn-default" onclick="shareTwitter(\''.urlencode($script[7]).'\' , \''.$user.'\')">'.$script[7].'</a>
                          <a class="btn btn-xs btn-default" onclick="shareTwitter(\''. urlencode($script[8]) .'\' , \''.$user.'\')">'.$script[8].'</a>
                          <a class="btn btn-xs btn-default" onclick="shareTwitter(\''. urlencode($script[9]) .'\' , \''.$user.'\')">'.$script[9].'</a>
                          <a class="btn btn-xs btn-default" onclick="shareTwitter(\''. urlencode($script[10]) .'\' , \''.$user.'\')">'.$script[10].'</a>
                          <a class="btn btn-xs btn-default" onclick="shareTwitter(\''. urlencode($script[11]) .'\' , \''.$user.'\')">'.$script[11].'</a>
                          <a class="btn btn-xs btn-default" onclick="shareTwitter(\''. urlencode($script[12]) .'\' , \''.$user.'\')">'.$script[12].'</a>
                          <a class="btn btn-xs btn-default" onclick="shareTwitter(\''. urlencode($script[13]) .'\' , \''.$user.'\')">'.$script[13].'</a>
                          <a class="btn btn-xs btn-default" onclick="shareTwitter(\''. urlencode($script[14]) .'\' , \''.$user.'\')">'.$script[14].'</a>
                          <a class="btn btn-xs btn-default" onclick="shareTwitter(\''. urlencode($script[15]) .'\' , \''.$user.'\')">'.$script[15].'</a>
                          <a class="btn btn-xs btn-default" onclick="shareTwitter(\''. urlencode($script[16]) .'\' , \''.$user.'\')">'.$script[16].'</a>
                          <a class="btn btn-xs btn-default" onclick="shareTwitter(\''. urlencode($script[17]) .'\' , \''.$user.'\')">'.$script[17].'</a>
                          </span>


          <script>
            $( "#direct_message_'.$user.'" ).submit(function( event ) {
              //var text = $("#direct_message_text").val();
              //var text = $("#direct_message_text_'.$user.'").val();
              var text = $(this).find("input").val();
              //alert(text);
              var text = encodeURIComponent(text);
              //alert( "Handler for .submit() called. " + text );
              shareTwitter(text , "'.$user.'");
              event.preventDefault();
            });
          </script>




                          ';


                    }
                    //echo '</pre>';



                    //foreach ($tweets['direct_messages'] as $conversation) {
                        //foreach ($conversation as $message) {
                        //  echo $message;
                      //  }
                    //};
                    //echo "</div>";
                  echo '</div>';






                  echo '<div class="col-md-4 overflow_div" style="font-size:80%;height:550px;text-align:left;">';
                    foreach ($tweets['statuses/user_timeline'] as $tweet) {
                      echo "<div class=''>";
                        //print_r($tweet);

                        foreach ($tweet as $text) {
                          echo $text;
                        }
                      echo '</div>';
                    };
                  echo '</div>';










                  $home_timeline[] = '<h3>Home</h3>';
                  $home_timeline[] = '<div class="overflow_div">';
                  foreach ($user_timeline as $status) {
                    $time_since_posted = ((time() - strtotime($status->created_at)) / 60);
                    $time_since_posted = substr($time_since_posted, 0,2);
                    //$date = date( 'm-d h:i:s' , strtotime($status->created_at));
                    $text = $status->text;
                    $home_timeline[] = $time_since_posted.' - '.$text.'<hr>';
                  }



                  
                  
                  
        echo '</div>';
        ?>
    </div>
</div>

<?php
//include('../new_footer.php');

?>
<script>
  
</script>