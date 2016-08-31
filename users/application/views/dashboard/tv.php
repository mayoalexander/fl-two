<style>
	video {
		border:none;
		border-radius: 2px;
		cursor: pointer;
		box-shadow: 5px 5px 20px #101010;
	}
</style><?php
include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');


	$config = new Blog($_SERVER['HTTP_HOST']);
	// add these stats in here somehwere in the layout
	$stats = $config->getStatsByUser($site['user']['name']);
	$current_page = '0';
	$user = $config->getUserData($site['user']['name']);

	$files = $config->getVideosByUser('admin' , 1);
	echo $config->display_feed($files, true, 0);

	$files = $config->getVideosByUser('admin' , 6);
	echo $config->display_feed($files, false, 0);
	// echo $files['posts']; 
	// var_dump($files);


?>
<script>
function playVideo(elem) {
	elem.get(0).play();
	elem.get(0).volume = 0.5;
}

$('video').bind('click',function(){
	// alert('now playing video');
	playVideo($(this));
	$('video').unbind('hover');
});

</script>