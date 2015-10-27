    <style type="text/css">
      img {border-width: 0}
    </style>
<link href="http://freelabel.net/submit/views/db/photos/css/uploadfilemulti.css" rel="stylesheet">
<script src="http://freelabel.net/submit/views/db/photos/js/jquery-1.8.0.min.js"></script>
<script src="http://freelabel.net/submit/views/db/photos/js/jquery.fileuploadmulti.min.js"></script>

<!-- Drag and Drop Uploader -->
<div id="mulitplefileuploader">Upload</div>



<!-- Upload Progress Bar -->
<div id="status"></div>


<!-- SCRIPTS TO RUN -->
<!-- SCRIPTS TO RUN -->
<!-- SCRIPTS TO RUN -->
<!-- SCRIPTS TO RUN -->

<script>

$(document).ready(function()
{

var settings = {
	url: "upload.php",
	method: "POST",
	allowedTypes:"jpg,png,gif,doc,pdf,zip",
	fileName: "myfile",
	multiple: true,
	onSuccess:function(files,data,xhr)
	{
		$("#status").html("<font color='green'>Upload is success</font>");
		
	},
    afterUploadAll:function()
    {
        alert("all images uploaded!!");
    },
	onError: function(files,status,errMsg)
	{		
		$("#status").html("<font color='red'>Upload is Failed</font>");
	}
}
$("#mulitplefileuploader").uploadFile(settings);

});
</script>