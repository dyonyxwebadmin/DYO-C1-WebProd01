<?php

$path = $_POST["path"];
$gadget = $_POST["gadget"];
$order = $_POST["order"];
$id = $_POST["id"];
$action = $_POST["action"];

$cms = new Gadgets($site, $path);




switch ($action) {
    case "add":		
		$cms->set($gadget, $_SESSION['user_id']);
        break;
    case "delete":		
		$cms->delete($id);
        break;
    case "sort":
    	$cms->sort($order);
    	break;
}


	

echo '{"status":"success"}';