<?php 
include_once('/home/content/59/13071759/html/config/index.php');
$config = new Blog();
$user_files = $config->get_all_files(Session::get('user_name'));
// var_dump($user_files);
// exit;
?>
<form class="add-new-promo-form">

	<panel class="col-md-4" style="min-height:250px;">
		<label>Upload Promo Image</label>
		<span class="photo-upload-results"></span>
		<input type='file' class="form-control" name='promo-img' id='poster' required>
		<label>Status</label>
		<select name='type' class="form-control">
			<option value="album" selected>Album</option>
			<option value="event" >Event</option>
			<option value="merch" >Product</option>
			<option value="gallery" selected>Gallery</option>
			<option value="other">Other..</option>
		</select>

		<label>Tags</label>
		<!-- <small></small><br> -->
		<input type='text' class="form-control" name='desc' placeholder='Enter Tags (Separate tags using commas)' required>

	</panel>
	
	<panel class="col-md-8">


		<label>Title</label>
		<input type='text' class="form-control" name='title' placeholder='Enter Title' required>
		<!-- <label>Description</label> -->
		<!-- <input type='text' class="form-control" name='caption' placeholder='Enter Description' required> -->
		<textarea class="form-control" name="caption" placeholder="Enter Description.." required></textarea>

		<label>Attach Files</label>
		<small>Hold Cmd or Shift to select multiple files</small>
		<select name="files[]" multiple class="form-control" required style="min-height:250px;">
			<?php
			foreach ($user_files as $key => $file) {
				echo "<option value='".$file['id']."' >".$file['twitter']." - ".$file['blogtitle']."</option>";
			}
			?>
		</select>

	</panel>



	
	<input type="hidden" name='add_new_promo' value='1'>
	<input type="hidden" name='user_name' value='<?php echo Session::get('user_name'); ?>'>
	<button class="btn btn-primary btn-block confirm-upload-buttons">Add Promotion</button>
</form>

<script type="text/javascript">
	$(function(){
		$('.add-new-promo-form').submit(function(event){
			event.preventDefault();
			$(this).parent().html('Please wait..');
			var data = $(this).serialize();
			// console.log(data);
			$.post('http://freelabel.net/users/dashboard/add_new_promo/',data,function(result){
				alert(result);
				// console.log(result);
				location.reload();
			});
		});













$('.add-new-promo-form #poster').change(function() {
		var pleaseWait = 'Please wait...';
     	// ------ NEW NEW NEW NEW ------ //
     	$('.photo-upload-results').html(' ');
     	$('.photo-upload-results').append(pleaseWait);
     	$('.confirm-upload-buttons').prepend('<p class="wait" style="color:#303030;">Please wait..<p>');
		$('.confirm-upload-buttons').hide('fast');
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
            $('#artwork_photo').val('');
            return false;
        } else {
            // alert("its a photo!");
        }


		// console.log(formdata_PHO.size);
	    if (formdata_PHO.size > maxSize) {
			alert('file too large!');
			$('#artwork_photo').val('');
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
        //alert('YES');
		$('.photo-upload-results').html(result);
		$('.confirm-upload-buttons').show('fast');
		// $('.confirm-upload-buttons').css('opacity',1);
		$('.wait').hide('fast');
	})
    
 });










	});
</script>


