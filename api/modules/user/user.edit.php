<?php
require_class("user.php");


$id = $_POST["id"];
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$company = $_POST["company"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$type = $_POST["type"];


{
    $User = new User($id);
	$User->first_name = $first_name;
	$User->last_name = $last_name;
	$User->company = $company;
	$User->email = $email;
	$User->phone = $phone;
	$User->type = $type;

    $User->save();
	
    if ($User->id)
    {
        echo $User->toJson();
    }
    else
    {
        echo '{"status":"failed","message":"There was a problem trying to create your account.  Please check your information and try again."}';
    }
}