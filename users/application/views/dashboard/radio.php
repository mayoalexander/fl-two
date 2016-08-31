<?php

	include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
	$config = new Blog();
    $site = $config->getSiteData($config->site);


  ?>
		<!-- <link rel="stylesheet" type="text/css" href="http://freelabel.net/landing/view/gallery/css/demo.css" /> -->
		<link rel="stylesheet" type="text/css" href="http://freelabel.net/landing/view/gallery/css/component.css" />
		<script src="http://freelabel.net/landing/view/gallery/js/modernizr.custom.js"></script>
		<div class="container">
			<header class="clearfix">
				<span>FREELABEL RADIO <span class="bp-icon bp-icon-about" data-content="The Blueprints are a collection of basic and minimal website concepts, components, plugins and layouts with minimal style for easy adaption and usage, or simply for inspiration."></span></span>
				<h1>NEW MUSIC DAILY</h1>
				<nav>
					<a href="http://tympanus.net/Blueprints/FullWidthTabs/" class="bp-icon bp-icon-prev" data-info="previous Blueprint"><span>Previous Blueprint</span></a>
					<!--a href="" class="bp-icon bp-icon-next" data-info="next Blueprint"><span>Next Blueprint</span></a-->
					<a href="http://tympanus.net/codrops/?p=18699" class="bp-icon bp-icon-drop" data-info="back to the Codrops article"><span>back to the Codrops article</span></a>
					<a href="http://tympanus.net/codrops/category/blueprints/" class="bp-icon bp-icon-archive" data-info="Blueprints archive"><span>Go to the archive</span></a>
				</nav>
				<style type="text/css">
				.grid figcaption {
					background-color:transparent;
				}
				.grid figcaption h3 {
					font-size:0.75em;
				}
				.grid figcaption p {
					color:<?php echo $site['primary-color']; ?>
				}
				.navigation-buttons {
					position: absolute;
				}
				.slideshow nav span.nav-close {
					top:180px;
					left:50vw;
				}
				.slideshow figure {
					background-color:#202020;
					border-color:#202020;
				}
				</style>
			</header>
			<div id="grid-gallery" class="grid-gallery">
				<section class="grid-wrap">
					<ul class="grid">
						<li class="grid-sizer"></li><!-- for Masonry column width -->

						<?php 

						$posts = $config->getPostsByUser(0,16, 'admin');
						foreach ($posts as $post) {
									echo '<li>
										<figure>
											<img src="'.$post['photo'].'" alt="img01"/>
											<figcaption><h3>'.$post['blogtitle'].'</h3><p>'.$post['twitter'].'</p></figcaption>
										</figure>
									</li>';
		
												}						?>
						
					</ul>
				</section><!-- // grid-wrap -->
				<section class="slideshow">
					<ul>
					<?php
					foreach ($posts as $post) {
											echo '<li>
													<figure>
														<figcaption>
															<h3>'.$post['blogtitle'].'</h3>
															<p>'.$post['twitter'].'</p>
														</figcaption>
														<img src="'.$post['photo'].'" alt="img01"/>
													</figure>
												</li>';
		
					}

						?>
					</ul>
					<nav class="navigation-buttons">
						<span class="icon nav-prev"></span>
						<span class="icon nav-next"></span>
						<span class="icon nav-close"></span>
					</nav>
					<div class="info-keys icon">Navigate with arrow keys</div>
				</section><!-- // slideshow -->
			</div><!-- // grid-gallery -->
		</div>
		<script src="http://freelabel.net/landing/view/gallery/js/imagesloaded.pkgd.min.js"></script>
		<script src="http://freelabel.net/landing/view/gallery/js/masonry.pkgd.min.js"></script>
		<script src="http://freelabel.net/landing/view/gallery/js/classie.js"></script>
		<script src="http://freelabel.net/landing/view/gallery/js/cbpGridGallery.js"></script>
		<script>
			new CBPGridGallery( document.getElementById( 'grid-gallery' ) );
		</script>
