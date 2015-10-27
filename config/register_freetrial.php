<?php include('../landing/header.php'); ?>

<div class="modal fade bs-example-modal-sm" id='login' tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <style>
        .form-signin {
          width:100%;
        }
        #registration_form p {
        	width:48%;
        	display:inline-block;
        }
      </style>
    <script>
    function loginType(process) {
      if (process == 'subscriber_login') {
        jQuery.post('http://freelabel.net/submit/views/signin.php',{
          noheaders : 1,
          process : process
        }).done(function(data){
          jQuery("#login_panel").html(data);
        });
      }
      if (process == 'user_login') {
        jQuery.post(<?php echo "'http://freelabel.net/'"; ?> + 'submit/views/signin.php',{
          noheaders : 1,
          process : process
        }).done(function(data){
          jQuery("#login_panel").html(data);
        });
      }
    }
    </script>
    <center id='login_panel' class='panel-body' style='text-align:left;'>
      <script>loginType("subscriber_login")</script>
    <h3 style="color:#303030;">Account Type:</h3>
    <!--
    <button onclick='loginType("subscriber_login")' class="btn btn-default" >Subscriber</button>
    <button onclick='loginType("user_login")' class="btn btn-default" >Artist/Brand</button>
    -->
    </center>
    <br>
    <?php //include('submit/views/signin.php'); ?>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="freetrial" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h2 class="modal-title" id="myModalLabel">Create Your Account</h2>
        <p>We'll email you a code to verify you're legit!</p>
      </div>
      <div id='registration-status' class="modal-body" style="text-align:left;">
      <!-- errors & messages -->
        <?php

        // show negative messages
        if ($registration->errors) {
            foreach ($registration->errors as $error) {
                echo $error;    
            }
        }

        // show positive messages
        if ($registration->messages) {
            foreach ($registration->messages as $message) {
                echo $message;
            }
        }

        ?>
        <!-- errors & messages -->
        <!-- register form -->
        <form method="post" action="http:///freelabel.net/user/register.php" name="registerform">   

            <!-- the user name input field uses a HTML5 pattern check -->
            <label for="login_input_username">Username (only letters and numbers, 2 to 64 characters)</label><br>
            <input id="login_input_username" class="form-control" type="text" pattern="[a-zA-Z0-9]{2,64}" placeholder="Enter Username.." name="user_name" required />

            <!-- the email input field uses a HTML5 email type check -->
            <label for="login_input_email">User's email</label><br>
            <input id="login_input_email" class="form-control" type="email" placeholder="Enter Email.." name="user_email" required />        

            <label for="login_input_password_new">Password (min. 6 characters)</label><br>
            <input id="login_input_password_new" class="form-control" type="password" placeholder="Enter Password.." name="user_password_new" pattern=".{6,}" required autocomplete="off" />  

            <label for="login_input_password_repeat">Repeat password</label><br>
            <input id="login_input_password_repeat" class="form-control" type="password" placeholder="Enter Password Again.." name="user_password_repeat" pattern=".{6,}" required autocomplete="off" />        
            <br><input type="submit" class="btn btn-primary" name="register" value="Register" />

        </form>

        <!-- backlink --><br><br>
        <a class="btn btn-default btn-xs" href="../login">Back to Login Page</a>
        <br>

      <!--
      
        <h3>Your Basic Information</h3>
        <form id='registration_form' method="POST" action='http://freelabel.net/intro/quick_registration.php'>
        <p>Name:<input name="user_name" id='quick_register_name' type="text" class="form-control" placeholder="What's your full name? (or nick-name)" aria-describedby="basic-addon2" required></p>
          
        <p>Phone:
        	<input name="phone" id='quick_register_address' type="text" class="form-control" placeholder="What phone number do we send our text alerts to?" aria-describedby="basic-addon2" required>
        </p>
          
        <h3>Your account credentials</h3>
        <p>Email:
          <input name="email" id='quick_register_address' type="text" class="form-control" placeholder="What's your email?" aria-describedby="basic-addon2" required>
        </p>
        <p>Set a Password:
          <input name="user_password" id='quick_register_address' type="password" class="form-control" placeholder="Choose a password.." aria-describedby="basic-addon2" required>
        </p>
        <p>  
        	<label>Account type</label>
        	<select class='form-control'>
        		<option selected>Choose type..</option>
            <option selected>7 Day Trial - FREE</option>
        		<option>Subscriber - $10</option>
        		<option>Artist (basic) - $59</option>
        		<option>Artist (exclusive) - $200</option>
        		<option>Business/Brands - $2,500</option>
        	</select>
          <br><br>
        </p>
        <p>
          <input type='submit' class="btn btn-lg btn-primary" value="Create Account">
        </p>
          <br>
        </form>-->
      </div>
      <div class="modal-footer">
        <button id='close-button' type="button" onclick='/*completeRegistration()*/' class="btn btn-default" data-dismiss="modal">close</button>
        <button id='complete-account-button' onclick='confirmAccount()' type="button" class="btn btn-default" data-dismiss="modal"  style='display:none;'>Complete</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="uploadMusic" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Upload Music</h4>
      </div>
      <?php include('../submit/public_single_uploader.php'); ?>
      </div>
      <div class="modal-footer">
        <button id='close-button' type="button" onclick='/*completeRegistration()*/' class="btn btn-default" data-dismiss="modal">close</button>
        <button id='complete-account-button' onclick='confirmAccount()' type="button" class="btn btn-default" data-dismiss="modal"  style='display:none;'>Complete</button>
      </div>
    </div>
  </div>
</div>





<?php
echo '<script>
$(function(){
';
if (isset($_GET['freetrial'])) {
  echo "$('#freetrial').modal();";
}elseif (isset($_GET['login'])) {
  echo "$('#login').modal();";
}else {
  echo "$('#freetrial').modal();";
}
echo '
});
</script>'; 


include('../landing/footer.php'); ?>
