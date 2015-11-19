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

?>
