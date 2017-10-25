<?php


    $filePath = $_SERVER['DOCUMENT_ROOT']."/sites/$site/$view/";

    // $url = explode('?', $_SERVER['REQUEST_URI']);
    // $page = explode('/', $url[0]);
    // $page = $page[1];
    $url = explode('?', $_SERVER['REQUEST_URI']);
    $page = $url[0];

    $status = 404;

    if ($_SESSION["landingPage"] == "" && $landingPage != "") {
        $checkPage = $landingPage;
        $page_path = $filePath . $checkPage;
        $_SESSION["landingPage"] = "viewed";
        $status = 200;
    }

    if ($Debug == 1)
    {                              
        echo '<div style="position: absolute; top: 300px; left: 50px;">';
        echo "<br />Check #1: " . $page_path;
        echo "<br />Landing Page: " . $landingPage;
    }
    if ($status == 404) {

        if ($Debug == 1)
        {                              
            echo "<br />Check #1: " . $page_path;
        }
        // Find root file for index.html or index.php
        $checkPage = $page . "/index.html";
        $page_path = $filePath . $checkPage;
        if(file_exists($page_path)) {
            if ($Debug == 1)
            {                              
                echo "<br />found check #1: " . $page_path;
            }
            $status = 200;
        } else {
            $checkPage = $page . "/index.php";
            $page_path = $filePath . $checkPage;
            if ($Debug == 1)
            {                              
                echo "<br /><br />Check #2: " . $page_path;
            }
            if(file_exists($page_path)) {
                if ($Debug == 1)
                {                              
                    echo "<br />found check #2: " . $page_path;
                }
                $status = 200;
            }
        }
    }
    if ($status == 404) {
        // Find root file for index.html or index.php
        $checkPage = $page . "/index.html";
        $checkTemplate = $_SERVER['DOCUMENT_ROOT']."/sites/_templates/$template/$view/";
        $page_path = $checkTemplate . $checkPage;
        if ($Debug == 1)
        {                              
            echo "<br /><br />Check #3: " . $page_path;
        }
        if(file_exists($page_path)) {
            if ($Debug == 1)
            {                              
                echo "<br />found check #3: " . $page_path;
            }
            $status = 200;
        } else {
            $checkPage = $page . "/index.php";
            $checkTemplate = $_SERVER['DOCUMENT_ROOT']."/sites/_templates/$template/$view/";
            $page_path = $checkTemplate . $checkPage;
            if ($Debug == 1)
            {                              
                echo "<br /><br />Check #4: " . $page_path;
            }
            if(file_exists($page_path)) {
                if ($Debug == 1)
                {                              
                    echo "<br />found check #4: " . $page_path;
                }
                $status = 200;
            }
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
            $checkTemplate = $_SERVER['DOCUMENT_ROOT']."/sites/_templates/$template/$view/";
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
            $checkTemplate = $_SERVER['DOCUMENT_ROOT']."/sites/_templates/$template/$view";
            $page_path = $checkTemplate . $page . ".php";   
            if(file_exists($page_path)) {
                $status = 200;
            } 
        }
    }


    // $Debug = 1;

    $ext = substr($page_path, -3);


    require_once("session_handler.php");


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

    if ($status == 404) {
        header("HTTP/1.1 301 Moved Permanently"); 
        header( 'Location: /' );
    } else {           

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
    