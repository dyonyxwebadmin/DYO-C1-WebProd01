<?php
require_class("user.php");


$username = $_POST["username"];
$password = $_POST["password"];
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$company = $_POST["company"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$type = $_POST["type"];


{
    $User = new User();

    $User->create($username, $password, $first_name, $last_name, $company, $email, $phone, $type);

    if ($User->id)
    {
        echo $User->toJson();
    }
    else
    {
        echo '{"status":"failed","message":"There was a problem trying to create your account.  Please check your information and try again."}';
    }
}