<panel class="col-md-12">
  <div class="card card-inverse card-social text-center">
    <div class="card-block has-gradient">
      <img src="<?php echo $photo; ?>" height="90" width="90" alt="Avatar" class="img-circle">
      <h5 class="card-title"><?php echo $user['name']; ?></h5>
      <h6 class="card-subtitle"><?php echo $user['description']; ?></h6>
      <a href="http://freelabel.net/u/<?php echo $user_name; ?>" class="btn btn-secondary-outline btn-sm" target="_blank">View Profile</a>
    </div>
    <div class="card-block container">
      <div class="row">
        <div class="col-md-4 card-stat">
          <h4><?php echo number_format($stats); ?> <small class="text-uppercase">Views</small></h4>
        </div>
        <div class="col-md-4 card-stat">
          <h4><?php echo $num_tracks; ?> <small class="text-uppercase">Posts</small></h4>
        </div>
        <div class="col-md-4 card-stat">
          <h4><?php echo number_format($score); ?> <small>Score</small></h4>
        </div>
      </div>
    </div>
  </div>
</panel>

<panel class="col-md-6">
<h3>Overview</h3>
  <div class="card card-chart">
    <ul class="list-group">
      <li class="list-group-item complete">
        <span class="label pull-right"><?php echo $num_promos; ?></span>
        <span class="pull-left icon-status status-completed"></span> Promotions
      </li>
      <li class="list-group-item">
        <span class="label pull-right"><?php echo $num_events; ?></span>
        <span class="pull-left icon-status status-backlog"></span> Events
      </li>
      <li class="list-group-item">
        <span class="label pull-right">20</span>
        <span class="pull-left icon-status status-noticket"></span> Posts
      </li>
    </ul>
  </div>
  </panel>

<panel class="col-md-6">
<h3>Tracks</h3>
  <div class="card card-chart">
    <ul class="stats-track-list list-group">
      <?php 
      foreach ($tracks as $key => $value) {
        echo '<li class="list-group-item complete">'.$value['twitter'].' - '.$value['blogtitle'].'</li>';
      }
      ?>
    </ul>
  </div>
</panel>


<panel class="col-md-6">
<h3>Consistency</h3>
  <div class="card card-chart">
    <ul class="stats-date-list list-group">
      <?php 
        echo '<li class="list-group-item complete"><label class="label pull-left">Today</label> - <label class="label pull-right">'.$this_week_count.'</label></li>';
        echo '<li class="list-group-item complete"><label class="label pull-left">Yesterday</label> - <label class="label pull-right">'.$yesterday_count.'</label></li>';
        echo '<li class="list-group-item complete"><label class="label pull-left">'.$day_before.'</label> - <label class="label pull-right">'.$day_before_count.'</label></li>';
        echo '<li class="list-group-item complete"><label class="label pull-left">Previous Weeks</label> - <label class="label pull-right">'.$last_week_count.'</label></li>';
      ?>
    </ul>
  </div>
  </panel>