<?php 
session_start();
include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
$page_url ='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	if (isset($_GET['u'])) {
		$_SESSION['user_name'] = $_GET['u'];
	} else {
		//$_SESSION['user_name'] = 'admin';
	}
include_once(ROOT.'landing/header.php');
if ($_SESSION['user_name']=='admin' OR strtolower($_SESSION['user_name'])=='thatdudewayne' OR strtolower($_SESSION['user_name'])=='desertwxlf' OR strtolower($_SESSION['user_name'])=='sales') {
	include_once(ROOT.'config/admin_controller.php');
	$config = new Config();
	//$current_period = $config->getCurrentPeriod(); 
	echo $config->showAdminController();
	echo '<hr>';
}	
?>
<script type="text/javascript">
$('.load-more-button').click(function(){

  //$('.main_display_wrapper').html('Please Wait..');
  var loadMoreButton = $(this);
  loadMoreButton.hide('fast');
  //$('.dropdown-menu').toggle('fast');
  var page = <?php echo "".$_GET['p'].""; ?> + 1;
  //alert(page);
  $.get('http://freelabel.net/user/views/feed.php',{p:page}).done(function(data){
    //alert(data);
    $('.main_display_wrapper').append(data);
  });
  
});

$('.load-more-button').hover(function(){

  //$('.main_display_wrapper').html('Please Wait..');
  var loadMoreButton = $(this);
  loadMoreButton.html('Loading Posts..');

  //$('.dropdown-menu').toggle('fast');
  var page = <?php echo "".$_GET['p'].""; ?> + 1;
  //alert(page);
  $.get('http://freelabel.net/user/views/feed.php',{p:page}).done(function(data){
    //alert(data);
    loadMoreButton.hide('fast');
    $('.main_display_wrapper').append(data);
  });
  
});

</script>
<a name='main_display_panel'></a>
<section id="main_display_panel" style='padding:0;'>
	<?php 
		if (isset($_GET)) {
			switch ($_GET['ctrl']) {
				case 'posts':
					include(ROOT.'submit/views/db/recent_posts.php');
					break;
				case 'dashboard':
					include(ROOT.'submit/views/db/recent_posts.php');
					break;
				case 'stats':
					include(ROOT.'submit/views/db/recent_posts.php');
					break;
				case 'pics':
					include(ROOT.'submit/views/db/user_photos.php');
					break;
				case 'cal':
					include(ROOT.'submit/views/db/showcase_schedule.php');
					break;
				case 'rss':
					include(ROOT.'rssreader/cosign.php');
					break;
				case 'twitter':
					include(ROOT.'twitter/index.php');
					break;
				case 'likes':
					include(ROOT.'mag/view/liked_posts.php');
					break;
				case 'leads':
					include(ROOT.'submit/views/db/leads.php');
					break;
				case 'script':
					include(ROOT.'x/s.php');
					break;
				case 'admin':
					include(ROOT.'config/admin_controller.php');
					break;
				case 'feed':
					include(ROOT.'user/views/stream.php');
					break;
				default:
					include(ROOT.'submit/views/db/recent_posts.php');
					//include(ROOT.'submit/views/db/user_photos.php');
				break;
			}
		}
	?>
</section>
	
<?php 
include_once(ROOT.'landing/footer.php');
?>