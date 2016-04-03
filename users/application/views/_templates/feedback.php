<?php

// get the feedback (they are arrays, to make multiple positive/negative messages possible)
// $feedback_positive = Session::get('feedback_positive');
// $feedback_negative = Session::get('feedback_negative');

$feedback_positive = $_SESSION['feedback_positive'];
$feedback_negative = $_SESSION['feedback_negative'];

 

// POSITIVE
if (isset($feedback_positive)) {
	$feedback_positive = array_reverse($feedback_positive);
        echo '<alert class="label label-success feedback success"><i class="fa fa-exclamation"></i> '.$feedback_positive[0].'</alert>';
}

// NEGATIVE
if (isset($feedback_negative)) {
	$feedback_negative = array_reverse($feedback_negative);
        echo '<div class="label label-danger feedback error"><i class="fa fa-exclamation"></i> '.$feedback_negative[0].'</div>';
}
