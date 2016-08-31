<?php 
include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
include(ROOT.'inc/connection.php');
//exit;


function captureVideoPosterImg($movie_file = '')
{
    extension_loaded('ffmpeg');
    $movie_file = 'http://upload.freelabel.net/server/php/files/JXL%20%23CrunkDUpTour%20Promo.mp4';
    // Instantiates the class ffmpeg_movie so we can get the information you want the video  
    $movie = new ffmpeg_movie($movie_file);  
    // Get The duration of the video in seconds  
    echo $Duration = round($movie->getDuration(), 0);  
    // Get the number of frames of the video  
    $TotalFrames = $movie->getFrameCount();  
    // Get the height in pixels Video  
    $height = $movie->getFrameHeight();  
    // Get the width of the video in pixels  
    $width = $movie->getFrameWidth();  
    //Receiving the frame from the video and saving 
    // Need to create a GD image ffmpeg-php to work on it  
    $image = imagecreatetruecolor($width, $height);  
    // Create an instance of the frame with the class ffmpeg_frame  
    $Frame = new ffmpeg_frame($image);  
    // Choose the frame you want to save as jpeg  
    $thumbnailOf = (int) round($movie->getFrameCount() / 2.5);  
    // Receives the frame  
    $frame = $movie->GetFrame($thumbnailOf);  
    // Convert to a GD image  
    $image = $frame->toGDImage();  
    // Save to disk.  
    //echo $movie_file.'.jpg';
    imagejpeg($image, $movie_file.'.jpg', 100);

    return $movie_file.'.jpg';
}

echo captureVideoPosterImg('http://upload.freelabel.net/server/php/files/JXL%20%23CrunkDUpTour%20Promo.mp4');