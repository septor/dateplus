<?php

class dateplus_setup
{
	function install_pre($var)
	{
		//
	}

	function install_post($var)
	{
		$query = "
		INSERT INTO `#userdays` (`id`, `event_name`, `event_date`) VALUES
			(1, 'septor born (1982)', '".strtotime('05 Feburary 1982')."'),
			(2, 'e107 born (2002)', '".strtotime('27 April 2002')."'),
			(3, 'e107 v2 released (2015)', '".strtotime('02 September 2015')."'),
			(4, 'Date+ born (2010)', '".strtotime('13 November 2010')."'),
			(5, 'Date+ rewritten (2015)', '".strtotime('17 November 2015')."'),
			(6, 'e107 rebranded (2011)', '".strtotime('29 December 2011')."')
		";

		$status = (e107::getDb()->gen($query)) ? E_MESSAGE_SUCCESS : E_MESSAGE_ERROR;
		e107::getMessage()->add("Example Userdays", $status);
	}

	function uninstall_pre($var)
	{
		//
	}

	function upgrade_post($needed)
	{
		//
	}
}
