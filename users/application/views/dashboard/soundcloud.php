<script src="//connect.soundcloud.com/sdk.js"></script>
<script type="text/javascript">
  SC.initialize({
      client_id: "1f4ff48a42e78f1382d83d7d91cde4ec",
      redirect_uri: "http://freelabel.net/users/index/menu/",
  });

/**
Once that's done you are all set and ready to call the SoundCloud API. 
**/



/**
Call to the SoundCloud API. 
Retrieves list of tracks, and displays a list with links to the tracks showing 'tracktitle' and 'track duration'
**/

  var userId = 'mayoalexander'; // user_id of Prutsonic
  var tracktitle = 'Flips and Flights ft. Patches Mayo and Jalen Harts';
  SC.get("/tracks", {
      user_id: userId,
      title: tracktitle,
      limit: 100
  }, function (tracks) {
  		console.log(tracks);
      var tmp = '';

      for (var i = 0; i < tracks.length; i++) {

          tmp = '<a href="' + tracks[i].permalink_url + '"><img src="'+ tracks[i].artwork_url +'" width="20px" >' + tracks[i].title + ' - ' + tracks[i].duration + '</a>';

          $("<li/>").html(tmp).appendTo("#track-list");
      }

  });


</script>
<body>
	<h2>what he hel</h2>
    <ol id="track-list"></ol>
</body>