<header class="jumbotron bg-inverse text-center center-vertically show-after-cta" role="banner" style='background-image:none;background-color:transparent;'>
    <div class="container">


        <h1 class="display-3">SIGN-IN</h1>
           <?php $this->renderFeedbackMessages(); ?>
            <form action="<?php echo URL; ?>login/login" method="POST" style="max-width:400px;margin:auto;">

                <!-- <h1>Login</h1> -->

                <?php
                $params[] = array('name'=>'user_name', 'id'=>'user_name','label'=>'Enter Username..');
                $params[] = array('name'=>'user_password', 'id'=>'user_password','label'=>'Enter Password..','type'=>'password');
                // $params[] = array('name'=>'user_password', 'id'=>'user_password','label'=>'Login');
                echo $config->build_input($params); ?>



                <input name="submit" class="btn btn-success-outline btn-block login-button" type="submit" value="Login">
                <div class='remember-me-wrapper'>
                    <input type="checkbox" name="user_rememberme" class="remember-me-checkbox" />
                    <label class="remember-me-label">Keep Me Logged-in</label>
                </div>
                <hr>
                <a href="<?php echo URL; ?>login/register">Register</a> | <a href="<?php echo URL; ?>login/requestpasswordreset">Forgot my Password</a>

            </form>
            <!-- <hr><br>or signin with..<br><br> -->
        <!-- <a href="<?php echo $this->facebook_login_url; ?>" class="btn btn-secondary-outline m-b-md btn-facebook facebook-login-button"><i class="fa fa-facebook" ></i></a> -->
    </div>
</header>