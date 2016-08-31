<?php 
	include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
?>
<style type="text/css">
	.main_twitter_panel {
		/*background-color: #e3e3e3;*/
		min-height:60vh;
	}
	.twitter-controls-group .btn {
		font-size:0.45em;
		border-radius: 0;
		width:100%;
	}
	.twitter-controls-group i {
		width:30px;
	}
</style>
<!-- <button class="card card-chart btn-lg col-xs-6 col-md-12" onclick="loadFeed('http://freelabel.net/twitter/index.php', '.main_twitter_panel', 'timeline', 'admin','','calendar')"><i class="fa fa-list"></i> Timeline</button> -->

<div class="btn-group-vertical col-md-2 twitter-controls-group ">
	<!-- <button onclick="$('#som_buttons').slideToggle();" class="card card-chart btn-secondary-outline btn-lg"><i class="fa fa-ellipsis-h"></i></button> -->
	<button class="card card-chart" onclick="$('#som_buttons').slideToggle();" alt="mentions"><i class="fa fa-ellipsis-h"></i> Mentions</button>
	<button class="card card-chart" onclick="loadFeed('http://freelabel.net/twitter/index.php', '.main_twitter_panel', 'mentions', 'admin','','calendar')" alt="mentions"><i class="fa fa-comments"></i> Mentions</button>
	<button class="card card-chart" onclick="loadFeed('http://freelabel.net/twitter/index.php', '.main_twitter_panel', 'followers', 'admin','','calendar')"><i class="fa fa-users"></i> Followers</button>
	<button class="card card-chart" onclick="loadFeed('http://freelabel.net/twitter/index.php', '.main_twitter_panel', 'timeline', 'admin','','calendar')"><i class="fa fa-list"></i> Timeline</button>
	<button class="card card-chart" onclick="loadFeed('http://freelabel.net/twitter/index.php', '.main_twitter_panel', 'direct_messages_auto_rtm', 'admin','','calendar')" alt="messages"><i class="fa fa-usd"></i> RESPOND</button>

</div>

<div class="main_twitter_panel col-md-10"></div>

<script type="text/javascript">
	
		function loadFeed(path , containerDiv, page , user_name, id, setActiveIcon) {
        if ($(containerDiv).css('display') == 'none') {
          $(containerDiv).css('display','block');
        }
        $(containerDiv).html("<img src='http://img.freelabel.net/loading.gif' style='text-align:center;margin:20%;' >");
        $.post(path, { 
          user_name : user_name,
          page : page,
          id : id
        } )
        .done(function( data ) {
          $(containerDiv).html(data);
          scrollToAnchor(containerDiv.replace('#',''));
          //alert(setActiveIcon);
          if(setActiveIcon!==null) {
            setActive(setActiveIcon);
          }
        });
      }


</script>
