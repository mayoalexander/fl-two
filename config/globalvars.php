<?php 
function confirmStartSession() {
      if(session_id() == '' || !isset($_SESSION)) {
          // session isn't started
          session_start();
      }
}

    // TIME VALUES
      $todays_date = date('Y-m-d');
      $yesterdays_date = date('Y-m-d', strtotime("- 1 day"));
      $daybefore_date = date('Y-m-d', strtotime("- 2 days"));
      $threedaysback = date('Y-m-d', strtotime("- 3 days"));
      $fourdaysback = date('Y-m-d', strtotime("- 4 days"));
      $fivedaysback = date('Y-m-d', strtotime("- 5 days"));

      $todays_date = date('Y-m-d');
      $tomorrows_date = date('Y-m-d', strtotime("+ 1 day"));
      $dayafter_date = date('Y-m-d', strtotime("+ 2 days"));
      $threedaysahead = date('Y-m-d', strtotime("+ 3 days"));
      $fourdaysahead = date('Y-m-d', strtotime("+ 4 days"));
      $fivedaysahead = date('Y-m-d', strtotime("+ 5 days"));


      // DEFAULT TWITPICS
      $twitpic_default_mixtape = "pic.twitter.com/2LCtg6AzOz";
      $twitpic_default_single = "https://cards.twitter.com/cards/gueorv/2p5t";
      $twitpic_magazine = "https://cards.twitter.com/cards/gueorv/2p5t";
      $twitpic_mixtape = "https://cards.twitter.com/cards/gueorv/2p5t";
      $twitpic_public_submission = "pic.twitter.com/VBfMVWSS78";
      $flmag_twitpic    = 'pic.twitter.com/olbXT1r6uL';
      $check_out_fan = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=RZ2VGDNR3KR3E";


      // PRICING
      $weekly   = array('$15','https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=JVU79MUVJ3FQS');
      // https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=J67CSAKQMWDT8
      $lite = array('$7','https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=J67CSAKQMWDT8');
      $freetrial = array("$25","https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=5WHP3BJ74C44L");
      $baewatch = array("$19","https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=CNGEJ83VL3BEC");
      $singles = array("$15","https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=CYF4JL4ML32H8","$199","https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=QVPVU6NYMFK58");
      $projects = array("$59","https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=9KFQV9T9SPD64","$350","https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=QVPVU6NYMFK58",'$15','https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=JVU79MUVJ3FQS');
      $exclusive = array("$200","https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=LEJHAKLPR5WEA","$2,250","https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=UE2MP2DKHBHZU");
      $magazine = array("$10","https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=PA4HD77R69M68");
      $professional = array('$500','https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=Q8NXTGQE4SAZN');
      $pay_rate = 0.0025;



    // PREWRITTEN MESSAGES
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// TWEET SHARE MESSAGE
      if (isset($prefix_action)) {
        $tweet_single = urlencode($prefix_action."

        \"".$full_track_name ."\"
        by ".$twittername."

        ".$playerpath_clean."
        ".$twitpic);
      }
      

 /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




 /////// PRE BUILT FORMS

      $studio_form = '
      <h2>
      Book A Session:
      </h2>

      <!--<button class="btn btn-primary btn-xs" onclick="showBooking()" >Book A Studio Session</button>
      <br>-->
      <div id="booking_session_form" >
      <form method="post" action="http://freelabel.net/test/send_email.php" enctype="multipart/form-data" onsubmit="return validateForm();"  class="panel panel-body" style="color:#000;" > 
      
      <label>Type of Session:</label>
      <select class="form-control" name="type_of_session" >
      <option value="Audio Production">Audio Recording, Mixing, Mastering</option>
      <option value="Business Development">Business Consultation + Development</option>
      <option value="Graphic / Web Design">Graphic Design + Web Development</option>
      <option value="Visual Production">Photo + Video Production Shoot</option>
      </select>

      <label>Name:</label>
      <input type="text" name="inquiry_name" placeholder="What\'s Your Name?" class="form-control" required>

      <label>Phone:</label>
      <input type="text" name="phone" placeholder="What\'s Your Contact #?" class="form-control" required>

      <label>Email:</label>
      <input type="text" name="email" placeholder="What\'s Your Email?" class="form-control" required>

      <label>Requested Session Date:</label>
      <input type="text" name="session_date" placeholder="When would you like to come in for your session?" class="form-control" required>

      <label>Description // Comments:</label>
      <textarea name="session_description" rows="4" cols="80" class="form-control" style="padding:2%;border-radius:10px;" placeholder="Tell us more about yourself and the projects you\'re working on." required ></textarea>
      <br><br>

      <input type="hidden" name="studio_inquiry" value="1" >


      <h4>Upload any Roughs, Skeletons, Instrumental Tracks</h4>
      <input type="file" name="file" class="form-control"><br><br>
      <input type="submit" name="submit" class="btn btn-primary" value="Book Studio">
      </form>
      </div>
      ';


      
