<?php 
	include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
	$config = new Blog();

?>

<?php
		// get all users
		// $users = $config->getUsers();
		$users = $config->getMessages(Session::get('user_name'));
		// $config->debug($users,1);
		$select_user[$user['receiver']] = '<ol name="receiver" class="">';
		foreach ($users as $key => $user) {
			$select_user[$user['receiver']] .= '<li value="'.$user['receiver'].'">'.$user['receiver'].' - '.$user['message'].'</li>';
		}
		$select_user[$user['receiver']] .= '</ol>';
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
