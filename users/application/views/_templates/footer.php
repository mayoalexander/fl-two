</body>
</html>
<footer class="section-footer bg-inverse" role="contentinfo">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-lg-5">
        <div class="media">
          <div class="media-left">
            <img class="media-object display-1" src='http://freelabel.net/images/FREELABELLOGO.gif' style="width:60px;">
          </div>
          <small class="media-body media-bottom" style='display:none;'>
            &copy; <?php echo $site['name']; ?> 2015. <br>
            Designed by Peter Finlan, developed by Taty Grassini, exclusively for Codrops.
            </small>
        </div>
      </div>
      <div class="col-md-6 col-lg-7">
        <ul class="list-inline m-b-0">
          <li class="active"><a href="http://freelabel.net/users/login/register">About</a></li>
          <li><a href="http://freelabel.net/users/login/register">Register</a></li>
          <!-- <li><a href="http://freelabel.net/upload/?uid=submission" target="_blank">Upload Submission</a></li> -->
          <li><a class="scroll-top" href="#totop">Back to top <span class="icon-caret-up"></span></a></li>
        </ul>
      </div>
    </div>
  </div>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="http://freelabel.net/jPlayer/dist/jplayer/jquery.jplayer.min.js"></script>
<script src="http://freelabel.net/landio/js/landio.min.js"></script>
<script src="http://freelabel.net/js/jquery-ui.min.js"></script>
<script src="http://freelabel.net/config/globals.js"></script>
<script src="http://freelabel.net/landing/view/nexus/js/classie.js"></script>
<script src="http://freelabel.net/landing/view/nexus/js/gnmenu.js"></script>
<script type="text/javascript" src="http://freelabel.net/js/jquery.jeditable.js"></script>
<script>
  new gnMenu( document.getElementById( 'gn-menu' ) );
</script>
<!-- Tab Scripts -->
<script src="http://freelabel.net/landing/view/tabs/js/cbpFWTabs.js"></script>
<script>
  (function() {

    [].slice.call( document.querySelectorAll( '.tabs' ) ).forEach( function( el ) {
      new CBPFWTabs( el );
    });

  })();
</script>
<!-- front end scripts  -->
<!-- <script type="text/javascript" src="http://freelabel.net/js/dashboard.js"></script> -->
<script type="text/javascript">
  

<?php 
if (isset($_SESSION['user_name'])) {
  echo 'var userNameSession = "'.Session::get('user_name').'";';
} else {
  echo 'var userNameSession = "submission";';
  // echo 'alert("no users found!")';
} 
?>



</script>


</body>
</html>
