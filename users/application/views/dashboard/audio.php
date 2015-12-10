<?php
include_once('/home/content/59/13071759/html/config/index.php');
$config = new Blog();

// get tag value
if (isset($_POST["page"]) ) {
	$tag = $_POST["page"];
} else {
	$tag = '';
}
?>






<nav class="event-option-panel btn-group" style="background-color:transparent;text-align:left;border-bottom:3px solid #303030;padding:2% 0%;">
	<button class="btn btn-success btn-xs col-md-3 col-xs-12 add-new-media-audio" data-link="http://freelabel.net/upload/?uid=<?php echo Session::get('user_name'); ?>&type=idea" ><i class="fa fa-plus"></i> Add New Audio</button> | 
	<a target="_blank" href="<?php echo $config->getUserURL(Session::get('user_name')); ?>" class="btn btn-default btn-xs">View Profile</a> |
	<a href="http://freelabel.net/users/login/showprofile" class="btn btn-default btn-xs">Settings</a>
</nav>

<!-- display content  -->
<?php $files = $config->get_user_posts(Session::get('user_name') , 20);
echo $files['posts']; ?>


<script type="text/javascript">
	$(".add-new-media-audio").click(function(event) {
		event.preventDefault();
      	var link = $(this).attr('data-link');
      	window.open(link);
    }); 
</script>
