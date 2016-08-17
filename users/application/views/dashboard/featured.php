<?php 
include_once($_SERVER['DOCUMENT_ROOT'].$_SERVER['REQUEST_URI'].'/config/index.php');

$config = new Blog($_SERVER['HTTP_HOST']);
echo $config->displayCategories();

?>
<script type="text/javascript" src="http://freelabel.net/js/dashboard.js"></script>