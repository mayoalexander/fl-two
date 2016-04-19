<?php
include_once('/home/content/59/13071759/html/config/index.php');
require(ROOT.'inc/conn.php');

$todays_date = date('Y-m-d');
$result = $conn->query('select * from twitter_data WHERE timestamp LIKE "%'.$todays_date.'%" ORDER BY `id` DESC');
$numb_soms_sent = count($result->fetchAll());


$leads_conversion = new Config();


/*
 * BUILD SOM ALERTS
 */
$status[] = 'Messages Sent: '.$numb_soms_sent.' / 600';
if ($numb_soms_sent < 600) {
	$status[] = '<span class="text-danger">Not Enough SOMS Sent.</span>';
	$status[] = '<a class="btn btn-success-outline som-button-trigger btn-block pull-left" href="http://freelabel.net/som/index.php?som=1&stayopen=1&mins=4&recent=1&cat=all" target="_blank">SOM</a>';
} else {
	$status[] = '<span class="text-success">SOM quota met!</span>';
}
/* 
 * GET SOM ALERT DATA 
 */
$data='<div class="card card-chart">
<ul class="list-group"><h1>Alerts</h1>';
foreach ($status as $key => $value) {
    $data .= '<li class="list-group-item complete clearfix">
         '.$value.'
    </li>';
}
$data.='</ul>
</div>';










include(ROOT.'inc/connection.php');
// START COUTNING LEADS
	$result = mysqli_query($con,"SELECT * FROM leads 
			WHERE follow_up_date LIKE '%$todays_date%'
				/*OR follow_up_date='$yesterdays_date' 
				OR follow_up_date='$daybefore_date' 
				OR follow_up_date='$threedaysback' 
				OR follow_up_date='$fourdaysback' 
				OR follow_up_date='$fivedaysback'
				/*OR `user_name` = '".$user_name_session."' */
				ORDER BY `follow_up_date` DESC LIMIT 200");
$i = 0;


while($row = mysqli_fetch_assoc($result)) {
	$i = $i;
	$leads[$row['lead_twitter']][] = $row['lead_name'];
	$i = $i + 1;
	//echo $i;
	// echo $leads[$row['lead_twitter']][0].'<br>';
}
if ($leads==NULL) {
	$leads['noneFound'] =  'no leads found';
}
// var_dump($leads);

/* 

 * GET SOM ALERT DATA 
 */
$lead_build='<div class="card card-chart">
<ul class="list-group"><h1>Leads</h1>';
foreach ($leads as $key => $value) {
	// echo '<pre>';
	// var_dump($value);
	// echo '</pre>';
    $lead_build .= '
    <li class="list-group-item complete">
        <span class="label pull-left"><a class="fa fa-comment lead-response-button" href="#" data-id="'.$key.'"></a></span>
        <span class="label pull-right lead-twitter-name" data-user="'.$key.'">[<a href="http://twitter.com/@'.$key.'" target="_blank">@'.$key.'</a>]</span>
        <span class="pull-left icon-status status-completed">'.count($value).'</span>'.$value[0].'
    </li>';
}
$lead_build.='</ul>
</div>';

$number_of_leads = count($leads);
	$min_sales = 100;
	$price = 56;
	// GET PERCENTAGACES
	$sales_progress = round(($number_of_leads / $min_sales) * 100);
	$total_sales 	= number_format($number_of_leads * $price);
	$sales_estimate = $total_sales * 0.1;
	$total_sales_quota	=	number_format($min_sales * $price);	


/* 
 * GET SOM ALERT DATA 
 */
$data.='<div class="card card-chart">
<ul class="list-group"><h1>Progress</h1>';
// foreach ($status as $key => $value) {
    $data .= '<li class="list-group-item complete">
        <span class="label pull-right">0</span>
        <span class="pull-left icon-status status-completed"></span> '.$sales_progress.'% Completed
    </li>';
    $data .= '<li class="list-group-item complete">
        <span class="label pull-right">0</span>
        <span class="pull-left icon-status status-completed"></span> $'.$total_sales.' / $'.$total_sales_quota.' Estimated Revenue
    </li>';
    $data .= '<li class="list-group-item complete">
        <span class="label pull-right">0</span>
        <span class="pull-left icon-status status-completed"></span> '.$number_of_leads.' / '.$min_sales.'
    </li>';
    $data .= '<li class="list-group-item complete">
        <span class="label pull-right">0</span><span class="pull-left icon-status status-completed"></span> ';
    if ($number_of_leads > $min_sales) {
    	$sales_status = '<span class="text-success">Sales met!</span>';
    } else {
    	$sales_status = '<span class="text-danger">Sales not met!</span>';

    }

    $data.=  $sales_status.'
    </li>';

// }
$data.='</ul>
</div>';





// var_dump($leads);
?>






<?php //include(ROOT.'submit/views/db/current_clients.php'); ?>



<style type="text/css">
    .lead-response-window {
        width: 100%;
        min-height:300px;
    }
</style>



<!-- MAIN CONTAINER AREA -->
<div class="container row"> 
	<div class="col-md-4">
		<?php echo $data; ?>
	</div>
	<div class="col-md-8">
		<?php echo $lead_build; ?>
	</div>
</div>






<!-- MODAL -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        <textarea class="form-control lead-response-input" rows="5"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary lead-response-trigger">Send Message</button>
      </div>
    </div>
  </div>
</div>


 <script type="text/javascript">
 	$(function(){
 		$('.lead-response-button').click(function(event){
 			event.preventDefault();
 			var lead_id = $(this).attr('data-id');
            var wrapper = $(this).parent().parent();

            // hide wrapper
            wrapper.remove();

            // reset wrapper
            $('#myModal .modal-title').html('');
            $('.lead-response-input').val('');

            // Open Modal 
            $('#myModal').modal('toggle');
            $('#myModal .modal-title').html(wrapper.html());
            // $('#myModal .modal-body').append('<iframe src="http://freelabel.net/" class="lead-response-window" ></iframe>');

 		});
        $('.som-button-trigger').click(function(e){
            e.preventDefault();
            var posturl = $(this).attr('href');
            var somurl = 'http://freelabel.net/twitter/?som=1&q=1';
            // alert('open ' + url);
            window.open(posturl);
            window.open(somurl);
        });

        // open twitter messages 
        $('.lead-twitter-name').click(function(e){
            // e.preventDefault();
            $(this).css('color','red');
            var name = $(this).attr('data-user');
            // alert(name);
        });

        // Lead Response Trigger
        $('.lead-response-trigger').click(function(){
            var text = $('.lead-response-input').val();
            alert('okay do this right here: ' + text);
        });
 	});

 </script>

    



