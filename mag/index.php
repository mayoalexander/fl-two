<?php
include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
//include_once('../config/index.php');
//include(ROOT.'/mag/view/index.php');
include(ROOT.'/landing/header.php');
include(ROOT.'/user/views/stream.php');
include(ROOT.'/landing/footer.php');

exit;
session_start();
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if ($actual_link == 'http://mag.freelabel.net/') {
  header('Location: http://freelabel.net/mag/'); 
}
// Page Title Configuration
$page_title = "MAGAZINE";
$page_desc = "Subscribe to FREELABEL for access to our exlcusive printed publication, endless music & video streaming, and exclusive content for as low as $10 // 24/7 On-Demand Radio // Music Releases // Exclusive Interviews";
include('../new_header.php');
$page   =   $_GET['page'];
$next_page  = $page+1;
$prev_page  = $page-1;
?>
<style>
  #featured_post_wrapper {
    -webkit-transition: width 2s; /* For Safari 3.1 to 6.0 */
    transition: width 2s;
  }
  //#featured_post_wrapper:hover {
   // width:99%;
  //}

  #next_page, #prev_page {
    padding:3%;
    font-size: 400%;
    position: fixed;
    background-color: #e3e3e3;
    color:#000;
    opacity: 0.8;
    z-index: 10;
    transtion: opacity 0.5s, color 0.5s;
  }
  #next_page:hover, #prev_page:hover {
    padding:3%;
    font-size: 400%;
    position: fixed;
    background-color: #000;
    color:#e3e3e3;
    opacity: 1;

  }
  #prev_page {
    top: 50px;
    left:0px;
  }
  #next_page {
    top: 50px;
    right:0px;
  }

</style>
<!--
<a href='http://mag.freelabel.net/?page=<?php //echo $next_page; ?>#mag' id='next_page'><span class='glyphicon glyphicon-fast-forward'></span></a>
<a href='http://mag.freelabel.net/?page=<?php //echo $prev_page; ?>#mag' id='prev_page'><span class='glyphicon glyphicon-fast-backward'></span></a>
-->
<div class="row">
  <?php 
    $pull = 'new_mag';
    include('pull_mag.php');
  ?>
</div>
<?php include_once('../new_footer.php'); ?>