<?php
require_class("user.php");

$id = $_POST["id"];

$User = new User($id);

$User->kv = $_POST;
$User->save();



echo '{"status":"success","message":"The information for this user has been saved successfully."}';