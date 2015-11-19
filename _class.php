<?php
/*
 * Date+ - An advanced date display menu for e107
 *
 * Copyright (C) 2010-2015 Patrick Weaver (http://trickmod.com/)
 * For additional information refer to the README.mkd file.
 *
 */
function monthToText($month)
{
	$dateObj   = DateTime::createFromFormat('!m', $month);
	return $dateObj->format('F');
}

?>
