function showShareButtons(type , id) {
	path = 'http://freelabel.net/config/share.js';
	$.post(path,{
		id : id,
		type : type
	}).done(function(data) {
		alert(data);
	});
}
function openShare(post_id) {
	//alert(post_id);
	$('#post_'+ post_id).slideToggle(500);
}