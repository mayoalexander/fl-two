<?PHP

if ((($_FILES["file"]["type"] == "application/zip")
|| ($_FILES["file"]["type"] == "application/x-zip-compressed")
|| ($_FILES["file"]["type"] == "multipart/x-zip")
|| ($_FILES["file"]["type"] == "application/x-compressed")
|| ($_FILES["file"]["type"] == "application/octet-stream"))
&& ($_FILES["file"]["size"] < 20971520))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
    echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    echo "Type: " . $_FILES["file"]["type"] . "<br />";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

    if (file_exists("upload/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "upload/" . $_FILES["file"]["name"]);
      echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
      }
    }
  }
else
  {
  echo "Invalid file";
?>



<form>
<input name="type" value="http://freelabel.net/fb">
<input name="submit" name="submit" value="SUBMIT">


</form