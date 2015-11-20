<?php
/*
 * Date+ - An advanced date display menu for e107
 *
 * Copyright (C) 2010-2015 Patrick Weaver (http://trickmod.com/)
 * For additional information refer to the README.mkd file.
 *
 */
require_once('../../class2.php');
require_once(HEADERF);
require_once(e_PLUGIN.'dateplus/_class.php');

$pref = e107::pref('dateplus');
$month = date('n');
$day = date('j');
$year = date('Y');

$calendar = '
<h3 class="center">'.formatMonth($month, 'long').' '.$year.'</h3>
<table class="table table-bordered">
	<thead>
	<tr>';

$headings = array(
	'Sunday',
	'Monday',
	'Tuesday',
	'Wednesday',
	'Thursday',
	'Friday',
	'Saturday'
);

foreach($headings as $heading)
{
	$calendar .= '
			<th style="width:14%">'.$heading.'</th>';
}

$running_day = date('w',mktime(0,0,0,$month,1,$year));
$days_in_month = date('t',mktime(0,0,0,$month,1,$year));
$days_in_this_week = 1;
$day_counter = 0;
$dates_array = array();

$calendar.= '
		</tr>
	</thead>
	<tbody>
		<tr>';

for($x = 0; $x < $running_day; $x++)
{
	$calendar.= '
			<td style="height: 200px;"></td>';
	$days_in_this_week++;
}

for($list_day = 1; $list_day <= $days_in_month; $list_day++)
{
	$style = ($list_day == date('j') ? 'primary' : 'default');
	$ec = 0;

	$holidays = getHolidays($month, $list_day);
	foreach($holidays as $holiday)
	{
		$event .= '<p class="small">'.$holiday[0].'</p>';
		$ec++;
	}

	if($pref['enableUserdays'] == true)
	{
		$userdays = getUserdays($month, $list_day);
		foreach($userdays as $userday)
		{
			$event .= '<p class="small">'.$userday[0].'</p>';
			$ec++;
		}
	}
	$hs = hanukkahStart();
	$he = hanukkahStart() + 691200;
	if(date('j/n/Y', $hs)  == $list_day.'/'.$month.'/'.$year)
	{
		$event .= '<p class="small">Hanukkah starts</p>';
		$ec++;
	}
	if(date('j/n/Y', $he) == $list_day.'/'.$month.'/'.$year)
	{
		$event .= '<p class="small">Hanukkah ends</p>';
		$ec++;
	}

	$cellStyle = ($ec > 0 ? 'bg-info' : 'default');

	$calendar.= '
			<td style="height:100px; min-height:100px;" class="'.$cellStyle.'">
				<div class="pull-right label label-'.$style.'">'.$list_day.'</div>';
	$calendar .= $event;

	unset($event, $ec);

	$calendar.= '
			</td>';
	if($running_day == 6)
	{
		$calendar.= '
		</tr>';
		if(($day_counter+1) != $days_in_month)
		{
			$calendar.= '
		<tr>';
		}
		$running_day = -1;
		$days_in_this_week = 0;
	}
	$days_in_this_week++; $running_day++; $day_counter++;
}

if($days_in_this_week < 8)
{
	for($x = 1; $x <= (8 - $days_in_this_week); $x++)
	{
		$calendar.= '
			<td></td>';
	}
}

$calendar.= '
		</tr>
	</tbody>
</table>';

$text = $calendar;

e107::getRender()->tablerender('Date+ Calendar', $text);
require_once(FOOTERF);
?>
