<panel class="col-md-12">
  <div class="card card-inverse card-social text-center">
    <div class="card-block has-gradient">
      <img src="<?php echo $photo; ?>" height="90" width="90" alt="Avatar" class="img-circle">
      <h5 class="card-title"><?php echo $user['name']; ?></h5>
      <h6 class="card-subtitle"><?php echo $user['description']; ?></h6>
      <a href="http://freelabel.net/u/<?php echo $user_name; ?>" class="btn btn-secondary-outline btn-sm" target="_blank">View Profile</a>
      <div class="dropdown">
      <a class="btn-secondary-outline btn-sm dropdown-toggle pull-left" type="button" data-toggle="dropdown"><i class='fa fa-cog' > Edit</i>
      <span class="caret"></span></a>
      <ul class="dropdown-menu edit-profile-menu">
        <li><a href="#" type="button" class="btn-link" data-toggle="modal" data-target="#editPhoto" data-param="Photo"><i class="fa fa-photo" ></i> Change Profile Photo</a></li>
      </ul>
    </div>
    </div>
    <div class="card-block container">
      <div class="row">
        <div class="col-md-4 card-stat">
          <h4><?php if (isset($stats) && $stats!=='N') {
              echo number_format($stats); 
              echo '<small class="text-uppercase">Views (for '.$s['user_twitter'].')</small>'; 
            } else {
              // echo number_format($stats); 
              echo '<span style="color:red;">'.'No Uploads</span>'; 
              echo '<small class="text-uppercase">Upload to start counting up!</small>'; 

              } ?></h4>
        </div>
        <div class="col-md-4 card-stat">
          <h4><?php echo $num_tracks; ?> <small class="text-uppercase">Posts</small></h4>
        </div>
        <div class="col-md-4 card-stat">
          <h4>$<?php echo number_format($score, 2); ?> <small>Earnings (Exclusive Accounts Only)</small></h4>
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
<h3>Uploads</h3>
  <div class="card card-chart">
    <ul class="stats-track-list list-group">
      <?php 
    if (isset($tracks)) {      
        foreach ($tracks as $key => $value) {
          echo '<li class="list-group-item"><a href="'.$value['blog_story_url'].'">'.$value['twitter'].' - '.$value['blogtitle'].'</a></li>';
        }
      } else {
        echo '<li class="list-group-item"><p class="section-description">To get your music placed in radio rotation, magazine pages, and booked on different events, you\'ll need to start uploading music to your account so our DJs, Radio Hosts, and Event managers can have your info for getting you confirmed placement on Major Projects.

        <br>
        <br>

        As long as you are Consistently uploading new music, booking events, and creating promotions for your profile, you end up in our feed more often, which results in you getting placed on more projects.

        <br>
        <br>

        Our goal is to have everything we need of yours and create new ways to release all of your content. Watch as we build your following to grow larger than you possibly imagined.</p></li>';
      }
      ?>
    </ul>
  </div>
</panel>


<panel class="col-md-12">
<h3>Consistency</h3>
  <div class="card card-chart">
    <ul class="stats-date-list list-group">
      <?php 
        echo '<li class="list-group-item complete"><label class="label pull-left">Today</label> - <label class="label pull-right">'.$this_week_count.'</label></li>';
        echo '<li class="list-group-item complete"><label class="label pull-left">Yesterday</label> - <label class="label pull-right">'.$yesterday_count.'</label></li>';
        echo '<li class="list-group-item complete"><label class="label pull-left">'.date('l',strtotime($two_days_ago)).', ('.$two_days_ago.')</label> - <label class="label pull-right">'.$two_days_ago_count.'</label></li>';
        echo '<li class="list-group-item complete"><label class="label pull-left">'.$three_days_ago.'</label> - <label class="label pull-right">'.$three_days_ago_count.'</label></li>';
        echo '<li class="list-group-item complete"><label class="label pull-left">Previous Weeks</label> - <label class="label pull-right">'.$last_week_count.'</label></li>';
      ?>
    </ul>
  </div>
  </panel>





<div id="editPhoto" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content edit-profile-modal">
      <div class="modal-header">
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <form class="edit-profile-photo-form">
          <input type='file' id='edit-profile-photo-input' class="form-contol">
          <input type='hidden' name='user_name' value='<?php echo $user_name; ?>'>
          <input type='submit' class="btn btn-social btn-warning confirm-upload-buttons save-changes-photo" value="Save Changes">
          <hr>
          <span class="photo-upload-results" ></span>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>



<script type="text/javascript">
  $(function(){
    $('.edit-profile-menu a').click(function(event){
      var okay = $(this).attr('data-param');  
      var wrap = $('.edit-profile-modal .modal-title').html('Upload New Profile ' + okay);
      var wrap = $('.edit-profile-modal .modal-title').html();
      // alert(okay);
    });



$('.confirm-upload-buttons').hide();

$('#edit-profile-photo-input').change(function() {
    var pleaseWait = 'Please wait...';
      // ------ NEW NEW NEW NEW ------ //
      $('.photo-upload-results').html('');
      $('.photo-upload-results').append(pleaseWait);
      $('.confirm-upload-buttons').prepend('<p class="wait" style="color:#303030;">Please wait..<p>');
    $('.confirm-upload-buttons').hide('fast');
    var path = 'http://freelabel.net/upload/server/php/upload-photo.php';
    var data;
    var formdata_PHO = $('#edit-profile-photo-input')[0].files[0];
    var formdata = new FormData();

    // Add the file to the request.
      formdata.append('photos[]', formdata_PHO);
  $.ajax({
        // Uncomment the following to send cross-domain cookies:
        xhrFields: {withCredentials: true},
        url: path,
        //dataType: 'json',
        method: 'POST',
        cache       : false,
      processData: false,
      contentType: false, 
      fileElementId: 'image-upload',
        data: formdata,
        beforeSend: function (x) {
              if (x && x.overrideMimeType) {
                  x.overrideMimeType("multipart/form-data");
              }
      },
      // Now you should be able to do this:
      mimeType: 'multipart/form-data'    //Property added in 1.5.1
    }).always(function () {
      //alert(formdata_PHO);
      console.log(formdata_PHO);
      //$('#confirm_upload').html('please wait..');
        //$(this).removeClass('fileupload-processing');
    }).fail(function(jqXHR){
    alert(jqXHR.statusText + 'oh no it didnt work!')
  }).done(function (result) {
        //alert('YES');
    $('.photo-upload-results').html(result);
    $('.confirm-upload-buttons').show('fast');
    // $('.confirm-upload-buttons').css('opacity',1);
    $('.wait').hide('fast');
  })
    
 });


$('.edit-profile-photo-form').submit(function(event){
  event.preventDefault();
  var data = $(this).serialize();
  var el = $(this).parent();
  $.post('http://freelabel.net/users/dashboard/update_photo/',data,function(results){
    el.html(results);
    setTimeout(function(){
      $('#myModal').modal('hide');
    },2000);
  });
  // $(this).okay('.edit-profile-photo-form');
});
















  });
</script>