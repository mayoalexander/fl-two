<header class="jumbotron bg-inverse text-center center-vertically show-after-cta" role="banner" style='background-image:none;background-color:transparent;'>

        <!-- <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.2.0/css/font-awesome.min.css" /> -->
        <!-- <link rel="stylesheet" type="text/css" href="http://freelabel.net/landing/view/inputs/css/demo.css" /> -->
        <!-- <link rel="stylesheet" type="text/css" href="http://freelabel.net/landing/view/inputs/css/set1.css" /> -->

        <h1 class="display-3">SIGN-IN</h1>
        <h2 class="m-b-lg">
           <!-- <a href="" class="jumbolink">Register Now</a> -->
           <?php $this->renderFeedbackMessages(); ?>

        </h2>

            <section class="">
                <form action="<?php echo URL; ?>login/login" method="POST" style="max-width:400px;margin:auto;">

                <!-- <h1>Login</h1> -->
                <small><?php $this->renderFeedbackMessages(); ?></small>

                <?php
                $params[] = array('name'=>'user_name', 'id'=>'user_name','label'=>'Enter Username..');
                $params[] = array('name'=>'user_password', 'id'=>'user_password','label'=>'Enter Password..','type'=>'password');
                // $params[] = array('name'=>'user_password', 'id'=>'user_password','label'=>'Login');
                echo $config->build_input($params); ?>

                <input type="checkbox" name="user_rememberme" class="remember-me-checkbox" />
                <label class="remember-me-label">Keep Me Logged-in</label>

                <span class="input input--akira">
                  <input name="submit" class="input__field input__field--akira" type="submit" value="Login" id="user_name">
                  <label class="input__label input__label--akira" for="input-22">
                      <span class="input__label-content input__label-content--akira"></span>
                  </label>
                </span>

                <a href="<?php echo URL; ?>login/register">Register</a> | <a href="<?php echo URL; ?>login/requestpasswordreset">Forgot my Password</a>

                </form>
                <?php //if (FACEBOOK_LOGIN == true) { ?>
                <!-- <div class="login-facebook-box">
                <h1>or</h1>
                <a href="<?php // echo $this->facebook_login_url; ?>" class="btn btn-facebook facebook-login-button">Signin with Facebook</a>
                </div> -->
                <?php //} ?>
            </section>

            <br>or<br><br>
        <a href="<?php echo $this->facebook_login_url; ?>" class="btn btn-secondary-outline m-b-md btn-facebook facebook-login-button"><i class="fa fa-facebook" ></i> Signin with Facebook</a>

        <script src="http://freelabel.net/landing/view/inputs/js/classie.js"></script>
        <script>
            (function() {
                // trim polyfill : https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String/Trim
                if (!String.prototype.trim) {
                    (function() {
                        // Make sure we trim BOM and NBSP
                        var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
                        String.prototype.trim = function() {
                            return this.replace(rtrim, '');
                        };
                    })();
                }

                [].slice.call( document.querySelectorAll( 'input.input__field' ) ).forEach( function( inputEl ) {
                    // in case the input is already filled..
                    if( inputEl.value.trim() !== '' ) {
                        classie.add( inputEl.parentNode, 'input--filled' );
                    }

                    // events:
                    inputEl.addEventListener( 'focus', onInputFocus );
                    inputEl.addEventListener( 'blur', onInputBlur );
                } );

                function onInputFocus( ev ) {
                    classie.add( ev.target.parentNode, 'input--filled' );
                }

                function onInputBlur( ev ) {
                    if( ev.target.value.trim() === '' ) {
                        classie.remove( ev.target.parentNode, 'input--filled' );
                    }
                }
            })();
        </script>
</header>

<header class="jumbotron bg-inverse text-center center-vertically" role="banner" style='display:none;'>
      <div class="container">
      <!-- echo out the system feedback (error and success messages) -->

        <div class="login-default-box">
            <h1>Login</h1>
            <form action="<?php echo URL; ?>login/login" method="post" style="max-width:400px;margin:auto;">
                    <label>Username (or email)</label>
                    <input type="text" class="form-control" name="user_name" required />
                    <br>
                    <label>Password</label>
                    <input type="password" class="form-control" name="user_password" required />

                    <input type="checkbox" name="user_rememberme" class="remember-me-checkbox" />
                    <label class="remember-me-label">Keep me logged in (for 2 weeks)</label>
                    <br><br><input type="submit" class="btn btn-secondary-outline m-b-md" />
            </form>

            <form>
                <span class="input input--chisato">
                    <input class="input__field input__field--chisato" type="text" id="input-13">
                    <label class="input__label input__label--chisato" for="input-13">
                        <span class="input__label-content input__label-content--chisato" data-content="First Name">First Name</span>
                    </label>
                </span>
            </form>


        </div>




        <!--
        <h1 class="display-3"><?php echo $site['name']; ?></h1>
        <h2 class="m-b-lg"><?php echo $site['description']; ?> <a href="" class="jumbolink">Join now</a>.</h2>
        <a class="btn btn-secondary-outline m-b-md" href="<?php echo $site['http']; ?>register#" role="button"><span class="icon-sketch"></span>Get Started</a>
        <ul class="list-inline social-share">
          <li><a class="nav-link" href="http://twitter.com/<?php echo $site['twitter']; ?>#"><span class="icon-twitter"></span> <?php echo $site['landing-info']['twitter']; ?></a></li>
          <li><a class="nav-link" href="https://www.facebook.com/theAMRecords/#"><span class="icon-facebook"></span> <?php echo $site['landing-info']['facebook']; ?></a></li>
          <!-- <li><a class="nav-link" href="#"><span class="icon-linkedin"></span> <?php //echo $site['landing-info']['twitter']; ?></a></li> -->
        <!--</ul> -->
      </div>
</header>
