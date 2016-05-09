<style type="text/css">
	.content .product {
		width:200px;
		height:200px;
		display:inline-block;
		background-color:#202020;
		margin:0.2em;
		padding: 5em;
	}
	.content {
		min-height: 50vh;
	}
	.content, footer {
		position: relative;
		left: 150px;
	}
	.section-footer.bg-inverse {
		background-color: transparent;
	}
</style>
	<!-- <meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Blueprint: Multi-Level Menu</title>
	<meta name="description" content="Blueprint: A basic template for a responsive multi-level menu" />
	<meta name="keywords" content="blueprint, template, html, css, menu, responsive, mobile-friendly" />
	<meta name="author" content="Codrops" />
	<link rel="shortcut icon" href="http://freelabel.net/landing/view/menu/favicon.ico"> -->
	<!-- food icons -->
	<link rel="stylesheet" type="text/css" href="http://freelabel.net/landing/view/menu/css/organicfoodicons.css" />
	<!-- demo styles -->
	<!-- <link rel="stylesheet" type="text/css" href="http://freelabel.net/landing/view/menu/css/demo.css" /> -->
	<!-- menu styles -->
	<link rel="stylesheet" type="text/css" href="http://freelabel.net/landing/view/menu/css/component.css" />
	<script src="http://freelabel.net/landing/view/menu/js/modernizr-custom.js"></script>


	<!-- Main container -->
	<div class="container">
		<!-- Blueprint header -->
		<button class="action action--open" aria-label="Open Menu"><span class="fa fa-ellipsis-h"></span></button>
		<nav id="ml-menu" class="menu">
			<button class="action action--close" aria-label="Close Menu"><span class="fa fa-close"></span></button>
			<div class="menu__wrap">
				<ul data-menu="main" class="menu__level">
					<li class="menu__item"><a class="menu__link" data-submenu="submenu-1" href="#">Dashboard</a></li>
					<li class="menu__item"><a class="menu__link" data-submenu="submenu-2" href="#">Feed</a></li>
					<li class="menu__item"><a class="menu__link" data-submenu="submenu-3-1" href="#">Inbox</a></li>
					<li class="menu__item"><a class="menu__link" data-submenu="submenu-3" href="#">Admin</a></li>
					<li class="menu__item"><a class="menu__link" data-submenu="submenu-4" href="#">Testing</a></li>
					<!-- <li class="menu__item"><a class="menu__link" data-submenu="submenu-3" href="#">Interviews</a></li> -->
					<!-- <li class="menu__item"><a class="menu__link" data-submenu="submenu-4" href="#">Albums</a></li> -->
				</ul>
				<!-- Submenu 1 -->
				<ul data-menu="submenu-1" class="menu__level">
					<li class="menu__item"><a class="menu__link" href="#">Box</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Audio</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Analytics</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Events</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Promos</a></li>
				</ul>
				<!-- Submenu 1-1 -->
				<ul data-menu="submenu-1-1" class="menu__level">
					<li class="menu__item"><a class="menu__link" href="#">Trap</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Lyrical</a></li>
					<li class="menu__item"><a class="menu__link" href="#">The South</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Westcoast</a></li>
				</ul>
				<!-- Submenu 2 -->
				<ul data-menu="submenu-2" class="menu__level">
					<li class="menu__item"><a class="menu__link"  data-submenu="submenu-2-1" href="#">Your Collection</a></li> <!-- user collection -->
					<li class="menu__item"><a class="menu__link" href="#">Magazine</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Radio</a></li>
					<li class="menu__item"><a class="menu__link" href="#">TV</a></li> <!-- this is the videos app -->
					<li class="menu__item"><a class="menu__link" href="#">Promotions</a></li> <!-- rename to events -->


				</ul>
				<!-- Submenu 3 -->
				<ul data-menu="submenu-3" class="menu__level">
					<li class="menu__item"><a class="menu__link" href="#">Clients</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Leads</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Twitter</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Rss</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Script</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Submissions</a></li>
				</ul>
				<!-- Submenu 2-1 -->
				<ul data-menu="submenu-2-1" class="menu__level">
					<li class="menu__item"><a class="menu__link" href="#">Likes</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Discover</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Recommended</a></li>
				</ul>
				<!-- Submenu 3 -->
				<ul data-menu="submenu-4" class="menu__level">
					<li class="menu__item"><a class="menu__link" href="#">Video</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Form</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Stream</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Soundcloud</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Paypal</a></li>
					<li class="menu__item"><a class="menu__link" href="#">FLdrive</a></li>
				</ul>
				<!-- Submenu 3-1 -->
				<ul data-menu="submenu-3-1" class="menu__level">
					<li class="menu__item"><a class="menu__link" href="#">Compose</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Messages</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Follow</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Following</a></li>
				</ul>
				<!-- Submenu 4 -->
				<ul data-menu="submenu-5" class="menu__level">
					<li class="menu__item"><a class="menu__link" href="#">Grain Mylks</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Seed Mylks</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Nut Mylks</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Nutri Drinks</a></li>
					<li class="menu__item"><a class="menu__link" data-submenu="submenu-4-1" href="#">Selection</a></li>
				</ul>
				<!-- Submenu 4-1 -->
				<ul data-menu="submenu-4-1" class="menu__level">
					<li class="menu__item"><a class="menu__link" href="#">Nut Mylk Packs</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Amino Acid Heaven</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Allergy Free</a></li>
				</ul>
			</div>
		</nav>
		<div class="content">
			<p class="info">Please choose a category</p>
			<!-- Ajax loaded content here -->
		</div>
	</div>
	<!-- /view -->
	<script src="http://freelabel.net/landing/view/menu/js/classie.js"></script>
	<script src="http://freelabel.net/landing/view/menu/js/dummydata.js"></script>
	<script src="http://freelabel.net/landing/view/menu/js/main.js"></script>
	<script>
	(function() {
		var menuEl = document.getElementById('ml-menu'),
			mlmenu = new MLMenu(menuEl, {
				// breadcrumbsCtrl : true, // show breadcrumbs
				// initialBreadcrumb : 'all', // initial breadcrumb text
				backCtrl : false, // show back button
				// itemsDelayInterval : 60, // delay between each menu item sliding animation
				onItemClick: loadDummyData // callback: item that doesn´t have a submenu gets clicked - onItemClick([event], [inner HTML of the clicked item])
			});

		// mobile menu toggle
		var openMenuCtrl = document.querySelector('.action--open'),
			closeMenuCtrl = document.querySelector('.action--close');

		openMenuCtrl.addEventListener('click', openMenu);
		closeMenuCtrl.addEventListener('click', closeMenu);

		function openMenu() {
			classie.add(menuEl, 'menu--open');
		}

		function closeMenu() {
			classie.remove(menuEl, 'menu--open');
		}

		// simulate grid content loading
		var gridWrapper = document.querySelector('.content');

		function loadDummyData(ev, itemName) {
			ev.preventDefault();
			var pagename = itemName.toLowerCase()
			// alert(pagename);
			closeMenu();
			gridWrapper.innerHTML = '';
			classie.add(gridWrapper, 'content--loading');
			$.get('http://freelabel.net/users/dashboard/' + pagename + '/',function(result){
				$('.content').html(result);
			});
/*			setTimeout(function() {
				classie.remove(gridWrapper, 'content--loading');
				gridWrapper.innerHTML = '<ul class="products">' + dummyData[itemName] + '<ul>';
			}, 700);*/
		}
	})();
	</script>

