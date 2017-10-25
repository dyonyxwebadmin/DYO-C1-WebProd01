<?php

    $filePath = $_SERVER['DOCUMENT_ROOT']."/sites/$site/dashboard";
    $version = "v1";
    // $url = explode('?', $_SERVER['REQUEST_URI']);
    // $page = explode('/', $url[0]);
    // $page = $page[1];
    $url = explode('?', $_SERVER['REQUEST_URI']);
    $page = str_replace("/dashboard", "", $url[0]);

    if ($Debug == 1)
    {                              
        echo '<div style="position: absolute; top: 300px; left: 50px;">';
    }


    $resources = array("images", "img", "js", "css");
    if (in_array($path[2], $resources)) {
        $resource = $path[2];
        $resource_path = $page;

        if ($resource == "images") {
            $resource_path = str_replace("images","img",$page);            
        }

        $ext = substr($resource_path, -3);
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


        $checkResource =  $filePath . "/assets" . $resource_path; 

        if ($Debug == 1)
        {                              
            echo "resource: " . $resource . "<br />";
            echo "resource: " . $filePath . "<br />";
            echo "resource path: " . $resource_path . "<br />";
            echo "resource ext: " . $ext . "<br />";
            echo "resource mime: " . $mime . "<br />";
            echo "checkResource: " . $checkResource . "<br />";
        } 

        if(file_exists($checkResource)) {
            if ($Debug == 1)
            {                   
                echo "<p><b>RESOURCE FOUND</b></p>";
            }
        } else {
            if ($Debug == 1)
            {                   
                echo "<p><b>RESOURCE NOT FOUND</b></p>";
            }

            $config = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT']."/sites/$site/config.json"), true);
            $system = $config['Site']['Config']['System'];
            
            $checkResource = $_SERVER['DOCUMENT_ROOT']."/sites/_system/".$system."/".$view."/assets".$resource_path;

            if ($Debug == 1)
            {                              
                echo "checkResource: " . $checkResource . "<br />";
            } 

            if(file_exists($checkResource)) {
                if ($Debug == 1)
                {                   
                    echo "<p><b>RESOURCE FOUND</b></p>";
                }
            } else {
                if ($Debug == 1)
                {                   
                    echo "<p><b>RESOURCE NOT FOUND</b></p>";
                }
            }
        }

        if ($Debug == 1)
        {               

        } else {
            if ($mime) 
            {
                header("Content-type: ". $mime, true);               
                include($checkResource);   
            }
        }
        exit;
    }

    $status = 404;

    if ($Debug == 1)
    {                              
        echo "<br />page: " . $page . "<br />";
    }



    if ($status == 404) {

        $checkPage = $page . "/index.php";
        $page_path = $filePath . $checkPage;
        if ($Debug == 1)
        {                              
            echo "<br /><br />Cleack Client Directory: " . $page_path;
        }
        if(file_exists($page_path)) {
            if ($Debug == 1)
            {                              
                echo "<br />Found in Client Directory: " . $page_path;
            }
            $status = 200;
        }
    }
    if ($status == 404) {
        $checkPage = $page . "/index.php";
        $checkTemplate = $_SERVER['DOCUMENT_ROOT']."/sites/_system/$version/$view";
        $page_path = $checkTemplate . $checkPage;
        if ($Debug == 1)
        {                              
            echo "<br /><br />Check in System Folder: " . $page_path;
        }
        if(file_exists($page_path)) {
            if ($Debug == 1)
            {                              
                echo "<br />Found in System Folder: " . $page_path;
            }
            $status = 200;
        }
    }
    
    if ($status == 404) {
        // Resolve Full Path
        $page_path = $filePath . $page;        
        if ($Debug == 1)
        {                              
            echo "<br /><br />Check #5: " . $page_path;
        }
        if(file_exists($page_path)) {

            if ($Debug == 1)
            {                              
                echo "<br />found check #5: " . $page_path;
            }
            $status = 200;
        } else {
            $checkTemplate = $_SERVER['DOCUMENT_ROOT']."/sites/_system/$version/$view";
            $page_path = $checkTemplate . $page;   
            if ($Debug == 1)
            {                              
                echo "<br /><br />Check #6: " . $page_path;
            }
            if(file_exists($page_path)) {
                if ($Debug == 1)
                {                              
                    echo "<br />found check #6: " . $page_path;
                }
                $status = 200;
            } 
        }
    }


    // Resolve Friendly URLs = no .php at the end
    if ($status == 404) {
        $page_path = $filePath . $page . ".php";
        if(file_exists($page_path)) {
            $status = 200;
        } else {
            $checkTemplate = $_SERVER['DOCUMENT_ROOT']."/sites/_system/$version/$view";
            $page_path = $checkTemplate . $page . ".php";   
            if(file_exists($page_path)) {
                $status = 200;
            } 
        }
    }


    // $Debug = 1;

    $ext = substr($page_path, -3);

    if ($Debug == 1)
    {                              
        echo "<br /><br />site: " . $site;
        echo "<br />path: " . $filePath;
        echo "<br />page: " . $page;
        echo "<br />resolve: " . $page_path;
        echo "<br />status: " . $status;
        echo "<br />ext: " . $ext;
        echo "<br />filename: " . end($path);
        echo "</div>";
        exit;
    }


    switch ($ext) {
        case 'pdf':
            $filename = end($path); /* Note: Always use .pdf at the end. */

            header('Content-type: application/pdf');
            header('Content-Disposition: inline; filename="' . $filename . '"');
            header('Content-Transfer-Encoding: binary');
            header('Content-Length: ' . filesize($page_path));
            header('Accept-Ranges: bytes');

            @readfile($page_path);
            break;
        case 'txt':
            header("Content-type: text/plain");
            include($page_path);   
            break;
        case 'xml':
            header("Content-type: application/xml");
            include($page_path);   
            break;
        default:                
            if ($status == 404) {
                 $page = "/404.php";
                 $page_path = $filePath . $page;   
            }
            header('Content-Type: text/html; charset=utf-8');
            header("X-XSS-Protection: 1");
            include($page_path);   
    }
    