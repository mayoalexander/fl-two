<?php

  print_r($connectionRequest);


        // --- SENDING OUT MASS MESSAGES ----- // 
        $i=1;
        $already_tweeted_to = array("0");
        if (isset($connectionRequest)){
          foreach ($connectionRequest->statuses as $twitter_user_data) {
                  //$twitter_user_data = $connectionRequest->users[$i]->screen_name;
                  $user_twitter_name = $twitter_user_data->user->screen_name;
                  //echo $i.' ['.$user_twitter_name.']<hr>';
                  if ($_GET['som']==1 && $_GET['q']) { // RUN MASS SENDOUT
                    if (in_array($user_twitter_name, $already_tweeted_to)) {
                      // dont tweet out!
                    } else {
                      // --- SINCE WE HAVENT ALREADY, TWEET IT OUT TO THEM!! --- ///
                      $already_tweeted_to[$i] = $user_twitter_name;
                      //print_r($already_tweeted_to);
                      // ------ SEND SOM ---- //
                      $som_tweet_to_send = urlencode($send_out_message);
                      //$user_twitter_name = 'siralexmayo';
                      $link_to_tweet    = 'http://freelabel.net/som/index.php?post=1&t='.$user_twitter_name.'&text=@'.$user_twitter_name.'%20'.$som_tweet_to_send;
                      //$link_to_tweet    = 'http://freelabel.net/som/index.php?dm=1&t='.$user_twitter_name.'&text=%20'.$som_tweet_to_send;
                      $timeOutTime = (200 * $i);
                      $content_SOM .= '
                      <script>
                      function execSOM(linkToTweet) {
                        window.open(linkToTweet); //
                      }
                      setTimeout( function () { execSOM("'.$link_to_tweet.'"); }  , '.$timeOutTime.');
                      </script>';
                    }
                  }
                  // ------ END SEND SOM ---- //
                 
                  //echo '<script>sendDirectMessage('.$twitter_id_num.' , "'.$sendDirectMessage.'");</script>';
                  $i++;
                }}
                