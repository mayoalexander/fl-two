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











<!-- UPLOAD FORM -->
<form class="single-upload-form row">

	<div style="text-align: left;">
		<h1>Upload Files</h1>
		<p>This is where you upload your stuff</p>
	</div>








	<panel class="col-md-3">
		<label id="artwork_photo_button" for="file-to-upload" class="btn btn-success-outline btn-block add-file-button"><i class="fa fa-plus"></i> Add File</label>
		<input type="file" class="form-control" id="file-to-upload"></input>
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
		<input type="submit" name="file_upload" class="btn btn-block btn-success-outline hide-before-upload"></input>
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