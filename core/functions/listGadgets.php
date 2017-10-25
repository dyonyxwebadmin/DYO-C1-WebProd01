<?php

function gadgets()
{
	global $site;
	$path = explode('?', $_SERVER['REQUEST_URI']);
	
	$gadgets = new Gadgets($site, $path[0]);
	
	$arr = json_decode($gadgets->gadgetList());

	foreach($arr as $key) 
	{ 
		$file = $_SERVER['DOCUMENT_ROOT']."/sites/$site/web/gadgets/templates/".$key->gadget.".php";
	    if (is_file($file)) {
	    	$gadget = file_get_contents($file);
	    	$gadget = str_replace("{%ID%}", $key->id,$gadget);
	    	eval('?>' . $gadget);
	    }
	} 

}