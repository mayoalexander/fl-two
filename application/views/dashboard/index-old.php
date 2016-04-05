<?php
$config = new Blog($_SERVER['HTTP_HOST']);
// echo '<pre>';
// print_r($site);
// exit;
//$config->showAdminController();
?>
<?php
// echo '<th>ok</th>';
// echo '<th>Photo</th>';
// echo '<th>Title</th>';
// echo '<th>MP3</th>';

// add these stats in here somehwere in the layout
$stats = $config->getStatsByUser($site['user']['name']);
?>


<?php //$db = //$config->display_dashboard_feed($site['user']); ?>
<div class="tabs tabs-style-linemove" id="main_display_panel" >
  <nav>
    <ul>
      <li><a href="#section-linemove-1" class="icon icon-home dash-filter" data-load="box"><span>
      <!-- <i class="fa fa-rss-square" ></i> -->
       Feed</span></a></li>
      <li><a href="#section-linemove-2" class="icon icon-box dash-box" data-load="box"><span>
      <!-- <i class="fa fa-database" ></i> -->
       Box</span></a></li>
      <li><a href="#section-linemove-3" class="icon icon-plug dash-filter" data-load="Promotions"><span>
      <!-- <i class="fa fa-bullhorn" ></i> -->
       Promotions</span></a></li>
      <li><a href="#section-linemove-4" class="icon icon-coffee dash-display" data-load="Work"><span>
      <!-- <i class="fa fa-music" ></i> -->
       Work</span></a></li>
      <li><a href="#section-linemove-5" class="icon icon-date dash-events" data-load="settings"><span>
      <!-- <i class="fa fa-calendar" ></i> -->
       Events</span></a></li>
    </ul>
  </nav>
  <div class="content-wrap">

    <section id="section-linemove-1">
        <!-- display content  -->
        <?php $files = $config->display_user_posts('admin' , 50);
        echo $files['posts']; ?>
    </section>

    <section id="section-linemove-2" class="autoload al-box" data-load="box">
      <?php $url =  ROOT.'users/application/views/dashboard/box.php'; include($url); ?>
    </section>

    <section id="section-linemove-3">
      <?php $url =  ROOT.'users/application/views/dashboard/promos.php'; include($url); ?>
    </section>

    <section id="section-linemove-4">
      <?php $url =  ROOT.'users/application/views/dashboard/audio.php'; include($url); echo $db['posts']; ?>
    </section>

    <section id="section-linemove-5">
      <?php include('../submit/views/db/showcase_schedule.php'); ?>
       <!--  //$events = $config->getEventsByUser($site['user']['name'] , 50);
        // var_dump($events);
        //echo $config->display_events($events); -->
    </section>

  </div><!-- /content -->
</div><!-- /tabs -->


<script type="text/javascript">
  $(function(){
    $('.dash-filter').click(function(){
      var tabName = $(this).attr('data-load');
       var stateObj = { foo: "bar" };
        history.pushState(stateObj, "page 2", '?ctrl='+tabName);
    });

    $('.editable-file').editable('http://freelabel.net/submit/update.php',{
         type:  'text',
         name:  'file',
         title: 'Enter Orphan URL',
         tooltip   : 'Click to Edit URL...'
    });



    $('.editable-promo').editable('http://freelabel.net/submit/update.php',{
         type:  'text',
         name:  'promo',
         title: 'Enter Orphan URL',
         tooltip   : 'Click to Edit URL...'
    });



    $('.event-datepicker').datepicker({dateFormat: "yy-mm-dd"});

  });
</script>