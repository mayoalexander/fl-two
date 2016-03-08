<?php
  $config = new Blog($_SERVER['HTTP_HOST']);
  // add these stats in here somehwere in the layout
  $stats = $config->getStatsByUser($site['user']['name']);
  $current_page = '0';
?>
<div class="tabs tabs-style-linemove" id="main_display_panel" >
  <nav>
    <ul>
      <li><a href="#section-linemove-1" class="icon icon-home dash-filter" data-load="featured"><span>
      <!-- <i class="fa fa-rss-square" ></i> -->
       Featured</span></a></li>
      <li><a href="#section-linemove-2" class="icon icon-display dash-filter" data-load="interviews"><span>
      <!-- <i class="fa fa-database" ></i> -->
       Interviews</span></a></li>
      <li><a href="#section-linemove-3" class="icon icon-plug dash-filter" data-load="videos"><span>
      <!-- <i class="fa fa-bullhorn" ></i> -->
       Videos</span></a></li>
      <li><a href="#section-linemove-4" class="icon icon-upload dash-filter" data-load="magazine"><span>
      <!-- <i class="fa fa-music" ></i> -->
       Magazine</span></a></li>
      <li><a href="#section-linemove-5" class="icon icon-date dash-filter" data-load="Audio"><span>
      <!-- <i class="fa fa-calendar" ></i> -->
       Audio</span></a></li>
    </ul>
  </nav>
  <div class="content-wrap">

    <section id="section-linemove-1" class="autoload al-featured">
        <!-- display content  -->
        <?php 

          $files = $config->display_user_posts_new('admin' , $current_page);
          echo $files['posts']; 
          
        ?>
    </section>

    <section id="interviews" class="autoload al-interviews" data-load="interviews"></section>

    <section id="videos" class="autoload al-videos" data-load="videos"></section>

    <section id="magazine" class="autoload al-magazine" data-load="magazine"></section>

    <section id="audio" class="autoload al-audio" data-load="audio"></section>

  </div><!-- /content -->
</div><!-- /tabs -->


<script type="text/javascript" src="http://freelabel.net/js/public_dashboard.js"></script>