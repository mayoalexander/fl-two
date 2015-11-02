<?php 
// grab the requested file's name
$Source_File    =   $_GET['p'];
$Download_Name    =   $_GET['n'];
$Mime_type    =   $_GET['t'];


if ($Mime_type == 'png') {
    $Download_Name    =   $_GET['n'].'.png';
    $Source_File = str_replace('http://freelabel.net/submit/uploads/', './submit/uploads/', $Source_File);
} else {
    $Download_Name    =   $_GET['n'].'.mp3';
    $Source_File = str_replace('http://freelabel.net/upload/', './upload/', $Source_File);
}

    






if(isset($Source_File)){
    header('Content-type: audio/mpeg');
    header('Content-Disposition: attachment; filename="'.$Download_Name.'"');
    header('Content-Length: '.@filesize($Source_File));
    readfile($Source_File);
    exit();
}





/*
$Source_File = $Source_File;

// make sure it's a file before doing anything!
if(is_file($Source_File)) {

    /*
        Do any processing you'd like here:
        1.  Increment a counter
        2.  Do something with the DB
        3.  Check user permissions
        4.  Anything you want!
   

    // required for IE
    if(ini_get('zlib.output_compression')) { ini_set('zlib.output_compression', 'Off'); }

    // get the file mime type using the file extension
    switch($mime_type) {
        case 'pdf': $mime = 'application/pdf'; break;
        case 'zip': $mime = 'application/zip'; break;
        case 'jpeg':
        case 'jpg': $mime = 'image/jpg'; break;
        default: $mime = 'application/force-download';
    }
    header('Pragma: public');   // required
    header('Expires: 0');       // no cache
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Last-Modified: '.gmdate ('D, d M Y H:i:s', filemtime ($Source_File)).' GMT');
    header('Cache-Control: private',false);
    header('Content-Type: '.$mime);
    header('Content-Disposition: attachment; filename="'.basename($Source_File).'"');
    header('Content-Transfer-Encoding: binary');
    header('Content-Length: '.filesize($Source_File));    // provide file size
    header('Connection: close');
    readfile($Source_File);       // push it out
    exit();
     */
?>

