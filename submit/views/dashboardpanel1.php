					<?php
					
					echo '<head>

					<style>
					body {
						font-size:60%;
					}
					#login {
						vertical-align:middle;
					}
					#dash_container {
						width:950px;
						margin:auto;
					}
					#dash_half {
						width:475px;
						vertical-align:top;
						text-align:left;
						padding:15px;
					}
					td {
						opacity:1;
						//vertical-align:top;
						//background-color:e9e9e9;
						font-size:90%;
					}
					td:hover {
						opacity:1;
					}
					#back2site {
						position:fixed;
						top:100px;
						left:5px;
						background-color:#383838;
						color:#d3d3d3;
						padding:10px;
					}
					#stats {
						margin:auto;
						padding:10px:;
						background-color:#000;
						color:#fff;
						text-align:center;
					}
					#dash_navi {
						font-size:80%;
						opacity:0.7;
						background-color:#303030;
						color:#ffffff;
						padding:5px;
						vertical-align:top;
					}
					#dash_navi:hover {
						opacity:1;
					}
					#heading {
						padding:5px;
						background-color:#9a9a9a;
						font-size:90%;

					}
					#options {
						font-size:80%;
					}
					#trackpanel {
						height:450px;
						overflow:scroll;
					}
					</style>


						<title>AMR / Control Panel</title>
							<link href=\'http://fonts.googleapis.com/css?family=Raleway:100|Fjalla+One\' rel=\'stylesheet\' type=\'text/css\'>
						<link href="http://amradiolive.com/css/style.css" type="text/css" rel="stylesheet">
						<link href="../images/amrlogo.ico" rel="shortcut icon" type="image/x-icon">
						<meta name="Description" content="AMRadioLIVE is the Leader in Online Showcasing">
						<meta name="Keywords" content="AMRadioLIVE, amradio, am radio live, texas, music, promotion, hip hop, rap">
						<meta name="Copyright" content="AMRadioLIVE">
						<meta name="Language" content="English">


						<link rel="stylesheet" type="text/css" href="./css/style.css">
					</head>

					<body>
					<a href="http://amradiolive.com/"><p id="back2site">Back To Site //</p></a>

					<center>
					<style>
						#dash_header {
							padding:3% 3%;
							font-size:400%;
							margin:0px 0px;
							color:#e3e3e3;
							background-position:center center;
							background-image:url("'.$user_pic.'");
							text-shadow:3px 3px 3px #303030;
				}
					</style>
					<div id="dash_container">
					<center><h2 id="dash_header" ><strong>'.$_SESSION['user_name'].'\'s Dashboard</strong></h2></center>
					<table>
					<tr>

					<td><center>
					<img width="100%" src="'.$user_pic.'"></center><hr>
					<h2 id="heading">Update Photo</h2>
					<form action="updateprofile.php" method="POST" enctype="multipart/form-data">

						Upload Photo: <input type="file" name="file"><br>
						<input type="hidden" name="user_name" value="'.$user_name.'">
						<input type="hidden" name="user_id" value="'.$user_id.'">
						<input type="hidden" name="trackname" value="'.$trackname.'">
						<input type="submit" value="Update Photo">
						</form>

					</td>




					<td id="dash_half">
					<!--
					<h2 id="heading"">Stats:</h2><hr>
					'.$stats.'
					-->
					
						
						
		<h3 id="heading" >Services:</h3>
						<script src="http://cdn.jotfor.ms/static/feedback2.js?3.1.1817" type="text/javascript">
						new JotformFeedback({
						formId:\'31942345290150\',
						base:\'http://jotform.us/\',
						windowTitle:\'Campaign Builder\',
						background:\'#FFA500\',
						fontColor:\'#FFFFFF\',
						type:false,
						height:500,
						width:700
						});
						</script>
						<a class="lightbox-31942345290150" style="cursor:pointer;"><p id="joinbutton">CAMPAIGN MANAGER</p></a>




						
						<script src="http://cdn.jotfor.ms/static/feedback2.js?3.1.1817" type="text/javascript">
						new JotformFeedback({
						formId:\'31882000922143\',
						base:\'http://jotform.us/\',
						windowTitle:\'Event Booking\',
						background:\'#FFA500\',
						fontColor:\'#FFFFFF\',
						type:2,
						height:500,
						width:700
						});
						</script>
						<a class="lightbox-31882000922143" style="cursor:pointer;"><p id="joinbutton">BOOK SHOWCASE</p></a>
						
						
						<script src="http://cdn.jotfor.ms/static/feedback2.js?3.1.1817" type="text/javascript">
						new JotformFeedback({
						formId:\'31977627867171\',
						base:\'http://jotform.us/\',
						windowTitle:\'Website Design Request Form\',
						background:\'#FFA500\',
						fontColor:\'#FFFFFF\',
						type:2,
						height:500,
						width:700
						});
						</script>
						<a class="lightbox-31977627867171" style="cursor:pointer;"><p id="joinbutton">POST TO BLOG</p></a>
						
						
						

						<script src="http://cdn.jotfor.ms/static/feedback2.js?3.2.514" type="text/javascript">
new JotformFeedback({
formId:\'40387798391975\',
base:\'http://jotformpro.com/\',
windowTitle:\'Book Your Radio Show\',
background:\'#FFA500\',
fontColor:\'#FFFFFF\',
type:2,
height:500,
width:700
});
</script>
<a class="lightbox-40387798391975" style="cursor:pointer;;"><p id="joinbutton">Book Your Radio Show</p></a>
						
<hr>			
			<script src="http://cdn.jotfor.ms/static/feedback2.js?3.1.1817" type="text/javascript">
			new JotformFeedback({
			formId:\'40036400383846\',
			base:\'http://jotform.co/\',
			windowTitle:\'Title Me\',
			background:\'#FFA500\',
			fontColor:\'#FFFFFF\',
			type:2,
			height:500,
			width:700
			});
			</script>
			<a class="lightbox-40036400383846" style="cursor:pointer;"><p id="pricing2">How To Use</p></a>
			
			
			<script src="http://cdn.jotfor.ms/static/feedback2.js?3.1.1817" type="text/javascript">
			new JotformFeedback({
			formId:\'31876137025151\',
			base:\'http://jotform.us/\',
			windowTitle:\'Contact Us\',
			background:\'#FFA500\',
			fontColor:\'#FFFFFF\',
			type:2,
			height:500,
			width:700
			});
			</script>
			<a class="lightbox-31876137025151" style="cursor:pointer;"><p id="pricing2">Contact Support</p></a>
			
			


'; ?> <?php include("showcase_schedule.php"); ?> <?php echo '
<hr>

					</td>
					</tr>
					</table>
					<table>

					<tr>
					<td id="dash_half">

					<style>
						input, submit, select {
							font-size:160%;
							width:100%;
							font-family: "Avant Garde", Avantgarde, "Century Gothic", CenturyGothic, "AppleGothic", sans-serif;
							padding:5px;

					}
					</style>
					</td>
					<td id="dash_half">




					</td>
					</tr>

					</table>
			
					
					
					
					</center>



					</div>

					</body>
					</html>
					';
					
					
					?>