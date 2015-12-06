<?php
	//these are the primary controller files
	//visitor_out logs out visitors
	//visitor_in logs in visitors
	//whoin displays all users logged in
	include("html/controllers/visitor_out.php");
	include("html/controllers/visitor_in.php");
	include("html/controllers/whoin.php");
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<title>Group 5 Assignment</title>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="js/clock.js"></script>
		<script src="js/showFields.js" type="text/javascript"></script>
		<script src="js/toControllers.js" type="text/javascript"></script>	
		<!--<link href="css/main.css" rel="stylesheet" type='text/css'>-->
		<link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
	</head>
	<body>
	<!--Welcome Area-->
	<div id="container">
		<h1 class="title"><strong>WELCOME</strong></h1>
	
	<!--Navigation-->
		<nav><button type="button" name="whoIn" id="who" onclick="whoIn()" value="buttons">Who's logged In</button> | <button>Last Person Logged In</button></nav>
	
	<!--This section starts the log in/out forms
	certain fields are hidden until user performs certain action
	preview javascript files for more info-->
		<section id="scan">
			<form name="log" method="get">
				<h1 class="checkInTitle">Check In</h1>
				<p class="inputFields">
					<fieldset id="visInfo">
						<legend align="center">Visitors Info</legend>
						First Name: <input type="text" name="vfname" id="first" class="userInputBox" placeholder="your first name" autofocus><br>
						Last Name: <input type="text" name="vlname" id="last" class="userInputBox" placeholder="your last name">
					</fieldset>	
					<fieldset id="inmateInfo">
						<legend align="center">Inmate Info</legend>
						First Name: <input type="text" name="fvisiting" id="fvisiting" class="userInputBox" placeholder="first name of inmate"><br>
						Last Name: <input type="text" name="lvisiting" id="lvisiting" class="userInputBox" placeholder="last name of inmate"><br>
					</fieldset>
					<button name="submitNow" type="button" id="logIn" onclick='loadDoc("html/controllers/visitor_in.php")' style="clear: both;">Log In</button>
					<button name="submitVis" type="button" id="submitVis" style="clear: both;">Continue</button>
					<button name="logoutNow" type="button" id="logout" onclick='loadDoc("html/controllers/visitor_out.php")' style="clear: both;" value="logVisOut">Log Out</button>
				</p>
			</form>
		</section>
	</div>
	
	<!--The Clock displayed on left of page-->
	<div id="clockbox"></div>

	<!--here is where all the outputted data will be displayed-->
	<div id="testInfo" style="text-align: center;"></div>
	
</body>
</html>
