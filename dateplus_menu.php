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
$pref = e107::pref('dateplus');
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

if($pref['enableUserdays'] == true)
{
	$userdays = e107::getDb()->retrieve('userdays', '*', '', true);
	foreach($userdays as $row)
	{
		$udMonth = date('n', $row['event_date']);
		$udDay = date('j', $row['event_date']);

		if($udMonth.'/'.$udDay == $curMonth.'/'.$curDay)
		{
			$holiray[] = array($row['event_name'], $udMonth, $udDay);
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

$sc->setVars(array(
	'all_holidays' => $all_holidays,
));

$text = $tp->parseTemplate($template['menu'], false, $sc);

e107::getRender()->tablerender('Date+', $text);
?>
