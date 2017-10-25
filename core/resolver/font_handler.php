<?php

// define absolute path to image folder
$font_folder = "/sites/$site/$view/assets/";


// get the image name from the query string
// and make sure it's not trying to probe your file system
$path = $_SERVER['REQUEST_URI'];

$font = $_SERVER['DOCUMENT_ROOT'].$font_folder.$path;
if (file_exists($font)) {
    // get the filename extension
    $ext = substr($font, -3);
    // set the MIME type
    switch ($ext) {
        case 'eot':
            $mime = 'image/jpeg';
            break;
        case 'eot':
            $mime = 'image/gif';
            break;
        case 'svg':
            $mime = 'image/png';
            break;
        case 'ttf':
            $mime = 'image/svg+xml';
            break;
        case 'off':
            $mime = 'image/svg+xml';
            break;
        case 'css':
            $mime = 'text/css';
            break;
        default:
            $mime = false;
    }

    // if a valid MIME type exists, display the image
    // by sending appropriate headers and streaming the file
    if ($mime) {
        header('Content-type: '.$mime);
        header('Content-length: '.filesize($font));
        $file = @ fopen($font, 'rb');
        if ($file) {
            fpassthru($file);
            exit;
        }
    }
}