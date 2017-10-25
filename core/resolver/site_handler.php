<?php

    $host = $_SERVER['HTTP_HOST'];
    $site = $hosts[$host];

	if (strpos($host, 'www.') !== false) {
		header("HTTP/1.1 301 Moved Permanently"); 
	    header('Location: http://' . str_replace("www.", "", $host));
	}

    if ($site == ""){
    	$site = "gadgets";
    }

	$config = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT']."/sites/$site/config.json"), true);
	
	// Set site config variables
	$landingPage = $config['Site']['LandingPage'];
	$template = $config['Site']['Config']['Template'];
	$ssl = $config['Site']['Config']['SSL'];

	if ($ssl == "True" & $_SERVER['COMPUTERNAME'] != "BLOCK2150") {
		// echo "<pre>";
		// print_r($_SERVER);
		// echo "</pre>";
		// exit;
	    if($_SERVER["HTTPS"] != "on")
	    {
	        header("HTTP/1.1 301 Moved Permanently");
	        header("Location: https://" . $host . $_SERVER['REQUEST_URI']);
	        exit();
	    }   
	}


