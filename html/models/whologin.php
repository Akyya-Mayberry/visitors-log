<?php
//DATABASE
//connect to database to see who is logged in
function whoLoggedIn() {	
				//connect to database
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

				//Get the names of who are logged in		
				$sqlCheck = "SELECT firstname, lastname FROM visitors WHERE logged_in = 1";		
				$search = $conn->query($sqlCheck);
				$loggedInVisitors = [];
				if ($search->num_rows > 0) {
					// output all records associated with current visitor
					while($row = $search->fetch_assoc()) {
						//if a record is found under their name,
						//check to see if they are logged in.
						//if they are logged in, meaning logged_in = 1
						//put them in $loggedInVisitors array
					array_push($loggedInVisitors, $row['firstname'] . " " . $row['lastname']);
						}
				}
				return $loggedInVisitors;
}
?>