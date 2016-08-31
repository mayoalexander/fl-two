<style type="text/css">
	.message-trigger {
		cursor: pointer;
	}
</style><?php

include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
$config=new Blog();

if (isset($_POST['following'])) {
	if ($config->checkIfAlreadyFollowing($_POST['user_name'],$_POST['following'])==false) {
		echo $config->add_relationship($_POST);
	} else {
		echo 'ALREADY FOLLOWING THIS USER!';
	}
	// var_dump($_POST);
	// echo 'okay 2 bizznes';
	exit;
}


$users = $config->getUsers();
$user_name = Session::get('user_name');


// var_dump($users);
$select_user = '<panel name="receiver">';
foreach ($users as $key => $user) {
	$userdata = $config->getUserData($user['user_name']);

	if ($userdata['photo']=='') {
		$photo = 'https://myspace.com/common/images/user.png';
	} else {
		$photo = $userdata['photo'];
	}
	$select_user .= '<div value="'.$user['following'].'" class="card card-inverse card-social text-center col-md-4">

	<a href="http://freelabel.net/u/'.$user['following'].'" target="_blank">
		<img src="'.$photo.'" height="90" width="90" alt="Avatar" class="img-circle">
		<h4>'.$user['user_name'].'</h4>
	</a>
	<button data-user="'.$user['user_name'].'" data-username="'.$user_name.'" class="follow-trigger btn btn-sm btn-success-outline">Follow</button>
	<div class="card-block container">
      <div class="row">
        <div class="col-md-6 card-stat">
          <h4><small class="message-trigger">Message</small></h4>
        </div>
        <div class="col-md-6 card-stat">
          <h4><small class="">Profile</small></h4>
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
		$('.follow-trigger').click(function(){
			elem = $(this);
			elem.text('Please wait..');
			var user = $(this).attr('data-user');
			var user_name = $(this).attr('data-username');
			var path = 'http://freelabel.net/users/dashboard/follow/';
			$.post(path,{
				following: user,
				user_name : user_name
			},function(result){
				elem.html(result);
			});
		});

		$('.message-trigger').click(function(e){
			e.preventDefault();
			// alert('okay');
			$('#loginModal').modal('show');
			var path = 'http://freelabel.net/users/dashboard/message/';
			$.get(path,function(result){
				$('#loginModal .modal-dialog').removeClass('modal-sm');
				$('#loginModal .modal-dialog').addClass('modal-lg');
				$('#loginModal .modal-body').html(result);
				$('#loginModal .modal-header').text('Send Message');
			});
		});
	});
</script>




