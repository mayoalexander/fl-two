<?php
//header('Access-Control-Allow-Origin:');
header("Access-Control-Allow-Origin: http://upload.freelabel.net/");
session_start();
if ($_POST['redirect_source']=='fl_drive_post') {
	//
	$filetype = array_reverse(explode('.', $_POST['photo']));
	//print_r($filetype);
	if ($filetype[0]=='m4v' OR $filetype[0]=='mp4') {
		$_POST['type'] = 'video';
		$file_preview = '<video muted="1" autoplay="1" loop="1" src="'.$_POST['photo'].'" width="100%"></video>';
	} elseif ($filetype[0]=='jpg' OR $filetype[0]=='jpeg' OR $filetype[0]=='png' OR $filetype[0]=='gif') {
		$_POST['type'] = 'photo';
		$file_preview = '<img src="'.$_POST['photo'].'" width="100%">';
	}
	
} else {
	$file_preview = '<audio controls preload="metadata"><source src="'.$_POST['audiofile'].'"></audio>';
}
//echo 'VALUES: '.$_POST['type'];
//print_r($_POST);
foreach ($_POST as $key => $value) {
	$value_arr[$key] = $value;

	switch ($key) {
		case 'user_trackname':
			$title = 'Title';
			$filename = urldecode(str_replace('http://freelabel.net/upload/server/php/files/', '', $_POST['audiofile']));
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
		case 'blogentry':
			$title = 'Description';
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
		<div class="col-xs-12 col-md-8">
		<span class="section_title show_more_button col-xs-12 col-md-12"><i class="glyphicon glyphicon-option-horizontal"></i> Show More Options</span>
			<!--<label class="section_title" for="'.$key.'">'.$title.'</label>
			<select name="onsale" class="form-control">
				<option value="1" >Post Now</option>
				<option value="0" >Schedule Post</option>
			</select>-->
		</div>
		';
	}elseif($key=='user_email' 
		OR $key=='user_trackname') {
		if ($key=='user_email') {
			$filename_display='';
		} elseif ($key=='user_trackname') {
			$filename_display = str_replace('.mp3', '', $filename);
		}
		$value_arr_edit[$key] = '
		<div class="col-xs-12 col-md-8">
			<label class="section_title" for="'.$key.'">'.$title.'</label>
			<input type="text" class="form-control" name="'.$key.'" id="'.$key.'" value="'.$filename_display.'" placeholder="Enter '.$title.'">
		</div>
		';
	}elseif($key=='blogentry') {
		$value_arr_edit[$key] = '
		<div class="col-xs-12 col-md-12 optional">
			<label class="section_title" for="'.$key.'">'.$title.'</label>
			<textarea type="text" rows="5" class="form-control" name="'.$key.'" id="'.$key.'" placeholder="Enter '.$title.'"></textarea>
		</div>
		';
	}elseif($key=='user_name' && $_SESSION['user_name']=='') {
		$value_arr_edit[$key] = '<input type="hidden" name="'.$key.'" id="profile-image-upload" value="submission" >';
	}elseif($key=='photo') {
		$value_arr_edit[$key] = $post['photo'];
	}elseif($key=='twitpic') {
		//$value_arr_edit[$key] = '<input type="hidden" name="'.$key.'" id="'.$key.'" value="" >';
		$value_arr_edit[$key] = '
		
		<!--<div class="col-xs-12 col-md-4 optional">
			<label class="section_title" for="'.$key.'">'.$title.'</label>
			<input class="form-control" type="text" name="'.$key.'" placeholder="Enter '.$title.'..." >
			<!--<input type="file" class="custom-file-input" name="photo" id="photo">
		</div>-->
		';
	} else {
		$value_arr_edit[$key] = '
		<div class="col-xs-12 col-md-4">
			<label class="section_title" for="'.$key.'">'.$title.'</label>
			<input type="text" name="'.$key.'" id="'.$key.'" value="'.$value.'" placeholder="'.$title.'..." class="form-control"><br>
		</div>
		';
	}
	
}

echo '
<form  id="single_upload_form" class="pane-body row single_upload_form" enctype="multipart/form-data">

<h1 class="section_title upload_form_results">ADD TO FREELABEL</h1>
<div class="col-xs-12 col-md-4" >

';


if ($_POST['redirect_source']!='fl_drive_post') {
	echo '
		<div class="col-xs-12 col-md-12 confirm_upload" id="confirm_upload">
		'.$file_preview.'<br>
			<label class="section_title " for="Photo">Artwork</label>
			<span class="photo-upload-results"></span>
			<!--<input class="form-control" type="text" name="photo" placeholder="Paste Photo URL" >-->
			<input type="file" class="file-input" name="photo" id="photo">
		</div>
		';	
} else {

	echo '
	<label class="section_title " for="Photo">Artwork</label>
	'.$file_preview.'<br>
	<input type="hidden" class="photo-media" name="photo" value="'.$_POST['photo'].'"  id="photo">';
}





echo '
</div>
<div class="col-xs-12 col-md-8" >
';

foreach ($value_arr_edit as $value) {
	echo $value;
};
echo '
<p class="col-xs-12 col-md-12 confirm-upload-buttons" style="margin-top:15px;">
	<button class="btn btn-success btn-lg file-save col-xs-12 col-md-12" ><i class="glyphicon glyphicon-cloud-upload"></i><br>Upload</button>
	
	<!--<a onclick class="btn btn-primary btn-lg file-edit" >Edit</a>-->
</p>
</form>';


echo '
</div>

';
?>
<script src="http://freelabel.net/js/jquery.min.js" type="text/javascript"></script>
<script src="http://freelabel.net/upload/js/jquery.iframe-transport.js"></script>
<script type="text/javascript">
var newpage = new Array();
//var pleaseWait = "<p>Please wait..</p>";
//var pleaseWait = '<div class="progress"><div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 45%"><span class="sr-only">Loading...</span></div></div>';
var pleaseWait = "<img src='http://freelabel.net/upload/server/php/files/ajax-loader.gif' style='text-align:center;margin:20%;' >";
function saveSingle(order,mp3file,user_name,twittername,trackname,twitpic,onsale,email,phone,photo,redirect_source, blogentry,filetype)	{
			function file_upload_handler() {
				$.post( "http://freelabel.net/config/uploadPost.php", { 
					submit: "submit",
					trackmp3: mp3file,
					loggedin: '1',
					twitter: twittername,
					twittername: twittername,
					trackname: trackname,
					twitpic: twitpic,
					blogentry: blogentry,
					user_name: user_name,
					onsale: onsale,
					email: email,
					phone: phone,
					photo: photo,
					type: filetype,
					redirect_source: redirect_source
				}, function( result ) {
					//$('#single_upload_form').html(result);//.fadeToggle(00);
					//alert(result);//.fadeToggle(00);
					//$('.single_upload_form .upload_form_results').html(result);
					$('.single_upload_form').html(result);
					newpage[order] = result;
					window.open('http://freelabel.net/' + twittername + "/");
			        //window.open('http://upload.freelabel.net/config/Popup.php?i='+order,'','height=400, width=650, left=300, top=100, resizable=yes, scrollbars=yes, toolbar=yes, menubar=no, location=no, directories=no, status=yes');
			    	// TEMPORARY // $('#single_upload_form').html('Completed! <a href="http://freelabel.net/'+twittername+'/" target="_blank" style="color:#101010;">http://freelabel.net/'+twittername+'/</a>');//.fadeToggle(00);
					setTimeout(function(){
						//console.log($(this));
						//console.log($(this).parent());
						//$('.single_upload_form').parent().fadeOut('fast');//.fadeToggle(00);
						//$('.single_upload_form').fadeOut('slow');//.fadeToggle(00);
					},6000);
					//$('#single_upload_form').fadeOut('slow');//.fadeToggle(00);
			        //alert(newpage[order]);
				});
			}
		if (redirect_source != 'fl_drive_post') {
				// --------------------- EXECUTE --------------------- // 
				//var mp3fileFormat = encodeURI(mp3file);

				$.get('http://freelabel.net/config/id3/demos/demo.simple.write.php', {
					mp3: mp3file,
					title: trackname,
					artist: twittername
				},function(result){
					if (result == 'Success!') {

						file_upload_handler();

					} else {

						//alert('something went wrong with the writing!!');
						c = confirm("This file is not an mp3 and may not tag you correctly, do you wish to continue?");
						if (c==true) {
							file_upload_handler();
						}
						
						console.log(result);
					}
					
				});
		} else if (redirect_source == 'fl_drive_post') {
			//alert('what the fuck is going on ');
			file_upload_handler();
		}

	}

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
	    	var blogentry = $('#single_upload_form #blogentry').val();
	    	var filetype = $('#single_upload_form #type').val();

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
            	c = confirm('Are you sure you want to add this to FREELABEL?');
				if (c == true) {
  					$('.single_upload_form .confirm-upload-buttons').hide('fast');//.fadeToggle(00);
  					$('.single_upload_form .confirm-upload-buttons').html('<p>Uploading..</p>');//.fadeToggle(00);
  					$('.single_upload_form .confirm-upload-buttons').show('fast');//.fadeToggle(00);

	            	saveSingle(1,audiofile,user_name,twittername,user_trackname,twitpic,onsale,email,user_phone,photo,redirect_source, blogentry,filetype);
			    	$('.single_upload_form .upload_form_results').prepend(pleaseWait);//.fadeToggle(00);
				}
	        }

}





$(function(){
	$('.optional').hide();
	$('.show_more_button').click(function(event){
		event.preventDefault;
		$('.optional').toggle('fast');
	});
});
$('#photo').change(function() {

     	// ------ NEW NEW NEW NEW ------ //
     	$('.photo-upload-results').html(' ');
     	$('.photo-upload-results').append(pleaseWait);
     	$('.confirm-upload-buttons').prepend('<p class="wait" style="color:#303030;">Please wait..<p>');
		$('.confirm-upload-buttons').hide('fast');
		var path = 'server/php/upload-photo.php';
		var data;
		var formdata_PHO = $('#single_upload_form #photo')[0].files[0];
		var formdata = new FormData();

		// Add the file to the request.
  		formdata.append('photos[]', formdata_PHO);
		//var formdata = $('#single_upload_form').serialize();
		//console.log(formdata);
		//alert([ data, formdata ]);
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







$( ".single_upload_form" ).submit(function( event ) {
  	event.preventDefault();
	
		
  		formValidation();
});

</script>