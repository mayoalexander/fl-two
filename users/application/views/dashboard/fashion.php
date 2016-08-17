<?php 
include_once($_SERVER['DOCUMENT_ROOT'].$_SERVER['REQUEST_URI'].'/config/index.php');

$config = new Blog($_SERVER['HTTP_HOST']);
echo $config->displayCategories();

/* display posts*/
$posts = $config->getPostsByCategory(0,24, 'fashion');
foreach ($posts as $key => $value) {
	echo $value['twitter'].' - '.$value['blogtitle'].'<br>';
}
// var_dump($posts);
// echo 'this okay';

?>
<script type="text/javascript" src="http://freelabel.net/js/dashboard.js"></script>