
<!-- Login -->
<div class="modal fade" id="loginMod" tabindex="-1" role="dialog" aria-labelledby="loginMod">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Login To FREELABEL</h4>
      </div>
      <div class="modal-body">
        <?php include(ROOT.'user/views/signin.php'); ?>
      </div>
      <div class="modal-footer">
        <div class="btn-group">
          
          <a  href='http://freelabel.net/register' type="button" class="btn btn-default"><i class="glyphicon glyphicon-key" ></i> Create New Account</a>
          <button type="button" class="btn btn-default" data-dismiss="modal"><i class="glyphicon glyphicon-remove" ></i></button>
        </div>
      </div>
    </div>
  </div>
</div>





    <!-- jQuery -->
    <script>
    	$(function(){

	    	$('.page-scroll').click(function(){
	    		//alert('now collapsing');
		    	//$('.navbar-collapse').collapse();
			});	
    	});
    </script>

	<?php echo $app->getRadioPlayer(); ?>

    <!-- Bootstrap Core JavaScript -->
    <script src="http://freelabel.net/landing/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://freelabel.net/landing/js/jquery.easing.min.js"></script>
    <script src="http://freelabel.net/landing/js/jquery.fittext.js"></script>
    <script src="http://freelabel.net/landing/js/wow.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="http://freelabel.net/landing/js/creative.js"></script>
</body>

</html>