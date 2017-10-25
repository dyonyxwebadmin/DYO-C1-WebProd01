<?php
require_class("user.php");

$User = new User();

echo $User->listUsers();