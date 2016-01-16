<style>
.input__label--akira::before, .jumbotron {
    /*background-color:#2f3238;*/
    background:#101010;
 }
 .show-after-cta {
    display:none;
 }

</style>

    <!-- video  -->
    <section class="section-video bg-inverse text-center wp wp-4">
      <h3 class="sr-only"><?php echo $site['landing-info']['video']; ?></h3>
      <video id="demo_video" class="video-js vjs-default-skin vjs-big-play-centered" controls autoplay="0" loop=1 
      poster="http://freelabel.net/upload/server/php/files/thumbnail/header.jpg" data-setup='{}'>
        <source src="<?php echo $site['landing-info']['video'][2]; ?>" type='video/mp4'>
        <source src="<?php echo $site['landing-info']['video'][2]; ?>" type='video/webm'>
      </video>
    </section>



    <a name="about"></a>
    <section class="section-intro bg-faded text-center">
      <div class="container">
        <h3 class="wp wp-1"><?php echo $site['landing-info'][0]; ?></h3>
        <p class="lead wp wp-2"><?php echo $site['landing-info'][1]; ?></p>
        <img src="http://upload.freelabel.net/server/php/files/chrisrezepromo.png" alt="iPad mock" class="img-responsive wp wp-3">
      </div>
    </section>
    <section class="section-features text-center">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <div class="card">
              <div class="card-block">
                <span class="icon-pen display-1"></span>
                <h4 class="card-title"><?php echo $site['landing-info'][3]; ?></h4>
                <h6 class="card-subtitle text-muted"><?php echo $site['landing-info'][4]; ?></h6>
                <p class="card-text"><?php echo $site['landing-info'][5]; ?></p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="card-block">
                <span class="icon-thunderbolt display-1"></span>
                <h4 class="card-title"><?php echo $site['landing-info'][6]; ?></h4>
                <h6 class="card-subtitle text-muted"><?php echo $site['landing-info'][7]; ?></h6>
                <p class="card-text"><?php echo $site['landing-info'][8]; ?></p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card m-b-0">
              <div class="card-block">
                <span class="icon-heart display-1"></span>
                <h4 class="card-title"><?php echo $site['landing-info'][9]; ?></h4>
                <h6 class="card-subtitle text-muted"><?php echo $site['landing-info'][10]; ?></h6>
                <p class="card-text"><?php echo $site['landing-info'][11]; ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <section class="section-testimonials text-center bg-inverse" style="display:none;">
      <div class="container">
        <h3 class="sr-only">Testimonials</h3>
        <div id="carousel-testimonials" class="carousel slide" data-ride="carousel" data-interval="0">
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <blockquote class="blockquote">
                <img src="http://freelabel.net/landio/img/face1.jpg" height="80" width="80" alt="Avatar" class="img-circle">
                <p class="h3"><?php echo $site['landing-info'][16]; ?></p>
                <footer>Dmitry Fadeyev</footer>
              </blockquote>
            </div>
            <div class="carousel-item">
              <blockquote class="blockquote">
                <img src="http://freelabel.net/landio/img/face2.jpg" height="80" width="80" alt="Avatar" class="img-circle">
                <p class="h3"><?php echo $site['landing-info'][17]; ?></p>
                <footer>David Carson</footer>
              </blockquote>
            </div>
            <div class="carousel-item">
              <blockquote class="blockquote">
                <img src="http://freelabel.net/landio/img/face3.jpg" height="80" width="80" alt="Avatar" class="img-circle">
                <p class="h3"><?php echo $site['landing-info'][18]; ?></p>
                <footer>Frank Chimero</footer>
              </blockquote>
            </div>
            <div class="carousel-item">
              <blockquote class="blockquote">
                <img src="http://freelabel.net/landio/img/face4.jpg" height="80" width="80" alt="Avatar" class="img-circle">
                <p class="h3"><?php echo $site['landing-info'][19]; ?></p>
                <footer>Joel Fisher</footer>
              </blockquote>
            </div>
            <div class="carousel-item">
              <blockquote class="blockquote">
                <img src="http://freelabel.net/landio/img/face5.jpg" height="80" width="80" alt="Avatar" class="img-circle">
                <p class="h3"><?php echo $site['landing-info'][20]; ?></p>
                <footer>E.H. Gombrich</footer>
              </blockquote>
            </div>
          </div>
          <ol class="carousel-indicators">
            <li class="active"><img src="http://freelabel.net/landio/img/face1.jpg" alt="Navigation avatar" data-target="#carousel-testimonials" data-slide-to="0" class="img-responsive img-circle"></li>
            <li><img src="http://freelabel.net/landio/img/face2.jpg" alt="Navigation avatar" data-target="#carousel-testimonials" data-slide-to="1" class="img-responsive img-circle"></li>
            <li><img src="http://freelabel.net/landio/img/face3.jpg" alt="Navigation avatar" data-target="#carousel-testimonials" data-slide-to="2" class="img-responsive img-circle"></li>
            <li><img src="http://freelabel.net/landio/img/face4.jpg" alt="Navigation avatar" data-target="#carousel-testimonials" data-slide-to="3" class="img-responsive img-circle"></li>
            <li><img src="http://freelabel.net/landio/img/face5.jpg" alt="Navigation avatar" data-target="#carousel-testimonials" data-slide-to="4" class="img-responsive img-circle"></li>
          </ol>
        </div>
      </div>
    </section>
    <section class="section-text">
      <div class="container">
        <h3 class="text-center"><?php echo $site['landing-info'][22]; ?></h3>
        <div class="row p-y-lg">
          <div class="col-md-5">
            <p class="wp wp-7"><?php echo $site['landing-info'][22]; ?></p>
          </div>
          <div class="col-md-5 col-md-offset-2 separator-x">
            <p class="wp wp-8"><?php echo $site['landing-info'][23]; ?></p>
          </div>
        </div>
      </div>
    </section>
    <section class="section-news">
      <div class="container">
        <h3 class="sr-only">News</h3>
        <div class="bg-inverse">
          <div class="row">
            <div class="col-md-6 p-r-0">
              <figure class="has-light-mask m-b-0 image-effect">
                <img src="<?php echo $site['media']['photos']['front-page'][0]['image']; ?>" alt="Article thumbnail" class="img-responsive">
              </figure>
            </div>
            <div class="col-md-6 p-l-0">
              <article class="center-block">
                <span class="label label-info">Featured article</span>
                <br>
                <h5><a href="#"><?php echo $site['media']['photos']['front-page'][0]['title']; ?> <span class="icon-arrow-right"></span></a></h5>
                <p class="m-b-0">
                  <a href="#"><span class="label label-default text-uppercase"><span class="icon-tag"></span> <?php echo $site['media']['photos']['front-page'][0]['caption']; ?></span></a>
                  <a href="#"><span class="label label-default text-uppercase"><span class="icon-time"></span> 1 Hour Ago</span></a>
                </p>
              </article>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-md-push-6 p-l-0">
              <figure class="has-light-mask m-b-0 image-effect">
                <img src="<?php echo $site['media']['photos']['front-page'][1]['image']; ?>" alt="Article thumbnail" class="img-responsive">
              </figure>
            </div>
            <div class="col-md-6 col-md-pull-6 p-r-0">
              <article class="center-block">
                <span class="label label-info">Featured article</span>
                <br>
                <h5><a href="#"><?php echo $site['media']['photos']['front-page'][1]['title']; ?> <span class="icon-arrow-right"></span></a></h5>
                <p class="m-b-0">
                  <a href="#"><span class="label label-default text-uppercase"><span class="icon-tag"></span> <?php echo $site['media']['photos']['front-page'][1]['caption']; ?></span></a>
                  <a href="#"><span class="label label-default text-uppercase"><span class="icon-time"></span> 1 Hour Ago</span></a>
                </p>
              </article>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="section-signup bg-faded" style="display:none;">
      <div class="container">
        <h3 class="text-center m-b-lg">Sign up to receive free updates as soon as they hit!</h3>
        <form>
          <div class="row">
            <div class="col-md-6 col-xl-3">
              <div class="form-group has-icon-left form-control-name">
                <label class="sr-only" for="inputName">Your name</label>
                <input type="text" class="form-control form-control-lg" id="inputName" placeholder="Your name">
              </div>
            </div>
            <div class="col-md-6 col-xl-3">
              <div class="form-group has-icon-left form-control-email">
                <label class="sr-only" for="inputEmail">Email address</label>
                <input type="email" class="form-control form-control-lg" id="inputEmail" placeholder="Email address" autocomplete="off">
              </div>
            </div>
            <div class="col-md-6 col-xl-3">
              <div class="form-group has-icon-left form-control-password">
                <label class="sr-only" for="inputPassword">Enter a password</label>
                <input type="password" class="form-control form-control-lg" id="inputPassword" placeholder="Enter a password" autocomplete="off">
              </div>
            </div>
            <div class="col-md-6 col-xl-3">
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Sign up for free!</button>
              </div>
            </div>
          </div>
          <label class="c-input c-checkbox">
            <input type="checkbox" checked>
            <span class="c-indicator"></span> I agree to <?php echo $site['name']; ?>’s <a href="#">terms of service</a>
          </label>
        </form>
      </div>
    </section>






    <!-- pricing  -->
    <section class="section-pricing bg-faded text-center">
      <div class="container">
        <h3><?php echo $site['landing-info'][12]; ?></h3>
        <div class="row p-y-lg">
          <div class="col-md-6 p-t-md wp wp-5">
            <div class="card pricing-box">
              <div class="card-header text-uppercase dark-bg" style="color:#101010;">
                Personal
              </div>
              <div class="card-block">
                <p class="card-title"><?php echo $site['landing-info'][13]; ?></p>
                <h4 class="card-text">
                  <sup class="pricing-box-currency">$</sup>
                  <span class="pricing-box-price">5.99</span>
                  <small class="text-muted text-uppercase">/month</small>
                </h4>
              </div>
              <ul class="list-group list-group-flush p-x">
                <li class="list-group-item">Collect Music</li>
                <li class="list-group-item">Connect Social Networks to your FEED</li>
              </ul>
              <a href="http://freelabel.net/confirm/lite" class="btn btn-primary-outline cta-button-trigger">Start FREETRIAL</a>
            </div>
          </div>
          <div class="col-md-6 stacking-top">
            <div class="card pricing-box pricing-best p-x-0">
              <div class="card-header text-uppercase">
                Professional
              </div>
              <div class="card-block">
                <p class="card-title"><?php echo $site['landing-info'][14]; ?></p>
                <h4 class="card-text">
                  <sup class="pricing-box-currency">$</sup>
                  <span class="pricing-box-price">10.80</span>
                  <small class="text-muted text-uppercase">/month</small>
                </h4>
              </div>
              <ul class="list-group list-group-flush p-x">

                <li class="list-group-item">Upload & Save Music, Videos, & Photos</li>
                <li class="list-group-item">Exclusive Radio/Mag/TV Placements</li>
                <li class="list-group-item">Featured Singles/Project Releases</li>
                <li class="list-group-item">Flyer Design</li>
              </ul>
              <a href="http://freelabel.net/confirm/sub" class="btn btn-primary cta-button-trigger">Start FREETRIAL</a>
            </div>
          </div>
<!--           <div class="col-md-4 p-t-md wp wp-6">
            <div class="card pricing-box">
              <div class="card-header text-uppercase">
                Enterprise
              </div>
              <div class="card-block">
                <p class="card-title"><?php echo $site['landing-info'][15]; ?></p>
                <h4 class="card-text">
                  <sup class="pricing-box-currency">$</sup>
                  <span class="pricing-box-price">260</span>
                  <small class="text-muted text-uppercase">/month</small>
                </h4>
              </div>
              <ul class="list-group list-group-flush p-x">
                <li class="list-group-item">Live Radio Interviews</li>
                <li class="list-group-item">Audio Mix + Mastering</li>
                <li class="list-group-item">Flyer/Video Production</li>
                <li class="list-group-item">Website Design</li>
                <li class="list-group-item">Product Distribution</li>
                <li class="list-group-item">Monlthy Paid Royalties</li>
              </ul>
              <a href="http://freelabel.net/confirm/exclusive" class="btn btn-primary-outline">Get Started</a>
            </div>
          </div> -->
        </div>
      </div>
    </section>

















<div class="content" style="display:none;">
    <h1>Index</h1>

    <!-- echo out the system feedback (error and success messages) -->
    <?php $this->renderFeedbackMessages(); ?>

    <p>
        This box (everything between header and footer) is the content of views/index/index.php,
        so it's the index/index view.
        <br/>
        It's rendered by the index-method within the index-controller (in controllers/index.php).
    </p>
    <h3>General information on this little framework</h3>
    <p>
        "C'mon! Framework #1000 ? Why do we need this ?" Indeed, there are a lot of good
        (and a lot of bad, too) PHP frameworks on the web. But most of them have something in common:
        They don't have a proper login system. And even if they have, then it's using outdated
        password hashing/salting technologies, it's not future-proof, don't provide email verification,
        password reset etc.
        <br/><br/>
        This framework tries to
        <span style='font-weight: bold;'>focus on a proper, secure and up-to-date login system</span>,
        combined with an easy-to-use, easy-to-understand and highly usable framework structure.
        So, if you don't like the framework itself, feel free to merge the login-related actions,
        models and views into the framework of your choice.
    </p>
</div>














<header class="jumbotron bg-inverse text-center center-vertically" role="banner" style="padding-top:20vh;padding-bottom:20vh;display:none;">
  <div class="container">


    <!-- echo out the system feedback (error and success messages) -->
    <small><?php $this->renderFeedbackMessages(); ?></small>

    <div class="register-default-box">
        <h1>Register</h1>
        <!-- register form -->
        <form method="post" action="<?php echo URL; ?>login/register_action" name="registerform" style="max-width:400px;margin:auto;display:block;">
            <!-- the user name input field uses a HTML5 pattern check -->
            <label for="login_input_username">
                Username
                <span style="display: block; font-size: 14px; color: #999;">(only letters and numbers, 2 to 64 characters)</span>
            </label>
            <input class="form-control" id="login_input_username" class="login_input" type="text" pattern="[a-zA-Z0-9]{2,64}" name="user_name" required />
            <!-- the email input field uses a HTML5 email type check -->
            <label for="login_input_email">
                User's email
                <span style="display:block;font-size:14px;color:#999;">
                    (please provide a <span style="text-decoration: underline; color: mediumvioletred;">real email address</span>,
                    you'll get a verification mail with an activation link)
                </span>
            </label>
            <input class="form-control" id="login_input_email" class="login_input" type="email" name="user_email" required />
            <label for="login_input_password_new">
                Password (min. 6 characters!
                <span class="login-form-password-pattern-reminder">
                    Please note: using a long sentence as a password is much much safer then something like "!c00lPa$$w0rd").
                    Have a look on
                    <a href="http://security.stackexchange.com/questions/6095/xkcd-936-short-complex-password-or-long-dictionary-passphrase">
                        this interesting security.stackoverflow.com thread
                    </a>.
                </span>
            </label>
            <!-- show the captcha by calling the login/showCaptcha-method in the src attribute of the img tag -->
                    <!-- to avoid weird with-slash-without-slash issues: simply always use the URL constant here -->
                    <br>
                    <img id="captcha" src="<?php echo URL; ?>login/showCaptcha" />
                    <span style="display: block; font-size: 11px; color: #999; margin-bottom: 10px">
                        <!-- quick & dirty captcha reloader -->
                        <a href="#" onclick="document.getElementById('captcha').src = '<?php echo URL; ?>login/showCaptcha?' + Math.random(); return false">[ Reload Captcha ]</a>
                    </span>
            <input class="form-control" id="login_input_password_new" class="login_input" type="password" name="user_password_new" pattern=".{6,}" required autocomplete="off" />
            <label for="login_input_password_repeat">Repeat password</label>
            <input class="form-control" id="login_input_password_repeat" class="login_input" type="password" name="user_password_repeat" pattern=".{6,}" required autocomplete="off" />

            <input class="form-control" type="submit"  name="register" value="Register" />

        </form>
    </div>





</div>



</header>

<script type="text/javascript">
    $(function(){
        function scrollTo(hash) {
            location.hash = "#" + hash;
        }
        // $('.cta-button-trigger').click(function(event){
        //     event.preventDefault();
        //     alert($(this));
        //     $('.show-after-cta').show('slow');
        //     scrollTo('register-form');
        //     // $(this).parent().hide();
        // });
    });
</script>
