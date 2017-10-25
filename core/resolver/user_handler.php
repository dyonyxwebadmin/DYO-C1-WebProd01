<?php

$UserSite = 0;

$sql = "select * from users where username = '$path[1]'";
$result = mysqli_query($connection, $sql);
if(!empty($result)){
    $user = mysqli_fetch_assoc($result);
    if ($path[1] == $user["username"])
    {
        $_SESSION['site_user_id'] = $user["uuid"];
        $_SESSION['site_user_username'] = $user["username"];
        $UserSite = 1;
    }
}