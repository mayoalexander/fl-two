<?php

$phone 			=	$_POST['phone'];
$twittername 	=	$_POST['twittername'];
$project_title 	=	$_POST['project_title'];
$email 			=	$_POST['email'];
$twitpic 		=	$_POST['twitpic'];
$type 			=	$_POST['type'];
$user_name 		=	$_POST['user_name'];
$mixtapephoto 		=	$_POST['mixtapephoto'];

if (strpos('@',$twittername)) {
        echo 'ok!';
} else {
        echo 'no!';
        $twittername        =        '@'.$twittername;
}




echo $phone."<br>" ;
echo $twittername."<br>" ;
echo $project_title."<br>" ;
echo $email."<br>" ;
echo $twitpic ."<br>";
echo $type ."<br>";
echo $user_name ."<br>"	;
echo $userphoto ."<br>"	;

		$tmp_name = $_FILES["project_zip"]["tmp_name"];
        $name = $project_title." - ".$twittername.' '.'FREELABEL.zip';
        $save_location	=	"../mixtapes/$name";
        $save_location_full	=	'http://freelabel.net/mixtapes/'.$name;
        if (move_uploaded_file($tmp_name, $save_location)){
        	echo 'ok! '.'<a href="'.$save_location_full.'">'.$save_location_full.'</a>';
        }	else {
        	echo 'nope!'.$save_location;
        }
        $tmp_name = $_FILES["mixtapephoto"]["tmp_name"];
        $name = $project_title." - ".$twittername.$_FILES["mixtapephoto"]["name"];
        $save_location	=	"../mixtapes/$name";
        $save_photo_location_full	=	'http://freelabel.net/mixtapes/'.$name;
        if (move_uploaded_file($tmp_name, $save_location)){
        	echo 'ok! '.'<a href="'.$save_photo_location_full.'">'.$save_photo_location_full.'</a>';
        }	else {
        	echo 'nope!'.$save_location;
        }

        $submission_date        =       date('Y-m-d H:i:s');

include('../inc/connection.php');

$sql="INSERT INTO  `amrusers`.`blog` (
`type` ,
`user_name` ,
`project_title` ,
`twitter` ,
`mixtapephoto` ,
`mixtapeurl` ,
`twitpic` ,
`email` ,
`phone` ,
`submission_date` ,
`approved`
)
VALUES (
'$type', '$user_name', '$project_title',  '$twittername' ,'$save_photo_location_full',  '$save_location_full',  '$twitpic',  '$email',  '$phone',  '$submission_date',  '0'
);";
				

		if (!mysqli_query($con,$sql))
				  {
				  die('Error: ' . mysqli_error($con));
				  }
				echo "<br>Saved To Database!";

				mysqli_close($con);




include('../inc/connection.php');

$new_result = mysqli_query($con,"SELECT * FROM blog WHERE project_title LIKE %$project_title%");
                $i = 0;
                while($row = mysqli_fetch_array($new_result)) {
                        $i = $i;
                        $project_title = $row['project_title '];
                        $project_id = $row['id '];
                }








                 echo "
                <script>
                 window.location.assign('http://mixtapes.freelabel.net')
                </script>

                ";



