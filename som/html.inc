<?php
$page_title   =     $_SERVER['REMOTE_ADDR'];
//include('../new_header.php');

?>
<style type="text/css">

html, body {
  background-color:#101010;
  color:lightgreen;
}

.panel p {
  color:#303030;
}
#share_options {
  width:80%;
  background-color: red;
  height:400px;
  vertical-align: middle;
  text-align: center;
}
#share_options div {
  width:33%;
  margin:0px;
  background-color: #e3e3e3;
  display:inline-block;
  color:#303030;
  transition: height 1s;
}
#somOptionsBlock a {
  display: inline-block;
}
.slow_open {
  transition: height 1s;
}
.slow_open:hover {
  height:300px;
}
.som-item {
  margin-bottom:2%;
}

#twitter_block, #facebook_block, #tumblr_block, .slow_open {
  transition: height 2s, opacity 1s;
}
#som_password_input {
  width: 30%;
  margin:auto;
  text-align: center;
}

 </style>

<script>
function sendDirectMessage(twitter_id_num , directMessageText) {
  var path = 'http://freelabel.net/som/index.php';
  $.get(path , {
    dm : 1, 
    t : twitter_id_num, 
    text : directMessageText
  }).done(function(data){
    console.log('okay: ' + twitter_id_num + data);
    $('#connection_results').html(data);
  });
}
</script>

    <div>
      <hr /><hr>
      <?php if (isset($menu)) { ?>
        <?php echo $menu; ?>
      <?php } ?>
    </div>
        




        <div class="row">
          <div class="col-xs-12 col-md-8">
          <h1>Connection Results</h1>
              <p id='`'>
                <?php 
                  if (isset($status_text)) {
                    echo  '<h1 class="label label-warning" >STATUS TEXT: '.$status_text.'</h1>';
                  }  
                  ?>

                  <?php 
                  // -------------------- REPLY TO ALL DMS -------------------------- //
                  /*$i=1;
                  if ($_GET['som']=='findfriends' && $_GET['q']==7) {
                    foreach ($connectionRequest->users as $userData) {
                      $twittername = $userData->screen_name;
                      $twitterphoto = $userData->profile_image_url_https;
                      if($userData->following == 1) {$twitterfollowback='true';}else{$twitterfollowback='false';};
                      echo $i.'] <img src="'.$twitterphoto.'" height="45px"> - @'.$twittername.' - '.$twitterfollowback.'<br>';
                      echo '
                      <script>
                      setTimeout(
                        shareTwitter("Let us know when you upload to FREELABEL .net! What are you focused on showcasing in the Radio/Mag? Interviews, singles, Project Releases?" , "'.$twittername.'") 
                        , (4000 * '.$i.'));
                      </script>';
                      $i++;
                    }
                  }
                  // -------------------- REPLY TO ALL DMS -------------------------- //

                  // -------------------- SEND OUT MESSAGES -------------------------- //
                  $i=1;
                  if ($_GET['som']=='1' && isset($_GET['q'])) {
                  //print_r($connectionRequest);

                    foreach ($connectionRequest->statuses as $userData) {
                      $twittername = $userData->user->screen_name;
                      $twitterphoto = $userData->profile_image_url_https;
                      if($userData->following == 1) {$twitterfollowback='true';}else{$twitterfollowback='false';};
                      echo $i.'] <img src="'.$twitterphoto.'" height="45px"> - @'.$twittername.' - '.$twitterfollowback.'<br>';
                      /*echo '
                      <script>
                      setTimeout(
                        alert("whats the deal: '.$i.'");
                        , (4000 * '.$i.'));
                      </script>';
                      $i++;
                    }
                  }*/
                  // -------------------- SEND OUT MESSAGES -------------------------- //

                  ?>

              </p>
            </div>
          <div class="col-xs-6 col-md-4">
            <h1>Content</h1>
              <p>

                  <?php 

                  if ($_GET['som']) {
                    echo 'aye look';
                    include('auto_tweeter.php');
                  }
                  print_r($content_SOM);
                  print_r($connectionRequest);

                  //if ($_GET['clockin']===1) {
                   //echo '<script>setTimeout(function() { sendEmail("notifications@freelabel.net", "Admin Clocked In for ['.date('l, F j, Y').']!", "We are now clocked in @ '.date('l F j Y @ h:i:s A').'", "#main_content" , "admin" , ""); },1000);</script>';
                  //}
                  ?>

              </p>
          </div>
        </div>
    
    <hr>
    




<script type="text/javascript">
  function windowClose() {
    var twitter_api_window = window.close();
  }
  <?php
  // ----- CLOSE WINDOW --- //
  if (isset($_GET["stayopen"])==false) {
    echo 'setTimeout(function() { windowClose(); },15000);';
  } ?>
//var twitter_api_window = window.open('http://freelabel.net/som/redirect.php');
function runCheck(){
    if (twitter_api_window) {
      alert('window opened!');
    } else {
      alert('window closed');
    }
}
</script>

<?php 
//include('../new_footer.php')
?>