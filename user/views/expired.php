<?php
session_start();
include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
include(ROOT.'landing/header.php');
?>
<style type="text/css">
.pricing-buttons, .reactivate-options,.reactivate-section {
	margin:auto;
	//display: inline-block;
	text-align: center;
}
.reactivate-options {
	display:none;
}
</style>
<script type="text/javascript">
$(function(){

	// When user clicks on the button, it shows the pricing options!
	$('.reactivate-confirm').click(function(){
		$(this).text('Lets Get Back to The Business!');
		$('.reactivate-options').toggle('fast');
	});

	// Hide any upload elements when expred!
	var element = $('.hide-if-expired');
	element.hide();
	//element.attr('href','');
	//$('a .dropdown-toggle').attr('data-toggle','');
	//$('a .dropdown-toggle').removeClass('class');


	$('.hide-if-expired').css('text-decoration','line-through');

});
</script>
<section class="reactivate-section">
	<h1>Oops, looks like your account is deactivated!</h1>
	<p >You haven't paid for your account this month! You will need to reactivate your account!</p>
	<button class="reactivate-confirm btn btn-lg btn-primary">Reactivate My Account!</button>
	<section class="reactivate-options" > 
		<h2>Choose Your Account Type:</h2>
		<a href="http://freelabel.net/confirm/sub" target="_blank" class="btn btn-primary btn-lg pricing-buttons" >Basic - $10</a>
		<a href="http://freelabel.net/confirm/basic" target="_blank" class="btn btn-primary btn-lg pricing-buttons" >Pro - $60</a>
		<a href="http://freelabel.net/confirm/exclusive" target="_blank" class="btn btn-primary btn-lg pricing-buttons" >Exclusive - $200</a>
	</section>
</section>
<?php
include(ROOT.'landing/footer.php');
?>