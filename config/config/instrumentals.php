<a name="instrumentals">
<h2 id="subtitle" >INSTRUMENTALS</h2>
<table id="body" >
<tr>

<td>
<div id='trackpanel'>
<?php
include('inc/connection.php');
include('config/stats.php');

$result = mysqli_query($con,"SELECT * FROM blog WHERE type='beats' ORDER BY  `id` DESC LIMIT 20");

echo "<table id='singles'>
<tr>
<th>PRODUCER</th>
<th>BEAT NAME</th>
</tr>";

while($row = mysqli_fetch_array($result))
  {
	$beattitle = strtolower($row['beattitle']);
	$beattitleshort = preg_replace('/\s+/', '', $beattitle);
	$trackanchor  = "".$beattitleshort;
	$pound = "%23";
	$views = $row['views'];
	
  echo "<tr>";
  echo "<td width='250px' ><a name = '" . $beattitleshort . "'><h4><a href=\"".$row['beatdownload']."\">" . $row['twitter'] . "</h4></td>";
  echo "<td width='250px' >\"<a href=\"".$row['beatdownload']."\">" . $row['beattitle'] . "</a>\"</td>";
  //echo "<td><audio controls><source src=\"" . $row['beaturl'] . "\"></audio></td>";
  //echo "<td><form method='POST' action='requestsong.php' ><input name='postid' type='hidden' value='".$row['id']."'><input type='submit' id='jointheteam' value='REQUEST'></form></td>";
  echo "<td><a id=\"jointheteam\" href=\"" . $row['beatdownload'] . "\">DOWNLOAD</a></td>"; 
  echo "<td><a target=\"_blank\"  id=\"jointheteam\"  href=\"https://twitter.com/intent/tweet?screen_name=&text=[INSTRUMENTAL]%0A%0A'".$row['beattitle'] ."'%0Aby%20".$row['twitter']."%0A%0ADL%3A%20http%3A%2F%2FAMRadioLIVE.com/".$pound.$beattitleshort."%0A".$row['twitpic']."\" class=\"twitter-mention-button\" data-related=\"SirAlexMayo\">SHARE</div></a>";
  echo "<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?\'http\':\'https\';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+\'://platform.twitter.com/widgets.js\';fjs.parentNode.insertBefore(js,fjs);}}(document, \'script\', \'twitter-wjs\');</script></td>";
	//echo "<td><div id= 'jointheteam'>&#9658; ".$new_counts."</div></td>";
	//echo "<td><div id=\"jointheteam\" href=\"" . $row['trackmp3'] . "\">VOTES: ".$row['requests']."</td>";
  echo "</tr>";
  }
echo "</table>";

mysqli_close($con);
?>

</div>
</td>
</tr>
</table>