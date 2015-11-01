<?php 
//date_default_timezone_set('America/Chicago');
$page_url ='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
if ($page_url == 'http://thebae.watch/') {
  define("ROOT", $_SERVER["DOCUMENT_ROOT"] ."/");

  define("SITE", 'http://thebae.watch/');
  define("SITE_NAME", 'THEBAE.WATCH');
  define("SITE_SHORT", 'thebae.watch');
  define("HTTP", ($_SERVER["SERVER_NAME"] == "localhost")
   ? "http://localhost:8888/"
   : "http://thebae.watch/"
   ); 
} else {
  define("ROOT", $_SERVER["DOCUMENT_ROOT"] ."/");
  define("SITE", 'http://freelabel.net/');
  define("SITE_SHORT", 'FREELABEL.net');
  define("SITE_NAME", 'FREELABEL');
  define("HTTP", ($_SERVER["SERVER_NAME"] == "localhost")
   ? "http://localhost:8888/"
   : "http://freelabel.net/"
   );
}



/*  USER CREDENTIALS PROCESSING
* checks if users is logged in 
* if so, include the display iinto a $content variable
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

  public function init($_SESSION='none', $_COOKIE='none') {

    // check if if session exists, 
    if (isset($_SESSION['user_name'])) {
      // set cookie to remember username
      setcookie("fl-user-name", $_SESSION['user_name'], time()+3600 *24*30);  /* expire in 30 days */
      setcookie("fl-user-email", $_SESSION['user_email'], time()+3600 *24*30);  /* expire in 30 days */
      setcookie("fl-user-id", $_SESSION['user_id'], time()+3600 *24*30);  /* expire in 30 days */
      //echo 'session is set';
    } elseif (isset($_COOKIE['fl-user-name'])) {
      //$_SESSION['user_name'] = $_COOKIE['fl-user-name'];
      $_SESSION['user_logged_in'] = 0;
      //$_SESSION['user_email'] = $_COOKIE['fl-user-email'];
      //$_SESSION['user_id'] = $_COOKIE['fl-user-id'];
      //echo 'cookie is set';
    } else {
      // set cookie data
      setcookie("fl-viewer-id", $this->generateRandomString(20), time()+3600 *24*30);  /* expire in 30 days */
      //setcookie("fl-viewer-id", $this->generateRandomString(10), time()+3600 *24*30);  /* expire in 30 days */
      //print_r($_COOKIE);
      //echo '<hr>';
    }

    // check if cookie exists,



    if ($_SESSION=='none') {
      echo 'none';
    }else {
     // echo 'something '.$_SESSION;
      //print_r($_COOKIE);
    }

    // save to global site variables
    $user_data['session'] = $_SESSION['user_name'];
    $user_data['user_logged_in'] = $_SESSION['user_logged_in'];
    $user_data['cookie'] = $_COOKIE['fl-user-name'];
    $user_data['name'] = $_COOKIE['fl-user-name'];
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
      $sql = "INSERT INTO  `amrusers`.`user_subscribers` (
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
    //$this->site = $this->getSiteData($site);
  }
  public function getSiteData($site_name='freelabel.net') {
    if (strpos($site_name, 'landing/')==true OR strpos($site_name, 'index.php')==true) {
      $site_name = str_replace('landing/', '', $site_name);
      $site_name = str_replace('index.php', '', $site_name);
    }
    switch ($site_name) {
      case 'freelabel.net':
        $site['name'] = 'FREELABEL';
        $site['description'] = 'The Leaders In Innovative Online Showcasing';
        $site['bio'] = "FREELABEL is more than just a streaming Magazine + Radio + TV Network. We help you and millions of others discover new music & create better content than ever before! Just login account and start browsing, no strings attached!";
        $site['logo'] = $this->getSiteLogo($site_name);
        $site['http'] = 'http://freelabel.net/';
        $site['domain'] = 'freelabel.net';
        $site['twitter'] = '@freelabelnet';
        $site['title'] = 'FREELABEL';
        $site['creator'] = 'admin';
        $site['primary-color'] = '#FE3F44';

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
    if ($site == 'http://freelabel.net/' OR $site =='http://upload.freelabel.net/' OR $site =='http://freelabel.net/' OR $site =='http://freela.be/') {
      $logo = 'http://freelabel.net/upload/server/php/files/fllogo-favicon.png';
    } elseif ($site == 'http://amradiolive.com/' OR $site =='http://upload.amradiolive.com/' OR $site =='http://amradiolive.com/') {
      $logo = 'http://freelabel.net/images/amrlogo.png';
    } else {
      $logo = 'http://freelabel.net/upload/server/php/files/thebaewatch-ico%20%281%29.gif';
    }
    return $logo;
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

  public function getPhotosByUser($user_name='', $limit=6) {

    include(ROOT.'inc/connection.php');
      //echo '<pre>';
    $result_stats = mysqli_query($con,"SELECT * FROM `images` WHERE `user_name` LIKE '%$user_name%' ORDER BY `id` DESC LIMIT $limit");
    $i=0;
    while($row = mysqli_fetch_assoc($result_stats)) {
        //print_r($row);
      $photos[] = $row;
        //echo '<hr>';
    }
    return $photos;
  }

  public function getPhotoAds($user_name='' , $search_query='advertise registration') {
    include(ROOT.'inc/connection.php');
      //echo '<pre>';
    $sql = "SELECT * 
FROM  `images` 
WHERE  `desc` LIKE CONVERT( _utf8 '%$search_query%'
USING latin1 ) 
COLLATE latin1_swedish_ci AND `user_name` LIKE '%$user_name%' ORDER BY `id`";
    //$sql = "SELECT * FROM `images` WHERE `user_name` LIKE '$user_name' AND `desc` LIKE '%$%' ORDER BY `id` DESC";
    $result_stats = mysqli_query($con,$sql);
    $i=0;
    while($row = mysqli_fetch_assoc($result_stats)) {
        //print_r($row);
      $photos[] = $row;
       // echo '<hr>';

    }
    //echo '<br>'.$sql.'<br>';
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
    $blog_story_url = 'http://freela.be/l/'.$post['twitter'].'/'.$post_title_short;
    return $blog_story_url;

  }



  function getShareButtons($post_id) {

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
      <span id="post_'.$post_id.'" class="mag-view-buttons" style="display:block;">
      <!--<span class="btn btn-warning" target="_blank" >'.$post_views.'</span>-->
      <a class="btn btn-social btn-twitter" target="_blank" href="https://twitter.com/intent/tweet?screen_name=&text='.$twitter_share.'">
      <i class="fa fa-twitter"></i>
      </a>
      <a class="btn btn-social btn-tumblr" target="_blank" href="http://www.tumblr.com/share/photo?source=http%3A%2F%2Ffreelabel.net%2Fimages%2F'.$post_photo.'&caption=%3Ca%20href%3D%22freelabel.net%22%3E'.urlencode($twitter).' '.urlencode($post_title).'%0A%0Afreelabel.net%3C%2Fa%3E%0A%0A'.urlencode($post_blogentry).'&name='.urlencode($twitter).' '.urlencode($post_title).'">
      <i class="fa fa-tumblr"></i>
      </a>
      <a class="btn btn-social btn-facebook" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u='.$page_url.'">
      <i class="fa fa-facebook"></i>
      </a>
      <a class="btn btn-social btn-default btn-google-plus" target="_blank" href="#'.$post_id.'">
      <i class=" glyphicon glyphicon-user"></i>
      </a>
      <a class="btn btn-social btn-default btn-facebook" href="#" onclick="likePost('.$post_id.', '.$current_likes.' , \''.$_SESSION['user_name'].'\')" style="display:none;">
      <i class=" glyphicon glyphicon-save"></i>
      </a>
      </span>
      ';
    } 
      //print_r($post_data);
      //echo 'found data!';

    return $share_buttons;

  }

}







































/**
* 
*/
class Config 
{

  function __construct()
  {
    include_once('/home/content/59/13071759/html/config/index.php');
    $todays_date = date('Y-m-d');
    $user_name_session = $_SESSION['user_name'];
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
          $app_build  .= '<li><a href="http://freelabel.net/som/index.php?dm=1&t='.$user.'&text='.$script[$key].'" target="_blank" class="btn btn-default btn-xs col-md-2 " role="menuitem" tabindex="-1" ><span class="glyphicon glyphicon-question-sign"></span>  '.$key.'): '.urldecode(substr($script[$key],0,80)).'...</a></li>';
        }
        $app_build    .='<hr>';
        foreach ($script as $key => $value) {
          $app_build  .= '<li><a href="http://freelabel.net/som/index.php?post=1&t='.$user.'&text=@'.$user.' '.$script[$key].'" target="_blank" class="btn btn-default btn-xs" role="menuitem" tabindex="-1" ><span class="glyphicon glyphicon-plus"></span>  '.$key.'): '.urldecode(substr($script[$key],0,20)).'...</a></li>';
        }

      } else {
        // 2.3 Throw Error if Does Not Exist
      }
    }
    return $app_build;
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
      echo "
    <!--
    <a onclick=\"loadPage('http://freelabel.net/upload/jquery-ui.php', '#main_display_panel', 'dashboard', '".$user_name_session."')\" class='btn btn-default lead_control widget_menu' alt='Leads'><span class=\"glyphicon glyphicon-cloud-download\">2</span></a>
    <a onclick=\"loadPage('http://freelabel.net/submit/upload/register.php', '#main_display_panel', 'dashboard', '".$user_name_session."')\" class='btn btn-default lead_control widget_menu' alt='Leads'><span class=\"glyphicon glyphicon-cloud-upload\"></span>3</a>
    -->
    <!--<button onclick=\"loadPage('http://freelabel.net/user/views/edit.php', '#main_display_panel', 'dashboard', '".$user_name_session."')\" class='btn btn-default lead_control widget_menu' alt='Leads'  class='btn btn-default lead_control widget_menu' alt='Navigation'>
    <span class=\"glyphicon glyphicon-list\"></span>
    <label class='label navi-label' >Edit</label>
    </button>

    <button onclick=\"loadPage('http://freelabel.net/mag/view/liked_posts.php', '#main_display_panel', 'dashboard', '".$user_name_session."')\" class='btn btn-default lead_control widget_menu' alt='Leads'  class='btn btn-default lead_control widget_menu' alt='Navigation'>
    <span class=\"fa fa-heart\"></span>
    <label class='label navi-label' >Liked</label>
    </button>
    -->

    <button onclick=\"loadPage('http://freelabel.net/twitter/index.php', '#main_display_panel', 'dashboard', '".$user_name_session."','','', 'twitter')\" class='btn btn-default lead_control widget_menu col-md-2 col-xs-4' alt='Leads'  class='btn btn-default lead_control widget_menu' alt='Navigation'>
    <span class=\"fa fa-twitter\"></span>
    <label class='label navi-label' >Twitter</label>
    </button>

    <button onclick=\"loadPage('http://freelabel.net/rssreader/cosign.php', '#main_display_panel', 'dashboard', '".$user_name_session."','','', 'rss')\" class='btn btn-default lead_control widget_menu col-md-2 col-xs-4' alt='Leads'  class='btn btn-default lead_control widget_menu' alt='Navigation'>
    <span class=\"fa fa-rss\"></span>
    <label class='label navi-label' >RSS</label>
    </button>

    <button onclick=\"loadPage('http://freelabel.net/submit/views/db/leads.php', '#main_display_panel', 'dashboard', '".$user_name_session."', '','', 'leads')\" class='btn btn-default lead_control widget_menu col-md-2 col-xs-4'  alt='Leads'  class='btn btn-default lead_control widget_menu' alt='Navigation'>
    <span class=\"fa fa-money\"></span>
    <label class='label navi-label' >Leads</label>
    </button>

    <button onclick=\"loadPage('http://freelabel.net/submit/views/db/current_clients.php', '#main_display_panel', 'dashboard', '".$user_name_session."', '','', 'clients')\" class='btn btn-default lead_control widget_menu col-md-2 col-xs-4' alt='Leads'  class='btn btn-default lead_control widget_menu' alt='Navigation'>
    <span class=\"fa fa-user\"></span>
    <label class='label navi-label' >Clients</label>
    </button>

    <button onclick=\"loadPage('http://freelabel.net/x/s.php', '#main_display_panel', 'dashboard', '".$user_name_session."', '','', 'script')\" class='btn btn-default lead_control widget_menu col-md-2 col-xs-4' alt='Leads'  class='btn btn-default lead_control widget_menu' alt='Navigation'>
    <span class=\"fa fa-file-text-o\"></span>
    <label class='label navi-label' >Script</label>
    </button>

    <button onclick=\"loadPage('http://freelabel.net/x/submissions.php', '#main_display_panel', 'dashboard', '".$user_name_session."')\" class='btn btn-default lead_control widget_menu col-md-2 col-xs-4' alt='Leads'  class='btn btn-default lead_control widget_menu' alt='Navigation'>
    <span class=\"fa fa-database\"></span>
    <label class='label navi-label' >Uploads</label>
    </button>
    <!-- <a onclick=\"loadPage('http://freelabel.net/test/player/index.php', '#main_display_panel', 'dashboard', '".$user_name_session."')\" class='btn btn-default lead_control widget_menu' alt='Leads'><span class=\"glyphicon glyphicon-music\"></span></a>
    <a onclick=\"loadPage('http://freelabel.net/mag/stream.php', '#main_display_panel', 'dashboard', '".$user_name_session."')\" class='btn btn-default lead_control widget_menu' alt='Leads'><span class=\"glyphicon glyphicon-globe\"></span></a>
    <a onclick=\"loadPage('http://freelabel.net/submit/views/db/blog_poster.php?leads=today', '#main_display_panel', 'dashboard', '".$user_name_session."')\" class='btn btn-default lead_control widget_menu' alt='Leads'><span class=\"fa fa-edit\"></span></a>
    <a onclick=\"loadPage('http://freelabel.net/submit/views/db/lead_conversion.php?leads=today', '#main_display_panel', 'dashboard', '".$user_name_session."')\" class='btn btn-default lead_control widget_menu' alt='Leads'><span class=\"glyphicon glyphicon-usd\"></span></a>
    <a class='btn btn-default lead_control widget_menu' onclick=\"loadPage('http://freelabel.net/rssreader/cosign.php?control=update&rss=1', '#main_display_panel', 'mag', '".$user_name_session."')\" alt='RSS' ><span class=\"fa fa-rss\"></span></a>
    <a class='btn btn-default lead_control widget_menu schedule' onclick=\"loadWidget('schedule')\" alt='Schedule'><span class=\"fa fa-calendar\"></span></a>
    <a class='btn btn-default lead_control widget_menu twitter' onclick=\"loadWidget('twitter')\" alt='Social Media'><span class=\"fa fa-twitter\"></span></a>
    <a class='btn btn-default lead_control widget_menu submissions' onclick=\"loadWidget('submissions')\" alt='Submissions'><span class=\"glyphicon glyphicon-globe\"></span></a>
    <a class='btn btn-default lead_control widget_menu clients' onclick=\"loadWidget('clients')\" alt='Clients' ><span class=\"glyphicon glyphicon-user\"></span></a>
    <a onclick=\"loadPage('http://freelabel.net/x/s.php', '#lead_widget_container', 'dashboard', 'admin')\" class='btn btn-default lead_control widget_menu' alt='Script'><span class='glyphicon glyphicon-list-alt'></span></a>-->";
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
   include_once('/home/content/59/13071759/html/config/index.php');
   //$this->session =  $sessiondata;
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
  $query = "SELECT * FROM feed WHERE user_name='".$_SESSION['user_name']."' ORDER BY `id` DESC LIMIT 25";
  $result = mysqli_query($con,$query);
    //print_r($result);
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
  return $user_media;
}

public function getUserUploadOptions($user_name_session) {
  $upload_options = "
    <!--<h1 class='panel-heading'>Uploads</h1>-->
      <nav class='btn-group upload-options'>
        <a href='#upload' onclick=\"window.open('http://upload.freelabel.net/?uid=". $_SESSION['user_name']. "')\" class='btn btn-success btn-lg col-md-4 col-xs-4'>      <span class=\"glyphicon glyphicon-plus\"></span> Upload</a>
        <a href='#photos' onclick=\"loadPage('http://freelabel.net/submit/views/db/user_photos.php', '#main_display_panel', 'dashboard', '". $user_name_session. "')\" class='btn btn-default btn-lg col-md-4 col-xs-4'>        <span class=\"glyphicon glyphicon-camera\"></span> Photos</a>
        <a href='#music' onclick=\"loadPage('http://freelabel.net/submit/views/db/recent_posts.php', '#main_display_panel', 'dashboard', '". $user_name_session. "')\" class='btn btn-default btn-lg col-md-4 col-xs-4'>      <span class=\"glyphicon glyphicon-music\"></span> Music</a>
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