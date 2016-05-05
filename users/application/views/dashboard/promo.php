<?php 
  include_once('/home/content/59/13071759/html/config/index.php');
  $config = new Blog();
  $promo_id = str_replace('index/image/', '', $_GET['url']);

  $promo_id = 2386;
  if (!isset($promo_id)) {
    echo 'nope!';
    exit;
  }
  $current_promo = $config->getPromoById($promo_id);



  // gather promo data
  if (is_numeric($promo_id)) {
    $promos = $config->display_promo(Session::get('user_name') , 1, $promo_id, 'id');
  } else {
    $promos = $config->display_promo(Session::get('user_name') , 1, $promo_id, 'desc');
  }

  // update stats
  $counts = $promos[0]['stats'];
  $new_counts = $counts + 1;
  $promo_id = $promos[0]['id'];
  $stats = $config->update_stats($counts , $promo_id);
  // print_r($stats);

?>
    <style>
      /*body { color: #666; font-family: sans-serif; line-height: 1.4; }*/
      /*h1 { color: #444; font-size: 1.2em; padding: 14px 2px 12px; margin: 0px; }*/
      /*h1 em { font-style: normal; color: #999; }*/
      /*a { color: #888; text-decoration: none; }*/
      /*#wrapper { max-width: 400px; margin: 40px auto; }*/
      
      ol { padding: 0px; margin: 0px; list-style: decimal-leading-zero inside; color: #ccc; border-top: 1px solid #ccc; font-size: 0.9em; }
      ol li { position: relative; margin: 0px; padding: 9px 2px 10px; border-bottom: 1px solid #ccc; cursor: pointer; }
      ol li a {font-size:18px; display: block; text-indent: -3.3ex; padding: 0px 0px 0px 20px; }
      li.playing { color: <?php echo $site['primary-color']; ?>; /*text-shadow: 1px 1px 0px rgba(255, 255, 255, 0.3); */}
      li.playing a { color: <?php echo $site['primary-color']; ?> }
      li.playing:before { content: '♬'; width: 14px; height: 14px; padding: 3px; line-height: 14px; margin: 0px; position: absolute; left: -24px; top: 9px; color: #000; font-size: 13px; text-shadow: 1px 1px 0px rgba(0, 0, 0, 0.2); }
      .player-photo {
        width:50px;
        max-width:50px;
        max-height:50px;
        margin:0.5em;
      }
      .playlist-img {
        width: 250px;
      }
      #shortcuts { position: fixed; bottom: 0px; width: 100%; color: #666; font-size: 0.9em; margin: 60px 0px 0px; padding: 20px 20px 15px; background: #f3f3f3; background: rgba(240, 240, 240, 0.7); }
      #shortcuts div { width: 460px; margin: 0px auto; }
      #shortcuts h1 { margin: 0px 0px 6px; }
      #shortcuts p { margin: 0px 0px 18px; }
      #shortcuts em { font-style: normal; background: #d3d3d3; padding: 3px 9px; position: relative; left: -3px;
        -webkit-border-radius: 4px; -moz-border-radius: 4px; -o-border-radius: 4px; border-radius: 4px;
        -webkit-box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1); -moz-box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1); -o-box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1); box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1); }

      @media screen and (max-device-width: 480px) {
        /*#wrapper { position: relative; left: -3%; }*/
        /*#shortcuts { display: none; }*/
        /*#wrapper { width: 100%; margin: 40px auto; }*/

      }
    </style>
    <!-- <script type="text/javascript" src="//code.jquery.com/jquery-2.0.3.min.js"></script> -->
    <script src="http://freelabel.net/vendor/audiojs/audiojs/audio.min.js"></script>
    <script>
      $(function() { 
        // Setup the player to autoplay the next track
        var a = audiojs.createAll({
          trackEnded: function() {
            var next = $('ol li.playing').next();
            if (!next.length) next = $('ol li').first();
            next.addClass('playing').siblings().removeClass('playing');
            audio.load($('a', next).attr('data-src'));
            audio.play();
          }
        });

        
        // Load in the first track
        var audio = a[0];
            first = $('ol a').attr('data-src');
        $('ol li').first().addClass('playing');
        audio.load(first);
        console.log(audio);

        // Load in a track on click
        $('ol li').click(function(e) {
          e.preventDefault();
          $(this).addClass('playing').siblings().removeClass('playing');
          audio.load($('a', this).attr('data-src'));
          audio.play();
        });
        // Keyboard shortcuts
        $(document).keydown(function(e) {
          var unicode = e.charCode ? e.charCode : e.keyCode;
             // right arrow
          if (unicode == 39) {
            e.preventDefault();
            var next = $('li.playing').next();
            if (!next.length) next = $('ol li').first();
            next.click();
            // back arrow
          } else if (unicode == 37) {
            e.preventDefault();
            var prev = $('li.playing').prev();
            if (!prev.length) prev = $('ol li').last();
            prev.click();
            // spacebar
          } else if (unicode == 32) {
            e.preventDefault();
            audio.playPause();
          }
        })
      });
    </script>
    <div class="container">
      <h2 class="text-muted"><em>FREELABEL MAGAZINE</em></h2>
      <!-- <audio preload></audio> -->
      <!-- <ol> -->

      <?php 
      // print_r($promo_id);
      // print_r($_GET);
      // exit;
      echo $config->display_promo_playlist_single($current_promo, true); 

 ?>


        <!-- <li><a href="#" data-src="http://kolber.github.io/audiojs/demos/mp3/11-mo-stars-mo-problems.mp3">mo stars mo problems</a></li> -->
      <!-- </ol> -->
    </div>
    <div id="shortcuts" style="display: none;">
      <div>
        <h1>Keyboard shortcuts:</h1>
        <p><em>&rarr;</em> Next track</p>
        <p><em>&larr;</em> Previous track</p>
        <p><em>Space</em> Play/pause</p>
      </div>
    </div>






<!-- Modal -->
<div class="modal fade" id="promoModal" tabindex="-1" role="dialog" aria-labelledby="promoModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
<!--       <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div> -->
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>





<script type="text/javascript" src="http://freelabel.net/js/promos.js"></script>