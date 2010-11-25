<?php

if($month == 1){
	if($day == 1){
		$holiday = "New Year's Day, Kwanzaa ends";
	}else if($day == 15){
		$holiday = "Adult's Day (Japan)";
	}else if($day == 27){
		$holiday = "Wolfgang Amadeus Mozart born (1756)";
	}else if($weekday == "Monday" && $day > 14 && $day < 22){
		$holiday = "Martin Luther King's Birthday";
	}

}else if($month == 2){
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

}else if($month == 3){
	if($day == 3){
		$holiday = "Girl's Day (Japan)";
	}else if($day == 14){
		$holiday = "Albert Einstein born (1879), <a title='".pi()."'>Pi</a> Day";
	}else if($day == 17){
		$holiday = "St. Patrick's Day";
	}else if($day == 21){
		$holiday = "J.S. Bach born (1685)";
	}

}else if(date("j F") == date("j F", easter_date($year))){
	$holiday = "Easter";

}else if($month == 4){
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

}else if($month == 5){
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

}else if($month == 6){
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

}else if($month == 7){
	if($day == 1){
		$holiday = "Independence Day (Canada)";
	}else if($day == 4){
		$holiday = "Independence Day (USA)";
	}else if($day == 14){
		$holiday = "Bastille Day (France)";
	}

}else if($month == 8){
	if($day == 1){
		$holiday = "Confederation Day (Switzerland)";
	}else if($day == 10){
		$holiday = "Independence Day (Ecuador)";
	}else if($day == 15){
		$holiday = "Independence Day (India)";
	}

}else if($month == 9){
	if($day == 7){
		$holiday = "Independence Day (Brazil)";
	}else if($day == 15){
		$holiday = "Respect for the Aged Day (Japan)";
	}else if($day == 16){
		$holiday = "Independence Day (Mexico)";
	}else if($weekday == "Monday" && $day > 0 && $day < 8){
		$holiday = "Labor Day (USA)";
	}

}else if($month == 10){
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

}else if($month == 11){
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


}else if($month == 12){
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

// Hanukkah; 2010 - 2020
if(isset($holiday)){
	$holiday = $holiday.", ";
}
if($month == 1){
	if($day == 2 && $year == 2017){
		$holiday .= "Hanukkah ends";
	}
}else if($month == 11){
	if($day == 28 && $year == 2013){
		$holiday .= "Hanukkah begins";
	}
}else if($month == 12){
	if($year == 2010){
		if($day == 2){
			$holiday .= "Hanukkah begins";
		}else if($day == 10){
			$holiday .= "Hanukkah ends";
		}
	}else if($year == 2011){
		if($day == 21){
			$holiday .= "Hanukkah begins";
		}else if($day == 29){
			$holiday .= "Hanukkah ends";
		}
	}else if($year == 2012){
		if($day == 9){
			$holiday .= "Hanukkah begins";
		}else if($day == 17){
			$holiday .= "Hanukkah ends";
		}
	}else if($year == 2013){
		if($day == 6){
			$holiday .= "Hanukkah ends";
		}
	}else if($year == 2014){
		if($day == 17){
			$holiday .= "Hanukkah begins";
		}else if($day == 25){
			$holiday .= "Hanukkah ends";
		}
	}else if($year == 2015){
		if($day == 7){
			$holiday .= "Hanukkah begins";
		}else if($day == 15){
			$holiday .= "Hanukkah ends";
		}
	}else if($year == 2016){
		if($day == 25){
			$holiday .= "Hanukkah begins";
		}
	}else if($year == 2017){
		if($day == 13){
			$holiday .= "Hanukkah begins";
		}else if($day == 21){
			$holiday .= "Hanukkah ends";
		}
	}else if($year == 2018){
		if($day == 3){
			$holiday .= "Hanukkah begins";
		}else if($day == 11){
			$holiday .= "Hanukkah ends";
		}
	}else if($year == 2019){
		if($day == 23){
			$holiday .= "Hanukkah begins";
		}else if($day == 31){
			$holiday .= "Hanukkah ends";
		}
	}else if($year == 2020){
		if($day == 11){
			$holiday .= "Hanukkah begins";
		}else if($day == 19){
			$holiday .= "Hanukkah ends";
		}
	}
}

?>