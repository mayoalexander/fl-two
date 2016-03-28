<?php
print_r($_GET);
exit;
 if($_GET['recent']){
	 $todays_date = date('Y-m');
	 /* `user_name` NOT LIKE '%submission%'
           AND `user_name` NOT LIKE '%admin%'
           AND `type` LIKE '%single%'
           /*`user_name` NOT LIKE '%submission%'
           AND `user_name` LIKE '%admin%'
           AND `type` LIKE '%single%'
           AND `twitpic` LIKE '%pic.twit%'
           OR  */ 
          INCLUDE("../inc/connection.php");

if ($_GET['cat']=='mainstream') {
    $query = "SELECT * 
FROM  `feed` 
WHERE `user_name` NOT LIKE '%admin%'
LIMIT 0 , 0";
} elseif($_GET['cat']=='all') {
  $query = "SELECT * FROM  `feed` WHERE `user_name` LIKE '%admin%' ORDER BY `id` DESC LIMIT 0 , 60";
} elseif($_GET['cat']=='clients') {
  $query = "SELECT * FROM  `feed` WHERE `user_name` NOT LIKE '%admin%' ORDER BY `id` DESC LIMIT 0 , 60";
} else {
  $query = "SELECT * FROM  `feed` WHERE `user_name`  NOT LIKE '%admin%' ORDER BY `id` OR `user_name` LIKE '%admin%' LIMIT 0 , 60";
}
    echo '<h1>Query:'.$query.'</h1>';
           $result = mysqli_query($con,$query);
           $i=1;
           while($row = mysqli_fetch_array($result))
           {
             $twitter = $row['twitter'];
             $title = $row['blogtitle'];
             $title_explode = explode(' ', $title);
             
             
 
             if ($row['type']=='single') {
               $title = $row['blogtitle'];
               //$title = explode(' ', $title);
               $twitter_explode = explode(' ', $twitter);
             } else {
				 $post_title_array = explode(' ', $title);
         //print_r($blogtitle);
			 }
 
             if ($title_explode[0] == '[VIDEO]'
                 OR $title_explode[0] == '[SINGLE]'
                 OR $title_explode[0] == '[ALBUM'
                 OR $title_explode[0] == '[INTERVIEW]'
                 OR $title_explode[0] == '[EXCLUSIVE]'
                 ) {
                 if ($title_explode[0] == '[ALBUM') {
                   $post_title_short = $title_explode[2];
                 }else{
                   $post_title_short = $title_explode[1];
                 }
               } else {
                 $post_title_short = $title_explode[0];
               }
			   
			   
			   
               $link_to_post = $page_url = 'FREELA.BE/L/'.$twitter.'/'.$post_title_short;
 
 $posts_to_tweet[$i] = "#FLMAG | ".$twitter."
 
 " .$title."
 
 " .$link_to_post."
 
 ".trim($row['twitpic']);
             $i++;
           }
 }

if ($_POST['organic'] || $_GET['organic']) {

          INCLUDE("../inc/connection.php");
          $todays_date = date('Y');
          $query = "SELECT * FROM templates 
          WHERE date_created LIKE '$todays_date%'
          ORDER BY `id` DESC";
          $result = mysqli_query($con,$query);
          while($row = mysqli_fetch_array($result))
          {
            //print_r($row);
            $text = $row['text'];
            $post_id = $row['id'];
            $posts_to_tweet[] = $text;
          }

} // end of organic


if ($_POST['live'] || $_GET['live']) {

          INCLUDE("../inc/connection.php");
          $todays_date = date('Y-m-d');
          $query = "SELECT * FROM templates 
          WHERE date_created LIKE '$todays_date%'
          ORDER BY `id` DESC";
          $result = mysqli_query($con,$query);
          while($row = mysqli_fetch_array($result))
          {
            //print_r($row);
            $text = $row['text'];
            $post_id = $row['id'];
            $posts_to_tweet[] = $text;
          }

} // end of organic

            print_r($tweets_to_tweet);












        shuffle($posts_to_tweet);
        //print_r($posts_to_tweet);
        $already_tweeted = array("0");
        $i=1;
        echo "<h1>CAMPAIGNS</h1>";
        echo '<ul class="list-group" style="">';
        foreach ($posts_to_tweet as $tweet) {
                // $twitter_user_data = $connectionRequest->users[$i]->screen_name;
                // $user_twitter_name = $twitter_user_data->user->screen_name;
                  echo '
                        <li class="list-group-item som-item">
                          <span class="badge">'.$i.'</span>
                          '.$tweet.'
                        </li>
                      ';
                  //echo $i.' ["'.$tweet.'"]<hr>';
                  if ($_GET['som']==1) { // RUN MASS SENDOUT
                    if (in_array($tweet, $already_tweeted)) {
                      // // Don't Tweet Out!
                    } else {
                      $already_tweeted[$i] = $tweet;
                      $som_tweet_to_send = urlencode($tweet);
                      $link_to_tweet    = 'http://freelabel.net/som/index.php?post=1&t='.$user_twitter_name.'&text='.$som_tweet_to_send;
                      //$link_to_tweet  = 'http://freelabel.net/som/index.php?dm=1&t='.$user_twitter_name.'&text=%20'.$som_tweet_to_send;
                      $timeOutTime = (8000 *  $i); 
                      if ($_GET['stayopen']==1) {
                        // SLOW - POST TWEET EVERY 2 MINUTES (30 Tweets/Hour)
                        //$timeOutTime = ((60000 * 2) * $i);
                        if(isset($_GET['mins'])==false) {$mins=1;} else {$mins=$_GET['mins'];}
                        $timeOutTime = ((60000 * $mins) * $i);
                      }
                      echo '<script>console.log('.$timeOutTime.');</script>';
                      $content_SOM .= '<script>
                      function execAutoPromote(linkToTweet) {
                        window.open(linkToTweet);
                        alert("sending tweet!");
                        $.post(linkToTweet,'',function(){
                          alert("Okay it successfully sent!");
                        });
                        console.log(linkToTweet);
                      }
                      setTimeout( function () { execAutoPromote("'.$link_to_tweet.'"); }  , '.$timeOutTime.');
                      </script>';
                    }
                  }
                  // ------ END SEND SOM ---- //
                  //echo '<script>sendDirectMessage('.$twitter_id_num.' , "'.$sendDirectMessage.'");</script>';
                  $i++;
                } 
                echo '</ul>';
                echo '<hr><label class="label label-warning">'.($i-1).' total tweets found!</label><hr><span id="status_text"></span>';
/*
if ($i===30 && $_GET['stayopen']==1) {
    $content_SOM .= '<script>';
    $content_SOM .= '$("#status_text").html("'.($i-1).' Posts " + "distributed over " + '.($timeOutTime / 60000).' + " minutes. Finish by: '.date('h:i:s A',strtotime('+ '.($timeOutTime / 60000).' minutes')).'");';
    $content_SOM .= 'setTimeout(function() { sendEmail("notifications@freelabel.net", "Admin Clocked OUT for ['.date('l, F j, Y').']!", "We are now clocking OUT @ '.date('l F j Y @ h:i:s A').'", "#main_content" , "admin" , ""); }, '.($timeOutTime - 60000).');';
    $content_SOM .= '</script>';
}
*/
?>