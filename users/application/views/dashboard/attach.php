<?php

include_once('/home/content/59/13071759/html/config/index.php');
$config = new Blog();


$user_promos = $config->get_user_promos(Session::get('user_name'));

// $params[] = array('value'=>'user_name', 'text'=>'user_name','label'=>'Choose Username..');

?>
<form method="post" class='attach_file_form'>
	<label>Choose a Promotion..</label>
	<?php echo $config->build_dropdown($user_promos); ?>
	<button class="btn-success btn-block" >Add</button>
</form>




<!-- // var_dump($config->get_user_promos(Session::get('user_name'))); -->

<script type="text/javascript">
	$(function(){

		$('.attach_file_form').submit(function(event){
			event.preventDefault();
			var data = $(this).find('select').val();
			var wrapper = $(this);
			wrapper.text('Successfully Pushed!');
			setTimeout(function(){
				wrapper.hide('fast');
			},3000);
		});
	});
</script>

