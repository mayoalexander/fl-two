<?php 
    include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
    /* LOAD ADVERTISMENT PHOTOS */
    //$config = new Blog($_SERVER['HTTP_HOST']);
    
    
    
   
    //$site = $photos->getSiteData('http://thebae.watch/');
    //$photo_ads = $photos->getPhotographyPhotos('baewatch front-page' , SITE);
    //shuffle($photo_ads);
    //print_r($site);
    //exit;
    /* **************


    PRESET GLOBALS
    $config->site


    load a of this shit into the landing header eventually

    *******************/
    
    if (isset($_GET['dev'])) {
        $dev_only = '
        .dev-only {
            display:block;
        }';
    }

    /* HEADER CONFIGURATION */
    include_once(ROOT.'landing/header.php');
    $photos = $config->getPhotoAds($site['creator'], 'front');
    $i=0;
    foreach ($photos as $photo) {
        $photos[$i]['thumbnail'] = str_replace('server/php/files', 'server/php/files/thumbnail', $photo['image']);
        //echo $i.') '.$photos['thumbnail'];
        $i++;
    }
    shuffle($photos);


    /* GET FEATURED POST PREVIEWS ARTICLES */
    $blog_posts = $config->getPosts(0,24,false,$_SERVER['SCRIPT_URI']);
    shuffle($blog_posts);
    $page_title = $site['name'];
    $page_desc = $site['description'];

    ?>


    <style type="text/css">
    header {
        //background-image:url("<?php echo $photo_ads[0]['image']; ?>");
        height:100vh;
        text-shadow:1px 1px 10px #000000;
        display:none;

    }
    .portfolio-box:hover .portfolio-box-caption {
        background-color:<?php echo $site['primary-color']; ?>;
    }
    .bg-photo {
        //text-shadow:1px 1px 10px #000000;
        background-size:130%;
    }
    .bg-photo-1 {
       //background-image:url("<?php echo $photo_ads[1]['image']; ?>");
    }
    .bg-photo-2 {
        //background-image:url("<?php echo $photo_ads[2]['image']; ?>");
    }
    .bg-photo-3 {
        //background-image:url("<?php echo $photo_ads[3]['image']; ?>");
    }
    .img-responsive {
        width:100%;
    }
    header img {
        -webkit-filter: blur(5px);
        filter: blur(5px);
    }
    #header-carousel .carousel-caption  {
        display: none;
    }
    .carousel img {
        //-webkit-filter: blur(5px);
        //filter: blur(5px);
        width:100%;
        //height:90vh;
    }
    </style>

<style type="text/css">
    .call-to-action-button {
        padding-top:0%;
        padding-bottom:0%;
    }
    .login-panel-main {
        //padding-top:14%;
        text-align: left;
        color:#101010;
        margin-top:0;
    }
    .align-to-bottom .landing-promo{
        vertical-align: bottom;
    }

    .dev-only , .learn-more {
        display:none;
    }
    <?php echo $dev_only; ?>

</style>

<body id="main_display_panel">

    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1><?php echo $site['name']; ?></h1>
                <h3><?php echo $site['description']; ?></h3>
                <hr>
                <p><?php echo $site['bio']; ?></p>
                <a data-toggle="modal" data-target="#loginMod"  class="btn btn-primary btn-xl page-scroll">Login To Your Account</a>
            </div>
        </div>
    </header>




    <div id="header-carousel" class="carousel slide learn-more-hide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
        <li data-target="#header-carousel" data-slide-to="1" class=""></li>
        <li data-target="#header-carousel" data-slide-to="2" class=""></li>
      </ol>
      <div class="carousel-inner" role="listbox">

        <div class="item active">
          <img class="first-slide" src="<?php echo $photos[1]['image']; ?>" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
                <p><?php echo $site['description']; ?></p>
                <a data-toggle="modal" data-target="#loginMod"  class="btn btn-primary btn-xl page-scroll">Login To Your Account</a>
            </div>
          </div>
        </div>

        <div class="item">
          <img class="second-slide" src="<?php echo $photos[0]['image']; ?>" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
                <p><?php echo $site['description']; ?></p>
                <a data-toggle="modal" data-target="#loginMod"  class="btn btn-primary btn-xl page-scroll">Login To Your Account</a>
            </div>
          </div>
        </div>

        <div class="item">
          <img class="third-slide" src="<?php echo $photos[2]['image']; ?>" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
                <p><?php echo $site['description']; ?></p>
                <a data-toggle="modal" data-target="#loginMod"  class="btn btn-primary btn-xl page-scroll">Login To Your Account</a>
            </div>
          </div>
        </div>


      </div>
      <a class="left carousel-control" href="#header-carousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#header-carousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>


    
    <div class="row bg-dark dev-only bg-photo bg-photo-2" style='text-align:center;padding:5%;'>
        <div class="col-lg-4">
          <img class="img-circle" src="<?php echo $photos[0]['thumbnail']; ?>" alt="Generic placeholder image" width="250" height="250">
          <h2><?php echo $photos[0]['title']; ?></h2>
          <p><?php echo $photos[0]['caption']; ?></p>
          <p><a target="_blank" class="btn btn-default" href="http://freelabel.net/confirm/sub" role="button">Create Account »</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="<?php echo $photos[1]['thumbnail']; ?>" alt="Generic placeholder image" width="250" height="250">
          <h2><?php echo $photos[1]['title']; ?></h2>
          <p><?php echo $photos[1]['caption']; ?></p>
          <p><a target="_blank" class="btn btn-default" href="http://freelabel.net/confirm/basic" role="button">Create Account »</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="<?php echo $photos[2]['thumbnail']; ?>" alt="Generic placeholder image" width="250" height="250">
          <h2><?php echo $photos[2]['title']; ?></h2>
          <p><?php echo $photos[2]['caption']; ?></p>
          <p><a target="_blank" class="btn btn-default" href="http://freelabel.net/confirm/exclusive" role="button">Create Account »</a></p>
        </div><!-- /.col-lg-4 -->
    </div>

    <aside class="bg-dark bg-photo bg-photo-3" style='text-align:center;padding:5%;'>
        <div class="container text-center">
            <div class="call-to-action">
                <h2>Create Your Account & Explore The Movement</h2>
                <div class="btn-group call-to-action-button-group">
                    <!--<a data-toggle="modal" data-target="#loginMod"  class="btn btn-primary btn-xl page-scroll">Login To Your Account</a>-->
                    <a href="#" class="btn btn-primary btn-xl woww tada load-more-more-info-button">Learn More About <?php echo $site['title']; ?></a>
                </div>
                
            </div>
        </div>
    </aside>

    <a name="load-more"></a>
    <section class="no-padding learn-more" id="portfolio">
        <div class="" >
            <div class="row no-gutter row-eq-height align-to-bottom" style="background-size:200%;background-image:url('<?php echo $blog_posts[1]['photo']; ?>');">
            
            <?php 

            foreach ($blog_posts as $post) {
                $post['blog_story_url'] = str_replace(' ', '', $post['blog_story_url']);
                
        
                    if ($config->site=="http://thebae.watch/") {
                        $post['blog_story_url'] = str_replace('freela.be/l/', 'thebae.watch/', $post['blog_story_url']);
                    }
                    echo '
                                    <div class="col-md-4 landing-promo">
                                        <a href="'.$post['blog_story_url'].'#" target="_blank" class="portfolio-box">
                                            <img src="'.$post['photo'].'" class="img-responsive" alt="">
                                            <div class="portfolio-box-caption">
                                                <div class="portfolio-box-caption-content">
                                                    <div class="project-category text-faded">
                                                        '.$post['blogtitle'].'
                                                    </div>
                                                    <div class="project-name">
                                                        '.$post['twitter'].'
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                    ';
            }

            ?>

            </div>
        </div>
    </section>

    <section style="display:none;">
        <article class="col-md-8" >
            <h3>Named #41 on the Top 100 Most Influencial Brands in the Music Industry</h3>
        </article>
        <article  class="col-md-4" >
            <img src="<?php echo $site['logo']; ?>" width="100%">
        </article>
    </section>


    <section id="services" class="learn-more">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Organize, Create, & Expand with <?php echo $site['title']; ?></h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <h4 class='panel-body' >We create content for all of the users with a Basic or Exclusive Account at <?php echo $site['title']; ?>. The account allows artists to book interviews, studio sessions, project/single releases, and more. We organize campaigns based on what you schedule in your campaign on <?php echo $site['title']; ?>.</h4>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-globe woww bounceIn text-primary"></i>
                        <h3>5.6+ Million Views Monthly</h3>
                        <p class="text-muted">We know exactly what people want to hear. <?php echo $site['title']; ?> provides a platform for millions of people worldwide both Major and Independent Artists.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-file-picture-o woww bounceIn text-primary" data-woww-delay=".1s"></i>
                        <h3>Visual Graphic Design</h3>
                        <p class="text-muted">Visuals are what make your brand stand out. If you have a project releasing in the near future, we create flyers and graphics that communicate exactly what you want your fans to know.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-volume-up woww bounceIn text-primary" data-woww-delay=".2s"></i>
                        <h3>24/7 Radio Rotation</h3>
                        <p class="text-muted">Wether its interviews, radio shows, or live broadcasted concerts, <?php echo $site['title']; ?> RADIO is infamous for taking radio to the next level. We provide you with the resources to get you heard.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-book woww bounceIn text-primary" data-woww-delay=".3s"></i>
                        <h3>Highly Influencial Printed Magazine</h3>
                        <p class="text-muted">Everything is art. FLMAG focuses putting out a highly curated piece of art that redefines the Magazine in Music.</p>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-desktop woww bounceIn text-primary"></i>
                        <h3>Website Design</h3>
                        <p class="text-muted">Organize your brand experience with your own website. We build you a website that is connected to your Social Media so your fans to can connect with you. Keeping all your news, music, videos, in ONE PLACE.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-cogs woww bounceIn text-primary" data-woww-delay=".1s"></i>
                        <h3>Multimedia Studio Production</h3>
                        <p class="text-muted">Work with the most respected producers in the industry. FREELABEL Headquarters is located in Dallas, TX in a 4,5000+ Sqft. Warehouse Building with Six Different Audio, Video, and Photography Studios; </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-microphone woww bounceIn text-primary" data-woww-delay=".2s"></i>
                        <h3>Exclusive Radio/Mag Interviews</h3>
                        <p class="text-muted">Connect with your fans on a personal level. With your <?php echo $site['title']; ?> Account, you can book & Schedule interviews, studio sessions, video interview shoots, and more via your <?php echo $site['title']; ?> Account</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-calendar woww bounceIn text-primary" data-woww-delay=".3s"></i>
                        <h3>Event/Tour Booking</h3>
                        <p class="text-muted">Expand your network. Travel around the world and share your brand with NEW fans who have yet to discover your craft.</p>
                    </div>
                </div>
            </div>






            <div class="row">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-building-o woww bounceIn text-primary"></i>
                        <h3>Artist Brand Management</h3>
                        <p class="text-muted">Get organized. Most talented artists do NOT have the business knowledge to build value for your art. We create a process that works for you. If you're not successful, then we cant be successful.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-sliders woww bounceIn text-primary" data-woww-delay=".1s"></i>
                        <h3>Unlimited Studio Time</h3>
                        <p class="text-muted">It's impossible to have creative freedom when you are on a time limit. Any studio session you book with us is Project Based rather than hourly based.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-camera-retro woww bounceIn text-primary" data-woww-delay=".2s"></i>
                        <h3>Photo/Video Production</h3>
                        <p class="text-muted">Videos provide fans with the opportunity to experience an artists music, vision, personality in all one. Get your videos produced by <?php echo $site['title']; ?> with high end marketing strageties in mind.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-dollar woww bounceIn text-primary" data-woww-delay=".3s"></i>
                        <h3>Get Paid for your Plays + Followers</h3>
                        <p class="text-muted">Don't waste time trying to get more followers or plays on websites that pay you for your hard work. Don't wait years for a check. We pay you royalies on a monthly basis. Create your own storefront and sell your brands clothing!</p>
                    </div>
                </div>
            </div>







             <!-- second row -->
            <div class="row">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-pencil woww bounceIn text-primary"></i>
                        <h3>Brand Logo Identity Design</h3>
                        <p class="text-muted">There is a science behind creating a movement. We use strageties that have been proven for hundreds of years to turn your idea into a living, breathing movement.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-code woww bounceIn text-primary" data-woww-delay=".1s"></i>
                        <h3>iOS + Android App Development</h3>
                        <p class="text-muted">Make it easy for people to experience your art. We design Mobile Apps for each artists that are compatible with every device.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-comments woww bounceIn text-primary" data-woww-delay=".2s"></i>
                        <h3>Important People Reviewing Your Music</h3>
                        <p class="text-muted">Life is about quality, not quanity. Get your music and brand recognized by IMPORTANT people, not MORE people. We introduce your brand to the most powerful people in the industry who can take your music to the next level.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-shopping-cart woww bounceIn text-primary" data-woww-delay=".3s"></i>
                        <h3>Sell Your Products</h3>
                        <p class="text-muted">Create your own storefront and sell your brands clothing!</p>
                    </div>
                </div>
            </div>






            <!-- second row -->
            <div class="row">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-paper-plane woww bounceIn text-primary"></i>
                        <h3>Take your talents around the world</h3>
                        <p class="text-muted">Set up a campaign promoting yourself, music, albums, or anything else. Watch your loyal fans share your message worldwide using their social networks.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-diamond woww bounceIn text-primary" data-woww-delay=".1s"></i>
                        <h3>Watch your campaign pay off</h3>
                        <p class="text-muted">After promoting your music throughout social networks you will not only gain more recognition for artist but also gain larger fan base and potentially unlock unique opportunities for your career</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-heart-o woww bounceIn text-primary" data-woww-delay=".2s"></i>
                        <h3>Support Your Artists</h3>
                        <p class="text-muted">Create a free fan profile, which allows you to follow your favorite artist, promote their music and they earn money!</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-heart woww bounceIn text-primary" data-woww-delay=".3s"></i>
                        <h3>Meet New Fans and Artists</h3>
                        <p class="text-muted">Explore and discover important people and resources who are critical in taking your business to the next level!</p>
                    </div>
                </div>
            </div>

        </div>
    </section>


    <section class="bg-primary" id="about" style='display:none;'>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Login to Your Dashboard</h2>
                    <?php include(ROOT.'user/views/signin.php'); ?>
                    <hr class="light">
                    <p class="text-faded">Create a profile, upload your music and videos, and let the world know who you are.</p>
                    <a href="http://upload.freelabel.net/?uid=submission" class="btn btn-primary btn-xl col-md-6 col-xs-12 call-to-action-button"><h3><i class='glyphicon glyphicon-cloud-upload'></i> <br></br>Upload Submission</h3></a>
                    <a href="http://freelabel.net/register" class="btn btn-default btn-xl col-md-6 col-xs-12 call-to-action-button"><h3><i class='glyphicon glyphicon-plus'></i> <br></br>Create An Account</h3></a>
                </div>
            </div>
        </div>
    </section>

    


    <aside class="bg-dark learn-more">
        <div class="container text-center">
            <div class="call-to-action">
                <h2>Stay ahead of the game and get new content before it releases!</h2>
                <a href="<?php echo $site['http']; ?>mag/" class="btn btn-default btn-xl woww tada">Preview <?php echo $site['title']; ?></a>
            </div>
        </div>
    </aside>
    

    <section id="contact" class="learn-more">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Let's Get In Touch!</h2>
                    <hr class="primary">
                    <p>Ready to start your next project with us? That's great! Give us a call or send us an email and we will get back to you as soon as possible!</p>
                </div>
                <div class="col-lg-4 col-lg-offset-2 text-center">
                    <i class="fa fa-phone fa-3x woww bounceIn"></i>
                    <p>347-994-0267</p>
                </div>
                <div class="col-lg-4 text-center">
                    <i class="fa fa-envelope-o fa-3x woww bounceIn" data-woww-delay=".1s"></i>
                    <p><a href="mailto:admin@freelabel.net">admin@<?php echo $site['domain']; ?></a></p>
                </div>
            </div>
        </div>
    </section>
<script type="text/javascript">
    $(function() {
        $('.load-more-more-info-button').click(function(e){
            e.preventDefault();
            //alert('wer');
            // learn-more-hide
            $('.call-to-action-button-group').removeClass('btn-group');
            $(this).hide('slow');
            $('.learn-more-hide').hide('slow');
            $('.learn-more').show('slow');
        });
    });
</script>
<?php include_once(ROOT.'landing/footer.php'); ?>
