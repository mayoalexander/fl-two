if (strpos($_SERVER['HTTP_USER_AGENT'], 'iPhone') !== false) {
	echo "

	<style>
		body, #playerwrapper, #artisttitle, #tracktitle, #amrtag {
			font-size:500%;
		}
	</style>

	";
}