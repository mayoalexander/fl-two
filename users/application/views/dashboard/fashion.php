<?php 
include_once('/home/content/59/13071759/html/config/index.php');

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