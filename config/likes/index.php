<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title>How to create a Like Unlike System in PHP  MySQL and jQuery | PGPGang.com</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  </head>
  <script type="text/javascript" src="jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="script.js"></script>

<link href="style.css" rel="stylesheet" type="text/css" />
<body>
    <div>
      <h2>How to create a Like Unlike System in PHP  MySQL and jQuery example.&nbsp;&nbsp;&nbsp;=> <a href="http://www.phpgang.com/">Home</a> | <a href="http://demo.phpgang.com/">More Demos</a></h2>
<?php
include('../../inc/connection.php');
$strSQL_Result  = mysqli_query($con,"select `like`,`un-like` from `like` where id=1");
$row            = mysqli_fetch_array($strSQL_Result);

$like       = $row['like'];
$unlike     = $row['un-like'];
if($_POST)
{
    if(isset($_COOKIE["counter_gang"]))
    {
        echo "-1";
        exit;
    }
    setcookie("counter_gang", "liked", time()+3600*24, "/like-unlike-in-php-mysql/", ".demo.phpgang.com");
    if(mysqli_real_escape_string($con,$_POST['op']) == 'like')
    {
        $update = "`like`=`like`+1";
    }
    if(mysqli_real_escape_string($con,$_POST['op']) == 'un-like')
    {
        $update = "`un-like`=`un-like`+1";
    }
    mysqli_query($con,"update `like` set $update where `id`=1");
    echo 1;
    exit;   
}
?>
<div class="grid">
<span id="status"></span><br>
<input type="button" value="<?php echo $like; ?>" class="button_like" id="linkeBtn" />
<input type="button" value="<?php echo $unlike; ?>" class="button_unlike" id="unlinkeBtn" />
</div>
</body>
</html>