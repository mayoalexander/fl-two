jQuery('#infinite-footer').hide();
jQuery('#main-nav').hide();
jQuery('#wpadminbar').hide();
console.log('done!');

jQuery( "#login_button" ).click(function() {
  	alert( "Handler for .click() called." );
	window.open("https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=PA4HD77R69M68")
});

function userAccess(process) {
	if (process == 'login') {
		window.open("http://freelabel.net/user/register.php")
	}
	if (process == 'register') {
		r = confirm('You will be directed to PayPal to securely complete your purchase & mailing address info so we can send you of your personal Magazine & FL Subscription, you will be re-directed back to FREELABEL.net to register your Username & Password!');
		if (r==true) {
			window.open("https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=PA4HD77R69M68")
		}
	}
}