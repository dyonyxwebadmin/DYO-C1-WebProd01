<?php

function cms($block, $default, $inline = true, $cnt = 26)
{	
	global $site;
	global $config;


	$lipsum = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nec magna ac dui interdum ullamcorper vel eget nulla. Aenean a arcu sit amet turpis dignissim vulputate. Suspendisse elementum bibendum nulla sed iaculis. Praesent iaculis erat rhoncus, dapibus est eget, hendrerit augue. Pellentesque mi urna, aliquet et erat et, vehicula rhoncus urna. In risus metus, ullamcorper non eros lobortis, euismod cursus mauris. Vivamus blandit ultrices dolor, non malesuada dui hendrerit vel. Aenean nec tempor odio. Vestibulum ex lectus, varius quis ex quis, commodo placerat erat. Proin efficitur auctor arcu in sodales. Curabitur consectetur, turpis vestibulum maximus blandit, libero nisl pretium metus, eget hendrerit lorem diam eu magna. Nullam quam purus, scelerisque sed ipsum in, bibendum pellentesque purus. Aliquam lobortis dui tortor, at elementum nulla viverra eu. Cras ut magna non ipsum ultricies ornare. Integer neque metus, varius in dapibus aliquam, rhoncus quis nunc. Mauris et risus non magna gravida volutpat vel quis felis.
		 	Donec a diam a elit eleifend porttitor. Etiam interdum rhoncus nisl et mattis. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi sollicitudin egestas velit in ullamcorper. Sed nulla velit, euismod eget neque vitae, condimentum consequat sapien. Duis sed neque et nisi accumsan dictum. Phasellus sapien nisl, elementum vitae viverra in, accumsan in quam.
			Sed auctor lectus risus, at ullamcorper sem imperdiet et. Integer at massa quam. Donec non interdum nulla. Nam commodo nulla consectetur quam lobortis auctor. Morbi posuere enim id diam porta feugiat. Proin sit amet nunc nibh. Suspendisse dictum tempus ante. Praesent eu lacus a risus finibus sollicitudin. Phasellus vel dui id sapien rutrum imperdiet at id leo. Phasellus placerat tincidunt tincidunt. Sed consequat eu sem in varius. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Pellentesque dolor magna, laoreet non rhoncus id, suscipit in sem. Nam sed magna ante. Etiam auctor, lorem ut suscipit volutpat, nibh ante dictum elit, ut tincidunt dolor elit vel leo.
			Nulla volutpat, ipsum nec laoreet dignissim, lectus elit tempus leo, ac tincidunt sem justo ac massa. Praesent dignissim vitae est in auctor. Pellentesque consequat lorem non arcu iaculis interdum vehicula quis sem. Suspendisse nec aliquet elit, nec tincidunt mi. In nisl velit, mollis quis venenatis vel, consectetur luctus nisl. Maecenas rhoncus purus sagittis ultrices consectetur. Aliquam interdum mauris eu ipsum pharetra, vel sagittis ligula posuere. Nunc a metus non enim cursus elementum. Aenean nec lorem augue. Etiam viverra laoreet hendrerit. Fusce ut ipsum erat. Pellentesque eu neque eu eros vestibulum volutpat eu non ligula. Proin vel lectus ut purus iaculis auctor. Nulla viverra neque et pharetra mollis. Aliquam erat volutpat. Nunc ac hendrerit nunc, vitae ullamcorper orci.
			Sed vitae neque id est dictum consectetur. Quisque cursus vitae nunc vel finibus. Phasellus condimentum nisl felis, quis volutpat ante imperdiet non. Aliquam vehicula turpis sit amet velit faucibus vehicula. Morbi at erat auctor, pulvinar nisl at, lobortis leo. Quisque scelerisque ante diam, at malesuada enim luctus nec. Curabitur ut lacus non lorem lobortis facilisis. Praesent id commodo nibh. Donec ut nunc quis lorem ornare tristique eget sit amet nisi. Integer quis hendrerit elit, at consequat quam. Suspendisse sit amet iaculis libero. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam erat magna, facilisis facilisis diam at, tincidunt sollicitudin nisl. Duis aliquam, urna eget elementum volutpat, leo arcu finibus sapien, eget accumsan turpis elit ut massa. Maecenas ac lectus facilisis, molestie nisl a, pharetra leo.";



	$path = explode('?', $_SERVER['REQUEST_URI']);
	
	$cms = new CMS($site, $path[0], $block);
	
	if ($cms->content)
	{
		if ($_SESSION['user_type'] == "5") {
			echo '<span class="cms" id="cms_'. $block . '">'.$cms->content.'</span>';
		}
		else
		{
			echo $cms->content;
		}
	}
	else
	{
		if (strpos($default, '::') > -1) {
			if (strpos($default, 'Lipsum') > -1) {
				$default = substr($lipsum, 0, $cnt);
			} else {
				$default = $config['Site']['Defaults'][str_replace('::', '', $default)];
			}
		}

		if ($_SESSION['user_type'] == "5" && $inline == true) {
			echo '<span class="cms" id="cms_'. $block . '">'.$default.'</span>';
		}
		else
		{
			echo $default;
		}
	}
}