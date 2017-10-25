<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);



echo $_SERVER['HTTP_USER_AGENT'] . "\n\n";

$browser = get_browser(null, true);

echo "<pre>";
print_r($browser);
echo "</pre>";

echo $browser['browser'];



foreach ($browser as $key => $value) {
    echo $key . ": " . $value . "<br>";
}
