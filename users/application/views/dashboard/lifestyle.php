<?php 
include_once('/home/content/59/13071759/html/config/index.php');

$config = new Blog($_SERVER['HTTP_HOST']);
echo $config->displayCategories();
?>
<script type="text/javascript" src="http://freelabel.net/js/dashboard.js"></script>