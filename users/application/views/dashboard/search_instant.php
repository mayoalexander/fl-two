<?php 
include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');

$config = new Blog($_SERVER['HTTP_HOST']);
// echo $config->displayCategories();

// var_dump($_POST);
if (isset($_POST['q'])) {
	$search_results = $config->getPostsBySearchPublic(0,24,$_POST['q']);
	echo 'search: ';
	foreach ($search_results as $key => $value) {
		echo $value['blogtitle'].'<br>';
		// echo '<li class="nav-item nav-item-toggable active" "="">
		//         <a class="nav-link gn-icon gn-icon-archive navi-Dashboard" href="#">'.$value['blogtitle'].'<span class="sr-only">(current)</span></a>
		        
		//       </li>';
	}
	// var_dump($search_results);


}
exit;
?>
<script type="text/javascript" src="http://freelabel.net/js/dashboard.js"></script>