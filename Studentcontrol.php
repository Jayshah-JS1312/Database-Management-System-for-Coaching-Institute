<?php
$conn = new mysqli('localhost','root','','coaching_institute');
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
} 


?>




<!DOCTYPE html>
<html>
<head>
	<style>
		table,th,td
		{
			border:2px solid black;
			border-width: 4px;
			border-color: green;
		}
	</style>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
	<h1>Coaching Institute</h1>
	<br>
	<br>
	<h2>Student Portal</h2>
	<form action="Studentcontrol.php" method="POST">
	<button type = "submit" name = "fsubmit" class = "btn btn success" onclick="window.open('Facultybatch.php')">View Faculty and Batch Details</button>
	<button type = "submit" name ="busubmit" class="btn btn success" onclick="window.open('Viewattendance.php')">View Attendance
	</button>
	<button type="submit" name="jsubmit" class="btn btn success" onclick="window.open('Viewresult.php')">View Result
	</button>
	<button type="submit" name="sawsubmit" class="btn btn success " onclick="window.open('Viewtimings.php')">View Timings
	</button>
	</form>
</body>
</html>