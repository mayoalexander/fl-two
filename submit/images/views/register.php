<html>
<head>
	<title>..::AMRadioLIVE::..</title>
	
	<meta name="Description" content="AMRadioLIVE is the Leader in Online Showcasing">
	<meta name="Keywords" content="AMRadioLIVE, amradio, am radio live, texas, music, promotion, hip hop, rap">
	<meta name="Copyright" content="AMRadioLIVE">
	<meta name="Language" content="English">
	
	<script type="text/javascript">

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-40470023-1']);
	  _gaq.push(['_setDomainName', 'amradiolive.com']);
	  _gaq.push(['_trackPageview']);

	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();

	</script>
	
<link rel="stylesheet" type="text/css" href="http://amradiolive.com/css/style.css">
<style>
#prices {
	text-align:left;
	opacity:0.8;
	width:100%;
}
td {
	vertical-align:text-top;
	background-color:#e9e9e9;
}
</style>

	<!--scripts START -->
    <script src="/js/accounts.js"></script>
	<!--scripts END -->
</head>

<body>
    <div id="container">
    <div id="breaking"></div>
	<h1 id="logo"><img src="http://amradiolive.com/images/amrhead.png" alt="AMRadioLIVE"></h1>
	<div id="breaking"></div>
        
        <div id="vertical"></div>
        
        <h2 id="subtitle">Create An Account</h2>
        <table id="body">
            <tr>
                <td>


				<table cellspacing="0";margin="0";cellpadding="0" >
				    <tr>
				        <td><img width="100%" src="../images/webpage.png"> </td>
				        <td><img width="100%" src="../images/tweety.png"> </td>
				        <td><img width="100%" src="../images/mainstream.png"> </td>
				        <td><img width="100%" src="../images/showtime.png"> </td>
				    </tr>
				</table>

<hr>






                    
                    
				<!-- errors & messages --->
				<?php

				// show negative messages
				if ($registration->errors) {
				    foreach ($registration->errors as $error) {
				        echo $error;    
				    }
				}

				// show positive messages
				if ($registration->messages) {
				    foreach ($registration->messages as $message) {
				        echo $message;
				    }
				}

				?>
				<!-- errors & messages --->
				<h2>Register</h2>
				<!-- register form -->
				<form method="post" action="register.php" name="registerform">   

				    <!-- the user name input field uses a HTML5 pattern check -->
				    <label for="login_input_username">Username (only letters and numbers, 2 to 64 characters)</label><br>
				    <input id="login_input_username" class="login_input" type="text" pattern="[a-zA-Z0-9]{2,64}" name="user_name" required />

				    <!-- the email input field uses a HTML5 email type check -->
				    <label for="login_input_email">User's email</label><br>
				    <input id="login_input_email" class="login_input" type="email" name="user_email" required />        

				    <label for="login_input_password_new">Password (min. 6 characters)</label><br>
				    <input id="login_input_password_new" class="login_input" type="password" name="user_password_new" pattern=".{6,}" required autocomplete="off" />  

				    <label for="login_input_password_repeat">Repeat password</label><br>
				    <input id="login_input_password_repeat" class="login_input" type="password" name="user_password_repeat" pattern=".{6,}" required autocomplete="off" />        
				    <input type="submit"  name="register" value="Register" />

				</form>

				<!-- backlink -->
				<a id="joinbutton" href="index.php">Back to Login Page</a>
				<br>
					


			</td>
		</tr>
	</table>
        
        
        
        
        
        
        
        

    </div>
    
<div id="navigator">
		    <ul id="navigation" >
            <script src="/js/navigation.js"></script>
            </ul>
</div>
<div id=""></div>
<div id="footer">
		<img width="50px" src="http://s5.postimg.org/69hq9oolf/AMRVol3.png"> 
		<script type="text/javascript" src="http://player.wavestreamer.com/cgi-bin/swf.js?id=AGFRAFJII0W2G9EL"></script>
		<script type="text/javascript" src=" http://player.wavestreaming.com/?id=AGFRAFJII0W2G9EL"></script>
</div><br><br><br>
</body>
</html>