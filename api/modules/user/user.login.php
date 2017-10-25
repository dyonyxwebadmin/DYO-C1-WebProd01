<?php

// error_reporting(E_ALL);
// ini_set('display_errors', 1);

require_class("user.php");

$User = new User();

$id = $User->login($_POST["login"], $_POST["password"]);

if ($User->id)
{
    echo $User->toJson();
}
else
{
    echo '{"status":"failed","message":"Your login was not successful.  Please double check your login information and try again."}';
}