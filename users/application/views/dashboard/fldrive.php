<?php
	$user_name = Session::get('user_name');
	$user_email = Session::get('user_email');
?>












<!-- CUSTOM STYLES -->
<style type="text/css">
	.hide-before-upload {
		display: none;
	}
	.add-artwork-trigger {
		cursor: pointer;
	}
    .inputfile {
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
</style>















<!-- UPLOAD FORM -->
<form class="single-upload-form row">

	<div style="text-align: left;">
		<h1>Upload Files</h1>
		<p>This is where you upload your stuff</p>
	</div>

	<panel class="col-md-3">
		<input type="file" class="form-control" id="file-to-upload"></input>
		<!-- <div name="file_upload" class="btn btn-block btn-success-outline hide-before-upload add-artwork-trigger"><i class="fa fa-plus"></i> Add Artwork</div> -->

		<!-- Add Artwork Photo -->
		<label id="artwork_photo_button" for="artwork_photo" class="btn btn-success-outline btn-block hide-before-upload"><i class="fa fa-plus"></i> Add Artwork</label>
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



















<!-- UPLOAD SCRIPT -->
<script type="text/javascript">

pleaseWait = '<i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw margin-bottom"></i><span class="sr-only">Loading...</span>';

function uploadFile(formdata , formdata_PHO, path, element) {

	    // Add the file to the request.
	    formdata.append('photos[]', formdata_PHO);

		$.ajax({
		    // Uncomment the following to send cross-domain cookies:
		    xhrFields: {withCredentials: true},
		    url: path,
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
		    console.log(formdata_PHO);
		}).fail(function(jqXHR){
		    alert(jqXHR.statusText + 'oh no it didnt work!')
		}).done(function (result) {
			element.html(result);
			$('#file-to-upload').hide();
			$('.hide-before-upload').show();
		});
}



	$(function() {


        // trim twitter username
        $("#twitter").keypress(function() {
          var $y = $(this).val();
          var $newy = $y.replace(/\s+/g, '');
          if ($newy.toLowerCase().indexOf("@") >= 0) {
            // console.log('yes mane');
          //   $newy = $newy.append('@');
          } else {
            $newy = '@'+ $newy;
            // console.log('No mane');
          }
          $(this).val($newy);
        });

		$("#file-to-upload").change(function (){
			var fileName = $(this).val();
			var formdata_PHO = $('#file-to-upload')[0].files[0];
			var formdata = new FormData();
			$('.status').html(pleaseWait);

	        var path = 'http://freelabel.net/upload/server/php/upload-file.php';
	        var element = $('.status');
			uploadFile(formdata,formdata_PHO, path, element);
		});

		$(".inputfile").change(function (e){
			e.preventDefault();

			// Validate if Photo or Not
	        var img = $('#artwork_photo').val();
	        var ext = img.split('.').pop();
	        if (ext.toLowerCase() !=='png' && ext.toLowerCase() !=='jpeg' && ext.toLowerCase() !=='jpg' && ext.toLowerCase() !=='gif') {
	            var type = 'Uh oh, this file you\'ve selected is not a photo. Please upload a photo for the artwork!';
	            alert(type);
	            $('#artwork_photo').val('');
	            return false;
	        } else {
	            // alert("its a photo!");
	        }

	        // Update Button
			var data = $(this).parent().find('#artwork_photo_button');
			data.html('<i class="fa fa-cog"></i> Change Photo');

			// Upload File
			var formdata_PHO = $('.inputfile')[0].files[0];
			var formdata = new FormData();
	        var path = 'http://freelabel.net/upload/server/php/upload-photo.php';
	        var element = $('.file-upload-results');
			uploadFile(formdata,formdata_PHO, path, element);

		});

		// Submit Form
		$(".single-upload-form").submit(function (e){
			e.preventDefault();
			alert('ok');
			var data = $(this).serialize();
			alert(data);
			console.log(data);
		});

       
	});
</script>