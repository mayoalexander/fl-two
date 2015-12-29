<?php
  $config = new Blog($_SERVER['HTTP_HOST']);
  // add these stats in here somehwere in the layout
  $stats = $config->getStatsByUser($site['user']['name']);
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
        <?php $files = $config->display_user_posts('admin' , 50);
        echo $files['posts']; ?>
    </section>

    <section id="analytics" class="autoload al-analytics" data-load="analytics"></section>

    <section id="promos" class="autoload al-promos" data-load="promos"></section>

    <section id="audio" class="autoload al-audio" data-load="audio"></section>

    <section id="events" class="autoload al-events" data-load="events"></section>

  </div><!-- /content -->
</div><!-- /tabs -->


<script type="text/javascript">
  $(function(){
    // $('.dash-filter').click(function(){
    $('.tabs li').click(function(){
      var tabName = $(this).find('.dash-filter').attr('data-load');
       var stateObj = { foo: "bar" };
        history.pushState(stateObj, "page 2", '?ctrl='+tabName);
        $('#' + tabName).html('<h3 class="text-muted" style="margin:10% 10%;"><i class="fa fa-cog fa-spin"></i> Loading...</h3>');
        var url = 'http://freelabel.net/users/dashboard/' + tabName + '/' ;
        $.get(url, function(data){
          // alert('completed!');
          console.log($('#' + tabName));
          $('#' + tabName).html(data);
        })
        // alert(url);
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