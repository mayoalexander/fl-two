<?php 
        include_once($_SERVER['DOCUMENT_ROOT'].$_SERVER['REQUEST_URI'].'/config/index.php');
        include_once($_SERVER['DOCUMENT_ROOT'].$_SERVER['REQUEST_URI'].'/config/upload.php');
        $config = new UploadFile();
        $upload = new Upload();



//         if (isset($_GET['u'])) {
// 	        $filedata['email'] = $upload->getUserEmail($_GET['u']);
//             echo "<pre>";
// 			var_dump($filedata);
//         } else {
// 	        echo 'Nothing Found!';
//         }
        // $file['trackmp3'] = '';
        // $file['twitter'] = '@Ayehoe';
        // $file['trackname'] = 'Big Money Hunny';






		$file = 'http://freelabel.net/upload/server/php/files/Yamborghini%20High%20-%20ASAP%20Rocky%20%28Ft.%20ASAP%20Nast%20%26%20ASAP%20Ferg%29_242335219_soundcloud%20%283%29.mp3';
        $twitter = '@AyeYouhoe';
        $trackname = 'Big BIG Money';

        if ($upload->uploadToRadio($file,$twitter,$trackname, 'adminmayo')) {
            // echo 'file: '.$_GET['u'].'<br>';
        } else {
        	echo 'no errors!';
        }



?>