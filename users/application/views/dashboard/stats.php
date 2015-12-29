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

  <div class="card card-chart">
    <div id="chart-holder" class="center-block" data-active="90%">
      <canvas id="chart-area" class="center-block" width="460" height="460" style="width: 230px; height: 230px;"></canvas>
    </div>
    <ul class="list-group">
      <li class="list-group-item complete">
        <span class="label pull-right"><?php echo $stats; ?></span>
        <span class="icon-status status-completed"></span> Total Views
      </li>
      <li class="list-group-item">
        <span class="label pull-right"><?php echo $num_tracks; ?></span>
        <span class="icon-status status-backlog"></span> Uploads
      </li>
      <li class="list-group-item">
        <span class="label pull-right">20</span>
        <span class="icon-status status-noticket"></span> Without ticket
      </li>
    </ul>
  </div>


  <script type="text/javascript" src='http://freelabel.net/landio/js/landio.min.js'></script>