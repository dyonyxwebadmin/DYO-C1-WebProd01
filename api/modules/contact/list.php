<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

require_class("contact.php");

$c = new Contact();
$c->site = $site;
echo $c->kv_pivot();

