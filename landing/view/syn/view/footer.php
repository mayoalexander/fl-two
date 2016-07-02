	<!-- SECTION: Get started -->
	<section class="get-started has-padding text-center" id="get-started">
		<div class="container">
			<div class="row">
				<div class="col-md-12 wp4">
					<h2>Like what you see? Feel free to contact me.</h2>
					<a href="mailto:mayoalexandertd@icloud.com" class="btn secondary-white">Email Me</a>
				</div>
			</div>
		</div>
	</section>
	<!-- END SECTION: Get started -->
	<!-- SECTION: Footer -->
	<footer class="has-padding footer-bg">
		<div class="container">
			<div class="row">
				<div class="col-md-4 footer-branding">
					<!-- <img class="footer-branding-logo" src="img/synthetica-logo.png" alt="Synthetica freebie html5 css3 template peter finlan logo"> -->
					<p>Web Development Portfolio by <a href="https://www.linkedin.com/in/alexander-mayo-934aa0122" target="_blank">Alexander Mayo</a></p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 footer-nav">
					<ul class="footer-primary-nav">
						<li><a href="#intro">About</a></li>
						<li><a href="#team">Skills</a></li>
						<li><a href="#recentwork">Recent Work</a></li>
					</ul>
					<ul class="footer-share">
						<li><a href="#" class="share-trigger"><i class="fa fa-share"></i>Share</a></li>
					</ul>
					<div class="share-dropdown">
						<ul>
							<li><a href="#" class="share-twitter"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#" class="share-facebook"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#" class="share-linkedin"><i class="fa fa-linkedin"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- END SECTION: Footer -->
	<!-- JS CDNs -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.0/jquery-ui.min.js"></script>
	<script src="http://vjs.zencdn.net/5.4.6/video.min.js"></script>
	<!-- jQuery local fallback -->
	<script>
	window.jQuery || document.write('<script src="js/min/jquery-1.11.2.min.js"><\/script>')
	</script>
	<!-- JS Locals -->
	<script src="<?php echo $site['base_url']; ?>js/min/bootstrap.min.js"></script>
	<script src="<?php echo $site['base_url']; ?>js/min/modernizr-2.8.3-respond-1.4.2.min.js"></script>
	<script src="<?php echo $site['base_url']; ?>js/min/retina.min.js"></script>
	<script src="<?php echo $site['base_url']; ?>js/min/jquery.waypoints.min.js"></script>
	<script src="<?php echo $site['base_url']; ?>js/min/flickity.pkgd.min.js"></script>
	<script src="<?php echo $site['base_url']; ?>js/min/scripts-min.js"></script>
	<script> 
		$('.stats').remove();
		$('.hero').remove();
		$('.latest-articles').remove();
	</script>
	<!-- Google Analytics: change UA-XXXXX-X to be your site's ID and uncomment -->
	<!--
	<script>
	(function(b, o, i, l, e, r) {
		b.GoogleAnalyticsObject = l;
		b[l] || (b[l] =
			function() {
				(b[l].q = b[l].q || []).push(arguments)
			});
		b[l].l = +new Date;
		e = o.createElement(i);
		r = o.getElementsByTagName(i)[0];
		e.src = '//www.google-analytics.com/analytics.js';
		r.parentNode.insertBefore(e, r)
	}(window, document, 'script', 'ga'));
	ga('create', 'UA-XXXXX-X', 'auto');
	ga('send', 'pageview');
	</script>
	-->
</body>

</html>