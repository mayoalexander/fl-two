<style type="text/css">
	.magazine-page {
		width: 100%;
	}
</style><?php

  include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');

    $config = new Blog();

    $mag = $config->getPhotoAds($site['creator'], 'magazine');
    foreach ($mag as $key => $page) {
    	echo '<img src="'.$page['image'].'" class="magazine-page">';
    }

?>