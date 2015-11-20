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
$hs = hanukkahStart();
$he = hanukkahStart() + 691200;
$text = "";

$holidays = getHolidays($curMonth, $curDay);
foreach($holidays as $holiday)
{
	$holiray[] = array($holiday[0], $holiday[1], $holiday[2]);
}

if($pref['enableUserdays'] == true)
{
	$userdays = getUserdays($curMonth, $curDay);
	foreach($userdays as $userday)
	{
		$holiray[] = array($userday[0], $userday[1], $userday[2]);
	}
}

if(date('j/n/Y', $hs)  == date('j/n/Y'))
{
	$holiray[] = array('Hanukkah starts', date('n', $hs), date('j', $hs));
}
if(date('j/n/Y', $he) == date('j/n/Y'))
{
	$holiray[] = array('Hanukkah ends', date('n', $he), date('j', $he));
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
