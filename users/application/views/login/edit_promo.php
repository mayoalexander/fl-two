<form>
<?php 
	// var_dump($_GET);
	/* LOAD CONFIGURATION APP */
	include_once('/home/content/59/13071759/html/config/index.php');
	$config = new Blog();
	$promo = $config->getPromoById($_GET['promo_id']);

	foreach ($promo[0] as $key => $value) {
		switch ($key) {
			case 'caption':
				echo "<label>".ucfirst($key)."</label><textarea class='form-control' name='caption' >".$value."</textarea>";
				break;
			case 'title':
				echo '<label>'.ucfirst($key).'</label><input type="text" name="'.$key.'" class="form-control" value="'.$value.'">';
				break;
		}
	}
?>
</form>