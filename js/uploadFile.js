
/* CONFIGURAATIONS */
pleaseWait = '<i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw margin-bottom"></i><span class="sr-only">Loading...</span>';
function uploadFile(formdata , formdata_PHO, path, element) {

		// alert('helllooo');


		
	    // Add the file to the request.
	    formdata.append('photos[]', formdata_PHO);

		$.ajax({
		    xhr: function() {
			    var xhr = new window.XMLHttpRequest();

			    xhr.upload.addEventListener("progress", function(evt) {
			      if (evt.lengthComputable) {
			        var percentComplete = evt.loaded / evt.total;
			        percentComplete = parseInt(percentComplete * 100);
			        document.getElementById('artwork_photo_button').innerHTML = percentComplete + '% Uploaded';
			        // $('#artwork_photo_button').html();

			        if (percentComplete === 100) {
			        	// alert('done!');

			        }

			      }
			    }, false);

			    return xhr;
			},
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
			$('#artwork_photo_button').hide();
			$('.hide-before-upload').show();
		});
}





	$(function() {



		// MAIN FILE UPLOAD
		$("#file-to-upload").change(function (){
			var fileName = $(this).val();
			var formdata_PHO = $('#file-to-upload')[0].files[0];
			var formdata = new FormData();


			// console.log('file name: ' + fileName);

			// Validate if Photo or Not
	        var ext = fileName.split('.').pop();
	        // alert(ext.toLowerCase());
	        if (ext.toLowerCase() =='mp3' || ext.toLowerCase()=='mp4') {
	            // alert("Its an MP3!!");
	        } else {
				var type = 'Uh oh, this file you\'ve selected is not an mp3. Please upload an audio file!';
	            // alert(type);
	            $('#artwork_photo').val('');
	            return false;
	        }

			// Update Button
			var data = $(this).parent().find('#artwork_photo_button');
			// data.html('<i class="fa fa-cog"></i> Change Photo');
			data.html(pleaseWait + "Uploading..");

	        var path = 'http://freelabel.net/upload/server/php/upload-file.php';
	        var element = $('.status');
	        $('#title').val(fileName);
			uploadFile(formdata,formdata_PHO, path, element);
		});


		// UPLOAD ARTWORK PHOTO
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


        // Trim Username 
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




		// Submit Form
		$(".single-upload-form").submit(function (e){
			e.preventDefault();
			// alert('ok');
			var elem = $(this);
			var data = $(this).serialize();
			var path = 'http://freelabel.net/users/dashboard/fldrive/';


			// reset everything
			$('.hide-before-upload').hide();
			$('.hide-before-upload').val('');

			elem.addClass('card');
			elem.addClass('card-chart');
			// $('.file-upload-results').html('');


			// elem.html('Please Wait' + data['twitter']);
			$.post(path,data,function(result){
				alert(result);
				console.log(result);
				$('#file-to-upload').show();
				$('#artwork_photo_button').html('<i class="fa fa-plus"></i> Add File');
				$('#artwork_photo_button').show();
			});
			// console.log(data);
		});

       
	});