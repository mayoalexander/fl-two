<?php
//print_r($_POST);
if ($_SESSION['user_name'] =='' && $_POST['user_name']) {
	//session_start();
	$_SESSION['user_name'] = $_POST['user_name'];
	$user_name = $_POST['user_name'];
	$user_name_session = $_POST['user_name'];
}
?>
<script src="http://freelabel.net/config/jquery-ui-1.11.4.custom/external/jquery/jquery.js"></script>
<!--<script src='http://freelabel.net/js/like_post.js'></script>-->
<script>window.jQuery || document.write('<script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"><\/script>')</script> <script src="https://static.radiocdn.com/jquery.shoutcast.easy.min.js?host=eclipse.wavestreamer.com&port=9614&stream=1"></script>
<?php 
if (file_exists('config/index.php')) {
	include_once('config/index.php');
} elseif (file_exists('../config/index.php')) {
	include_once('../config/index.php');
}
//include_once(ROOT.'live-search/index.php');

?>
<div id="mag_wrap" class='col-lg-12 mag_wrapper'>
<?php
if (isset($user_name_session)==false AND isset($user_name)==false AND isset($_COOKIE['user_name'])==false AND isset($_COOKIE['user_email'])==false){
	$user_name_session = 'none';
	$user_name = 'none';
}




	include('inc/connection.php');

$db_start=0;
echo '<a name="mag"></a>';
		
	if(isset($_GET['page']) && $page = $_GET['page']) {
		$db_start 	= $page * 24;
		$current_page = $page;
	} else {
		$current_page = 0;
	}

	if (isset($front_page_preview)) {
		$result = mysqli_query($con,"SELECT * FROM feed 
			WHERE type='blog' 
			OR type='single'
			ORDER BY `id` DESC LIMIT ".$db_start.", 6"); 
	}

	if (isset($_POST['pull']) && isset($pull)==false && $pull = $_POST['pull']) {
		// DO NOTHING!
	}

	switch ($pull) {
		/* ---------------------------------------------------------------------------
		DEFAULT PRESETS
		---------------------------------------------------------------------------*/
		case 'blog':
			$result = mysqli_query($con,"SELECT * FROM feed WHERE twitter LIKE '%{$search_query}%' OR trackname LIKE '%{$search_query}%' OR blogtitle LIKE '%{$search_query}%' OR type LIKE '%{$search_query}%' OR email LIKE '%{$search_query}%' OR writeup LIKE '%{$search_query}%' OR blogentry LIKE '%{$search_query}%' ORDER BY  `id` DESC LIMIT 24");
			break;
		case 'rate':





			$result = mysqli_query($con,"SELECT * FROM feed WHERE type='blog' ORDER BY `rate` DESC LIMIT ".$db_start.", 24");  
			break;
		case 'order':
			$result = mysqli_query($con,"SELECT * FROM feed WHERE type='blog' ORDER BY `id` DESC LIMIT ".$db_start.", 24");  	
			break;
		case 'new_mag':
			$result = mysqli_query($con,"SELECT * FROM feed WHERE type='blog' /* AND writeup LIKE '%.%' */ ORDER BY `id` DESC LIMIT ".$db_start.", 48");  	
			break;
		case 'baewatch-front':
			$result = mysqli_query($con,"SELECT * FROM feed WHERE type='blog' /* AND writeup LIKE '%.%' */ ORDER BY `id` DESC LIMIT ".$db_start.", 4");  	
			break;
		case 'intro-page':
			$db_start = rand(0,500);
			$result = mysqli_query($con,"SELECT * FROM feed WHERE type='blog' /* AND writeup LIKE '%.%' */ ORDER BY `id` DESC LIMIT ".$db_start.", 4");  	
			break;
		case 'front_page':
		//$db_start = rand(0,500);
		$db_start = rand(0,500);
			//$result = mysqli_query($con,"SELECT * FROM feed WHERE type='blog' /* AND writeup LIKE '%.%' */ ORDER BY `id` DESC LIMIT ".$db_start.", 24");  	
			$result = mysqli_query($con,"SELECT * FROM feed WHERE type='blog' ORDER BY `id` DESC LIMIT ".$db_start.", 15");  	
			
			break;
		case 'baewatch':
			$result = mysqli_query($con,"SELECT * FROM feed WHERE type='blog' AND twitter LIKE '%Sierraa_Mistt%' ORDER BY `id` DESC LIMIT ".$db_start.", 6");  	
			//$result = mysqli_query($con,"SELECT * FROM feed WHERE type='blog' ORDER BY `rate` DESC LIMIT ".$db_start.", 6"); 
			break;
		/* ---------------------------------------------------------------------------
		CATEGORIES
		---------------------------------------------------------------------------*/
		case 'interviews':
			$result = mysqli_query($con,"SELECT * FROM feed WHERE type='blog' AND blogtitle LIKE '%interview%' ORDER BY `id` DESC LIMIT 24");  	
			break;
		case 'videos':
			$result = mysqli_query($con,"SELECT * FROM feed WHERE type='blog' AND blogtitle LIKE '%video%' ORDER BY `id` DESC LIMIT 24");  	
			break;
		case 'album':
			$result = mysqli_query($con,"SELECT * FROM feed WHERE type='blog' AND blogtitle LIKE '%album%' ORDER BY `id` DESC LIMIT 24");  	
			break;
		case 'single':
			$result = mysqli_query($con,"SELECT * FROM feed WHERE type='blog' AND blogtitle LIKE '%single%' ORDER BY `id` DESC LIMIT 24");  	
			break;
		case 'random':
			$db_start = rand(0,500);
			$result = mysqli_query($con,"SELECT * FROM feed WHERE type='blog' ORDER BY `id` DESC LIMIT ".$db_start.", 24");  
			break;
		default:
		$sq = $_GET['q'];
		$sql="SELECT * FROM feed WHERE user_name='$sq' ORDER BY `id` DESC";
			//$result = mysqli_query($con,$sql);  	
			break;
	}
	if (isset($_GET['q'])) {
		$q = trim($_GET['q']);


		$sql = "SELECT * FROM feed WHERE match(blogtitle) against('$q' IN BOOLEAN MODE) 
		OR match(twitter) against('$q' IN BOOLEAN MODE) 
		OR match(tags) against('$q' IN BOOLEAN MODE) 
		OR twitter LIKE '%$q%' OR blogtitle LIKE '%$q%' 
		ORDER BY `id` DESC LIMIT 60";
		//echo 'okay!! Searching: '.$q;
		/*$sql = "SELECT * FROM feed 
			WHERE blogtitle LIKE '%$q%'
			OR twitter LIKE '%$q%'
		 ORDER BY `id` DESC";*/
		$result = mysqli_query($con,$sql);  
	}

	if (isset($_POST['blog_id']) && $blog_id = $_POST['blog_id']) {
		//echo 'okay!!!!!!!';
		$result = mysqli_query($con,"SELECT * FROM feed 
			WHERE type='blog' 
			AND id = '".$blog_id."'
		 ORDER BY `id` DESC LIMIT 1");
	}
//echo 'hello : '.$sql;
	//print_r($result);
	$rows = mysqli_num_rows($result);
	if ($rows==0) {
		//echo $rows;
		echo 'No Results Found!';
	}
	//print_r(mysqli_num_rows($result));
//echo 'hello : '.$sql;

for ($i=0; $i < 4; $i++) {

	echo '<div class="row">';
	$bi = 0;
		while($row = mysqli_fetch_array($result))
				{
				$blog_id 	= $row['id'];
				$blogtitle = trim($row['blogtitle']);

				if (strpos($row['photo'], 'freelabel.net')) {
					//echo 'found: '.$row['photo'];
					$blog_photo = $row['photo'];
				} else {
					//echo 'not: '.$row['photo'];
					$blog_photo = "http://img.freelabel.net/".$row['photo'];
				}

				$twitter = trim($row['twitter']);
				$twitpic = trim($row['twitpic']);
				$blog_story_url = $row['blog_story_url'];
							if (strpos($blog_story_url,'amradiolive')) {
								$blog_story_url = str_replace('amradiolive.com', 'freelabel.net', $blog_story_url);
							}
				$blog_story_url = str_replace(' ', '%20', $blog_story_url);
						
				if ($row['type']=='single') {
					$blogtitle = $row['trackname'];
					$blog_photo = $row['photo'];
					//echo 'PHOTO: '.$blog_photo;
				}
				if (strpos(strtolower($blogtitle), "video")) {
					$blogentry = '<iframe src="'.$blogentry.'" style="width:100%;height:450px;" frameborder=0 seamless></iframe>';
				}
				$blog_story_url = 'http://freelabel.net/'.$twitter.'/t/'.$blog_id;

				

				$rating	= $row['rate'];
				if (isset($row['writeup']) && $row['writeup']!='') {
						//echo '['.$row['writeup'].']';
						// encoding fix
						$blog_write_up = $row['writeup'];
						$blog_write_up		=	utf8_decode($blog_write_up);
						$blog_write_up		=	utf8_decode($blog_write_up);
						$blog_write_up		=	str_replace('???', "\"", $blog_write_up) ;
						$blog_write_up	=	substr(urldecode($blog_write_up),0,140).'...';
						$blog_write_up_full	=	$blog_write_up;
				}
					
				$blogentry	=	$row['blogentry'];
				$current_likes = $row['rate'];

				if ($subscriber_view = true && isset($_COOKIE['user_name'])) {
					//$if_logged_in = '<a href="#'.$rand_id.'" onclick="likePost('.$blog_id.', '.$current_likes.' , \''.$user_name_session.'\')" class="btn btn-success btn-xs" role="button"><span class="glyphicon glyphicon-save"></span> - SAVE</a>';
				} else {
					$if_logged_in = '';
				}






				$submission_date = date('l, F d',strtotime($row['submission_date']));
				$submission_date = get_timeago(strtotime($submission_date));

				//$rand_id	=	rand(111111,999999);
				$rand_id	=	$blog_id;

				$blog_write_up_embedd='';
				if ($row['writeup']) {
					$blog_write_up_embedd	=	'<p style="color:#fff;text-shadow:0px 0px 15px #000;" >'.$blog_write_up.'</p>
				        <hr>';
				    $blog_write_up_full	=	'<p style="color:#fff;text-shadow:0px 0px 15px #000;" >'.$blog_write_up_full.'</p>
				        <hr>';
				}
				$blog_write_up_embedd = '';
				$blog_write_up_full = '';

// TWEET SHARE MESSAGE
$tweet_blog = urlencode("[#FLMAG] ".$twitter."

". $blogtitle ." 

".str_replace('http://', '', $blog_story_url)."

".$twitpic);

$link = 'http://freelabel.net/'.$twitter.'/'.$rand_id;
echo '
  <a name="anchor_'.$rand_id.'"></a>
  <div class="col-md-4 col-xs-12 dummy-media-object" id="picture_block_'.$rand_id.'" style="padding-left:0;">
    <a href="'.$blog_story_url.'">
    <div class="thumbnail" id="thumbnail_'.$rand_id.'" style="background-image:url("'.$blog_photo.'");background-position:center center;background-size:auto 100%;" ></a>
			      <div class="caption">
			      		<div class="cxol-md-6">
			      			<a href="'.$blog_story_url.'" target="_blank"><img src="'.$blog_photo.'" class="pull_mag_photo" ></a>
			      		</div>
			      		<div class="caption-header cxol-md-6">
					        <a href="'.$blog_story_url.'" target="_blank"  ><h4 id="blogTitle" >'.$blogtitle.'</h4></a>
					        <a href="'.$blog_story_url.'" target="_blank"  ><h5>'.$twitter.'</h5></a>
					        <a href="'.$blog_story_url.'" target="_blank"  ><h6>'.$submission_date.'</h6></a>
				        </div><!-- caption header -->
				       	<div id="write_up_preview_'.$rand_id.'">
				       		'.$blog_write_up_embedd.'';
					       		include(ROOT.'config/share.php');
						       	findByID($blog_id);
				       		echo '
				        	'.$if_logged_in.'
				       	</div>
				       	
				       	<div id="writeup_'.$rand_id.'" class="row" style="display:none;" >
					       	<div class="col-md-4" >'.$blog_write_up_full;
					       	
					       	echo '
						       	<a class="btn btn-primary" href="https://twitter.com/intent/tweet?screen_name=&text='.$tweet_blog.'" target="_blank" ><span class="glyphicon glyphicon-retweet"></span><hr>Retweet</a> 
						       	<a onclick="toggleSize('.$rand_id.' , \''.$user_name_session.'\')" class="btn btn-default" role="button"><span class="glyphicon glyphicon-fullscreen"></span></a></a>
					       	</div>
					       	<!--<div class="col-md-8" id="blog_entry" >'.$blogentry.'</div>-->
				       	</div>

			      </div>
      	</div>
  </div>';




		}
echo '</div>';

} 
// ---------------- END OF FOR LOOP ---------------- //

// ---------------- SHOW LOAD MORE IF RESULTS FOUND ---------------- //
if ($rows!==0) {
	echo '<br><button onclick="loadMore('.$current_page.')" class="btn btn-default btn-lg load_more_button">Load More</button>';
	echo '<div class="more_content"></div>';
}
?>
</div><!-- mag container DIV -->

<script>
function loadMore (page) {
	var page = page+1; 
	//alert(page);

	$('.load_more_button').fadeOut(1000);
	$.get(<?php echo "'".HTTP."'"; ?> +'mag/stream.php', { 
		page: page,
		nopag: 1
          })
        .done(function( data ) {
          //alert('Loaded : ' + data);
          //$('#more_content').html(data);
          //var newData = data;
          //$('#more_content').hide().appendTo('#mag_container').fadeIn(1000);
          $('#main_display_panel').append(data);
          //$('#mag_container').fadeIn(1000);
    });
}


function subscribeToMag() {
	r = confirm('You will now be directed to make your $10 contribution! After payment is completed, you will be directed to create your FL profile for ENDLESS music & radio shows not availalbe to the general public!');
	if (r==true) {
		window.open('<?php echo $magazine[1]; ?>');
	}
}
function toggleSize (blog_id , user_name) {
	//alert(blog_id);
	var div_height = 'inherit';
	$('#thumbnail_' + blog_id).css({
		'height': (div_height - 2) + 'px',
		'width':'99.9%'
	});
	$('#picture_block_' + blog_id).css({
		'height': div_height + 'px',
		'width':'99%'
	});
	$('#background_tint_' + blog_id).css({
		'height': div_height + 'px',
		'opacity':'0.9',
		'width':'100%',
		'padding' : '5%'
	});
	$('#write_up_preview_' + blog_id).css('display','none');
	$('#thumbnail_' + blog_id + ' .pull_mag_photo').fadeOut();

	var containerDiv = $('#writeup_' + blog_id);
	var path ='http://freelabel.net/mag/view.php';
	if (user_name == '') {
		var user_name = 'public'
	}
	//alert('Loadeded : ' + blog_id);
	$.post(path, { 
          id : blog_id,
          user_name: user_name
          } )
        .done(function( data ) {
          //alert('Loaded : ' + data);
          var anchor = <?php echo '"'.$rand_id.'";'; ?>
          //alert(anchor);
          scrollToAnchor('anchor_' + anchor);
          $(containerDiv).html(data);
          $(containerDiv).fadeIn(2000);

        });
}

</script>
<script>
	var siteUrl = $(location).attr('href');
	if (siteUrl == 'http://bae.freelabel.net/') {
		$('#mag_header').hide();
	}
</script>

<script type="text/javascript">
	
	function openPost(link) {
		var magWindow = window.open(link);
	}
	function loadRadio () {
		var containerDiv =  "#main_display_panel";
		$(containerDiv).css("display","none");
	}
	function loadMag(pull) {
        var containerDiv =  "#main_display_panel";
        //var url      = window.location.href; // URL OF PAGE
        $(containerDiv).html("Loading Mag..");
        $(containerDiv).fadeIn(1000);
        $.post("http://freelabel.net/mag/pull_mag.php", { 
          pull : pull
          } )
        .done(function( data ) {
          // alert('Loadeded : ' + id);
          $(containerDiv).css("display","block");
          $(containerDiv).html(data);
          scrollToAnchor('main_display_panel');
          //$('.caption-header').css('font-size', '200%');
        });
      }
  </script>
