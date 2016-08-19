<?php 
include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
session_start();
$page_url ='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

	if (isset($_GET['q'])) {
		$search_query = trim($_GET['q']);
	} else {
		$search_query = 'freelabel';
	}
include_once(ROOT.'landing/header.php');
?>
<div class="main_display_panel" id="main_display_panel">
	<h1>Searching: <i class='text-muted'><?php echo '"'.$search_query.'"'; ?></i></h1>
	<?php 
	include(ROOT.'mag/stream.php'); ?>
	<div></div>
	<div></div>
	<div></div>
	<hr>
	<h1>Photos:</h1>
	<?php 
	$stream='search_page';
	//$search_query = $_GET['q'];
	include(ROOT.'images/pull_images.php'); 
	?>
	</div>
<div>
<?php 
include_once(ROOT.'landing/footer.php');
?>