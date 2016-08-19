<?php

	include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
		$config = new Blog($_SERVER['HTTP_HOST']);
		// get all users
		// $users = $config->getUsers();
		$users = $config->getFollowing(Session::get('user_name'));
?>
<style>
	.card-social {
		min-height:200px;
		padding:2em;
	}
</style>
<?php
		// var_dump($users);
		$select_user = '<panel name="receiver">';
		foreach ($users as $key => $user) {
			$userdata = $config->getUserData($user['following']);

			if ($userdata['photo']=='') {
				$photo = 'https://myspace.com/common/images/user.png';
			} else {
				$photo = $userdata['photo'];
			}
			$select_user .= '<div value="'.$user['following'].'" class="card card-inverse card-social text-center col-md-4">

			<a href="http://freelabel.net/u/'.$user['following'].'" target="_blank">
				<img src="'.$photo.'" height="90" width="90" alt="Avatar" class="img-circle">
				<h4>'.$user['following'].'</h4>
			</a>
			<button class="btn btn-danger-outline unfollow-trigger" data-user="'.$user['following'].'" data-username="'.$user['user_name'].'">Unfollow</button>
			<div class="card-block container">
		      <div class="row">
		        <div class="col-md-4 card-stat">
		          <h4><small class="">Message</small></h4>
		        </div>
		        <div class="col-md-4 card-stat">
		          <h4><small class="">Profile</small></h4>
		        </div>
		        <div class="col-md-4 card-stat">
		          <h4><small>Earnings</small></h4>
		        </div>
		      </div>
		    </div>
		    </div>
			</div>';
		}
		$select_user .= '</panel>';
		echo $select_user;
?>

<script type="text/javascript">
	$(function(){
		$('.unfollow-trigger').click(function(){
			e = confirm('Are you user you want to unfollow?');
			if (e===false) {
				return;
			}
			elem = $(this);
			wrapper = $(this).parent();
			elem.text('Please wait..');
			var user = $(this).attr('data-user');
			var user_name = $(this).attr('data-username');
			var path = 'http://freelabel.net/users/dashboard/unfollow/';
			$.post(path,{
				following: user,
				user_name : user_name
			},function(result){
				elem.html(result);
				wrapper.hide('slow');
				// wrapper.remove();
				// alert(result);
			});
		});
	});
</script>