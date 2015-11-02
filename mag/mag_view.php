<!-- Carousel
    ================================================== -->
    <div id="magSlide" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#magSlide" data-slide-to="0" class="active"></li>
        <li data-target="#magSlide" data-slide-to="1"></li>
        <li data-target="#magSlide" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
      <?php
    // DISPLAY SAVED TWEETS
      if (file_exists('../inc/connection.php')) {
        include('../inc/connection.php');
      }
      if (file_exists('inc/connection.php')) {
        include('inc/connection.php');
      }
      $randomStart = rand(1,30).',';
      //$randomStart = '0'.',';
      $i = 1;
      $result = mysqli_query($con,"SELECT * FROM blog WHERE type='blog' ORDER BY `id` DESC LIMIT ".$randomStart." 10");  
      while($row = mysqli_fetch_array($result))
          {
        
          // ITEM STATUS
          if ($i > 1) {
            $c_item_status = "item";
          } else {
            $c_item_status = "item active";
          }
          $blogtitle = $row['blogtitle'];
          $blog_photo = "http://img.freelabel.net/".$row['photo'];
          $twitter = $row['twitter'];
          $twitpic = $row['twitpic'];
          $blogentry = $row['blogentry'];
          $blog_story_url = $row['blog_story_url'];

        
 echo '<div class="'.$c_item_status.'">
          <img src="'.$blog_photo.'" alt="First slide">
          <div class="container-fluid">
            <div class="carousel-caption">
            <a href="'.$blog_story_url.'">
              <h2>'.$blogtitle.'</h2>
              <h3>'.$twitter.'</h3>
              <p>'.$blogentry.'</p>
            </a>
              <hr>
              <p><a class="btn btn-primary" href="'.$blog_story_url.'" role="button">View More</a></p>
            </div>
          </div>
        </div>';
        $i = $i + 1;
      }
    ?>
   
       
      </div>
      <a class="left carousel-control" href="#magSlide" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#magSlide" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div><!-- /.carousel -->