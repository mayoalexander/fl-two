

<div id="body">

  
<style>
  #recentstories {
    margin:auto;
    opacity:0.95;
    height:450px;
    width:100%;
    height:250px;
    overflow-y:scroll;
    }
  #recentScroll {
    width:100%;
    height:400px;
    overflow-y:scroll;
  }
  #recentstories:hover {
    opacity:1;
  }
  #featuredimage {
    max-width: 400px;
  }
</style>





<table id='recentstories' >
  <tr>
  <td>

<?php
  include('inc/connection.php');

  $result = mysqli_query($con,"SELECT * FROM blog WHERE type='blog' ORDER BY  `id` DESC LIMIT 1");

while($row = mysqli_fetch_array($result))
    {
     echo "<a href='blog/#".$row['id']."'>
      <a href=blog/#".$row['id']."><img id='featuredimage' width='400px' height='400px' src=../images/".$row['photo']."></a>";
    }
?>



</td>

<td>


<div id="recentScroll">
<?php
include('inc/connection.php');
include('config/stats.php');

$result = mysqli_query($con,"SELECT * FROM blog WHERE type='blog' ORDER BY  `id` DESC LIMIT 20");

echo "<table width='100%'>";

while($row = mysqli_fetch_array($result))
  {
  $trackname = strtolower($row['trackname']);
  $tracknameshort = preg_replace('/\s+/', '', $trackname);
  $trackanchor  = "".$tracknameshort;
  $pound = "%23";
  $views = $row['views'];
  
  echo "<tr>";
  echo "<td ><a href='blog/#".$row['id']."'><p id='joinbutton'>". $row['twitter'].": ". $row['blogtitle'] . "</p></a></td>";
  //echo "<td><form method='POST' action='requestsong.php' ><input name='postid' type='hidden' value='".$row['id']."'><input type='submit' id='jointheteam' value='REQUEST'></form></td>";
  //echo "<td style='background-image:url('../images/".$row[photo]."');'><a id=\"jointheteam\" href=\"" . $row['beatdownload'] . "\">DOWNLOAD</a></td>"; 
  //echo "<td><a target=\"_blank\"  id=\"joinbutton\"  href=\"https://twitter.com/intent/tweet?screen_name=&text=[FEATURED] ".$row["twitter"] .":%0A%0A".$row["blogtitle"] ."%0A%0Ahttp%3A%2F%2FAMRadioLIVE.com/blog/".$pound.$row['id']."%0A".$row['twitpic']."\" class=\"twitter-mention-button\" data-related=\"SirAlexMayo\">SHARE</div></a>";
  //echo "<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?\'http\':\'https\';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+\'://platform.twitter.com/widgets.js\';fjs.parentNode.insertBefore(js,fjs);}}(document, \'script\', \'twitter-wjs\');</script></td>";
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
</div>
<br>
