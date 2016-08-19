<?php 
    include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
    $config = new Blog();
    $site = $config->getSiteData();
    $site['media']['photos'] = $config->getPhotoAds($site['creator'], 'registration');
    $site['media']['studio'] = $config->getPhotoAds($site['creator'], 'register-feature');
    $site['media']['artists'] = $config->getPhotoAds($site['creator'], 'artist flyer');
    $site['media']['promos'] = $config->getPhotoAds($site['creator'], 'current-promo');
    // $site['media']['credit'] = array_reverse($config->getPhotoAds($site['creator'], 'magazine'));

    /* why */
    $info['why'] = '';
    foreach ($site['landing-info']['why'] as $key => $text) {
        $info['why'] .=  '<li class="pricing-list-info">'.$text.'</li>';
    }

    $info['what'] = '';
    foreach ($site['landing-info'] as $key => $text) {
        $info['what'] .=  '<li class="pricing-list-info">'.$text.'</li>';
    }

    $info['benefits'] = '';
    foreach ($site['landing-info']['benefits'] as $key => $text) {
        $info['benefits'] .=  '<li class="pricing-list-info">'.$text.'</li>';
    }

    $info['how'] = '';
    foreach ($site['landing-info']['how'] as $key => $text) {
        $info['how'] .=  '<li class="pricing-list-info">'.$text.'</li>';
    }

?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Register | <?php echo $site['name']; ?></title>
    <meta name="description" content="<?php echo $site['description']; ?>" />
    <meta name="keywords" content="<?php echo $site['keywords']; ?>" />
    <meta name="author" content="<?php echo $site['name']; ?>" />
    <link rel="shortcut icon" href="<?php echo $site['logo']; ?>">
    <link href='https://fonts.googleapis.com/css?family=Homemade+Apple' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Sahitya:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:900' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Alegreya+Sans:400,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Nunito:400,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="<?php echo HTTP ; ?>landing/view/pricing/css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo HTTP ; ?>landing/view/pricing/css/demo.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo HTTP ; ?>landing/view/pricing/css/icons.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo HTTP ; ?>landing/view/pricing/css/component.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <style type="text/css">
        a {
            color:#FE3F44;
        }
        .pricing-list-info {
            list-style-type: none;
        }
        .codrops-header {
            background-position:center top;
            background-size:auto 100vh;

            background-image:url('<?php echo $site["media"]["photos"][0]["image"]; ?>');
        }
        .marketing-area {
            background-position:center top;
            background-size:100% auto;
            /*background-image:url('<?php echo $site["media"]["photos"][1]["image"]; ?>');*/
        }
        .pricing-area {
            background-position:center top;
            background-size:100% auto;
            background-image:url('<?php echo $site["media"]["photos"][3]["image"]; ?>');
        }
        .freetrial-area {
            background-position:center top;
            background-size:100% auto;
            /*background-image:url('<?php echo $site["media"]["photos"][0]["image"]; ?>');*/
        }
        .media-item__img {
            max-width:450px;
            border-radius: 0.25em;
            box-shadow: 1px 1px 5px #101010;
        }
        .media-item__caption {
            color:#e3e3e3;
        }
        .media-item__caption, .media-item__title {
            max-width:400px;
            margin:auto;
        }
        .marketing-area img {
            /*max-width:650px;*/
        }
        .pricing-list-info {
            margin:auto;
            max-width: 800px;
        }
        .pricing-list-info h3 {
            color:#303030;
        }

        /* LOGIN FORM */
        .login-form {
            text-align: center;
        }
        .login-form button {
            display: block;
            margin:auto;
        }
        .login-form input, .login-form button {
            padding:2%;
        }
        .jumbotron {
            background-size:200%;
        }

        /*MOBILE STYLES */
         
        @media (max-width: 600px) {
        .codrops-header {
            background-size: auto 100vh;
          }
        .media-item__img {
            width:250px;
        }
        }

    </style>
    <!--[if IE]>
  		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>

<body>
    <div class="container">

        <!-- Header and Awesome Photo Slide -->
        <header class="codrops-header">
            <h1>
                <a href="http://freelabel.net/" ><img src="<?php echo $site['logo']; ?>" style="max-height:20vh;"></a>
                <span><?php echo $site['name']; ?></span> Create An Account
            </h1>
        </header>

<!--         <section class="pricing-section bg-8 pricing-area">
            <h2 class="pricing-section__title">Login</h2>
            <form class="login-form">
                <input type="text" class="form-control" placeholder="Enter Username">
                <input type="text" class="form-control" placeholder="Enter Password">
                <button>Login</button>
            </form>
        </section> -->



        <!-- RECENT PROJECTS -->
<!--         <section class="content content--related freetrial-area">
            <p class="intro">
            <h1>How Does This Help Artist and Music Industry?</h1>

            <?php 
                echo $info['benefits'];
            ?>
            </p>
            <a class="media-item" target="_blank" href="<?php echo $site['http'].'users/index/image/'.$site['media']['credit'][0]['id']; ?>">
                <img class="media-item__img" src="<?php echo $site['media']['credit'][0]['image']; ?>">
                <h3 class="media-item__title"><?php echo $site['media']['credit'][0]['title']; ?></h3>
            </a>
            <a class="media-item" target="_blank" href="<?php echo $site['http'].'users/index/image/'.$site['media']['credit'][1]['id']; ?>">
                <img class="media-item__img" src="<?php echo $site['media']['credit'][1]['image']; ?>">
                <h3 class="media-item__title"><?php echo $site['media']['credit'][1]['title']; ?></h3>
            </a>
            <a class="media-item" target="_blank" href="<?php echo $site['http'].'users/index/image/'.$site['media']['credit'][2]['id']; ?>">
                <img class="media-item__img" src="<?php echo $site['media']['credit'][2]['image']; ?>">
                <h3 class="media-item__title"><?php echo $site['media']['credit'][2]['title']; ?></h3>
            </a>
        </section> -->
asdfasfd
<section class="features-list" id="features">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        <div class="col-md-4 feature-1 wp2 animated fadeInDown">
                            <div class="feature-icon">
                                <i class="fa fa-desktop"></i>
                            </div>
                            <div class="feature-content">
                                <h1>Create Your Account</h1>
                                <p>Choose your account type, make your payment, and create your username and password!</p>
                                <a href="http://tympanus.net/codrops/?p=22554" class="read-more-btn">Read More <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-md-4 feature-2 wp2 delay-05s animated fadeInDown">
                            <div class="feature-icon">
                                <i class="fa fa-flash"></i>
                            </div>
                            <div class="feature-content">
                                <h1>Upload and Distribute Your Music + Videos</h1>
                                <p>Login to your dashboard and start uploading music to your profile and booking project releases, interviews, or showcases via your Events tab.</p>
                                <a href="http://tympanus.net/codrops/?p=22554" class="read-more-btn">Read More <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-md-4 feature-3 wp2 delay-1s animated fadeInDown">
                            <div class="feature-icon">
                                <i class="fa fa-heart"></i>
                            </div>
                            <div class="feature-content">
                                <h1>Watch Your Audience Grow</h1>
                                <p>A Team of producers, A&amp;Rs, and Event coordinators will contact you about getting booked on different projects and showcases!</p>
                                <a href="http://tympanus.net/codrops/?p=22554" class="read-more-btn">Read More <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>


        <!-- Pricing Tables and More  -->
        <section class="pricing-section bg-8 pricing-area">
            <h2 class="pricing-section__title">Choose Your Acasdfasfdcount Type:</h2>
            <div class="pricing pricing--tashi">
<!--                 <div class="pricing__item">
                    <h3 class="pricing__title">Lite</h3>
                    <p class="pricing__sentence">Perfect for small startups that have less than 10 team members</p>
                    <div class="pricing__price"><span class="pricing__currency">$</span>6<span class="pricing__period">/ month</span></div>
                    <ul class="pricing__feature-list">
                        <li class="pricing__feature">500 GB of space</li>
                        <li class="pricing__feature">Radio + Mag App</li>
                        <li class="pricing__feature">Upload Music + Videos</li>
                    </ul>
                    <button class="pricing__action" data-type="lite" aria-label="Purchase this plan"><span class="icon icon--arrow-right"></span></button>
                </div> -->
<!--                 <div class="pricing__item">
                    <h3 class="pricing__title"><i class="fa fa-ticket"></i> Freetrial</h3>
                    <p class="pricing__sentence">For people wanting to try out the platform and upload their music to the site!</p>
                    <div class="pricing__price"><span class="pricing__currency">$</span>0<span class="pricing__period">/ $10 after 24 hours</span></div>
                    <ul class="pricing__feature-list">
                        <li class="pricing__feature">Upload and Download Unlimited Songs, Videos, Interviews, Radio Shows, Magazine Issues, Exclusve Music & much more..</li>
                    </ul>
                    <button class="pricing__action" data-type="lite" aria-label="Purchase this plan"><span class="icon icon--arrow-right"></span></button>
                </div> -->

                <div class="pricing__item">
                    <h3 class="pricing__title"><i class="fa fa-ticket"></i> Trial</h3>
                    <p class="pricing__sentence">For people wanting to try out the platform and start sharing your profile to the world.</p>
                    <div class="pricing__price"><span class="pricing__currency">$</span>FREE<span class="pricing__period">/ First Day</span></div>
                    <ul class="pricing__feature-list">
                        <li class="pricing__feature">Upload and Download Unlimited Songs, Videos, Interviews, Radio Shows, Magazine Issues, Exclusve Music & much more..</li>
                        <li class="pricing__feature">Radio + Magazine App</li>
                        <li class="pricing__feature">Post Directly FREELABEL Social Network Profiles</li>
                        <li class="pricing__feature">Create Promotions to Showcase full Albums or Projects.</li>
                    </ul>
                    <button class="pricing__action" data-type="lite" aria-label="Purchase this plan"><span class="icon icon--arrow-right"></span></button>
                </div>

                <div class="pricing__item">
                    <h3 class="pricing__title"><i class="fa fa-microphone"></i> Creator</h3>
                    <p class="pricing__sentence">For more advanced creators looking to make a impression to millions by get their content showcased exclusively on the Radio + Magazine.</p>
                    <div class="pricing__price"><span class="pricing__currency">$</span>59<span class="pricing__period">/ month</span></div>
                    <ul class="pricing__feature-list">
                        <li class="pricing__feature">Includes Trial Features</li>
                        <li class="pricing__feature">24/7 Radio Rotation</li>
                        <li class="pricing__feature">Magazine + Radio Interviews</li>
                        <li class="pricing__feature">Free Entry into FREELABEL Events</li>
                        <li class="pricing__feature">Full Project Streams</li>
                        <li class="pricing__feature">Full One-Hour Radio Show Broadcasting Your Projects Live On-air</li>
                        <li class="pricing__feature">Event/Project Placement</li>
                        <li class="pricing__feature">Audio Mixing & Mastering (Radio Ready)</li>

                    </ul>
                    <button class="pricing__action" data-type="pro" aria-label="Purchase this plan"><span class="icon icon--arrow-right"></span></button>
                </div>
                <div class="pricing__item">
                    <h3 class="pricing__title"><i class="fa fa-institution"></i> Exclusive</h3>
                    <p class="pricing__sentence">For creators who are looking for more Studio Production, hands-on development, interested in expanding their team, building more resources for their content production. audio and visual production such as recording, mixing, mastering, video or photoshoots, etc.</p>
                    <div class="pricing__price"><span class="pricing__currency">$</span>200<span class="pricing__period">/ month</span></div>
                    <ul class="pricing__feature-list">
                        <li class="pricing__feature">Includes Creator Features</li>
                        <li class="pricing__feature">Public Relations</li>
                        <li class="pricing__feature">Artist Management</li>
                        <li class="pricing__feature">Event + Tour Booking</li>
                        <li class="pricing__feature">Earn Monthly Royalties for Radio Streams, Views, Followers, & Subscribers</li>
                        <li class="pricing__feature">Full Social Media Package</li>
                        <li class="pricing__feature">Project Placement</li>
                        <li class="pricing__feature">Recording, Mixing, & Mastering</li>
                        <li class="pricing__feature">Video + Photoshoots</li>

                    </ul>
                    <button class="pricing__action" data-type="exclusive" aria-label="Purchase this plan"><span class="icon icon--arrow-right"></span></button>
                </div>
            </div>
        </section>


        <!-- RECENT PROMOTIONS -->
        <section class="content content--related marketing-area bg-8">
            <!-- <p>Don't have the money right now? Try out our limited FREE TRIAL accounts!</p> -->
            <h1>Why Use FREELABEL?</h1>
            <?php 
                //echo $info['why'];
            ?>
            <a class="media-item" target="_blank" href="<?php echo $site['http'].'users/index/image/'.$site['media']['studio'][0]['id']; ?>">
                <img class="media-item__img" src="<?php echo $site['media']['studio'][0]['image']; ?>">
                <h3 class="media-item__title"><?php echo $site['media']['studio'][0]['title']; ?></h3>
                <p class="media-item__caption"><?php echo $site['media']['studio'][0]['caption']; ?></p>
            </a>
            <a class="media-item" target="_blank" href="<?php echo $site['http'].'users/index/image/'.$site['media']['studio'][1]['id']; ?>">
                <img class="media-item__img" src="<?php echo $site['media']['studio'][1]['image']; ?>">
                <h3 class="media-item__title"><?php echo $site['media']['studio'][1]['title']; ?></h3>
                <p class="media-item__caption"><?php echo $site['media']['studio'][1]['caption']; ?></p>
            </a>
            <a class="media-item" target="_blank" href="<?php echo $site['http'].'users/index/image/'.$site['media']['studio'][2]['id']; ?>">
                <img class="media-item__img" src="<?php echo $site['media']['studio'][2]['image']; ?>">
                <h3 class="media-item__title"><?php echo $site['media']['studio'][2]['title']; ?></h3>
                <p class="media-item__caption"><?php echo $site['media']['studio'][2]['caption']; ?></p>
            </a>
            <a class="media-item" target="_blank" href="<?php echo $site['http'].'users/index/image/'.$site['media']['studio'][0]['id']; ?>">
                <img class="media-item__img" src="<?php echo $site['media']['studio'][3]['image']; ?>">
                <h3 class="media-item__title"><?php echo $site['media']['studio'][3]['title']; ?></h3>
                <p class="media-item__caption"><?php echo $site['media']['studio'][3]['caption']; ?></p>
            </a>
            <a class="media-item" target="_blank" href="<?php echo $site['http'].'users/index/image/'.$site['media']['studio'][1]['id']; ?>">
                <img class="media-item__img" src="<?php echo $site['media']['studio'][4]['image']; ?>">
                <h3 class="media-item__title"><?php echo $site['media']['studio'][4]['title']; ?></h3>
                <p class="media-item__caption"><?php echo $site['media']['studio'][4]['caption']; ?></p>
            </a>
            <a class="media-item" target="_blank" href="<?php echo $site['http'].'users/index/image/'.$site['media']['studio'][2]['id']; ?>">
                <img class="media-item__img" src="<?php echo $site['media']['studio'][5]['image']; ?>">
                <h3 class="media-item__title"><?php echo $site['media']['studio'][5]['title']; ?></h3>
                <p class="media-item__caption"><?php echo $site['media']['studio'][5]['caption']; ?></p>
            </a>
        </section>



        <!-- RECENT PROMOTIONS -->
        <section class="content content--related freetrial-area bg-1">
            <!-- <p>Don't have the money right now? Try out our limited FREE TRIAL accounts!</p> -->
            <h1>How Do Promotions Work?</h1>
            <?php 
                echo $info['how'];
            ?>
            <a class="media-item" target="_blank" href="<?php echo $site['http'].'users/index/image/'.$site['media']['promos'][0]['id']; ?>">
                <img class="media-item__img" src="<?php echo $site['media']['promos'][0]['image']; ?>">
                <h3 class="media-item__title"><?php echo $site['media']['promos'][0]['title']; ?></h3>
                <p class="media-item__caption"><?php echo substr($site['media']['promos'][0]['caption'],0,150).'...'; ?></p>
            </a>
            <a class="media-item" target="_blank" href="<?php echo $site['http'].'users/index/image/'.$site['media']['promos'][1]['id']; ?>">
                <img class="media-item__img" src="<?php echo $site['media']['promos'][1]['image']; ?>">
                <h3 class="media-item__title"><?php echo $site['media']['promos'][1]['title']; ?></h3>
                <p class="media-item__caption"><?php echo substr($site['media']['promos'][1]['caption'],0,150).'...'; ?></p>
            </a>
            <a class="media-item" target="_blank" href="<?php echo $site['http'].'users/index/image/'.$site['media']['promos'][2]['id']; ?>">
                <img class="media-item__img" src="<?php echo $site['media']['promos'][2]['image']; ?>">
                <h3 class="media-item__title"><?php echo $site['media']['promos'][2]['title']; ?></h3>
                <p class="media-item__caption"><?php echo substr($site['media']['promos'][2]['caption'],0,150).'...'; ?></p>
            </a>
        </section>







        <!-- RELATED -->
        <section class="content content--promotions freetrial-area bg-8" style="display:none;">
            <!-- <p>Don't have the money right now? Try out our limited FREE TRIAL accounts!</p> -->
            <h1>Recent Work</h1>
            <p>Checkout some of our recent artist and their projects!</p>
            <a class="media-item" target="_blank" href="<?php echo $site['http'].'users/index/image/'.$site['media']['artists'][0]['id']; ?>">
                <img class="media-item__img" src="<?php echo $site['media']['artists'][0]['image']; ?>">
                <h3 class="media-item__title"><?php echo $site['media']['artists'][0]['title']; ?></h3>
            </a>
            <a class="media-item" target="_blank" href="<?php echo $site['http'].'users/index/image/'.$site['media']['artists'][1]['id']; ?>">
                <img class="media-item__img" src="<?php echo $site['media']['artists'][1]['image']; ?>">
                <h3 class="media-item__title"><?php echo $site['media']['artists'][1]['title']; ?></h3>
            </a>
            <a class="media-item" target="_blank" href="<?php echo $site['http'].'users/index/image/'.$site['media']['artists'][2]['id']; ?>">
                <img class="media-item__img" src="<?php echo $site['media']['artists'][2]['image']; ?>">
                <h3 class="media-item__title"><?php echo $site['media']['artists'][2]['title']; ?></h3>
            </a>
            <a class="media-item" target="_blank" href="<?php echo $site['http'].'users/index/image/'.$site['media']['artists'][3]['id']; ?>">
                <img class="media-item__img" src="<?php echo $site['media']['artists'][3]['image']; ?>">
                <h3 class="media-item__title"><?php echo $site['media']['artists'][3]['title']; ?></h3>
            </a>
            <a class="media-item" target="_blank" href="<?php echo $site['http'].'users/index/image/'.$site['media']['artists'][4]['id']; ?>">
                <img class="media-item__img" src="<?php echo $site['media']['artists'][4]['image']; ?>">
                <h3 class="media-item__title"><?php echo $site['media']['artists'][4]['title']; ?></h3>
            </a>
            <a class="media-item" target="_blank" href="<?php echo $site['http'].'users/index/image/'.$site['media']['artists'][5]['id']; ?>">
                <img class="media-item__img" src="<?php echo $site['media']['artists'][5]['image']; ?>">
                <h3 class="media-item__title"><?php echo $site['media']['artists'][5]['title']; ?></h3>
            </a>


        </section>

    </div>
    <!-- /container -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script type="text/javascript">
        $('.pricing__action').click(function(){

            var data = $(this).attr('data-type');

            switch(data) {
                case 'lite':
                    var package = 'lite';
                    break;
                case 'creator':
                    var package = 'sub';
                    break;
                case 'pro':
                    var package = 'basic';
                    break;
                case 'exclusive':
                    var package = 'exclusive';
                    break;
                case 'tour':
                    var package = 'tour';
                    break;
            }
            window.location.assign('http://freelabel.net/confirm/' + package);
        });
    </script>
</body>

</html>
