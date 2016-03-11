<?php 
	$navigation_option[] = array('title' => 'Home', 					'url' => 'http://freelabel.net/' 		, 'icon' => 'paperplane');
	$navigation_option[] = array('title' => 'Magazine', 				'url' => 'http://freelabel.net/mag/pull_mag.php' 	, 'icon' => 'news');
	$navigation_option[] = array('title' => 'Radio', 				'url' => 'http://freelabel.net/radio' 	, 'icon' => 'sound');
	$navigation_option[] = array('title' => 'TV', 						'url' => 'http://freelabel.net/tv/index.php' 		, 'icon' => 'tv');
	$navigation_option[] = array('title' => 'Shop', 					'url' => 'http://freelabel.net/store/pull_store.php' 	, 'icon' => 'shop');
	$navigation_option[] = array('title' => 'Studios', 					'url' => 'http://freelabel.net/studios' , 'icon' => 'vynil');
	$navigation_option[] = array('title' => 'Logout', 					'url' => 'http://freelabel.net?logout' , 'icon' => 'truck');

	$navigation_controls='';
	foreach ($navigation_option as $page) {
		$title = $page['title'];
		$url = $page['url'];
		$icon = $page['icon'];
		if ($title=='Radio' OR $title=='Home' OR $title=='Logout') {
			switch ($title) {
				case 'Radio' OR 'Home' OR 'Logout':
        			$navigation_controls .= "<li><a href='".$url."'><span class='icon icon-".$icon."'></span>".$title."</a></a></li>";
					break;
				default:
        			//$navigation_controls .= "<li><a href='".$url."'><span class='icon icon-".$icon."'></span>".$title."</a></a></li>";
					break;
			}
		} else {
        	$navigation_controls .= "<li><a onclick=\"loadPage('".$url."', '#main_display_panel', 'dashboard', '".$user_name_session."')\"'><span class='icon icon-".$icon."'></span>".$title."</a></a></li>";
		}

	    //$navigation_controls .= "<li><a href='".$url."' class=''><span class='icon icon-".$icon."'></span>".$title."</a></li>";
	}

// ------------------------------------------------------------ // 
// ------------------------------------------------------------ //
// ------------------------------------------------------------ //
// ------------------------------------------------------------ //

	$pro_user_options[] = array('title' => 'Uploads', 					'url' => 'http://freelabel.net/db/trx' , 'icon' => 'data');
	$pro_user_options[] = array('title' => 'Booking', 					'url' => 'http://freelabel.net/db/booking' , 'icon' => 'calendar');
	$pro_user_options[] = array('title' => 'Settings', 					'url' => 'http://freelabel.net/db/howtouse' , 'icon' => 'params');

	//$navigation_controls_pro .= "<li><h2>Create</h2></li>";
	foreach ($pro_user_options as $page) {
		$title = $page['title'];
		$url = $page['url'];
		$icon = $page['icon'];
	                  //$navigation_controls .= "<li><a href='".$url."' class=''><span class='icon icon-".$icon."'></span>".$title."</a></li>";
	                  
              		  $navigation_controls_pro .= "<li><a onclick=\"loadPage('".$url."', '#main_display_panel', 'dashboard', '".$user_name_session."')\"'><span class='icon icon-".$icon."'></span>".$title."</a></a></li>";

	                  //$navigation_controls .= "<li><a onclick="" href='".$url."' class=''><span class='icon icon-".$icon."'></span>".$title."</a></li>";
	}
/*
	// $pro_user_options[] = array('title' => 'Post', 						'url' => 'http://freelabel.net/db/trx' , 'icon' => 'data');
	// $pro_user_options[] = array('title' => 'Booking', 					'url' => 'http://freelabel.net/db/booking' , 'icon' => 'calendar');
	// $pro_user_options[] = array('title' => 'Settings', 					'url' => 'http://freelabel.net/db/howtouse' , 'icon' => 'params');

	$navigation_controls .= "<li><h2>Create</h2></li>";
	foreach ($pro_user_options as $page) {
		$title = $page['title'];
		$url = $page['url'];
		$icon = $page['icon'];
	                  $navigation_controls .= "<li><a href='".$url."' class=''><span class='icon icon-".$icon."'></span>".$title."</a></li>";
	}

*/
        //$navigation_controls .= "<li><a href='http://freelabel.net/?logout'><span class='icon icon-".$icon."'></span>Logout</a></li>";

?>