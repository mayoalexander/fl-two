<?php 
include_once('/home/content/59/13071759/html/config/index.php');
$config = new Blog();
$user_files = $config->get_all_files(Session::get('user_name'));
?>
<form class="add-new-promo-form">

	<label>Title</label>
	<input type='text' class="form-control" name='title' placeholder='Enter Title' required>

	<label>Description</label>
	<input type='text' class="form-control" name='desc' placeholder='Enter Title' required>

	<label>Attach Files</label>
	<select name="files[]" multiple class="form-control" required>
		<?php
		foreach ($user_files as $key => $file) {
			echo "<option value='".$file['id']."' >".$file['name']."</option>";
		}
		?>
	</select>
	<small>Hold Cmd or Shift to select multiple files</small>
	<input type="hidden" name='add_new_promo' value='1'>
	<input type="hidden" name='user_name' value='<?php echo Session::get('user_name'); ?>'>
	<button class="btn btn-primary btn-block">Add Promotion</button>
</form>

<script type="text/javascript">
	$(function(){
		$('.add-new-promo-form').submit(function(event){
			event.preventDefault();
			$(this).parent().html('Please wait..');
			var data = $(this).serialize();
			$.post('http://freelabel.net/users/dashboard/add_new_promo/',data,function(data){
				location.reload();
			});
		});
	});
</script>