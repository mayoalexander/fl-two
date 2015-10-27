					<?php
			echo '<head>
					<link rel="stylesheet" type="text/css" href="m/style.css">
					<style>
					body {
						font-size:60%;
					}
					#body {
						background-color:#e3e3e3;
				}
					#login {
						vertical-align:middle;
					}
					#dash_container {
						width:100%;
						margin:0px 0px;
					}
					#dash_half {
						min-width:300px;
						vertical-align:top;
						text-align:left;
						padding:1%;
					}
					td {
						opacity:1;
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
						
					</head>




<body>
	<a href="http://amradiolive.com/"><p id="back2site">Back To Site //</p></a>
	<center>
	<h2 id="dash_header" ><strong>'.$_SESSION['user_name'].'\'s Dashboard</strong></h2>					
	<table>
		<tr>	
			<td id="dash_half" width="450px" >
				<center>
				<img width="450px" src="'.$user_pic.'">
				<hr>
				<h2 id="heading">Update Photo</h2>
				<form action="updateprofile.php" method="POST" enctype="multipart/form-data">
					Upload Photo: <input type="file" name="file"><br>
					<input type="hidden" name="user_name" value="'.$user_name.'">
					<input type="hidden" name="user_id" value="'.$user_id.'">
					<input type="hidden" name="trackname" value="'.$trackname.'">
					<input type="submit" value="Update Photo">
				</form>
				</center>
			</td>
			<td id="dash_half">
				<h3 id="heading" >SERVICES:</h3>

					<a href="#upload"><div id="joinbutton">UPLOAD SINGLES</div></a>

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
			<a class="lightbox-40036400383846" style="cursor:pointer;"><p id="pricing1">How To Use</p></a>
			
			
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
			<a class="lightbox-31876137025151" style="cursor:pointer;"><p id="pricing1">Contact Support</p></a>
			
			
			<a href="index.php?logout" style="cursor:pointer;"><p id="pricing1">LOGOUT</p></a>

			</td>




			<td id="dash_half">
				<h2 id="heading" >Your Campaign:</h2>
						


'; ?> <?php 

include("campaign_info.php");
include("showcase_schedule.php"); ?> <?php echo '
						
<hr>	
			</td>




		</tr>
	</table>
				
				
</center>
</body>
</html>
					';
					
					
					?>