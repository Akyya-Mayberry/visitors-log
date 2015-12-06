<?php

	if (!empty($loggedInVisitors)) {
		print "<table style=\"text-align: center; margin: 0 auto;\"><tr><th>Users Logged In</th></tr>";
		foreach ($loggedInVisitors as $visitor) {
			print "<tr><td>" . $visitor . "</td></tr>";
		}
		print "</table";
	} else {
		echo "No one is currently logged in";
	}

?>