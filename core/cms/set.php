<?php

$path = $_POST["path"];
$block = $_POST["block"];
$content = $_POST["content"];

$block = str_replace("cms_", "", $block);

$cms = new CMS($site, $path, $block);

$cms->set($content, $_SESSION['user_id']);


echo '{"status":"success"}';