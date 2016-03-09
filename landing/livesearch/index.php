<?php

$content ='<script type="text/javascript" src="jquery-1.8.0.min.js"></script>
<script type="text/javascript">
$(function(){
$(".search").keyup(function() 
{ 
var searchid = $(this).val();
var dataString = \'search=\'+ searchid;
if(searchid!=\'\')
{
    $.ajax({
    type: "POST",
    url: "http://freelabel.net/landing/livesearch/search.php",
    data: dataString,
    cache: false,
    success: function(html)
    {
    $("#result").html(html).show();
    }
    });
}return false;    
});

jQuery("#result").live("click",function(e){ 
    var $clicked = $(e.target);
    var $name = $clicked.find(\'.name\').html();
    var decoded = $("<div/>").html($name).text();
    $(\'#searchid\').val(decoded);
});
jQuery(document).live("click", function(e) { 
    var $clicked = $(e.target);
    if (! $clicked.hasClass("search")){
    jQuery("#result").fadeOut(); 
    }
});
$(\'#searchid\').click(function(){
    jQuery("#result").fadeIn();
});
});
</script>

<style type="text/css">
    .content{
        // width:900px;
        // margin:0 auto;
    }
    #searchid
    {
        // width:500px;
        // border:solid 1px #000;
        // padding:10px;
        // font-size:14px;
    }
    #result
    {
        position:absolute;
        width:251px;
        padding:10px;
        display:none;
        margin-top:-1px;
        border-top:0px;
        overflow:hidden;
        border:1px #CCC solid;
        background-color: #202020;
        color:#e3e3e3;
    }
    .show
    {
        padding:10px; 
        border-bottom:1px #101010 dashed;
        // font-size:15px; 
        // height:100px;
    }
    .show:hover
    {
        background:#4c66a4;
        color:#FFF;
        cursor:pointer;
    }
</style>

<form method="GET" action="http://freelabel.net/users/index/search/">
    <input placeholder="Search" name="q" type="search" id="searchid" class="search gn-search" placeholder="Search for music, videos, albums, artists, radio shows and more" >
    <a class="gn-icon gn-icon-search"><span>Search</span></a>
</form>




';


$pre = 1;
$title = "How to Integrate live search in PHP and MySQL with jQuery";
$heading = "How to Integrate live search in PHP and MySQL with jQuery example.";
include("html.inc");
?>