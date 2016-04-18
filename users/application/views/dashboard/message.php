<?php 
include_once('/home/content/59/13071759/html/config/index.php');
$config = new Blog();
// var_dump($_POST);

echo $config->add_message('messages', $_POST);

