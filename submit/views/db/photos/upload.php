<?php
//If directory doesnot exists create it.
$output_dir = "uploads/";
$user_name = 'admin';

if(isset($_FILES["myfile"]))
{
	$ret = array();

	$error =$_FILES["myfile"]["error"];
   {
    
    	if(!is_array($_FILES["myfile"]['name'])) //single file
    	{
            $RandomNum   = time();
            
            $ImageName      = str_replace(' ','-',strtolower($_FILES['myfile']['name']));
            $ImageType      = $_FILES['myfile']['type']; //"image/png", image/jpeg etc.
         
            $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
            $ImageExt       = str_replace('.','',$ImageExt);
            $ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
            $NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;

            $saved_photo_path_http    = 'http://freelabel.net/submit/views/db/photos/'.$output_dir. $NewImageName;

       	 	move_uploaded_file($_FILES["myfile"]["tmp_name"],$output_dir. $NewImageName);
       	 	 //echo "<br> Error: ".$_FILES["myfile"]["error"];
            // Insert into database
            if (file_exists('inc/connection.php') == true ) {
                    include('inc/connection.php');
                } ;
                if (file_exists('../inc/connection.php') == true) {
                    include('../inc/connection.php');
                } ;
                if (file_exists('../../inc/connection.php') == true) {
                    include('../../inc/connection.php');
                } ;
                if (file_exists('../../../inc/connection.php') == true) {
                    include('../../../inc/connection.php');
                }
                if (file_exists('../../../../inc/connection.php') == true) {
                    include('../../../../inc/connection.php');
                }
                                $sql="INSERT INTO  `amrusers`.`images` (
                                    `id` ,
                                    `user_name` ,
                                    `title` ,
                                    `desc` ,
                                    `image`,
                                    `date`
                                    )
                                    VALUES (
                                    '$id',
                                    '$user_name', 
                                    '$title' , 
                                    '$desc', 
                                    '$saved_photo_path_http', 
                                    '$date'
                                    );";
                                if (mysqli_query($con,$sql))
                                  {  
                                  echo "
                                  
                                  <script>
                                  alert('Upload Successful!')
                                  window.location.assign('http://freelabel.net/submit/index.php?control=photos#photos');
                                  </script>
                                  
                                  <h1>Thank you for joining our ME2.GURU newsletter!</h1>";
                                    echo '<p>Stay tuned with all of our updates!<p>';
                                    
                                    echo '<br><br><br><br>';
                                    }
                                else
                                  {
                                  echo "Error creating database entry: " . mysqli_error($con);
                                  }


       	 	 
	       	 	 $ret[$fileName]= $output_dir.$NewImageName;
    	}
    	else
    	{
            $fileCount = count($_FILES["myfile"]['name']);
    		for($i=0; $i < $fileCount; $i++)
    		{
                $RandomNum   = time();
            
                $ImageName      = str_replace(' ','-',strtolower($_FILES['myfile']['name'][$i]));
                $ImageType      = $_FILES['myfile']['type'][$i]; //"image/png", image/jpeg etc.
             
                $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
                $ImageExt       = str_replace('.','',$ImageExt);
                $ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
                $NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
                
                $ret[$NewImageName]= $output_dir.$NewImageName;
    		    move_uploaded_file($_FILES["myfile"]["tmp_name"][$i],$output_dir.$NewImageName );
    		}
    	}
    }
    echo json_encode($ret);
 
}

?>