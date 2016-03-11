function getUrlVars() {
var vars = {};
var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
vars[key] = value;
});
return vars;
}

    // finds the tab data
    $('.tabs li').click(function(){
        var tabName = $(this).find('.dash-filter').attr('data-load');
        var stateObj = { foo: "bar" };

        // sets the history
        history.pushState(stateObj, "page 2", '?ctrl='+tabName);

        // Loading Please Wait Feature
        $('#' + tabName).html('<h3 class="text-muted" style="margin:10% 10%;"><i class="fa fa-cog fa-spin"></i> Loading...</h3>');
        
        // load the data in to the wrapper
        var url = 'http://freelabel.net/users/dashboard/' + tabName + '/' ;
        $.get(url, function(data){
          $('#' + tabName).html(data);
        })
    });