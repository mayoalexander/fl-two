<?php 
    include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
    $config = new Blog();
    $site = $config->getSiteData();
    $site['media']['photos'] = array_reverse($config->getPhotoAds($site['creator'], 'registration'));
    $site['media']['studio'] = array_reverse($config->getPhotoAds($site['creator'], 'studio'));
    $site['media']['artists'] = array_reverse($config->getPhotoAds($site['creator'], 'artist flyer'));
    $site['media']['promos'] = array_reverse($config->getPhotoAds($site['creator'], 'current-promo'));
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
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <style type="text/css">
        .pricing-list-info {
            list-style-type: none;
        }
        .codrops-header {
            background-position:center top;
            background-size:100% auto;
            background-image:url('<?php echo $site["media"]["photos"][2]["image"]; ?>');
        }
        .marketing-area {
            background-position:center top;
            background-size:100% auto;
            background-image:url('<?php echo $site["media"]["photos"][1]["image"]; ?>');
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
            max-width:300px;
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
                <img src="<?php echo $site['logo']; ?>" style="max-height:20vh;">
                <span><?php echo $site['name']; ?></span> Create An Account
            </h1>
        </header>

        <!-- Pricing Tables and More  -->
        <section class="pricing-section bg-8 pricing-area">
            <h2 class="pricing-section__title">Choose Your Account Type:</h2>
            <div class="pricing pricing--tashi">
                <div class="pricing__item">
                    <h3 class="pricing__title">Lite</h3>
                    <p class="pricing__sentence">Perfect for small startups that have less than 10 team members</p>
                    <div class="pricing__price"><span class="pricing__currency">$</span>6<span class="pricing__period">/ month</span></div>
                    <ul class="pricing__feature-list">
                        <li class="pricing__feature">500 GB of space</li>
                        <li class="pricing__feature">Radio + Mag App</li>
                        <li class="pricing__feature">Upload Music + Videos</li>
                    </ul>
                    <button class="pricing__action" data-type="lite" aria-label="Purchase this plan"><span class="icon icon--arrow-right"></span></button>
                </div>
                <div class="pricing__item">
                    <h3 class="pricing__title">Creator</h3>
                    <p class="pricing__sentence">Suitable for medium-sized businesses with up to 30 employees</p>
                    <div class="pricing__price"><span class="pricing__currency">$</span>10<span class="pricing__period">/ month</span></div>
                    <ul class="pricing__feature-list">
                        <li class="pricing__feature">Includes Lite Features</li>
                        <li class="pricing__feature">1TB of space (1000 GB)</li>
                        <li class="pricing__feature">Radio + Mag App</li>
                        <li class="pricing__feature">Free Entry to FL EVENTS</li>
                        <li class="pricing__feature">Post Directly FreeLabel Official Twitter</li>
                        <li class="pricing__feature">Create Promotions to Showcase full Albums or Projects.</li>
                    </ul>
                    <button class="pricing__action" data-type="creator" aria-label="Purchase this plan"><span class="icon icon--arrow-right"></span></button>
                </div>
                <div class="pricing__item">
                    <h3 class="pricing__title">Basic</h3>
                    <p class="pricing__sentence">For any large corporation with an unlimited number of members</p>
                    <div class="pricing__price"><span class="pricing__currency">$</span>59<span class="pricing__period">/ month</span></div>
                    <ul class="pricing__feature-list">
                        <li class="pricing__feature">Includes Lite + Creator Features</li>
                        <li class="pricing__feature">Unlimited space</li>
                        <li class="pricing__feature">Magazine + Radio Interviews</li>
                        <li class="pricing__feature">Full Project Streams</li>
                        <li class="pricing__feature">Paid Monthly Residuals for Radio Streams, Views, Followers, & Subscriber Royalties</li>
                        <li class="pricing__feature">Full Social Media Package</li>
                        <li class="pricing__feature">Event/Project Promotions</li>
                        <li class="pricing__feature">Event + Tour Booking</li>
                        <li class="pricing__feature">Recording, Mixing, & Mastering</li>

                    </ul>
                    <button class="pricing__action" data-type="pro" aria-label="Purchase this plan"><span class="icon icon--arrow-right"></span></button>
                </div>
                <div class="pricing__item">
                    <h3 class="pricing__title">Exclusive</h3>
                    <p class="pricing__sentence">For any large corporation with an unlimited number of members</p>
                    <div class="pricing__price"><span class="pricing__currency">$</span>200<span class="pricing__period">/ month</span></div>
                    <ul class="pricing__feature-list">
                        <li class="pricing__feature">Includes Lite + Creator Features</li>
                        <li class="pricing__feature">Unlimited space</li>
                        <li class="pricing__feature">Paid Monthly Residuals for Radio Streams, Views, Followers, & Subscriber Royalties</li>
                        <li class="pricing__feature">Full Social Media Package</li>
                        <li class="pricing__feature">Artist Management</li>
                        <li class="pricing__feature">Event/Project Promotions</li>
                        <li class="pricing__feature">Magazine Photoshoot</li>
                        <li class="pricing__feature">Event + Tour Booking</li>
                        <li class="pricing__feature">Recording, Mixing, & Mastering</li>

                    </ul>
                    <button class="pricing__action" data-type="exclusive" aria-label="Purchase this plan"><span class="icon icon--arrow-right"></span></button>
                </div>
            </div>
        </section>


        <!-- RECENT PROMOTIONS -->
        <section class="content content--related marketing-area">
            <!-- <p>Don't have the money right now? Try out our limited FREE TRIAL accounts!</p> -->
            <h1>Why Use FREELABEL?</h1>
            <?php 
                //echo $info['why'];
            ?>
            <a class="media-item" target="_blank" href="<?php echo $site['http'].'users/index/image/'.$site['media']['studio'][0]['id']; ?>">
                <img class="media-item__img" src="<?php echo $site['media']['studio'][0]['image']; ?>">
                <h3 class="media-item__title"><?php echo $site['media']['studio'][0]['title']; ?></h3>
            </a>
            <a class="media-item" target="_blank" href="<?php echo $site['http'].'users/index/image/'.$site['media']['studio'][1]['id']; ?>">
                <img class="media-item__img" src="<?php echo $site['media']['studio'][1]['image']; ?>">
                <h3 class="media-item__title"><?php echo $site['media']['studio'][1]['title']; ?></h3>
            </a>
            <a class="media-item" target="_blank" href="<?php echo $site['http'].'users/index/image/'.$site['media']['studio'][2]['id']; ?>">
                <img class="media-item__img" src="<?php echo $site['media']['studio'][2]['image']; ?>">
                <h3 class="media-item__title"><?php echo $site['media']['studio'][2]['title']; ?></h3>
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
            </a>
            <a class="media-item" target="_blank" href="<?php echo $site['http'].'users/index/image/'.$site['media']['promos'][1]['id']; ?>">
                <img class="media-item__img" src="<?php echo $site['media']['promos'][1]['image']; ?>">
                <h3 class="media-item__title"><?php echo $site['media']['promos'][1]['title']; ?></h3>
            </a>
            <a class="media-item" target="_blank" href="<?php echo $site['http'].'users/index/image/'.$site['media']['promos'][2]['id']; ?>">
                <img class="media-item__img" src="<?php echo $site['media']['promos'][2]['image']; ?>">
                <h3 class="media-item__title"><?php echo $site['media']['promos'][2]['title']; ?></h3>
            </a>
        </section>



        <!-- RECENT PROJECTS -->
        <section class="content content--related freetrial-area">
            <!-- <p>Don't have the money right now? Try out our limited FREE TRIAL accounts!</p> -->
            <p class="intro">
            <h1>How Does This Help The Artist and Music Industry?</h1>

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
        </section>



        <!-- RELATED -->
        <section class="content content--promotions freetrial-area bg-7">
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
            }
            window.location.assign('http://freelabel.net/confirm/' + package);
        });
    </script>
</body>

</html>
