<div class="container">

    <form class="form-signin">
        <h2 class="form-signin-heading">Create Your Account</h2>
        <div class="login-results"></div>
        <label for="user_name" class="sr-only">Username</label>
        <input type="text" name="user_name" id="user_name" class="form-control" placeholder="Choose Username.." required autocomplete="off" autofocus>
        <label for="user_email" class="sr-only">Email address</label>
        <input type="email" name="user_email" id="user_email" class="form-control" placeholder="Enter Email Address.." required autocomplete="off" autofocus>
        <label for="user_password" class="sr-only">Password</label>
        <input type="password" name="user_password" id="user_password" class="form-control" placeholder="Enter Password.." required autocomplete="off">
        <div class="checkbox">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Create Account</button>
    </form>

</div> <!-- /container -->



<script type="text/javascript">
$('.form-signin').submit(function(e) {
    e.preventDefault();

    elem = $(this);
    elem.find('button').addClass('disabled')
    results = $('.login-results');
    var data = $(this).serialize();
    var url = 'http://freelabel.net/lvtr/config/register.php';
    console.log(data);
    $.post(url , data, function(result){
        results.addClass('label');
        results.addClass('label-warning');
        results.html(result);
        // alert(result);
    });
    // alert(data);
});
</script>