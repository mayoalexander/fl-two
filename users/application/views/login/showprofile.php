<div class="content edit-profile" style="text-align:center;">
    <h1>Your profile</h1>
    <!-- echo out the system feedback (error and success messages) -->
    <?php $this->renderFeedbackMessages(); ?>

    <div>
        Your avatar image:
        <?php // if usage of gravatar is activated show gravatar image, else show local avatar ?>
        <?php if (USE_GRAVATAR) { ?>
            Your gravatar pic (on gravatar.com): <img src='<?php echo Session::get('user_gravatar_image_url'); ?>' />
        <?php } else { ?>
            Your avatar pic (saved on local server): <img src='<?php echo Session::get('user_avatar_file'); ?>' />
        <?php } ?>
    <a class="edit-profile-button" href='http://freelabel.net/users/login/uploadavatar_content'><i class="fa fa-pencil " ></i> edit</a>
    </div>

    <div>
        Your username: <?php echo Session::get('user_name'); ?>
        <a class="edit-profile-button" href='http://freelabel.net/users/login/editusername'><i class="fa fa-pencil " ></i> edit</a>        
    </div>
    <div>
        Your email: <?php echo Session::get('user_email'); ?>
        <a class="edit-profile-button" href='http://freelabel.net/users/login/edituseremail'><i class="fa fa-pencil " ></i> edit</a>
    </div>


    <div>
        Your account type is: <?php echo Session::get('user_account_type'); ?>
    </div>
</div>

<script type="text/javascript">
    $(function(){
        $('.edit-profile-button').click(function(event){
            event.preventDefault();
            var path = $(this).attr('href');
            $.get(path,function(data){
                $('.edit-profile').html(data);
            });
        });
    });
</script>