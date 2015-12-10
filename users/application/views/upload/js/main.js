/* * jQuery File Upload Plugin JS Example 8.9.1
 * https://github.com/blueimp/jQuery-File-Upload
 * * * * * * * * * * *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 * * * * * * * * * * * * *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 * * global $, window */

$(function () {
    'use strict';

    // Initialize the jQuery File Upload widget:
    $('#fileupload').fileupload({
        // Uncomment the following to send cross-domain cookies:
        xhrFields: {withCredentials: true},
        url: 'server/php/'
    });

    // Enable iframe cross-domain access via redirect option:
    $('#fileupload').fileupload(
        'option',
        'redirect',
        window.location.href.replace(
            /\/[^\/]*$/,
            '/cors/result.html?%s'
        )
    );


    if (userNameSession=='admin') {
        // var existing_files_path = $('#fileupload').fileupload('option', 'url');
        //var existing_files_path = $('#fileupload').fileupload('option', 'url') + '/files/'+ userNameSession+'/';
        var existing_files_path = "http://freelabel.net/admin/TV/";
    } else {
        // HIDE ALL THE FILES
        // var existing_files_path = $('#fileupload').fileupload('option', 'url') + '/files/'+ userNameSession+'/';
        var existing_files_path = "http://freelabel.net/admin/TV/";
        //var existing_files_path = $('#fileupload').fileupload('option', 'url');


    }
    //alert($('#fileupload').fileupload('option', 'url'));
    if (window.location.hostname === 'freelsabel.net') {
        // Demo settings:
        $('#fileupload').fileupload('option', {
            // url: '//jquery-file-upload.appspot.com/',
            url: 'server/php/',
            // // Enable image resizing, except for Android and Opera,
            // // which actually support image resizing, but fail to
            // // send Blob objects via XHR requests:
            disableImageResize: /Android(?!.*Chrome)|Opera/
                .test(window.navigator.userAgent),
            maxFileSize: 500000000, // 500 MB
            acceptFileTypes: /(\.|\/)(gif|jpe?g|png|mp3|wav)$/i
        });
        // Upload server status check for browsers with CORS support:
        if ($.support.cors) {
            $.ajax({
                url: '//jquery-file-upload.appspot.com/',
                type: 'HEAD'
            }).fail(function () {
                $('<div class="alert alert-danger"/>')
                    .text('Upload server currently unavailable - ' +
                            new Date())
                    .appendTo('#fileupload');
            });
        }
    } else {
        // Load existing files:
        $('#fileupload').addClass('fileupload-processing');
        $.ajax({
            // Uncomment the following to send cross-domain cookies:
            xhrFields: {withCredentials: true},
            url: existing_files_path,
            dataType: 'json',
            context: $('#fileupload')[0]
        }).always(function () {
            $(this).removeClass('fileupload-processing');
        }).done(function (result) {
            $(this).fileupload('option', 'done')
                .call(this, $.Event('done'), {result: result});
        });
    }

});
