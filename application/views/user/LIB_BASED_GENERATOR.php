<?php
//set it to writable location, a place for temp generated PNG files
$PNG_TEMP_DIR = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'temp' . DIRECTORY_SEPARATOR;

//html PNG location prefix
$PNG_WEB_DIR = 'temp/';

include "includes/QRgeneratorLib/qrlib.php";

//ofcourse we need rights to create temp dir
if (!file_exists($PNG_TEMP_DIR)) {
    mkdir($PNG_TEMP_DIR);
}

$filename = $PNG_TEMP_DIR . 'test.png';

if (isset($_REQUEST['txtMob'])) {

    //it's very important!
    if (trim($_REQUEST['data']) == '') {
        die('data cannot be empty! <a href="?">back</a>');
    }

    // user data
    $filename = $PNG_TEMP_DIR . 'test'.rand(0,400).'.png';
    QRcode::png($_REQUEST['data'], $filename, 'H', 10, 2);

}
else 
{
    //default data
    QRcode::png('PHP QR Code :)', $filename, 'L', 4, 2);

}

//display generated file
echo '<img class="img img-responsive img-fluid rounded mx-auto d-block" src="' . $PNG_WEB_DIR . basename($filename) . '" /><hr/>';

