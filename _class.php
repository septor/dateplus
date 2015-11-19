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

?>
