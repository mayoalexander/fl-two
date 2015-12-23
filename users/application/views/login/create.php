

<header class="jumbotron bg-inverse text-center center-vertically show-after-cta" role="banner">
  <div class="container">
    <h1 class="display-3">CREATE ACCOUNT</h1>



    <h2 class="m-b-lg"><?php echo $site['description']; ?> <a href="" class="jumbolink">Join now</a>.</h2>
    <!-- <a href="<?php echo $this->facebook_login_url; ?>" class="btn btn-secondary-outline m-b-md btn-facebook facebook-login-button"><i class="fa fa-facebook" ></i> Signin with Facebook</a> -->
    <a href="<?php echo $this->facebook_register_url; ?>" class="btn btn-secondary-outline m-b-md btn-facebook facebook-login-button"><i class="fa fa-facebook" ></i> Register with Facebook</a>
    <a class="btn btn-secondary-outline m-b-md" href="<?php echo $site['http']; ?>users/login#" role="button"><span class="icon-sketch"></span>Already Registered? Login Here</a>
    <ul class="list-inline social-share">
      <li><a class="nav-link" href="http://twitter.com/<?php echo $site['twitter']; ?>#"><span class="icon-twitter"></span> <?php echo $site['landing-info']['twitter']; ?></a></li>
      <!-- <li><a class="nav-link" href="https://www.facebook.com/theAMRecords/#"><span class="icon-facebook"></span> <?php echo $site['landing-info']['facebook']; ?></a></li> -->
      <!-- <li><a class="nav-link" href="#"><span class="icon-linkedin"></span> <?php //echo $site['landing-info']['twitter']; ?></a></li> -->
    </ul>
  </div>
</header>


<a name="register-form"></a>
<header class="jumbotron bg-inverse text-center center-vertically show-after-cta" role="banner" style='background-image:none;'>
        <link rel="stylesheet" type="text/css" href="http://freelabel.net/landing/view/inputs/css/normalize.css" />
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.2.0/css/font-awesome.min.css" />
        <!-- <link rel="stylesheet" type="text/css" href="http://freelabel.net/landing/view/inputs/css/demo.css" /> -->
        <link rel="stylesheet" type="text/css" href="http://freelabel.net/landing/view/inputs/css/set1.css" />
        <div class="container">
            <section class="">
                <form action="<?php echo URL; ?>login/register_action" method="POST" style="max-width:400px;margin:auto;" name="registerform" >

                    <h1>Register</h1>
                    <?php $this->renderFeedbackMessages(); ?>

                    <?php
                        $params[] = array('name'=>'user_name', 'id'=>'user_name','label'=>'Choose Username..');
                        $params[] = array('name'=>'user_email', 'id'=>'user_email','label'=>'Enter Email..');
                        $params[] = array('name'=>'user_password_new', 'id'=>'user_password_new','label'=>'Choose Password..','type'=>'password');
                        $params[] = array('name'=>'user_password_repeat', 'id'=>'user_password_repeat','label'=>'Retype Password','type'=>'password');
                        echo $config->build_input($params); ?>

                    <!-- show the captcha by calling the login/showCaptcha-method in the src attribute of the img tag -->
                    <!-- to avoid weird with-slash-without-slash issues: simply always use the URL constant here -->
                    <br>
                    <img id="captcha" src="<?php echo URL; ?>login/showCaptcha" />
                    <span style="display: block; font-size: 11px; color: #999; margin-bottom: 10px">
                        <!-- quick & dirty captcha reloader -->
                        <a href="#" onclick="document.getElementById('captcha').src = '<?php echo URL; ?>login/showCaptcha?' + Math.random(); return false">[ Reload Captcha ]</a>
                    </span>
                    <?php
                        $params_1[] = array('name'=>'captcha', 'id'=>'captcha','label'=>'Enter Captcha..');
                        echo $config->build_input($params_1);
                    ?>
                    <span class="input input--akira">
                      <input name="register" class="input__field input__field--akira" type="submit" value="Register" id="user_name">
                      <label class="input__label input__label--akira" for="input-22">
                          <span class="input__label-content input__label-content--akira"></span>
                      </label>
                    </span>

                    <a href="<?php echo URL; ?>login/register">Register</a> | <a href="<?php echo URL; ?>login/requestpasswordreset">Forgot my Password</a>

                </form>
            </section>
        </div><!-- /container -->
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

