<style type="text/css">
    
    .register-panel {
        width: 50%;
        display: inline-block;
        margin-left:-1; 
    }
    .registration-form {
        max-width:800px;
        margin:auto;
        text-align: center;
    }
    #captcha {
        max-width:1000px;
    }
    .registration-form {
        max-width: 350px;
        padding-top: 5%;
    }
    .facebook-login-button {
        font-size:0.75em;
    }

    @media (max-width: 600px) {
/*      .registration-form {
        display: none;
      }*/
    }
</style>

<header class="page-header">

</header>



    <div class="container">
      <form action="<?php echo URL; ?>login/register_action" method="POST" class="registration-form" name="registerform" >

        <h2 class="form-signin-heading">Please Create Your Login</h2>
        <?php $this->renderFeedbackMessages(); ?>

        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="text" id="user_name" name="user_name" class="form-control" placeholder="Choose Username.." required autofocus>
        <input type="text" id="user_email" name="user_email" class="form-control" placeholder="Choose Email.." required autofocus>
        <input type="password" id="user_password_new" name="user_password_new" class="form-control" placeholder="Choose Password.." required autofocus>
        <input type="password" id="user_password_repeat" name="user_password_repeat" class="form-control" placeholder="Repeat Password.." required autofocus>


        <input type="text" id="captcha" name="captcha" class="form-control" placeholder="Enter Captcha Below.." required autofocus>
        <br>

        <img id="captcha" src="<?php echo URL; ?>login/showCaptcha" />
        <span style="display: block; font-size: 11px; color: #999; margin-bottom: 10px">
            <!-- quick & dirty captcha reloader -->
            <a href="#" onclick="document.getElementById('captcha').src = '<?php echo URL; ?>login/showCaptcha?' + Math.random(); return false">[ Reload Captcha ]</a>
        </span>


        <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
        <hr>
        <a href="<?php echo $this->facebook_register_url; ?>" class="label btn-secondary-outline m-b-md btn-facebook facebook-login-button"><i class="fa fa-facebook" ></i> Register with Facebook</a>
      </form>

    </div> <!-- /container -->







<a name="register-form"></a>
<header class="jumbotron bg-inverse text-center center-vertically show-after-cta" role="banner" style='background-image:none;background-color:transparent;display: none;'>
        <link rel="stylesheet" type="text/css" href="http://freelabel.net/landing/view/inputs/css/normalize.css" />
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.2.0/css/font-awesome.min.css" />
        <!-- <link rel="stylesheet" type="text/css" href="http://freelabel.net/landing/view/inputs/css/demo.css" /> -->
        <link rel="stylesheet" type="text/css" href="http://freelabel.net/landing/view/inputs/css/set1.css" />
        <div class="container">
            <section class="">
                <form action="<?php echo URL; ?>login/register_action" method="POST" class="registration-form" name="registerform" >

                    <h1>Register</h1>
                    <?php $this->renderFeedbackMessages(); ?>
                    <div class="row">
                    <panel class="col-md-6 col-xs-12 register-panel">
                    <?php
                            $params[] = array('name'=>'user_name', 'id'=>'user_name','label'=>'Choose Username..');
                            $params[] = array('name'=>'user_email', 'id'=>'user_email','label'=>'Enter Email..');
                            echo $config->build_input($params); 
                            $params = '';

                        ?>
                    </panel>
                    <panel class="col-md-6 col-xs-12 register-panel">
                    <?php
                        $params[] = array('name'=>'user_password_new', 'id'=>'user_password_new','label'=>'Choose Password..','type'=>'password');
                        $params[] = array('name'=>'user_password_repeat', 'id'=>'user_password_repeat','label'=>'Retype Password','type'=>'password');
                        echo $config->build_input($params); 
                    ?>
                    </panel>
                    </div>
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

                    <!-- <a href="<?php echo URL; ?>login/register">Register</a> | <a href="<?php echo URL; ?>login/requestpasswordreset">Forgot my Password</a> -->

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

