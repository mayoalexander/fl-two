<!--<span class='radio_wrapper panxel-body' style='' onclick='togglePlayer()'>
			
	        <span id='radio_display'>
	        	
	        	<span class="radio_text">

		            <a class='click-start' href='#' style='vertical-align: top;'><span class='fa fa-volume-up'></span></a>

		            <!--<marquee style="display:inline-block;background-color:#ffffff;color:#303030;padding:0% 3%;border-radius:2px;bottom:5px;  vertical-align: top;width:200px;" data-shoutcast-value="songtitle"></marquee>
		            
					<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		            <script src="https://static.radiocdn.com/jquery.shoutcast.easy.min.js?host=eclipse.wavestreamer.com&port=9614&stream=1"></script>
	        	</span>

	        	<span id='radio_player' style="margin:0;">
	        		<script src="https://embed.radio.co/player/c1389e1.js"></script>
	        	<!--
	            	<script type="text/javascript" src="http://player.wavestreamer.com/cgi-bin/swf.js?id=3P4FCH6DIM3LXSPQ"></script>
	            	<script type="text/javascript" src=" http://player.wavestreaming.com/?id=3P4FCH6DIM3LXSPQ"></script>
	            
	        	</span>
	        	
	        </span>
	        	
	        
<!--
	<hr>

	<div style='display:inline-block;width:45%;margin:auto;'><img src="http://www.dibary.com/templates/bohase/assets/images/android-app-on-google-play.jpg" width="100%"></div>
	<div style='display:inline-block;width:45%;margin:auto;'><img src="http://static1.squarespace.com/static/52857712e4b0975b1b06be96/t/52e153c2e4b0485cda4ef827/1390498755203/itunes-logo.jpg" width="100%"></div>

</span>

	
	<?php //<hr> //include(ROOT.'events.php'); ?>



-->


	<style>
	@import url(http://weloveiconfonts.com/api/?family=fontawesome);

	[class*="fontawesome-"]:before {
	  font-family: 'FontAwesome', sans-serif;
	}


	.radioco-playButton-playing:before{
		font-family: 'FontAwesome', sans-serif;
	  content: "\f04b";
	}

	.radioco-playButton-paused:before{
		font-family: 'FontAwesome', sans-serif;
	  content:"\f04c";
	}

	.radioplayer{
	  background: #101010;
	  padding: 0;
	  width:94vw;
	  max-width: 352px;
	  height: 45px;
	  //box-shadow: #ccc 0px 1px 10px;
	  border-radius:4px;
	  background-position:center center !important;
	  background-repeat:no-repeat !important;
	  background-size: cover !important;
	  overflow: hidden;

	  -webkit-touch-callout: none;
	  -webkit-user-select: none;
	  -khtml-user-select: none;
	  -moz-user-select: none;
	  -ms-user-select: none;
	  user-select: none;
	}

	.radioco-playButton{
	  box-shadow: #111 1px 1px 10px;
	  color: #fff;
	  position: relative;
	  top: 33px;
	  text-align: left;
	  margin-left: 6.5%;
	  position: relative;
	  z-index: 2;
	  font-size:16px;
	}

	.radioco-playButton:active{
	  color:#ccc;
	}

	.radioco-playButton-playing , .radioco-playButton-paused {
	  font-family: "controls";
	  position: absolute;
	  bottom:-3px;
	  //text-size:150%;
	  font-size: 16px;
	  text-shadow:#333 0px 0px 15px;
	}


	.radioco-image{
	  vertical-align: middle;
	  margin-left: -20px;
	  margin-top: -20px;
	  position: relative;
	  z-index: 1;
	  width:150px;
	  height: 45px;
	  display: none;
	}

	.radioco-bg{
	  margin-top: -99px;
	  margin-left: -29px;
	  -webkit-filter: blur(30px) brightness(0.6);
	  overflow: hidden;
	  width: 250px;
	  position: relative;
	  left: 70px;
	  top: -180px;
	}

	.radioco-information{
	  display: block;
	  position: relative;
	  width: 340px;
	  color:#fff;
	  z-index: 1;
	  float: right;
	  top:13px;
	  font-family: 'Open Sans', sans-serif;


	}

	.radioco-information span{
	  display:block;
	  text-align: right;
      padding-right: 5%;
	}

	.radioco-information input[type="range"]{
	    background: rgba(255,255,255,0.3);
	  width: 100px;
	  display: block;
	  height: 4px;
	  -webkit-appearance: none;
	  -webkit-border-radius: 8px;
	  margin-top: 0;
	  margin-bottom: 0;
	  cursor: -webkit-grab;
	  outline: 0;
	  position: relative;
	  right: 106px;
	  bottom: 11px;
	   }

	.radioco-information input[type=range]::-webkit-slider-thumb {
	  -webkit-appearance: none;
	  border: none;
	  width:15px;
	  height:15px;
	  border-radius: 10px;
	  background: #ffffff;
	  -webkit-transition: box-shadow 0.2s;

	}
	.radioco-information input[type=range]::-webkit-slider-thumb:hover {
	  box-shadow:#fff 1px 1px 20px;
	}

	.radioco-information input[type=range]:active, .information input[type=range]:focus {
	  outline: 0;
	}

	.radioco-elapsedTime{
	  opacity:0.4;
	  font-size:14px;
	}
	</style>
	<!-- The player decleration -->
	<div class="radioplayer"
	data-src="http://streaming.radio.co/s95fa8cba2/listen"
	data-autoplay="true"
	data-playbutton="true"
	data-volumeslider="true"
	data-elapsedtime="false"
	data-nowplaying="true"
	data-showplayer="true"
	data-volume="100"></div>


<!-- Include the libraries -->
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://public.radio.co/playerapi/jquery.radiocoplayer.min.js"></script>
<script>

//initialise the pluhin with the element
$('.radioplayer').radiocoPlayer();

</script>
