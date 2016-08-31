<?php
// var_dump($_GET);
include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
$config = new Blog();
?>

<form class="attach-post-to-promotions-form">
	<select name="files_to_attach" class="form-control" multiple style="height:450px;">
	<?php
		 $posts = $config->getPostsByUser(0,100,Session::get('user_name'));

		 foreach ($posts as $key => $value) {
		 	echo '<option value="'.$value['id'].'">'.$value['blogtitle'].' - '.$value['twitter'].'</option>';
		 }
	?>
	</select>
	<button class="btn btn-block btn-primary">Attach To Promo</button>
</form>
<script type="text/javascript">
	$(function(){
		$('.attach-post-to-promotions-form').submit(function(event){
			event.preventDefault();
			data = $(this).serializeArray();
			console.log(data);
			var path = 'http://freelabel.net/users/dashboard/attach_files_to_promo/';
			var element = $(this).parent();
			$.post(path, {
				promo_id: <?php echo $_GET['promo_id'];?>,
				file_id: data
			} , function(result){
				// alert(result);
				// console.log(result);
				element.html(result);
			});
			$(this).hide();
		});
	});
</script>