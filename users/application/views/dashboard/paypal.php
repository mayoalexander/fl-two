
<?php $auth_token = 'QNhiKWuwkNPnqqjvK2sd5guaADdh2RLG7uaussoIgIWONDci3qVJaJECmOO';

// $pp_hostname= "www.sandbox.paypal.com"; // Change to www.sandbox.paypal.com to test against sandbox
// // read the post from PayPal system and add 'cmd'
// $req= 'cmd=_notify-synch';
 
// // $tx_token= $_GET['tx'];
// $tx_token= '2AE78745L0415210M';
// // 2AE78745L0415210M

 
// $req.= "&tx=$tx_token&at=$auth_token";
 
// $ch= curl_init();
// curl_setopt($ch, CURLOPT_URL, "https://$pp_hostname/cgi-bin/webscr");
// curl_setopt($ch, CURLOPT_POST, 1);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
// curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
// //set cacert.pemverisign certificate path in curl using 'CURLOPT_CAINFO' field here,
// //if your server does not bundled with default verisign certificates.
// curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
// curl_setopt($ch, CURLOPT_HTTPHEADER, array("Host: $pp_hostname", 'Connection: Close', 'User-Agent: FREELABEL NETWORKS'));
// $res = curl_exec($ch);
// curl_close($ch);
// if(!$res){
// //HTTP ERROR
// }else{
// // parse the data
// $lines = explode("\n", $res);
// $keyarray= array();
// if (strcmp ($lines[0], "SUCCESS") == 0) {
// for ($i=1; $i<count($lines);$i++){
// list($key,$val) = explode("=", $lines[$i]);
// $keyarray[urldecode($key)] = urldecode($val);
// }
// // check the payment_status is Completed
// // check that txn_id has not been previously processed
// // check that receiver_email is your Primary PayPal email
// // check that payment_amount/payment_currency are correct
// // process payment
// /*        $firstname = $keyarray['first_name'];
// $lastname = $keyarray['last_name'];
// $itemname = $keyarray['item_name'];
// $amount = $keyarray['payment_gross'];
// */
// //success
// // set in session or database that user has paid or perform some special
// // you can use information about the purchase in the variables described above
// echo "You really made a payment";
// }
// else if (strcmp ($lines[0], "FAIL") == 0) {
// // payment failed or something
// echo "Payment failed";
// }
// }
// if (!isset($_GET['tx'])) {
// // user is attempting to access the page without having made any payment
// echo "Invalid request";
// }
 
// var_dump($_GET);
// var_dump($_POST['twitter']);

//
// 

function formatTwitter($twittername) {
	$illegals = array("http://", "https://","twitter.com/", "HTTPS://");// "i", "o", "u", "A", "E", "I", "O", "U"
	$twittername = str_replace($illegals, "", $twittername);
	if (strpos($twittername,'@')===false) {
		echo 'No @ name included..';
		$twittername = "@".$twittername;
	} else {
		echo 'its there!';
	}
	return $twittername;
}

if (isset($_POST['twitter'])) {
	echo 'result: '.formatTwitter($_POST['twitter']);
}





?>
<form id="testingForm">
	<input type="text" name="twitter" class="form-control">
</form>
<span id="form_results"></span>

<script type="text/javascript">
	$(function(){
		$('#testingForm').submit(function(e){
			e.preventDefault();
			$('#form_results').html('Loading..');

			var data = $(this).serialize();
			var path = 'http://freelabel.net/users/dashboard/paypal/';
			$.post(path , data, function(result){
				$('#form_results').html(result);
			});
			// alert(data);
		});
	});
</script>