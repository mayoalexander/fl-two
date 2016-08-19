<?php 
include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');

$config = new Blog($_SERVER['HTTP_HOST']);
echo $config->displayCategories();

?>
<script type="text/javascript" src="http://freelabel.net/js/dashboard.js"></script>