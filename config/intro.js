$(".action").click(function() {

			var action = $('.call-to-action');
			var modal = $(this).text();
			$(this).fadeToggle("slow",function(){

				if (modal == "Login") {
					// Lauch Modal
					$('#' + modal).modal();
					// Show Please Wait
					$(".modal-body").html('Please Wait..');
					// LOAD Data and Display into Modal
					$('body').hide('slow');
					setTimeout(function(){
						window.location.assign('http://freelabel.net/form/login/');
					},1000);
					/*$.post("http://freelabel.net/submit/views/signin.php").done(function(data) {
						$(".modal-body").html(data);
					});*/
				}

				if (modal == "More Info") {
					$('html').css("background-color", "#3498db");//.fadeToggle('slow');
					$('body').fadeToggle('slow');
					setTimeout(function(){
						//var newWindow =window.open('http://freelabel.net/sections/');
						window.location.assign('http://freelabel.net/sections/');
					},1000);
					// Open New Window to Registration Page

					//var path = 'http://freelabel.net/form/register/';
					//var path = 'http://freelabel.net/product/compare/';
					//window.open(path);

					//window.open(path);
				}

				if (modal == "Register") {
					$('html').css("background-color", "#101010");//.fadeToggle('slow');
					$('body').fadeToggle('slow');
					setTimeout(function(){
						//var newWindow =window.open('http://freelabel.net/sections/');
						window.location.assign('http://freelabel.net/product/compare/');
					},1000);

				}

				if (modal == "Mag") {
					$('html').css("background-color", "#fff");//.fadeToggle('slow');
					$('body').fadeToggle('slow');
					setTimeout(function(){
						//var newWindow =window.open('http://freelabel.net/sections/');
						window.location.assign('http://freelabel.net/mag/view/');
					},1000);
					// Open New Window to Registration Page

					//var path = 'http://freelabel.net/form/register/';
					//var path = 'http://freelabel.net/product/compare/';
					//window.open(path);

					//window.open(path);
				}
				if (modal == "Upload") {
					$('html').css("background-color", "#101010");//.fadeToggle('slow');
					$('body').fadeToggle('slow');
					setTimeout(function(){
						//var newWindow =window.open('http://freelabel.net/sections/');
						//window.location.assign('http://upload.freelabel.net/');
						window.location.assign('http://freelabel.net/form/upload');
					},1000);
					// Open New Window to Registration Page

					//var path = 'http://freelabel.net/form/register/';
					//var path = 'http://freelabel.net/product/compare/';
					//window.open(path);

					//window.open(path);
				}
	
			});
});