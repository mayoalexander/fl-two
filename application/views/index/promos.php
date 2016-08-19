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
  .full-width-article {
    min-height: 100vh;
  }

</style>
<div class="row">



<section >
<?php
  include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
  $config = new Blog();
  $slug = str_replace('index/promos', '', $_GET['url']);

  // print_r($slug);
  $promos = $config->display_promo_list('admin' , 6, $slug, 'id');
  echo $config->display_promo_public($promos, true); 
?>
</section>
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
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript" src="http://freelabel.net/js/promos.js"></script>


