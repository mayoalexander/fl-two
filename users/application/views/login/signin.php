<!--             
            <form action="<?php echo URL; ?>login/login" method="post" style="max-width:400px;margin:auto;">
                    <label>Username (or email)</label>
                    <input type="text" class="form-control" name="user_name" required />
                    <br>
                    <label>Password</label>
                    <input type="password" class="form-control" name="user_password" required />

                    <input type="checkbox" name="user_rememberme" class="remember-me-checkbox" />
                    <label class="remember-me-label">Remember Me</label>
                    <br><br><input type="submit" value="Login" class="btn btn-secondary-outline m-b-md btn-block" />
            </form>

            
            <a href="http://freelabel.net/users/login/register" class="btn btn-secondary-outline m-b-md btn-link btn-block" >Create New Account</a> -->

<div class="container">

    <form class="form-signin">
        <h2 class="form-signin-heading">Login</h2>
        <div class="login-results"></div>
        <label for="user_name" class="sr-only">Username</label>
        <input type="text" id="user_name" class="form-control" placeholder="Enter Username.." name="user_name" required autofocus required>
        <label for="user_password" class="sr-only">Password</label>
        <input type="password" id="user_password" class="form-control" name="user_password" placeholder="Enter Password.." required>
        <div class="checkbox">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>

</div> <!-- /container -->

<script type="text/javascript">
$('.form-signin').submit(function(e) {
    e.preventDefault();

    elem = $(this);
    elem.find('button').addClass('disabled')
    results = $('.login-results');
    var data = $(this).serialize();
    var url = 'http://freelabel.net/lvtr/config/login.php';
    $.post(url , data, function(result){
        results.addClass('label');
        results.addClass('label-warning');
        results.html(result);
        // alert('posted: ' + result);
    });
    // alert(data);
});
</script>