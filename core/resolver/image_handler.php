<?php

// define absolute path to image folder
$image_folder = "/sites/$site/$view/assets/img";

if (strrpos($_SERVER['REQUEST_URI'], "/ico/") > -1)
{
    $image_folder = "/sites/$site/$view/assets/ico";
}

// get the image name from the query string
// and make sure it's not trying to probe your file system

$url = explode('?', $_SERVER['REQUEST_URI']);
$path = $url[0];
$pic = $_SERVER['DOCUMENT_ROOT'].$image_folder.$path;

$pic = str_replace("/images/images/", "/img/", $pic);
$pic = str_replace("/img/images/", "/img/", $pic);
$pic = str_replace("/img/img/", "/img/", $pic);

if (!file_exists($pic)) {
    $image_folder = "/sites/_templates/$template/$view/assets/img";
    $pic = $_SERVER['DOCUMENT_ROOT'].$image_folder.$path;
        
    $pic = str_replace("/images/images/", "/img/", $pic);
    $pic = str_replace("/img/images/", "/img/", $pic);
    $pic = str_replace("/img/img/", "/img/", $pic);
}
if ($Debug == 1)
{                              
    echo '<div style="position: absolute; top: 260px; left: 50px;">';
    echo "<br />image_folder: " . $image_folder;
    echo "<br />pic: " . $pic;
    echo "</div>";
    exit;
}

if (file_exists($pic) && is_readable($pic)) {
    // get the filename extension
    $ext = substr($pic, -3);
    // set the MIME type
    switch ($ext) {
        case 'jpg':
            $mime = 'image/jpeg';
            break;
        case 'gif':
            $mime = 'image/gif';
            break;
        case 'png':
            $mime = 'image/png';
            break;
        case 'svg':
            $mime = 'image/svg+xml';
            break;
        case 'ico':
            $mime = 'image/x-icon';
            break;
        default:
            $mime = false;
    }
    // if a valid MIME type exists, display the image
    // by sending appropriate headers and streaming the file
    if ($mime) {
        header('Content-type: '.$mime);
        header('Content-length: '.filesize($pic));
        $file = @ fopen($pic, 'rb');
        if ($file) {
            fpassthru($file);
            exit;
        }
    }
}