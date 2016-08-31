<?php
//date_default_timezone_set('America/Chicago');
$page_url ='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];


$access_token['oauth_token'] = '1018532587-pZivWibRwTz1uXmUgWS9XfnQw3HidZ7bLJuwowD';
$access_token['oauth_token_secret'] = '9hc6heSLfF1CTKdAlpScQwiAor9iP0CVLKHz8VzGVmhCi';
$access_token['screen_name'] = 'FreeLabelNet';
$access_token['user_id'] = '1018532587';
$access_token['x_auth_expires'] = '0';
$_SESSION['access_token'] = $access_token;


if ($page_url == 'http://thebae.watch/') {
  define("ROOT", $_SERVER["DOCUMENT_ROOT"]. $_SERVER['REQUEST_URI']);
  define("__DIR__", $_SERVER["DOCUMENT_ROOT"]);

  define("SITE", 'http://thebae.watch/');
  define("SITE_NAME", 'THEBAE.WATCH');
  define("SITE_SHORT", 'thebae.watch');
  define("HTTP", ($_SERVER["SERVER_NAME"] == "localhost")
   ? "http://localhost:8888/"
   : "http://thebae.watch/"
   );
} else {
  define("ROOT", $_SERVER["DOCUMENT_ROOT"].$_SERVER['REQUEST_URI']);
  define("SITE", 'http://freelabel.net/');
  define("SITE_SHORT", 'FREELABEL.net');
  define("SITE_NAME", 'FREELABEL');
  define("HTTP", ($_SERVER["SERVER_NAME"] == "localhost")
   ? "http://localhost:8888". $_SERVER['REQUEST_URI']
   : "http://freelabel.net". $_SERVER['REQUEST_URI']
   );
}


/*  USER CREDENTIALS PROCESSING
* checks if users is logged in
*
*/

if (isset($_GET['logout'])){
  setcookie('FL_user_name', NULL);
  setcookie('FL_user_email', NULL);
  setcookie('FL_user_key', NULL );
  setcookie('user_logged_in', NULL );
  setcookie('FLUID', NULL );
  session_destroy();
  header('Location: ./');
}
if(isset($_GET['verify'])){
  $user_key = $_GET['verify'];
  setcookie('FL_user_key', $_GET['verify'] , (time()+86400*30) , "/" );
}
// ----------- PROCESS NEW VISITOR ------ //

/*if (isset($_COOKIE['FL_user_name']) && $_SESSION['user_name']=='') {
    $_SESSION['user_email'] = $_COOKIE['FL_user_email'];
    $_SESSION['user_name'] = $_COOKIE['FL_user_name'];
    $_SESSION['FL_user_key'] = $_COOKIE['FL_user_key'];
    $_SESSION['user_logged_in'] = true;
  } */
  if (isset($_SESSION['user_name'])==false) {
  //session_start();
  }

  if (isset($_SESSION['user_name']) OR isset($user_name_session)) {
    $user_name_session = $_SESSION['user_name'];
    $user_name = $_SESSION['user_name'];
    $auto_greeting = strtoupper("Hi, ".$_SESSION['user_name']); // onclick='showUser()'
    $login_status = 'CONTROLS';
    $navi_bar_options = "
    <a href='http://freelabel.net/' class='navi_left navi_title' onclick='showNav()' ><img src='http://freelabel.net/images/fllogo.png' style='height:36px;'></a>
    <a href='#' class='navi_middle navi_title'  onclick='openControls()' ><span class='glyphicon glyphicon-user' ></span> ".$login_status." </span></a>
    <a href='#' class='navi_middle navi_title'  onclick='window.open(\"http://freelabel.net/?ctrl=upload\")' ><span class='glyphicon glyphicon-cloud-upload' ></span> UPLOAD </span></a>
    <a href='#' class='navi_right navi_title' onclick='showSearch()' ><span class='glyphicon glyphicon-search' ></span> SEARCH</a>";
  } else {
    $login_status = 'Register';
    $navi_bar_options = "
    <a href='http://freelabel.net/' class='navi_left navi_title' onclick='showNav()' ><img src='http://freelabel.net/images/fllogo.png' style='height:36px;'></a>
    <a href='".HTTP."form/login/' class='navi_middle navi_title' ><span class='glyphicon glyphicon-user'></span> Login</a>
    <a href='".HTTP."form/register/' class='navi_middle navi_title' ><span class='glyphicon glyphicon-plus' ></span> ".$login_status."</span></a>
    <a href='http://upload.freelabel.net/' class='navi_middle navi_title'><span class='glyphicon glyphicon-cloud-upload'></span> Upload</a>
    ";
  }
  $login_status = strtoupper($login_status);

  if (isset($meta_tag_photo)==false){
    if (isset($blogtitle)) {
      $meta_tag_photo = HTTP .$photopath;
    } else {
      $meta_tag_photo = "http://freelabel.net/submit/uploads/20150213_22:08%20-@FREELABELNET.jpg";
    }
  }
  if (isset($blogtitle)==false && isset($page_title)) {
    $blogtitle = $page_title;
  }
  if (isset($blog_story_url) == false && isset($page_title)) {
    $blog_story_url = $page_title;
  }


  function get_timeago( $ptime )
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
      60                      =>  'minute',
      1                       =>  'second'
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


















































/**
* -------------- User Class -------------- //
*/
class User
{

  public function init($session='none', $cookie='none') {

    // check if if session exists,
    if (isset($session['user_name'])) {
      // set cookie to remember username
      setcookie("fl-user-name", $session['user_name'], time()+3600 *24*30);  /* expire in 30 days */
      setcookie("fl-user-email", $session['user_email'], time()+3600 *24*30);  /* expire in 30 days */
      setcookie("fl-user-id", $session['user_id'], time()+3600 *24*30);  /* expire in 30 days */
      //echo 'session is set';
    } elseif (isset($cookie['fl-user-name'])) {
      //$session['user_name'] = $cookie['fl-user-name'];
      $session['user_logged_in'] = 0;
      //$session['user_email'] = $cookie['fl-user-email'];
      //$session['user_id'] = $cookie['fl-user-id'];
      //echo 'cookie is set';
    } else {
      // set cookie data
      setcookie("fl-viewer-id", $this->generateRandomString(20), time()+3600 *24*30);  /* expire in 30 days */
      //setcookie("fl-viewer-id", $this->generateRandomString(10), time()+3600 *24*30);  /* expire in 30 days */
      //print_r($cookie);
      //echo '<hr>';
    }

    // check if cookie exists,


    //
    // if (isset($session)) {
    //   echo 'none';
    // }else {
    //  // echo 'something '.$session;
    //   //print_r($cookie);
    // }

    // save to global site variables
  if (isset($session['user_name']))
    {

      $user_data['session'] = $session['user_name'];
      $user_data['user_logged_in'] = $session['user_logged_in'];
      $user_data['cookie'] = $cookie['fl-user-name'];
      $user_data['name'] = $session['user_name'];
    } else {
      $user_data = FALSE;
    }
    return $user_data;
  }

  public function validateSession() {
    if (isset($_SESSION['user_name'])==false) {
      session_start();
      $_SESSION['user_name']='';
    }
  }

  public function verifySession() {
    // CHECK IF A RECENT USER, BY VERYFIYING IF SESSION OR RECENT COOKIE EXISTS
    session_start();
    if ($_SESSION['user_name']!='') {
      setcookie('FLUID',$_SESSION['user_name'],time() + (86400 * 30), "/");
    }elseif ($_COOKIE['user_logged_in']) {
      $_SESSION['user_name']= $_COOKIE['FLUID'];
    }else {
      // you cant show the person the view!!!
    }

    //print_r($_SESSION);
    //exit;
    if ($_SESSION['user_name']!='') {
      // IF RECENT USER, SET SESSION TO RECENT COOKIE
      if ($_COOKIE['FLUID']!='') {
        $_SESSION['user_name'] = $_COOKIE['FLUID'];
      }
      // CHECK IF RECENT USERS PROFILE ACTUALLY EXISTS IN DATABASE,
      include_once(ROOT.'inc/connection.php');
      $sql = "SELECT * FROM  `users` WHERE  `user_name` LIKE  '$_SESSION[user_name]' LIMIT 0 , 30";
      $result_stats = mysqli_query($con,$sql);
      if($row = mysqli_fetch_assoc($result_stats)) {
      // IF EXISTS, SET USER TO TRUE
       // $this->showView(true);
        $this->verifySession = true;
        return true;
      } else {
        $this->verifySession = false;

        return false;
        //$this->showView(false);
       // echo 'No username Assosicated<br>';
      }
      //echo $sql;
      //exit;
      print_r($this->verifySession );


      $this->saveCookies();
      //echo $this->verifySession;
      //$this->showView($this->verifySession);
    } else{
      // Brand New User, Show Registration View
      //echo 'Brand New User! Show Registration!';
      //include('sections/index.php');
      //$this->showView($this->verifySession);
    }
  }


  public function saveCookies() {
    $cookie_name = 'FLUID';
    $cookie_value = $_SESSION['user_name'];
    if ( $_COOKIE[$cookie_name]=='') {
      // if the user is logged in and,
      // the cookie is not saved to that user,
      // then save that user name into the cookies

      setcookie($cookie_name,$cookie_value,time() + (86400 * 30), "/");
      setcookie('user_logged_in',1,time() + (86400 * 30), "/");
      header('Location: index.php');
      $debug[] = 'now setting the session to : '.$cookie_name;
    } else {
      $debug[] = 'the cookie : "'.$cookie_name.'"  is set to "'. $_COOKIE[$cookie_name].'"!';
    }
    if(!isset($_COOKIE[$cookie_name])) {
      $debug[] = "Cookie named '" . $cookie_name . "' is not set!";
    } else {
      $debug[] = "Cookie '" . $cookie_name . "' is set!";
      $debug[] = "Value is: " . $_COOKIE[$cookie_name].' and the session is : '.$_SESSION['user_name'];
          //setcookie($cookie_name,NULL,time() + (86400 * 30), "/");
          //$debug[] = 'cookie is reset. reset='.$_COOKIE[$cookie_name];


    }
      //include_once('control/index.php');
      //exit;
  }
  public function getUserType($user_name) {
    $type = $user_name;
    include_once(ROOT.'inc/connection.php');
    $sql = "SELECT * FROM  `users` WHERE  `user_name` LIKE  '$user_name' LIMIT 1";
    $result_stats = mysqli_query($con,$sql);
    if($row = mysqli_fetch_assoc($result_stats)) {
    // IF EXISTS, SET USER TO TRUE
     // $this->showView(true);
      //$this->verifySession = true;
      $type = $row['account_type'];
    } else {
      $type = 'false';
    }
    return $type;
  }



  public function userExists($userNameToVerify) {
    include_once(ROOT.'inc/connection.php');
    $sql = "SELECT * FROM  `users` WHERE  `user_name` LIKE  '$userNameToVerify' LIMIT 1";
    $result_stats = mysqli_query($con,$sql);
    if($row = mysqli_fetch_assoc($result_stats)) {
    // IF EXISTS, SET USER TO TRUE
     // $this->showView(true);
      //$this->verifySession = true;
      return true;
    } else {
      return false;
    }

    //return true;
    /*echo 'Put in work';
    include_once(ROOT.'inc/connection.php');
      $sql = "SELECT * FROM  `users` WHERE  `user_name` LIKE  '$username' LIMIT 0 , 30";
      $result_stats = mysqli_query($con,$sql);
      if($row = mysqli_fetch_assoc($result_stats)) {
      // IF EXISTS, SET USER TO TRUE
       // $this->showView(true);
        $this->verifySession = true;
        return true;
      } else {
        $this->verifySession = false;
        return false;
        //$this->showView(false);
       // echo 'No username Assosicated<br>';
      }
      */
      //echo 'userExists';
    }

    public function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }


    public function showView($bool='homepage') {
      if ($bool===true) {
        include_once(ROOT.'control/index.php');
      } elseif($bool===false) {
      //include_once(ROOT.'mag/view/index.php');
        include_once(ROOT.'user/views/stream.php');
      } elseif ($bool ==='homepage') {
     //echo '<hr>';
        include_once(ROOT.'user/views/stream.php');
      //echo 'No View Set!';
      }
    }

    public function showTrending() {
      $filter = 'trending';
      $text_color = 'color:#e3e3e3;';
      include_once(ROOT.'top_posts.php');
    }
    public function checkIfUserActive($user_email) {
    //echo 'what the email: '.$email;
    //print_r($email);
    //exit;
      include_once(ROOT.'inc/connection.php');
      $sql = "SELECT * FROM  `users` WHERE  `user_email` LIKE  '$user_email' LIMIT 1";
      $result = mysqli_query($con,$sql);
      if ( $row = mysqli_fetch_assoc($result)) {
        $user_data = $row['user_active'];
        return $user_data;
      } else {
        return $user_data;
      }
    }


    public function saveToSubscribers($user_email , $reference) {

      include_once(ROOT.'inc/connection.php');
      $rand = rand(1111111111,9999999999);
      $sql = "INSERT INTO  `user_subscribers` (
        `id` ,
        `status` ,
        `type` ,
        `user_name` ,
        `email` ,
        `user_key` ,
        `reference` ,
        `date_created`
        )
      VALUES (
        NULL ,  '0',  'freetrial',  'none',  '$user_email',  '$rand', '$reference',
        CURRENT_TIMESTAMP
        )";
      $result = mysqli_query($con,$sql);
          //print_r($result);
      return $result;
    }






public function sendMail($emailToSendTo , $template='default') {

  include(ROOT.'mailer/PHPMailerAutoload.php');
  switch ($template) {
    case 'event-rsvp':
    $emailSubject = "You've on the RSVP Guest List!";
    $mail_message_body = '
    <html>
    <head>
    <link rel="stylesheet" type="text/css" href="http://freelabel.net/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="http://freelabel.net/bootstrap-3.3.4/dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="http://freelabel.net/bootstrap-3.3.4/dist/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="http://freelabel.net/css/bootstrap-social/bootstrap-social.css">
    <link rel="stylesheet" type="text/css" href="http://freelabel.net/css/style.css">
    </head>

    <body>
    <header>
    <img src="http://freelabel.net/images/fllogo.png" style="width:200px;display:block;margin:auto;">
    </header>
    <hr>
    <h1>You\'re On The List!</h1>
    <h3>You have been added to the RSVP list, stay tuned for a confirmation email regarding your entry to the event! <a href="http://freelabel.net/events/" class="btn btn-primary btn-success">View Now</a></h3>
    </body>
    <hr>
    <footer>
    FREELABEL Staff<br>
    info@freelabel.net<br>
    (347)-994-0267
    </footer>
    </html>';
    break;
    case 'new-registration':
    $emailSubject = 'Creating your FREELABEL Profile!';
    $mail_message_body = '
    <html>
    <head>
    <link rel="stylesheet" type="text/css" href="http://freelabel.net/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="http://freelabel.net/bootstrap-3.3.4/dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="http://freelabel.net/bootstrap-3.3.4/dist/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="http://freelabel.net/css/bootstrap-social/bootstrap-social.css">
    <link rel="stylesheet" type="text/css" href="http://freelabel.net/css/style.css">
    </head>

    <body>
    <header>
    <img src="http://freelabel.net/images/fllogo.png" style="width:200px;display:block;margin:auto;">
    </header>
    <hr>
    <h1>Creating Your Account</h1>
    <h3>Full Information regarding on how to create your account can be found here.. <a href="http://freelabel.net/product/compare/" class="btn btn-primary btn-success">View Now</a></h3>
    <p>For stats, booking single, project releases, or interviews, you will need to proceed with creating an account at FREELABEL. <a href="http://freelabel.net/" class="btn btn-primary btn-success">Create An Account</a></p>
    </body>
    <hr>
    <footer>
    FREELABEL Staff<br>
    info@freelabel.net<br>
    (347)-994-0267
    </footer>
    </html>';
    break;

    default:
        # code...
    break;
  }
  if ($template =='event-rsvp') {

  } else {

  }


    //Create a new PHPMailer instance
  $mail = new PHPMailer;
    // Set PHPMailer to use the sendmail transport
  $mail->isSendmail();
    //Set who the message is to be sent from
  $mail->setFrom('info@freelabel.net', 'FREELABEL NETWORKS');
    //Set an alternative reply-to address
  $mail->addReplyTo('replyto@freelabel.com', 'FREELABEL NETWORKS');
    //Set who the message is to be sent to
  $mail->addAddress($emailToSendTo, 'ARTIST: '.$twittername);
    //Set the subject line
  $mail->Subject = $emailSubject;
  $mail->AddBCC('notifications@freelabel.net', $name = "FL Staff");
    //Read an HTML message body from an external file, convert referenced images to embedded,
    //convert HTML into a basic plain-text alternative body
  $mail->msgHTML($mail_message_body);
    //Replace the plain text body with one created manually
  $mail->AltBody = 'This is a plain-text message body';
    //Attach the uploaded file
  $mail->addAttachment($trackmp3);

    //send the message, check for errors
  if (!$mail->send()) {
    $result=true;
    echo "Mailer Error: " . $mail->ErrorInfo;
  } else {
    $result=false;
        //echo "Message sent to ".$emailToSendTo;
  }
  return $result;


  } // end of send email method


}

























/**
* -------------- BLOG FEED Class -------------- //
*/
class Blog
{
  public function __construct($site='freelabel.net') {
    $this->site = $site;
    // $this->site = $this->getSiteData($site);
  }
  public function getSiteData($site_name='freelabel.net') {
    if (strpos($site_name, 'landing/')==true OR strpos($site_name, 'index.php')==true) {
      $site_name = str_replace('landing/', '', $site_name);
      $site_name = str_replace('index.php', '', $site_name);
    }
    switch ($site_name) {
      case 'freelabel.net' OR 'http://localhost:8888/':
        $site['name'] = 'FREELABEL';
        $site['author'] = '@mayoalexander';
        $site['keywords'] = 'Create, Discover, Share, Upload, freelabel, texas, music, promotion, streaming, radio stations, network';

        //$site['description'] = 'The Leaders In Innovative Online Showcasing';
        $site['description'] = 'Innovative Showcasing';
        // $site['description'] = 'Create, Discover, Share.';
        // $site['description'] = 'A Platform to Discover, Follow, and Share Immersive Music Experiences.';
        // $site['description'] = 'A Magazine + Radio + TV Platform built for Discovering, Following, and Sharing Immersive Music Experiences.';
        $site['description'] = 'A Streaming Magazine + Radio + TV Platform in one place.';
        // $site['description'] = "The new platform to release singles and engage fans with a beautiful digital format";
        $site['font-head'] = '"Oswald"';
        // $site['font-body'] = '"Abel"';
        $site['font-body'] = '"Open Sans Condensed"';
        // $site['font-head'] = '"Open Sans Condensed"';
        //$site['font-body'] = 'Create,  Discover, Share.';
        //$site['description'] = 'Discover, Create, Stream, Share.';

        // $site['landing-info'][] = 'A complete music experience packed with photos, videos, articles, and promos';
        // $site['landing-info'][] = 'Upload Music, Videos, and more to get distributed though Apple Music, Spotify, Tidal, Youtube, Soundcloud, and more';
        $site['landing-info'][] = 'Get New Releases Directly';
        $site['landing-info'][] = 'Stay up to date with exclusive content and singles, before the mass public. Your top trending stories will be tailored to what you listen to and search the most.';
        // $site['landing-info'][] = 'More than a social network, like Netflix, more progressive than a music website.';
        // $site['landing-info'][] = 'New Music Daily';
        $site['landing-info'][] = "Search, Browse, and Discover";
        $site['landing-info'][] = "Search for your favorites, find new music related to what you like, and find new music curated by us.";


        $site['landing-info'][] = "Easily and Quickly Distribute.";
        $site['landing-info'][] = "Keep 100% of your sales and revenue through the site. FREELABEL’s tools and services will help you along your journey to building your business.";
        $site['landing-info'][] = "Stand out from the crowd.";


        $site['landing-info'][] = "Create and Discover Playlists";
        $site['landing-info'][] = "FLDRIVE is FREE for all users, with unlimited storage, downloads, and sharing - no premium account required";
        //$site['landing-info'][] = "FL offers high-fidelity CD sound quality, high quality video, expertly curated content and editorial, and unique artists experiences.";
        $site['landing-info'][] = "Unlimited Streaming & Storage Free";


        $site['landing-info'][] = "Make an impression.";
        //$site['landing-info'][] = "Get heard by millions of important ears.";
        $site['landing-info'][] = "Songs that hit our trending section and charts will reach over 250,000 listeners each day, maximizing your reach and growing your fanbase with each release.";
        $site['landing-info'][] = "Share your music. Grow your fan base.";
        $site['landing-info'][] = "Find the music you love. Discover new tracks. Connect directly with your favorite artists.";
        //$site['landing-info'][] = "FLDRIVE is FREE for all users, with unlimited storage, downloads, and sharing - no premium account required";
        //$site['landing-info'][] = "Available for free to select artists and labels, AMP lets content owners monetize all streams";
        $site['landing-info'][] = "Advanced stats and content management.";
        //$site['landing-info'][] = "Our user dashboard shows advanced statistics for your content, including detailed information on where your music has been embedded, geographic data, and Social Media impact.";
        $site['landing-info'][] = "Join our successful independent artist roster.";
        $site['landing-info'][] = "Grow & Manage Your Career";
        $site['landing-info'][] = "";
        $site['landing-info'][] = "";
        $site['landing-info'][] = "";
        $site['landing-info'][] = "";
        $site['landing-info'][] = "";
        $site['landing-info'][] = "";
        $site['landing-info'][] = "";
        $site['landing-info'][] = "";
        $site['landing-info'][] = "";
        $site['landing-info']['twitter'] = "32,464";
        $site['landing-info']['facebook'] = "1,296";

        // ** signup instructions **/
        $site['landing-info']['instruction'][] = 'Choose our Account Type (Fanatic or Artist). Then start building your playlist and collections directly on your profile.';
        $site['landing-info']['instruction'][] = 'Your dashboard will allow you to book project releases, interviews, or showcases under the Events Tab.';
        $site['landing-info']['instruction'][] = 'Our teams of producers constantly provide events, music, content, and products directly from the artist and brands.';





        /* SALES */
        $site['landing-info']['why'][] = "<h3>#1) Get Paid To Share Your Art</h3>Get paid and have a place for all your videos & music in one place!";
        $site['landing-info']['why'][] = "<h3>#2) Showcase More Than Just Music</h3>Share Your Art, Get Exclusive Updates, New Music, and Video Releases 24/7. Place for all your videos & music in one place! Create promotions that consitst of ALL your work related to a specific goal.";
        $site['landing-info']['why'][] = "<h3>#3) Setup Goals and Track Your Progression</h3> Create promotions that consitst of ALL your work related to a specific goal.";
        $site['landing-info']['why'][] = "<h3>#4) Build A Organization as an Artist</h3>Handle business the correct way. Music is more independent than ever, and we provide creators with the tools and framework to create any type of entertainment business";

        $site['landing-info']['what'][] = "More than a social network, like Netflix, more progressive than the common music website/blogs. Connect your music & playlists with the world like you never have before. Distribute easily and quickly. Get a fair deal. Keeping 100% of your sales revenue. Your music career is more than just downloads and streams. FREELABEL's tools & services will set you apart from the crowd. Stand out from the crowd.";

        // $site['landing-info']['how'][] = "<h3>Build A Organization as an Artist</h3>Handle business the correct way. Music is more independent than ever, and we provide creators with the tools and framework to create any type of entertainment business";
        $site['landing-info']['how'][] = "More than a social network, like Netflix, more progressive than the common music website/blogs. Connect your music & playlists with the world like you never have before. Distribute easily and quickly. Get a fair deal. Keeping 100% of your sales revenue. Your music career is more than just downloads and streams. FREELABEL's tools & services will set you apart from the crowd. Stand out from the crowd.";

        $site['landing-info']['benefits'][] = "More than a social network, like Netflix, more progressive than the common music website/blogs. Connect your music & playlists with the world like you never have before. Distribute easily and quickly. Get a fair deal. Keeping 100% of your sales revenue. Your music career is more than just downloads and streams. FREELABEL's tools & services will set you apart from the crowd. Stand out from the crowd.";



        // videos
        $site['landing-info']['video'][] = "http://upload.freelabel.net/server/php/files/GOD%20OF%20HUSTLE%20TOUR%20RECAP%20PART%201.2webop.1.mp4";
        $site['landing-info']['video'][] = "http://freelabel.net/upload/server/php/files/Untitled%20Project.mp4";
        $site['landing-info']['video'][] = "http://freelabel.net/upload/server/php/files/december-promo.mp4";
        //$site['description'] = 'Innovative Showcasing';
        $site['bio'] = "FREELABEL is more than just a streaming Magazine + Radio + TV Network. We help you and millions of others discover new music & create better content than ever before! Just login account and start browsing.";
        $site['http'] = 'http://freelabel.net/';
        $site['logo'] = $this->getSiteLogo($site['http']);
        $site['domain'] = 'freelabel.net';
        $site['twitter'] = '@freelabelnet';
        $site['title'] = 'FREELABEL';
        $site['creator'] = 'admin';
        $site['primary-color'] = '#FE3F44';

        $site['pricing']['tour']['price'] = '$550';
        $site['pricing']['tour']['url'] = 'https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=S89WJV7T7Q4E8';

        break;

      case 'thebae.watch':
        $site['name'] = 'BAEWATCH';
        $site['description'] = 'The Leaders in Modeling ';
        $site['bio'] = 'We Bout 2 Turn Up';
        $site['logo'] = $this->getSiteLogo($site_name);
        $site['http'] = 'http://thebae.watch/';
        $site['domain'] = 'thebae.watch';
        $site['twitter'] = '@ilovebaewatch';
        $site['title'] = 'THEBAE.WATCH';
        $site['creator'] = 'chuk';
        $site['primary-color'] = '#FFB0FF';


        break;
      case 'amradiolive.com':
        $site['name'] = 'AMRadioLIVE';
        $site['description'] = 'The Leaders in Online Showcasing ';
        $site['bio'] = 'Tune in 24/7 for the best music ever!';
        $site['logo'] = $this->getSiteLogo($site_name);
        $site['http'] = 'http://amradiolive.com/';
        $site['twitter'] = '@amradiolive';
        $site['title'] = 'AMRADIOLIVE';
        $site['creator'] = 'amradiolive';
        $site['primary-color'] = '#FFD147';


        break;
      default:
        $site[] = 'There was an error.. (site name: '.$site_name.')';
    }

    return $site;
  }
  public function getSiteLogo($site) {
    if ($site == 'freelabel.net' OR $site == 'http://freelabel.net/' OR $site =='http://upload.freelabel.net/' OR $site =='http://freelabel.net/' OR $site =='http://freela.be/') {
      $logo = 'http://freelabel.net/upload/server/php/files/fllogo-favicon.png';
    } elseif ($site == 'http://amradiolive.com/' OR $site =='http://upload.amradiolive.com/' OR $site =='http://amradiolive.com/') {
      $logo = 'http://freelabel.net/images/amrlogo.png';
    } else {
      $logo = 'http://freelabel.net/upload/server/php/files/thebaewatch-ico%20%281%29.gif';
    }
    return $logo;
  }


  public function display_site_meta($site) {
    $res = '<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>'.$site['page_title'] .' | '. $site['name'].'</title>
        <meta name="description" content="'.$site['meta_tag_caption'].' // '.$site['description'].'" />
        <meta name="keywords" content="'.$site['keywords'].'" />
        <meta name="author" content="'.$site['author'].'" />
        <link rel="apple-touch-icon" sizes="57x57" href="'.$site['logo'].'">
        <link rel="apple-touch-icon" sizes="60x60" href="'.$site['logo'].'">
        <link rel="apple-touch-icon" sizes="72x72" href="'.$site['logo'].'">
        <link rel="apple-touch-icon" sizes="76x76" href="'.$site['logo'].'">
        <link rel="apple-touch-icon" sizes="114x114" href="'.$site['logo'].'">
        <link rel="apple-touch-icon" sizes="120x120" href="'.$site['logo'].'">
        <link rel="apple-touch-icon" sizes="144x144" href="'.$site['logo'].'">
        <link rel="apple-touch-icon" sizes="152x152" href="'.$site['logo'].'">
        <link rel="apple-touch-icon" sizes="180x180" href="'.$site['logo'].'">
        <link rel="icon" type="image/png" href="'.$site['logo'].'" sizes="32x32">
        <link rel="icon" type="image/png" href="'.$site['logo'].'" sizes="192x192">
        <link rel="icon" type="image/png" href="'.$site['logo'].'" sizes="96x96">
        <link rel="icon" type="image/png" href="'.$site['logo'].'" sizes="16x16">
        <link rel="manifest" href="http://freelabel.net/landio/img/favicon/manifest.json">
        <link rel="shortcut icon" href="'.$site['logo'].'">
        <meta name="msapplication-TileColor" content="#663fb5">
        <meta name="msapplication-TileImage" content="'.$site['logo'].'">
        <meta name="msapplication-config" content="http://freelabel.net/landio/img/favicon/browserconfig.xml">
        <meta name="theme-color" content="#663fb5">
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:site" content="@freelabelnet">
        <meta name="twitter:creator" content="@freelabelnet">
        <meta name="twitter:title" content="'.$site['meta_tag_title'].' // FREELABEL MAG + RADIO">
        <meta name="twitter:description" content="'.$site['meta_tag_caption'].' Login at FREELABEL.NET">
        <meta name="twitter:image" content="'.$site['meta_tag_photo'].'">';

    return $res;
  }


  function get_timeago( $ptime )
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
      60                      =>  'minute',
      1                       =>  'second'
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


  public function add_info_promo($table , $info) {

      include_once(ROOT.'inc/connection.php');

      // attach files 

      // foreach ($info['files'] as $file) {
        $files_attached = implode(', ', $info['files']);
      // }

      $rand = rand(1111111111,9999999999);
      $sql = "INSERT INTO  `$table` (
        `id` ,
        `title` ,
        `desc` ,
        `caption` ,
        `user_name` ,
        `promo_key` ,
        `files_attached` ,
        `image` ,
        `thumb` ,
        `type` ,
        `paypal_url` ,
        `start_date` ,
        `date_created`
        )
      VALUES (
        NULL ,  '".mysqli_real_escape_string($con,$info['title'])."',  '".mysqli_real_escape_string($con,$info['desc'])."',  '".mysqli_real_escape_string($con,$info['caption'])."',  '".$info['user_name']."', '".$info['promo_key']."', '$files_attached', '".$info['photo']."', '".$info['poster']."', '".$info['type']."', '".$info['paypal_url']."', '".$info['start_date']."',
        CURRENT_TIMESTAMP
        )";
      if ($result = mysqli_query($con,$sql)) {
        $res = 'It worked! :]';
      }
       else {
        $res = 'It Didnt Work!';
        print_r($sql);
       }
      return $res;
  }

  public function attach_files($file_id,$promo_id) {

    $promo_data = $this->get_info('images',$promo_id);
    // var_dump($file_id);
    // var_dump($promo_id);
    // var_dump($promo_data);
    $newstr = $promo_data['files_attached'] . ', '.$file_id;

    // add newstr into the new files_attached
    // $this->update_promo->;
    if ($this->update_promo('images','files_attached', $newstr , $promo_id)) {
      $res = "it worked!";
    } else {
      $res = "it didnt work !!!!";
    }

    return $res;
  }


    public function attach_files_to_promo($file_id,$promo_id) {

    $promo_data = $this->get_info('images',$promo_id);
    // var_dump($file_id);
    // var_dump($promo_id);
    // var_dump($promo_data);
    $newstr = $promo_data['files_attached'] . ', '.$file_id;

    // add newstr into the new files_attached
    // $this->update_promo->;
    if ($this->update_promo('images','files_attached', $newstr , $promo_id)) {
      $res = "It worked!";
    } else {
      $res = "it didnt work !!!!";
    }

    return $res;
  }




    public function add_info_files($table , $info) {

      include_once(ROOT.'inc/connection.php');

      // attach files 

      // foreach ($info['files'] as $file) {
        // $files_attached = implode(', ', $info['files']);
      // }

      $rand = rand(1111111111,9999999999);
      $sql = "INSERT INTO  `$table` (
        `id` ,
        `title` ,
        `user_name` ,
        `attached` ,
        `url` ,
        `src` ,
        `date_created`
        )
      VALUES (
        NULL ,  '".$info['title']."', '".$info['user_name']."', '$files_attached', '".$info['url']."', '".$info['src']."',
        CURRENT_TIMESTAMP
        )";
      if ($result = mysqli_query($con,$sql)) {
        $res = 'It worked! :]';
      }
       else {
        $res = 'It Didnt Work!';
        print_r($sql);
       }
      return $res;
  }



    public function add_message($table , $info) {




      include(ROOT.'inc/connection.php');

      // attach files 

      // foreach ($info['files'] as $file) {
        // $files_attached = implode(', ', $info['files']);
      // }

      $rand = rand(1111111111,9999999999);
      $sql = "INSERT INTO  `$table` (
        `id` ,
        `sender` ,
        `receiver` ,
        `message` ,
        `date_created`
        )
      VALUES (
        NULL ,  
        '".$info['sender']."', 
        '".$info['receiver']."', 
        '".mysqli_real_escape_string($con,$info['message'])."', 
        CURRENT_TIMESTAMP
        )";
      if ($result = mysqli_query($con,$sql)) {
        $res = 'It worked! :]';
      }
       else {
        $res = 'It Didnt Work!';
        print_r($sql);
       }
      return $res;
  }

  public function add_relationship($info) {

      include(ROOT.'inc/connection.php');

      // attach files 

      // foreach ($info['files'] as $file) {
        // $files_attached = implode(', ', $info['files']);
      // }

      $rand = rand(1111111111,9999999999);
      $sql = "INSERT INTO  `relationships` (
        `user_name` ,
        `following` ,
        `date_created`
        )
      VALUES (
        '".$info['user_name']."', 
        '".$info['following']."', 
        CURRENT_TIMESTAMP
        )";
      if ($result = mysqli_query($con,$sql)) {
        $res = 'Now Following!';
      }
       else {
        $res = 'It Didnt Work!';
        print_r($sql);
       }
      return $res;
  }






    public function add_info_photo($table , $info) {

      include(ROOT.'inc/connection.php');

      // attach files 

      // foreach ($info['files'] as $file) {
        // $files_attached = implode(', ', $info['files']);
      // }

      $rand = rand(1111111111,9999999999);
      $sql = "INSERT INTO  `$table` (
        `id` ,
        `title` ,
        `user_name` ,
        `attached` ,
        `url` ,
        `date_created`
        )
      VALUES (
        NULL ,  '".$info['title']."', '".$info['user_name']."', '$files_attached', '".$info['url']."',
        CURRENT_TIMESTAMP
        )";
      if ($result = mysqli_query($con,$sql)) {
        $res = 'It worked! :]';
      }
       else {
        $res = 'It Didnt Work!';
        print_r($sql);
       }
      return $res;
  }



  public function checkIfAlreadyFollowing($user_name , $following)
  {
      include(ROOT.'inc/connection.php');
      $query = "SELECT * FROM `relationships` WHERE `user_name`='$user_name' AND `following` = '$following' ORDER BY `id` DESC LIMIT 1";
      $result = mysqli_query($con,$query);
      // echo '<pre>';
      // var_dump($query);
      $info = $result->num_rows;
    return $info;
  }

  public function get_info($table , $id)
  {
      include(ROOT.'inc/connection.php');
      $query = "SELECT * FROM $table WHERE `id`=$id ORDER BY `id` DESC LIMIT 1";
      $result = mysqli_query($con,$query);
      if($row = mysqli_fetch_assoc($result)) {
        $info = $row;
      } else {
        echo 'there was an issue!';
        print_r($query);
      }
    return $info;
  }




  public function delete($table, $id='')
  {
    include(ROOT.'inc/connection.php');
    $deletequery = mysqli_query($con,"DELETE FROM `$table` WHERE `$table`.`id` = ".$id." LIMIT 1");
    if ($deletequery) {
      $res = true;
    } else {
      $res = false;
    }
    return $res;
  }

  public function update_promo($table,$col, $data, $id='')
  {
    include(ROOT.'inc/connection.php');
    $sql = "UPDATE `images` SET `files_attached`='$data' WHERE `images`.`id`='".$id."' LIMIT 1";
    $updatequery = mysqli_query($con,$sql);
    if ($updatequery) {
      $res = true;
    } else {
      $res = false;
    }
    // UPDATE  `images` SET  `files_attached` =  '503, 502, 501, 500' WHERE  `images`.`id` =2270 LIMIT 1 ;
    return $res;
  }




  public function updateLeadCount($lead_id='',$count)
  {
    include(ROOT.'inc/connection.php');
    $newcount = $count+1;
    // $sql = "UPDATE `leads` SET `count`='$newcount' WHERE `leads`.`lead_twitter`='".$lead_id."' LIMIT 1";
    $sql = "UPDATE  `leads` SET  `count` = $newcount WHERE  `leads`.`lead_twitter` ='$lead_id' ";
    $updatequery = mysqli_query($con,$sql);
    if ($updatequery) {
      $res = true;
    } else {
      $res = false;
    }
    // UPDATE  `images` SET  `files_attached` =  '503, 502, 501, 500' WHERE  `images`.`id` =2270 LIMIT 1 ;
    return $res;
  }



  public function update($table,$col, $data, $id='')
  {
    include(ROOT.'inc/connection.php');
    $sql = "UPDATE `$table` SET `$col`='$data' WHERE `$table`.`id`='".$id."' LIMIT 1";
    $updatequery = mysqli_query($con,$sql);
    if ($updatequery) {
      $res = true;
    } else {
      $res = false;
    }
    // UPDATE  `images` SET  `files_attached` =  '503, 502, 501, 500' WHERE  `images`.`id` =2270 LIMIT 1 ;
    return $res;
  }

  public function edit_promo($data, $id='')
  {
    include(ROOT.'inc/connection.php');

    $_POST['desc'] = mysqli_real_escape_string($con,$_POST['desc']);
    $_POST['caption'] = mysqli_real_escape_string($con,$_POST['caption']);
    $_POST['date'] = mysqli_real_escape_string($con,$_POST['date']);
    $_POST['title'] = mysqli_real_escape_string($con,$_POST['title']);
    $_POST['paypal_url'] = mysqli_real_escape_string($con,$_POST['paypal_url']);

    $sql = "UPDATE  `images` SET  `desc` =  '".$_POST['desc']."',
`caption` =  '".$_POST['caption']."',
`date` =  '".$_POST['date']."',
`paypal_url` =  '".$_POST['paypal_url']."',
`title` =  '".$_POST['title']."' WHERE `images`.`id` = ".$_POST['id']." LIMIT 1";


    $updatequery = mysqli_query($con,$sql);
    if ($updatequery) {
      $res = true;
    } else {
      $res = false;
    }
    print_r($res);
    // // UPDATE  `images` SET  `files_attached` =  '503, 502, 501, 500' WHERE  `images`.`id` =2270 LIMIT 1 ;
    return $res;
  }


  public function  update_stats($counts , $promo_id) {
    $new_counts = $counts+1;
    include(ROOT."inc/connection.php");
    $sql = "UPDATE  `images` SET  `stats` =  '$new_counts' WHERE  `images`.`id` = $promo_id LIMIT 1 ;";
    if ($update_count = mysqli_query($con,$sql)) {
      $debug[] = 'Updated!!!: '.$sql;
    } else {
      $debug[] = 'SOMETHING WITH UPDATING THE QUERY DIDNT WORK!';
    };
    return $debug;
  }


  public function delete_promo_file($table, $id='')
  {
    include_once(ROOT.'inc/connection.php');
    $deletequery = mysqli_query($con,"DELETE FROM `$table` WHERE `$table`.`id` = ".$id." LIMIT 1");
    if ($deletequery) {
      $res = true;
    } else {
      $res = false;
    }
    return $res;
  }

    public function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }



  public function getPosts($page=0, $limit=24, $feed_filter=false, $site=false) {
    $db_start = $page * $limit;
    if ($feed_filter!=false) {
      //$f = "AND `type` LIKE '%'".$feed_filter."'%' ";
     // $f .= "OR `user_name` LIKE 'admin' AND `blogtitle` LIKE '%'".$feed_filter."'%' ";
      $f = ''.$feed_filter;
    }elseif($site!=false) {
      if ($site=='http://thebae.watch/') {
        $f = "WHERE `user_name` LIKE '%chuk%' ";
      } else {
        $f = "WHERE `user_name` LIKE 'admin' ";
      }
    } else {
      $f = '';
    }
    //echo ' 1) .'.$feed_filter. ' - '.$site.'<hr>';
    include(ROOT.'inc/connection.php');
      //echo '<pre>';
    $sql = "SELECT * FROM `feed` $f ORDER BY `id` DESC LIMIT $db_start , $limit";
    $result_stats = mysqli_query($con,$sql);
    $i=0;
      //print_r($sql);
    while($row = mysqli_fetch_assoc($result_stats)) {

      $blog[] = $row;
        //echo '<hr>';
    }
    return $blog;

  }

  public function getPostSearch($query=NULL) {
    // VERIFY ISSET
    if ($query!==NULL) {

      // PREP VARIABLES
      $query = trim($query);
      include(ROOT.'inc/connection.php');

      $sql = "SELECT * FROM  `feed`
        WHERE  `user_name` LIKE  '%$query%'
        OR  `blogtitle` LIKE  '%$query%'
        OR  `twitter` LIKE  '%$query%'
        OR  `tags` LIKE  '%$query%'
        ORDER BY `id` DESC LIMIT 50";

      // $sql = "SELECT * FROM feed 
      //   WHERE MATCH(blogtitle) AGAINST('$query')";
      // BUILD QUERY
      $result = mysqli_query($con,$sql);


      // RUN QUERY
      while ($row = mysqli_fetch_assoc($result)){
        $feed_posts[] = $row;
      }

      // VERIFY POSTS
      if (!isset($feed_posts)) {
        $feed_posts = NULL;
      }
    } else {
      $feed_posts = 'No Query Set!';
    }

    // GRAB GLOBAL FEED
    // $feed_posts = $this->getPostsByUser(0,50,'admin');
    // shuffle($feed_posts);
    if (isset($feed_posts)) {
        foreach ($feed_posts as $track_num => $meta) {
    
            if ($this->detect_type($meta['trackmp3'])=='mp3') {
    
              // build play button
              $play_button = '<a href="#" id="controls-'.$meta['id'].'" class="btn btn-default btn-xs btn-secondary-outline controls-play" data-src="'.$meta['trackmp3'].'" data-title="'.$meta['twitter'].' - '.$meta['blogtitle'].'" style="background-image:url(\''.$meta['photo'].'\');" ><i class="fa fa-play"></i></a>';
    
              // build article row
              $b .= '<panel class="row post-item" >';
                  $b .= '
                    <div class="seamless col-md-3 col-xs-12" >
                    '.$play_button.'
                    </div>';
                  $b .= '<div class="col-md-8 col-xs-8" >';
                  $b .= '<div class="controls-options-'.$meta['id'].'" style="display:none;">'.$this->getShareButtons($meta['id']).'</div>';
                  $b .= '<p class="post-text" >'.$this->display_title($meta,false).'
                  '.$this->getStatsByID($meta['id']).'
                  </p>';
                  $b .= '
                </div>
                <div class="col-md-1 col-xs-4 col-sm-6">
                  '.$this->display_controls($meta).'
                </div>
                
    
                ';
              $b .= '</panel>';
            } else {
    
              // build play button
              // $play_button = '<a href="#" id="controls-'.$meta['id'].'" class="btn btn-default btn-xs btn-secondary-outline controls-play" data-src="'.$meta['trackmp3'].'" data-title="'.$meta['twitter'].' - '.$meta['blogtitle'].'" style="background-image:url(\''.$meta['photo'].'\');" ><i class="fa fa-play"></i></a>';
              $play_button = '<div class="video-play-button"><i class="fa fa-play" ></i></div><video preload="metadata" src="'.$meta['trackmp3'].'" poster="'.$meta['photo'].'"></video>';
              // $play_button = '<video controls preload="metadata" src="'.$meta['photo'].'"></video>';
              // build article row
              $b .= '<panel class="row post-item" >';
                  $b .= '
                    <div class="seamless col-md-3 col-xs-12" >
                    '.$play_button.'
                    </div>';
                  $b .= '<div class="col-md-8 col-xs-12" >';
                  $b .= '<div class="controls-options-'.$meta['id'].'" style="display:none;">'.$this->getShareButtons($meta['id']).'</div>';
                  $b .= '<p class="post-text" >'.$this->display_title($meta,false).'
                  '.$this->getStatsByID($meta['twitter'], $meta['blogtitle']).'
                  </p>';
                  // $b .= $this->getStatsByTitle($meta['twitter'] , $meta['blogtitle']);
                  $b .= '
                </div>
                <div class="col-md-1">
                  '.$this->display_controls($meta,'user').'
                </div>
                
                ';
              $b .= '</panel>';
    
    
            } // IF END
          } // FOREACH END
        } else {
          echo 'No Results Found!';
        } // end if isset($feed_posts)

    return $b;
  }




  public function getPostFeatured($query=NULL) {
    // VERYFIY ISSET
    if ($query!==NULL) {

      // PREP VARIABLES
      $query = trim($query);
      include(ROOT.'inc/connection.php');

      // BUILD QUERY
      $sql = mysqli_query($con,"SELECT * FROM  `feed`
        WHERE  `user_name` LIKE  '%$query%'
        OR  `blogtitle` LIKE  '%$query%'
        OR  `twitter` LIKE  '%$query%'
        OR  `tags` LIKE  '%$query%'

        ORDER BY `id` DESC LIMIT 50");

      // RUN QUERY
      while ($row = mysqli_fetch_assoc($sql)){
        $feed_posts[] = $row;
      }

      // VERIFY POSTS
      if (!isset($feed_posts)) {
        $feed_posts = NULL;
      }
    } else {
      $feed_posts = 'No Query Set!';
    }

    // GRAB GLOBAL FEED
    // $feed_posts = $this->getPostsByUser(0,50,'admin');
    // shuffle($feed_posts);
    foreach ($feed_posts as $track_num => $meta) {

    if ($this->detect_type($meta['trackmp3'])=='mp3') {

      // build play button
      $play_button = '<a href="#" id="controls-'.$meta['id'].'" class="btn btn-default btn-xs btn-secondary-outline controls-play" data-src="'.$meta['trackmp3'].'" data-title="'.$meta['twitter'].' - '.$meta['blogtitle'].'" style="background-image:url(\''.$meta['photo'].'\');" ><i class="fa fa-play"></i></a>';

      // build article row
      $posts_panel .= '<section class="section-news" style="padding-bottom:0;">
            <h3 class="sr-only">News</h3>
            <div class="bg-inverse">
              <div class="row">
                <div class="col-md-6 p-r-0">
                  <figure class="has-light-mask m-b-0 image-effect">
                    <img src="'.$meta['photo'].'" alt="Article thumbnail" class="img-responsive">
                  </figure>
                </div>
                <div class="col-md-6 p-l-0">
                  <article class="center-block">
                    <span class="label label-info">'.$meta['twitter'].'</span>
                    <br>
                    <h5><a href="'.$meta['blog_story_url'].'">'.$meta['blogtitle'].' <span class="icon-arrow-right"></span></a></h5>
                    <p class="m-b-0">
                      <a href="'.$meta['blog_story_url'].'"><span class="label label-default text-uppercase"><span class="icon-tag"></span> Design Studio</span></a>
                      <a href="'.$meta['blog_story_url'].'"><span class="label label-default text-uppercase"><span class="icon-time"></span> '.get_timeago(strtotime($meta['submission_date'])).'</span></a>
                    </p>
                  </article>
                </div>
              </div>
            </div>
        </section>';

    } else {
      // SKIP AND MOVE TO NEXT Post
      // ADD TO VIDEO ARRAY  // TO DO LATER
      ################
    } // IF END
  } // FOREACH END

    return $posts_panel;
  }






    public function getPostsRelatedGallery($query=NULL) {
      // VERYFIY ISSET
      if ($query!==NULL) {

        // PREP VARIABLES
        $query = trim($query);
        include(ROOT.'inc/connection.php');

        // BUILD QUERY
        $sql = mysqli_query($con,"SELECT * FROM  `feed`
          WHERE  `user_name` LIKE  '%$query%'
          OR  `blogtitle` LIKE  '%$query%'
          OR  `twitter` LIKE  '%$query%'
          OR  `tags` LIKE  '%$query%'

          ORDER BY `id` DESC LIMIT 50");

        // RUN QUERY
        while ($row = mysqli_fetch_assoc($sql)){
          $feed_posts[] = $row;
        }

        // VERIFY POSTS
        if (!isset($feed_posts)) {
          $feed_posts = NULL;
        }
      } else {
        $feed_posts = 'No Query Set!';
      }

      // GRAB GLOBAL FEED
      shuffle($feed_posts);

      $posts_panel .= '
      <div class="content">
        <h2>Related</h2>
        <div class="grid">';
      foreach ($feed_posts as $track_num => $meta) {

      if ($this->detect_type($meta['trackmp3'])=='mp3') {

        // build play button
        // $play_button = '<a href="#" id="controls-'.$meta['id'].'" class="btn btn-default btn-xs btn-secondary-outline controls-play" data-src="'.$meta['trackmp3'].'" data-title="'.$meta['twitter'].' - '.$meta['blogtitle'].'" style="background-image:url(\''.$meta['photo'].'\');" ><i class="fa fa-play"></i></a>';

        // build article row
        $posts_panel .= '

                    <figure class="effect-julia">
          						<img src="'.$meta['photo'].'" alt="'.$meta['blogtitle'].'">
          						<figcaption>
          							<h2>'.$meta['blogtitle'].' <span>//</span></h2>
          							<div>
                        <p>'.$meta['twitter'].'</p>
          							</div>
          							<a href="'.$meta['blog_story_url'].'#">View more</a>
          						</figcaption>
          					</figure>

        ';
      } else {
        // SKIP AND MOVE TO NEXT Post
        // ADD TO VIDEO ARRAY  // TO DO LATER
        ################z
      } // IF END
    } // FOREACH END
    $posts_panel .= '
      					</div>
        				</div>';

      return $posts_panel;
    }




  public function getUserMedia($user_name) {

    include(ROOT.'inc/connection.php');
    $result = mysqli_query($con,"SELECT * FROM  `feed` WHERE  `user_name` LIKE  '$user_name' ORDER BY `id` DESC LIMIT 10");
    while ($row = mysqli_fetch_assoc($result)){
      $user_media[] = $row;
    }
    if (!isset($user_media)) {
      $user_media = NULL;
    }
    return $user_media;
  }




  public function getPostsByUser($page=0, $limit=24, $user=false) {
    $db_start = $page * $limit;
    //echo ' 1) .'.$feed_filter. ' - '.$site.'<hr>';
    include(ROOT.'inc/connection.php');
      //echo '<pre>';
    $f='WHERE user_name = "'.$user.'" AND status = "public" ';
    $sql = "SELECT * FROM `feed` $f ORDER BY `id` DESC LIMIT $db_start , $limit";
    $result_stats = mysqli_query($con,$sql);
    $i=0;
      //print_r($sql);
    while($row = mysqli_fetch_assoc($result_stats)) {

      $blog[] = $row;
        //echo '<hr>';
    }
    if (!isset($blog)) {
      $blog = NULL;
    }
    return $blog;
  }


  public function getPostsBySearch($page=0, $limit=24, $query=false , $user=false) {

    $db_start = $page * $limit;
    //echo ' 1) .'.$feed_filter. ' - '.$site.'<hr>';
    include(ROOT.'inc/connection.php');
      //echo '<pre>';
    $f='WHERE blogtitle LIKE "%'.$query.'%" AND user_name = "'.$user.'" AND status="public" OR twitter LIKE "%'.$query.'%" AND user_name = "'.$user.'" AND status="public"';
    $sql = "SELECT * FROM `feed` $f ORDER BY `id` DESC LIMIT $db_start , $limit";
    $result_stats = mysqli_query($con,$sql);
    $i=0;
      // print_r($sql);
    while($row = mysqli_fetch_assoc($result_stats)) {

      $blog[] = $row;
        //echo '<hr>';
    }
    if (!$blog) {
      $blog = NULL;
    }
    return $blog;
  }


  public function getPostsBySearchPublic($page=0, $limit=24, $query=false , $user=false) {

    $db_start = $page * $limit;
    //echo ' 1) .'.$feed_filter. ' - '.$site.'<hr>';
    include(ROOT.'inc/connection.php');
      //echo '<pre>';
    $f='WHERE blogtitle LIKE "%'.$query.'%" AND status="public" OR twitter LIKE "%'.$query.'%" AND status="public"';
    $sql = "SELECT * FROM `feed` $f ORDER BY `id` DESC LIMIT $db_start , $limit";
    $result_stats = mysqli_query($con,$sql);
    $i=0;
      // var_dump($sql);
    while($row = mysqli_fetch_assoc($result_stats)) {

      $blog[] = $row;
        //echo '<hr>';
    }
    if (!$blog) {
      $blog = NULL;
    }
    return $blog;
  }


  public function getPostsByCategory($page=0, $limit=24, $query=false , $user=false) {

    $db_start = $page * $limit;
    //echo ' 1) .'.$feed_filter. ' - '.$site.'<hr>';
    include(ROOT.'inc/connection.php');
      //echo '<pre>';
    $f='WHERE writeup LIKE "%'.$query.'%" AND status="public" OR tags LIKE "%'.$query.'%" AND status="public"';
    $sql = "SELECT * FROM `feed` $f ORDER BY `id` DESC LIMIT $db_start , $limit";
    $result_stats = mysqli_query($con,$sql);
    $i=0;
      // var_dump($sql);
    while($row = mysqli_fetch_assoc($result_stats)) {

      $blog[] = $row;
        //echo '<hr>';
    }
    if (!$blog) {
      $blog = NULL;
    }
    return $blog;
  }


  public function getPostByID($post_id) {
    include(ROOT.'inc/connection.php');
    $f='WHERE id = "'.$post_id.'" ';
    $sql = "SELECT * FROM `feed` $f ORDER BY `id` DESC LIMIT 1";
    $result_stats = mysqli_query($con,$sql);
    $i=0;
      //print_r($sql);
    while($row = mysqli_fetch_assoc($result_stats)) {

      $blog[] = $row;
        //echo '<hr>';
    }
    if (!$blog) {
      $blog = NULL;
    }
    return $blog;
  }



  



  public function getProfilePhoto($user_name) {
    include(ROOT.'inc/connection.php');
    $result = mysqli_query($con,"SELECT * FROM user_profiles
      WHERE `id` = '$user_name'
      ORDER BY `id` DESC LIMIT 1");
    if ($row = mysqli_fetch_array($result)){
      $photo = $row['photo'];
    } else {
      $photo = 'No Profile Picture Uploaded!';
    }
    return $photo;
  }


  public function show_profile_img($user) {
    if (!$user['photo']=='') { 
      return $user['photo']; 
    } else { 
      return 'http://img.freelabel.net/noprofileimgset.png'; 
    }
  }




  public function get_user_tags($user_name, $current_tag=null) {
    // $user_photos = new Blog();
    $user_photos_arr = $this->getPhotosByUser($user_name, 100);
    $i=0;
    if ($user_photos_arr!='') {
      foreach ($user_photos_arr as $value) {

        $desc_tags = explode(',', $value['desc']);
        foreach ($desc_tags as $value) {
          $categories[$value] = 1;
        }

        $i++;
      }

      $upload_options = '<select class="filter-by-tag form-control" data-user="'.$user_name.'">';
      $upload_options .= '<option href="#clients" onclick="" class="btn btn-default btn-xs"><span class="fa fa-eye"></span>All</option>';
      foreach ($categories as $key => $album) {
        if ($key!='') {
          if ($current_tag == $key) {
            $selected = 'selected';
          } else {
            $selected = '';
          }
          $upload_options .= '<option '.$selected.'>'.$key.'</option>';
        }
      }
      $upload_options .= '</select>';

      // $upload_options .= '<a href="#clients" onclick="loadPage(\'http://freelabel.net/users/dashboard/promos/\', \'#main_display_panel #promos \', \''.$key.'\', \''.$user_name.'\')" class="btn btn-default btn-xs"><span class="fa fa-eye"></span> - All</a>';
      // foreach ($categories as $key => $album) {
      //   if ($key!='') {
      //     $upload_options .= '<a href="#clients" onclick="loadPage(\'http://freelabel.net/users/dashboard/promos/\', \'#main_display_panel #promos \', \''.$key.'\', \''.$user_name.'\')" class="btn btn-default btn-xs"><span class="fa fa-tag"></span> '.$key.'</a>';
      //   }
      // }
    }
    // $upload_options .='asdfaslkj';
    return $upload_options;
  }

  public function get_all_files($user_name, $page=0, $limit=24) {
    $db_start = $page * $limit;
    //echo ' 1) .'.$feed_filter. ' - '.$site.'<hr>';
    include(ROOT.'inc/connection.php');
      //echo '<pre>';
    $f='WHERE `user_name` = "'.$user_name.'" ';
    $sql = "SELECT id,blogtitle,twitter FROM `feed` $f ORDER BY `id` DESC LIMIT $db_start , $limit";
    $result_stats = mysqli_query($con,$sql);
    $i=0;
      // print_r($sql);
    while($row = mysqli_fetch_assoc($result_stats)) {

      $result[] = $row;
        //echo '<hr>';
    }
    if (!$result) {
      $result = NULL;
    }
    return $result;
  }



  public function display_dashboard_feed($user) {

    // GRAB GLOBAL FEED
    $feed_posts = $this->getPostsByUser(0,50,'admin');
    shuffle($feed_posts);
    foreach ($feed_posts as $track_num => $meta) {

    if ($this->detect_type($meta['trackmp3'])=='mp3') {

      // build play button
      $play_button = '<a href="#" id="controls-'.$meta['id'].'" class="btn btn-default btn-xs btn-secondary-outline controls-play" data-src="'.$meta['trackmp3'].'" data-title="'.$meta['twitter'].' - '.$meta['blogtitle'].'" style="background-image:url(\''.$meta['photo'].'\');" ><i class="fa fa-play"></i></a>';

      // build article row
      $b['feed'] .= '<panel class="row post-item" >';
          $b['feed'] .= '
            <div class="seamless col-md-3 col-xs-12" >
            '.$play_button.'
            </div>';
          $b['feed'] .= '<div class="col-md-8 col-xs-12" >';
          $b['feed'] .= '<div class="controls-options-'.$meta['id'].'" style="display:none;">'.$this->getShareButtons($meta['id']).'</div>';
          $b['feed'] .= '<p class="post-text" >'.$this->display_title($meta,false).'</p>';
          $b['feed'] .= '
        </div>
        <div class="col-md-1">'.$this->display_controls($meta).'</div>
        ';
      $b['feed'] .= '</panel>';
    } else {
      // SKIP AND MOVE TO NEXT Post
      // ADD TO VIDEO ARRAY  // TO DO LATER
      ################
    } // IF END
  } // FOREACH END


    // GRAB GLOBAL FEED
    $feed_posts = $this->getPostsByUser(0,50,$user['name']);

    shuffle($feed_posts);
    foreach ($feed_posts as $track_num => $meta) {

    if ($this->detect_type($meta['trackmp3'])=='mp3') {

      // build play button
      $play_button = '<a href="#" id="controls-'.$meta['id'].'" class="btn btn-default btn-xs btn-secondary-outline controls-play" data-src="'.$meta['trackmp3'].'" data-title="'.$meta['twitter'].' - '.$meta['blogtitle'].'" style="background-image:url(\''.$meta['photo'].'\');" ><i class="fa fa-play"></i></a>';

      // build article row
      $b['posts'] .= '<panel class="row post-item" >';
          $b['posts'] .= '
            <div class="seamless col-md-3 col-xs-12" >
            '.$play_button.'
            </div>';
          $b['posts'] .= '<div class="col-md-8 col-xs-12" >';
          $b['posts'] .= '<div class="controls-options-'.$meta['id'].'" style="display:none;">'.$this->getShareButtons($meta['id']).'</div>';
          $b['posts'] .= '<p class="post-text" >'.$this->display_title($meta,true).'</p>';
          $b['posts'] .= '
        </div>
        <div class="col-md-1">'.$this->display_controls($meta).'</div>
        ';
      $b['posts'] .= '</panel>';
    } else {
      // SKIP AND MOVE TO NEXT Post
      // ADD TO VIDEO ARRAY  // TO DO LATER
      ################
    } // IF END
  } // FOREACH END




    $result = $b;
    return $result;
  }


  public function display_public_feed() {
    $b['feed'] = '';
    $b['posts'] = '';
    $user['media'] = $this->getUserMedia('admin');
    if (isset($user['media'])) {
    // GRAB USER POSTS
      foreach ($user['media'] as $track_num => $meta) {
        $b['posts'] .= '<panel class="row post-item" >';

          $b['posts'] .= '<img class="post-image col-md-3 col-xs-12" src="'.$meta['photo'].'" >';
          $b['posts'] .= '<p class="post-text" >'.$meta['blogtitle'].' - '.$meta['twitter'].'</p>';
          // $b['posts'] .= '<audio src="'.$meta['trackmp3'].'" controls preload="metadata"></audio>';
          $b['posts'] .= '<br>
          <div class="dropdown">
            <button class="btn btn-default btn-xs btn-secondary-outline m-b-md"><i class="dropdown-toggle fa fa-share"></i> Options</button>
          </div>
          ';
        $b['posts'] .= '</panel>';
      }
    }


    // GRAB GLOBAL FEED
    $feed_posts = $this->getPostsByUser(0,20,'admin');
    shuffle($feed_posts);
    foreach ($feed_posts as $track_num => $meta) {
      $b['feed'] .= '<panel class="row post-item" >';
      if ($this->detect_type($meta['trackmp3']) == 'mp3') {
        $play_media_button = '<a href="#" id="controls-'.$meta['id'].'" class="btn btn-default btn-xs btn-secondary-outline controls-play" data-src="'.$meta['trackmp3'].'" data-title="'.$meta['twitter'].' - '.$meta['blogtitle'].'" style="background-image:url(\''.$meta['photo'].'\');" ><i class="fa fa-play"></i></a>';
      } else {
        $play_media_button ='' ;
        //$play_media_button =$meta['blogentry'] ;
      }



        $b['feed'] .= '
          <div class="seamless col-md-4 col-xs-12 media-container" >
          '.$play_media_button.'
          </div>';
        // $b['feed'] .= '<p class="post-text" >'.$meta['blogtitle'].' - '.$meta['twitter'].'</p>';
        //
          $b['feed'] .= '<div class="col-md-7 col-xs-12 " >';
          $b['feed'] .= '<div class="controls-options-'.$meta['id'].'" style="display:none;">'.$this->getShareButtons($meta['id']).'</div>';
          $b['feed'] .= '<p class="post-text" >'.$this->display_title($meta,false).'</p>';
          $b['feed'] .= '';
          // $b['feed'] .= '<audio src="'.$meta['trackmp3'].'" controls preload="metadata"></audio>';
          $b['feed'] .= '
        </div>
        <div class="col-md-1">'.$this->display_controls($meta).'</div>
        ';
      $b['feed'] .= '</panel>';
    }

    // GRAB FEED
    $feed_posts = $this->getPostsByUser(0,20,'admin');
    shuffle($feed_posts);
    foreach ($feed_posts as $track_num => $meta) {
      $b['posts'] .= '<panel class="row post-item" >';

        $b['posts'] .= '
          <div class="seamless col-md-3 col-xs-12" ><img class="post-image" src="'.$meta['photo'].'" ></div>';
        // $b['posts'] .= '<p class="post-text" >'.$meta['blogtitle'].' - '.$meta['twitter'].'</p>';
        //
          $b['posts'] .= '<div class="col-md-8 col-xs-12" >';
          $b['posts'] .= '<div class="controls-options-'.$meta['id'].'" style="display:none;">'.$this->getShareButtons($meta['id']).'</div>';
          $b['posts'] .= '<p class="post-text" >'.$this->display_title($meta).'</p>';
          $b['posts'] .= '<a href="#" id="controls-'.$meta['id'].'" class="btn btn-default btn-xs btn-secondary-outline controls-play" data-src="'.$meta['trackmp3'].'" ><i class="fa fa-play"></i></a>';
          // $b['posts'] .= '<audio src="'.$meta['trackmp3'].'" controls preload="metadata"></audio>';
          $b['posts'] .= '
        </div>
        <div class="col-md-1">'.$this->display_controls($meta).'</div>
        ';
      $b['posts'] .= '</panel>';
    }


    // GRAB TV
    $b['tv'] = '';
    $feed_posts = $this->getPosts(0,24,'video');
    foreach ($feed_posts as $track_num => $meta) {
      $b['tv'] .= '<panel class="row post-item" >';

        $b['tv'] .= '<img class="post-image col-md-3 col-xs-12" src="'.$meta['photo'].'" >';
        $b['tv'] .= '<p class="post-text" >'.$meta['blogtitle'].' - '.$meta['twitter'].'</p>';
        $b['tv'] .= '<audio src="'.$meta['trackmp3'].'" controls preload="metadata"></audio>';
        $b['tv'] .= '<br>
        <div class="dropdown">
          <button class="btn btn-default btn-xs btn-secondary-outline m-b-md"><i class="dropdown-toggle fa fa-share"></i> Options</button>
        </div>
        ';
      $b['tv'] .= '</panel>';
    }




    $result = $b;
    return $result;
  }



  public function get_user_posts($user_name, $limit=20) {
        // GRAB GLOBAL FEED
        $feed_posts = $this->getPostsByUser(0,$limit,$user_name);

        if (!$feed_posts==false) {
                // shuffle($feed_posts);
                foreach ($feed_posts as $track_num => $meta) {
                if ($this->detect_type($meta['trackmp3'])=='mp3') {

                  // build play button
                  $play_button = '<a href="#" id="controls-'.$meta['id'].'" class="btn btn-default btn-xs btn-secondary-outline controls-play" data-src="'.$meta['trackmp3'].'" data-title="'.$meta['twitter'].' - '.$meta['blogtitle'].'" style="background-image:url(\''.$meta['photo'].'\');" ><i class="fa fa-play"></i></a>';

                  // build article row
                  $b['posts'] .= '<panel class="row post-item" >';
                      $b['posts'] .= '
                        <div class="seamless col-md-3 col-xs-12" >
                        '.$play_button.'
                        </div>';
                      $b['posts'] .= '<div class="col-md-8 col-xs-12" >';
                      $b['posts'] .= '<div class="controls-options-'.$meta['id'].'" style="display:none;">'.$this->getShareButtons($meta['id']).'</div>';
                      $b['posts'] .= '<p class="post-text" >'.$this->display_title($meta,true).'</p>';
                      $b['posts'] .= '<span class="post-item-stats"><i class="fa fa-eye" ></i> '.$meta['views'].'</span>';// $b['posts'] .= $this->getStatsByTitle($meta['twitter'] , $meta['blogtitle']);
                      $b['posts'] .= '
                    </div>
                    <div class="col-md-1">'.$this->display_controls($meta,'user').'</div>
                    ';
                  $b['posts'] .= '</panel>';
                } else if ($this->detect_type($meta['trackmp3'])=='png' OR $this->detect_type($meta['trackmp3'])=='jpeg' OR $this->detect_type($meta['trackmp3'])=='jpg') {

                  // build play button
                  $play_button = '<img src="'.$meta['trackmp3'].'" poster="'.$meta['photo'].'">';
                  // build article row
                  $b['posts'] .= '<panel class="row post-item" >';
                      $b['posts'] .= '
                        <div class="seamless col-md-3 col-xs-12" >
                        '.$play_button.'
                        </div>';
                      $b['posts'] .= '<div class="col-md-8 col-xs-12" >';
                      $b['posts'] .= '<div class="controls-options-'.$meta['id'].'" style="display:none;">'.$this->getShareButtons($meta['id']).'</div>';
                      $b['posts'] .= '<p class="post-text" >'.$this->display_title($meta,true).'</p>';
                      $b['posts'] .= '<span class="post-item-stats"><i class="fa fa-eye" ></i> '.$meta['views'].'</span>';// $b['posts'] .= $this->getStatsByTitle($meta['twitter'] , $meta['blogtitle']);
                      $b['posts'] .= '
                    </div>
                    <div class="col-md-1">'.$this->display_controls($meta,'user').'</div>
                    ';
                  $b['posts'] .= '</panel>';

                } else if ($meta['filetype']=='image/jpeg') {

                  // build play button
                  $play_button = '<img src="'.$meta['trackmp3'].'" poster="'.$meta['photo'].'">';
                  // build article row
                  $b['posts'] .= '<panel class="row post-item" >';
                      $b['posts'] .= '
                        <div class="seamless col-md-3 col-xs-12" >
                        '.$play_button.'
                        </div>';
                      $b['posts'] .= '<div class="col-md-8 col-xs-12" >';
                      $b['posts'] .= '<div class="controls-options-'.$meta['id'].'" style="display:none;">'.$this->getShareButtons($meta['id']).'</div>';
                      $b['posts'] .= '<p class="post-text" >'.$this->display_title($meta,true).'</p>';
                      $b['posts'] .= '<span class="post-item-stats"><i class="fa fa-eye" ></i> '.$meta['views'].'</span>';// $b['posts'] .= $this->getStatsByTitle($meta['twitter'] , $meta['blogtitle']);
                      $b['posts'] .= '
                    </div>
                    <div class="col-md-1">'.$this->display_controls($meta,'user').'</div>
                    ';
                  $b['posts'] .= '</panel>';

                } else {

                  // build play button
                  // $play_button = '<a href="#" id="controls-'.$meta['id'].'" class="btn btn-default btn-xs btn-secondary-outline controls-play" data-src="'.$meta['trackmp3'].'" data-title="'.$meta['twitter'].' - '.$meta['blogtitle'].'" style="background-image:url(\''.$meta['photo'].'\');" ><i class="fa fa-play"></i></a>';
                  $play_button = '<video controls preload="metadata" src="'.$meta['trackmp3'].'" poster="'.$meta['photo'].'"></video>';
                  // build article row
                  $b['posts'] .= '<panel class="row post-item" >';
                      $b['posts'] .= '
                        <div class="seamless col-md-3 col-xs-12" >
                        '.$play_button.'
                        </div>';
                      $b['posts'] .= '<div class="col-md-8 col-xs-12" >';
                      $b['posts'] .= '<div class="controls-options-'.$meta['id'].'" style="display:none;">'.$this->getShareButtons($meta['id']).'</div>';
                      $b['posts'] .= '<p class="post-text" >'.$this->display_title($meta,true).'</p>';
                      $b['posts'] .= '<span class="post-item-stats"><i class="fa fa-eye" ></i> '.$meta['views'].'</span>';// $b['posts'] .= $this->getStatsByTitle($meta['twitter'] , $meta['blogtitle']);
                      $b['posts'] .= '
                    </div>
                    <div class="col-md-1">'.$this->display_controls($meta,'user').'</div>
                    ';
                  $b['posts'] .= '</panel>';
                } // IF END
              } // FOREACH END
        } else {
          $b['posts'] = '<div class="col-md-12" style="padding:5em 20em;">';
          $b['posts'] .= '<h2 class="text-warning">You have nothing uploaded to your profile!</h2>';
          $b['posts'] .= '<p class="text-muted">Click the "+ Add New" button at the top, or click the "Upload" button in the navigation menu to go to FLDRIVE where you can Drag & Drop files directly into your FREELABEL Profile.</p>';
          $b['posts'] .= '</div>';

        } 

      return $b;
  }


  public function get_user_posts_search($user,$query) {
        // GRAB GLOBAL FEED
        $feed_posts = $this->getPostsBySearch(0,200,$query, $user);

        if (!$feed_posts==false) {
                // shuffle($feed_posts);
                foreach ($feed_posts as $track_num => $meta) {
                if ($this->detect_type($meta['trackmp3'])=='mp3') {

                  // build play button
                  $play_button = '<a href="#" id="controls-'.$meta['id'].'" class="btn btn-default btn-xs btn-secondary-outline controls-play" data-src="'.$meta['trackmp3'].'" data-title="'.$meta['twitter'].' - '.$meta['blogtitle'].'" style="background-image:url(\''.$meta['photo'].'\');" ><i class="fa fa-play"></i></a>';

                  // build article row
                  $b['posts'] .= '<panel class="row post-item" >';
                      $b['posts'] .= '
                        <div class="seamless col-md-3 col-xs-12" >
                        '.$play_button.'
                        </div>';
                      $b['posts'] .= '<div class="col-md-8 col-xs-12" >';
                      $b['posts'] .= '<div class="controls-options-'.$meta['id'].'" style="display:none;">'.$this->getShareButtons($meta['id']).'</div>';
                      $b['posts'] .= '<p class="post-text" >'.$this->display_title($meta,true).'</p>';
                      $b['posts'] .= '<span class="post-item-stats"><i class="fa fa-eye" ></i> '.$meta['views'].'</span>';// $b['posts'] .= $this->getStatsByTitle($meta['twitter'] , $meta['blogtitle']);
                      $b['posts'] .= '
                    </div>
                    <div class="col-md-1">'.$this->display_controls($meta,'user').'</div>
                    ';
                  $b['posts'] .= '</panel>';
                } else {

                  // build play button
                  // $play_button = '<a href="#" id="controls-'.$meta['id'].'" class="btn btn-default btn-xs btn-secondary-outline controls-play" data-src="'.$meta['trackmp3'].'" data-title="'.$meta['twitter'].' - '.$meta['blogtitle'].'" style="background-image:url(\''.$meta['photo'].'\');" ><i class="fa fa-play"></i></a>';
                  $play_button = '<video controls preload="metadata" src="'.$meta['trackmp3'].'" poster="'.$meta['photo'].'"></video>';
                  // build article row
                  $b['posts'] .= '<panel class="row post-item" >';
                      $b['posts'] .= '
                        <div class="seamless col-md-3 col-xs-12" >
                        '.$play_button.'
                        </div>';
                      $b['posts'] .= '<div class="col-md-8 col-xs-12" >';
                      $b['posts'] .= '<div class="controls-options-'.$meta['id'].'" style="display:none;">'.$this->getShareButtons($meta['id']).'</div>';
                      $b['posts'] .= '<p class="post-text" >'.$this->display_title($meta,true).'</p>';
                      $b['posts'] .= '<span class="post-item-stats"><i class="fa fa-eye" ></i> '.$meta['views'].'</span>';// $b['posts'] .= $this->getStatsByTitle($meta['twitter'] , $meta['blogtitle']);
                      $b['posts'] .= '
                    </div>
                    <div class="col-md-1">'.$this->display_controls($meta,'user').'</div>
                    ';
                  $b['posts'] .= '</panel>';
                } // IF END
              } // FOREACH END
        } else {
          $b['posts'] = '<h2>No Search Results Found!</h2>';
        }

      return $b;
  }




public function displayCategories() {
  $res='';
  $res .= '<div class="container row feed-categories">
    <div class="col-md-2 categories">Categories:</div>
    <div class="col-md-2">Featured</div>
    <div class="col-md-2">Music</div>
    <div class="col-md-2">Lifestyle</div>
    <div class="col-md-2">Fashion</div>
    <div class="col-md-2">Sport</div>
  </div>';

  return $res;
}




  public function display_user_posts($user_name, $page=0) {
        // GRAB GLOBAL FEED
        $feed_posts = $this->getPostsByUser($page,20,$user_name);

        shuffle($feed_posts);
      foreach ($feed_posts as $track_num => $meta) {

        if ($this->detect_type($meta['trackmp3'])=='mp3') {

          // build play button
          $play_button = '<a href="#" id="controls-'.$meta['id'].'" class="btn btn-default btn-xs btn-secondary-outline controls-play" data-src="'.$meta['trackmp3'].'" data-title="'.$meta['twitter'].' - '.$meta['blogtitle'].'" style="background-image:url(\''.$meta['photo'].'\');" ><i class="fa fa-play"></i></a>';

          // build article row
          $b['posts'] .= '<panel class="row post-item" >';
              $b['posts'] .= '
                <div class="seamless col-md-3 col-xs-12" >
                '.$play_button.'
                </div>';
              $b['posts'] .= '<div class="col-md-8 col-xs-12" >';
              $b['posts'] .= '<div class="controls-options-'.$meta['id'].'" style="display:none;">'.$this->getShareButtons($meta['id']).'</div>';
              $b['posts'] .= '<p class="post-text" >'.$this->display_title($meta,false).'</p>';

              $b['posts'] .= '
            </div>
            <div class="col-md-1">'.$this->display_controls($meta).'</div>
            ';
          $b['posts'] .= '</panel>';
        } else {
          // SKIP AND MOVE TO NEXT Post
          // ADD TO VIDEO ARRAY  // TO DO LATER
          // build play button
          // $play_button = '<a href="#" id="controls-'.$meta['id'].'" class="btn btn-default btn-xs btn-secondary-outline controls-play" data-src="'.$meta['trackmp3'].'" data-title="'.$meta['twitter'].' - '.$meta['blogtitle'].'" style="background-image:url(\''.$meta['photo'].'\');" ><i class="fa fa-play"></i></a>';
          $play_button = '<div class="video-play-button"><i class="fa fa-play" ></i></div><video preload="metadata" src="'.$meta['trackmp3'].'" poster="'.$meta['photo'].'"></video>';
          // build article row
          $b['posts'] .= '<panel class="row post-item" >';
              $b['posts'] .= '
                <div class="seamless col-md-3 col-xs-12" >
                '.$play_button.'
                </div>';
              $b['posts'] .= '<div class="col-md-8 col-xs-12" >';
              $b['posts'] .= '<div class="controls-options-'.$meta['id'].'" style="display:none;">'.$this->getShareButtons($meta['id']).'</div>';
              $b['posts'] .= '<p class="post-text" >'.$this->display_title($meta,false).'</p>';
              $b['posts'] .= '
            </div>
            <div class="col-md-1">'.$this->display_controls($meta).'</div>
            ';
          $b['posts'] .= '</panel>';
        } // IF END
      } // FOREACH END
      $next_page = $page + 1;
      $b['posts'] .= "<a onclick='page(\"http://freelabel.net/users/index/stream/\" , \"".$next_page."\")' class='btn btn-block btn-link'>Load More</a>";

      return $b;
  }




  public function display_user_posts_new($user_name, $page=0) {
    $b['posts']='';
    $page = (int)$page;
    $page_read = (($page * 20)+1).' - '. (20 * ($page+1));
    if ($page===0) {
      $prev='';
    } else {
      $prev = '<a onclick=\'page("http://freelabel.net/users/index/stream/" , "'.($page-1).'")\' class="fa fa-arrow-left"></a>';
    }





      echo '<h2 class="page-header feed-header clearfix"><span class="pull-left" >Feed</span> <span class="pagination-count pull-right text-muted text-small"> '.$prev.' '.$page_read.' <a onclick=\'page("http://freelabel.net/users/index/stream/" , "'.($page+1).'")\' class="fa fa-arrow-right"></a></span></h2>';

        // GRAB GLOBAL FEED
        $feed_posts = $this->getPostsByUser($page,20,$user_name);
        shuffle($feed_posts);
      foreach ($feed_posts as $track_num => $meta) {

        if ($this->detect_type($meta['trackmp3'])=='mp3') {

          // build play button
          $play_button = '<a href="#" id="controls-'.$meta['id'].'" class="btn btn-default btn-xs btn-secondary-outline controls-play" data-src="'.$meta['trackmp3'].'" data-title="'.$meta['twitter'].' - '.$meta['blogtitle'].'" style="background-image:url(\''.$meta['photo'].'\');" ><i class="fa fa-play"></i></a>';

          // build article row
          $b['posts'] .= '<panel class="row post-item" >';
              $b['posts'] .= '
                <div class="seamless col-md-3 col-xs-12" >
                '.$play_button.'
                </div>';
              $b['posts'] .= '<div class="col-md-8 col-xs-12" >';
              $b['posts'] .= '<div class="controls-options-'.$meta['id'].'" style="display:none;">'.$this->getShareButtons($meta['id']).'</div>';
              $b['posts'] .= '<p class="post-text" >'.$this->display_title($meta,false).'</p>';

              $b['posts'] .= '
            </div>
            <div class="col-md-1">'.$this->display_controls($meta).'</div>
            ';
          $b['posts'] .= '</panel>';
        } else {
          // SKIP AND MOVE TO NEXT Post
          // ADD TO VIDEO ARRAY  // TO DO LATER
          // build play button
          // $play_button = '<a href="#" id="controls-'.$meta['id'].'" class="btn btn-default btn-xs btn-secondary-outline controls-play" data-src="'.$meta['trackmp3'].'" data-title="'.$meta['twitter'].' - '.$meta['blogtitle'].'" style="background-image:url(\''.$meta['photo'].'\');" ><i class="fa fa-play"></i></a>';
          $play_button = '<div class="video-play-button"><i class="fa fa-play" ></i></div><video preload="metadata" src="'.$meta['trackmp3'].'" poster="'.$meta['photo'].'"></video>';
          // build article row
          $b['posts'] .= '<panel class="row post-item" >';
              $b['posts'] .= '
                <div class="seamless col-md-3 col-xs-12" >
                '.$play_button.'
                </div>';
              $b['posts'] .= '<div class="col-md-8 col-xs-12" >';
              $b['posts'] .= '<div class="controls-options-'.$meta['id'].'" style="display:none;">'.$this->getShareButtons($meta['id']).'</div>';
              $b['posts'] .= '<p class="post-text" >'.$this->display_title($meta,false).'</p>';
              $b['posts'] .= '
            </div>
            <div class="col-md-1">'.$this->display_controls($meta).'</div>
            ';
          $b['posts'] .= '</panel>';
        } // IF END
      } // FOREACH END
      $next_page = $page + 1;
      $b['posts'] .= "<a onclick='page(\"http://freelabel.net/users/index/stream/\" , \"".$next_page."\")' class='btn btn-block btn-link'>Load More</a>";

      return $b;
  }


  public function getPhotosByUser($user_name='', $limit=6, $tag=NULL) {

    if (!$tag==NULL) {
      $query = 'AND `desc` LIKE \'%'.trim($tag).'%\' ';
    } else {
      $query='';
    }
    $sql = "SELECT * FROM `images`
        WHERE `user_name` = '$user_name'  /*AND `image` LIKE '%.png%' $query
        OR `user_name` = '$user_name' AND `image` LIKE '%.jpeg%' $query
        OR `user_name` = '$user_name' AND `image` LIKE '%.jpg%' $query */
        ORDER BY `id` DESC LIMIT $limit";
    include(ROOT.'inc/connection.php');
      $result_stats = mysqli_query($con,$sql);
    $i=0;
    while($row = mysqli_fetch_assoc($result_stats)) {
      $photos[] = $row;
    }
    return $photos;
  }



  public function getPromosByUser($user_name='', $page=0, $tag=NULL,$sort_by=false) {
    $query = '';
    // echo 'the current tag is :'. $tag.'<hr>';
    $pages = $page * 6 . " , 6";
    if (!$tag==NULL) {
      $query .= 'AND `desc` LIKE \'%'.trim($tag).'%\' ';
    }
    if (!$sort_by==NULL) {
      $query .= 'AND `'.$sort_by.'` LIKE \'%'.trim($tag).'%\' ';
    }
    $sql = "SELECT * FROM `images`
        WHERE `user_name` = '$user_name' $query
        ORDER BY `id` DESC LIMIT $pages";
        // echo '<pre>';
        // var_dump($tag);
        // var_dump($page);
        // echo '<hr>';
        // print_r($sql);
        // echo '</pre>';
    include(ROOT.'inc/connection.php');
      $result_stats = mysqli_query($con,$sql);
    $i=0;
    while($row = mysqli_fetch_assoc($result_stats)) {
      $promos[] = $row;
    }
    return $promos;
  }


  public function getPromoById($id='', $page=0, $tag=NULL,$sort_by=false) {
    $query = '';
    // echo 'the current tag is :'. $tag.'<hr>';
    if (!$tag==NULL) {
      $query .= 'AND `desc` LIKE \'%'.trim($tag).'%\' ';
    }
    if (!$sort_by==NULL) {
      $query .= 'AND `'.$sort_by.'` LIKE \'%'.trim($tag).'%\' ';
    }
    $sql = "SELECT * FROM `images`
        WHERE `id` = '$id'
        ORDER BY `id` DESC LIMIT 1";
    include(ROOT.'inc/connection.php');
      $result_stats = mysqli_query($con,$sql);
    $i=0;
    while($row = mysqli_fetch_assoc($result_stats)) {
      $promos[] = $row;
    }
    return $promos;
  }


  public function getPromoByDesc($id='', $page=0, $tag=NULL,$sort_by=false) {
    $query = '';
    // echo 'the current tag is :'. $tag.'<hr>';
    if (!$tag==NULL) {
      $query .= 'AND `desc` LIKE \'%'.trim($tag).'%\' ';
    }
    if (!$sort_by==NULL) {
      $query .= 'AND `'.$sort_by.'` LIKE \'%'.trim($tag).'%\' ';
    }
    $sql = "SELECT * FROM `images`
        WHERE `desc` LIKE '%$id%'
        ORDER BY `id` DESC LIMIT 1";
    include(ROOT.'inc/connection.php');
      $result_stats = mysqli_query($con,$sql);
    $i=0;
    while($row = mysqli_fetch_assoc($result_stats)) {
      $promos[] = $row;
    }
    return $promos;
  }






  public function display_promo($user_name='', $limit=6, $tag=NULL,$sort_by=false) {
    $query = '';
    // if (!$tag==NULL) {
    //   $query .= '`desc` LIKE \'%'.trim($tag).'%\' ';
    // }
    if (!$sort_by==NULL) {
      if ($sort_by=='id') {
        $query .= '`'.$sort_by.'` = \''.trim($tag).'\' ';
      } else {
        $query .= '`'.$sort_by.'` LIKE \'%'.trim($tag).'%\' ';
      }
    }
    $sql = "SELECT * FROM `images`
        WHERE $query
        ORDER BY `id` DESC LIMIT $limit";
        // echo '<pre>';
        // print_r($sql);
        // echo '</pre>';
    include(ROOT.'inc/connection.php');
      $result_stats = mysqli_query($con,$sql);
    $i=0;
    while($row = mysqli_fetch_assoc($result_stats)) {
      $promos[] = $row;
    }
    return $promos;
  }


  public function display_promo_list($user_name='', $limit=6, $tag=NULL,$sort_by=false) {
    $query = '';
    // if (!$tag==NULL) {
    //   $query .= '`desc` LIKE \'%'.trim($tag).'%\' ';
    // }
    if (!$user_name==NULL) {
      $query .= '`user_name` = \''.trim($user_name).'\' ';
    }
    $sql = "SELECT * FROM `images`
        WHERE $query
        ORDER BY `id` DESC LIMIT $limit";
    include(ROOT.'inc/connection.php');
      $result_stats = mysqli_query($con,$sql);
    $i=0;
    while($row = mysqli_fetch_assoc($result_stats)) {
      $promos[] = $row;
    }
    return $promos;
  }




  public function getMediaByUser($user_name='', $limit=6) {

    include(ROOT.'inc/connection.php');
      //echo '<pre>';
      $result_stats = mysqli_query($con,"SELECT * FROM `images`
        WHERE `user_name` = '$user_name' AND `image` NOT LIKE '%.png%'
        OR `user_name` = '$user_name' AND `image` NOT LIKE '%.jpeg%'
        OR `user_name` = '$user_name' AND `image` NOT LIKE '%.jpg%'
        ORDER BY `id` DESC LIMIT $limit");
    $i=0;
    while($row = mysqli_fetch_assoc($result_stats)) {
        //print_r($row);
      $files[] = $row;
        //echo '<hr>';
    }
    return $files;
  }

  public function getFilesByUser($user_name='', $limit=6) {

    include(ROOT.'inc/connection.php');
      //echo '<pre>';
    $sql = "SELECT * FROM `files`
        WHERE `user_name` = '$user_name' 
        ORDER BY `id` DESC LIMIT $limit";
      $result_stats = mysqli_query($con,$sql);
    $i=0;
    while($row = mysqli_fetch_assoc($result_stats)) {
        print_r($row);
      $files[] = $row;
        //echo '<hr>';
    }
    return $files;
  }

  public function display_promo_file_controls($id) {
    $res = '';
    include(ROOT.'inc/connection.php');
      //echo '<pre>';
    $sql = "SELECT * FROM `feed`
        WHERE `id` = '$id' 
        ORDER BY `id` DESC";
      $result_stats = mysqli_query($con,$sql);
    $i=0;
    while($row = mysqli_fetch_assoc($result_stats)) {
        //print_r($row);
      $files = $row;
      $res .= '
      <li class="promo-file-options">
        <span id="blogtitle-id-'.$files['id'].'" class="editable-promo-file">'.$files['blogtitle'].'</span> <a data-action="delete" data-id="'.$files['id'].'" class="fa fa-trash" ></a>
      </li>';
    }
    return $res;
  }



  public function display_promo_public_controls($id) {
    $photos = '';
    $res = '';


    include(ROOT.'inc/connection.php');
      //echo '<pre>';
    $sql = "SELECT * FROM `feed`
        WHERE `id` = '$id' 
        ORDER BY `id` DESC";
      $result_stats = mysqli_query($con,$sql);
    $i=0;
    while($row = mysqli_fetch_assoc($result_stats)) {
      $files = $row;
      if ($files['filetype']=='image/jpeg' OR $files['filetype']=='image/png' OR $files['filetype']=='image/jpg') {
      
        // PHOTO
        $photos .= '<li> <img src="'.$files['photo'].'" class="promo-image-img"> '.$files['name'].' '.$files['name'].' <a data-action="share" data-id="'.$files['id'].'" class="fa fa-share-alt share-promo-file" data-id="'.$files['id'].'" data-src="'.$files['trackmp3'].'" data-title="'.$files['twitter'].' - '.$files['blogtitle'].'" '.$files['twitpic'].'" ></a></li>';
      
      } elseif ($files['filetype']==='video/mp4') {
        
        // VIDEOS
        // $photos .= '<li class="promo-file-options promo-image" data-type="'.$files['filetype'].'"  >asdfs<video src="'.$files['trackmp3'].'" poster="'.$files['photo'].'"> <a class="fa fa-play-circle attached-file-button" ></a>  <a class="fa fa-play-circle attached-file-button" ></a> '.$files['twitter'].' - '.$files['blogtitle'].'  <a data-action="share" data-id="'.$files['id'].'" data-title="'.$files['twitter'].' - '.$files['blogtitle'].'" class="fa fa-share-alt share-promo-file pull-right" ></a></li>';
        // $photos .= '<li class="promo-image" data-type="'.$files['filetype'].'"  > <span style="50px" ><video src="'.$files['trackmp3'].'" poster="'.$files['photo'].'"></video> </span> <a class="fa fa-play-circle attached-file-button" ></a> '.$files['twitter'].' - '.$files['blogtitle'].'  <a data-action="share" data-id="'.$files['id'].'" data-title="'.$files['twitter'].' - '.$files['blogtitle'].'" class="fa fa-share-alt share-promo-file pull-right" ></a></li>';
      
      } elseif ($files['filetype']==='audio/mp3') {
        // AUDIO
        $res .= '<li ><a href="#"  data-src="'.$files['trackmp3'].'" > <img src="'.$files['photo'].'" class="playlist-img"> '.$files['twitter'].' - '.$files['blogtitle'].'</a> </li>';
      } else {
        $res .= '<li ><a href="#"  data-src="'.$files['trackmp3'].'" data-type="'.$files['filetype'].'" > <img src="'.$files['photo'].'" style="width:50px;height:auto;"> '.$files['twitter'].' - '.$files['blogtitle'].'</a> </li>';
      }


    }


    $res = $photos.$res;
    return $res;
  }




public function getUserData($user_name) {
  include(ROOT.'inc/connection.php');
  $sql = "SELECT *
FROM  `user_profiles`
WHERE  `id` = '$user_name'
LIMIT 0 , 30";
  $result = mysqli_query($con,$sql);
  if ($row = mysqli_fetch_assoc($result)){
    $user_data = $row;
        //print_r($row);
  } else {
    $user_data = NULL;
  }
  return $user_data;
}

public function getUserInfo($user_name) {
  include(ROOT.'inc/huge.php');
  $sql = "SELECT * FROM  `users` WHERE  `user_name` = '$user_name' LIMIT 1";
  $result = mysqli_query($con,$sql);
  if ($row = mysqli_fetch_assoc($result)){
    $user_data = $row;
        //print_r($row);
  } else {
    $user_data = NULL;
  }
  return $user_data;
}



public function getUserType($user_name) {
  include(ROOT.'inc/huge.php');
  $sql = "SELECT account_type FROM  `users` WHERE  `user_name` = '$user_name' LIMIT 1";
  $result = mysqli_query($con,$sql);
  if ($row = mysqli_fetch_assoc($result)){
    $user_data = $row;
        // print_r($row);
  } else {
    $user_data = NULL;
  }
  return $user_data;
}






  public function display_attached_files($attached_files, $status=NULL, $desc=null, $title=null, $id=null, $promo=null) {
    $res = '';
    $share_button = '';


    // echo 'you are here';
    // exit;

    if (isset($promo['paypal_url']) && $promo['paypal_url']!='') {
      $share_button .= '<a href="'.$promo['paypal_url'].'" class="btn btn-success-outline" target="_blank">Purchase Tickets</a>' ;
    }

    $share_button .= '<a href="#" data-title="'.$title.'" data-id="'.$id.'" class="btn fa fa-share-alt share-promo-button"></a>';

    if (isset($desc)) {
      $res .="<p class='promo-description' >".$desc."<br>{$share_button}</p>";
    }
 
    $attached_files = explode(", ", $attached_files);
    $res.='<ol class="audio-player-playlist">';
    if (!$status==NULL && $status=='public') {
      foreach ($attached_files as $value) {
        $res .=''.$this->display_promo_public_controls(trim($value), $desc).'';
      }
    } else {
      foreach ($attached_files as $value) {
        $res .=''.$this->display_promo_file_controls(trim($value), $desc).'';
      }
    }
    $res.='</ol>';
    return $res;
  }



  public function display_attached_files_single($attached_files, $status=NULL, $desc=null, $title=null, $id=null, $promo=null) {
    $res = '';
    $share_button = '';


    // echo 'you are here';
    // exit;

    if (isset($promo['paypal_url']) && $promo['paypal_url']!='') {
      $share_button .= '<a href="'.$promo['paypal_url'].'" class="btn btn-success-outline" target="_blank">Purchase Tickets</a>' ;
    }

    $share_button .= '<a href="#" data-title="'.$title.'" data-id="'.$id.'" class="btn fa fa-share-alt share-promo-button"></a>';

    if (isset($desc)) {
      $res .="<p class='promo-description' >".$desc."<br>{$share_button}</p>";
    }
 
    $attached_files = explode(", ", $attached_files);
    $res.='<ol class="audio-player-playlist">';
    if (!$status==NULL && $status=='public') {
      foreach ($attached_files as $value) {
        $res .=''.$this->display_promo_public_controls(trim($value), $desc).'';
      }
    } else {
      foreach ($attached_files as $value) {
        $res .=''.$this->display_promo_file_controls(trim($value), $desc).'';
      }
    }
    $res.='</ol>';
    return $res;
  }


  public function getVideosByUser($user_name='', $limit=6) {

    include(ROOT.'inc/connection.php');
      //echo '<pre>';
    $result_stats = mysqli_query($con,"SELECT * FROM `feed` WHERE `user_name` LIKE '%$user_name%' AND `type` LIKE '%blog%' ORDER BY `id` DESC LIMIT $limit");
    $i=0;
    while($row = mysqli_fetch_assoc($result_stats)) {
        //print_r($row);
      $photos[] = $row;
        //echo '<hr>';
    }
    return $photos;
  }


  public function getEventsByUser($user_name='', $limit=6) {

    include(ROOT.'inc/connection.php');
    $result_stats = mysqli_query($con,"SELECT * FROM `schedule` WHERE `user_name` LIKE '%$user_name%' ORDER BY `id` DESC LIMIT $limit");
    $i=0;
    while($row = mysqli_fetch_assoc($result_stats)) {
      $events[] = $row;
    }
    return $events;
  }

  public function display_photos($data , $featured=false, $page=0, $tag=null) {
    $photos = '';
    if ($featured==true) {
      $colWidth = 'col-md-12';
    } else {
      $colWidth = 'col-md-6';
    }

    if (isset($data)) {
        foreach ($data as $key => $value) {
          // load thumbnail 
          $thumbnail =  str_replace('server/php/upload/', 'server/php/upload/thumb/', $value['image']);
          if (file_exists($thumbnail)) {
            $thumbnail = $thumbnail;
          } else {
            $thumbnail = $value['image'];
          }
          $photos .= "
          <article class='full-width-article ".$colWidth." col-xs-12 eq-row-height' data-promo-id='".$value['id']."'>";
    
          $type = $this->detect_type($value['image']);
          $photos .= ''.$this->display_promo_options($value['id'], $user_name , $value['image'], $value['description']);
          switch (strtolower($type)) {
            case 'mp4':
              $photos .="<label id='title-id-".$value['id']."' class='file_name editable-promo' >".$value['title']."</label>";
              $photos .="<label class='file_name text-muted'>".$value['stats']."</label>";
              $photos .= '<video class="user-video-item" controls preload="metadata" src="'.$value['image'].'">';
              break;
            case 'mp3':
              $photos .="<label id='title-id-".$value['id']."' class='file_name editable-promo' >".$value['title']."</label>";
              $photos .= "<a href='#' id='controls-".$value['id']."' class='controls-play' ".'data-src="'.$value['image'].'" data-title="'.$value['title'].'" style="background-image:url(\''.$value['poster'].'\');" '."><i class='promotion-player-button fa fa-play-circle'></i></a>";
              break;
            case 'png' OR 'jpeg' OR 'jpg':
              $photos .="<label id='title-id-".$value['id']."' class='file_name editable-promo' >".$value['title']."</label>";
              $photos .="<label class='file_name'>".$value['stats']." views</label>";
              $photos .= '<a href="http://freelabel.net/users/index/image/'.$value['id'].'" ><img class="user-photo-item" src="'.$thumbnail.'"></a>';
              $photos .="<br><label class='file_name'>Tags:</label><label id='desc-id-".$value['id']."' class='file_name editable-promo text-hjh' >".$value['desc']."</label>";
              // $photos .="<br><label class='file_name'>Caption:</label><label id='caption-id-".$value['id']."' class='file_name editable-promo text-muted' >".$value['caption']."</label>";
              // $photos .="<br><label class='file_name'>Status:</label><label id='caption-id-".$value['id']."' class='file_name text-muted' ><select><option selected>Public</option><option>Private</option></select></label>";
              $photos .= '<ol>';
              $photos .= $this->display_attached_files($value['files_attached']);
              $photos .= '</ol>';
              break;
            default:
              //print_r($value['image']);
              if (strpos($value['image'] , 'mp4')>0) {
                $photos .="<label id='promo-id-".$value['id']."' class='file_name editable-promo'>".$value['title']."</label>";
                //$photos .= '<video class="user-photo-item" controls preload="metadata" src="'.$value['image'].'">';
                // $photos .= '<img class="user-photo-item" src="'.$value['image'].'">';
              } else {
                $photos .="<label id='promo-id-".$value['id']."' class='file_name editable-promo'>".$value['title']."</label>";
                // $photos .= 'files: '.$value['files_attached'];
                $photos .= '<ol>';
                $photos .= $this->display_attached_files($value['files_attached']);
                $photos .= '</ol>';
              }
            break;
          }
          $photos .='</article>';
        }
    } else {
         $photos .= "<article class='full-width-article ".$colWidth." col-xs-12 eq-row-height' data-promo-id='".$value['id']."'>";
         $photos .='<h2 class="text-warning">You have no promos created :(</h2>';
         $photos .='<p class="section-description">You\'ll need to create a new promotion with the green "Add New Promo" button at the top!</p>';
         $photos .='</article>';

        $photos .= "<article class='full-width-article ".$colWidth." col-xs-12 eq-row-height' data-promo-id='".$value['id']."'>";
         $photos .='<h2 class="text-info">What are Promos?</h2>';
         $photos .='<p class="section-description">Promotions are categories, playlists, albums, or events that you can attach tracks, videos, photos and more all in one place!</p>';
         $photos .='</article>';

    }
    /* pagination */
    $count = count($data);
    if ($count == 6) {
      $next_page = $page + 1;
      $photos .='<a onclick="promos('.$next_page.',\''.$tag.'\')" class="col-md-12 btn btn-block btn-link load-more-button">Load More</a>';
    }
      
    return $photos;
  }



  public function display_feed($data , $featured=false, $page=0, $tag=null) {
    $photos = '';
    if ($featured==true) {
      $colWidth = 'col-md-12';
    } else {
      $colWidth = 'col-md-6';
    }
    // var_dump($data);

    if (isset($data)) {
        foreach ($data as $key => $value) {
          // load thumbnail 
          $thumbnail =  str_replace('server/php/upload/', 'server/php/upload/thumb/', $value['photo']);
          if (file_exists($thumbnail)) {
            $thumbnail = $thumbnail;
          } else {
            $thumbnail = $value['photo'];
          }
          $photos .= "
          <article class='full-width-article ".$colWidth." col-xs-12 eq-row-height' data-promo-id='".$value['id']."'>";
    
          $type = $this->detect_type($value['trackmp3']);
          switch (strtolower($type)) {
            case 'mp4':
              $photos .="<label id='title-id-".$value['id']."' class='file_name editable-promo' >".$value['blogtitle']."</label>";
              $photos .="<label class='file_name text-muted'>".$value['views']."</label>";
              $photos .= '<video class="user-video-item" controls preload="metadata" src="'.$value['trackmp3'].'" poster="'.$value['poster'].'"></video>';
              $photos .='<div class="dropdown"><i class="pull-left fa fa-share-alt dropdown-toggle" data-toggle="dropdown"></i>';
              $photos .='<ul class="dropdown-menu">';
              $photos .= $this->getShareButtonsList($value['id']);
              $photos .='</ul></div>';

              break;
            case 'mp3':
              $photos .="<label id='title-id-".$value['id']."' class='file_name editable-promo' >".$value['title']."</label>";
              $photos .= "<a href='#' id='controls-".$value['id']."' class='controls-play' ".'data-src="'.$value['image'].'" data-title="'.$value['title'].'" style="background-image:url(\''.$value['poster'].'\');" '."><i class='promotion-player-button fa fa-play-circle'></i></a>";
              break;
            case 'png' OR 'jpeg' OR 'jpg':
              $photos .="<label id='title-id-".$value['id']."' class='file_name editable-promo' >".$value['title']."</label>";
              $photos .="<label class='file_name'>".$value['stats']." views</label>";
              $photos .= '<a href="http://freelabel.net/users/index/image/'.$value['id'].'" ><img class="user-photo-item" src="'.$thumbnail.'"></a>';
              $photos .="<br><label class='file_name'>Tags:</label><label id='desc-id-".$value['id']."' class='file_name editable-promo text-hjh' >".$value['desc']."</label>";
              // $photos .="<br><label class='file_name'>Caption:</label><label id='caption-id-".$value['id']."' class='file_name editable-promo text-muted' >".$value['caption']."</label>";
              // $photos .="<br><label class='file_name'>Status:</label><label id='caption-id-".$value['id']."' class='file_name text-muted' ><select><option selected>Public</option><option>Private</option></select></label>";
              $photos .= '<ol>';
              $photos .= $this->display_attached_files($value['files_attached']);
              $photos .= '</ol>';
              break;
            default:
              //print_r($value['image']);
              if (strpos($value['image'] , 'mp4')>0) {
                $photos .="<label id='promo-id-".$value['id']."' class='file_name editable-promo'>".$value['title']."</label>";
                //$photos .= '<video class="user-photo-item" controls preload="metadata" src="'.$value['image'].'">';
                // $photos .= '<img class="user-photo-item" src="'.$value['image'].'">';
              } else {
                $photos .="<label id='promo-id-".$value['id']."' class='file_name editable-promo'>".$value['title']."</label>";
                // $photos .= 'files: '.$value['files_attached'];
                $photos .= '<ol>';
                $photos .= $this->display_attached_files($value['files_attached']);
                $photos .= '</ol>';
              }
            break;
          }
          $photos .='</article>';
        }
    } else {
         $photos .= "<article class='full-width-article ".$colWidth." col-xs-12 eq-row-height' data-promo-id='".$value['id']."'>";
         $photos .='<h2 class="text-warning">You have no promos created :(</h2>';
         $photos .='<p class="section-description">You\'ll need to create a new promotion with the green "Add New Promo" button at the top!</p>';
         $photos .='</article>';

        $photos .= "<article class='full-width-article ".$colWidth." col-xs-12 eq-row-height' data-promo-id='".$value['id']."'>";
         $photos .='<h2 class="text-info">What are Promos?</h2>';
         $photos .='<p class="section-description">Promotions are categories, playlists, albums, or events that you can attach tracks, videos, photos and more all in one place!</p>';
         $photos .='</article>';

    }
    /* pagination */
    $count = count($data);
    if ($count == 6) {
      $next_page = $page + 1;
      $photos .='<a onclick="promos('.$next_page.',\''.$tag.'\')" class="col-md-12 btn btn-block btn-link load-more-button">Load More</a>';
    }
      
    return $photos;
  }




public function display_promo_public($data , $featured=false, $public=false) {
    $photos = '';
    if ($featured==true) {
      $colWidth = 'col-md-12';
    } else {
      $colWidth = 'col-md-6';
    }

    if (isset($data)) {
        foreach ($data as $key => $value) {
              // load thumbnail 
              $thumbnail =  str_replace('server/php/files/', 'server/php/files/thumbnail/', $value['image']);
              $photos .= "
              <article class='full-width-article ".$colWidth." col-xs-12 eq-row-height' data-promo-id='".$value['id']."'>";
              $type = $this->detect_type($value['image']);
              //$photos .= ''.$this->display_promo_options($value['id'], $user_name , $value['image'], $value['description']);
              switch (strtolower($type)) {
                case 'mp4':
                  $photos .="<h2 id='title-id-".$value['id']."' class='promo-title editable-promo' >".$value['title']."</h2>";
                  $photos .="<h2 id='promo-id-".$value['id']."' class='promo-subtitle editable-promo'>".$value['desc']."</h2>";
                  // $photos .= '<video class="user-video-item" controls preload="metadata" src="'.$value['image'].'">';
                  $photos .= "<video href='#' id='controls-".$value['id']."' class='controls-play' ".'poster="'.$value['image'].'" data-title="'.$value['title'].'" style="background-image:url(\''.$value['poster'].'\');" '.">";
                  break;
                case 'mp3':
                  $photos .="<h2 id='title-id-".$value['id']."' class='promo-title editable-promo' >".$value['title']."</h2>";
                  $photos .="<h2 id='promo-id-".$value['id']."' class='promo-subtitle editable-promo'>".$value['desc']."</h2>";
                  $photos .= "<a href='#' id='controls-".$value['id']."' class='controls-play' ".'data-src="'.$value['image'].'" data-title="'.$value['title'].'" style="background-image:url(\''.$value['poster'].'\');" '."><i class='promotion-player-button fa fa-play-circle'></i></a>";
                  break;
                case 'png' OR 'jpeg' OR 'jpg':
                    $photos .="<h2 id='title-id-".$value['id']."' class='promo-title editable-promo' >".$value['title']."</h2>";
                    // $photos .="<p id='promo-id-".$value['id']."' class='promo-subtitle editable-promo'>".$value['caption']."</p>";
                  $photos .= '<panel class="col-md-5 col-xs-12">';
                    $photos .= '<a href="http://freelabel.net/users/index/image/'.$value['id'].'" ><img class="user-photo-item" src="'.$thumbnail.'"></a>';
                    $photos .="<br><label class='file_name'>Tags:</label><label id='desc-id-".$value['id']."' class='file_name editable-promo text-muted' >".$value['desc']."</label>";
                  $photos .= '</panel>';
                  $photos .= '<panel class="col-md-7 col-xs-12">';
                  
      
                    $photos .= '<ol>';
                    $photos .= $this->display_attached_files($value['files_attached'], 'public', $value['caption'], $value['title'], $value['id'], $value);
                    $photos .= '</ol>';
                  $photos .= '</panel>';
                  break;
                default:
                  if (strpos($value['image'] , 'mp4')>0) {
                    $photos .="<h2 id='promo-id-".$value['id']."' class='promo-title editable-promo'>".$value['title']."</h2>";
                  } else {
                    $photos .="<h2 id='promo-id-".$value['id']."' class='promo-title editable-promo'>".$value['title']."</h2>";
                    $photos .="<h2 id='promo-id-".$value['id']."' class='promo-subtitle editable-promo'>".$value['desc']."</h2>";
                    $photos .= '<ol>';
                    $photos .= $this->display_attached_files($value['files_attached'], 'public');
                    $photos .= '</ol>';
                  }
                break;
              }
              $photos .='</article>';
            }
      } else {
        $photos  .='No Promotion Found';
      }
    return $photos;
  }







public function display_promo_playlist($data , $featured=false, $public=false) {
    $photos = '';
    if ($featured==true) {
      $colWidth = 'col-md-12';
    } else {
      $colWidth = 'col-md-6';
    }

    if (isset($data)) {
        foreach ($data as $key => $value) {
              // load thumbnail 
              $thumbnail =  str_replace('server/php/files/', 'server/php/files/thumbnail/', $value['image']);
              $photos .= "";
              $type = $this->detect_type($value['image']);
              //$photos .= ''.$this->display_promo_options($value['id'], $user_name , $value['image'], $value['description']);
              switch (strtolower($type)) {
                case 'mp4':
                  $photos .="<h2 id='title-id-".$value['id']."' class='promo-title editable-promo' >".$value['title']."</h2>";
                  $photos .="<h2 id='promo-id-".$value['id']."' class='promo-subtitle editable-promo'>".$value['desc']."</h2>";
                  // $photos .= '<video class="user-video-item" controls preload="metadata" src="'.$value['image'].'">';
                  $photos .= "<video href='#' id='controls-".$value['id']."' class='controls-play' ".'poster="'.$value['image'].'" data-title="'.$value['title'].'" style="background-image:url(\''.$value['poster'].'\');" '.">";
                  break;
                case 'mp3':
                  // $photos .="<h2 id='title-id-".$value['id']."' class='promo-title editable-promo' >".$value['title']."</h2>";
                  // $photos .="<h2 id='promo-id-".$value['id']."' class='promo-subtitle editable-promo'>".$value['desc']."</h2>";
                  $photos .= "<a href='#' id='controls-".$value['id']."' class='controls-play' ".'data-src="'.$value['trackmp3'].'" data-title="'.$value['title'].'" style="background-image:url(\''.$value['poster'].'\');" '."><i class='promotion-player-button fa fa-play-circle'></i></a>";
                  break;
                case 'png' OR 'jpeg' OR 'jpg':
                    $photos .="<h2 id='title-id-".$value['id']."' class='promo-title editable-promo' >".$value['title']."</h2>";
                    // $photos .="<p id='promo-id-".$value['id']."' class='promo-subtitle editable-promo'>".$value['caption']."</p>";
                  // $photos .= '<panel class="col-md-7col-xs-12">';
                    $photos .= '<a href="http://freelabel.net/users/index/image/'.$value['id'].'" ><img class="user-photo-item" src="'.$thumbnail.'"></a>';
                    $photos .="<br><label class='file_name'>Tags:</label><label id='desc-id-".$value['id']."' class='file_name editable-promo text-muted' >".$value['desc']."</label>";
                  // $photos .= '</panel>';
                  // $photos .= '<panel class="col-md-5 col-xs-12">';
                  
      
                    // $photos .= '<ol>';

                    $photos .= $this->display_attached_files($value['files_attached'], 'public', $value['caption'], $value['title'], $value['id'], $value);
                    // $photos .= '</ol>';
                  // $photos .= '</panel>';
                  break;
                default:
                  if (strpos($value['image'] , 'mp4')>0) {
                    $photos .="<h2 id='promo-id-".$value['id']."' class='promo-title editable-promo'>".$value['title']."</h2>";
                  } else {
                    $photos .="<h2 id='promo-id-".$value['id']."' class='promo-title editable-promo'>".$value['title']."</h2>";
                    $photos .="<h2 id='promo-id-".$value['id']."' class='promo-subtitle editable-promo'>".$value['desc']."</h2>";
                    $photos .= '<ol>';
                    $photos .= $this->display_attached_files($value['files_attached'], 'public');
                    $photos .= '</ol>';
                  }
                break;
              }
            }
      } else {
        $photos  .='No Promotion Found';
      }
    return $photos;
  }



public function display_promo_playlist_single($data , $featured=false, $public=false) {
    $photos = '';
    if ($featured==true) {
      $colWidth = 'col-md-12';
    } else {
      $colWidth = 'col-md-6';
    }

    if (isset($data)) {
        foreach ($data as $key => $value) {
              // load thumbnail 
              $thumbnail =  str_replace('server/php/files/', 'server/php/files/thumbnail/', $value['image']);
              $photos .= "";
              $type = $this->detect_type($value['image']);
              //$photos .= ''.$this->display_promo_options($value['id'], $user_name , $value['image'], $value['description']);
              switch (strtolower($type)) {
                case 'mp4':
                  $photos .="<h2 id='title-id-".$value['id']."' class='promo-title editable-promo' >".$value['title']."</h2>";
                  $photos .="<h2 id='promo-id-".$value['id']."' class='promo-subtitle editable-promo'>".$value['desc']."</h2>";
                  // $photos .= '<video class="user-video-item" controls preload="metadata" src="'.$value['image'].'">';
                  $photos .= "<video href='#' id='controls-".$value['id']."' class='controls-play' ".'poster="'.$value['image'].'" data-title="'.$value['title'].'" style="background-image:url(\''.$value['poster'].'\');" '.">";
                  break;
                case 'mp3':
                  // $photos .="<h2 id='title-id-".$value['id']."' class='promo-title editable-promo' >".$value['title']."</h2>";
                  // $photos .="<h2 id='promo-id-".$value['id']."' class='promo-subtitle editable-promo'>".$value['desc']."</h2>";
                  $photos .= "<a href='#' id='controls-".$value['id']."' class='controls-play' ".'data-src="'.$value['trackmp3'].'" data-title="'.$value['title'].'" style="background-image:url(\''.$value['poster'].'\');" '."><i class='promotion-player-button fa fa-play-circle'></i></a>";
                  break;
                case 'png' OR 'jpeg' OR 'jpg':
                
                    $photos .="<h2 id='title-id-".$value['id']."' class='promo-title editable-promo' >".$value['title']."</h2>";
                    // $photos .="<p id='promo-id-".$value['id']."' class='promo-subtitle editable-promo'>".$value['caption']."</p>";
                  // $photos .= '<panel class="col-md-7col-xs-12">';
                    $photos .= '<a href="http://freelabel.net/users/index/image/'.$value['id'].'" ><img class="user-photo-item" src="'.$thumbnail.'"></a>';
                    $photos .="<br><label class='file_name'>Tags:</label><label id='desc-id-".$value['id']."' class='file_name editable-promo text-muted' >".$value['desc']."</label>";
                  // $photos .= '</panel>';
                  // $photos .= '<panel class="col-md-5 col-xs-12">';
                  
      
                    // $photos .= '<ol>';

                    $photos .= $this->display_attached_files_single($value['files_attached'], 'public', $value['caption'], $value['title'], $value['id'], $value);
                    // $photos .= '</ol>';
                  // $photos .= '</panel>';
                  break;
                default:
                  if (strpos($value['image'] , 'mp4')>0) {
                    $photos .="<h2 id='promo-id-".$value['id']."' class='promo-title editable-promo'>".$value['title']."</h2>";
                  } else {
                    $photos .="<h2 id='promo-id-".$value['id']."' class='promo-title editable-promo'>".$value['title']."</h2>";
                    $photos .="<h2 id='promo-id-".$value['id']."' class='promo-subtitle editable-promo'>".$value['desc']."</h2>";
                    $photos .= '<ol>';
                    $photos .= $this->display_attached_files($value['files_attached'], 'public');
                    $photos .= '</ol>';
                  }
                break;
              }
            }
      } else {
        $photos  .='No Promotion Found';
      }
    return $photos;
  }







  public function display_notes($data) {
    $notes = '';

    foreach ($data as $key => $value) {
      $notes .= "
      <article class='full-width-article col-md-12 col-xs-12 eq-row-height' >";
      // build article row
      $notes .= '<panel class="row post-item" >';
          $notes .= '
            <div class="seamless col-md-10 col-xs-12" >
            '.$value->note_text.'
            </div>';
          $notes .= '<div class="col-md-2 col-xs-12" >';
          $notes .= '
          <a class="btn btn-default" href="http://freelabel.net/users/note/edit/' . $value->note_id.'"><i class="fa fa-pencil"></i>Edit</a>
          <a class="btn btn-default" href="http://freelabel.net/users/note/delete/' . $value->note_id.'"><i class="fa fa-trash"></i>Delete</a>';
          $notes .='</div>';
          // $notes .= '<p class="post-text" >'.$this->display_title($meta,false).'</p>';
      $notes .= '</panel>';


      $notes .='</article>';
    }
    return $notes;
  }



  public function display_files($data=NULL, $user_name) {
    $media = '';

      if (!$data==NULL) {
        foreach ($data as $key => $value) {
          $thumbnail =  str_replace('files/', 'files/thumbnail/', $value['url']);
          $media .= "
          <article class='full-width-article col-sm-6 col-md-4 col-lg-4 col-xs-12' >";

          $type = $this->detect_type($value['url']);
          switch (strtolower($type)) {
            case 'mp4':
              $media .="<label id='name-id-".$value['id']."' class='file_name edit editable-file' >".$value['name']."</label>";
              $media . "<span class='file_type' >video</span>";
              $media .= '<video class="user-video-item" controls preload="metadata" src="'.$value['url'].'">';
              $media .="<span class='list_type text-muted' >video</span>";
              $media .= ''.$this->display_file_options($value['id'], $user_name , $value['url'], $value['twitter'] .' - '.$value['title']);
              
              // $media .="<span class='list-item text-muted edit-options-hidden' >".$value['name']."</span>";
              break;
            case 'mp3':
              $media .="<label id='name-id-".$value['id']."' class='file_name edit editable-file' >".$value['name']."</label>";
              $media .= "<a href='#' id='controls-".$value['id']."' class='controls-play' ".'data-src="'.$value['url'].'" data-title="'.$value['name'].'" style="background-image:url(\''.$value['poster'].'\');" '."><i class='promotion-player-button fa fa-play'></i></a>";
              // $media .="<label id='name-id-".$value['id']."' class='file_name file' >".$value['name']."</label>";

              // $media .= '<audio controls class="user-photo-item" src="'.$value['url'].'"></audio>';
              $media .="<span class='list_type text-muted' >audio</span>";
              break;
            case 'png' OR 'jpeg' OR 'jpg':
              $media .="<label id='name-id-".$value['id']."' class='file_name edit editable-file' >".$value['name']."</label>";
              // $media .="<label id='desc-id-".$value['id']."' class='file_name edit editable-file' >".$value['name']."</label>";
              $media . "<span class='file_type' >photo</span>";
              $media .= '<a href="'.$value['url'].'" target="_blank"><img class="user-photo-item" src="'.$thumbnail.'"></a>';
              $media .="<span class='list_name list-item text-muted edit-options-hidden' >".$value['name']."</span>";
              $media .="<span class='list_type text-muted edit-options-hidden' >photo</span>";
              $media .= ''.$this->display_file_options($value['id'], $user_name , $value['url'], $value['twitter'] .' - '.$value['title']);
              
              $media .= '<div class="row share-buttons-row" style="margin-top:5%;">';

                // $media .="<a class='col-md-4 fa fa-link   open-link-options' href='#'    alt='View Public URL'   data-id='".$value['id']."'  ></a>";
                // $media .="<a class='col-md-4 fa fa-pencil  open-edit-options' href='#'    alt='Edit File'         data-id='".$value['id']."'  ></a>";
                // $media .="<a class='col-md-4 fa fa-trash   open-delete-options' href='#'  alt='Delete File'       data-id='".$value['id']."'  ></a>";
              $media .= "</div>";
            default:
              $media .="<label id='name-id-".$value['id']."' class='file_name edit editable-file' >".$value['name']."</label>";
              // $media .="<label id='desc-id-".$value['id']."' class='file_name edit editable-file' >".$value['name']."</label>";
              // $media . "<span class='file_type' >photo</span>";
              $media .= '<video controls>'.$value['src'].'</video>';
              $media .="<span class='list_name list-item text-muted edit-options-hidden' >ad".$value['name']."</span>";
              $media .="<span class='list_type text-muted edit-options-hidden' >photo</span>";
              $media .= '<div class="row share-buttons-row" style="margin-top:5%;">';
                // $media .="<a class='col-md-4 fa fa-link   open-link-options' href='#'    alt='View Public URL'   data-id='".$value['id']."'  ></a>";
                // $media .="<a class='col-md-4 fa fa-pencil  open-edit-options' href='#'    alt='Edit File'         data-id='".$value['id']."'  ></a>";
                // $media .="<a class='col-md-4 fa fa-trash   open-delete-options' href='#'  alt='Delete File'       data-id='".$value['id']."'  ></a>";
              $media .= "</div>";
            break;
          } // end of switch
          $media .= ''.$this->display_file_options($value['id'], $user_name , $value['url'], $value['twitter'] .' - '.$value['title']);
          $media .='</article>';
        } // end of foreach
      } else {
        $media = '<br><h3>You have no files uploaded to your box!</h3>';
        //$this->error($media);
      }
    return $media;
  }

    public function display_media($data) {
    $photos = '';

    foreach ($data as $key => $value) {
      $photos .= "
      <article class='full-width-article col-md-12 col-xs-12' >";
      $type = $this->detect_type($value['image']);
      switch (strtolower($type)) {
        case 'mp4':
          $photos .="<h4>".$value['title']."</h4>";
          $photos .= '<video class="user-video-item" controls preload="metadata" src="'.$value['image'].'">';
          break;
        case 'mp3':
          $photos .="<h4>".$value['title']."</h4>";
          $photos .= '<audio controls class="user-photo-item" src="'.$value['image'].'"></audio>';
          break;
        case 'png':
          $photos .="<p>".$value['title']."</p>";
          $photos .= '<img class="user-photo-item" src="'.$value['image'].'">';
          break;
        case 'jpeg':
          $photos .="<p>".$value['title']."</p>";
          $photos .= '<img class="user-photo-item" src="'.$value['image'].'">';
          break;
        case 'jpg':
          $photos .="<p>".$value['title']."</p>";
          $photos .= '<img class="user-photo-item" src="'.$value['image'].'">';
          break;
        default:
          //print_r($value['image']);
          if (strpos($value['image'] , 'mp4')>0) {
            $photos .="<h1>".$value['title']."</h1>";
            $photos .= '<video class="user-photo-item" controls preload="metadata" src="'.$value['image'].'">';
            // $photos .= '<img class="user-photo-item" src="'.$value['image'].'">';
          }
        break;
      }
      $photos .='</article>';
    }
    return $photos;
  }



  public function display_events($data) {
    $events = '';
    foreach ($data as $key => $meta) {
      //print_r();
      $events .= '<panel class="row post-item" >';
        // ATTACHED MEDIA
          // photos
          // $events .= '<img class="post-image col-md-3 col-xs-12" src="'.$meta['title'].'" >';

          $events .= '<p class="post-text" >'.$meta['event_title'].' - '.$meta['showcase_day'].'</p>';
          $events .= '<small class="post-text text-muted" >'.$meta['description'].'</small>';

        // AUDIO
        // $events .= '<audio src="'.$meta['trackmp3'].'" controls preload="metadata"></audio>';

        // CONTROLS
        $events .= '<br>
        <div class="dropdown">
          <button class="btn btn-default btn-xs btn-secondary-outline m-b-md"><i class="dropdown-toggle fa fa-share"></i> Options</button>
        </div>
        ';
      $events .= '</panel>';

    }
    return $events;
  }

  public function detect_type($file) {
    $ex = explode('.',$file);
    $r = array_reverse($ex);
    $target = strtolower($r[0]);
    // var_dump($target);
    return $target;
  }

  public function detect_file_type($file) {
    $ex = explode('.',$file);
    $r = array_reverse($ex);
    $target = strtolower($r[0]);

    switch ($target) {
      case 'mp3':
        $result = 'audio/'.$target;
        break;
      case 'png':
        $result = 'photo/'.$target;
        break;
      case 'jpeg':
        $result = 'photo/'.$target;
        break;
      case 'jpg':
        $result = 'photo/'.$target;
        break;
      case 'gif':
        $result = 'photo/'.$target;
        break;
      case 'mp4':
        $result = 'video/'.$target;
        break;
      case 'zip':
        $result = 'archive/'.$target;
        break;
    }
    
    return $result;
  }

  public function detect_feed_type($file) {
    $ex = explode('.',$file);
    $r = array_reverse($ex);
    $target = strtolower($r[0]);

    switch ($target) {
      case 'mp3':
        $result = 'single';
        break;
      case 'png':
        $result = 'blog';
        break;
      case 'jpeg':
        $result = 'blog';
        break;
      case 'jpg':
        $result = 'blog';
        break;
      case 'gif':
        $result = 'blog';
        break;
      case 'mp4':
        $result = 'video';
        break;
      case 'zip':
        $result = 'blog';
        break;
    }
    
    return $result;
  }



  function parse_twitter_from_title($title) {
    $earr = explode('-', $title);
    return trim($earr[0]);
  }

  function parse_title_from_title($title) {
    $earr = explode('-', $title);
    return trim($earr[1]);
  }
  function create_slug($string){
   $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
   return $slug;
  }

  function get_slug($string){
   // $slug=preg_replace('/[^A-Za-z0-9-]+/', '', $string);
   $xa = explode(' ', $string);
   $slug = trim($xa[0]);
   // $slug = str_replace(search, replace, subject)
   return $slug;
  }


  function create_url($title, $type='default') {

    $twitter = $this->parse_twitter_from_title($title);
    $title = $this->parse_title_from_title($title);
    if ($type=='short') {
      $result = 'http://freela.be/l/'.$twitter.'/'.$this->create_slug($title);
    } else {
      $result = 'http://freelabel.net/'.$twitter.'/'.$this->create_slug($title);
    }

    return $result;
  }


  public function getPhotoAds($user_name='' , $search_query='advertise registration', $limit=10) {
    include(ROOT.'inc/connection.php');
    $sql = "SELECT *
FROM  `images`
WHERE  `desc` LIKE CONVERT( _utf8 '%$search_query%'
USING latin1 )
COLLATE latin1_swedish_ci AND `user_name` LIKE '%$user_name%' ORDER BY `id` DESC LIMIT $limit";
    $result_stats = mysqli_query($con,$sql);
    $i=0;
    while($row = mysqli_fetch_assoc($result_stats)) {
      $photos[] = $row;
    }

    mysqli_close($con);
    return $photos;
  }

  public function getAds($site='freelabel.net' , $creator='admin') {
    include(ROOT.'inc/connection.php');
      //echo '<pre>';
      //echo 'what the fuck';
    if (strpos($site, 'freelabel.net')) {
      $key = 'photography';
    } elseif(strpos($site, 'thebae.watch')) {
      $key = 'baewatch front';
    } else {
      $key = 'photography';
    }


    $result_stats = mysqli_query($con,"SELECT * FROM `images` WHERE `desc` LIKE '%$key%' AND `user_name` LIKE '%".$creator."%' ORDER BY `id` DESC LIMIT 12");
    $i=0;
    while($row = mysqli_fetch_assoc($result_stats)) {
        //print_r($row);
      $photos[] = $row;
        //echo '<hr>';
    }
    return $photos;
  }

  public function getPhotographyPhotos($key='', $site='http://freelabel.net/') {
    include(ROOT.'inc/connection.php');
      //echo '<pre>';
      //echo 'what the fuck';
    $result_stats = mysqli_query($con,"SELECT * FROM `images` WHERE `desc` LIKE '%$key%' ORDER BY `id` DESC LIMIT 12");
    $i=0;
    while($row = mysqli_fetch_assoc($result_stats)) {
        //print_r($row);
      $photos[] = $row;
        //echo '<hr>';
    }
    return $photos;
  }

  public function findPostsByUser($user_email) {

    include(ROOT.'inc/connection.php');
      //echo '<pre>';
    $result_stats = mysqli_query($con,"SELECT * FROM `feed` WHERE `email` LIKE '%$user_email%' ORDER BY `id` DESC");
    $i=0;
    while($row = mysqli_fetch_assoc($result_stats)) {
        //print_r($row);
      $blog[] = $row;
        //echo '<hr>';
    }
    return $blog;

  }

  public function randomizePosts($page=0, $limit=24, $feed_filter=false, $site=false) {
    //print_r($page);
    //echo '<hr>';
    //echo 'tje sote: '.$site;
    $posts = $this->getPosts($page , $limit,$feed_filter,$site);
    shuffle($posts);
    //print_r($posts);
    return $posts;
    //print_r($new);
  }

  public function display_site_map($site,$user_status,$user_name) {
    // build site map
    $site_map = '';
    $submenu = '';




    switch ($user_status) {
      case true:
        // $site['map'][] = array('title' => 'Home' , 'path'=>'index/index', 'icon'=>'home' );
        $site['map'][] = array('title' => 'Dashboard' , 'path'=>'dashboard/', 'icon'=>'archive'  );
        // $site['map'][] = array('title' => 'Ideas' , 'path'=>'note/', 'icon'=>'pictures'  );
        $site['map'][] = array('title' => 'Promos' , 'path'=>'dashboard/?ctrl=promos', 'icon'=>'archive'  );
        $site['map'][] = array('title' => 'Radio' , 'path'=>'index/radio', 'icon'=>'archive'  );
        $site['map'][] = array('title' => 'Settings' , 'path'=>'login/showprofile', 'icon'=>'cog'  );
        $site['map'][] = array('title' => 'Upload' , 'path'=>'upload/?uid='.$user_name, 'icon'=>'download' );
        $site['map'][] = array('title' => 'Listen' , 'path'=>'index/listen', 'icon'=>'archive'  );

        // $site['map'][] = array('title' => 'Social' , 'path'=>'dashboard/social', 'icon'=>'cog' );

        // $site['map'][] = array('title' => 'About' , 'path'=>'help/index', 'icon'=>'help'  );
        // $site['map']['account'] = array('title' => 'Change Account Type' , 'path'=>'login/changeaccounttype', 'icon'=>'illustrator'  );
        // $site['map']['account'] = array('title' => 'Upload Profile Photo' , 'path'=>'login/uploadavatar', 'icon'=>'illustrator'  );
        // $site['map']['account'] = array('title' => 'Edit Username' , 'path'=>'login/editusername', 'icon'=>'illustrator'  );
        // $site['map']['account'] = array('title' => 'Edit Email' , 'path'=>'login/edituseremail', 'icon'=>'illustrator'  );
        $site['map'][] = array('title' => 'Logout' , 'path'=>'login/logout', 'icon'=>'illustrator'  );
        break;
      case false:
        // $site['map'][] = array('title' => 'Explore' , 'path'=>'index/index', 'icon'=>'home'  );
        $site['map'][] = array('title' => 'Login' , 'path'=>'dashboard/', 'icon'=>'archive'  );
        $site['map'][] = array('title' => 'Register' , 'path'=>'login/register', 'icon'=>'cog'  );
        $site['map'][] = array('title' => 'Upload' , 'path'=>'dashboard/', 'icon'=>'download'  );
        $site['map'][] = array('title' => 'Promos' , 'path'=>'index/promos', 'icon'=>'archive'  );
        $site['map'][] = array('title' => 'Radio' , 'path'=>'index/radio', 'icon'=>'archive'  );
        $site['map'][] = array('title' => 'Listen' , 'path'=>'index/listen', 'icon'=>'archive'  );
        // $site['map'][] = array('title' => 'Upload' , 'path'=>'upload/index', 'icon'=>'download'  );
        // $site['map'][] = array('title' => 'About' , 'path'=>'help/index', 'icon'=>'help'  );
        break;
    }
    //echo $user_name;
    if ($user_name == 'admin' 
      OR $user_name == 'AlexMayo' 
      // OR $user_name == 'Fokus' 
      OR $user_name == 'DrGhostmonious'
      OR $user_name == 'DjSyonKream') {
        // $site['map'][] = array('title' => 'Admin' , 'path'=>'dashboard/admin', 'icon'=>'cog'  );
        $site['map'][] = array('title' => 'Administration' , 'path'=>'dashboard/dev', 'icon'=>'cog'  );
        // $site['map'][] = array('title' => 'Site' , 'path'=>'index/menu', 'icon'=>'cog'  );
    }
    foreach ($site['map'] as $page) {

      $site_map .= '
      <li class="nav-item nav-item-toggable active"">
        <a class="nav-link gn-icon gn-icon-'.$page['icon'].' navi-'.$page['title'].'" href="'.HTTP.'users/'.$page['path'].'" >'.$page['title'].'<span class="sr-only">(current)</span></a>
        '.$submenu.'
      </li>';
    }
    return $site_map;
  }

  public function embedPost($post) {
    switch ($post['type']) {
      case 'single':
      $embedded_post = '
      <audio preload="none" controls>
      <source src="'.$post['trackmp3'].'"></source>
      </audio>';
      $photo = $post['photo'];
      break;
      case 'blog':
      $embedded_post = $post['blogentry'];
      $photo = 'http://freelabel.net/images/'.$post['photo'];
      if (strpos($embedded_post, 'youtube')) {
        $embedded_post = '<iframe src="'.$post['blogentry'].'" style="height:450px;width:100%;margin:auto;display:inline-block;"></iframe>';
      } elseif (strpos($embedded_post, 'livemixtapes')) {
        $embedded_post = 'LMT: '.$post['blogentry'].'';
      }
      break;
      default:
      $embedded_post = $post['blogentry'];
      break;
    } // end switch

    return $embedded_post;
    //print_r($new);
  }



  public function getPhoto($photo) {
    if (strpos($photo, 'freelabel.net')) {
      $photo = $photo;
    } else {
      $photo = 'http://freelabel.net/images/'.$photo;
    }
    return $photo;

  }







  public function getTwitter($post) {
    if ($post['twitter']!='') {
      $twittername = $post['twitter'];
    } else {
      $twittername = 'Error Finding Name!';
    }
    return $twittername;
  }
  public function getTitle($post) {
    if ($post['blogtitle'] == '') {
      $title = $post['trackname'];
    } else {
      $title = $post['blogtitle'];
    }
    return $title;

  }

  public function error($text='There was an error! Our Team is now being informed of the issue! Thank you!') {
    $str = "
    <center style='margin:10% auto;'><h4 style='color:yellow;' class='alert alert-danger'><strong><i class='fa fa-exclamation-circle' ></i> Uh, oh!</h4></strong>
    <p>".$text."</p></center>";
    return $str;
  }



  public function formatBlogEntry($writeup) {
    if(strpos($writeup, 'livemixtapes')) {
      $writeup = '<iframe src="'.$writeup.'" width="100%" height="450px" frameborder=0 seamless></iframe>';
    } elseif(strpos($writeup, 'youtube')) {
      $writeup = '<iframe src="'.$writeup.'" width="100%" height="450px" frameborder=0 seamless></iframe>';
    } elseif(strpos($writeup, 'soundcloud')) {
      $writeup = '<iframe src="'.$writeup.'" width="100%" height="450px" frameborder=0 seamless></iframe>';
    }elseif(strpos($writeup, 'datpiff')) {
      //echo 'datpiff';
      $writeup = '<iframe src="'.$writeup.'" width="100%" height="450px" frameborder=0 seamless></iframe>';
    }elseif(strpos($writeup, 'audiomack')) {
      //echo 'datpiff';
      $writeup = '<iframe src="'.$writeup.'" width="100%" height="450px" frameborder=0 seamless></iframe>';
    } else {
      //$writeup =  'not found';
    }
    return $writeup;
  }




  public function formatTwitter($twittername) {
    $illegals = array("http://", "https://","twitter.com/", "HTTPS://");// "i", "o", "u", "A", "E", "I", "O", "U"
    $twittername = str_replace($illegals, "", $twittername);
    if (strpos($twittername,'@')===false) {
      echo 'No @ name included..';
      $twittername = "@".$twittername;
    } else {
      echo 'its there!';
    }
    return $twittername;
  }




  public function datePosted( $ptime ) {
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
      60                      =>  'minute',
      1                       =>  'second'
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
  public function getRelated($post) {
    $search_query = $post['twitter'];
    $stream_pull = 'related';
    include(ROOT.'singles/related.php');
  }

  public function getTwitpicURL($photo, $text, $url) {
    $_GET['a']  = 'uploadmedia';
    $_GET['f']  = str_replace('http://', '', $photo);
    $_GET['t'] = $text.'

'.$url;
    include(ROOT.'social-test/index.php');
    //exit;
    //print_r($debug);
    return $twitpic;
  }



  public function getUsers() {
    include(ROOT.'inc/huge.php');
    // var_dump($con);
    $query = "SELECT * FROM  `users` ORDER BY `user_id` DESC";
    $result = mysqli_query($con,$query);
    while($row = mysqli_fetch_assoc($result)) {
      $users[] = $row;
    }

    return $users;
  }

  public function getFollowing($user_name) {
    include(ROOT.'inc/connection.php');
    // var_dump($con);
    $query = "SELECT * FROM  `relationships` WHERE `user_name` = '$user_name' ORDER BY `date_created` DESC";
    $result = mysqli_query($con,$query);
    while($row = mysqli_fetch_assoc($result)) {
      $users[] = $row;
    }

    return $users;
  }

  public function getMessages($user_name) {
    include(ROOT.'inc/connection.php');
    // var_dump($con);
    $query = "SELECT * FROM  `messages` WHERE `sender` = '$user_name' OR `receiver` = '$user_name' ORDER BY `date_created` DESC";
    $result = mysqli_query($con,$query);
    while($row = mysqli_fetch_assoc($result)) {
      $users[] = $row;
    }

    return $users;
  }


  public function unfollow($data) {
    $user_name = $data['user_name'];
    $following = $data['following'];
    include(ROOT.'inc/connection.php');
    // var_dump($con);
    $query = "DELETE FROM  `relationships` WHERE `user_name` = '$user_name' AND `following` = '$following' ";
    $result = mysqli_query($con,$query);
    return $result;
  }



  public function debug($data, $esc=FALSE) {

    echo '<details><pre>';
      var_dump($data);
    echo '</pre></details>';
    if ($esc==TRUE) {
      exit;
    }
  }


  public function getPageTitle($data) {
    $a = array_reverse(explode('/', $data));
    if (strpos($a[0], 'index')===false OR $a[0]==='') {
      $pre = '';
    } else {
      $pre = $a[0] .' | ';
    }
    $title = $pre.$a[1]. ' | ';
    return $title;
  }

  public function getPostURL($post) {
    $blog_title = $post['blogtitle'];
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
    $blog_story_url = 'http://freelabel.net/'.$post['twitter'].'/'.$post_title_short;
    return $blog_story_url;

  }


  public function getStatsByID($post_id) {

    include(ROOT.'inc/connection.php');
    $query = "SELECT * FROM  `feed` WHERE  `id` = '$post_id' ORDER BY `id` DESC";
    $result = mysqli_query($con,$query);
    $count=0;
    while($row = mysqli_fetch_assoc($result)) {
      $count = $count + $row['views'];
    }
    $count='<div class="post-item-stats">
                <span class="fa fa-eye text-icon" style="margin-right:1%;"></span>'.$count.' Views
              </div>';
    return $count; 
  }

  public function getStatsByUser($user_name , $range='total') {
    include(ROOT.'inc/connection.php');
    $query = "SELECT * FROM  `feed` WHERE  `user_name` = '$user_name' ORDER BY `id` DESC";
    $result = mysqli_query($con,$query);
    $count=0;
    while($row = mysqli_fetch_assoc($result)) {
      $count = $count + $row['views'];
      $stats['user_twitter'] = $row['user_name'];
    }
    $stats['count'] = $count;
    // echo 'final count: '.$stats['count'];
    // $row = mysqli_fetch_assoc($result);
    // count($row);
    // if (mysqli_num_rows($result)!=0 && $row = mysqli_fetch_assoc($result)) {
    //   $user_twitter = $row['twitter'];
    //   switch ($range) {
    //     case 'total':
    //     $sql = "SELECT * FROM  `stats` WHERE  `page` LIKE  '%$user_twitter%'";
    //     break;

    //     default:
    //     $sql = "SELECT * FROM  `stats` WHERE  `page` LIKE  '%$user_twitter%'";
    //     break;
    //   }
    //   include_once(ROOT.'inc/connection.php');
    //   $resultt = mysqli_query($con, $sql);
    //   if (mysqli_num_rows($resultt) > 0) {
    //         // output data of each row
    //     while($stats = mysqli_fetch_assoc($resultt)) {
    //       $stats_total[] = $stats['count'];
    //     }
    //     $stats['count'] = array_sum($stats_total);
    //     $stats['user_twitter'] = $user_twitter;
    //   } else {
    //           // echo "0 results";
    //   }
    // } else {
    //   $stats = 'No Tracks Uploaded';
    // }
    return $stats;
  }




  function getShareButtons($post_id,$user_name=FALSE) {
    if ($user_name==false) {
      $user_name = 'admin';
    }
    include(ROOT.'inc/connection.php');
    $search_query = $post_id;
    $result = mysqli_query($con,"SELECT * FROM feed
      WHERE `id` LIKE '%$search_query%'
      ORDER BY `id` DESC LIMIT 1");
    while($row = mysqli_fetch_array($result)){
      $post_data = $row;
          // --------- Scenario Fixes --------- //
      if ($post_data['blogtitle'] != '') {
        $post_title = $post_data['blogtitle'];
      } else {
        $post_title = $post_data['trackname'];
      }
          // --------- $post_title edits --------- //
      $post_title = trim($post_title); $post_title = str_replace('Ft.', 'f.', $post_title);
      $twitter = str_replace(' ', '', trim($post_data['twitter']));
      $post_photo = $post_data['photo'];
      $post_mp3 = $post_data['trackmp3'];
      $post_id_db = $post_data['id'];
      $post_views = $post_data['views'];
      $page_views = '';
      $twitpic = $post_data['twitpic'];
      if (strpos($twitpic, 'cards.twitter')) {
        $twitpic = '';
      }
      $post_blogentry = $post_data['blogentry'];
      $post_title_array = explode(' ', $post_title);
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
      $page_url = 'FREELABEL.net/'.$twitter.'/'.$post_title_short;
      $page_url_short = $page_url;
          //$page_url_short = 'FREELA.BE/L/'.$twitter.'/'.$post_title_short;
          // TWITTER SHARE
$twitter_share = "#FLMAG | ".$twitter.'

'.$post_title.'

'.$page_url_short.'

'.$twitpic;
      $twitter_share = urlencode($twitter_share);
      $current_likes = 0;
      $share_buttons = '
      <!--<span onclick="openShare(\''.$post_id.'\')" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-retweet"></span> SHARE</span>-->
      <span id="post_'.$post_id.'" class="mag-view-buttons row" style="display:block;">
        <a class="btn btn-social col-md-4 btn-twitter fa fa-twitter" target="_blank" href="https://twitter.com/intent/tweet?text='.$twitter_share.'"></a>
        <a class="btn btn-social col-md-4 btn-tumblr fa fa-tumblr" target="_blank" href="http://www.tumblr.com/share/photo?source='.$post_photo.'&caption=%3Ca%20href%3D%22freelabel.net%22%3E'.urlencode($twitter).' '.urlencode($post_title).'%0A%0Afreelabel.net%3C%2Fa%3E%0A%0A'.urlencode($post_blogentry).'&name='.urlencode($twitter).' '.urlencode($post_title).'"></a>
        <a class="btn btn-social col-md-4 btn-facebook fa fa-facebook" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u='.$page_url.'"></a>

      <a class="btn btn-social btn-default btn-google-plus fa fa-heart-o" target="_blank" href="#'.$post_id.'" style="display:none;"></a>
      <a id="like_button'.$post_id.'" class="btn btn-social btn-default btn-facebook" href="'.$post_mp3.'#" onclick="likePost('.$post_id.', '.$current_likes.' , \''.$user_name.'\')" style="display:none;">
      <i class=" glyphicon glyphicon-save"></i>
      </a>
      </span>
      ';
    }
      //print_r($post_data);
      //echo 'found data!';

    return $share_buttons;

  }



  function share_page_button($page_title, $page_url) {
    // $page_url = 'here is the share button ' . $page_url;
    $twitter_share = urlencode($page_title . ' - ' . $page_url);
    $buttons = '<a class="btn btn-social btn-twitter fa fa-twitter" target="_blank" href="https://twitter.com/intent/tweet?text='.$twitter_share.'"></a>';
    return $buttons;
  }



  function getShareButtonsList($post_id,$user_name=FALSE) {
    if ($user_name==false) {
      $user_name = 'admin';
    }
    include(ROOT.'inc/connection.php');
    $search_query = $post_id;
    $result = mysqli_query($con,"SELECT * FROM feed
      WHERE `id` LIKE '%$search_query%'
      ORDER BY `id` DESC LIMIT 1");
    while($row = mysqli_fetch_array($result)){
      $post_data = $row;
          // --------- Scenario Fixes --------- //
      if ($post_data['blogtitle'] != '') {
        $post_title = $post_data['blogtitle'];
      } else {
        $post_title = $post_data['trackname'];
      }
          // --------- $post_title edits --------- //
      $post_title = trim($post_title); $post_title = str_replace('Ft.', 'f.', $post_title);
      $twitter = str_replace(' ', '', trim($post_data['twitter']));
      $post_photo = $post_data['photo'];
      $post_mp3 = $post_data['trackmp3'];
      $post_id_db = $post_data['id'];
      $post_views = $post_data['views'];
      $page_views = '';
      $twitpic = $post_data['twitpic'];
      if (strpos($twitpic, 'cards.twitter')) {
        $twitpic = '';
      }
      $post_blogentry = $post_data['blogentry'];
      $post_title_array = explode(' ', $post_title);
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
      $page_url = 'FREELABEL.net/'.$twitter.'/'.$post_title_short;
      $page_url_short = $page_url;
          //$page_url_short = 'FREELA.BE/L/'.$twitter.'/'.$post_title_short;
          // TWITTER SHARE
$twitter_share = "#FLMAG | ".$twitter.'

'.$post_title.'

'.$page_url_short.'

'.$twitpic;
      $twitter_share = urlencode($twitter_share);
      $current_likes = 0;
      $share_buttons = '
        <li><a class="share-button btn-twitter fa fa-twitter" target="_blank" href="https://twitter.com/intent/tweet?text='.$twitter_share.'"></a></li>
        <li><a class="share-button btn-tumblr fa fa-tumblr" target="_blank" href="http://www.tumblr.com/share/photo?source='.$post_photo.'&caption=%3Ca%20href%3D%22freelabel.net%22%3E'.urlencode($twitter).' '.urlencode($post_title).'%0A%0Afreelabel.net%3C%2Fa%3E%0A%0A'.urlencode($post_blogentry).'&name='.urlencode($twitter).' '.urlencode($post_title).'"></a></li>
        <li><a class="share-button btn-facebook fa fa-facebook" target="_blank"  href="https://www.facebook.com/sharer/sharer.php?u='.$page_url.'"></a></li>
        <li><a class="share-button btn-foursquare fa fa-heart-o share-post-button" data-type="like"   data-toggle="modal" data-target="#loginModal" href="#" ></a></li>
        <li><a class="share-button btn-openid fa fa-plus share-post-button" data-toggle="modal" data-type="add" data-target="#loginModal" href="#"
        id="'.$post_id.'"
        data-user="'.$user_name.'"
        data-filepath="'.$post_mp3.'" 
        data-filetitle="'.$post_title.'"
         ></a></li>

      <a id="like_button'.$post_id.'" class="btn btn-social btn-default btn-facebook" href="'.$post_mp3.'#" onclick="likePost('.$post_id.', '.$current_likes.' , \''.$user_name.'\')" style="display:none;">
      <i class=" glyphicon glyphicon-save"></i>
      </a>
      </span>
      ';
    }
      //print_r($post_data);
      //echo 'found data!';

    return $share_buttons;

  }




  public function get_user_promos($user_name) {

    include(ROOT.'inc/connection.php');
      //echo '<pre>';
    $result_stats = mysqli_query($con,"SELECT * FROM `images` WHERE `user_name` = '$user_name' ORDER BY `id` DESC");
    $i=0;
    while($row = mysqli_fetch_assoc($result_stats)) {
        //print_r($row);
      $promos[] = $row;
        //echo '<hr>';
    }
    return $promos;

  }



  public function getStatsByTitle($user_twitter, $blog_title) {
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
            $view = '
              <hr>
              <div class="post-item-stats">
                <span class="fa fa-eye text-icon" style="margin-right:1%;"></span>'.$stats_display. " Views
                <br>
                <span class='fa fa-clock-o text-icon' style='margin-right:1%;'></span>" . $this->get_timeago(strtotime($stats_visited))." since last played<br>
              </div>";
        } else {
            // echo "0 results";
        }
    return $view;
  }




  public function build_input($params) {
    $output = '';
    // var_dump($params);
    // exit;
    foreach ($params as $value) {
      if (isset($value['type']) && $value['type']!=='') {
        $type=$value['type'];
      } else {
        $type='text';
      }

      $output .= '
      <input name="'.$value['name'].'" class="form-control" type="'.$type.'"  id="'.$value['id'].'"  placeholder="'.$value['label'].'" autocomplete="off"/>';
    }

    return $output;
  }


    public function build_dropdown($params,$name='') {
    $output = '';
    $output .= '<select name="'.$name.'" class="form-control">';
    foreach ($params as $value) {
      $output .= '<option value="'.$value['id'].'">'.$value['title'].'</option>';
    }
    $output .= '</select>';
    return $output;
  }


  public function display_title($meta, $editable=FALSE) {
    if ($editable == TRUE) {
      $editable = 'editable';
    } else {
      $p = ' href="'.$meta['blog_story_url'].'#" ';
      // $p = 'te';
    }
    $output = '';
    $output .= '<a '.$p.' id="blogtitle-'.$meta['id'].'" class="'.$editable.' list-title" >'.$meta['blogtitle'].'</a>';
    $output .= '<a '.$p.' id="twitter-'.$meta['id'].'" class="'.$editable.' list-twitter" >'.$meta['twitter'].'</a>';
    if (isset($meta['writeup']) && $meta['writeup']!=='') {
      // $output .= '<a '.$p.' id="writeup-'.$meta['id'].'" class="'.$editable.' list-writeup" >View Description</a>';
      // $output .= '<a '.$p.' id="writeup-'.$meta['id'].'" class="'.$editable.' list-writeup" >'.$meta['writeup'].'</a>';
    }

    //print_r($meta);
    //$this->debug($meta);
    // foreach ($params as $value) {
    //   $output .= '<span id="title-id-'.$value['id'].'" class="editable" >'.$value['blogtitle'].'</span>';
    //   // $output .= '<span id="twitter-id-'.$value['id'].'" class="editable" >'.$value['twitter'].'</span>';
    // }

    return $output;
  }


  public function display_audio_player() {
    $build = '
<div id="jquery_jplayer_1" class="jp-jplayer"></div>
<div id="jp_container_1" class="jp-audio" role="application" aria-label="media player">
  <div class="jp-type-single">
    <div class="jp-gui jp-interface">
      <div class="jp-volume-controls">
        <button class="jp-mute" role="button" tabindex="0">mute</button>
        <button class="jp-volume-max" role="button" tabindex="0">max volume</button>
        <div class="jp-volume-bar">
          <div class="jp-volume-bar-value"></div>
        </div>
      </div>
      <div class="jp-controls-holder">
        <div class="jp-controls">
          <button class="jp-play" role="button" tabindex="0">play</button>
          <button class="jp-stop" role="button" tabindex="0">stop</button>
        </div>
        <div class="jp-progress">
          <div class="jp-seek-bar">
            <div class="jp-play-bar"></div>
          </d
        </div>
        <div class="jp-current-time" role="timer" aria-label="time">&nbsp;</div>
        <div class="jp-duration" role="timer" aria-label="duration">&nbsp;</div>
        <div class="jp-toggles">
          <button class="jp-repeat" role="button" tabindex="0">repeat</button>
        </div>
      </div>
    </div>
    <div class="jp-details">
      <div class="jp-title" aria-label="title">&nbsp;</div>
    </div>
    <div class="jp-no-solution">
      <span>Update Required</span>
      To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
    </div>
  </div>
</div>
';
  return $build;
  }



  public function getUserURL($user_name) {
    if (isset($user_name)) {
      $user_data = 'http://freelabel.net/u/'.$user_name;
    }
    return $user_data;
  }





  public function display_controls($meta, $type='default') {
    $output = '';
    $all_tags = '';
    $mtags = explode(' ', $meta['tags']);

    // GENERATE TAGS
    if (is_array($mtags) && $mtags>1) {
      foreach ($mtags as $tag) {
        $all_tags .= '<button class="btn btn-default btn-xs" style="padding:5px 10px;">'.$tag.'</button>';
      }
    } else {
      $all_tags = $meta['tags'];
    }

    // GENERATE BUTTONS
    if ($this->detect_type($meta['trackmp3'])) {
      // If does not exists, just show STREAM button

      //echo 'what da hell '.$meta['trackmp3'];
      //print_r(!$this->detect_type($meta['trackmp3']));
      $controls_text = '<i class="fa fa-play" ></i>';
      // echo '<br>';
    } else {
      // If AUDIO FILE exists, just show PLAY Controls
      //print_r($this->detect_type($meta['trackmp3']));
      $controls_text = '<i class="fa fa-play" ></i>PLAY';
      // echo 'no <br>';
    //  echo 'NOONE: '.$meta['trackmp3'].'<br>';
    }

    // echo '<pre>';
    // print_r($meta);
    // echo '</pre>';

   // $url = "http://freelabel.net/'.$meta['twitter'].'";
    $title = $meta['twitter'].' - '.$meta['blogtitle'];
    // $url = $this->get_slug($title);
    $url = $this->getPostURL($meta);
// $output .= '<div id="controls-'.$meta['id'].'" class="btn btn-default btn-xs controls-close m-b-md" data-src="'.$meta['trackmp3'].'" ><i class="fa fa-close" ></i></div>';
// $output .= '<div id="controls-'.$meta['id'].'" class="btn btn-default btn-xs btn-secondary-outline controls-play m-b-md" data-src="'.$meta['trackmp3'].'" >'.$controls_text.'</div>';
// $output .= '<div id="controls-'.$meta['id'].'" class="btn btn-default btn-xs btn-secondary-outline controls-like m-b-md" data-src="'.$meta['trackmp3'].'" ><i class="fa fa-heart" ></i></div>';
$output .= '<a id="controls-'.$meta['id'].'" href="'.$url.'" target="_blank" class="btn btn-xs controls-audio-view m-b-md" data-id="'.$meta['id'].'" ><i class="fa fa-eye" ></i></a>';
// $output .= '<div id="controls-'.$meta['id'].'" class="btn btn-xs controls-options m-b-md" data-src="'.$meta['trackmp3'].'" ><i class="fa fa-share-alt" ></i></div>';
$output .= '

<div class="dropdown">
  <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    <i class="fa fa-share-alt" ></i>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
    '.$this->getShareButtonsList($meta['id']).'
  </ul>
</div>

';



if (isset($type) && $type=='user') {
  // $output .= '<a href="#" id="'.$meta['id'].'" data-user="'.$meta['user_name'].'" data-filepath="'.$meta['trackmp3'].'" data-filetitle="'.$meta['blogtitle'].'" class="attach-post-button btn btn-xs m-b-md"><i class="fa fa-paperclip"></i></a>';
  // $output .= '<a href="#" id="'.$meta['id'].'" data-user="'.$meta['user_name'].'" data-filepath="'.$meta['trackmp3'].'" data-filetitle="'.$meta['blogtitle'].'" class="attach-post-button btn btn-xs m-b-md"><i class="fa fa-plus"></i></a>';
  $output .= '<div id="controls-'.$meta['id'].'" class="btn btn-xs controls-audio-delete m-b-md" data-id="'.$meta['id'].'" ><i class="fa fa-trash" ></i></div>';

  // $output .= '<a id="controls-'.$meta['id'].'" href="'.$url.'" target="_blank" class="btn btn-xs controls-audio-view m-b-md" data-id="'.$meta['id'].'" ><i class="fa fa-eye" ></i></a>';
}
    // $output .= $this->display_audio_player();
    //$output .= '<span id="tags-'.$meta['id'].'" class="editable list-tags" >'.$all_tags.'</span>';
    //print_r($meta);
    //$this->debug($meta);
    // foreach ($params as $value) {
    //   $output .= '<span id="title-id-'.$value['id'].'" class="editable" >'.$value['blogtitle'].'</span>';
    //   // $output .= '<span id="twitter-id-'.$value['id'].'" class="editable" >'.$value['twitter'].'</span>';
    // }

    return $output;
  }



  public function display_file_options($file_id, $user_name,$file_path, $file_title) {
    $output='';
    // $output .= '<div id="controls-'.$file['id'].'" class="btn btn-default btn-xs controls-close m-b-md" data-src="'.$file['url'].'" ><i class="fa fa-close" ></i></div>';
    // $output .= '<div id="controls-'.$meta['id'].'" class="btn btn-default btn-xs btn-secondary-outline controls-play m-b-md" data-src="'.$meta['trackmp3'].'" >'.$controls_text.'</div>';
    // $output .= '<div id="controls-'.$meta['id'].'" class="btn btn-default btn-xs btn-secondary-outline controls-like m-b-md" data-src="'.$meta['trackmp3'].'" ><i class="fa fa-heart" ></i></div>';
    // $output .= '<div id="controls-'.$file['id'].'" class="btn btn-xs controls-options m-b-md" data-src="'.$file['url'].'" ><i class="fa fa-cog" ></i></div>';
    // $output .= '<a href="#" id="'.$file_id.'" class="file-option push-file-button"><i class="fa fa-plus"></i></a>';
    // $output .= '<a href="#" id="'.$file_id.'" data-user="'.$user_name.'" data-filepath="'.$file_path.'" data-filetitle="'.$file_title.'" class="file-option share-file-button"><i class="fa fa-feed"></i></a>';
    // $output .= '<a href="#" id="'.$file_id.'" data-user="'.$user_name.'" data-filepath="'.$file_path.'" data-filetitle="'.$file_title.'" class="file-option share-file-button"><i class="fa fa-paperclip"></i></a>';
    
    // $output .= '<a href="#" id="'.$file_id.'" data-user="'.$user_name.'" data-filepath="'.$file_path.'" data-filetitle="'.$file_title.'" class="file-option share-file-button"><i class="fa fa-star-o"></i></a>';
    $output .= '<a href="#" id="'.$file_id.'" data-user="'.$user_name.'" data-filepath="'.$file_path.'" data-filetitle="'.$file_title.'" class="file-option share-file-button"><i class="fa fa-feed"></i></a>';
    // $output .= '<a href="#" id="'.$file_id.'" data-user="'.$user_name.'" data-filepath="'.$file_path.'" data-filetitle="'.$file_title.'" class="file-option share-file-button"><i class="fa fa-send"></i></a>';
    $output .= '<a href="#" id="'.$file_id.'" class="file-option delete-file-button"><i class="fa fa-trash"></i></a>';

    return $output;
  }




  public function display_promo_options($file_id, $user_name,$file_path, $file_title) {
    $output='';
    // $output .= '<div id="controls-'.$file['id'].'" class="btn btn-default btn-xs controls-close m-b-md" data-src="'.$file['url'].'" ><i class="fa fa-close" ></i></div>';
    // $output .= '<div id="controls-'.$meta['id'].'" class="btn btn-default btn-xs btn-secondary-outline controls-play m-b-md" data-src="'.$meta['trackmp3'].'" >'.$controls_text.'</div>';
    // $output .= '<div id="controls-'.$meta['id'].'" class="btn btn-default btn-xs btn-secondary-outline controls-like m-b-md" data-src="'.$meta['trackmp3'].'" ><i class="fa fa-heart" ></i></div>';
    // $output .= '<div id="controls-'.$file['id'].'" class="btn btn-xs controls-options m-b-md" data-src="'.$file['url'].'" ><i class="fa fa-cog" ></i></div>';
    // $output .= '<a href="#" id="'.$file_id.'" class="file-option push-file-button"><i class="fa fa-plus"></i></a>';
    // $output .= '<a href="#" id="'.$file_id.'" data-user="'.$user_name.'" data-filepath="'.$file_path.'" data-filetitle="'.$file_title.'" class="file-option share-file-button"><i class="fa fa-share-alt"></i></a>';
    $output .= '<a href="#" data-id="'.$file_id.'" class="file-option attach-promo-files-button" ><i class="fa fa-plus"></i></a>';
    $output .= '<a href="#" data-id="'.$file_id.'" class="file-option edit-promo-button" ><i class="fa fa-pencil"></i></a>';
    $output .= '<a href="http://freelabel.net/users/index/image/'.$file_id.'#" id="'.$file_id.'" class="file-option view-promo-button" target="_blank" ><i class="fa fa-eye"></i></a>';
    $output .= '<a href="#" id="'.$file_id.'" class="file-option delete-promo-button"><i class="fa fa-trash"></i></a>';

    return $output;
  }

}








































/**
*
*/
class Config
{

  function __construct()
  {
    include_once(ROOT.'config/index.php');
    $todays_date = date('Y-m-d');
    if (!isset($_SESSION)) {
      // start_session();
      $user_name_session = $_SESSION['user_name'];
    }
  }



  function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }






	public function getRadioPlayer($version='') {
		if ($version=='dev') {
		$radio = '<div class="navbar navbar-default navbar-fixed-bottom radio-player" style="background-color:rgba(0,0,0, 0.8);">
					<!--<span class="col-md-4 radioplayer-iframe" ><script src="https://embed.radio.co/player/89b0bab.js"></script></span>-->

						<span class="radioplayer" data-src="http://streaming.radio.co/s95fa8cba2/listen"
							data-autoplay="false"
							data-playbutton="true"
							data-volumeslider="true"
							data-elapsedtime="true"
							data-nowplaying="true"
							data-showplayer="false"
							data-volume="40">
						</span>
					<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
				<script src="https://public.radio.co/playerapi/jquery.radiocoplayer.min.js"></script>

				<a href="#closeplayer" class="nav navbar-nav navbar-right close-player-trigger">Close Player</a>
				<script>
					$(function(){
						$(".radio-player-trigger").click(function(event){
							//event.preventDefault();
							alert("here");
							$(".radio-player").toggle("fast");
						});
						var radioplayer = $(".radioplayer").radiocoPlayer();
						radioplayer.event("audioLoaded",radioplayer.play());
						//console.log("The Radio");
						console.log(radioplayer);
					});
					</script>
				</div>';
	} else {
		$radio = '<div class="navbar navbar-default navbar-fixed-bottom radio-player" style="background-color:rgba(0,0,0, 0.8);">
				<span class="col-md-8"><a href="#closeplayer" class="nav navbar-nav navbar-left close-player-trigger">Close Player</a></span>
				<span class="col-md-4 radioplayer-iframe navbar-right" ><script src="https://embed.radio.co/player/89b0bab.js"></script></span>

				<script>
					$(function(){
						$(".radio-player-trigger").click(function(event){
							event.preventDefault();
							alert("okay what the hell is going on");
							$(".radio-player").toggle("fast");
						});
						var radioplayer = $(".radioplayer").radiocoPlayer();
						radioplayer.event("audioLoaded",radioplayer.play());
						//console.log("The Radio");
						console.log(radioplayer);
					});
					</script>
				</div>';
	}

		$radio='';
		return $radio;
	}

  public function loadScript($user) {
    if (isset($user)==false) {            // 1.1 - Check If User Isset
      $app_build = 'No User Defined!';      // 1.2 - Throw Error Message
    } else {
      $app_build = '';
      include(ROOT.'inc/connection.php');  // 2.1 - Pull Script From Database
      $query = "SELECT * FROM script ORDER BY `id` DESC LIMIT 1";
      $result = mysqli_query($con,$query);
      $i=1;
      if($row = mysqli_fetch_assoc($result)) {
        foreach ($row as $script_text) {
          $script[] = $script_text;
        }
        foreach ($script as $key => $value) {
          $app_build  .= '<li class="script-responses"><a href="http://freelabel.net/som/index.php?dm=1&t='.$user.'&text='.$script[$key].'" target="_blank" class="btn-default btn-xs" role="menuitem" tabindex="-1" ><span class="glyphicon glyphicon-question-sign"></span>  '.$key.'): '.urldecode(substr($script[$key],0,80)).'...</a></li>';
        }

      } else {
        // 2.3 Throw Error if Does Not Exist
      }
    }
    return $app_build;
  }

  public function loadScriptPromos($user) {
    if (isset($user)==false) {            // 1.1 - Check If User Isset
      $app_build = 'No User Defined!';      // 1.2 - Throw Error Message
    } else {
      $app_build = '';
      include(ROOT.'inc/connection.php');  // 2.1 - Pull Script From Database
      $query = "SELECT * FROM images WHERE `desc` LIKE '%current-promo%' ORDER BY `id` DESC LIMIT 5";
      $result = mysqli_query($con,$query);
      $i=1;
      if($row = mysqli_fetch_assoc($result)) {
        // foreach ($row as $key => $value) {
        $message = $row['title']. ' - http://freelabel.net/users/index/image/'.$row['id'];
          $app_build  .= '<li class="script-responses"><a href="http://freelabel.net/som/index.php?dm=1&t='.$user.'&text='.urlencode($message).'" target="_blank" class="btn-default btn-xs" role="menuitem" tabindex="-1" ><span class="glyphicon glyphicon-question-sign"></span>  @'.$user.' '.urldecode(substr($row['title'],0,80)).'...</a></li>';
        // }
      } else {
        // 2.3 Throw Error if Does Not Exist
      }
    }
    return $app_build;
  }


  public function saveTwitterTokens($data, $user) {
    $sql= "INSERT INTO  `hugee`.`twitter_api` (
      `twitter_screen_name` ,
      `access_token`,
      `oauth_token_secret`
      )
      VALUES (
        '$data[screen_name]', '$data[oauth_token]', '$data[oauth_token_secret]'
      )";
    include(ROOT.'inc/huge.php');
    print_r($sql);
    echo '<hr>';
    // var_dump($data);

    if (mysqli_query($con, $sql)) {
      $status = true;
        //echo "New record created successfully";
    } else {
      $status = false;
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
    return $status;
  }











  public function twitterLogin() {
      /* Load required lib files. */
      include_once($_SERVER['DOCUMENT_ROOT'].$_SERVER['REQUEST_URI'].'/config/index.php');
      require_once(ROOT.'som/twitteroauth/twitteroauth.php');
      // require_once('config.php');
      $config = new Config();
      /* If Access Tokens are not available redirect to connect page. */
      if (empty($_SESSION['access_token']) || empty($_SESSION['access_token']['oauth_token']) || empty($_SESSION['access_token']['oauth_token_secret'])) {
          $url_suffix = "$_SERVER[REQUEST_URI]";
          //echo $url_suffix;
          header('Location: ./clearsessions.php');
      }

      echo '<pre>';
      /* Get user access tokens out of the session. */
      $access_token = $_SESSION['access_token'];
      print_r($_SESSION);

      // $save_twitter_tokens = $config->saveTwitterTokens($access_token);

      if ($save_twitter_tokens == true) {
        echo 'the tokens saved!';
      } else {
        echo 'the tokens did not save!!!!';
      }
      echo '<br>';

      print_r($_COOKIE);
    return $result;
  }


  public function getLeads($count='100') {

      $app_build = '';
      include(ROOT.'inc/connection.php');  // 2.1 - Pull Script From Database
      $query = "SELECT * FROM leads ORDER BY `id` DESC LIMIT 12";
      $result = mysqli_query($con,$query);
      $i=1;
      if($row = mysqli_fetch_assoc($result)) {
        foreach ($row as $script_text) {
          $script[] = $script_text;
        }
        foreach ($script as $key => $value) {
          $app_build  .= '<li><a href="http://freelabel.net/som/index.php?dm=1&t='.$user.'&text='.$script[$key].'" target="_blank" class="btn btn-default btn-xs col-md-2 " role="menuitem" tabindex="-1" ><span class="glyphicon glyphicon-question-sign"></span>  '.$key.'): '.urldecode(substr($script[$key],0,80)).'...</a></li>';
        }
        $app_build    .='<hr>';
        foreach ($script as $key => $value) {
          $app_build  .= '<li><a href="http://freelabel.net/som/index.php?post=1&t='.$user.'&text=@'.$user.' '.$script[$key].'" target="_blank" class="btn btn-default btn-xs" role="menuitem" tabindex="-1" ><span class="glyphicon glyphicon-plus"></span>  '.$key.'): '.urldecode(substr($script[$key],0,20)).'...</a></li>';
        }

      } else {
        // 2.3 Throw Error if Does Not Exist
      }
    return $app_build;
  }


  public function getCurrentPeriod() {
      //$current_time       = date('h:s:i');
    $current_time       = date('H');
      $duration_of_period = 4; // hours
      $total_periods      = 24 / $duration_of_period;
      $period['count'] = $total_periods . ' Periods Per Day';
      $period['duration'] = $total_periods . ' Hours Per Period';
      $period['current'] = 'Current Hour: '.$current_time;


      if($current_time >=0 AND $current_time < 4) {
        $period['id'] = 1;
        $period['class'] = 'Respond To Clients';
      }elseif($current_time >=4 AND $current_time < 8) {
        $period['id'] = 2;
        $period['class'] = 'SOM Execute';
      }elseif($current_time >=8 AND $current_time < 12) {
        $period['id'] = 3;
        $period['class'] = 'Post To Blog';
      } elseif ($current_time >=12 AND $current_time < 16) {
        $period['id'] = 4;
        $period['class'] = 'Live Radio Broadcasting';
        $period['app_link'] = 'http://freelabel.net/som/index.php?som=1&stayopen=1&mins=4&live=1';
      } elseif($current_time >=16 AND $current_time < 20) {
        $period['id'] = 5;
        $period['class'] = 'Content Production';
      } elseif($current_time >=20 AND $current_time < 24) {
        $period['id'] = 6;
        $period['class'] = 'Web Development';
      }
      $period['class'] = $period['class'];
      $period['elapsed'] =  round(60 * ((($period['id']+1) * 6) / $current_time)).' Minutes Remaining';

      echo '<a href="'.$period['app_link'].'" class="btn btn-lg btn-primary" target="_blank" >Start '.$period['class'].'</a>';
      echo '<script>window.open("http://freelabel.net/som/index.php?som=1&stayopen=1&mins=4&organic=1&recent=1");</script>';
      return $period;
    }
    public function showAdminController() {
      $user_name_session = 'admin';
      $build= "
<panel style='z-index:10000;'>
    <button onclick=\"loadPage('http://freelabel.net/twitter/index.php', '#main_display_panel', 'dashboard', '".$user_name_session."','','', 'twitter')\" class='btn btn-default lead_control widget_menu col-md-2 col-xs-6' alt='Leads'  class='btn btn-default lead_control widget_menu' alt='Navigation'>
    <i class=\"fa fa-twitter\"></i>
    Twitter
    </button>

    <button onclick=\"loadPage('http://freelabel.net/rssreader/cosign.php', '#main_display_panel', 'dashboard', '".$user_name_session."','','', 'rss')\" class='btn btn-default lead_control widget_menu col-md-2 col-xs-6' alt='Leads'  class='btn btn-default lead_control widget_menu' alt='Navigation'>
    <i class=\"fa fa-rss\"></i>
    RSS
    </button>

    <button onclick=\"loadPage('http://freelabel.net/submit/views/db/leads.php', '#main_display_panel', 'dashboard', '".$user_name_session."', '','', 'leads')\" class='btn btn-default lead_control widget_menu col-md-2 col-xs-6'  alt='Leads'  class='btn btn-default lead_control widget_menu' alt='Navigation'>
    <i class=\"fa fa-money\"></i>
    Leads
    </button>

    <button onclick=\"loadPage('http://freelabel.net/submit/views/db/current_clients.php', '#main_display_panel', 'dashboard', '".$user_name_session."', '','', 'clients')\" class='btn btn-default lead_control widget_menu col-md-2 col-xs-6' alt='Leads'  class='btn btn-default lead_control widget_menu' alt='Navigation'>
    <i class=\"fa fa-user\"></i>
    Clients
    </button>

    <button onclick=\"loadPage('http://freelabel.net/x/s.php', '#main_display_panel', 'dashboard', '".$user_name_session."', '','', 'script')\" class='btn btn-default lead_control widget_menu col-md-2 col-xs-6' alt='Leads'  class='btn btn-default lead_control widget_menu' alt='Navigation'>
    <i class=\"fa fa-file-text-o\"></i>
    Script
    </button>

    <button onclick=\"loadPage('http://freelabel.net/x/submissions.php', '#main_display_panel', 'dashboard', '".$user_name_session."')\" class='btn btn-default lead_control widget_menu col-md-2 col-xs-6' alt='Leads'  class='btn btn-default lead_control widget_menu' alt='Navigation'>
    <i class=\"fa fa-database\"></i>
    Uploads
    </button>
</panel>";
    return $build;
    }


    public function getCurrentCampaign() {
      include(ROOT.'inc/connection.php');
      $sql = "SELECT *
        FROM  `schedule`
        WHERE  `user_name`='admin' AND `type` LIKE '%Release%' AND 'showcase_day' LIKE '%$todays_date%' ORDER BY `id` DESC
        LIMIT 1";
      $result = mysqli_query($con,$sql);
      if ($row = mysqli_fetch_assoc($result)){
        $campaign = $row['event_title'] . ' | '.$row['description'];
            //print_r($row);
      } else {
        $campaign = 'No Profile Found!!';
      }
      return $campaign;
    }


  }








/**
* -------------- User Dashboard Class -------------- //
*/
class UserDashboard
{


  function __construct($sessiondata)
  {
   include_once(ROOT.'config/index.php');
   //$this->session =  $sessiondata;
   $this->user_name = $sessiondata;
 }
 public function getUserCookies($cookie_user_name) {
  if (isset($cookie_user_name)) {
    $user_name_session = $cookie_user_name;
      //$_SESSION['user_name'] = $user_name_session;
  } else {
    $user_name_session ='no cookie!';
  }
  return $user_name_session;
}

public function getProfilePhoto($user_name) {
  include(ROOT.'inc/connection.php');
  $result = mysqli_query($con,"SELECT * FROM user_profiles
    WHERE `id` LIKE '%$user_name%'
    ORDER BY `id` DESC LIMIT 1");
  if ($row = mysqli_fetch_array($result)){
    $photo = $row['photo'];
  } else {
    $photo = 'No Profile Picture Uploaded!';
  }
  return $photo;
}

public function getUserData($user_name) {
  include(ROOT.'inc/connection.php');
  $sql = "SELECT *
FROM  `users`
WHERE  `user_name` LIKE  '%$user_name%'
LIMIT 0 , 30";
  $result = mysqli_query($con,$sql);
  if ($row = mysqli_fetch_assoc($result)){
    $user_data = $row;
        //print_r($row);
  } else {
    $user_data = 'No Profile Found!!!';
  }
  return $user_data;
}






public function getUserStats($user_name , $range='total') {
  include(ROOT.'inc/connection.php');
  $query = "SELECT * FROM feed WHERE user_name='".$user_name."' ORDER BY `id` DESC LIMIT 25";
  $result = mysqli_query($con,$query);
    print_r($result);
  if (mysqli_num_rows($result)!=0 && $row = mysqli_fetch_assoc($result)) {
    $user_twitter = $row['twitter'];
    switch ($range) {
      case 'total':
      $sql = "SELECT * FROM  `stats` WHERE  `page` LIKE  '%$user_twitter%'";
      break;

      default:
      $sql = "SELECT * FROM  `stats` WHERE  `page` LIKE  '%$user_twitter%'";
      break;
    }
    include_once(ROOT.'inc/connection.php');
    $resultt = mysqli_query($con, $sql);
    if (mysqli_num_rows($resultt) > 0) {
          // output data of each row
      while($stats = mysqli_fetch_assoc($resultt)) {
        $stats_total[] = $stats['count'];
      }
      $stats = array_sum($stats_total);
    } else {
            // echo "0 results";
    }
  } else {
    $stats = 'No Tracks Uploaded';
  }
  return $stats;
}




public function getUserMedia($user_name) {

  include(ROOT.'inc/connection.php');
  $result = mysqli_query($con,"SELECT * FROM  `feed` WHERE  `user_name` LIKE  '$user_name' ORDER BY `id` DESC LIMIT 10");
  while ($row = mysqli_fetch_assoc($result)){
    $user_media[] = $row;
  }
  if (!isset($user_media)) {
    $user_media = NULL;
  }
  return $user_media;
}

public function getUserUploadOptions($user_name_session) {
  $upload_options = "
    <!--<h1 class='panel-heading'>Uploads</h1>-->
      <nav class='btn-group upload-options'>
        <a href='http://upload.freelabel.net/?uid=". $_SESSION['user_name']. "' target='_blank' class='btn btn-success btn-lg col-md-4 col-xs-4'>      <span class=\"glyphicon glyphicon-plus\"></span> Upload</a>
        <a href='#photos' onclick=\"loadPage('http://freelabel.net/submit/views/db/user_photos.php', '#main_display_panel', 'dashboard', '". $user_name_session. "','','','pics')\" class='btn btn-default btn-lg col-md-4 col-xs-4'>        <span class=\"glyphicon glyphicon-camera\"></span> Photos</a>
        <a href='#music' onclick=\"loadPage('http://freelabel.net/submit/views/db/recent_posts.php', '#main_display_panel', 'dashboard', '". $user_name_session. "','','','posts')\" class='btn btn-default btn-lg col-md-4 col-xs-4'>      <span class=\"glyphicon glyphicon-music\"></span> Music</a>
      </nav>
    ";
  return $upload_options;
}



  function getCustomData($user) {
    if ($user['custom']=='') {
      $data = "<a onclick=\"loadPage('http://freelabel.net/twitter/index.php', '#main_display_panel', 'dashboard', '".$user_name_session."')\" class='btn btn-twitter btn-lg col-md-3'>    <span class='fa fa-twitter'></span>Twitter</a>";
      $data .= "<a onclick=\"loadPage('http://freelabel.net/twitter/index.php', '#main_display_panel', 'dashboard', '".$user_name_session."')\" class='btn btn-instagram btn-lg col-md-3'>    <span class='fa fa-twitter'></span>Instagram</a>";
      $data .= "<a onclick=\"loadPage('http://freelabel.net/twitter/index.php', '#main_display_panel', 'dashboard', '".$user_name_session."')\" class='btn btn-facebook btn-lg col-md-3'>    <span class='fa fa-twitter'></span>Facebook</a>";
      $data .= "<a onclick=\"loadPage('http://freelabel.net/twitter/index.php', '#main_display_panel', 'dashboard', '".$user_name_session."')\" class='btn btn-google btn-lg col-md-3'>    <span class='fa fa-google-plus'></span>Google+</a>";



      $data .= '<form action="http://freelabel.net/config/update.php" method="POST" name="instagram"><input type="text" placeholder="Enter Your Instagram Username.." name="instagram" class="form-control"></form>';
    } else {
      $data = '<form></form>';
    }
    return $data;
  }
}
























class UploadFile {

  public function __construct() {
    include_once($_SERVER['DOCUMENT_ROOT'].$_SERVER['REQUEST_URI'].'/config/index.php');
    // require_once ROOT . 'users/vendor/autoload.php';
    //$sprite = new ThumbnailSprite();
        //$thumb_app = new Facebook(array('appId' => 'FACEBOOK_LOGIN_APP_ID', 'secret' => 'FACEBOOK_LOGIN_APP_SECRET'));
    $user = new User();

  }

  public function checkIfUserExists($userNameToFind) {
    include_once($_SERVER['DOCUMENT_ROOT'].$_SERVER['REQUEST_URI'].'/config/index.php');
    $user = new User();
    if ($user->userExists($userNameToFind) == true) {
      return true;
    } else {
      return false;
    }
  }

  public function handleSyntax($file) {
    // CONFIGURATIONS
    $file['submission_date'] = date('Y-m-d H:s:i');
    $file['blog_post_key'] = rand(1000000000,9999999999);

    // detect file type
    if ( strpos($file['trackmp3'], 'mp3') ) {
      $file['type']='single';
    } else {
      $file['type']='blog';
    }

    // TRIM WHITESPACE
    $file['twitter'] = trim($file['twitter']);
    $file['trackname'] = trim($file['trackname']);

    // DELETE INVALID CHARACTERS //$invchars = array("","@",":","/","&","'"); //$file['trackname'] = str_replace($invchars, '', $file['trackname']);

    if (substr($file['twitter'], 0, 1) !== '@') {
      echo substr($file['twitter'], 0, 1);
      
      $file['twitter'] = '@'.$file['twitter'];
    } else {
      $file['twitter'] = $file['twitter'];
    }

    // CREATE QUICK URLS
    $shortname = explode(' ',$file['trackname']);
    $file['blog_story_url'] = 'http://freelabel.net/'.$file['twitter'].'/'.$shortname[0];
    $invchars = array(" ","@",":","/","&","'");
    $file['playerpath'] = 'http://freelabel.net/x/'.$file['twitter'].'/'.str_replace($invchars, "-", $file['trackname']).'/';
    // $file['twitpic'] = $this->getTwitpicURL($file);
    // echo $fixedtitle;
    // print_r($file); exit;
    return $file;

  }
  public function saveToDatabase($file) {

    $sql= "INSERT INTO  `blog` (
      `id` ,
      `type` ,
      `blog_story_url` ,
      `blogtitle` ,
      `trackmp3` ,
      `twitter` ,
      `trackname` ,
      `user_name` ,
      `email` ,
      `phone` ,
      `submission_date`,
      `twitpic`,
      `photo`,
      `playerpath`,
      `blog_post_key`
      )
      VALUES (
      NULL , '$file[type]', '$file[blog_story_url]', '$file[trackname]' , '$file[trackmp3]', '$file[twitter]', '$file[trackname]', '$file[user_name]', '$file[email]', '$file[phone]', '$file[submission_date]', '$file[twitpic]', '$file[photo]', '$file[playerpath]', '$file[blog_post_key]'
      )";
    include(ROOT.'inc/connection.php');
    if (mysqli_query($con, $sql)) {
      $status = true;
        //echo "New record created successfully";
    } else {
      $status = false;
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
    return $status;
  }

  /*
  * handle photo upload
  */
  public function handlePhotoUpload($file) {
      $config = new Blog();
      unset($file['trackmp3']);
      $file['writeup'] = $file['blogentry'];
      $file['blog_story_url'] = 'http://freela.be/l/'.$file['twitter'].'/';
      $file['submission_date'] = date('Y-m-d H:s:i');
      if ($file['type']=='video') {
        $file['blogentry'] = '<video src="'.$file['photo'].'" controls preload="metadata" loop=1 class="blog-post-media-video"></video>';
      } elseif($file['type']=='photo') {
        $file['blogentry'] = '<img src="'.$file['photo'].'" class="blog-post-media-image">';
      }

      // get twitpic url
      $file['twitpic'] = $this->getTwitpicURL($file);

      // add $file['filetype']
      $file['filetype'] = $config->detect_file_type($file['photo']);

      if ($this->saveToBackUpDatabase($file)) {
        echo 'YES NIGGA!';
        return $file;
      } else {
        echo 'NO NIGGA!!!';
        return FALSE;
      }
      

  }

  public function saveToBackUpDatabase($file) {
    include(ROOT.'inc/connection.php');
    $sql= "INSERT INTO  `feed` (
      `id` ,
      `type` ,
      `blog_story_url` ,
      `blogtitle` ,
      `trackmp3` ,
      `twitter` ,
      `trackname` ,
      `user_name` ,
      `email` ,
      `phone` ,
      `submission_date`,
      `twitpic`,
      `photo`,
      `playerpath`,
      `blog_post_key`,
      `blogentry`,
      `filetype`,
      `writeup`
      )
      VALUES (
      NULL , '$file[type]', '$file[blog_story_url]', '$file[trackname]' , '$file[trackmp3]', '$file[twitter]', '$file[trackname]', '$file[user_name]', '$file[email]', '$file[phone]', '$file[submission_date]', '$file[twitpic]', '$file[photo]', '$file[playerpath]', '$file[blog_post_key]', '$file[blogentry]','$file[filetype]','$file[writeup]'
      )";
    include(ROOT.'inc/connection.php');
    if (mysqli_query($con, $sql)) {
      $status = true;
        //echo "New record created successfully";
    } else {
      $status = false;
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
    return $status;
  }


  /*
  *
  * FTP Upload to Radio
  *   
  * Upload Media to Twitter API
  *
  */
  public function uploadToRadio($file) {
    $fileupload = $file['trackmp3'];
    $todays_date  = date('Ymd');
    $ftp_server   =   "pink.radio.co"; 
    $ftp_user_name  =   "s95fa8cba2.uf29485319"; 
    $ftp_user_pass  =   "d111ea334e75"; 

    // REMOTE PATH FORMAT
    if ($file['user_name'] == 'admin') { 
      // ADMIN or STAFF UPLOAD
      $remote_file = 'production/'.$file['twitter']." - ".$file['trackname'].".mp3"; 
      $debug[] = "Uploading to ".$remote_file;

    } elseif($file['user_name'] != 'submission') {
      // PAID UPLOAD
      $remote_file = 'clients/'.$file['twitter']." - ".$file['trackname'].".mp3"; 
      $debug[] = "Uploading to ".$remote_file;
    } elseif($file['user_name'] == 'submission') {
      // SUBMISSION UPLOAD
      $remote_file = 'submissions/'.$file['twitter']." - ".$file['trackname'].".mp3"; 
      $debug[] = "Uploading to ".$remote_file;
    }
    if ($fileupload && $remote_file) {
      // do nothing
    } else {
      $debug[] = 'There is No Set File!';
      //print_r($file);
      //print_r($fileupload);
      //print_r($remote_file);

    }


    // -------------- set up basic connection 
    $conn_id = ftp_connect($ftp_server); 

    // login with username and password 
    $login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass); 

    // upload a file 
    if (ftp_put($conn_id, $remote_file, $fileupload, FTP_BINARY)) { 
      $ftp_status = true;
        $debug[] = "FTP successfully uploaded $file<br><br>Uploaded to: $remote_file"; 
    } else { 
      $ftp_status = false;
        $debug[] = "There was a problem while uploading $file\n"; 
        exit; 
        } 
    // -------------- Closing the basic connection 
    ftp_close($conn_id); 


    //print_r($file);
    //echo 'This is gone work, nigga.';
    //exit;
    return $ftp_status;
  }
  public function getTwitpicURL($file) {
    $_GET['a']  = 'uploadmedia';
    $_GET['f']  = str_replace('http://', '', $file['photo']);
    $_GET['t'] = '[NEW] '.$file['twitter']. '

'.$file['trackname'].'

'.$file['blog_story_url'];
    
    include(ROOT.'social-test/index.php');
    //exit;
    //print_r($debug);
    return $twitpic;
  }



  public function sendMail($emailToSendTo, $trackname, $twittername, $trackmp3, $photo , $phone) {


    include(ROOT.'mailer/PHPMailerAutoload.php');
    $mail_message_body = '
    <html>
      <head>
        <link rel="stylesheet" type="text/css" href="http://freelabel.net/css/normalize.css">
          <link rel="stylesheet" type="text/css" href="http://freelabel.net/bootstrap-3.3.4/dist/css/bootstrap.css"> 
          <link rel="stylesheet" type="text/css" href="http://freelabel.net/bootstrap-3.3.4/dist/css/bootstrap-theme.min.css">
          <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
          <link rel="stylesheet" type="text/css" href="http://freelabel.net/css/bootstrap-social/bootstrap-social.css">
          <link rel="stylesheet" type="text/css" href="http://freelabel.net/css/style.css">
      </head>

      <body>
        <header>
          <img src="http://freelabel.net/images/fllogo.png" style="width:200px;display:block;margin:auto;">
        </header>
        <hr>
        <img src="'.$photo.'" style="width:100%;display:block;margin:auto;">
        <h1>[NEW] "'.$trackname.'" - '.$twittername.'</h1>
        <h3>Your music has been successfully added to the FREELABEL library. <a href="http://freelabel.net/'.$twittername.'" class="btn btn-primary btn-success">View Now</a></h3>
        <p>For stats, booking single, project releases, or interviews, you will need to proceed with creating an account at FREELABEL. <a href="http://freelabel.net/" class="btn btn-primary btn-success">Create An Account</a></p>
      </body>
      <details>
        <p>Phone: '.$phone.'<p>
        <p>Twitter: '.$twittername.'<p>
      </details>
      <hr>
      <footer>
        FREELABEL Staff<br>
        info@freelabel.net<br>
        (347)-994-0267
      </footer>
    </html>';

    //Create a new PHPMailer instance
    $mail = new PHPMailer;
    // Set PHPMailer to use the sendmail transport
    $mail->isSendmail();
    //Set who the message is to be sent from
    $mail->setFrom('info@freelabel.net', 'FREELABEL SUBMISSIONS');
    //Set an alternative reply-to address
    $mail->addReplyTo('replyto@freelabel.com', 'FREELABEL SUBMISSIONS');
    //Set who the message is to be sent to
    $mail->addAddress($emailToSendTo, 'ARTIST: '.$twittername);
    //Set the subject line
    $mail->Subject = $twittername.' - "'.$trackname.'" was Added to FREELABEL!';
    $mail->AddBCC('notifications@freelabel.net', $name = "FL Staff");
    //Read an HTML message body from an external file, convert referenced images to embedded,
    //convert HTML into a basic plain-text alternative body
    $mail->msgHTML($mail_message_body);
    //Replace the plain text body with one created manually
    $mail->AltBody = 'This is a plain-text message body';
    //Attach the uploaded file
    $mail->addAttachment($trackmp3);

    //send the message, check for errors
    if (!$mail->send()) {
      $result=true;
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
      $result=false;
        //echo "Message sent to ".$emailToSendTo;
    }
    return $result;


  }

  public function watermarkImage ($file) { 
    // $SourceFile, $WaterMarkText, $DestinationFile
     $SourceFile = $file['photo'];
     $WaterMarkText = 'FREELABEL.NET';
     $DestinationFile = $_SERVER['DOCUMENT_ROOT'].$_SERVER['REQUEST_URI'].'/test/uploads/'.$file['twitter'].'-'.rand(11111,99999);
     list($width, $height) = getimagesize($SourceFile);
     $image_p = imagecreatetruecolor($width, $height);
     $image = imagecreatefromjpeg($SourceFile);
     imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width, $height); 
     $black = imagecolorallocate($image_p, 0, 0, 0);
     $font = 'opensans.ttf';
     $font_size = 30; 
     imagettftext($image_p, $font_size, 0, 10, 40, $black, $font, $WaterMarkText);
     if ($DestinationFile<>'') {
        imagejpeg ($image_p, $DestinationFile, 100); 
     } else {
        header('Content-Type: image/jpeg');
        imagejpeg($image_p, null, 100);
     };
     imagedestroy($image); 
     imagedestroy($image_p); 
     return $DestinationFile;
  }


  public function createthumb($name,$filename,$new_w,$new_h) {

    $filename = str_replace('http://freelabel.net/', $_SERVER['DOCUMENT_ROOT'].$_SERVER['REQUEST_URI'].'/', $filename);
    $name = str_replace('http://freelabel.net/', $_SERVER['DOCUMENT_ROOT'].$_SERVER['REQUEST_URI'].'/', $name);

    $system=explode('.',$name);
    if (preg_match('/jpg|jpeg/',$system[1])){
      $src_img=imagecreatefromjpeg($name);
    }
    if (preg_match('/png/',$system[1])){
      $src_img=imagecreatefrompng($name);
    }

    $old_x=imageSX($src_img);
    $old_y=imageSY($src_img);
    if ($old_x > $old_y) {
      $thumb_w=$new_w;
      $thumb_h=$old_y*($new_h/$old_x);
    }
    if ($old_x < $old_y) {
      $thumb_w=$old_x*($new_w/$old_y);
      $thumb_h=$new_h;
    }
    if ($old_x == $old_y) {
      $thumb_w=$new_w;
      $thumb_h=$new_h;
    }

    $dst_img=ImageCreateTrueColor($thumb_w,$thumb_h);
    imagecopyresampled($dst_img,$src_img,0,0,0,0,$thumb_w,$thumb_h,$old_x,$old_y);


    if (preg_match("/png/",$system[1])) {
      imagepng($dst_img,$filename); 
    } else {
      imagejpeg($dst_img,$filename); 
    }
    imagedestroy($dst_img); 
    imagedestroy($src_img); 
    $dest = str_replace($_SERVER['DOCUMENT_ROOT'].$_SERVER['REQUEST_URI'].'/', 'http://freelabel.net/', $filename);
    return $dest;
  }





}




