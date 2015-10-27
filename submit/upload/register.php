<?php 
header('Location: http://freelabel.net/user/views/register.php');
exit;
session_start();

if (file_exists('../../../config/index.php')) {
	include_once('../../../config/index.php');
}
if (file_exists('../../config/index.php')) {
	include_once('../../config/index.php');
}
if (file_exists('../config/index.php')) {
	include_once('../config/index.php');
}
if (file_exists('config/index.php')) {
	include_once('config/index.php');
}



//include(ROOT.'user/views/_header.php');

class headerContents 
{
	public $metadata = '<meta name="author" content="FREELABEL">
		<meta name="Description" content="FREELABEL Network is the Leader in Online Showcasing">
		<meta name="Keywords" content="FREELABEL, FREE LABEL, FREE, LABEL, , music, music free, music mp3, music downloads, videos music, mp3 music search, search music, music free downloads,online music, music listen , , soundcloud, promotion, mixtapes, mixtape, worldstar , new music, AMR, AMRecords, Rap, Hip Hop, Showcasing, Good Brand, Get That Good, Good Brand Clothing, Dalls Texas, FREELABEL, amradio, am radio live, texas, music, promotion, hip hop, rap">
		<meta name="Copyright" content="FREELABEL">
		<meta name="Language" content="English">
		<link rel="apple-touch-icon" sizes="57x57" href="http://freelabel.net/ico/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="http://freelabel.net/ico/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="http://freelabel.net/ico/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="http://freelabel.net/ico/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="http://freelabel.net/ico/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="http://freelabel.net/ico/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="http://freelabel.net/ico/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="http://freelabel.net/ico/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="http://freelabel.net/ico/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="http://freelabel.net/ico/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="http://freelabel.net/ico/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="http://freelabel.net/ico/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="http://freelabel.net/ico/favicon-16x16.png">
		<link rel="manifest" href="http://freelabel.net/ico/manifest.json">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="http://freelabel.net/ico/ms-icon-144x144.png">
		<meta name="theme-color" content="#ffffff">
		<link rel="manifest" href="http://freelabel.net/ico/manifest.json">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="http://freelabel.net/ico/ms-icon-144x144.png">
		<meta name="theme-color" content="#ffffff">

  ';
  public function writeMetaData() {
  	echo $this->metadata;
  }
}

class RegisterUser
{
    // property declaration
    public $page_title = 'Registration';
    public $question = array ('
    					<li>
							<label class="fs-field-label fs-anim-upper" for="q1" data-info="Choose a username.">Username</label>
							<input class="fs-anim-lower" id="q1" type="text" name="user_name" placeholder="letters & numbers only ,6 to 20 max.."  required/>
							
							<label class="fs-field-label fs-anim-upper" for="q2" data-info="Make sure your file is in MP3 Format & your ID3 tags are updated to the latest version! (2.4+ or higher)">Email</label>
							<input class="fs-anim-lower" id="q1" type="text" name="user_email" placeholder="Email to send verification code.."  required/>
						</li>',
						'<li>
							<label class="fs-field-label fs-anim-upper" for="q3" data-info="We won\'t send you spam, we promise...">Password</label>
							<input class="fs-anim-lower" id="q3" type="password" name="user_password_new" placeholder="Choose a passsword.."  required/>
							<label class="fs-field-label fs-anim-upper" for="q4" data-info="We won\'t send you spam, we promise...">Confirm Password</label>
							<input class="fs-anim-lower" id="q4" type="password" name="user_password_repeat" placeholder="Re-enter Password" required/>
						</li>');
						/*array ('
    					<li>
							<label class="fs-field-label fs-anim-upper" for="q1" data-info="only letters and numbers, 2 to 64 characters">Username</label>
							<input class="fs-anim-lower" id="q1" type="text" name="user_name" pattern="[a-zA-Z0-9]{2,64}" placeholder="Choose wisely.."  required/>
						</li>',

						'<li>
							<label class="fs-field-label fs-anim-upper" for="q4" data-info="We won\'t send you spam, we promise...">Email</label>
							<input class="fs-anim-lower" id="q4" type="email" name="user_email" placeholder="How we keep you updated.." required/>
						</li>',

						'<li>
							<label class="fs-field-label fs-anim-upper" for="q4" data-info="Choose a password..">Password</label>
							<input class="fs-anim-lower" id="q4" type="password" name="user_password_new" pattern=".{6,}" placeholder="Make it easy to remember.." required/>
							<br><br>
							<label class="fs-field-label fs-anim-upper" for="q4" data-info="Re-enter it..">Confirm Password</label>
							<input class="fs-anim-lower" id="q4" type="password" name="user_password_repeat" pattern=".{6,}" placeholder="Let\'s see if you remember.." required/>
						</li>',
						'<li>
							<!--<img src="http://freelabel.net/user/tools/showCaptcha.php" alt="captcha">-->
							<input type="text" class="fs-anim-lower" name="captcha" required="">
						</li>');*/


    // method declaration
    public function showPageTitle() {
        echo $this->page_title;
    }
    public function showQuestions() {

    	$form = '<form id="myform" class="fs-form fs-form-full" autocomplete="off" method="POST" action="http://freelabel.net/user/register.php" id="registration_form" enctype="multipart/form-data">
					<ol class="fs-fields">';
        foreach ($this->question as $question) {
        	$form .= $question;
        }
        $form .= '</ol><!-- /fs-fields -->
					<input type=\'hidden\' name=\'submit\' value=\'submit\'>
					<input type=\'hidden\' name=\'register\' value=\'Register\'>
					<button class="fs-submit" type="submit">Submit</button>
				</form><!-- /fs-form -->';
		echo $form;
    }
}

class SingleUploader
{
	//private $config = start_session();
	//private $session_details =  print_r($_SESSION);
    // property declaration
    //public $page_title = 'Music Submission';



    public $question = array ('
    					<li>
							<label class="fs-field-label fs-anim-upper" for="q1" data-info="Enter your track name, features, and/or production credits below.">Track Name</label>
							<input class="fs-anim-lower" id="q1" type="text" name="trackname" placeholder="Enter title, features, production, etc..."  required/>
							
							<label class="fs-field-label fs-anim-upper" for="q2" data-info="Make sure your file is in MP3 Format & your ID3 tags are updated to the latest version! (2.4+ or higher)">Upload Audio</label>
							<input style=\'font-size:40%;\' class="fs-anim-lower" id="q2" type="file" name="audiofile" placeholder="" required/>
						</li>',
						'<li>
							<label class="fs-field-label fs-anim-upper" for="q3" data-info="We won\'t send you spam, we promise...">What\'s your phone contact?</label>
							<input class="fs-anim-lower" id="q3" type="text" name="phone" placeholder="Enter Phone Number (ex. 123-456-7890)"  required/>
							<label class="fs-field-label fs-anim-upper" for="q4" data-info="We won\'t send you spam, we promise...">What\'s your email address?</label>
							<input class="fs-anim-lower" id="q4" type="email" name="email" placeholder="Enter Email Address" required/>
						</li>',
						'<li>
							<label class="fs-field-label fs-anim-upper" for="q1">What\'s your @Twittername?</label>
							<input class="fs-anim-lower" id="q1" name="twittername" type="text" placeholder="@typeItHere" required/>
							<label class="fs-field-label fs-anim-upper" for="q2" data-info="We won\'t send you spam, we promise...">Upload Photo // Artwork</label>
							<input style=\'font-size:40%;\' class="fs-anim-lower" id="q2" type="file" name="userphoto" placeholder="" required/>
							<input class="fs-anim-lower" id="q4" type="text" name="twitpic" placeholder="Enter Twitpic (optional)"/>
						</li>');

    // method declaration
    public function showPageTitle() {
        echo $this->page_title;
    }
    public function showQuestions() {

    	if(empty($_SESSION[0])) {
			//echo 'no session. Submission Set';
			$user_name_session = 'submission';
		} else {
			//echo 'YAS session';
		}


    	$form = '<form id="myform" class="fs-form fs-form-full" autocomplete="off" method="POST" action="http://freelabel.net/x/audiomaker.php" id="submissions_form" enctype="multipart/form-data">
					<ol class="fs-fields">';
        foreach ($this->question as $question) {
        	$form .= $question;
        }
        $form .= '</ol><!-- /fs-fields -->

					<input type=\'hidden\' name=\'user_name\' value=\''.$user_name_session.'\'>
					<input type=\'hidden\' name=\'user_rememberme\' value=\'1\'>
					<input type=\'hidden\' name=\'login\' value=\'Login\'>
					<button class="fs-submit" type="submit">Submit</button>
				</form><!-- /fs-form -->';
		echo $form;
    }
}

class UserLoginForm
{
    // property declaration
    public $page_title = 'Login';
    public $question = array ('<li>
							<label class="fs-field-label fs-anim-upper" for="q1" data-info="If you don\'t have an account, you can register at FREELABEL.net">Username</label>
							<input class="fs-anim-lower" id="q1" type="text" name="user_name" placeholder="Welcome back!" style="margin-bottom:10%;"  required/>
							<label class="fs-field-label fs-anim-upper" for="q3" data-info="Do you remember your password?">Password</label>
							<input class="fs-anim-lower" id="q3" type="password" name="user_password" placeholder="Enter your Top Secret Security Clearance password"  required/>
							<p><a href="http://freelabel.net/user/password_reset.php">Forgot Password?</a></p>
							<br><br>
							<br><br>
						</li>');

    // method declaration
    public function showPageTitle() {
        echo $this->page_title;
    }
    public function showQuestions() {


    	$form = '<form id="myform" class="fs-form fs-form-full" autocomplete="off" method="POST" action="http://freelabel.net/user/index.php" id="submissions_form" enctype="multipart/form-data">
					<ol class="fs-fields">';
        foreach ($this->question as $question) {
        	$form .= $question;
        }
        $form .= '</ol><!-- /fs-fields -->

					<input type=\'hidden\' name=\'user_rememberme\' value=\'1\'>
					<input type=\'hidden\' name=\'login\' value=\'Login\'>
					<button class="fs-submit" type="submit">Submit</button>
				</form><!-- /fs-form -->';
		echo $form;
    }
}



switch ($_GET['form']) {
	case 'register':
		$page_contents = new RegisterUser;
		break;
	case 'upload':
		$page_contents = new SingleUploader;
		break;
	case 'login':
		$page_contents = new UserLoginForm;
		break;
	
	default:
		//echo 'No Form Called!';
		$page_contents = new SingleUploader;
		//exit;
		break;
}
$header_contents = new headerContents;
//$page_contents = new SingleUploader;

//echo $page_title = $page_contents->getPageTitle();

?>
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<title><?php $page_contents->showPageTitle(); ?></title>
		<?php $header_contents->writeMetaData(); ?>
		<link rel="shortcut icon" href="<?php echo HTTP; ?>ico/favicon.ico">
		<link rel="stylesheet" type="text/css" href="<?php echo HTTP; ?>submit/upload/css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo HTTP; ?>submit/upload/css/demo.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo HTTP; ?>submit/upload/css/component.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo HTTP; ?>submit/upload/css/cs-select.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo HTTP; ?>submit/upload/css/cs-skin-boxes.css" />
		<style type="text/css">
		body {
			//background-color:#101010;
		}
		.fs-anim-lower {
			color:#e3e3e3;

		}
		</style>
		<script src="<?php echo HTTP; ?>submit/upload/js/modernizr.custom.js"></script>
	</head> 
	<body>
		<div class="container">

			<div class="fs-form-wrap" id="fs-form-wrap">
				<div class="fs-title" >
					<h1><img src="http://freelabel.net/images/FREELABELLOGO.gif" style='width:75px;height:75px;background-color:#FE3F44;padding:10px;display:inline-block;'> <?php $page_contents->showPageTitle(); ?></h1>
					<div class="codrops-top">
						<a class="codrops-icon codrops-icon-prev" href="http://freelabel.net/"><span>Back to FREELABEL</span></a>
						<a class="codrops-icon codrops-icon-info" href="#"><span>This is where you can upload your music directy to our Radio DJs and Magazine Editors.</span></a>
					</div>
				</div>
						
						
				<?php $page_contents->showQuestions(); ?>

						
					
			</div><!-- /fs-form-wrap -->


		</div><!-- /container -->
		<script src="<?php echo HTTP; ?>submit/upload/js/classie.js"></script>
		<script src="<?php echo HTTP; ?>submit/upload/js/selectFx.js"></script>
		<script src="<?php echo HTTP; ?>submit/upload/js/fullscreenForm.js"></script>
		<script>
			(function() {
				var formWrap = document.getElementById( 'fs-form-wrap' );

				[].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {	
					new SelectFx( el, {
						stickyPlaceholder: false,
						onChange: function(val){
							document.querySelector('span.cs-placeholder').style.backgroundColor = val;
						}
					});
				} );

				new FForm( formWrap, {
					onReview : function() {
						classie.add( document.body, 'overview' ); // for demo purposes only
					}
				} );
			})();
		</script>
	</body>
</html>