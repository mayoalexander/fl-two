<?php 
  include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
  $config = new Blog();
  $promo_id = str_replace('index/image/', '', $_GET['url']);

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
  body, html {
    overflow-x: hidden;
  }
  .promo-title , .promo-subtitle {
    text-align: center;
  }
  .promo-subtitle {
    font-size:1.5em;
  }
  .full-width-article img {
    /*height: 50vh;*/
    width: 100%;
}
  .promo-image , ol {
    list-style-type: none;
    padding: 0;
  }
  .promo-image img {
    width:100%;
  }
  .promo-image video {
    width: 50px;
    height: 50px;
    /*display: inline-block;*/
  }
  .promo-body {
    background-color: rgba(0,0,0,0.85);
    border-radius: 5px;
  }
  .jumbotron {
    padding-top: 1.5%;
  }
  .full-width-article {
    min-height: 100vh;
  }


   @media (max-width: 800px) {
      .promo-image img {
        width:100%;
      }
    }
</style>
<!-- style="background-image:url(<?php //echo $current_promo[0]['image']; ?>);" -->
<div class="x" >
  <?php echo $current_promo['image']; ?>

<div class="row promo-body">
  <?php

  echo $config->display_promo_public($promos, true); 
  ?>
</div>

</div>





<?php 

// $stream = 'related_bae';

// include(ROOT.'images/pull_images.php');

?>





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