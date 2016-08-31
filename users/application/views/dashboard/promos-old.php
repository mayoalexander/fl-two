<?php
include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
$config = new Blog();
// userz
// get tag value
if (isset($_POST["page"]) ) {
	$tag = $_POST["page"];
  $current_tag = $tag;

} else if (isset($_GET["page"]) ) {
  $tag = $_GET["page"];
  $current_tag = $tag;

} else {
	$tag = '';
  $current_tag = NULL;
}
?>
<script type="text/javascript" src="http://freelabel.net/config/globals.js"></script>
<script type="text/javascript" src="http://freelabel.net/js/dashboard.js"></script>
<script type="text/javascript" src="http://freelabel.net/js/jquery.jeditable.js"></script>

<!-- button tool bar  -->
<div class="event-option-panel btn-group" style="background-color:transparent;text-align:left;border-bottom:3px solid #303030;padding:2% 0%;">
	<!-- <button class="btn btn-success btn-xs add-new-media-photo" data-link="http://freelabel.net/upload/?uid=<?php echo Session::get('user_name'); ?>&type=photo" target="_blank"><i class="fa fa-plus"></i> Add New Promo</button> -->
	<button type="button" class="btn btn-success btn-xs add-new-media-photo" data-toggle="modal" data-target="#addPromo">
	  <i class="fa fa-plus"></i> Add New Promo
	</button>
</div>

<!-- get user tags  -->
<nav class="filter-option-panel btn-group" style="background-color:transparent;text-align:left;border-bottom:3px solid #303030;padding:2% 0%;">
  <!-- <label>Filter by tags:</label> -->
  <span class="fa fa-tag filter-by-icon"></span>
  <?php
  echo $config->get_user_tags(Session::get('user_name'), $current_tag);
  ?>
</nav>

<div id="promos_content">
  <script type="text/javascript" src="http://freelabel.net/js/promos.js"></script>
  <!-- display content  -->
  <?php $promos = $config->getPromosByUser(Session::get('user_name') , 0, $current_tag);
  echo $config->display_photos($promos, null , 0, $current_tag); ?>
</div>






















<script type="text/javascript">

    $('.editable-promo').editable('http://freelabel.net/submit/update.php',{
         type:  'text',
         name:  'promo',
         title: 'Enter Orphan URL',
         tooltip   : 'Click to Edit URL...'
    });

    $('.editable-promo-file').editable('http://freelabel.net/submit/update.php',{
         type:  'text',
         name:  'promo-file',
         title: 'Enter Orphan URL',
         tooltip   : 'Click to Edit URL...'
    });


    $('.editable-file').editable('http://freelabel.net/submit/update.php',{
         type:  'text',
         name:  'promo-file',
         title: 'Enter Orphan URL',
         tooltip   : 'Click to Edit URL...'
    });




     


	$(".add-new-media-photo").click(function(event) {
		event.preventDefault();
    // alert('okay');
		$.get('http://freelabel.net/users/dashboard/add_new_promo/',function(data){
			$('.new-form-modal').html(data);
		});
  }); 


    $(function(){


      $( ".filter-by-tag" ).change(function() {
        var val = $(this).val();
        var user_name = $(this).attr('data-user');
        $("#promos_content").html('Loading..');
        // loadPage('http://freelabel.net/users/dashboard/promos/', '#main_display_panel #promos ',  val  ,  user_name);
        // loadPage('http://freelabel.net/users/dashboard/get_promos/', '#promos_content ',  val  ,  user_name);
        $.get('http://freelabel.net/users/dashboard/get_promos/', {
          tag:val,
          user_name:user_name
        },function(result){
          $("#promos_content").html(result);
        });
      });



    });

    $('.filter-option-panel a').click(function(){
      var text = $(this).text();
      alert(text);
    });


    // // ********************************* 
    // //  DELETE PROMO CONTROL 
    // // *********************************
    // $(".delete-promo-button").click(function(event){
    //   event.preventDefault();
    //   var file_id = $(this).attr('id');
    //   var wrapper = $(this).parent();
    //   var url = 'http://freelabel.net/users/login/delete_promo/' + file_id + '/';
    //   c = confirm("Are you sure you want to delete this promotion?");
    //   if (c==true) {
    //     $.get(url,function(result){
    //       wrapper.hide('fast');
    //     });
    //   }     
    // });
</script>


<!-- Add New Promo modal -->

<!-- Modal -->
<div class="modal fade" id="addPromo" tabindex="-1" role="dialog" aria-labelledby="addPromoLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
        <h4 class="modal-title" id="addPromoLabel">Create New Promotion</h4>
      </div>
      <div class="modal-body new-form-modal">
        ...
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>



<script type="text/javascript">
  

<?php 
if (isset($_SESSION['user_name'])) {
  echo 'var userNameSession = "'.Session::get('user_name').'";';
} else {
  echo 'var userNameSession = "submission";';
} 
?>




$(function() {
  // config
  function isPlaying(audelem) {
    return !audelem.paused;
  }

    $('.editable').editable('http://freelabel.net/submit/update.php',{
      id  : 'user_post_id',
      // type    : 'textarea',
      name : 'title'
    });

    // Custom Controls
    var globalAudioPlayer = $(".audio-player");
    var globalButtons = $(".controls-play");
    var globalAudioPlayerText =  $(".audio-player-title");

    // ********************************* 
    //  GLOBAL DETECT CONTROL
    setInterval(function(){
        // var ctime = globalAudioPlayer[0].currentTime;
        // var cdur = globalAudioPlayer[0].duration;
        // var daaaashit = 100 - (ctime / cdur);
        // console.log(ctime + ' -' + cdur + ' = ' + daaaashit);
        // if (isPlaying(globalAudioPlayer[0]) == true) {
        //   console.log('YES! a song is playing...');
        // } else if (isPlaying(globalAudioPlayer[0]) == false) {
        //   console.log('NO song playing.');
        // }

      // get next song
      var nowplaying = $('.now-playing');
      var nextsong = nowplaying.parent().parent().next();
      var nextFile = nextsong.find('.controls-play').attr('data-src');
      var nextTitle = nextsong.find('.controls-play').attr('data-title');
      console.log("Now Playing: " + nowplaying.attr('data-title'));
      console.log("Next Up: " + nextTitle);
      // console.log("Next Up: " + nowplaying.attr('data-title'));
      globalAudioPlayer[0].onended = function() {
          $('.now-playing').removeClass('now-playing');
          nextsong.find('.controls-play').addClass('now-playing');
          $(this).html('<i class="fa fa-pause"></i>');
          // alert("The audio has ended");
          // alert("Now playing next song " + nextTitle +' ' + nextFile);
          globalAudioPlayer[0].play();
          globalAudioPlayerText.text(nextTitle);
          globalAudioPlayer.attr('src', nextFile);
          globalAudioPlayer.attr('autoplay', 1);
      };



    },6000);
    // *********************************




    $(".open-edit-options").click(function(){
      alert($(this).attr('data-id'));
    });
    $(".open-delete-options").click(function(){
      alert($(this).attr('data-id'));
    });
    $(".open-link-options").click(function(){
      alert($(this).attr('data-id'));
      var id = $(this).attr('data-id');
      window.open('http://freelabel.net/images/'+id);
    });


});
</script>


