<style>
#imagePreview {
    width: 180px;
    height: 180px;
    background-position: center center;
    background-size: cover;
    -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);
    display: inline-block;
}
</style>
<script type="text/javascript">
$(function() {
    $("#uploadFile").on("change", function()
    {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
        
        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
            
            reader.onloadend = function(){ // set image data as background of div
                $("#imagePreview").css("background-image", "url("+this.result+")");
            }
        }
    });
});
</script>
	<h2 id="subtitle" >Mixtape Uploader</h2>
			
				<div id="body">


				<br>
					<form method="POST" action="http://amradiolive.com/x/mixtapeUploader.php" name="submissions" enctype="multipart/form-data">
						<fieldset>
							<legend><h4>Mixtape Submission</h4></legend>


							<table>
								<tr>
									<td width="80%">
										Twitter: <br><input type="text" name="twittername" value="@" ><br>
										Project Name: <br><input type="text" name="trackname" value=""><br>
										Email: <br><input type="text" name="email"><Br>
										TwitPic/YouTube URL: (optional) <br><input type="text" name="twitpic">
									</td>
									<td width="200px">
										
										<?php include('imageuploader.php') ?>
									</td>
								</tr>
							</table>
						<input type="hidden" name="type" value="single">
						<input type="hidden" name="user_name" value="<?php echo $_SESSION['user_name']; ?>">
						<input type="hidden" name="userphoto" value="http://amradiolive.com/submit/<?php echo $user_pic ?>">
						<input type="submit" name="submit" value="Upload Submission">
						</fieldset>
					</form>
					</div>