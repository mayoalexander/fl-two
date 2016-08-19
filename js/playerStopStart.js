<script>

function playpauseMP3(){
element=document.getElementById('playerbutton')
if(document.getElementById('mp3').paused){

document.getElementById("mp3").play();
element.src='http://amradiolive.com/images/player_stop.png';
}else{

document.getElementById('mp3').pause();
element.src='http:/\/amradiolive.com/images/player_play.png';

}

}
</script>