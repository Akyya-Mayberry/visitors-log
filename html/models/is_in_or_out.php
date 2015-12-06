<?php

//DATABASE
//working with the database
function isLoggedIn($visitorFirst, $visitorLast, $visitingFirst, $visitingLast, $clockedIn, $clockedInDb) {	
        $servername = "hills.ccsf.edu";
        $username = "amayberr";
        $password = "dec0383.am";
        $conn = new mysqli($servername, $username, $password);
        if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
        } else {
                $database = "test_amayberr";
                mysqli_select_db($conn, $database);
        }

//check to see if someone is logged in
			
				$sqlCheck = "SELECT firstname, lastname, logged_in FROM visitors WHERE firstname = '$visitorFirst' AND lastname = '$visitorLast'";		
				$search = $conn->query($sqlCheck);
				if ($search->num_rows > 0) {
					 $isIn = "";
					// output all records associated with current visitor
					while($row = $search->fetch_assoc()) {
						//if a record is found under their name,
						//check to see if they are logged in.
						//if they are logged in, meaning logged_in = 1, 
						//log them out by setting logged_in = 0			
						if ($row["logged_in"]) {
						//person is logged in	
							$isIn = true;
							//return true;
						//	echo "You've been logged out on " . $clockedInDb . "<br>";
						} else {
							//person is not logged in
							$isIn = false;
							//return false;
						}
					} 
						return $isIn;
				} else {
					return false;
				}
			//if a record is not found in the database for the visitor
			//this means it is their first time visiting so log them in
}


?>