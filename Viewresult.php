<?php
$conn = new mysqli('localhost','root','','coaching_institute');
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
} 
	if (isset($_POST['mnresult'])) 
	{
		$stuid = $_POST['stid'];
		$query = "CALL getresult($stuid)";
		$final = mysqli_query($conn,$query);
		if($final->num_rows>0)
		{
			echo "<table><tr><th>Maths</th><th>Physics</th> <th>Chemistry</th><th>Total Marks</th><th>Maximum Marks</th><th>Exam Date</th></tr>";
			while ($row = $final->fetch_assoc()) 
			{
				echo "<tr><td>".$row["Maths"]."</td><td>".$row["Physics"]."</td><td>".$row["Chemistry"]."</td><td>".$row["Obtained_Marks"]."</td><td>".$row["Maximum_Marks"]."</td><td>".$row["Exam_Date"]."</td></tr>";
			}
			echo "</table>";
		}
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
	<form action="Viewresult.php" method="POST">
		Enter ID
		<input type="text" name="stid">
		<button type = "submit" class="btn btn success" name="mnresult">
			Enter
		</button>
	</form>
	
</body>
</html>