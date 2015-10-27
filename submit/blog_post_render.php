<?php 




// RENDER EMBED ENTRY
$blogentry_embed_original = $blogentry_embed;
if ($_POST['blogentry_embed']) {
	// GET RID OF APOSOROPHES
			if (strpos($blogentry_embed,"\"") == true) {
				$blogentry_embed = str_replace("\"", "'", $blogentry_embed);
				$debug[] = 'APOSOROPHES fixed';
			} else {
				$debug[] = 'no APOSOROPHES';
			}
	// YOUTUBE VIDEO LINK EMBEDDS
			if (strpos($blogentry_embed,"watch?v=") == true) {
				$find_yt1 = "watch?v=";
				$replace_yt1 = "embed/";
				$embed_url = str_replace($find_yt1, $replace_yt1, $blogentry_embed);
				$blogentry_embed = '<br><iframe width="98%" height="450px" src="'.$embed_url.'" frameborder="0" allowfullscreen></iframe>';
			} else {
				$debug['blog_post_render'] = 'naw 2 | ';
			}
			if (strpos($blogentry_embed,".be/") == true) {
				$find_yt1 = ".be/";
				$replace_yt1 = "be.com/embed/";
				$embed_url = str_replace($find_yt1, $replace_yt1, $blogentry_embed);
				$blogentry_embed = '<br><iframe width="98%" height="450px" src="'.$embed_url.'" frameborder="0" allowfullscreen></iframe>';
			} else {
				$debug['blog_post_render'] = 'naw 3 | ';
			}
	// WORLDSTAR VIDEO LINK EMBEDDS
			if (strpos($blogentry_embed,"worldstarhiphop") == true) {
				$find_yt1 = "watch?v=";
				$replace_yt1 = "embed/";
				$embed_url = str_replace($find_yt1, $replace_yt1, $blogentry_embed);
				$blogentry_embed = '<br><iframe width="98%" height="450px" src="'.$embed_url.'" frameborder="0" allowfullscreen></iframe>';
				$debug['blog_post_render'] = 'Worldstar Render 2 COMPLETE | ';
			} else {
				$debug['blog_post_render'] = 'Worldstar Render 2 NOT COMPLETE | ';
			}
	// LIVEMIXTAPES VIDEO LINK EMBEDDS
			if (strpos($blogentry_embed,"livemixtapes") == true) {
				$find_yt1 = "player";
				$replace_yt1 = "embed";
				$embed_url = str_replace($find_yt1, $replace_yt1, $blogentry_embed);
				$blogentry_embed = '<br><iframe width="98%" height="475px" src="'.$embed_url.'" frameborder="0" allowfullscreen></iframe>';
				$debug['blog_post_render'] = 'livemixtapes Render 2 COMPLETE | ';
			} else {
				$debug['blog_post_render'] = 'livemixtapes Render 2 NOT COMPLETE | ';
			}
	
	// VIDEO WIDTH RESIZING
			if (strpos($blogentry_embed,"width=") == true) {
				
					// resize width
					$end = strpos($blogentry_embed," height");
					$start = strpos($blogentry_embed,"width=");
					$length = $end - $start;
					$original_width = substr($blogentry_embed,$start,$length);
					$fixed_width = str_replace($original_width, "width=100%",$blogentry_embed);
				
					
					/*if (str_replace('\\','',$$fixed_width)) {
						$debug['blog_post_render'] = ' it worked!! ';
					} else {
						$debug['blog_post_render'] = 'it didnt work';
					}*/
					$debug['blog_post_render'] = '<hr>this is the fixed:'.$fixed_width. '<hr>';
					$debug['blog_post_render'] = $start.'is the start<br>';
					$debug['blog_post_render'] = $original_width.' is the find<br>';
					$debug['blog_post_render'] = $fixed_width.' is the result<br>';
					$blogentry_embed 	= 	$fixed_width;
					
			}
		// fix slashes
		//$blogentry_embed = str_replace('\\', '', $blogentry_embed);
} else {
	$blogentry_embed = "";
}

$blogentry = $blogentry_embed;

$blogentry_url = $blogentry;
