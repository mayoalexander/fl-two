<div class="row">
        <?php
        if (empty($_SESSION['access_token']) || empty($_SESSION['access_token']['oauth_token']) || empty($_SESSION['access_token']['oauth_token_secret'])) {
            echo '<a href="twitter/index.php?redirect=true"><img src="twitter/images/lighter.png" alt="Sign in with Twitter"/></a>';
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
            echo '<a onclick="$(\'#som_buttons\').slideToggle();" class="btn btn-primary btn-xs">Start SOM</a>';
            echo "<a class='btn btn-danger btn-xs' href='twitter/destroysessions.php'>Logout of Twitter</a>
            <hr>";
        } 
                  echo '<div class="overflow_div" style="display:inline-block;width:32%;">';
                    //print_r($twitter_followers);
                    /*foreach ($tweets['followers/list'] as $tweet) {
                      echo $tweet;
                    };*/
                    foreach ($tweets['direct_messages'] as $conversation) {
                      echo "<div class='panel panel-body'>";
                        //print_r($conversation);
                        foreach ($conversation as $message) {
                          echo $message;
                        }
                      echo '</div>';
                    };


                  echo '</div>';











                    echo '<section class="overflow_div panel panel-body" style="display:inline-block;width:32%;">';
                    //print_r($twitter_followers);
                    /*foreach ($tweets['followers/list'] as $tweet) {
                      echo $tweet;
                    };*/
                    foreach ($tweets['direct_messages'] as $conversation) {
                        //print_r($conversation);
                        foreach ($conversation as $message) {
                          echo $message;
                        }
                    };
                    echo "</section>";



                  echo '<section class="overflow_div" style="display:inline-block;width:32%;">';
                  echo '<h3>Home</h3>';
                  foreach ($user_timeline as $status) {
                    $time_since_posted = ((time() - strtotime($status->created_at)) / 60);
                    $time_since_posted = substr($time_since_posted, 0,2);
                    //$date = date( 'm-d h:i:s' , strtotime($status->created_at));
                    $text = $status->text;
                    echo $time_since_posted.' - '.$text.'<hr>';
                  }
                  echo '</section>';
        ?>
</div>