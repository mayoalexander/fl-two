<?php 
	include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
	$config = new Blog();
	// var_dump($_POST);
?>
<form class="container row message-area" id="message-form">
<?php
	include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
		$config = new Blog($_SERVER['HTTP_HOST']);
		// get all users
		// $users = $config->getUsers();
		$users = $config->getFollowing(Session::get('user_name'));
		// $config->debug($users,1);
		$select_user = '<select name="receiver" class="form-control">';
		foreach ($users as $key => $user) {
			$select_user .= '<option value="'.$user['following'].'">'.$user['following'].'</option>';
		}
		$select_user .= '</select>';
	?>

	<style type="text/css">
		.message-area button {
			margin-right:1.2em;
		}
	</style>


	<div class="col-md-3"><?php echo $select_user; ?>
		<?php 
		if (isset($_POST['sender'])) {
			echo '<label class="label label-success btn-block">';
			echo $config->add_message('messages', $_POST); 
			echo '</label>';
		}
		?>
	</div>
	<div class="col-md-9"><textarea name="message" class="form-control" rows="10"></textarea></div>
	<input type="hidden" name="sender" value="<?php echo Session::get('user_name'); ?>"></input>
	<button class="btn btn-success-outline pull-right">Send</button>

	<script type="text/javascript">
	$(function(){

		$('.message-area').submit(function(e){
			e.preventDefault();
			var data = $(this).serialize();
			var path = 'http://freelabel.net/users/dashboard/message';
			$(this).html('Please Wait..');
			$.post(path, data , function(result){
				$('.message-area').html(result);
				// alert();
			});
		});
	});

	</script>

</form>
