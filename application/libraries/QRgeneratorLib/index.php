<?php
/*
 * PHP QR Code encoder
 *
 * Exemplatory usage
 *
 * PHP QR Code is distributed under LGPL 3
 * Copyright (C) 2010 Dominik Dzienia <deltalab at poczta dot fm>
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
 */
?>
    <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </head>
    <body>
    <div class="container">
    <div class="row">
    <div class="col-12">
    <h1 class="h1 text-center">PHP QR Code</h1>
    </div>
    </div>
    </div>


    </body>
 <?php
//set it to writable location, a place for temp generated PNG files
$PNG_TEMP_DIR = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'temp' . DIRECTORY_SEPARATOR;

//html PNG location prefix
$PNG_WEB_DIR = 'temp/';

include "qrlib.php";

//ofcourse we need rights to create temp dir
if (!file_exists($PNG_TEMP_DIR)) {
    mkdir($PNG_TEMP_DIR);
}

$filename = $PNG_TEMP_DIR . 'test.png';

//processing form input
//remember to sanitize user input in real-life solution !!!
$errorCorrectionLevel = 'L';
if (isset($_REQUEST['level']) && in_array($_REQUEST['level'], array('L', 'M', 'Q', 'H'))) {
    $errorCorrectionLevel = $_REQUEST['level'];
}

$matrixPointSize = 4;
if (isset($_REQUEST['size'])) {
    $matrixPointSize = min(max((int) $_REQUEST['size'], 1), 10);
}

if (isset($_REQUEST['data'])) {

    //it's very important!
    if (trim($_REQUEST['data']) == '') {
        die('data cannot be empty! <a href="?">back</a>');
    }

    // user data
    $filename = $PNG_TEMP_DIR . 'test'.rand(0,400).'.png';
    QRcode::png($_REQUEST['data'], $filename, $errorCorrectionLevel, $matrixPointSize, 2);

} else {

    //default data
    echo ' <div class="container">
    <div class="row">
    <div class="col-12">
    <p class="text-center">You can provide data in GET parameter: <a class="" href="?data=like_that">like that</a></p><hr/>
    </div>
    </div>
    </div>
';
    QRcode::png('PHP QR Code :)', $filename, $errorCorrectionLevel, $matrixPointSize, 2);

}

//display generated file
echo '<img class="img img-responsive img-fluid rounded mx-auto d-block" src="' . $PNG_WEB_DIR . basename($filename) . '" /><hr/>';

//config form
echo '<form action="index.php" method="post" class="form-group">
        <div class="container-fluid">
        <div class="row">
        <div class="col-md">
        <p class="h4">Data:</P><input name="data" class="form-control" type="text" value="' . (isset($_REQUEST['data']) ? htmlspecialchars($_REQUEST['data']) : 'PHP QR Code :)') . '" />
        </div>
        <div class="col-md">
        <p class="h4">ECC:</P><select class="form-control" id="exampleFormControlSelect1" name="level">
            <option value="L"' . (($errorCorrectionLevel == 'L') ? ' selected' : '') . '>L - smallest</option>
            <option value="M"' . (($errorCorrectionLevel == 'M') ? ' selected' : '') . '>M</option>
            <option value="Q"' . (($errorCorrectionLevel == 'Q') ? ' selected' : '') . '>Q</option>
            <option value="H"' . (($errorCorrectionLevel == 'H') ? ' selected' : '') . '>H - best</option>
        </select>  
        </div>
        
        <div class="col-md">
        <p class="h4">Size:</P>
        <select class="form-control" id="exampleFormControlSelect1" name="size">
        ';
        
for ($i = 1; $i <= 10; $i++) {
    echo '<option value="' . $i . '"' . (($matrixPointSize == $i) ? ' selected' : '') . '>' . $i . '</option>';
}

echo '</select>
    </div>
    <div class="col-md">    
    <input class="form-group btn btn-primary" style="margin-top:35px;" type="submit" value="GENERATE"></form>
    </div></br>
    </br>';

// benchmark

//QRtools::timeBenchmark();


?>