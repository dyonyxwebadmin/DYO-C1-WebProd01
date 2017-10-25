<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_class("user.php");


$id = $_POST["id"];


{
    $User = new User($id);
	
    if ($User->id)
    {
		echo $User->KvList();
    }
    else
    {
        echo '{"status":"failed","message":"There was a problem trying to create your account.  Please check your information and try again."}';
    }
}