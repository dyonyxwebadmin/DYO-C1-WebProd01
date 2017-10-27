<?php

if ($_SERVER['DOCUMENT_ROOT'] == "/var/www/html") {
	//Local Development
	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', '1!dyonyx$1');
	define('DB_DATABASE', 'foundation');
}
else
{
	//Local Development
	define('DB_SERVER', '127.0.0.1');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', 'beaver');
	define('DB_DATABASE', 'foundation');
}

$connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD) or die( mysqli_error($connection));
$database = mysqli_select_db($connection, DB_DATABASE) or die(mysqli_error($connection));
