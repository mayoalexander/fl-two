<?php 
include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');

$app = new Config();
$config = new Blog();

$access_token['oauth_token'] = '1018532587-qbLJXcpMzhvmFU0xHmmIF1SgSzzfC9CG0NccwXq';
$access_token['oauth_token_secret'] = 'ZZgJzwgPt7jpj3RVPrQYVv2u0E3PPvXRJD2yK9oTXa2r8';
$access_token['screen_name'] = 'FreeLabelNet';
$access_token['user_id'] = '1018532587';
$access_token['x_auth_expires'] = '0';
$_SESSION['access_token'] = $access_token;
$todays_date = date('Y-m-d H:i:s');






require_once(ROOT.'twitter/oauth/twitteroauth.php');
require_once(ROOT.'twitter/config.php');

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