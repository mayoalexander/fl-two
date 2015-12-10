<?php
$page_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if (strpos($page_url, 'upload.freelabel.net/')) {
    //echo $page_url . ' ' .'http://upload.freelabel.net/';
    $ending = str_replace('upload/', '', $_SERVER[REQUEST_URI]);
    header("Location: http://freelabel.net/upload".$ending);
}
//session_start();
$page_title = 'Drive';
include('../config/index.php');
include(ROOT.'config/globalvars.php');
include(ROOT.'submit/views/db/index.php');
//include(ROOT.'new_header.php');
//echo HTTP.' ';

//print_r($_SESSION);
//print_r($_COOKIE);
// --------------------------------------------------- /
// ----------------- security measure ---------------- /
// 1. If there is no GET value in the URL, then REDIRECT
// 2. Check if GET UID is NOT a SUBMISSION and INVALID USERNAME
// 3.
// --------------------------------------------------- /
//$__redirect = 'http://freelabel.net/form/upload';
$__redirect = 'http://freelabel.net/upload/?uid=submission';

if ($_GET['uid']=='') {
    // No Username Set! ;
    // !!!! BREAK SCRIPT AND REDIRECT !!!! ///
    //header('Location: http://upload.freelabel.net/?uid=submission');
    header('Location: '.$__redirect);
} elseif($_GET['uid']=='submission') {
    //header('Location: '.$__redirect);
    $user_name_session = $_GET['uid'];
} else {
   // echo 'Hello, '. $_GET['uid'];
            include(ROOT.'inc/connection.php');
            $result = mysqli_query($con,"SELECT *
            FROM  `users`
            WHERE  `user_name` LIKE  '".$_GET['uid']."'
            LIMIT 1");
            if($row = mysqli_fetch_array($result)) {
                $user = $row;
                $user_name_session = $_GET['uid'];
                //print_r($user);
                //exit;

                // USER FOUND!!!
                //echo 'user found <hr> !';//print_r($row);
            } else {
        $user_name_session = $_GET['uid'];
                //echo 'No user set!';
                // !!!! BREAK SCRIPT AND REDIRECT !!!! ///
                //header('Location: );
                //header('Location: '.$__redirect);
            }

}
// --------------------------------------------------- /
// ----------------- security measure ---------------- /
// --------------------------------------------------- /

if ($user['user_email'] == 'submission') {
    $user['user_email'] = '';
}

$path = 'server/php/'.$user_name_session.'/';
if ( file_exists($path)) {
    //echo 'Viewing files from: "' .$path.'"';
    $debug[] = 'well, something already exists in '.$path.'!';
} else {
    //echo 'Viewing files from: "' .$path.'"';
    $debug[] = 'directory does not exist, create new directory';
    //mkdir($path);
}

//include(ROOT.'landing/header.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo HTTP."ico/favicon.ico"; ?>" >
  <link rel="shortcut icon" href="<?php echo HTTP; ?>ico/favicon.ico" type="image/x-icon">
  <link rel="icon" href="<?php echo HTTP; ?>images/favicon.ico" type="image/x-icon">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title><?php echo $page_title; ?> //</title>
  <meta name="author" content="FREELABEL">
  <meta name="Description" content="FREELABEL Network is the Leader in Online Showcasing | <?php echo $page_desc ?>">
  <meta name="Keywords" content="FREELABEL, FREE LABEL, FREE, LABEL, AMR, AMRecords, Rap, Hip Hop, Showcasing, Good Brand, Get That Good, Good Brand Clothing, Dalls Texas, FREELABEL, amradio, am radio live, texas, music, promotion, hip hop, rap">
  <meta name="Copyright" content="FREELABEL">
  <meta name="Language" content="English">
<!-- /*
 * jQuery File Upload Plugin Demo 9.1.0
 * https://github.com/blueimp/jQuery-File-Upload
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 */ -->
<!-- Force latest IE rendering engine or ChromeFrame if installed -->
<!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<![endif]-->
<!-- Bootstrap styles -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<!-- Generic page styles -->
<link rel="stylesheet" href="<?php echo HTTP; ?>upload/css/style.css">
<link rel="stylesheet" href="http://freelabel.net/landio/css/landio.css">
<link rel="stylesheet" href="<?php echo HTTP; ?>css/style.css">

<!-- blueimp Gallery styles -->
<link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
<link rel="stylesheet" href="<?php echo HTTP; ?>upload/css/jquery.fileupload.css">
<link rel="stylesheet" href="<?php echo HTTP; ?>upload/css/jquery.fileupload-ui.css">
<script type="text/javascript" src='http://freelabel.net/config/globals.js'></script>
<!-- CSS adjustments for browsers with JavaScript disabled -->
<noscript><link rel="stylesheet" href="<?php echo HTTP; ?>upload/css/jquery.fileupload-noscript.css"></noscript>
<noscript><link rel="stylesheet" href="<?php echo HTTP; ?>upload/css/jquery.fileupload-ui-noscript.css"></noscript>
<style type="text/css">
    .container {
        margin: auto;
    }
    body {
       // margin-top:10%;
       margin-top:10vh;
       margin-bottom:10vh;
    }
    .dashboard-view {
        padding-bottom: 1vh;
        //position:absolute;
        //top: 0;
    }
    .uploaded-file-options {
        display: none;
    }
    .single_upload_form {
        border-bottom:6px solid red;
        padding:2%;
        padding-bottom:4%;
        margin-bottom:4%;
    }
    tr {
        border-bottom:6px solid red;
    }
    .show_more_button {
        text-align: left;
        cursor: pointer;
    }
    .uploads-table {
        //position:fixed;
        //top: 0px;
        //right:0px;
        width:98%;
        margin:1%;
        z-index: 1000;
        background-color:rgba(0,0,0,0.9);
        border:red solid 3px;
        padding:2%;
        box-shadow:5px 5px 25px #000000;
        height:90vh;
        overflow-y:scroll;
    }
    .uploaded-file-options-button {
        display: block;
    }
    .head-logo-header {
        border-radius:200px;
        padding:10% 9%;
    }
    .file-form-area , .file-form-area label {
        display:block;
        width:100%;
    }
    .preview img {
        display:block;
        width:100%;
    }

    @media (max-device-width:640px) {
        .head-logo-header {
            //padding:12% 14%;
        }
    }

    <?php if ($_GET['uid']!='admin') {
        echo '.testing-only {
            display:none;
        }';
        }
    ?>
</style>
</head>
<body style='padding-top:0;padding-bottom:80px;'>
<a class='back-to-site' href='http://freelabel.net/' style='z-index:100;font-size:10px;'>&larr; Back to Site</a>
<div class="container">
<center>
    <br>



    <header class='fit-to-vieww dashboard-view'>
        <?php

        if ($user_name_session == 'admin') {


            //include(ROOT.'landing_1.3.php');
        }

        ?>
        <h1 style='background-color:#FE3F44;display:inline-block;margin-top:0;position:relative;bottom:25px;' class='fit-to-vieww head-logo-header'>
        <img src='http://freelabel.net/images/FREELABELLOGO.gif' style='background-color:#FE3F44;width:100px;margin-top:10px;vertical-align:top;display:block;'>
        <p style='text-transform: uppercase;color:#fff;'>
            <span class='glyphicon glyphicon-hdd' style='font-size:25px;color:#e3e3e3e;'></span>
            <span class='sub_header' style='position:relative;bottom:5px;left:10px;'><?php echo $page_title; ?></span>
        </p>
        </h1>
    </header>


        <section class='col-xs-12 col-md-4' style='display:none;'>
                <h1 class="sub_header" style='margin-top:5%;margin-bottom:5%;' >DRAG & DROP</h1>
                <p>Just drag and drop your music to send it to FREELABEL Radio and Magazine.</p>
                <span class='glyphicon glyphicon glyphicon-import big-text'></span>
        </section>
    <!-- The file upload form used as target for the file upload widget -->
    <form id="fileupload" action="//jquery-file-upload.appspot.com/" method="POST" enctype="multipart/form-data" class='col-xs-12 col-md-12 overflow_divx'>
      <h1 class='sub_header' style='text-align:center;display:none;'>DRAG & DROP</h1>
        <!-- Redirect browsers with JavaScript disabled to the origin page -->
        <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
        <div class="row fileupload-buttonbar" style='position:fixed;bottom:0px;right:0px;width:100%;background-color:#101010;padding-top:1%;opacity:0.9;z-index:100000;'>
            <!-- The global file processing state
                    <span class="fileupload-process"></span>
            <!-- The global progress state
            <div class="col-lg-5 col-xs-6 fileupload-progress fade">
                <!-- The global progress bar
                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                </div>
                <!-- The extended global progress state
                <div class="progress-extended">&nbsp;</div>
            </div>
            -->
            <div class="col-lg-7 col-xs-12">
                 <!-- The fileinput-button span is used to style the file input field as button -->
                <span class="btn btn-success fileinput-button col-md-2 col-xs-3">
                    <i class="glyphicon glyphicon-plus"></i>
                    <span>Add files...</span>
                    <input type="file" name="files[]" multiple>
                </span>

                <button type="submit" class="btn  btn-primary start col-md-2 col-xs-3">
                    <i class="glyphicon glyphicon-upload"></i>
                    <span>Start</span>
                </button>
                <button type="reset" class="btn  btn-warning cancel col-md-2 col-xs-3">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel</span>
                </button>
                <button type="button" class="btn  btn-danger delete col-md-2 col-xs-3">
                    <i class="glyphicon glyphicon-trash"></i>
                    <span>Delete</span>
                </button>
                <div class='col-md-2 col-xs-12' style='display:none;'>
                    <input id='selectAll' type="checkbox" class="toggle">
                    <span for='selectAll'>Select All</span>
                </div>
            </div>

        </div>
        <!-- The table listing the files available for upload/download -->
        <a name="share"></a>
        <table role="presentation" class="table uploads-table"><tbody class="files"></tbody></table>
    </form>

</center>
</div><!-- .container -->
<!-- The blueimp Gallery widget -->
<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-filter=":even">
    <div class="slides"></div>
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
</div>
<!-- The template to display files available for upload -->
<script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <?php
    echo '<article class="panel-body template-upload fade col-md-12" id="panel_{%=file.size%}">
            <div class="col-md-6 col-xs-12" >
                <p class="name">{%=file.name%}</p>
                <span class="preview"></span>
                <strong class="error text-danger"></strong>
                <p class="size">Processing...</p>
                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
            </div>
            <div class="col-md-6 col-xs-12 hide-after-finish-{%=file.size%}" >

                <div class="file-form-area">  
                
                    <label class="title">
                        <span>title:</span><br>
                        <input type="text" name="title[]" class="form-control">
                    </label>

                    <label class="description">
                        <span>description:</span><br>
                        <input type="text" name="description[]" class="form-control">
                    </label>

                    <label class="user_name">
                        <input type="hidden" name="user_name[]"  value="'.$user_name_session.'" class="form-control">
                    </label>
                </div>

                {% if (!i && !o.options.autoUpload) { %}
                    <button class="btn btn-xs btn-primary start col-md-6 col-xs-6" disabled>
                        <i class="glyphicon glyphicon-upload"></i>
                        <span>Start</span>
                    </button>
                {% } %}

                {% if (!i) { %}
                    <button class="btn btn-xs btn-warning cancel col-md-6 col-xs-6">
                        <i class="glyphicon glyphicon-ban-circle "></i>
                        <span>Cancel</span>
                    </button>
                {% } %}

            </div>
            <hr>
        </article>';

        ?>
{% } %}
</script>
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <a name="{%=file.size%}"></a>
    <article class="panel-body template-download fade col-md-12" id='panel_{%=file.size%}'>
        <div class="col-lg-12 col-md-12 col-xs-12 preview-image" >
            <span class="preview">
                {% if (file.thumbnailUrl) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                {% } %}
            </span>
        </div>
        <div class="col-lg-12 col-md-12 col-xs-12" >
            <p class="name">
                {% if (file.url) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}><span class='glyphicon glyphicon-ok' style='color:green;margin-right:2%;' ></span>{%=file.name%}</a>
                    <div id='form_{%=file.size%}' ></div>
                {% } else { %}
                    <span>{%=file.name%}</span>
                {% } %}
                <span class="size">{%=o.formatFileSize(file.size)%}</span>
            </p>
            {% if (file.error) { %}
                <div><span class="label label-danger">Error</span> {%=file.error%}</div>
            {% } %}

            {% if (file.deleteUrl) { %}
                <label>Share:</label>
                <input type="text" value="{%=file.url%}" class="form-control">
                <br>
                <a onclick="showOptions()" href="#{%=file.size%}" class="uploaded-file-options-button btn-primary btn-xs col-md-6" ><i class="glyphicon glyphicon-option-vertical"></i> Share</a>
                <div class="uploaded-file-options">
                    <a onclick='grabFiles("{%=file.url%}" , "{%=file.size%}", "{%=file.type%}", "{%=file.name%}", "<?php echo $user[user_email] ?>")' id='addToProfile_{%=file.size%}' class='btn btn-primary btn-xs col-md-6 col-xs-12'><i class="glyphicon glyphicon-globe"></i> Post To Blog</a>
                    <?php
                        if ($user_name_session =='imnottoosure') {
                            echo '<a onclick=\'postToBlog("{%=file.url%}" , "{%=file.size%}", "{%=file.type%}", "{%=file.name%}", "<?php echo $user[user_email] ?>")\' id=\'addToProfile_{%=file.size%}\' class=\'btn btn-primary btn-xs col-md-6 col-xs-12 save-to-profile\'><i class="glyphicon glyphicon-inbox"></i> Add to Your FLDRIVE</a>';
                        }
                    ?>
                </div>
                <div class="btn btn-danger btn-xs delete col-md-6 col-xs-12" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                    <i class="glyphicon glyphicon-trash"></i>
                    <span>Delete</span>
                </div>

            {% } else { %}
                <div class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel</span>
                </div>
            {% } %}
        </div>
        <hr>
    </article>
{% } %}
</script>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://freelabel.net/landio/js/landio.min.js"></script>
<script>
// turn on after finding out how variables will be grabbed
//saveSingle('.$i.',"'.$mp3file.'" , "admin", "'.$twitter.'" , "'.$trackname.'" , "notwitpic",1,"manage.amrecords@gmail.com" , "8326915906","http://freelabel.net/images/fllogo.png","mixtape")
</script>

<script>

$(function(){
    $('.save-to-profile').click(function() {
        $(this).hide('fast');
        alert($(this));
    });



    $('#fileupload').fileupload({
        url: 'server/php/'
    }).on('fileuploadsubmit', function (e, data) {
        data.formData = data.context.find(':input').serializeArray();
    });





});

function showOptions() {
    //alert('.uploaded-file-options');
    $(".uploaded-file-options").toggle("fast");
    $(this).text("hide");
}

function postToBlog(link , i , type, filename, email) {
            //alert($(this));
            //console.log($(this));
            $('.save-to-profile-'+ i).hide('fast');

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
                $('#panel_'+i).html(data);

                setTimeout(function(){
                   $('#panel_'+i).fadeOut('fast');
                },4000);
                scrollToAnchor('confirm_upload');
            });

}





var userNameSession = <?php echo "'".$_GET['uid']."'"; ?>;
    function grabFiles(link , i , type, filename, email) {
        // PHOTO
        $(".hide-after-finish-"+i).hide('fast');
        if (type.toLowerCase().indexOf("jpg") >= 0 || type.toLowerCase().indexOf("jpeg") >= 0 || type.toLowerCase().indexOf("png") >= 0 || type.toLowerCase().indexOf("video/mp4") >= 0) {
            var path = 'http://freelabel.net/config/confirm_upload.php';
            $.post(path , {
                inc: i,
                user_trackname : '',
                user_twitter : <?php echo '"'.$profile_twitter.'",' ?>
                twitpic : <?php echo '"'.$twitpic.'",' ?>
                user_name : <?php echo '"'.$user_name_session.'",' ?>
                user_email : <?php echo '"'.$user['user_email'].'",' ?>
                user_phone : <?php echo '"'.$user['phone'].'",' ?>
                onsale : <?php echo '"'.$onsale_status.'",' ?>
                blogentry : "",
                photo : link,
                redirect_source : "fl_drive_post",
                audiofile : link
            }).done(function(data){
                $('#panel_'+i).html(data);
                $('.preview-image').hide('fast');
                //scrollToAnchor('confirm_upload');
            });
        } else {
            // MUSIC
            var path = 'http://freelabel.net/config/confirm_upload.php';
            $.post(path , {
                inc: i,
                user_trackname : '',
                user_twitter : <?php echo '"'.$profile_twitter.'",' ?>
                twitpic : <?php echo '"'.$twitpic.'",' ?>
                user_name : <?php echo '"'.$user_name_session.'",' ?>
                user_email : <?php echo '"'.$user['user_email'].'",' ?>
                user_phone : <?php echo '"'.$user['phone'].'",' ?>
                onsale : <?php echo '"'.$onsale_status.'",' ?>
                photo : <?php echo '"'.$photo.'",' ?>
                redirect_source : "fl_drive",
                blogentry : "",
                audiofile : link
            }).done(function(data){
                $('#panel_'+i).html(data);
                //scrollToAnchor('confirm_upload');
            });
        }
    }

</script>
<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="<?php echo HTTP; ?>upload/js/vendor/jquery.ui.widget.js"></script>
<!-- The Templates plugin is included to render the upload/download listings -->
<script src="//blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="//blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="//blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
<!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<!-- blueimp Gallery script -->
<script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="<?php echo HTTP; ?>upload/js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="<?php echo HTTP; ?>upload/js/jquery.fileupload.js"></script>
<!-- The File Upload processing plugin -->
<script src="<?php echo HTTP; ?>upload/js/jquery.fileupload-process.js"></script>
<!-- The File Upload image preview & resize plugin -->
<script src="<?php echo HTTP; ?>upload/js/jquery.fileupload-image.js"></script>
<!-- The File Upload audio preview plugin -->
<script src="<?php echo HTTP; ?>upload/js/jquery.fileupload-audio.js"></script>
<!-- The File Upload video preview plugin -->
<script src="<?php echo HTTP; ?>upload/js/jquery.fileupload-video.js"></script>
<!-- The File Upload validation plugin -->
<script src="<?php echo HTTP; ?>upload/js/jquery.fileupload-validate.js"></script>
<!-- The File Upload user interface plugin -->
<script src="<?php echo HTTP; ?>upload/js/jquery.fileupload-ui.js"></script>
<!-- The main application script -->
<script src="<?php echo HTTP; ?>upload/js/main.js"></script>
<!-- The XDomainRequest Transport is included for cross-domain file deletion for IE 8 and IE 9 -->
<!--[if (gte IE 8)&(lt IE 10)]>
<script src="<?php echo HTTP; ?>upload/js/cors/jquery.xdr-transport.js"></script>
<![endif]-->
<?php //echo 'You are currently logged in as: '.$_SESSION['user_name']; ?>
</body>
</html>
