<?php
/*
 * Date+ - An advanced date display menu for e107
 *
 * Copyright (C) 2010-2015 Patrick Weaver (http://trickmod.com/)
 * For additional information refer to the README.mkd file.
 *
 */
function formatMonth($month, $format='')
{
	if($format == 'short')
	{
		$datemat = 'M';
	}
	else if($format == 'long')
	{
		$datemat = 'F';
	}
	else
	{
		$datemat = 'm';
	}

	$dateObj = DateTime::createFromFormat('!m', $month);
	return $dateObj->format($datemat);
}

function hanukkahStart($year = null)
{
	$reference = ($year == '2021' || $year == '2032' ? '11/1/' : '12/1/').($year !== null ? $year : date('Y'));
	list($month, $day, $year) = explode("/", jdtojewish(unixtojd(strtotime($reference))));
	return jdtounix(jewishtojd(3, 25, $year));
}

function getHolidays($month, $day)
{
	$holidays = simplexml_load_file(e_PLUGIN.'dateplus/holidays.xml');
	$output = array();

	foreach($holidays->month as $m)
	{
		if($m['id'] == $month)
		{
			foreach($m->holiday as $holiday)
			{
				$d = (is_numeric((string)$holiday['day']) ? $holiday['day'] : date('j', strtotime($holiday['day'].' of this month')));
				if($d == $day)
				{
					$output[] = array($holiday['name'], $month, $d);
				}
				if($m['id'].'/'.$day == date('n/j', easter_date()))
				{
					$output[] = array('Easter', $month, $day);
				}
			}
		}
	}
	return $output;
}

function getUserdays($month, $day)
{
	$userdays = e107::getDb()->retrieve('userdays', '*', '', true);
	$output = array();
	foreach($userdays as $row)
	{
		$udMonth = date('n', $row['event_date']);
		$udDay = date('j', $row['event_date']);

		if($udMonth.'/'.$udDay == $month.'/'.$day)
		{
			$output[] = array($row['event_name'], $month, $day);
		}
	}

	return $output;
}

function getHanukkah($month, $day, $year)
{
	$hs = hanukkahStart();
	$he = hanukkahStart() + 691200;
	$output = array();

	if(date('j/n/Y', $hs)  == $day.'/'.$month.'/'.$year)
	{
		$output[] = array('Hanukkah starts', $month, $day);
	}
	if(date('j/n/Y', $he) == $day.'/'.$month.'/'.$year)
	{
		$output[] = array('Hanukkah ends', $month, $day);
	}

	return $output;
}
?>
