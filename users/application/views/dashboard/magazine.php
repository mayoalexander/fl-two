<style type="text/css">
	.magazine-page {
		width: 100%;
	}
</style><?php

  include_once('/home/content/59/13071759/html/config/index.php');

    $config = new Blog();

    $mag = $config->getPhotoAds($site['creator'], 'magazine');
    foreach ($mag as $key => $page) {
    	echo '<img src="'.$page['image'].'" class="magazine-page">';
    }

?>