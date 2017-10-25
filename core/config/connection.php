<?php

if ($_SERVER['DOCUMENT_ROOT'] == "/kunden/homepages/7/d581652361/htdocs/Block2150")
{
	//Production Host on 1and1.com
	define('DB_SERVER', 'db614473640.db.1and1.com');
	define('DB_USERNAME', 'dbo614473640');
	define('DB_PASSWORD', 'L1f3isg00d');
	define('DB_DATABASE', 'db614473640');
	
} elseif ($_SERVER['DOCUMENT_ROOT'] == "/var/www/html") {
	//Local Development
	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', 'L1f3isg00d');
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
