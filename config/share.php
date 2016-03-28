<script type="text/javascript" src="http://freelabel.net/config/share.js"></script>
<?php 
function findByID($post_id){
	include('../inc/connection.php');
	$search_query = $post_id;
	$result = mysqli_query($con,"SELECT * FROM feed 
	WHERE `id` = '$search_query'
	ORDER BY `id` DESC LIMIT 1");
	while($row = mysqli_fetch_assoc($result)){
			$post_data = $row;
			// --------- Scenario Fixes --------- //
			if ($post_data['blogtitle'] != '') {
				$post_title = $post_data['blogtitle'];
			} else {
				$post_title = $post_data['trackname'];
			} 
			// --------- $post_title edits --------- //
			$post_title = trim($post_title); $post_title = str_replace('Ft.', 'f.', $post_title);
			$twitter = trim($post_data['twitter']);
			
			$post_photo = $post_data['photo'];
			$twitpic = $post_data['twitpic'];
			if (strpos($twitpic, 'cards.twitter')) {
				$twitpic = '';
			}
			$post_blogentry = $post_data['blogentry'];
			$post_title_array = explode(' ', $post_title);
			if ($post_title_array[0] == '[VIDEO]'
				OR $post_title_array[0] == '[SINGLE]'
				OR $post_title_array[0] == '[ALBUM'
				OR $post_title_array[0] == '[INTERVIEW]'
				OR $post_title_array[0] == '[EXCLUSIVE]'
				) {
				if ($post_title_array[0] == '[ALBUM') {
					$post_title_short = $post_title_array[2];
				}else{
					$post_title_short = $post_title_array[1];
				}
			} else {
				$post_title_short = $post_title_array[0];
			}


			if (strpos($twitter, ' ')) {
				$twitterarr = explode(' ',$twitter);
				$twitter = str_replace(' ', '', $twitterarr[0]);
				//$post_title = $post_title . ' '.$twitterarr[1];
			}


			$page_url = 'FREELABEL.net/'.$twitter.'/'.$post_title_short;
			$page_url_short = $page_url;
			//$page_url_short = 'FREELA.BE/L/'.$twitter.'/'.$post_title_short;
			// TWITTER SHARE
			$twitter_share = "#FLMAG: ".$twitter.'

'.$post_title.'

'.$page_url_short.'

'.$twitpic;

	
			$twitter_share = urlencode($twitter_share);
			$current_likes = 0;
			$share_buttons = '
			<p id="post_'.$post_id.'" class="mag-view-buttons row" style="display:block;">
				<a class="btn btn-social col-md-4 btn-twitter" target="_blank" href="https://twitter.com/intent/tweet?text='.$twitter_share.'">
				  <i class="fa fa-twitter"></i>
				  Twitter
				</a>
				<a class="btn btn-social col-md-4 btn-tumblr" target="_blank" href="http://www.tumblr.com/share/photo?source='.$post_photo.'&caption=%3Ca%20href%3D%22freelabel.net%22%3E'.urlencode($twitter).' '.urlencode($post_title).'%0A%0Afreelabel.net%3C%2Fa%3E%0A%0A'.urlencode($post_blogentry).'&name='.urlencode($twitter).' '.urlencode($post_title).'">
				  <i class="fa fa-tumblr"></i>
				  Tumblr
				</a>
				<a class="btn btn-social col-md-4 btn-facebook" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u='.$page_url.'">
				  <i class="fa fa-facebook"></i>
				  Facebook
				</a>
      			<!--<a href="#'.$track_id.'" onclick="likePost('.$track_id.', '.$current_likes.' , \''.$user_name_session.'\')" class="btn btn-success btn-xs" role="button"><span class="glyphicon glyphicon-save"></span> - SAVE</a>-->
			</p>
			';
	}
	//print_r($post_data);
	//echo 'found data!';
	echo $share_buttons;

}




/* ------------------------------------------------
	VIEW CONTROLLER
-------------------------------------------------------- */

if ($_POST['post_id']){
	findByID($_POST['post_id']);
}

?>



