function page(url, page) {
  var element = $('#section-linemove-1');
  element.html('Loading..');
  $.get('http://freelabel.net/users/index/page/', {
  	page: page
  }, function(result){
  	$('#section-linemove-1').html(result);
  } );
}

function promos(page, tag) {
  var element = $('#promos_content');
  element.html('Loading..');
  $.get('http://freelabel.net/users/dashboard/get_promos/', {
  	page: page,
  	tag: tag
  }, function(result){
  	$('#promos_content').html(result);
  } );
}
