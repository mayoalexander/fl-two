<?php 
	if ($_GET['rss']==1)	{
			$include_path = "rssreader/cosign.php";
							if (file_exists($include_path)) {
								include($include_path);
							}
							if (file_exists("../".$include_path)) {
								include('../'.$include_path);
							}
							if (file_exists("../../".$include_path)) {
								include('../../'.$include_path);
							}
							if (file_exists("../../../".$include_path)) {
								include('../../../'.$include_path);
							}
							if (file_exists("../../../../".$include_path)) {
								include('../../../../'.$include_path);
						}
					}
?>
<div class="panel" style='padding:5%;' >
<?php 
//				$include_path = "views/db/blog_poster.php";
				$include_path = "twitter.php";
					if (file_exists($include_path)) {
						include($include_path);
					}
					if (file_exists("../".$include_path)) {
						include('../'.$include_path);
					}
					if (file_exists("../../".$include_path)) {
						include('../../'.$include_path);
					}
					if (file_exists("../../../".$include_path)) {
						include('../../../'.$include_path);
					}
					if (file_exists("../../../../".$include_path)) {
						include('../../../../'.$include_path);
				}
?>
</div>
	

