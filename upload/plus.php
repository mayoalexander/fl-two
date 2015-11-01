<?php 
session_start();
$page_title = 'Drive';
include('../config/index.php');
include(ROOT.'config/globalvars.php');
include(ROOT.'submit/views/db/index.php');
//include(ROOT.'new_header.php');
//echo HTTP.' ';

//print_r($_SESSION);
?>
<!DOCTYPE HTML>
<!--
/*
 * jQuery File Upload Plugin Basic Plus Demo 1.4.0
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2013, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 */
-->
<html lang="en">
<head>
<!-- Force latest IE rendering engine or ChromeFrame if installed -->
<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
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

<!-- Bootstrap styles -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<!-- Generic page styles -->
<link rel="stylesheet" href="<?php echo HTTP; ?>upload/css/style.css">
<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
<link rel="stylesheet" href="<?php echo HTTP; ?>upload/css/jquery.fileupload.css">
<link rel="stylesheet" href="<?php echo HTTP; ?>css/style.css">
</head>
<body style='padding-bottom:10%;'>
        <header class='fit-to-view' style='display:block;margin:auto;text-align:center;'>
            <h1 style='background-color:#FE3F44;display:inline-block;padding:15px;padding-top:0px;margin-top:0;'>
            <img src='http://freelabel.net/images/FREELABELLOGO.gif' style='background-color:#FE3F44;width:310px;margin-top:10px;vertical-align:top;display:block;'>
            <p style='text-transform: uppercase;color:#fff;'>
                <span class='glyphicon glyphicon-hdd' style='font-size:55px;color:#e3e3e3e;'></span>
                <span style='position:relative;bottom:18px;font-size:14px;left:10px;letter-spacing: 32px;'><?php echo $page_title; ?></span>
            </p>
            </h1>
            <p class="lead" class='margin-top:5%;' >Simply, just drag & drop..</p>
        </header>







<div class="container">
    
    <br>
    <br>
    
    <!-- The container for the uploaded files -->
    <div id="files" class="col-md-12 files" style='margin-bottom:5%;'></div>
    <br>
    <br>
    <br>
    <br>



<!-- PROGRESS BAR  -->
<div class="row fileupload-buttonbar" style='position:fixed;bottom:0px;right:0px;width:100%;background-color:#101010;padding-top:1%;opacity:0.9;'>
            <div class="col-lg-7">
                <!-- The fileinput-button span is used to style the file input field as button -->
                <span class="btn btn-success fileinput-button">
                    <i class="glyphicon glyphicon-plus"></i>
                    <span>Add files...</span>
                    <!-- The file input field used as target for the file upload widget -->
                    <input id="fileupload" type="file" name="files[]" multiple>
                </span>
            </div>
            <!-- The global progress state -->
            <div class="col-lg-5">
                <!-- The global progress bar -->
                <div id="progress" class="progress">
                    <div class="progress-bar progress-bar-success"></div>
                </div>
                <!-- The global file processing state -->
                <span class="fileupload-process"></span>
            </div>
        </div>
<!-- PROGRESS BAR -->
</div>
<script>
    function grabFiles(link , i) {
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
            redirect_source : "mixtape",
            audiofile : link
        }).done(function(data){
            $('#form_'+i).html(data);
            scrollToAnchor('confirm_upload');
        });
        //alert("THIS: " +link+ $( this ).text() );
    }
</script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="<?php echo HTTP; ?>upload/js/vendor/jquery.ui.widget.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="//blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="//blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
<!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
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
<script>
/*jslint unparam: true, regexp: true */
/*global window, $ */
$(function () {
    'use strict';
    // Change this to the location of your server-side upload handler:
    var url = window.location.hostname === 'blueimp.github.io' ?
                '//jquery-file-upload.appspot.com/' : 'server/php/',
        uploadButton = $('<button/>')
            .addClass('btn btn-primary col-md-2 upload-action')
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
        acceptFileTypes: /(\.|\/)(gif|jpe?g|png|mp3|wav)$/i,
        maxFileSize: 500000000, // 500 MB
        // Enable image resizing, except for Android and Opera,
        // which actually support image resizing, but fail to
        // send Blob objects via XHR requests:
        disableImageResize: /Android(?!.*Chrome)|Opera/
            .test(window.navigator.userAgent),
        previewMaxWidth: 100,
        previewMaxHeight: 100,
        previewCrop: true
    }).on('fileuploadadd', function (e, data) {
        data.context = $('<div/>').appendTo('#files');
        $.each(data.files, function (index, file) {
            var node = $('<span/>')
                    .append($('<span/>').text(file.name));
            if (!index) {
                node
                    //.append('<br>')
                    .append(uploadButton.clone(true).data(data));
            }
            node.appendTo(data.context);
        });
    }).on('fileuploadprocessalways', function (e, data) {
        var index = data.index,
            file = data.files[index],
            node = $(data.context.children()[index]);
        if (file.preview) {
            node
                //.prepend('<br>')
                .prepend(file.preview);
        }
        if (file.error) {
            node
                //.append('<br>')
                .append($('<span class="text-danger"/>').text(file.error));
        }
        if (index + 1 === data.files.length) {
            data.context.find('button')
                .text('Upload')
                .prop('disabled', !!data.files.error);
        }
    }).on('fileuploadprogressall', function (e, data) {
        var progress = parseInt(data.loaded / data.total * 100, 10);
        $('#progress .progress-bar').css(
            'width',
            progress + '%'
        );
    }).on('fileuploaddone', function (e, data) {
        $.each(data.result.files, function (index, file) {
            if (file.url) {
                var link = $('<a class="col-md-12" style="margin:inline-block;margin:auto;">')
                    .attr('target', '_blank')
                    .prop('href', file.url)
                    .prepend("<button onclick='grabFiles(\"" + file.url + "\" , \""+ index +"\")' class='btn btn-warning btn-lg col-md-12'>Add to Profile</button>")
                    ;
                $(data.context.children()[index])
                    .wrap(link);
            } else if (file.error) {
                var error = $('<span class="text-danger"/>').text(file.error);
                $(data.context.children()[index])
                    .append('<br>')
                    .append(error);
            }
        });
    }).on('fileuploadfail', function (e, data) {
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
