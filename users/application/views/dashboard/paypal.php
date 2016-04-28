paypal here!
<?php $auth_token = 'QNhiKWuwkNPnqqjvK2sd5guaADdh2RLG7uaussoIgIWONDci3qVJaJECmOO';

$pp_hostname= "www.sandbox.paypal.com"; // Change to www.sandbox.paypal.com to test against sandbox
// read the post from PayPal system and add 'cmd'
$req= 'cmd=_notify-synch';
 
// $tx_token= $_GET['tx'];
$tx_token= '2AE78745L0415210M';
// 2AE78745L0415210M

 
$req.= "&tx=$tx_token&at=$auth_token";
 
$ch= curl_init();
curl_setopt($ch, CURLOPT_URL, "https://$pp_hostname/cgi-bin/webscr");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
//set cacert.pemverisign certificate path in curl using 'CURLOPT_CAINFO' field here,
//if your server does not bundled with default verisign certificates.
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Host: $pp_hostname", 'Connection: Close', 'User-Agent: FREELABEL NETWORKS'));
$res = curl_exec($ch);
curl_close($ch);
if(!$res){
//HTTP ERROR
}else{
// parse the data
$lines = explode("\n", $res);
$keyarray= array();
if (strcmp ($lines[0], "SUCCESS") == 0) {
for ($i=1; $i<count($lines);$i++){
list($key,$val) = explode("=", $lines[$i]);
$keyarray[urldecode($key)] = urldecode($val);
}
// check the payment_status is Completed
// check that txn_id has not been previously processed
// check that receiver_email is your Primary PayPal email
// check that payment_amount/payment_currency are correct
// process payment
/*        $firstname = $keyarray['first_name'];
$lastname = $keyarray['last_name'];
$itemname = $keyarray['item_name'];
$amount = $keyarray['payment_gross'];
*/
//success
// set in session or database that user has paid or perform some special
// you can use information about the purchase in the variables described above
echo "You really made a payment";
}
else if (strcmp ($lines[0], "FAIL") == 0) {
// payment failed or something
echo "Payment failed";
}
}
if (!isset($_GET['tx'])) {
// user is attempting to access the page without having made any payment
echo "Invalid request";
}
 
?>

