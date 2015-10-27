<head>
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
	font-size:14px;
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
		letter-spacing:15px;
		background-position:center center;
		background-image:url("<?php echo $user_pic ?>");
		text-shadow:3px 3px 3px #303030;
}
	#subtitle {
		font-size:600%;
		font-weight:lighter;
		padding:5% 0%;
		text-indent:50px;
		
	}
	.stats {
		width:39%;
		margin:auto;
		display:inline-block;
	}
</style>	
</head>

<body>
	<a href="http://amradiolive.com/"><p id="back2site">Back To Site //</p></a>
	<center>

<?php
	echo '
	<h2 id="dash_header" ><strong>'.$_SESSION['user_name'].'\'s Dashboard</strong></h2>					
	<table>
		<tr>	
			<td id="dash_half" width="450px" >
				<center>
				<img width="450px" src="'.$user_pic.'">
				<hr>
				<form action="updateprofile.php" method="POST" enctype="multipart/form-data">
					<input type="file" name="file"><br>
					<input type="hidden" name="user_name" value="'.$user_name.'">
					<input type="hidden" name="user_id" value="'.$user_id.'">
					<input type="hidden" name="trackname" value="'.$trackname.'">
					<input type="submit" value="UPDATE PHOTO">
				</form>
				</center>
			</td>
			
			<td id="dash_half">';
			
			include("campaign_info.php");

echo '<h2 id="heading"">Statistics:</h2><center>';
echo "<a class='stats' >";
include("../config/stats.php");
echo "</a>
	  <a class='stats' >";
include("../config/stats.php");
echo "</a></center>";
			echo '<hr>	
			</td>
			
			<td id="dash_half">
		<h3 id="heading" >Your Campaign:</h3>';
			include("showcase_schedule.php");

echo '			</td>

		</tr>
	</table>
				
				
</center>
</body>
</html>
					';
					
					
					?>