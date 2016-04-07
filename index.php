<style type="text/css">
	html {
		text-align: center;
		padding:10em;
		background-color: #101010;
		color:#e3e3e3;
		font-family: sans-serif;
	}
	a {
		display: inline-block;
		background-color: #202020;
		color:#aaaaaa;
		text-decoration: none;
		padding:2em;
		border-radius: 5px;
	}
	p {
		max-width: 300px;
		margin:2.5em auto;
	}
</style>
<?php 

echo '<p><img src="http://freelabel.net/images/fllogo.png" width="80px" ></p>';
echo '<p>the FREELABEL website is down for maintanence, we will be back up and running shortly!</p>';
echo '<a href="http://twitter.com/@freelabelnet">Follow us on twitter! @freelabelnet</a>';

exit;
?>
<?php


// Load application config (error reporting, database credentials etc.)
require 'application/config/config.php';

// The auto-loader to load the php-login related internal stuff automatically
require 'application/config/autoload.php';

// The Composer auto-loader (official way to load Composer contents) to load external stuff automatically
if (file_exists('vendor/autoload.php')) {
    require 'vendor/autoload.php';
}

// Start our application
$app = new Application();
