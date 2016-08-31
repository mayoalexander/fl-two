<?php 
    include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');

    $photos = new Blog('http://thebae.watch/');
    //$site = $photos->getSiteData('http://thebae.watch/');
    //$photo_ads = $photos->getPhotographyPhotos('baewatch front-page' , SITE);
    //shuffle($photo_ads);
    //print_r($site);
    //exit;
    //$blog_posts = $config->getPosts();
    //shuffle($blog_posts);
    $page_title = $site['name'];
    $page_desc = $site['description'];

    include_once(ROOT.'landing/header.php');
    ?>


    <!--<style type="text/css">

    header {
        background-image:url("<?php echo $photo_ads[0]['image']; ?>");
        //height:100vh;
        text-shadow:1px 1px 10px #000000;
    }
    .row .no-gutter {
        background-color:#101010;
    }
    .navbar-default .nav > li>a {
        color:#e3e3e3;
    }
    .call-to-action-button {
        margin:auto;
    }
    .call-to-action-button {
        border-radius: 0px;
    }
    .login-panel-main {
        width:100%;
    }
    .login-panel-main {
        color:#101010;
        text-align: left;
    }
    </style>-->

<style type="text/css">
    .login-panel-main {
        padding-top:14%;
        text-align: left;
        color:#101010;
    }
</style>

<body id="page-top">

    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1><?php echo $site['name']; ?></h1>
                <h3><?php echo $site['description']; ?></h3>
                <hr>
                <p><?php echo $site['bio']; ?></p>
                <a href="<?php echo $site['http']; ?>register" class="btn btn-primary btn-xl page-scroll">Create An Account</a>
            </div>
        </div>
    </header>


    <section class="no-padding" id="portfolio">
        <div class="container-fluid">
            <div class="row no-gutter">
                <div class="col-lg-4 col-sm-6">
                    <a href="<?php echo $blog_posts[1]['blog_story_url']; ?>#" target="_blank" class="portfolio-box">
                        <img src="<?php echo $blog_posts[1]['photo']; ?>" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    <?php echo $blog_posts[1]['blogtitle']; ?>
                                </div>
                                <div class="project-name">
                                    <?php echo $blog_posts[1]['twitter']; ?>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="<?php echo $blog_posts[2]['blog_story_url']; ?>#" target="_blank" class="portfolio-box">
                        <img src="<?php echo $blog_posts[2]['photo']; ?>" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    <?php echo $blog_posts[2]['blogtitle']; ?>
                                </div>
                                <div class="project-name">
                                    <?php echo $blog_posts[2]['twitter']; ?>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="<?php echo $blog_posts[3]['blog_story_url']; ?>#" target="_blank" class="portfolio-box">
                        <img src="<?php echo $blog_posts[3]['photo']; ?>" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    <?php echo $blog_posts[3]['blogtitle']; ?>
                                </div>
                                <div class="project-name">
                                    <?php echo $blog_posts[3]['twitter']; ?>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="<?php echo $blog_posts[4]['blog_story_url']; ?>#" target="_blank" class="portfolio-box">
                        <img src="<?php echo $blog_posts[4]['photo']; ?>" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    <?php echo $blog_posts[4]['blogtitle']; ?>
                                </div>
                                <div class="project-name">
                                    <?php echo $blog_posts[3]['twitter']; ?>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="<?php echo $blog_posts[5]['blog_story_url']; ?>#" target="_blank" class="portfolio-box">
                        <img src="<?php echo $blog_posts[5]['photo']; ?>" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    <?php echo $blog_posts[5]['blogtitle']; ?>
                                </div>
                                <div class="project-name">
                                    <?php echo $blog_posts[5]['twitter']; ?>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="<?php echo $blog_posts[6]['blog_story_url']; ?>#" target="_blank" class="portfolio-box">
                        <img src="<?php echo $blog_posts[6]['photo']; ?>" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    <?php echo $blog_posts[6]['blogtitle']; ?>
                                </div>
                                <div class="project-name">
                                    <?php echo $blog_posts[6]['twitter']; ?>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
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


    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Organize, Create, & Expand with FREELABEL.</h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <h4 class='panel-body' >We create content for all of the users with a Basic or Exclusive Account at FREELABEL. The account allows artists to book interviews, studio sessions, project/single releases, and more. We organize campaigns based on what you schedule in your campaign on FREELABEL.</h4>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-globe woww bounceIn text-primary"></i>
                        <h3>5.6+ Million Views Monthly</h3>
                        <p class="text-muted">We know exactly what people want to hear. FREELABEL provides a platform for millions of people worldwide both Major and Independent Artists.</p>
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
                        <p class="text-muted">Wether its interviews, radio shows, or live broadcasted concerts, FLRADIO is infamous for taking radio to the next level. We provide you with the resources to get you heard.</p>
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
                        <p class="text-muted">Connect with your fans on a personal level. With your FREELABEL Account, you can book & Schedule interviews, studio sessions, video interview shoots, and more via your FREELABEL Account</p>
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
                        <p class="text-muted">Videos provide fans with the opportunity to experience an artists music, vision, personality in all one. Get your videos produced by FREELABEL with high end marketing strageties in mind.</p>
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


    <section class="bg-primary" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Login to Your Dashboard</h2>
                    <hr class="light">
                    <p class="text-faded">Create a profile, upload your music and videos, and let the world know who you are.</p>
                    <a href="http://upload.freelabel.net/?uid=submission" class="btn btn-primary btn-xl col-md-6 col-xs-12 call-to-action-button"><h3><i class='glyphicon glyphicon-cloud-upload'></i> <br></br>Upload Music Submission</h3></a>
                    <a href="http://freelabel.net/register" class="btn btn-default btn-xl col-md-6 col-xs-12 call-to-action-button"><h3><i class='glyphicon glyphicon-plus'></i> <br></br>Create An Account</h3></a>
                    <?php include(ROOT.'user/views/signin.php'); ?>
                </div>
            </div>
        </div>
    </section>

    


    <aside class="bg-dark">
        <div class="container text-center">
            <div class="call-to-action">
                <h2>Stay ahead of the game and get new music before it releases!</h2>
                <a href="http://freelabel.net/" class="btn btn-default btn-xl woww tada">Preview FREELABEL Magazine</a>
            </div>
        </div>
    </aside>

    <section id="contact">
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
                    <p><a href="mailto:admin@freelabel.net">admin@freelabel.net</a></p>
                </div>
            </div>
        </div>
    </section>

    <!-- jQuery -->
    <script src="<?php echo HTTP; ?>landing/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo HTTP; ?>landing/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="<?php echo HTTP; ?>landing/js/jquery.easing.min.js"></script>
    <script src="<?php echo HTTP; ?>landing/js/jquery.fittext.js"></script>
    <script src="<?php echo HTTP; ?>landing/js/woww.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo HTTP; ?>landing/js/creative.js"></script>

</body>

</html>
