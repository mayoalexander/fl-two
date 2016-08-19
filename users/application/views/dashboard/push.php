<?php
  include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
  $config = new Blog();
  $type = $config->detect_file_type($_GET['img_path']);
?>
<form class='push_file_form' >
<h4 class="success-feedback" >Please, provide more information before pushing to profile!</h4>
  <div class="photo-upload-results"></div>
	<input type="text" placeholder='Enter Twitter' name='twitter' id="twitter" class="form-control col-md-10" required>
  <i class="count col-md-2"></i>

	<input type="text" placeholder='Enter Trackname' name='title' id="title" class="form-control" required>

	<input type="hidden" name='id' id='id' value="<?php echo $_GET['id']; ?>"  class="form-control">
	<input type="hidden" name='user_name' id='user_name' value="<?php echo $_GET['user_name']; ?>" class="form-control">
	<!-- <input type="hidden" name='title' value="<?php echo $_GET['title']; ?>"> -->
  <?php
    if ($type=='audio/mp3') {
      echo "<input type='file' name='img_path' id='poster' class='form-control' required>";
    } else {
      $poster = $_GET['img_path'];
      echo "<span class='photo-upload-results'><img style='display:none;' src='".$poster."' ></span>";
    }
  ?>
  <!-- Share on Social Media -->
  <input type="checkbox" name="post_to_twitter" id="post_to_twitter" aria-label="..."> <i class="fa fa-twitter"></i>Post To Twitter<br>

	<input type="hidden" name='img_path' id='img_path' value="<?php echo $_GET['img_path']; ?>" class="form-control">
	<!-- <input type="file" name='img_path' id='poster' class="form-control"> -->
	<input type="submit" placeholder='Enter Trackname' class="btn btn-primary btn-block" >
  <hr>
</form>

<script type="text/javascript">

// trim twitter username
$(".push_file_form #twitter").keypress(function() {
  var $y = $(this).val();
  var $newy = $y.replace(/\s+/g, '');
  if ($newy.toLowerCase().indexOf("@") >= 0) {
    console.log('yes mane');
  //   $newy = $newy.append('@');
  } else {
    $newy = '@'+ $newy;
    console.log('No mane');
  }
  $(this).val($newy);

  // $(this).next().html(y);
  // console.log(y);
  // alert(y);
  // .append($(this).length);
});
// $( "#trimmed" ).html( "$.trim()'ed: '" + $.trim(str) + "'" );

$( ".push_file_form" ).submit(function( event ) {

var wrapper = $(this).parent();
var dataForm = $(this);
var c = confirm("Are you sure you want to push this to your public profile?");
if (c==true) {	
	  event.preventDefault();
      // var answr = prompt("there is not data set! enter the title");
      // var answr1 = prompt("Enter Artist Twitter Username: (ex. @YourArtistName)");
      var twitter = $('.push_file_form #twitter').val();
      var title = $('.push_file_form #title').val();
      var dataId = $('.push_file_form #id').val();
      var dataUser = $('.push_file_form #user_name').val();
      var dataFilePath = $('.push_file_form #img_path').val();
      var dataPhoto = $('.push_file_form .photo-upload-results img').attr('src');
      var postToTwitter = $('.push_file_form #post_to_twitter').is(':checked');

      var url = 'http://freelabel.net/users/login/add_promo/' + dataId + '/' + 'WHATBRUH';
      var dataTitle = twitter + ' - ' + title;

      var data = { 
        id: dataId, 
        user_name: dataUser,
        title: dataTitle,
        photo: dataPhoto,
        post_to_twitter: postToTwitter,
        img_path: dataFilePath
      };
      // var data = $(this).serializeArray();


      $.post(url,data, function(result){
        wrapper.css('border','gold solid 3px');
        dataForm.hide('fast');
        $('.success-feedback').text('Added to Profile!');
        $('.success-feedback').css('color', 'gold');
        // wrapper.css('border','red solid 3px');
        // alert(result);
        // console.log(result);
        // wrapper.hide('fast');
        // wrapper.css('width','100%');
      });
}
});



$('.push_file_form #poster').change(function() {
		var pleaseWait = 'Please wait...';
     	// ------ NEW NEW NEW NEW ------ //
     	$('.photo-upload-results').html(' ');
     	$('.photo-upload-results').append(pleaseWait);
     	$('.confirm-upload-buttons').prepend('<p class="wait" style="color:#303030;">Please wait..<p>');
		$('.confirm-upload-buttons').hide('fast');
		var path = 'http://freelabel.net/upload/server/php/upload-photo.php';
		var data;
		var formdata_PHO = $('.push_file_form #poster')[0].files[0];
		var formdata = new FormData();

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



</script>