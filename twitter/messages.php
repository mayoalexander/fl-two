<?php
include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');


//echo $_SESSION['user_name'];
// ---------- DEFAULT VIEWS & CONFIGURATIONS
//$access_token = $_SESSION['access_token'];
$config = new Config();
$blog = new Blog();

// ---------- DEFAULT VIEWS & CONFIGURATIONS
if (isset($_SESSION['user_name']) == false) {
  session_start();
}
$access_token['oauth_token'] = '1018532587-qbLJXcpMzhvmFU0xHmmIF1SgSzzfC9CG0NccwXq';
$access_token['oauth_token_secret'] = 'ZZgJzwgPt7jpj3RVPrQYVv2u0E3PPvXRJD2yK9oTXa2r8';
$access_token['screen_name'] = 'FreeLabelNet';
$access_token['user_id'] = '1018532587';
$access_token['x_auth_expires'] = '0';
$_SESSION['access_token'] = $access_token;
$todays_date = date('Y-m-d H:i:s');



  $promos_data = $blog->getPromosByUser('admin',0,'live-promo');
  foreach ($promos_data as $value) {
      $params[]['id']     =   $value['id'];
      $params[]['title']  =   $value['title'];
  }

  $promos_data = $blog->build_dropdown($params,'promo_id');


// /* debugging */
// if (isset($_GET)) {
//   var_dump($_GET);
// }
// if (isset($_POST)) {
//   var_dump($_POST);
// }



// start application 

$leads_list = $config->getLeads();

$n=0;

require_once('oauth/twitteroauth.php');
require_once('config.php');

$access_token = $_SESSION['access_token'];
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);
//print_r($access_token);
//print_r($_SESSION);
  //exit;



$access_token = $_SESSION['access_token'];
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);

if(isset($_GET["redirect"]))
{
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
.twitter-controls-group .btn , .twitter-controls-group button, .twitter-controls-group {
  border-radius:0;
}
</style>
<script src="<?php echo $leap; ?>../config/jquery-ui-1.11.4.custom/external/jquery/jquery.js"></script>
<script src="<?php echo $leap; ?>../config/jquery-ui-1.11.4.custom/jquery-ui.js"></script>
<script>
	
</script>
<?php

/* ------------------------------------------------------------------------------------
* Display all direct messages.
*
*
*
*
------------------------------------------------------------------------------------ */
//if (isset($_GET['ssages'])){
if ($_POST['page']=='direct_messages' OR $_POST['page']=='direct_messages_auto_rtm'){

        $api_query_dm =array("count" => '50');
        // $api_query_dm =array("count" => '2');
        $method = 'direct_messages';
        $direct_messages =   $connection->get($method, $api_query_dm);
        $i=1;
        foreach ($direct_messages as $user_twitter_data) {
          $user_twitter_name_screen = $user_twitter_data->sender_screen_name;
          $user_twitter_name = '@'.$user_twitter_data->sender_screen_name;
          $user_twitter_photo = $user_twitter_data->sender->profile_image_url;
          $user_post_date_sql = strtotime($user_twitter_data->created_at);
          $user_post_date = date('F d - h:i A' , strtotime($user_twitter_data->created_at));
          $user_post = $user_twitter_data->text;
          $user_meta[$user_twitter_name_screen]['messages'][$i]['message'] = $user_post;
          $user_meta[$user_twitter_name_screen]['messages'][$i]['date'] = $user_post_date_sql;
          $user_meta[$user_twitter_name_screen]['photo'] = $user_twitter_photo;

          //echo '<pre>';
            // print_r($user_twitter_data);
          //echo '</pre>';
          //exit;

          /* ----------------------------------------------------------------------
          * 1. check if already tweeted to
          * 2. post the tweet
          * 3. save to database
          * ---------------------------------------------------------------------- */

          if(checkIfAlreadyExists('direct_message',$user_twitter_name_screen, $main_follow_up)==true){
            // if they have already been saved to the database, send the second follow up promotion
            if ($_POST['page']=='direct_messages_auto_rtm') {
              // echo ' '.$user_twitter_name_screen.', '.$main_follow_up."<br>";
              // $connection->post('direct_messages/new', array('screen_name' => $user_twitter_name_screen,'text' => $main_follow_up));
            }
          } else {
            /* 
              ----------------------------------------------------------------------
              --------------- SEND TWEET TO DIRECT MESSAGES! -----------------------
              auto promote to all direct messages auto promote auto campaign
              ----------------------------------------------------------------------
            */
            // *************************** // 
            // *************************** //
            // *************************** //
            if ($_POST['page']=='direct_messages_auto_rtm') {
              // echo ' '.$user_twitter_name_screen.', '.$main_follow_up."<br>";
              // $connection->post('direct_messages/new', array('screen_name' => $user_twitter_name_screen,'text' => $main_follow_up));
            }
            // *************************** //
            // *************************** //
            // *************************** //

            // --- SEND TWEET TO DIRECT MESSAGES! ------- //
          }



          $user_post_date = date('F d - h:i A' , strtotime($user_twitter_data->created_at));
          $user_post_date_sql = date('Y-m-d h:i:s' , strtotime($user_twitter_data->created_at));
          $user_post_date_sql_followup = date('Y-m-d' , strtotime($user_twitter_data->created_at));
          $follow_up_date_sql = date('Y-m-d', strtotime($user_twitter_data->created_at));
          $follow_up_date_sql = 'today';



          $build_data = '<div class="twitter_data_blockx">';


          $build_data .= '

        
          <a target="_blank" href="http://m.twitter.com/'.$user_twitter_name_screen.'/messages">
              <img style="height:45px;margin:0 0.5% 0.5% 0;" height="25px" src="'.$user_twitter_photo.'">
              <h4 style="display:inline;">'.$user_twitter_name.'</h4>
              <h5 style="display:inline;color:#303030;">'.$user_post_date.'</h5>
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
            // alert(text);
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

?>
<div class="row">
    <div>
        <?php

          if (empty($_SESSION['access_token']) || empty($_SESSION['access_token']['oauth_token']) || empty($_SESSION['access_token']['oauth_token_secret'])) {
              echo '
              <a href="http://freelabel.net/twitter/index.php?redirect=true" class="btn btn-block btn-social btn-twitter">
                <i class="fa fa-twitter"></i>
                Sign in with Twitter
              </a>';
              //exit;
          }
          else
          {   

              echo 'okay yore logged in ';


              // $api_query_dm =array("count" => '1');
              // // $api_query_dm =array("count" => '2');
              // $method = 'direct_messages';
              // $direct_messages =   $connection->get($method, $api_query_dm);


              // GET SENT
              $api_query_dm =array("count" => '100');
              $method = 'direct_messages/sent';
              $direct_messages =   $connection->get($method, $api_query_dm);
              foreach ($direct_messages as $key => $value) {
                $messages[$value->recipient_screen_name]['sent'][] = $value->text;
              }



              // GET INCOMING
              $api_query_dm =array("count" => '100');
              $method = 'direct_messages';
              $direct_messages =   $connection->get($method, $api_query_dm);
              echo '<pre>';

              // var_dump($direct_messages->);
              // exit;
              foreach ($direct_messages as $key => $value) {
                $messages[$value->sender_screen_name]['recieved'][] = $value->text;
              }


              echo '<pre>';
              // var_dump($direct_messages[0]->recipient_screen_name);
              var_dump($messages);
              exit;
              // 

          } 

        ?>
    </div>
</div>


