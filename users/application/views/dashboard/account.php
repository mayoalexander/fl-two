<?php 
	include_once('/home/content/59/13071759/html/lvtr/config.php');
	$site = new Config();

	$profile = $site->get_user_profile($_SESSION['user_name']);
?>
<style type="text/css">
	.profile div {
		padding:2em;
	}
	.profile {
		font-size: 0.8em;
	}
</style>
		<div class="dashboard-header">
			<h1 class="pull-left">Dashboard</h1>
		</div>

		<div>
			<h3>Build Your Profile</h3>
			<panel class="profile clearfix">
				<form name="profile_builder_form" action="#####" method="post" enctype="multipart/form-data" class="profile_builder_form">

					<h1>Basic Info</h1>
					<p class="section-description text-muted">Use this form to complete your FREELABEL Profile. We will use this information to build your campaign as well as tag you during promotional campaigns!</p>

					<div class="col-md-4 col-sm-6">
						<img src="<?php echo $profile['photo']; ?>" class="profile-img img-thumbnail">

						<!-- <h4><i class="fa fa-photo"></i> Upload Profile Photo</h4><input type="file" class="form-control profile_photo" name="photo" >
						<span class="file-upload-results"></span> -->
						
					</div>

					<div class="col-md-4 col-sm-6">
						<h4><i class="fa fa-comment"></i> Display Name</h4>
						<input type="text" class="form-control" name="name" placeholder="What is your Artist or Brand Name?" required="" value="<?php echo $profile['name'] ?>">
					</div>

					<div class="col-md-4 col-sm-6">
						<h4><i class="fa fa-map-marker"></i> Location</h4>
						<input type="text" class="form-control" name="location" placeholder="Where are you from?" required="" value="<?php echo $profile['location'] ?>">
					</div>

					<div class="col-md-4 col-sm-6">
						<h4><i class="fa fa-users"></i> Brand or Management <small>(optional)</small></h4>
						<input type="text" class="form-control" name="brand" placeholder="Enter management contact information (Name, Phone, Email, etc..)" value="<?php echo $profile['brand'] ?>">
					</div>

					<div class="col-md-8">
						<h4><i class="fa fa-book"></i> Artist Bio</h4><br>
						<textarea name="description" class="form-control" rows="4" cols="53" placeholder="Tell us a little (or alot) about yourself.." ><?php echo $profile['description'] ?></textarea>
					</div>

					<h1>Link Social Media</h1>

					<div class=" col-md-4 col-sm-6">
						<h4><i class="fa fa-twitter"></i> Twitter</h4>
						<input type="text" class="form-control" name="twitter" placeholder="Enter your Twitter username.. (include &quot;@&quot; sign)" required="" value="<?php echo $profile['twitter'] ?>">
					</div>

					<div class=" col-md-4 col-sm-6">
						<h4><i class="fa fa-instagram"></i> Instagram <small>(optional)</small></h4>
						<input type="text" class="form-control" name="instagram" placeholder="Enter Your Instagram Username.. (include &quot;@&quot; sign)" value="<?php echo $profile['instagram'] ?>">
					</div>

					<div class=" col-md-4 col-sm-6">
						<h4><i class="fa fa-soundcloud"></i> Soundcloud <small>(optional)</small></h4>
						<input type="text" class="form-control" name="soundcloud" placeholder="Enter Your Soundcloud Username.. (include &quot;@&quot; sign)" value="<?php echo $profile['soundcloud'] ?>">
					</div>

					<div class=" col-md-4 col-sm-6">
						<h4><i class="fa fa-youtube"></i> Youtube <small>(optional)</small></h4>
						<input type="text" class="form-control" name="youtube" placeholder="Enter Your Youtube Username.. (include &quot;@&quot; sign)" value="<?php echo $profile['youtube'] ?>">
					</div>

					<div class=" col-md-4 col-sm-6">
						<h4><i class="fa fa-paypal"></i> Paypal <small>(optional)</small></h4>
						<input type="text" class="form-control" name="paypal" placeholder="Enter Your Paypal Email.." value="<?php echo $profile['paypal'] ?>">
					</div>

					<div class=" col-md-4 col-sm-6">
						<h4><i class="fa fa-snapchat"></i> Snapchat <small>(optional)</small></h4>
						<input type="text" class="form-control" name="snapchat" placeholder="Enter Your Snapchat Username.." value="<?php echo $profile['snapchat'] ?>">
					</div>


					<div class="col-md-12">
						<!-- <input name="update_profile" type="submit" class="btn btn-warning complete-profile-button" value="SAVE PROFILE"> -->
						<button name="update_profile" class="btn btn-warning complete-profile-button"><i class="fa fa-save"></i> Save</button>
						<span class="form-feedback"></span>
					</div>

					<input type="hidden" name="user_name" value="<?php echo $_SESSION['user_name']; ?>">
					<input type="hidden" name="update_profile" value="true">
					<br>
				</form>
			</panel>
		</div>

		


	<script type="text/javascript">
	$(function(){
		$('.profile_builder_form').submit(function(e){
			e.preventDefault();
			var elem = $(this);
			var data = $(this).serialize();
			var btn = elem.find('.complete-profile-button');
			btn.text('Please wait..');
			// elem.append('Please wait..');
			// elem.append(data);
			// alert(data);
			var path = '<?php echo $site->url; ?>views/profile.php';
			$.post(path, data, function(result){
				// elem.parent().parent().parent().html(result);
				btn.removeClass('btn-warning');
				btn.addClass('btn-success');
				btn.html(result);
				setTimeout(function(){
					btn.removeClass('btn-success');
					btn.addClass('btn-warning');
					btn.html('<i class="fa fa-save"></i> Save');
				}, 4000);
				// alert(result);
			});
		});








	});
	</script>