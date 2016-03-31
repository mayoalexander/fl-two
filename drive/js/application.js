function fileValidation(){

    setInterval(function(){
        
        var img = $('#artwork_photo').val();
        var img_path = $('.photo-upload-results').find('img');
        var ext = img.split('.').pop();


        if (!img=='' && img_path.length==0) {

        if (ext.toLowerCase() !=='png' && ext.toLowerCase() !=='jpeg' && ext.toLowerCase() !=='jpg' && ext.toLowerCase() !=='gif') {
            var type = 'Uh oh, this file you\'ve selected is not a photo. Please upload a photo for the artwork!';
            alert(type);
            $('#artwork_photo').val('');
            return false;
        } else {
            // alert("its a photo!");
        }
        
        // hide input 
        $('#artwork_photo').hide();

                // alert(ext);

                var pleaseWait = '<i class="fa fa-circle-o-notch fa-spin" ></i>';

                // ------ NEW NEW NEW NEW ------ //
                $('.photo-upload-results').html(' ');
                $('.photo-upload-results').append(pleaseWait);
                $('.confirm-upload-buttons').prepend('<p class="wait" style="color:#303030;">Please wait..<p>');
                $('.confirm-upload-buttons').hide('fast');

                var path = 'http://freelabel.net/upload/server/php/upload-photo.php';
                var data;
                var formdata_PHO = $('#artwork_photo')[0].files[0];
                var formdata = new FormData();

                // Add the file to the request.
                formdata.append('photos[]', formdata_PHO);

            $.ajax({
                // Uncomment the following to send cross-domain cookies:
                xhrFields: {withCredentials: true},
                url: path,
                method: 'POST',
                cache       : false,
                processData: false,
                contentType: false, 
                fileElementId: 'image-upload',
                data: formdata,
                beforeSend: function (x) {
                        if (x && x.overrideMimeType) {
                            x.overrideMimeType("multipart/form-data");
                        }
                },
                // Now you should be able to do this:
                mimeType: 'multipart/form-data'    //Property added in 1.5.1
            }).always(function () {
                console.log(formdata_PHO);
            }).fail(function(jqXHR){
                // alert(jqXHR.statusText + 'oh no it didnt work!')
                $('.photo-upload-results').html('You didnt upload the correct file format!');
                $('.confirm-upload-buttons').show('fast');
                $('.confirm-upload-buttons').css('display','block');
                $('.wait').hide('fast');
            }).done(function (result) {
                $('.photo-upload-results').html(result);
                $('.confirm-upload-buttons').show('fast');
                $('.confirm-upload-buttons').css('display','block');
                $('.wait').hide('fast');
            });



    } // end of IF STATEMENT


    },3000);





            // trim twitter username
            $("#twitter").keypress(function() {
              var $y = $(this).val();
              var $newy = $y.replace(/\s+/g, '');
              if ($newy.toLowerCase().indexOf("@") >= 0) {
                // console.log('yes mane');
              //   $newy = $newy.append('@');
              } else {
                $newy = '@'+ $newy;
                // console.log('No mane');
              }
              $(this).val($newy);
            });





}