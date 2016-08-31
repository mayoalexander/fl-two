<?php
// print_r($_GET);
include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
$config = new Blog();


$user_promos = $config->get_user_promos(Session::get('user_name'));

// $params[] = array('value'=>'user_name', 'text'=>'user_name','label'=>'Choose Username..');

?>
<form method="post" class='attach_file_form'>
	<label>Add To..</label>
	<?php echo $config->build_dropdown($user_promos); ?>
	<input type='hidden' id='file_id' name='file_id' value='<?php echo $_GET['id'] ?>'>
	<hr>
	<button class="btn btn-secondary-outline btn-success btn-block" >Add</button>
</form>




<!-- // var_dump($config->get_user_promos(Session::get('user_name'))); -->

<script type="text/javascript">
	$(function(){

		$('.attach_file_form').submit(function(event){
			event.preventDefault();
			var promo_id = $(this).find('select').val();
			var file_id = $(this).find('#file_id').val();
			var wrapper = $(this);

			/*
			1. load the ID number of the specified file (file_id)
			2. grab the attached_files of the specified promotion (attached_files)
			3. append the new ID to attached files;  $(attached_files).append( ', ' + file_id)
			4. update data into query
			
			*/
			console.log('thsi is the rappwer');
			console.log(wrapper);
			wrapper.text('please wait..');
			var data = {
				file_id : file_id,
				promo_id : promo_id
			}
			$.post('http://freelabel.net/users/dashboard/attach/',data,function(result){
				wrapper.text('Successfully Added to Promo!');
				setTimeout(function(){
					wrapper.hide('fast');
				},3000);
			});

		});
	});
</script>

