<div class="content">
    <h1>Verification</h1>

    <!-- echo out the system feedback (error and success messages) -->
    <?php $this->renderFeedbackMessages(); ?>

</div>

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
    }
    .facebook-login-button {
        font-size:0.75em;
    }

    @media (max-width: 600px) {
      .registration-form {
        display: none;
      }
    }
</style>

<header class="page-header">

</header>



    <div class="container">
      <form action="<?php echo URL; ?>login/register_action" method="POST" class="registration-form" name="registerform" >

        <h2 class="form-signin-heading">Please sign in</h2>
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




