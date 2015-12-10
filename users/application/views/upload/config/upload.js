var userNameSession = <?php echo "'".$_SESSION['user_name']."'"; ?>;
    function grabFiles(link , i , type, filename) {
        //alert(i);
        if (type.toLowerCase().indexOf("jpg") >= 0 || type.toLowerCase().indexOf("jpeg") >= 0 || type.toLowerCase().indexOf("png") >= 0 || type.toLowerCase().indexOf("video/mp4") >= 0) {
            var path = 'http://freelabel.net/submit/views/db/user_photos.php';
            $.post(path , {
                submit : 1,
                location : "none",
                user_name : <?php echo '"'.$user_name_session.'",' ?>
                title: filename,
                desc : "photo upload", 
                id : <?php echo '"'.$user_name_session.'",' ?>
                filepath : link

                /*
                user_trackname : '',
                user_twitter : <?php echo '"'.$profile_twitter.'",' ?>
                twitpic : <?php echo '"'.$twitpic.'",' ?>
                user_name : <?php echo '"'.$user_name_session.'",' ?>
                user_email : <?php echo '"'.$user_email.'",' ?>
                user_phone : <?php echo '"'.$profile_phone.'",' ?>
                onsale : <?php echo '"'.$onsale_status.'",' ?>
                photo : <?php echo '"'.$photo.'",' ?>
                redirect_source : "mixtape",
                audiofile : link
                */
            }).done(function(data){
                //alert($(this));
                //console.log($(this.form));
                $('#form_'+i).html(data);
                $('#addToProfile_'+i).fadeOut(000);
                setTimeout(function(){
                    $('#panel_'+i).fadeOut(2000);
                },2000);
                scrollToAnchor('confirm_upload');
            });
            //alert('Our photo uploader is under construction! Please check back later! Sorry for the inconvenience.');
        } else {
            //alert('its an ' + type);
            var path = 'http://freelabel.net/config/confirm_upload.php';
            $.post(path , {
                user_trackname : '',
                user_twitter : <?php echo '"'.$profile_twitter.'",' ?>
                twitpic : <?php echo '"'.$twitpic.'",' ?>
                user_name : <?php echo '"'.$user_name_session.'",' ?>
                user_email : <?php echo '"'.$user_email.'",' ?>
                user_phone : <?php echo '"'.$profile_phone.'",' ?>
                onsale : <?php echo '"'.$onsale_status.'",' ?>
                photo : <?php echo '"'.$photo.'",' ?>
                redirect_source : "fl_drive",
                blogentry : "",
                audiofile : link
            }).done(function(data){
                $('#form_'+i).html(data);
                scrollToAnchor('confirm_upload');

            });
            //alert("THIS: " +link+ $( this ).text() );
        }
    }