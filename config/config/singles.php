<a name="singles">
<h2 id="subtitle">Featured Singles</h2>

<div id="body" width='60%' >
<div id='trackpanel' width='60%'>
<?php
include('inc/connection.php');
include('config/stats.php');

$result = mysqli_query($con,"SELECT * FROM blog WHERE type='single' ORDER BY  `id` DESC LIMIT 50");

echo "<table id='singles' width='60%'>";

while($row = mysqli_fetch_array($result))
  {
    if (isset($row['playerpath'])) {
	$trackname = strtolower($row['trackname']);
	$tracknameshort = preg_replace('/\s+/', '', $trackname);
	$trackanchor  = "".$tracknameshort;
	$pound = "%23";
	$views = $row['views'];
  $userphoto = $row['userphoto'];
  $playerpath = $row['playerpath'];

	
  echo "<tr>";
  echo "<td><iframe height='250px' width='100%' src=\"".$playerpath."\" frameborder='0' scrolling='no' ></iframe><td>";
  /*echo "<td width='60%' ><a name = '" . $tracknameshort . "'><p id='artist_title' ><a href=\"https://www.google.com/search?q=".$row['twitter']."\">" . $row['twitter'] . "</p>";
  echo "<p id='artist_track'>\"<a href=\"".$row['trackmp3']."\">" . $row['trackname'] . "</a>\"</p><br>";
  
  echo "<a target=\"_blank\"  id=\"singlefunc\"  href=\"" . $row['trackmp3'] . "\">PLAY</a>";
  echo "<a target=\"_blank\" id='singlefunc'  href=\"" . $row['trackmp3'] . "\">DOWNLOAD</a>";
  echo "<a target=\"_blank\" id='singlefunc' href=\"https://twitter.com/intent/tweet?screen_name=&text=[REQUEST/DOWNLOAD]%0A%0A'".$row['trackname'] ."'%0Aby%20".$row['twitter']."%0A%0Aon%20AMRadioLIVE.com/".$pound.$tracknameshort."%0A".$row['twitpic']."\" class=\"twitter-mention-button\" data-related=\"SirAlexMayo\">SHARE</div></a>";
  echo "<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?\'http\':\'https\';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+\'://platform.twitter.com/widgets.js\';fjs.parentNode.insertBefore(js,fjs);}}(document, \'script\', \'twitter-wjs\');</script><br><br><div id= 'jointheteam'>&#9658; ".$new_counts."</div><hr></td>";
  echo "<td><audio controls><source src=\"" . $row['trackmp3'] . "\"></audio>";
	echo "<div id=\"jointheteam\" href=\"" . $row['trackmp3'] . "\">VOTES: ".$row['requests']."</td>"; */
  echo "</tr>";
    }
  }
echo "</table>";

mysqli_close($con);
?>

</div>
</div>