<?php
	//Get full name of visitors
	class visitorIn  {
		var $firstName;
		var $lastName;
		public function __construct($firstName, $lastName) {
			$this->firstName = $firstName;
			$this->lastName = $lastName;
			$this->fullName = $firstName . " " . $lastName;
		}
	}
		
	//gets fullname of who visitor is visiting
	class visitingIn {
		var $visitingFirstName;
		var $visitingLastName;
		public function __construct($visitingFirstName, $visitingLastName){
			$this->visitingFirstName = $visitingFirstName;
			$this->visitingLastName = $visitingLastName;
			$this->visiting = $visitingFirstName . " " . $visitingLastName;
		}
	}
	
	//gets current date and time
	class currDateIn {
		var $theDate;
		public function __construct() {
			date_default_timezone_set('America/Los_Angeles');
			$this->theDate = date('l, F jS h:i A');
			$this->dbDate = date("Y-m-d H:i:s");
		}
	}
	
	//If user is trying to log in or out
	if(isset($_GET['vfname'])) {
		//store user input in variables and convert to uppercase letters
		$vfname = strtoupper($_GET['vfname']);
		$vlname = strtoupper($_GET['vlname']);
		$fvisiting = strtoupper($_GET['fvisiting']);
		$lvisiting = strtoupper($_GET['lvisiting']);
		
		//create objects of visitor
		$newVisitor = new visitorIn($vfname, $vlname);
		$newVisiting = new visitingIn($fvisiting, $lvisiting);		
		$clockedIn = new currDateIn;
		include("../models/log_in.php");
		$logVisIn = logIn($vfname, $vlname, $fvisiting, $lvisiting, $clockedIn->theDate, $clockedIn->dbDate);
		if ($logVisIn) {
			//user is already logged in
			include("../views/is_logged_in.php");
		} else {
			//log the user in
			include("../views/loggedIn.php");
		}
	}

?>