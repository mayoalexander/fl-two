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

  foreach ($site['user']['media'] as $value) {

$posts_panel = '';
$posts_panel .=
    '<section class="section-news" style="padding-bottom:0;">
      <h3 class="sr-only">News</h3>
      <div class="bg-inverse">
        <div class="row">
          <div class="col-md-6 p-r-0">
            <figure class="has-light-mask m-b-0 image-effect">
              <img src="'.$value['photo'].'" alt="Article thumbnail" class="img-responsive">
            </figure>
          </div>
          <div class="col-md-6 p-l-0">
            <article class="center-block">
              <span class="label label-info">'.$value['twitter'].'</span>
              <br>
              <h5><a href="'.$value['blog_story_url'].'">'.$value['blogtitle'].' <span class="icon-arrow-right"></span></a></h5>
              <p class="m-b-0">
                <a href="'.$value['blog_story_url'].'"><span class="label label-default text-uppercase"><span class="icon-tag"></span> Design Studio</span></a>
                <a href="'.$value['blog_story_url'].'"><span class="label label-default text-uppercase"><span class="icon-time"></span> '.get_timeago(strtotime($value['submission_date'])).'</span></a>
              </p>
            </article>
          </div>
        </div>
      </div>
  </section>';
    // echo $value.'<br>';
    // echo '<tr>';
    //   echo '<td>';
    //   echo '<i class="text-dark fa fa-play-circle audio-player audio-player-control" ></i>';
    //   echo '</td>';

    //   echo '<td><img src="';
    //   print_r($value['photo']);
    //   echo '" style="width:200px;"></td>';

    //   echo '<td>';
    //   print_r($value['twitter']);
    //   echo '<br>';
    //   print_r($value['blogtitle']);
    //   echo '<hr>';
    //   echo '</td>';

    //   echo '
    //         <td>
    //           <audio src="';
    //           print_r($value['trackmp3']);
    //           echo '
    //           " controls preload="metadata"></audio>
    //         </td>';


    // echo '</tr>';
  // print_r($posts_panel);

  }


?>







    <header class="jumbotron bg-inverse text-center center-vertically" role="banner" style="background-image:url('<?php echo $site['user']['profile-photo'];?>');background-position:top center;background-attachment:fixed;">
      <div class="container row">
        <div class="col-md-2"></div>
        <div class="card card-inverse card-social text-center col-md-8" style="display:inline-block;margin:auto;padding-left:0;padding-right:0;">
          <div class="card-block has-gradient">
            <img src="<?php echo $site['user']['profile-photo'] ?>" height="90" width="90" alt="Avatar" class="img-circle">
            <h5 class="card-title"><?php echo $site['user']['name'] ?></h5>
            <h6 class="card-subtitle"><?php echo $site['user']['email'] ?></h6>
            <button type="submit" class="btn btn-secondary-outline btn-sm">Follow</button>
          </div>
          <div class="card-block container">
            <div class="row">
              <div class="col-md-4 card-stat">
                <h4>149 <small class="text-uppercase">Shots</small></h4>
              </div>
              <div class="col-md-4 card-stat">
                <h4>1,763 <small class="text-uppercase">Follows</small></h4>
              </div>
              <div class="col-md-4 card-stat">
                <h4>324 <small>D/Ls</small></h4>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-2"></div>

      </div>
    </header>



    <div class="tabs tabs-style-linemove">
      <nav>
        <ul>
          <li><a href="#section-linemove-1" class="icon icon-home dash-filter" data-load="home"><span>Filter 1</span></a></li>
          <li><a href="#section-linemove-2" class="icon icon-box dash-filter" data-load="archive"><span>Filter 2</span></a></li>
          <li><a href="#section-linemove-3" class="icon icon-display dash-filter" data-load="display"><span>Filter 3</span></a></li>
          <li><a href="#section-linemove-4" class="icon icon-upload dash-filter" data-load="uploads"><span>Filter 4</span></a></li>
          <li><a href="#section-linemove-5" class="icon icon-tools dash-filter" data-load="settings"><span>Filter 5</span></a></li>
        </ul>
      </nav>
      <div class="content-wrap">
        <section id="section-linemove-1"><p>dlkajfdslkjfs;alkjf;laksdjfasjf;laskjf;laksjf;lksjf;lkjs></p></section>
        <section id="section-linemove-2"><p>2</p>
        <?php print_r($posts_panel); ?>
        <?php print_r($site['http']); ?>
        </section>
        <section id="section-linemove-3"><p>3</p></section>
        <section id="section-linemove-4"><p>4</p></section>
        <section id="section-linemove-5"><p>5</p></section>
      </div><!-- /content -->
    </div><!-- /tabs -->

<!--
<section class="row" style='padding:5%;'>
    <div class="col-md-8">
        <div class="card card-inverse card-social text-center">
          <div class="card-block has-gradient">
            <img src="<?php echo $site['user']['profile-image'] ?>" height="90" width="90" alt="Avatar" class="img-circle">
            <h5 class="card-title">Joel Fisher</h5>
            <h6 class="card-subtitle">hey@joelfisher.com</h6>
            <button type="submit" class="btn btn-secondary-outline btn-sm">Follow</button>
          </div>
          <div class="card-block container">
            <div class="row">
              <div class="col-md-4 card-stat">
                <h4>149 <small class="text-uppercase">Shots</small></h4>
              </div>
              <div class="col-md-4 card-stat">
                <h4>1,763 <small class="text-uppercase">Follows</small></h4>
              </div>
              <div class="col-md-4 card-stat">
                <h4>324 <small>D/Ls</small></h4>
              </div>
            </div>
          </div>
        </div>
    </div>
  	<div class="col-md-4">
        <div class="card card-chart">
          <div id="chart-holder" class="center-block" data-active="90%">
            <canvas id="chart-area" class="center-block" width="820" height="820" style="width: 410px; height: 410px;"></canvas>
          </div>
          <ul class="list-group">
            <li class="list-group-item complete">
              <span class="label pull-right">324</span>
              <span class="icon-status status-completed"></span> Completed
            </li>
            <li class="list-group-item">
              <span class="label pull-right">34</span>
              <span class="icon-status status-backlog"></span> In backlog
            </li>
            <li class="list-group-item">
              <span class="label pull-right">20</span>
              <span class="icon-status status-noticket"></span> Without ticket
            </li>
          </ul>
        </div>
        <hr class="invisible">
      </div>
</section>
 -->

<script type="text/javascript">
  $(function(){
    $('.dash-filter').click(function(){
      var tabName = $(this).attr('data-load');
      //alert(tabName + ' clicked!');
    });
  });

</script>
