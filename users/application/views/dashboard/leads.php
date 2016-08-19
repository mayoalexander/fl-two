<?php
include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
require(ROOT.'inc/conn.php');
$config = new Blog();
$current_page = 0;
$site = $config->getSiteData($config->site);
$site['media']['photos'] = $config->getPhotoAds($site['creator'], 'current-promo',1);
$todays_date = date('Y-m-d');
$result = $conn->query('select * from twitter_data WHERE timestamp LIKE "%'.$todays_date.'%" ORDER BY `id` DESC');
$numb_soms_sent = count($result->fetchAll());


$leads_conversion = new Config();


/* DETECT HOW MANY POSTS CREATED TODAY */
$posted_today = null;
$tp = $config->getPostsByUser(0,1,'admin');
foreach ($tp as $post) {
    $post_date = date('m-d',strtotime($post['submission_date']));
    $todays_date2 = date('m-d');
    if ($post_date===$todays_date2) {
        $posted_today = true;
    }
}
if ($posted_today===true) {
    $status[] = '<span class="text-success">BLOGS POSTED TODAY!</span>';
} else {
    $status[] = '<span class="text-danger">NOT POSTED TODAY!</span>';
}


/* DETECT HOW MANY PROMOS POSTED TO DAY */
$posted_today = null;
$tpr = $config->getPromosByUser('admin',0);
// $config->debug($tpr,1);
foreach ($tpr as $promo) {
    $post_date = date('m-d',strtotime($promo['date_created']));
    $todays_date2 = date('m-d');
    if ($post_date===$todays_date2) {
        $posted_today = true;
    }
}
if ($posted_today===true) {
    $status[] = '<span class="text-success">PROMOS CREATED TODAY!</span>';
} else {
    $status[] = '<span class="text-danger">NO PROMOS CREATED TODAY</span>';
    
    $status[] = '<a class="btn btn-success-outline btn-block pull-left" href="http://freelabel.net/users/dashboard/?ctrl=promos" target="_blank">ADD NEW PROMO</a>';    
}

/* DETECT HOW MANY CLIENTS SIGNED UP TODAY */




/*
 * BUILD SOM ALERTS
 */
$status[] = 'Messages Sent: '.$numb_soms_sent.' / 600';
if ($numb_soms_sent < 600) {
	$status[] = '<span class="text-danger">Not Enough SOMS Sent.</span>';
	$status[] = '<a class="btn btn-success-outline som-button-trigger btn-block pull-left" href="http://freelabel.net/twitter/?som=1&q=1" target="_blank">SOM</a>';
    $status[] = '<button onclick="openScript()" class="btn btn-warning-outline btn-block"> 
            Open Script
        </button>';
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

$adminPosts = $config->getPostsByUser(0,20,'admin');

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
			ORDER BY `id` DESC LIMIT 100");



while($row = mysqli_fetch_assoc($result)) {
	$i = $i;
	$leads[$row['lead_twitter']][] = array('name'=>$row['lead_name'],'count'=>$row['count']);
	$i = $i + 1;
}
if ($leads==NULL) {
	$leads['noneFound'] =  'no leads found';
}
// var_dump($leads);

/* 

 * Lead Build Data
 */
$lead_build='<div class="card card-chart">
<ul class="list-group"><h1>Leads</h1>';

foreach ($leads as $key => $value) {
if ($value!=='no leads found') {
        $status = '';
        if ($value[0]['count']>=3) {
            $count = $value[0]['count']; 
            $status = 'status-completed';
        } elseif ($value[0]['count']>=1) {
            $count = $value[0]['count']; 
            $status = 'status-backlog';
        } else {
            $count = 0; 
            $status = 'status-noticket';
        }


        $lead_build .= '
        <li class="lead-block list-group-item complete clearfix">
            <span class="label pull-left"><a class="fa fa-star-o lead-promo-button" href="#" data-id="'.$key.'"></a></span>
            <span class="label pull-left"><a class="fa fa-comment lead-response-button" href="#" data-id="'.$key.'"></a></span>
            <span class="label pull-right lead-twitter-name" data-user="'.$key.'" data-count="'.$count.'">[<a href="http://twitter.com/@'.$key.'" target="_blank">@'.$key.'</a>] <span class="text-muted">['.count($value).':'.$count.']</span></span>
            <span class="pull-left icon-status '.$status.'"></span>'.$value[0]['name'].'
        </li>';
    } else {
        // echo 'No leads found!!';
    }
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



$data .= '<li class="list-group-item complete clearfix">
        <a class="btn btn-success-outline open-clients-trigger btn-block pull-left" href="#" target="_blank">View Clients</a>
    </li>';

// }
$data.='</ul>
</div>';





// var_dump($leads);
?>






<?php //include(ROOT.'submit/views/db/current_clients.php'); ?>
<script type="text/javascript">
            function openScript() {
            window.open("http://freelabel.net/users/dashboard/dev?ctrl=script", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=10,left=0,width=290,height=1100");
        }
</script>


<style type="text/css">
    .lead-response-window {
        width: 100%;
        min-height:300px;
    }
    .lead-block .fa {
        margin-right: 0.5em;
    }
    .hot-lead {
        color: gold;
    }
</style>



<!-- MAIN CONTAINER AREA -->
<div class="container row"> 
	<div class="col-md-4">
		<?php echo $data; ?>
	</div>
	<div class="col-md-8 lead-container">
    <select class="form-control lead-filter">
        <option value="today">Today</option>
        <option value="yesterday">Yesterday</option>
        <option value="this_month">This Month</option>
    </select>
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
            // var somurl = 'http://freelabel.net/twitter/?som=1&q=1';
            var somurl = 'http://freelabel.net/som/index.php?som=1&stayopen=1&mins=4&recent=1&cat=all';
            // alert('open ' + url);
            window.open(posturl);
            window.open(somurl);
        });

        // open twitter messages 
        $('.lead-twitter-name').click(function(e){
            // e.preventDefault();
            var elem = $(this);
            var lead_id = elem.attr('data-user');
            var count = elem.attr('data-count');
            var url = 'http://freelabel.net/users/dashboard/updateLeadCount';

            $.post(url, {
                lead_id : lead_id,
                count: count
            }, function(result){
                elem.css('color','red');
                var name = elem.attr('data-user');
                // alert('okay ' + result);
                // alert('okay ' + result);
            });
        });

        // Lead Response Trigger
        $('.lead-response-trigger').click(function(){
            var text = $('.lead-response-input').val();
            alert('okay do this right here: ' + text);
        });

        // Lead Promo Trigger
        $('.lead-promo-button').click(function(e) {
            e.preventDefault();
            var lead_name = $(this).attr('data-id');
            var elem = $(this);
            var promo = '@' + lead_name + ' <?php echo $site['media']['photos'][0]['title']. ' - freelabel.net/users/image/index/'.$site['media']['photos'][0]['id']; ?>';
            var message = encodeURI(promo);
            var url = 'http://freelabel.net/som/index.php?post=1&t=&text=' + message;

            $.post(url,function(result){
                alert(result);
                elem.removeClass('fa-star-o');
                elem.addClass('fa-star');
                elem.css('color', 'yellow');   
            });

            // var url = 'http://freelabel.net/som/index.php?post=1&t=&text=' + message;
            // window.open(url);
        });



        // Open Clients Trigger
        $('.open-clients-trigger').click(function(e){
            e.preventDefault();
            var wrap = $('#leads');
            var url = 'http://freelabel.net/users/dashboard/clients/';
            wrap.html('Loading clients..');
            $.post(url , function(result){
                wrap.html(result);
            })
            alert('okay do this right here: ' + text);
        });



        /* LEADS FILETERS */
        $('.lead-filter').change(function(e){
            var filter = $(this).val();
            var path = "http://freelabel.net/users/dashboard/leads_stream/";
            var data = {
                filter : filter
            }
            $.get(path, data, function(result){
                // alert(result);
                $('.lead-container').html(result);
            });
        });
 	});

 </script>

    



