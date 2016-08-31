<?php
include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
$config = new Blog();

	if (isset($_GET)) {
		$current_page = $_GET['page'];
		$next_page = $current_page+1;
		$user['media']['feed'] = $config->getPostsByUser($current_page, 20, $_GET['user_name']);
	} else {
		echo $data = '';
	}
	// echo "<pre>";
	// var_dump($_GET);
	// exit;

	$count = count($user['media']['feed']);
		/* current load is set at 24 max increments */
		/* CREATE EVENTS STACKS */
		if ($count>0) {
			echo '
			<h2 class="stack-title"><a href="#" data-text="Uploads"><span>Uploads</span></a></h2>';
					// print_r($user['media']['video']);

					// ------------------ DISPLAY PHOTOS --------------------------- // 

					$i=0;
					foreach ($user['media']['feed'] as $key => $photo) {
							$photo['twitter'] = trim($photo['twitter']);

							  if ( strpos($photo['twitter'], '@')===false ) {
							    $photo['twitter'] = '@'.$photo['twitter'];
							  }
							$i++;
							$url = 'http://freelabel.net/'.$photo['twitter'].'/t/'.$photo['id'];

							// detect file type for preview
							switch ($photo['filetype']) {
								case 'image/jpeg':
									$preview = '<a href="'.$url.'"><img src="'.$photo['trackmp3'].'" alt="'.$photo['blogtitle'].'" /></a>';
									break;
								case 'audio/mpeg' OR 'audio/x-wav':
									$preview = '<a href="'.$url.'"><img src="'.$photo['photo'].'" alt="'.$photo['blogtitle'].'" /></a>';
									break;
								
								default:
									$preview = 'Preview not set yet! (type: '.$photo['filetype'].')';
									break;
							}

							echo '
							<div class="item">
								<div class="item__content">
									'.$preview.'
									<a href="'.$url.'"><h3 class="item__title">'.$photo['blogtitle'].' <span class="item__date">05/05/2015</span></h3></a>
									<div class="item__details">
										<ul>
											<li><i class="icon icon-camera"></i><span>'.$user['media']['photos'][3]['desc'].'</span></li>
											<!--<li><i class="icon icon-focal_length"></i><span>22.5mm</span></li>
											<li><i class="icon icon-aperture"></i><span>&fnof;/5.6</span></li>
											<li><i class="icon icon-exposure_time"></i><span>1/1000</span></li>
											<li><i class="icon icon-iso"></i><span>80</span></li>-->
										</ul>
									</div>
								</div>
							</div>';
					}
					if ($count >= 20) {
					echo '
						<div class="item">
							<div class="item__content">
							<a href="#" class="load-more-button" data-src="feed" data-page="'.$next_page.'"  data-user="'.$photo['user_name'].'">Load More..</a>
							</div>
						</div>';
					}
		} else {
			echo "<div class='' ><h1 class='stack-title' ><span>No Posts</span></h1></div>";
		}


?>
<script type="text/javascript">
	
		$('.load-more-button').click(function(event){
			// event.preventDefault();
			var element = $(this).parent().parent().parent();
			var user = $(this).attr('data-user');
			var page = $(this).attr('data-page');
			var src = $(this).attr('data-src');

			$.get('http://freelabel.net/users/index/profile/',{ 
				src: src,
				page: page,
				user_name: user
			},function(result){
				// console.log(element);
				element.html(result);
			});
			// element.hide('slow');
			console.log(element);
		});

</script>