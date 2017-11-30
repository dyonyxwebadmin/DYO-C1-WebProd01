<?php
// header("HTTP/1.1 200 OK");
// http_response_code(200);

require_once($_SERVER['DOCUMENT_ROOT']."/core/init.php");
require_once("site_handler.php");


$view = get_device();

$url = explode('?', $_SERVER['REQUEST_URI']);
$path = explode('/', $url[0]);
$Debug = 0;

// /faveicon.ico hack
if ($path[1] == "favicon.ico") {
    $path[1] = "img";
    $path[2] = "favicon.ico";
}


if ($Debug == 1)
{
    echo '<div style="position: absolute; top: 40px; left: 50px;">';
    echo "Routes for: Foundation";
    echo "<br />REQUEST_URI: " . $_SERVER['REQUEST_URI'];
    echo "<br />HTTP_HOST: " . $_SERVER['HTTP_HOST'];
    echo "<br />count(path): " . count($path);
    echo "<br />device: " . $view ;
    echo "<br />tempalte: " . $template;
    echo "<br />path[0]: " . $path[0];
    echo "<br />path[1]: " . $path[1];
    echo "<br />path[2]: " . $path[2];
    echo "<br />path[3]: " . $path[3];
    echo "<br />path[4]: " . $path[4];
    echo "</div>";
}

if ($path[1] == "login") {
if ($path[1] == "core") {
    header( 'Location: /dashboard' );
}
// Route for Core files
    
    $ext = substr($url[0], -3);
    // set the MIME type
    switch ($ext) {
        case 'css':
            $mime = 'text/css';
            break;
        case '.js':
            $mime = 'text/javascript';
            break;
        default:
            $mime = false;
    }
    if ($mime) 
    {
        header("Content-type: ". $mime, true);
    }

    include($_SERVER['DOCUMENT_ROOT']."".$_SERVER['REQUEST_URI']);
    
}
// Route for API Moudels
elseif ($path[1] == "Module" || $path[1] == "module" || $path[1] == "Modules" || $path[1] == "modules" || $path[1] == "api") {
    
    if(file_exists($_SERVER['DOCUMENT_ROOT'].$url[0].".php")) {
        include($_SERVER['DOCUMENT_ROOT'].$url[0].".php");
    } else {
        if(file_exists($_SERVER['DOCUMENT_ROOT']."/api/modules/".$path[2].".php")) {
            include($_SERVER['DOCUMENT_ROOT']."/api/modules/".$path[2].".php");
        } else {
            include($_SERVER['DOCUMENT_ROOT']."/api/modules/".$path[2]."/".$path[3].".php");
        }
    }
    
}

// route for SSL validation
elseif ($path[1] == ".well-known") {
    $mime = 'text/plain';
    header("Content-type: ". $mime, true);
    include($_SERVER['DOCUMENT_ROOT']."/sites/$site/".$path[3]);
}

// route for SSL validation
elseif ($path[1] == "sitemap.xml") {
    $mime = 'application/xml ';
    header("Content-type: ". $mime, true);
    include($_SERVER['DOCUMENT_ROOT']."/sites/$site/sitemap.xml");
}
// Route for Core files
elseif ($path[1] == "gadgets") {
    
    $ext = substr($url[0], -3);
    // set the MIME type
    switch ($ext) {
        case 'png':
            $mime = 'image/png';
            break;
        default:
            $mime = false;
    }
    if ($mime) 
    {
        header("Content-type: ". $mime, true);
    }


    include($_SERVER['DOCUMENT_ROOT']."/sites/$site/$view/".$_SERVER['REQUEST_URI']);
    
}
// Route for Plugins files
elseif ($path[1] == "plugins") {
    
    $ext = substr($url[0], -3);
    // set the MIME type
    switch ($ext) {
        case 'css':
            $mime = 'text/css';
            break;
        case 'jpg':
            $mime = 'image/jpeg';
            break;
        case 'gif':
            $mime = 'image/gif';
            break;
        case 'png':
            $mime = 'image/png';
            break;
        case '.js':
            $mime = 'text/javascript';
            break;
        default:
            $mime = false;
    }
    if ($mime) 
    {
        header("Content-type: ". $mime, true);
    }
    
    include($_SERVER['DOCUMENT_ROOT']."/core/".$url[0]);
}
// Route for CSS
elseif ($path[1] == "css") {
    
    $ext = substr($url[0], -3);
    // set the MIME type
    switch ($ext) {
        case 'css':
            $mime = 'text/css';
            break;
        case 'jpg':
            $mime = 'image/jpeg';
            break;
        case 'gif':
            $mime = 'image/gif';
            break;
        case 'png':
            $mime = 'image/png';
            break;
        case '.js':
            $mime = 'text/javascript';
            break;
        default:
            $mime = false;
    }
    if ($mime) 
    {
        header("Content-type: ". $mime, true);
    }
    site_include($_SERVER['DOCUMENT_ROOT']."/sites/$site/$view/assets/".$_SERVER['REQUEST_URI']);
}
// Route for CSS
elseif ($path[1] == "downloads") {
    
    $ext = substr($url[0], -3);
    // set the MIME type
    switch ($ext) {
        case 'pdf':
            $mime = 'application/pdf';
            break;
        case 'ptx':
            $mime = 'application/vnd.openxmlformats-officedocument.presentationml.presentation';
            break;
        default:
            $mime = false;
    }
    $data = file_get_contents($_SERVER['DOCUMENT_ROOT']."/sites/$site/$view/assets".$_SERVER['REQUEST_URI']);
    header("Content-type: application/octet-stream");
    header("Content-disposition: attachment;filename=".$path[2]);

    echo $data;
}
// Route for JS
elseif ($path[1] == "js") {
    
    $ext = substr($url[0], -3);
    // set the MIME type
    switch ($ext) {
        case 'css':
            $mime = 'text/css';
            break;
        case 'jpg':
            $mime = 'image/jpeg';
            break;
        case 'gif':
            $mime = 'image/gif';
            break;
        case 'png':
            $mime = 'image/png';
            break;
        case '.js':
            $mime = 'text/javascript';
            break;
        default:
            $mime = false;
    }
    if ($mime) 
    {
        header("Content-type: ". $mime, true);
    }
    site_include($_SERVER['DOCUMENT_ROOT']."/sites/$site/$view/assets/".$_SERVER['REQUEST_URI']);
}
// Route for Images
elseif ($path[1] == "images" || $path[1] == "img") {
    include("image_handler.php");
}
// Route for Images
elseif ($path[1] == "fonts") {
    include("font_handler.php");
}
// Route for API Moudels
elseif ($path[1] == "Module" || $path[1] == "module" || $path[1] == "Modules" || $path[1] == "modules" || $path[1] == "api") {
    
    if(file_exists($_SERVER['DOCUMENT_ROOT']."/api/modules/".$path[2].".php")) {
        include($_SERVER['DOCUMENT_ROOT']."/api/modules/".$path[2].".php");
    } else {
        include($_SERVER['DOCUMENT_ROOT']."/api/modules/".$path[2]."");
    }
    
}
// Route for QA Testing Scripts
elseif ($path[1] == "qa") {
   include($_SERVER['DOCUMENT_ROOT']."/qa/init.php");
}
// Route for Messages
elseif ($path[1] == "logout") {

    session_start();
    session_unset();
    session_destroy();
    session_write_close();
    setcookie(session_name(),'',0,'/');
    session_regenerate_id(true);
    header( 'Location: /' );

}
// Route for system dashbaord
elseif ($path[1] == "dashboard") {   
    require_once("dashbaord_handler.php");
}
// Routes for Pages
else {
    require_once("page_handler.php");
}
