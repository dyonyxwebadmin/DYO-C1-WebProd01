<?php
function composer() {
    require $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';
}


function checkAccess()
{
	global $path;

    if ($_SESSION['user_id'] == "")
    {
    	if ($path[1] <> "api") {
        	header("Location: /");
        } else {
        	exit;
        }
    }
    
    if ($_SESSION['user_lock'] == 1)
    {
        header("Location: /tools/lockscreen");
    }
}

function checkAdminAccess()
{
	global $path;

    if ($_SESSION['user_id'] == "")
    {
    	if ($path[1] <> "api") {
        	header("Location: /");
        } else {
        	exit;
        }
    }

    if ($_SESSION['user_type'] < 4)
    {
    	if ($path[1] <> "api") {
        	header("Location: /tools");
        } else {
        	exit;
        }
        
    }
      
    if ($_SESSION['user_lock'] == 1)
    {
        header("Location: /tools/lockscreen");
    }
}

function getTypeName($type)
{
	switch ($type) {
		case 0;
			return "Disabled";
			break;
		case 1;
			return "Pending Enrollment";
			break;
		case 2;
			return "";
			break;
		case 3;
			return "Customer";
			break;
		case 4;
			return "Web Site Admin";
			break;
		case 5;
			return "System Admin";
			break;
	}
}
