<?php

function _templates($path, $type) {

    $view = get_device();
    $site = get_site();

    $config = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT']."/sites/$site/config.json"), true);
    $template = $config['Site']['Config']['Template'];
    
    $include_path = $_SERVER['DOCUMENT_ROOT']."/sites/_templates/".$template."/".$view."/".$type."/".$path.".php";
    if(file_exists($include_path)) {
        include($include_path);
    }
    else {
    }
}

function _system($path) {

    $view = get_device();
    $site = get_site();

    $config = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT']."/sites/$site/config.json"), true);
    $system = $config['Site']['Config']['System'];
    
    $include_path = $_SERVER['DOCUMENT_ROOT']."/sites/_system/".$system."/".$view."/".$path.".php";
    if(file_exists($include_path)) {
        include($include_path);
    }
    else {
    }
}

function dashboard($path) {

    $view = get_device();
    $site = get_site();
    $include_path = $_SERVER['DOCUMENT_ROOT']."/sites/".$site."/dashboard/".$path.".php";
    
    if(file_exists($include_path)) {
        include($include_path);
    }
    else {
        _system($path, 'includes');
    }

}

function includes($path) {

    $view = get_device();
    $site = get_site();
    $include_path = $_SERVER['DOCUMENT_ROOT']."/sites/".$site."/".$view."/includes/".$path.".php";
    
    if(file_exists($include_path)) {
        include($include_path);
    }
    else {
        _templates($path, 'includes');
    }
}

function widget($path) {

    $view = get_device();
    $site = get_site();
    $include_path = $_SERVER['DOCUMENT_ROOT']."/sites/".$site."/".$view."/widgets/".$path.".php";

    if(file_exists($include_path)) {
        include($include_path);
    }
    else {
        _templates($path, 'widgets');
    }
}

function require_class($path) {
    $include_path = $_SERVER['DOCUMENT_ROOT']."/api/classes/".$path;

    if(file_exists($include_path)) {
        require($include_path);
    }
    else {
    }
}

function makeLinks($str) {
	$reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
	$urls = array();
	$urlsToReplace = array();
	if(preg_match_all($reg_exUrl, $str, $urls)) {
		$numOfMatches = count($urls[0]);
		$numOfUrlsToReplace = 0;
		for($i=0; $i<$numOfMatches; $i++) {
			$alreadyAdded = false;
			$numOfUrlsToReplace = count($urlsToReplace);
			for($j=0; $j<$numOfUrlsToReplace; $j++) {
				if($urlsToReplace[$j] == $urls[0][$i]) {
					$alreadyAdded = true;
				}
			}
			if(!$alreadyAdded) {
				array_push($urlsToReplace, $urls[0][$i]);
			}
		}
		$numOfUrlsToReplace = count($urlsToReplace);
		for($i=0; $i<$numOfUrlsToReplace; $i++) {
			$str = str_replace($urlsToReplace[$i], "<a href=\"".$urlsToReplace[$i]."\" target=\"_blank\">".$urlsToReplace[$i]."</a> ", $str);
		}
		return $str;
	} else {
		return $str;
	}
}