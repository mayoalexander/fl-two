<?php 




?>
<!-- <link rel="stylesheet" type="text/css" href="http://freelabel.net/landing/view/video/css/default.css" /> -->
<link rel="stylesheet" type="text/css" href="http://freelabel.net/landing/view/video/css/component.css" />
<script src="http://freelabel.net/landing/view/video/js/modernizr.custom.js"></script>


<div class="container">
	<header class="clearfix">
		<span>Blueprint <span class="bp-icon bp-icon-about" data-content="The Blueprints are a collection of basic and minimal website concepts, components, plugins and layouts with minimal style for easy adaption and usage, or simply for inspiration."></span></span>
		<h1>Tooltip Menu</h1>
		<nav>
			<a href="http://tympanus.net/Blueprints/ProductGridLayout/" class="bp-icon bp-icon-prev" data-info="previous Blueprint"><span>Previous Blueprint</span></a>
			<!--a href="" class="bp-icon bp-icon-next" data-info="next Blueprint"><span>Next Blueprint</span></a-->
			<a href="http://tympanus.net/codrops/?p=15212" class="bp-icon bp-icon-drop" data-info="back to the Codrops article"><span>back to the Codrops article</span></a>
			<a href="http://tympanus.net/codrops/category/blueprints/" class="bp-icon bp-icon-archive" data-info="Blueprints archive"><span>Go to the archive</span></a>
		</nav>
	</header>	
	<div class="filler-above">
		<p>The tooltip submenu will appear either above or below the menu, depending on where more space is available. Scroll down to see it appearing below.</p>
	</div>
	<ul id="cbp-tm-menu" class="cbp-tm-menu">
		<li>
			<a href="#">Home</a>
		</li>
		<li>
			<a href="#">Veggie made</a>
			<ul class="cbp-tm-submenu">
				<li><a href="#" class="cbp-tm-icon-archive">Sorrel desert</a></li>
				<li><a href="#" class="cbp-tm-icon-cog">Raisin kakadu</a></li>
				<li><a href="#" class="cbp-tm-icon-location">Plum salsify</a></li>
				<li><a href="#" class="cbp-tm-icon-users">Bok choy celtuce</a></li>
				<li><a href="#" class="cbp-tm-icon-earth">Onion endive</a></li>
				<li><a href="#" class="cbp-tm-icon-location">Bitterleaf</a></li>
				<li><a href="#" class="cbp-tm-icon-mobile">Sea lettuce</a></li>
			</ul>
		</li>
		<li>
			<a href="#">Pepper tatsoi</a>
			<ul class="cbp-tm-submenu">
				<li><a href="#" class="cbp-tm-icon-archive">Brussels sprout</a></li>
				<li><a href="#" class="cbp-tm-icon-cog">Kakadu lemon</a></li>
				<li><a href="#" class="cbp-tm-icon-link">Juice green</a></li>
				<li><a href="#" class="cbp-tm-icon-users">Wine fruit</a></li>
				<li><a href="#" class="cbp-tm-icon-earth">Garlic mint</a></li>
				<li><a href="#" class="cbp-tm-icon-location">Zucchini garnish</a></li>
				<li><a href="#" class="cbp-tm-icon-mobile">Sea lettuce</a></li>
			</ul>
		</li>
		<li>
			<a href="#">Sweet melon</a>
			<ul class="cbp-tm-submenu">
				<li><a href="#" class="cbp-tm-icon-screen">Sorrel desert</a></li>
				<li><a href="#" class="cbp-tm-icon-mail">Raisin kakadu</a></li>
				<li><a href="#" class="cbp-tm-icon-contract">Plum salsify</a></li>
				<li><a href="#" class="cbp-tm-icon-pencil">Bok choy celtuce</a></li>
				<li><a href="#" class="cbp-tm-icon-article">Onion endive</a></li>
				<li><a href="#" class="cbp-tm-icon-clock">Bitterleaf</a></li>
			</ul>
		</li>
	</ul>
	<div class="filler-below"></div>
</div>
<script src="http://freelabel.net/landing/view/video/js/cbpTooltipMenu.min.js"></script>
<script>
	var menu = new cbpTooltipMenu( document.getElementById( 'cbp-tm-menu' ) );
</script>
