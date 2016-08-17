<style type="text/css">
	.magazine-page {
		width: 100%;
	}
</style><?php

  include_once($_SERVER['DOCUMENT_ROOT'].$_SERVER['REQUEST_URI'].'/config/index.php');

    $config = new Blog();

    $mag = $config->getPhotoAds($site['creator'], 'magazine');
    foreach ($mag as $key => $page) {
    	echo '<img src="'.$page['image'].'" class="magazine-page">';
    }

?>