<?php 
if (isset($_GET['p'])==false) {
	$current_page = 0;
} else {
	$current_page = $_GET['p'];
}
$next_page = $current_page + 1;
$next_page_read = $next_page +1;
include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
$blog = new Blog();
$posts = $blog->randomizePosts($current_page,13);
$ads = $blog->getPhotosByUser('admin');
$ads[0]['image'] = str_replace('server/php/files/', 'server/php/files/thumbnail/', $ads[0]['image']);
?>
<?php //include(ROOT.'AudioPlayer/index.php'); ?>
<script src="<?php echo HTTP; ?>mag/view/js/classie.js"></script>
<script src="<?php echo HTTP; ?>mag/view/js/main.js"></script>
<script type="text/javascript">
$('.load-more-button').click(function(){
	//$('.main_display_wrapper').html('Please Wait..');
	$(this).hide('fast');
	//$('.dropdown-menu').toggle('fast');
	var page = <?php echo "".$_GET['p'].""; ?> + 1;
	$.get('http://freelabel.net/mag/view/stream.php',{p:page}).done(function(data){
		//alert(data);
		$('.main_display_wrapper').append(data);
	});
});
</script>
<section class="grid">
					
				<header class="top-bar">
						<h2 class="top-bar__headline">Page: <?php echo $current_page+1; ?></h2>
						
						<div class="filter dropdown-tarxget">
							<form class="search-control" action='http://freelabel.net/search/'>
								<input type='text' name='q' placeholder='Search Anything..'>
								<input type='submit' value='Search'>
							</form>
							<hr>
							<!--
							<span>Nagivate To:</span>
							<span class="dropdown">Feed</span>
							<div class="dropdown-menu" style='display:none;'>
								<span class="dropdown drop-option" data-link='submit/views/db/recent_posts.php'>Dashboard</span>
								<span class="dropdown drop-option" data-link='submit/views/db/recent_posts.php'>Recent</span>
								<span class="dropdown drop-option" data-link='submit/views/db/recent_posts.php'>Trending Now</span>
							</div>
							-->
						</div>
				</header>
					<?php 
					echo '
						<a class="grid__item featured-item" href="http://freelabel.net/events/'.$ads[0]['id'].'">

							<img class="meta__avatar" src="'.$ads[0]['image'].'" alt="'.$ads[0]['title'].'"  style="border-radius:0;"/> 
							<h2 class="title title--preview">'.$ads[0]['title'].'</h2>
							<span class="category">'.$ads[0]['caption'].'</span>
							<div class="loader"></div>
							
							<div class="meta meta--preview">
								<span class="meta__date"><i class="fa fa-calendar-o"></i> '.date('F j', strtotime($ads[0]['date'])).'</span>
								<span class="meta__reading-time"><i class="fa fa-clock-o"></i> '.$ads[0]['type'].'</span>
							</div>

						</a>';




					foreach ($posts as $key => $value) {
						echo '
						<a class="grid__item" href="#'.$value['twitter'].'">
							<img class="meta__avatar" src="'.$blog->getPhoto($value['photo']).'" alt="'.$blog->getTitle($value).'"  style="border-radius:0;"/> 
							
							<h2 class="title title--preview">'.$blog->getTitle($value).'</h2>
							<span class="category">'.$value['twitter'].'</span>
							<div class="loader"></div>
							
							
							<div class="meta meta--preview">
								<span class="meta__date"><i class="fa fa-calendar-o"></i> '.$blog->datePosted(strtotime($value['submission_date'])).'</span>
								<span class="meta__reading-time"><i class="fa fa-clock-o"></i> '.$value['type'].'</span>
							</div>

						</a>';
						}
					?>
					<footer class="page-meta load-more-button-testing">
						<a href='http://freelabel.net/mag/page/<?php echo $next_page; ?>'more>Load Page <?php echo $next_page_read; ?>...</a>
					</footer>
</section>



<section class="content">
					<div class="scroll-wrap">

						<?php



						echo '
						<article class="content__item">
							
							<a href="http://freelabel.net/events/'.$ads[0]['id'].'" target="_blank">
								<h2 class="title title--full">'.$ads[0]['title'].'</h2>
								<span class="category category--full">'.$ads[0]['title'].'</span>
							</a>
							
							<div class="meta meta--full">
								'.$blog->getShareButtons($value['id']).'
								<hr>
								
								<a href="http://freelabel.net/events/'.$ads[0]['id'].'" target="_blank"><img class="meta__avatar blog-photo" src="'.$ads[0]['image'].'" alt="'.$ads[0]['title'].'"/></a>
								<p>'.$ads[0]['caption'].'</p>
								<hr>
								<span class="meta__author">'.$value['user_name'].'</span>
								<span class="meta__date"><i class="fa fa-calendar-o"></i> '.$blog->datePosted(strtotime($ads[0]['date'])).'</span>
								<span class="meta__reading-time"><i class="fa fa-clock-o"></i> '.$value['type'].'</span>
							</div>

						</article>';






						foreach ($posts as $key => $value) {
						//print_r($value);
						echo '
						<article class="content__item">
							
							<a href="'.$blog->getPostURL($value).'" target="_blank">
								<h2 class="title title--full">'.$blog->getTitle($value).'</h2>
								<span class="category category--full">'.$blog->getTwitter($value).'</span>
							</a>
							
							<div class="meta meta--full">
								'.$blog->getShareButtons($value['id']).'
								<hr>
								<center>'.$blog->embedPost($value).'</center>
								<a href="'.$blog->getPostURL($value).'" target="_blank"><img class="meta__avatar blog-photo" src="'.$blog->getPhoto($value['photo']).'" alt="'.$blog->getTitle($value).'"/></a>
								<hr>
								<span class="meta__author">'.$value['user_name'].'</span>
								<span class="meta__date"><i class="fa fa-calendar-o"></i> '.$blog->datePosted(strtotime($value['submission_date'])).'</span>
								<span class="meta__reading-time"><i class="fa fa-clock-o"></i> '.$value['type'].'</span>
							</div>
			
						</article>';
						}

						?>
						
					</div>
					<button class="close-button"><i class="fa fa-close"></i><span>Close</span></button>
</section>