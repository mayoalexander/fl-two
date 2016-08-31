<?php
  include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');

  // $config = new Blog($_SERVER['HTTP_HOST']);
  $account_type = $config->getUserType($site['user']['name']);

  $current_page = '0';
  $user = $config->getUserData($site['user']['name']);

  // $config->debug($site['user']);
  // $config->debug($site['user']['name']);

  // NEW USER REGISTRATION
  if ($user===null) {
    echo '<script>window.location.assign("http://freelabel.net/users/dashboard/complete/")</script>';
  }
  // if ($account_type==='paid') {

  //   // echo 'YES PAID!';
  // } else {
  //   echo 'NOT PAID';
  //   echo '<script>window.location.assign("http://freelabel.net/users/dashboard/unpaid/")</script>';
  // }

  // $config->debug($account_type,true);






?>
<style type="text/css">
  .categories {
    font-weight: 700;
  }
  .feed-categories {
    margin:0 0 2em 0;
    font-size:0.8em;
  }
  .feed-categories div {
    color:#74777b;
    text-transform: lowercase;
    /*background-color:#202020;*/
    border-bottom:solid 1px #74777b;
    cursor: pointer;
  }
  .feed-categories div:hover {
    color:#e3e3e3;
    background-color:#74777b;
  }
</style>
<div class="tabs tabs-style-linemove" id="main_display_panel" >
  <nav>
    <ul>
      <li><a href="#section-linemove-1" class="icon icon-home dash-filter" data-load="feed"><span>
      <!-- <i class="fa fa-rss-square" ></i> -->
       Feed</span></a></li>
      <li><a href="#section-linemove-2" class="icon icon-display dash-filter" data-load="analytics"><span>
      <!-- <i class="fa fa-database" ></i> -->
       Analytics</span></a></li>
      <li><a href="#section-linemove-3" class="icon icon-plug dash-filter" data-load="promos"><span>
      <!-- <i class="fa fa-bullhorn" ></i> -->
       Promotions</span></a></li>
      <li><a href="#section-linemove-4" class="icon icon-upload dash-filter" data-load="audio"><span>
      <!-- <i class="fa fa-music" ></i> -->
       Uploads</span></a></li>
      <li><a href="#section-linemove-5" class="icon icon-date dash-filter" data-load="account"><span>
      <!-- <i class="fa fa-calendar" ></i> -->
       Account</span></a></li>
    </ul>
  </nav>
  <div class="content-wrap">

    <section id="section-linemove-1" class="autoload al-feed">
        <!-- display content  -->
        <?php 

          // echo $config->displayCategories();

          $files = $config->display_user_posts_new('admin' , $current_page);
          echo $files['posts']; 

          
        ?>
    </section>

    <section id="analytics" class="autoload al-analytics" data-load="analytics"></section>

    <section id="promos" class="autoload al-promos" data-load="promos"></section>

    <section id="audio" class="autoload al-audio" data-load="audio"></section>

    <section id="account" class="autoload al-account" data-load="account"></section>

  </div><!-- /content -->
</div><!-- /tabs -->


<script type="text/javascript">
  // $('.feed-categories div').click(function(e){
  //   var catName = $(this).text();
  //   $('#section-linemove-1').html('Loading...');
  //   // alert(catName);
  //   // alert(tabName);
  //   // load the data in to the wrapper
  //   var url = 'http://freelabel.net/users/dashboard/' + catName + '/' ;
  //   $.get(url, function(data){
  //     $('#section-linemove-1').html(data);
  //   })
  // });
</script>

<script type="text/javascript" src="http://freelabel.net/js/dashboard.js"></script>