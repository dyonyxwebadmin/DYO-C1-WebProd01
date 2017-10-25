<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


require_class("user.php");


$id = $_POST["id"];

{
    $User = new User($id);

    $User->delete();

	echo '{"status":"success","message":"The user has been deleted."}';
}