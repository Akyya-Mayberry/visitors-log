<?php
	//Get full name of visitors
	class Visitor  {
		var $firstName;
		var $lastName;
		public function __construct($firstName, $lastName) {
			$this->firstName = $firstName;
			$this->lastName = $lastName;
			$this->fullName = $firstName . " " . $lastName;
		}
	}
		
	//gets fullname of who visitor is visiting
	class Visiting {
		var $visitingFirstName;
		var $visitingLastName;
		public function __construct($visitingFirstName, $visitingLastName){
			$this->visitingFirstName = $visitingFirstName;
			$this->visitingLastName = $visitingLastName;
			$this->visiting = $visitingFirstName . " " . $visitingLastName;
		}
	}
	
	//gets current date and time
	class CurrDate {
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
		$newVisitor = new Visitor($vfname, $vlname);
		$newVisiting = new Visiting($fvisiting, $lvisiting);		
		$clockedIn = new CurrDate;
		
		//go to model that handles searching or logging visitors
		//to determine if we will be logging in a visitor or logging them out
		
		//this model only checks if someone is logged in or not. It returns boolean
		include("../models/is_in_or_out.php");
		$loggedIn = isLoggedIn($vfname, $vlname, $fvisiting, $lvisiting, $clockedIn->theDate, $clockedIn->dbDate);
		
		if ($loggedIn) {
		//if they are logged in log them out
		include("../models/log_out.php");
		$logVisOut = logInOut($vfname, $vlname, $fvisiting, $lvisiting, $clockedIn->theDate, $clockedIn->dbDate);	
		include("../views/loggedOut.php");		
		} else {
		//if they are not logged in tell them they are not
		include("../views/not_logged_in.php");
		}
		
		/*
		if($isLoggedIn) {
		include("../views/logging_in_out.php");
		} else {
			include("../models/visitor_search.php");
			include("../views/not_logged_in.php");
			return $isLoggedIn;
		}
		*/
	}

?>