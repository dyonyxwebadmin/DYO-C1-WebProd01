<?php
require_class("user.php");


$id = $_POST["id"];
$password = $_POST["password"];

{
    $User = new User($id);
    $User->setPassword($password);
	
    if ($User->id)
    {
        echo $User->toJson();
    }
    else
    {
        echo '{"status":"failed","message":"There was a problem trying to create your account.  Please check your information and try again."}';
    }
}