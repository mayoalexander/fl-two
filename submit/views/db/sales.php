<h1 class="sub_title">SALES</h1>

<div class="db_panel_1">
	<?php include('lead_conversion.php'); ?>
</div>


<div class="db_panel_1">
	<?php
	$include_path = 'x/submissions.php';

	if (file_exists($include_path)) {
				include($include_path);
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