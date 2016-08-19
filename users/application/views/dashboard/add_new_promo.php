<?php 
include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
$config = new Blog();
$user_files = $config->get_all_files(Session::get('user_name'));
// var_dump($user_files);
// exit;
?>
<style type="text/css">
        .inputfile {
	        position:relative;
            width: 0.1px;
            height: 0.1px;
            opacity: 0;
            overflow: hidden;
            position: absolute;
            z-index: -1;
        }

        .inputfile , #artwork_photo_button {
            font-size: 0.75em;
            color: #e3e3e3;
            background-color: #202020;
            display: inline-block;
        }

        .inputfile:focus, #artwork_photo_button,
        .inputfile, #artwork_photo_button:hover {
        background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #77b55a), color-stop(1, #72b352));
        background:-moz-linear-gradient(top, #77b55a 5%, #72b352 100%);
        background:-webkit-linear-gradient(top, #77b55a 5%, #72b352 100%);
        background:-o-linear-gradient(top, #77b55a 5%, #72b352 100%);
        background:-ms-linear-gradient(top, #77b55a 5%, #72b352 100%);
        background:linear-gradient(to bottom, #77b55a 5%, #72b352 100%);
        filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#77b55a', endColorstr='#72b352',GradientType=0);
        background-color:#77b55a;
        -moz-border-radius:4px;
        -webkit-border-radius:4px;
        border-radius:4px;
        border:1px solid #4b8f29;
        display:inline-block;
        width: 100%;
        cursor:pointer;
        font-weight:bold;
        padding:1em;
        text-align: center;
        text-decoration:none;
        text-shadow:0px 1px 0px #5b8a3c;
        }
        .inputfile:hover {
        background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #72b352), color-stop(1, #77b55a));
        background:-moz-linear-gradient(top, #72b352 5%, #77b55a 100%);
        background:-webkit-linear-gradient(top, #72b352 5%, #77b55a 100%);
        background:-o-linear-gradient(top, #72b352 5%, #77b55a 100%);
        background:-ms-linear-gradient(top, #72b352 5%, #77b55a 100%);
        background:linear-gradient(to bottom, #72b352 5%, #77b55a 100%);
        filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#72b352', endColorstr='#77b55a',GradientType=0);
        background-color:#72b352;
        }
        .inputfile:active {
	        top:1px;
        }
        .inputfile:hover {
	        top:2px;
        }

        .inputfile , #artwork_photo_button {
            cursor: pointer; /* "hand" cursor */
        }

        /* CUSTOM CSS STYLES */
        .add-new-promo-form panel {
        	padding:1em;
        }
        .choose-attached-files {
        	padding: 1em;
        }
</style>
<form class="add-new-promo-form">

	<panel class="col-md-4" style="min-height:250px;">


		<!-- <label>Status</label> -->
		<select name='type' id="promo-type" class="form-control" required>
			<option selected>Choose Type..</option>
			<option value="album" >Album</option>
			<option value="event" >Event</option>
			<option value="merch" >Product</option>
			<option value="gallery">Gallery</option>
			<option value="other">Other..</option>
		</select>


		<!-- <label>Upload Promo Image</label> -->
		<!-- <span class="photo-upload-results"></span> -->
		<!-- <input type='file' class="form-control" name='promo-img' id='poster' required> -->
        <label id="artwork_photo_button" for="poster"><i class="fa fa-plus"></i> Choose a file</label><input class="form-control inputfile" type="file" name="photo" id="poster" /><span class="photo-upload-results"></span>




		<!-- Paypal URL-->
		<input type='text' class="form-control paypal_url additionals" name='paypal_url' placeholder='Enter Paypal URL..' style="display:none;">

		<!-- Event Date -->
		<input type='text' class="form-control start_date additionals" name='start_date' placeholder='Enter Start Date..' style="display:none;">


		<!-- <label>Tags</label> -->
		<!-- <small></small><br> -->
		<input type='text' class="form-control" name='desc' placeholder='Enter Tags (Separate tags using commas)' required>
	</panel>
	
	<panel class="col-md-8">


		<!-- <label>Title</label> -->
		<input type='text' class="form-control" name='title' placeholder='Enter Title' required>
		<!-- <label>Description</label> -->
		<!-- <input type='text' class="form-control" name='caption' placeholder='Enter Description' required> -->
		<textarea class="form-control" name="caption" placeholder="Enter Description.." required></textarea>

		<label>Attach Files</label>
		<small>Hold Cmd or Shift to select multiple files</small>
		<select name="files[]" multiple class="form-control choose-attached-files" required style="min-height:250px;">
			<?php
			foreach ($user_files as $key => $file) {
				echo "<option value='".$file['id']."' >".$file['twitter']." - ".$file['blogtitle']."</option>";
			}
			?>
		</select>

	</panel>



	
	<input type="hidden" name='add_new_promo' value='1'>
	<input type="hidden" name='user_name' value='<?php echo Session::get('user_name'); ?>'>
	<button class="btn btn-success-outline btn-block confirm-upload-buttons">Add Promotion</button>
</form>

<script type="text/javascript">
	$(function(){
		$('.paypal_url').hide();
		$('#promo-type').change(function(e){
			// hide additionals
			$('.additionals').hide();
			var data = $(this).val();
			if (data == 'merch') {
				$('.paypal_url').show();
			} else if (data == 'event') {
				$('.start_date').show();
			} else {
				// $('.paypal_url').hide();
				// $('.start_date').hide();
			}
		});
		$('.add-new-promo-form').submit(function(event){
			event.preventDefault();
			$(this).parent().html('Please wait..');
			var data = $(this).serialize();
			// console.log(data);
			$.post('http://freelabel.net/users/dashboard/add_new_promo/',data,function(result){
				// alert(result);
				// console.log(result);
				$('.add-new-promo-form').html(result);
				location.reload();
			});
		});






	    // datepicker for the events 
	    $('.start_date').datepicker({dateFormat: "yy-mm-dd"});










$('.add-new-promo-form #poster').change(function() {
		var pleaseWait = '<i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw margin-bottom"></i><span class="sr-only">Loading...</span>';
     	// ------ NEW NEW NEW NEW ------ //
     	// $('.photo-upload-results').html(' ');
     	// $('.photo-upload-results').append(pleaseWait);
     	// $('.confirm-upload-buttons').prepend('<p class="wait" style="color:#303030;">Please wait..<p>');
		// $('.confirm-upload-buttons').hide('fast');
		var path = 'http://freelabel.net/upload/server/php/upload-photo.php';
		var data;
		var formdata_PHO = $('.add-new-promo-form #poster')[0].files[0];
		var formdata = new FormData();

		// CHREAK
		var maxSize = (1000 * 1000) * 2; // 2 Megabytes
		var ext = formdata_PHO.name.split('.').pop();
		// alert(ext);


        if (ext.toLowerCase() !=='png' && ext.toLowerCase() !=='jpeg' && ext.toLowerCase() !=='jpg' && ext.toLowerCase() !=='gif') {
            var type = 'Uh oh, this file you\'ve selected is not a photo. Please upload a photo for the artwork!';
            alert(type);
            $('.add-new-promo-form #poster').val('');
            return false;
        } else {
            // alert("its a photo!");
        }


		// console.log(formdata_PHO.size);
	    if (formdata_PHO.size > maxSize) {
			alert('file too large!');
			$('.add-new-promo-form #poster').val('');
			return;
        } else {
        	// alert('great file size!');
        }

		// Add the file to the request.
  		formdata.append('photos[]', formdata_PHO);
	$.ajax({
        // Uncomment the following to send cross-domain cookies:
        xhrFields: {withCredentials: true},
        url: path,
        //dataType: 'json',
        method: 'POST',
        cache       : false,
	    processData: false,
	    contentType: false, 
	    fileElementId: 'image-upload',
        data: formdata,
        beforeSend: function (x) {
	            if (x && x.overrideMimeType) {
	                x.overrideMimeType("multipart/form-data");
	            }
	    },
	    // Now you should be able to do this:
	    mimeType: 'multipart/form-data'    //Property added in 1.5.1
    }).always(function () {
	 	//alert(formdata_PHO);
	 	console.log(formdata_PHO);
	 	//$('#confirm_upload').html('please wait..');
        //$(this).removeClass('fileupload-processing');
    }).fail(function(jqXHR){
		alert(jqXHR.statusText + 'oh no it didnt work!')
	}).done(function (result) {
        // alert('YES');
		$('.photo-upload-results').html(result);
		$('.confirm-upload-buttons').show('fast');
		$('#artwork_photo_button').hide('fast');
		// $('.confirm-upload-buttons').css('opacity',1);
		$('.wait').hide('fast');
	})
    
 });










	});
</script>



