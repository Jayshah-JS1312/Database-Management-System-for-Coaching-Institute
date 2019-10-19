<?php
$conn = new mysqli('localhost','root','','coaching_institute');
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
} 
	if (isset($_POST['mlresult'])) 
	{
		$studentid = $_POST['studid'];
		$fireresult = "SELECT Batch_Timings FROM student WHERE Student_ID = $studentid";
		$generatemyquery = mysqli_query($conn,$fireresult);
		$row = $generatemyquery->fetch_assoc();
		echo "<h2>Your timings are </h2><h2>" .$row["Batch_Timings"]."</h2>";
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
	<form action="Viewtimings.php" method="POST">
		Enter ID
		<input type="text" name="studid">
		<button type = "submit" class="btn btn success" name="mlresult">
			Enter
		</button>
	</form>
	
</body>
</html>