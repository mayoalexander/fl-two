<form method="post" id='edit-promo-form'>
<?php 

function textInput($key , $value, $class=null) {

	if (isset($class) && $class===true) {
		$class = 'promo-date-picker';
		$value = date('Y-m-d', strtotime($value));
	} else {
		$class = '';
	}

	echo '<label>'.ucfirst($key).'</label><input type="text" name="'.$key.'" class="form-control '.$class.'" value="'.$value.'">';
}

function textArea($key , $value) {
	echo "<label>".ucfirst($key)."</label><textarea class='form-control' name='caption' >".$value."</textarea>";
}

function hiddenInput($key , $value) {
	echo "<input type='hidden' class='form-control' name='".$key."' value='".$value."' >";
}
	// var_dump($_GET);
	/* LOAD CONFIGURATION APP */
	include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
	$config = new Blog();
	$promo = $config->getPromoById($_GET['promo_id']);

	foreach ($promo[0] as $key => $value) {
		switch ($key) {
			case 'caption':
				textArea($key, $value);
				break;
			case 'title':
				textInput($key , $value);
				break;
			case 'paypal_url':
				textInput($key , $value);
				break;
			case 'desc':
				textInput($key , $value);
				break;
			case 'date':
				textInput($key , $value, true);
				break;
			case 'id':
				hiddenInput($key , $value);
				break;
		}
	}
?>
<input type="hidden" name="processing" value="true"></input>
<button type="submit" class="btn btn-secondary-outline btn-block m-b-md"><i class="fa fa-save"></i> Save Changes</button>

</form>



<script type="text/javascript">
	$(function(){

		// init datepicker 
		$( ".promo-date-picker" ).datepicker({ 
			dateFormat: 'yy-mm-dd' 
		});

		$('#edit-promo-form').submit(function(event){
			event.preventDefault();
			var data = $(this).serializeArray();
			element = $(this).parent().parent().parent().parent();
			console.log(element);
			element.modal('hide');
			$.post('http://freelabel.net/users/dashboard/edit_promo', data, function(data){
				alert(data);
			})	
		});

	});
</script>