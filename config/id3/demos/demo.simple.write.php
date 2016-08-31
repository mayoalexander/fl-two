<?php
// var_dump($_GET);
/////////////////////////////////////////////////////////////////
/// getID3() by James Heinrich <info@getid3.org>               //
//  available at http://getid3.sourceforge.net                 //
//            or http://www.getid3.org                         //
//          also https://github.com/JamesHeinrich/getID3       //
/////////////////////////////////////////////////////////////////
//                                                             //
// /demo/demo.simple.write.php - part of getID3()              //
// Sample script showing basic syntax for writing tags         //
// See readme.txt for more details                             //
//                                                            ///
/////////////////////////////////////////////////////////////////

//die('Due to a security issue, this demo has been disabled. It can be enabled by removing line '.__LINE__.' in '.$_SERVER['PHP_SELF']);

$TextEncoding = 'UTF-8';

require_once('../getid3/getid3.php');
// Initialize getID3 engine
$getID3 = new getID3;
$getID3->setOption(array('encoding'=>$TextEncoding));

require_once('../getid3/write.php');
// Initialize getID3 tag-writing module
$tagwriter = new getid3_writetags;

function fixGetURL($url) {
	// $url = urldecode($url);
	$mp3 = str_replace('http://freelabel.net/', '/kunden/homepages/0/d643120834/htdocs/', $url);
	return $mp3;
}
if ($_GET['mp3']!=='') {
	$mp3 = fixGetURL($_GET['mp3']);
} else {
	echo 'No Data Sent!';
	exit;
}
$tagwriter->filename = $mp3;
//$tagwriter->filename = '../../../upload/server/php/files/Akobi_%20First%20Born%20S%20%28u%29%20n%20%281%29.mp3';
//$tagwriter->filename = '/kunden/homepages/0/d643120834/htdocs/upload/server/php/files/Akobi_%20First%20Born%20S%20%28u%29%20n%20%281%29.mp3';
//$tagwriter->filename = '/kunden/homepages/0/d643120834/htdocs/upload/server/php/files/nevercall.mp3';



$tagwriter->tagformats = array('id3v1');
//$tagwriter->tagformats = array('id3v2.3');

// set various options (optional)
$tagwriter->overwrite_tags    = true;  // if true will erase existing tag data and write only passed data; if false will merge passed data with existing tag data (experimental)
$tagwriter->remove_other_tags = false; // if true removes other tag formats (e.g. ID3v1, ID3v2, APE, Lyrics3, etc) that may be present in the file and only write the specified tag format(s). If false leaves any unspecified tag formats as-is.
$tagwriter->tag_encoding      = $TextEncoding;
$tagwriter->remove_other_tags = true;

// populate data array
$TagData = array(
	'title'         => array($_GET['title']),
	'artist'        => array($_GET['artist']),
	'album'         => array('FREELABEL PRESENTS: '.$_GET['artist']),
	'year'          => array('2015'),
	'genre'         => array('Good Music'),
	'comment'       => array('All New Music @ FREELABEL.net'),
	//'track'         => array('01/10'),
	'popularimeter' => array('email'=>'admin@freelabel.net', 'rating'=>128, 'data'=>0),
);
$tagwriter->tag_data = $TagData;

// write tags
if ($tagwriter->WriteTags()) {
	echo 'Success!';
	// print_r($_GET);
	if (!empty($tagwriter->warnings)) {
		echo 'There were some warnings:<br>'.implode('<br><br>', $tagwriter->warnings);
	}
} else {
	echo 'Failed to write tags!<br>'.implode('<br><br>', $tagwriter->errors);
}
