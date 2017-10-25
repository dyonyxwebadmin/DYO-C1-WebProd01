<?php

function icon($block, $icon, $size, $class)
{	
	global $site;
	$path = explode('?', $_SERVER['REQUEST_URI']);
	
	$cms = new CMS($site, $path[0], $block);
	
	if ($cms->content)
	{
		if ($_SESSION['user_type'] == "5") {
			echo '<span class="icon" id="icon_'. $block . '"><i class="fa '.$cms->content.' '.$size.' '.$class.'"></i></span>';
		}
		else
		{
			echo '<i class="fa '.$cms->content.' '.$size.' '.$class.'"></i>';
		}
	}
	else
	{
		if ($_SESSION['user_type'] == "5") {
			echo '<span class="icon" id="icon_'. $block . '"><i class="fa '.$icon.' '.$size.' '.$class.'"></i></span>';
		}
		else
		{
			echo '<i class="fa '.$icon.' '.$size.' '.$class.'"></i>';
		}
	}
}