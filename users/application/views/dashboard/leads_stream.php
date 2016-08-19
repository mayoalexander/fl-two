<?php 
include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
include(ROOT.'inc/connection.php');
$todays_date = date('Y-m-d');
$yesterdays_date = date('Y-m-d' , strtotime(' - 1 day'));
$this_month = date('Y-m');


if (isset($_GET['filter']) && $_GET['filter']==='yesterday') {
    $sql = "SELECT * FROM leads 
            WHERE follow_up_date LIKE '%$yesterdays_date%'
            ORDER BY `id` DESC LIMIT 200";
} elseif (isset($_GET['filter']) && $_GET['filter']==='this_month') {
    $sql = "SELECT * FROM leads 
            WHERE follow_up_date LIKE '%$this_month%'
            ORDER BY `id` DESC LIMIT 200";
} else {
    $sql = "SELECT * FROM leads 
        WHERE follow_up_date LIKE '%$todays_date%'
            ORDER BY `id` DESC LIMIT 200";
} 


// START COUTNING LEADS
$result = mysqli_query($con,$sql);
$i = 0;



while($row = mysqli_fetch_assoc($result)) {
    $i = $i;
    $leads[$row['lead_twitter']][] = array('name'=>$row['lead_name'],'count'=>$row['count']);
    $i = $i + 1;
}

// echo '<pre>';
// // var_dump($sql);
// // var_dump($_GET);
// // var_dump($leads);
// echo '</pre>';
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
        <li class="list-group-item complete clearfix">
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



echo $lead_build;