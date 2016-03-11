      function scrollToAnchor(aid){
        var aTag = $("a[name='"+ aid +"']");
        $('html,body').animate({scrollTop: aTag.offset().top},'slow');
      }
      function setActive(icon) {
        $('.widget_menu .glyphicon').removeClass('active');
        $('.widget_menu .glyphicon-' + icon).addClass('active');
      }

      function loadPage(path , containerDiv, page , user_name, id, setActiveIcon,ctrl) {
        if ($(containerDiv).css('display') == 'none') {
          $(containerDiv).css('display','block');
        }
        $(containerDiv).html("<img src='http://freelabel.net/upload/server/php/files/ajax-loader.gif' style='text-align:center;margin:20%;' >");
        $.get('http://freelabel.net/config/remember_recent.php',{
          containerDiv: page,
          user_name: user_name,
          recent_page: path
        }).done(function(data){
          //console.log('Recent View: ');
          console.log(data);
        });
        $.post(path, { 
          user_name : user_name,
          page : page,
          id : id
        } )
        .done(function( data ) {
          $(containerDiv).html(data);
          //scrollToAnchor(containerDiv.replace('#',''));
          //alert(setActiveIcon);
          if(setActiveIcon!==null) {
            setActive(setActiveIcon);
          }
        });
        //alert(ctrl);
        if (ctrl!==undefined) {
          var stateObj = { foo: "bar" };
          history.pushState(stateObj, "page 2", '?ctrl='+ctrl);
        }
        

      }
      function openProfile(user_name) {
        window.open('http://x.freelabel.net/?i=' + user_name);
      }

      function shareTwitter(textToTweet , twittername) {
        if (twittername != '') {
          shareURL = 'https://twitter.com/intent/tweet?screen_name=&text=' + textToTweet;
            //shareURL = 'http://freelabel.net/som/index.php?dm=1&t='+ twittername +'&text=' + textToTweet;
          } else {
            shareURL = 'https://twitter.com/intent/tweet?screen_name=&text=' + textToTweet;
          }
          window.open(shareURL);
        }

        function shareOnTwitter(textToTweet , twittername) {
          if (twittername != '') {
            shareURL = 'https://twitter.com/intent/tweet?screen_name=&text=' + textToTweet;
            //shareURL = 'http://freelabel.net/som/index.php?dm=1&t='+ twittername +'&text=' + textToTweet;
          } else {
            shareURL = 'https://twitter.com/intent/tweet?screen_name=&text=' + textToTweet;
          }
          window.open(shareURL);
        }


        function shareTumblr(blogtitle , caption , content, tags , url) {
          shareURL = "https://www.tumblr.com/widgets/share/tool?posttype=link&title=" + blogtitle + "%20%7C%20Tumblr&caption=" + caption + "&content="+ content +"&tags="+tags+"&canonicalUrl="+url+"&shareSource="+source;
          window.open(shareURL);
        }

        function deleteUser(user_id) {
          $.post('http://freelabel.net/submit/deletesingle.php', { 
            user_id : user_id
          //id : id
        } )
          .done(function( data ) {
            alert('User Reset! Enter your new login information!: ' + data);
          //$('#main_content').html(data);
          window.location.assign('http://freelabel.net/user/register.php');
        });
        }

        function showBooking()
        {
          bookingSessionForm =  document.getElementById('booking_session_form');
          bookingSessionForm.style.display = 'block';
          bookingSessionForm.style.opacity = '1';
          bookingSessionForm.style.height = '800px';
        }

        function bookSession()
        {
          bookingSessionForm =  document.getElementById('booking_session_form');
          bookingSessionForm.style.display = 'block';
          bookingSessionForm.style.opacity = '1';
          bookingSessionForm.style.height = '800px';
        }

        function sendEmail(email, subject, body, containerID , user_name, template)
        {
          $.post('http://freelabel.net/test/send_email.php', { 
            to : email,
            subject : subject,
            body : body,
            email_submitted : 1,
            user_name : user_name,
            template : template
          })
          .done(function( data ) {
            alert(data);
            $(containerID).html(data);
          });

        }

        function scrollToAnchor(aid){
          var aTag = $("a[name='"+ aid +"']");
          $('html,body').animate({scrollTop: aTag.offset().top},'slow');
        }

        function openThing(image_link) {
            //alert(image_link);
            var mainImageContainer = $("#main_image_showcase");
            mainImageContainer.fadeOut(500).attr('src' , image_link).fadeIn(500);
            scrollToAnchor("main_image_showcase");
          } 
          function PurchaseMusic(mp3, twitter, trackname) {
            window.open( 'http://freelabel.net/user/?DL=' + mp3 + '&twittername=' + twitter + '&trackname=' + trackname);
          }
          function editProfile (user_name, subscriber_email) {
            var path = 'http://freelabel.net/config/edit_profile.php', 
            display = '#main_display_panel';
            $.post(path,{
              user_name : user_name,
              user_email : subscriber_email
            }).done(function(data){
              $(display).html(data);
            });
          }
          function followOnFL(artistUserName) {
            alert('You will need to be logged into your FL account!');
            open('http://freelabel.net/?ref=' +  artistUserName);
          }
          function togglePlayer() {
            $('.click-start a').fadeToggle(100);
            $('#radio_player').fadeToggle(300);
          }

          function randomizePosts() {
            if (window.location == 'http://freelabel.net/submit/?control=blog&rand=1#blog_posts') {
              location.reload(false);
            } else {
              location.assign("?control=blog&rand=1#blog_posts");
            
            }
          }


          function likePost(post_id , current_likes , user_name ) {
          //alert('Thank you for voting!');
          //var thisdata = $(this);
          //console.log(thisdata);
          // alert(thisdata);
          var new_likes = current_likes + 1;
          $.post('http://freelabel.net/config/vote.php' , {
              post_id : post_id,
              user_name : user_name,
              type : "blog"
          }).done(function (data) {
            //alert(data);
              //alert(bae_image);
              //alert('Thank you for voting! : ' + data);
                    
                    $("#like_button" + post_id ).removeClass('btn-default');
                    $("#like_button" + post_id ).addClass('btn-success');
                    $("#like_button" + post_id ).addClass('btn-google-plus');
                    $("#like_button" + post_id ).css('background-color','green');
                    $("#like_button" + post_id ).html("<i class='fa fa-heart'></i> LIKED!");
                    $("body" ).append(data);
                    $('#current_likes' + post_id ).html(new_likes +  " LIKES");
                   



                    //alert('This post has been saved to your collection!');
                    //window.open('http://freelabel.net/download.php?p='+'&n='+'&n=t');
                    //window.open();
                    
                    /*setTimeout(function() {
                      $.get('show.php', {
                        id : bae_id
                      }).done(function(data){
                        $('#main').html(data);
                      });
                    }, 500); */
                  //featured_bae_image.src= imagelink    
          });
        }




  /*$('.create-account-button').click(function() {
    var path = 'http://freelabel.net/config/subscribe.php';
    $.get(path , {origin:'create-account'}).done(function(data) {
      //alert(data);
      $('.event-registration-body').html(data);
    });
  });*/



