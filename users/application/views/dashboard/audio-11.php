<?php
	$user_name = Session::get('user_name');
	$user_email = Session::get('user_email');
	include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
	$config = new Blog();

	// get tag value
	if (isset($_POST["page"]) ) {
		$tag = $_POST["page"];
	} else {
		$tag = '';
	}



	$user_name = Session::get('user_name') ;

	// ADMIN SETTINGS
	if ($user_name == 'admin' OR $user_name == "thatdudewayne") {
	  $user_name = 'admin';
	}
?>


<!-- CUSTOM STYLES -->
<style type="text/css">
	.single-upload-form {
		margin-bottom: 3em;
	}
	.hide-before-upload {
		display: none;
	}
	.add-artwork-trigger {
		cursor: pointer;
	}
    .inputfile, #file-to-upload {
        position:relative;
        width: 0.1px;
        height: 0.1px;
        opacity: 0;
        overflow: hidden;
        position: absolute;
        z-index: -1;
    }
    .inputfile , label {
        font-size: 0.75em;
        color: #e3e3e3;
        background-color: #202020;
        display: inline-block;
    }
    .drag-over {
    	border:solid red 1px;
    }
</style>







<!-- button tool bar  -->
<div class="event-option-panel btn-group dropdown" style="background-color:transparent;text-align:left;border-bottom:3px solid #303030;padding:2% 0%;">
  <!-- Split button -->
<!--   <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-plus"></i> Add New</button>
  <ul class="dropdown-menu">
    <li><a href='http://freelabel.net/drive/plus.php?uid=<?php echo $user_name; ?>'><i class="fa fa-cloud-upload"></i> Upload via FLDRIVE</a></li>
    <li><a href='http://freelabel.net/vendor/instagram/example/'><i class="fa fa-instagram"></i> Connect to Instagram</a></li>
  </ul>
  <button class="btn btn-success btn-xs btn-block add-new-media-audio" style="display:block;" data-link="http://freelabel.net/drive/plus.php?uid=<?php echo $user_name; ?>&type=idea" ><i class="fa fa-plus"></i> Add New</button>
</div> -->

<!-- get user tags  -->
<nav class="filter-option-panel btn-group clearfix" style="background-color:transparent;text-align:left;border-bottom:3px solid #303030;padding:2% 0%;">
  <form class="search-tracks-input pull-left">
    <span class="fa fa-search"></span>
    <input type='text' placeholder="Search Your Uploads..." class="form-control" data-user='<?php echo $user_name; ?>'>
  </form>
  <div class="pull-right col-md-3">
	  <label id="artwork_photo_button" for="file-to-upload" class="btn btn-success-outline btn-block add-file-button"><i class="fa fa-plus"></i> Add File</label>
		<input type="file" class="form-control" id="file-to-upload"></input>
  </div>
</nav>








<!-- UPLOAD FORM -->
<form class="single-upload-form row">
	<panel class="col-md-3">
		
		<!-- <div name="file_upload" class="btn btn-block btn-success-outline hide-before-upload add-artwork-trigger"><i class="fa fa-plus"></i> Add Artwork</div> -->

		<!-- Add Artwork Photo -->
		<label id="artwork_photo_button" for="artwork_photo" class="btn btn-warning-outline btn-block hide-before-upload"><i class="fa fa-plus"></i> Add Artwork</label>
		<input class="form-control inputfile hide-before-upload" type="file" name="photo" id="artwork_photo">
		<span class="file-upload-results"></span>
		<select class="form-control hide-before-upload" name="status"><option value="public" selected="">Public</option><option value="private">Private</option></select>
	</panel>

	<panel class="col-md-9">
		<span class="status"></span>
		<input class="form-control hide-before-upload" type="text" name="title" required="" placeholder="Enter title.."></input>
		<input class="form-control hide-before-upload" type="text" name="twitter" id="twitter" required="" placeholder="Enter Twitter username..">
		<input class="form-control hide-before-upload" type="text" name="phone" id="phone" required="" placeholder="Enter phone number..">
		<textarea class="form-control hide-before-upload" type="text" name="description" placeholder="Enter description.."></textarea>
	</panel>

	<panel class="col-md-12">
		<input type="hidden" name="user_email" value="<?php echo $user_email; ?>">
		<input type="hidden" name="user_name" value="<?php echo $user_name; ?>">
		<button name="file_upload" class="btn btn-block btn-success-outline hide-before-upload">Upload</button>
	</panel>
</form>




<!-- front end functionality  -->
<?php 

  // get tag value
  if (isset($_GET["q"]) ) {
    // Search Tracks
    $query = trim($_GET["q"]);
    echo '<h1><span class="text-muted">Searching For:</span> '.$query.'</h1>';
    $files = $config->get_user_posts_search($user_name, $query);
  } else {
    // show ALL tracks
    $query = '';
    $files = $config->get_user_posts($user_name, 20);
  }
  echo $files['posts']; 

    

?>














<!-- UPLOAD SCRIPT -->
<script type="text/javascript" src='http://freelabel.net/js/uploadFile.js'></script>
<script type="text/javascript">
	
$(function(){
		 $('.search-tracks-input').submit(function(event){
		  $(this).append('<span class="text-muted">Searching...</span>');
		  event.preventDefault();
		  var x = $(this).find('input').val();
		  var u = $(this).find('input').attr('data-user');
		  var thisvalue = $(this).find('input').val('');
		  var url = 'http://freelabel.net/users/dashboard/audio/';
		  var data = {
		    q:x,
		    user:u
		  }
		  $.get(url,data,function(result){
		    $('#audio').html(result);
		  });
		 });

	// ********************************* 
    //  DELETE PROMO CONTROL 
    // *********************************
    $(".controls-audio-delete").click(function(event){
      event.preventDefault();
      var file_id = $(this).attr('data-id');
      var wrapper = $(this).parent();
      var url = 'http://freelabel.net/users/login/delete_feed/' + file_id + '/';
      c = confirm("Are you sure you want to delete this posts?");
      if (c==true) {
        $.get(url,function(result){
          wrapper.parent().hide('fast');
        });
      }     
    });


});
</script>