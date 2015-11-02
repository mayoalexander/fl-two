<center>
<div id="mag_container">
	<?php 

	?>


	


<div class='section_title' style='padding:1%;font-size:80%;' >
	<?php include('pagination.php'); ?>
</div>





<?php

if ($subscriber_view == true) {
	echo '<script> 
	$("#mag_header").hide();
	</script>';
}

//include('pagination.php');

include('../inc/connection.php');
echo '<a name="mag"></a>';
		
	if($page = $_GET['page'])
	$db_start 	= $page * 24;

	if ($db_start == false) {
		$db_start	= 0;
	}
	

	if ($front_page_preview) {
		$result = mysqli_query($con,"SELECT * FROM blog WHERE type='blog' ORDER BY `id` DESC LIMIT ".$db_start.", 6"); 
	}
		include('../inc/connection.php');

	if ($_POST['pull']) {

		$pull = $_POST['pull'];
	}
	// echo $pull;
	switch ($pull) {
		/* ---------------------------------------------------------------------------
		DEFAULT PRESETS
		---------------------------------------------------------------------------*/
		case 'rate':
			$result = mysqli_query($con,"SELECT * FROM blog WHERE type='blog' ORDER BY `rate` DESC LIMIT ".$db_start.", 24");  
			break;
		case 'order':
			$result = mysqli_query($con,"SELECT * FROM blog WHERE type='blog' ORDER BY `id` DESC LIMIT ".$db_start.", 24");  	
			break;
		case 'new_mag':
			$result = mysqli_query($con,"SELECT * FROM blog WHERE type='blog' /* AND writeup LIKE '%.%' */ ORDER BY `id` DESC LIMIT ".$db_start.", 48");  	
			break;
		case 'front_page':
		//$db_start = rand(0,500);
		$db_start = rand(0,500);
			//$result = mysqli_query($con,"SELECT * FROM blog WHERE type='blog' /* AND writeup LIKE '%.%' */ ORDER BY `id` DESC LIMIT ".$db_start.", 24");  	
			$result = mysqli_query($con,"SELECT * FROM blog WHERE type='blog' ORDER BY `id` DESC LIMIT ".$db_start.", 12");  	
			
			break;
		case 'baewatch':
			$result = mysqli_query($con,"SELECT * FROM blog WHERE type='blog' AND twitter LIKE '%Sierraa_Mistt%' ORDER BY `id` DESC LIMIT ".$db_start.", 6");  	
			//$result = mysqli_query($con,"SELECT * FROM blog WHERE type='blog' ORDER BY `rate` DESC LIMIT ".$db_start.", 6"); 
			break;
		/* ---------------------------------------------------------------------------
		CATEGORIES
		---------------------------------------------------------------------------*/
		case 'interviews':
			$result = mysqli_query($con,"SELECT * FROM blog WHERE type='blog' AND blogtitle LIKE '%interview%' ORDER BY `id` DESC LIMIT 48");  	
			break;
		case 'videos':
			$result = mysqli_query($con,"SELECT * FROM blog WHERE type='blog' AND blogtitle LIKE '%video%' ORDER BY `id` DESC LIMIT 48");  	
			break;
		case 'album':
			$result = mysqli_query($con,"SELECT * FROM blog WHERE type='blog' AND blogtitle LIKE '%album%' ORDER BY `id` DESC LIMIT 48");  	
			break;
		default:
			$result = mysqli_query($con,"SELECT * FROM blog WHERE type='blog' ORDER BY `id` DESC LIMIT ".$db_start.", 24");  
			//exit;
			break;
	}
	if ($_GET['q']) {
		$q = $_GET['q'];
		echo 'okay!! Searching: '.$q;
		$result = mysqli_query($con,"SELECT * FROM blog 
			WHERE type='blog' 
			AND blogtitle LIKE '%$q%'
			OR twitter='%$q%'
		 ORDER BY `rate` DESC LIMIT ".$db_start.", 24");  
	}

	$blog_id = $_POST['blog_id'];
	if (isset($blog_id)) {
		echo 'okay!!!!!!!';
		$result = mysqli_query($con,"SELECT * FROM blog 
			WHERE type='blog' 
			AND id = '".$blog_id."'
		 ORDER BY `id` DESC LIMIT 1"); 
	}





for ($i=0; $i < 4; $i++) {

	echo '<div class="row" width="96%" >';
	$bi = 0;
		while($row = mysqli_fetch_array($result))
				{
				$blog_id 	= $row['id'];

				$blogtitle = $row['blogtitle'];
				$blog_photo = "http://img.freelabel.net/".$row['photo'];
				$twitter = $row['twitter'];
				
				$twitpic = $row['twitpic'];
				$blog_story_url = $row['blog_story_url'];
							if (strpos($blog_story_url,'amradiolive')) {
								$blog_story_url = str_replace('amradiolive.com', 'freelabel.net', $blog_story_url);
							}
				$blog_story_url = str_replace(' ', '%20', $blog_story_url);

				$rating	= $row['rate'];
				$blow_write_up = $row['writeup'];
					// encoding fix
					$blow_write_up		=	utf8_decode($blow_write_up);
					$blow_write_up		=	utf8_decode($blow_write_up);
					$blog_write_up		=	str_replace('???', "\"", $blog_write_up) ;
				$blow_write_up	=	substr(urldecode($blow_write_up),0,140).'...';
				$blow_write_up_full	=	$blow_write_up;
				$blogentry	=	$row['blogentry'];

				$submission_date = date('l, F d',strtotime($row['submission_date']));

				//$rand_id	=	rand(111111,999999);
				$rand_id	=	$blog_id;

				$blow_write_up_embedd='';
				if ($row['writeup']) {
					$blow_write_up_embedd	=	'<p style="color:#fff;text-shadow:0px 0px 15px #000;" >'.$blow_write_up.'</p>
				        <hr>';
				    $blow_write_up_full	=	'<p style="color:#fff;text-shadow:0px 0px 15px #000;" >'.$blow_write_up_full.'</p>
				        <hr>';
				}
				$blow_write_up_embedd = '';
				$blow_write_up_full = '';

// TWEET SHARE MESSAGE
$tweet_blog = urlencode("[#FLMAG]

".$twitter." ". $blogtitle ." 

".$blog_story_url."

".$twitpic);


// IF FRONT PAGE ALTER
/*if ($pull== 'front_page') {
$tweet_blog = urlencode("[#REVIEW]

".$twitter." ". $blogtitle ."

[Written: @Sierraa_Mistt]

".$blog_story_url."

".$twitpic);
}*/



echo '
<a name="'.$rand_id.'"></a>

  <div class="featured_post_wrapper col-sm-6 col-md-4" id="picture_block_'.$rand_id.'" style="padding:0;" >
    <a href="'.$blog_story_url.'">

    <div class="thumbnail" id="thumbnail_'.$rand_id.'" style="background-image:url(\''.$blog_photo.'\');background-position:center center;background-size:auto 100%;" ></a>
      <div class="background_tint" id="background_tint_'.$rand_id.'">
			      <div class="caption">
			      	
				        <a href="#'.$rand_id.'" onclick="toggleSize('.$rand_id.')"  ><h3 id="blogTitle" >'.$blogtitle.'</h3></a>
				        <a href="#'.$rand_id.'" onclick="toggleSize('.$rand_id.')"  ><h4>'.$twitter.'</h4></a>
				        <a href="#'.$rand_id.'" onclick="toggleSize('.$rand_id.')"  ><h5>'.$submission_date.'</h5></a>
				        <hr>
				       	<div id="write_up_preview_'.$rand_id.'">
				       		'.$blow_write_up_embedd.'
					       	<a class="btn btn-primary btn-xs" href="https://twitter.com/intent/tweet?screen_name=&text='.$tweet_blog.'" target="_blank" ><span class="glyphicon glyphicon-retweet"></span> - SHARE</a> 
					       	<a href="#'.$rand_id.'" onclick="toggleSize('.$rand_id.')" class="btn btn-default btn-xs" role="button"><span class="glyphicon glyphicon-fullscreen"></span> - VIEW</a>
				       	</div>
				       	
				       	<div id="writeup_'.$rand_id.'" class="row" style="display:none;" >
					       	<div class="col-md-4" >'.$blow_write_up_full.'
						       	<a class="btn btn-primary" href="https://twitter.com/intent/tweet?screen_name=&text='.$tweet_blog.'" target="_blank" ><span class="glyphicon glyphicon-retweet"></span><hr>Retweet</a> 
						       	<a onclick="toggleSize('.$rand_id.')" class="btn btn-default" role="button"><span class="glyphicon glyphicon-fullscreen"></span></a></a>
					       	</div>
					       	<!--<div class="col-md-8" id="blog_entry" >'.$blogentry.'</div>-->
				       	</div>

			      </div>
      	</div>
    </div>
  </div>';


 /* echo '<script>
	displayText_active	=	"Awesome RIght?!"
	displayText_nonactive	=	"Click Here!"
	test_block_'.$rand_id.' = document.getElementById("picture_block_'.$rand_id.'")
	thumbnail_'.$rand_id.' = document.getElementById("thumbnail_'.$rand_id.'")
	writeup_'.$rand_id.' = document.getElementById("writeup_'.$rand_id.'")
	write_up_preview_'.$rand_id.' = document.getElementById("write_up_preview_'.$rand_id.'")
	background_tint_'.$rand_id.'	=	document.getElementById("background_tint_'.$rand_id.'")
	blogtitle=	document.getElementById("blogTitle");
	active_'.$rand_id.'=false
	function toggleSize_'.$rand_id.'() {
			if (active_'.$rand_id.'==false) {
					write_up_preview_'.$rand_id.'.style.display = "none";
					writeup_'.$rand_id.'.style.display = "block";
					//test_block_'.$rand_id.'.innerHTML = displayText_active
					test_block_'.$rand_id.'.style.width = "99.9%"
					test_block_'.$rand_id.'.style.height = "500px"
					thumbnail_'.$rand_id.'.style.height = "500px"
					background_tint_'.$rand_id.'.style.height = "600px"
					background_tint_'.$rand_id.'.style.opacity = 0.8

					active_'.$rand_id.'=true
			} else {
					test_block_'.$rand_id.'.style.width = "33.33333333%"
					test_block_'.$rand_id.'.style.height = "350px"
					thumbnail_'.$rand_id.'.style.height = "600px"
					background_tint_'.$rand_id.'.style.height = "600px"
					blogtitle.innerHTML = "okay!"
					active_'.$rand_id.'=false
			}
	}
</script>';

*/


		}
echo '</div>';

}
?>
</div> <!-- mag container -->
</center>




<script>


function subscribeToMag() {
	r = confirm('You will now be directed to make your $10 contribution! After payment is completed, you will be directed to create your FL profile for ENDLESS music & radio shows not availalbe to the general public!');
	if (r==true) {
		window.open('<?php echo $magazine[1]; ?>');
	}
}
function toggleSize (blog_id) {
	//alert(blog_id);
	$('#thumbnail_' + blog_id).css({
		'height':'1298px',
		'width':'99.9%'
	});
	$('#picture_block_' + blog_id).css({
		'height':'1300px',
		'width':'99%'
	});
	$('#background_tint_' + blog_id).css({
		'height':'1298px',
		'opacity':'0.9',
		'width':'100%',
		'padding' : '5%'
	});
	$('#write_up_preview_' + blog_id).css('display','none');

	var containerDiv = $('#writeup_' + blog_id);
	var path ='http://freelabel.net/mag/view.php';
	//alert('Loadeded : ' + blog_id);
	$.post(path, { 
          id : blog_id
          } )
        .done(function( data ) {
          //alert('Loaded : ' + data);
          $(containerDiv).html(data);
          $(containerDiv).fadeIn(2000);
        });
}

</script>


	<script>
		var siteUrl = $(location).attr('href');
		//alert(siteUrl);
		/* if (siteUrl == 'http://bae.freelabel.net/') {
			//$('#mag_header').hide();
		}*/
		if (siteUrl == 'http://bae.freelabel.net/') {
			$('#mag_header').hide();
			//$('#mag_ad').hide();
		}
	</script>

	<script type="text/javascript">
		function loadRadio () {
			var containerDiv =  "#mag_container";
			$(containerDiv).css("display","none");
		}
		function loadMag(page) {
	        var containerDiv =  "#mag_container";
	        var url      = window.location.href; // URL OF PAGE
	        $(containerDiv).html("Loading Mag..");
	        $(containerDiv).fadeIn(1000);
	        $.post("http://freelabel.net/mag/new_pull_mag.php", { 
	          pull : page
	          } )
	        .done(function( data ) {
	          // alert('Loadeded : ' + id);
	          $(containerDiv).css("display","block");
	          $(containerDiv).html(data);
	        });
	      }
      </script>
