<?php
include_once('/home/content/59/13071759/html/config/index.php');
require(ROOT.'inc/conn.php');

$todays_date = date('m-d');
$result = $conn->query('select * from twitter_data WHERE timestamp LIKE "%'.$todays_date.'%" ORDER BY `id` DESC');
$numb_soms_sent = count($result->fetchAll());


$leads_conversion = new Config();


/*
 * BUILD SOM ALERTS
 */
$status[] = 'Messages Sent: '.$numb_soms_sent.' / 600';
if ($numb_soms_sent < 600) {
	$status[] = 'Not Enough SOMS Sent.';
} else {
	$status[] = 'SOM quota met!';
}
/* 
 * GET SOM ALERT DATA 
 */
$data='<div class="card card-chart">
<ul class="list-group"><h1>Alerts</h1>';
foreach ($status as $key => $value) {
    $data .= '<li class="list-group-item complete">
        <span class="label pull-right">0</span>
        <span class="pull-left icon-status status-completed"></span> '.$value.'
    </li>';
}
$data.='</ul>
</div>';










include_once(ROOT.'inc/connection.php');
// START COUTNING LEADS
	$result = mysqli_query($con,"SELECT * FROM leads 
			WHERE follow_up_date LIKE '%$todays_date%'
				/*OR follow_up_date='$yesterdays_date' 
				OR follow_up_date='$daybefore_date' 
				OR follow_up_date='$threedaysback' 
				OR follow_up_date='$fourdaysback' 
				OR follow_up_date='$fivedaysback'
				/*OR `user_name` = '".$user_name_session."' */
				ORDER BY `follow_up_date` DESC LIMIT 100");
$i = 0;
while($row = mysqli_fetch_assoc($result)) {
	$i = $i;
	$leads[$row['lead_twitter']][] = $row['lead_name'];
	$i = $i + 1;
	//echo $i;
}
	$number_of_leads = count($leads);
	$min_sales = 60;
	$price = 56;
	// GET PERCENTAGACES
	$sales_progress = round(($number_of_leads / $min_sales) * 100);
	$total_sales 	= number_format($number_of_leads * $price);
	$sales_estimate = $total_sales * 0.1;
	$total_sales_quota	=	number_format($min_sales * $price);	
/* 
 * GET SOM ALERT DATA 
 */
$lead_build='<div class="card card-chart">
<ul class="list-group"><h1>Leads</h1>';
foreach ($leads as $key => $value) {
	// echo '<pre>';
	// var_dump($value);
	// echo '</pre>';
    $lead_build .= '<li class="list-group-item complete">
        <span class="label pull-right">[@'.$key.']</span>
        <span class="pull-left icon-status status-completed"></span>'.$value[0].'
    </li>';
}
$lead_build.='</ul>
</div>';





// var_dump($leads);
?>









    <div class="container row"> 
    	<div class="col-md-4">
    		<?php echo $data; ?>
    	</div>
    	<div class="col-md-8">
    		<?php echo $lead_build; ?>
    	</div>
    </div>

    



