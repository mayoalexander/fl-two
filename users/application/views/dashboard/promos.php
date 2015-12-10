<?php
include_once('/home/content/59/13071759/html/config/index.php');
$config = new Blog();

// userz
// get tag value
if (isset($_POST["page"]) ) {
	$tag = $_POST["page"];
} else {
	$tag = '';
}
?>


<nav class="event-option-panel btn-group" style="background-color:transparent;text-align:left;border-bottom:3px solid #303030;padding:2% 0%;">
	<!-- <button class="btn btn-success btn-xs add-new-media-photo" data-link="http://freelabel.net/upload/?uid=<?php echo Session::get('user_name'); ?>&type=photo" target="_blank"><i class="fa fa-plus"></i> Add New Promo</button> -->
	<button type="button" class="btn btn-success btn-xs add-new-media-photo" data-toggle="modal" data-target="#myModal">
	  <i class="fa fa-plus"></i> Add New Promo
	</button>


	<a target="_blank" href="<?php echo $config->getUserURL(Session::get('user_name')); ?>" class="btn btn-default btn-xs">View Profile</a>
</nav>


<nav class="event-option-panel btn-group" style="background-color:transparent;text-align:left;border-bottom:3px solid #303030;padding:2% 0%;">

<!-- get user tags  -->
<?php
echo $config->get_user_tags(Session::get('user_name'));
?>
</nav>

<!-- display content  -->
<?php $photos = $config->getPhotosByUser(Session::get('user_name') , 20, $tag);
echo $config->display_photos($photos); ?>

<script type="text/javascript">
	$(".add-new-media-photo").click(function(event) {
		event.preventDefault();
		$.get('http://freelabel.net/users/dashboard/add_new_promo/',function(data){
			$('.new-form-modal').html(data);
		});
    }); 
    $(function(){
    	$('.promo-file-options a').click(function(event){
    		$(this).parent().hide('fast');
    		var action = $(this).attr('data-action');
    		var id = $(this).attr('data-id');
    		var promoId = $(this).parent().parent().parent().attr('data-promo-id');
    		console.log(promoId);
    		var data = {
    			promo_id:promoId
    		}
    		$.post('http://freelabel.net/users/dashboard/delete_promo_file/' + id , data ,  function(data) {
    			// alert(data);
    		});
    	});
    });
</script>


<!-- Add New Promo modal -->

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
        <h4 class="modal-title" id="myModalLabel">Create New Promotion</h4>
      </div>
      <div class="modal-body new-form-modal">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

