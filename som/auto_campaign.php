<?php
          INCLUDE("../inc/connection.php");
          $query = "SELECT * FROM templates 
          ORDER BY `id` DESC LIMIT ".rand(0,15)." , 30";
          $result = mysqli_query($con,$query);
          $i=1;
          while($row = mysqli_fetch_array($result))
          {
            $text = $row['text'];
            $post_id = $row['id'];
            //$link_to_post = str_replace(' ', '%20', $row['blog_story_url']);
$tweets_to_tweet[$i] = $text;
            $i++;
          }

          //print_r($posts_to_tweet);
        $already_tweeted = array("0");
        $i=1;
        echo "<h1>TEMPLATES</h1>";
        echo '<ul class="list-group" style="height:450px;overflow-y:scroll;color:#303030;">';
        foreach ($tweets_to_tweet as $tweet) {
                  //$twitter_user_data = $connectionRequest->users[$i]->screen_name;
                  //$user_twitter_name = $twitter_user_data->user->screen_name;
                  //echo $i.' ["'.$tweet.'"]<hr>';
                  echo '
                        <li class="list-group-item">
                          <span class="badge">'.$i.'</span>
                          '.$tweet.'
                        </li>
                      ';
                  if ($_GET['som']==1) { // RUN MASS SENDOUT
                    if (in_array($tweet, $already_tweeted)) {
                      // dont tweet out!
                    } else {
                      // --- SINCE WE HAVENT ALREADY, TWEET IT OUT TO THEM!! --- ///
                      $already_tweeted[$i] = $tweet;
                      //print_r($already_tweeted);
                      // ------ SEND SOM ---- //
                      $som_tweet_to_send = urlencode($tweet);
                      //$user_twitter_name = 'siralexmayo';
                      $link_to_tweet    = 'http://freelabel.net/som/index.php?post=1&text='.$som_tweet_to_send;
                      //$link_to_tweet    = 'http://freelabel.net/som/index.php?dm=1&t='.$user_twitter_name.'&text=%20'.$som_tweet_to_send;
                      $timeOutTime = (2000 *  $i); 
                      if ($_GET['stayopen']==1) {
                        // SLOW - POST TWEET EVERY 2 MINUTES (30 Tweets/Hour)
                        //$timeOutTime = ((60000 * 2) * $i);
                        if(isset($_GET['mins'])==false) {$mins=1;} else {$mins=$_GET['mins'];}
                        $timeOutTime = ((60000 * $mins) * $i);
                      }
                      $content_SOM .= '
                      <script>
                      function execAutoCampaign(linkToTweet) {
                        //window.open(linkToTweet); //
                        alert(linkToTweet); //
                      }
                      setTimeout( function () { execAutoCampaign("'.$link_to_tweet.'"); }  , '.$timeOutTime.');
                      </script>';
                    }
                  }
                  // ------ END SEND SOM ---- //
                 
                  //echo '<script>sendDirectMessage('.$twitter_id_num.' , "'.$sendDirectMessage.'");</script>';
                  $i++;
                } 
                echo '</ul>';
                echo '<hr>'.($i-1).' total tweets found! <hr><span id="status_text"></span>';

                
               




if ($_GET['stayopen']== 1) {
  $content_SOM .= '<script>';
  $content_SOM .= '$("#status_text").html("'.($i-1).' Posts " + "distributed over " + '.($timeOutTime / 60000).' + " minutes. Finish by: '.date('h:i:s A',strtotime('+ '.($timeOutTime / 60000).' minutes')).'");';
  $content_SOM .= 'setTimeout(function() { sendEmail("notifications@freelabel.net", "Admin Clocked OUT for ['.date('l, F j, Y').']!", "We are now clocking OUT @ '.date('l F j Y @ h:i:s A').'", "#main_content" , "admin" , ""); }, '.($timeOutTime - 60000).');';
  $content_SOM .= '</script>';
}



?>