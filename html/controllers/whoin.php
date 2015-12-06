<?php
 
	if (isset($_GET['whoIn'])) {
		//echo "who in been clicked";
		include("../models/whologin.php");
		$loggedInVisitors = whoLoggedIn();
		include("../views/who_is_in.php");
	}
?>