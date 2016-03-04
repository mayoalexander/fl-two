            
            <form action="<?php echo URL; ?>login/login" method="post" style="max-width:400px;margin:auto;">
                    <label>Username (or email)</label>
                    <input type="text" class="form-control" name="user_name" required />
                    <br>
                    <label>Password</label>
                    <input type="password" class="form-control" name="user_password" required />

                    <input type="checkbox" name="user_rememberme" class="remember-me-checkbox" />
                    <label class="remember-me-label">Keep me logged in (for 2 weeks)</label>
                    <br><br><input type="submit" value="Login" class="btn btn-secondary-outline m-b-md btn-block" />
            </form>
            <a href='<?php echo $this->facebook_login_url; ?>' class="btn btn-secondary-outline m-b-md btn-block"><i class="fa fa-facebook"></i> Signin with Facebook</a>
            
            <a href="http://freelabel.net/users/login/register" class="btn btn-secondary-outline m-b-md btn-block" >Create New Account</a>