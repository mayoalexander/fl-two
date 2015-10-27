<?php
session_start();


//echo 'VALUES: <pre>';
foreach ($_POST as $key => $value) {
	$value_arr[$key] = $value;

	switch ($key) {
		case 'user_trackname':
			$title = 'Title';
			break;
		case 'user_twitter':
			$title = '@TwitterName';
			break;
		case 'twitpic':
			$title = 'Twitpic URL';
			break;
		case 'user_name':
			$title = 'FL Username';
			break;
		case 'user_email':
			$title = 'Email';
			break;
		case 'user_phone':
			$title = 'Phone';
			break;
		case 'onsale':
			$title = 'Status';
			break;
		case 'photo':
			$title = 'Artwork';
			break;
		case 'redirect_source':
			$title = 'Origin Source';
			break;
		case 'audiofile':
			$title = 'Audiofile URL';
			break;
		
		default:
			$title = $key.'.....?';
			break;
	}


	if ($value !=''){
		$value_arr_edit[$key] = '<input type="hidden" name="'.$key.'" id="'.$key.'" value="'.$value.'">';
	}elseif($key=='onsale') {
		$value_arr_edit[$key] = '
		<div class="col-md-8">
			<label class="section_title" for="'.$key.'">'.$title.'</label>
			<select name="onsale" class="form-control">
				<option value="1" >Post Now</option>
				<option value="0" >Schedule Post</option>
			</select>
		</div>
		';
	}elseif($key=='user_email' 
		OR $key=='user_trackname') {
		$value_arr_edit[$key] = '
		<div class="col-md-8">
			<label class="section_title" for="'.$key.'">'.$title.'</label>
			<input type="text" class="form-control" name="'.$key.'" id="'.$key.'" placeholder="Enter '.$title.'">
		</div>
		';
	}elseif($key=='user_name' && $_SESSION['user_name']=='') {
		$value_arr_edit[$key] = '<input type="hidden" name="'.$key.'" id="profile-image-upload" value="submission" >';
	}elseif($key=='photo') {
		$value_arr_edit[$key] = '
		<div class="col-md-4 confirm_upload" id="confirm_upload">
			<label class="section_title" for="'.$key.'">'.$title.'</label>
			<!--<input class="form-control" type="text" name="photo" placeholder="Paste Photo URL" >-->
			<input type="file" class="custom-file-input" name="photo" id="photo">
		</div>
		';
	}elseif($key=='twitpic') {
		//$value_arr_edit[$key] = '<input type="hidden" name="'.$key.'" id="'.$key.'" value="" >';
		$value_arr_edit[$key] = '
		
		<div class="col-md-4 optional">
			<label class="section_title" for="'.$key.'">'.$title.'</label>
			<input class="form-control" type="text" name="'.$key.'" placeholder="Enter '.$title.'..." >
			<!--<input type="file" class="custom-file-input" name="photo" id="photo">-->
		</div>
		';
	} else {
		$value_arr_edit[$key] = '
		<div class="col-md-4">
			<label class="section_title" for="'.$key.'">'.$title.'</label>
			<input type="text" name="'.$key.'" id="'.$key.'" value="'.$value.'" placeholder="'.$title.'..." class="form-control"><br>
		</div>
		';
	}



	
}
//print_r($value_arr);
echo '
<h1 class="section_title">Add to FREELABEL Rotation</h1>
<form  id="single_upload_form" class="well row" enctype="multipart/form-data">

';
foreach ($value_arr_edit as $value) {
	echo $value;
};
echo '
<p class="col-md-12" style="margin-top:15px;">
	<button class="btn btn-success btn-lg file-save" ><i class="glyphicon glyphicon-cloud-upload"></i>Upload</button>
	<span class="btn btn-primary btn-lg show_more_button"><i class="glyphicon glyphicon-list"></i>More</span>
	<!--<a onclick class="btn btn-primary btn-lg file-edit" >Edit</a>-->
</p>
</form>';
?>
<script src="http://freelabel.net/js/jquery.min.js" type="text/javascript"></script>
<script src="http://freelabel.net/upload/js/jquery.iframe-transport.js"></script>
<script type="text/javascript">
$(function(){
	$('.optional').hide();
	$('.show_more_button').click(function(event){
		event.preventDefault;
		$('.optional').toggle('fast');
	});
});
$('#photo').change(function() {

     // var formData = new FormData(this.files[0]);
     // var xhr = new XMLHttpRequest();

     	// ------ ENW NEW NEW NEW ------ //
		var path = 'server/php/upload-photo.php';
		var data;
		var formdata_PHO = $('#single_upload_form #photo')[0].files[0];
		var formdata = new FormData();
		// Add the file to the request.
  		formdata.append('photos[]', formdata_PHO);
		//var formdata = $('#single_upload_form').serialize();
		//console.log(formdata);
		//alert([ data, formdata ]);
		

	 // NEW SHIT BELOW
	 /* var data;
	 var theObject = $('#photo')[0].files[0];
	 //alert(theObject);
	*/
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
	 	$('#confirm_upload').html('please wait..');
        //$(this).removeClass('fileupload-processing');
    }).fail(function(jqXHR){
		alert(jqXHR.statusText + 'oh no it didnt work!')
	}).done(function (result) {
        //alert('YES');
		$('#confirm_upload').html(result);
	})
    /*}
	 
     formData = new FormData();
     //formData.append('photo', $('#photo')[0].files[0]);
     formData.append("CustomField1", "This is some extra data");
     formData.append("CustomField", theObject['name']);
     // console.log(formData);
     console.log(theObject);
     $.ajax({
            //secureuri: false,
     		type: 'POST',
         	url: 'http://freelabel.net/upload/server/php/upload-photo.php',
		  	data: formData,
		  	
		  	jsonp: false,
			jsonpCallback: "formData",
	        // Uncomment the following to send cross-domain cookies:
            xhrFields: {withCredentials: true},
            //dataType: 'json',
	        cache       : false,
	        processData: false,
	        contentType: false, 
	        fileElementId: 'image-upload',
            //context: $('#fileupload')[0],


	        // // This will override the content type header, 
	        // // regardless of whether content is actually sent.
	        // // Defaults to 'application/x-www-form-urlencoded'
	        // // Before 1.5.1 you had to do this:
	        beforeSend: function (x) {
	            if (x && x.overrideMimeType) {
	                x.overrideMimeType("multipart/form-data");
	            }
	        },
	        // Now you should be able to do this:
	        mimeType: 'multipart/form-data',    //Property added in 1.5.1
			success: function(data)
			{
				alert('YES');
				$('#confirm_upload').html(data);
			},
			error: function(xhr, textStatus, errorThrown)
            {
					alert('NOO');

                    console.log(errorThrown + ' error');
                    return false;
            }
     });*/
 });



function formValidation() {
			var user_name = $('#single_upload_form #user_name').val();
	    	var email = $('#single_upload_form #user_email').val();
	    	var user_phone = $('#single_upload_form #user_phone').val();
	    	var twitpic = $('#single_upload_form #twitpic').val();
	    	var user_trackname = $('#single_upload_form #user_trackname').val();
	    	var twittername = $('#single_upload_form #user_twitter').val();
	    	var onsale = $('#single_upload_form #onsale').val();
	    	var photo = $('#single_upload_form #photo').val();
	    	var audiofile = $('#single_upload_form #audiofile').val();
	    	var redirect_source = $('#single_upload_form #redirect_source').val();



            var w  = $('#single_upload_form #user_twitter').val();
            var x = $('#single_upload_form #user_email').val();
            var y = $('#single_upload_form #user_phone').val();
            var z = $('#single_upload_form #user_trackname').val();
	    	var a = $('#single_upload_form #photo').val();



            if (x == null || x == "") {
                alert("Email must be filled out");
                return false;
            } else if (y == null || y == "") {
                alert("Phone must be filled out");
            	return false;
            } else if (z == null || z == "") {
                alert("Trackname must be filled out");
            	return false;
            } else if (w == null || w == "") { 
                alert("Twittername must be filled out");
            	return false;
            } else if (a == null || a == "") {
                alert("Photo must be filled out");
            	return false;
            } else {
            	//alert('Everything GOod!');
            	saveSingle(1,audiofile,user_name,twittername,user_trackname,twitpic,onsale,email,user_phone,photo,redirect_source);
		    	$('#single_upload_form').prepend('<p>Please Wait..</p>');//.fadeToggle(00);
		    	setTimeout(function(){
		    		//$('#single_upload_form').html('Completed! <a href="http://freelabel.net/'+twittername+'/" target="_blank" style="color:#101010;">http://freelabel.net/'+twittername+'/</a>');//.fadeToggle(00);
	    		},2000);
	        }
}


$( "#single_upload_form" ).submit(function( event ) {
  event.preventDefault();
  formValidation();
});

</script>