<?php


            
    if (isset($_SESSION['ENTERY_URI']) === false)
    {
        $_SESSION['ENTERY_URI'] = $_SERVER['REQUEST_URI'];
    }

    if (isset($_SESSION['HTTP_REFERER']) === false)
    {
        $_SESSION['HTTP_REFERER'] = $_SERVER['HTTP_REFERER'];
    }

    if (isset($_SESSION['REMOTE_ADDR']) === false)
    {
        $_SESSION['REMOTE_ADDR'] = $_SERVER['REMOTE_ADDR'];
    }

    if (isset($_SESSION['REMOTE_HOST']) === false)
    {
        $_SESSION['REMOTE_HOST'] = $_SERVER['REMOTE_HOST'];
    }

    if (isset($_SESSION['REQUEST_TIME']) === false)
    {
        $_SESSION['REQUEST_TIME'] = $_SERVER['REQUEST_TIME'];
    }

	//$_SESSION['SESSION_PATH'] = "";

    $_SESSION['SESSION_PATH'][] = $_SERVER['REQUEST_URI'];


    // echo "<pre>";
    // print_r($_SESSION['SESSION_PATH']);
    // echo "</pre>";


    // echo json_encode($_SESSION['SESSION_PATH']);

    // exit;

    // var_dump($_SESSION);
    // exit;