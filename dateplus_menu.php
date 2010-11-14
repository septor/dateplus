<?php

if (!defined('e107_INIT')) { exit; }
if(file_exists(THEME."dateplus_template.php")){
	include_once(THEME."dateplus_template.php");
}else{
	include_once(e_PLUGIN."dateplus_menu/dateplus_template.php");
}

$weekday = date("l");
$day = date("j");
$month = date("F");
$year = date("Y");


if($month == "January"){
	if($day == 1){
		$holiday = "New Year's Day, Kwanzaa ends";
	}else if($day == 15){
		$holiday = "Adult's Day (Japan)";
	}else if($day == 27){
		$holiday = "Wolfgang Amadeus Mozart born (1756)";
	}else if($weekday == "Monday" && $day > 14 && $day < 22){
		$holiday = "Martin Luther King's Birthday";
	}

}else if($month == "February"){
	if($day == 2){
		$holiday = "Groundhog Day";
	}else if($day == 8){
		$holiday = "Jules Verne born (1828)";
	}else if($day == 11){
		$holiday = "National Foundation Day (Japan)";
	}else if($day == 12){
		$holiday = "Lincoln's Birthday";
	}else if($day == 14){
		$holiday = "St. Valentine's Day";
	}else if($day == 15){
		$holiday = "Galileo Galilei born (1564)";
	}else if($day == 22){
		$holiday = "Washington's Birthday";
	}else if($day == 29){
		$holiday = "Leap Day";
	}

}else if($month == "March"){
	if($day == 3){
		$holiday = "Girl's Day (Japan)";
	}else if($day == 17){
		$holiday = "St. Patrick's Day";
	}else if($day == 21){
		$holiday = "J.S. Bach born (1685)";
	}

}else if(date("j F") == date("j F", easter_date($year))){
	$holiday = "Easter";

}else if($month == "April"){
	if($day == 1){
		$holiday = "April Fools' Day";
	}else if($day == 8){
		$holiday = "Buddha born";
	}else if($day == 15 && $weekday != "Sunday"){
		$holiday = "Income Tax Day (USA)";
	}else if($day == 16 && $weekday == "Monday"){
		$holiday = "Income Tax Day (USA)";
	}else if($day == 15){
		$holiday = "Leonardo da Vinci born (1452)";
	}else if($day == 22){
		$holiday = "Earth Day";
	}else if($day == 29){
		$holiday = "Emperor's Birthday (Japan)";
	}

}else if($month == "May"){
	if($day == 1){
		$holiday = "May Day, Boy's Day (Japan)";
	}else if($day == 2){
		$holiday = "Constitution Day (Japan)";
	}else if($day == 5){
		$holiday = "Cinco de Mayo (Mexico), Children's Day (Japan)";
	}else if($day == 14){
		$holiday = "Independence Day (Paraguay)";
	}else if($weekday == "Sunday" && $day > 7 && $day < 16){
		$holiday = "Mother's Day";
	}else if($weekday == "Monday" && $day > 24){
		$holiday = "Memorial Day";
	}

}else if($month == "June"){
	if($day == 5){
		$holiday = "Constitution Day (Denmark)";
	}else if($day == 6){
		$holiday = "D-Day (USA)";
	}else if($day == 11){
		$holiday = "Kamehameha (Hawaii)";
	}else if($day == 14){
		$holiday = "Flag Day (USA)";
	}else if($day == 21){
		$holiday = "Summer Solstice";
	}else if($day == 24){
		$holiday = "St. Jean Baptiste Day (Canada)";
	}else if($day == 30){
		$holiday = "Independence Day (Zaire)";
	}else if($weekday == "Sunday" && $day > 15 && $day < 24){
		$holiday = "Father's Day";
	}

}else if($month == "July"){
	if($day == 1){
		$holiday = "Independence Day (Canada)";
	}else if($day == 4){
		$holiday = "Independence Day (USA)";
	}else if($day == 14){
		$holiday = "Bastille Day (France)";
	}

}else if($month == "August"){
	if($day == 1){
		$holiday = "Confederation Day (Switzerland)";
	}else if($day == 10){
		$holiday = "Independence Day (Ecuador)";
	}else if($day == 15){
		$holiday = "Independence Day (India)";
	}

}else if($month == "September"){
	if($day == 7){
		$holiday = "Independence Day (Brazil)";
	}else if($day == 15){
		$holiday = "Respect for the Aged Day (Japan)";
	}else if($day == 16){
		$holiday = "Independence Day (Mexico)";
	}else if($weekday == "Monday" && $day > 0 && $day < 8){
		$holiday = "Labor Day (USA)";
	}

}else if($month == "October"){
	if($day == 1){
		$holiday = "German Reunufication (1990)";
	}else if($day == 10){
		$holiday = "Health-Sport's Day (Japan)";
	}else if($weekday == "Monday" && $day > 7 && $day < 16){
		$holiday = "Columbus Day (USA)";
	}else if($day == 24){
		$holiday = "United Nations Day";
	}else if($day == 31){
		$holiday = "Halloween";
	}

}else if($month == "November"){
	if($day == 1){
		$holiday = "All Saint's Day";
	}else if($day == 2){
		$holiday = "All Soul's Day";
	}else if($day == 3){
		$holiday = "Culture Day (Japan)";
	}else if($day == 11){
		$holiday = "Veteran's Day (USA), Remembrance Day (Canada)";
	}else if($day == 20){
		$holiday = "Revolution Day (Mexico)";
	}else if($day == 23){
		$holiday = "Labor Thanksgiving Day (Japan)";
	}else if($weekday == "Thursday" && $day > 23 && $day < 30){
		$holiday = "Thanksgiving (USA)";
	}else if($day == 30 && $weekday == "Thursday"){
		$holiday = "Thanksgiving (USA)";
	}


}else if($month == "December"){
	if($day == 10){
		$holiday = "Human Right's Day";
	}else if($day == 21){
		$holiday = "Winter Solstice";
	}else if($day == 24){
		$holiday = "Christmas Eve";
	}else if($day == 25){
		$holiday = "Christmas";
	}else if($day == 26){
		$holiday = "Boxing Day, Kwanzaa begins";
	}else if($day == 31){
		$holiday = "New Year's Eve";
	}
}

if(($holiday)){
	$text = str_replace(array("%_DATE_%", "%_HOLIDAY_%"), array($weekday.", ".$month." ".$day.date("S").", ".$year, $holiday), $HOLIDAYTEMPLATE);
}else{
	$text = str_replace("%_DATE_%", $weekday.", ".$month." ".$day.date("S").", ".$year, $REGULARTEMPLATE);
}

$ns->tablerender("Date+", $text, 'dateplus');

?>