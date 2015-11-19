<?php
/*
 * Date+ - An advanced date display menu for e107
 *
 * Copyright (C) 2010-2015 Patrick Weaver (http://trickmod.com/)
 * For additional information refer to the README.mkd file.
 *
 */
if(!defined('e107_INIT')){ exit; }

class dateplus_shortcodes extends e_shortcode
{
	function sc_dateplus_day($parm)
	{
		$date = e107::getDate();

		if(isset($parm['short']))
		{
			$output =  $date->convert_date(time(), '%a');
		}
		else if(isset($parm['long']))
		{
			$output = $date->convert_date(time(), '%A');
		}
		else
		{
			$output = $date->convert_date(time(), '%d');
		}

		return $output;
	}

	function sc_dateplus_month($parm)
	{
		$date = e107::getDate();

		if(isset($parm['short']))
		{
			$output = $date->convert_date(time(), '%b');
		}
		else if(isset($parm['long']))
		{
			$output = $date->convert_date(time(), '%B');
		}
		else
		{
			$output = $date->convert_date(time(), '%m');
		}

		return $output;
	}

	function sc_dateplus_year($parm)
	{
		$date = e107::getDate();

		if(isset($parm['short']))
		{
			$output = $date->convert_date(time(), '%y');
		}
		else
		{
			$output = $date->convert_date(time(), '%Y');
		}

		return $output;
	}

	//

	function sc_all_holidays($parm='')
	{
		return $this->var['all_holidays'];
	}

	function sc_dateplus_holiday_name($parm='')
	{
		return $this->var['name'];
	}

	function sc_dateplus_holiday_month($parm='')
	{
		return $this->var['month'];
	}

	function sc_dateplus_holiday_day($parm='')
	{
		return $this->var['day'];
	}
}

?>
