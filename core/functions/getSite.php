<?php

function get_site()
{

	global $hosts;
	global $template;

    $host = $_SERVER['HTTP_HOST'];
    $site = $hosts[$host];
    
    if ($site == ""){
    	$site = "main";
    }


    return $site;

}

