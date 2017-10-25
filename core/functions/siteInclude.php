<?php

function site_include($path)
{
    global $site;
    global $view;
    global $template;

    if (file_exists($path)) {
        include($path);
    } else {
        $path = str_replace("/sites/$site/$view/", "/sites/_templates/$template/$view/", $path);
        include($path);
    }
}