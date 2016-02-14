<?php
  $config = new Blog($_SERVER['HTTP_HOST']);
  // add these stats in here somehwere in the layout
  $stats = $config->getStatsByUser($site['user']['name']);
  $current_page = '0';
?>
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
      <li><a href="#section-linemove-5" class="icon icon-date dash-filter" data-load="events"><span>
      <!-- <i class="fa fa-calendar" ></i> -->
       Events</span></a></li>
    </ul>
  </nav>
  <div class="content-wrap">

    <section id="section-linemove-1" class="autoload al-feed">
        <!-- display content  -->
        <?php 

          $files = $config->display_user_posts_new('admin' , $current_page);
          echo $files['posts']; 
          
        ?>
    </section>

    <section id="analytics" class="autoload al-analytics" data-load="analytics"></section>

    <section id="promos" class="autoload al-promos" data-load="promos"></section>

    <section id="audio" class="autoload al-audio" data-load="audio"></section>

    <section id="events" class="autoload al-events" data-load="events"></section>

  </div><!-- /content -->
</div><!-- /tabs -->


<script type="text/javascript" src="http://freelabel.net/js/dashboard.js"></script>