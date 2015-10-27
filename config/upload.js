var newpage = new Array();
 
function saveSingle(order,mp3file,user_name,twittername,trackname,twitpic,onsale,email,phone,photo,redirect_source)	{
			
			$.get('http://freelabel.net/config/id3/demos/demo.simple.write.php', {
				mp3: mp3file,
				title: trackname,
				artist: twittername
			},function(result){
				alert(result);
			});



			/*
			$.post( "http://freelabel.net/x/upload.php", { 
				submit: "submit",
				trackmp3: mp3file,
				loggedin: '1',
				twitter: twittername,
				twittername: twittername,
				trackname: trackname,
				twitpic: twitpic,
				user_name: user_name,
				onsale: onsale,
				email: email,
				phone: phone,
				photo: photo,
				redirect_source: redirect_source
			}, function( result ) {
				newpage[order] = result;
		        window.open('http://freelabel.net/config/Popup.php?i='+order,'','height=400, width=650, left=300, top=100, resizable=yes, scrollbars=yes, toolbar=yes, menubar=no, location=no, directories=no, status=yes');
		        //alert(newpage[order]);
			});

			*/
			/*.done(function( data ) {
				//$('#main_blog_poster').fadeOut();
				//alert( "Data Loaded AFTER: " + data );
				//alert(data);
				

				newpage = data;

		        window.open('../config/Popup.html', 'popUpWindow','height=400, width=650, left=300, top=100, resizable=yes, scrollbars=yes, toolbar=yes, menubar=no, location=no, directories=no, status=yes');
				//$('#results').html(data);
			}); */
			//alert(blogtitle);
	}