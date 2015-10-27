function ".$trackanchor_noat."(){
	element=document.getElementById('".$trackanchor_noat."_img');
		if(document.getElementById('".$trackanchor_noat."').paused){
			document.getElementById('".$trackanchor_noat."').play();
			element.src='http://freelabel.net/images/player_stop.png';
		} else {
			document.getElementById('".$trackanchor_noat."').pause();
			element.src='http://freelabel.net/images/player_play.png';
		}
	}