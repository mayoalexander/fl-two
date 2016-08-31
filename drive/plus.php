<?php
 include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');


    // LOAD WEBSITE APPLICATIONS
    $app = new Config();

    // LOAD SITE DATA
    $config = new Blog($_SERVER['HTTP_HOST']);
    $site = $config->getSiteData($config->site);
    $site['media']['photos']['front-page'] = $config->getPhotoAds($site['creator'], 'front');
    $site['media']['photos']['ads'] = $config->getPhotoAds($site['creator'], 'current-promo');
    // LOAD USER DATA


    session_start();
    if (isset($_GET['uid']) && $user_name = $_GET['uid']) {

        $ud = $config->getUserInfo($_GET['uid']);
        $user_email = $ud['user_email'];
        echo '
        <script>var user_name = "'.$user_name.'"; var user_email = "'.$user_email.'"; </script>';
    } else {
        header('Location: http://freelabel.net/drive/plus.php?uid=submission');
    }

    /* count & set background*/
    $bg_count = count($site['media']['photos']['front-page']);
    $r = rand(0 , $bg_count);

?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>DRIVE | <?php echo $site['name']; ?></title>
    <meta name="description" content="<?php echo $site['description']; ?>" />
    <meta name="keywords" content="<?php echo $site['keywords']; ?>" />
    <meta name="author" content="<?php echo $site['author']; ?>" />
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo $site['logo']; ?>">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo $site['logo']; ?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo $site['logo']; ?>">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo $site['logo']; ?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo $site['logo']; ?>">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo $site['logo']; ?>">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo $site['logo']; ?>">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo $site['logo']; ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $site['logo']; ?>">
    <link rel="icon" type="image/png" href="<?php echo $site['logo']; ?>" sizes="32x32">
    <link rel="icon" type="image/png" href="<?php echo $site['logo']; ?>" sizes="192x192">
    <link rel="icon" type="image/png" href="<?php echo $site['logo']; ?>" sizes="96x96">
    <link rel="icon" type="image/png" href="<?php echo $site['logo']; ?>" sizes="16x16">
    <link rel="manifest" href="http://freelabel.net/landio/img/favicon/manifest.json">
    <link rel="shortcut icon" href="<?php echo $site['logo']; ?>">
    <meta name="msapplication-TileColor" content="#663fb5">
    <meta name="msapplication-TileImage" content="<?php echo $site['logo']; ?>">
    <meta name="msapplication-config" content="http://freelabel.net/landio/img/favicon/browserconfig.xml">
    <meta name="theme-color" content="#663fb5">
    <link rel="stylesheet" href="http://freelabel.net/landio/css/landio.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://code.createjs.com/createjs-2015.05.21.min.js">
    <link rel="stylesheet" type="text/css" href="http://freelabel.net/landing/view/nexus/css/component.css" />
    <link rel="stylesheet" type="text/css" href="http://freelabel.net/css/bootstrap-social/bootstrap-social.css"/>
    <link rel="stylesheet" type="text/css" href="http://freelabel.net/landing/view/tabs/css/tabs.css">
    <link rel="stylesheet" type="text/css" href="http://freelabel.net/landing/view/tabs/css/tabstyles.css">
    <link rel="stylesheet" type="text/css" href="http://freelabel.net/jPlayer/dist/skin/pink.flag/css/jplayer.pink.flag.css">
    <link href='https://fonts.googleapis.com/css?family=Oswald:400|Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo HTTP; ?>upload/css/style.css">
    <link rel="stylesheet" href="http://freelabel.net/landio/css/landio.css">
    <link rel="stylesheet" href="<?php echo HTTP; ?>css/style.css">
    <link rel="stylesheet" href="<?php echo HTTP; ?>css/upload.css">

    <link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
    <!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
    <link rel="stylesheet" href="http://freelabel.net/upload/css/jquery.fileupload.css">
    <link rel="stylesheet" href="http://freelabel.net/upload/css/jquery.fileupload-ui.css">
    <link rel="stylesheet" href="http://freelabel.net/js/jquery-ui.min.css">

    <!-- CSS adjustments for browsers with JavaScript disabled -->
    <noscript><link rel="stylesheet" href="http://freelabel.net/css/jquery.fileupload-noscript.css"></noscript>
    <noscript><link rel="stylesheet" href="http://freelabel.net/css/jquery.fileupload-ui-noscript.css"></noscript>
    <style>
        html {
            /*background-image: url(<?php echo $site['media']['photos']['front-page'][$r]['image']; ?>);*/
            background-size: 100vw auto;
        }
        body {
            background-color: rgba(0,0,0,0.9);
            margin-top:0;
            margin-bottom:0;
            padding-top:0;
            /*padding-bottom:20vh;*/
            font-family: 'Oswald';
        }
        a:hover, a:visited, a:link , a:active {
            text-decoration: none;
            color:#e3e3e3;
            font-family: 'Oswald', sans-serif;
        }
        h1, h2, h3, h4, h5, h6 {
            /*font-family: 'Condensed Sans Pro';*/
        }
        /* Hide Angular JS elements before initializing */
        .ng-cloak {
            display: none;
        }
        .header {
            background-color:#202020;
            height: 100vh;
            text-align: center;
            /*min-width:220px;*/
            box-shadow: 10px 5px 25px #000000;
        }
        .header img {
            position: relative;
            background-color: <?php echo $site['primary-color']; ?> ;
            padding:3px;

            bottom:12px;
            max-width:38px;
        }
        .header h3 {
            display:inline-block;
        }
        .btn-success, .btn-success:visited, .btn-success:active {
            color: <?php echo $site['primary-color']; ?>;
        }
        .navbar-header, .file-container {
            padding:0.5%;
        }

        .upload-preview-img {
            max-height:80px;
            max-width:80px;
        }
        .toolbar {
            background-color:rgba(0,0,0,0.7);
        }
        .info {
            font-size:14px;
        }
        .fileinput-button .glyphicon {
            position: relative;
            top: -1px;
        }
        .fileinput-button:hover{
            color:#e3e3e3;
            text-decoration: none;
        }
        .btn .glyphicon {
            margin-right: 1px;
        }
/*        .file-container {
            height: 95vh;
        }*/
        .btn-primary {
            background-color: <?php echo $site['primary-color']; ?>;
        }
        .btn-link , .fileinput-button {
            /*color:<?php echo $site['primary-color']; ?>;*/
            color:#202020;
            z-index: 100000;
        }
        .btn-link i {
            font-size:12rem;
            display:block;
            z-index: -20;
        }
        video, img {
            /*display:none;*/
            border-radius: 2px;
            width: 100%;
        }
        video, img {
            cursor:pointer;
        }
        .btn-link:active{
            position: relative;
            top:2px;
            right:2px;
        }
        .form-control {
            background-color: transparent;
            padding:2%;
            margin-bottom:2%;
            margin-top:2%;
            color:#e3e3e3;
        }
        .photo-upload-results {
            min-height: 200px;
        }
        .file-panel .file-name {
            padding: 1.5%;
            display: block;
            text-align: center;
            /*background-color:#e3e3e3;*/
            /*color: #101010;*/
            font-size:0.6em;
            text-align: center;
        }
        .file-panel div {
            color: #303030;
            /*border-bottom: solid 1px #202020*/
        }
        .file-panel {
                margin-bottom: 2vh;
                /*background: #202020;*/
                border: #101010;
                box-shadow: 1px 1px 10px #000;
                border-radius: 3px;
                padding: 11%;
                padding-bottom:0px;
                border-top: solid 2px #202020;

        }
        #files > div > p > button {
            border-radius: 3px;
        }
        .files input , .file-panel div, .file-panel textarea {
            /*max-width:400px;
            /*display:inline-block;*/
        }
        .confirm-upload-buttons {
            /*display:none;*/
        }
        canvas {
            display: block;
            margin: auto;
        }
        .inputfile {
            position:relative;
            width: 0.1px;
            height: 0.1px;
            opacity: 0;
            overflow: hidden;
            position: absolute;
            z-index: -1;
        }

        .inputfile , label {
            font-size: 0.75em;
            color: #e3e3e3;
            background-color: #202020;
            display: inline-block;
        }

        .inputfile:focus, label,
        .inputfile, label:hover {
        background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #77b55a), color-stop(1, #72b352));
        background:-moz-linear-gradient(top, #77b55a 5%, #72b352 100%);
        background:-webkit-linear-gradient(top, #77b55a 5%, #72b352 100%);
        background:-o-linear-gradient(top, #77b55a 5%, #72b352 100%);
        background:-ms-linear-gradient(top, #77b55a 5%, #72b352 100%);
        background:linear-gradient(to bottom, #77b55a 5%, #72b352 100%);
        filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#77b55a', endColorstr='#72b352',GradientType=0);
        background-color:#77b55a;
        -moz-border-radius:4px;
        -webkit-border-radius:4px;
        border-radius:4px;
        border:1px solid #4b8f29;
        display:inline-block;
        width: 100%;
        cursor:pointer;
        font-weight:bold;
        padding:1em;
        text-align: center;
        text-decoration:none;
        text-shadow:0px 1px 0px #5b8a3c;
        }
        .inputfile:hover {
        background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #72b352), color-stop(1, #77b55a));
        background:-moz-linear-gradient(top, #72b352 5%, #77b55a 100%);
        background:-webkit-linear-gradient(top, #72b352 5%, #77b55a 100%);
        background:-o-linear-gradient(top, #72b352 5%, #77b55a 100%);
        background:-ms-linear-gradient(top, #72b352 5%, #77b55a 100%);
        background:linear-gradient(to bottom, #72b352 5%, #77b55a 100%);
        filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#72b352', endColorstr='#77b55a',GradientType=0);
        background-color:#72b352;
        }
        .inputfile:active {
        position:relative;
        top:1px;
        }

        .inputfile , label {
            cursor: pointer; /* "hand" cursor */
        }


        .gradient-bg {
          /* fallback */
          background-color: #27272f;
          background-image: url(images/linear_bg_1.png);
          background-repeat: repeat-y;

          /* Safari 4-5, Chrome 1-9 */
          background: -webkit-gradient(linear, left top, right top, from(#27272f), to(#2F2727));

          /* Safari 5.1, Chrome 10+ */
          background: -webkit-linear-gradient(left, #2F2727, #27272f);

          /* Firefox 3.6+ */
          background: -moz-linear-gradient(left, #2F2727, #27272f);

          /* IE 10 */
          background: -ms-linear-gradient(left, #2F2727, #27272f);

          /* Opera 11.10+ */
          background: -o-linear-gradient(left, #2F2727, #27272f);
        }

        /* mobile styles */
        @media (max-width: 767px) {
          .header {
            height: 100px;
            position: relative;
            bottom: 35px;
          }
          .header h3 {
            position: relative;
            top: 14px;
          }
          .header img {
            height: 36px;
            top: 3px;
          }
          .file-panel {
            font-size: 12px;
          }
          .files img, .files canvas {
            max-width: 10vh;
          }
/*          .form-control {
            width: 200px;
            margin:auto;
          }*/
        }
/*        .info {
            display:block;
        }*/
    </style>

    <!-- <script type="text/javascript" src="//code.jquery.com/jquery-2.0.3.min.js"></script> -->

    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="http://freelabel.net/landing/view/tabs/js/modernizr.custom.js"></script>
    <script src="http://freelabel.net/js/list.js"></script>
    <!-- CSS -->
    <!-- <link rel="stylesheet" href="<?php echo URL; ?>public/css/reset.css" /> -->
    <!-- <link rel="stylesheet" href="<?php echo URL; ?>public/css/style.css" /> -->
    <!-- in case you wonder: That's the cool-kids-protocol-free way to load jQuery -->
    <script type="text/javascript" src="http://freelabel.net/drive/js/application.js"></script>

</head>
<body>







<div class="col-md-2 header gradient-bg">

        <a href="http://freelabel.net/users/dashboard/index/?ctrl=audio"><img src="http://freelabel.net/images/FREELABELLOGO.gif"></a>
        <!-- <img src="<?php echo $site['logo'];?>"> -->
        <h3>DRIVE</h3>
        <!-- <small class="info text-muted">Or just and drop here..</small> -->
        <!-- toolbar  -->
        <div class="navbar navbar-default navbar-fixed-bottom toolbar">
            <div id="progress" class="progress">
                <div class="progress-bar progress-bar-success"></div>
            </div>
        </div>

</div>

<div class="file-container col-md-10 col-lg-10 col-sm-10 col-xs-12">
    <!-- The fileinput-button span is used to style the file input field as button -->
    <button class="btn btn-link fileinput-button btn-block">
        <input id="fileupload" type="file" name="files[]" multiple style="height:250px;">
        <i class="fa fa-cloud-upload"></i>
        <span>Add Music, Photos, Videos..</span>
        <!-- The file input field used as target for the file upload widget -->
        
    </button>
    <!-- The container for the uploaded files -->
    <div id="files" class="files"></div>
</div>


<!-- add modal here -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>



<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="js/vendor/jquery.ui.widget.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="http://freelabel.net/drive/js/load-image.all.min.js"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="http://freelabel.net/drive/js/canvas-to-blob.min.js"></script>
<!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="js/jquery.fileupload.js"></script>
<!-- The File Upload processing plugin -->
<script src="js/jquery.fileupload-process.js"></script>
<!-- The File Upload image preview & resize plugin -->
<script src="js/jquery.fileupload-image.js"></script>
<!-- The File Upload audio preview plugin -->
<script src="js/jquery.fileupload-audio.js"></script>
<!-- The File Upload video preview plugin -->
<script src="js/jquery.fileupload-video.js"></script>
<!-- The File Upload validation plugin -->
<script src="js/jquery.fileupload-validate.js"></script>
<script src="http://freelabel.net/js/jquery-ui.min.js"></script>
<script>
function hideFilePanel(data) {
    console.log(data);
    var photo = $.trim(data.formData[0].value);
    var title = $.trim(data.formData[3].value);
    var twitter = $.trim(data.formData[4].value);
    var postUrl = 'http://freelabel.net/' + twitter + "/" ;

    // $(data.context.find('.file-panel')).html('');
    // $(data.context.find('.file-panel')).remove();
    // $(data.context.find('.file-panel .form-control')).remove();
    // $(data.context.find('.file-panel .photo-upload-results')).remove();
    $(data.context.find('.file-panel')).html('<img src="' + photo + '" class="upload-preview-img pull-right"> <h2>' + twitter + '</h2> <p>' + title + '</p> <a class="btn btn-primary" href="' + postUrl + '">View Post</a> <a class="btn btn-primary" href="http://freelabel.net/users/dashboard/?ctrl=audio">View All Uploads</a>');
    // $(data.context.find('.file-panel')).append('<button onclick="$(this).parent().hide()" class="close-button btn btn-primary pull-right" ><i class="fa fa-plus"></i></button>');
    // hide the tool bar
    $('.toolbar').hide();

}
function openPost(data) {
        console.log('open the post form here');
        console.log(data);


        if (typeof data.result === 'undefined') {
            console.log('There was an error thrown');
            alert("Uh, oh. Something is wrong with your MP3 file that does not allow us to update the metatags. Please, re-export your MP3 and reupload so we can have the right type of file format!");
        } else {
            console.log('NO ERROR WAS THROWN, RESUME REGULLARRY');
            $.each(data.result.files, function (index, file) {
                var twitter = $.trim(data.formData[4].value);
                var postUrl = 'http://freelabel.net/' + twitter + "/" ;
                window.open(postUrl);
                if (file.url) {
                    // var link = $('<a>')
                    //     .attr('target', '_blank')
                    //     .prop('href', file.url);
                    // $(data.context.children()[index])
                    //     .wrap(link);
                } else if (file.error) {
                    var error = $('<span class="text-danger"/>').text(file.error);
                    $(data.context.children()[index])
                        .append('<br>')
                        .append(error);
                }
            });
        }







}

/* CUSTOM JAVASCRIPT */
function showMoreOptions(elem) {
    // x = elem.siblings().get(6);
    $('.more-options').append('<input type="text" name="release_date" placeholder="Enter Release Date.." class="form-control release_date">');
    elem.hide();    
    // datepicker for the events 
    $('.release_date').datepicker({dateFormat: "yy-mm-dd"});
}

function enableButton() {
    // alert('okay');
    $('.file-upload-trigger').removeClass('disabled');
}






/*jslint unparam: true, regexp: true */
/*global window, $ */
$(function () {
    'use strict';

    $('.toolbar').hide();
    // Change this to the location of your server-side upload handler:
    var url = window.location.hostname === 'blueimp.github.io' ?
                '//jquery-file-upload.appspot.com/' : 'server/php/',
        uploadButton = $('<button/>')
            .addClass('btn btn-primary btn-block file-upload-trigger disabled')
            .prop('disabled', true)
            .text('Processing...')
            .on('click', function () {
                var $this = $(this),
                    data = $this.data();
                $this
                    .off('click')
                    .text('Abort')
                    .on('click', function () {
                        $this.remove();
                        data.abort();
                    });
                data.submit().always(function () {
                    $this.remove();
                });
            });
    $('#fileupload').fileupload({

        url: url,
        dataType: 'json',
        autoUpload: false,
        acceptFileTypes: /(\.|\/)(gif|jpe?g|png|mp3|wav|mp4)$/i,
        maxFileSize: 9990000000,
        // Enable image resizing, except for Android and Opera,
        // which actually support image resizing, but fail to
        // send Blob objects via XHR requests:
        disableImageResize: /Android(?!.*Chrome)|Opera/
            .test(window.navigator.userAgent),
        previewMaxWidth: 300,
        previewMaxHeight: 300,
        previewCrop: true,
        xhrFields: {
            withCredentials: true
        }
    }).on('fileuploadadd', function (e, data) {
        $('.btn-link').hide('fast');

        // on file add
        data.context = $('<div/>').appendTo('#files');
        $.each(data.files, function (index, file) {

        // bind the upload files submit function
        $('#fileupload').bind('fileuploadsubmit', function (e, data) {
            var inputs = data.context.find(':input');
            if (inputs.filter(function () {
                    return !this.value && $(this).prop('required');
                }).first().focus().length) {
                data.context.find('button').prop('disabled', false);
                return false;
            }
            data.formData = inputs.serializeArray();
        });

        // alert(file.type); 
        $('.file-upload-trigger').hide();

        switch(file.type) {
            case 'image/jpeg':
                var node = $('<p class="file-panel col-md-12 col-xs-12"/>')
                            // .append($('<span class="file-name" />').text(file.name))
                            .append($('<panel class="col-md-3"><div>Status</div><select class="form-control" name="status"><option value="private" selected>Public</option><option value="private">Private</option></select></panel>'))
                            .append($('<input type="hidden" name="poster" value="' + file.name +'" />'))
                            .append($('<input type="hidden" name="poster" value="' + file.name +'" />'))
                            .append($('<panel class="col-md-9"><div>Title</div><input class="form-control" type="text" name="title" required value="'+file.name+'"/></panel>'))
                            .append($('<panel class="col-md-6"><div>Twitter</div><input class="form-control" type="text" name="twitter" id="twitter" value="@" required/></panel>'))
                            .append($('<panel class="col-md-6"><div>Phone</div><input class="form-control" type="text" name="phone"/></panel>'))
                            .append($('<panel class="col-md-12"><div>Description</div><textarea class="form-control" type="text" name="description" /><span class="photo-upload-results"></span></panel>'))
                            .append($('<input type="hidden" name="user_name" value="' + user_name +'" />'))
                            .append($('<input type="hidden" name="user_email" value="' + user_email +'" />'));
            case 'image/jpg':
                var node = $('<p class="file-panel col-md-12 col-xs-12"/>')
                            // .append($('<span class="file-name" />').text(file.name))
                            .append($('<panel class="col-md-3"><div>Status</div><select class="form-control" name="status"><option value="private" selected>Public</option><option value="private">Private</option></select></panel>'))
                            .append($('<input type="hidden" name="poster" value="' + file.name +'" />'))
                            .append($('<input type="hidden" name="poster" value="' + file.name +'" />'))
                            .append($('<panel class="col-md-9"><div>Title</div><input class="form-control" type="text" name="title" required value="'+file.name+'"/></panel>'))
                            .append($('<panel class="col-md-6"><div>Twitter</div><input class="form-control" type="text" name="twitter" id="twitter" value="@" required/></panel>'))
                            .append($('<panel class="col-md-6"><div>Phone</div><input class="form-control" type="text" name="phone"/></panel>'))
                            .append($('<panel class="col-md-12"><div>Description</div><textarea class="form-control" type="text" name="description" /><span class="photo-upload-results"></span></panel>'))
                            .append($('<input type="hidden" name="user_name" value="' + user_name +'" />'))
                            .append($('<input type="hidden" name="user_email" value="' + user_email +'" />'));
                break;
            case 'image/png':
                var node = $('<p class="file-panel col-md-12 col-xs-12"/>')
                            // .append($('<span class="file-name" />').text(file.name))
                            .append($('<panel class="col-md-3"><div>Status</div><select class="form-control" name="status"><option value="private" selected>Public</option><option value="private">Private</option></select></panel>'))
                            .append($('<input type="hidden" name="poster" value="' + file.name +'" />'))
                            .append($('<input type="hidden" name="poster" value="' + file.name +'" />'))
                            .append($('<panel class="col-md-9"><div>Title</div><input class="form-control" type="text" name="title" required value="'+file.name+'"/></panel>'))
                            .append($('<panel class="col-md-6"><div>Twitter</div><input class="form-control" type="text" name="twitter" id="twitter" value="@" required/></panel>'))
                            .append($('<panel class="col-md-6"><div>Phone</div><input class="form-control" type="text" name="phone"/></panel>'))
                            .append($('<panel class="col-md-12"><div>Description</div><textarea class="form-control" type="text" name="description" /><span class="photo-upload-results"></span></panel>'))
                            .append($('<input type="hidden" name="user_name" value="' + user_name +'" />'))
                            .append($('<input type="hidden" name="user_email" value="' + user_email +'" />'));
                break;
            case 'audio/mp3':
                var node = $('<p class="file-panel col-md-12 col-xs-12"/>')
                            // .append($('<span class="file-name" />').text(file.name))
                            .append($('<panel class="col-md-4"><div>Photo</div><label id="artwork_photo_button" for="artwork_photo"><i class="fa fa-plus"></i> Please add a photo</label><input class="form-control inputfile" type="file" name="photo" id="artwork_photo" /><span class="photo-upload-results"></span> <div>Status</div><select class="form-control" name="status"><option value="public" selected>Public</option><option value="private">Private</option></select> </panel>'))
                            .append($('<panel class="col-md-8"> <div>Title</div><input class="form-control" type="text" name="title" required value="'+file.name+'"/>  <div>Twitter</div><input class="form-control" type="text" name="twitter" id="twitter" required/> <div>Phone</div><input class="form-control" type="text" name="phone"/> <div>Description</div><textarea class="form-control" type="text" name="description" /> </panel>'))
                            .append($('<input type="hidden" name="user_name" value="' + user_name +'" />'))
                            // .append($('<input type="hidden" name="trackmp3" value="' + file.url +'" />'))
                            .append($('<input type="hidden" name="user_email" value="' + user_email +'" />'))
                            .append($('<div class="btn fa fa-calendar" onclick="showMoreOptions($(this))"></div><div class="more-options" ></div>'));
                break;
            case 'audio/mpeg':
                var node = $('<p class="file-panel col-md-12 col-xs-12"/>')
                            // .append($('<span class="file-name" />').text(file.name))
                            .append($('<panel class="col-md-3"><div>Photo</div><input class="form-control" type="file" name="photo" id="artwork_photo" /><span class="photo-upload-results"></span> <div>Status</div><select class="form-control" name="status"><option value="public" selected>Public</option><option value="private">Private</option></select> </panel>'))
                            .append($('<panel class="col-md-8"> <div>Title</div><input class="form-control" type="text" name="title" required value="'+file.name+'"/>  <div>Twitter</div><input class="form-control" type="text" name="twitter" id="twitter" required/> <div>Phone</div><input class="form-control" type="text" name="phone"/> <div>Description</div><textarea class="form-control" type="text" name="description" /> </panel>'))
                            .append($('<input type="hidden" name="user_name" value="' + user_name +'" />'))
                            // .append($('<input type="hidden" name="trackmp3" value="' + file.url +'" />'))
                            .append($('<input type="hidden" name="user_email" value="' + user_email +'" />'));
                break;
            case 'video/mp4':
                var node = $('<p class="file-panel col-md-12 col-xs-12"/>')
                            // .append($('<span class="file-name" />').text(file.name))
                            // .append($('<panel class="col-md-3"><div>Photo</div><input class="form-control" type="file" name="photo" id="artwork_photo" /><span class="photo-upload-results"></span> <div>Status</div><select class="form-control" name="status"><option value="public" selected>Public</option><option value="private">Private</option></select> </panel>'))
                            .append($('<panel class="col-md-4"><div>Photo</div><label id="artwork_photo_button" for="artwork_photo"><i class="fa fa-plus"></i> Please add a photo</label><input class="form-control inputfile" type="file" name="photo" id="artwork_photo" /><span class="photo-upload-results"></span> <div>Status</div><select class="form-control" name="status"><option value="public" selected>Public</option><option value="private">Private</option></select> </panel>'))

                            .append($('<panel class="col-md-8"><div>Title</div><input class="form-control" type="text" name="title" required value="'+file.name+'"/> <div>Twitter</div><input class="form-control" type="text" name="twitter" id="twitter" required/> <div>Phone</div><input class="form-control" type="text" name="phone"/> <div>Description</div><textarea class="form-control" type="text" name="description" /> </panel>'))
                            .append($('<panel class="col-md-12">'))
                            .append($('<input type="hidden" name="user_name" value="' + user_name +'" />'))
                            // .append($('<input type="hidden" name="trackmp3" value="' + file.url +'" />'))
                            .append($('<input type="hidden" name="user_email" value="' + user_email +'" />'));
                break;
            case 'audio/x-m4a':
                var node = $('<p class="file-panel col-md-12 col-xs-12"/>')
                            // .append($('<span class="file-name" />').text(file.name))
                            .append($('<panel class="col-md-3"><div>Photo</div><input class="form-control" type="file" name="photo" id="artwork_photo" /><span class="photo-upload-results"></span> <div>Status</div><select class="form-control" name="status"><option value="public" selected>Public</option><option value="private">Private</option></select> </panel>'))
                            .append($('<panel class="col-md-8"><div>Title</div><input class="form-control" type="text" name="title" required value="'+file.name+'"/> <div>Twitter</div><input class="form-control" type="text" name="twitter" id="twitter" required/> <div>Phone</div><input class="form-control" type="text" name="phone"/> <div>Description</div><textarea class="form-control" type="text" name="description" /> </panel>'))
                            .append($('<panel class="col-md-12">'))
                            .append($('<input type="hidden" name="user_name" value="' + user_name +'" />'))
                            // .append($('<input type="hidden" name="trackmp3" value="' + file.url +'" />'))
                            .append($('<input type="hidden" name="user_email" value="' + user_email +'" />'));
                break;
            default:
                alert('The filetype you are trying to upload is not an acceptable file! Please make sure to upload only audio MP3s and Video MP4s. Please convert the file and try again!');
        }

            if (!index) {
                node
                    .append('<br>')
                    .append(uploadButton.clone(true).data(data));
            }

            $('.file-upload-trigger').hide();



            node.appendTo(data.context);
            if (file.type=='image/jpeg' || file.type=='image/jpg' || file.type=='image/png') {
                setTimeout(enableButton(),2000);
            }
        });
    }).on('fileuploadprocessalways', function (e, data) {
        // bind validation
        $('document').bind(fileValidation());
        var index = data.index,
            file = data.files[index],
            node = $(data.context.children()[index]);
        if (file.preview) {
            node.find('.photo-upload-results')
                .prepend('<br>')
                .prepend(file.preview);
        }
        if (file.error) {
            node
                .append('<br>')
                .append($('<span class="text-danger"/>').text(file.error));
        }
        if (index + 1 === data.files.length) {
            data.context.find('button')
                .text('Upload')
                .prop('disabled', !!data.files.error);
        }
    }).on('fileuploadprogressall', function (e, data) {
        $('.toolbar').show();

        var progress = parseInt(data.loaded / data.total * 100, 10);
        $('#progress .progress-bar').css(
            'width',
            progress + '%'
        );
    }).on('fileuploaddone', function (e, data) {

        // SUCCESS 
        hideFilePanel(data);
        openPost(data);
        console.log(data[9]);

    }).on('fileuploadfail', function (e, data) {

        // FAIL 
        console.log("new data");
        console.log(data);
        $.each(data.files, function (index) {
            var error = $('<span class="text-danger"/>').text('File upload failed.');
            $(data.context.children()[index])
                .append('<br>')
                .append(error);
        });

    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
});
</script>
</body>
</html>
