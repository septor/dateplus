<?php
/*
 * Date+ - An advanced date display menu for e107
 *
 * Copyright (C) 2010-2015 Patrick Weaver (http://trickmod.com/)
 * For additional information refer to the README.mkd file.
 *
 */
if(!defined('e107_INIT')){ exit; }
require_once(e_PLUGIN.'dateplus/_class.php');

$tp = e107::getParser();
$sc = e107::getScBatch('dateplus', true);
$template = e107::getTemplate('dateplus');

$curMonth = date('n');
$curDay = date('j');
$holidays = simplexml_load_file(e_PLUGIN.'dateplus/holidays.xml');
$text = "";

foreach($holidays->month as $month)
{
	if($month['id'] == $curMonth)
	{
		foreach($month->holiday as $holiday)
		{
			$day = (is_numeric((string)$holiday['day']) ? $holiday['day'] : date('j', strtotime($holiday['day'].' of this month')));
			if($day == $curDay)
			{
				$holiray[] = array($holiday['name'], $month['id'], $day);
			}
			if($month['id'].'/'.$curDay == date('n/j', easter_date()))
			{
				$holiray[] = array('Easter', $month['id'], $curDay);
			}
		}
	}
}

$all_holidays = '';
foreach($holiray as $entry)
{
	$sc->setVars(array(
		'name' => $entry[0],
		'month' => $entry[1],
		'day' => $entry[2],
	));

	$all_holidays .= $tp->parseTemplate($template['holiday'], false, $sc);
}

if(!empty($all_holidays)
{
	$sc->setVars(array(
		'all_holidays' => $all_holidays,
	));

	$text = $tp->parseTemplate($template['menu'], false, $sc);
}
else
{
	$text = 'No holidays today!';
}

e107::getRender()->tablerender('Date+', $text);
?>
