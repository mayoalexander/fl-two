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
	<!-- <button class="btn btn-success btn-xs add-new-media-idea" data-link="http://freelabel.net/users/note/index?uid=<?php echo Session::get('user_name'); ?>&type=idea" ><i class="fa fa-plus"></i> Add New Ideas</button> -->
	<button class="btn btn-success btn-xs add-new-media-audio" data-link="http://freelabel.net/upload/?uid=<?php echo Session::get('user_name'); ?>&type=idea" ><i class="fa fa-plus"></i> Add New Files To Box</button>
	<!-- <a onclick="loadPage('http://freelabel.net/users/dashboard/photos/?view=booking#events', '#main_display_panel #section-linemove-3 ', 'all' , 'AlexMayo')" href="#" class="btn btn-default btn-xs">All</a>
	<a onclick="loadPage('http://freelabel.net/users/dashboard/photos/?view=booking#events', '#main_display_panel #section-linemove-3 ', 'tasks' , 'AlexMayo')" href="#" class="btn btn-default btn-xs">Tasks</a>
	<a onclick="loadPage('http://freelabel.net/users/dashboard/photos/?view=booking#events', '#main_display_panel #section-linemove-3 ', 'meetings' , 'AlexMayo')" href="#" class="btn btn-default btn-xs">Meetings</a>
	<a onclick="loadPage('http://freelabel.net/users/dashboard/photos/?view=booking#events', '#main_display_panel #section-linemove-3 ', 'performances' , 'AlexMayo')" href="#" class="btn btn-default btn-xs">Performances</a>
	<a onclick="loadPage('http://freelabel.net/users/dashboard/photos/?view=booking#events', '#main_display_panel #section-linemove-3 ', 'clients' , 'AlexMayo')" href="#" class="btn btn-default btn-xs">Public</a> -->
	<!--<button class='btn btn-default btn-xs event-option-add'><span class='glyphicon glyphicon-plus'></span> Add New Event</button>-->
	<select class="form-control dropdown-filter" style='max-width:200px;display:inline;'>
		<option value="audio" >Audio</option>
		<option value="video" >Videos</option>
		<option value="photo" >Photos</option>
		<option value="document" >Documents</option>
	</select>
</nav>


<!-- <nav class="event-option-panel btn-group" style="background-color:transparent;text-align:left;border-bottom:3px solid #303030;padding:2% 0%;"> -->
<!-- get user tags  -->
<?php
// echo $config->get_user_tags(Session::get('user_name'));
?>
<!-- </nav> -->

<!-- display content  -->
<div id="files-list">
	<ul class="list">
		<?php $files = $config->getFilesByUser(Session::get('user_name') , 20);
		echo $config->display_files($files , Session::get('user_name'));
		?>
	</ul>
</div>




<script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.1.1/list.min.js"></script>
<script type="text/javascript">

	$(function(){

		var options = {
		    valueNames: [ 'list_type' ]
		};
		var list = new List('files-list', options);

	    $('.dropdown-filter').change(function(event){
	    	var filterValue = $(this).val();
			list.filter(function(item) {
			// console.log(item.values().list_type);
		    if(item.values().list_type == filterValue) {
		      return true;
		    } else {
		      return false;
		    }
		  });
		  return false;
	    });



	});


	$(".add-new-media-idea").click(function(event) {
	event.preventDefault();
    var link = $(this).attr('data-link');
    window.location.assign(link);
    }); 

    $('.dropdown-filter').change(function(event){
  //   	var filterValue = $(this).val();
		// list.filter(function(item) {
	 //    if(item.values().location_id == 'Dallas') {
	 //      return true;
	 //    } else {
	 //      return false;
	 //    }
	 //  });
	 //  return false;
    });

</script>
