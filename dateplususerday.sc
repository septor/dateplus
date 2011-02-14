if(file_exists(e_PLUGIN."dateplus_menu/userdays.php")){
	include_once(e_PLUGIN."dateplus_menu/userdays.php");
	foreach($userdays as $uday){
		if(!empty($uday['weekday'])){
			if(!empty($uday['dayspan'])){
				if(!empty($uday['timestart']) && !empty($uday['timeend'])){
					$timestart = str_replace(":", "", $uday['timestart']);
					$timeend = str_replace(":", "", $uday['timeend']);
					if($month == $uday['month'] && $weekday == $uday['weekday'] && $day > $uday['day'] && $day < $uday['dayspan'] && $time >= $timestart && $time <= $timeend){
						$userday = $uday['name'];
					}
				}else{
					if($month == $uday['month'] && $weekday == $uday['weekday'] && $day > $uday['day'] && $day < $uday['dayspan']){
						$userday = $uday['name'];
					}
				}
			}else{
				if(!empty($uday['timestart']) && !empty($uday['timeend'])){
					$timestart = str_replace(":", "", $uday['timestart']);
					$timeend = str_replace(":", "", $uday['timeend']);
					if($month == $uday['month'] && $weekday == $uday['weekday'] && $day == $uday['day'] && $time >= $timestart && $time <= $timeend){
						$userday = $uday['name'];
					}
				}else{
					if($month == $uday['month'] && $weekday == $uday['weekday'] && $day == $uday['day']){
						$userday = $uday['name'];
					}
				}
			}
		}else{
			if(!empty($uday['dayspan'])){
				if(!empty($uday['timestart']) && !empty($uday['timeend'])){
					$timestart = str_replace(":", "", $uday['timestart']);
					$timeend = str_replace(":", "", $uday['timeend']);
					if($month == $uday['month'] && $day > $uday['day'] && $day < $uday['dayspan'] && $time >= $timestart && $time <= $timeend){
						$userday = $uday['name'];
					}
				}else{
					if($month == $uday['month'] && $day > $uday['day'] && $day < $uday['dayspan']){
						$userday = $uday['name'];
					}
				}
			}else{
				if(!empty($uday['timestart']) && !empty($uday['timeend'])){
					$timestart = str_replace(":", "", $uday['timestart']);
					$timeend = str_replace(":", "", $uday['timeend']);
					if($month == $uday['month'] && $day == $uday['day'] && $time >= $timestart && $time <= $timeend){
						$userday = $uday['name'];
					}
				}else{
					if($month == $uday['month'] && $day == $uday['day']){
						$userday = $uday['name'];
					}
				}
			}
		}
	}
}

return (($userday) ? $userday : "No user defined events today.");