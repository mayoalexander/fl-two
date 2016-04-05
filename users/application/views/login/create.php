<a name="register-form"></a>
<header class="jumbotron bg-inverse text-center center-vertically show-after-cta" role="banner" style='background-image:none;background-color:transparent;'>
        <div class="container">

                <form action="<?php echo URL; ?>login/register_action" method="POST" style="max-width:400px;margin:auto;" name="registerform" >

                    <h1 class="display-3">REGISTER</h1>
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
                    <input name="register" class="btn btn-success-outline btn-block" type="submit" value="Register" id="user_name">
                    <a href="<?php echo URL; ?>login/register">Register</a> | <a href="<?php echo URL; ?>login/requestpasswordreset">Forgot my Password</a>

                </form>
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

